@extends('frontEnd.layouts.master')
@section('title','Login') 
@section('content')
<!-- Glassmorphism Login Form (CodePen-inspired) -->
<style>
body {
    background: #f8f9fa url('https://i.postimg.cc/W11cDBzH/desk.jpg') no-repeat center center fixed;
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
    background: rgba(255, 255, 255, 0.15);
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.17);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    border-radius: 20px;
    border: 1px solid rgba(219, 0, 34, 0.18);
    padding: 40px 30px 30px 30px;
    max-width: 400px;
    width: 100%;
}
.glass-card h2 {
    color: #db0022;
    font-weight: 700;
    margin-bottom: 30px;
    text-align: center;
}
.glass-card .form-group {
    margin-bottom: 20px;
}
.glass-card input[type="email"],
.glass-card input[type="password"] {
    width: 100%;
    padding: 12px 15px;
    border-radius: 10px;
    border: 2px solid #e0e0e0;
    background: rgba(255,255,255,0.7);
    margin-bottom: 10px;
    font-size: 16px;
    outline: none;
    transition: border 0.2s, box-shadow 0.2s;
}
.glass-card input[type="email"]:focus,
.glass-card input[type="password"]:focus {
    border: 2px solid #db0022;
    box-shadow: 0 0 0 2px #db0022;
}
.glass-card .submit, .glass-card .btn-primary {
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
.glass-card .submit:hover, .glass-card .btn-primary:hover {
    background: #f8f9fa;
    color: #222;
    border: 1px solid #222;
}
.glass-card .forgot {
    display: block;
    text-align: right;
    margin-top: 10px;
    color: #db0022;
    text-decoration: none;
    font-size: 14px;
}
.glass-card .forgot:hover {
    text-decoration: underline;
}
@media (max-width: 500px) {
    .glass-card {
        padding: 30px 10px;
    }
}
</style>
<div class="login-container">
    <div class="glass-card">
        <h2>Merchant Login</h2>
        <form action="{{ url('merchant/login') }}" method="POST" id="loginForm">
            @csrf
            <div class="form-group">
                <input type="email" name="phoneOremail" class="form-control" required placeholder="Email" />
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" required placeholder="Password" />
            </div>
            <div class="form-group">
                @if(config('google_captcha.site_key'))
                    <div class="g-recaptcha" data-sitekey="{{ config('google_captcha.site_key') }}"></div>
                    @error('g-recaptcha-response')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="alert alert-danger" id="gcaptcha-error" style="display: none"></div>
                @endif
            </div>
            <button type="submit" class="submit">Login</button>
            <a href="{{ url('merchant/forget/password') }}" class="forgot">Forget Password?</a>
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
@endsection