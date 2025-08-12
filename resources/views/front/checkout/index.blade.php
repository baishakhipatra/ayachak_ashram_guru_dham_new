<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ayachak Ashram - Checkout</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="./assets/images/favicon.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link href="./assets/css/main.css" rel="stylesheet">
  <link href="./assets/css/responsive.css" rel="stylesheet">
</head>
<body>

<header>
    <div class="container">
        <div class="header-inner">
            <a href="{{route('front.home')}}" class="logo">
                <img src="./assets/images/logo.png" alt="">
            </a>

            <div class="icon-place">
                <a href="{{route('front.cart.index')}}" class="cart">
                    <img src="./assets/images/bag.svg">
                </a>
            </div>
            <!-- <div class="ham">
                <img src="./assets/images/menu.svg">
            </div> -->
        </div>
    </div>
    <div class="offcanvas-menu">
        <div class="canvas-header">
            <a href="index.html" class="logo">
                <img src="./assets/images/logo.png" alt="">
            </a>

            <a href="#" class="cross">
                <img src="./assets/images/cross.svg">
            </a>
        </div>
        <div class="menu-holder">
            <ul class="menu">
                <li><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Books</a></li>
                <li><a href="#">Medicines</a></li>
                <li><a href="#">Water</a></li>
                <li><a href="#">Photo Frame</a></li>
            </ul>
            <a href="#" class="bton btn-fill">Donate Now</a>
        </div>
        
    </div>
</header>

