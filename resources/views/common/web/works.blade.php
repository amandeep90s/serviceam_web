@extends('common.web.layout.base')
@section('styles')
    @parent
@stop
@section('content')
    <style>
        .caption h1 {
            text-align: left;
            color: #313131 !important;
            margin: 10px 0px;
            font-weight: 500;
            font-size: 18px;
            line-height: 1.5;
            letter-spacing: 0;
        }

        .caption p {
            color: #575962 !important;
            font-size: 14px;
            line-height: 25px;
        }

        .ser-head {
            text-align: center !important;
        }

        .heading.dis-column {
            padding-bottom: 20px !important;
        }

        .ser-head:hover a {
            color: #000 !important;
        }

        .ser-name img {
            border-radius: 5px !important;
        }

        #features {
            padding-top: 100px !important;
        }

        .name {
            padding: 24px 40px;
            background: #fff !important;
            min-height: 355px;
            /*border: 1px solid #e0e1e1;*/
            transition: all .2s;
        }

        .name:hover {
            transform: translateY(-2px);
            /*box-shadow: 0 10px 20px rgba(189, 189, 189, .19), 0 6px 6px rgba(189, 189, 189, .23);*/
            transition: all .2s;
        }

        .name2 {
            padding: 24px 40px;
            background: #fff !important;
            min-height: 200px;
            border: 1px solid #e0e1e1;
            transition: all .2s;
            margin: 10px 0px !important;
        }

        .name2:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(189, 189, 189, .19), 0 6px 6px rgba(189, 189, 189, .23);
            transition: all .2s;
        }

        @media only screen and (min-width: 768px) and (max-width: 1023px) {
            .name {
                padding: 24px 0px;
            }

            .caption h1 {
                font-size: 15px;
            }
        }
    </style>


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
