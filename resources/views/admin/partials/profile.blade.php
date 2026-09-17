<div class="sidebar-bottom-user">
    <div class="user-mini-meta">
        <div class="avatar-initials">
            {{ strtoupper(substr(Auth::user()->name ?? 'AD', 0, 2)) }}
        </div>
        <div class="user-details-text">
            <span class="user-name-title" title="{{ Auth::user()->name ?? 'Admin' }}">
                {{ Auth::user()->name ?? 'Admin' }}
            </span>
            <span class="user-role-badge">
                ★ {{ Auth::user()->role ?? 'Admin' }}
            </span>
        </div>
    </div>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="logout-btn-icon" title="Logout">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                <polyline points="16 17 21 12 16 7"></polyline>
                <line x1="21" y1="12" x2="9" y2="12"></line>
            </svg>
        </button>
    </form>
</div>
