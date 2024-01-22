@extends('common.web.layout.base')
@section('styles')
    @parent

@stop
@section('content')
    <section id="home" class="top-section dis-center">
        <div class="background-holder background-holder--auto background-holder--left-top d-none d-lg-block d-xl-block "
            style="background-image:  url(assets/layout/images/common/go_x_bg.jpg); background-repeat: no-repeat; background-size: 100%;">
            <img src="{{ asset('assets/layout/images/common/hero-dots.png') }}" alt="hero-dots"
                class="background-image-holder " style="display:none;">
        </div>
        <div class="background-holder background-holder--auto background-holder--left-top d-sm-block d-lg-none d-xl-none"
            style="background-image: url(assets/layout/images/common/bgimg1.jpg); background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">
        </div>
        <div class="overlay d-sm-block d-lg-none d-xl-none"></div>
        <img class="shape1 d-none d-xl-block " src="{{ asset('assets/layout/images/common/round-shape1.png') }}"
            alt="">
        <img class="shape2 d-none d-xl-block " src="{{ asset('assets/layout/images/common/round-shape3.png') }}"
            alt="">
        <!-- <img class="bgimg" src="./img/wave.png" alt=""> -->
        <div class="col-12 col-xl-7 col-lg-9 pos-abs-top-right pr-0 d-sm-block d-lg-none d-xl-none">
            <!-- <div class="hero__block5 background-holder--cover background-holder--center ml-auto" style="clip-path: url(&quot;#hero__block5&quot;); width: 800px; height: 680px; background-image: url(&quot;./img/hero-5.png&quot;); background-repeat: no-repeat;">
                   <img src="./img/hero-5.png" alt="oval" class="background-image-holder " style="display: none;">
                </div> -->

            <!-- <img src="./img/xjek_app.png" alt="oval" class="background-image-holder img-fluid jump-anim"> -->

            <!-- <svg height="0" width="0">
                   <defs>
                      <clipPath id="hero__block5">
                         <path d="M0,0c0,0,18.2,428.9,283.2,549.5S655.1,598.4,800,680V0H0z"></path>
                      </clipPath>
                   </defs>
                </svg> -->
        </div>
        <div class="container">
            <div class="banner-section">
                <!-- <div class="col-12 col-lg-6 d-sm-block d-lg-none d-xl-none">
                      <div class="hero__block5-mobile background-holder--cover background-holder--center d-xl-none mx-auto mb-30" style="background-image: url(&quot;./img/landing_bg.png&quot;); background-repeat: no-repeat;">
                         <img src="./img/landing_bg.png" alt="oval" class="background-image-holder " style="display: none;">
                      </div>
                   </div> -->
                <div class="col-12 col-lg-6 d-sm-block d-lg-none d-xl-none">

                    <img src="{{ asset('assets/layout/images/common/xjek_app.png') }}" alt="oval"
                        class="background-image-holder img-fluid shape1">

                </div>
                <div class="banner-content col-12 col-lg-6 col-xl-5 z-index1 dis-column-left p-0 ">
                    <h1 class="banner-heading ">{{ Helper::getSettings()->site->site_title }} App Development</h1>
                    <p class="mt-4 col-sm-12 col-md-12 col-lg-12 p-0 ">
                        Encompass a wide variety of on-demand services from taxi rides and delivery services to
                        babysitting
                        and laundry services in a single {{ Helper::getSettings()->site->site_title }} clone app.
                    </p>
                    <!-- <a class="btn btn-secondary mt-3 bg-white txt-green" href="./login.html"> Buy Now - {{ Helper::getSettings()->site->site_title }} Clone App  <i class="fa fa-arrow-circle-right ml-2" aria-hidden="true"></i></a> -->
                </div>
            </div>
        </div>
    </section>


    <section id="features">
        <div class="container-fluid">
            <div class="heading dis-column">
                <hr>
                <h1 class="text-center"><span class="txt-green">{{ Helper::getSettings()->site->site_title }}</span> App
                    Features</h1>
                <p class="mt-4 col-lg-10 col-md-12 p-0 text-center">
                    A {{ Helper::getSettings()->site->site_title }} clone, depending on what service is required by the
                    user, has three options.
                    The workflow of these respective choices are as follows:
                </p>
            </div>
            <div class="">
                <div class="dis-grid">
                    <div class="item-feature">
                        <div class="icon">
                            <img src="{{ asset('assets/layout/images/common/svg/student.svg') }}" class="feature_box1-icon"
                                alt="PROFILE">
                            <div class="animation_round"></div>
                        </div>
                        <h4>PROFILE</h4>
                        <p>A user/service provider can update their detailed profile and also add/remove their info from
                            the application. It is ensured that information is not stored without the approval or
                            knowledge of a user.</p>
                    </div>
                    <div class="item-feature">
                        <div class="icon">
                            <img src="{{ asset('assets/layout/images/common/svg/book.svg') }}" class="feature_box1-icon"
                                alt="SAVED ADDRESS">
                            <div class="animation_round"></div>
                        </div>
                        <h4>SAVED ADDRESS</h4>
                        <p>Frequently visited addresses can be saved. This eliminates the repetitive entry of a location
                            every time a user travels. For example, a user can add and then automatically choose their
                            home address instead of typing it every time.</p>
                    </div>
                    <div class="item-feature">
                        <div class="icon">
                            <img src="{{ asset('assets/layout/images/common/svg/call.svg') }}" class="feature_box1-icon"
                                alt="SCHEDULE BOOKINGS">
                            <div class="animation_round"></div>
                        </div>
                        <h4>SCHEDULE BOOKINGS</h4>
                        <p>If one needs to commute daily at a routine time, this feature enables them to perform
                            schedule bookings.</p>
                    </div>
                    <div class="item-feature">
                        <div class="icon">
                            <img src="{{ asset('assets/layout/images/common/svg/clock.svg') }}" class="feature_box1-icon"
                                alt="BOOKING RECORDS">
                            <div class="animation_round"></div>
                        </div>
                        <h4>BOOKING RECORDS</h4>
                        <p>This feature keeps a record of the user’s trip destinations, the price of trips and other
                            information. It helps the user in case he/she needs to obtain information on their past
                            trips.</p>
                    </div>
                </div>

                <div class="dis-grid">
                    <div class="item-feature">
                        <div class="icon">
                            <img src="{{ asset('assets/layout/images/common/svg/payment-method.svg') }}"
                                class="feature_box1-icon" alt="MULTIPLE PAYMENT METHODS">
                            <div class="animation_round"></div>
                        </div>
                        <h4>MULTIPLE PAYMENT METHODS</h4>
                        <p>This feature enables the user to pay through multiple modes like cash, card or any e-commerce
                            payment applications, therefore, making it convenient for users to make payments.</p>
                    </div>
                    <div class="item-feature">
                        <div class="icon">
                            <img src="{{ asset('assets/layout/images/common/svg/gift-card.svg') }}"
                                class="feature_box1-icon" alt="RATE CARD">
                            <div class="animation_round"></div>
                        </div>
                        <h4>RATE CARD</h4>
                        <p>When the user is not sure of proper destination, the rate card gives a rate in accordance
                            with the distance travelled.</p>
                    </div>

                    <div class="item-feature">
                        <div class="icon">
                            <img src="{{ asset('assets/layout/images/common/svg/route.svg') }}" class="feature_box1-icon"
                                alt="LIVE VEHICLE TRACKING">
                            <div class="animation_round"></div>
                        </div>
                        <h4>LIVE VEHICLE TRACKING</h4>
                        <p>Real-time tracking helps the customer to be aware of the location of their delivery and also
                            for drivers and riders to locate each other.</p>
                    </div>
                    <div class="item-feature">
                        <div class="icon">
                            <img src="{{ asset('assets/layout/images/common/svg/review.svg') }}"
                                class="feature_box1-icon" alt="REVIEWING">
                            <div class="animation_round"></div>
                        </div>
                        <h4>REVIEWING</h4>
                        <p>This feature helps with maintaining quality standards on the application based on feedback
                            received from both service providers and customers.</p>
                    </div>
                </div>

                <div class="dis-grid">

                    <div class="item-feature">
                        <div class="icon">
                            <img src="{{ asset('assets/layout/images/common/svg/time.svg') }}" class="feature_box1-icon"
                                alt="ESTIMATED TRAVEL TIME">
                            <div class="animation_round"></div>
                        </div>
                        <h4>ESTIMATED TRAVEL TIME</h4>
                        <p>This feature enables one to calculate the estimated travel time from the pick-up point to the
                            destination point.</p>
                    </div>
                    <div class="item-feature">
                        <div class="icon">
                            <img src="{{ asset('assets/layout/images/common/svg/cash.svg') }}" class="feature_box1-icon"
                                alt="TRIP RATE ESTIMATOR">
                            <div class="animation_round"></div>
                        </div>
                        <h4>TRIP RATE ESTIMATOR</h4>
                        <p>Trip Fare estimator helps to calculate the approximate trip fare based on the distance to be
                            travelled.</p>
                    </div>
                    <div class="item-feature">
                        <div class="icon">
                            <img src="{{ asset('assets/layout/images/common/svg/email-notify.svg') }}"
                                class="feature_box1-icon" alt="SMS/ EMAIL NOTIFICATIONS">
                            <div class="animation_round"></div>
                        </div>
                        <h4>SMS/ EMAIL NOTIFICATIONS</h4>
                        <p>This feature enables the service provider to send notifications or alerts to their customers
                            through SMS or Emails.</p>
                    </div>
                    <div class="item-feature">
                        <div class="icon">
                            <img src="{{ asset('assets/layout/images/common/svg/notification.svg') }}"
                                class="feature_box1-icon" alt="Instant notification">
                            <div class="animation_round"></div>
                        </div>
                        <h4>INSTANT NOTIFICATION</h4>
                        <p> The app instantly alerts or notifies its users on booking status, change/cancellation,
                            payment notifications, etc.</p>
                    </div>
                </div>
                <div class="dis-grid">

                    <div class="item-feature">
                        <div class="icon">
                            <img src="{{ asset('assets/layout/images/common/svg/call.svg') }}" class="feature_box1-icon"
                                alt="Call features">
                            <div class="animation_round"></div>
                        </div>
                        <h4>CALL FEATURES</h4>
                        <p>Users of the application can communicate with the inbuilt call service provided for them.</p>
                    </div>
                    <div class="item-feature">
                        <div class="icon">
                            <img src="{{ asset('assets/layout/images/common/svg/gift-card.svg') }}"
                                class="feature_box1-icon" alt="Promo code">
                            <div class="animation_round"></div>
                        </div>
                        <h4>PROMO CODE</h4>
                        <p> This feature enables the users of the app to enjoy discounts and offers, thereby bringing in
                            more users.</p>
                    </div>
                    <div class="item-feature">
                        <div class="icon">
                            <img src="{{ asset('assets/layout/images/common/svg/301-gps.svg') }}"
                                class="feature_box1-icon" alt="Geo-Fencing">
                            <div class="animation_round"></div>
                        </div>
                        <h4>GEO-FENCING</h4>
                        <p>Geo-fencing allows the drivers/delivery person to locate the customers and vice versa. Its
                            accuracy goes a long way in increasing the efficiency of the service provided.</p>
                    </div>
                    <div class="item-feature">
                        <div class="icon">
                            <img src="{{ asset('assets/layout/images/common/svg/301-key.svg') }}"
                                class="feature_box1-icon" alt="Authentication">
                            <div class="animation_round"></div>
                        </div>
                        <h4>AUTHENTICATION</h4>
                        <p>This feature helps with maintaining quality standards on the application based on feedback
                            received from both service providers and customers.</p>
                    </div>
                </div>
                <div class="dis-grid">

                    <div class="item-feature">
                        <div class="icon">
                            <img src="{{ asset('assets/layout/images/common/svg/301-folder.svg') }}"
                                class="feature_box1-icon" alt="Availability Options">
                            <div class="animation_round"></div>
                        </div>
                        <h4> AVAILABILITY OPTIONS</h4>
                        <p>Availability toggles allow users to determine whether drivers/delivery personnel are
                            available to provide their services. </p>
                    </div>
                    <div class="item-feature">
                        <div class="icon">
                            <img src="{{ asset('assets/layout/images/common/svg/301-check.svg') }}"
                                class="feature_box1-icon" alt="Flexible Vehicle Option">
                            <div class="animation_round"></div>
                        </div>
                        <h4>FLEXIBLE VEHICLE OPTION</h4>
                        <p>An app provides its users with multiple vehicle options to choose from based on their
                            requirements.</p>
                    </div>

                    <div class="item-feature">
                        <div class="icon">
                            <img src="{{ asset('assets/layout/images/common/svg/301-analytics.svg') }}"
                                class="feature_box1-icon" alt="Analytics Tracking">
                            <div class="animation_round"></div>
                        </div>
                        <h4>ANALYTICS TRACKING</h4>
                        <p>This feature helps collect user-based data to make changes and further improve the services
                            provided.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="demo">
        <div class="overlay"></div>
        <div class="">
            <div class="row dis-center">
                <div class="heading dis-column">
                    <hr>
                    <h1 class="txt-white">Download <span
                            class="txt-white">{{ Helper::getSettings()->site->site_title }}</span> Today</h1>
                    <p class="mt-3 col-lg-12 col-md-12 p-0 text-center txt-white">
                        Get both the Android and iOS apps for free. After all, building a business doesn’t have to cost
                        you a bomb!
                    </p>
                </div>
                <div class="col-md-12 col-lg-12 col-sm-12 dis-row">

                    <div class="col-md-12 col-lg-6 col-sm-12 mt-3 dis-column">
                        <h5 class="txt-white">User iOS App & Android App</h5>
                        <div class="app-links">

                            <a class="btn btn-lg big-btn mr-2" target="_blank"
                                href="@if (isset(Helper::getSettings()->site->store_link_ios_user)) {{ Helper::getSettings()->site->store_link_ios_user }} @else # @endif">
                                <img width="22px" class="pull-left"
                                    src="{{ asset('assets/layout/images/common/apple.png') }}">
                                <div class="btn-text"><small>Download on the</small><br><strong>App Store</strong></div>
                            </a>
                            <a class="btn btn-lg  big-btn" target="_blank"
                                href="@if (isset(Helper::getSettings()->site->store_link_android_user)) {{ Helper::getSettings()->site->store_link_android_user }} @else # @endif">
                                <img width="22px" class="pull-left"
                                    src="{{ asset('assets/layout/images/common/google-play.png') }}">
                                <div class="btn-text"><small>Get it on</small><br><strong>Google Play</strong></div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-sm-12 mt-3 dis-column">

                        <h5 class="txt-white">Provider / Driver iOS App & Android App </h5>
                        <div class="app-links">

                            <a class="btn btn-lg big-btn mr-2" target="_blank"
                                href="@if (isset(Helper::getSettings()->site->store_link_ios_provider)) {{ Helper::getSettings()->site->store_link_ios_provider }} @else # @endif">
                                <img width="22px" class="pull-left"
                                    src="{{ asset('assets/layout/images/common/apple.png') }}">
                                <div class="btn-text"><small>Download on the</small><br><strong>App Store</strong></div>
                            </a>
                            <a class="btn btn-lg  big-btn" target="_blank"
                                href="@if (isset(Helper::getSettings()->site->store_link_android_provider)) {{ Helper::getSettings()->site->store_link_android_provider }} @else # @endif">
                                <img width="22px" class="pull-left"
                                    src="{{ asset('assets/layout/images/common/google-play.png') }}">
                                <div class="btn-text"><small>Get it on</small><br><strong>Google Play</strong></div>
                            </a>
                        </div>
                    </div>
                    <!-- <div class="col-md-12 col-xl-3 col-sm-12 mt-5 dis-column">

                            <h5 class="txt-white">Website & Admin Panel Demo </h5>
                            <div class="app-links">

                                <a class="btn btn-lg big-btn mr-2" href="#">
                                    <img height="22px" class="pull-left" {{ asset('assets/layout/images/common/svg/chef.svg') }}/svg/admin.svg">
                                    <strong>Live Demo</strong>
                                </a>
                                <a class="btn btn-lg  big-btn" href="#">
                                    <img height="22px" class="pull-left" {{ asset('assets/layout/images/common/svg/chef.svg') }}/svg/web.svg">
                                    <strong>Live Demo</strong>
                                </a>
                            </div>
                        </div> -->
                </div>
            </div>
        </div>
    </section>


    <section class="screenShots" id="screenShots">
        <div class="heading dis-column">
            <hr>
            <h1 class="">App <span class="">Screenshots</span></h1>
        </div>
        <div class="app-screen">
            <div class="mobile-mockup text-center">
                <img alt="" src="{{ asset('assets/layout/images/common/iphone-frame.png') }}">
            </div>
            <div class="swiper-container wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img alt="" src="{{ asset('assets/layout/images/common/homepage.png') }}"
                            class="img-responsive">
                    </div>
                    <div class="swiper-slide">
                        <img alt="" src="{{ asset('assets/layout/images/common/home_service.png') }}"
                            class="img-responsive">
                    </div>
                    <div class="swiper-slide">
                        <img alt="" src="{{ asset('assets/layout/images/common/home_show_more.png') }}"
                            class="img-responsive">
                    </div>

                    <div class="swiper-slide">
                        <img alt="" src="{{ asset('assets/layout/images/common/home_go_offline.png') }}"
                            class="img-responsive">
                    </div>
                </div>
                <div class="custom_slider_arrows">
                    <ul class="list-inline list-unstyled">
                        <li>
                            <button class="appsLand-btn appsLand-btn-gradient screenShots__style-1__btn-prev">
                                <span><i class="fa fa-angle-left"></i></span>
                            </button>
                        </li>
                        <li>
                            <button class="appsLand-btn appsLand-btn-gradient screenShots__style-1__btn-next">
                                <span><i class="fa fa-angle-right"></i></span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </section>


