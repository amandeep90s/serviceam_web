<div class="row mb-4">
    <div class="col-md-12">
        <div class="card-header border-bottom">
            @if (empty($id))
                @php($action_text = __('admin.add'))
            @else
                @php($action_text = __('admin.edit'))
            @endif
            <h6 class="m-0" style="margin:10!important;">{{ $action_text }} Days</h6>
        </div>
        <div class="p-2">
            <form class="validateForm">
                @csrf()
                @if (!empty($id))
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="id" value="{{ $id }}">
                @endif

                @if (count(Helper::getServiceList()) > 1)
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="notify_type" class="col-xs-2 col-form-label">{{ __('admin.service') }} </label>
                            <select name="service" class="form-control">
                                <option value="">Select</option>
                                @foreach (Helper::getServiceList() as $service)
                                    <option value={{ $service }}>{{ $service }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @else
                    <input type="hidden" name ="service"
                        value="{{ Helper::getServiceList()[key(Helper::getServiceList())] }}" />
                @endif

                <div class="form-row">
                    <div class="form-group col-md-10">
                        <label for="title"
                            class="col-xs-2 col-form-label">{{ __('admin.notification.days') }}</label>
                        <input type="number" class="form-control" autocomplete="off" value="{{ old('days') }}"
                            name="days" required id="days" placeholder="{{ __('admin.notification.days') }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-10">
                        <label for="notify_status"
                            class="col-xs-2 col-form-label">{{ __('admin.notification.notify_status') }}</label>
                        <select name="status" class="form-control">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>


                <br>
                <button type="submit" class="btn btn-accent">{{ $action_text }}</button>
                <button type="reset" class="btn btn-danger cancel">Cancel</button>

            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {


        basicFunctions();
        var id = "";
        var data = new FormData();
        if ($("input[name=id]").length) {
            id = "/" + $("input[name=id]").val();
            var url = getBaseUrl() + "/admin/notification/days" + id;
            setData(url);
        }
        $('.cancel-image').hide();
        $('.validateForm').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                notify_type: {
                    required: true
                },
            },
            messages: {
                notify_type: {
                    required: "Day is required."
                },

            },
            highlight: function(element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },
            submitHandler: function(form, ev) {
                var formGroup = $(".validateForm").serialize().split("&");


                for (var i in formGroup) {
                    var params = formGroup[i].split("=");
                    data.append(params[0], decodeURIComponent(params[1]));
                }

                var url = getBaseUrl() + "/admin/notification/days" + id;
                saveRow(url, table, data);
            }
        });

        $('.cancel').on('click', function() {
            $(".crud-modal").modal("hide");
        });


    });
</script>
