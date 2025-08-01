@extends('front.layout.app')
@section('page-title', 'Change-Password')
@section('content')

<section class="main">
    <div class="container">
        <div class="cart-wrap">
            <h2 class="section-heading">Shopping Cart</h2>
            <ul class="breadcrumb breadcrumb-white mt-4">
                <li><a href="#">Home</a></li>
                <li>Cart</li>
            </ul>
        </div>
        <div class="cart-form-wrap">
            <div class="row justify-content-between">
                <div class="col-lg-8 mb-4 mb-md-5 mb-lg-0">
                    <div class="cart-item-wrap">
                        <ul class="cart-item-list">
                            <li>
                                <div class="inner-wrap">
                                    <figure>
                                        <img src="./assets/images/placeholder-product.jpg" alt="">
                                    </figure>
                                    <figcaption>
                                        <div class="product-details-cart">
                                            <a href="#"><h3>Chyawanprash</h3></a>
                                            <div class="pro-meta">
                                                <span>Categry:</span> Medicines
                                            </div>
                                            <div class="pro-meta">
                                                <span>Weight:</span> 500Gms
                                            </div>
                                            <div class="number-input">
                                                <button class="decrement">-</button>
                                                <input type="number" class="quantity" id="quantity" min="1" max="10" value="1" step="1">
                                                <button class="increment">+</button>
                                            </div>
                                            <a href="#" class="remove">
                                                <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.4114 21.5625H6.5885C5.97985 21.5624 5.39404 21.3307 4.95004 20.9144C4.50604 20.4981 4.23713 19.9283 4.19794 19.321L3.38575 6.73804C3.38172 6.67524 3.3901 6.61226 3.41041 6.5527C3.43072 6.49314 3.46256 6.43816 3.50412 6.39091C3.54568 6.34365 3.59614 6.30505 3.65262 6.2773C3.7091 6.24955 3.77049 6.23319 3.83329 6.22917H3.83377C3.96044 6.22116 4.08512 6.26373 4.18043 6.34755C4.27575 6.43136 4.33392 6.54957 4.34217 6.67623L5.15387 19.2591C5.17737 19.6236 5.33874 19.9655 5.60521 20.2154C5.87167 20.4652 6.22324 20.6042 6.5885 20.6042H16.4114C16.7767 20.6042 17.1282 20.4652 17.3947 20.2154C17.6612 19.9655 17.8225 19.6236 17.846 19.2591L18.6582 6.66425C18.6621 6.60304 18.6781 6.54321 18.7051 6.48816C18.7321 6.43311 18.7698 6.38394 18.8158 6.34344C18.8619 6.30295 18.9155 6.27192 18.9735 6.25215C19.0316 6.23238 19.093 6.22424 19.1542 6.22821C19.2186 6.23229 19.282 6.24904 19.3399 6.27748C19.3978 6.30593 19.4496 6.34553 19.4922 6.394C19.5348 6.44246 19.5674 6.49886 19.5881 6.55995C19.6089 6.62104 19.6174 6.68563 19.6132 6.75002L18.802 19.321C18.7628 19.9283 18.4939 20.4981 18.0499 20.9144C17.6059 21.3307 17.0201 21.5624 16.4114 21.5625ZM12.9375 1.4375C13.3187 1.4375 13.6843 1.58895 13.9539 1.85853C14.2235 2.12812 14.375 2.49375 14.375 2.875V3.83333C14.375 3.96042 14.3245 4.08229 14.2346 4.17216C14.1448 4.26202 14.0229 4.3125 13.8958 4.3125H9.10412C8.97704 4.3125 8.85516 4.26202 8.7653 4.17216C8.67544 4.08229 8.62496 3.96042 8.62496 3.83333V2.875C8.62496 2.49375 8.77641 2.12812 9.04599 1.85853C9.31558 1.58895 9.68121 1.4375 10.0625 1.4375H12.9375ZM13.4166 3.35417V2.875C13.4165 2.74796 13.366 2.62615 13.2761 2.53632C13.1863 2.44648 13.0645 2.39596 12.9375 2.39583H10.0625C9.93541 2.39596 9.81361 2.44648 9.72378 2.53632C9.63394 2.62615 9.58342 2.74796 9.58329 2.875V3.35417H13.4166Z" fill="#D0217C"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.184 3.35417C20.3728 3.35411 20.5597 3.39124 20.7342 3.46346C20.9087 3.53567 21.0672 3.64155 21.2007 3.77504C21.3343 3.90853 21.4402 4.06702 21.5125 4.24145C21.5847 4.41589 21.6219 4.60286 21.6219 4.79167V5.27084C21.6219 5.45965 21.5847 5.64662 21.5125 5.82106C21.4402 5.99549 21.3343 6.15398 21.2007 6.28747C21.0672 6.42096 20.9087 6.52684 20.7342 6.59905C20.5597 6.67127 20.3728 6.7084 20.184 6.70834H9.15929C9.03221 6.70834 8.91033 6.65785 8.82047 6.56799C8.7306 6.47813 8.68012 6.35625 8.68012 6.22917C8.68012 6.10209 8.7306 5.98021 8.82047 5.89035C8.91033 5.80049 9.03221 5.75 9.15929 5.75H20.184C20.311 5.75 20.4329 5.69952 20.5228 5.60966C20.6126 5.5198 20.6631 5.39792 20.6631 5.27084V4.79167C20.6631 4.66459 20.6126 4.54271 20.5228 4.45285C20.4329 4.36299 20.311 4.31251 20.184 4.31251H2.9282C2.80112 4.31251 2.67924 4.36299 2.58938 4.45285C2.49952 4.54271 2.44904 4.66459 2.44904 4.79167V5.27084C2.44929 5.39784 2.49986 5.51957 2.58966 5.60938C2.67947 5.69919 2.8012 5.74975 2.9282 5.75H7.24214C7.36922 5.75 7.4911 5.80049 7.58096 5.89035C7.67083 5.98021 7.72131 6.10209 7.72131 6.22917C7.72131 6.35625 7.67083 6.47813 7.58096 6.56799C7.4911 6.65785 7.36922 6.70834 7.24214 6.70834H2.92773C2.73891 6.7084 2.55193 6.67127 2.37747 6.59905C2.20301 6.52684 2.04448 6.42096 1.91095 6.28747C1.77741 6.15398 1.67149 5.99549 1.59922 5.82106C1.52694 5.64662 1.48975 5.45965 1.48975 5.27084V4.79167C1.48975 4.41042 1.6412 4.04479 1.91078 3.77521C2.18036 3.50562 2.546 3.35417 2.92725 3.35417H20.184ZM11.0209 11.5V16.2917C11.0209 16.4188 11.0713 16.5406 11.1612 16.6305C11.2511 16.7204 11.3729 16.7708 11.5 16.7708C11.6271 16.7708 11.749 16.7204 11.8388 16.6305C11.9287 16.5406 11.9792 16.4188 11.9792 16.2917V11.5C11.9792 11.3729 11.9287 11.251 11.8388 11.1612C11.749 11.0713 11.6271 11.0208 11.5 11.0208C11.3729 11.0208 11.2511 11.0713 11.1612 11.1612C11.0713 11.251 11.0209 11.3729 11.0209 11.5ZM6.81568 11.6366L7.48173 16.3803C7.50209 16.5037 7.56991 16.6143 7.6707 16.6884C7.77149 16.7625 7.89725 16.7942 8.02112 16.7768C8.14499 16.7594 8.25715 16.6943 8.33364 16.5953C8.41013 16.4963 8.44488 16.3714 8.43047 16.2471L7.76443 11.5034C7.74407 11.3799 7.67624 11.2694 7.57546 11.1953C7.47467 11.1212 7.34891 11.0895 7.22504 11.1069C7.10117 11.1243 6.98901 11.1894 6.91252 11.2884C6.83603 11.3874 6.80128 11.5123 6.81568 11.6366ZM15.1709 11.4286L14.5049 16.1724C14.4905 16.2966 14.5252 16.4216 14.6017 16.5205C14.6782 16.6195 14.7904 16.6847 14.9142 16.7021C15.0381 16.7194 15.1639 16.6877 15.2646 16.6136C15.3654 16.5395 15.4333 16.429 15.4536 16.3056L16.1197 11.5618C16.1341 11.4376 16.0993 11.3126 16.0228 11.2136C15.9463 11.1147 15.8342 11.0495 15.7103 11.0321C15.5864 11.0147 15.4607 11.0465 15.3599 11.1205C15.2591 11.1946 15.1913 11.3052 15.1709 11.4286Z" fill="#D0217C"/>
                                                </svg>

                                                Remove
                                            </a>
                                        </div>
                                        <span class="cart-price">₹224.00</span>
                                    </figcaption>
                                </div>
                            </li>

                            <li>
                                <div class="inner-wrap">
                                    <figure>
                                        <img src="./assets/images/placeholder-product.jpg" alt="">
                                    </figure>
                                    <figcaption>
                                        <div class="product-details-cart">
                                            <a href="#"><h3>Amritarista</h3></a>
                                            <div class="pro-meta">
                                                <span>Categry:</span> Medicines
                                            </div>
                                            <div class="pro-meta">
                                                <span>Weight:</span> 500Gms
                                            </div>
                                            <div class="number-input">
                                                <button class="decrement">-</button>
                                                <input type="number" class="quantity" id="quantity" min="1" max="10" value="1" step="1">
                                                <button class="increment">+</button>
                                            </div>
                                            <a href="#" class="remove">
                                                <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.4114 21.5625H6.5885C5.97985 21.5624 5.39404 21.3307 4.95004 20.9144C4.50604 20.4981 4.23713 19.9283 4.19794 19.321L3.38575 6.73804C3.38172 6.67524 3.3901 6.61226 3.41041 6.5527C3.43072 6.49314 3.46256 6.43816 3.50412 6.39091C3.54568 6.34365 3.59614 6.30505 3.65262 6.2773C3.7091 6.24955 3.77049 6.23319 3.83329 6.22917H3.83377C3.96044 6.22116 4.08512 6.26373 4.18043 6.34755C4.27575 6.43136 4.33392 6.54957 4.34217 6.67623L5.15387 19.2591C5.17737 19.6236 5.33874 19.9655 5.60521 20.2154C5.87167 20.4652 6.22324 20.6042 6.5885 20.6042H16.4114C16.7767 20.6042 17.1282 20.4652 17.3947 20.2154C17.6612 19.9655 17.8225 19.6236 17.846 19.2591L18.6582 6.66425C18.6621 6.60304 18.6781 6.54321 18.7051 6.48816C18.7321 6.43311 18.7698 6.38394 18.8158 6.34344C18.8619 6.30295 18.9155 6.27192 18.9735 6.25215C19.0316 6.23238 19.093 6.22424 19.1542 6.22821C19.2186 6.23229 19.282 6.24904 19.3399 6.27748C19.3978 6.30593 19.4496 6.34553 19.4922 6.394C19.5348 6.44246 19.5674 6.49886 19.5881 6.55995C19.6089 6.62104 19.6174 6.68563 19.6132 6.75002L18.802 19.321C18.7628 19.9283 18.4939 20.4981 18.0499 20.9144C17.6059 21.3307 17.0201 21.5624 16.4114 21.5625ZM12.9375 1.4375C13.3187 1.4375 13.6843 1.58895 13.9539 1.85853C14.2235 2.12812 14.375 2.49375 14.375 2.875V3.83333C14.375 3.96042 14.3245 4.08229 14.2346 4.17216C14.1448 4.26202 14.0229 4.3125 13.8958 4.3125H9.10412C8.97704 4.3125 8.85516 4.26202 8.7653 4.17216C8.67544 4.08229 8.62496 3.96042 8.62496 3.83333V2.875C8.62496 2.49375 8.77641 2.12812 9.04599 1.85853C9.31558 1.58895 9.68121 1.4375 10.0625 1.4375H12.9375ZM13.4166 3.35417V2.875C13.4165 2.74796 13.366 2.62615 13.2761 2.53632C13.1863 2.44648 13.0645 2.39596 12.9375 2.39583H10.0625C9.93541 2.39596 9.81361 2.44648 9.72378 2.53632C9.63394 2.62615 9.58342 2.74796 9.58329 2.875V3.35417H13.4166Z" fill="#D0217C"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.184 3.35417C20.3728 3.35411 20.5597 3.39124 20.7342 3.46346C20.9087 3.53567 21.0672 3.64155 21.2007 3.77504C21.3343 3.90853 21.4402 4.06702 21.5125 4.24145C21.5847 4.41589 21.6219 4.60286 21.6219 4.79167V5.27084C21.6219 5.45965 21.5847 5.64662 21.5125 5.82106C21.4402 5.99549 21.3343 6.15398 21.2007 6.28747C21.0672 6.42096 20.9087 6.52684 20.7342 6.59905C20.5597 6.67127 20.3728 6.7084 20.184 6.70834H9.15929C9.03221 6.70834 8.91033 6.65785 8.82047 6.56799C8.7306 6.47813 8.68012 6.35625 8.68012 6.22917C8.68012 6.10209 8.7306 5.98021 8.82047 5.89035C8.91033 5.80049 9.03221 5.75 9.15929 5.75H20.184C20.311 5.75 20.4329 5.69952 20.5228 5.60966C20.6126 5.5198 20.6631 5.39792 20.6631 5.27084V4.79167C20.6631 4.66459 20.6126 4.54271 20.5228 4.45285C20.4329 4.36299 20.311 4.31251 20.184 4.31251H2.9282C2.80112 4.31251 2.67924 4.36299 2.58938 4.45285C2.49952 4.54271 2.44904 4.66459 2.44904 4.79167V5.27084C2.44929 5.39784 2.49986 5.51957 2.58966 5.60938C2.67947 5.69919 2.8012 5.74975 2.9282 5.75H7.24214C7.36922 5.75 7.4911 5.80049 7.58096 5.89035C7.67083 5.98021 7.72131 6.10209 7.72131 6.22917C7.72131 6.35625 7.67083 6.47813 7.58096 6.56799C7.4911 6.65785 7.36922 6.70834 7.24214 6.70834H2.92773C2.73891 6.7084 2.55193 6.67127 2.37747 6.59905C2.20301 6.52684 2.04448 6.42096 1.91095 6.28747C1.77741 6.15398 1.67149 5.99549 1.59922 5.82106C1.52694 5.64662 1.48975 5.45965 1.48975 5.27084V4.79167C1.48975 4.41042 1.6412 4.04479 1.91078 3.77521C2.18036 3.50562 2.546 3.35417 2.92725 3.35417H20.184ZM11.0209 11.5V16.2917C11.0209 16.4188 11.0713 16.5406 11.1612 16.6305C11.2511 16.7204 11.3729 16.7708 11.5 16.7708C11.6271 16.7708 11.749 16.7204 11.8388 16.6305C11.9287 16.5406 11.9792 16.4188 11.9792 16.2917V11.5C11.9792 11.3729 11.9287 11.251 11.8388 11.1612C11.749 11.0713 11.6271 11.0208 11.5 11.0208C11.3729 11.0208 11.2511 11.0713 11.1612 11.1612C11.0713 11.251 11.0209 11.3729 11.0209 11.5ZM6.81568 11.6366L7.48173 16.3803C7.50209 16.5037 7.56991 16.6143 7.6707 16.6884C7.77149 16.7625 7.89725 16.7942 8.02112 16.7768C8.14499 16.7594 8.25715 16.6943 8.33364 16.5953C8.41013 16.4963 8.44488 16.3714 8.43047 16.2471L7.76443 11.5034C7.74407 11.3799 7.67624 11.2694 7.57546 11.1953C7.47467 11.1212 7.34891 11.0895 7.22504 11.1069C7.10117 11.1243 6.98901 11.1894 6.91252 11.2884C6.83603 11.3874 6.80128 11.5123 6.81568 11.6366ZM15.1709 11.4286L14.5049 16.1724C14.4905 16.2966 14.5252 16.4216 14.6017 16.5205C14.6782 16.6195 14.7904 16.6847 14.9142 16.7021C15.0381 16.7194 15.1639 16.6877 15.2646 16.6136C15.3654 16.5395 15.4333 16.429 15.4536 16.3056L16.1197 11.5618C16.1341 11.4376 16.0993 11.3126 16.0228 11.2136C15.9463 11.1147 15.8342 11.0495 15.7103 11.0321C15.5864 11.0147 15.4607 11.0465 15.3599 11.1205C15.2591 11.1946 15.1913 11.3052 15.1709 11.4286Z" fill="#D0217C"/>
                                                </svg>

                                                Remove
                                            </a>
                                        </div>
                                        <span class="cart-price">₹84.78</span>
                                    </figcaption>
                                </div>
                            </li>

                            <li>
                                <div class="inner-wrap">
                                    <figure>
                                        <img src="./assets/images/placeholder-product.jpg" alt="">
                                    </figure>
                                    <figcaption>
                                        <div class="product-details-cart">
                                            <a href="#"><h3>Sitopladi Churna</h3></a>
                                            <div class="pro-meta">
                                                <span>Categry:</span> Medicines
                                            </div>
                                            <div class="pro-meta">
                                                <span>Weight:</span> 50Gms
                                            </div>
                                            <div class="number-input">
                                                <button class="decrement">-</button>
                                                <input type="number" class="quantity" id="quantity" min="1" max="10" value="1" step="1">
                                                <button class="increment">+</button>
                                            </div>
                                            <a href="#" class="remove">
                                                <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.4114 21.5625H6.5885C5.97985 21.5624 5.39404 21.3307 4.95004 20.9144C4.50604 20.4981 4.23713 19.9283 4.19794 19.321L3.38575 6.73804C3.38172 6.67524 3.3901 6.61226 3.41041 6.5527C3.43072 6.49314 3.46256 6.43816 3.50412 6.39091C3.54568 6.34365 3.59614 6.30505 3.65262 6.2773C3.7091 6.24955 3.77049 6.23319 3.83329 6.22917H3.83377C3.96044 6.22116 4.08512 6.26373 4.18043 6.34755C4.27575 6.43136 4.33392 6.54957 4.34217 6.67623L5.15387 19.2591C5.17737 19.6236 5.33874 19.9655 5.60521 20.2154C5.87167 20.4652 6.22324 20.6042 6.5885 20.6042H16.4114C16.7767 20.6042 17.1282 20.4652 17.3947 20.2154C17.6612 19.9655 17.8225 19.6236 17.846 19.2591L18.6582 6.66425C18.6621 6.60304 18.6781 6.54321 18.7051 6.48816C18.7321 6.43311 18.7698 6.38394 18.8158 6.34344C18.8619 6.30295 18.9155 6.27192 18.9735 6.25215C19.0316 6.23238 19.093 6.22424 19.1542 6.22821C19.2186 6.23229 19.282 6.24904 19.3399 6.27748C19.3978 6.30593 19.4496 6.34553 19.4922 6.394C19.5348 6.44246 19.5674 6.49886 19.5881 6.55995C19.6089 6.62104 19.6174 6.68563 19.6132 6.75002L18.802 19.321C18.7628 19.9283 18.4939 20.4981 18.0499 20.9144C17.6059 21.3307 17.0201 21.5624 16.4114 21.5625ZM12.9375 1.4375C13.3187 1.4375 13.6843 1.58895 13.9539 1.85853C14.2235 2.12812 14.375 2.49375 14.375 2.875V3.83333C14.375 3.96042 14.3245 4.08229 14.2346 4.17216C14.1448 4.26202 14.0229 4.3125 13.8958 4.3125H9.10412C8.97704 4.3125 8.85516 4.26202 8.7653 4.17216C8.67544 4.08229 8.62496 3.96042 8.62496 3.83333V2.875C8.62496 2.49375 8.77641 2.12812 9.04599 1.85853C9.31558 1.58895 9.68121 1.4375 10.0625 1.4375H12.9375ZM13.4166 3.35417V2.875C13.4165 2.74796 13.366 2.62615 13.2761 2.53632C13.1863 2.44648 13.0645 2.39596 12.9375 2.39583H10.0625C9.93541 2.39596 9.81361 2.44648 9.72378 2.53632C9.63394 2.62615 9.58342 2.74796 9.58329 2.875V3.35417H13.4166Z" fill="#D0217C"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.184 3.35417C20.3728 3.35411 20.5597 3.39124 20.7342 3.46346C20.9087 3.53567 21.0672 3.64155 21.2007 3.77504C21.3343 3.90853 21.4402 4.06702 21.5125 4.24145C21.5847 4.41589 21.6219 4.60286 21.6219 4.79167V5.27084C21.6219 5.45965 21.5847 5.64662 21.5125 5.82106C21.4402 5.99549 21.3343 6.15398 21.2007 6.28747C21.0672 6.42096 20.9087 6.52684 20.7342 6.59905C20.5597 6.67127 20.3728 6.7084 20.184 6.70834H9.15929C9.03221 6.70834 8.91033 6.65785 8.82047 6.56799C8.7306 6.47813 8.68012 6.35625 8.68012 6.22917C8.68012 6.10209 8.7306 5.98021 8.82047 5.89035C8.91033 5.80049 9.03221 5.75 9.15929 5.75H20.184C20.311 5.75 20.4329 5.69952 20.5228 5.60966C20.6126 5.5198 20.6631 5.39792 20.6631 5.27084V4.79167C20.6631 4.66459 20.6126 4.54271 20.5228 4.45285C20.4329 4.36299 20.311 4.31251 20.184 4.31251H2.9282C2.80112 4.31251 2.67924 4.36299 2.58938 4.45285C2.49952 4.54271 2.44904 4.66459 2.44904 4.79167V5.27084C2.44929 5.39784 2.49986 5.51957 2.58966 5.60938C2.67947 5.69919 2.8012 5.74975 2.9282 5.75H7.24214C7.36922 5.75 7.4911 5.80049 7.58096 5.89035C7.67083 5.98021 7.72131 6.10209 7.72131 6.22917C7.72131 6.35625 7.67083 6.47813 7.58096 6.56799C7.4911 6.65785 7.36922 6.70834 7.24214 6.70834H2.92773C2.73891 6.7084 2.55193 6.67127 2.37747 6.59905C2.20301 6.52684 2.04448 6.42096 1.91095 6.28747C1.77741 6.15398 1.67149 5.99549 1.59922 5.82106C1.52694 5.64662 1.48975 5.45965 1.48975 5.27084V4.79167C1.48975 4.41042 1.6412 4.04479 1.91078 3.77521C2.18036 3.50562 2.546 3.35417 2.92725 3.35417H20.184ZM11.0209 11.5V16.2917C11.0209 16.4188 11.0713 16.5406 11.1612 16.6305C11.2511 16.7204 11.3729 16.7708 11.5 16.7708C11.6271 16.7708 11.749 16.7204 11.8388 16.6305C11.9287 16.5406 11.9792 16.4188 11.9792 16.2917V11.5C11.9792 11.3729 11.9287 11.251 11.8388 11.1612C11.749 11.0713 11.6271 11.0208 11.5 11.0208C11.3729 11.0208 11.2511 11.0713 11.1612 11.1612C11.0713 11.251 11.0209 11.3729 11.0209 11.5ZM6.81568 11.6366L7.48173 16.3803C7.50209 16.5037 7.56991 16.6143 7.6707 16.6884C7.77149 16.7625 7.89725 16.7942 8.02112 16.7768C8.14499 16.7594 8.25715 16.6943 8.33364 16.5953C8.41013 16.4963 8.44488 16.3714 8.43047 16.2471L7.76443 11.5034C7.74407 11.3799 7.67624 11.2694 7.57546 11.1953C7.47467 11.1212 7.34891 11.0895 7.22504 11.1069C7.10117 11.1243 6.98901 11.1894 6.91252 11.2884C6.83603 11.3874 6.80128 11.5123 6.81568 11.6366ZM15.1709 11.4286L14.5049 16.1724C14.4905 16.2966 14.5252 16.4216 14.6017 16.5205C14.6782 16.6195 14.7904 16.6847 14.9142 16.7021C15.0381 16.7194 15.1639 16.6877 15.2646 16.6136C15.3654 16.5395 15.4333 16.429 15.4536 16.3056L16.1197 11.5618C16.1341 11.4376 16.0993 11.3126 16.0228 11.2136C15.9463 11.1147 15.8342 11.0495 15.7103 11.0321C15.5864 11.0147 15.4607 11.0465 15.3599 11.1205C15.2591 11.1946 15.1913 11.3052 15.1709 11.4286Z" fill="#D0217C"/>
                                                </svg>

                                                Remove
                                            </a>
                                        </div>
                                        <span class="cart-price">₹112.00</span>
                                    </figcaption>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart-value-wrap">
                        <h3>Cart Total</h3>
                        <div class="coupon-area">
                            <form>
                                <label>Add a Coupon</label>
                                <input type="text" class="">
                            </form>
                        </div>
                        <div class="cart-row">
                            <span>Subtotal</span>
                            ₹308.00
                        </div>
                        <div class="cart-row">
                            <span>Shipping</span>
                            FREE
                        </div>
                        <div class="cart-total">
                            <span>Total</span>
                            ₹308.00
                        </div>

                        <input type="submit" class="bton btn-full mt-5" id="" value="Proceed to Checkout">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('script')

