<!-- Main Sidebar Container -->
<aside class="main-sidebar bg-gradient-blue " >
    <!-- Sidebar -->
    <div class="sidebar text-white">
        <!-- Sidebar user (optional) -->


        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="{{route('home')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt text-white"></i>
                        <p class="text-white">Dashboard</p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="{{ route('account.index') }}" class="nav-link {{ activeSegment('accounts') }}">
                        <i class="nav-icon fas fa-luggage-cart text-white"></i>
                        <p class="text-white">Accounts</p>
                    </a>
                </li>
                <li class="nav-item has-treeview ">
                    <a href="{{ route('client.index') }}" class="nav-link {{ activeSegment('clients') }}">
                        <i class="nav-icon fas fa-male text-white"></i>
                        <p class="text-white">Clients</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('account.type.index') }}" class="nav-link {{ activeSegment('accountTypes') }}">
                        <i class="nav-icon fas fa-cash-register text-white"></i>
                        <p class="text-white">Account Types</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('transaction.show') }}" class="nav-link {{ activeSegment('transactions') }}">
                        <i class="nav-icon fas fa-expand text-white"></i>
                        <p class="text-white">Transactions</p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="{{ route('user.show') }}" class="nav-link {{ activeSegment('users') }}">
                        <i class="nav-icon fas fa-users text-white"></i>
                        <p class="text-white">Users</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('permission.show') }}" class="nav-link {{ activeSegment('permissions') }}">
                        <i class="nav-icon fas fa-low-vision text-white"></i>
                        <p class="text-white">Permissions</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('role.show') }}" class="nav-link {{ activeSegment('roles') }}">
                        <i class="nav-icon fas fa-road text-white"></i>
                        <p class="text-white">Role</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('settings.index') }}" class="nav-link {{ activeSegment('settings') }}">
                        <i class="nav-icon fas fa-cogs text-white"></i>
                        <p class="text-white">Settings</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
