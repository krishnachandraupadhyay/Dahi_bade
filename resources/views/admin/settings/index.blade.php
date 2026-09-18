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
    .format-check-card {
        background: #ffffff;
        border: 1.5px solid #e2e8f0;
        border-radius: 10px;
        padding: 12px 16px;
        transition: all 0.2s ease;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .format-check-card:hover {
        border-color: #0162e8;
        background: #f8fafc;
    }
    .format-check-card input:checked ~ .format-info .format-name {
        color: #0162e8;
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
        $initPage = request('page', 'home');
        $initSection = request('section', 'hero');
        $gen = $settings['general'] ?? [];
        $sectionsTree = $settings['sections'] ?? [];
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
                    <button class="nav-link {{ $activeTab === 'media_sections' ? 'active' : '' }}" id="media-sections-tab" data-bs-toggle="tab" data-bs-target="#tab-media-sections" type="button" role="tab" aria-controls="tab-media-sections" aria-selected="{{ $activeTab === 'media_sections' ? 'true' : 'false' }}">
                        <i class="bi bi-images me-1.5"></i> Page & Section Media Permissions (Images, Videos & Max Slides)
                    </button>
                </li>
            </ul>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="active_tab" id="active_tab_input" value="{{ $activeTab }}">
                <input type="hidden" name="selected_page" id="selected_page_input" value="{{ $initPage }}">
                <input type="hidden" name="selected_section" id="selected_section_input" value="{{ $initSection }}">

                <div class="tab-content" id="settingsTabContent">

                    <!-- ================= TAB 1: WEBSITE IDENTITY & META ================= -->
                    <div class="tab-pane fade {{ $activeTab === 'general' ? 'show active' : '' }}" id="tab-general" role="tabpanel" aria-labelledby="general-tab">
                        
                        <!-- Brand Identity Card -->
                        <div class="settings-config-card mb-4">
                            <div class="p-3 bg-light border-bottom d-flex align-items-center justify-content-between">
                                <div class="fw-bold text-dark fs-14 d-flex align-items-center gap-2">
                                    <i class="bi bi-building-gear text-primary"></i> Brand Identity & Assets
                                </div>
                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle">Core Brand</span>
                            </div>

                            <!-- 1. Site Title -->
                            <div class="settings-row">
                                <div class="settings-label-col">
                                    <div class="settings-label-title">
                                        <i class="bi bi-window text-primary"></i> Website Title
                                    </div>
                                    <p class="settings-label-desc">Primary website title shown on browser tab and search engine results.</p>
                                </div>
                                <div class="settings-input-col">
                                    <input type="text" name="general[site_title]" class="form-control modern-input fw-semibold" value="{{ $gen['site_title'] ?? 'Original GPO Ke Thandey Dahi Bade | Lucknow Since 1976' }}" placeholder="Enter website title">
                                </div>
                            </div>

                            <!-- 2. Site Tagline -->
                            <div class="settings-row">
                                <div class="settings-label-col">
                                    <div class="settings-label-title">
                                        <i class="bi bi-quote text-primary"></i> Brand Tagline
                                    </div>
                                    <p class="settings-label-desc">Official tagline used in header and social shares.</p>
                                </div>
                                <div class="settings-input-col">
                                    <input type="text" name="general[site_tagline]" class="form-control modern-input" value="{{ $gen['site_tagline'] ?? 'The Original Taste of Lucknow Since 1976' }}" placeholder="Enter brand tagline">
                                </div>
                            </div>

                            <!-- 3. Favicon -->
                            <div class="settings-row">
                                <div class="settings-label-col">
                                    <div class="settings-label-title">
                                        <i class="bi bi-star text-primary"></i> Favicon Icon
                                    </div>
                                    <p class="settings-label-desc">Small 32x32 browser tab icon (.png or .ico).</p>
                                </div>
                                <div class="settings-input-col">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="border rounded-2 p-2 d-flex align-items-center justify-content-center bg-light" style="width: 50px; height: 50px;">
                                            <img id="preview_favicon" src="{{ !empty($gen['favicon']) ? asset($gen['favicon']) : 'https://placehold.co/32x32/19302e/ffffff?text=GPO' }}" alt="Favicon" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                        </div>
                                        <div class="flex-grow-1">
                                            <input type="file" name="general_files[favicon]" id="input_favicon" class="form-control modern-input" accept="image/x-icon,image/png,image/svg+xml">
                                            <small class="text-muted fs-11">Upload a 32x32 or 64x64 transparent PNG / ICO file.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 4. Header Logo -->
                            <div class="settings-row">
                                <div class="settings-label-col">
                                    <div class="settings-label-title">
                                        <i class="bi bi-image text-primary"></i> Main Header Logo
                                    </div>
                                    <p class="settings-label-desc">Main logo displayed in the website navigation bar.</p>
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


                    <!-- ================= TAB 2: PAGE & SECTION MEDIA CUSTOMIZER ================= -->
                    <div class="tab-pane fade {{ $activeTab === 'media_sections' ? 'show active' : '' }}" id="tab-media-sections" role="tabpanel" aria-labelledby="media-sections-tab">
                        
                        <!-- Top Dropdown Controls: 1. Page Selector, 2. Media Section Selector -->
                        <div class="p-3 mb-4 bg-light border rounded-3 d-flex flex-wrap align-items-center justify-content-between gap-3">
                            <div class="d-flex align-items-center gap-3 flex-wrap">
                                <!-- 1. Page Dropdown -->
                                <div class="d-flex align-items-center gap-2">
                                    <label for="globalPageSelector" class="fs-13 fw-bold text-dark text-nowrap mb-0">
                                        <i class="bi bi-file-earmark-text text-primary me-1"></i> Select Page:
                                    </label>
                                    <select id="globalPageSelector" class="form-select form-select-sm fw-bold modern-select" style="min-width: 210px;" onchange="onGlobalPageChange(this.value)">
                                        <option value="home" {{ $initPage === 'home' ? 'selected' : '' }}>🏠 Home Page</option>
                                        <option value="story" {{ $initPage === 'story' ? 'selected' : '' }}>📖 Our Story Page</option>
                                        <option value="menu" {{ $initPage === 'menu' ? 'selected' : '' }}>🍲 Menu Page</option>
                                        <option value="franchise" {{ $initPage === 'franchise' ? 'selected' : '' }}>🤝 Franchise Page</option>
                                        <option value="contact" {{ $initPage === 'contact' ? 'selected' : '' }}>📞 Contact Us Page</option>
                                    </select>
                                </div>

                                <!-- 2. Media Section Dropdown (Filtered only to sections with background media) -->
                                <div class="d-flex align-items-center gap-2">
                                    <label for="globalSectionSelector" class="fs-13 fw-bold text-dark text-nowrap mb-0">
                                        <i class="bi bi-image text-danger me-1"></i> Media Section:
                                    </label>
                                    <select id="globalSectionSelector" class="form-select form-select-sm fw-bold modern-select" style="min-width: 320px;" onchange="onGlobalSectionChange(this.value)">
                                        <!-- Populated via JavaScript dynamically based on selected page -->
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1.5 fs-12">
                                    <i class="bi bi-sliders me-1"></i> Admin Governance
                                </span>
                            </div>
                        </div>

                        <!-- LIVE INTERACTIVE VISUAL SIMULATOR -->
                        <div class="card border border-light-subtle shadow-sm mb-4" style="border-radius: 12px; overflow: hidden;">
                            <div class="card-header bg-white py-2.5 px-3 border-bottom d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="bi bi-eye-fill text-primary"></i>
                                    <span class="fw-bold fs-13 text-dark">Live Simulator: <span id="sim_section_title_badge" class="text-primary">Home Hero Carousel</span></span>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge bg-dark fs-11" id="sim_dimensions_badge">Height: 590px | Width: 100%</span>
                                    <span class="badge bg-primary-subtle text-primary border fs-11" id="sim_opacity_badge">Overlay: 85%</span>
                                    <span class="badge bg-success-subtle text-success border fs-11" id="sim_formats_badge">Formats: 4 Allowed</span>
                                </div>
                            </div>
                            <div class="card-body p-0 bg-dark position-relative d-flex align-items-center justify-content-center" style="min-height: 280px; overflow: hidden;">
                                <div id="sim_container" class="hero-simulator-box" style="min-height: 280px; width: 100%;">
                                    <img id="sim_img" src="{{ asset('images/dahi_vada.jpg') }}" alt="Simulated Section Media" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 0;">
                                    <div id="sim_overlay" style="position: absolute; inset: 0; z-index: 1; pointer-events: none; transition: background 0.2s ease;"></div>
                                    <div class="position-relative p-4" style="z-index: 2; color: #ffffff;">
                                        <span class="badge bg-warning text-dark px-3 py-1.5 rounded-pill mb-2 fw-bold text-uppercase fs-12" id="sim_text_badge">SECTION PREVIEW</span>
                                        <h3 class="fw-bold mb-1 text-white" id="sim_text_heading" style="text-shadow: 0 2px 6px rgba(0,0,0,0.5);">DYNAMIC SECTION SIMULATOR</h3>
                                        <p class="fs-13 text-white-50 mb-0" id="sim_text_desc">Simulating dimensions, allowed media formats, transparent color & opacity</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- SECTION CONFIG PANELS (Dynamically shown based on Page & Section Dropdowns) -->
                        @foreach($sectionsTree as $pageKey => $sections)
                            @foreach($sections as $secKey => $secData)
                                @php
                                    $panelId = "sec_panel_{$pageKey}_{$secKey}";
                                    $isCarousel = $secData['is_carousel'] ?? false;
                                    $allowedMedia = $secData['allowed_media'] ?? ['image', 'video', 'gif', 'youtube'];
                                    $maxSlides = $secData['max_slides'] ?? 3;
                                    $height = $secData['height'] ?? '500px';
                                    $maxWidth = $secData['max_width'] ?? '100%';
                                    $overlayColor = $secData['overlay_color'] ?? '#083b3c';
                                    $overlayOpacity = $secData['overlay_opacity'] ?? '0.75';
                                    $overlayStyle = $secData['overlay_style'] ?? 'solid';
                                @endphp
                                <div class="section-config-panel settings-config-card mb-4" id="{{ $panelId }}" style="display: none;">
                                    <div class="p-3 bg-light border-bottom d-flex align-items-center justify-content-between">
                                        <div class="fw-bold text-dark fs-14 d-flex align-items-center gap-2">
                                            <i class="bi bi-sliders text-primary"></i>
                                            <span>{{ $secData['name'] ?? ucfirst($secKey) }}</span>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge bg-info-subtle text-info border border-info-subtle fs-11">Page: {{ strtoupper($pageKey) }}</span>
                                            <span class="badge bg-secondary-subtle text-secondary border fs-11">Section: {{ $secKey }}</span>
                                            @if($isCarousel)
                                                <span class="badge bg-warning text-dark fs-11 fw-bold"><i class="bi bi-collection-play me-1"></i> Carousel Slider</span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- 1. ADMIN PERMISSION: Allowed Media Types -->
                                    <div class="settings-row">
                                        <div class="settings-label-col">
                                            <div class="settings-label-title text-primary">
                                                <i class="bi bi-shield-check"></i> Allowed Media Formats
                                            </div>
                                            <p class="settings-label-desc">Choose which background media options the editor is permitted to use on this page/section. If unchecked, it will be hidden from the page editor form.</p>
                                        </div>
                                        <div class="settings-input-col">
                                            <div class="row g-2 mb-2">
                                                <!-- Image -->
                                                <div class="col-md-3 col-sm-6 col-12">
                                                    <label class="format-check-card h-100">
                                                        <input type="checkbox" name="sections[{{ $pageKey }}][{{ $secKey }}][allowed_media][]" value="image" class="form-check-input mt-0 sec-media-check" data-page="{{ $pageKey }}" data-sec="{{ $secKey }}" {{ in_array('image', $allowedMedia) ? 'checked' : '' }}>
                                                        <div class="format-info">
                                                            <div class="format-name fw-bold fs-13">🖼️ Photo / Image</div>
                                                            <small class="text-muted fs-11 d-block">JPG, PNG, WebP</small>
                                                        </div>
                                                    </label>
                                                </div>

                                                <!-- Video -->
                                                <div class="col-md-3 col-sm-6 col-12">
                                                    <label class="format-check-card h-100">
                                                        <input type="checkbox" name="sections[{{ $pageKey }}][{{ $secKey }}][allowed_media][]" value="video" class="form-check-input mt-0 sec-media-check" data-page="{{ $pageKey }}" data-sec="{{ $secKey }}" {{ in_array('video', $allowedMedia) ? 'checked' : '' }}>
                                                        <div class="format-info">
                                                            <div class="format-name fw-bold fs-13">🎥 MP4 Video File</div>
                                                            <small class="text-muted fs-11 d-block">Local MP4 upload</small>
                                                        </div>
                                                    </label>
                                                </div>

                                                <!-- GIF -->
                                                <div class="col-md-3 col-sm-6 col-12">
                                                    <label class="format-check-card h-100">
                                                        <input type="checkbox" name="sections[{{ $pageKey }}][{{ $secKey }}][allowed_media][]" value="gif" class="form-check-input mt-0 sec-media-check" data-page="{{ $pageKey }}" data-sec="{{ $secKey }}" {{ in_array('gif', $allowedMedia) ? 'checked' : '' }}>
                                                        <div class="format-info">
                                                            <div class="format-name fw-bold fs-13">🎞️ Animated GIF</div>
                                                            <small class="text-muted fs-11 d-block">Looping animated GIF</small>
                                                        </div>
                                                    </label>
                                                </div>

                                                <!-- YouTube -->
                                                <div class="col-md-3 col-sm-6 col-12">
                                                    <label class="format-check-card h-100">
                                                        <input type="checkbox" name="sections[{{ $pageKey }}][{{ $secKey }}][allowed_media][]" value="youtube" class="form-check-input mt-0 sec-media-check" data-page="{{ $pageKey }}" data-sec="{{ $secKey }}" {{ in_array('youtube', $allowedMedia) ? 'checked' : '' }}>
                                                        <div class="format-info">
                                                            <div class="format-name fw-bold fs-13">▶️ YouTube Link</div>
                                                            <small class="text-muted fs-11 d-block">Background embed</small>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-text fs-11 text-muted">
                                                <i class="bi bi-info-circle me-1"></i> If you only select "Photo / Image", the video, gif and youtube options will not be shown to the user on this page's editor.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 2. MAX CAROUSEL SLIDES (Only for Carousel sections) -->
                                    @if($isCarousel)
                                        <div class="settings-row bg-warning-subtle bg-opacity-25">
                                            <div class="settings-label-col">
                                                <div class="settings-label-title text-dark">
                                                    <i class="bi bi-collection-play-fill text-warning"></i> Max Carousel Slides
                                                </div>
                                                <p class="settings-label-desc">Control how many images/slides scroll in this hero section (e.g. set 4 to allow 4 slides).</p>
                                            </div>
                                            <div class="settings-input-col">
                                                <div class="d-flex align-items-center gap-3" style="max-width: 400px;">
                                                    <div class="input-group">
                                                        <span class="input-group-text bg-white fw-bold fs-13"><i class="bi bi-hash"></i> Max Slides:</span>
                                                        <input type="number" name="sections[{{ $pageKey }}][{{ $secKey }}][max_slides]" id="input_max_slides_{{ $pageKey }}_{{ $secKey }}" class="form-control modern-input fw-bold text-center fs-15" value="{{ $maxSlides }}" min="1" max="10">
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center gap-1.5 mt-2 flex-wrap">
                                                    <small class="text-muted me-1 fs-12">Quick Presets:</small>
                                                    <button type="button" class="btn btn-xs btn-outline-secondary py-0.5 px-2 fs-11 rounded" onclick="applyPresetSlides('{{ $pageKey }}', '{{ $secKey }}', 2)">2 Slides</button>
                                                    <button type="button" class="btn btn-xs btn-outline-secondary py-0.5 px-2 fs-11 rounded" onclick="applyPresetSlides('{{ $pageKey }}', '{{ $secKey }}', 3)">3 Slides (Default)</button>
                                                    <button type="button" class="btn btn-xs btn-outline-secondary py-0.5 px-2 fs-11 rounded" onclick="applyPresetSlides('{{ $pageKey }}', '{{ $secKey }}', 4)">4 Slides</button>
                                                    <button type="button" class="btn btn-xs btn-outline-secondary py-0.5 px-2 fs-11 rounded" onclick="applyPresetSlides('{{ $pageKey }}', '{{ $secKey }}', 5)">5 Slides</button>
                                                    <button type="button" class="btn btn-xs btn-outline-secondary py-0.5 px-2 fs-11 rounded" onclick="applyPresetSlides('{{ $pageKey }}', '{{ $secKey }}', 6)">6 Slides</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- 3. Section Height -->
                                    <div class="settings-row">
                                        <div class="settings-label-col">
                                            <div class="settings-label-title">
                                                <i class="bi bi-arrows-vertical text-primary"></i> Section Height
                                            </div>
                                            <p class="settings-label-desc">Control exact or responsive height (e.g. 590px, 480px, 100vh).</p>
                                        </div>
                                        <div class="settings-input-col">
                                            <div class="input-group" style="max-width: 380px;">
                                                <span class="input-group-text bg-light text-muted border-end-0 fs-13"><i class="bi bi-arrows-expand-vertical"></i></span>
                                                <input type="text" name="sections[{{ $pageKey }}][{{ $secKey }}][height]" id="input_height_{{ $pageKey }}_{{ $secKey }}" class="form-control modern-input sec-height-input" data-page="{{ $pageKey }}" data-sec="{{ $secKey }}" value="{{ $height }}" placeholder="e.g. 590px, 100vh">
                                            </div>
                                            <div class="d-flex align-items-center gap-1.5 mt-2 flex-wrap">
                                                <small class="text-muted me-1 fs-12">Quick Presets:</small>
                                                <button type="button" class="btn btn-xs btn-outline-secondary py-0.5 px-2 fs-11 rounded" onclick="applyPresetHeight('{{ $pageKey }}', '{{ $secKey }}', '100vh')">Full Screen (100vh)</button>
                                                <button type="button" class="btn btn-xs btn-outline-secondary py-0.5 px-2 fs-11 rounded" onclick="applyPresetHeight('{{ $pageKey }}', '{{ $secKey }}', '650px')">650px</button>
                                                <button type="button" class="btn btn-xs btn-outline-secondary py-0.5 px-2 fs-11 rounded" onclick="applyPresetHeight('{{ $pageKey }}', '{{ $secKey }}', '590px')">590px</button>
                                                <button type="button" class="btn btn-xs btn-outline-secondary py-0.5 px-2 fs-11 rounded" onclick="applyPresetHeight('{{ $pageKey }}', '{{ $secKey }}', '480px')">480px</button>
                                                <button type="button" class="btn btn-xs btn-outline-secondary py-0.5 px-2 fs-11 rounded" onclick="applyPresetHeight('{{ $pageKey }}', '{{ $secKey }}', '380px')">380px</button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 4. Max Width -->
                                    <div class="settings-row">
                                        <div class="settings-label-col">
                                            <div class="settings-label-title">
                                                <i class="bi bi-arrows-collapse text-primary"></i> Container Max-Width
                                            </div>
                                            <p class="settings-label-desc">Full bleed width (100%) or boxed container layout (e.g. 1240px, 1400px).</p>
                                        </div>
                                        <div class="settings-input-col">
                                            <div class="input-group" style="max-width: 380px;">
                                                <span class="input-group-text bg-light text-muted border-end-0 fs-13"><i class="bi bi-arrows-expand"></i></span>
                                                <input type="text" name="sections[{{ $pageKey }}][{{ $secKey }}][max_width]" id="input_width_{{ $pageKey }}_{{ $secKey }}" class="form-control modern-input sec-width-input" data-page="{{ $pageKey }}" data-sec="{{ $secKey }}" value="{{ $maxWidth }}" placeholder="e.g. 100%, 1240px">
                                            </div>
                                            <div class="d-flex align-items-center gap-1.5 mt-2 flex-wrap">
                                                <small class="text-muted me-1 fs-12">Quick Presets:</small>
                                                <button type="button" class="btn btn-xs btn-outline-secondary py-0.5 px-2 fs-11 rounded" onclick="applyPresetWidth('{{ $pageKey }}', '{{ $secKey }}', '100%')">100% (Full Width)</button>
                                                <button type="button" class="btn btn-xs btn-outline-secondary py-0.5 px-2 fs-11 rounded" onclick="applyPresetWidth('{{ $pageKey }}', '{{ $secKey }}', '1400px')">1400px</button>
                                                <button type="button" class="btn btn-xs btn-outline-secondary py-0.5 px-2 fs-11 rounded" onclick="applyPresetWidth('{{ $pageKey }}', '{{ $secKey }}', '1240px')">1240px (Boxed)</button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 5. Transparent Overlay Color & Opacity -->
                                    <div class="settings-row">
                                        <div class="settings-label-col">
                                            <div class="settings-label-title">
                                                <i class="bi bi-palette-fill text-primary"></i> Transparent Overlay Tint
                                            </div>
                                            <p class="settings-label-desc">Color tint and opacity darkness over the media.</p>
                                        </div>
                                        <div class="settings-input-col">
                                            <div class="d-flex align-items-center gap-2 mb-3">
                                                <input type="color" id="picker_{{ $pageKey }}_{{ $secKey }}" class="form-control form-control-color border-0 p-0 rounded-2 sec-color-picker" data-page="{{ $pageKey }}" data-sec="{{ $secKey }}" value="{{ $overlayColor }}" style="width: 44px; height: 38px; cursor: pointer;">
                                                <div class="input-group" style="max-width: 170px;">
                                                    <span class="input-group-text bg-light text-muted fs-13">#</span>
                                                    <input type="text" name="sections[{{ $pageKey }}][{{ $secKey }}][overlay_color]" id="input_color_{{ $pageKey }}_{{ $secKey }}" class="form-control modern-input sec-color-input" data-page="{{ $pageKey }}" data-sec="{{ $secKey }}" value="{{ $overlayColor }}" maxlength="7">
                                                </div>
                                                <div class="d-flex align-items-center gap-1.5 flex-wrap ms-2">
                                                    <button type="button" class="btn btn-sm rounded-circle p-0 border" style="width: 26px; height: 26px; background-color: #19302e;" title="GPO Spruce #19302e" onclick="applyPresetColor('{{ $pageKey }}', '{{ $secKey }}', '#19302e')"></button>
                                                    <button type="button" class="btn btn-sm rounded-circle p-0 border" style="width: 26px; height: 26px; background-color: #083b3c;" title="Deep Teal #083b3c" onclick="applyPresetColor('{{ $pageKey }}', '{{ $secKey }}', '#083b3c')"></button>
                                                    <button type="button" class="btn btn-sm rounded-circle p-0 border" style="width: 26px; height: 26px; background-color: #000000;" title="True Black #000000" onclick="applyPresetColor('{{ $pageKey }}', '{{ $secKey }}', '#000000')"></button>
                                                    <button type="button" class="btn btn-sm rounded-circle p-0 border" style="width: 26px; height: 26px; background-color: #1e293b;" title="Navy Slate #1e293b" onclick="applyPresetColor('{{ $pageKey }}', '{{ $secKey }}', '#1e293b')"></button>
                                                    <button type="button" class="btn btn-sm rounded-circle p-0 border" style="width: 26px; height: 26px; background-color: #3b1d11;" title="Heritage Brown #3b1d11" onclick="applyPresetColor('{{ $pageKey }}', '{{ $secKey }}', '#3b1d11')"></button>
                                                </div>
                                            </div>

                                            <!-- Opacity Slider -->
                                            <div class="p-3 bg-light rounded-3 border" style="max-width: 500px;">
                                                <div class="d-flex align-items-center justify-content-between mb-1.5">
                                                    <label class="fs-12 fw-bold text-dark mb-0">Overlay Darkness / Opacity:</label>
                                                    <span class="badge bg-primary px-2 py-1 fs-11" id="badge_opacity_{{ $pageKey }}_{{ $secKey }}">{{ round(floatval($overlayOpacity) * 100) }}%</span>
                                                </div>
                                                <input type="range" name="sections[{{ $pageKey }}][{{ $secKey }}][overlay_opacity]" id="slider_opacity_{{ $pageKey }}_{{ $secKey }}" class="form-range sec-opacity-slider" data-page="{{ $pageKey }}" data-sec="{{ $secKey }}" min="0.00" max="1.00" step="0.05" value="{{ $overlayOpacity }}">
                                                <div class="d-flex justify-content-between fs-11 text-muted">
                                                    <span>0% (Transparent)</span>
                                                    <span>50%</span>
                                                    <span>100% (Solid Tint)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 6. Overlay Style -->
                                    <div class="settings-row">
                                        <div class="settings-label-col">
                                            <div class="settings-label-title">
                                                <i class="bi bi-layers-half text-primary"></i> Overlay Style
                                            </div>
                                            <p class="settings-label-desc">Choose between uniform solid transparency or modern gradient blend.</p>
                                        </div>
                                        <div class="settings-input-col">
                                            <select name="sections[{{ $pageKey }}][{{ $secKey }}][overlay_style]" id="select_style_{{ $pageKey }}_{{ $secKey }}" class="form-select modern-select sec-style-select" data-page="{{ $pageKey }}" data-sec="{{ $secKey }}" style="max-width: 320px;">
                                                <option value="solid" {{ $overlayStyle === 'solid' ? 'selected' : '' }}>Solid Transparent Color</option>
                                                <option value="gradient" {{ $overlayStyle === 'gradient' ? 'selected' : '' }}>Smooth Directional Gradient Blend</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
    // Dictionary mapping Pages to ONLY the sections where background media (image, video, gif, youtube) is used
    const pageMediaSectionsMap = {
        home: [
            { id: "hero", name: "🎠 Hero Carousel & Sliders" },
            { id: "star_dish", name: "⭐ Signature Dahi Bada Showcase" },
            { id: "visit_us", name: "🏪 Come Taste the Original (Storefront)" },
            { id: "franchise_cta", name: "🏢 Franchise Opportunity Banner" }
        ],
        story: [
            { id: "hero_banner", name: "📜 Our Story Hero Banner" },
            { id: "where_it_began", name: "🏛️ Chapter 1: Where It All Began (1976)" },
            { id: "gpo_journey", name: "🚂 Chapter 2: The GPO Journey" },
            { id: "panoramic_banner", name: "🌆 Panoramic Lucknow Heritage Banner" }
        ],
        menu: [
            { id: "hero_banner", name: "🍲 Menu & Specialities Hero Banner" }
        ],
        franchise: [
            { id: "hero_sliders", name: "🎠 Franchise Hero Carousel & Sliders" },
            { id: "footer_cta", name: "📢 Bottom Expansion Banner (Final CTA)" }
        ],
        contact: [
            { id: "hero_banner", name: "📞 Contact Hero Banner & Intro" },
            { id: "find_us_banner", name: "📍 Find Us In Lucknow Bottom Banner" }
        ]
    };

    // Simulated content dictionary for section preview
    const sectionPreviewData = {
        "home_hero": {
            title: "Home Hero Carousel",
            image: "{{ asset('images/dahi_vada.jpg') }}",
            badge: "HOME HERO",
            heading: "THE ORIGINAL TASTE OF LUCKNOW",
            desc: "Serving authentic Hazratganj Thandey Dahi Bade since 1976."
        },
        "home_star_dish": {
            title: "Signature Dahi Bada Showcase",
            image: "{{ asset('images/dahi_vada.jpg') }}",
            badge: "STAR DISH",
            heading: "CRAFTED TO PERFECTION",
            desc: "Iconic Lucknow lentil dumplings in chilled earthen curd."
        },
        "home_visit_us": {
            title: "Come Taste the Original / Storefront",
            image: "{{ asset('images/storefront.jpg') }}",
            badge: "VISIT OUTLET",
            heading: "VISIT HAZRATGANJ OUTLET",
            desc: "Shop No. 1, Awadh Bazaar, Mahatma Gandhi Marg, Lucknow."
        },
        "home_franchise_cta": {
            title: "Franchise Opportunity Banner",
            image: "{{ asset('images/storefront.jpg') }}",
            badge: "EXPANSION",
            heading: "BRING GPO TO YOUR CITY",
            desc: "Join hands with a 45+ year legacy brand."
        },
        "story_hero_banner": {
            title: "Our Story Hero Banner",
            image: "{{ asset('images/lucknow_heritage.jpg') }}",
            badge: "OUR HERITAGE",
            heading: "A LEGACY SERVED WITH LOVE",
            desc: "From a humble cycle cart near GPO to Lucknow's most cherished delicacy."
        },
        "story_where_it_began": {
            title: "Chapter 1: Where It All Began",
            image: "{{ asset('images/lucknow_heritage.jpg') }}",
            badge: "SINCE 1976",
            heading: "THE HUMBLE BEGINNING",
            desc: "Rooted in the timeless street food culture of Lucknow."
        },
        "story_gpo_journey": {
            title: "Chapter 2: The GPO Journey",
            image: "{{ asset('images/franchise.jpg') }}",
            badge: "EVOLUTION",
            heading: "TRADITION MEETS EXCELLENCE",
            desc: "Expanding the legacy with modern standards while honoring authentic recipes."
        },
        "story_panoramic_banner": {
            title: "Panoramic Lucknow Heritage Banner",
            image: "{{ asset('images/lucknow_heritage.jpg') }}",
            badge: "LUCKNOW",
            heading: "CITY OF NAWABS • TASTE OF TRADITION",
            desc: "Since 1976 • Iconic Flavours of Hazratganj"
        },
        "menu_hero_banner": {
            title: "Menu & Specialities Hero Banner",
            image: "{{ asset('images/dahi_bada_bowl.jpg') }}",
            badge: "OUR SPECIALITIES",
            heading: "AUTHENTIC MENU OFFERINGS",
            desc: "Handcrafted fresh daily with pure curd and aromatic spice blends."
        },
        "franchise_hero_sliders": {
            title: "Franchise Hero Carousel",
            image: "{{ asset('images/franchise.jpg') }}",
            badge: "PARTNERSHIP",
            heading: "EXPAND WITH ORIGINAL GPO",
            desc: "Become a franchise partner with an established legacy brand."
        },
        "franchise_footer_cta": {
            title: "Bottom Expansion Banner (Final CTA)",
            image: "{{ asset('images/franchise.jpg') }}",
            badge: "APPLY NOW",
            heading: "BUILD A BRAND PEOPLE REMEMBER",
            desc: "Deliver an authentic taste loved by generations."
        },
        "contact_hero_banner": {
            title: "Contact Hero Banner & Intro",
            image: "{{ asset('images/lucknow_heritage.jpg') }}",
            badge: "CONTACT US",
            heading: "WE ARE ALWAYS HAPPY TO HEAR FROM YOU",
            desc: "Visit • Taste • Connect"
        },
        "contact_find_us_banner": {
            title: "Find Us In Lucknow Bottom Banner",
            image: "{{ asset('images/lucknow_heritage.jpg') }}",
            badge: "HAZRATGANJ",
            heading: "FIND US IN LUCKNOW",
            desc: "Visit GPO • Taste the Original • Make a Memory"
        }
    };

    let activePage = "{{ $initPage }}";
    let activeSection = "{{ $initSection }}";

    // Called when the Page Dropdown changes
    window.onGlobalPageChange = function(pageKey) {
        activePage = pageKey;
        document.getElementById('selected_page_input').value = pageKey;

        // Populate the Section Dropdown with only the media sections of this page
        const secSelect = document.getElementById('globalSectionSelector');
        secSelect.innerHTML = '';
        const sections = pageMediaSectionsMap[pageKey] || [];
        sections.forEach((sec, idx) => {
            const opt = document.createElement('option');
            opt.value = sec.id;
            opt.textContent = sec.name;
            if (idx === 0) opt.selected = true;
            secSelect.appendChild(opt);
        });

        // Set active section to the first section of this page
        if (sections.length > 0) {
            onGlobalSectionChange(sections[0].id);
        }
    };

    // Called when the Section Dropdown changes
    window.onGlobalSectionChange = function(secKey) {
        activeSection = secKey;
        document.getElementById('selected_section_input').value = secKey;

        // Hide all section panels
        document.querySelectorAll('.section-config-panel').forEach(p => p.style.display = 'none');

        // Show matching panel
        const targetPanelId = 'sec_panel_' + activePage + '_' + secKey;
        const panel = document.getElementById(targetPanelId);
        if (panel) {
            panel.style.display = 'block';
        }

        updateLiveSimulator();
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

    // Update Live Simulator for the currently selected page & section
    window.updateLiveSimulator = function() {
        const pairKey = activePage + '_' + activeSection;
        const simData = sectionPreviewData[pairKey] || {
            title: activePage.toUpperCase() + ' - ' + activeSection,
            image: "{{ asset('images/dahi_vada.jpg') }}",
            badge: "SECTION",
            heading: "PREVIEW SECTION",
            desc: "Custom height, width, transparent overlay, and allowed media formats."
        };

        // Inputs for active section
        const hInput = document.getElementById('input_height_' + activePage + '_' + activeSection);
        const wInput = document.getElementById('input_width_' + activePage + '_' + activeSection);
        const cInput = document.getElementById('input_color_' + activePage + '_' + activeSection);
        const sInput = document.getElementById('slider_opacity_' + activePage + '_' + activeSection);
        const styleInput = document.getElementById('select_style_' + activePage + '_' + activeSection);

        const heightVal = hInput ? hInput.value.trim() : '480px';
        const widthVal = wInput ? wInput.value.trim() : '100%';
        const colorVal = cInput ? cInput.value.trim() : '#083b3c';
        const opacityVal = sInput ? parseFloat(sInput.value) : 0.75;
        const styleVal = styleInput ? styleInput.value : 'solid';

        // Allowed media count
        const checkedFormats = document.querySelectorAll('#sec_panel_' + activePage + '_' + activeSection + ' .sec-media-check:checked');
        const allowedCount = checkedFormats.length;

        // Simulator Badges
        const titleBadge = document.getElementById('sim_section_title_badge');
        const dimBadge = document.getElementById('sim_dimensions_badge');
        const opBadge = document.getElementById('sim_opacity_badge');
        const formatBadge = document.getElementById('sim_formats_badge');

        if (titleBadge) titleBadge.textContent = simData.title;
        if (dimBadge) dimBadge.textContent = 'Height: ' + heightVal + ' | Width: ' + widthVal;
        if (opBadge) opBadge.textContent = 'Overlay: ' + Math.round(opacityVal * 100) + '%';
        if (formatBadge) formatBadge.textContent = 'Formats: ' + allowedCount + ' Allowed';

        // Text Badge in simulator
        const sImg = document.getElementById('sim_img');
        const sBadge = document.getElementById('sim_text_badge');
        const sHeading = document.getElementById('sim_text_heading');
        const sDesc = document.getElementById('sim_text_desc');
        const sContainer = document.getElementById('sim_container');
        const sOverlay = document.getElementById('sim_overlay');

        if (sImg) sImg.src = simData.image;
        if (sBadge) sBadge.textContent = simData.badge;
        if (sHeading) sHeading.textContent = simData.heading;
        if (sDesc) sDesc.textContent = simData.desc;

        // Apply box styles
        if (sContainer) {
            let numericHeight = parseInt(heightVal);
            if (isNaN(numericHeight) || numericHeight <= 0) numericHeight = 280;
            sContainer.style.minHeight = Math.min(420, Math.max(220, numericHeight * 0.7)) + 'px';
            sContainer.style.maxWidth = widthVal === '100%' ? '100%' : widthVal;
        }

        if (sOverlay) {
            const rgb = hexToRgb(colorVal);
            if (styleVal === 'gradient') {
                const topO = Math.min(1.0, opacityVal + 0.12);
                const botO = Math.min(1.0, opacityVal + 0.18);
                sOverlay.style.background = `linear-gradient(135deg, rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, ${topO}) 0%, rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, ${opacityVal}) 50%, rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, ${botO}) 100%)`;
            } else {
                sOverlay.style.background = `rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, ${opacityVal})`;
            }
        }
    };

    // Preset helper functions
    window.applyPresetHeight = function(pageKey, secKey, height) {
        const input = document.getElementById('input_height_' + pageKey + '_' + secKey);
        if (input) {
            input.value = height;
            updateLiveSimulator();
        }
    };

    window.applyPresetWidth = function(pageKey, secKey, width) {
        const input = document.getElementById('input_width_' + pageKey + '_' + secKey);
        if (input) {
            input.value = width;
            updateLiveSimulator();
        }
    };

    window.applyPresetColor = function(pageKey, secKey, color) {
        const cInput = document.getElementById('input_color_' + pageKey + '_' + secKey);
        const pInput = document.getElementById('picker_' + pageKey + '_' + secKey);
        if (cInput) cInput.value = color;
        if (pInput) pInput.value = color;
        updateLiveSimulator();
    };

    window.applyPresetSlides = function(pageKey, secKey, slides) {
        const input = document.getElementById('input_max_slides_' + pageKey + '_' + secKey);
        if (input) {
            input.value = slides;
        }
    };

    // Init script
    document.addEventListener('DOMContentLoaded', function () {
        // Tab switching persistence
        const tabBtns = document.querySelectorAll('#settingsTab button[data-bs-toggle="tab"]');
        const activeTabInput = document.getElementById('active_tab_input');
        tabBtns.forEach(btn => {
            btn.addEventListener('shown.bs.tab', function (e) {
                const target = e.target.getAttribute('data-bs-target');
                if (target === '#tab-media-sections') {
                    if (activeTabInput) activeTabInput.value = 'media_sections';
                    updateLiveSimulator();
                } else {
                    if (activeTabInput) activeTabInput.value = 'general';
                }
            });
        });

        // Initialize Page and Section dropdowns
        const pSel = document.getElementById('globalPageSelector');
        if (pSel) {
            onGlobalPageChange(pSel.value);
            // If section was provided in URL, pick it
            const sSel = document.getElementById('globalSectionSelector');
            if (sSel && "{{ $initSection }}") {
                sSel.value = "{{ $initSection }}";
                onGlobalSectionChange("{{ $initSection }}");
            }
        }

        // Color Pickers sync
        document.querySelectorAll('.sec-color-picker').forEach(picker => {
            picker.addEventListener('input', function () {
                const page = this.getAttribute('data-page');
                const sec = this.getAttribute('data-sec');
                const textInput = document.getElementById('input_color_' + page + '_' + sec);
                if (textInput) textInput.value = this.value;
                updateLiveSimulator();
            });
        });

        // Color text inputs sync
        document.querySelectorAll('.sec-color-input').forEach(input => {
            input.addEventListener('input', function () {
                const page = this.getAttribute('data-page');
                const sec = this.getAttribute('data-sec');
                const picker = document.getElementById('picker_' + page + '_' + sec);
                if (picker && /^#[0-9A-Fa-f]{6}$/.test(this.value)) {
                    picker.value = this.value;
                }
                updateLiveSimulator();
            });
        });

        // Opacity sliders
        document.querySelectorAll('.sec-opacity-slider').forEach(slider => {
            slider.addEventListener('input', function () {
                const page = this.getAttribute('data-page');
                const sec = this.getAttribute('data-sec');
                const badge = document.getElementById('badge_opacity_' + page + '_' + sec);
                if (badge) badge.textContent = Math.round(parseFloat(this.value) * 100) + '%';
                updateLiveSimulator();
            });
        });

        // Style selects
        document.querySelectorAll('.sec-style-select').forEach(sel => {
            sel.addEventListener('change', function () {
                updateLiveSimulator();
            });
        });

        // Height inputs
        document.querySelectorAll('.sec-height-input').forEach(inp => {
            inp.addEventListener('input', function () {
                updateLiveSimulator();
            });
        });

        // Width inputs
        document.querySelectorAll('.sec-width-input').forEach(inp => {
            inp.addEventListener('input', function () {
                updateLiveSimulator();
            });
        });

        // Media checkboxes update simulator
        document.querySelectorAll('.sec-media-check').forEach(chk => {
            chk.addEventListener('change', function () {
                updateLiveSimulator();
            });
        });
    });
</script>
@endpush
