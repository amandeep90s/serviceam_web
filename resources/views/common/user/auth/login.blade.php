@extends('common.user.layout.auth')
@section('styles')

    @parent
@stop
@section('content')
    @include('common.alert')
    <section id="login-form" class="">
        <div class="login-bg ">
            <div class="login-content">
                <div class="logo-section dis-center">
                    <a href="{{ URL::to('') }}">
                        <img src="{{ Helper::getSiteLogo() }}" class="" width="100" alt="logo">
                    </a>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-12 dis-row">
                    <ul class="nav nav-tabs b-0 dis-row">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#login">@lang('auth.login')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#sign-up">@lang('auth.signup')</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div id="login" class="tab-pane active col-sm-12 col-md-12 col-lg-12">
                        <div class="dis-center">
                            <form class="h-100 col-sm-12 col-md-12 col-lg-12 col-xl-12 dis-column validateForm">
                                <div id="toaster" class="toaster w-100"></div>
                                <div class="choose-mode mb-3 col-sm-12 col-md-12 col-lg-12">

                                </div>
                                <input id="email" name="email" class="form-control required email mb-4" style=""
                                    placeholder="@lang('auth.email')" type="email" aria-required="true">


                                <input id="password" name="password" class="form-control mb-4" value=""
                                    placeholder="@lang('auth.password')" type="password" autocomplete="current-password">

                                <button type="submit" class="btn btn-primary btn-md mb-4">@lang('auth.login')<i
                                        class="fa fa-arrow-circle-right ml-2" aria-hidden="true"></i></button>
                                <a href="{{ url('user/forgot-password') }}" class="forgot-link">@lang('auth.forgot_password')</a>

                                @if (Helper::getSettings()->site->social_login == 1)
                                    <div class="or-section mt-2 mb-3">
                                        <hr>
                                        <span>OR</span>
                                        <hr>
                                    </div>
                                    <div class="social-login">
                                        <span class="fb-bg" onclick="fbLogin()"><i
                                                class="fa fa-facebook-square "></i></span>
                                        <span id="glogin" class="google_login google-bg "><i
                                                class="fa fa-google-plus-square "></i></span>
                                    </div>
                                @endif
                                <div class="copyrights">
                                    <p>{!! Helper::getSettings()->site->site_copyright !!}</p>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div id="sign-up" class="tab-pane fade col-sm-12 col-md-12 col-lg-12">
                        <div class="dis-center">
                            <form class=" h-100 col-sm-12 col-md-12 col-lg-12 col-xl-12 dis-column validateSignForm">
                                <div id="toaster" class="toaster w-100"></div>

                                <input name="email" id="email" class="form-control mb-4"
                                    placeholder="@lang('auth.email')" type="email" required />

                                <p class="show_message"></p>
                                <p class="new_show_message"></p>
                                </p>

                                <input id="enterOtp" name="otp" class="form-control mb-4 enterOtp"
                                    placeholder="@lang('auth.enter_otp_received')" type="text" aria-required="true" required
                                    style="display:none">
                                <div class="account_kit" style="display:none">

                                    <div class="col-sm-12 col-md-12 col-lg-12 p-0 d-flex">
                                        <div class="col-sm-6 p-0 mr-1">
                                            <input id="first_name" name="first_name" class="form-control mb-4"
                                                value="" placeholder="@lang('auth.first_name')" type="text" required>
                                        </div>
                                        <div class="col-sm-6 p-0">
                                            <input id="last_name" name="last_name" class="form-control mb-4" value=""
                                                placeholder="@lang('auth.last_name')" type="text" required>
                                        </div>
                                    </div>

                                    <input id="suite" name="suite" class="form-control mb-4" value=""
                                        placeholder="@lang('auth.suite')" type="text" required>
                                    <!--  w-100 -->
                                    <select name="gender" class="form-control mb-4">
                                        <option value="">@lang('auth.select_gender')</option>
                                        <option value="MALE">@lang('auth.MALE')</option>
                                        <option value="FEMALE">@lang('auth.FEMALE')</option>
                                        <option value="GENERAL">@lang('auth.GENERAL')</option>
                                    </select>
                                    <input id="signin_password" name="password" class="form-control mb-4" value=""
                                        placeholder="@lang('auth.password')" type="password" required
                                        autocomplete="new-password">
                                    <input id="password_confirmation" name="password_confirmation"
                                        class="form-control mb-4" value="" placeholder="@lang('auth.confirm_password')"
                                        type="password" required autocomplete="new-password">
                                    <select name="country_id" class=" mb-4 form-control">
                                        <option value="">@lang('auth.select_country')</option>
                                    </select>
                                    <select name="city_id" class=" mb-4 form-control">
                                        <option value="">@lang('auth.select_city')</option>
                                    </select>
                                    <input id="picture" name="picture" class="form-control mt-4" placeholder="Picture"
                                        type="file">
                                    <input id="referral_code" name="referral_code" class="form-control mt-4"
                                        placeholder="Referral Code" type="text">
                                    <div class="form-group float-left">
                                        <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                                    </div>
                                </div>

                                <input type="hidden" name="data_otp" class="data_otp">
                                <a class="btn btn-block btn-secondary btn-md mt-2 get_otp">Next<i
                                        class="fa fa-sign-in ml-2" aria-hidden="true"></i></a>

                                <a class="btn btn-block btn-secondary btn-md mt-2 verify_btn"
                                    style="display:none !important">@lang('auth.verify')<i
                                        class="fa fa-arrow-circle-right ml-2" aria-hidden="true"></i></a>

                                <button type="submit" class="btn btn-block btn-secondary btn-md mt-2 signup account_kit"
                                    style="display:none !important">@lang('auth.signup')<i
                                        class="fa fa-arrow-circle-right ml-2" aria-hidden="true"></i></button>

                                <div class="or-section mt-2 mb-3">
                                    <hr>
                                    <span>@lang('auth.or')</span>
                                    <hr>
                                </div>

                                @if (Helper::getSettings()->site->social_login == 1)
                                    <div class="social-login">
                                        <span class="fb-bg" onclick="fbLogin()"><i
                                                class="fa fa-facebook-square "></i></span>
                                        <span id="glogin1" class="google_login google-bg "><i
                                                class="fa fa-google-plus-square "></i></span>
                                    </div>
                                @endif

                                <div class="copyrights">
                                    <p>{!! Helper::getSettings()->site->site_copyright !!}</p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="social-login" class="tab-pane fade col-sm-12 col-md-12 col-lg-12">
                        <div class="dis-reverse">
                            <form class="signin-section h-100 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <input name="mobile" maxlength="15" autocomplete="off"
                                    class="intl-tel phone form-control mb-4 d-none" placeholder="Phone Number"
                                    value="" type="text">
                                <input name="email" autocomplete="off" class="form-control mb-4 d-none"
                                    placeholder="E-mail Address" value="" type="email" aria-required="true">
                                <select name="gender" class="w-100 mb-3 d-none" autocomplete="off">
                                    <option value="">@lang('auth.select_gender')</option>
                                    <option value="MALE">@lang('auth.MALE')</option>
                                    <option value="FEMALE">@lang('auth.FEMALE')</option>
                                    <option value="GENERAL">@lang('auth.GENERAL')</option>
                                </select>
                                <select name="country_id" autocomplete="off" class=" mb-4 form-control d-none">
                                    <option value="">@lang('auth.select_country')</option>
                                </select>
                                <select name="city_id" autocomplete="off" class=" mb-4 form-control d-none">
                                    <option value="">@lang('auth.select_city')</option>
                                </select>
                                <a class="btn btn-block btn-secondary btn-md mb-2 social_login">@lang('auth.signup')<i
                                        class="fa fa-arrow-circle-right ml-2" aria-hidden="true"></i></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wave">
                <div class="wave-green"></div>
                <div class="wave-blue"></div>
            </div>

        </div>
    </section>
