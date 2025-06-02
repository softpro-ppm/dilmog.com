@extends('frontEnd.layouts.master')
@section('title','Login') 
@section('content')
<!-- Spinner Loader Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner Loader End -->
<!-- Updated Netflix-style design -->
<style>
body {
    background: url('/logo/login_bg.jpg') no-repeat center center fixed;
    background-size: cover;
    color: #fff;
    font-family: Arial, sans-serif;
}
.middle-header {
        transition: none;
        display: none;
    }
    .footer {
    background: var(--bs-dark);
    display: none;
}
.copyright {
    display: none;
}
.login-container {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    min-height: 100vh;
    padding-top: 60px;
}
.glass-card {
    background: rgba(0,0,0,0.65);
    border-radius: 4px;
    padding: 48px 40px 36px 40px;
    width: 100%;
    max-width: 400px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.5);
    display: flex;
    flex-direction: column;
    align-items: center;
}
.glass-card h2 {
    color: #fff;
    font-size: 32px;
    font-weight: 700;
    text-align: left;
    width: 100%;
    margin-bottom: 28px;
    letter-spacing: 0.5px;
}
.glass-card form {
    width: 100%;
}
.glass-card .form-group {
    width: 100%;
    margin-bottom: 18px;
}
.glass-card input[type="email"],
.glass-card input[type="text"],
.glass-card input[type="password"] {
    width: 100%;
    padding: 14px 16px;
    background: #333;
    border: none;
    border-radius: 4px;
    color: #fff;
    font-size: 16px;
    margin-bottom: 0;
    outline: none;
    box-sizing: border-box;
}
.glass-card input[type="email"]::placeholder,
.glass-card input[type="text"]::placeholder,
.glass-card input[type="password"]::placeholder {
    color: #8c8c8c;
    font-size: 15px;
}
.glass-card .submit {
    width: 100%;
    padding: 14px 0;
    background: #015fc9;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 18px;
    font-weight: 700;
    margin-top: 10px;
    margin-bottom: 16px;
    cursor: pointer;
    transition: background 0.2s;
    letter-spacing: 0.5px;
}
.glass-card .submit:hover {
    background: #114d91;
}
.glass-card .or-divider {
    width: 100%;
    text-align: center;
    color: #b3b3b3;
    margin: 18px 0 16px 0;
    font-size: 15px;
    font-weight: 500;
    letter-spacing: 0.5px;
}
.glass-card .alt-btn {
    width: 100%;
    padding: 12px 0;
    background: #333;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    font-weight: 500;
    margin-bottom: 16px;
    cursor: pointer;
    transition: background 0.2s;
}
.glass-card .alt-btn:hover {
    background: #444;
}
.glass-card .options-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 10px;
    font-size: 15px;
    color: #b3b3b3;
}
.glass-card .options-row label {
    display: flex;
    align-items: center;
    gap: 6px;
    font-weight: 400;
    margin-bottom: 0;
}
.glass-card .options-row a {
    color: #b3b3b3;
    text-decoration: none;
    font-size: 15px;
    transition: color 0.2s;
}
.glass-card .options-row a:hover {
    text-decoration: underline;
    color: #fff;
}
.glass-card .register-link {
    color: #b3b3b3;
    font-size: 15px;
    margin-top: 18px;
    text-align: left;
    width: 100%;
}
.glass-card .register-link a {
    color: #fff;
    font-weight: 500;
    text-decoration: none;
    margin-left: 4px;
}
.glass-card .register-link a:hover {
    text-decoration: underline;
}
.back-to-top-btn {
    position: fixed;
    right: 30px;
    bottom: 30px;
    width: 56px;
    height: 56px;
    background: #0066d9;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    box-shadow: 0 4px 16px rgba(0,102,217,0.18);
    z-index: 9999;
    transition: opacity 0.3s, visibility 0.3s;
    opacity: 0;
    visibility: hidden;
    text-decoration: none;
}
.back-to-top-btn.show {
    opacity: 1;
    visibility: visible;
    display: flex !important;
}
.back-to-top-btn:hover {
    background: #004ea8;
    color: #fff;
}
</style>
<div class="login-container">
    <div class="glass-card">
        <h2 class="text-center">Merchant Login</h2>
        <form action="{{ url('merchant/login') }}" method="POST" id="loginForm">
            @csrf
            <div class="form-group">
                <input type="text" name="phoneOremail" class="form-control" required placeholder="Email or mobile number" />
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" required placeholder="Password" />
            </div>
            <button type="submit" class="submit">Sign In</button>
            <div class="or-divider">OR</div>
            <button type="button" class="alt-btn" disabled>Use a sign-in code</button>
            <div class="options-row">
                <label><input type="checkbox" name="remember" style="margin-right:6px;"> Remember me</label>
                <a href="{{ url('merchant/forget/password') }}">Forgot password?</a>
            </div>
            <div class="register-link">New to Dilmog? <a href="{{ url('merchant/register') }}">Sign up now.</a></div>
        </form>
    </div>
</div>
<!-- Scroll to Top Button Start -->
<a href="#" id="backToTop" class="back-to-top-btn" style="display:none;"><i class="fa fa-arrow-up"></i></a>
<!-- Scroll to Top Button End -->
@endsection

@section('custom_js_script')
    <script>
        $(document).ready(function () {
            @if(!empty($globNotice))
                $('#globalNoticeModal').modal('show');
            @endif
        });
    </script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script>
        @if(config('google_captcha.site_key'))
            $("#loginForm").on('submit', function (e) {
                if (grecaptcha.getResponse() === '') {
                    event.preventDefault(); // Stop form from submitting
                    e.preventDefault();
                    $("#gcaptcha-error").html('Please complete the captcha');
                    $("#gcaptcha-error").show();
                }     
            });
        @endif
    </script>
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