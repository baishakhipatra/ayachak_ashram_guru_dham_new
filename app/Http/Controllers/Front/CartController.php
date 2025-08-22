<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Interfaces\CartInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\Cart;
use App\Models\Checkout;
use App\Models\CheckoutProduct;
use App\Models\CartOffer;
use App\Models\ProductColorSize;
use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;
use DB;

class CartController extends Controller
{
    public function __construct(CartInterface $cartRepository) 
    {
        $this->cartRepository = $cartRepository;
    }

    public function couponCheck(Request $request)
    {
        $couponData = $this->cartRepository->couponCheck($request->code);
        return $couponData;
    }

    public function couponRemove(Request $request)
    {
        $couponData = $this->cartRepository->couponRemove();
        return $couponData;
    }

    // public function add(Request $request) 
    // {
    //     //dd($request->all());
    //     $request->validate([
    //         'product_id' => 'required|exists:products,id',
    //         'variation_id' => 'nullable|exists:product_variation,id',
    //         'quantity' => 'required|integer|min:1',
    //     ]);

    //     $product = Product::findOrFail($request->product_id);
    //     $variation = ProductVariation::findOrFail($request->variation_id);

    //     // Check for existing cart item (based only on product + variation)
    //     $existingCart = Cart::where('product_id', $request->product_id)
    //         ->where('product_variation_id', $request->variation_id)
    //         ->first();

    //     if ($existingCart) {
    //         $existingCart->qty += $request->quantity;
    //         $existingCart->save();
    //     } else {
    //         Cart::create([
    //             'product_id' => $product->id,
    //             'product_name' => $product->name,
    //             'product_slug' => $product->slug,
    //             'product_image' => $product->thumbnail,
    //             'product_variation_id' => $variation->id,
    //             'price' => $variation->price,
    //             'offer_price' => $variation->offer_price,
    //             'qty' => $request->quantity,
    //         ]);
    //     }

