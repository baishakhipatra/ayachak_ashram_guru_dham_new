<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Interfaces\CheckoutInterface;
use App\Interfaces\CartInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartOffer;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Coupon; 
use Illuminate\Support\Facades\Validator;
use DB;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
class CheckoutController extends Controller
{
    public function __construct(CheckoutInterface $checkoutRepository, CartInterface $cartRepository) 
    {
        $this->checkoutRepository = $checkoutRepository;
        $this->cartRepository = $cartRepository;
    }

    public function index(Request $request)
    {
        $userId = auth()->id();
        $cartItems = Cart::with(['productDetails', 'variation', 'productDetails.category'])
            ->where('user_id', $userId)
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('front.cart.index')->with('warning', 'Your cart is empty.');
        }

        $subtotal = 0;
        $tax = 0;

        foreach ($cartItems as $item) {
            $price = $item->offer_price > 0 ? $item->offer_price : $item->price;
            $lineSubtotal = $item->qty * $price;
            $subtotal += $lineSubtotal;

            $gstPercent = $item->productDetails->gst ?? 0;
            $lineTax = ($lineSubtotal * $gstPercent) / 100;
            $tax += $lineTax;
        }

        // Default discount
        $discount = 0;

        // Check if a coupon is stored in the session
        if (session()->has('couponCodeId')) {
            $coupon = Coupon::find(session('couponCodeId'));

            if ($coupon) {
                // If your coupon is a fixed amount
                $discount = $coupon->amount;
                
                // Or if your coupon is percentage based:
                // $discount = ($subtotal * $coupon->discount_percentage) / 100;
            }
        }

        // Calculate total after discount
        $total = $subtotal + $tax - $discount;

