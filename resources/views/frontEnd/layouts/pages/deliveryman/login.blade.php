@extends('frontEnd.layouts.master')
@section('title','Supporting Deliveryman Login | Dilmog Logistics')
@section('content')
<!-- Spinner Loader Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner Loader End -->
<style>
html, body {
    overflow-x: hidden;
    background: url('/logo/login_bg.jpg') no-repeat center center fixed;
    background-size: cover;
    color: #fff;
    font-family: Arial, sans-serif;
    height: 100%;
    margin: 0;
    padding: 0;
    position: relative;
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
    align-items: center;
    /* min-height: 100vh; */
    height: 100%;
    padding: 20px;
    margin: 0;
    box-sizing: border-box;
    position: relative;
    z-index: 1;
}
.glass-card {
    background: rgba(0,0,0,0.65);
    border-radius: 4px;
    padding: 32px 24px;
    width: 100%;
    max-width: 400px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.5);
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: auto;
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
    margin-bottom: 12px;
}
.glass-card input[type="email"],
.glass-card input[type="text"],
.glass-card input[type="password"] {
    width: 100%;
    padding: 14px 16px;
    background: #333;
    border: 1.5px solid #cfd8dc;
    border-radius: 6px;
    color: #fff;
    font-size: 16px;
    margin-bottom: 0;
    outline: none;
    box-sizing: border-box;
    transition: border-color 0.2s, box-shadow 0.2s;
    box-shadow: none;
    height: 48px;
}
.glass-card input[type="email"]:focus,
.glass-card input[type="text"]:focus,
.glass-card input[type="password"]:focus {
    border-color: #1976d2;
    outline: none;
    box-shadow: 0 0 0 2px #1976d233;
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
    background: #0151ab;
    color: #fff;
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
.merchant-logo {
    width: 100%;
    display: flex;
    /* align-items: center;
    justify-content: center; */
    padding-top: 0 !important;
    padding-bottom: 0 !important;
    position: static;
    background: none;
    box-shadow: none;
    z-index: 10;
    margin-top:  !important;
}
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
        min-height: 100%;
        height: 100%;
        padding: 16px;
        align-items: center;
        background: #000 !important;
        overflow: hidden;
    }
    .glass-card {
        padding: 24px 16px;
        margin: 0;
        background: rgba(0,0,0,0.85) !important;
        max-height: calc(100vh - 32px);
        overflow-y: auto;
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
@media (min-width: 601px) {
    html, body {
        margin: 0 !important;
        padding: 0 !important;
    }
    .merchant-logo {
        margin-top: 0 !important;
        padding-top: 0 !important;
        padding-bottom: 0 !important;
    }
    .login-container {
        margin-top: 0 !important;
        padding-top: 0 !important;
    }
}
</style>
<div class="container">
    <div class="merchant-logo" style="padding: 48px 0 0 0;">
        <a href="{{ url('/') }}">
            @if(isset($darklogo) && count($darklogo))
                <img src="{{ asset($darklogo[0]->image) }}" alt="Deliveryman Logo" style="max-height:32px; width:auto; display:block;">
            @else
                <img src="{{ asset('assets/img/logo.png') }}" alt="Deliveryman Logo" style="max-height:32px; width:auto; display:block;">
            @endif
        </a>
    </div>
</div>
<div class="login-container">
    <div class="glass-card">
        <h2 class="">Deliveryman Login</h2>
        <form action="{{url('auth/deliveryman/login')}}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" placeholder="Email Address " id="email" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="email" required data-error="Please enter your Email">
                <div class="help-block with-errors"></div>
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <input type="password" placeholder="Password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required data-error="Please enter your Password">
                <div class="help-block with-errors"></div>
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="options-row">
                <label><input type="checkbox" name="rememberme" id="rememberme" style="margin-right:6px;"> Remember me</label>
                <a href="{{url('deliveryman/forget/password')}}">Forgot password?</a>
            </div>
            <button type="submit" class="submit">Login Now</button>
        </form>
    </div>
</div>
<a href="#" id="backToTop" class="back-to-top-btn" style="display:none;"><i class="fa fa-arrow-up"></i></a>
@endsection
