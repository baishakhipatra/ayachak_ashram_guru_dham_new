@extends('front/layout.app')
@section('content')

<section class="banner">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-6">
                <div class="banner-content">
                    <div class="group-image">
                        <img src="./assets/images/group-flower.png" alt="">
                    </div>
                    <h2 class="banner-sub-heading">{{ $banner->sub_title }}</h2>
                    <h1 class="banner-heading">{{ $banner->title }}</h1>
                    <p>{{ $banner->description }}</p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="banner-image">
                    <div class="single-image">
                        <img src="{{asset('assets/images/sinle-flower.png')}}" alt="">
                    </div>
                    <div class="image-holder">
                        <img src="{{ asset($banner->banner_image) }}" alt="">
                    </div>
                    <div class="play-btm" data-bs-toggle="modal" data-bs-target="#videoModal">
                        <img src="{{asset('assets/images/play.svg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="circle-bottom">
        <img src="{{asset('assets/images/circle-image.svg')}}" alt="">
    </div>
    <div class="circle-top">
        <img src="{{asset('assets/images/circle-image.svg')}}" alt="">
    </div>
    <div class="overlay-bg"></div>
</section>

<section class="about-section">
    <div class="container">
        <div class="heading-group">
            <figure>
                <img src="./assets/images/divider.svg" alt="">
            </figure>
            <h3 class="section-sub-heading">Introduction</h3>
            <h2 class="section-heading">{{$page_heading}}</h2>
        </div>
        <p>{{$short_description}}</p>
        <a href="{{ route('front.about-us.index') }}" class="bton btn-fill">Read More</a>
    </div>
</section>

<section class="guru-section">
    <div class="container">
       <div class="content-holder-stack">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-12 col-lg-5 mb-4 mb-md-5 mb-lg-0">
                    <div class="section-image-holder">
                        <div class="section-image-holder image-holder-big radious-bottom-right">
                            <img src="{{asset('assets/images/babamoni.jpg')}}" alt="">
                        </div>
                        <div class="image-group">
                            <img src="{{asset('assets/images/double-flower.png')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="heading-group">
                        <figure>
                            <img src="{{asset('assets/images/divider.svg')}}" alt="">
                        </figure>
                        <h2 class="section-heading">{{$babamoni_heading}}</h2>
                        <h3 class="section-sub-heading">Popularly known as SRI SRI BABAMONI</h3>
                    </div>
                    <div class="section-content-place">
                        <p>{{$babamoni_short_description}}</p>
                    </div>
                        
                    <a href="{{route('front.babamoni.index')}}" class="bton btn-fill">Read More</a>
                </div>
            </div>
       </div>
    </div>
    <div class="section-overlay"></div>
</section>

<section class="content-image-section pb-4">
    <div class="container">
        <div class="content-holder-stack">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-12 col-lg-6 md-lg-6 order-lg-1 order-2">
                    <div class="heading-group">
                        <figure>
                            <img src="{{asset('assets/images/divider.svg')}}" alt="">
                        </figure>
                        <h2 class="section-heading">Uniqueness of Principles of Sri Sri Babamoni</h2>
                    </div>
                    <ul class="content-list">
                        <li>
                            <figure>
                                <img src="{{asset('assets/images/icon.svg')}}" alt="">
                            </figure>
                            <figcaption>
                                <h4>Abhiksha</h4>
                                <p>It is wellknown that any Ashram or of such nature always perform welfare activities in society by taking financial aid from general public or from Government.</p>
                            </figcaption>
                        </li>
                        <li>
                            <figure>
                                <img src="{{asset('assets/images/icon.svg')}}" alt="">
                            </figure>
                            <figcaption>
                                <h4>Morality Campaign</h4>
                                <p>Transformation of the present human race into a completely divine society is His ultimate object and character-building movement is the means to achieve this object.</p>
                            </figcaption>
                        </li>
                    </ul>
                    <a href="#" class="bton btn-fill">Read More</a>
                </div>
                <div class="col-md-12 col-lg-5 mb-4 mb-md-5 mb-lg-0 order-lg-2 order-1">
                    <div class="section-image-holder">
                        <div class="section-image-holder image-holder-medium radious-bottom-left">
                            <img src="{{asset('assets/images/dummy-image.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-circle-image">
        <img src="{{asset('assets/images/circle-divider.svg')}}" alt="">
    </div>
</section>

<section class="flower-divider">
    <div class="container">
        <img src="{{asset('assets/images/double-flower.png')}}" alt="">
    </div>
</section>