<section class="main">
    <div class="container">
        <div class="checkout-wrap">
            <div class="row">
                <div class="col-lg-6 p-0 order-lg-1 order-2">
                    <div class="cart-form-stack">
                        <form id="checkoutForm" action="{{ route('front.checkout.store') }}" method="POST">
                            @csrf
                            <div class="login-checkout">
                                <h3 class="checkout-heading">Contact information</h3>
                                <p>We'll use this email to send you details and updates about your order.</p>

                                <div class="form-group"> 
                                    <input type="email" class="form-control input-style" placeholder=" " value="{{ auth()->user()->email ?? '' }}" id="email" name="email">
                                    <label class="placeholder-text">Enter Email</label>
                                </div>
                            </div>

                            <div class="billing-place">
                                <h3 class="checkout-heading mb-4">Billing information</h3>
                                <div class="form-group">
                                    <select name="billing_country" class="form-select select-style" required>
                                        <option value="India" selected>India</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group"> 
                                            <input type="text" class="form-control input-style" placeholder=" " id="" name="fname" value="{{ explode(' ', auth()->user()->name)[0] ?? '' }}">
                                            <label class="placeholder-text">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group"> 
                                            <input type="text" class="form-control input-style" placeholder=" " id="" name="lname" value="{{ explode(' ', auth()->user()->name)[1] ?? '' }}">
                                            <label class="placeholder-text">Last Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <input type="text" class="form-control input-style" placeholder=" " id="" name="billing_address">
                                    <label class="placeholder-text">Address</label>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group"> 
                                            <input type="text" class="form-control input-style" placeholder=" " id="" name="billing_city">
                                            <label class="placeholder-text">City</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group"> 
                                            <select name="billing_state" class="form-select select-style">
                                                <option>Select State</option>
                                                <option>West Bengal</option>
                                                <option>Andhra Pradesh</option>
                                                <option>Arunachal Pradesh</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group"> 
                                            <input type="text" class="form-control input-style" placeholder=" " id="" name="billing_pin">
                                            <label class="placeholder-text">Pin Code</label>
                                        </div> 
                                    </div>
                                </div>

                                <div class="form-group"> 
                                    <input type="tel" class="form-control input-style" placeholder=" " id="" name="mobile" value="{{ auth()->user()->mobile ?? '' }}">
                                    <label class="placeholder-text">Phone Number</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something">
                                    <label class="form-check-label" for="check2">Save this information for next time</label>
                                </div>

                            </div>

                            <div class="shipping-place">
                                <h3 class="checkout-heading mb-4">Shipping method</h3>

                                <div class="ship-stack">
                                    <span>Standard</span>
                                    <strong>Free</strong>
                                </div>
                            </div>

                            <div class="payment-place">
                                <h3 class="checkout-heading">Shipping method</h3>
                                <p>All transactions are secure and encrypted.</p>
                            </div>

                            <div class="billing-place">
                                <h3 class="checkout-heading mb-4">Billing address</h3>
                                <div class="billing-group-place">
                                    {{-- <div class="billing-group">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="radio1" name="billing_address" value="option1">
                                            <label class="form-check-label" for="radio1">Same as shipping address</label>
                                        </div>
                                    </div> --}}
                                    <div class="billing-group">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="radio1" name="shippingSameAsBilling" value="1" checked>
                                            <label class="form-check-label" for="radio1">Same as shipping address</label>
                                        </div>
                                    </div>
                                
                                    <div class="billing-group">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="radio2" name="shippingSameAsBilling" value="0">
                                            <label class="form-check-label" for="radio2">Use a different billing address</label>
                                        </div>
                                    </div>

                                    <div class="billing-form" style="display:none;">
                                        <div class="form-group">
                                            <select class="form-select select-style" name="alt_country">
                                            <option value="">Select Country</option>
                                            <option>India</option>
                                            <option>USA</option>
                                            <option>Canada</option>
                                            </select>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control input-style" name="alt_fname" placeholder=" ">
                                                <label class="placeholder-text">First Name</label>
                                            </div>
                                            </div>
                                            <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control input-style" name="alt_lname" placeholder=" ">
                                                <label class="placeholder-text">Last Name</label>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control input-style" name="alt_address" placeholder=" ">
                                            <label class="placeholder-text">Address</label>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control input-style" name="alt_city" placeholder=" ">
                                                <label class="placeholder-text">City</label>
                                            </div>
                                            </div>
                                            <div class="col-lg-4">
                                            <div class="form-group">
                                                <select class="form-select select-style" name="alt_state">
                                                <option value="">Select State</option>
                                                <option>West Bengal</option>
                                                <option>Andhra Pradesh</option>
                                                <option>Arunachal Pradesh</option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col-lg-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control input-style" name="alt_pin" placeholder=" ">
                                                <label class="placeholder-text">Pin Code</label>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input type="tel" class="form-control input-style" name="alt_phone" placeholder=" ">
                                            <label class="placeholder-text">Phone Number</label>
                                        </div>
                                    </div>

                                    {{-- <div class="billing-form">
                                        <div class="form-group">
                                            <select class="form-select select-style">
                                                <option>Select Country</option>
                                                <option>India</option>
                                                <option>Usa</option>
                                                <option>Canada</option>
                                            </select>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group"> 
                                                    <input type="text" class="form-control input-style" placeholder=" " id="" name="firstname">
                                                    <label class="placeholder-text">First Name</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group"> 
                                                    <input type="text" class="form-control input-style" placeholder=" " id="" name="lastname">
                                                    <label class="placeholder-text">Last Name</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group"> 
                                            <input type="text" class="form-control input-style" placeholder=" " id="" name="address">
                                            <label class="placeholder-text">Address</label>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group"> 
                                                    <input type="text" class="form-control input-style" placeholder=" " id="" name="firstname">
                                                    <label class="placeholder-text">City</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group"> 
                                                    <select class="form-select select-style">
                                                        <option>Select State</option>
                                                        <option>West Bengal</option>
                                                        <option>Andhra Pradesh</option>
                                                        <option>Arunachal Pradesh</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group"> 
                                                    <input type="text" class="form-control input-style" placeholder=" " id="" name="lastname">
                                                    <label class="placeholder-text">Pin Code</label>
                                                </div> 
                                            </div>
                                        </div>

                                        <div class="form-group"> 
                                            <input type="tel" class="form-control input-style" placeholder=" " id="" name="">
                                            <label class="placeholder-text">Phone Number</label>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            

                            <input type="submit" class="bton btn-full-pink" id="" value="Pay Now">

                            <ul class="legal-list">
                                <li>
                                    <a href="#">Privacy Statement</a>
                                </li>
                                <li>
                                    <a href="#">Terms and conditions</a>
                                </li>
                                <li>
                                    <a href="#">Refund and Cancellation Policy</a>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 p-0 order-lg-2 order-1">
                    <div class="cart-right-stack">
                        <div class="checkut-product-show">
                            <ul class="cart-item-list">
                                @foreach($cartItems as $item)
                                    <li>
                                        <div class="inner-wrap">
                                            <figure>
                                                <img src="{{ asset($item->productDetails->image ?? 'assets/images/placeholder-product.jpg') }}" alt="">
                                            </figure>
                                            <figcaption>
                                                <div class="product-details-cart">
                                                    <a href="#"><h3>{{ $item->productDetails->name }}</h3></a>
                                                    <div class="pro-meta">
                                                        <span>Category:</span> {{ $item->productDetails->category->name ?? '-' }}
                                                    </div>
                                                    <div class="pro-meta">
                                                        <span>Weight:</span> {{ $item->variation->weight ?? '-' }}
                                                    </div>
                                                    <div class="pro-meta">
                                                        <span>Quantity:</span> {{ $item->qty ?? '-' }}
                                                    </div>
                                                   @php
                                                        $itemTotal = $item->offer_price * $item->qty;
                                                        $gstPercent = $item->productDetails->gst ?? 0;
                                                        $itemTax = ($itemTotal * $gstPercent) / 100;
                                                    @endphp

                                                    <div class="pro-meta">
                                                        <span>GST:</span> {{ $gstPercent }}% (₹{{ number_format($itemTax, 2) }})
                                                    </div>
                                                </div>
                                                <span class="cart-price">₹{{ number_format($item->offer_price * $item->qty, 2) }}</span>
                                            </figcaption>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="checkut-meta">
                            <div class="cart-row">
                                <span>Subtotal</span>
                                ₹{{ number_format($subtotal, 2) }}
                            </div>
                            <div class="cart-row">
                                <span>Shipping</span>
                                FREE
                            </div>
                            <div class="cart-row">
                                <span>GST</span>
                                ₹{{ number_format($tax, 2) }}
                            </div>
                            <div class="cart-total">
                                <span>Total</span>
                                ₹{{ number_format($total, 2) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--banner modal-->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
        <div class="video-holder">
            <div class="off-modal" data-bs-dismiss="modal" aria-label="Close">
                <img src="./assets/images/cross.svg">
            </div>
            <video  controls id="modalVideo">
                <source src="./assets/images/𝐀𝐲𝐚𝐜𝐡𝐚𝐤𝐀𝐬𝐡𝐫𝐚𝐦𝐚𝐏𝐨𝐝𝐜𝐚𝐬𝐭 - 𝐏𝐚𝐫𝐭 𝟏.mp4" type="video/mp4">
            </video>
        </div>
    </div>
  </div>
</div>

<div class="overlay"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="./assets/js/main.js"></script>

  <script>
    $(document).ready(function () {

         // --- Helper: Copy shipping -> alt billing ---
        function copyShippingToAlt() {
            $('input[name="alt_fname"]').val($('input[name="fname"]').val());
            $('input[name="alt_lname"]').val($('input[name="lname"]').val());
            $('input[name="alt_address"]').val($('input[name="billing_address"]').val());
            $('input[name="alt_city"]').val($('input[name="billing_city"]').val());
            $('select[name="alt_state"]').val($('select[name="billing_state"]').val());
            $('input[name="alt_pin"]').val($('input[name="billing_pin"]').val());
            $('input[name="alt_phone"]').val($('input[name="mobile"]').val());
        }

        // --- Show/hide alt billing based on radio ---
        function setBillingOption(isSame) {
            if (isSame) {
                $('.billing-form').slideUp(150);
                $('.billing-form').find('input,select,textarea').prop('disabled', true)
                    .removeClass('is-invalid').next('.error-message').remove();
                copyShippingToAlt();
            } else {
                $('.billing-form').slideDown(150);
                $('.billing-form').find('input,select,textarea').prop('disabled', false);
            }
        }

        // Init toggle
        setBillingOption($('input[name="billing_option"]:checked').val() === 'same');

        // // Radio change listener
        // $('input[name="billing_option"]').on('change', function () {
        //     setBillingOption($(this).val() === 'same');
        // });
        $('input[name="shippingSameAsBilling"]').on('change', function() {
            if ($(this).val() === '1') {
                $('.billing-fields').hide();
            } else {
                $('.billing-fields').show();
            }
        });


        // Keep alt synced when "same" is selected
        const shippingFieldsSelector = 'input[name="fname"], input[name="lname"], input[name="billing_address"], input[name="billing_city"], select[name="billing_state"], input[name="billing_pin"], input[name="mobile"]';
        $(shippingFieldsSelector).on('input change', function () {
            if ($('input[name="billing_option"]:checked').val() === 'same') {
                copyShippingToAlt();
            }
        });

        $('#checkoutForm').on('submit', function (e) {
            e.preventDefault();

            let isValid = true;
            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            // Remove previous errors
            $('.form-control, .form-select').removeClass('is-invalid');
            $('.error-message').remove();

            // Email
            let email = $('input[name="email"]').val().trim();
            if (!email || !emailPattern.test(email)) {
                $('input[name="email"]').addClass('is-invalid')
                    .after('<span class="error-message text-danger">Please enter a valid email.</span>');
                isValid = false;
            }

            // Shipping First Name
            let fname = $('input[name="fname"]').val().trim();
            if (!fname) {
                $('input[name="fname"]').addClass('is-invalid')
                    .after('<span class="error-message text-danger">First name is required.</span>');
                isValid = false;
            }

            // Shipping Last Name
            let lname = $('input[name="lname"]').val().trim();
            if (!lname) {
                $('input[name="lname"]').addClass('is-invalid')
                    .after('<span class="error-message text-danger">Last name is required.</span>');
                isValid = false;
            }

            // Shipping Address
            let address = $('input[name="billing_address"]').val().trim();
            if (!address) {
                $('input[name="billing_address"]').addClass('is-invalid')
                    .after('<span class="error-message text-danger">Address is required.</span>');
                isValid = false;
            }

            // Shipping City
            let city = $('input[name="billing_city"]').val().trim();
            if (!city) {
                $('input[name="billing_city"]').addClass('is-invalid')
                    .after('<span class="error-message text-danger">City is required.</span>');
                isValid = false;
            }

            // Shipping State
            let state = $('select[name="billing_state"]').val();
            if (!state || state === 'Select State') {
                $('select[name="billing_state"]').addClass('is-invalid')
                    .after('<span class="error-message text-danger">Please select a state.</span>');
                isValid = false;
            }

            // Shipping Pin
            let pin = $('input[name="billing_pin"]').val().trim();
            if (!pin || !/^\d{6}$/.test(pin)) {
                $('input[name="billing_pin"]').addClass('is-invalid')
                    .after('<span class="error-message text-danger">Please enter a valid 6-digit pin code.</span>');
                isValid = false;
            }

            // Shipping Mobile
            let mobile = $('input[name="mobile"]').val().trim();
            if (!mobile || !/^\d{10}$/.test(mobile)) {
                $('input[name="mobile"]').addClass('is-invalid')
                    .after('<span class="error-message text-danger">Please enter a valid 10-digit phone number.</span>');
                isValid = false;
            }

            // --- Validate alt billing only if "different" is selected ---
            if ($('input[name="billing_option"]:checked').val() === 'different') {
                let altFirst = $('input[name="alt_fname"]').val().trim();
                let altLast = $('input[name="alt_lname"]').val().trim();
                let altAddress = $('input[name="alt_address"]').val().trim();
                let altCity = $('input[name="alt_city"]').val().trim();
                let altState = $('select[name="alt_state"]').val();
                let altPin = $('input[name="alt_pin"]').val().trim();
                let altPhone = $('input[name="alt_phone"]').val().trim();

                if (!altFirst) {
                    $('input[name="alt_fname"]').addClass('is-invalid')
                        .after('<span class="error-message text-danger">First name is required.</span>');
                    isValid = false;
                }
                if (!altLast) {
                    $('input[name="alt_lname"]').addClass('is-invalid')
                        .after('<span class="error-message text-danger">Last name is required.</span>');
                    isValid = false;
                }
                if (!altAddress) {
                    $('input[name="alt_address"]').addClass('is-invalid')
                        .after('<span class="error-message text-danger">Address is required.</span>');
                    isValid = false;
                }
                if (!altCity) {
                    $('input[name="alt_city"]').addClass('is-invalid')
                        .after('<span class="error-message text-danger">City is required.</span>');
                    isValid = false;
                }
                if (!altState || altState === 'Select State') {
                    $('select[name="alt_state"]').addClass('is-invalid')
                        .after('<span class="error-message text-danger">Please select a state.</span>');
                    isValid = false;
                }
                if (!altPin || !/^\d{6}$/.test(altPin)) {
                    $('input[name="alt_pin"]').addClass('is-invalid')
                        .after('<span class="error-message text-danger">Please enter a valid 6-digit pin code.</span>');
                    isValid = false;
                }
                if (!altPhone || !/^\d{10}$/.test(altPhone)) {
                    $('input[name="alt_phone"]').addClass('is-invalid')
                        .after('<span class="error-message text-danger">Please enter a valid 10-digit phone number.</span>');
                    isValid = false;
                }
            }

            // Final submit
            if (isValid) {
                this.submit();
            }
        });

    });


  $( function() {
        // const rangeInput = document.querySelectorAll(".range-input input"),
        // priceInput = document.querySelectorAll(".price-input input"),
        // range = document.querySelector(".slider .progress");
        // let priceGap = 1000;

        // priceInput.forEach((input) => {
        // input.addEventListener("input", (e) => {
        //     let minPrice = parseInt(priceInput[0].value),
        //     maxPrice = parseInt(priceInput[1].value);

        //     if (maxPrice - minPrice >= priceGap && maxPrice <= rangeInput[1].max) {
        //     if (e.target.className === "input-min") {
        //         rangeInput[0].value = minPrice;
        //         range.style.left = (minPrice / rangeInput[0].max) * 100 + "%";
        //     } else {
        //         rangeInput[1].value = maxPrice;
        //         range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
        //     }
        //     }
        // });
        // });

        // rangeInput.forEach((input) => {
        // input.addEventListener("input", (e) => {
        //     let minVal = parseInt(rangeInput[0].value),
        //     maxVal = parseInt(rangeInput[1].value);

        //     if (maxVal - minVal < priceGap) {
        //     if (e.target.className === "range-min") {
        //         rangeInput[0].value = maxVal - priceGap;
        //     } else {
        //         rangeInput[1].value = minVal + priceGap;
        //     }
        //     } else {
        //     priceInput[0].value = minVal;
        //     priceInput[1].value = maxVal;
        //     range.style.left = (minVal / rangeInput[0].max) * 100 + "%";
        //     range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
        //     }
        // });
        // });


    
  } );

    // quantity jquery
    // document.addEventListener("DOMContentLoaded", () => {
    //     const input = document.getElementById("quantity");
    //     document.querySelector(".increment").addEventListener("click", (e) => {
    //         e.preventDefault(); // Prevent form submission
    //         input.stepUp();
    //     });
    //     document.querySelector(".decrement").addEventListener("click", (e) => {
    //         e.preventDefault(); // Prevent form submission
    //         input.stepDown();
    //     });
    // });


  </script>

</body>
</html>