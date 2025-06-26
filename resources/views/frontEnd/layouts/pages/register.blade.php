@extends('frontEnd.layouts.master') @section('title', 'Merchant Registration | Dilmog Logistics')
@section('title','Merchant Registration | Dilmog Logistics') 
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
html, body {
    overflow-x: hidden;
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
    padding-top: 0;
    margin-top: 0 !important;
}
.glass-card {
    background: rgba(0,0,0,0.65);
    border-radius: 4px;
    padding: 48px 40px 36px 40px;
    width: 100%;
    max-width: 700px;
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
.glass-card input[type="email"],
.glass-card input[type="text"],
.glass-card input[type="password"],
.glass-card input[type="tel"] {
    background: #333;
    color: #fff;
    border: 1.5px solid #cfd8dc;
    border-radius: 6px;
    font-size: 16px;
    padding: 12px 14px;
    margin-bottom: 0;
    transition: border-color 0.2s, box-shadow 0.2s;
    box-shadow: none;
    height: 48px;
    width: 100%;
    box-sizing: border-box;
}
.glass-card input[type="email"]:focus,
.glass-card input[type="text"]:focus,
.glass-card input[type="password"]:focus,
.glass-card input[type="tel"]:focus {
    border-color: #1976d2;
    outline: none;
    box-shadow: 0 0 0 2px #1976d233;
}
.glass-card .form-group {
    margin-bottom: 12px;
}
.glass-card .form-check-label {
    color: #fff;
}
.glass-card .submit {
    width: 100%;
    height: 48px;
    padding: 0;
    background: #015fc9;
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: 18px;
    font-weight: 700;
    margin-top: 0;
    margin-bottom: 0;
    cursor: pointer;
    transition: background 0.2s;
    letter-spacing: 0.5px;
    display: inline-block;
    box-sizing: border-box;
    vertical-align: middle;
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
    /* align-items: center; */
    /* justify-content: center; */
    padding: 24px 0 0 0;
    position: static;
    background: none;
    box-shadow: none;
    z-index: 10;
    margin-top: 0 !important;
    padding-top: 0 !important;
    padding-bottom: 0 !important;
}
.merchant-logo img {
    /* max-width: 140px; */
    height: auto;
    display: block;
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
    .glass-card input[type="password"],
    .glass-card input[type="tel"] {
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
    .glass-card input[type="password"]:focus,
    .glass-card input[type="tel"]:focus {
        border-color: #e50914 !important;
        outline: none !important;
    }
    .merchant-logo {
        justify-content: flex-start !important;
        padding: 0 0 0px 0 !important;
    }
    .merchant-logo img {
        margin-top: 5px !important;
        max-height: 48px !important;
    }
    .glass-card h2 {
        color: #fff !important;
        font-size: 2rem !important;
        font-weight: 700 !important;
        margin-bottom: 20px !important;
        text-align: left !important;
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
    .intl-tel-input {
        width: 100% !important;
    }
    .intl-tel-input .flag-container,
    .intl-tel-input .selected-flag {
        height: 48px !important;
        display: flex !important;
        align-items: center !important;
        padding: 0 8px !important;
        background: #181818 !important;
        border-radius: 8px 0 0 8px !important;
        border: none !important;
    }
    .intl-tel-input .selected-flag {
        border: 1.5px solid #444 !important;
        border-right: none !important;
    }
    .intl-tel-input input[type="tel"] {
        width: 100% !important;
        min-width: 0 !important;
        max-width: 100% !important;
        height: 48px !important;
        line-height: 48px !important;
        font-size: 1rem !important;
        padding: 0 64px !important;
        box-sizing: border-box !important;
        margin-bottom: 10px !important;
        background: #181818 !important;
        color: #fff !important;
        border: 1.5px solid #444 !important;
        border-radius: 8px !important;
        transition: border-color 0.2s;
    }
    .intl-tel-input input[type="tel"]::placeholder {
        color: #aaa !important;
        line-height: 48px !important;
        opacity: 1 !important;
    }
    .intl-tel-input input[type="tel"]:focus {
        border-color: #e50914 !important;
        outline: none !important;
    }
    .iti input, .iti input[type=text], .iti input[type=tel] {
        padding-left: 50px !important;
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
                <img src="{{ asset($darklogo[0]->image) }}" alt="Merchant Logo" style="max-height:32px; width:auto; display:block;">
            @else
                <img src="{{ asset('assets/img/logo.png') }}" alt="Merchant Logo" style="max-height:32px; width:auto; display:block;">
            @endif
        </a>
    </div>
</div>
    
<div class="login-container">
    <div class="glass-card">
        <h2 class="">Merchant Register</h2>
        <form action="{{ url('auth/merchant/register') }}" method="POST" id="registerForm">
            @csrf
            <div class="row">
                <div class="form-group col-12 col-sm-6">
                    <input type="email" class="form-control" required id="email_data" name="emailAddress" placeholder="Email" value="{{ old('emailAddress') }}" />
                </div>
                <div class="form-group col-12 col-sm-6 d-flex align-items-end">
                    <button type="button" class="submit w-100" id="sent_mail">Get OTP</button>
                </div>
                <div id="emailError" class="col-12"></div>
                <div class="form-group col-12 col-sm-6">
                    <input type="tel" name="otp" id="otp_val" class="form-control" pattern="[0-9]{6}" placeholder="OTP" readonly required value="" />
                </div>
                <div class="form-group col-12 col-sm-6">
                    <input type="text" class="form-control" required id="companyName_val" name="companyName" placeholder="Name of Business" readonly value="{{ old('companyName') }}" />
                </div>
                <div class="form-group col-12 col-sm-6">
                    <input type="text" name="firstName" id="firstName_val" class="form-control" placeholder="Your Name" required readonly />
                </div>
                <div class="form-group col-12 col-sm-6">
                    <input type="tel" name="phoneNumber" id="phoneNumber_val" class="form-control" placeholder="Enter your phone number" required readonly />
                </div>
                <div class="form-group col-12 col-sm-6">
                    <input type="password" name="password" class="form-control" id="password_val" required placeholder="Password" readonly />
                </div>
                <div class="form-group col-12 col-sm-6">
                    <input type="password" name="confirmed" id="confirmed_val" class="form-control" required placeholder="Confirm Password" readonly />
                </div>
                <div class="form-group col-12">
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" value="1" name="agree" required />
                        <label class="form-check-label" for="exampleCheck1">I agree to <a href="{{ url('termscondition') }}">terms and condition.</a></label>
                    </div>
                </div>
                <div class="form-group col-12">
                    <button type="submit" class="submit w-100" id="dubmit_data" disabled>Register</button>
                </div>
            </div>
        </form>
        <div class="register-link">
            Already have an account? <a href="{{ url('merchant/login') }}">Login here</a>
        </div>
    </div>
</div>
@endsection

@section('custom_js_script')

<!-- intl-tel-input CSS/JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.1.1/css/intlTelInput.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.1.1/js/intlTelInput.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Company name uppercase
        let input = document.getElementById("companyName_val");
        if (input) {
            input.placeholder = input.placeholder.toUpperCase();
            input.addEventListener("input", function () {
                this.value = this.value.toUpperCase();
            });
        }

        // intl-tel-input for phone number (Nigeria only)
        var phoneInput = document.querySelector("#phoneNumber_val");
        if (phoneInput && window.intlTelInput) {
            var iti = window.intlTelInput(phoneInput, {
                initialCountry: "ng", // Nigeria
                onlyCountries: ["ng"],
                nationalMode: true,
                formatOnDisplay: true,
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.1.1/js/utils.js"
            });

            // Custom formatting for Nigerian numbers: 0806 833 4781
            phoneInput.addEventListener('input', function() {
                let value = phoneInput.value.replace(/\D/g, '');
                if (value.length > 11) value = value.substring(0, 11);
                let formatted = value;
                if (value.length > 4 && value.length <= 7) {
                    formatted = value.substring(0, 4) + ' ' + value.substring(4);
                } else if (value.length > 7) {
                    formatted = value.substring(0, 4) + ' ' + value.substring(4, 7) + ' ' + value.substring(7);
                }
                phoneInput.value = formatted;
            });
        }
    });
</script>

    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script>
        @if (config('google_captcha.site_key'))
            $("#registerForm").on('submit', function(e) {
                if (grecaptcha.getResponse() === '') {
                    event.preventDefault(); // Stop form from submitting
                    e.preventDefault();
                    $("#gcaptcha-error").html('Please complete the captcha');
                    $("#gcaptcha-error").show();
                    // alert('Please complete the reCAPTCHA.');
                }
            });
        @endif


        $(document).on("contextmenu", function(event) {
            event.preventDefault(); // Prevent the default right-click context menu
            //alert("Right-click is disabled on this page.");
        });

        $(document).ready(function() {
            $("#sent_mail").click(function(event) {
                event.preventDefault(); // Prevent default form submission
                var email = $('#email_data').val().trim(); // Get the email input value and trim spaces

                if (email !== '') {
                    $.ajax({
                        url: "{{ url('merchant/register-otp') }}", // Adjust this URL as needed
                        type: 'GET',
                        data: {
                            email: email
                        },
                        success: function(res) {
                            // console.log(res.message);
                            if (res.message != '') {
                                //$('#emailError').html("<span style='color:green'>"+ res.message +"</span>"); // Show error message

                                $('#emailError').html(
                                    "<div class='alert alert-warning' role='alert'><span style='color:#664d03'><i class='fa fa-envelope-o' aria-hidden='true'></i> A One-Time Password (OTP) has been sent to your email address. Please enter the OTP below to continue with your merchant registration. Check your spam folder if you don't see an email.</span></div>"
                                    ); // Show error message
                                $("#otp_val").removeAttr("readonly");
                                $("#sent_mail").html('Resend');
                            } else {
                                $('#emailError').html(
                                    "<div class='alert alert-danger' role='alert'><span style='color:#664d03'>Please enter a valid email address.</span></div>"
                                    );
                                $('#emailError').html(
                                    '<span style="color:red">Failed to process response. Please try again.</span>'
                                    ); // Show error message

                            }
                        },
                    });
                } else {
                    $('#emailError').html(
                        "<div class='alert alert-danger' role='alert'><span style='color:#664d03'>Please enter a valid email address.</span></div>"
                        ); // Show error message
                }
            });

            $("#otp_val").on("input", function() {
                var email = $('#email_data').val(); //.trim(); // Trim email input value
                var otp_val = $('#otp_val').val(); //.trim(); // Trim OTP input value

                // Only proceed if the email is not empty and OTP is entered
                if (email !== '' && otp_val.length === 6) {
                    $.ajax({
                        url: "{{ url('merchant/register-verifyOtp') }}", // Ensure this URL is correct
                        type: 'GET',
                        data: {
                            email: email,
                            otp: otp_val
                        },
                        success: function(res) { // Corrected 'succsess' to 'success'
                            if (res.status === 'true') {
                                //$("#otp_val").removeAttr("readonly"); // Remove readonly if OTP is valid
                                $('#emailError').html(
                                    "<div class='alert alert-success' role='alert'><span style='color:#664d03'>OTP verified successfully.</span></div>"
                                    );
                                    $("#phoneNumber_val").prop("readonly", false);
                                    $("#companyName_val").prop("readonly", false);
                                    $("#firstName_val").prop("readonly", false);
                                    $("#password_val").prop("readonly", false);
                                    $("#confirmed_val").prop("readonly", false);
                                    $("#dubmit_data").prop("disabled", false);
                            } else {
                                $('#emailError').html(
                                    "<div class='alert alert-danger' role='alert'><span style='color:#664d03'>" +
                                    res.message + "</span></div>");
                            }
                        },
                        error: function(xhr, status, error) {
                            //console.error('Error during AJAX request:', error);
                            $('#emailError').html(
                                "<div class='alert alert-danger' role='alert'><span style='color:#664d03'>An error occurred while verifying the OTP.</span></div>"
                                );
                        }
                    });
                } else if (otp_val.length !== 6) {
                    $('#emailError').html(
                        "<div class='alert alert-danger' role='alert'><span style='color:#664d03'>Please enter a valid 6-digit OTP.</span></div>"
                        );
                } else {
                    $('#emailError').html(
                        "<div class='alert alert-danger' role='alert'><span style='color:#664d03'>Please enter a valid email address.</span></div>"
                        );
                }
            });


            if ('OTPCredential' in window) {
                window.addEventListener('DOMContentLoaded', e => {
                    const input = document.querySelector('input[name="otp"]');
                    const ac = new AbortController();
                    navigator.credentials.get({
                        otp: {
                            transport: ['sms']
                        },
                        signal: ac.signal
                    }).then(otp => {
                        input.value = otp.code;
                    }).catch(err => {
                        // console.log(err); // Remove or comment out for production
                    });
                });
            }

        });
    </script>

    <!-- Spinner hide logic (LifeSure style) -->
    <script>
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
            if (btn) {
                if (window.scrollY > 200) {
                    btn.classList.add('show');
                } else {
                    btn.classList.remove('show');
                }
            }
        });
        // Smooth scroll to top
        var backToTopBtn = document.getElementById('backToTop');
        if (backToTopBtn) {
            backToTopBtn.addEventListener('click', function(e) {
                e.preventDefault();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }
    </script>
@endsection
