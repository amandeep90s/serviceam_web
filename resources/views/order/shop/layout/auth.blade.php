<!doctype html>
<html class="no-js h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{ Helper::getSettings()->site->site_title }} </title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" type="image/png" href="{{ Helper::getFavIcon() }}" />
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/layout/css/dashboards.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/extras/css/extras.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/chart/css/export.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/layout/css/admin-style.css') }}">
</head>

<body>
    {{-- Toaster --}}
    <div id="toaster" class="toaster"></div>

    {{-- Content --}}
    @yield('content')

    {{-- Extra Scritps --}}
    @section('scripts')
        <script src="{{ asset('assets/plugins/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery-validation/additional-methods.min.js') }}"></script>
        <script src="{{ asset('assets/layout/js/script.js') }}"></script>
        <script src="{{ asset('assets/layout/js/api.js') }}"></script>
        <script>
            window.shop_id = '{{ Session::get('shop_id') }}';

            if (getToken("shop") != null && window.shop_id != "") {
                window.location.replace("{{ url('/shop/dashboard') }}");
            }


            window.base_url = "{{ config('app.base_url') }}";
            window.country_id = '{{ json_encode(Helper::getAccessKey()) }}';
        </script>
    @show

    @if (Helper::getChatmode() == 1)
        <!-- Start of LiveChat (www.livechatinc.com) code -->
        <script type="text/javascript" src="{{ asset('assets/layout/js/common-chat.js') }}"></script>
        <!-- End of LiveChat code -->
    @endif
</body>

</html>
