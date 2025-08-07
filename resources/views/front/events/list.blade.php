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


<section class="event-stack">
    <div class="container">
        <div class="search-events">
            <div class="search-stack">
                <form action="">
                    <div class="form-group">
                        <input type="search" id="" name="" placeholder=" " class="search-input form-control input-style">
                        <label class="placeholder-text">Search Events</label>
                        <span class="search-icon">
                            <img src="./assets/images/search.svg" alt="">
                        </span>
                    </div>

                </form>
            </div>
        </div>
        <div class="event-stack-listing">
            <ul class="event-list">
                <li>
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
                </li>

                <li>
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
                </li>

                <li>
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
                </li>

                <li>
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
                </li>

                <li>
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
                </li>

                <li>
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
                </li>
            </ul>
            
            <div class="pagination-stack">
                <ul class="pagination">
                    <li><a href=""><i class="fa-solid fa-arrow-left"></i></a></li>
                    <li><a href="">1</a></li>
                    <li><a href="">2</a></li>
                    <li><a href="">3</a></li>
                    <li><a href=""><i class="fa-solid fa-arrow-right"></i></a></li>
                </ul>
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