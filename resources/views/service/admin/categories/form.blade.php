<div class="row mb-4">
    <div class="col-md-12">
        <div class="card-header border-bottom">
            @if (empty($id))
                @php($action_text = __('service.admin.categories.add'))
            @else
                @php($action_text = __('service.admin.categories.edit'))
            @endif
            <h6 class="m-0"style="margin:10!important;">{{ $action_text }}</h6>
        </div>
        <div class="form_pad">
            <form class="validateForm" files="true">
                @if (!empty($id))
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="id" value="{{ $id }}">
                @endif
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="service_category_name">{{ __('service.admin.categories.name') }}</label>
                        <input type="text" class="form-control" id="service_category_name"
                            name="service_category_name" placeholder="{{ __('service.admin.categories.name') }}"
                            value="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="service_category_alias_name">{{ __('service.admin.categories.alias') }}</label>
                        <input type="text" class="form-control" id="alias_name" name="service_category_alias_name"
                            placeholder="{{ __('service.admin.categories.alias') }}" value="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="picture">{{ __('service.admin.categories.image') }}</label>
                        <div class="image-placeholder w-100">
                            <img width="100" height="100" />
                            <input type="file" name="picture" class="upload-btn picture_upload">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="service_category_id">{{ __('service.admin.categories.favorites') }}</label>
                        <input type="checkbox" class="form-control" id="favorites" name="favorites" value="1">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="service_category_id">{{ __('service.admin.subcategories.price') }}</label>
                        <select name="price_choose" id="price_choose" class="form-control">
                            <option value="admin_price">Admin Price</option>
                            <option value="provider_price">Provider Price</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="service_category_status" class="col-xs-2 col-form-label">{{ __('service.admin.categories.status') }}</label>
                        <select name="service_category_status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>


                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="picture" class="col-xs-2 col-form-label">{{ __('admin.picture') }}</label>
                        <div class="image-placeholder w-100">
                            <img width="100" height="100" />
                            <input type="file" name="picture" class="upload-btn picture_upload">
                        </div>
                    </div>
                </div>


                <button type="submit" class="btn btn-accent">{{ $action_text }}</button>
                <button type="reset" class="btn btn-danger cancel">Cancel</button>

            </form>
        </div>
    </div>
</div>


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
        if ($("input[name=id]").length) {

            id = "/" + $("input[name=id]").val();
            var url = getBaseUrl() + "/admin/service/categories" + id;
            setData(url);
        }

        $('.validateForm').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                // vehicle_type: { required: true },
                service_category_name: {
                    required: true
                },
                service_category_alias_name: {
                    required: true
                },
                //picture: { required: true},
                service_category_order: {
                    required: true
                },
                service_category_status: {
                    required: true
                },
            },

            messages: {
                // vehicle_type: { required: "Vehicle Type is required." },
                service_category_name: {
                    required: "Category Name is required."
                },
                service_category_alias_name: {
                    required: "Category Alias Name is required."
                },
                //picture: { required: "Image is required." },
                service_category_order: {
                    required: "Order required."
                },
                service_category_status: {
                    required: "Status required."
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

                var favorites = $('#favorites').is(':checked');
                for (var i in formGroup) {
                    var params = formGroup[i].split("=");
                    data.append(params[0], decodeURIComponent(params[1]));
                }
                if (blobImage != "") data.append('picture', blobImage, blobName);

                if (favorites == true) {
                    var checked = 1;
                } else {
                    var checked = 0;
                }

                data.append('favorites', checked);

                var url = getBaseUrl() + "/admin/service/categories" + id;

                saveRow(url, table, data);

            }
        });

        $('.cancel').on('click', function() {
            $(".crud-modal").modal("hide");
        });

    });
</script>
