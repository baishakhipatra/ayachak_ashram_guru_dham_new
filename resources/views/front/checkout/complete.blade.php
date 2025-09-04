@extends('layouts.app')
@section('page', 'Order Complete')
@section('content')

{{-- <div class="alert alert-success">
<h2> Order Placed Successfull </h2>
</div> --}}

<section class="main">
    <div class="container">
        <div class="order-complete-stack">
            <figure>
                <img src="./assets/images/check.svg" alt="">
            </figure>

            <h2 class="section-heading">Thank you for your purchase</h2>
            <p>We’ve received your order will ship in 5 - 7 business days. <span>Your Order number is {{$order->id}}</span></p>
            <div class="summery-stack">
                <h4>Order Summery</h4>
                <div class="summery-list">
                    <ul class="cart-item-list">
                        {{-- @foreach($order->orderProducts as $item)
                            <li>
                                <div class="inner-wrap">
                                    <figure>
                                        <img src="{{ $item->productDetails->product_image ?? asset('assets/images/placeholder-product.jpg') }}" alt="">
                                    </figure>
                                    <figcaption>
                                        <div class="product-details-cart">
                                            <a href="#">
                                                <h3>{{ $item->productDetails->product_name }}</h3>
                                            </a>
                                            <div class="pro-meta">
                                                <span>Category:</span> {{ $item->productDetails->category->name ?? 'N/A' }}
                                            </div>
                                            <div class="pro-meta">
                                                <span>Weight:</span> {{ $item->productDetails->weight ?? 'N/A' }}
                                            </div>
                                        </div>
                                        <span class="cart-price">₹{{ number_format($item->amount, 2) }}</span>
                                        <span class="cart-price">₹{{ number_format($item->discount_amount, 2) }}</span>
                                        <span class="cart-price">₹{{ number_format($item->tax_amount, 2) }}</span>
                                    </figcaption>
                                </div>
                            </li>
                        @endforeach --}}
                        @foreach($order->orderProducts as $item)
                            <li>
                                <div class="inner-wrap">
                                    <figure>
                                        <img src="{{ $item->productDetails->product_image ?? asset('assets/images/placeholder-product.jpg') }}" alt="">
                                    </figure>
                                    <figcaption>
                                        <div class="product-details-cart">
                                            <a href="#">
                                                <h3>{{ $item->productDetails->product_name ?? 'No Name' }}</h3>
                                            </a>
                                            <div class="pro-meta">
                                                <span>Category:</span> {{ $item->productDetails->category->name ?? 'N/A' }}
                                            </div>
                                            <div class="pro-meta">
                                                <span>Weight:</span> {{ $item->productDetails->weight ?? 'N/A' }}
                                            </div>
                                        </div>
                                        <span class="cart-price">₹{{ number_format($item->amount, 2) }}</span>
                                        <span class="cart-price">₹{{ number_format($item->discount_amount, 2) }}</span>
                                        <span class="cart-price">₹{{ number_format($item->tax_amount, 2) }}</span>
                                    </figcaption>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>
                <div class="cart-total">
                    <span>Total</span>
                    ₹{{ number_format($order->final_amount, 2) }}
                </div>
            </div>
        </div>
        
    </div>
</section>


@endsection
{{-- 
@section('script')
    <script>
        $(window).on('load', function() {
            gtag("event", "purchase", {
                transaction_id: "",
                value: {{(int) $orderData->final_amount}},
                tax: {{(int) $orderData->tax_amount}},
                shipping: {{(int) $orderData->shipping_charges}},
                currency: "INR",
                coupon: "{{(!empty($couponData)) ? $couponData->coupon_code : ''}}",
                items: [
                    @foreach($orderProductsData as $item)
                    {
                        item_id: "{{$item->sku_code}}",
                        item_name: "{{$item->product_name}}",
                        coupon: "{{(!empty($couponData)) ? $couponData->coupon_code : ''}}",
                        discount: {{$item->price - $item->offer_price}},
                        index: 0,
                        item_brand: "ONN",
                        item_category: "{{$item->productDetails->category->name}}",
                        item_variant: "{{$item->productVariationDetails->colorDetails->name}}",
                        price: {{$item->offer_price}},
                        quantity: {{$item->qty}}
                    }@if(!$loop->last),@endif
                    @endforeach
                ]
            });
        });
    </script>
	   <script>
	  window.dataLayer = window.dataLayer || [];
	  window.dataLayer.push({
		'event':'order_complete',
		'order_id': '{{$orderData->order_no}}',
		'order_value': {{(int) $orderData->final_amount}},
		'order_currency': 'INR',
		'enhanced_conversion_data': {
		  "email": "{{$orderData->email}}",
		  "phone_number": "{{$orderData->mobile}}",
		  "first_name": "{{$orderData->fname}}",
		  "last_name": "{{$orderData->lname}}",
		  "home_address": {
			"street": "{{$orderData->shipping_address}}",
			"city": "{{$orderData->shipping_city}}",
			"region": "{{$orderData->shipping_city}}",
			"postal_code": "{{$orderData->shipping_pin}}",
			"country": "{{$orderData->shipping_country}}"
		  }
		}
	  });
	</script>
@endsection --}}