@extends('layouts.admin')

@section('title', 'Orders Management')

@section('content')
    <div style="background: #ffffff; border-radius: var(--radius-lg); padding: 28px 32px; box-shadow: var(--shadow-subtle); border: 1px solid var(--c-border);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; padding-bottom: 18px; border-bottom: 1px solid var(--c-border-light);">
            <div>
                <h1 style="font-family: var(--font-serif); font-size: 1.7rem; color: var(--c-teal-deep); margin-bottom: 4px;">Orders Management</h1>
                <p style="color: var(--c-text-muted); font-size: 0.88rem;">Track and manage incoming dine-in, takeaway and delivery orders.</p>
            </div>
            <a href="{{ route('dashboard') }}" class="btn-topbar-viewsite" style="background: var(--c-teal-deep); color: #ffffff;">
                <span>← Back to Overview</span>
            </a>
        </div>

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.88rem;">
                <thead>
                    <tr style="border-bottom: 2px solid var(--c-border-light); color: var(--c-teal-deep);">
                        <th style="padding: 12px 14px;">Order ID</th>
                        <th style="padding: 12px 14px;">Customer</th>
                        <th style="padding: 12px 14px;">Items</th>
                        <th style="padding: 12px 14px;">Amount</th>
                        <th style="padding: 12px 14px;">Status</th>
                        <th style="padding: 12px 14px;">Time</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border-bottom: 1px solid var(--c-border-light);">
                        <td style="padding: 14px; font-weight: 700; color: var(--c-teal-deep);">#GPO-1042</td>
                        <td style="padding: 14px;">Mohit Verma<br><small style="color: var(--c-text-muted);">Hazratganj</small></td>
                        <td style="padding: 14px;">2x Dahi Bade Full Plate</td>
                        <td style="padding: 14px; font-weight: 700;">₹480</td>
                        <td style="padding: 14px;"><span class="nav-badge-pill" style="background: #10b981;">Dispatched</span></td>
                        <td style="padding: 14px; color: var(--c-text-muted);">12:45 PM</td>
                    </tr>
                    <tr style="border-bottom: 1px solid var(--c-border-light);">
                        <td style="padding: 14px; font-weight: 700; color: var(--c-teal-deep);">#GPO-1041</td>
                        <td style="padding: 14px;">Pooja Sharma<br><small style="color: var(--c-text-muted);">Gomti Nagar</small></td>
                        <td style="padding: 14px;">1x Moong Dal Chilla, 1x Samosa Chaat</td>
                        <td style="padding: 14px; font-weight: 700;">₹310</td>
                        <td style="padding: 14px;"><span class="nav-badge-pill" style="background: var(--c-gold-amber); color: #1a2523;">Preparing</span></td>
                        <td style="padding: 14px; color: var(--c-text-muted);">12:20 PM</td>
                    </tr>
                    <tr>
                        <td style="padding: 14px; font-weight: 700; color: var(--c-teal-deep);">#GPO-1040</td>
                        <td style="padding: 14px;">Anurag Dixit<br><small style="color: var(--c-text-muted);">Aliganj</small></td>
                        <td style="padding: 14px;">4x Dahi Vada Packed Box</td>
                        <td style="padding: 14px; font-weight: 700;">₹960</td>
                        <td style="padding: 14px;"><span class="nav-badge-pill" style="background: #3b82f6;">Delivered</span></td>
                        <td style="padding: 14px; color: var(--c-text-muted);">11:50 AM</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
