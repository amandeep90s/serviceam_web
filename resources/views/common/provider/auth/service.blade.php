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

                <div class="col-md-12 col-lg-12 col-sm-12 p-0 tranport">
                    <div class=" row m-0  transport_append"> </div>
                    <form class="transportForm  col-md-12 col-lg-12 col-sm-12 p-0 tranport">
                        <div class="col-md-12 col-sm-12 pro-form vechile-form d-none">
                            <h5 class="word-breakwrap"><strong>@lang('provider.add_vehicle')</strong></h5>
                            <div class="col-md-12 col-sm-12 pro-form dis-ver-center p-0">
                                <div class="col-md-12 col-sm-12 col-xl-6">
                                    <h5 class="word-breakwrap"><strong>@lang('provider.vehicle_make')</strong></h5>
                                    <input class="form-control vehicle_make" type="text" name="vehicle_make"
                                        placeholder="Make" required>
                                    <input type="hidden" name="admin_service" class="admin_service">
                                    <input type="hidden" name="id" class="id">
                                    <input type="hidden" name="category_id" class="category_id">
                                </div>
                                <div class="col-md-12 col-sm-12 col-xl-6">
                                    <h5 class=" no-padding"><strong>@lang('provider.vehicle_model')</strong></h5>
                                    <input class="form-control vehicle_model" type="text" name="vehicle_model"
                                        placeholder="Model" required>
                                </div>
                            </div>
                            <div class="col-md-12 pro-form dis-ver-center p-0">
                                <div class="col-md-12 col-sm-12 col-xl-6">
                                    <h5 class="word-breakwrap"><strong>@lang('provider.vehicle_year')</strong></h5>
                                    <input class="form-control vehicle_year" type="text" name="vehicle_year"
                                        placeholder=" Year" required>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xl-6">
                                    <h5 class="word-breakwrap"><strong>@lang('provider.vehicle_color')</strong></h5>
                                    <input class="form-control vehicle_color " type="text" name="vehicle_color"
                                        placeholder="Color" required>
                                </div>
                            </div>
                            <div class="col-md-12 pro-form dis-ver-center p-0">
                                <div class="col-md-12 col-sm-12 col-xl-6">
                                    <h5 class="word-breakwrap"><strong>@lang('provider.vehicle_type')</strong></h5>
                                    <select name="vehicle_id" class="form-control vehicle_id">
                                        <option value=''> @lang('provider.select_vehicle_type')</option>
                                    </select>

                                </div>
                                <div class="col-md-12 col-sm-12 col-xl-6">
                                    <h5 class="word-breakwrap"><strong>@lang('provider.vehicle_number')Vehicle Number</strong></h5>
                                    <input class="form-control vehicle_no" type="text" name="vehicle_no"
                                        class="vehicle_no" placeholder="Number" required>
                                </div>
                            </div>
                            <div class="col-md-12 pro-form dis-ver-center chair p-0 d-none">
                                <div class="col-md-12 col-sm-12 col-xl-6">
                                    <h5 class="word-breakwrap"><strong>@lang('provider.wheel_chair')</strong></h5>
                                    <input type="checkbox" id="wheel_chair" name="wheel_chair" value="1">
                                </div>
                                <div class="col-md-12 col-sm-12 col-xl-6">
                                    <h5 class="word-breakwrap"><strong>@lang('provider.child_seat')</strong></h5>
                                    <input type="checkbox" id="child_seat" name="child_seat" value="1">
                                </div>
                            </div>
                            <div class="col-md-12 pro-form dis-ver-center p-0 mt-2">
                                <div class="col-md-12 col-sm-12">
                                    <h6><strong>@lang('provider.upload_image')</strong></h6>
                                    <p>@lang('provider.upload_insurance')</p>
                                    <div class="col-sm-12 col-md-12 col-lg-12 p-0 document-upload">

                                        <div class="col-sm-12 col-md-6 col-xl-6 pl-0  mt-2">
                                            <div class="c-pointer">
                                                <div class="add-document image-placeholder w-100">
                                                    <img />
                                                    <input type="file" name="picture" id="picture"
                                                        class="upload-btn picture_upload" accept="image/x-png, image/jpeg">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-xl-6 pl-0  mt-2">
                                            <div class="c-pointer">
                                                <div class="add-document image-placeholder w-100">
                                                    <img />
                                                    <input type="file" name="picture1" id="picture1"
                                                        class="upload-btn picture_upload"
                                                        accept="image/x-png, image/jpeg">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary edit-profile mt-3 ml-3">@lang('provider.save') <i
                                    class="fa fa-check" aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>

                <div class="col-md-12 col-lg-12 col-sm-12 p-0 orders d-none">
                    <div class=" row m-0 orders_append">
                    </div>
                    <form class="orderForm  col-md-12 col-sm-12 pro-form order_vechile-form d-none">
                        <div class="col-md-12 col-sm-12 pro-form order_vechile-form d-none">
                            <h5 class="word-breakwrap"><strong>@lang('provider.add_vehicle')</strong></h5>
                            <div class="col-md-12 col-sm-12 pro-form dis-ver-center p-0">
                                <div class="col-md-12 col-sm-12 col-xl-6">
                                    <h5 class="word-breakwrap"><strong>@lang('provider.vehicle_make')</strong></h5>
                                    <input class="form-control vehicle_make" type="text" name="vehicle_make"
                                        placeholder="" required>
                                    <input type="hidden" name="admin_service" class="admin_service">
                                    <input type="hidden" name="id" class="id">
                                    <input type="hidden" name="category_id" class="category_id">
                                </div>
                                <div class="col-md-12 col-sm-12 col-xl-6">
                                    <h5 class="word-breakwrap"><strong>@lang('provider.vehicle_number')</strong></h5>
                                    <input class="form-control vehicle_no" type="text" name="vehicle_no"
                                        placeholder="" required>
                                </div>
                            </div>
                            <div class="col-md-12 pro-form dis-ver-center p-0 mt-2">
                                <div class="col-md-12 col-sm-12">
                                    <h6><strong>@lang('provider.upload_image')</strong></h6>
                                    <p>@lang('provider.upload_insurance')</p>
                                    <div class="col-sm-12 col-md-12 col-lg-12 p-0 document-upload">

                                        <div class="col-sm-12 col-md-6 col-xl-6 pl-0  mt-2">
                                            <div class="c-pointer">
                                                <div class="add-document image-placeholder w-100">
                                                    <img />
                                                    <input type="file" name="picture" id="picture"
                                                        class="upload-btn picture_upload"
                                                        accept="image/x-png, image/jpeg">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-xl-6 pl-0  mt-2">
                                            <div class="c-pointer">
                                                <div class="add-document image-placeholder w-100">
                                                    <img />
                                                    <input type="file" name="picture1" id="picture1"
                                                        class="upload-btn picture_upload"
                                                        accept="image/x-png, image/jpeg">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary edit-profile mt-3 ml-3">@lang('provider.save') <i
                                    class="fa fa-check" aria-hidden="true"></i></button>

                        </div>
                    </form>
                </div>
                <!-- <form class=" serviceForm  col-md-12 col-lg-12 col-sm-12 p-0 services  d-none">
                                <div class="col-md-12 col-lg-12 col-sm-12 p-0 services  services_append d-none height70vh">

                                </div> -->
                <form class=" serviceForm  col-md-12 col-lg-12 col-sm-12 p-0">

                    <input type="hidden" name="admin_service" class="admin_service" value="SERVICE">


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
                        <div class="form-group col-md-6 fare_type">
                            <label for="fare_type" class="col-xs-2 col-form-label fontsize">{{ __('Fare Type') }}</label>
                            <select name="fare_type" id="fare_type" class="form-control"> </select>

                        </div>
                    </div>
                    <div class="form-row base d-none">
                        <div class="form-group col-md-6">
                            <label for="base_fare"
                                class="col-xs-2 col-form-label fontsize">{{ __('Base Fare') }}</label><span
                                class="currency"></span>
                            <input type="text" class="form-control admin_price" name="base_fare" id="base_fare"
                                maxlength="10" placeholder="Enter Amount">
                        </div>
                    </div>

                    <div class="form-row mins d-none">
                        <div class="form-group col-md-6">
                            <label for="category"
                                class="col-xs-2 col-form-label fontsize">{{ __('Mins Fare') }}</label><span
                                class="currency"></span>
                            <input type="text" class="form-control admin_price" name="mins_fare" id="mins_fare"
                                maxlength="10" placeholder="Enter Amount">
                        </div>
                    </div>

                    <div class="form-row miles d-none">
                        <div class="form-group col-md-6">
                            <label for="category"
                                class="col-xs-2 col-form-label fontsize">{{ __('Miles Fare') }}</label><span
                                class="currency"></span>
                            <input type="text" class="form-control admin_price" name="miles_fare" id="miles_fare"
                                maxlength="10" placeholder="Enter Amount">
                        </div>
                    </div>

                    <div class="form-row  others d-none">
                        <div class="form-group col-md-6">
                            <label for="notify_status"
                                class="col-xs-2 col-form-label fontsize">{{ __('Service Name') }}</label>
                            <input type="text" class="form-control" id="service_name" name="service_name"
                                placeholder="Service Name" />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="fare_type_others"
                                class="col-xs-2 col-form-label fontsize">{{ __('Fare Type') }}</label>
                            <select name="fare_type_other" id="fare_type_others" class="form-control"> </select>

                        </div>

                        <div class="form-group col-md-6 hour_rate d-none">
                            <label for="notify_status"
                                class="col-xs-2 col-form-label fontsize">{{ __('Hourly Rate') }}</label>
                            <input type="number" class="form-control" id="hourly_rate" name="hourly_rate"
                                placeholder="Hourly Rate" />
                        </div>
                        <div class="form-group col-md-6 min_hours d-none">
                            <label for="notify_status"
                                class="col-xs-2 col-form-label fontsize">{{ __('Minimum Hours') }}</label>
                            <input type="number" class="form-control" id="minimum_hours" name="minimum_hours"
                                placeholder="Minimum hours" />
                        </div>
                        <div class="form-group col-md-6 base_price d-none">
                            <label for="notify_status"
                                class="col-xs-2 col-form-label fontsize">{{ __('Base Fare') }}</label>
                            <input type="number" class="form-control" id="base_fare_other" name="base_fare_other"
                                placeholder="Enter Amount" />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="notify_status"
                                class="col-xs-2 col-form-label fontsize">{{ __('Experience') }}</label>
                            <input type="text" class="form-control" id="experience" name="experience"
                                placeholder="Experience" />
                        </div>




                        <div class="form-group col-md-6">
                            <label for="notify_status"
                                class="col-xs-2 col-form-label fontsize">{{ __('Certifications') }}</label>
                            <input type="file" class="form-control" id="certification" name="certification" />
                            <img class = "user-img" height ="200px;" width ="200px;" />
                        </div>

                    </div>
                    <div class="form-group col-md-12">

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
                    <br>
                    <button type="submit" class="btn btn-primary  col-md-12 col-lg-3 col-sm-3">Add Service <i
                            class="fa fa-plus-square" aria-hidden="true"></i></button>

                </form>

                <br>
            </div>
        </div>

        <!-- Display the service list -->
        <div class="col-xs-12 col-sm-12 col-md-10 wrapper maxwidth">
            <div class="col-md-12 col-lg-12 col-sm-12 p-0 table-responsive-sm transport-history">
                <table id="service_grid" class="table  table-striped table-bordered w-100">
                    <thead>
                        <tr>
                            <th>@lang('provider.s.no')</th>
                            <th>{{ __('Service Category') }}</th>
                            <th>{{ __('Service SubCategory') }}</th>
                            <th>{{ __('Service') }}</th>
                            <th>{{ __('Fare') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>@lang('provider.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
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
        var transportdata = {};
        var service_list = {};

        var picture = '';
        var picture_ext = '';
        var picture1 = '';
        var picture1_ext = '';

        var trips_table = $('#service_grid');

        $(document).ready(function() {
            $('#service_grid').DataTable();
        });

        $('.picture_upload').on('change', function(e) {
            var files = e.target.files;
            var obj = $(this);
            if (files && files.length > 0) {

                if (obj.attr('id') == 'picture') {
                    picture_ext = (/[.]/.exec(files[0].name)) ? /[^.]+$/.exec(files[0].name)[0] : 'png';
                } else if (obj.attr('id') == 'picture1') {
                    picture1_ext = (/[.]/.exec(files[0].name)) ? /[^.]+$/.exec(files[0].name)[0] : 'png';
                }
                cropImage(obj, files[0], obj.closest('.image-placeholder').find('img'), function(data) {
                    if (obj.attr('id') == 'picture') {
                        picture = data;
                    } else if (obj.attr('id') == 'picture1') {
                        picture1 = data;
                    }
                });
            }
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

        $(".add-vechile").click(function() {
            $(".vechile-form").removeClass("d-none");
        });

        $('body').on('change', '.vehicle_id', function() {
            var capacity = $(this).find(':selected').data('value');
            if (capacity > 3) {
                $('.chair').removeClass('d-none');
            } else {
                $('.chair').addClass('d-none');
            }
        });

        //Set the datatable for my trip details
        trips_table = trips_table.DataTable({
            "processing": true,
            "serverSide": true,
            "ordering": false,
            "lengthChange": false,
            "ajax": {
                "url": getBaseUrl() + "/provider/listtotalservices",
                "type": "GET",
                "beforeSend": function(request) {
                    showLoader();
                },
                "headers": {
                    "Authorization": "Bearer " + getToken("provider")
                },
                data: function(data) {

                    var info = $('#service_grid').DataTable().page.info();
                    delete data.columns;
                    data.page = info.page + 1;
                    data.search_text = data.search['value'];

                },
                dataFilter: function(data) {
                    var json = parseData(data);

                    json.recordsTotal = json.responseData.total;
                    json.recordsFiltered = json.responseData.total;
                    json.data = json.responseData.data;
                    hideLoader();
                    return JSON.stringify(json); // return JSON string
                }
            },
            "columns": [{
                    "data": "id",
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    "data": "service_category",
                    render: function(data, type, row, meta) {
                        return data.service_category_name;
                    }
                },
                {
                    "data": "servicesub_category",
                    render: function(data, type, row, meta) {
                        return data.service_subcategory_name;
                    }
                },
                {
                    "data": "service_name"
                },
                {
                    "data": "providerservices",
                    render: function(data, type, row, meta) {
                        return row.providerservices[0] ? row.providerservices[0].base_fare : '';
                    }
                },
                {
                    "data": function(data, type, row) {

                        var status = 'INACTIVE';
                        var checked = '';
                        var button = '<button class="btn btn-warning btn-block">INACTIVE</button>';

                        $.each(data.providerservices, function(index, service) {
                            status = service.status;
                            if (status == 'ACTIVE') {
                                checked = 'checked';
                                button =
                                    '<button class="btn btn-primary btn-block">ACTIVE</button>';
                            }
                        });

                        //var provider_service_count = data.providerservices.length > 0 ?  data.providerservices[0].id : null;

                        /*var button ='<label class="switch"><input type="checkbox" ' + checked + ' value="" class="enable"><span class="slider round"></span></label>';*/

                        //var button = ;
                        return button;
                    }
                },
                {
                    "data": function(data, type, row, meta) {

                        var serviceId;

                        if (data && data.providerservices[0].id) {
                            serviceId = data.providerservices[0].id;
                        }

                        return "<button data-id='" + data.id +
                            "' class='btn btn-block btn-info edit'><i class='fa fa-edit'></i>Edit</button><button data-id='" +
                            serviceId +
                            "' class='btn btn-block btn-danger delete'><i class='fa fa-trash'></i>Delete</button>";
                    }
                },

            ],
            "drawCallback": function() {
                $('.pagination').css('float', 'right');
                $('.dataTables_paginate li').addClass('page-item');
                $('.dataTables_paginate li a').addClass('page-link');
                $(trips_table.table().container()).removeClass('form-inline');
                var info = $(this).DataTable().page.info();
                if (info.pages <= 1) {
                    $('.dataTables_paginate').hide();
                    $('.dataTables_info').hide();
                } else {
                    $('.dataTables_paginate').show();
                    $('.dataTables_info').show();
                }
            }
        });

        $('body').on('click', '.edit', function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');

            window.location.replace('/provider/service-list/' + id + '/edit');

        });

        $('body').on('click', '.delete', function() {
            var id = $(this).data('id');

            //var type = $(this).data('type');
            var result = confirm("Are You sure Want to delete?");
            $.ajax({
                type: "Delete",
                url: getBaseUrl() + "/provider/delete/service/" + id,
                headers: {
                    Authorization: "Bearer " + getToken("provider")
                },
                'beforeSend': function(request) {
                    showInlineLoader();
                },
                success: function(data) {
                    var result = data.responseData;
                    var data = parseData(data).responseData;
                    alertMessage("Success", "Deleted Successfully", "success");
                    var providerdata = localStorage.getItem('provider');
                    providerdata = JSON.parse(decodeHTMLEntities(providerdata));
                    //providerdata.is_document = 0;
                    //localStorage.setItem("provider", JSON.stringify(providerdata));
                    setTimeout(function() {
                        window.location.replace('/provider/myservice');
                    }, 1000);
                }
            });
        });

        $('body').on('click', '.enable', function(e) {

            e.preventDefault();
            //Todo : Need to work enable disable
        });

        $('body').on('click', '#myservices', function() {
            $('div.dz-image').remove();
            var active_id = $(this).data('value');
            $(".service-box").removeClass("service-box-active");
            $('.service-box' + active_id).addClass("service-box-active");
            $(".vechile-form").removeClass("d-none");
            $('.category_id').val(active_id);
            var servicelist = service_list[active_id];
            html = '<option value="">--Please Select --</option>';
            if (servicelist.length != 0) {
                $.each(servicelist, function(k, v) {
                    html += '<option value="' + v.id + '" data-value="' + v.capacity + '">' + v
                        .vehicle_name + '</option>';
                });
            }
            $('.vehicle_id').html(html);
            if (transportdata[active_id]) {
                var transport = transportdata[active_id].providervehicle;

                $('.transportForm').find('input[name="picture"]').closest('.image-placeholder').find('img').attr(
                    'src', transport.picture);
                $('.transportForm').find('input[name="picture1"]').closest('.image-placeholder').find('img').attr(
                    'src', transport.picture1);
                $.each(transport, function(key, value) {
                    $("." + key).val(value);
                });
                if (transport.wheel_chair == 1) {
                    $('#wheel_chair').attr('checked', true);
                }
                if (transport.child_seat == 1) {
                    $('#child_seat').attr('checked', true);
                }

                $('.vehicle_id').val(transport.vehicle_service_id).change();
            } else {
                $('.transportForm')[0].reset();
                $('.id').val('');
                $('#wheel_chair,#child_seat').attr('checked', false);
                $('img').attr('src', '');
                $('.chair').addClass('d-none');

            }
        });

        $('body').on('click', '.order_service-box', function() {
            $('div.dz-image').remove();
            var active_id = $(this).data('value');
            $(".order_service-box").removeClass("service-box-active");
            $('.order_service-box' + active_id).addClass("service-box-active");
            $(".order_vechile-form").removeClass("d-none");
            $('.category_id').val(active_id);
            if (transportdata[active_id]) {
                var transport = transportdata[active_id].providervehicle;

                $('.orderForm').find('input[name="picture"]').closest('.image-placeholder').find('img').attr('src',
                    transport.picture);
                $('.orderForm').find('input[name="picture1"]').closest('.image-placeholder').find('img').attr('src',
                    transport.picture1);

                $.each(transport, function(key, value) {
                    $("." + key).val(value);
                });
            } else {
                $('.orderForm')[0].reset();
                $('.id').val('');
                $('.orderForm').find('input[name="picture"]').closest('.image-placeholder').find('img').attr('src',
                    '');
                $('.orderForm').find('input[name="picture1"]').closest('.image-placeholder').find('img').attr('src',
                    '');

            }
        });

        $(".show-service").click(function() {
            $(".sub-service").removeClass("d-none");
        });


        if ($('#TRANSPORT').is(":checked")) {
            transport($('#TRANSPORT'));
        } else if ($('#ORDER').is(":checked")) {
            order($('#ORDER'));
        } else if ($('#SERVICE').is(":checked")) {
            service($('#SERVICE'));
        }

        $('#TRANSPORT').change(function() {
            $(".vechile-form").addClass("d-none");
            if ($(this).is(":checked")) {
                transport($(this));
            } else {
                $('.tranport').removeClass('d-none');
            }
        });

        $('#ORDER').change(function() {
            if ($(this).is(":checked")) {
                order($(this));
            } else {
                $('.orders').removeClass('d-none');
            }
        });

        $('#SERVICE').change(function() {
            if ($(this).is(":checked")) {
                service($(this));
            } else {
                $('.services').removeClass('d-none');
            }
        });


        function transport(obj) {
            $(".vechile-form").addClass("d-none");
            if (obj.is(":checked")) {
                var admin_service = obj.val();
                $('.admin_service').val(admin_service);
                $('.orders').addClass('d-none');
                $('.tranport ').removeClass('d-none');
                $('.services').addClass('d-none');
                $.ajax({
                    url: getBaseUrl() + "/provider/ridetype",
                    type: "get",
                    headers: {
                        Authorization: "Bearer " + getToken("provider")
                    },
                    'beforeSend': function(request) {
                        showInlineLoader();
                    },
                    success: (data, textStatus, jqXHR) => {

                        var response = data.responseData;
                        var html = ``;
                        var check_data = 0;
                        if (response.length != 0) {
                            for (var i in response) {
                                var checked = '';
                                transportdata[response[i].id] = response[i].providerservice;
                                service_list[response[i].id] = response[i].servicelist;
                                if (response[i].providerservice) {
                                    checked = 'checked';
                                    check_data = 1;
                                }
                                html += `<div class="col-md-4 col-sm-4 col-xl-2 p-0 ">
                                  <div class="dis-column service-box service-box` + response[i].id + `" data-value="` +
                                    response[i].id + `" id = "myservices">
                                     <h5 class="word-breakwrap"><strong>` + response[i].ride_name + `</strong></h5>
                                     <label class="toggleSwitch nolabel" onclick="">
                                     <input type="checkbox" ` + checked + ` />
                                     <span>
                                     <span>OFF</span>
                                     <span>ON</span>
                                     </span>
                                     <a></a>
                                     </label>
                                     </div>
                                     </div>`
                            }
                            $('.transport_append').html(html);


                        }
                        if (check_data == 1) {
                            $('#myservices').trigger('click');
                        }

                        hideInlineLoader();
                    },
                    error: function(jqXHR, errorThrown) {
                        hideInlineLoader();
                    }

                });

            } else {
                $('.tranport').removeClass('d-none');
            }
        }

        function order(obj) {
            $(".vechile-form").addClass("d-none");

            var admin_service = obj.val();
            $('.admin_service').val(admin_service);
            $('.orders').removeClass('d-none');
            $('.tranport').addClass('d-none');
            $('.services').addClass('d-none');
            $.ajax({
                url: getBaseUrl() + "/provider/shoptype",
                type: "get",
                headers: {
                    Authorization: "Bearer " + getToken("provider")
                },
                'beforeSend': function(request) {
                    showInlineLoader();
                },
                success: (data, textStatus, jqXHR) => {

                    var response = data.responseData;
                    var html = ``;
                    var check_data = 0;
                    if (response.length != 0) {
                        for (var i in response) {
                            var checked = '';
                            transportdata[response[i].id] = response[i].providerservice;
                            if (response[i].providerservice) {
                                checked = 'checked';
                                check_data = 1;
                            }
                            html += `<div class="col-md-4 col-sm-4 col-xl-2 p-0">
                        <div class="dis-column service-box order_service-box order_service-box` + response[i].id +
                                `" data-value="` + response[i].id + `" id = "order_service">
                        <h5 class="word-breakwrap"><strong>` + response[i].name + `</strong></h5>
                        <label class="toggleSwitch nolabel show-service">
                        <input type="checkbox" ` + checked + `/>
                        <span>
                        <span>OFF</span>
                        <span>ON</span>
                        </span>
                        <a></a>
                        </label>
                        </div>
                        </div>`
                        }

                        $('.orders_append').html(html);
                    }
                    if (check_data == 1) {
                        $('#order_service').trigger('click');
                    }
                    hideInlineLoader();
                },
                error: function(jqXHR, errorThrown) {
                    hideInlineLoader();
                }

            });
        }


        $.ajax({
            url: getBaseUrl() + "/provider/service/fare_type-list",
            type: "GET",
            headers: {
                Authorization: "Bearer " + getToken("provider")
            },
            success: function(data) {
                $("#fare_type").empty().append('<option value="">select</option>');
                $("#fare_type_others").empty().append('<option value="">select</option>');
                $.each(data.responseData.fareType, function(key, item) {
                    $("#fare_type").append('<option value="' + item + '">' + item + '</option>');
                    $("#fare_type_others").append('<option value="' + item + '">' + item + '</option>');

                });
            }
        });

        $('#fare_type').on('change', function() {
            cal = $(this).val();
            priceInputs(cal);
        });

        $('#fare_type_others').on('change', function() {
            cal = $(this).val();
            priceInputsForOthers(cal);
        });

        function priceInputsForOthers(cal) {
            if (cal == 'FIXED') {
                $('.hour_rate, .min_hours').addClass('d-none');
                $('.base_price').removeClass('d-none');
                $('.base_price').show();
            }
            /*else if(cal == 'DISTANCETIME') {
                       $('.base, .mins, .miles').removeClass('d-none');
                       $('.base, .mins, .miles').show();
                   }*/
            else if (cal == 'HOURLY') {
                $('.base_price').addClass('d-none');
                $('.hour_rate, .min_hours').removeClass('d-none');
                $('.hour_rate, .min_hours').show();
            } else {
                $('.hour_rate, .min_hours, .base_price').addClass('d-none');
            }
        }

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

        $.ajax({
            url: getBaseUrl() + "/provider/service/categories-list",
            type: "GET",
            headers: {
                Authorization: "Bearer " + getToken("provider")
            },
            success: function(data) {

                $("#service_category_id").empty().append('<option value="">select</option>');
                $.each(data.responseData, function(key, item) {
                    $("#service_category_id").append('<option value="' + item.id + '">' + item
                        .service_category_name + '</option>');
                });
            }
        });

        $('#service_category_id').on('change', function() {
            var category_id = $("#service_category_id").val();
            $.ajax({
                type: "GET",
                url: getBaseUrl() + "/provider/service/subcategories-list/" + category_id,
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
                    $("#service_id").append('<option value="other">Others</option>');
                    hideInlineLoader();
                }
            });
        });

        $('#service_id').on('change', function() {
            if ($(this).val() == 'other') {
                $('.others').removeClass('d-none');
                $('.others').show();
                $('.fare_type').addClass('d-none');
                $('.base').addClass('d-none');
                $('.mins').addClass('d-none');
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

        function service(obj) {
            $(".vechile-form").addClass("d-none");
            $('.services').removeClass('d-none');
            $('.orders').addClass('d-none');
            $('.tranport').addClass('d-none');
            $.ajax({
                url: getBaseUrl() + "/provider/totalservices",
                type: "get",
                headers: {
                    Authorization: "Bearer " + getToken("provider")
                },
                'beforeSend': function(request) {
                    showInlineLoader();
                },
                success: (data, textStatus, jqXHR) => {
                    var response = data.responseData;
                    var html = ``;
                    if (response.length != 0) {
                        var k = 0;
                        for (var i in response) {

                            var j = 0;

                            $.each(response[i]['name'], function(key, value) {
                                if (key == 0) {
                                    html += `<h6 `;
                                    if (response[i]["fare_type"][j] != 'Not Price') {

                                        html += `class="` + i + `"`;
                                    } else {
                                        html += `class="` + i + `  d-none"`;

                                    }

                                    html += `><strong>` + i + `</strong></h6>
                                <div  `;
                                    if (response[i]["fare_type"][j] != 'Not Price') {

                                        html += `class="sub-service"`;
                                    } else {
                                        html += `class="sub-service  d-none"`;

                                    }

                                    html += ` >
                                <div class="row m-0 ">
                                <input type="hidden" name="admin_service" class="admin_service" value="SERVICE">
                                `;
                                }
                                var checked = '';
                                if (response[i]["provider_service_id"][j]) {
                                    checked = 'checked';
                                }
                                var service_contentcss = "service-box-1";
                                if (response[i]["fare_type"][j] == 'HOURLY') {
                                    service_contentcss = "service-box-2";
                                } else if (response[i]["fare_type"][j] == 'DISTANCETIME') {
                                    service_contentcss = "service-box-3";
                                }
                                if (response[i]["fare_type"][j] != 'Not Price') {
                                    html += `<input type="hidden" class="provider_service_id" value="` +
                                        response[i]["provider_service_id"][j] + `" />`;
                                    html += `<div class="col-md-6 col-sm-12 col-xl-4 p-0">
                                        <div class="` + service_contentcss + ` dis-column ">
                                        <div class="dis-column">
                                        <h5 class="mr-2 word-breakwrap p-1"><strong>` + response[i]["name"][j] + `</strong></h5>
                                        <label class="toggleSwitch nolabel" onclick="">
                                        <input type="checkbox" name="service_id[` + k + `]" value="` + response[i][
                                        "id"
                                    ][j] + `" ` + checked + ` />
                                        <input type="hidden" name="category_id[` + k + `]"  value="` + response[i][
                                        "category_id"
                                    ][j] + `" />
                                        <input type="hidden" name="sub_category_id[` + k + `]" value="` + response[i][
                                        "sub_category_id"
                                    ][j] + `" />
                                        <span>
                                        <span>OFF</span>
                                        <span>ON</span>
                                        </span>
                                        <a></a>
                                        </label>
                                        </div>
                                        `;
                                    var readonly = "";
                                    if (response[i]["price_choose"][j] == 'admin_price')
                                        readonly = 'readonly';
                                    if (response[i]["fare_type"][j] == 'FIXED') {
                                        html += `<div class="dis-row pricing mt-2">
                                    <span>BASE FARE</span>
                                    <span>` + response[i]["currency_symbol"][j] + `</span>
                                    <input class="form-control" type="text" name="base_fare[` + k + `]" value="` +
                                            response[i]["price"][j] + `" ` + readonly + ` placeholder="Enter Amount"
                                    maxlength="10"> </div>`;
                                    } else if (response[i]["fare_type"][j] == 'HOURLY') {
                                        html += `
                                    <div class="dis-row pricing mt-2">
                                    <span>BASE FARE</span>
                                    <span>` + response[i]["currency_symbol"][j] + `</span>
                                    <input class="form-control" type="text" name="base_fare[` + k + `]" value="` +
                                            response[i]["price"][j] + `" ` + readonly + ` placeholder="Enter Amount"
                                    maxlength="10"></div>
                                    <div class="dis-row pricing mt-2">
                                    <span>MINS FARE</span>
                                    <span>` + response[i]["currency_symbol"][j] + `</span>
                                    <input class="form-control" type="text" name="per_mins[` + k + `]" value="` +
                                            response[i]["per_mins"][j] + `" ` + readonly + ` placeholder="Enter Amount"
                                    maxlength="10"></div>
                                `;
                                    } else if (response[i]["fare_type"][j] == 'DISTANCETIME') {
                                        html += `
                                    <div class="dis-row pricing mt-2">
                                    <span>BASE FARE</span>
                                    <span>` + response[i]["currency_symbol"][j] + `</span>
                                    <input class="form-control" type="text" name="base_fare[` + k + `]" value="` +
                                            response[i]["price"][j] + `" ` + readonly + ` placeholder="Enter Amount"
                                    maxlength="10"> </div>
                                    <div class="dis-row pricing mt-2">
                                    <span>MINS FARE</span>
                                    <span>` + response[i]["currency_symbol"][j] + `</span>
                                    <input class="form-control" type="text" name="per_mins[` + k + `]" value="` +
                                            response[i]["per_mins"][j] + `" ` + readonly + ` placeholder="Enter Amount"
                                    maxlength="10"></div>
                                    <div class="dis-row pricing mt-2">
                                    <span>MILES FARE</span>
                                    <span>` + response[i]["currency_symbol"][j] + `</span>
                                    <input class="form-control" type="text" name="per_miles[` + k + `]" value="` +
                                            response[i]["per_mile"][j] + `" ` + readonly + ` placeholder="Enter Amount"
                                    maxlength="10">
                                    </div>`;
                                    }


                                    html += `
                                        </div>
                                        </div>`;
                                    j++;
                                    k++;
                                }
                            });
                            html += `</div></div>`;

                            $('.services_append').html(html);
                        }
                    }
                    hideInlineLoader();
                },
                error: function(jqXHR, errorThrown) {
                    hideInlineLoader();
                }
            });
        }

        $('.transportForm').validate({
            errorElement: 'span',
            errorClass: 'help-block txt-red',
            focusInvalid: false,
            rules: {
                vehicle_make: {
                    required: true
                },
                vehicle_model: {
                    required: true
                },
                vehicle_year: {
                    required: true
                },
                vehicle_service_id: {
                    required: true
                },
                vehicle_no: {
                    required: true
                },
                vehicle_id: {
                    required: true
                },
            },
            messages: {
                vehicle_make: {
                    required: "Make is required."
                },
                vehicle_model: {
                    required: "Model is required."
                },
                vehicle_year: {
                    required: "Year is required."
                },
                vehicle_service_id: {
                    required: " Type is required."
                },
                vehicle_no: {
                    required: " Number is required."
                },
                vehicle_id: {
                    required: " Type is required."
                },
            },
            highlight: function(element) {
                $(element).closest('.form-group').addClass('has-error');
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },
            submitHandler: function(form, e) {
                var data = new FormData();
                var formGroup = $(".transportForm").serialize().split("&");
                for (var i in formGroup) {
                    var params = formGroup[i].split("=");
                    data.append(params[0], decodeURIComponent(params[1]));
                }
                if (picture != "") data.append('picture', picture, 'picture' + '.' + picture_ext);
                if (picture1 != "") data.append('picture1', picture1, 'picture1' + '.' + picture1_ext);

                picture = "";
                picture1 = "";

                var provider_vechile_id = $('.id').val();
                if (!provider_vechile_id)
                    var url = getBaseUrl() + "/provider/vechile/add";
                else
                    var url = getBaseUrl() + "/provider/vehicle/edit";

                savefunction(data, url)
            }
        });

        $('.orderForm').validate({
            errorElement: 'span',
            errorClass: 'help-block txt-red',
            focusInvalid: false,
            rules: {
                vehicle_make: {
                    required: true
                },
                vehicle_no: {
                    required: true
                },
            },
            messages: {
                vehicle_make: {
                    required: "Make is required."
                },
                vehicle_no: {
                    required: " Number is required."
                },
            },
            highlight: function(element) {
                $(element).closest('.form-group').addClass('has-error');
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },
            submitHandler: function(form, e) {

                var data = new FormData();
                var formGroup = $(".orderForm").serialize().split("&");
                for (var i in formGroup) {
                    var params = formGroup[i].split("=");
                    data.append(params[0], decodeURIComponent(params[1]));
                }

                if (picture != "") data.append('picture', picture, 'picture' + '.' + picture_ext);
                if (picture1 != "") data.append('picture1', picture1, 'picture1' + '.' + picture1_ext);

                picture = "";
                picture1 = "";

                var provider_vechile_id = $('.id').val();
                if (!provider_vechile_id)
                    var url = getBaseUrl() + "/provider/vechile/add";
                else
                    var url = getBaseUrl() + "/provider/vehicle/edit";
                savefunction(data, url)
            }
        });

        var blobImage = '';
        var blobName = '';

        $('#certification').on('change', function(e) {
            var files = e.target.files;
            if (files && files.length > 0) {
                blobName = files[0].name;
                cropImage($(this), files[0], $('.user-img'), function(data) {
                    blobImage = data;
                });
            }
        });

        $(document).ready(function() {
            //Added value on page load
            $('.service_status').attr('value', '1')
            $('#hidden_check').attr('value', '1')

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

        $('.serviceForm').validate({
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
                var formGroup = $(".serviceForm").serialize().split("&");

                if (blobImage != "")
                    data.append('certification', blobImage, blobName);

                for (var i in formGroup) {
                    var params = formGroup[i].split("=");
                    data.append(decodeURIComponent(params[0]), decodeURIComponent(params[1]));
                }


                //var provider_service_id = $('.provider_service_id').val();
                var url = getBaseUrl() + "/provider/vechile/addservice";
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

                    $('.serviceForm')[0].reset();

                    setTimeout(function() {
                        location.reload();
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
