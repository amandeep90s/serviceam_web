@extends('common.admin.layout.base')

@section('title') Update Profile @stop

@section('styles')
    @parent

    <link rel="stylesheet" type='text/css' href="{{ asset('assets/plugins/cropper/css/cropper.css') }}" />
    <style>
        .image-placeholder img {
            width: auto !important;
            height: 100% !important;
        }
    </style>
@stop

@section('content')
    @include('common.admin.includes.image-modal')
    <div class="main-content-container container-fluid px-4">
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Update Profile</span>
                <h3 class="page-title">Update Profile</h3>
            </div>
        </div>
        <div class="row mb-4 mt-20">
            <div class="col-md-12">
                <div class="card card-small">
                    <div class="card-header border-bottom">
                        <h6 class="m-0">Update Profile</h6>
                    </div>
                    <div class="col-md-12">
                        <form class="validateForm">
                            @csrf()
                            @if (!empty($id))
                                <input type="hidden" name="_method" value="PATCH">
                                <input type="hidden" name="id" value="{{ $id }}">
                            @endif
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="name">{{ __('admin.name') }} </label>
                                    <input class="form-control" type="text" value="" name="name" id="name"
                                        placeholder=" Name">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="email">{{ __('admin.email') }} </label>
                                    <input class="form-control" type="text" value="" name="email" id="email"
                                        placeholder=" email">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="picture">{{ __('admin.picture') }} </label>
                                    <div class="image-placeholder w-100">
                                        <img width="100" height="100" />
                                        <input type="file" name="picture" class="upload-btn picture_upload">
                                    </div>
                                </div>
                            </div>
                            @if (Helper::getDemomode() != 1)
                                <button type="submit" class="btn btn-accent float-right">Update Profile</button>
                            @endif
                            <br><br><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    @parent



    <style type="text/css">
        .dz-preview .dz-image img {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover;
        }
    </style>

    <script src="{{ asset('assets/plugins/cropper/js/cropper.js') }}"></script>
    <script src="{{ asset('assets/layout/js/crop.js') }}"></script>
    <script>
        var blobImage = '';
        var blobName = '';


        $(document).ready(function() {

            $('.picture_upload').on('change', function(e) {
                var files = e.target.files;
                var obj = $(this);
                if (files && files.length > 0) {
                    blobName = files[0].name;
                    cropImage(obj, files[0], obj.closest('.image-placeholder').find('img'), function(data) {
                        blobImage = data;
                    });
                }
            });

            basicFunctions();

            var id = "";

            //List the profile details
            $.ajax({
                type: "GET",
                url: getBaseUrl() + "/admin/profile",
                headers: {
                    Authorization: "Bearer " + getToken("admin")
                },
                success: function(data) {
                    var result = data.responseData;
                    $('#name').val(result.name);
                    $('#email').val(result.email);
                    $('.image-placeholder img').attr('src', result.picture);

                }
            });

            $('.validateForm').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    name: {
                        required: true
                    },
                    email: {
                        required: true
                    },
                    //picture: { required: true },
                },

                messages: {
                    name: {
                        required: "Name is required."
                    },
                    email: {
                        required: "Email is required."
                    },
                    //picture: { required: "Picture is required." },

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

                    if (blobImage != "") data.append('picture', blobImage, blobName);

                    var url = getBaseUrl() + "/admin/profile";

                    saveRow(url, null, data, 'admin', '/admin/dashboard');

                }
            });


            $('.cancel').on('click', function() {
                $(".crud-modal").modal("hide");
            });

        });
    </script>

@stop
