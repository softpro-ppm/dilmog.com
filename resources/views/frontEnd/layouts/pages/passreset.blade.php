@extends('frontEnd.layouts.master')
@section('title','Forget Password')
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
.container .merchant-logo {
    padding: 0px 0px 0 !important;
    margin: 0 !important;
}
.center-flex {
    display: flex;
    align-items: center;
    justify-content: center;
    /* min-height: 100vh; */
    height: 100%;
    padding: 20px;
    margin: 0;
    box-sizing: border-box;
    position: relative;
    z-index: 1;
}
.reset-card {
    background: #fff;
    color: #111;
    max-width: 450px;
    width: 100%;
    box-shadow: 0 2px 16px rgba(0,0,0,0.12);
    padding: 32px 24px;
    margin: auto;
    /* border-radius: 8px; */
}
.reset-card h1 {
    font-size: 2.1rem;
    font-weight: 700;
    margin-bottom: 18px;
    color: #111;
}
.reset-card .subhead {
    font-size: 1.1rem;
    margin-bottom: 18px;
    color: #222;
}
.reset-card .radio-group {
    margin-bottom: 18px;
}
.reset-card .radio-group label {
    display: flex;
    align-items: center;
    font-size: 1.1rem;
    margin-bottom: 8px;
    cursor: pointer;
}
.reset-card .radio-group input[type="radio"] {
    accent-color: #111;
    width: 22px;
    height: 22px;
    margin-right: 10px;
}
.reset-card .instruction {
    margin-bottom: 18px;
    color: #222;
    font-size: 1rem;
}
.reset-card .form-group {
    margin-bottom: 0;
}
.reset-card input[type="text"] {
    width: 100%;
    height: 52px;
    font-size: 1.1rem;
    padding: 0 16px;
    border: 2px solid #ccc;
    border-radius: 7px;
    background: #fff;
    color: #111;
    margin-bottom: 0;
    transition: border-color 0.2s;
}
.reset-card input[type="text"]:focus {
    border-color: #e50914;
    outline: none;
}
.reset-card input[type="text"].is-invalid {
    border-color: #e50914;
}
.reset-card .error-message {
    color: #e50914;
    font-size: 1rem;
    margin-top: 7px;
    margin-bottom: 18px;
    display: flex;
    align-items: center;
    gap: 6px;
}
.reset-card .error-message i {
    font-size: 1.1em;
}
.reset-card .submit-btn {
    width: 100%;
    height: 52px;
    background: #015fc9 !important;
    color: #fff !important;
    border: none !important;
    border-radius: 7px;
    font-size: 1.2rem;
    font-weight: 700;
    margin: 18px 0 12px 0;
    cursor: pointer;
    transition: background 0.2s;
}
.reset-card .submit-btn:hover {
    background: #0151ab !important;
    color: #fff !important;
}
.reset-card .help-link {
    display: block;
    text-align: left;
    color: #111;
    text-decoration: underline;
    font-size: 1rem;
    margin-top: 18px;
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
    }
    body::before {
        display: none !important;
    }
    .center-flex {
        min-height: 100%;
        padding: 16px;
        align-items: flex-start;
        background: #000 !important;
    }
    .reset-card {
        padding: 24px 16px;
        margin: 0;
        max-width: 100% !important;
        /* border-radius: 4px; */
    }
    .merchant-logo {
        padding: 0px 0px 0 !important;
    }
}
header, .footer, .copyright {
    display: none !important;
}

.reset-card input[type="text"]:focus {
    border-color: #015fc9 !important;
}

</style>
<div class="container">
    <div class="merchant-logo">
        <a href="{{ url('/') }}">
            @if(isset($darklogo) && count($darklogo))
                <img src="{{ asset($darklogo[0]->image) }}" alt="Merchant Logo" style=" width:auto; display:block;">
            @else
                <img src="{{ asset('assets/img/logo.png') }}" alt="Merchant Logo" style="width:auto; display:block;">
            @endif
        </a>
    </div>
</div>
<div class="center-flex">
    <div class="reset-card">
        <h1><strong>Update password</strong></h1>
        <div class="subhead">No worries! Simply enter your email below.</div>
        <!-- <div class="radio-group">
            <label><input type="radio" name="reset_method" checked disabled> Email</label>
            <label><input type="radio" name="reset_method" disabled> Text Message (SMS)</label>
        </div> -->
        <div class="instruction">We'll send you an OTP to create a new password.</div>
        <form action="{{url('auth/merchant/password/reset')}}" method="post" class="contact-wthree-do">
            @csrf
            <div class="form-group">
                <input class="form-control contact-formquickTechls{{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" value="{{old('email')}}" placeholder="Email" name="email" required="">
            </div>
            @if ($errors->has('email'))
                <div class="error-message"><i class="fa fa-times-circle"></i> {{ $errors->first('email') }}</div>
            @endif
            <button type="submit" class="submit-btn">Email Me</button>
        </form>
        <div style="text-align:center; margin-top: 18px; font-size: 1.1rem; color: #222;">
            <span>Back to </span><a href="{{ url('merchant/login') }}" style="text-decoration: underline; color: #222; font-weight: 500;">Sign In</a>
        </div>
    </div>
</div>
@endsection