<section class="image-content-section ">
    <div class="container">
        <div class="content-holder-stack">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-12 col-lg-5 mb-4 mb-md-5 mb-lg-0">
                    <div class="section-image-holder">
                        <div class="section-image-holder image-holder-medium radious-top-right">
                            <img src="{{asset('assets/images/dummy-image.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="heading-group">
                        <figure>
                            <img src="{{asset('assets/images/divider.svg')}}" alt="">
                        </figure>
                        <h2 class="section-heading">Institutions Founded by Sri Sri Babamoni</h2>
                    </div>
                    <ul class="content-list">
                        <li>
                            <figure>
                                <img src="{{asset('assets/images/icon.svg')}}" alt="">
                            </figure>
                            <figcaption>
                                <h4>Ayachak Ashram</h4>
                                <p>The non-begging Saint, Sri Sri Babamoni, has appropriately named his Ashram as AYACHAK (i.e ‘A’ connotes one, who and ‘YACHAK’ connotes Yachana, bhiksha) which means ‘ONE WHO NEVER BEGS.’</p>
                            </figcaption>
                        </li>
                        <li>
                            <figure>
                                <img src="{{asset('assets/images/icon.svg')}}" alt="">
                            </figure>
                            <figcaption>
                                <h4>The Multiversity</h4>
                                <p>The Multiversity was established, by His Divine Grace Sri Srimat Swami Swarupananda Paramhansa Dev in the year 1973-1974 and registered under the West-Bengal Societies Act, 1961, vide Registration No. S\13107 of 1973-74 dated 15th June, 1975 solely for the benefit of the public in general and the students and inmates of The Multiversity.</p>
                            </figcaption>
                        </li>
                    </ul>
                    <a href="#" class="bton btn-fill">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <div class="section-circle-image">
        <img src="{{asset('assets/images/circle-divider.svg')}}" alt="">
    </div>
</section>

<section class="section-donation">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="heading-group">
                    <figure>
                        <img src="{{asset('assets/images/divider.svg')}}" alt="">
                    </figure>
                    <h2 class="section-heading">Donating to charity helps support those in need and makes a positive difference in the world.</h2>
                    <a href="#" class="bton btn-fill">Donate Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="three-grid-section">
    <div class="container">
        <div class="heading-group">
            <figure>
                <img src="{{asset('assets/images/divider.svg')}}" alt="">
            </figure>
            <h2 class="section-heading">Policy For Smooth Running Welfare Activities By <br> Following Principle of Abhiksha</h2>
        </div>

        <ul class="grid-list">
            <li>
                <div class="inner">
                    <figure>
                        <img src="{{asset('assets/images/icon2.svg')}}" alt="">
                    </figure>
                    <figcaption>
                        <h2>Ayurvedic Medicines</h2>
                        <p>
                            In initial stage, there was extreme financial crunch. Due to extreme poverty, Sri Sri Babamoni had to take only ‘Mahua leaf’ for living. 
                            But crisis could not be able to create obstacle on the path of selfless service to the mankind.
                        </p>
                    </figcaption>
                    <a href="#" class="bton btn-fill">Shop Now</a>
                </div>
            </li>
            <li>
                <div class="inner">
                    <figure>
                        <img src="{{asset('assets/images/icon3.svg')}}" alt="">
                    </figure>
                    <figcaption>
                        <h2>Books</h2>
                        <p>
                            ‘Ayachak Ashram’ earns from selling valuable books written by Sri Sri Babamoni.
                        </p>
                    </figcaption>
                    <a href="#" class="bton btn-fill">Shop Now</a>
                </div>
            </li>
            <li>
                <div class="inner">
                    <figure>
                        <img src="{{asset('assets/images/icon1.svg')}}" alt="">
                    </figure>
                    <figcaption>
                        <h2>Voluntary Donations</h2>
                        <p>
                            Ayachak Ashram never begs from anyone, still, the disciples of this order (who are called Akhandas), 
                            voluntarily contribute donations for building up Akhanda Mandir at different places and they always come forward to perform relief work...
                        </p>
                    </figcaption>
                    <a href="#" class="bton btn-fill">Donate Now</a>
                </div>
            </li>
        </ul>


    </div>
</section>

