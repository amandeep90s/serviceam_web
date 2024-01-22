<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <title>
            {{ Helper::getSettings()->site->site_title }}
        </title>
        <meta charset='utf-8'>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta content='website' property='og:type'>
        <link rel="shortcut icon" type="image/png" href="{{ Helper::getFavIcon() }}" />
        @section('styles')
            <link rel='stylesheet' type='text/css' href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" />
            <link rel='stylesheet' type='text/css'
                href="{{ asset('assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}">
            <link rel='stylesheet' type='text/css' href="{{ asset('assets/layout/css/landing.css') }}" />
            <link rel='stylesheet' type='text/css' href="{{ asset('assets/layout/css/stylesheet.css') }}" />
            <link rel='stylesheet' type='text/css'
                href="{{ asset('assets/plugins/owl-carousel/css/owl.carousel.min.css') }}" />

            <link rel='stylesheet' type='text/css' href="{{ asset('assets/plugins/swiper/swiper.min.css') }}" />
        @show
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <link rel='stylesheet' type='text/css' href="{{ asset('assets/layout/css/stylesheet.css') }}" />
    </head>

    <body class='index'>
        @include('common.web.includes.header')

        @yield('content')

        @include('common.web.includes.footer')
        @section('scripts')
            <script type="text/javascript" src="{{ asset('assets/plugins/jquery-3.3.1.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('assets/plugins/popper.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
            <!-- <script type="text/javascript" src="{{ asset('assets/plugins/slick/js/slick.min.js') }}"></script> -->
            <script type="text/javascript" src="{{ asset('assets/plugins/owl-carousel/js/owl.carousel.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('assets/plugins/swiper.jquery.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('assets/plugins/screen.js') }}"></script>
            <script type="text/javascript" src="{{ asset('assets/layout/js/script.js') }}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

            <script>
                function openNav() {
                    document.getElementById("mySidenav").style.width = "50%";
                }

                function closeNav() {
                    document.getElementById("mySidenav").style.width = "0";
                }
            </script>
            <script>
                $('.select2').select2();
            </script>
            <script type="text/javascript">
                $(document).ready(function() {

                    var current_fs, next_fs, previous_fs; //fieldsets
                    var opacity;

                    $(".next").click(function() {

                        current_fs = $(this).parent();
                        next_fs = $(this).parent().next();

                        //Add Class Active
                        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                        //show the next fieldset
                        next_fs.show();
                        //hide the current fieldset with style
                        current_fs.animate({
                            opacity: 0
                        }, {
                            step: function(now) {
                                // for making fielset appear animation
                                opacity = 1 - now;

                                current_fs.css({
                                    'display': 'none',
                                    'position': 'relative'
                                });
                                next_fs.css({
                                    'opacity': opacity
                                });
                            },
                            duration: 600
                        });
                    });

                    $(".previous").click(function() {

                        current_fs = $(this).parent();
                        previous_fs = $(this).parent().prev();

                        //Remove class active
                        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                        //show the previous fieldset
                        previous_fs.show();

                        //hide the current fieldset with style
                        current_fs.animate({
                            opacity: 0
                        }, {
                            step: function(now) {
                                // for making fielset appear animation
                                opacity = 1 - now;

                                current_fs.css({
                                    'display': 'none',
                                    'position': 'relative'
                                });
                                previous_fs.css({
                                    'opacity': opacity
                                });
                            },
                            duration: 600
                        });
                    });

                    $('.radio-group .radio').click(function() {
                        $(this).parent().find('.radio').removeClass('selected');
                        $(this).addClass('selected');
                    });

                    $(".submit").click(function() {
                        return false;
                    })

                });
            </script>
            @if (Helper::getChatmode() == 1)
                <!-- Start of LiveChat (www.livechatinc.com) code -->
                <script type="text/javascript">
                    window.__lc = window.__lc || {};
                    window.__lc.license = 10555997;
                    (function() {
                        var lc = document.createElement('script');
                        lc.type = 'text/javascript';
                        lc.async = true;
                        lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') +
                            'cdn.livechatinc.com/tracking.js';
                        var s = document.getElementsByTagName('script')[0];
                        s.parentNode.insertBefore(lc, s);
                    })();
                </script>
                <!-- End of LiveChat code -->
            @endif
        @show
    </body>

</html>
