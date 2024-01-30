<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>{{ Helper::getSettings()->site->site_title }}</title>

    <meta charset='utf-8'>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta content='website' property='og:type'>

    <link rel="shortcut icon" type="image/png" href="{{ Helper::getFavIcon() }}"/>

    <link rel='stylesheet' href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}"/>
    <link rel='stylesheet' href="{{ asset('assets/layout/css/media-mobile.css') }}"/>
    <link rel='stylesheet' href="{{ asset('assets/layout/css/media-tab.css') }}"/>
    <link rel='stylesheet' href="{{ asset('assets/layout/css/media-lap.css') }}"/>
    <link rel='stylesheet' href="{{ asset('assets/layout/css/animate.css') }}"/>
    <link rel='stylesheet' href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <link rel='stylesheet' href="https://fonts.googleapis.com/css?family=Josefin+Sans"/>
    <link rel='stylesheet' href="{{ asset('assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}"/>
    <link rel='stylesheet' href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}"/>
    <link rel='stylesheet' href="{{ asset('assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}"/>
    <link rel='stylesheet' href="{{ asset('assets/plugins/clockpicker-wearout/css/jquery-clockpicker.min.css') }}"/>
    {{-- Dynamic Stylesheets --}}
    @stack('styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/intl-tel-input/css/intlTelInput.min.css') }}"/>
    <link rel='stylesheet' href="{{ asset('assets/layout/css/stylesheet.css') }}"/>
    <link rel='stylesheet' href="{{ asset('assets/layout/css/login.css') }}"/>
    <style>
        /* Loader */
        .loader-container {
            position: fixed;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            z-index: 9999;
            background: rgba(255, 255, 255, .9);
        }

        .lds-ripple {
            display: inline-block;
            position: absolute;
            z-index: 9999;
            width: 64px;
            height: 64px;
            left: 50%;
            top: 40%;
        }

        .lds-ripple div {
            position: absolute;
            border: 4px solid #007BFF;
            opacity: 1;
            border-radius: 50%;
            animation: lds-ripple 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
        }

        .lds-ripple div.admin {
            position: absolute;
            border: 4px solid #007BFF;
            opacity: 1;
            border-radius: 50%;
            animation: lds-ripple 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
        }

        .lds-ripple div:nth-child(2) {
            animation-delay: -0.5s;
        }

        @keyframes lds-ripple {
            0% {
                top: 28px;
                left: 28px;
                width: 0;
                height: 0;
                opacity: 1;
            }

            100% {
                top: -1px;
                left: -1px;
                width: 58px;
                height: 58px;
                opacity: 0;
            }
        }

        .alert-dismissible {
            padding-right: 1rem;
        }

        .toast .message {
            font-size: 12px;
        }

        .toast .close {
            background-color: transparent !important;
        }
    </style>

</head>

<body class='index'>
@yield('content')

<script src="{{ asset('assets/plugins/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/plugins/popper.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/iscroll/js/scrolloverflow.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js') }}"></script>
<script src="{{ asset('assets/plugins/clockpicker-wearout/js/jquery-clockpicker.min.js') }}"></script>
<script src="{{ asset('assets/plugins/intl-tel-input/js/intlTelInput-jquery.min.js') }}"></script>
<script src="{{ asset('assets/layout/js/script.js') }}"></script>
<script src="{{ asset('assets/layout/js/api.js') }}"></script>

<script>
    if (getToken("user") != null && getToken("user") != 'false') {
        window.location.replace("{{ url('/user/home') }}");
    }

    window.base_url = '{{ env('BASE_URL') }}';
    window.country_id = '{{ json_encode(Helper::getAccessKey()) }}';
</script>

{{-- Dynamic Scripts --}}
@stack('scripts')

@if (Helper::getChatmode() == 1)
    <!-- Start of LiveChat (www.livechatinc.com) code -->
    <script src="{{ asset('assets/layout/js/common-chat.js') }}"></script>
    <!-- End of LiveChat code -->
@endif

</body>
</html>
