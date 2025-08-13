@extends('front.layout.app')
@section('page-title', 'Donation')
@section('content')


<section class="inner-banner">
    <div class="container">
        <div class="inner-heading-group">
            <h2>Latest Events</h2>
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li>Events</li>
            </ul>
        </div>
    </div>
</section>

<section class="main">
    
    {{-- <div class="blog-contain">
        <div class="blog-container">
            <div class="blog-single-header">
                <div class="single-breadcrumg">
                    <span><a href="#">Home</a></span>
                    <span><a href="#">Category Name</a></span>
                    International  kolkata book fair 2023		
                </div>
                <h1 class="single-blog-title">International  kolkata book fair 2023</h1>
                <div class="meta-blocks">
                    <div class="meta-blocks-stack">
                        <span><i class="fa-solid fa-calendar-days"></i></span>
                        <div class="stack">
                            <h6>Event Date</h6>
                            31st January to 12th February , 2023
                        </div>
                    </div>
                </div>
            </div>

            <div class="single-thumb-image">
                <img src="./assets/images/image6.jpg" alt="">
            </div>

            <div class="blog-single-content-wrapper">
                <div class="site-single-post-content">
                    <p>
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
                    </p>

                    <p>
                        But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, 
                    </p>

                    <h2>1914 translation by H. Rackham</h2>

                    <p>
                        At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.
                    </p>

                    <p>
                        Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.
                    </p>

                    <h3>Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</h3>
                    <p>
                        But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, 
                    </p>
                </div>
            </div>


        </div>


    </div> --}}

    @if($event->count())
        <section class="related-events mt-5">
            <div class="container">
                <h3>Related Events</h3>
                <div class="row">
                    @foreach($event as $related)
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                @php
                                    $imagePath = optional($related->eventImage)->image_path;
                                @endphp
                                @if(!empty($imagePath) && file_exists(public_path($imagePath)))
                                    <img src="{{ asset($imagePath) }}" alt="{{ $related->title }}" class="card-img-top">
                                @else
                                    <img src="{{ asset('assets/images/no-image.png') }}" alt="Default" class="card-img-top">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ Str::limit($related->title, 40) }}</h5>
                                    <p class="card-text">
                                        {{ \Carbon\Carbon::parse($related->start_time)->format('M d, Y') }}
                                    </p>
                                    <a href="{{ route('front.event.details', $related->slug) }}" class="btn btn-sm btn-outline-primary">View</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif


    <div class="container">
        <div class="related-product-stack mb-5">
            <div class="heading-group">
                <h2 class="section-heading">Related Events</h2>

                <div class="navi-slide">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>


            <div class="relared-event-stack swiper">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="inner-grid">
                            <a href="#">
                                <figure>
                                    <img src="./assets/images/image5.jpg" alt="">
                                </figure>
                                <figcaption>
                                    <h3>How to train yourself to meditate regularly?</h3>
                                    <div class="event-date">
                                        <img src="./assets/images/calender.svg">
                                        <span>Mar 31, 2022</span>
                                    </div>
                                </figcaption>
                            </a>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="inner-grid">
                            <a href="#">
                                <figure>
                                    <img src="./assets/images/image6.jpg" alt="">
                                </figure>
                                <figcaption>
                                    <h3>The most unusual spiritual practices</h3>
                                    <div class="event-date">
                                        <img src="./assets/images/calender.svg">
                                        <span>Mar 31, 2022</span>
                                    </div>
                                </figcaption>
                            </a>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="inner-grid">
                            <a href="#">
                                <figure>
                                    <img src="./assets/images/image8.jpg" alt="">
                                </figure>
                                <figcaption>
                                    <h3>Bhakti yoga for beginners: exercises and postures</h3>
                                    <div class="event-date">
                                        <img src="./assets/images/calender.svg">
                                        <span>Mar 31, 2022</span>
                                    </div>
                                </figcaption>
                            </a>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="inner-grid">
                            <a href="#">
                                <figure>
                                    <img src="./assets/images/image5.jpg" alt="">
                                </figure>
                                <figcaption>
                                    <h3>How to train yourself to meditate regularly?</h3>
                                    <div class="event-date">
                                        <img src="./assets/images/calender.svg">
                                        <span>Mar 31, 2022</span>
                                    </div>
                                </figcaption>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
</section>
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