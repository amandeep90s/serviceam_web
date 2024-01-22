<style>
    .header-logo {
        width: 90px !important;
        border: 1px solid #ccc;
        padding: 10px 20px !important;
        border-radius: 3px !important;
    }

    .header-logo-right {
        padding: 0px 0px !important;
    }

    .caption h1 {
        font-size: 15px;
    }
</style>

<header class="topnav" id="myTopnav">
    <div class="container-fluid">
        <div class="col-lg-12 col-md-12 col-sm-12 dis-row p-0">
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a class="" href="home">Home</a>
                <a class="" href="#screenShots">Services</a>
                <a class="" href="/#features">Features</a>
                <a class="" href="works">App Screenshots</a>
                <!-- <a class="" href="blog">Blog</a> -->
            </div>
            <div id="mySidenav" class=" dis-ver-center col-md-4 col-sm-12 p-0">
                <div id="sidebarCollapse" class="active" onclick="openNav()">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <a href="{{ URL::to('') }}" class="logo"><img src="{{ Helper::getSiteLogo() }}" class=""
                        alt="logo"></a>
                <!-- <a href="" class="logo"><img src="assets/layout/images/common/site_logo.png" class="" alt="logo"></a> -->
            </div>
            <div class=" col-md-7 p-0 user float-right p-0">
                <ul class="w-100 dis-flex-end m-0">
                    <li class="menu-item active  d-none d-lg-block d-xl-block"><a class="" href="home">Home</a>
                    </li>
                    <!-- <li class="menu-item  d-none d-lg-block d-xl-block "><a class="" href="/#about">Services</a></li> -->
                    <li class="menu-item  d-none d-lg-block d-xl-block "><a class=""
                            href="#screenShots">Services</a></li>
                    <li class="menu-item  d-none d-lg-block d-xl-block"><a class="" href="/user">User</a></li>
                    <li class="menu-item  d-none d-lg-block d-xl-block "><a class="" href="/provider">Provider</a>
                    </li>
                    <!-- <li class="menu-item  d-none d-lg-block d-xl-block "><a class="" href="works">App Screenshots</a></li> -->
                    <!-- <li class="menu-item  d-none d-lg-block d-xl-block"><a class="" href="blog">Blog</a></li> -->
                    <li class="menu-item"><a class=" btn-green-secondary" href="#"
                            onclick="openToggle()">Login</a></li>
                    <li class="menu-item"><a class=" btn-green-secondary" href="#"
                            onclick="openToggleSignup()">Sign Up</a></li>
                    <!--  <li class="menu-item"><a class=" btn-green-secondary" href="#" onclick="openToggle()">SignUp</a></li> -->
                    <!-- <li class="menu-item d-none d-lg-block d-xl-block "><a class="btn btn-green" href="/#demo">Download</a></li> -->
                    <!-- <li class="menu-item d-none d-lg-block d-xl-block header-logo-right"><img src="assets/layout/images/common/Header-Logo.png" class="header-logo"></li> -->
                </ul>
            </div>
        </div>
    </div>
</header>
<div id="toggle-bg" onclick="closeToggle()"></div>
<div class="ongoing-service">
    <div id="sideToggle" class="side-toggle mt-3">
        <a href="javascript:void(0)" class="closebtn" onclick="closeToggle()">&times;</a>
        <ul class="ongoing-list">
            <li>
                <div class="provider-section bg-green">
                    <h5 class="txt-white">User</h5>
                    <p class="txt-white">Find everything you need to track your success on the road.</p>
                    <div class="dis-column">
                        <a class="btn big-btn" href="{{ URL::to('user') }}">User Sign In <i
                                class="fa fa-arrow-circle-right ml-2" aria-hidden="true"></i></a>
                        <!-- <a class="btn big-btn mt-3" href="{{ URL::to('user') }}">User Sign Up <i
                                    class="fa fa-arrow-circle-right ml-2" aria-hidden="true"></i></a> -->
                    </div>
                </div>
            </li>

            <li>
                <div class="provider-section bg-green">
                    <h5 class="txt-white">Provider</h5>
                    <p class="txt-white">Find everything you need to track your success on the road.</p>
                    <div class="dis-column">
                        <a class="btn big-btn" href="{{ URL::to('provider') }}">Provider Sign In <i
                                class="fa fa-arrow-circle-right ml-2" aria-hidden="true"></i></a>
                        <!--     <a class="btn big-btn mt-3" href="{{ URL::to('provider/signup') }}">Provider Sign Up <i
                                    class="fa fa-arrow-circle-right ml-2" aria-hidden="true"></i></a> -->
                    </div>
                </div>
            </li>

            <li>
                <div class="provider-section bg-green">
                    <h5 class="txt-white">Shop</h5>
                    <p class="txt-white">Find everything you need to track your success on the road.</p>
                    <div class="dis-column">
                        <a class="btn big-btn" href="{{ URL::to('shop') }}">Shop Sign In <i
                                class="fa fa-arrow-circle-right ml-2" aria-hidden="true"></i></a>
                    </div>
                </div>
            </li>

        </ul>
    </div>
    <div id="toggle-bg-signup" onclick="closeToggleSignup()"></div>
    <div class="ongoing-service">
        <div id="sideToggle-signup" class="side-toggle mt-3">
            <a href="javascript:void(0)" class="closebtn" onclick="closeToggleSignup()">&times;</a>
            <ul class="ongoing-list">
                <li>
                    <div class="provider-section bg-green">
                        <h5 class="txt-white">User</h5>
                        <p class="txt-white">Find everything you need to track your success on the road.</p>
                        <div class="dis-column">
                            <a class="btn big-btn mt-3" href="{{ URL::to('user') }}">User Sign Up <i
                                    class="fa fa-arrow-circle-right ml-2" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="provider-section bg-green">
                        <h5 class="txt-white">Provider</h5>
                        <p class="txt-white">Find everything you need to track your success on the road.</p>
                        <div class="dis-column">
                            <a class="btn big-btn mt-3" href="{{ URL::to('provider/signup') }}">Provider Sign Up <i
                                    class="fa fa-arrow-circle-right ml-2" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </div>

    <script type="text/javascript">
        function openToggleSignup() {
            document.getElementById("toggle-bg-signup").style.width = "100%";
            document.getElementById("sideToggle-signup").style.right = "-10px";
            document.getElementById("heading-signup").style.right = "310px";
        }

        function closeToggleSignup() {
            document.getElementById("toggle-bg-signup").style.width = "0";
            document.getElementById("sideToggle-signup").style.right = "-640px";
            document.getElementById("heading-signup").style.right = "-80px";
        }
    </script>
