<div class="row mb-4">
    <div class="col-md-12">
        <div class="card-header border-bottom">
            <h6 class="m-0">Request Details</h6>
        </div>
        <div class="form_pad">
            <input type="hidden" name="id" value="{{ $id }}">
            <div class="row" id="details">

            </div>
            <br>
            <button type="reset" class="btn btn-danger cancel">Close</button>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var body = '';
        var id = $("input[name=id]").val();
        var url = getBaseUrl() + "/admin/service/requesthistory/" + id;
        $.ajax({
            url: url,
            type: "GET",
            async: false,
            headers: {
                Authorization: "Bearer " + getToken("admin")
            },
            success: function(data) {

                var getData = data.responseData;
                var beforeImageShow = `<dt>{{ __('admin.request.before') }}</dt>
                                <dt> &nbsp;&nbsp;&nbsp;&nbsp;No Image available</dt>`;
                var afterImageShow = `<dt>{{ __('admin.request.after') }}</dt>
                                <dt>&nbsp;&nbsp;&nbsp;&nbsp; No Image available</dt>`;
                if (getData.before_image != null) {
                    beforeImageShow = `<dt>{{ __('admin.request.before') }}</dt>
                                <dt> <img src="` + getData.before_image + `" style="width:280px;" /></dt>`;
                }
                if (getData.after_image != null) {
                    afterImageShow = `<dt>{{ __('admin.request.after') }}</dt>
                                <dt> <img src="` + getData.after_image + `" style="width:280px;" /></dt>`;
                }
                body = `   <div class="col-md-6">
                        <dl class="row">

                        <dt class="col-sm-5">{{ __('admin.request.Booking_ID')  }}</dt>
                        <dt class="col-sm-1"> : </dt>
                        <dd class="col-sm-6">` + getData.booking_id + `</dd>

                        <dt class="col-sm-5">{{ __('admin.request.User_Name')  }}</dt>
                        <dt class="col-sm-1"> : </dt>
                        <dd class="col-sm-6">` + getData.user.first_name + ` ` + getData.user.last_name + `</dd>

                        <dt class="col-sm-5">{{ __('admin.request.Provider_Name')  }}</dt>
                        <dt class="col-sm-1"> : </dt>
                        <dd class="col-sm-6">` + (getData.provider != null ? getData.provider.first_name : '') + ` ` +
                    (getData.provider != null ? getData.provider.last_name : '') + `</dd>

                        <dt class="col-sm-5">{{ __('admin.request.total_distance')  }}</dt>
                        <dt class="col-sm-1"> : </dt>
                        <dd class="col-sm-6">` + getData.distance + `</dd>

                        <dt class="col-sm-5">{{ __('admin.request.service.service_name') }}</dt>
                        <dt class="col-sm-1"> : </dt>
                        <dd class="col-sm-6">` + getData.service.service_name + `</dd>

                        <dt class="col-sm-5">{{ __('admin.request.service.category') }}</dt>
                        <dt class="col-sm-1"> : </dt>
                        <dd class="col-sm-6">` + getData.service_category.service_category_name + `</dd>

                        <dt class="col-sm-5">{{ __('admin.request.service.user_rating') }}</dt>
                        <dt class="col-sm-1"> : </dt>
                        <dd class="col-sm-6">` + (getData.user ? getData.user.rating : '') + `</dd>

                        <dt class="col-sm-5">{{ __('admin.request.service.provider_rating') }}</dt>
                        <dt class="col-sm-1"> : </dt>
                        <dd class="col-sm-6">` + (getData.provider ? getData.provider.rating : '') + `</dd>

                        <dt class="col-sm-5">{{ __('admin.request.service.status') }}</dt>
                        <dt class="col-sm-1"> : </dt>
                        <dd class="col-sm-6">` + getData.status + `</dd>

                       </dl>
                       </div>
                       <div class="col-md-6">
                       <dl class="row">
                            <div class="col-md-12">
                                <dl class="row">` + beforeImageShow + `

                            </div>
                            <div class="col-md-12">
                                <dl class="row"> ` + afterImageShow + `
                                </div>
                            </div>
                            </div>
                        </div>`;
                $('#details').empty().append(body);
            }
        });

        $('.cancel').on('click', function() {
            $(".crud-modal").modal("hide");
        });

    });
</script>
