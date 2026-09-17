<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Login') | Original GPO Ke Thandey Dahi Bade</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --c-teal-deep: #083b3c;
            --c-teal-darker: #052c2d;
            --c-teal-light: #165654;
            --c-gold-amber: #ecc67d;
            --c-gold-hover: #dfb564;
            --c-terracotta: #c96c4b;
            --c-terracotta-hover: #b45b3a;
            --text-dark: #1a2523;
            --text-muted: #5e716d;
            --border-color: #d6e3df;
            --font-serif: 'Playfair Display', Georgia, serif;
            --font-sans: 'Plus Jakarta Sans', sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: var(--font-sans);
        }

        html, body {
            height: 100vh;
            max-height: 100vh;
            overflow: hidden;
        }

        body {
            background: linear-gradient(135deg, #052324 0%, #083b3c 45%, #134d4a 100%);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 16px;
            box-sizing: border-box;
        }

        /* Ambient glowing background circles */
        body::before {
            content: '';
            position: absolute;
            width: 550px;
            height: 550px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(236, 198, 125, 0.12) 0%, transparent 70%);
            top: -100px;
            left: -100px;
            pointer-events: none;
        }

        body::after {
            content: '';
            position: absolute;
            width: 480px;
            height: 480px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(201, 108, 75, 0.15) 0%, transparent 70%);
            bottom: -80px;
            right: -80px;
            pointer-events: none;
        }

        .auth-container {
            width: 100%;
            max-width: 960px;
            height: min(580px, calc(100vh - 32px));
            background: #ffffff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 24px 70px rgba(0, 0, 0, 0.40);
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            position: relative;
            z-index: 10;
            border: 1px solid rgba(255, 255, 255, 0.25);
        }

        /* Form Side */
        .auth-form-side {
            padding: 34px 44px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: #ffffff;
            height: 100%;
            overflow: hidden;
        }

        .back-home-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.82rem;
            font-weight: 600;
            color: var(--text-muted);
            text-decoration: none;
            margin-bottom: 16px;
            transition: color 0.2s;
        }

        .back-home-link:hover {
            color: var(--c-teal-deep);
        }

        .auth-brand-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            margin-bottom: 20px;
        }

        .logo-symbol-wrap {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--c-teal-deep), #165654);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 14px rgba(8, 59, 60, 0.28);
            border: 1.5px solid var(--c-gold-amber);
        }

        .logo-symbol-wrap svg {
            width: 24px;
            height: 24px;
            fill: #ffffff;
        }

        .brand-text {
            display: flex;
            flex-direction: column;
        }

        .brand-name {
            font-family: var(--font-serif);
            font-weight: 800;
            font-size: 1.3rem;
            color: var(--c-teal-deep);
            letter-spacing: 0.5px;
            line-height: 1.1;
        }

        .brand-subtitle {
            font-size: 0.7rem;
            color: var(--text-muted);
            font-weight: 600;
            letter-spacing: 0.6px;
        }

        .auth-heading {
            font-family: var(--font-serif);
            font-size: 25px;
            font-weight: 700;
            color: var(--c-teal-deep);
            letter-spacing: -0.3px;
            margin-bottom: 4px;
        }

        .auth-subtitle {
            font-size: 13px;
            color: var(--text-muted);
            margin-bottom: 20px;
            font-weight: 400;
        }

        .form-group {
            margin-bottom: 14px;
            position: relative;
        }

        .input-icon-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            color: #8b9c98;
            pointer-events: none;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: color 0.2s;
        }

        .input-icon svg {
            width: 18px;
            height: 18px;
        }

        .form-input {
            width: 100%;
            height: 48px;
            padding: 12px 16px 12px 46px;
            background: #fbfdfc;
            border: 1.5px solid var(--border-color);
            border-radius: 12px;
            font-size: 14px;
            color: var(--text-dark);
            outline: none;
            transition: all 0.25s ease;
        }

        .form-input:focus {
            background: #ffffff;
            border-color: var(--c-teal-deep);
            box-shadow: 0 0 0 3.5px rgba(8, 59, 60, 0.12);
        }

        .form-input:focus + .input-icon,
        .input-icon-wrapper:focus-within .input-icon {
            color: var(--c-teal-deep);
        }

        .form-input::placeholder {
            color: #9aa9a5;
            font-size: 13.5px;
        }

        .toggle-password-btn {
            position: absolute;
            right: 14px;
            background: none;
            border: none;
            cursor: pointer;
            color: #8b9c98;
            padding: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: color 0.2s;
        }

        .toggle-password-btn:hover {
            color: var(--c-teal-deep);
        }

        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 12px 0 20px;
            font-size: 13px;
        }

        .custom-checkbox {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            color: #4a5c59;
            user-select: none;
            font-weight: 500;
        }

        .custom-checkbox input {
            accent-color: var(--c-teal-deep);
            width: 17px;
            height: 17px;
            border-radius: 4px;
            cursor: pointer;
        }

        .forgot-link {
            color: var(--c-terracotta);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.2s;
        }

        .forgot-link:hover {
            color: var(--c-terracotta-hover);
            text-decoration: underline;
        }

        .auth-submit-btn {
            width: 100%;
            height: 48px;
            background: linear-gradient(135deg, var(--c-teal-deep) 0%, #155554 100%);
            color: #ffffff;
            border: none;
            border-radius: 9999px;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: 0.5px;
            cursor: pointer;
            transition: all 0.25s ease;
            box-shadow: 0 8px 22px rgba(8, 59, 60, 0.28);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .auth-submit-btn:hover {
            background: linear-gradient(135deg, var(--c-teal-darker) 0%, var(--c-teal-deep) 100%);
            box-shadow: 0 10px 28px rgba(8, 59, 60, 0.38);
            transform: translateY(-1.5px);
        }

        .auth-submit-btn:active {
            transform: translateY(0);
        }

        /* Right Hero Side */
        .auth-visual-side {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-end;
            overflow: hidden;
            padding: 30px;
            background-color: #052c2d;
        }

        .hero-bg-cover {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            transition: transform 0.6s ease;
        }

        .auth-visual-side:hover .hero-bg-cover {
            transform: scale(1.04);
        }

        .hero-overlay-gradient {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(8, 59, 60, 0.25) 0%, rgba(5, 44, 45, 0.85) 100%);
            z-index: 2;
        }

        .visual-floating-badge {
            position: relative;
            z-index: 3;
            background: rgba(8, 59, 60, 0.88);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(236, 198, 125, 0.35);
            padding: 16px 22px;
            border-radius: 16px;
            color: #ffffff;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
            width: 100%;
            max-width: 320px;
            margin-bottom: 8px;
        }

        .badge-tag {
            font-family: var(--font-serif);
            font-size: 0.78rem;
            color: var(--c-gold-amber);
            letter-spacing: 1.5px;
            text-transform: uppercase;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .badge-title {
            font-family: var(--font-serif);
            font-size: 1.15rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 4px;
        }

        .badge-desc {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.82);
            line-height: 1.4;
        }

        .alert-error {
            background: #fff1f2;
            border: 1px solid #fecdd3;
            color: #be123c;
            padding: 10px 14px;
            border-radius: 10px;
            font-size: 12.5px;
            margin-bottom: 16px;
        }

        .alert-success {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #15803d;
            padding: 10px 14px;
            border-radius: 10px;
            font-size: 12.5px;
            margin-bottom: 16px;
        }

        /* Responsive */
        @media (max-width: 880px) {
            .auth-container {
                grid-template-columns: 1fr;
                max-width: 480px;
            }

            .auth-visual-side {
                display: none;
            }

            .auth-form-side {
                padding: 36px 28px;
            }
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <!-- Form Column -->
        <div class="auth-form-side">
            <a href="{{ route('home') }}" class="back-home-link">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                Back to Website
            </a>

            <a href="{{ route('home') }}" class="auth-brand-logo">
                <div class="logo-symbol-wrap">
                    <svg viewBox="0 0 24 24"><path d="M12 2L2 7v3c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5zm-1 14l-3.5-3.5 1.42-1.42L11 13.17l5.08-5.09L17.5 9.5 11 16z"/></svg>
                </div>
                <div class="brand-text">
                    <span class="brand-name">ORIGINAL GPO</span>
                    <span class="brand-subtitle">Ke Thandey Dahi Bade • Since 1976</span>
                </div>
            </a>

            {{ $slot ?? '' }}
            @yield('content')
        </div>

        <!-- Food Visual Column -->
        <div class="auth-visual-side">
            <img src="{{ asset('images/dahi_vada.jpg') }}" alt="Original GPO Ke Thandey Dahi Bade" class="hero-bg-cover">
            <div class="hero-overlay-gradient"></div>

            <div class="visual-floating-badge">
                <div class="badge-tag">AUTHENTIC TASTE • SINCE 1976</div>
                <div class="badge-title">Original GPO Ke Thandey Dahi Bade</div>
                <p class="badge-desc">Preserving Lucknow’s beloved Awadhi culinary heritage for generations.</p>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const pwd = document.getElementById('password');
            const icon = document.getElementById('eyeIcon');
            if (pwd.type === 'password') {
                pwd.type = 'text';
                icon.innerHTML = '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24M1 1l22 22"/>';
            } else {
                pwd.type = 'password';
                icon.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>';
            }
        }
    </script>
</body>
</html>
