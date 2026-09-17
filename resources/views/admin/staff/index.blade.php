@extends('layouts.admin')

@section('title', 'Staff Management')

@section('content')
    <div style="background: #ffffff; border-radius: var(--radius-lg); padding: 28px 32px; box-shadow: var(--shadow-subtle); border: 1px solid var(--c-border);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; padding-bottom: 18px; border-bottom: 1px solid var(--c-border-light);">
            <div>
                <h1 style="font-family: var(--font-serif); font-size: 1.7rem; color: var(--c-teal-deep); margin-bottom: 4px;">Kitchen & Outlet Staff</h1>
                <p style="color: var(--c-text-muted); font-size: 0.88rem;">Manage kitchen chefs, outlet attendants, and admin staff roles.</p>
            </div>
            <a href="{{ route('dashboard') }}" class="btn-topbar-viewsite" style="background: var(--c-teal-deep); color: #ffffff;">
                <span>← Back to Overview</span>
            </a>
        </div>

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.88rem;">
                <thead>
                    <tr style="border-bottom: 2px solid var(--c-border-light); color: var(--c-teal-deep);">
                        <th style="padding: 12px 14px;">Staff Name</th>
                        <th style="padding: 12px 14px;">Role</th>
                        <th style="padding: 12px 14px;">Outlet Assigned</th>
                        <th style="padding: 12px 14px;">Shift</th>
                        <th style="padding: 12px 14px;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border-bottom: 1px solid var(--c-border-light);">
                        <td style="padding: 14px; font-weight: 700; color: var(--c-teal-deep);">Santosh Rawat</td>
                        <td style="padding: 14px;">Head Preparation Master</td>
                        <td style="padding: 14px;">Hazratganj Outlet</td>
                        <td style="padding: 14px;">Morning & Evening</td>
                        <td style="padding: 14px;"><span class="nav-badge-pill" style="background: #10b981;">On Duty</span></td>
                    </tr>
                    <tr style="border-bottom: 1px solid var(--c-border-light);">
                        <td style="padding: 14px; font-weight: 700; color: var(--c-teal-deep);">Rajesh Kumar</td>
                        <td style="padding: 14px;">Service & Packaging</td>
                        <td style="padding: 14px;">Awadh Bazaar Store</td>
                        <td style="padding: 14px;">12:30 PM - 9:30 PM</td>
                        <td style="padding: 14px;"><span class="nav-badge-pill" style="background: #10b981;">On Duty</span></td>
                    </tr>
                    <tr>
                        <td style="padding: 14px; font-weight: 700; color: var(--c-teal-deep);">Deepak Gupta</td>
                        <td style="padding: 14px;">Store Supervisor / Admin</td>
                        <td style="padding: 14px;">Hazratganj HQ</td>
                        <td style="padding: 14px;">Full Day</td>
                        <td style="padding: 14px;"><span class="nav-badge-pill" style="background: #3b82f6;">Active</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
