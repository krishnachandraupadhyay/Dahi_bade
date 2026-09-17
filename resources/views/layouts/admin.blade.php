<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Dashboard') | {{ config('app.name', 'Original GPO Ke Thandey Dahi Bade') }}</title>

    <!-- Google Fonts (Poppins & Inter) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 & Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">

    <!-- Valex Theme Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/valex-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.min.css') }}">

    <style>
        /* Base Transitions */
        .app-menu.navbar-menu,
        #adminSidebar,
        #page-topbar,
        .main-content,
        .navbar-brand-box {
            transition: all 0.28s cubic-bezier(0.4, 0, 0.2, 1) !important;
        }

        /* Valex Smooth Sidebar & Brand Polish */
        .valex-brand-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: #ffffff;
            font-weight: 700;
            padding: 16px 20px;
            transition: all 0.28s ease;
        }
        .valex-brand-icon {
            width: 38px;
            height: 38px;
            min-width: 38px;
            border-radius: 10px;
            background: rgba(1, 98, 232, 0.25);
            color: #38cab3;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            border: 1px solid rgba(56, 202, 179, 0.4);
        }
        .valex-brand-text {
            font-size: 1.15rem;
            letter-spacing: 0.5px;
            line-height: 1.1;
            white-space: nowrap;
        }
        .valex-brand-text span {
            display: block;
            font-size: 0.68rem;
            color: #ecc67d;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Topbar Utilities */
        .valex-top-btn {
            background: #f4f6fa;
            border: 1px solid #e9edf4;
            color: #5c6269;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }
        .valex-top-btn:hover {
            background: #ffffff;
            color: #0162e8;
            box-shadow: 0 4px 10px rgba(1, 98, 232, 0.12);
        }

        .topnav-hamburger {
            cursor: pointer !important;
            border: none;
            background: transparent;
            width: 38px;
            height: 38px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }
        .topnav-hamburger:hover {
            background: rgba(1, 98, 232, 0.1) !important;
            transform: scale(1.05);
        }
        .topnav-hamburger:active {
            transform: scale(0.95);
        }

        /* ==========================================================
           DESKTOP COLLAPSED STATE (sidebar-collapsed / data-sidebar-size="sm")
           ========================================================== */
        @media (min-width: 992px) {
            body.sidebar-collapsed .app-menu.navbar-menu,
            html[data-sidebar-size="sm"] .app-menu.navbar-menu,
            body.sidebar-collapsed #adminSidebar,
            html[data-sidebar-size="sm"] #adminSidebar {
                width: 70px !important;
                min-width: 70px !important;
                max-width: 70px !important;
                overflow: hidden !important;
            }

            body.sidebar-collapsed #page-topbar,
            html[data-sidebar-size="sm"] #page-topbar {
                left: 70px !important;
            }

            body.sidebar-collapsed .main-content,
            html[data-sidebar-size="sm"] .main-content {
                margin-left: 70px !important;
                width: calc(100% - 70px) !important;
                max-width: calc(100% - 70px) !important;
            }

            body.sidebar-collapsed .navbar-brand-box,
            html[data-sidebar-size="sm"] .navbar-brand-box {
                width: 70px !important;
                min-width: 70px !important;
                max-width: 70px !important;
                padding: 0 !important;
                display: flex !important;
                justify-content: center !important;
                align-items: center !important;
            }

            body.sidebar-collapsed .valex-brand-logo,
            html[data-sidebar-size="sm"] .valex-brand-logo {
                justify-content: center !important;
                padding: 0 !important;
                width: 100% !important;
                gap: 0 !important;
            }

            body.sidebar-collapsed .valex-brand-text,
            html[data-sidebar-size="sm"] .valex-brand-text,
            body.sidebar-collapsed .menu-title,
            html[data-sidebar-size="sm"] .menu-title,
            body.sidebar-collapsed .navbar-nav .nav-link span,
            html[data-sidebar-size="sm"] .navbar-nav .nav-link span,
            body.sidebar-collapsed .sidebar-user .flex-grow-1,
            html[data-sidebar-size="sm"] .sidebar-user .flex-grow-1,
            body.sidebar-collapsed .sidebar-user a,
            html[data-sidebar-size="sm"] .sidebar-user a {
                display: none !important;
            }

            body.sidebar-collapsed .navbar-nav .nav-link,
            html[data-sidebar-size="sm"] .navbar-nav .nav-link {
                justify-content: center !important;
                padding: 14px 0 !important;
                text-align: center !important;
            }

            body.sidebar-collapsed .navbar-nav .nav-link i,
            html[data-sidebar-size="sm"] .navbar-nav .nav-link i {
                font-size: 22px !important;
                margin: 0 auto !important;
            }

            body.sidebar-collapsed .sidebar-user,
            html[data-sidebar-size="sm"] .sidebar-user {
                padding: 12px 0 !important;
                display: flex !important;
                justify-content: center !important;
            }

            body.sidebar-collapsed .sidebar-user > div,
            html[data-sidebar-size="sm"] .sidebar-user > div {
                justify-content: center !important;
                width: 100% !important;
            }
        }

        /* ==========================================================
           MOBILE SIDEBAR DRAWER (max-width: 991.98px)
           ========================================================== */
        @media (max-width: 991.98px) {
            .app-menu.navbar-menu,
            #adminSidebar {
                position: fixed !important;
                top: 0 !important;
                bottom: 0 !important;
                left: 0 !important;
                width: 260px !important;
                max-width: 85vw !important;
                z-index: 1060 !important;
                transform: translateX(-100%) !important;
                transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
                box-shadow: none !important;
            }

            body.mobile-sidebar-open .app-menu.navbar-menu,
            body.mobile-sidebar-open #adminSidebar,
            .app-menu.navbar-menu.show,
            #adminSidebar.show {
                transform: translateX(0) !important;
                box-shadow: 0 0 40px rgba(0, 0, 0, 0.5) !important;
            }

            #page-topbar {
                left: 0 !important;
            }

            .main-content {
                margin-left: 0 !important;
                width: 100% !important;
                max-width: 100% !important;
            }

            .valex-sidebar-backdrop {
                display: none;
                position: fixed;
                inset: 0;
                background: rgba(17, 28, 67, 0.65);
                backdrop-filter: blur(4px);
                -webkit-backdrop-filter: blur(4px);
                z-index: 1050;
            }

            body.mobile-sidebar-open .valex-sidebar-backdrop,
            .valex-sidebar-backdrop.active {
                display: block !important;
            }
        }
    </style>

    <!-- Global Early Script for Hamburger Function -->
    <script>
        function toggleHamburgerMenu(e) {
            if (e) {
                e.preventDefault();
                e.stopPropagation();
            }
            const isMobile = window.innerWidth <= 991.98;
            const body = document.body;
            const html = document.documentElement;
            const sidebar = document.getElementById('adminSidebar');
            const backdrop = document.getElementById('valexBackdrop');
            const hamburgerBtn = document.getElementById('topnav-hamburger-icon');

            if (isMobile) {
                // Mobile Drawer Toggle
                const isOpen = body.classList.contains('mobile-sidebar-open') || (sidebar && sidebar.classList.contains('show'));
                if (isOpen) {
                    body.classList.remove('mobile-sidebar-open');
                    if (sidebar) sidebar.classList.remove('show');
                    if (backdrop) backdrop.classList.remove('active');
                } else {
                    body.classList.add('mobile-sidebar-open');
                    if (sidebar) sidebar.classList.add('show');
                    if (backdrop) backdrop.classList.add('active');
                }
            } else {
                // Desktop Toggle: 250px <=> 70px
                const isCollapsed = body.classList.contains('sidebar-collapsed') || html.getAttribute('data-sidebar-size') === 'sm';
                if (isCollapsed) {
                    body.classList.remove('sidebar-collapsed');
                    html.setAttribute('data-sidebar-size', 'lg');
                    if (hamburgerBtn) hamburgerBtn.classList.remove('open');
                    try { localStorage.setItem('valex_sidebar_state', 'expanded'); } catch(err){}
                } else {
                    body.classList.add('sidebar-collapsed');
                    html.setAttribute('data-sidebar-size', 'sm');
                    if (hamburgerBtn) hamburgerBtn.classList.add('open');
                    try { localStorage.setItem('valex_sidebar_state', 'collapsed'); } catch(err){}
                }
            }
        }

        // Restore saved preference
        (function() {
            try {
                const saved = localStorage.getItem('valex_sidebar_state');
                if (saved === 'collapsed' && window.innerWidth > 991.98) {
                    document.documentElement.setAttribute('data-sidebar-size', 'sm');
                    document.addEventListener('DOMContentLoaded', function() {
                        document.body.classList.add('sidebar-collapsed');
                    });
                }
            } catch(e) {}
        })();
    </script>

    @yield('styles')
    @stack('styles')
