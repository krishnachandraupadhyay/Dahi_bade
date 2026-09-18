@extends('layouts.admin')

@section('title', 'Global Website Settings')

@section('content')
<style>
    /* Premium Modern Form Styling */
    .settings-config-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(15, 23, 42, 0.04), 0 1px 2px rgba(15, 23, 42, 0.02);
        overflow: hidden;
    }
    .settings-row {
        display: flex;
        align-items: flex-start;
        padding: 18px 24px;
        border-bottom: 1px solid #f1f5f9;
        transition: background-color 0.15s ease;
    }
    .settings-row:last-child {
        border-bottom: none;
    }
    .settings-row:hover {
        background-color: #fafbfc;
    }
    .settings-label-col {
        width: 260px;
        min-width: 240px;
        flex-shrink: 0;
        padding-right: 24px;
        padding-top: 5px;
    }
    .settings-label-title {
        font-size: 13.5px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 3px;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .settings-label-desc {
        font-size: 12px;
        color: #64748b;
        line-height: 1.45;
        margin-bottom: 0;
    }
    .settings-input-col {
        flex-grow: 1;
        width: 100%;
    }
    .modern-input, .modern-textarea, .modern-select {
        border: 1.5px solid #cbd5e1 !important;
        border-radius: 8px !important;
        font-size: 13.5px !important;
        padding: 8px 14px !important;
        transition: all 0.2s ease !important;
        color: #1e293b !important;
        background-color: #ffffff !important;
    }
    .modern-input:focus, .modern-textarea:focus, .modern-select:focus {
        border-color: #0162e8 !important;
        box-shadow: 0 0 0 3px rgba(1, 98, 232, 0.14) !important;
        outline: none !important;
    }
    .nav-tabs-modern .nav-link {
        border: none;
        color: #64748b;
        font-weight: 600;
        font-size: 14px;
        padding: 12px 20px;
        border-bottom: 2.5px solid transparent;
        transition: all 0.2s ease;
    }
    .nav-tabs-modern .nav-link.active {
        color: #0162e8;
        border-bottom-color: #0162e8;
        background: transparent;
    }
    .nav-pills-page .nav-link {
        border-radius: 8px;
        padding: 8px 16px;
        font-size: 13px;
        font-weight: 600;
        color: #475569;
        border: 1px solid #e2e8f0;
        background: #f8fafc;
        margin-right: 8px;
        margin-bottom: 8px;
        transition: all 0.2s ease;
    }
    .nav-pills-page .nav-link.active {
        background: #0162e8;
        color: #ffffff;
        border-color: #0162e8;
        box-shadow: 0 2px 6px rgba(1, 98, 232, 0.25);
    }
    .hero-simulator-box {
        position: relative;
        width: 100%;
        border-radius: 12px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        box-shadow: 0 4px 15px rgba(0,0,0,0.12);
        transition: min-height 0.3s ease;
    }

    @media (max-width: 768px) {
        .settings-row {
            flex-direction: column;
            padding: 14px 16px;
        }
        .settings-label-col {
            width: 100%;
            padding-right: 0;
            padding-bottom: 8px;
        }
    }
</style>

    @php
        $activeTab = request('tab', 'general');
        $gen = $settings['general'] ?? [];
        $heroPages = $settings['hero_pages'] ?? [];
    @endphp

    <!-- Valex Page Header / Breadcrumb -->
    <div class="valex-page-header d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
        <div>
            <h4 class="valex-page-title mb-1 fw-bold text-dark fs-20">Global Website Settings</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 fs-13">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-primary text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Global Settings</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-primary btn-sm d-flex align-items-center gap-1.5 px-3 py-1.5 rounded-2">
                <i class="bi bi-box-arrow-up-right fs-13"></i>
                <span>Preview Live Website</span>
            </a>
        </div>
    </div>

    <!-- Alert Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 mb-4" role="alert">
            <i class="bi bi-check-circle-fill fs-18"></i>
            <div>{{ session('success') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Main Settings Card -->
    <div class="card border-0 shadow-sm" style="border-radius: 12px; background: #ffffff;">
        <div class="card-header bg-white px-4 pt-3 pb-0 border-bottom">
            <ul class="nav nav-tabs nav-tabs-modern" id="settingsTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $activeTab === 'general' ? 'active' : '' }}" id="general-tab" data-bs-toggle="tab" data-bs-target="#tab-general" type="button" role="tab" aria-controls="tab-general" aria-selected="{{ $activeTab === 'general' ? 'true' : 'false' }}">
                        <i class="bi bi-globe2 me-1.5"></i> Website Identity & Meta
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $activeTab === 'hero_customizer' ? 'active' : '' }}" id="hero-tab" data-bs-toggle="tab" data-bs-target="#tab-hero" type="button" role="tab" aria-controls="tab-hero" aria-selected="{{ $activeTab === 'hero_customizer' ? 'true' : 'false' }}">
                        <i class="bi bi-aspect-ratio me-1.5"></i> Page-Wise Hero Customizer (Height, Width & Overlay)
                    </button>
                </li>
            </ul>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="active_tab" id="active_tab_input" value="{{ $activeTab }}">

                <div class="tab-content" id="settingsTabContent">

                    <!-- ================= TAB 1: WEBSITE IDENTITY & GENERAL ================= -->
                    <div class="tab-pane fade {{ $activeTab === 'general' ? 'show active' : '' }}" id="tab-general" role="tabpanel" aria-labelledby="general-tab">
                        
                        <div class="settings-config-card mb-4">
                            <div class="p-3 bg-light border-bottom d-flex align-items-center justify-content-between">
                                <div class="fw-bold text-dark fs-14 d-flex align-items-center gap-2">
                                    <i class="bi bi-app-indicator text-primary"></i> Site Branding & Icons
                                </div>
                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle">Global Branding</span>
                            </div>

                            <!-- 1. Site Title -->
                            <div class="settings-row">
                                <div class="settings-label-col">
                                    <div class="settings-label-title">
                                        <i class="bi bi-type-h1 text-primary"></i> Site Title
                                    </div>
                                    <p class="settings-label-desc">Displayed on browser tabs, search engine snippets, and bookmarks.</p>
                                </div>
                                <div class="settings-input-col">
                                    <input type="text" name="general[site_title]" class="form-control modern-input" value="{{ $gen['site_title'] ?? 'Original GPO Ke Thandey Dahi Bade | Lucknow Since 1976' }}" placeholder="e.g. Original GPO Ke Thandey Dahi Bade">
                                </div>
                            </div>

                            <!-- 2. Tagline -->
                            <div class="settings-row">
                                <div class="settings-label-col">
                                    <div class="settings-label-title">
                                        <i class="bi bi-quote text-primary"></i> Site Tagline
                                    </div>
                                    <p class="settings-label-desc">Slogan or heritage subtitle accompanying the brand.</p>
                                </div>
                                <div class="settings-input-col">
                                    <input type="text" name="general[site_tagline]" class="form-control modern-input" value="{{ $gen['site_tagline'] ?? 'The Original Taste of Lucknow Since 1976' }}" placeholder="e.g. The Original Taste of Lucknow Since 1976">
                                </div>
                            </div>

                            <!-- 3. Favicon -->
                            <div class="settings-row">
                                <div class="settings-label-col">
                                    <div class="settings-label-title">
                                        <i class="bi bi-image text-primary"></i> Favicon Icon (.ico, .png)
                                    </div>
                                    <p class="settings-label-desc">Small tab icon (recommended: 32x32px or 64x64px PNG/ICO).</p>
                                </div>
                                <div class="settings-input-col">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="border rounded-2 p-1 d-flex align-items-center justify-content-center bg-light" style="width: 44px; height: 44px;">
                                            <img id="preview_favicon" src="{{ !empty($gen['favicon']) ? asset($gen['favicon']) : asset('favicon.ico') }}" alt="Favicon" style="max-width: 32px; max-height: 32px; object-fit: contain;">
                                        </div>
                                        <div class="flex-grow-1">
                                            <input type="file" name="general_files[favicon]" id="input_favicon" class="form-control modern-input" accept=".ico,.png,.svg,.jpg">
                                            <small class="text-muted fs-11">Current: {{ !empty($gen['favicon']) ? $gen['favicon'] : 'Default favicon.ico' }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 4. Header Logo -->
                            <div class="settings-row">
                                <div class="settings-label-col">
                                    <div class="settings-label-title">
                                        <i class="bi bi-card-image text-primary"></i> Header Logo (Image)
                                    </div>
                                    <p class="settings-label-desc">Primary brand logo shown in the top navigation bar (transparent PNG recommended).</p>
                                </div>
                                <div class="settings-input-col">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="border rounded-2 p-2 d-flex align-items-center justify-content-center bg-dark" style="width: 90px; height: 50px;">
                                            <img id="preview_header_logo" src="{{ !empty($gen['header_logo']) ? asset($gen['header_logo']) : 'https://placehold.co/160x50/1f3b39/ffffff?text=LOGO' }}" alt="Header Logo" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                        </div>
                                        <div class="flex-grow-1">
                                            <input type="file" name="general_files[header_logo]" id="input_header_logo" class="form-control modern-input" accept="image/*">
                                            <small class="text-muted fs-11">Upload a custom logo to replace the default icon.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 5. Footer Logo -->
                            <div class="settings-row">
                                <div class="settings-label-col">
                                    <div class="settings-label-title">
                                        <i class="bi bi-card-image text-primary"></i> Footer Logo (Optional)
                                    </div>
                                    <p class="settings-label-desc">Logo displayed inside the website footer section.</p>
                                </div>
                                <div class="settings-input-col">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="border rounded-2 p-2 d-flex align-items-center justify-content-center bg-dark" style="width: 90px; height: 50px;">
                                            <img id="preview_footer_logo" src="{{ !empty($gen['footer_logo']) ? asset($gen['footer_logo']) : 'https://placehold.co/160x50/111827/ffffff?text=FOOTER' }}" alt="Footer Logo" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                        </div>
                                        <div class="flex-grow-1">
                                            <input type="file" name="general_files[footer_logo]" id="input_footer_logo" class="form-control modern-input" accept="image/*">
                                            <small class="text-muted fs-11">Current: {{ !empty($gen['footer_logo']) ? $gen['footer_logo'] : 'Not set (uses header logo)' }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- SEO Meta Box -->
                        <div class="settings-config-card mb-4">
                            <div class="p-3 bg-light border-bottom d-flex align-items-center justify-content-between">
                                <div class="fw-bold text-dark fs-14 d-flex align-items-center gap-2">
                                    <i class="bi bi-search text-success"></i> SEO & Search Meta Configuration
                                </div>
                                <span class="badge bg-success-subtle text-success border border-success-subtle">Search Engines</span>
                            </div>

                            <!-- Meta Description -->
                            <div class="settings-row">
                                <div class="settings-label-col">
                                    <div class="settings-label-title">
                                        <i class="bi bi-card-text text-success"></i> Meta Description
                                    </div>
                                    <p class="settings-label-desc">A brief 150-160 character summary of the website for Google search rankings.</p>
                                </div>
                                <div class="settings-input-col">
                                    <textarea name="general[meta_description]" rows="2" class="form-control modern-textarea" placeholder="Enter meta description...">{{ $gen['meta_description'] ?? "Experience the legendary authentic taste of Lucknow's iconic GPO Ke Thandey Dahi Bade since 1976." }}</textarea>
                                </div>
                            </div>

                            <!-- Meta Keywords -->
                            <div class="settings-row">
                                <div class="settings-label-col">
                                    <div class="settings-label-title">
                                        <i class="bi bi-tags text-success"></i> Meta Keywords
                                    </div>
                                    <p class="settings-label-desc">Comma-separated keywords representing brand specialties.</p>
                                </div>
                                <div class="settings-input-col">
                                    <input type="text" name="general[meta_keywords]" class="form-control modern-input" value="{{ $gen['meta_keywords'] ?? 'Original GPO Dahi Bade, Lucknow Dahi Vada, Hazratganj food, street food Lucknow, best dahi vada India' }}" placeholder="keyword1, keyword2, keyword3">
                                </div>
                            </div>
                        </div>

                        <!-- Contact Information Box -->
                        <div class="settings-config-card mb-4">
                            <div class="p-3 bg-light border-bottom d-flex align-items-center justify-content-between">
                                <div class="fw-bold text-dark fs-14 d-flex align-items-center gap-2">
                                    <i class="bi bi-telephone text-info"></i> Contact & Outlet Information
                                </div>
                                <span class="badge bg-info-subtle text-info border border-info-subtle">Global Header & Footer</span>
                            </div>

                            <!-- Phone -->
                            <div class="settings-row">
                                <div class="settings-label-col">
                                    <div class="settings-label-title">
                                        <i class="bi bi-telephone text-info"></i> Official Phone
                                    </div>
                                    <p class="settings-label-desc">Displayed on contact section and quick dialing links.</p>
                                </div>
                                <div class="settings-input-col">
                                    <input type="text" name="general[contact_phone]" class="form-control modern-input" value="{{ $gen['contact_phone'] ?? '+91 98765 43210' }}" placeholder="+91 XXXXX XXXXX">
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="settings-row">
                                <div class="settings-label-col">
                                    <div class="settings-label-title">
                                        <i class="bi bi-envelope text-info"></i> Support Email
                                    </div>
                                    <p class="settings-label-desc">Official email for inquiries and franchise queries.</p>
                                </div>
                                <div class="settings-input-col">
                                    <input type="email" name="general[contact_email]" class="form-control modern-input" value="{{ $gen['contact_email'] ?? 'contact@gpodahibade.com' }}" placeholder="contact@example.com">
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="settings-row">
                                <div class="settings-label-col">
                                    <div class="settings-label-title">
                                        <i class="bi bi-geo-alt text-info"></i> Flagship Store Address
                                    </div>
                                    <p class="settings-label-desc">Primary outlet location shown on website footer and contact page.</p>
                                </div>
                                <div class="settings-input-col">
                                    <input type="text" name="general[contact_address]" class="form-control modern-input" value="{{ $gen['contact_address'] ?? 'Awadh Bazaar, Hazratganj, Lucknow, UP - 226001' }}" placeholder="Full physical address">
                                </div>
                            </div>
                        </div>

                    </div>


                    <!-- ================= TAB 2: PAGE-WISE HERO CUSTOMIZER ================= -->
                    <div class="tab-pane fade {{ $activeTab === 'hero_customizer' ? 'show active' : '' }}" id="tab-hero" role="tabpanel" aria-labelledby="hero-tab">
                        
                        <!-- Page Selector Pills -->
                        <div class="d-flex align-items-center flex-wrap mb-4 nav-pills-page" id="heroPagesSelector">
                            @foreach($heroPages as $pKey => $pData)
                                <button type="button" class="nav-link {{ $loop->first ? 'active' : '' }}" onclick="switchHeroPage('{{ $pKey }}', this)">
                                    @if($pKey === 'home') 🏠 Home Hero
                                    @elseif($pKey === 'story') 📖 Our Story Hero
                                    @elseif($pKey === 'menu') 🍛 Menu Hero
                                    @elseif($pKey === 'franchise') 🤝 Franchise Hero
                                    @elseif($pKey === 'contact') 📞 Contact Hero
                                    @else 📄 {{ ucfirst($pKey) }} Hero
                                    @endif
                                </button>
                            @endforeach
                        </div>

                        <!-- LIVE INTERACTIVE VISUAL HERO SIMULATOR -->
                        <div class="card border border-light-subtle shadow-sm mb-4" style="border-radius: 12px; overflow: hidden;">
                            <div class="card-header bg-white py-2.5 px-3 border-bottom d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="bi bi-eye-fill text-primary"></i>
                                    <span class="fw-bold fs-13 text-dark">Live Hero Simulation Preview: <span id="sim_page_title_badge" class="text-primary">Home Page Hero</span></span>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge bg-dark fs-11" id="sim_dimensions_badge">Height: 590px | Width: 100%</span>
                                    <span class="badge bg-primary-subtle text-primary border fs-11" id="sim_opacity_badge">Overlay: 85%</span>
                                </div>
                            </div>
                            <div class="card-body p-0 bg-dark position-relative d-flex align-items-center justify-content-center" style="min-height: 280px; overflow: hidden;">
                                <div id="sim_hero_container" class="hero-simulator-box" style="min-height: 280px; width: 100%;">
                                    <img id="sim_hero_img" src="{{ asset('images/dahi_vada.jpg') }}" alt="Simulated Hero Image" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 0;">
                                    <div id="sim_hero_overlay" style="position: absolute; inset: 0; z-index: 1; pointer-events: none; transition: background 0.2s ease;"></div>
                                    <div class="position-relative p-4" style="z-index: 2; color: #ffffff;">
                                        <span class="badge bg-warning text-dark px-3 py-1.5 rounded-pill mb-2 fw-bold text-uppercase fs-12" id="sim_text_badge">HERO PREVIEW</span>
                                        <h3 class="fw-bold mb-1 text-white" id="sim_text_heading" style="text-shadow: 0 2px 6px rgba(0,0,0,0.5);">PAGE HERO SECTION</h3>
                                        <p class="fs-13 text-white-50 mb-0" id="sim_text_desc">Live dimensions, transparent color, opacity, and gradient style simulation</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PAGE CONFIG PANELS -->
                        @foreach($heroPages as $pKey => $pData)
                            <div class="page-hero-panel settings-config-card mb-4" id="hero_panel_{{ $pKey }}" style="{{ $loop->first ? 'display: block;' : 'display: none;' }}">
                                <div class="p-3 bg-light border-bottom d-flex align-items-center justify-content-between">
                                    <div class="fw-bold text-dark fs-14 d-flex align-items-center gap-2">
                                        <i class="bi bi-sliders text-primary"></i>
                                        <span>{{ $pData['title'] ?? ucfirst($pKey) . ' Page Hero' }}</span>
                                    </div>
                                    <span class="badge bg-primary px-2.5 py-1 fs-11 text-white">Page: {{ strtoupper($pKey) }}</span>
                                </div>

                                <!-- 1. Height -->
                                <div class="settings-row">
                                    <div class="settings-label-col">
                                        <div class="settings-label-title">
                                            <i class="bi bi-arrows-vertical text-primary"></i> Hero Height
                                        </div>
                                        <p class="settings-label-desc">Control exact or responsive height (e.g. 590px, 460px, 100vh, 420px).</p>
                                    </div>
                                    <div class="settings-input-col">
                                        <div class="input-group" style="max-width: 380px;">
                                            <span class="input-group-text bg-light text-muted border-end-0 fs-13"><i class="bi bi-arrows-expand-vertical"></i></span>
                                            <input type="text" name="hero_pages[{{ $pKey }}][height]" id="input_hero_height_{{ $pKey }}" class="form-control modern-input hero-height-input" data-page="{{ $pKey }}" value="{{ $pData['height'] ?? '500px' }}" placeholder="e.g. 590px, 100vh">
                                        </div>
                                        <div class="d-flex align-items-center gap-1.5 mt-2 flex-wrap">
                                            <small class="text-muted me-1 fs-12">Quick Presets:</small>
                                            <button type="button" class="btn btn-xs btn-outline-secondary py-0.5 px-2 fs-11 rounded" onclick="applyPresetHeight('{{ $pKey }}', '100vh')">Full Screen (100vh)</button>
                                            <button type="button" class="btn btn-xs btn-outline-secondary py-0.5 px-2 fs-11 rounded" onclick="applyPresetHeight('{{ $pKey }}', '650px')">650px</button>
                                            <button type="button" class="btn btn-xs btn-outline-secondary py-0.5 px-2 fs-11 rounded" onclick="applyPresetHeight('{{ $pKey }}', '590px')">590px (Standard)</button>
                                            <button type="button" class="btn btn-xs btn-outline-secondary py-0.5 px-2 fs-11 rounded" onclick="applyPresetHeight('{{ $pKey }}', '480px')">480px (Compact)</button>
                                            <button type="button" class="btn btn-xs btn-outline-secondary py-0.5 px-2 fs-11 rounded" onclick="applyPresetHeight('{{ $pKey }}', '400px')">400px (Slim)</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- 2. Max Width -->
                                <div class="settings-row">
                                    <div class="settings-label-col">
                                        <div class="settings-label-title">
                                            <i class="bi bi-arrows-collapse text-primary"></i> Hero Container Max-Width
                                        </div>
                                        <p class="settings-label-desc">Control banner content width (100% for full-bleed, or boxed like 1400px, 1200px).</p>
                                    </div>
                                    <div class="settings-input-col">
                                        <div class="input-group" style="max-width: 380px;">
                                            <span class="input-group-text bg-light text-muted border-end-0 fs-13"><i class="bi bi-arrows-expand"></i></span>
                                            <input type="text" name="hero_pages[{{ $pKey }}][max_width]" id="input_hero_max_width_{{ $pKey }}" class="form-control modern-input hero-width-input" data-page="{{ $pKey }}" value="{{ $pData['max_width'] ?? '100%' }}" placeholder="e.g. 100%, 1400px">
                                        </div>
                                        <div class="d-flex align-items-center gap-1.5 mt-2 flex-wrap">
                                            <small class="text-muted me-1 fs-12">Quick Presets:</small>
                                            <button type="button" class="btn btn-xs btn-outline-secondary py-0.5 px-2 fs-11 rounded" onclick="applyPresetWidth('{{ $pKey }}', '100%')">100% (Full Bleed)</button>
                                            <button type="button" class="btn btn-xs btn-outline-secondary py-0.5 px-2 fs-11 rounded" onclick="applyPresetWidth('{{ $pKey }}', '1400px')">1400px</button>
                                            <button type="button" class="btn btn-xs btn-outline-secondary py-0.5 px-2 fs-11 rounded" onclick="applyPresetWidth('{{ $pKey }}', '1240px')">1240px (Boxed)</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- 3. Overlay Color & Opacity -->
                                <div class="settings-row">
                                    <div class="settings-label-col">
                                        <div class="settings-label-title">
                                            <i class="bi bi-palette-fill text-primary"></i> Transparent Overlay Color
                                        </div>
                                        <p class="settings-label-desc">Color tint and opacity applied on top of the background media.</p>
                                    </div>
                                    <div class="settings-input-col">
                                        <div class="d-flex align-items-center gap-2 mb-3">
                                            <input type="color" id="picker_{{ $pKey }}" class="form-control form-control-color border-0 p-0 rounded-2 hero-color-picker" data-page="{{ $pKey }}" value="{{ $pData['overlay_color'] ?? '#000000' }}" style="width: 44px; height: 38px; cursor: pointer;">
                                            <div class="input-group" style="max-width: 170px;">
                                                <span class="input-group-text bg-light text-muted fs-13">#</span>
                                                <input type="text" name="hero_pages[{{ $pKey }}][overlay_color]" id="input_color_{{ $pKey }}" class="form-control modern-input hero-color-input" data-page="{{ $pKey }}" value="{{ $pData['overlay_color'] ?? '#000000' }}" maxlength="7">
                                            </div>
                                            <div class="d-flex align-items-center gap-1.5 flex-wrap ms-2">
                                                <button type="button" class="btn btn-sm rounded-circle p-0 border" style="width: 26px; height: 26px; background-color: #19302e;" title="GPO Spruce #19302e" onclick="applyPresetColor('{{ $pKey }}', '#19302e')"></button>
                                                <button type="button" class="btn btn-sm rounded-circle p-0 border" style="width: 26px; height: 26px; background-color: #083b3c;" title="Deep Emerald #083b3c" onclick="applyPresetColor('{{ $pKey }}', '#083b3c')"></button>
                                                <button type="button" class="btn btn-sm rounded-circle p-0 border" style="width: 26px; height: 26px; background-color: #000000;" title="True Black #000000" onclick="applyPresetColor('{{ $pKey }}', '#000000')"></button>
                                                <button type="button" class="btn btn-sm rounded-circle p-0 border" style="width: 26px; height: 26px; background-color: #1e293b;" title="Navy Slate #1e293b" onclick="applyPresetColor('{{ $pKey }}', '#1e293b')"></button>
                                                <button type="button" class="btn btn-sm rounded-circle p-0 border" style="width: 26px; height: 26px; background-color: #3b1d11;" title="Heritage Brown #3b1d11" onclick="applyPresetColor('{{ $pKey }}', '#3b1d11')"></button>
                                            </div>
                                        </div>

                                        <!-- Opacity Slider -->
                                        <div class="p-3 bg-light rounded-3 border" style="max-width: 500px;">
                                            <div class="d-flex align-items-center justify-content-between mb-1.5">
                                                <label class="fs-12 fw-bold text-dark mb-0">Overlay Opacity / Transparency:</label>
                                                <span class="badge bg-primary px-2 py-1 fs-11" id="badge_opacity_{{ $pKey }}">{{ round(floatval($pData['overlay_opacity'] ?? 0.75) * 100) }}%</span>
                                            </div>
                                            <input type="range" name="hero_pages[{{ $pKey }}][overlay_opacity]" id="slider_opacity_{{ $pKey }}" class="form-range hero-opacity-slider" data-page="{{ $pKey }}" min="0.00" max="1.00" step="0.05" value="{{ $pData['overlay_opacity'] ?? '0.75' }}">
                                            <div class="d-flex justify-content-between fs-11 text-muted">
                                                <span>0% (Fully Transparent)</span>
                                                <span>50%</span>
                                                <span>100% (Fully Opaque Solid)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- 4. Overlay Style -->
                                <div class="settings-row">
                                    <div class="settings-label-col">
                                        <div class="settings-label-title">
                                            <i class="bi bi-layers-half text-primary"></i> Overlay Style
                                        </div>
                                        <p class="settings-label-desc">Choose between a uniform solid transparency or modern gradient blend.</p>
                                    </div>
                                    <div class="settings-input-col">
                                        <select name="hero_pages[{{ $pKey }}][overlay_style]" id="select_style_{{ $pKey }}" class="form-select modern-select hero-style-select" data-page="{{ $pKey }}" style="max-width: 320px;">
                                            <option value="solid" {{ ($pData['overlay_style'] ?? 'solid') === 'solid' ? 'selected' : '' }}>Solid Transparent Color</option>
                                            <option value="gradient" {{ ($pData['overlay_style'] ?? 'solid') === 'gradient' ? 'selected' : '' }}>Smooth Directional Gradient Blend</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        @endforeach

                    </div>

                </div>

                <!-- Sticky Action Bar -->
                <div class="p-3 bg-white border border-light-subtle rounded-3 shadow-sm d-flex align-items-center justify-content-between mt-4">
                    <div class="d-flex align-items-center gap-2">
                        <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold shadow-sm d-flex align-items-center gap-2">
                            <i class="bi bi-cloud-check-fill fs-16"></i>
                            <span>Save Global Settings</span>
                        </button>
                        <button type="reset" class="btn btn-light border px-3 py-2 text-muted">
                            <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
                        </button>
                    </div>
                    <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-secondary px-3 py-2 d-flex align-items-center gap-1.5">
                        <i class="bi bi-box-arrow-up-right fs-13"></i> Preview Website
                    </a>
                </div>

            </form>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Page data dictionary for simulator
    const pageSimData = {
        home: {
            title: "Home Page Hero",
            image: "{{ asset('images/dahi_vada.jpg') }}",
            badge: "HOME HERO",
            heading: "THE ORIGINAL TASTE OF LUCKNOW",
            desc: "Serving authentic Hazratganj Thandey Dahi Bade since 1976."
        },
        story: {
            title: "Our Story Hero",
            image: "{{ asset('images/lucknow_heritage.jpg') }}",
            badge: "OUR HERITAGE",
            heading: "A LEGACY SERVED WITH LOVE",
            desc: "From a humble cycle cart near GPO to Lucknow's most cherished delicacy."
        },
        menu: {
            title: "Menu & Specialities Hero",
            image: "{{ asset('images/dahi_bada_bowl.jpg') }}",
            badge: "OUR DELICACIES",
            heading: "FRESH, AUTHENTIC & TIMELESS",
            desc: "Prepared fresh daily using natural earthen pot curd and hand-ground spices."
        },
        franchise: {
            title: "Franchise Partnership Hero",
            image: "{{ asset('images/storefront.jpg') }}",
            badge: "EXPANSION",
            heading: "BRING THE ORIGINAL TO YOUR CITY",
            desc: "Join hands with a 45+ year legacy brand with proven profitability."
        },
        contact: {
            title: "Contact & Visit Us Hero",
            image: "{{ asset('images/outlet.jpg') }}",
            badge: "LOCATE US",
            heading: "VISIT OUR ICONIC OUTLET",
            desc: "Located in Awadh Bazaar, Hazratganj, in the historic heart of Lucknow."
        }
    };

    let currentActivePage = 'home';

    // Switch Page Hero Panel
    window.switchHeroPage = function(pageKey, btn) {
        currentActivePage = pageKey;
        // Update nav pills
        document.querySelectorAll('#heroPagesSelector .nav-link').forEach(b => b.classList.remove('active'));
        if (btn) btn.classList.add('active');

        // Show panel
        document.querySelectorAll('.page-hero-panel').forEach(p => p.style.display = 'none');
        const activePanel = document.getElementById('hero_panel_' + pageKey);
        if (activePanel) activePanel.style.display = 'block';

        // Update Simulator Content
        const sim = pageSimData[pageKey] || pageSimData.home;
        const titleBadge = document.getElementById('sim_page_title_badge');
        const simImg = document.getElementById('sim_hero_img');
        const simBadge = document.getElementById('sim_text_badge');
        const simHeading = document.getElementById('sim_text_heading');
        const simDesc = document.getElementById('sim_text_desc');

        if (titleBadge) titleBadge.textContent = sim.title;
        if (simImg) simImg.src = sim.image;
        if (simBadge) simBadge.textContent = sim.badge;
        if (simHeading) simHeading.textContent = sim.heading;
        if (simDesc) simDesc.textContent = sim.desc;

        updateLiveSimulator(pageKey);
    };

    function hexToRgb(hex) {
        hex = (hex || '#000000').replace('#', '').trim();
        if (hex.length === 3) {
            return {
                r: parseInt(hex[0] + hex[0], 16),
                g: parseInt(hex[1] + hex[1], 16),
                b: parseInt(hex[2] + hex[2], 16)
            };
        }
        if (hex.length >= 6) {
            return {
                r: parseInt(hex.substring(0, 2), 16),
                g: parseInt(hex.substring(2, 4), 16),
                b: parseInt(hex.substring(4, 6), 16)
            };
        }
        return { r: 0, g: 0, b: 0 };
    }

    // Update Live Simulator
    window.updateLiveSimulator = function(pageKey) {
        pageKey = pageKey || currentActivePage;
        const hInput = document.getElementById('input_hero_height_' + pageKey);
        const wInput = document.getElementById('input_hero_max_width_' + pageKey);
        const cInput = document.getElementById('input_color_' + pageKey);
        const sInput = document.getElementById('slider_opacity_' + pageKey);
        const styleInput = document.getElementById('select_style_' + pageKey);

        const simContainer = document.getElementById('sim_hero_container');
        const simOverlay = document.getElementById('sim_hero_overlay');
        const dimBadge = document.getElementById('sim_dimensions_badge');
        const opBadge = document.getElementById('sim_opacity_badge');
        const pageBadge = document.getElementById('badge_opacity_' + pageKey);

        const heightVal = hInput ? hInput.value.trim() : '500px';
        const widthVal = wInput ? wInput.value.trim() : '100%';
        const colorVal = cInput ? cInput.value.trim() : '#000000';
        const opacityVal = sInput ? parseFloat(sInput.value) : 0.75;
        const styleVal = styleInput ? styleInput.value : 'solid';

        if (pageBadge) {
            pageBadge.textContent = Math.round(opacityVal * 100) + '%';
        }
        if (opBadge) {
            opBadge.textContent = 'Overlay: ' + Math.round(opacityVal * 100) + '%';
        }
        if (dimBadge) {
            dimBadge.textContent = 'Height: ' + heightVal + ' | Width: ' + widthVal;
        }

        // Apply to Simulator box
        if (simContainer) {
            let numericHeight = parseInt(heightVal);
            if (isNaN(numericHeight) || numericHeight <= 0) numericHeight = 280;
            // Cap preview height for pleasant viewing
            simContainer.style.minHeight = Math.min(420, Math.max(220, numericHeight * 0.7)) + 'px';
            simContainer.style.maxWidth = widthVal === '100%' ? '100%' : widthVal;
        }

        if (simOverlay) {
            const rgb = hexToRgb(colorVal);
            if (styleVal === 'gradient') {
                const topO = Math.min(1.0, opacityVal + 0.12);
                const botO = Math.min(1.0, opacityVal + 0.18);
                simOverlay.style.background = `linear-gradient(135deg, rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, ${topO}) 0%, rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, ${opacityVal}) 50%, rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, ${botO}) 100%)`;
            } else {
                simOverlay.style.background = `rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, ${opacityVal})`;
            }
        }
    };

    // Preset helper functions
    window.applyPresetHeight = function(pageKey, height) {
        const input = document.getElementById('input_hero_height_' + pageKey);
        if (input) {
            input.value = height;
            updateLiveSimulator(pageKey);
        }
    };

    window.applyPresetWidth = function(pageKey, width) {
        const input = document.getElementById('input_hero_max_width_' + pageKey);
        if (input) {
            input.value = width;
            updateLiveSimulator(pageKey);
        }
    };

    window.applyPresetColor = function(pageKey, color) {
        const cInput = document.getElementById('input_color_' + pageKey);
        const pInput = document.getElementById('picker_' + pageKey);
        if (cInput) cInput.value = color;
        if (pInput) pInput.value = color;
        updateLiveSimulator(pageKey);
    };

    // Event listeners
    document.addEventListener('DOMContentLoaded', function () {
        // Tab switching persistence
        const tabBtns = document.querySelectorAll('#settingsTab button[data-bs-toggle="tab"]');
        const activeTabInput = document.getElementById('active_tab_input');
        tabBtns.forEach(btn => {
            btn.addEventListener('shown.bs.tab', function (e) {
                const target = e.target.getAttribute('data-bs-target');
                if (target === '#tab-hero') {
                    if (activeTabInput) activeTabInput.value = 'hero_customizer';
                    updateLiveSimulator(currentActivePage);
                } else {
                    if (activeTabInput) activeTabInput.value = 'general';
                }
            });
        });

        // Live image previews
        function bindImagePreview(inputId, imgId) {
            const input = document.getElementById(inputId);
            const img = document.getElementById(imgId);
            if (input && img) {
                input.addEventListener('change', function () {
                    const file = this.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            img.src = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }
        }
        bindImagePreview('input_favicon', 'preview_favicon');
        bindImagePreview('input_header_logo', 'preview_header_logo');
        bindImagePreview('input_footer_logo', 'preview_footer_logo');

        // Color Pickers sync
        document.querySelectorAll('.hero-color-picker').forEach(picker => {
            picker.addEventListener('input', function () {
                const page = this.getAttribute('data-page');
                const textInput = document.getElementById('input_color_' + page);
                if (textInput) textInput.value = this.value;
                updateLiveSimulator(page);
            });
        });

        // Color text inputs sync
        document.querySelectorAll('.hero-color-input').forEach(input => {
            input.addEventListener('input', function () {
                const page = this.getAttribute('data-page');
                const picker = document.getElementById('picker_' + page);
                if (picker && /^#[0-9A-Fa-f]{6}$/.test(this.value)) {
                    picker.value = this.value;
                }
                updateLiveSimulator(page);
            });
        });

        // Opacity sliders
        document.querySelectorAll('.hero-opacity-slider').forEach(slider => {
            slider.addEventListener('input', function () {
                const page = this.getAttribute('data-page');
                updateLiveSimulator(page);
            });
        });

        // Style selects
        document.querySelectorAll('.hero-style-select').forEach(sel => {
            sel.addEventListener('change', function () {
                const page = this.getAttribute('data-page');
                updateLiveSimulator(page);
            });
        });

        // Height inputs
        document.querySelectorAll('.hero-height-input').forEach(inp => {
            inp.addEventListener('input', function () {
                const page = this.getAttribute('data-page');
                updateLiveSimulator(page);
            });
        });

        // Width inputs
        document.querySelectorAll('.hero-width-input').forEach(inp => {
            inp.addEventListener('input', function () {
                const page = this.getAttribute('data-page');
                updateLiveSimulator(page);
            });
        });

        // Initial simulator render
        updateLiveSimulator('home');
    });
</script>
@endpush
