<!-- VALEX SIDEBAR -->
<div class="app-menu navbar-menu" id="adminSidebar">
    <!-- LOGO BOX -->
    <div class="navbar-brand-box border-bottom border-dark-subtle" style="background: #0d1636; height: 70px; display: flex; align-items: center;">
        <a class="valex-brand-logo" href="{{ route('dashboard') }}">
            <div class="valex-brand-icon">
                <i class="bi bi-shield-lock-fill"></i>
            </div>
            <div class="valex-brand-text">
                Admin
                <span>Portal</span>
            </div>
        </a>
    </div>

    <div class="h-100 py-3" style="overflow-y: auto;">
        <div class="container-fluid px-0">
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title px-3 py-2 text-uppercase fs-11 fw-semibold" style="color: #6d7899; letter-spacing: 0.8px;">
                    <span>Main</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link px-3 py-2 d-flex align-items-center gap-2.5 text-white {{ request()->routeIs('dashboard') || request()->routeIs('admin.dashboard') ? 'active text-white' : '' }}" href="{{ route('dashboard') }}" style="{{ request()->routeIs('dashboard') || request()->routeIs('admin.dashboard') ? 'background: rgba(1, 98, 232, 0.2); color: #ffffff !important; border-left: 3px solid #0162e8;' : '' }}">
                        <i class="bi bi-grid-1x2-fill fs-15 text-primary"></i>
                        <span class="fs-13">Dashboard</span>
                    </a>
                </li>

                <li class="menu-title px-3 py-2 text-uppercase fs-11 fw-semibold mt-2" style="color: #6d7899; letter-spacing: 0.8px;">
                    <span>Website Content</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link px-3 py-2 d-flex align-items-center gap-2.5 text-white {{ request()->routeIs('admin.website-pages.index') ? 'active text-white' : '' }}" href="{{ route('admin.website-pages.index') }}" style="{{ request()->routeIs('admin.website-pages.index') ? 'background: rgba(1, 98, 232, 0.2); color: #ffffff !important; border-left: 3px solid #0162e8;' : '' }}">
                        <i class="bi bi-layout-text-window-reverse fs-15 text-primary"></i>
                        <span class="fs-13">All Website Pages</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link px-3 py-2 d-flex align-items-center gap-2.5 text-white {{ request()->fullUrlIs('*section=highlights_strip*') ? 'active text-white' : '' }}" href="{{ route('admin.website-pages.home', ['section' => 'highlights_strip']) }}" style="{{ request()->fullUrlIs('*section=highlights_strip*') ? 'background: rgba(1, 98, 232, 0.2); color: #ffffff !important; border-left: 3px solid #0162e8;' : '' }}">
                        <i class="bi bi-collection-play-fill fs-15 text-warning"></i>
                        <span class="fs-13">Highlights Strip</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link px-3 py-2 d-flex align-items-center gap-2.5 text-white {{ request()->fullUrlIs('*section=welcome_section*') ? 'active text-white' : '' }}" href="{{ route('admin.website-pages.home', ['section' => 'welcome_section']) }}" style="{{ request()->fullUrlIs('*section=welcome_section*') ? 'background: rgba(1, 98, 232, 0.2); color: #ffffff !important; border-left: 3px solid #0162e8;' : '' }}">
                        <i class="bi bi-award fs-15 text-warning"></i>
                        <span class="fs-13">Welcome To GPO</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link px-3 py-2 d-flex align-items-center gap-2.5 text-white {{ request()->fullUrlIs('*section=why_gpo*') ? 'active text-white' : '' }}" href="{{ route('admin.website-pages.home', ['section' => 'why_gpo']) }}" style="{{ request()->fullUrlIs('*section=why_gpo*') ? 'background: rgba(1, 98, 232, 0.2); color: #ffffff !important; border-left: 3px solid #0162e8;' : '' }}">
                        <i class="bi bi-check2-circle fs-15 text-success"></i>
                        <span class="fs-13">Why People Love GPO</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link px-3 py-2 d-flex align-items-center gap-2.5 text-white {{ request()->fullUrlIs('*section=signature_dish*') ? 'active text-white' : '' }}" href="{{ route('admin.website-pages.home', ['section' => 'signature_dish']) }}" style="{{ request()->fullUrlIs('*section=signature_dish*') ? 'background: rgba(1, 98, 232, 0.2); color: #ffffff !important; border-left: 3px solid #0162e8;' : '' }}">
                        <i class="bi bi-star-fill fs-15 text-danger"></i>
                        <span class="fs-13">Star of GPO</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link px-3 py-2 d-flex align-items-center gap-2.5 text-white {{ request()->fullUrlIs('*section=gpo_experience*') ? 'active text-white' : '' }}" href="{{ route('admin.website-pages.home', ['section' => 'gpo_experience']) }}" style="{{ request()->fullUrlIs('*section=gpo_experience*') ? 'background: rgba(1, 98, 232, 0.2); color: #ffffff !important; border-left: 3px solid #0162e8;' : '' }}">
                        <i class="bi bi-stars fs-15 text-primary"></i>
                        <span class="fs-13">The GPO Experience</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link px-3 py-2 d-flex align-items-center gap-2.5 text-white {{ request()->fullUrlIs('*section=hero_section*') ? 'active text-white' : '' }}" href="{{ route('admin.website-pages.home', ['section' => 'hero_section']) }}" style="{{ request()->fullUrlIs('*section=hero_section*') ? 'background: rgba(1, 98, 232, 0.2); color: #ffffff !important; border-left: 3px solid #0162e8;' : '' }}">
                        <i class="bi bi-images fs-15 text-info"></i>
                        <span class="fs-13">Hero Banner Slider</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- User Bottom Card -->
    <div class="sidebar-user p-3 border-top border-dark-subtle" style="background: rgba(13, 22, 54, 0.7);">
        <div class="d-flex align-items-center gap-2">
            <img class="rounded-circle" height="36" width="36" src="https://doc.aghoitsolutions.in/backend/assets/images/icons8-user-default-64.png" alt="Admin Avatar" />
            <div class="flex-grow-1 overflow-hidden">
                <h6 class="text-white mb-0 fs-13 text-truncate fw-semibold">{{ Auth::user()->name ?? 'Super Admin' }}</h6>
                <small class="text-info fs-11 text-truncate d-block">{{ Auth::user()->email ?? 'superadmin@gmail.com' }}</small>
            </div>
            <a class="text-white opacity-50 text-decoration-none" href="{{ route('profile.edit') }}" title="Security Settings">
                <i class="bi bi-gear fs-14"></i>
            </a>
        </div>
    </div>
     
</div>
