@extends('common.web.layout.base')
@section('styles')
    @parent

@stop


@section('content')

    <style>
        #features {
            padding: 50px 0px !important;
        }

        .caption h1 {
            text-align: left;
            color: #313131 !important;
            margin: 12px 0px;
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
            font-size: 14px !important;
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

        .name {
            padding: 24px 40px;
            background: #fff !important;
            min-height: 370px !important;
            /* border: 1px solid #e0e1e1;*/
            transition: all .2s;
        }

        .name:hover {
            transform: translateY(-2px);
            /* box-shadow: 0 10px 20px rgba(189, 189, 189, .19), 0 6px 6px rgba(189, 189, 189, .23);*/
            transition: all .2s;
        }

        .ser-name img:hover {
            filter: grayscale(100%);
            transition: 1s;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(189, 189, 189, .19), 0 6px 6px rgba(189, 189, 189, .23);
        }

        .ser-name img {
            transition: 1s;
            width: 100%;
            height: 190px;

            object-fit: cover;
            border-radius: 20px !important;
        }

        .ser-name h5 a {
            color: #222;
            font-size: 15px;
        }

        .ser-name h5 {
            margin-top: 5px;
        }

        .ser-name {
            text-align: center;
            /* color: #000; */
            padding: 10px;
        }
    </style>

    <section id="home" class="top-section dis-center">
        <div class="background-holder background-holder--auto background-holder--left-top d-none d-lg-block d-xl-block "
            style="background-image:  url(assets/layout/images/common/New-Banner.png); background-repeat: no-repeat; background-size: 100% 100%;">
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


        <img class="bgimg" src="./img/wave.png" alt="">
        <div class="col-12 col-xl-7 col-lg-9 pos-abs-top-right pr-0 d-sm-block d-lg-none d-xl-none">
            <div class="hero__block5 background-holder--cover background-holder--center ml-auto"
                style="clip-path: url(&quot;#hero__block5&quot;); width: 800px; height: 680px; background-image: url(&quot;./img/hero-5.png&quot;); background-repeat: no-repeat;">
                <img src="./img/hero-5.png" alt="oval" class="background-image-holder " style="display: none;">
            </div>

            <img src="./img/xjek_app.png" alt="oval" class="background-image-holder img-fluid jump-anim">

            <svg height="0" width="0">
                <defs>
                    <clipPath id="hero__block5">
                        <path d="M0,0c0,0,18.2,428.9,283.2,549.5S655.1,598.4,800,680V0H0z"></path>
                    </clipPath>
                </defs>
            </svg>
        </div>
        <div class="container">
            <div class="banner-section">
                <div class="col-12 col-lg-6 d-sm-block d-lg-none d-xl-none">
                    <div class="hero__block5-mobile background-holder--cover background-holder--center d-xl-none mx-auto mb-30"
                        style="background-image: url(&quot;./img/landing_bg.png&quot;); background-repeat: no-repeat;">
                        <img src="./img/landing_bg.png" alt="oval" class="background-image-holder "
                            style="display: none;">
                    </div>
                </div>
                <div class="col-12 col-lg-6 d-sm-block d-lg-none d-xl-none">

                    <img src="{{ asset('assets/layout/images/common/xjek_app.png') }}" alt="oval"
                        class="background-image-holder img-fluid shape1">

                </div>
                <div class="banner-content col-12 col-lg-6 col-xl-5 z-index1 dis-column-left p-0 ">
                    <h1 class="banner-heading ">Help On Tap App Development </h1>
                    <p class="mt-4 col-sm-12 col-md-12 col-lg-12 p-0 ">
                        Encompass a wide variety of on-demand services from Electriican and Carpenter to babysitting and
                        laundry services in a single Help On Tap app.
                    </p>
                    {{-- <a class="btn btn-secondary mt-3 bg-white txt-green" href="./login.html"> Buy Now - {{Helper::getSettings()->site->site_title}} Clone App <i class="fa fa-arrow-circle-right ml-2" aria-hidden="true"></i></a>
                <div class="app-links">

                    <a class="btn btn-lg big-btn mr-2" target="_blank" href="@if (isset(Helper::getSettings()->site->store_link_ios_user)){{ Helper::getSettings()->site->store_link_ios_user}} @else # @endif">
                        <img width="22px" class="pull-left" src="{{ asset('assets/layout/images/common/apple.png') }}">
                        <div class="btn-text"><small>Download on the</small><br><strong>App Store</strong></div>
                    </a>
                    <a class="btn btn-lg  big-btn" target="_blank" href="@if (isset(Helper::getSettings()->site->store_link_android_user)){{ Helper::getSettings()->site->store_link_android_user}} @else # @endif">
                        <img width="22px" class="pull-left" src="{{ asset('assets/layout/images/common/google-play.png') }}">
                        <div class="btn-text"><small>Get it on</small><br><strong>Google Play</strong></div>
                    </a>
                </div> --}}
                </div>
            </div>
        </div>
    </section>


    <section class="panel_pic">
        <img src="assets/layout/images/common/panel_img.png" alt="panel" style="width:100%">
    </section>

    <section class="service-provider-sec">

        <div class="container">
            <div class="row">
                <div class="offset-md-2 col-md-4 ">
                    <div class="service-provider-search">
                        <!--  <input type="search" name="services" class="search-btn services" placeholder="What service do you need" id="services"><button class="search">Find Pros</i></button> -->
                        <!--  <div class="srch">
                                                        <div class="form-group">
                                                            <select class="form-control select2" placeholder="What Service do you need?">
                                                                <option value="">Choose Popular services old</option>
                                                                <option value="1">Electrician</option>
                                                                <option value="2">Plumbing</option>
                                                            </select>
                                                        </div>
                                                    </div> -->

                    </div>
                </div>
                <div class="col-md-2">
                    <div class="ios-app"><a href=""><img src="assets/layout/images/common/ios-app.png" alt="appstore"
                                style="width:auto"></a></div>
                </div>
                <div class="col-md-2">
                    <div class="android-link">
                        <a href=""><img src="assets/layout/images/common/playstore.png" alt="playstore"
                                style="width:auto"></a>
                    </div>
                </div>
            </div>

    </section>

    <section class="compare-quate mt70">
        <!-- MultiStep Form -->
        <div class="container-fluid">
            <div class="row justify-content-center mt-0">
                <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                    <div class="card px-0 pt-4 pb-0 mt-3 mb-3">

                        <div class="row">
                            <div class="col-md-12 mx-0">
                                <form id="msform">
                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title">Popular Category
                                                <div class="form-group">
                                                    <select class="form-control select2"
                                                        placeholder="What Service do you need?" id="category">
                                                        <option value="">Choose Popular Category</option>
                                                        <option value="1">Electrician</option>
                                                        <option value="2">Plumbing</option>
                                                    </select>
                                                </div>
                                        </div>
                                        <input type="button" name="next" class="next action-button"
                                            value="Next" />
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title">Enter the location of your project</h2>
                                            <div class="form-group">
                                                <label>Your Project's ZIP code</label>
                                                <input type="text" name="pincode" placeholder="Your project Zip Code">
                                                <label>Your Project Name</label>
                                                <input type="text" name="project_name"
                                                    placeholder="Your Project Name">

                                            </div>
                                        </div><input type="button" name="previous"
                                            class="previous action-button-previous" value="Previous" /> <input
                                            type="button" name="next" class="next action-button"
                                            value="Next Step" />
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title">Popular SubCategories</h2>
                                            <div class="form-group">
                                                <select class="form-control select2"
                                                    placeholder="What Service do you need?" id="sub_category">

                                                    <option value="">Choose Popular SubCategories</option>

                                                    <option value="1">Electrician</option>
                                                    <option value="2">Plumbing</option>
                                                </select>
                                            </div>
                                        </div> <input type="button" name="previous"
                                            class="previous action-button-previous" value="Previous" /> <input
                                            type="button" name="next" class="next action-button"
                                            value="Next Step" />
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title">Popular ProjectCategories</h2>
                                            <div class="form-group">
                                                <select class="form-control select2"
                                                    placeholder="What Service do you need?" id="project_category">

                                                    <option value="">Choose Popular ProjectCategories</option>

                                                    <option value="1">Test</option>
                                                    <option value="2">Model </option>
                                                </select>
                                            </div>
                                        </div> <input type="button" name="previous"
                                            class="previous action-button-previous" value="Previous" /> <input
                                            type="button" name="next" class="next action-button"
                                            value="Next Step" />
                                    </fieldset>
                                    <!--  <fieldset>
                                                                    <div class="form-card">
                                                                        <h2 class="fs-title">What drain work do you need done ?</h2>

                                                                        <div class="form-group">
                                                                            <label class="choose">Clear a drain or blockage
                                                                                <input type="radio" name="radio">
                                                                                <span class="checkmark"></span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="choose">Clear a sewar main
                                                                                <input type="radio" name="radio">
                                                                                <span class="checkmark"></span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="choose">Drain camera work
                                                                                <input type="radio" name="radio">
                                                                                <span class="checkmark"></span>
                                                                            </label>
                                                                        </div>
                                                                    </div> <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> <input type="button" name="next" class="next action-button" value="Next Step" />
                                                                </fieldset> -->
                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title">What kind of location is this ?</h2>

                                            <div class="form-group">
                                                <label class="choose">Home / Residence
                                                    <input type="radio" name="radio">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label class="choose">Business
                                                    <input type="radio" name="radio">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                        </div> <input type="button" name="previous"
                                            class="previous action-button-previous" value="Previous" /> <input
                                            type="button" name="next" class="next action-button"
                                            value="Next Step" />
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title">Is this an emergency</h2>

                                            <div class="form-group">
                                                <label class="choose">Yes
                                                    <input type="radio" name="radio">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label class="choose">No
                                                    <input type="radio" name="radio">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                        </div> <input type="button" name="previous"
                                            class="previous action-button-previous" value="Previous" /> <input
                                            type="button" name="next" class="next action-button"
                                            value="Next Step" />
                                    </fieldset>
                                    <!--  <fieldset>
                                                                    <div class="form-card">
                                                                        <h2 class="fs-title">Select the problems you are having with your drain?</h2>

                                                                        <div class="form-group">
                                                                            <label class="choose">Will not drain
                                                                                <input type="radio" name="radio">
                                                                                <span class="checkmark"></span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="choose">Drains slowly
                                                                                <input type="radio" name="radio">
                                                                                <span class="checkmark"></span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="choose">Garage or basement drain is backed up
                                                                                <input type="radio" name="radio">
                                                                                <span class="checkmark"></span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="choose">Sewar smells in the house
                                                                                <input type="radio" name="radio">
                                                                                <span class="checkmark"></span>
                                                                            </label>
                                                                        </div>
                                                                    </div> <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> <input type="button" name="next" class="next action-button" value="Next Step" />
                                                                </fieldset>
                                                                <fieldset>
                                                                    <div class="form-card">
                                                                        <h2 class="fs-title">Choose the appropriate status for this project</h2>

                                                                        <div class="form-group">
                                                                            <select class="form-control">
                                                                                <option>Ready to hire</option>
                                                                            </select>
                                                                        </div>
                                                                    </div> <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> <input type="button" name="next" class="next action-button" value="Next Step" />
                                                                </fieldset> -->
                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title">Which Appliance Need : Link this with Main Service Section
                                            </h2>
                                            <div class="form-group">
                                                <select class="form-control select2"
                                                    placeholder="What Service do you need?" id="main_service_section">

                                                    <option value="">Choose Popular Main Service Section</option>

                                                    <option value="1">Test</option>
                                                    <option value="2"> Test Process </option>
                                                </select>
                                            </div>
                                        </div> <input type="button" name="previous"
                                            class="previous action-button-previous" value="Previous" /> <input
                                            type="button" name="next" class="next action-button"
                                            value="Next Step" />
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title">When would you like this request to be completed ?</h2>

                                            <div class="form-group">
                                                <select class="form-control select2"
                                                    placeholder="What Service do you need?" id="services">

                                                    <option value="">Choose Popular Services</option>

                                                    <option value="1">Electrician</option>
                                                    <option value="2">Plumbing</option>
                                                </select>
                                            </div>
                                        </div> <input type="button" name="previous"
                                            class="previous action-button-previous" value="Previous" /> <input
                                            type="button" name="next" class="next action-button"
                                            value="Next Step" />
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title text-center">Success !</h2> <br><br>
                                            <a class="btn btn-primary btn-block service_id">Next <i
                                                    class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                            <!--  <div class="row justify-content-center">
                                                                            <div class="col-3"> <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"> </div>
                                                                        </div> <br><br> -->
                                            <div class="row justify-content-center">
                                                <div class="col-7 text-center">
                                                    <h5>You Have Successfully Signed Up</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
    </script>

    <script>
        $(document).ready(function() {
            service_search();
            $("input[name=services]").val('');
            $('body').on('click', '.search', function() {
                service_search();
            });

            listMenus();


            //onChange subcateroy
            $(document).on('change', '#category', function() {
                //alert('category');
                var category_id = this.value;

                $.ajax({
                    url: getBaseUrl() + "/user/service_sub_category/" + category_id,
                    type: "GET",
                    beforeSend: function(request) {
                        showLoader();
                    },
                    headers: {
                        Authorization: "Bearer " + getToken("user")
                    },

                    success: function(data) {
                        $("#sub_category").empty()
                            .append('<option value="">Select</option>');
                        $.each(data.responseData, function(key, item) {
                            $("#sub_category").append('<option value="' + item.id +
                                '" data-id="' + item.service_category_id + '">' +
                                item.service_subcategory_name + '</option>');
                        });

                        hideLoader();
                    }
                });
            });

            //onChange sevices
            $(document).on('change', '#sub_category', function() {
                //alert('category');
                var category_id = this.value;
                var sub_category_id = $(this).val();


                $.ajax({
                    url: getBaseUrl() + "/user/services/" + category_id + "/" + sub_category_id,
                    type: "GET",
                    beforeSend: function(request) {
                        showLoader();
                    },
                    headers: {
                        Authorization: "Bearer " + getToken("user")
                    },

                    success: function(data) {
                        $("#services").empty()
                            .append('<option value="">Select</option>');
                        $.each(data.responseData, function(key, item) {
                            $("#services").append('<option value="' + item.id +
                                '" data-id="' + item.service_category_id + item
                                .service_sub_category_id + '">' + item
                                .service_name + '</option>');
                        });

                        hideLoader();
                    }
                });
            });

            //next button onclik
            $('.service_id').on('click', function() {
                var service = $("#service").val();
                var sub_category_id = $("#sub_category").val();
                if (sub_category_id != '' && service != "") {
                    window.location.replace("/user/service/" + service + '/service');

                } else {
                    alertMessage('Error', "Please select Sub Category and Service", "danger");
                }

            });

        });

        basicFunctions();

        function service_search() {
            var search = $("input[name=services]").val();


            var data = new FormData();
            data.append('salt_key', '{{ Helper::getSaltKey() }}');
            data.append('search', search);

            var url = "{{ Helper::getSocketUrl() }}/search";

            $.ajax({
                url: url,
                type: "post",
                data: data,
                processData: false,
                contentType: false,
                success: function(data) {
                    $(".service_list").hide();

                    var html = ``;
                    var result = data.responseData;
                    if (result == undefined) {
                        location.reload();
                    }
                    if (result.length > 0) {
                        $.each(data.responseData, function(key, item) {
                            $("#sub_category").append('<option value="' + item.id + '" data-id="' + item
                                .service_category_id + '">' + item.service_subcategory_name +
                                '</option>');
                        });
                    }
                    $('#search_list').html(html);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    if (jqXHR.responseJSON) {
                        alertMessage(textStatus, jqXHR.responseJSON.message, "danger");
                    }

                }
            });

        }



        //List Menus
        function listMenus() {
            //alert('ggggg')
            $.ajax({
                url: getBaseUrl() + "/user/menus",
                type: "get",
                headers: {
                    Authorization: "Bearer " + getToken("user")
                },
                beforeSend: function() {
                    showLoader();
                },
                success: (response, textStatus, jqXHR) => {


                    var result = response.responseData.services;



                    if (result.length > 0) {
                        $("#category").empty();
                        for (var i in result) {

                            $('#category').append('<option value="' + result[i].menu_type_id + '">' + result[i]
                                .title + '</option>');
                        }
                        hideLoader();

                    }

                },
                error: (jqXHR, textStatus, errorThrown) => {}
            });

        }
    </script>


@stop
