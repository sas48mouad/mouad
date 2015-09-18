<div class="col-md-3 left_col">
    <div class="left_col scroll-view">

        <div class="navbar nav_title" style="border: 0;">
            <a href="{{URL::to('home')}}" class="site_title"><i class="fa fa-calendar"></i> <span>Mouad System</span></a>
        </div>
        <div class="clearfix"></div>



        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
                <ul class="nav side-menu">
                    <li><a href="{{URL::to('home')}}"><i class="fa fa-home"></i> Home </a>
                    <li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="{{URL::to('system-user/create')}}">create</a>
                            </li>
                            <li><a href="{{URL::to('system-user/users-list')}}">users list</a>
                            </li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-users"></i> Organizations <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="{{URL::to('organizations/create')}}">create</a>
                            </li>
                            <li><a href="index2.html">users list</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="e_commerce.html">E-commerce</a>
                            </li>
                            <li><a href="projects.html">Projects</a>
                            </li>
                            <li><a href="project_detail.html">Project Detail</a>
                            </li>
                            <li><a href="contacts.html">Contacts</a>
                            </li>
                            <li><a href="profile.html">Profile</a>
                            </li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a>
                    </li>
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>