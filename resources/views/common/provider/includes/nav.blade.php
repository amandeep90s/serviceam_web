<nav class="menu">
    <div id="header">
        <div class="menu-item menu-one " id="menu-one">
            <a class="dis-column" href="{{ url('/provider/home') }}">
                <!-- <div class="dis-center"><i class="material-icons">dashboard</i></div> -->
                <span>Dashboard</span>
            </a>
        </div>
        <div class="menu-item menu-two " id="menu-two">
            <a class="dis-column" href="{{ url('provider/wallet') }}">
                <!-- <div class="dis-center"><i class="material-icons">account_balance_wallet</i></div> -->
                <span>Service Area</span>
            </a>
        </div>
        <!-- <div class="menu-item menu-three " id="menu-three">
                  <a   class="dis-column" href="{{ url('provider/trips/service') }}">
                     <div class="dis-center"><i class="material-icons">history</i></div>
                     <span>History</span>
                  </a>
        </div> -->
        <div class="menu-item menu-four profiledetail" id="menu-four">
            <a class="dis-column" href="{{ url('provider/profile/general') }}">
                <!-- <div class="dis-center"><i class="material-icons">account_box</i></div> -->
                <span>Profile</span>
            </a>
        </div>

        <div class="menu-item menu-five " id="menu-five">
            <a class="dis-column" href="{{ url('provider/document/SERVICE') }}">
                <!-- <div class="dis-center"><i class="material-icons">insert_drive_file</i></div> -->
                <span>Documents</span>
            </a>
        </div>

        <div class="menu-item menu-six " id="menu-six">
            <a class="dis-column" href="{{ url('provider/myservice') }}">
                <!-- <div class="dis-center"><i class="material-icons">build</i></div> -->
                <span>Services</span>
            </a>
        </div>

        <div class="menu-item menu-seven " id="menu-seven">
            <a class="dis-column" href="{{ url('provider/trips/service/new') }}">
                <!-- <div class="dis-center"><i class="material-icons">near_me</i></div> -->
                <span>New Requests</span>
            </a>
        </div>

        <div class="menu-item menu-eight " id="menu-eight">
            <a class="dis-column" href="{{ url('provider/trips/service/inride') }}">
                <!-- <div class="dis-center"><i class="material-icons">pedal_bike</i></div> -->
                <span>Requests in Progress</span>
            </a>
        </div>

        <div class="menu-item menu-nine " id="menu-nine">
            <a class="dis-column" href="{{ url('provider/trips/service/completed') }}">
                <!--  <div class="dis-center"><i class="material-icons">trip_origin</i></div> -->
                <span>Completed Requests</span>
            </a>
        </div>

        <div class="menu-item menu-ten " id="menu-ten">
            <a class="dis-column" href="{{ url('provider/trips/service/cancelled') }}">
                <!-- <div class="dis-center"><i class="material-icons">not_accessible</i></div> -->
                <span>Not Accepted Requests</span>
            </a>
        </div>

        <div class="menu-item menu-eleven " id="menu-eleven">

            <a class="dis-column referdetail" data-toggle="modal" data-target="#referModal">
                <span>Referrals</span>
            </a>

        </div>

    </div>
</nav>

<!-- Refer Modal -->
<div class="modal" id="referModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Refer Header -->
            <div class="modal-header">
                <h4 class="modal-title">Refer A Friend</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Refer body -->
            <div class="modal-body">
                <div class="col-md-12 col-xl-12 col-xs-12 p-0 mb-4">
                    <div class=" top small-box green mb-2">
                        <div class="left">
                            <h2>Your Referral Code</h2>
                            <h4><i class="material-icons">card_giftcard</i></h4>
                            <h1><span class ="referal_code"></span></h1>
                        </div>
                        <div class="sub-box dis-column">
                            <span class="font-12 txt-white">Referral Count: <strong><span
                                        class ="user_referal_count"></span></strong></span>
                            <span class="font-12 float-right txt-white">Referral Amount: <strong><span
                                        class ="user_referal_amount"></span></strong></span>
                        </div>
                    </div>
                </div>
                <div class="dis-column col-lg-12 col-md-12 col-sm-12 p-0 bor-bottom mb-4 pb-4">
                    <h5 class="text-center">Invite your friends And earn <span class ="currency"></span><span
                            class ="referal_amount"></span> for every <span class ="referal_count"></span> Users </h5>
                    <!-- <p class="text-center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p> -->
                    <form class="validateForm dis-column" style="color:red">
                        <input class="form-control" type="text" name="referral_email" placeholder="Enter Email"
                            required>
                        <br>
                        <a id="invite" href="" class="btn btn-primary">Invite</a>
                    </form>
                </div>
                <!-- <h5 class="text-center mb-2">Refer Your Friends via Social Media</h5> -->
            </div>
        </div>
    </div>
</div>
<!-- Refer Modal -->

@section('scripts')
    @parent

    <script>
        $('.menu-item').removeClass('menu-active');
        $('.menu-item').each(function() {
            var url = $(this).find("a").attr("href");
            var current_url = window.location.href;
            if (url == current_url) {
                $(this).addClass('menu-active');
            }
        })




        function openNav(open) {
            document.getElementById("mySidenav").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
            document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
            open.style.display = 'none'; //it will hide the element that is passed in the function parameter
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
            document.body.style.backgroundColor = "white";
            document.getElementById('openButton').style.display =
            'block'; //it will show the button that is used to open the menu 
        }
    </script>



@stop
