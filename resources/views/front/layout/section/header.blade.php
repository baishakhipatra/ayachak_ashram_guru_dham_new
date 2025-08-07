<header>
    <div class="container">
        <div class="header-inner">
            <a href="{{route('front.home')}}" class="logo">
                <img src="{{asset('assets/images/logo.png')}}" alt="">
            </a>
            <div class="main-nav">
                <ul class="menu">
                    <li><a href="{{route('front.home')}}">Home</a></li>
                    <li><a href="{{route('front.shop.list')}}">Shop</a></li>
                    <li><a href="{{route('front.event.index')}}">Events</a></li>
                    <li><a href="">About Us</a></li>
                    <li><a href="#">Books</a></li>
                    <li><a href="#">Medicines</a></li>
                    <li><a href="#">Water</a></li>
                    <li><a href="#">Photo Frame</a></li>
                </ul>
            </div>
            <a href="{{route('front.donation.form')}}" class="bton btn-fill">Donate Now</a>
            <div class="icon-place">
                <a href="#" class="search">
                    <img src="{{asset('assets/images/search.svg')}}">
                </a>
                {{--                 
                <a href="{{ route('front.user.login') }}" class="account">
                    <img src="./assets/images/user.svg">
                </a> --}}
                <a href="
                    @if(Auth::guard('web')->check())
                        {{ route('front.profile') }}
                    @else
                        {{ route('front.login') }}
                    @endif
                    " class="account">
                    <img src="{{ asset('assets/images/user.svg') }}" alt="User">
                </a>

                {{-- <div class="dropdown">
                    <a href="#" class="account dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{asset('assets/images/user.svg')}}" alt="User">
                    </a>
                    <ul class="dropdown-menu header_user_dropdown">
                        @if(Auth::guard('web')->check())
                            <li>
                                <a class="dropdown-item" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Log out
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('front.profile') }}">My account</a>
                            </li>
                        @else
                            <li>
                                <a class="dropdown-item" href="{{ route('front.login') }}">Log in</a>
                            </li>
                        @endif
                    </ul>
                </div> --}}

                <a href="{{route('front.cart.index')}}" class="cart">
                    <img src="{{asset('assets/images/bag.svg')}}">
                    <span>{{ $cartCount }}</span>
                </a>
            </div>
            <div class="ham">
                <img src="{{asset('assets/images/menu.svg')}}">
            </div>
        </div>
    </div>
    <div class="offcanvas-menu">
        <div class="canvas-header">
            <a href="index.html" class="logo">
                <img src="{{asset('assets/images/logo.png')}}" alt="">
            </a>

            <a href="#" class="cross">
                <img src="{{asset('assets/images/cross.svg')}}">
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
<form id="logout-form" action="{{ route('front.logout') }}" method="POST" style="display: none;">
    @csrf
</form>