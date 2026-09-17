@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <!-- Valex Page Header / Breadcrumb -->
    <div class="valex-page-header d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
        <div>
            <h4 class="valex-page-title mb-1 fw-bold text-dark fs-20">Dashboard</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 fs-13">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-primary text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex align-items-center gap-2">
            <span class="valex-date-badge">
                <i class="bi bi-calendar3 me-1.5 text-primary"></i>
                {{ date('D, d M Y') }}
            </span>
        </div>
    </div>

    <!-- Website Quick Management Hub -->
    <div class="row g-4 mb-4">
        <!-- Highlights Strip Direct Edit Card -->
        <div class="col-xl-6 col-lg-6 col-md-12">
            <div class="card border-0 shadow-sm h-100 position-relative overflow-hidden" style="border-radius: 14px; background: linear-gradient(135deg, #083b3c 0%, #0d5455 100%);">
                <!-- Decorative background shapes -->
                <div class="position-absolute" style="top: -20px; right: -20px; width: 140px; height: 140px; border-radius: 50%; background: rgba(255,255,255,0.06); pointer-events: none;"></div>
                <div class="position-absolute" style="bottom: -30px; right: 80px; width: 90px; height: 90px; border-radius: 50%; background: rgba(241,179,71,0.08); pointer-events: none;"></div>

                <div class="card-body p-4 text-white d-flex flex-column justify-content-between position-relative" style="z-index: 2;">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="badge bg-warning text-dark fw-bold px-3 py-1.5 fs-11 rounded-pill">
                                <i class="bi bi-stars me-1"></i> Section 2 Quick Edit
                            </span>
                            <span class="badge bg-white bg-opacity-20 text-white fs-11 px-2.5 py-1">
                                3 Cards Below Hero
                            </span>
                        </div>
                        <h4 class="fw-bold mb-2 fs-19 text-white d-flex align-items-center gap-2">
                            <i class="bi bi-collection-play-fill text-warning"></i>
                            Highlights Strip (3 Feature Cards)
                        </h4>
                        <p class="fs-13 text-white-50 mb-3" style="line-height: 1.5;">
                            Home page ke hero banner ke turant neeche aane wale 3 cards (Card 1, Card 2, Card 3) ka <strong>image, main heading, gold subheading aur short description</strong> direct yahan se edit karein.
                        </p>
                        <div class="d-flex flex-wrap gap-2 mb-3">
                            <span class="badge bg-white bg-opacity-10 text-white fs-11 border border-white border-opacity-10">
                                <i class="bi bi-check2-circle text-warning me-1"></i> Card 1, 2, 3 Stacked
                            </span>
                            <span class="badge bg-white bg-opacity-10 text-white fs-11 border border-white border-opacity-10">
                                <i class="bi bi-shield-check text-success me-1"></i> Height Locked (360px)
                            </span>
                            <span class="badge bg-white bg-opacity-10 text-white fs-11 border border-white border-opacity-10">
                                <i class="bi bi-eye text-info me-1"></i> Live Real-Time Preview
                            </span>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap align-items-center gap-2 pt-3 border-top border-white border-opacity-10">
                        <a href="{{ route('admin.website-pages.home', ['section' => 'highlights_strip']) }}" class="btn btn-warning fw-bold px-4 py-2 d-flex align-items-center gap-2 shadow">
                            <i class="bi bi-pencil-square fs-15"></i>
                            <span>Edit Highlights Strip Now</span>
                        </a>
                        <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-light px-3 py-2 d-flex align-items-center gap-1.5">
                            <i class="bi bi-box-arrow-up-right fs-13"></i> View on Live Site
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hero Section Direct Edit Card -->
        <div class="col-xl-6 col-lg-6 col-md-12">
            <div class="card border-0 shadow-sm h-100 position-relative overflow-hidden" style="border-radius: 14px; background: #ffffff;">
                <div class="card-body p-4 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="badge bg-primary-subtle text-primary fw-bold px-3 py-1.5 fs-11 rounded-pill">
                                <i class="bi bi-sliders me-1"></i> Section 1 Quick Edit
                            </span>
                            <span class="badge bg-light text-muted fs-11 px-2.5 py-1 border">
                                Banner & Carousel
                            </span>
                        </div>
                        <h4 class="fw-bold mb-2 fs-19 text-dark d-flex align-items-center gap-2">
                            <i class="bi bi-images text-primary"></i>
                            Hero Banner & Slider
                        </h4>
                        <p class="fs-13 text-muted mb-3" style="line-height: 1.5;">
                            Homepage ke top banner me nayi slides add karein, remove karein, background image / video / GIF upload karein aur 12 premium color styles ke buttons configure karein.
                        </p>
                        <div class="d-flex flex-wrap gap-2 mb-3">
                            <span class="badge bg-light text-dark fs-11 border">
                                <i class="bi bi-plus-slash-minus text-primary me-1"></i> Add / Remove Slides
                            </span>
                            <span class="badge bg-light text-dark fs-11 border">
                                <i class="bi bi-film text-info me-1"></i> Image, Video & GIF
                            </span>
                            <span class="badge bg-light text-dark fs-11 border">
                                <i class="bi bi-palette text-danger me-1"></i> 12 Button Colors
                            </span>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap align-items-center gap-2 pt-3 border-top border-light-subtle">
                        <a href="{{ route('admin.website-pages.home', ['section' => 'hero_section']) }}" class="btn btn-primary fw-semibold px-4 py-2 d-flex align-items-center gap-2">
                            <i class="bi bi-pencil-square fs-15"></i>
                            <span>Edit Hero Section</span>
                        </a>
                        <a href="{{ route('admin.website-pages.index') }}" class="btn btn-outline-secondary px-3 py-2 d-flex align-items-center gap-1.5">
                            <i class="bi bi-layout-text-window-reverse fs-13"></i> All Pages
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Stats / Site Directory Grid -->
    <div class="row g-3">
        <div class="col-xl-3 col-md-6 col-sm-12">
            <div class="card border-0 shadow-sm" style="border-radius: 12px; background: #ffffff;">
                <div class="card-body p-3.5 d-flex align-items-center gap-3">
                    <div class="rounded-3 bg-primary-transparent text-primary d-flex align-items-center justify-content-center" style="width: 46px; height: 46px; font-size: 20px;">
                        <i class="bi bi-house-door-fill"></i>
                    </div>
                    <div class="flex-grow-1 overflow-hidden">
                        <h6 class="fw-bold text-dark mb-0 fs-13 text-truncate">Hero Banner Slider</h6>
                        <small class="text-muted fs-11 text-truncate d-block">Slides & Buttons</small>
                    </div>
                    <a href="{{ route('admin.website-pages.home', ['section' => 'hero_section']) }}" class="btn btn-sm btn-light border text-primary">
                        <i class="bi bi-pencil"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 col-sm-12">
            <div class="card border-0 shadow-sm" style="border-radius: 12px; background: #ffffff;">
                <div class="card-body p-3.5 d-flex align-items-center gap-3">
                    <div class="rounded-3 bg-info-transparent text-info d-flex align-items-center justify-content-center" style="width: 46px; height: 46px; font-size: 20px;">
                        <i class="bi bi-collection-play-fill"></i>
                    </div>
                    <div class="flex-grow-1 overflow-hidden">
                        <h6 class="fw-bold text-dark mb-0 fs-13 text-truncate">Highlights Strip</h6>
                        <small class="text-muted fs-11 text-truncate d-block">Card 1, 2, 3 Items</small>
                    </div>
                    <a href="{{ route('admin.website-pages.home', ['section' => 'highlights_strip']) }}" class="btn btn-sm btn-light border text-info">
                        <i class="bi bi-pencil"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 col-sm-12">
            <div class="card border-0 shadow-sm" style="border-radius: 12px; background: #ffffff;">
                <div class="card-body p-3.5 d-flex align-items-center gap-3">
                    <div class="rounded-3 bg-warning-transparent text-warning d-flex align-items-center justify-content-center" style="width: 46px; height: 46px; font-size: 20px;">
                        <i class="bi bi-award-fill"></i>
                    </div>
                    <div class="flex-grow-1 overflow-hidden">
                        <h6 class="fw-bold text-dark mb-0 fs-13 text-truncate">Welcome To GPO</h6>
                        <small class="text-muted fs-11 text-truncate d-block">Sant Ram Gupta Story</small>
                    </div>
                    <a href="{{ route('admin.website-pages.home', ['section' => 'welcome_section']) }}" class="btn btn-sm btn-light border text-warning">
                        <i class="bi bi-pencil"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 col-sm-12">
            <div class="card border-0 shadow-sm" style="border-radius: 12px; background: #ffffff;">
                <div class="card-body p-3.5 d-flex align-items-center gap-3">
                    <div class="rounded-3 bg-success-transparent text-success d-flex align-items-center justify-content-center" style="width: 46px; height: 46px; font-size: 20px;">
                        <i class="bi bi-check2-circle"></i>
                    </div>
                    <div class="flex-grow-1 overflow-hidden">
                        <h6 class="fw-bold text-dark mb-0 fs-13 text-truncate">Why People Love GPO</h6>
                        <small class="text-muted fs-11 text-truncate d-block">6 Feature Cards</small>
                    </div>
                    <a href="{{ route('admin.website-pages.home', ['section' => 'why_gpo']) }}" class="btn btn-sm btn-light border text-success">
                        <i class="bi bi-pencil"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 col-sm-12">
            <div class="card border-0 shadow-sm" style="border-radius: 12px; background: #ffffff;">
                <div class="card-body p-3.5 d-flex align-items-center gap-3">
                    <div class="rounded-3 bg-primary-transparent text-primary d-flex align-items-center justify-content-center" style="width: 46px; height: 46px; font-size: 20px;">
                        <i class="bi bi-globe2"></i>
                    </div>
                    <div class="flex-grow-1 overflow-hidden">
                        <h6 class="fw-bold text-dark mb-0 fs-13 text-truncate">Live Website</h6>
                        <small class="text-muted fs-11 text-truncate d-block">Customer View</small>
                    </div>
                    <a href="{{ route('home') }}" target="_blank" class="btn btn-sm btn-light border text-primary">
                        <i class="bi bi-box-arrow-up-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
