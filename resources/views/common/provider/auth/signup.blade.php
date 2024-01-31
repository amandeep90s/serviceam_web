@extends('common.provider.layout.auth')
@section('styles')
    @parent
@stop
@section('content')
    @include('common.alert')
    <section id="provider-signup" class="ph-100">
        <div class="login-bg ">
            <div class="login-content">
                <div class="logo-section dis-center">
                    <a href="{{ URL::to('provider') }}">
                        <img src="{{ Helper::getSiteLogo() }}" class="" width="100" alt="logo">
                    </a>
                </div>


                <div id="sign-up" class="sign-in-section dis-center">
                    <div class="h-100 col-sm-12 col-md-12 col-lg-12 dis-column ">

                        <div id="toaster" class="toaster"></div>

                        <h6 class="mb-3 signup-h6">
                            <strong></strong>
                        </h6>

                        <form class="validateForm">

                            <div class="choose-mode mb-3 col-sm-12 col-md-12 col-lg-12 signup-choose">

                            </div>

                            <input id="email" name="email" class="form-control mb-4"
                                placeholder="{{ __('auth.email_address') }}" type="email" aria-required="true">

                            <p class="show_message">
                            <p class="new_show_message"></p>
                            <div class="account_kit" style="display:none">

                                <div class="col-sm-12 col-md-12 col-lg-12 p-0 d-flex">
                                    <div class="col-sm-6 p-0 mr-1">
                                        <input id="first_name" name="first_name" class="form-control mb-4" value=""
                                            placeholder="{{ __('auth.first_name') }}" type="text">
                                    </div>
                                    <div class="col-sm-6 p-0">
                                        <input id="last_name" name="last_name" class="form-control mb-4" value=""
                                            placeholder="{{ __('auth.last_name') }}" type="text">
                                    </div>
                                </div>
                                <input id="password" name="password" class="form-control mb-4" value=""
                                    placeholder="{{ __('auth.enter_password') }}" type="password">
                                <input id="password_confirmation" name="password_confirmation" class="form-control mb-4"
                                    value="" placeholder="{{ __('auth.confirm_password') }}" type="password">
                                <select id="country" name="country_id" class=" mb-4 form-control">
                                    <option value="">{{ __('auth.select_country') }}</option>
                                </select>
                                <select id="city" name="city_id" class=" mb-4 form-control">
                                    <option value="">{{ __('auth.select_city') }}</option>
                                </select>
                                <input id="state" name="state_id" class="form-control mb-4"
                                    placeholder="{{ __('auth.select_state') }}" type="text">
                                <input id="address" name="address" class="form-control mb-4"
                                    placeholder="{{ __('auth.address') }}" type="text">
                                <input id="suite" name="suite" class="form-control mb-4"
                                    placeholder="{{ __('auth.suite') }}" type="text">
                                <input id="zipcode" name="zipcode" class="form-control mb-4"
                                    placeholder="{{ __('auth.zipcode') }}" type="text">
                                <input id="picture" name="picture" class="form-control mb-4" placeholder="Picture"
                                    type="file">
                                <input id="referral_code" name="referral_code" class="form-control mb-4"
                                    placeholder="{{ __('auth.referral_code') }}" type="text">
                            </div>

                            <input type="hidden" name="data_otp" class="data_otp">

                            <input type="hidden" name="mail_otp" class="mail_otp" value="{{ $otp }}">
                            <a class="btn btn-block btn-secondary btn-md mt-2 get_otp">Next<i class="fa fa-sign-in ml-2"
                                    aria-hidden="true"></i></a>
                            <input id="enterOtp" name="otp" class="form-control mb-4 enterOtp"
                                placeholder="{{ __('auth.enter_otp_received') }}" type="text" aria-required="true"
                                required style="display:none">
                            <a class="btn btn-block btn-secondary btn-md mt-2 verify_btn"
                                style="display:none !important">{{ __('auth.activate') }}<i
                                    class="fa fa-arrow-circle-right ml-2" aria-hidden="true"></i></a>
                            <button type="submit" class="btn btn-block btn-green btn-md mb-2 account_kit"
                                style="display:none !important">{{ __('auth.next') }}<i
                                    class="fa fa-arrow-circle-right ml-2" aria-hidden="true"></i></button>
                        </form>
                        <span>{{ __('auth.already_account') }} <strong><a href="{{ url('/provider/login') }}"
                                    class="signup-link">{{ __('auth.login') }}</a></strong></span>
                        <div class="or-section mt-4 mb-4">
                            <hr>
                            <span>{{ __('auth.or') }}</span>
                            <hr>
                        </div>
                        @if (Helper::getSettings()->site->social_login == 1)
                            <div class="social-login">
                                <span class="fb-bg" onclick="fbLogin()"><i class="fa fa-facebook-square "></i></span>
                                <span id="glogin" class="google_login google-bg "><i
                                        class="fa fa-google-plus-square "></i></span>
                            </div>
                        @endif
                        <div class="copyrights">
                            <p>{!! Helper::getSettings()->site->site_copyright !!}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="social-login" class="col-sm-12 col-md-12 col-lg-12 d-none">
                <div class="sign-in-section dis-center">
                    <div class="h-100 col-sm-12 col-md-5 col-lg-5 dis-column content-card">
                        <h6 class="mb-3"><strong></strong>
                        </h6>

                        <form class="col-lg-12">

                            <div id="toaster" class="toaster"></div>
                            <input id="email" name="email" class="form-control mb-4"
                                placeholder="{{ __('auth.email_address') }}" type="email" aria-required="true">
                            <select id="country" name="country_id" class=" mb-4 form-control">
                                <option value="">{{ __('auth.select_country') }}</option>
                            </select>
                            <select id="city" name="city_id" class=" mb-4 form-control">
                                <option value="">{{ __('auth.select_city') }}</option>
                            </select>
                            <input id="state" name="state_id" class="form-control mb-4"
                                placeholder="{{ __('auth.select_state') }}" type="text">
                            <input id="address" name="address" class="form-control mb-4"
                                placeholder="{{ __('auth.address') }}" type="text">
                            <input id="suite" name="suite" class="form-control mb-4"
                                placeholder="{{ __('auth.suite') }}" type="text">
                            <input id="zipcode" name="zipcode" class="form-control mb-4"
                                placeholder="{{ __('auth.zipcode') }}" type="text">
                            <a class="btn btn-block btn-green btn-md mb-2 social_login">{{ __('auth.next') }}<i
                                    class="fa fa-arrow-circle-right ml-2" aria-hidden="true"></i></a>
                        </form>
                        <span>{{ __('auth.already_account') }} <strong><a href="{{ url('/provider/login') }}"
                                    class="signup-link">{{ __('auth.signin') }}</a></strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
