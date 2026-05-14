@extends('layouts.app')

@section('content')
<style>
    /* Hide the default navbar for the login page */
    .navbar { display: none !important; }
    
    body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #app {
        width: 100%;
    }

    .login-container {
        max-width: 450px;
        width: 90%;
        margin: 0 auto;
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 24px;
        padding: 3rem;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        animation: slideUp 0.6s cubic-bezier(0.16, 1, 0.3, 1);
    }

    @keyframes slideUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .login-header {
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .login-header h2 {
        color: white;
        font-weight: 800;
        letter-spacing: -0.025em;
        margin-bottom: 0.5rem;
    }

    .login-header p {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.95rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        color: rgba(255, 255, 255, 0.9);
        font-weight: 500;
        margin-bottom: 0.5rem;
        display: block;
    }

    .custom-input {
        background: rgba(255, 255, 255, 0.1) !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        border-radius: 12px !important;
        padding: 0.8rem 1.2rem !important;
        color: white !important;
        transition: all 0.3s ease !important;
        width: 100%;
    }

    .custom-input::placeholder {
        color: rgba(255, 255, 255, 0.4);
    }

    .custom-input:focus {
        background: rgba(255, 255, 255, 0.2) !important;
        border-color: rgba(255, 255, 255, 0.4) !important;
        box-shadow: 0 0 0 4px rgba(255, 255, 255, 0.1) !important;
        outline: none;
    }

    .login-btn {
        background: white;
        color: #764ba2;
        border: none;
        border-radius: 12px;
        padding: 1rem;
        width: 100%;
        font-weight: 700;
        font-size: 1rem;
        margin-top: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }

    .login-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.2);
        filter: brightness(1.05);
    }

    .invalid-feedback {
        color: #ff8a8a;
        font-size: 0.85rem;
        margin-top: 0.4rem;
    }

    .brand-logo {
        width: 60px;
        height: 60px;
        background: white;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 1.5rem;
        font-weight: 900;
        color: #764ba2;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
</style>

<div class="login-container">
    <div class="glass-card">
        <div class="brand-logo">R</div>
        <div class="login-header">
            <h2>Welcome Back</h2>
            <p>Please enter your admin credentials</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input id="email" type="email" class="custom-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="admin@rentlee.in">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" class="custom-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="••••••••">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="login-btn">
                Log In to Dashboard
            </button>
        </form>
    </div>
</div>
@endsection
