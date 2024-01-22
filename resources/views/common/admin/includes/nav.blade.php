<div class="nav-wrapper">
  <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link nav-title">
        <span>ADMIN DASHBOARD</span>
      </a>
    </li>

    @permission('dashboard-menus')
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/dashboard') }}">
          <i class="material-icons">dashboard</i>
          <span>Dashboard</span>
        </a>
      </li>
    @endpermission


    @permission('dispatcher-panel')
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/dispatcher-panel') }}">
          <i class="material-icons">local_shipping</i>
          <span>Dispatcher Panel</span>
        </a>
      </li>
    @endpermission
    @permission('dispute-list')
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#collapse1" aria-expanded="true">
          <i class="material-icons">directions_run</i>
          <span class="menudrop_icon">Dispute Panel</span>
        </a>
        <div id="collapse1" class="collapse in" style="">
          <a class="nav-link" href="{{ url('/admin/dispute_list') }}">
            <i class="material-icons">person_pin</i>
            <span> Dispute Reason</span>
          </a>

          @if (Helper::checkService('SERVICE'))
            <a class="nav-link " href="{{ url('/admin/service-dispute') }}">
              <i class="material-icons">format_paint</i>
              <span> Service Dispute Requests</span>
            </a>
          @endif

        </div>
      </li>
    @endpermission
    @permission('heat-map')
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/heatmap') }}">
          <i class="material-icons">map</i>
          <span>Heat Map</span>
        </a>
      </li>
    @endpermission
    @permission('god-eye')
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/godsview') }}">
          <i class="material-icons">remove_red_eye</i>
          <span>God's View</span>
        </a>
      </li>
    @endpermission
    @permission('user-list')
      <li class="nav-item">
        <a class="nav-link nav-title">
          <span>MEMBERS</span>
        </a>
      </li>
    @endpermission
    <li class="nav-item">
      @permission('role-list')
        <a class="nav-link" data-toggle="collapse" href="#collapse2" aria-expanded="true">
          <i class="material-icons">face</i>
          <span class="menudrop_icon">Roles</span>
        </a>
      @endpermission
      <div id="collapse2" class="collapse in" style="">
        @permission('role-list')
          <a class="nav-link " href="{{ url('/admin/roles') }}">
            <i class="material-icons">accessibility</i>
            <span> Role Types</span>
          </a>
        @endpermission
        @permission('role-list')
          <a class="nav-link " href="{{ url('/admin/subadmin') }}">
            <i class="material-icons">account_circle</i>
            <span> Adminstrators</span>
          </a>
        @endpermission
      </div>
    </li>
    @permission('user-list')
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/user') }}">
          <i class="material-icons">person</i>
          <span>Users</span>
        </a>
      </li>
    @endpermission
    @permission('provider-list')
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/provider') }}">
          <i class="material-icons">motorcycle</i>
          <span>Providers</span>
        </a>
      </li>
    @endpermission
    <!-- @permission('fleet-list')
  <li class="nav-item">
                  <a class="nav-link" href="{{ url('admin/fleet') }}">
                      <i class="material-icons">directions_boat</i>
                      <span>Fleet Owner</span>
                  </a>
              </li>
@endpermission -->
    @permission('dispatcher-list')
      <li class="nav-item">
        <a class="nav-link " href="{{ url('/admin/dispatcher') }}">
          <i class="material-icons">event_seat</i>
          <span> Dispatcher Manager</span>
        </a>
      </li>
    @endpermission
    @permission('account-manager-list')
      <li class="nav-item">
        <a class="nav-link " href="{{ url('/admin/account') }}">
          <i class="material-icons">account_balance_wallet</i>
          <span> Account Manager</span>
        </a>
      </li>
    @endpermission
    @permission('dispute-manager-list')
      <li class="nav-item">
        <a class="nav-link " href="{{ url('/admin/dispute') }}">
          <i class="material-icons">transfer_within_a_station</i>
          <span> Dispute Manager</span>
        </a>
      </li>
    @endpermission
    @permission('statements')
      <li class="nav-item">
        <a class="nav-link nav-title">
          <span>ACCOUNTS</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#collapse3">
          <i class="material-icons">account_balance</i>
          <span class="menudrop_icon">Statement</span>
        </a>
        <div id="collapse3" class="collapse in">
          @if (Helper::checkService('TRANSPORT'))
            <a class="nav-link " href="{{ url('/admin/statement') }}">
              <i class="material-icons">list_alt</i>
              <span>Transport Statement</span>
            </a>
          @endif

          @if (Helper::checkService('SERVICE'))
            <a class="nav-link " href="{{ url('/admin/statement/service') }}">
              <i class="material-icons">list_alt</i>
              <span>Services Statement</span>
            </a>
          @endif



          <a class="nav-link " href="{{ url('/admin/statement/user') }}">
            <i class="material-icons">person</i>
            <span>User Statement</span>
          </a>
          <a class="nav-link " href="{{ url('/admin/statement/provider') }}">
            <i class="material-icons">motorcycle</i>
            <span>Provider Statement</span>
          </a>

          <a class="nav-link " href="{{ url('/admin/transactions') }}">
            <i class="material-icons">list</i>
            <span> Admin Transaction</span>
          </a>
        </div>
      </li>
    @endpermission
    <!-- @permission('settlements')
  <li class="nav-item">
                  <a class="nav-link" data-toggle="collapse" href="#collapse4">
                      <i class="material-icons">thumb_up_alt</i>
                      <span class="menudrop_icon">Settlements</span>
                  </a>
                      <div id="collapse4" class="collapse in">
                          <a class="nav-link " href="settlements.php">
                          <i class="material-icons">motorcycle</i>
                          <span> Provider Settlements</span>
                          </a>
                          <a class="nav-link " href="settlements_fleet.php">
                          <i class="material-icons">directions_boat</i>
                          <span> Fleet Settlements</span>
                          </a>
                      </div>
                  </li>