@section('scripts')
    @parent
    <script src="https://apis.google.com/js/api:client.js"></script>

    <script>
        startApp();

        var setdata = "";

        $('#sign-up input[name=otp]').val('');

        console.log("{{ $email }}");

        var emailString = '{{ $email }}';

        if (emailString != '') {
            var emailVal = $('#email').val('{{ $email }}');
            $('.get_otp').remove();
        }

        console.log('{{ $email }}');

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
            });
        }

        function attachSignin(element) {
            auth2.attachClickHandler(element, {}, function() {

                gapi.client.load('oauth2', 'v2', function() {
                    var request = gapi.client.oauth2.userinfo.get({
                        'userId': 'me'
                    });
                    request.execute(function(response) {
                        // Display the user details
                        saveData(response.id, 'GOOGLE', response.given_name, response.family_name,
                            response.email, response.picture);
                    });
                });
            }, function(error) {
                console.log(JSON.stringify(error, undefined, 2));
            });
        }


        var s_login = '{{ Helper::getSettings()->site->facebook_app_id }}';

        if (s_login) {


            window.fbAsyncInit = function() {
                FB.init({
                    appId: '{{ Helper::getSettings()->site->facebook_app_id }}',
                    cookie: true,
                    xfbml: true,
                    version: 'v3.2'
                });

                FB.AppEvents.logPageView();

            };

        }

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

        /* FB.getLoginStatus(function(response) {
           statusChangeCallback(response);
        }); */

        function saveData(social_unique_id, login_by, first_name, last_name, email, picture) {

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
                        $('select[name=city_id]').append(`<option value="">Select City</option>`);
                        var country_id = $(this).val();

                        var cities = countries.filter((item) => item.id == country_id)[0].city;

                        for (var j in cities) {
                            $('select[name=city_id]').append(`<option value="` + cities[j].id + `">` +
                                cities[j].city_name + `</option>`);
                        }

                    });
                },
                error: (jqXHR, textStatus, errorThrown) => {}
            });


            var formData = new FormData();
            formData.append('social_unique_id', social_unique_id);
            formData.append('login_by', login_by);
            formData.append('first_name', first_name);
            formData.append('last_name', last_name);
            formData.append('email', email);
            formData.append('picture', picture);

            formData.append('salt_key', '{{ Helper::getSaltKey() }}');

            $.ajax({
                url: getBaseUrl() + "/provider/social/login",
                type: "post",
                processData: false,
                contentType: false,
                data: formData,
                success: (response, textStatus, jqXHR) => {
                    var data = parseData(response);

                    if (data.responseData.status == 0) {

                        $('#sign-up').addClass('d-none');
                        $('#social-login').removeClass('d-none');

                        var validators = data.responseData.validators;

                        for (var i in validators) {
                            $('#social-login').find('[name=' + validators[i] + ']').removeClass('d-none');
                        }

                        $('.social_login').on('click', function() {


                            $('#social-login input, #social-login select').each(function() {
                                if ($(this).val() == "" && $(this).is(':visible')) {
                                    $('.social_error').remove();
                                    $('#social-login form').prepend(
                                        `<span class="social_error" style="padding: 5px; color: red; text-align:center; float:left; width: 100%;">The ` +
                                        (($(this).attr('name')).replace(/_/g, ' ')).replace(
                                            /id/g, '') + ` is required</span>`);

                                    return false;
                                } else if ($(this).val() != "") {
                                    formData.append($(this).attr('name'), $(this).val());
                                }
                            });


                            formData.append('country_code', $('#social-login').find('.phone')
                                .intlTelInput('getSelectedCountryData').dialCode);

                            $.ajax({
                                url: getBaseUrl() + "/provider/social/login",
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
                                        setToken("provider", newData.responseData
                                            .access_token);
                                        setProviderDetails(newData.responseData.user);
                                        window.location.replace("{{ url('/provider') }}");
                                    }
                                    hideLoader();
                                },
                                error: (jqXHR, textStatus, errorThrown) => {
                                    hideLoader();
                                    alertMessage(textStatus, jqXHR.responseJSON.message,
                                        "danger");
                                }
                            });

                        });

                    } else {
                        setToken("provider", data.responseData.access_token);
                        setProviderDetails(data.responseData.user);
                        window.location.replace("{{ url('/provider') }}");
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

        $('input[name=sfilter]').on('change', function() {
            var value = $(this).val();
            console.log(value);
            $("#sign-up #email, #sign-up .intl-tel-input").hide();
            if (value == "email") {
                $("#sign-up #email").show();
            } else {
                $("#sign-up .intl-tel-input").show();
            }
        });


        $('.get_otp').on('click', function() {

            var phoneNumber = $('#sign-up input[name=mobile]').val();
            var salt_key = "{{ Helper::getSaltKey() }}";

            if (phoneNumber) {

                setdata = "mobile";
                var countryCode = $('#sign-up .phone').intlTelInput('getSelectedCountryData').dialCode;
                showLoader();

                $.ajax({
                    url: getBaseUrl() + "/provider/sms/check",
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
                                hideLoader();
                                $('.get_otp').remove();
                                $('.new_show_message').hide();
                                $('.enterOtp').show();
                                $('.verify_btn').show();
                                $('.data_otp').val(data.responseData.otp);
                                $('.show_message').addClass("alert alert-success");
                                $('.show_message').append(data.message);
                                hideLoader();

                            }
                        }
                    }
                });

            } else {

                var email = $('#sign-up input[name=email]').val();

                if (email == '') {
                    hideLoader();
                    alertMessage("Error", "Email field is required", "danger");
                }

                // $('#sign-up input[name=mobile]').hide();
                // $('#sign-up .selected-flag').hide();

                showLoader();
                setdata = "email";

                $.ajax({
                    url: getBaseUrl() + "/provider/sms/check",
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
                                hideLoader();
                                $('.get_otp').remove();
                                $('.show_message').show();
                                $('.new_show_message').hide();
                                $('.enterOtp').show();
                                $('.verify_btn').show();
                                $('.data_otp').val(data.responseData.body);
                                $('.show_message').addClass("alert alert-success");
                                $('.show_message').append(data.message);
                                hideLoader();
                            }
                        }
                    }
                });

            }

        });

        var mail_otp = $('.mail_otp').val();
        //$('.verify_btn').show();
        if (mail_otp != '') {
            $('#sign-up input[name=email]').show();
            $('#sign-up input[name=email]').attr('readonly', true);
            $('#sign-up input[name=mobile]').show();
            $("#sign-up .intl-tel-input").show();
            $('.show_message').hide();
            $('.account_kit').fadeIn(400);
            $('.verify_btn').remove();
            $('.enterOtp').hide();
            $('.signup-choose').hide();
            $('.signup-h6').hide();
        }

        $('.verify_btn').on('click', function() {
            var old_otp = $('.data_otp').val();

            var otp = $('.enterOtp').val();
            if (old_otp == otp) {
                console.log("send data---");
                console.log(setdata);

                if (setdata == "mobile") {
                    $('#sign-up input[name=mobile]').attr('readonly', true);
                    $('#sign-up input[name=email]').show();
                    $('.show_message').hide();
                } else {
                    $('#sign-up input[name=email]').show();
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

            // $(".phone").intlTelInput({
            //    initialCountry: "<?php echo isset(Helper::getSettings()->site->country_code) ? Helper::getSettings()->site->country_code : 'in'; ?>",
            // });

            $(".phone").intlTelInput({
                onlyCountries: ['us']
            });

            $.ajax({
                url: getBaseUrl() + "/provider/countries",
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
                            `<option value="">Select City</option>`);
                        var country_id = $(this).val();

                        var cities = countries.filter((item) => item.id == country_id)[0].city;

                        for (var j in cities) {
                            $('select[name=city_id]').append(`<option value="` + cities[j].id +
                                `">` + cities[j].city_name + `</option>`);
                        }

                    });
                },
                error: (jqXHR, textStatus, errorThrown) => {}
            });

            var number;

            $('.validateForm').validate({
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
                    //mobile: { required: true },
                    email: {
                        required: true,
                        email: true
                    },
                    //gender: { required: true },
                    password: {
                        required: true
                    },
                    password_confirmation: {
                        equalTo: "#password"
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
                        required: "First name is required."
                    },
                    last_name: {
                        required: "last name is required."
                    },
                    //mobile: { required: "Mobile number is required." },
                    email: {
                        required: "Email is required."
                    },
                    password: {
                        required: "Password is required."
                    },
                    country_id: {
                        required: "Country is required."
                    },
                    city_id: {
                        required: "City is required."
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

                    var formGroup = $(".validateForm").serialize().split("&");

                    var data = new FormData();

                    for (var i in formGroup) {
                        var params = formGroup[i].split("=");
                        data.append(params[0], decodeURIComponent(params[1]));
                    }
                    data.append('salt_key', '{{ Helper::getSaltKey() }}');

                    data.append('country_code', $('.phone').intlTelInput('getSelectedCountryData')
                        .dialCode);

                    if (($('input[name=picture][type=file]')[0].files).length > 0) {
                        data.append('picture', $('input[name=picture][type=file]')[0].files[0]);
                    }
                    $.ajax({
                        url: getBaseUrl() + "/provider/signup",
                        type: "post",
                        data: data,
                        processData: false,
                        contentType: false,
                        beforeSend: function() {
                            showLoader();
                        },
                        success: function(response, textStatus, jqXHR) {
                            setToken("provider", response.responseData.access_token);
                            setProviderDetails(response.responseData.user);
                            window.location.replace("{{ url('/provider/home') }}");
                            hideLoader();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            alertMessage(textStatus, jqXHR.responseJSON.message, "danger");
                            hideLoader();
                        }
                    });

                }
            });

        });
    </script>
@stop