</head>
<body>
    <div id="layout-wrapper">
        <!-- Reusable Valex Topbar Component -->
        @include('admin.partials.topbar')

        <!-- Reusable Valex Sidebar Component -->
        @include('admin.partials.sidebar')

        <!-- Main Content Area -->
        <div class="main-content">
            <div class="page-content wrapper valex-dashboard-wrapper">
                <div class="container-fluid">
                    @yield('content')
                    {{ $slot ?? '' }}
                </div>
            </div>

            <!-- Valex Standard Admin Footer -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-sm-6 text-muted">
                            © <script>document.write(new Date().getFullYear())</script> <strong>Original GPO Ke Thandey Dahi Bade</strong>. Lucknow Since 1976.
                        </div>
                        <div class="col-sm-6 text-sm-end text-muted">
                            <span class="badge bg-success-transparent text-success me-2">● Outlet Active</span>
                            Awadh Bazaar, Hazratganj
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Mobile Sidebar Backdrop Overlay -->
    <div class="valex-sidebar-backdrop" id="valexBackdrop"></div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Triple-layer bind on hamburger button
            const hamburgerBtn = document.getElementById('topnav-hamburger-icon');
            if (hamburgerBtn) {
                hamburgerBtn.addEventListener('click', toggleHamburgerMenu);
            }

            // Event delegation fallback
            document.addEventListener('click', function(e) {
                if (e.target && (e.target.closest('#topnav-hamburger-icon') || e.target.id === 'topnav-hamburger-icon')) {
                    toggleHamburgerMenu(e);
                }
            });

            // Close when clicking mobile backdrop
            const backdrop = document.getElementById('valexBackdrop');
            if (backdrop) {
                backdrop.addEventListener('click', function() {
                    document.body.classList.remove('mobile-sidebar-open');
                    const sidebar = document.getElementById('adminSidebar');
                    if (sidebar) sidebar.classList.remove('show');
                    backdrop.classList.remove('active');
                });
            }

            // Fullscreen Toggle
            document.querySelectorAll('[data-toggle="fullscreen"]').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (!document.fullscreenElement) {
                        document.documentElement.requestFullscreen().catch(() => {});
                    } else {
                        if (document.exitFullscreen) {
                            document.exitFullscreen().catch(() => {});
                        }
                    }
                });
            });
        });
    </script>

    @yield('scripts')
    @stack('scripts')
</body>
</html>
