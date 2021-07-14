<aside id="rightsidebar" class="right-sidebar">
    <ul class="nav nav-tabs tab-nav-right" role="tablist">
        <li role="presentation" class="active"><a href="#general" data-toggle="tab">GENERAL</a></li>
        <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
    </ul>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active in active" id="general">
            <ul class="demo-choose-skin">
                <li class="{{ Request::is('project*') ? 'active' : '' }}">
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
                <li {{ Request::is('expense*') ? 'active' : '' }}>
                    <a href="{{ route('expense.index') }}">
                        <i class="material-icons">attach_money</i>
                        <span>Expense</span>
                    </a>
                </li>
            </ul>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="settings">
            <div class="demo-settings">
                <ul class="setting-list">
                    <li class="{{ Request::is('procurement*') ? 'active' : '' }}">
                        <a href="{{ route('procurement.index') }}">
                            <i class="material-icons">import_export</i>
                            Procurement Plan
                        </a>
                    </li>
                    <li {{ Request::is('employee*') ? 'active' : '' }}>
                        <a href="{{ route('employee.index') }}">
                            <i class="material-icons">manage_accounts</i>
                            Employee
                        </a>
                    </li>
                    <li class="{{ Request::is('procurement*') ? 'active' : '' }}">
                        <a href="{{ route('procurement.index') }}">
                            <i class="material-icons">import_export</i>
                            Procurement Plan
                        </a>
                    </li>
                </ul>
                <p>SYSTEM SETTINGS</p>
            </div>
        </div>
    </div>
</aside>
