<!-- VALEX HEADER / TOPBAR -->
<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex align-items-center">
            <!-- Sidebar Hamburger Toggle -->
            <button type="button" class="btn btn-sm px-0 fs-xl vertical-menu-btn topnav-hamburger shadow-none hamburger-icon me-3" id="topnav-hamburger-icon" onclick="toggleHamburgerMenu(event)" aria-label="Toggle Sidebar" title="Toggle Sidebar">
                <i class="bx bx-menu fs-3xl" style="font-size: 24px; color: #0162e8;"></i>
            </button>

            <!-- Valex Header Search Bar -->
            <div class="valex-header-search d-none d-md-block">
                <i class="bi bi-search search-icon" style="position: absolute; left: 14px; top: 11px; color: #8c9097;"></i>
                <input type="text" class="form-control form-control-sm" placeholder="Search records, dashboard..." style="padding-left: 38px;">
            </div>
        </div>

        <div class="d-flex align-items-center gap-2">
            <!-- Live Website Link -->
            <a href="{{ route('home') }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1.5 fw-semibold d-none d-sm-inline-flex align-items-center gap-1">
                <span>Live Website</span>
                <i class="bi bi-box-arrow-up-right fs-11"></i>
            </a>

            <!-- Fullscreen button -->
            <button type="button" class="btn valex-top-btn d-none d-sm-inline-flex" data-toggle="fullscreen" title="Toggle Fullscreen">
                <i class="bx bx-fullscreen fs-xl"></i>
            </button>

            <!-- Notifications Dropdown -->
            <div class="dropdown topbar-head-dropdown">
                <button type="button" class="btn valex-top-btn position-relative" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-bell fs-xl"></i>
                    <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                        <span class="visually-hidden">New alerts</span>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0 shadow-lg border-0" aria-labelledby="page-header-notifications-dropdown" style="width: 320px;">
                    <div class="p-3 bg-primary text-white rounded-top d-flex align-items-center justify-content-between">
                        <h6 class="m-0 text-white fw-semibold fs-14">Notifications</h6>
                        <span class="badge bg-white text-primary rounded-pill fs-11">Live Queue</span>
                    </div>
                    <div class="p-3 text-center text-muted fs-13">
                        <i class="bi bi-bell-slash fs-2 d-block mb-1 opacity-50"></i>
                        No new unread notifications.
                    </div>
                </div>
            </div>

            <!-- User Profile Dropdown -->
            <div class="dropdown topbar-user ms-2">
                <button type="button" class="btn shadow-none p-0 d-flex align-items-center gap-2" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" height="36" width="36" src="https://doc.aghoitsolutions.in/backend/assets/images/icons8-user-default-64.png" alt="User Avatar" />
                    <div class="text-start d-none d-xl-block">
                        <span class="fw-semibold user-name-text d-block lh-1 text-dark fs-13">
                            {{ Auth::user()->name ?? 'Super Admin' }}
                        </span>
                        <span class="fs-11 user-name-sub-text text-primary fw-medium">
                            Super Admin
                        </span>
                    </div>
                    <i class="bi bi-chevron-down fs-11 text-muted d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end shadow-lg border-0 mt-2" style="min-width: 200px;">
                    <div class="px-3 py-2 border-bottom">
                        <h6 class="mb-0 fw-bold fs-13 text-dark">{{ Auth::user()->name ?? 'Super Admin' }}</h6>
                        <small class="text-muted fs-11">{{ Auth::user()->email ?? 'superadmin@gmail.com' }}</small>
                    </div>
                    <a class="dropdown-item py-2 d-flex align-items-center" href="{{ route('profile.edit') }}">
                        <i class="bi bi-shield-lock me-2 text-primary"></i>
                        <span>Change Password</span>
                    </a>
                    <div class="dropdown-divider my-1"></div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger py-2 border-0 bg-transparent w-100 text-start d-flex align-items-center">
                            <i class="bi bi-box-arrow-right me-2"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
