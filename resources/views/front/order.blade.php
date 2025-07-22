@extends('front.layout.app')
   @section('content')

   <section class="profile_sec">
        <div class="container">
            <div class="profile_h2">
                <h4>Account Information</h4>
            </div>
            <div class="row">
                <div class="col-sm-5 col-lg-3">
                    <!-- <div class="profile_name">
                        <h4>Lux</h4>
                        <h5>Example@gmail.com</h5>
                        <h5>1234567890</h5>
                    </div> -->
                    <div class="profile_details">
                    <ul class="account-list">
                            <li>
                                <a href="{{route('front.user.profile')}}">Profile</a>
                            </li>
                            <li>
                                    <a href="{{route('front.user.order')}}">My Orders</a>
                            </li>
                            <li>
                                    <a href="{{route('front.wishlist.index')}}">My Wishlist</a>
                            </li>
                            <li>
                                <span>Credits</span>
                                <ul class="account-item">
                                    <li><a href="{{route('front.user.coupon')}}">Coupons</a></li>
                                </ul>
                            </li>
                            <li class="">
                                <span>Account</span>
                                <ul class="account-item">
                                    <li><a href="{{route('front.user.profile')}}">Profile</a></li>
                                    <li><a href="{{route('front.wishlist.index')}}">Wishlist</a></li>
                                    <li><a href="#">Address</a></li>
                                    <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >Logout</a></li>
                                </ul>
                            </li>
                            <li>
                                <span>Legal</span>
                                <ul class="account-item">
                                    <li><a href="#">Terms &amp; Conditions</a></li>
                                    <li><a href="#">Privacy Statement</a></li>
                                    <li><a href="#">Security</a></li>
                                    <li><a href="#">Disclaimer</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-7 col-lg-9">
                    <div class="profile_info">
                        <div class="profile_info_box">
                            <h3>All Orders</h3>
                            <div class="all_order_parent">
                                <div class="all_order_child">
                                    <ul class="all_order_ul">
                                        <li class="all_order_li_name">
                                            <h5>#SR No</h5>
                                        </li>
                                        <li class="all_order_li_code">
                                            <h5>Order Number</h5>
                                        </li>
                                        <li class="all_order_li_quantity">
                                            <h5>Product Quantity</h5>
                                        </li>
                                        <li class="all_order_li_price">
                                            <h5>Price</h5>
                                        </li>
                                        <li class="all_order_li_viiew">
                                            <h5>View</h5>
                                        </li>
                                    </ul>
                                </div>
                                @if($data)
                                    @foreach($data as $item)
                                    <div class="all_order_child2">
                                        <ul class="all_order_product_ul">
                                            <li class=" all_order_li_name all_order_li_c">
                                                <span class="mobile_product">
                                                    <h5>#SR No:</h5>
                                                </span>
                                                <h5>{{$loop->index+1}}</h5>
                                            </li>
                                            <li class="all_order_li_code all_order_li_c">
                                                <span class="mobile_product">
                                                    <h5>Order Number:</h5>
                                                </span>
                                                <h5>{{$item->order_no}}</h5>
                                            </li>
                                            <li class="all_order_li_quantity all_order_li_c"><span class="mobile_product">
                                                    <h5>Product Quantity:</h5>
                                                </span><span class="order_product_quantity">{{count($item->orderProducts)}}</span>
                                            </li>
                                            <li class="all_order_li_price all_order_li_c"><span class="mobile_product">
                                                    <h5>Price:</h5>
                                                </span><span class="order_product_price">&#8377;{{$item->final_amount}}</span>
                                            </li>
                                            <li class="all_order_li_viiew all_order_li_c"><span class="mobile_product">
                                                    <h5>View:</h5>
                                                </span><a href="{{route('front.user.order.details',$item->id)}}" class="order_product_viwe"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#858585" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a></li>
                                        </ul>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
   
   @section('script')

   @endsection