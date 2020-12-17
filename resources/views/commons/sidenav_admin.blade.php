<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading"><br></li>
                <li class="app-sidebar__heading"></li>
                <li class="app-sidebar__heading">Admin Dashboard</li>
                <!-- <li>
                    <a href="#"><i class="metismenu-icon pe-7s-home"></i>Home</a>
                </li> -->
                <li>
                    <a href="{{route('a_home')}}"><i class="metismenu-icon pe-7s-home"></i>Home</a>
                </li>
                <li>
                    <a href="{{route('a_orders')}}"><i class="metismenu-icon pe-7s-graph"></i>Orders</a>
                </li>
                <li>
                    <a href="{{route('a_works')}}"><i class="metismenu-icon pe-7s-graph1"></i>Work Types</a>
                </li>
                <li>
                    <a href="{{route('a_prices')}}"><i class="metismenu-icon pe-7s-graph2"></i>Pricing</a>
                </li>
                <li>
                    <a href="{{route('a_bushs')}}"><i class="metismenu-icon pe-7s-server"></i>Harvested mails</a>
                </li>
                <li>
                    <a href="{{route('a_admins')}}"><i class="metismenu-icon pe-7s-users"></i>Admins</a>
                </li>
            </ul>
        </div>
    </div>
</div>