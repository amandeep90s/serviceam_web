@extends('common.provider.layout.base')
@section('styles')
    @parent
    <link rel="stylesheet" type='text/css' href="{{ asset('assets/plugins/cropper/css/cropper.css') }}" />
    <link rel='stylesheet' type='text/css' href="{{ asset('assets/plugins/data-tables/css/dataTables.bootstrap.min.css') }}" />
    <style type="text/css">
        .fontsize {
            font-weight: bold;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .maxwidth {
            max-width: 100%;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        .currency {
            color: red;
        }
    </style>
@stop
@section('content')
    @include('common.provider.includes.image-modal')
    <section class="taxi-banner z-1 content-box">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-2">
                <div class="sidebar clearfix m-b-20">
                    <div class="main-block">
                        <div class="sidebar-title white-txt">
                            <h6>Services</h6>
                            <i class="fa fa-history pull-right"></i>
                        </div>
                        <form>
                            <ul>
                                @foreach (Helper::getServiceList() as $k => $v)
                                    <li>
                                        <span class="radio-box"><input type="radio" value='{{ $v }}'
                                                name="filter" id="{{ $v }}">
                                            <label for="{{ $v }}">{{ $v }}</label></span>
                                    </li>
                                @endforeach
                            </ul>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-10 wrapper">

                <form class="serviceEditForm  col-md-12 col-lg-12 col-sm-12 p-0">

                    <input type="hidden" name="admin_service" class="admin_service" value="SERVICE">
                    <input type="hidden" name="serviceid" value="{{ $id }}">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="category"
                                class="col-xs-2 col-form-label fontsize">{{ __('Service Categories') }}</label>
                            <select name="service_category_id" id="service_category_id" class="form-control">
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="sub_category"
                                class="col-xs-2 col-form-label fontsize">{{ __('Service Sub Categories') }}</label>
                            <select name="sub_category" id="sub_category" class="form-control">
                                <option value="">Select</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="category" class="col-xs-2 col-form-label fontsize">{{ __('Service') }}</label>
                            <select name="service_id" id="service_id" class="form-control">
                                <option value="">Select</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="notify_status"
                                class="col-xs-2 col-form-label fontsize">{{ __('Fare Type') }}</label>
                            <select name="fare_type" id="fare_type" class="form-control"> </select>

                        </div>
                    </div>


                    <div class="form-row base d-none">
                        <div class="form-group col-md-6">
                            <label for="category"
                                class="col-xs-2 col-form-label fontsize">{{ __('Base Fare') }}</label><span
                                class="currency"></span>
                            <input type="text" class="form-control admin_price" name="base_fare" id="base_fare"
                                maxlength="10" placeholder="Enter Amount" required>
                        </div>
                    </div>

                    <div class="form-row mins d-none">
                        <div class="form-group col-md-6">
                            <label for="category"
                                class="col-xs-2 col-form-label fontsize">{{ __('Mins Fare') }}</label><span
                                class="currency"></span>
                            <input type="text" class="form-control admin_price" name="mins_fare" id="mins_fare"
                                maxlength="10" placeholder="Enter Amount" required>
                        </div>
                    </div>

                    <div class="form-row miles d-none">
                        <div class="form-group col-md-6">
                            <label for="category"
                                class="col-xs-2 col-form-label fontsize">{{ __('Miles Fare') }}</label><span
                                class="currency"></span>
                            <input type="text" class="form-control admin_price" name="miles_fare" id="miles_fare"
                                maxlength="10" placeholder="Enter Amount" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="toggleSwitch nolabel" onclick="">
                                <input type="checkbox" checked value="" id="switch_status" name="service_status"
                                    class="form-control service_status" style="opacity:0">
                                <input type="hidden" value="" name="service_status" id="hidden_check">
                                <span>
                                    <span>OFF</span>
                                    <span>ON</span>
                                </span>
                                <a></a>
                            </label>

                        </div>
                    </div>


                    <!-- <div class="form-row  others d-none">

                            <div class="form-group col-md-6">
                                <label for="notify_status" class="col-xs-2 col-form-label fontsize">{{ __('Hourly Rate') }}</label>
                                    <input type="number" class="form-control" id="hourly_rate" name="hourly_rate" placeholder="Hourly Rate" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="notify_status" class="col-xs-2 col-form-label fontsize">{{ __('Minimum Hours') }}</label>
                                    <input type="number" class="form-control" id="minimum_hours" name="minimum_hours" placeholder="Minimum hours" />
                            </div>


                        </div> -->
                    <br>
                    <button type="submit" class="btn btn-primary  col-md-12 col-lg-3 col-sm-3">Save <i
                            class="fa fa-edit" aria-hidden="true"></i></button>

                </form>

                <br>
            </div>
        </div>

    </section>

@stop
@section('scripts')
    @parent
    <script src="{{ asset('assets/plugins/cropper/js/cropper.js') }}"></script>
    <script src="{{ asset('assets/layout/js/crop.js') }}"></script>
    <script src="{{ asset('assets/plugins/data-tables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/data-tables/js/dataTables.bootstrap.min.js') }}"></script>

    <script>
        var id = $("input[name=serviceid]").val();


        if (id) {
            servicefaretype();
        }

        $(document).ready(function() {
            //Added value on page load
            //$('.service_status').attr('value', '1')
            //$('#hidden_check').attr('value', '1')

            // Changed value when checked
            $('.service_status').on('change', function() {
                if ($(this).is(':checked')) {
                    $(this).attr('value', '1');
                } else {
                    $(this).attr('value', '0');
                }

                //Sent value to hidden field
                var checkbox_field_value = $(this).val();
                $('#hidden_check').val(checkbox_field_value);
            });
        });


        $.ajax({
            url: getBaseUrl() + "/provider/adminservices",
            type: "get",
            headers: {
                Authorization: "Bearer " + getToken("provider")
            },
            'beforeSend': function(request) {
                showInlineLoader();
            },
            success: (data, textStatus, jqXHR) => {
                var data = data.responseData;
                var click_data = 0;
                $.each(data, function(k, v) {

                    if (v.providerservices != null && click_data == 0) {
                        click_data = 1;
                        $('#' + v.admin_service).trigger('click');
                    }
                });
                hideInlineLoader();
            },
            error: function(jqXHR, errorThrown) {
                hideInlineLoader();
            }

        });


        $(".show-service").click(function() {
            $(".sub-service").removeClass("d-none");
        });


        if ($('#SERVICE').is(":checked")) {
            servicefaretype($('#SERVICE'));
        }

        $('#SERVICE').change(function() {
            if ($(this).is(":checked")) {
                servicefaretype($(this));
            } else {
                $('.services').removeClass('d-none');
            }
        });

        $.ajax({
            url: getBaseUrl() + "/provider/service/fare_type-list?id=" + id,
            type: "GET",
            headers: {
                Authorization: "Bearer " + getToken("provider")
            },
            success: function(data) {

                $("#fare_type").empty().append('<option value="">select</option>');
                $.each(data.responseData.fareType, function(key, item) {
                    if (data.responseData.selectedFareType == item) {
                        selected = 'selected';
                    } else {
                        selected = '';
                    }
                    $("#fare_type").append('<option value="' + item + '" ' + selected + '>' + item +
                        '</option>');

                });
            }
        });

        $.ajax({
            url: getBaseUrl() + "/provider/service/categories-list?id=" + id,
            type: "GET",
            headers: {
                Authorization: "Bearer " + getToken("provider")
            },
            success: function(data) {

                $("#service_category_id").empty().append('<option value="">select</option>');
                $.each(data.responseData, function(key, item) {
                    if (item.is_selected) {
                        $("#service_category_id").append('<option value="' + item.id + '" selected>' +
                            item.service_category_name + '</option>');

                        setTimeout(function() {
                            loadServiceSubcategory(item.id, id)
                        }, 100);
                    } else {
                        $("#service_category_id").append('<option value="' + item.id + '">' + item
                            .service_category_name + '</option>');
                    }

                });
            }
        });

        function loadServiceSubcategory(category_id, service_id) {
            $.ajax({
                type: "GET",
                url: getBaseUrl() + "/provider/service/subcategories-list/" + category_id + "?service_id=" +
                    service_id,
                headers: {
                    Authorization: "Bearer " + getToken("provider")
                },
                'beforeSend': function(request) {
                    showInlineLoader();
                },
                success: function(data) {
                    $("#sub_category").html('');
                    $("#sub_category").append('<option value="">Select</option>');
                    $.each(data.responseData, function(key, item) {
                        if (item.is_selected) {
                            $("#sub_category").append('<option value="' + item.id + '" selected>' + item
                                .service_subcategory_name + '</option>');

                            setTimeout(function() {
                                loadService(item.id, category_id, id)
                            }, 100);
                        } else {
                            $("#sub_category").append('<option value="' + item.id + '">' + item
                                .service_subcategory_name + '</option>');
                        }
                    });
                    hideInlineLoader();
                }

            });
        }

        function loadService(sub_category_id, category_id, service_id) {
            $.ajax({
                type: "GET",
                url: getBaseUrl() + "/provider/service/servicelist/" + category_id + '/' + sub_category_id +
                    "?service_id=" + service_id + '&is_edit=' + true,
                headers: {
                    Authorization: "Bearer " + getToken("provider")
                },
                'beforeSend': function(request) {
                    showInlineLoader();
                },
                success: function(data) {
                    $("#service_id").empty();
                    $("#service_id").append('<option value="">Select</option>');
                    $.each(data.responseData, function(key, item) {
                        if (item.is_selected) {
                            $("#service_id").append('<option value="' + item.id + '" selected>' + item
                                .service_name + '</option>');
                        } else {
                            $("#service_id").append('<option value="' + item.id + '">' + item
                                .service_name + '</option>');
                        }
                    });
                    //$("#service_id").append('<option value="other">Others</option>');
                    hideInlineLoader();
                }
            });
        }

        $('#service_category_id').on('change', function() {
            var category_id = $("#service_category_id").val();
            $.ajax({
                type: "GET",
                url: getBaseUrl() + "/provider/service/subcategories-list/" + category_id + "?service_id=" +
                    id,
                headers: {
                    Authorization: "Bearer " + getToken("provider")
                },
                'beforeSend': function(request) {
                    showInlineLoader();
                },
                success: function(data) {
                    $("#sub_category").html('');
                    $("#sub_category").append('<option value="">Select</option>');
                    $.each(data.responseData, function(key, item) {
                        $("#sub_category").append('<option value="' + item.id + '">' + item
                            .service_subcategory_name + '</option>');
                    });
                    hideInlineLoader();
                }

            });
        });

        $('#sub_category').on('change', function() {
            var subcategory_id = $("#sub_category").val();
            var category_id = $("#service_category_id").val();

            $.ajax({
                type: "GET",
                url: getBaseUrl() + "/provider/service/servicelist/" + category_id + '/' + subcategory_id,
                headers: {
                    Authorization: "Bearer " + getToken("provider")
                },
                'beforeSend': function(request) {
                    showInlineLoader();
                },
                success: function(data) {
                    $("#service_id").empty();
                    $("#service_id").append('<option value="">Select</option>');
                    $.each(data.responseData, function(key, item) {
                        $("#service_id").append('<option value="' + item.id + '">' + item
                            .service_name + '</option>');
                    });
                    //$("#service_id").append('<option value="other">Others</option>');
                    hideInlineLoader();
                }
            });
        });

        $('#service_id').on('change', function() {
            if ($(this).val() == 'other') {
                $('.others').removeClass('d-none');
                $('.others').show();
            } else {
                $('#service_name').val('');
                $('#hourly_rate').val('');
                $('#minimum_hours').val('');
                $('#certification').val('');
                $('#experience').val('');
                $('.others').hide();
                $('.others').addClass('d-none');
            }

        });

        $('#fare_type').on('change', function() {
            cal = $(this).val();
            priceInputs(cal);
        });

        function priceInputs(cal) {
            if (cal == 'FIXED') {
                $('.mins, .miles').addClass('d-none');
                $('.base').removeClass('d-none');
                $('.base').show();
            } else if (cal == 'DISTANCETIME') {
                $('.base, .mins, .miles').removeClass('d-none');
                $('.base, .mins, .miles').show();
            } else if (cal == 'HOURLY') {
                $('.miles').addClass('d-none');
                $('.base, .mins').removeClass('d-none');
                $('.base, .mins').show();
            } else {
                $('.base, .mins, .miles').addClass('d-none');
            }
        }

        function servicefaretype(obj) {
            $.ajax({
                url: getBaseUrl() + "/provider/baseservices?id=" + id,
                type: "get",
                headers: {
                    Authorization: "Bearer " + getToken("provider")
                },
                'beforeSend': function(request) {
                    showInlineLoader();
                },
                success: (data, textStatus, jqXHR) => {
                    var response = data.responseData;



                    $('.currency').text(' (' + response.currency_symbol + ')');
                    if (response.fareType == 'HOURLY') {
                        $('.base, .mins').removeClass('d-none');
                        $('.base, .mins').show();
                        $('#base_fare').val(response.base_price);
                        $('#mins_fare').val(response.per_mins);
                    } else if (response.fareType == 'FIXED') {
                        $('.base').removeClass('d-none');
                        $('.base').show();
                        $('#base_fare').val(response.base_price);

                    } else if (response.fareType == 'DISTANCETIME') {
                        $('.base, .mins, .miles').removeClass('d-none');
                        $('.base, .mins, .miles').show();
                        $('#base_fare').val(response.base_price);
                        $('#mins_fare').val(response.per_mins);
                        $('#miles_fare').val(response.per_mile);
                    } else {
                        $('.base, .mins, .miles').addClass('d-none');
                    }

                    if (response.price_choose == 'admin_price') {
                        $('.admin_price').prop('readonly', true);
                    }

                    if (response.providerservices[0].status == 'ACTIVE') {
                        $('.service_status').attr('Checked', 'Checked');
                        $('#service_status').val('ACTIVE');
                    } else if (response.providerservices[0].status == 'PENDING') {
                        $('.service_status').removeAttr('Checked');
                        $('.service_status').prop('disabled', true);
                        $('#service_status').val('PENDING');
                    } else {
                        $('.service_status').removeAttr('Checked');
                        $('#service_status').val('INACTIVE');
                    }

                    hideInlineLoader();
                },
                error: function(jqXHR, errorThrown) {
                    hideInlineLoader();
                }
            });
        }

        /*var blobImage = '';
        var blobName = '';

        $('#certification').on('change', function(e) {
            var files = e.target.files;
            if (files && files.length > 0) {
                blobName = files[0].name;
                cropImage($(this), files[0], $('.user-img'), function(data) {
                    blobImage = data;
                });
            }
        });*/

        $('.serviceEditForm').validate({
            errorElement: 'span',
            errorClass: 'help-block txt-red',
            focusInvalid: false,
            highlight: function(element) {
                $(element).closest('.form-group').addClass('has-error');
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },
            submitHandler: function(form, e) {

                var data = new FormData();
                var formGroup = $(".serviceEditForm").serialize().split("&");

                /*if(blobImage != "")
                    data.append('certification', blobImage, blobName);*/

                for (var i in formGroup) {
                    var params = formGroup[i].split("=");
                    data.append(decodeURIComponent(params[0]), decodeURIComponent(params[1]));
                }
                //var provider_service_id = $('.provider_service_id').val();
                var url = getBaseUrl() + "/provider/vechile/editservice";
                /*if (provider_service_id != null) {
                    var url = getBaseUrl() + "/provider/vechile/addservice";
                } else {
                    var url = getBaseUrl() + "/provider/vechile/editservice";
                }*/
                savefunction(data, url)

            }
        });

        function savefunction(data, url) {
            $.ajax({
                url: url,
                type: "post",
                data: data,
                headers: {
                    Authorization: "Bearer " + getToken("provider")
                },
                processData: false,
                contentType: false,
                beforeSend: function(request) {
                    showLoader();
                },
                success: function(response, textStatus, jqXHR) {
                    var data = parseData(response);
                    var providerdata = localStorage.getItem('provider');
                    providerdata = JSON.parse(decodeHTMLEntities(providerdata));
                    providerdata.is_service = 1;
                    providerdata.is_document = 0;
                    localStorage.setItem("provider", JSON.stringify(providerdata));
                    hideLoader();
                    alertMessage("Success", data.message, "success");

                    $('.serviceEditForm')[0].reset();

                    setTimeout(function() {

                        window.location.replace('/provider/myservice');
                        //location.reload();
                    }, 1000);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alertMessage(textStatus, jqXHR.responseJSON.message, "danger");
                    hideLoader();

                }
            });
        }
    </script>
@stop
