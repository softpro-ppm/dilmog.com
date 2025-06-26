@extends('frontEnd.layouts.master')
@section('title', 'P2P')
@section('styles')
    <link rel="stylesheet" href="{{ asset('frontEnd/') }}/css/p2p.css">
    <style>
        .booking-page .select2 {
            /* padding: 10px 12px !important; */
            border-radius: 4px;
            resize: none;
            border: 1px solid #c9d1d5;
            color: #213540;
            display: block;
            width: 100% !important;
            font-size: 1rem;
            line-height: 1.5;
            background-clip: padding-box;
            font-weight: 300;
        }

        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #fff;
            border-radius: 4px;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="url"]:focus,
        input[type="password"]:focus,
        input[type="search"]:focus,
        input[type="number"]:focus,
        input[type="tel"]:focus,
        input[type="range"]:focus,
        input[type="date"]:focus,
        input[type="month"]:focus,
        input[type="week"]:focus,
        input[type="time"]:focus,
        input[type="datetime"]:focus,
        input[type="datetime-local"]:focus,
        input[type="color"]:focus,
        textarea:focus {
            outline: none !important;
            color: #595959 !important;
        }

        .select2-container--default .select2-search--dropdown .select2-search__field:focus {
            outline: none !important;
            /* Remove outline on focus */
            color: #595959;
            /* Optional: You can customize the border color on focus */
        }

        .quickTech-price a,
        .quickTech-price ul,
        .quickTech-price ul li,
        .quickTech-price button,
        .quickTech-price input,
        .quickTech-price textarea {
            font-family: 'Poppins', sans-serif;
            font-weight: 400 !important;
        }

        .form-control,
        .contact-form .wpcf7-form-control,
        .contact-form .wpcf7-textarea {
            background: #fff !important;
        }

        .booking-parcel-info h6 {
            font-size: 14px !important;
            font-weight: 500 !important;
            color: #535050 !important;
            font-family: 'Poppins' !important;
        }
        .header-banner {
            background-image: url('/assets/img/bg-breadcrumb.jpg');
            background-size: cover;
            background-position: center;
            height: 75vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .header-banner .banner-title {
            color: #fff;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        .header-banner .banner-desc {
            color: #e0e0e0;
            font-size: 1.2rem;
            margin-bottom: 0;
        }
        .stepper { gap: 0.5rem; }
        .step-circle { width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.25rem; font-weight: 600; }
        .step-label { font-size: 1rem; font-weight: 500; }
        .step.active .step-circle, .step .step-circle.bg-primary { background: #db0022 !important; color: #fff !important; }
        .step-line { height: 4px; min-width: 30px; border-radius: 2px; }
        .invalid-feedback { display: none; color: #dc3545; font-size: 0.95rem; }
        input:invalid, select:invalid, textarea:invalid { border-color: #dc3545; }
        @media (max-width: 768px) { .stepper { flex-direction: column; gap: 0.25rem; } .step-line { min-width: 4px; height: 30px; } }
        
        /* ZiDrop Exact Match Styling */
        .step-circle-zidrop {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #e9ecef;
            color: #6c757d;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 600;
            border: 2px solid #e9ecef;
        }
        .step-circle-zidrop.active {
            background: #6f42c1;
            color: white;
            border-color: #6f42c1;
        }
        .step-text-zidrop {
            font-size: 14px;
            color: #6c757d;
            font-weight: 500;
        }
        .step-text-zidrop.active {
            color: #6f42c1;
            font-weight: 600;
        }
        .progress-line-zidrop {
            height: 2px;
            background: #e9ecef;
            border-radius: 1px;
        }
        .progress-line-zidrop.active {
            background: #6f42c1;
        }
        .form-label-zidrop {
            font-weight: 500;
            color: #333;
            margin-bottom: 8px;
            display: block;
            font-size: 14px;
        }
        .form-control-zidrop {
            padding: 12px 16px;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            font-size: 14px;
            width: 100%;
            transition: border-color 0.3s ease;
            background: #fff;
        }
        .form-control-zidrop:focus {
            border-color: #6f42c1;
            outline: none;
            box-shadow: 0 0 0 2px rgba(111, 66, 193, 0.1);
        }
        .form-group-zidrop {
            margin-bottom: 24px;
        }
        .btn-zidrop {
            background: #c41e3a;
            color: white;
            border: none;
            padding: 12px 40px;
            border-radius: 4px;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }
        .btn-zidrop:hover {
            background: #a01729;
            color: white;
        }
        .btn-outline-secondary {
            background: transparent;
            color: #6c757d;
            border: 1px solid #6c757d;
            padding: 12px 24px;
            border-radius: 4px;
            font-weight: 500;
            font-size: 14px;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }
        .btn-outline-secondary:hover {
            background: #6c757d;
            color: white;
        }
        .invalid-feedback {
            display: none;
            color: #dc3545;
            font-size: 12px;
            margin-top: 4px;
        }
        .invalid-feedback.show {
            display: block;
        }
        
        /* Input Group Styling for Nigerian Flag */
        .input-group-text {
            background: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 4px 0 0 4px;
            padding: 12px 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .input-group .form-control-zidrop {
            border-radius: 0 4px 4px 0;
            border-left: none;
        }
        .input-group .form-control-zidrop:focus {
            border-left: 1px solid #6f42c1;
        }
        
        /* Select2 Styling to match ZiDrop */
        .select2-container--default .select2-selection--single {
            height: 45px !important;
            border: 1px solid #e0e0e0 !important;
            border-radius: 4px !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 43px !important;
            padding-left: 16px !important;
            color: #333 !important;
            font-size: 14px !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 43px !important;
            right: 16px !important;
        }
    </style>
@endsection
@section('content')
    <style>

    </style>
    <!-- Breadcrumb -->
    {{-- <div class="breadcrumbs" style="background:#db0022;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <!-- Bread Menu -->
                        <div class="bread-menu">
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="">P2P</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- / End Breadcrumb -->

    <!-- P2P Form Container -->
    <section class="py-5" style="background: #f8f9fa;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <!-- Navigation Tabs -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-0">
                            <div class="d-flex">
                                <a href="{{ url('/') }}" class="flex-fill text-center py-3 text-decoration-none border-end" style="color: #6c757d;">
                                    <i class="fa-solid fa-magnifying-glass me-2"></i>Track Order
                                </a>
                                <div class="flex-fill text-center py-3" style="background: #f8f9fa; color: #6f42c1; font-weight: 600; border-bottom: 3px solid #6f42c1;">
                                    <i class="fa fa-car me-2"></i>Book P2P
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main Form Card -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <form id="shipping-form" class="shipping-form">
                                <input type="hidden" id="totalamount" name="totalamount" value="0">
                                <!-- Progress Steps -->
                                <div class="d-flex justify-content-between align-items-center mb-4 px-3">
                                    <div class="d-flex align-items-center">
                                        <div class="step-circle-zidrop active me-2">1</div>
                                        <span class="step-text-zidrop active">Sender</span>
                                    </div>
                                    <div class="flex-grow-1 mx-3">
                                        <div class="progress-line-zidrop active"></div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="step-circle-zidrop me-2">2</div>
                                        <span class="step-text-zidrop">Recipient</span>
                                    </div>
                                    <div class="flex-grow-1 mx-3">
                                        <div class="progress-line-zidrop"></div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="step-circle-zidrop me-2">3</div>
                                        <span class="step-text-zidrop">Parcel Details</span>
                                    </div>
                                    <div class="flex-grow-1 mx-3">
                                        <div class="progress-line-zidrop"></div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="step-circle-zidrop me-2">4</div>
                                        <span class="step-text-zidrop">Review</span>
                                    </div>
                                </div>                                <!-- Sender Details -->
                                <div class="slide-content" id="step-01" style="display: block;">
                                    <h2 class="mb-4" style="color: #333; font-weight: 600; font-size: 24px;">Sender Details</h2>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group-zidrop">
                                                <label class="form-label-zidrop">Sender Name <span class="text-danger">*</span></label>
                                                <input class="form-control form-control-zidrop" type="text" name="sender_name" id="sender_name" placeholder="Enter sender name">
                                                <div class="invalid-feedback sender_name_error">Sender name required</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group-zidrop">
                                                <label class="form-label-zidrop">Sender Mobile No. <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text" style="background: #fff; border: 1px solid #e0e0e0; padding: 12px 8px;">
                                                        🇳🇬
                                                    </span>
                                                    <input class="form-control form-control-zidrop" name="sender_mobile" id="sender_mobile" placeholder="0802 123 4567" style="border-left: none;">
                                                </div>
                                                <div class="invalid-feedback sender_mobile_error">Sender mobile required, 11 digit, Nigerian number</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group-zidrop">
                                                <label class="form-label-zidrop">Email <span class="text-danger">*</span></label>
                                                <input class="form-control form-control-zidrop" type="email" name="sender_email" id="sender_email" placeholder="Enter sender email">
                                                <div class="invalid-feedback sender_email_error">Sender email required and valid format</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group-zidrop">
                                                <label class="form-label-zidrop">Pickup City <span class="text-danger">*</span></label>
                                                <select class="select2 form-control form-control-zidrop" name="sender_pickupcity" id="sender_pickupcity" required>
                                                    <option value="" selected>Pickup City</option>
                                                    @foreach ($wcities as $key => $value)
                                                        <option value="{{ $value->id }}" data-title="{{ $value->title }}">{{ $value->title }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback sender_pickupcity_error">Sender City Required</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group-zidrop">
                                                <label class="form-label-zidrop">Pickup Town <span class="text-danger">*</span></label>
                                                <select class="select2 form-control form-control-zidrop" name="sender_pickuptown" id="sender_pickuptown" required>
                                                    <option value="" selected>Pickup Town</option>
                                                </select>
                                                <div class="invalid-feedback sender_district_error">Sender Town Required</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group-zidrop">
                                                <label class="form-label-zidrop">Sender Address <span class="text-danger">*</span></label>
                                                <textarea maxlength="200" placeholder="Enter complete pickup address" class="form-control form-control-zidrop" name="sender_address" id="sender_address" rows="3"></textarea>
                                                <div class="invalid-feedback sender_address_error">Sender address required</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end mt-4">
                                        <button type="button" class="btn-zidrop" onclick="senderInfoVerification();">Continue</button>
                                    </div>
                                </div>                                <!-- Recipient Details -->
                                <div class="slide-content" id="step-02" style="display: none;">
                                    <h2 class="mb-4" style="color: #333; font-weight: 600; font-size: 24px;">Recipient Details</h2>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group-zidrop">
                                                <label class="form-label-zidrop">Recipient Name <span class="text-danger">*</span></label>
                                                <input class="form-control form-control-zidrop" type="text" name="recivier_name" id="recivier_name" placeholder="Enter recipient name">
                                                <div class="invalid-feedback recipient_name_error">Recipient Name required</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group-zidrop">
                                                <label class="form-label-zidrop">Recipient Mobile No. <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text" style="background: #fff; border: 1px solid #ddd; padding: 12px 8px;">
                                                        <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMTYiIHZpZXdCb3g9IjAgMCAyNCAxNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjI0IiBoZWlnaHQ9IjE2IiByeD0iMiIgZmlsbD0iIzAwODAwMCIvPgo8cmVjdCB3aWR0aD0iMjQiIGhlaWdodD0iNS4zMzMzMyIgcng9IjIiIGZpbGw9IiNGRkZGRkYiLz4KPC9zdmc+" alt="NG Flag" width="20" height="13" style="margin-right: 4px;">
                                                        🇳🇬
                                                    </span>
                                                    <input class="form-control form-control-zidrop" type="text" name="recivier_mobile" id="recivier_mobile" placeholder="0802 123 4567" style="border-left: none;">
                                                </div>
                                                <div class="invalid-feedback recipient_mobile_error">Recipient mobile required, 11 digit, Nigerian number</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group-zidrop">
                                                <label class="form-label-zidrop">Recipient City <span class="text-danger">*</span></label>
                                                <select class="select2 form-control form-control-zidrop" name="recipient_pickupcity" id="recipient_pickupcity" required>
                                                    <option value="" selected>Delivery City</option>
                                                    @foreach ($wcities as $key => $value)
                                                        <option value="{{ $value->id }}" data-title="{{ $value->title }}">{{ $value->title }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback recipient_pickupcity_error">Recipient City Required</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group-zidrop">
                                                <label class="form-label-zidrop">Recipient Town <span class="text-danger">*</span></label>
                                                <select class="select2 form-control form-control-zidrop" name="recipient_pickuptown" id="recipient_pickuptown" required>
                                                    <option value="" selected>Select Town</option>
                                                </select>
                                                <div class="invalid-feedback recipient_pickuptown_error">Recipient Town Required</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group-zidrop">
                                                <label class="form-label-zidrop">Recipient Address <span class="text-danger">*</span></label>
                                                <textarea maxlength="200" placeholder="Enter complete delivery address" class="form-control form-control-zidrop" name="recivier_address" id="recivier_address" rows="3"></textarea>
                                                <div class="invalid-feedback recipient_address_error">Recipient Address required</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-4">
                                        <button type="button" class="btn btn-outline-secondary" onclick="slideItem('step-01');">Previous</button>
                                        <button type="button" class="btn-zidrop" onclick="recivierInfoVerifaction();">Continue</button>
                                    </div>
                                </div>                                <!-- Parcel Details -->
                                <div class="slide-content" id="step-03" style="display: none;">
                                    <h2 class="mb-4" style="color: #333; font-weight: 600; font-size: 24px;">Parcel Details</h2>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group-zidrop">
                                                <label class="form-label-zidrop">What do you want to send? <span class="text-danger">*</span></label>
                                                <select class="select2 form-control form-control-zidrop" name="parcel_type" id="parcel_type" required>
                                                    <option value="" selected>Select Parcel Type</option>
                                                    <option value="regular">Regular</option>
                                                    <option value="liquid">Liquid</option>
                                                    <option value="fragile">Fragile</option>
                                                </select>
                                                <div class="invalid-feedback parcel_type_error">Parcel type required</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group-zidrop">
                                                <label class="form-label-zidrop">Package weight (KG) <span class="text-danger">*</span></label>
                                                <input class="form-control form-control-zidrop" type="number" step="0.01" min="0.1" name="package_weight" id="package_weight" placeholder="Enter weight in KG">
                                                <div class="invalid-feedback package_weight_error">Weight required</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group-zidrop">
                                                <label class="form-label-zidrop">Number of Items <span class="text-danger">*</span></label>
                                                <input class="form-control form-control-zidrop" type="number" min="1" name="number_of_items" id="number_of_items" placeholder="Enter number of items">
                                                <div class="invalid-feedback number_of_items_error">Number of items required</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group-zidrop">
                                                <label class="form-label-zidrop">Declared Value (₦) <span class="text-danger">*</span></label>
                                                <input class="form-control form-control-zidrop" type="number" min="0" name="declared_value" id="declared_value" placeholder="Enter declared value">
                                                <div class="invalid-feedback declared_value_error">Declared value required</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group-zidrop">
                                                <label class="form-label-zidrop">Item Name <span class="text-danger">*</span></label>
                                                <input class="form-control form-control-zidrop" type="text" name="item_name" id="item_name" placeholder="Enter item name">
                                                <div class="invalid-feedback item_name_error">Item name required</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group-zidrop">
                                                <label class="form-label-zidrop">Color <span class="text-danger">*</span></label>
                                                <input class="form-control form-control-zidrop" type="text" name="item_color" id="item_color" placeholder="Enter item color">
                                                <div class="invalid-feedback item_color_error">Color required</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group-zidrop">
                                                <label class="form-label-zidrop">What does this parcel contain? <span class="text-danger">*</span></label>
                                                <textarea class="form-control form-control-zidrop" name="parcel_contents" id="parcel_contents" rows="3" placeholder="Describe the contents of your parcel"></textarea>
                                                <div class="invalid-feedback parcel_contents_error">Parcel contents required</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-4">
                                        <button type="button" class="btn btn-outline-secondary" onclick="slideItem('step-02');">Previous</button>
                                        <button type="button" class="btn-zidrop" onclick="parcelDetailVerifiaction();">Continue</button>
                                    </div>
                                </div>
                                    <!-- Review -->
                                    <div class="slide-content" id="step-04" style="display: none;">
                                        <h2 class="booking-page-heading mb-4">Review &amp; Confirm</h2>
                                        <div class="row g-4">
                                            <!-- Sender Details -->
                                            <div class="col-md-6">
                                                <div class="card h-100">
                                                    <div class="card-header d-flex justify-content-between align-items-center">
                                                        <h5 class="mb-0">Sender Details</h5>
                                                        <button type="button" class="btn btn-link" onclick="slideItem('step-01');">Edit</button>
                                                    </div>
                                                    <div class="card-body">
                                                        <ul class="list-unstyled mb-0">
                                                            <li class="mb-2">
                                                                <strong>Name:</strong>
                                                                <span id="sender_name_t"></span>
                                                            </li>
                                                            <li class="mb-2">
                                                                <strong>Mobile:</strong>
                                                                <span id="sender_mobile_t"></span>
                                                            </li>
                                                            <li class="mb-2">
                                                                <strong>Email:</strong>
                                                                <span id="sender_email_t"></span>
                                                            </li>
                                                            <li class="mb-2">
                                                                <strong>City:</strong>
                                                                <span id="sender_pickupcity_t"></span>
                                                            </li>
                                                            <li class="mb-2">
                                                                <strong>Town:</strong>
                                                                <span id="sender_pickuptown_t"></span>
                                                            </li>
                                                            <li>
                                                                <strong>Address:</strong>
                                                                <span id="sender_address_t"></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Recipient Details -->
                                            <div class="col-md-6">
                                                <div class="card h-100">
                                                    <div class="card-header d-flex justify-content-between align-items-center">
                                                        <h5 class="mb-0">Recipient Details</h5>
                                                        <button type="button" class="btn btn-link" onclick="slideItem('step-02');">Edit</button>
                                                    </div>
                                                    <div class="card-body">
                                                        <ul class="list-unstyled mb-0">
                                                            <li class="mb-2">
                                                                <strong>Name:</strong>
                                                                <span id="recivier_name_t"></span>
                                                            </li>
                                                            <li class="mb-2">
                                                                <strong>Mobile:</strong>
                                                                <span id="recivier_mobile_t"></span>
                                                            </li>
                                                            <li class="mb-2">
                                                                <strong>City:</strong>
                                                                <span id="recipient_pickupcity_t"></span>
                                                            </li>
                                                            <li class="mb-2">
                                                                <strong>Town:</strong>
                                                                <span id="recipient_pickuptown_t"></span>
                                                            </li>
                                                            <li>
                                                                <strong>Address:</strong>
                                                                <span id="recivier_address_t"></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Parcel Details -->
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header d-flex justify-content-between align-items-center">
                                                        <h5 class="mb-0">Parcel Details</h5>
                                                        <button type="button" class="btn btn-link" onclick="slideItem('step-03');">Edit</button>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <ul class="list-unstyled mb-0">
                                                                    <li class="mb-2">
                                                                        <strong>Parcel Type:</strong>
                                                                        <span id="parcel_type_t"></span>
                                                                    </li>
                                                                    <li class="mb-2">
                                                                        <strong>Weight:</strong>
                                                                        <span id="package_weight_t"></span>
                                                                    </li>
                                                                    <li class="mb-2">
                                                                        <strong>Items:</strong>
                                                                        <span id="number_of_items_t"></span>
                                                                    </li>
                                                                    <li class="mb-2">
                                                                        <strong>Item Name:</strong>
                                                                        <span id="item_name_t"></span>
                                                                    </li>
                                                                    <li class="mb-2">
                                                                        <strong>Color:</strong>
                                                                        <span id="item_color_t"></span>
                                                                    </li>
                                                                    <li>
                                                                        <strong>Contents:</strong>
                                                                        <span id="parcel_contents_t"></span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <ul class="list-unstyled mb-0">
                                                                    <li class="mb-2">
                                                                        <strong>Declared Value:</strong>
                                                                        <span id="declared_value_t"></span>
                                                                    </li>
                                                                    <li class="mb-2">
                                                                        <strong>Delivery Charge:</strong>
                                                                        <span id="delivery_charge_t"></span>
                                                                    </li>
                                                                    <li class="mb-2">
                                                                        <strong>Insurance:</strong>
                                                                        <span id="insurance_t"></span>
                                                                    </li>
                                                                    <li class="mb-2">
                                                                        <strong>Tax:</strong>
                                                                        <span id="tax_t"></span>
                                                                    </li>
                                                                    <li class="h5 mb-0 mt-3">
                                                                        <strong>Total:</strong>
                                                                        <span id="total_t" class="text-primary"></span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Terms & Payment -->
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="form-check mb-4">
                                                            <input class="form-check-input" type="checkbox" id="terms_conditions" name="terms_conditions" required>
                                                            <label class="form-check-label" for="terms_conditions">
                                                                I agree to the <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">Terms & Conditions</a>
                                                            </label>
                                                            <div class="invalid-feedback terms_conditions_error">You must agree to the terms and conditions</div>
                                                        </div>

                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <button type="button" class="btn btn-secondary btn-lg" onclick="slideItem('step-03');">Previous</button>
                                                            <button type="button" class="btn btn-primary btn-lg px-5" onclick="confirmAndPay();">Confirm & Pay</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Terms & Conditions Modal -->
    <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="termsModalLabel">Terms & Conditions</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6>1. Service Agreement</h6>
                    <p>By using our P2P delivery service, you agree to comply with all applicable laws and regulations.</p>
                    
                    <h6>2. Prohibited Items</h6>
                    <p>The following items are strictly prohibited:</p>
                    <ul>
                        <li>Illegal substances and drugs</li>
                        <li>Weapons and ammunition</li>
                        <li>Hazardous materials</li>
                        <li>Perishable items without proper packaging</li>
                        <li>Items exceeding weight limits</li>
                    </ul>

                    <h6>3. Insurance and Liability</h6>
                    <p>We provide basic insurance coverage based on the declared value of your parcel. Additional insurance may be purchased for high-value items.</p>

                    <h6>4. Delivery Timeframes</h6>
                    <p>Delivery times are estimates and may vary based on:</p>
                    <ul>
                        <li>Distance between pickup and delivery locations</li>
                        <li>Weather conditions</li>
                        <li>Traffic conditions</li>
                        <li>Customs clearance (if applicable)</li>
                    </ul>

                    <h6>5. Claims and Disputes</h6>
                    <p>Any claims for lost or damaged items must be filed within 7 days of delivery. We will investigate and process claims according to our insurance policy.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_js_script')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            console.log('jQuery ready!');
            // Initialize select2
            $('.select2').select2();
            
            // Update step navigation
            function updateStepNavigation(currentStep) {
                $('.step-circle-zidrop, .step-text-zidrop, .progress-line-zidrop').removeClass('active');
                
                if (currentStep >= 1) {
                    $('.step-circle-zidrop:eq(0), .step-text-zidrop:eq(0)').addClass('active');
                }
                if (currentStep >= 2) {
                    $('.step-circle-zidrop:eq(1), .step-text-zidrop:eq(1), .progress-line-zidrop:eq(0)').addClass('active');
                }
                if (currentStep >= 3) {
                    $('.step-circle-zidrop:eq(2), .step-text-zidrop:eq(2), .progress-line-zidrop:eq(1)').addClass('active');
                }
                if (currentStep >= 4) {
                    $('.step-circle-zidrop:eq(3), .step-text-zidrop:eq(3), .progress-line-zidrop:eq(2)').addClass('active');
                }
            }

            // Sender Pickup City -> Town
            $('#sender_pickupcity').on('change', function() {
                var city_id = $(this).val();
                console.log('Sender city changed:', city_id);
                if (city_id) {
                    $.ajax({
                        url: '/web/get-town/' + city_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log('Sender towns loaded:', data);
                            var selectElement = $('select[name="sender_pickuptown"]');
                            selectElement.empty().append('<option value="" selected>Pickup Town</option>');
                            if (data && data.length > 0) {
                                $.each(data, function(key, value) {
                                    selectElement.append('<option value="' + value.id + '" data-title="' + value.title + '" data-towncharge="' + (value.deliverycharge || 0) + '">' + value.title + '</option>');
                                });
                            } else {
                                selectElement.append('<option value="" disabled>No towns found</option>');
                            }
                            selectElement.trigger('change');
                        },
                        error: function(xhr, status, error) {
                            console.error('Sender towns AJAX error:', error, xhr.responseText);
                            alert('Failed to load town data. Please try again.');
                        }
                    });
                } else {
                    console.log('No city selected for sender');
                }
            });

            // Recipient Pickup City -> Town
            $('#recipient_pickupcity').on('change', function() {
                var city_id = $(this).val();
                console.log('Recipient city changed:', city_id);
                if (city_id) {
                    $.ajax({
                        url: '/web/get-town/' + city_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log('Recipient towns loaded:', data);
                            var selectElement = $('select[name="recipient_pickuptown"]');
                            selectElement.empty().append('<option value="" selected>Pickup Town</option>');
                            if (data && data.length > 0) {
                                $.each(data, function(key, value) {
                                    selectElement.append('<option value="' + value.id + '" data-title="' + value.title + '" data-towncharge="' + (value.deliverycharge || 0) + '">' + value.title + '</option>');
                                });
                            } else {
                                selectElement.append('<option value="" disabled>No towns found</option>');
                            }
                            selectElement.trigger('change');
                        },
                        error: function(xhr, status, error) {
                            console.log('AJAX error:', error, xhr.responseText);
                            alert('Failed to load town data. Please try again.');
                        }
                    });
                }
            });

            // Load city tariffs when city changes
            $('#recipient_pickupcity').on('change', function() {
                var city_id = $(this).val();
                if (city_id) {
                    $.ajax({
                        url: '/web/get-tarrif/' + city_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log('City tariffs loaded:', data);
                            if (data && data.length > 0) {
                                var cityData = data[0];
                                $('#recipient_pickupcity option:selected').attr({
                                    'data-deliverycharge': cityData.deliverycharge || 0,
                                    'data-extradeliverycharge': cityData.extradeliverycharge || 0,
                                    'data-codcharge': cityData.codcharge || 0,
                                    'data-tax': cityData.tax || 0,
                                    'data-insurance': cityData.insurance || 0
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log('Tariff AJAX error:', error);
                        }
                    });
                }
            });
        });

        // Validation Functions
        function senderInfoVerification() {
            console.log('senderInfoVerification called');
            var firstErrorOccurance = '';
            var sender_name = $('#shipping-form [name="sender_name"]').val();
            var sender_mobile = $('#shipping-form [name="sender_mobile"]').val();
            var sender_email = $('#shipping-form [name="sender_email"]').val();
            var sender_pickupcity = $('#shipping-form [name="sender_pickupcity"]').val();
            var sender_pickuptown = $('#shipping-form [name="sender_pickuptown"]').val();
            var sender_address = $('#shipping-form [name="sender_address"]').val();

            console.log('Sender data:', {sender_name, sender_mobile, sender_email, sender_pickupcity, sender_pickuptown, sender_address});

            // Clear previous errors
            $('.invalid-feedback').hide();
            $('.form-control').removeClass('is-invalid');

            if (sender_name && sender_mobile && sender_email && sender_pickupcity && 
                sender_pickuptown && sender_address && 
                checkMobile(sender_mobile) && checkEmailType(sender_email)) {
                
                console.log('Sender validation passed, moving to step 2');
                slideItem('step-02');
                updateStepNavigation(2);
                $('html, body').animate({ scrollTop: 0 }, 'fast');
            } else {
                console.log('Sender validation failed');
                // Show validation errors
                if (!sender_name) {
                    $('.sender_name_error').show();
                    $('[name="sender_name"]').addClass('is-invalid');
                    firstErrorOccurance = firstErrorOccurance || 'sender_name';
                }
                if (!sender_mobile) {
                    $('.sender_mobile_error').show();
                    $('[name="sender_mobile"]').addClass('is-invalid');
                    firstErrorOccurance = firstErrorOccurance || 'sender_mobile';
                }
                if (!sender_email) {
                    $('.sender_email_error').show();
                    $('[name="sender_email"]').addClass('is-invalid');
                    firstErrorOccurance = firstErrorOccurance || 'sender_email';
                }
                if (!sender_pickupcity) {
                    $('.sender_pickupcity_error').show();
                    $('[name="sender_pickupcity"]').addClass('is-invalid');
                    firstErrorOccurance = firstErrorOccurance || 'sender_pickupcity';
                }
                if (!sender_pickuptown) {
                    $('.sender_district_error').show();
                    $('[name="sender_pickuptown"]').addClass('is-invalid');
                    firstErrorOccurance = firstErrorOccurance || 'sender_pickuptown';
                }
                if (!sender_address) {
                    $('.sender_address_error').show();
                    $('[name="sender_address"]').addClass('is-invalid');
                    firstErrorOccurance = firstErrorOccurance || 'sender_address';
                }

                if (firstErrorOccurance) {
                    console.log('First error field:', firstErrorOccurance);
                    $('[name="' + firstErrorOccurance + '"]').focus();
                    $('html, body').animate({
                        scrollTop: $('[name="' + firstErrorOccurance + '"]').offset().top - 100
                    }, 'fast');
                }
            }
        }

        function recivierInfoVerifaction() {
            var firstErrorOccurance = '';
            var recivier_name = $('#shipping-form [name="recivier_name"]').val();
            var recivier_mobile = $('#shipping-form [name="recivier_mobile"]').val();
            var recipient_pickupcity = $('#shipping-form [name="recipient_pickupcity"]').val();
            var recipient_pickuptown = $('#shipping-form [name="recipient_pickuptown"]').val();
            var recivier_address = $('#shipping-form [name="recivier_address"]').val();

            // Clear previous errors
            $('.invalid-feedback').hide();
            $('.form-control').removeClass('is-invalid');

            if (recivier_name && recivier_mobile && recipient_pickupcity && 
                recipient_pickuptown && recivier_address && checkMobile(recivier_mobile)) {
                
                slideItem('step-03');
                updateStepNavigation(3);
                $('html, body').animate({ scrollTop: 0 }, 'fast');
            } else {
                // Show validation errors
                if (!recivier_name) {
                    $('.recipient_name_error').show();
                    $('[name="recivier_name"]').addClass('is-invalid');
                    firstErrorOccurance = firstErrorOccurance || 'recivier_name';
                }
                if (!recivier_mobile) {
                    $('.recipient_mobile_error').show();
                    $('[name="recivier_mobile"]').addClass('is-invalid');
                    firstErrorOccurance = firstErrorOccurance || 'recivier_mobile';
                }
                if (!recipient_pickupcity) {
                    $('.recipient_pickupcity_error').show();
                    $('[name="recipient_pickupcity"]').addClass('is-invalid');
                    firstErrorOccurance = firstErrorOccurance || 'recipient_pickupcity';
                }
                if (!recipient_pickuptown) {
                    $('.recipient_pickuptown_error').show();
                    $('[name="recipient_pickuptown"]').addClass('is-invalid');
                    firstErrorOccurance = firstErrorOccurance || 'recipient_pickuptown';
                }
                if (!recivier_address) {
                    $('.recipient_address_error').show();
                    $('[name="recivier_address"]').addClass('is-invalid');
                    firstErrorOccurance = firstErrorOccurance || 'recivier_address';
                }

                if (firstErrorOccurance) {
                    $('[name="' + firstErrorOccurance + '"]').focus();
                    $('html, body').animate({
                        scrollTop: $('[name="' + firstErrorOccurance + '"]').offset().top - 100
                    }, 'fast');
                }
            }
        }

        function parcelDetailVerifiaction() {
            var firstErrorOccurance = '';
            var parcel_type = $('#shipping-form [name="parcel_type"]').val();
            var package_weight = $('#shipping-form [name="package_weight"]').val();
            var number_of_items = $('#shipping-form [name="number_of_items"]').val();
            var declared_value = convertCommaSeparatedToNumber($('#shipping-form [name="declared_value"]').val());
            var item_name = $('#shipping-form [name="item_name"]').val();
            var item_color = $('#shipping-form [name="item_color"]').val();
            var parcel_contents = $('#shipping-form [name="parcel_contents"]').val();

            // Default values
            if (!number_of_items) number_of_items = 1;
            if (!package_weight) package_weight = 1;

            // Clear previous errors
            $('.invalid-feedback').hide();
            $('.form-control').removeClass('is-invalid');

            if (parcel_type && package_weight && number_of_items && declared_value && 
                item_name && item_color && parcel_contents) {
                
                // Update review section
                $('#parcel_type_t').html(parcel_type);
                $('#package_weight_t').html(package_weight + ' kg');
                $('#number_of_items_t').html(number_of_items);
                $('#declared_value_t').html('₦ ' + checkNan(CurrencyFormatted(declared_value)));
                $('#item_name_t').html(item_name);
                $('#item_color_t').html(item_color);
                $('#parcel_contents_t').html(parcel_contents);

                // Update sender and recipient details
                $('#sender_name_t').html($('#sender_name').val());
                $('#sender_mobile_t').html($('#sender_mobile').val());
                $('#sender_email_t').html($('#sender_email').val());
                $('#sender_pickupcity_t').html($('#sender_pickupcity option:selected').text());
                $('#sender_pickuptown_t').html($('#sender_pickuptown option:selected').text());
                $('#sender_address_t').html($('#sender_address').val());

                $('#recivier_name_t').html($('#recivier_name').val());
                $('#recivier_mobile_t').html($('#recivier_mobile').val());
                $('#recipient_pickupcity_t').html($('#recipient_pickupcity option:selected').text());
                $('#recipient_pickuptown_t').html($('#recipient_pickuptown option:selected').text());
                $('#recivier_address_t').html($('#recivier_address').val());

                // Calculate charges
                var stateCharge = parseInt($('#recipient_pickupcity option:selected').attr('data-deliverycharge')) || 0;
                var extraCharge = parseInt($('#recipient_pickupcity option:selected').attr('data-extradeliverycharge')) || 0;
                var zoneCharge = parseInt($('#recipient_pickuptown option:selected').attr('data-towncharge')) || 0;
                var taxPercent = parseFloat($('#recipient_pickupcity option:selected').attr('data-tax')) || 0;
                var insurancePercent = parseFloat($('#recipient_pickupcity option:selected').attr('data-insurance')) || 0;

                extraCharge = parseInt(package_weight) > 1 ? (parseInt(package_weight) * extraCharge) - extraCharge : 0;
                var charge = stateCharge + extraCharge + zoneCharge;

                $('#delivery_charge_t').text('₦ ' + checkNan(CurrencyFormatted(charge)));

                var tax = charge * (taxPercent / 100);
                $('#tax_t').text('₦ ' + checkNan(CurrencyFormatted(tax)));

                var insurance = declared_value * (insurancePercent / 100);
                $('#insurance_t').text('₦ ' + checkNan(CurrencyFormatted(insurance)));

                var total = charge + tax + insurance;
                $('#totalamount').val(total);
                $('#total_t').text('₦ ' + checkNan(CurrencyFormatted(total)));

                slideItem('step-04');
                updateStepNavigation(4);
                $('html, body').animate({ scrollTop: 0 }, 'fast');
            } else {
                // Show validation errors
                if (!parcel_type) {
                    $('.parcel_type_error').show();
                    $('[name="parcel_type"]').addClass('is-invalid');
                    firstErrorOccurance = firstErrorOccurance || 'parcel_type';
                }
                if (!package_weight) {
                    $('.package_weight_error').show();
                    $('[name="package_weight"]').addClass('is-invalid');
                    firstErrorOccurance = firstErrorOccurance || 'package_weight';
                }
                if (!number_of_items) {
                    $('.number_of_items_error').show();
                    $('[name="number_of_items"]').addClass('is-invalid');
                    firstErrorOccurance = firstErrorOccurance || 'number_of_items';
                }
                if (!declared_value) {
                    $('.declared_value_error').show();
                    $('[name="declared_value"]').addClass('is-invalid');
                    firstErrorOccurance = firstErrorOccurance || 'declared_value';
                }
                if (!item_name) {
                    $('.item_name_error').show();
                    $('[name="item_name"]').addClass('is-invalid');
                    firstErrorOccurance = firstErrorOccurance || 'item_name';
                }
                if (!item_color) {
                    $('.item_color_error').show();
                    $('[name="item_color"]').addClass('is-invalid');
                    firstErrorOccurance = firstErrorOccurance || 'item_color';
                }
                if (!parcel_contents) {
                    $('.parcel_contents_error').show();
                    $('[name="parcel_contents"]').addClass('is-invalid');
                    firstErrorOccurance = firstErrorOccurance || 'parcel_contents';
                }

                if (firstErrorOccurance) {
                    $('[name="' + firstErrorOccurance + '"]').focus();
                    $('html, body').animate({
                        scrollTop: $('[name="' + firstErrorOccurance + '"]').offset().top - 100
                    }, 'fast');
                }
            }
        }

        function confirmAndPay() {
            var terms_conditions = $('#terms_conditions').is(':checked');
            
            if (!terms_conditions) {
                $('.terms_conditions_error').show();
                $('#terms_conditions').addClass('is-invalid');
                toastr.error("Please agree to the Terms & Conditions before proceeding.");
                return false;
            }
            
            $('.terms_conditions_error').hide();
            $('#terms_conditions').removeClass('is-invalid');
            
            // Trigger Paystack payment
            payWithPaystack();
        }

        function slideItem(step) {
            $('.slide-content').hide();
            $('#' + step).show();
        }

        function checkMobile(mobile) {
            return true; // Simplified for now
        }

        function checkEmailType(email) {
            var email_pattern = /^[^_.-][\w-._]+@[a-zA-Z_-]+?(\.[a-zA-Z]{2,26}){1,3}$/;
            return email.match(email_pattern) !== null;
        }

        function CurrencyFormatted(number) {
            var decimalplaces = 2;
            var decimalcharacter = ".";
            var thousandseparater = ",";
            number = parseFloat(number);
            var sign = number < 0 ? "-" : "";
            var formatted = new String(number.toFixed(decimalplaces));
            if (decimalcharacter.length && decimalcharacter != ".") {
                formatted = formatted.replace(/\./, decimalcharacter);
            }
            var integer = "";
            var fraction = "";
            var strnumber = new String(formatted);
            var dotpos = decimalcharacter.length ? strnumber.indexOf(decimalcharacter) : -1;
            if (dotpos > -1) {
                if (dotpos) {
                    integer = strnumber.substr(0, dotpos);
                }
                fraction = strnumber.substr(dotpos + 1);
            } else {
                integer = strnumber;
            }
            if (integer) {
                integer = String(Math.abs(integer));
            }
            while (fraction.length < decimalplaces) {
                fraction += "0";
            }
            var temparray = new Array();
            while (integer.length > 3) {
                temparray.unshift(integer.substr(-3));
                integer = integer.substr(0, integer.length - 3);
            }
            temparray.unshift(integer);
            integer = temparray.join(thousandseparater);
            return sign + integer + decimalcharacter + fraction;
        }

        function checkNan(total) {
            var str = total.split(".");
            if (str[0] == 'NaN') {
                return '00';
            }
            return total;
        }

        function convertCommaSeparatedToNumber(value) {
            if (!value) return 0;
            return Number(String(value).replace(/,/g, '')) || 0;
        }
    </script>
    
    {{-- Payment --}}
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function payWithPaystack() {
            let total = parseFloat(convertCommaSeparatedToNumber($("#totalamount").val()));
            if (isNaN(total) || total <= 0) {
                alert('Invalid total amount.');
                return;
            }

            // Fetch sender information
            let sender_name = document.getElementById("sender_name").value.trim();
            let sender_email = document.getElementById("sender_email").value.trim();
            let sender_mobile = document.getElementById("sender_mobile").value.trim();
            let sender_pickuptown = document.getElementById("sender_pickuptown").value.trim();
            let sender_pickupcity = document.getElementById("sender_pickupcity").value.trim();
            let sender_address = document.getElementById("sender_address").value.trim();

            // Fetch recipient information
            let receiver_name = document.getElementById("recivier_name").value.trim();
            let receiver_mobile = document.getElementById("recivier_mobile").value.trim();
            let recipient_pickupcity = document.getElementById("recipient_pickupcity").value.trim();
            let recipient_pickuptown = document.getElementById("recipient_pickuptown").value.trim();
            let receiver_address = document.getElementById("recivier_address").value.trim();

            // Fetch parcel information
            let parcel_type = document.getElementById("parcel_type").value.trim();
            let package_weight = parseFloat(document.getElementById("package_weight").value);
            let number_of_items = parseInt(document.getElementById("number_of_items").value);
            let declared_value = convertCommaSeparatedToNumber(document.getElementById("declared_value").value);
            let item_name = document.getElementById("item_name").value.trim();
            let item_color = document.getElementById("item_color").value.trim();
            let parcel_contents = document.getElementById("parcel_contents").value.trim();
            let terms_conditions = document.getElementById("terms_conditions").checked;

            // Basic validation for required fields
            if (!sender_email || !sender_name || !receiver_name || !receiver_mobile) {
                alert('Please fill in all required fields.');
                return;
            }

            let handler = PaystackPop.setup({
                key: 'pk_test_9e185aac0936fd9313529f6471cdc37873adc730', 
                email: sender_email,
                phone: sender_mobile,
                amount: total * 100, // Convert amount to kobo
                ref: 'Zi_' + Math.floor(Math.random() * 9999) + '_' + Math.floor(Math.random() * 99999999),
                language: "en",

                onClose: function() {
                    alert('Payment window closed.');
                },

                callback: function(response) {
                    let reference = response.reference;

                    // Verify payment via the backend
                    $.ajax({
                        type: "GET",
                        url: "{{ URL::to('/web/get/ppverify-payment/') }}/" + reference,
                        success: function(paymentResponse) {
                            if (paymentResponse[0].status === true) {
                                // Store payment data
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });

                                $.ajax({
                                    type: "GET",
                                    url: "{{ URL::to('/web/get/store-payment') }}",
                                    data: {
                                        reference: reference,
                                        paymentResponse: paymentResponse,
                                        total: total,
                                        sender_name: sender_name,
                                        sender_email: sender_email,
                                        sender_mobile: sender_mobile,
                                        sender_pickuptown: sender_pickuptown,
                                        sender_pickupcity: sender_pickupcity,
                                        sender_address: sender_address,
                                        recivier_name: receiver_name,
                                        recivier_mobile: receiver_mobile,
                                        recipient_pickupcity: recipient_pickupcity,
                                        recipient_pickuptown: recipient_pickuptown,
                                        recivier_address: receiver_address,
                                        parcel_type: parcel_type,
                                        parcel_weight: package_weight,
                                        number_of_item: number_of_items,
                                        product_value: declared_value,
                                        item_name: item_name,
                                        color: item_color,
                                        parcel_contain: parcel_contents,
                                        terms_and_condition: terms_conditions,
                                    },
                                    success: function(res) {
                                        toastr.success("Your transaction completed successfully!");
                                        setTimeout(function() {
                                            window.location.reload();
                                        }, 2000);
                                        $('html, body').animate({ scrollTop: 0 }, 'fast');
                                    },
                                    error: function(err) {
                                        alert('Failed to store payment data. Please try again.');
                                    }
                                });
                            } else {
                                alert('Payment verification failed. Please try again.');
                            }
                        },
                        error: function(err) {
                            alert('Error verifying payment. Please try again.');
                        }
                    });
                }
            });

            handler.openIframe();
        }

        $(document).ready(function() {
            @if (session()->has('open_url') && session()->get('open_url') != '')
                window.open('{{ session()->get('open_url') }}', '_blank');
            @endif
        });
    </script>
@endsection