<script>
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


    document.addEventListener("DOMContentLoaded", () => {
        // Handle increment buttons
        document.querySelectorAll(".increment").forEach(button => {
            button.addEventListener("click", (e) => {
                e.preventDefault();
                const input = button.closest('.number-input').querySelector(".quantity");
                input.stepUp();
            });
        });

        // Handle decrement buttons
        document.querySelectorAll(".decrement").forEach(button => {
            button.addEventListener("click", (e) => {
                e.preventDefault();
                const input = button.closest('.number-input').querySelector(".quantity");
                input.stepDown();
            });
        });
    });
    
</script>

@endsection

























{{-- @extends('front.layout.app')
   @section('content')
   @php
       $total_gst_amount = 0;
   @endphp
    <section class="cart_page_table">
        <div class="container">
            <form action="{{route('front.cart.add_to_checkoout')}}" method="POST" id="checkout_form">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart_table">
                            <div class="table-responsive">
                                <table class="table  cart_table_sec">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Qty</th>
                                            <th>Size</th>
                                            <th>Color</th>
                                            <th>Price</th>
                                            <th>Voucher Coupon</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($cartProductDetails)
                                            @forelse($cartProductDetails as $key=>$item)
                                                <tr>
                                                    <td>
                                                        <div class="table_img">
                                                            <img src="{{asset($item->product_image)}}" alt="" width="30%">
                                                            <input type="hidden" name="images[]" value="{{asset($item->product_image)}}">
                                                        </div>
                                                    </td>
                                                    <td>{{$item->productDetails?$item->productDetails->name:""}}</td>
                                                    <td>{{$item->qty}}</td>
                                                    <td>{{$item->cartVariationDetails?$item->cartVariationDetails->size_name:""}}</td>
                                                    <td>{{$item->cartVariationDetails?$item->cartVariationDetails->color_name:""}}</td>
                                                    <td class="amount_b">
                                                        ₹{{$item->offer_price?$item->offer_price:$item->price}}
                                                        @php
                                                            $price = $item->offer_price?$item->offer_price:$item->price;
                                                        @endphp
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="variation[]" value="{{$item->product_variation_id}}">
                                                        <select class="coupon_code" name="coupons[]">
                                                            <option value="" data-amount="0" data-id="" selected>Select coupon</option>
                                                            @foreach($couponData as $coupon)
                                                                <option value="{{$coupon->coupon_code}}" data-amount="{{$coupon->amount}}" data-id="{{$coupon->id}}">{{$coupon->coupon_code}}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="delete-btn" data-id="{{ $item->id }}" data-toggle="tooltip" title="Delete"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M3 6H5H21" stroke="#EA0029" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path
                                                                    d="M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6"
                                                                    stroke="#EA0029" stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                                <path d="M10 11V17" stroke="#EA0029" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M14 11V17" stroke="#EA0029" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="7" class="text-center"><strong>Your cart is empty</strong></td>
                                                </tr>
                                            @endforelse
                                        @endif   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a href="{{asset('/')}}" class="orderplace">Return to Shop</a>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart_table_total">
                            <div class="cart_table_shipping">
                                <div class="cart_table_total_text">
                                    <h4>Subtotal <span>Including GST</span></h4>
                                    <h5>₹ <span id="sub_total">{{number_format($total_price_excluding, 2, '.', '')}}</span></h5>
                                    <input type="hidden" name="final_sub_total" id="final_sub_total" value="0">
                                </div>
                            </div>
                            <input type="hidden" name="final_gst_amount" id="final_gst_amount" value="0">
                            <div class="cart_table_shipping">
                                <div class="cart_table_total_text">
                                    <h4>Voucher Coupon</h4>
                                    <h5 class="apply_coupon">- ₹ <span id="coupon_amount">0.00</span></h5>
                                    <input type="hidden" name="final_coupon_amount" id="final_coupon_amount" value="0">
                                </div>
                            </div>
                            <div class="cart_table_shipping">
                                <div class="cart_table_total_text">
                                    <h4>Total</h4>
                                    <h5>₹ <span id="total_amount">{{number_format($total_price_excluding, 2, '.', '')}}</span></h5>
                                    <input type="hidden" name="final_total_amount" id="final_total_amount" value="0">
                                </div>
                            </div>
                        </div>
                        
                        @if(count($cartProductDetails)>0)
                            <div class="proceed_tocheck">
                                <button type="submit" class="proceed_tocheck_btn">Proceed to Checkout</button>
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </section>
 
    @endsection
   
   @section('script')
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

   <script>
     function CouponApply() {
            var selectedValue = $(this).val();
            var selectedAmount = $(this).find(':selected').attr('data-amount');
            selectedAmount = parseFloat(selectedAmount);
            if (!selectedValue) {
                return;
            }
            
            var alreadySelected = false;


            $('.coupon_code').not(this).each(function() {
                if ($(this).val() === selectedValue) {
                    alreadySelected = true;
                    return false; 
                }
            });

            if (alreadySelected) {
                Swal.fire({
                    title: "This coupon is already used in another product, please select a different coupon.",
                    showClass: {
                        popup: `
                        animate__animated
                        animate__fadeInUp
                        animate__faster
                        `
                    },
                    hideClass: {
                        popup: `
                        animate__animated
                        animate__fadeOutDown
                        animate__faster
                        `
                    }
                    });
                $(this).val(''); 
            } else {
                $('.coupon_code').each(function() {
                    $(this).find('option').each(function() {
                        if ($(this).val() === selectedValue) {
                        } else {
                        }
                    });
                });
            }
        }

        function updateTotalDiscount() {
            var totalDiscount = 0.00;
            var coupon_amount = 0.00;
            $('.coupon_code').each(function() {
                var selectedAmount = $(this).find(':selected').attr('data-amount');
                if (selectedAmount) {
                    totalDiscount += parseFloat(selectedAmount);
                }
            });
            $('#coupon_amount').text(totalDiscount.toFixed(2)); 
            var coupon_amount = $('#coupon_amount').text(); 
            var gst_amount = $('#gst_amount').text(); 
            var sub_total = $('#sub_total').text(); 
            var total_amount = parseFloat(sub_total);
            var total_amount = parseFloat(sub_total)-parseFloat(coupon_amount);
            var final_amount = parseFloat(total_amount);
            $('#total_amount').text(final_amount.toFixed(2)); 
            $('#final_sub_total').val(sub_total); 
            $('#final_coupon_amount').val(coupon_amount); 
            $('#final_total_amount').val(final_amount); 
        }
        $(document).ready(function() {
            $('.coupon_code').on('change', CouponApply);
            setInterval(updateTotalDiscount, 1000);
        });
       $(document).ready(function() {
           $('.delete-btn').click(function() {
               var itemId = $(this).data('id');
               Swal.fire({
                   title: 'Are you sure?',
                   text: "You won't be able to revert this!",
                   icon: 'warning',
                   showCancelButton: true,
                   confirmButtonColor: '#d33',
                   cancelButtonColor: '#3085d6',
                   confirmButtonText: 'Yes, delete it!'
               }).then((result) => {
                   if (result.isConfirmed) {
                       window.location.href = '../cart/delete/' + itemId; 
                   }
               });
           });
       });
   </script>
   @endsection --}}