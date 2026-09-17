<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Original GPO Ke Thandey Dahi Bade')</title>
    <meta name="description" content="@yield('meta_description', 'The Original Taste of Lucknow Since 1976 — Original GPO Ke Thandey Dahi Bade.')">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    @yield('styles')
</head>
<body class="@yield('body_class', 'theme-aqua')">

    <!-- TOP HEADER -->
    <header class="site-header">
        <div class="header-inner">
            <a href="{{ route('home') }}" class="brand-wrapper">
                <div class="brand-icon">
                    <svg viewBox="0 0 24 24"><path d="M12 2L2 7v3c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5zm-1 14l-3.5-3.5 1.42-1.42L11 13.17l5.08-5.09L17.5 9.5 11 16z"/></svg>
                </div>
                <div class="brand-titles">
                    <span class="brand-main">ORIGINAL GPO</span>
                    <span class="brand-sub">Ke Thandey Dahi Bade • Since 1976</span>
                </div>
            </a>

            <ul class="main-nav-list" id="mainNav">
                <li><a href="{{ route('home') }}" class="main-nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('story') }}" class="main-nav-link {{ request()->routeIs('story') ? 'active' : '' }}">Our Story</a></li>
                <li><a href="{{ route('menu') }}" class="main-nav-link {{ request()->routeIs('menu') ? 'active' : '' }}">Menu</a></li>
                <li><a href="{{ route('franchise') }}" class="main-nav-link {{ request()->routeIs('franchise') ? 'active' : '' }}">Franchise</a></li>
                <li><a href="{{ route('contact') }}" class="main-nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
            </ul>

            <div class="header-right">
                <a href="{{ route('menu') }}" class="btn-nav-order">Order Now</a>
                <button class="mobile-toggle-btn" id="mobileToggle" aria-label="Toggle navigation">☰</button>
            </div>
        </div>
    </header>

    @if (session('success'))
        <div style="max-width: 1220px; margin: 20px auto 0; padding: 0 24px;">
            <div style="background: #e6f9ed; border: 1px solid #1b7a43; color: #0e5b30; padding: 16px 24px; border-radius: 9999px; font-weight: 600; text-align: center; box-shadow: 0 4px 15px rgba(0,0,0,0.06);">
                ✓ {{ session('success') }}
            </div>
        </div>
    @endif

    @if (isset($errors) && $errors->any())
        <div style="max-width: 1220px; margin: 20px auto 0; padding: 0 24px;">
            <div style="background: #fde8e8; border: 1px solid #f87171; color: #991b1b; padding: 16px 24px; border-radius: 12px; font-weight: 600;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <main>
        @yield('content')
    </main>

    <!-- UNIFIED 4-COLUMN FOOTER (Document Pages 21-22) -->
    <footer class="site-footer-doc">
        <div class="footer-grid-doc">
            <!-- Col 1: Brand & Tagline -->
            <div class="footer-col-brand">
                <div class="footer-brand-title">ORIGINAL GPO KE THANDEY DAHI BADE</div>
                <div class="footer-brand-tagline">THE ORIGINAL TASTE OF LUCKNOW SINCE 1976</div>
                <p>A cherished Lucknow food destination known for its signature Thandey Dahi Bade and traditional Indian snacks.</p>
                <div class="footer-social-icons-doc">
                    <a href="#" class="footer-social-pill" aria-label="Facebook">Facebook</a>
                    <a href="#" class="footer-social-pill" aria-label="Instagram">Instagram</a>
                    <a href="https://wa.me/919140631433" class="footer-social-pill" aria-label="WhatsApp">WhatsApp</a>
                </div>
            </div>

            <!-- Col 2: Quick Links -->
            <div>
                <div class="footer-heading-doc">QUICK LINKS</div>
                <ul class="footer-links-list-doc">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('story') }}">Our Story</a></li>
                    <li><a href="{{ route('menu') }}">Menu</a></li>
                    <li><a href="{{ route('franchise') }}">Franchise</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                </ul>
            </div>

            <!-- Col 3: Our Specialities -->
            <div>
                <div class="footer-heading-doc">OUR SPECIALITIES</div>
                <ul class="footer-links-list-doc">
                    <li><a href="{{ route('menu') }}">Dahi Bade</a></li>
                    <li><a href="{{ route('menu') }}">Dahi Bade Half Plate</a></li>
                    <li><a href="{{ route('menu') }}">Dahi Vada Packed</a></li>
                    <li><a href="{{ route('menu') }}">Moong Dal Chilla</a></li>
                    <li><a href="{{ route('menu') }}">Samosa</a></li>
                    <li><a href="{{ route('menu') }}">Samosa Chaat</a></li>
                </ul>
            </div>

            <!-- Col 4: Franchise & Contact -->
            <div>
                <div class="footer-heading-doc">FRANCHISE & CONTACT</div>
                <ul class="footer-links-list-doc" style="margin-bottom: 12px;">
                    <li><a href="{{ route('franchise') }}">Franchise Opportunity</a></li>
                    <li><a href="{{ route('franchise') }}#whyPartner">Why GPO</a></li>
                    <li><a href="{{ route('franchise') }}#journey">Franchise Process</a></li>
                    <li><a href="{{ route('franchise') }}#enquiryForm">Franchise Enquiry</a></li>
                </ul>
                <div class="footer-contact-info-doc">
                    <div>
                        <strong>Outlet:</strong> Shop No. 1, Awadh Bazaar, Mahatma Gandhi Marg, Near K.D. Singh Babu Stadium, Hazratganj, Lucknow, UP – 226001
                    </div>
                    <div>
                        <strong>Call:</strong> <a href="tel:+919140631433">+91 91406 31433</a>
                    </div>
                    <div>
                        <strong>Email:</strong> <a href="mailto:support@gpokethandeydahibade.com">support@gpokethandeydahibade.com</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom-bar-doc">
            <span>© 2026 Original GPO Ke Thandey Dahi Bade. All Rights Reserved.</span>
            <span>Preserving Awadh's Authentic Taste Since 1976</span>
        </div>
    </footer>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.getElementById('mobileToggle')?.addEventListener('click', () => {
            const nav = document.getElementById('mainNav');
            nav.style.display = nav.style.display === 'flex' ? 'none' : 'flex';
        });
    </script>
    @yield('scripts')
</body>
</html>