@stop
@section('scripts')
    @parent
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://apis.google.com/js/api:client.js"></script>
    <script>
        @if (Helper::getSettings()->site->social_login == 1)

            startApp();

            var setdata = "";

            $('#sign-up input[name=mobile]').val('');
            $('#sign-up input[name=email]').val('');

            $('#sign-up input[name=otp]').val('');

            var googleUser = {};

            function startApp() {
                gapi.load('auth2', function() {
                    // Retrieve the singleton for the GoogleAuth library and set up the client.
                    auth2 = gapi.auth2.init({
                        client_id: '{{ Helper::getSettings()->site->google_client_id }}',
                        cookiepolicy: 'single_host_origin',
                        // Request scopes in addition to 'profile' and 'email'
                        //scope: 'additional_scope'
                    });
                    attachSignin(document.getElementById('glogin'));
                    attachSignin(document.getElementById('glogin1'));
                });
            };

            function attachSignin(element) {
                auth2.attachClickHandler(element, {}, function() {

                        gapi.client.load('oauth2', 'v2', function() {
                            var request = gapi.client.oauth2.userinfo.get({
                                'userId': 'me'
                            });
                            request.execute(function(response) {
                                // Display the user details
                                saveData(response.id, 'GOOGLE', response.given_name, response
                                    .family_name, response.email, response.picture);
                            });
                        });
                    }, function(error) {
                        console.log(JSON.stringify(error, undefined, 2));
                    }

                );
            }

            window.fbAsyncInit = function() {
                FB.init({
                    appId: '{{ Helper::getSettings()->site->facebook_app_id }}',
                    cookie: true,
                    xfbml: true,
                    version: 'v3.2'
                });

                FB.AppEvents.logPageView();

            };

            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {
                    return;
                }
                js = d.createElement(s);
                js.id = id;
                js.src = "https://connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        @endif
        function saveData(social_unique_id, login_by, first_name, last_name, email, picture) {

            var formData = new FormData();
            formData.append('social_unique_id', social_unique_id);
            formData.append('login_by', login_by);
            formData.append('first_name', first_name);
            formData.append('last_name', last_name);
            if (email != "" && typeof email != 'undefined') {
                formData.append('email', email);
            }
            formData.append('email', email);
            formData.append('picture', picture);
            formData.append('salt_key', '{{ Helper::getSaltKey() }}');

            $.ajax({
                url: getBaseUrl() + "/user/social/login",
                type: "post",
                processData: false,
                contentType: false,
                data: formData,
                success: (response, textStatus, jqXHR) => {
                    var data = parseData(response);

                    if (data.responseData.status == 0) {

                        $('.nav-link').removeClass('active');
                        $('#login, #sign-up').removeClass('active show');
                        $('#social-login').addClass('active show');

                        var validators = data.responseData.validators;

                        for (var i in validators) {
                            $('#social-login .signin-section').find('[name=' + validators[i] + ']').removeClass(
                                'd-none');
                        }

                        $('.social_login').on('click', function() {
                            $('#social-login .signin-section input, #social-login .signin-section select')
                                .each(function() {
                                    if ($(this).val() == "" && $(this).is(':visible')) {
                                        $('.social_error').remove();
                                        $('#social-login .signin-section').prepend(
                                            `<span class="social_error" style="padding: 5px; color: red;">The ` +
                                            (($(this).attr('name')).replace(/_/g, ' ')).replace(
                                                /id/g, '') + ` is required</span>`);
                                        return false;
                                    } else if ($(this).val() != "") {
                                        formData.append($(this).attr('name'), $(this).val());
                                    }
                                });

                            formData.append('country_code', $('#social-login .signin-section').find(
                                '.phone').intlTelInput('getSelectedCountryData').dialCode);

                            $.ajax({
                                url: getBaseUrl() + "/user/social/login",
                                type: "post",
                                processData: false,
                                contentType: false,
                                data: formData,
                                beforeSend: function() {
                                    showLoader();
                                },
                                success: (newResponse, textStatus, jqXHR) => {
                                    var newData = parseData(newResponse);
                                    if (newData.responseData.status != 0) {
                                        setToken("user", newData.responseData.access_token);
                                        setUserDetails(newData.responseData.user);
                                        window.location.replace("{{ url('/user/home') }}");
                                    }
                                    hideLoader();
                                },
                                error: (jqXHR, textStatus, errorThrown) => {
                                    hideLoader();
                                }
                            });

                        });

                    } else {
                        setToken("user", data.responseData.access_token);
                        setUserDetails(data.responseData.user);
                        window.location.replace("{{ url('/user/home') }}");
                    }
                },
                error: (jqXHR, textStatus, errorThrown) => {
                    alertMessage(textStatus, jqXHR.responseJSON.message, "danger");
                }
            });
        }

        function fbLogin() {
            FB.login(function(response) {
                if (response.authResponse) {
                    // Get and display the user profile data
                    getFbUserData();
                } else {
                    console.log('User cancelled login or did not fully authorize.');
                }
            }, {
                scope: 'email'
            });
        }

        function getFbUserData() {
            FB.api('/me', {
                    locale: 'en_US',
                    fields: 'id,first_name,last_name,email,link,gender,locale,picture'
                },
                function(response) {
                    saveData(response.id, 'FACEBOOK', response.first_name, response.last_name, response.email, response
                        .picture.data.url);
                });
        }

        // phone form submission handler
        $('.get_otp').on('click', function() {

            var salt_key = "{{ Helper::getSaltKey() }}";

            var phoneNumber = $('#sign-up input[name=mobile]').val();

            if (phoneNumber) {

                var countryCode = $('#sign-up .phone').intlTelInput('getSelectedCountryData').dialCode;

                setdata = "mobile";

                showLoader();

                $.ajax({
                    url: getBaseUrl() + "/user/sms/check",
                    type: "post",
                    data: {
                        mobile: phoneNumber,
                        country_code: countryCode,
                        salt_key: salt_key
                    },

                    success: (data) => {
                        hideLoader();
                        if (data.statusCode == 201) {
                            jQuery('.new_show_message').html('');
                            $('#sign-up .selected-flag').show();
                            $('#sign-up input[name=mobile]').show();
                            $('.new_show_message').addClass("alert alert-danger");
                            $('.new_show_message').append(data.message);
                            $('.show_message').hide();
                        } else {
                            if (data.responseData.otp) {

                                $('.get_otp').remove();
                                $('.show_message').show();
                                $('.new_show_message').hide();
                                $('.enterOtp').show();
                                $('.verify_btn').show();
                                $('.data_otp').val(data.responseData.otp);
                                $('.show_message').addClass("alert alert-success");
                                $('.show_message').append(data.message);

                            }
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        hideLoader();
                        alertMessage(textStatus, jqXHR.responseJSON.message, "danger");
                    }
                });
            } else {

                var email = $('#sign-up input[name=email]').val();

                $('#sign-up .selected-flag').hide();

                showLoader();
                setdata = "email";

                $.ajax({
                    url: getBaseUrl() + "/user/sms/check",
                    type: "post",
                    data: {
                        email: email,
                        salt_key: salt_key
                    },
                    success: (data) => {
                        hideLoader();
                        if (data.statusCode == 201) {
                            jQuery('.new_show_message').html('');
                            $('#sign-up .selected-flag').show();
                            $('#sign-up input[name=email]').show();
                            $('.new_show_message').addClass("alert alert-danger");
                            $('.new_show_message').append(data.message);
                            $('.show_message').hide();
                        } else {
                            if (data.responseData.body) {

                                $('.get_otp').remove();
                                $('.show_message').show();
                                $('.new_show_message').hide();
                                $('.enterOtp').show();
                                $('.verify_btn').show();
                                $('.data_otp').val(data.responseData.body);
                                $('.show_message').addClass("alert alert-success");
                                $('.show_message').append(data.message);
                            }
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        hideLoader();
                        alertMessage(textStatus, jqXHR.responseJSON.message, "danger");
                    }
                });

            }

        });


        $('.verify_btn').on('click', function() {
            var old_otp = $('.data_otp').val();

            var otp = $('.enterOtp').val();
            if (old_otp == otp) {

                if (setdata == "mobile") {
                    $('#sign-up input[name=mobile]').attr('readonly', true);
                    $('#sign-up input[name=email]').show();
                    $('.show_message').hide();
                } else {

                    $('#sign-up input[name=email]').attr('readonly', true);
                    $('#sign-up input[name=mobile]').show();
                    $("#sign-up .intl-tel-input").show();
                    $('.show_message').hide();

                }

                $('.account_kit').fadeIn(400);
                $('.verify_btn').remove();
                $('.enterOtp').hide();
                $('.signup-choose').hide();
                $('.signup-h6').hide();

            } else {
                alert('Invalid OTP')
            }
        });

        $(document).ready(function() {

            var base_url_data = JSON.parse(decodeHTMLEntities('{{ $base }}'));

            for (var i in Object.keys(base_url_data)) {
                var key = String(Object.keys(base_url_data)[i]);
                var value = String(Object.values(base_url_data)[i]);
                localStorage.setItem(key, value);
            }
            setBaseUrl('{{ $base_url }}');

            $.ajax({
                url: getBaseUrl() + "/user/countries",
                type: "post",
                data: {
                    salt_key: '{{ Helper::getSaltKey() }}'
                },
                success: (data, textStatus, jqXHR) => {
                    var countries = data.responseData;

                    for (var i in countries) {
                        $('select[name=country_id]').append(`<option value="` + countries[i].id + `">` +
                            countries[i].country_name + `</option>`);
                    }

                    $('select[name=country_id]').on('change', function() {
                        $('select[name=city_id]').html("");
                        $('select[name=city_id]').append(
                            `<option value="">{{ __('auth.select_city') }}</option>`);
                        var country_id = $(this).val();

                        var cities = countries.filter((item) => item.id == country_id)[0].city;

                        for (var j in cities) {
                            $('select[name=city_id]').append(`<option value="` + cities[j].id +
                                `">` + cities[j].city_name + `</option>`);
                        }

                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    hideLoader();
                    alertMessage(textStatus, jqXHR.responseJSON.message, "danger");
                }
            });

            $('.validateForm').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    mobile: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    },
                },

                messages: {
                    mobile: {
                        required: "{{ __('auth.mobile_required') }}"
                    },
                    email: {
                        required: "{{ __('auth.email_required') }}"
                    },
                    password: {
                        required: "{{ __('auth.password_required') }}"
                    },
                },

                highlight: function(element) {
                    $(element).closest('.form-group').addClass('has-error');
                },

                success: function(label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                submitHandler: function(form) {

                    var formGroup = $(".validateForm").find(
                        "input[type='hidden'], select, :input:not(:hidden)").serialize().split("&");

                    var data = new FormData();

                    for (var i in formGroup) {
                        var params = formGroup[i].split("=");
                        data.append(params[0], decodeURIComponent(params[1]));
                    }

                    if ($('.phone').is(':visible')) {
                        data.append('country_code', $('.phone').intlTelInput('getSelectedCountryData')
                            .dialCode);
                    }

                    data.append('salt_key', '{{ Helper::getSaltKey() }}');

                    $.ajax({
                        url: getBaseUrl() + "/user/login",
                        type: "post",
                        data: data,
                        processData: false,
                        contentType: false,
                        beforeSend: function() {
                            showLoader();
                        },
                        success: function(response, textStatus, jqXHR) {
                            var data = parseData(response);
                            setToken("user", data.responseData.access_token);
                            setUserDetails(data.responseData.user);
                            window.location.replace("{{ url('/user') }}");
                            hideLoader();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            alertMessage(textStatus, jqXHR.responseJSON.message, "danger");
                            hideLoader();
                        }
                    });

                }
            });

            var number;

            $(".phone").intlTelInput({
                onlyCountries: ['us']
            });

            $('input[name=filter]').on('change', function() {
                console.log("hiiiii");
                var value = $(this).val();
                $("#login #email, #login .intl-tel-input").hide();
                if (value == "email") {
                    $("#login #email").show();
                } else {
                    $("#login .intl-tel-input").show();
                }
            });

            $('input[name=sfilter]').on('change', function() {
                var value = $(this).val();
                $("#sign-up #email, #sign-up .intl-tel-input").hide();
                if (value == "email") {
                    $("#sign-up #email").show();
                } else {
                    $("#sign-up .intl-tel-input").show();
                }
            });

            $('.validateSignForm').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    first_name: {
                        required: true
                    },
                    last_name: {
                        required: true
                    },
                    mobile: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    gender: {
                        required: true
                    },
                    password: {
                        required: true
                    },
                    password_confirmation: {
                        equalTo: "#signin_password"
                    },
                    country_id: {
                        required: true
                    },
                    city_id: {
                        required: true
                    },
                },

                messages: {
                    first_name: {
                        required: "{{ __('auth.firstname_required') }}"
                    },
                    last_name: {
                        required: "{{ __('auth.lastname_required') }}"
                    },
                    mobile: {
                        required: "{{ __('auth.mobile_required') }}"
                    },
                    email: {
                        required: "{{ __('auth.email_required') }}"
                    },
                    password: {
                        required: "{{ __('auth.password_required') }}"
                    },
                    country_id: {
                        required: "{{ __('auth.country_required') }}"
                    },
                    city_id: {
                        required: "{{ __('auth.city_required') }}"
                    },
                },

                highlight: function(element) {
                    $(element).closest('.form-group').addClass('has-error');
                    $(element).removeClass('mb-4').addClass('mb-0').addClass('mt-4');;
                },

                success: function(label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                submitHandler: function(form) {

                    var SignupFormGroup = $(".validateSignForm").serialize().split("&");

                    var SignupData = new FormData();

                    for (var i in SignupFormGroup) {
                        var SignupParams = SignupFormGroup[i].split("=");
                        SignupData.append(SignupParams[0], decodeURIComponent(SignupParams[1]));
                    }
                    SignupData.append('salt_key', '{{ Helper::getSaltKey() }}');

                    SignupData.append('country_code', $('.phone').intlTelInput('getSelectedCountryData')
                        .dialCode);

                    if (($('input[name=picture][type=file]')[0].files).length > 0) {
                        SignupData.append('picture', $('input[name=picture][type=file]')[0].files[0]);
                    }
                    $.ajax({
                        url: getBaseUrl() + "/user/signup",
                        type: "post",
                        data: SignupData,
                        processData: false,
                        contentType: false,
                        beforeSend: function() {
                            showLoader();
                        },
                        success: function(response, textStatus, jqXHR) {
                            var data = parseData(response);
                            setToken("user", data.responseData.access_token);
                            setUserDetails(data.responseData.user);
                            window.location.replace("{{ url('/user') }}");

                            hideLoader();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            hideLoader();
                            alertMessage(textStatus, jqXHR.responseJSON.message, "danger");
                        }
                    });

                }
            });

        });
    </script>
@stop
