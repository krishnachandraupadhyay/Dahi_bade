@extends('layouts.admin')

@section('title', 'Sales & Velocity Reports')

@section('content')
    <div style="background: #ffffff; border-radius: var(--radius-lg); padding: 28px 32px; box-shadow: var(--shadow-subtle); border: 1px solid var(--c-border);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; padding-bottom: 18px; border-bottom: 1px solid var(--c-border-light);">
            <div>
                <h1 style="font-family: var(--font-serif); font-size: 1.7rem; color: var(--c-teal-deep); margin-bottom: 4px;">Operational Reports & Insights</h1>
                <p style="color: var(--c-text-muted); font-size: 0.88rem;">Daily dish throughput, franchise conversion rates, and revenue benchmarks.</p>
            </div>
            <a href="{{ route('dashboard') }}" class="btn-topbar-viewsite" style="background: var(--c-teal-deep); color: #ffffff;">
                <span>← Back to Overview</span>
            </a>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 18px; margin-bottom: 28px;">
            <div style="border: 1px solid var(--c-border-light); border-radius: 14px; padding: 20px; background: #fdfefe;">
                <div style="font-size: 0.76rem; color: var(--c-text-muted); font-weight: 700; text-transform: uppercase;">Weekly Revenue</div>
                <div style="font-family: var(--font-serif); font-size: 1.7rem; font-weight: 800; color: var(--c-teal-deep); margin: 6px 0;">₹1,84,500</div>
                <span style="font-size: 0.74rem; color: #10b981; font-weight: 700;">↑ +14.2% vs last week</span>
            </div>
            <div style="border: 1px solid var(--c-border-light); border-radius: 14px; padding: 20px; background: #fdfefe;">
                <div style="font-size: 0.76rem; color: var(--c-text-muted); font-weight: 700; text-transform: uppercase;">Dahi Bade Plates Sold</div>
                <div style="font-family: var(--font-serif); font-size: 1.7rem; font-weight: 800; color: var(--c-teal-deep); margin: 6px 0;">1,420</div>
                <span style="font-size: 0.74rem; color: #10b981; font-weight: 700;">↑ 98% satisfaction rating</span>
            </div>
            <div style="border: 1px solid var(--c-border-light); border-radius: 14px; padding: 20px; background: #fdfefe;">
                <div style="font-size: 0.76rem; color: var(--c-text-muted); font-weight: 700; text-transform: uppercase;">Franchise Leads (Month)</div>
                <div style="font-family: var(--font-serif); font-size: 1.7rem; font-weight: 800; color: var(--c-teal-deep); margin: 6px 0;">34</div>
                <span style="font-size: 0.74rem; color: var(--c-gold-amber); font-weight: 700;">8 pending review</span>
            </div>
        </div>

        <div style="padding: 16px 20px; background: #fafcfc; border-radius: 12px; border: 1px solid var(--c-border-light); display: flex; justify-content: space-between; align-items: center;">
            <span style="font-size: 0.86rem; color: var(--c-text-muted); font-weight: 600;">Need a raw data export for bookkeeping?</span>
            <button onclick="alert('Exporting full sales and leads report to CSV...')" class="btn-topbar-viewsite" style="cursor: pointer;">
                <span>Export CSV Report</span>
            </button>
        </div>
    </div>
@endsection
