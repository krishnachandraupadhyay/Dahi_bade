@section('title', 'Register')
<x-guest-layout>
    <h1 class="auth-heading">Sign up your account</h1>
    <p class="auth-subtitle">Welcome! Create your GPO account</p>

    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="alert-error">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="form-group">
            <input 
                id="name" 
                class="form-input" 
                type="text" 
                name="name" 
                value="{{ old('name') }}" 
                placeholder="Full Name" 
                required 
                autofocus 
                autocomplete="name"
            />
        </div>

        <!-- Email Address -->
        <div class="form-group">
            <input 
                id="email" 
                class="form-input" 
                type="email" 
                name="email" 
                value="{{ old('email') }}" 
                placeholder="Number or email address" 
                required 
                autocomplete="username"
            />
        </div>

        <!-- Password -->
        <div class="form-group">
            <input 
                id="password" 
                class="form-input" 
                type="password" 
                name="password" 
                placeholder="Password" 
                required 
                autocomplete="new-password"
            />
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <input 
                id="password_confirmation" 
                class="form-input" 
                type="password" 
                name="password_confirmation" 
                placeholder="Confirm password" 
                required 
                autocomplete="new-password"
            />
        </div>

        <!-- Agree terms & policy -->
        <div class="form-options">
            <label for="terms" class="custom-checkbox">
                <input id="terms" type="checkbox" name="terms" required checked>
                <span>Agree terms & policy</span>
            </label>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="auth-submit-btn">
            Register
        </button>

        <!-- Divider -->
        <div class="divider-container">
            <div class="divider-line"></div>
            <span class="divider-text">Or select method to register</span>
            <div class="divider-line"></div>
        </div>

        <!-- Social Buttons -->
        <div class="social-buttons">
            <button type="button" class="social-btn" onclick="alert('Google sign-up integration ready')">
                <svg viewBox="0 0 24 24">
                    <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                    <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                    <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                    <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
                </svg>
                Google
            </button>

            <button type="button" class="social-btn" onclick="alert('Facebook sign-up integration ready')">
                <svg viewBox="0 0 24 24">
                    <path fill="#1877F2" d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                </svg>
                Facebook
            </button>
        </div>

        <!-- Switch to Login -->
        <div class="auth-switch">
            Already have an account? <a href="{{ route('login') }}">Login</a>
        </div>
    </form>
</x-guest-layout>
