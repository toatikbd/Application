<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="{{ url('/home') }}">APPLICATION</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Call Search -->
                <li style="visibility: hidden">
                    <a href="javascript:void(0);" class="js-search" data-close="true">
                        <i class="material-icons">search</i>
                    </a>
                </li>
                <!-- #END# Call Search -->
                <!-- Notifications -->
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">layers</i>
                        <span class="label-count">5</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Preliminary Work</li>
                        <li class="body">
                            <ul class="menu">
{{--                                <li>--}}
{{--                                    <a href="javascript:void(0);">--}}
{{--                                        <div class="icon-circle bg-red">--}}
{{--                                            <i class="material-icons">delete_forever</i>--}}
{{--                                        </div>--}}
{{--                                        <div class="menu-info">--}}
{{--                                            <h4><b>Nancy Doe</b> deleted account</h4>--}}
{{--                                            <p>--}}
{{--                                                <i class="material-icons">access_time</i> 3 hours ago--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
                                <li class="{{ Request::is('preliminary-work*') ? 'active' : '' }}">
                                    <a href="{{ route('preliminary-work.index') }}">
                                        <i class="material-icons">layers</i>
                                        <span>Preliminary Work</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- #END# Notifications -->
                <!-- Tasks -->
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">work</i>
                        <span class="label-count">5</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Projects</li>
                        <li class="body">
                            <ul class="menu tasks">
                                <li>
                                    <a href="javascript:void(0);">
                                        <h4>
                                            Footer display issue
                                            <small>32%</small>
                                        </h4>
                                        <div class="progress">
                                            <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 32%">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="javascript:void(0);">View All Projects</a>
                        </li>
                    </ul>
                </li>
                <!-- #END# Tasks -->
                <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
            </ul>
        </div>
    </div>
</nav>
