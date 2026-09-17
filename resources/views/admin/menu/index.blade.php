@extends('layouts.admin')

@section('title', 'Menu Management')

@section('content')
    <div style="background: #ffffff; border-radius: var(--radius-lg); padding: 28px 32px; box-shadow: var(--shadow-subtle); border: 1px solid var(--c-border);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; padding-bottom: 18px; border-bottom: 1px solid var(--c-border-light);">
            <div>
                <h1 style="font-family: var(--font-serif); font-size: 1.7rem; color: var(--c-teal-deep); margin-bottom: 4px;">Menu & Recipe Specialities</h1>
                <p style="color: var(--c-text-muted); font-size: 0.88rem;">Manage authentic signature items, pricing, portions, and live availability status.</p>
            </div>
            <a href="{{ route('menu') }}" target="_blank" class="btn-topbar-viewsite">
                <span>View Public Menu ➔</span>
            </a>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px;">
            <div style="border: 1px solid var(--c-border-light); border-radius: 14px; padding: 20px; background: #fafcfc;">
                <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                    <span style="font-weight: 700; color: var(--c-teal-deep); font-size: 1.05rem;">Dahi Bade (Full Plate)</span>
                    <span style="font-weight: 800; color: var(--c-terracotta);">₹240</span>
                </div>
                <p style="color: var(--c-text-muted); font-size: 0.82rem; margin-bottom: 16px;">Two signature soft lentil dumplings immersed in chilled sweet curd with roasted jeera & saunth.</p>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span class="nav-badge-pill" style="background: #10b981;">In Stock</span>
                    <span style="font-size: 0.75rem; color: var(--c-text-muted); font-weight: 600;">Daily Velocity: 210 Plates</span>
                </div>
            </div>

            <div style="border: 1px solid var(--c-border-light); border-radius: 14px; padding: 20px; background: #fafcfc;">
                <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                    <span style="font-weight: 700; color: var(--c-teal-deep); font-size: 1.05rem;">Dahi Bade (Half Plate)</span>
                    <span style="font-weight: 800; color: var(--c-terracotta);">₹130</span>
                </div>
                <p style="color: var(--c-text-muted); font-size: 0.82rem; margin-bottom: 16px;">Single soft dahi bada served fresh with signature spices and fresh chutney.</p>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span class="nav-badge-pill" style="background: #10b981;">In Stock</span>
                    <span style="font-size: 0.75rem; color: var(--c-text-muted); font-weight: 600;">Daily Velocity: 145 Plates</span>
                </div>
            </div>

            <div style="border: 1px solid var(--c-border-light); border-radius: 14px; padding: 20px; background: #fafcfc;">
                <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                    <span style="font-weight: 700; color: var(--c-teal-deep); font-size: 1.05rem;">Moong Dal Chilla</span>
                    <span style="font-weight: 800; color: var(--c-terracotta);">₹160</span>
                </div>
                <p style="color: var(--c-text-muted); font-size: 0.82rem; margin-bottom: 16px;">Golden crisp moong dal crepe stuffed with seasoned fresh paneer, coriander and green chilies.</p>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span class="nav-badge-pill" style="background: #10b981;">In Stock</span>
                    <span style="font-size: 0.75rem; color: var(--c-text-muted); font-weight: 600;">Daily Velocity: 95 Plates</span>
                </div>
            </div>
        </div>
    </div>
@endsection
