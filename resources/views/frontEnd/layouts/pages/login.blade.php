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
<!-- Glassmorphism Login Form (CodePen-inspired) -->
<style>
body {
    background: url('https://i.postimg.cc/W11cDBzH/desk.jpg') no-repeat center center fixed;
    background-size: cover;
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
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}
.glass-card {
    background: rgba(255, 255, 255, 0.10);
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.17);
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    border-radius: 20px;
    border: 1.5px solid #fff;
    padding: 40px 30px 30px 30px;
    max-width: 400px;
    width: 100%;
    position: relative;
}
.glass-card h2 {
    color: #fff;
    font-weight: 700;
    margin-bottom: 30px;
    text-align: center;
    font-size: 2.2rem;
    letter-spacing: 1px;
}
.form-group {
    position: relative;
    margin-bottom: 28px;
}
.form-group input {
    width: 100%;
    padding: 12px 40px 12px 16px;
    border: none;
    border-bottom: 1.5px solid #fff;
    background: transparent;
    color: #fff;
    font-size: 16px;
    outline: none;
    border-radius: 0;
    box-shadow: none;
    transition: border-color 0.2s;
}
.form-group input:focus {
    border-bottom: 2px solid #fff;
    background: transparent;
}
.form-group .input-icon {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #fff;
    font-size: 18px;
    pointer-events: none;
}
.glass-card .options-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 18px;
    font-size: 15px;
    color: #fff;
}
.glass-card .options-row label {
    margin-bottom: 0;
    color: #fff;
    font-weight: 400;
}
.glass-card .options-row a {
    color: #fff;
    text-decoration: underline;
    font-size: 15px;
}
.glass-card .submit {
    background: #fff;
    color: #222;
    border-radius: 30px;
    font-weight: bold;
    font-size: 18px;
    padding: 12px 0;
    border: none;
    width: 100%;
    box-shadow: none;
    text-align: center;
    transition: background 0.2s, color 0.2s, border 0.2s;
    display: block;
    margin: 0 auto 10px auto;
    letter-spacing: 0.5px;
}
.glass-card .submit:hover {
    background: #f8f9fa;
    color: #222;
    border: 1px solid #222;
}
.glass-card .register-link {
    color: #fff;
    text-align: center;
    margin-top: 18px;
    font-size: 15px;
}
.glass-card .register-link a {
    color: #fff;
    text-decoration: underline;
    font-weight: 600;
}
::-webkit-input-placeholder { color: #fff; opacity: 0.8; }
::-moz-placeholder { color: #fff; opacity: 0.8; }
:-ms-input-placeholder { color: #fff; opacity: 0.8; }
::placeholder { color: #fff; opacity: 0.8; }
</style>
<div class="login-container">
    <div class="glass-card">
        <h2>Login</h2>
        <form action="{{ url('merchant/login') }}" method="POST" id="loginForm">
            @csrf
            <div class="form-group">
                <input type="email" name="phoneOremail" class="form-control" required placeholder="Email" />
                <span class="input-icon"><i class="fa fa-envelope"></i></span>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" required placeholder="Password" />
                <span class="input-icon"><i class="fa fa-lock"></i></span>
            </div>
            <div class="options-row">
                <label><input type="checkbox" name="remember" style="margin-right:6px;"> Remember me</label>
                <a href="{{ url('merchant/forget/password') }}">forgot password?</a>
            </div>
            <button type="submit" class="submit">Login</button>
            <div class="register-link">Don't have an account? <a href="{{ url('merchant/register') }}">Register</a></div>
        </form>
    </div>
</div>
@include('frontEnd.layouts._notice_modal')
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
@endsection