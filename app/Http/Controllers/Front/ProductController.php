<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Interfaces\ProductInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;
use App\Models\Cart;
use App\Models\ProductColorSize;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\ProductVariation;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct(ProductInterface $productRepository) 
    {
        $this->productRepository = $productRepository;
    }

    // public function ProductList(Request $request){
       
    //     $range_from = "";
    //     $range_to = "";
    //     $availableColors = [];
    //     $range =$request->range?$request->range:"";
    //     $keyword =$request->keyword?$request->keyword:"";
    //     $category =$request->category?$request->category:"";
    //     if($request->range){
    //         list($range_from, $range_to) = explode('-', $range);
    //         $data = Product::where('status',1)->orderBy('position','ASC')->whereBetween('price', [(float)$range_from, (float)$range_to])->paginate(12);
    //         foreach ($data as $product) {
    //             $availableColors[$product->id] = $this->productRepository->getAvailableColorByProductId($product->id);
    //         }
    //     }elseif($request->category){
    //         $data = Product::where('status',1)->where('cat_id', $request->category)->orderBy('position','ASC')->paginate(12);
    //         foreach ($data as $product) {
    //             $availableColors[$product->id] = $this->productRepository->getAvailableColorByProductId($product->id);
    //         }
    //     }elseif($request->keyword){
    //         $data = $this->productRepository->getSearchProducts($keyword);
    //         foreach ($data as $product) {
    //             $availableColors[$product->id] = $this->productRepository->getAvailableColorByProductId($product->id);
    //         }
    //     }else{
    //         $data = Product::where('status',1)->orderBy('position','ASC')->paginate(12);
    //         foreach ($data as $product) {
    //             $availableColors[$product->id] = $this->productRepository->getAvailableColorByProductId($product->id);
    //         }
    //     }
    //     $filter_data = Product::latest('view_count', 'id')->where('status',1)->paginate(12);
        
    //     if($request->type=="deal-of-the-day"){
    //         $data = Product::where('is_deal_of_the_day', 1)->latest('view_count', 'id')->where('status',1)->paginate(12);
    //     }
    //     $filteredData = $filter_data->filter(function($product) {
    //         return $product->offer_price > 0;
    //     });
    //     $minOfferPrice = $filter_data->min('offer_price');
    //     $minOfferPrice = $filteredData->min('offer_price');
    //     $maxOfferPrice = $filter_data->max('offer_price');
    //     $increment = 500; // Define the increment value for the price ranges
    //     $priceRanges = [];

    //     for ($price = $minOfferPrice; $price <= $maxOfferPrice; $price += $increment) {
    //         $endRange = $price + $increment - 1;
    //         if ($endRange > $maxOfferPrice) {
    //             $endRange = $maxOfferPrice;
    //         }
    //         $priceRanges[] = "$price-$endRange";
    //     }

    //     $query = Product::query()->with('variations')->where('status', 1);

    //     // Apply category filter (multiple)
    //     if ($request->filled('categories')) {
    //         $query->whereIn('cat_id', $request->categories);
    //     }

    //     // Apply weight filter (multiple)
    //     if ($request->filled('weights')) {
    //         $query->whereHas('variations', function ($q) use ($request) {
    //             $q->whereIn('weight', $request->weights);
    //         });
    //     }

    //     $categories = Category::where('status', 1)->get();
    //     $categoryIds = Category::whereIn('name', ['Medicine', 'Water'])->pluck('id');
    //     $weights = ProductVariation::whereNotNull('weight')
    //         ->whereHas('product', function ($query) use ($categoryIds) {
    //             $query->whereIn('cat_id', $categoryIds);
    //         })
    //         ->select('weight')
    //         ->distinct()
    //         ->pluck('weight');

    //     return view('front.hotDealList',compact('data','categories','categoryIds','weights'));
    // }
    // public function shop()
    // {
    //     $categories = Category::where('status', 1)->orderBy('name', 'ASC')->get();
    //     $data = Product::where('status', 1)->orderBy('id', 'DESC')->paginate(12);

       
    //     $weights = ProductVariation::whereNotNull('weight')
    //         ->select('weight')
    //         ->distinct()
    //         ->pluck('weight');
        
    //     $categoryIds = $categories->pluck('id')->toArray(); 

    //     return view('front.hotDealList', compact('data', 'categories', 'weights', 'categoryIds'));
    // }
    public function shop(Request $request)
    {
        $categories = Category::where('status', 1)->orderBy('name', 'ASC')->get();
        $query = Product::where('status', 1);

        // If category filter is present
        if ($request->filled('category')) {
            $category = Category::where('slug', $request->category)->first();

            if ($category) {
                $query->where('cat_id', $category->id);
            }
        }

        $data = $query->orderBy('id', 'DESC')->paginate(12);

        $weights = ProductVariation::whereNotNull('weight')
            ->select('weight')
            ->distinct()
            ->pluck('weight');

        $categoryIds = $categories->pluck('id')->toArray(); 

        return view('front.hotDealList', compact('data', 'categories', 'weights', 'categoryIds'));
    }


   public function ajaxFilter(Request $request)
    {
        $query = Product::where('status', 1);

        if ($request->has('categories') && !empty($request->categories)) {
            $query->whereIn('cat_id', $request->categories);
        }

        if ($request->has('weights') && !empty($request->weights)) {
            $query->whereHas('variations', function ($q) use ($request) {
                $q->whereIn('weight', $request->weights);
            });
        }

        $data = $query->orderBy('id', 'DESC')->paginate(12);

        $html = view('front.partials.filtered_products', compact('data'))->render();

        return response()->json(['html' => $html]);
    }

    public function getVariationImages(Request $request)
    {
        $variationId = $request->variation_id;

        $variation = ProductVariation::with('images')->find($variationId);

        if ($variation) {
            $images = $variation->images->map(function ($img) {
                return asset($img->image_path);
            });

            return response()->json([
                'status' => true,
                'images' => $images
            ]);
        }

        return response()->json(['status' => false, 'images' => []]);
    }


    public function detail(Request $request, $slug)
    {
        $data = $this->productRepository->listBySlug($slug);

        if ($data) {
            $images = $this->productRepository->listImagesById($data->id);
            //dd($data->id);
            $productVariations = $this->productRepository->listVariationById($data->id);
            $relatedProducts = $this->productRepository->relatedProducts($data->id);
            $wishlistCheck = $this->productRepository->wishlistCheck($data->id);
            $primaryColorSizes = $this->productRepository->primaryColorSizes($data->id);    

            // if ($slug == "test-product-2") {
            //     return view('front.product.detail-updated', compact('data', 'images', 'relatedProducts', 'wishlistCheck', 'primaryColorSizes'));
            // } else {
                return view('front.productDetails', compact('data', 'images', 'productVariations', 'relatedProducts', 'wishlistCheck', 'primaryColorSizes',));
            // }
        } else {
            return view('front.404');
        }
    }

    public function AddToCart(Request $request){
        if (Auth::guard('web')->check()) {
            $user_id = Auth::guard('web')->user()->id;
            $maxQuantity = 5;
            $QuantityExistsInCart = Cart::where('user_id',$user_id)->where('product_id',$request->productId)->where('product_variation_id', $request->variationId)->sum('qty');
            

            $remainingQuantity = $maxQuantity - $QuantityExistsInCart;
           
            if($remainingQuantity==0){
                return redirect()->back()->with('warning','You already add 5 quantity for this product variation');
            };
            $quantityToAdd = min($request->quantity, $remainingQuantity);
            $request->validate([
                'choose_color'=>'required',
                'size_name'=>'required',
                'quantity'=>'required|max:5|min:1',
            ],[
                'choose_color.required' => 'Please select a color.',
                'size_name.required' => 'Please select a size.',
                'quantity.required' => 'Please select a quantity.',
                'quantity.max' => 'Please select a maximum of 5 quantities.',
                'quantity.min' => 'The quantity cannot be less than 1.'
            ]);

           
            $colorId = ProductColorSize::findOrFail($request->variationId);
           
            $image = "";
            if($colorId){
                $productImage = ProductImage::where('color_id',$colorId->color)->where('product_id',$request->productId)->first();
                $image = $productImage->image;
            }
            for ($i = 0; $i < $quantityToAdd; $i++) {
                $cart = new Cart();
                $cart->user_id = $user_id;
                $cart->product_id = $request->productId;
                $cart->product_name = $request->productName;
                $cart->product_style_no = $request->productStyleNo;
                $cart->product_slug = $request->productSlug;
                $cart->product_variation_id = $request->variationId ;
                $cart->price = $request->price;
                $cart->offer_price = $request->offer_price;
                $cart->qty = 1;
                $cart->product_image = $image;
                $cart->save();
            }
            return redirect()->back()->with('success',''.$quantityToAdd.' items successfully added to your cart.');
        }else{
            $route = route('front.shop.details', $request->productSlug);
            session(['url.intended' => $route]);
            return redirect()->route('front.user.login')->with('warning','You should log in first before adding items to your cart.');
        }

    }

    public function details(Request $request, $slug)
    {
        $selectedColorId = $request->color?$request->color:"";
        $data = $this->productRepository->getProductDetailsBySlug($slug);
       
        $categoryWiseProducts = Product::inRandomOrder()->take(4)->where('status',1)->get();
        if($request->color){
            $primaryColorSizes = $this->productRepository->SelectedColorSizes($data->id, $request->color);
        }else{
            $primaryColorSizes = $this->productRepository->primaryColorSizes($data->id);
        }
        
        $availableColor = $this->productRepository->getAvailableColorByProductId($data->id);
        
        return view('front.productDetails', compact('data','availableColor','primaryColorSizes','categoryWiseProducts','selectedColorId'));
    }


}
