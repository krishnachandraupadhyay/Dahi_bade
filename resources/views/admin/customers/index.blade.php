@extends('layouts.admin')

@section('title', 'Customers & Enquiries')

@section('content')
    <div style="background: #ffffff; border-radius: var(--radius-lg); padding: 28px 32px; box-shadow: var(--shadow-subtle); border: 1px solid var(--c-border);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; padding-bottom: 18px; border-bottom: 1px solid var(--c-border-light);">
            <div>
                <h1 style="font-family: var(--font-serif); font-size: 1.7rem; color: var(--c-teal-deep); margin-bottom: 4px;">Customer Enquiries & Feedback</h1>
                <p style="color: var(--c-text-muted); font-size: 0.88rem;">Review customer feedback, catering requests, and general questions.</p>
            </div>
            <a href="{{ route('dashboard') }}" class="btn-topbar-viewsite" style="background: var(--c-teal-deep); color: #ffffff;">
                <span>← Back to Overview</span>
            </a>
        </div>

        <div style="display: flex; flex-direction: column; gap: 16px;">
            <div style="border: 1px solid var(--c-border-light); border-radius: 12px; padding: 18px; background: #fafcfc;">
                <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                    <div>
                        <strong style="color: var(--c-teal-deep); font-size: 0.95rem;">Vikram Singhania</strong>
                        <span style="font-size: 0.75rem; color: var(--c-text-muted); margin-left: 10px;">vikram.s@outlook.com • +91 98390 11223</span>
                    </div>
                    <span class="nav-badge-pill" style="background: var(--c-terracotta);">Event Catering</span>
                </div>
                <p style="font-size: 0.85rem; color: #2e3e3b; line-height: 1.5;">"We are hosting a family anniversary celebration in Gomti Nagar next Saturday and would like to order 80 packed boxes of original Dahi Bade. Please let us know the delivery arrangement and bulk pricing."</p>
                <div style="margin-top: 10px; display: flex; gap: 12px;">
                    <a href="mailto:vikram.s@outlook.com" class="btn-topbar-viewsite" style="padding: 4px 14px; font-size: 0.75rem;">Reply via Email</a>
                    <a href="https://wa.me/919839011223" target="_blank" class="btn-topbar-viewsite" style="padding: 4px 14px; font-size: 0.75rem; border-color: #10b981; color: #10b981;">WhatsApp ➔</a>
                </div>
            </div>

            <div style="border: 1px solid var(--c-border-light); border-radius: 12px; padding: 18px; background: #fafcfc;">
                <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                    <div>
                        <strong style="color: var(--c-teal-deep); font-size: 0.95rem;">Dr. Renu Saxena</strong>
                        <span style="font-size: 0.75rem; color: var(--c-text-muted); margin-left: 10px;">renu.saxena@gmail.com • +91 94150 45678</span>
                    </div>
                    <span class="nav-badge-pill" style="background: #10b981;">Appreciation</span>
                </div>
                <p style="font-size: 0.85rem; color: #2e3e3b; line-height: 1.5;">"Visited your Hazratganj shop after 15 years while returning to Lucknow from Bangalore. The taste of the sweet curd and spices is exactly as unforgettable as it was during my college days!"</p>
            </div>
        </div>
    </div>
@endsection