@endpermission -->
    @permission('statements')
    @endpermission
    @permission('documents-list')
      <li class="nav-item">
        <a class="nav-link nav-title">
          <span>DETAILS</span>
        </a>
      </li>
    @endpermission
    @permission('user-rating')
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#collapse5">
          <i class="material-icons">stars</i>
          <span class="menudrop_icon">Rating & Reviews</span>
        </a>
        @elsepermission('provider-rating')
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#collapse5">
          <i class="material-icons">stars</i>
          <span class="menudrop_icon">Rating & Reviews</span>
        </a>
      @else
      <li class="nav-item">
      @endpermission

      <div id="collapse5" class="collapse in">
        @permission('user-rating')
          <a class="nav-link " href="{{ url('admin/userreview') }}">
            <i class="material-icons">person</i>
            <span> User Ratings</span>
          </a>
        @endpermission
        @permission('provider-rating')
          <a class="nav-link " href="{{ url('admin/providerreview') }}">
            <i class="material-icons">motorcycle</i>
            <span> Provider Ratings</span>
          </a>
        @endpermission
      </div>

    </li>
    @permission('promocodes-list')
      <li class="nav-item">
        <a class="nav-link nav-title">
          <span>OFFER</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/promocode') }}">
          <i class="material-icons">local_activity</i>
          <span>Promocodes</span>
        </a>
      </li>
    @endpermission

    @permission('documents-list')
      <li class="nav-item">
        <a class="nav-link nav-title">
          <span>GENERAL</span>
        </a>
      </li>
      <!-- <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#collapseFour" class="nav-link">
                  <i class="material-icons">group</i>
                  <span class="menudrop_icon">Service Types</span>
               </a>
              <div id="collapseFour" class="collapse in">
                  <a class="nav-link " href="service_types.php">
                      <span> - List Service Types</span>
                  </a>
                  <a class="nav-link " href="servicetypes_create.php">
                      <span> - Add new Service Type</span>
                  </a>
              </div>
          </li> -->

      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/document') }}">
          <i class="material-icons">list_alt</i>
          <span>Documents</span>
        </a>
      </li>
    @endpermission
    @permission('documents-list')
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/reason') }}">
          <i class="material-icons">cancel</i>
          <span>Cancel Reason</span>
        </a>
      </li>
    @endpermission

    @permission('notification-list')
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/notification') }}">
          <i class="material-icons">notifications</i>
          <span>Notification</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/notification/list') }}">
          <i class="material-icons">notifications</i>
          <span>Notification List</span>
        </a>
      </li>
    @endpermission


    @permission('bank-details')
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/bankdetails') }}">
          <i class="material-icons">sync_disabled</i>
          <span>Bank Details</span>
        </a>
      </li>
    @endpermission

    @if (Helper::checkService('SERVICE'))
      @permission('service')
        <li class="nav-item">
          <a class="nav-link nav-title">
            <span>SERVICE</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#collapse7" aria-expanded="true">
            <i class="material-icons">local_laundry_service</i>
            <span class="menudrop_icon">Services</span>
          </a>
          <div id="collapse7" class="collapse in" style="">
            <a class="nav-link " href="{{ url('/admin/service-categories') }}">
              <i class="material-icons">apps</i>
              <span> Categories</span>
            </a>
            <a class="nav-link " href="{{ url('/admin/service-subcategories') }}">
              <i class="material-icons">subject</i>
              <span> Sub Categories</span>
            </a>
            <a class="nav-link " href="{{ url('/admin/service-projectcategories') }}">
              <i class="material-icons">subject</i>
              <span> Project Categories</span>
            </a>
            <a class="nav-link " href="{{ url('/admin/service-list') }}">
              <i class="material-icons">local_car_wash</i>
              <span> Services</span>
            </a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#collapse8" aria-expanded="true">
            <i class="material-icons">input</i>
            <span class="menudrop_icon">Service Requests</span>
          </a>
          <div id="collapse8" class="collapse in" style="">
            <a class="nav-link " href="{{ url('/admin/service-history') }}">
              <i class="material-icons">history</i>
              <span> Requests History</span>
            </a>
            <a class="nav-link" href="{{ url('admin/serviceschedulehistory') }}">
              <i class="material-icons">alarm</i>
              <span>Scheduled Services </span>
            </a>
          </div>
        </li>
      @endpermission
    @endif

    @permission('site-settings')
      <li class="nav-item">
        <a class="nav-link nav-title">
          <span>SETTINGS</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/settings') }}">
          <i class="material-icons">settings_applications</i>
          <span>Site Settings</span>
        </a>
      </li>
    @endpermission


    @permission('notification-list')
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/country') }}">
          <i class="material-icons">location_city</i>
          <span>Business Country</span>
        </a>
      </li>
    @endpermission
    @permission('notification-list')
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/city') }}">
          <i class="material-icons">business</i>
          <span>Business City</span>
        </a>
      </li>
    @endpermission
    @permission('lost-item-list')
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/menu') }}">
          <i class="material-icons">menu</i>
          <span>Menus</span>
        </a>
      </li>
    @endpermission
    @permission('cms-pages')
      <li class="nav-item">
        <a class="nav-link nav-title">
          <span>OTHERS</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/cmspage') }}">
          <i class="material-icons">pages</i>
          <span>CMS Pages</span>
        </a>
      </li>
    @endpermission
    @permission('custom-push')
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/custompush') }}">
          <i class="material-icons">keyboard_tab</i>
          <span>Custom Push</span>
        </a>
      </li>
    @endpermission


    <!-- <a class="nav-link" href="{{ url('admin/dispatchermanager') }}">
            <i class="material-icons">transfer_within_a_station</i>
            <span class="menudrop_icon">Dispatcher</span>
        </a> -->

    <!-- <li class="nav-item">
            <a class="nav-link">
                <span>ACCOUNT</span>
            </a>
        </li>
         <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/profile') }}">
                <i class="material-icons">settings_brightness</i>
                <span>Account Settings</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link"href="{{ url('admin/password') }}">
                <i class="material-icons">more_horiz</i>
                <span>Change Password</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" class="nav-link" href="{{ url('/admin/logout') }}">
                <i class="material-icons">power_settings_new</i>
                <span>Logout</span>
            </a>
        </li> -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/accountmanager') }}">
            <i class="material-icons">account_balance_wallet</i>
            <span class="menudrop_icon">Account Manager</span>
        </a>
        </li> -->

    <!-- <li class="nav-item">
            <a class="nav-link" href="map.php">
                <i class="material-icons">map</i>
                <span>Map</span>
            </a>
        </li> -->

    <!-- <li class="nav-item">
            <a class="nav-link" href="payment_history.php">
                <i class="material-icons">horizontal_split</i>
                <span>Payment History</span>
            </a>
        </li> -->
    <!-- <li class="nav-item">
            <a class="nav-link" href="payment_settings.php">
                <i class="material-icons">credit_card</i>
                <span>Payment Settings</span>
            </a>
        </li> -->
    <!-- <li class="nav-item">
            <a class="nav-link"  href="{{ url('/admin/help') }}">
                <i class="material-icons">live_help</i>
                <span>Help</span>
            </a>
        </li> -->
    <!-- <li class="nav-item">
            <a class="nav-link" href="translation.php">
                <i class="material-icons">g_translate</i>
                <span>Translation</span>
            </a>
        </li> -->
    <!-- <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/profile') }}">
                <i class="material-icons">settings_brightness</i>
                <span>Account Settings</span>
            </a>
        </li> -->
    <!-- <li class="nav-item">
            <a class="nav-link"href="{{ url('admin/password') }}">
                <i class="material-icons">more_horiz</i>
                <span>Change Password</span>
            </a>
        </li> -->
    <!-- <li class="nav-item">
            <a class="nav-link" class="nav-link" href="{{ url('/admin/logout') }}">
                <i class="material-icons">power_settings_new</i>
                <span>Logout</span>
            </a>
        </li> -->
    <!-- <li class="nav-item">
            <a class="nav-link" href="errors.php">
                <i class="material-icons">error</i>
                <span>Errors</span>
            </a>
        </li> -->
  </ul>
</div>

@section('scripts')
  @parent

  <script>
    $(document).ready(function() {

      $(".main-sidebar .nav-item .nav-link").each(function() {
        var link = $(this);
        var data_link = link.attr('href');
        var page_url = window.location.href;
        if (data_link == page_url) {
          link.addClass("active");
          $('.nav-wrapper').scrollTop($(link).closest('li.nav-item').position().top - $('.nav-wrapper li:first')
            .position().top);
          if (link.closest('div').hasClass('collapse')) {
            link.closest('div').addClass('show');
            //link.closest('div').prev().addClass("active");
          }
        }
      });

    });
  </script>

@stop
