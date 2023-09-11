<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <img class="img-80 img-radius" src="{{asset('assets/images/avatar-4.jpg')}}" alt="User-Profile-Image">
                <div class="user-details">
                    <span id="more-details">{{auth()->user()->name}}<i class="fa fa-caret-down"></i></span>
                </div>
            </div>

            <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                        <a href="user-profile.html"><i class="ti-user"></i>View Profile</a>
                        <a href="#!"><i class="ti-settings"></i>Settings</a>
                        <a href="auth-normal-sign-in.html"><i class="ti-layout-sidebar-left"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="p-15 p-b-0">
            <form class="form-material">
                <div class="form-group form-primary">
                    <input type="text" name="footer-email" class="form-control" required="">
                    <span class="form-bar"></span>
                    <label class="float-label"><i class="fa fa-search m-r-10"></i>Search Friend</label>
                </div>
            </form>
        </div>
        <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Layout</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="active">
                <a href="{{url('/dashboard')}}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="">
                <a href="{{url('/my-profile')}}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fa fa-user"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">My profile</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="">
                <a href="{{url('/dashboard/member-active')}}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-home"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Member Activate</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="">
                <a href="{{url('/dashboard/matrix')}}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fa fa-sitemap"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Network</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>


            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fa fa-money"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Deposit</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="accordion.html" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Deposit  Now</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="breadcrumb.html" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Deposit History</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fa fa-money"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Income Summary</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="accordion.html" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Direct Income</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="breadcrumb.html" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Trading income</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="breadcrumb.html" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Daily Level Income</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="breadcrumb.html" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Club Income</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="index.html" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Downline Club Team</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="">
                <a href="index.html" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fa fa-trophy"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Reward Status</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fa fa-money"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Trading</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="accordion.html" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Forex</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="breadcrumb.html" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs"> Crypto</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="index.html" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-home"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Member Activate</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fa fa-money"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Withdrawal</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="accordion.html" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Withdrawal</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="breadcrumb.html" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Withdrawal History</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fa fa-money"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Support</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="accordion.html" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Generate Support Ticket</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="breadcrumb.html" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Support Tickets History</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>








    </div>
</nav>
