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

    <!-- Blank Clean Content Area -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm" style="border-radius: 12px; min-height: 400px; display: flex; align-items: center; justify-content: center; background: #ffffff;">
                <div class="card-body text-center p-5">
                    <div class="rounded-circle bg-primary-transparent text-primary d-inline-flex align-items-center justify-content-center mb-3" style="width: 64px; height: 64px; font-size: 28px;">
                        <i class="bi bi-grid-1x2-fill"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-1">Dashboard Content Area</h5>
                    <p class="text-muted fs-13 mb-0" style="max-width: 420px; margin: 0 auto;">
                        Yahan ka saara dummy data clear kar diya gaya hai. Aap apna naya content ya widgets yahan add kar sakte hain.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
