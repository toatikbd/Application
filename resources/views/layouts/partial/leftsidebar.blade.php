<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="row">
            <div class="col-md-3">
                <div class="image">
                    <img src="{{ asset('admin') }}/images/user.png" width="48" height="48" alt="User" />
                </div>
            </div>
            <div class="col-md-9">
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        TZ
                    </div>
                    <div class="email">
                        admin@tz.com
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
                    <i class="material-icons">face</i>
                    <span>Add Supervisor</span>
                </a>
            </li>
            <li class="{{ Request::is('preliminary-work*') ? 'active' : '' }}">
                <a href="{{ route('preliminary-work.index') }}">
                    <i class="material-icons">layers</i>
                    <span>Preliminary Work</span>
                </a>
            </li>
            <li class="{{ Request::is('design-drawing*') ? 'active' : '' }}">
                <a href="{{ route('design-drawing.index') }}">
                    <i class="material-icons">gesture</i>
                    <span>Design and Drawing</span>
                </a>
            </li>
            <li class="{{ Request::is('documentation*') ? 'active' : '' }}">
                <a href="{{ route('documentation.index') }}">
                    <i class="material-icons">insert_drive_file</i>
                    <span>Documentation</span>
                </a>
            </li>
            <li class="{{ Request::is('contractor*') ? 'active' : '' }}">
                <a href="{{ route('contractor.index') }}">
                    <i class="material-icons">content_paste</i>
                    <span>Contractor Selection</span>
                </a>
            </li>
            <li class="{{ Request::is('time-management-plan*') ? 'active' : '' }}">
                <a href="{{ route('time-management-plan.index') }}">
                    <i class="material-icons">access_alarm</i>
                    <span>Time Management Plan</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">attach_money</i>
                    <span>Financial Maps</span>
                </a>
                <ul class="ml-menu">
                    <li {{ Request::is('financial-plan*') ? 'active' : '' }}>
                        <a href="{{ route('financial-plan.index') }}">Financial Plan</a>
                    </li>
                    <li {{ Request::is('expense*') ? 'active' : '' }}>
                        <a href="{{ route('expense.index') }}">Expense</a>
                    </li>
                </ul>
            </li>
            <li class="{{ Request::is('procurement*') ? 'active' : '' }}">
                <a href="{{ route('procurement.index') }}">
                    <i class="material-icons">import_export</i>
                    <span>Procurement Plan</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">manage_accounts</i>
                    <span>Setting</span>
                </a>
                <ul class="ml-menu">
                    <li {{ Request::is('financial-plan*') ? 'active' : '' }}>
                        <a href="{{ route('financial-plan.index') }}">Employee</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright" style="margin-bottom: -5px;">
            &copy; 2021<a href="javascript:void(0);">TZ - Application</a>.
        </div>
        <div class="version">
            <b>Version: </b> 0.1.0
        </div>
    </div>
    <!-- #Footer -->
</aside>
