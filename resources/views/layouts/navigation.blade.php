<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="https://via.placeholder.com/150" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" style="overflow: hidden">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle nav-icon"></i>
                    <p>
                        {{ __('Department') }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item ml-4">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>All Departments </p>
                        </a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Department</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle nav-icon"></i>
                    <p>
                        {{ __('Branches') }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item ml-4">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>All Branches </p>
                        </a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Branch</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle nav-icon"></i>
                    <p>
                        {{ __('Leave') }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item ml-4">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Weekly Holiday</p>
                        </a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Vacation</p>
                        </a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Resign Application</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle nav-icon"></i>
                    <p>
                        {{ __('Attendance') }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item ml-4">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Attendance Form</p>
                        </a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Attendance Log</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-address-card"></i>
                    <p>
                        {{ __('Applications') }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item ml-4">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Weekly Holiday</p>
                        </a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Interview</p>
                        </a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Resign Application</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-address-card"></i>
                    <p>
                        {{ __('Reports') }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item ml-4">
                        <a href="{{ route('users.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Salary Report</p>
                        </a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-address-card"></i>
                            <p>
                                {{ __('Leave Report') }}
                                <i class="fas fa-angle-left right mr-4"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                            <li class="nav-item ml-4">
                                <a href="{{ route('users.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Employees Resigns</p>
                                </a>
                            </li>
                            <li class="nav-item ml-4">
                                <a href="{{ route('users.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Managers Resigns</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="{{ route('Manager.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Attendance Report</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-money-bill"></i>
                    <p>
                        {{ __('Salary') }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item ml-4">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Employee Salary</p>
                        </a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Manager Salary</p>
                        </a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file-invoice-dollar"></i>
                            <p>Payment Methods</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('Users') }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item ml-4">
                        <a href="{{ route('users.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Admins</p>
                        </a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="{{ route('Employee.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Employee</p>
                        </a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="{{ route('Manager.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Managers</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle nav-icon"></i>
                    <p>
                        {{ __('Positions') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('about') }}" class="nav-link">
                    <i class="nav-icon far fa-address-card"></i>
                    <p>
                        {{ __('About us') }}
                    </p>
                </a>
            </li>


        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
