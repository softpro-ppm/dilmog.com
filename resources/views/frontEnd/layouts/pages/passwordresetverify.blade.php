@extends('frontEnd.layouts.master')
@section('title','Password Reset Verify')
@section('content')
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
.glass-card input[type="text"]:focus,
.glass-card input[type="password"]:focus {
    border-color: #1976d2;
    outline: none;
    box-shadow: 0 0 0 2px #1976d233;
}
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
.merchant-logo img {
    margin-top: 5px !important;
    max-height: 48px !important;
}
@media (max-width: 600px) {
    html, body {
        height: 100%;
        overflow-y: auto;
        -webkit-overflow-scrolling: touch;
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
    .merchant-logo {
        padding: 0px 0px 0 !important;
    }
    .merchant-logo img {
        max-height: 48px !important;
    }
    .glass-card input[type="text"],
    .glass-card input[type="password"] {
        width: 100% !important;
        min-width: 0 !important;
        max-width: 100% !important;
        height: 44px !important;
        font-size: 1rem !important;
        padding: 0 16px !important;
        box-sizing: border-box !important;
        margin-bottom: 8px !important;
        background: #181818 !important;
        color: #fff !important;
        border: 1.5px solid #444 !important;
        border-radius: 8px !important;
    }
    .glass-card .submit {
        height: 44px !important;
        margin-top: 8px !important;
        margin-bottom: 12px !important;
    }
    .glass-card .form-group {
        margin-bottom: 8px !important;
    }
    .glass-card h2 {
        font-size: 24px !important;
        margin-bottom: 20px !important;
    }
}
</style>
<div class="container">
    <div class="merchant-logo">
        <a href="{{ url('/') }}">
            @if(isset($darklogo) && count($darklogo))
                <img src="{{ asset($darklogo[0]->image) }}" alt="Merchant Logo" style="max-height:48px; width:auto; display:block;">
            @else
                <img src="{{ asset('assets/img/logo.png') }}" alt="Merchant Logo" style="max-height:48px; width:auto; display:block;">
            @endif
        </a>
    </div>
</div>
<div class="login-container">
    <div class="glass-card">
        <h2>Merchant Password Reset</h2>
        <form action="{{url('auth/merchant/reset/password')}}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" placeholder="Verification Code" class="form-control{{ $errors->has('verifyPin') ? ' is-invalid' : '' }}" name="verifyPin" value="{{old('verifyPin')}}" required>
                @if ($errors->has('verifyPin'))
                    <div class="error-message"><i class="fa fa-times-circle"></i> {{ $errors->first('verifyPin') }}</div>
                @endif
            </div>
            <div class="form-group">
                <input type="password" placeholder="New Password" class="form-control{{ $errors->has('newPassword') ? ' is-invalid' : '' }}" name="newPassword" required>
                @if ($errors->has('newPassword'))
                    <div class="error-message"><i class="fa fa-times-circle"></i> {{ $errors->first('newPassword') }}</div>
                @endif
            </div>
            <button type="submit" class="submit">Reset Password</button>
        </form>
        <div style="text-align:center; margin-top: 18px; font-size: 1.1rem; color: #fff;">
            <span>Back to </span><a href="{{ url('merchant/login') }}" style="text-decoration: underline; color: #fff; font-weight: 500;">Sign In</a>
        </div>
    </div>
</div>
@endsection