    //     return back()->with('success', 'Product added to cart!');
    // }
    public function add(Request $request) 
    {
        $product = Product::findOrFail($request->product_id);

        $hasVariation = ProductVariation::where('product_id', $product->id)->exists();

        $rules = [
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ];

        if ($hasVariation) {
            $rules['variation_id'] = 'required|exists:product_variation,id';
        }

        $request->validate($rules);

        $variation = null;
        if ($hasVariation) {
            $variation = ProductVariation::findOrFail($request->variation_id);
        }

        $existingCart = Cart::where('product_id', $product->id)->where('user_id', auth()->id());
       // dd($existingCart);
        
        if ($variation) {
            $existingCart = $existingCart->where('product_variation_id', $variation->id);
        }

        $existingCart = $existingCart->first();

        // If product already exists in cart, don't update quantity — just return warning
        if ($existingCart) {
            return back()->with('warning', 'Product already in cart!');
        }
        Cart::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'product_name' => $product->name,
            'product_style_no' => $product->style_no,
            'product_image' => $product->image,
            'product_slug' => $product->slug,
            'product_variation_id' => $variation?->id,
            'price' => $variation?->price ?? $product->price,
            'offer_price' => $variation?->offer_price ?? $product->offer_price,
            'qty' => $request->quantity,
        ]);

        return back()->with('success', 'Product added to cart!');
    }


    // public function index(Request $request)
    // {
    //    if(Auth::guard('web')->check()){
    //        $total_price_excluding = 0;
    //         $userId =Auth::guard('web')->user()->id;
    //         $mobile = Auth::guard('web')->user()->mobile;
    //         $cartProductDetails = Cart::with('productDetails')->latest()->where('user_id',$userId)->get();
    //         $couponData = Coupon::where('user_mobile', $mobile)->take(5)->where('status', 1)->get();
    //         if(count($cartProductDetails)){
    //             foreach($cartProductDetails as $key =>$item){
    //                  $price = $item->offer_price?$item->offer_price:$item->price;
    //                  $total_price_excluding += $price;
    //             }
    //         }
    //         return view('front.cartList',compact('cartProductDetails','couponData', 'total_price_excluding'));
    //    }else{
    //         return redirect()->route('front.user.login');
    //    }
    // }

    public function index(Request $request){
        $userId = auth()->id(); 
        //dd(auth()->id());
        $cartItems = Cart::where('user_id', $userId)->with(['productDetails','variation'])->get();
        //dd($cartItems);
        return view('front.cartList', compact('cartItems'));
    }

   public function updateQuantity(Request $request)
    {
        $cart = Cart::find($request->cart_id);

        if ($cart) {
            if ($request->type == 'increment') {
                if ($cart->qty < 10) {
                    $cart->qty += 1;
                }
            } elseif ($request->type == 'decrement') {
                if ($cart->qty > 1) {
                    $cart->qty -= 1;
                }
            }

            $cart->save();

            return response()->json([
                'success' => true,
                'updated_qty' => $cart->qty
            ]);
        }

        return response()->json(['success' => false], 404);
    }


    public function removeQuantity(Request $request)
    {
        $cart = Cart::find($request->cart_id);

        if (!$cart) {
            return response()->json(['success' => false, 'message' => 'Cart item not found.']);
        }

        $cart->delete();

        return response()->json(['success' => true]);
    }


    public function add_to_checkoout(Request $request)
    {
        $userId = Auth::guard('web')->id();
       
        DB::beginTransaction();

        try {
            $cartItems = Cart::with(['productDetails', 'variation'])
                ->where('user_id', $userId)
                ->get();
            if (count($cartItems)==0) {
                return back()->with('error', 'Your cart is empty.');
            }

            $subTotal = 0;
            $totalDiscount = 0;
            $totalGst = 0;
            $finalTotal = 0;
            $totalDiscount = 0;

            if (session()->has('couponCodeId')) {
                $coupon = Coupon::find(session('couponCodeId'));
                if ($coupon) {
                    // If your coupon type is 'fixed amount'
                    $totalDiscount = $coupon->amount;

                    // If your coupon type is percentage:
                    // $totalDiscount = ($subTotal * $coupon->amount) / 100;
                }
            }

            // Create checkout entry once
            $checkout = Checkout::create([
                'user_id' => $userId,
                'sub_total_amount' => 0,
                'discount_amount' => 0,
                'gst_amount' => 0,
                'final_amount' => 0,
            ]);

            foreach ($cartItems as $item) {
                $variation = $item->variation;
                $product = $item->productDetails;

                // Use variation price if exists, else product base price
                $price = $variation->offer_price
                    ?? $variation->price
                    ?? $product->offer_price
                    ?? $product->price
                    ?? 0;

                // GST from product details if available
                $gstPercent = $product->gst ?? 0;
                $gstAmount = ($price * $gstPercent) / 100;

                $discount = 0;
                $finalPrice = ($price - $discount) + $gstAmount;

                $subTotal += $price * $item->qty;
                $totalDiscount += $discount;
                $totalGst += $gstAmount * $item->qty;
                $finalTotal += $finalPrice * $item->qty;

                CheckoutProduct::create([
                    'checkout_id' => $checkout->id,
                    'product_id' => $variation->product_id ?? $product->id,
                    'user_id' => $userId,
                    'product_name' => $product->name ?? '',
                    'product_image' => $product->image ?? null,
                    'product_slug' => $product->slug ?? '',
                    'product_variation_id' => $variation->id ?? null,
                    'colour_name' => $variation->color_name ?? null,
                    'size_name' => $variation->size_name ?? null,
                    'sku_code' => $variation->code ?? null,
                    'coupon_code' => null,
                    'price' => $variation->price ?? $product->price ?? 0,
                    'offer_price' => $variation->offer_price ?? $product->offer_price ?? 0,
                    'gst' => $gstAmount,
                    'qty' => $item->qty,
                ]);
            }

            $finalTotal = ($subTotal + $totalGst) - $totalDiscount;

            $checkout->update([
                'sub_total_amount' => $subTotal,
                'discount_amount' => $totalDiscount,
                'gst_amount' => $totalGst,
                'final_amount' => $finalTotal,
            ]);

            // Update totals after loop
            $checkout->update([
                'sub_total_amount' => $subTotal,
                'discount_amount' => $totalDiscount,
                'gst_amount' => $totalGst,
                'final_amount' => $finalTotal,
            ]);

            DB::commit();

            return redirect()->route('front.checkout.index')
                ->with('success', 'Items successfully added.');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }



    /*
    public function viewByIp(Request $request)
    {
        $data = $this->cartRepository->viewByIp();

        $currentDate = date('Y-m-d');
        $cartOffers = CartOffer::where('status', 1)->whereRaw("date(valid_from) <= '$currentDate' AND date(valid_upto) >= '$currentDate'")->orderBy('min_cart_order', 'desc')->get();

        if ($data) {
            return view('front.cart.index', compact('data', 'cartOffers'));
        } else {
            return view('front.404');
        }
    }
    */

    public function delete(Request $request, $id)
    {
        $data = $this->cartRepository->delete($id);

        if ($data) {
            return redirect()->route('front.cart.index')->with('success', 'Product removed from cart');
        } else {
            return redirect()->route('front.cart.index')->with('failure', 'Something happened wrong');
        }
    }

    public function qtyUpdate(Request $request, $id, $type)
    {
        $data = $this->cartRepository->qtyUpdate($id, $type);

        if ($data) {
            return redirect()->route('front.cart.index')->with('success', $data);
        } else {
            return redirect()->route('front.cart.index')->with('failure', 'Something happened');
        }
    }
}