<section class="guru-section mamoni-section">
    <div class="container">
       <div class="content-holder-stack">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-12 col-lg-6 order-lg-1 order-2">
                    <div class="heading-group">
                        <figure>
                            <img src="{{asset('assets/images/divider.svg')}}" alt="">
                        </figure>
                        <h2 class="section-heading">Mahasonnyasini Sri Sri Samhita Devi</h2>
                        <h3 class="section-sub-heading">Popularly known as ‘SRI SRI MAMONI’</h3>
                    </div>
                    <div class="section-content-place">
                        <p>Mahasonnyasini Sri Sri Samhita Devi alias Mangalmoyee Bandyopadhyay was only child of Sri Hrishikesh Bandyopadhyay and Smt. Urmila Devi. Parents of Sri Sri Samhita Devi were very much devoted to Sri Sri Babamoni and they were initiated disciples of Sri Sri Babamani. Hrishikesh Bandyopadhyay was a fabulously rich person who was a diamond merchant in Lucknow. When Samhita Devi was only about one year old, her mother Urmila Devi expired. 
                            A feeling of renunciation has been stirred up in the mind of the father of Sri Sri Samhita Devi and so he decided that he would embrace Sanyas by leaving the material world. He took permission from Sri Sri Babamani and finally left for an unknown place near Haridwar and he never returned</p>
                    </div>
                        
                    <a href="#" class="bton btn-fill">Read More</a>
                </div>
                <div class="col-md-12 col-lg-5 mb-4 mb-md-5 mb-lg-0 order-lg-2 order-1">
                    <div class="section-image-holder">
                        <div class="section-image-holder image-holder-big radious-bottom-left">
                            <img src="{{asset('assets/images/mamoni.jpg')}}" alt="">
                        </div>
                        <div class="image-group">
                            <img src="{{asset('assets/images/double-flower.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>
    <div class="section-overlay"></div>
</section>

<section class="single-heading-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h2 class="section-heading">Two Strong Pillars Without Whom Probably Ayachak Ashram Would Not Come Into Reality</h2>
            </div>
        </div>
        
    </div>
</section>

<section class="image-content-section pb-4">
    <div class="container">
        <div class="content-holder-stack">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-12 col-lg-5 mb-4 mb-md-5 mb-lg-0">
                    <div class="section-image-holder">
                        <div class="section-image-holder image-holder-medium radious-bottom-right">
                            <img src="{{asset('assets/images/sadhana-devi.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="heading-group">
                        <figure>
                            <img src="{{asset('assets/images/divider.svg')}}" alt="">
                        </figure>
                        <h2 class="section-heading">Brahmacharini Sri Sri Sadhana Devi</h2>
                        <h3 class="section-sub-heading">Popularly known as Ashram Mata</h3>
                    </div>
                    <div class="section-content-place">
                        <p>Brahmacharini Sadhana Devi was one of the most affectionate, reliable, efficient, committed and trustworthy disciple and wellwisher of Sri Sri Babamoni. She was the eldest daughter of eminent physician and great devotee Respectable Nagesh Brahmachary and Kadambini Devi.</p>
                    </div>
                    <a href="#" class="bton btn-fill">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <div class="section-circle-image">
        <img src="{{asset('assets/images/circle-divider.svg')}}" alt="">
    </div>
</section>

<section class="flower-divider">
    <div class="container">
        <img src="{{asset('assets/images/double-flower.png')}}" alt="">
    </div>
</section>

<section class="content-image-section pt-4">
    <div class="container">
        <div class="content-holder-stack">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-12 col-lg-6 order-lg-1 order-2">
                    <div class="heading-group">
                        <figure>
                            <img src="{{asset('assets/images/divider.svg')}}" alt="">
                        </figure>
                        <h2 class="section-heading">Sri Sri Snehamoy Brahmachary</h2>
                        <h3 class="section-sub-heading">Popularly known as Bhaida</h3>
                    </div>
                    <div class="section-content-place">
                        <p>Like Ashram-mata Sri Sri Sadhana Devi, the name of other pillar of our Ayachak Ashram is Sri Sri Snehamoy Brahmachary who spent his life with Sri Sri Babamoni since his childhood. He has sacrificed and gifted himself to the holy feet of Sri Sri Babamoni and worked throughout life for various service of Ayachak Ashram.</p>
                    </div>
                    <a href="#" class="bton btn-fill">Read More</a>
                </div>
                <div class="col-md-12 col-lg-5 mb-4 mb-md-5 mb-lg-0 order-lg-2 order-1">
                    <div class="section-image-holder">
                        <div class="section-image-holder image-holder-medium radious-top-left">
                            <img src="{{asset('assets/images/snehamoy.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-circle-image">
        <img src="{{asset('assets/images/circle-divider.svg')}}" alt="">
    </div>
</section>

