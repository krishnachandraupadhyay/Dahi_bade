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

                @php
                    $isWebsitePagesActive = request()->routeIs('admin.website-pages.*');
                    $isHomeActive = request()->routeIs('admin.website-pages.home');
                    $currentSection = request('section', 'hero_section');
                @endphp

                <!-- 1. All Website Pages (Collapsible Parent) -->
                <li class="nav-item">
                    <a class="nav-link menu-link px-3 py-2 d-flex align-items-center justify-content-between text-white {{ $isWebsitePagesActive ? 'active' : '' }}" 
                       data-bs-toggle="collapse" 
                       href="#sidebarWebsitePages" 
                       role="button" 
                       aria-expanded="{{ $isWebsitePagesActive ? 'true' : 'false' }}" 
                       aria-controls="sidebarWebsitePages"
                       style="{{ $isWebsitePagesActive ? 'background: linear-gradient(135deg, rgba(1, 98, 232, 0.95), rgba(5, 195, 251, 0.85)) !important; color: #ffffff !important; font-weight: 600 !important; box-shadow: 0 4px 12px rgba(1, 98, 232, 0.35) !important;' : '' }}">
                        <div class="d-flex align-items-center gap-2.5">
                            <i class="bi bi-layout-text-window-reverse fs-15 text-primary"></i>
                            <span class="fs-13">All Website Pages</span>
                        </div>
                        <i class="bi bi-chevron-down fs-11 menu-arrow"></i>
                    </a>

                    <!-- Submenu Level 1: Website Pages -->
                    <div class="collapse menu-dropdown {{ $isWebsitePagesActive ? 'show' : '' }}" id="sidebarWebsitePages">
                        <ul class="nav nav-sm flex-column">

                            <!-- All Pages Table / Overview Link -->
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.website-pages.index') ? 'active' : '' }}" 
                                   href="{{ route('admin.website-pages.index') }}">
                                    <i class="bi bi-grid-fill fs-12 text-info"></i>
                                    <span>All Pages Overview</span>
                                </a>
                            </li>

                            <!-- Subcategory: Home (Collapsible) -->
                            <li class="nav-item">
                                <a class="nav-link home-subnav-toggle d-flex align-items-center justify-content-between text-white {{ $isHomeActive ? 'active' : '' }}" 
                                   data-bs-toggle="collapse" 
                                   href="#sidebarHomePage" 
                                   role="button" 
                                   aria-expanded="{{ $isHomeActive ? 'true' : 'false' }}" 
                                   aria-controls="sidebarHomePage">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="bi bi-house-door-fill fs-13 text-warning"></i>
                                        <span class="fw-semibold">Home</span>
                                    </div>
                                    <i class="bi bi-chevron-down fs-10 menu-arrow"></i>
                                </a>

                                <!-- Subcategory of Home: Sections list (All Home items) -->
                                <div class="collapse {{ $isHomeActive ? 'show' : '' }}" id="sidebarHomePage">
                                    <div class="home-sections-container">
                                        <a href="{{ route('admin.website-pages.home', ['section' => 'hero_section']) }}" 
                                           class="home-section-link {{ $isHomeActive && $currentSection === 'hero_section' ? 'active' : '' }}">
                                            <i class="bi bi-images text-info"></i>
                                            <span>Hero Banner Slider</span>
                                        </a>

                                        <a href="{{ route('admin.website-pages.home', ['section' => 'highlights_strip']) }}" 
                                           class="home-section-link {{ $isHomeActive && $currentSection === 'highlights_strip' ? 'active' : '' }}">
                                            <i class="bi bi-collection-play-fill text-warning"></i>
                                            <span>Highlights Strip</span>
                                        </a>

                                        <a href="{{ route('admin.website-pages.home', ['section' => 'welcome_section']) }}" 
                                           class="home-section-link {{ $isHomeActive && $currentSection === 'welcome_section' ? 'active' : '' }}">
                                            <i class="bi bi-award-fill text-warning"></i>
                                            <span>Welcome To GPO</span>
                                        </a>

                                        <a href="{{ route('admin.website-pages.home', ['section' => 'why_gpo']) }}" 
                                           class="home-section-link {{ $isHomeActive && $currentSection === 'why_gpo' ? 'active' : '' }}">
                                            <i class="bi bi-check2-circle text-success"></i>
                                            <span>Why People Love GPO</span>
                                        </a>

                                        <a href="{{ route('admin.website-pages.home', ['section' => 'signature_dish']) }}" 
                                           class="home-section-link {{ $isHomeActive && $currentSection === 'signature_dish' ? 'active' : '' }}">
                                            <i class="bi bi-star-fill text-danger"></i>
                                            <span>Star of GPO</span>
                                        </a>

                                        <a href="{{ route('admin.website-pages.home', ['section' => 'gpo_experience']) }}" 
                                           class="home-section-link {{ $isHomeActive && $currentSection === 'gpo_experience' ? 'active' : '' }}">
                                            <i class="bi bi-stars text-primary"></i>
                                            <span>The GPO Experience</span>
                                        </a>

                                        <a href="{{ route('admin.website-pages.home', ['section' => 'visit_us']) }}" 
                                           class="home-section-link {{ $isHomeActive && $currentSection === 'visit_us' ? 'active' : '' }}">
                                            <i class="bi bi-geo-alt-fill text-info"></i>
                                            <span>Visit Us & Store Info</span>
                                        </a>

                                        <a href="{{ route('admin.website-pages.home', ['section' => 'franchise_cta']) }}" 
                                           class="home-section-link {{ $isHomeActive && $currentSection === 'franchise_cta' ? 'active' : '' }}">
                                            <i class="bi bi-shop-window text-success"></i>
                                            <span>Franchise CTA</span>
                                        </a>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
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
