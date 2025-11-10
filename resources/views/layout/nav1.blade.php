<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            <i class="bi bi-church"></i>
            ChurchData
        </a>
    </div>

    @php
        $role = Auth::user()->role ?? null;
    @endphp

    <div class="sidebar-menu">
        @if($role === 'admin')
            {{-- Admin Sidebar --}}
            <div class="menu-section">
                <div class="menu-title">Main</div>
                <a href="#" class="menu-item active">
                    <i class="bi bi-speedometer2"></i>
                    Dashboard
                </a>
            </div>

            <div class="menu-section">
                <div class="menu-title">Users</div>
                <a href="/admin/admin/list" class="menu-item">
                    <i class="bi bi-shield-check"></i>
                    Admin
                </a>
                <a href="/admin/accountant/list" class="menu-item">
                    <i class="bi bi-calculator"></i>
                    Accountant
                </a>
                <a href="/admin/parish/list" class="menu-item">
                    <i class="bi bi-building"></i>
                    Parish
                </a>
            </div>

            <div class="menu-section">
                <div class="menu-title">Data Management</div>
                <a href="/admin/contribution/list" class="menu-item">
                    <i class="bi bi-cash-stack"></i>
                    Contribution Categories
                </a>
                <a href="/admin/population/list" class="menu-item">
                    <i class="bi bi-people-fill"></i>
                    Population Categories
                </a>
            </div>

            <div class="menu-section">
                <div class="menu-title">Reports</div>
                <a href="#" class="menu-item">
                    <i class="bi bi-file-earmark-text"></i>
                    Weekly Reports
                </a>
                <a href="#" class="menu-item">
                    <i class="bi bi-graph-up"></i>
                    Analytics
                </a>
            </div>

        @elseif($role === 'accountant')
            {{-- Accountant Sidebar (same for now) --}}
            <div class="menu-section">
                <div class="menu-title">Main</div>
                <a href="#" class="menu-item active">
                    <i class="bi bi-speedometer2"></i>
                    Dashboard
                </a>
            </div>

            <div class="menu-section">
                <div class="menu-title">Users</div>
                <a href="/admin/admin/list" class="menu-item">
                    <i class="bi bi-shield-check"></i>
                    Admin
                </a>
                <a href="/admin/accountant/list" class="menu-item">
                    <i class="bi bi-calculator"></i>
                    Accountant
                </a>
                <a href="/admin/parish/list" class="menu-item">
                    <i class="bi bi-building"></i>
                    Parish
                </a>
            </div>

            <div class="menu-section">
                <div class="menu-title">Data Management</div>
                <a href="#" class="menu-item">
                    <i class="bi bi-cash-stack"></i>
                    Contribution Categories
                </a>
                <a href="#" class="menu-item">
                    <i class="bi bi-people-fill"></i>
                    Population Categories
                </a>
            </div>

            <div class="menu-section">
                <div class="menu-title">Reports</div>
                <a href="#" class="menu-item">
                    <i class="bi bi-file-earmark-text"></i>
                    Weekly Reports
                </a>
                <a href="#" class="menu-item">
                    <i class="bi bi-graph-up"></i>
                    Analytics
                </a>
            </div>

        @elseif($role === 'parish')
            {{-- Parish Sidebar (same for now) --}}
            <div class="menu-section">
                <div class="menu-title">Main</div>
                <a href="/parish/dashboard" class="menu-item active">
                    <i class="bi bi-speedometer2"></i>
                    Dashboard
                </a>
            </div>


            <div class="menu-section">
                <div class="menu-title">Data Management</div>
                <a href="/parish/submit" class="menu-item">
                    <i class="bi bi-cash-stack"></i>
                    Send Data
                </a>
                <a href="/parish/submissions" class="menu-item">
                    <i class="bi bi-people-fill"></i>
                    View Submissions
                </a>
            </div>

            <div class="menu-section">
                <div class="menu-title">Reports</div>
                <a href="#" class="menu-item">
                    <i class="bi bi-file-earmark-text"></i>
                    Weekly Reports
                </a>
                <a href="#" class="menu-item">
                    <i class="bi bi-graph-up"></i>
                    Analytics
                </a>
            </div>
        @endif
    </div>
</div>

<!-- Top Navbar -->
<div class="top-navbar">
    <div class="navbar-search">
        <i class="bi bi-search"></i>
        <input type="text" placeholder="Search...">
    </div>

    <div class="navbar-actions">
        <div class="navbar-icon">
            <i class="bi bi-bell"></i>
            <span class="badge-notification">5</span>
        </div>

        <div class="navbar-icon">
            <i class="bi bi-gear"></i>
        </div>

        <div class="dropdown">
            <div class="user-dropdown" data-bs-toggle="dropdown">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'User') }}&background=1e40af&color=fff"
                     alt="User" class="user-avatar">
                <div class="user-info">
                    <span class="user-name">{{ Auth::user()->name ?? 'User' }}</span>
                    <span class="user-role text-capitalize">{{ $role ?? 'Guest' }}</span>
                </div>
                <i class="bi bi-chevron-down"></i>
            </div>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profile</a></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
