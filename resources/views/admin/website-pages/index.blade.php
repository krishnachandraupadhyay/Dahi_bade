@extends('layouts.admin')

@section('title', 'Website Pages')

@section('content')
    <!-- Valex Page Header / Breadcrumb -->
    <div class="valex-page-header d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
        <div>
            <h4 class="valex-page-title mb-1 fw-bold text-dark fs-20">Website Pages</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 fs-13">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-primary text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Website Pages</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-primary btn-sm d-flex align-items-center gap-1.5 px-3 py-1.5 rounded-2">
                <i class="bi bi-box-arrow-up-right fs-13"></i>
                <span>View Live Site</span>
            </a>
        </div>
    </div>

    <!-- Website Pages Card & Table -->
    <div class="card border-0 shadow-sm" style="border-radius: 12px; background: #ffffff;">
        <div class="card-header border-0 bg-transparent py-3 px-4 d-flex justify-content-between align-items-center">
            <div>
                <h5 class="fw-bold text-dark mb-0 fs-16">All Website Pages</h5>
                <small class="text-muted fs-12">Manage and view all public frontend pages of the website.</small>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-muted fs-12 text-uppercase">
                        <tr>
                            <th class="ps-4 py-3" style="font-weight: 600;">Page Title</th>
                            <th class="py-3" style="font-weight: 600;">Slug / URL</th>
                            <th class="py-3" style="font-weight: 600;">View Template</th>
                            <th class="py-3" style="font-weight: 600;">Status</th>
                            <th class="pe-4 py-3 text-end" style="font-weight: 600;">Action</th>
                        </tr>
                    </thead>
                    <tbody class="fs-13">
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center gap-2.5">
                                    <div class="rounded-2 bg-primary-transparent text-primary d-inline-flex align-items-center justify-content-center" style="width: 34px; height: 34px;">
                                        <i class="bi bi-house-door-fill"></i>
                                    </div>
                                    <div>
                                        <span class="fw-semibold text-dark d-block">Home Page</span>
                                        <small class="text-muted">Hero, Highlights, Best Sellers & Brand Info</small>
                                    </div>
                                </div>
                            </td>
                            <td><code>/</code></td>
                            <td><code>pages.home</code></td>
                            <td><span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1">Active</span></td>
                            <td class="pe-4 text-end">
                                <a href="{{ route('home') }}" target="_blank" class="btn btn-sm btn-light text-primary border" title="Preview Page">
                                    <i class="bi bi-eye"></i> 
                                </a>
                                <a href="{{ route('admin.website-pages.home') }}" class="btn btn-sm btn-light text-primary border" title="Edit Page">
                                    <i class="bi bi-pencil"></i> 
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center gap-2.5">
                                    <div class="rounded-2 bg-info-transparent text-info d-inline-flex align-items-center justify-content-center" style="width: 34px; height: 34px;">
                                        <i class="bi bi-journal-text"></i>
                                    </div>
                                    <div>
                                        <span class="fw-semibold text-dark d-block">Our Story</span>
                                        <small class="text-muted">Heritage, Founders & Journey</small>
                                    </div>
                                </div>
                            </td>
                            <td><code>/story</code></td>
                            <td><code>pages.story</code></td>
                            <td><span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1">Active</span></td>
                            <td class="pe-4 text-end">
                                <a href="{{ route('story') }}" target="_blank" class="btn btn-sm btn-light text-primary border" title="Preview Page">
                                    <i class="bi bi-eye"></i> View
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center gap-2.5">
                                    <div class="rounded-2 bg-warning-transparent text-warning d-inline-flex align-items-center justify-content-center" style="width: 34px; height: 34px;">
                                        <i class="bi bi-card-checklist"></i>
                                    </div>
                                    <div>
                                        <span class="fw-semibold text-dark d-block">Menu & Specialities</span>
                                        <small class="text-muted">Signature Dahi Bade, Chaats & Prices</small>
                                    </div>
                                </div>
                            </td>
                            <td><code>/menu</code></td>
                            <td><code>pages.menu</code></td>
                            <td><span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1">Active</span></td>
                            <td class="pe-4 text-end">
                                <a href="{{ route('menu') }}" target="_blank" class="btn btn-sm btn-light text-primary border" title="Preview Page">
                                    <i class="bi bi-eye"></i> View
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center gap-2.5">
                                    <div class="rounded-2 bg-danger-transparent text-danger d-inline-flex align-items-center justify-content-center" style="width: 34px; height: 34px;">
                                        <i class="bi bi-shop"></i>
                                    </div>
                                    <div>
                                        <span class="fw-semibold text-dark d-block">Franchise Enquiry</span>
                                        <small class="text-muted">Franchise Model, ROI & Form</small>
                                    </div>
                                </div>
                            </td>
                            <td><code>/franchise</code></td>
                            <td><code>pages.franchise</code></td>
                            <td><span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1">Active</span></td>
                            <td class="pe-4 text-end">
                                <a href="{{ route('franchise') }}" target="_blank" class="btn btn-sm btn-light text-primary border" title="Preview Page">
                                    <i class="bi bi-eye"></i> View
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center gap-2.5">
                                    <div class="rounded-2 bg-secondary-transparent text-secondary d-inline-flex align-items-center justify-content-center" style="width: 34px; height: 34px;">
                                        <i class="bi bi-envelope-at"></i>
                                    </div>
                                    <div>
                                        <span class="fw-semibold text-dark d-block">Contact Us</span>
                                        <small class="text-muted">Store Locations, Order Inquiry & Contact</small>
                                    </div>
                                </div>
                            </td>
                            <td><code>/contact</code></td>
                            <td><code>pages.contact</code></td>
                            <td><span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1">Active</span></td>
                            <td class="pe-4 text-end">
                                <a href="{{ route('contact') }}" target="_blank" class="btn btn-sm btn-light text-primary border" title="Preview Page">
                                    <i class="bi bi-eye"></i> View
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
