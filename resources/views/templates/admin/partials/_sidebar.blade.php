
<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="content-header bg-white-5">
        <!-- Logo -->
        <a class="font-w600 text-dual" href="">
            <img src="{{ asset('assets/media/favicons/logobdwGD.png') }}" style="width: 30px;">
            <span class="smini-hide">
                <span class="font-w700 font-size-h5">AGENDA</span>
            </span>
        </a>
        <!-- END Logo -->

        <!-- Options -->
        <div>
            <!-- Color Variations -->
            <div class="dropdown d-inline-block ml-3">
                <a class="text-dual font-size-sm" id="sidebar-themes-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="si si-drop"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right font-size-sm smini-hide border-0" aria-labelledby="sidebar-themes-dropdown">


                    <!-- Sidebar Styles -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="dropdown-item" data-toggle="layout" data-action="sidebar_style_light" href="#">
                        <span>Sidebar Light</span>
                    </a>
                    <a class="dropdown-item" data-toggle="layout" data-action="sidebar_style_dark" href="#">
                        <span>Sidebar Dark</span>
                    </a>
                    <!-- Sidebar Styles -->

                    <div class="dropdown-divider"></div>

                    <!-- Header Styles -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="dropdown-item" data-toggle="layout" data-action="header_style_light" href="#">
                        <span>Header Light</span>
                    </a>
                    <a class="dropdown-item" data-toggle="layout" data-action="header_style_dark" href="#">
                        <span>Header Dark</span>
                    </a>
                    <!-- Header Styles -->
                </div>
            </div>
            <!-- END Themes -->

            <!-- Close Sidebar, Visible only on mobile screens -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <a class="d-lg-none text-dual ml-3" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                <i class="fa fa-times"></i>
            </a>
            <!-- END Close Sidebar -->
        </div>
        <!-- END Options -->
    </div>
    <!-- END Side Header -->

    <!-- Side Navigation -->
    <div class="content-side content-side-full">
        <ul class="nav-main">
            <li class="nav-main-item">
                <a class="nav-main-link
                @if (Request::is('/home')) active @endif
                " href="#">
                <i class="nav-main-link-icon si si-speedometer"></i>
                <span class="nav-main-link-name">Dashboard</span>
            </a>
        </li>
    </ul>
</div>
</nav>