<section class="four-grid-section">
   <ul class="four-grid-list">
        <li>
            <div class="inner">
                <figure>
                    <img src="{{asset('assets/images/image1.jpg')}}" alt="">
                </figure>
                <figcaption>
                    <h3>Who is Akhanda</h3>
                    <p>Those who are spiritually connected to Sri Sri Babamoni love to call themselves as ‘Akhanda’ (the undivided).</p>
                    <a  href="#" class="text-arrow">
                        Read More
                        <img src="{{asset('assets/images/text-arrow.svg')}}" alt="">
                    </a>
                </figcaption>
            </div>
        </li>
        <li>
            <div class="inner">
                <figure>
                    <img src="{{asset('assets/images/image2.jpg')}}" alt="">
                </figure>
                <figcaption>
                    <h3>What is meant by ‘OMKAR’</h3>
                    <p>Sri Sri Babamoni,—There is no doubt that Omkar is the king of all mantras. Omkar is the combination of all mantras of the world...</p>
                    <a  href="#" class="text-arrow">
                        Read More
                        <img src="{{asset('assets/images/text-arrow.svg')}}" alt="">
                    </a>
                </figcaption>
            </div>
        </li>

        <li>
            <div class="inner">
                <figure>
                    <img src="{{asset('assets/images/image3.jpg')}}" alt="">
                </figure>
                <figcaption>
                    <h3>The Structure 0f Akhanda Sangathan</h3>
                    <p>From the above chart, the shape of Akhanda Sangathan will be clear. It works Statewise (in different State), Districtwise...</p>
                    <a  href="#" class="text-arrow">
                        Read More
                        <img src="{{asset('assets/images/text-arrow.svg')}}" alt="">
                    </a>
                </figcaption>
            </div>
        </li>
        <li>
            <div class="inner">
                <figure>
                    <img src="{{asset('assets/images/image4.jpg')}}" alt="">
                </figure>
                <figcaption>
                    <h3>Samabeta Upasana</h3>
                    <p>Samabeta Upasana i.e. congretional prayer means an assemble of disciples and devotees of Ayachak Ashram...</p>
                    <a  href="#" class="text-arrow">
                        Read More
                        <img src="{{asset('assets/images/image4.jpg')}}" alt="">
                    </a>
                </figcaption>
            </div>
        </li>
   </ul>
</section>

{{-- shop by category section --}}
<section class="cat-section">
    <div class="container">
        <div class="heading-group">
            <h2 class="section-heading">Shop by Category</h2>
        </div>
        <ul class="cat-list">
            @foreach($categories as $category)
                <li>
                    <a href="{{ route('front.shop.list', ['category' => $category->slug ?? $category->name]) }}">
                        <figure>
                            <img src="{{ $category->icon_path 
                                        ? asset($category->icon_path) 
                                        : asset('assets/images/placeholder-category.png') }}" 
                                 alt="{{ $category->name }}">
                        </figure>
                        <h4>{{ ucwords($category->name) }}</h4>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</section>


<section class="product-section">
    <div class="container">
        <div class="heading-group">
            <h2 class="section-heading">Featured Products</h2>
        </div>

        <ul class="product-list">
            @forelse($featuredProducts as $product)
                <li>
                    <div class="pro-inner">
                        <figure>
                            <a href="{{ route('front.shop.details', $product->slug) }}">
                                <img src="{{ asset($product->image ?? 'assets/images/placeholder-product.jpg') }}" alt="{{ $product->name }}">
                            </a>
                        </figure>
                        <figcaption>
                            <a href="{{ route('front.shop.details', $product->slug) }}">
                                <h3>{{ $product->name }}</h3>
                            </a>
                            <div class="price-group">
                                <span class="original-price">₹{{ number_format($product->price, 2) }}</span>
                            </div>
                            <a href="{{ route('front.shop.details', $product->slug) }}" class="bton btn-fill">Shop Now</a>
                            
                        </figcaption>
                    </div>
                </li>
            @empty
                <li>No featured products found.</li>
            @endforelse
        </ul>
        <a href="{{route('front.shop.list')}}" class="bton btn-fill">View More</a>
    </div>
    <div class="overlay-pattern"></div>
</section>

<section class="event-section">
    <div class="container">
        <div class="heading-group">
            <h2 class="section-heading">Latest Events</h2>
        </div>
        <ul class="event-list">
            @foreach($latestEvents as $event)
            <li>
                <div class="inner-grid">
                    <a href="{{route('front.event.details', $event->slug)}}">
                        <figure>
                            @if($event->eventImage->count() > 0)
                                <img src="{{ asset($event->eventImage->image_path) }}" alt="">
                            @else
                                <img src="{{ asset('assets/images/default-event.jpg') }}" alt="No Image">
                            @endif
                        </figure>
                        <figcaption>
                            <h3>{{ ucwords($event->title) }}</h3>
                            <h6>{{ ucwords($event->venue )}}</h6>
                            <div class="event-date">
                                <img src="{{ asset('assets/images/calender.svg') }}">
                                <span>{{ \Carbon\Carbon::parse($event->start_time)->format('M d, Y') }}</span>
                            </div>
                        </figcaption>
                    </a>
                </div>
            </li>
            @endforeach
        </ul>
        <a href="{{route('front.event.index')}}" class="bton btn-fill">View More</a>
    </div>
</section>
@endsection