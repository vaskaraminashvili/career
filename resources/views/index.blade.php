<x-layouts.master>
    <!-- Banner area start -->
    <section class="banner-3 section-space overflow-hidden">
        <div class="swiper banner-3__slider mt-65 mt-xs-50">
            <div class="swiper-wrapper">
                @forelse ($sliders as $slide)
                    <div class="swiper-slide">
                        <div class="banner-3__item position-relative overflow-hidden">
                            <div class="panel wow"></div>
                            <div class="banner-3__item-media">
                                <img class="banner3__img img-fluid" src="{{$slide->img}}" alt="icon not found">
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="swiper-slide">
                        <div class="banner-3__item position-relative overflow-hidden">
                            <div class="panel wow"></div>
                            <div class="banner-3__item-media">
                                <img class="img-fluid" src="assets/imgs/banner-3/banner-1.png" alt="icon not found">
                            </div>
                        </div>
                    </div>
                @endforelse


            </div>
            <div class="banner-3__pagination"></div>
        </div>
    </section>
    <!-- Banner area end -->

    <!-- service area start -->
    <section class="service service__space">
        <div class="container">
            <div class="row mb-minus-30">
                @foreach($latestVacancies as $vacancy)
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="service__item mb-30">
                            <div class="service__item-icon mb-20 mb-xs-15 text-center">
                                <img class="img-fluid" src="{{$vacancy->company->img}}"
                                     alt="icon not found">
                            </div>

                            <h4 class="mb-25 mb-xs-20"><a href="service-details.html">{{$vacancy->title}}</a></h4>

                            <p class="mb-40 mb-xs-30">{{$vacancy->company->title}}</p>

                            <a class="rr-a-btn" href="service-details.html">{{__('მეტის გაგება')}}<i
                                    class="fa-solid fa-circle-plus"></i></a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- service area end -->

    <!-- about-us area start -->
    <section class="about-us section-space overflow-hidden lastNews">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-4">
                    <div class="section__title-wrapper about-us__content">
                        <h3 class="section__title mb-30 mb-xs-20 title-animation">{{$lastNews->title}}</h3>
                        <button class="btn btn-info btn-lg">{{__('სრულად ნახვა')}}</button>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div
                        class="about-us__media d-flex flex-column flex-sm-row align-items-sm-start align-items-center justify-content-xl-end justify-content-center lastNews__box">
                        <img class="img-fluid lastNews__img " src="{{$lastNews->img}}"
                             alt="icon not found">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-us area end -->

    <!-- treatment-process area start -->
    <section class="treatment-process section-space__bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {{--                    <div class="section__title-wrapper treatment-process__content text-center mb-60 mb-xs-40">--}}
                    {{--                        <h2 class="section__title mb-20 mb-xs-15 title-animation">Our Treatment Process</h2>--}}
                    {{--                        <p class="mb-0">Medical science encompasses a vast array of fields dedicated to understanding--}}
                    {{--                            and treating ailments, promoting health, and enhanci quality of life. Here's a brief--}}
                    {{--                            exploration into this multifaceted</p>--}}
                    {{--                    </div>--}}

                    <div class="treatment-process__media mb-30">
                        <img class="img-fluid" data-parallax='{"scale": 1.2, "smoothness": 15}'
                             src="assets/imgs/treatment-process/treatment-process.jpg" alt="image not found">

                        <a href="https://www.youtube.com/watch?v=dyNpojnbNT4" class="popup-video zooming"
                           data-effect="mfp-move-from-top vertical-middle">
                            <i class="fa-thin fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>


        </div>
    </section>
    <!-- treatment-process area end -->


    <!-- testimonial area start -->
    {{--    <section class="testimonial section-space__bottom">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row align-items-center">--}}
    {{--                <div class="col-xl-6">--}}
    {{--                    <div class="testimonial__media">--}}
    {{--                        <img class="img-fluid" src="assets/imgs/testimonial/testimonial.png" alt="image not found">--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="col-xl-6">--}}
    {{--                    <div class="swiper testimonial__slider mt-lg-40 mt-md-40 mt-sm-40 mt-xs-40">--}}
    {{--                        <div class="swiper-wrapper">--}}
    {{--                            <div class="swiper-slide">--}}
    {{--                                <div class="testimonial__item">--}}
    {{--                                    <div class="testimonial__item-icon mb-20 mb-xs-15">--}}
    {{--                                        <img class="img-fluid" src="assets/imgs/testimonial/qoute.png"--}}
    {{--                                             alt="icon not found">--}}
    {{--                                    </div>--}}

    {{--                                    <div class="testimonial__item-content mb-35 mb-xs-30">--}}
    {{--                                        <p class="mb-0">Leverage agile frameworks to provide a robust synopsis for--}}
    {{--                                            strategy foster Leverage agile frame works to provide a robust synopsis for--}}
    {{--                                            strateg foster collaborative thinking to further</p>--}}
    {{--                                    </div>--}}

    {{--                                    <div class="testimonial__item-author d-flex align-items-center">--}}
    {{--                                        <div class="testimonial__item-thumb">--}}
    {{--                                            <img class="img-fluid" src="assets/imgs/testimonial/thumb.png"--}}
    {{--                                                 alt="icon not found">--}}
    {{--                                        </div>--}}
    {{--                                        <div class="testimonial__item-text">--}}
    {{--                                            <h4>Eleanor Pena</h4>--}}
    {{--                                            <p class="mb-0">Fuel Company</p>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="swiper-slide">--}}
    {{--                                <div class="testimonial__item">--}}
    {{--                                    <div class="testimonial__item-icon mb-20 mb-xs-15">--}}
    {{--                                        <img class="img-fluid" src="assets/imgs/testimonial/qoute.png"--}}
    {{--                                             alt="icon not found">--}}
    {{--                                    </div>--}}

    {{--                                    <div class="testimonial__item-content mb-35 mb-xs-30">--}}
    {{--                                        <p class="mb-0">Leverage agile frameworks to provide a robust synopsis for--}}
    {{--                                            strategy foster Leverage agile frame works to provide a robust synopsis for--}}
    {{--                                            strateg foster collaborative thinking to further</p>--}}
    {{--                                    </div>--}}

    {{--                                    <div class="testimonial__item-author d-flex align-items-center">--}}
    {{--                                        <div class="testimonial__item-thumb">--}}
    {{--                                            <img class="img-fluid" src="assets/imgs/testimonial/thumb.png"--}}
    {{--                                                 alt="icon not found">--}}
    {{--                                        </div>--}}
    {{--                                        <div class="testimonial__item-text">--}}
    {{--                                            <h4>Eleanor Pena</h4>--}}
    {{--                                            <p class="mb-0">Fuel Company</p>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="testimonial__slider__arrow d-flex">--}}
    {{--                            <div class="testimonial__slider__arrow-prev">--}}
    {{--                                <svg width="51" height="16" viewBox="0 0 51 16" fill="none"--}}
    {{--                                     xmlns="http://www.w3.org/2000/svg">--}}
    {{--                                    <path--}}
    {{--                                        d="M0.292893 7.29289C-0.0976311 7.68342 -0.0976311 8.31658 0.292893 8.70711L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41421 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928932C7.68054 0.538408 7.04738 0.538408 6.65685 0.928932L0.292893 7.29289ZM1 9H51V7H1V9Z"--}}
    {{--                                        fill="#071C3C"/>--}}
    {{--                                </svg>--}}
    {{--                            </div>--}}

    {{--                            <div class="testimonial__slider__arrow-next">--}}
    {{--                                <svg width="51" height="16" viewBox="0 0 51 16" fill="none"--}}
    {{--                                     xmlns="http://www.w3.org/2000/svg">--}}
    {{--                                    <path--}}
    {{--                                        d="M50.7071 7.29289C51.0976 7.68342 51.0976 8.31658 50.7071 8.70711L44.3431 15.0711C43.9526 15.4616 43.3195 15.4616 42.9289 15.0711C42.5384 14.6805 42.5384 14.0474 42.9289 13.6569L48.5858 8L42.9289 2.34315C42.5384 1.95262 42.5384 1.31946 42.9289 0.928932C43.3195 0.538408 43.9526 0.538408 44.3431 0.928932L50.7071 7.29289ZM50 9H2.98023e-08V7H50V9Z"--}}
    {{--                                        fill="#071C3C"/>--}}
    {{--                                </svg>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    <!-- testimonial area end -->

    <!-- ask-question area start -->
    <section class="ask-question section-space__top mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="section__title-wrapper ask-question__content mb-40 mb-xs-30">
                        <h2 class="section__title mb-0 title-animation">{{$lastVacancy->title}}</h2>
                    </div>

                    <div class="rr__faq">
                        <div class="custom-box custom-box--white">
                            <h5 class="mb-3" id="">
                                {{__('აღწერა')}}
                            </h5>
                            {!! $lastVacancy->description !!}
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="text-center">
                        <img src="{{asset('assets/imgs/logo/logo.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ask-question area end -->


    <!-- companies start -->
    <section class="team section-space__bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section__title-wrapper text-center mb-60 mb-xs-40">
                        <h2 class="section__title mb-0 title-animation">{{__('კომპანიები')}}</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="swiper team__slider">
                        <div class="swiper-wrapper">
                            @foreach($latestCompanies as $company)
                                <div class="swiper-slide">
                                    <div class="team__item">
                                        <div class="team__item-media">
                                            <img class="img-fluid" src="{{$company->img}}"
                                                 alt="image not found">
                                        </div>

                                        <div class="team__item-content">
                                            <div class="team__item-content-left">
                                                <h4 class="mb-10"><a href="doctor-details.html">{{$company->title}}</a>
                                                </h4>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="team__scrollbar mt-80 mt-sm-60 mt-xs-45"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- companies end -->


    <!-- blog area start -->
    <section class="blog section-space__bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section__title-wrapper text-center mb-60 mb-xs-40">
                        <h2 class="section__title mb-0 title-animation">{{__('ბოლო საიხლეები')}}</h2>
                    </div>
                </div>
            </div>

            <div class="row mb-minus-30">
                @foreach($latestNews as $news)
                    <div class="col-xl-4 col-md-6">
                        <div class="blog__item mb-30">
                            <a href="blog-details.html"
                               class="blog__item-media d-block position-relative overflow-hidden">
                                <div class="panel wow"></div>
                                <img class="img-fluid" src="{{$news->img}}" alt="image not found">
                            </a>

                            <div class="blog__item-content">
                                <div class="blog__item-content-date mb-15 mb-xs-10"><i
                                        class="fa-solid fa-calendar-days"></i>
                                    <span>{{ \Carbon\Carbon::parse($news->created_at)->diffForHumans() }}</span>
                                </div>
                                <h4 class="mb-15 mb-xs-10">
                                    <a href="blog-details.html">
                                        {{$news->title}}
                                    </a>
                                </h4>

                                <a class="rr-a-btn" href="blog-details.html">
                                    {{__('მეტის ნახვა')}}
                                    <i class="fa-solid fa-circle-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- blog area end -->
</x-layouts.master>
