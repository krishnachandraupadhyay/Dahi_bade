<nav>
    <div class="container nav-inner">
        <a class="logo" href="{{ route('home') }}">
            <span class="logo-mark">G</span>
            <span>Original GPO<small>Ke Thandey Dahi Bade</small></span>
        </a>
        <div class="menu">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('story') }}" class="{{ request()->routeIs('story') ? 'active' : '' }}">Our Story</a>
            <a href="{{ route('menu') }}" class="{{ request()->routeIs('menu') ? 'active' : '' }}">Menu</a>
            <a href="{{ route('franchise') }}" class="{{ request()->routeIs('franchise') ? 'active' : '' }}">Franchise</a>
            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
        </div>
        <div style="display:flex;align-items:center;gap:10px">
            <a class="nav-cta" href="{{ route('contact') }}#order">Order Now →</a>
            @auth
                <a class="nav-cta" href="{{ route('dashboard') }}" style="background:#2c3e50;">Dashboard</a>
            @else
                <a class="nav-cta" href="{{ route('login') }}" style="background:transparent;border:1.5px solid var(--maroon);color:var(--maroon);padding:8px 16px;">Login</a>
            @endauth
        </div>
        <button class="mobile-toggle" aria-label="Menu">☰</button>
    </div>
</nav>
