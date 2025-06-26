@php($hideHeaderFooter = true)
@extends('frontEnd.layouts.master')
@section('title','Agent Password Reset Verify')
@section('content')
<!-- Spinner Loader Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner Loader End -->
<style>
/* Copied CSS from merchant login (resources/views/frontEnd/layouts/pages/login.blade.php) */
html, body { overflow-x: hidden; background: url('/logo/login_bg.jpg') no-repeat center center fixed; background-size: cover; color: #fff; font-family: Arial, sans-serif; }
.middle-header { transition: none; display: none; }
.footer { background: var(--bs-dark); display: none; }
.copyright { display: none; }
.login-container { display: flex; justify-content: center; align-items: flex-start; padding-top: 0; margin-top: 0 !important; }
.glass-card { background: rgba(0,0,0,0.65); border-radius: 4px; padding: 48px 40px 36px 40px; width: 100%; max-width: 400px; box-shadow: 0 4px 10px rgba(0,0,0,0.5); display: flex; flex-direction: column; align-items: center; }
.glass-card h2 { color: #fff; font-size: 32px; font-weight: 700; text-align: left; width: 100%; margin-bottom: 28px; letter-spacing: 0.5px; }
.glass-card form { width: 100%; }
.glass-card .form-group { width: 100%; margin-bottom: 12px; }
.glass-card input[type="email"], .glass-card input[type="text"], .glass-card input[type="password"] { width: 100%; padding: 14px 16px; background: #333; border: 1.5px solid #cfd8dc; border-radius: 6px; color: #fff; font-size: 16px; margin-bottom: 0; outline: none; box-sizing: border-box; transition: border-color 0.2s, box-shadow 0.2s; box-shadow: none; height: 48px; }
.glass-card input[type="email"]:focus, .glass-card input[type="text"]:focus, .glass-card input[type="password"]:focus { border-color: #1976d2; outline: none; box-shadow: 0 0 0 2px #1976d233; }
.glass-card input[type="email"]::placeholder, .glass-card input[type="text"]::placeholder, .glass-card input[type="password"]::placeholder { color: #8c8c8c; font-size: 15px; }
.glass-card .submit { width: 100%; padding: 14px 0; background: #015fc9; color: #fff; border: none; border-radius: 4px; font-size: 18px; font-weight: 700; margin-top: 10px; margin-bottom: 16px; cursor: pointer; transition: background 0.2s; letter-spacing: 0.5px; }
.glass-card .submit:hover { background: #0151ab; color: #fff; }
.merchant-logo img {
    margin-top: 5px !important;
    max-height: 48px !important;
}
@media (max-width: 600px) {
    html, body {
        background: #000 !important;
        color: #fff !important;
    }
    body::before {
        display: none !important;
    }
    .login-container {
        justify-content: center;
        align-items: flex-start;
        min-height: 100vh;
        padding-top: 0 !important;
        margin-top: 0 !important;
        background: #000 !important;
    }
    .glass-card {
        padding: 32px 24px 24px 24px !important;
    }
    .glass-card input[type="email"],
    .glass-card input[type="text"],
    .glass-card input[type="password"] {
        width: 100% !important;
        min-width: 0 !important;
        max-width: 100% !important;
        height: 48px !important;
        font-size: 1rem !important;
        padding: 0 16px !important;
        box-sizing: border-box !important;
        margin-bottom: 10px !important;
        background: #181818 !important;
        color: #fff !important;
        border: 1.5px solid #444 !important;
        border-radius: 8px !important;
        transition: border-color 0.2s;
    }
    .glass-card input[type="email"]:focus,
    .glass-card input[type="text"]:focus,
    .glass-card input[type="password"]:focus {
        border-color: #e50914 !important;
        outline: none !important;
    }
    .glass-card input[type="email"]::placeholder,
    .glass-card input[type="text"]::placeholder,
    .glass-card input[type="password"]::placeholder {
        color: #aaa !important;
        font-size: 1rem !important;
    }
    .glass-card .submit {
        background: #015fc9 !important;
        color: #fff !important;
        border: none !important;
    }
    .glass-card .submit:hover {
        background: #0151ab !important;
        color: #fff !important;
    }
    .glass-card .or-divider {
        color: #fff !important;
        font-size: 1rem !important;
        margin: 12px 0 !important;
        font-weight: 500 !important;
    }
    .glass-card .alt-btn {
        background: #333 !important;
        color: #fff !important;
        border-radius: 4px !important;
        font-size: 1rem !important;
        font-weight: 500 !important;
        margin-bottom: 12px !important;
        height: 44px !important;
    }
    .glass-card .register-link,
    .glass-card .options-row {
        color: #fff !important;
        font-size: 1rem !important;
        margin-top: 10px !important;
        text-align: left !important;
    }
    .glass-card .register-link a,
    .glass-card .options-row a {
        color: #fff !important;
        text-decoration: underline !important;
        font-weight: 500 !important;
        margin-left: 0 !important;
    }
    .glass-card .form-check-label {
        color: #fff !important;
        font-size: 1rem !important;
        font-weight: 400 !important;
    }
    .glass-card .form-check-input {
        width: 18px !important;
        height: 18px !important;
        margin-right: 8px !important;
    }
    .glass-card .form-group {
        margin-bottom: 10px !important;
    }
    .back-to-top-btn {
        display: none !important;
    }
}
</style>
    <div class="container">
    <div class="merchant-logo">
        <a href="{{ url('/') }}">
            @if(isset($darklogo) && count($darklogo))
                <img src="{{ asset($darklogo[0]->image) }}" alt="Agent Logo" style="max-height:32px; width:auto; display:block;">
            @else
                <img src="{{ asset('assets/img/logo.png') }}" alt="Agent Logo" style="max-height:32px; width:auto; display:block;">
            @endif
        </a>
                            </div>
                        </div>
<div class="login-container">
    <div class="glass-card">
        <h2>Agent Password Reset</h2>
        <form action="{{url('auth/agent/resetpassword/verify')}}" method="post">
                                    @csrf
                                            <div class="form-group">
                <input type="text" placeholder="Verification Code" id="code" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" required data-error="Please enter verification code">
                <div class="help-block with-errors"></div>
                @if ($errors->has('code'))
                                                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('code') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                <input type="password" placeholder="New Password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required data-error="Please enter new password">
                <div class="help-block with-errors"></div>
                @if ($errors->has('password'))
                                                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
            <div class="form-group">
                <input type="password" placeholder="Confirm Password" id="password_confirmation" class="form-control" name="password_confirmation" required data-error="Please confirm password">
                <div class="help-block with-errors"></div>
                                        </div>
            <button type="submit" class="submit">Reset Password</button>
            <div class="register-link">
                Remember your password? <a href="{{ url('agent/login') }}">Back to login</a>
                                    </div>
                                </form>
                        </div>
                    </div>

<!-- Scroll to Top Button Start -->
<a href="#" id="backToTop" class="back-to-top-btn" style="display:none;"><i class="fa fa-arrow-up"></i></a>
<!-- Scroll to Top Button End -->

@endsection

@section('custom_js_script')
<script>
    // Spinner hide logic (LifeSure style)
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            var spinner = document.getElementById('spinner');
            if (spinner) spinner.classList.remove('show');
        }, 1);
    });
</script>
<script>
    // Show/hide back to top button
    window.addEventListener('scroll', function() {
        var btn = document.getElementById('backToTop');
        if (window.scrollY > 200) {
            btn.classList.add('show');
        } else {
            btn.classList.remove('show');
        }
    });
    // Smooth scroll to top
    document.getElementById('backToTop').addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
</script>
@endsection