        return view('front.checkout.index', compact('cartItems', 'subtotal', 'tax', 'discount', 'total'));
    }


    public function coupon(Request $request)
    {
        $couponData = $this->checkoutRepository->couponCheck($request->code);
        return $couponData;
    }

    // public function store(Request $request)
    // {
    //     // Validation rules based on your form
    //     $rules = [
    //         'email' => 'required|email|max:255',
    //         'mobile' => 'required|digits:10',
    //         'first_name' => 'required|string|max:255',
    //         'last_name' => 'required|string|max:255',
    //         'billing_country' => 'required|string|max:255',
    //         'billing_address' => 'required|string|max:1000',
    //         'billing_city' => 'required|string|max:255',
    //         'billing_state' => 'required|string|max:255',
    //         'billing_pin' => 'required|string|max:6',

    //         'address_option' => 'required|in:same,different',
    //         'shipping_country' => 'nullable|string|max:255',
    //         'shipping_first_name' => 'nullable|string|max:255',
    //         'shipping_last_name' => 'nullable|string|max:255',
    //         'shipping_address' => 'nullable|string|max:500',
    //         'shipping_city' => 'nullable|string|max:255',
    //         'shipping_state' => 'nullable|string|max:255',
    //         'shipping_pin' => 'nullable|string|max:6',
    //         'shipping_mobile' => 'nullable|digits:10',
    //     ];

    //     $messages = [
    //         'mobile.*' => 'Please enter a valid 10 digit mobile number',
    //         'billing_pin.*' => 'Please enter a valid 6 digit pin',
    //         'shipping_pin.*' => 'Please enter a valid 6 digit pin',
    //     ];

    //     $validator = Validator::make($request->all(), $rules);

    //     if ($validator->fails()) {
    //         if ($request->ajax()) {
    //             return response()->json([
    //                 'errors' => $validator->errors()
    //             ], 422);
    //         }
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     $userId = auth()->id();
    //     $cartItems = Cart::with(['productDetails'])->where('user_id', $userId)->get();

    //     if ($cartItems->isEmpty()) {
    //         return response()->json(['error' => 'Cart is empty'], 422);
    //     }

    //     // Calculate totals
    //     $subtotal = 0;
    //     $tax = 0;

    //     foreach ($cartItems as $item) {
    //         $price = $item->offer_price > 0 ? $item->offer_price : $item->price;
    //         $lineSubtotal = $item->qty * $price;
    //         $subtotal += $lineSubtotal;

    //         $gstPercent = $item->productDetails->gst ?? 0;
    //         $lineTax = ($lineSubtotal * $gstPercent) / 100;
    //         $tax += $lineTax;
    //     }

    //     $discount = 0;

    //     if (session()->has('couponCodeId')) {
    //         $coupon = Coupon::find(session('couponCodeId'));
    //         if ($coupon) {
                
    //             $discount = $coupon->amount;
    //         }
    //     }


    //     $total = $subtotal + $tax - $discount;

    //     // Prepare checkout data
    //     $checkoutData = $request->except('_token');
    //     $checkoutData['subtotal'] = $subtotal;
    //     $checkoutData['tax'] = $tax;
    //     $checkoutData['discount_amount'] = $discount;
    //     $checkoutData['total'] = $total;
    //     $checkoutData['cart_items'] = $cartItems;

    //     // Save order
    //     $order_id = $this->checkoutRepository->create($checkoutData);

    //     if ($order_id) {
    //         return response()->json([
    //             'success' => true,
    //             'redirect_url' => route('front.checkout.payment', $order_id)
    //         ]);
    //     } else {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Something went wrong, please try again.'
    //         ], 500);
    //     }
    // }

    public function store(Request $request)
    {
        $rules = [
            'email' => 'required|email|max:255',
            'mobile' => 'required|digits:10',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'billing_country' => 'required|string|max:255',
            'billing_address' => 'required|string|max:1000',
            'billing_city' => 'required|string|max:255',
            'billing_state' => 'required|string|max:255',
            'billing_pin' => 'required|string|max:6',

            'address_option' => 'required|in:same,different',
            'shipping_country' => 'nullable|string|max:255',
            'shipping_first_name' => 'nullable|string|max:255',
            'shipping_last_name' => 'nullable|string|max:255',
            'shipping_address' => 'nullable|string|max:500',
            'shipping_city' => 'nullable|string|max:255',
            'shipping_state' => 'nullable|string|max:255',
            'shipping_pin' => 'nullable|string|max:6',
            'shipping_mobile' => 'nullable|digits:10',
        ];

        $messages = [
            'mobile.*' => 'Please enter a valid 10 digit mobile number',
            'billing_pin.*' => 'Please enter a valid 6 digit pin',
            'shipping_pin.*' => 'Please enter a valid 6 digit pin',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $userId = auth()->id();
        $hasCart = Cart::where('user_id', $userId)->exists();
        if (!$hasCart) {
            return response()->json(['error' => 'Cart is empty'], 422);
        }

        $checkoutData = $request->except('_token');

        $order_id = $this->checkoutRepository->create($checkoutData);

        if ($order_id) {
            return response()->json([
                'success' => true,
                'redirect_url' => route('front.checkout.payment', $order_id)
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Something went wrong, please try again.'
        ], 500);
    }


    public function payment(Request $request,$order_id)
    {
        //dd($order_id);
        if (auth()->guard('web')->check()) {
            $data = Order::where('id',$order_id)->orderby('id','desc')->first();
        } else {
            $data = Order::where('id',$order_id)->orderby('id','desc')->first();
            //dd($data);
        }
            if ($data) {
            return view('front.checkout.payment', compact('data'));
        }
    }


    public function paymentStore(Request $request)
    {
        //dd($request->all());

        $request->validate([
           
            'shipping_method' => 'nullable',
        
        ]);
		
        $order_no = $this->checkoutRepository->paymentCreate($request->order_id,$request->except('_token'));
       // dd($order_no);
        if ($order_no) {
            // return redirect()->route('front.checkout.complete')->with('success', 'Order No: '.$order_no);
            return view('front.checkout.complete', compact('order_no'))->with('success', 'Thank you for you order');
            //return view('front.checkout.payment', compact('order_no'))->with('success', 'Please complete your payment');
        } else {
            $request->shippingSameAsBilling = 0;
            return redirect()->back()->with('failure', 'Something happened. Try again.')->withInput($request->all());
        }
    }
    // New Payment Gateway
    public function createOrder(Request $request){
        // dd($request->all());
        $request->validate([
            'email' => 'required|email|max:255',
            'mobile' => 'required|integer|digits:10',
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
           'billing_country' => 'required|string|max:255',
           'billing_address' => 'required|string|max:1000',
           'billing_landmark' => 'nullable|string|max:255',
           'billing_city' => 'required|string|max:255',
           'billing_state' => 'required|string|max:255',
            'billing_pin' => 'required|string|max:255',
            'shippingSameAsBilling' => 'nullable|integer|digits:1',
            'shipping_country' => 'nullable|string|max:255',
            'shipping_address' => 'nullable|string|max:500',
            'shipping_landmark' => 'nullable|string|max:255',
            'shipping_city' => 'nullable|string|max:255',
            'shipping_state' => 'nullable|string|max:255',
            'shipping_pin' => 'nullable|integer|digits:6',
            'shipping_method' => 'nullable|string',
        ], [
            'mobile.*' => 'Please enter valid 10 digit mobile number',
            'billing_pin.*' => 'Please enter valid 6 digit pin',
            'shipping_pin.*' => 'Please enter valid 6 digit pin',
        ]);
        
         $order_id = $this->checkoutRepository->NewCreate($request->except('_token'));
        if ($order_id) {
           return view('front.payment.success')->with('success', 'Thank you for you order');
        } else {
            session()->flash('failure', 'Something happened. Try again.');
            return redirect()->back();
        }
    }
    // public function createOrder(Request $request){
    //     dd($request->all());
    //     return view('front.payment.success');
    //     $razorpayKey = env('RAZORPAY_KEY');
    //     $razorpaySecret = env('RAZORPAY_SECRET');

    //     // Prepare the data for the order
    //     $orderData = [
    //         'receipt'         => 'rcptid_' . time(),
    //         // 'amount'          => $request->input('amount') * 100, // amount in the smallest currency unit
    //         'amount'          => 1 * 100, // amount in the smallest currency unit
    //         'currency'        => 'INR',
    //         'payment_capture' => 1 // auto capture
    //     ];

    //     // Encode the order data
    //     $jsonData = json_encode($orderData);

    //     // Initialize cURL
    //     $ch = curl_init();

    //     // Set cURL options
    //     curl_setopt($ch, CURLOPT_URL, 'https://api.razorpay.com/v1/orders');
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_POST, true);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, [
    //         'Content-Type: application/json',
    //         'Authorization: Basic ' . base64_encode("$razorpayKey:$razorpaySecret")
    //     ]);

    //     // Execute the cURL request
    //     $response = curl_exec($ch);
    //     // Check for errors
    //     if ($response === false) {
    //         $errorMessage = curl_error($ch);
    //         return response()->json(['error' => $errorMessage], 500);
    //     }

    //     // Decode the response
    //     $responseData = json_decode($response, true);

    //     // Check if order creation was successful
    //     if (isset($responseData['id'])) {
    //         return response()->json([
    //             'orderId' => $responseData['id'],
    //             'amount' => $request->input('amount')
    //         ]);
    //     } else {
    //         return response()->json(['error' => 'Order creation failed. Please try again.'], 500);
    //     }
    // }
    public function success(Request $request)
    {
        // Validate the request
        $signature = $request->input('razorpay_signature');
        $paymentId = $request->input('razorpay_payment_id');
        $orderId = $request->input('razorpay_order_id');

        // Verify the signature manually
        $generated_signature = hash_hmac('sha256', $orderId . '|' . $paymentId, env('RAZORPAY_SECRET'));
        dd($generated_signature);
        if ($generated_signature === $signature) {
            // Payment is successful, update your database
            // ...

            return view('payment.success', compact('paymentId'));
        } else {
            // Log detailed error information
            Log::error('Razorpay Payment Verification Failed', [
                'message' => 'Signature verification failed',
                'payment_id' => $paymentId,
                'order_id' => $orderId,
                'request' => $request->all()
            ]);

            // Payment verification failed
            return view('payment.failure', ['message' => 'Payment verification failed']);
        }
    }

    public function failure()
    {
        return view('payment.failure', ['message' => 'Payment failed or canceled.']);
    }

    public function webhook(Request $request)
    {
        $apiSecret = env('RAZORPAY_SECRET');
        $signature = $request->header('X-Razorpay-Signature');
        $payload = $request->getContent();

        $expectedSignature = hash_hmac('sha256', $payload, $apiSecret);

        if ($signature === $expectedSignature) {
            $event = $request->input('event');

            if ($event === 'payment.failed') {
                $paymentId = $request->input('payload.payment.entity.id');
                $orderId = $request->input('payload.payment.entity.order_id');
                $reason = $request->input('payload.payment.entity.error_reason');

                Log::info("Payment failed. Payment ID: $paymentId, Order ID: $orderId, Reason: $reason");

                // Optionally, update your database to mark the payment as failed
            }

            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'invalid signature'], 400);
        }
    }

}