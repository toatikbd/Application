<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{ asset('admin') }}/images/user.png" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">

            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Admin
            </div>
            <div class="email">
                Admin@gmail.com
            </div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i>
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{ url('/home') }}">
                    <i class="material-icons">dashboard</i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li  class="{{ Request::is('project*') ? 'active' : '' }}">
                <a href="{{ route('project.create') }}">
                    <i class="material-icons">work</i>
                    <span>All Project</span>
                </a>
            </li>
            <li class="{{ Request::is('worker*') ? 'active' : '' }}">
                <a href="{{ route('worker.index') }}">
                    <i class="material-icons">layers</i>
                    <span>Add Supervisor</span>
                </a>
            </li>
            <li class="{{ Request::is('preliminary-work*') ? 'active' : '' }}">
                <a href="{{ route('preliminary-work.index') }}">
                    <i class="material-icons">layers</i>
                    <span>Preliminary Work</span>
                </a>
            </li>
{{--            <li class="{{ Request::is('documentation*') ? 'active' : '' }}">--}}
{{--                <a href="{{ route('documentation.index') }}">--}}
{{--                    <i class="material-icons">layers</i>--}}
{{--                    <span>Documentation</span>--}}
{{--                </a>--}}
{{--            </li>--}}
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2021<a href="javascript:void(0);">TZ - Application</a>.
        </div>
        <div class="version">
            <b>Version: </b> 0.1.0
        </div>
    </div>
    <!-- #Footer -->
</aside>