@stop

@section('scripts')
    @parent
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "100%";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }

        function openToggle() {
            document.getElementById("toggle-bg").style.width = "100%";
            document.getElementById("sideToggle").style.right = "-10px";
        }

        function closeToggle() {
            document.getElementById("toggle-bg").style.width = "0";
            document.getElementById("sideToggle").style.right = "-640px";
        }


        // jQuery(document).ready(function ($) {
        //    "use strict";

        // $('#rides').owlCarousel({

        //    items: 3,
        //    margin: 10,
        //    nav: true,
        //    autoplay: true,
        //    dots: true,
        //    autoplayTimeout: 5000,
        //    navText: ['<span class="icon ion-ios-arrow-left"></span>', '<span class="icon ion-ios-arrow-right"></span>'],
        //    smartSpeed: 450,
        //    responsive: {
        //       0: {
        //          items: 1
        //       },
        //       768: {
        //          items: 2
        //       },
        //       1170: {
        //          items: 4
        //       }
        //    }
        // });

        // $('#deliveries').owlCarousel({

        //    items: 3,
        //    margin: 10,
        //    nav: true,
        //    autoplay: true,
        //    dots: true,
        //    autoplayTimeout: 5000,
        //    navText: ['<span class="icon ion-ios-arrow-left"></span>', '<span class="icon ion-ios-arrow-right"></span>'],
        //    smartSpeed: 450,
        //    responsive: {
        //       0: {
        //          items: 1
        //       },
        //       375: {
        //          items: 1
        //       },
        //       768: {
        //          items: 2
        //       },
        //       1170: {
        //          items: 4
        //       }
        //    }
        // });

        // $('#other-services').owlCarousel({
        //    items: 3,
        //    margin: 10,
        //    nav: true,
        //    autoplay: true,
        //    dots: true,
        //    autoplayTimeout: 5000,
        //    navText: ['<span class="icon ion-ios-arrow-left"></span>', '<span class="icon ion-ios-arrow-right"></span>'],
        //    smartSpeed: 450,
        //    responsive: {
        //       0: {
        //          items: 1
        //       },
        //       375: {
        //          items: 1
        //       },
        //       768: {
        //          items: 2
        //       },
        //       1170: {
        //          items: 4
        //       }
        //    }
        // });
    </script>

@stop
