<?php

namespace App\Http\Controllers\Api;

use App\Codcharge;
use App\Deliverycharge;
use App\Deliveryman;
use App\Disclamer;
use App\Http\Controllers\Controller;
use App\Mail\MerchantRegistrationEmail;
use App\Mail\NewPickupRequestEmail;
use App\Merchant;
use App\Merchantcharge;
use App\Merchantpayment;
use App\Nearestzone;
use App\Parcel;
use App\Parcelnote;
use App\Parceltype;
use App\Pickup;
use App\RemainTopup;
use App\Topup;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Mail;
use Session;

class ApiMerchant extends Controller {

    public function notice()
    {
        return Disclamer::find(1);
    }

    public function storePayment(Request $request) {
        $topup = Topup::create([
            'merchant_id' => $request->merchant_id,
            'email'       => $request->email,
            'amount'      => $request->amount,
            'reference'   => $request->reference,
            'status'      => $request->status,
            'channel'     => $request->channel,
            'currency'    => $request->currency,
            'mobile'      => $request->mobile,
        ]);

        $merchant          = Merchant::find($request->merchant_id);
        $merchant->balance = $merchant->balance + ($request->amount);
        $merchant->save();

        $count = Topup::where('merchant_id', $request->merchant_id)->count();

        return response()->json(['status' => true, 'top' => $topup, 'count' => $count]);
    }

    public function topupHistory($id) {
        return Topup::where('merchant_id', $id)->orderBy('id', 'desc')->get();
    }

    /**
     * Register a new merchant (API) with OTP sent to email
     * POST /api/merchant/register
     * Body: companyName, firstName, lastName, phoneNumber, emailAddress, password, agree
     */
    public function register(Request $request) {
        $marchentCheck = Merchant::where('phoneNumber', $request->phoneNumber)
            ->orWhere('emailAddress', $request->emailAddress)
            ->first();

        if ($marchentCheck) {
            return ["success" => false, "message" => "Opps! your credential already exist", "data" => null];
        }

        $verifyToken = rand(111111, 999999);

        $store_data = new Merchant();
        $store_data->companyName  = $request->companyName;
        $store_data->firstName    = $request->firstName;
        $store_data->lastName     = $request->lastName;
        $store_data->phoneNumber  = $request->phoneNumber;
        $store_data->emailAddress = $request->emailAddress;
        $store_data->agree        = $request->agree;
        $store_data->status       = 0; // Inactive until OTP verified
        $store_data->verifyToken  = $verifyToken;
        $store_data->password     = bcrypt($request->password);
        $store_data->save();

        // Send OTP by email
        if ($request->emailAddress != null) {
            try {
                \Illuminate\Support\Facades\Mail::to($store_data->emailAddress)->send(new \App\Mail\MerchantRegistrationEmail($store_data));
            } catch (\Exception $exception) {
                \Log::info('API--Merchant-Register mail error: ' . $exception->getMessage());
            }
        }

        return [
            "success" => true,
            "message" => "Thanks for registration, Please verify your email with the OTP sent.",
            "data" => ["merchant_id" => $store_data->id, "email" => $store_data->emailAddress]
        ];
    }

    /**
     * Verify merchant OTP (API)
     * POST /api/merchant/verify-otp
     * Body: emailAddress, otp
     */
    public function verifyOtp(Request $request) {
        $merchant = Merchant::where('emailAddress', $request->emailAddress)->first();
        if (!$merchant) {
            return ["success" => false, "message" => "Merchant not found."];
        }
        if ($merchant->verifyToken == $request->otp) {
            $merchant->status = 1;
            $merchant->verifyToken = null;
            $merchant->save();
            return ["success" => true, "message" => "Your account is verified and activated."];
        } else {
            return ["success" => false, "message" => "Invalid OTP."];
        }
    }

    /**
     * Request OTP for email registration (step 1)
     * POST /api/merchant/request-otp
     * Body: emailAddress
     */
    public function requestEmailOtp(Request $request)
    {
        $request->validate([
            'emailAddress' => 'required|email',
        ]);
        $email = $request->emailAddress;
        $otp = rand(111111, 999999);
        $expiresAt = now()->addMinutes(10);

        // Store OTP
        \App\EmailOtp::updateOrCreate(
            ['email' => $email],
            ['otp' => $otp, 'expires_at' => $expiresAt]
        );

        // Send OTP by email using the same design as web registration
        try {
            \Mail::to($email)->send(new \App\Mail\OtpMail($otp));
        } catch (\Exception $e) {
            \Log::info('OTP email error: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to send OTP.'], 500);
        }
        return response()->json(['success' => true, 'message' => 'OTP sent to email.']);
    }

    /**
     * Register merchant after OTP verification (step 2)
     * POST /api/merchant/register-with-otp
     * Body: emailAddress, otp, companyName, firstName, lastName, phoneNumber, password, agree
     */
    public function registerWithOtp(Request $request)
    {
        $request->validate([
            'emailAddress' => 'required|email',
            'otp' => 'required',
            'companyName' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'phoneNumber' => 'required',
            'password' => 'required',
            'agree' => 'required',
        ]);
        $email = $request->emailAddress;
        $otp = $request->otp;
        $otpRow = \App\EmailOtp::where('email', $email)
            ->where('otp', $otp)
            ->where('expires_at', '>', now())
            ->first();
        if (!$otpRow) {
            return response()->json(['success' => false, 'message' => 'Invalid or expired OTP.'], 400);
        }
        // Check if merchant already exists
        $merchantExists = \App\Merchant::where('emailAddress', $email)
            ->orWhere('phoneNumber', $request->phoneNumber)
            ->first();
        if ($merchantExists) {
            return response()->json(['success' => false, 'message' => 'Merchant already exists.'], 400);
        }
        // Register merchant
        $merchant = new \App\Merchant();
        $merchant->companyName = $request->companyName;
        $merchant->firstName = $request->firstName;
        $merchant->lastName = $request->lastName;
        $merchant->phoneNumber = $request->phoneNumber;
        $merchant->emailAddress = $email;
        $merchant->agree = $request->agree;
        $merchant->status = 1; // Active
        $merchant->verifyToken = null;
        $merchant->password = bcrypt($request->password);
        $merchant->save();
        // Delete OTP after use
        $otpRow->delete();
        return response()->json([
            'success' => true,
            'message' => 'Registration successful.',
            'data' => [
                'merchant_id' => $merchant->id,
                'email' => $merchant->emailAddress
            ]
        ]);
    }

    public function phoneVerify(Request $request) {
        $verified = Merchant::where('phoneNumber', $request->phoneNumber)->first();
        // dd($verified);

        $verifydbtoken   = $verified->verifyToken;
        $verifyformtoken = $request->verifyToken;

        if ($verifydbtoken == $verifyformtoken) {
            $verified->verifyToken = 1;
            $verified->status      = 1;
            $verified->save();

            return ["success" => true, "message" => "Your account is verified", "data" => $verified];
        } else {
            return ["success" => false, "message" => "Sorry your verify token wrong", "data" => null];
        }

    }

    public function login(Request $request) {
        $merchantChedk = Merchant::where('emailAddress', $request->phoneNumber)
            ->orWhere('phoneNumber', $request->phoneNumber)
            ->first();

        if ($merchantChedk) {

            if ($merchantChedk->status == 0) {
                return ["success" => false, "message" => "Opps! your account has been suspends", "data" => null];
            } else {

                if (password_verify($request->password, $merchantChedk->password)) {
                    return ["success" => true, "message" => "Thanks , You are login successfully", "data" => $merchantChedk];
                } else {
                    return ["success" => false, "message" => "Sorry! your password wrong", "data" => null];
                }

            }

        } else {
            return ["success" => false, "message" => "Opps, You have no account"];
        }

    }

    public function passwordReset(Request $request) {
        $merchantInfo = Merchant::where('phoneNumber', $request->phoneNumber)->first();

        if ($merchantInfo) {
            $verifyToken                 = rand(111111, 999999);
            $merchantInfo->passwordReset = $verifyToken;
            $merchantInfo->save();

            $url  = "http://premium.mdlsms.com/smsapi";
            $data = [
                "api_key"  => "C20005455f867568bd8c02.20968541",
                "type"     => "Text",
                "contacts" => $merchantInfo->phoneNumber,
                "senderid" => "8809612440738",
                "msg"      => "Dear $merchantInfo->firstName, \r\n Your password reset token is $verifyToken. Enjoy our services. If any query call us 01711132240\r\nRegards\r\nZuri Express ",
            ];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);
            curl_close($ch);

            return ["success" => true, "message" => "We send a Reset Token in your phone", "resetCustomerId" => $merchantInfo->id];

        } else {
            return ["success" => false, "message" => "Opps, You have no account", "resetCustomerId" => null];
        }

    }

    public function verifyAndChangePassword(Request $request) {
        $id       = $request->header('id');
        $verified = Merchant::where('id', $id)->first();

        if ($verified->passwordReset == $request->verifyPin) {
            $verified->password      = bcrypt(request('newPassword'));
            $verified->passwordReset = NULL;
            $verified->save();

            return ["success" => true, "message" => "Wow! Your password reset successfully", "data" => $verified];
        } else {
            return ["success" => false, "message" => "Sorry! Your process something wrong", "data" => null];
        }

    }

    /**
     * Request password reset by email (step 1)
     * POST /api/merchant/password/email-reset
     * Body: emailAddress
     */
    public function requestEmailPasswordReset(Request $request)
    {
        $request->validate([
            'emailAddress' => 'required|email',
        ]);
        $merchant = \App\Merchant::where('emailAddress', $request->emailAddress)->first();
        if (!$merchant) {
            return response()->json(['success' => false, 'message' => 'Merchant not found.'], 404);
        }
        $otp = rand(111111, 999999);
        $merchant->passwordReset = $otp;
        $merchant->save();
        try {
            \Mail::to($merchant->emailAddress)->send(new \App\Mail\ApiMerchantResetPasswordEmail($otp, $merchant->emailAddress,$merchant->companyName));
        } catch (\Exception $e) {
            \Log::info('Merchant email password reset error: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to send reset code.'], 500);
        }
        return response()->json(['success' => true, 'message' => 'Reset code sent to email.', 'resetCustomerId' => $merchant->id]);
    }

    /**
     * Verify email reset code and set new password (step 2)
     * POST /api/merchant/password/email-verify
     * Headers: id (merchant id)
     * Body: verifyPin, newPassword
     */
    public function verifyEmailPasswordReset(Request $request)
    {
        $id = $request->header('id');
        $merchant = \App\Merchant::find($id);
        if (!$merchant) {
            return response()->json(['success' => false, 'message' => 'Merchant not found.'], 404);
        }
        if ($merchant->passwordReset == $request->verifyPin) {
            $merchant->password = bcrypt($request->newPassword);
            $merchant->passwordReset = null;
            $merchant->save();
            return response()->json(['success' => true, 'message' => 'Password reset successfully.', 'data' => $merchant]);
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid or expired reset code.'], 400);
        }
    }

    /**
     * Change password for merchant (mobile API)
     * Required fields: old_password, new_password, password_confirmation
     * Header: id (merchant id)
     */
    public function changePassword(Request $request)
    {
        $id = $request->header('id');
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required',
            'password_confirmation' => 'required_with:new_password|same:new_password',
        ]);
        $merchant = Merchant::find($id);
        if (!$merchant) {
            return response()->json(['success' => false, 'message' => 'Merchant not found.'], 404);
        }
        if (!\Hash::check($request->old_password, $merchant->password)) {
            return response()->json(['success' => false, 'message' => 'Old password does not match.'], 400);
        }
        $merchant->password = \Hash::make($request->new_password);
        $merchant->save();
        return response()->json(['success' => true, 'message' => 'Password changed successfully.']);
    }

    /**
     * Get return payments for the authenticated merchant (mobile API)
     * Header: id (merchant id)
     */
    public function returnPayments(Request $request)
    {
        $merchantId = $request->header('id');
        if (!$merchantId) {
            return response()->json(['success' => false, 'message' => 'Merchant id header required.'], 400);
        }
        $merchantInvoice = \DB::table('merchantreturnpayments')
            ->join('parcels', 'parcels.id', 'merchantreturnpayments.parcelId')
            ->where('merchantreturnpayments.merchantId', $merchantId)
            ->groupBy(['merchantreturnpayments.updated_at'])
            ->selectRaw('DATE(merchantreturnpayments.updated_at) as date, count(merchantreturnpayments.id) as total_parcel, sum(parcels.deliveryCharge + parcels.tax + parcels.insurance) as total, merchantreturnpayments.updated_at, merchantreturnpayments.parcelId, merchantreturnpayments.merchantId')
            ->orderBy('merchantreturnpayments.updated_at', 'DESC')
            ->get();
        return response()->json([
            'success' => true,
            'merchantInvoice' => $merchantInvoice
        ]);
    }

    /**
     * Get remittance payments for the authenticated merchant (mobile API)
     * Header: id (merchant id)
     */
    public function remittancePayments(Request $request)
    {
        $merchantId = $request->header('id');
        if (!$merchantId) {
            return response()->json(['success' => false, 'message' => 'Merchant id header required.'], 400);
        }
        $merchantInvoice = \DB::table('merchantpayments')
            ->join('parcels', 'parcels.id', 'merchantpayments.parcelId')
            ->selectRaw('count(merchantpayments.id) as total_parcel, sum(parcels.merchantPaid) as total, merchantpayments.updated_at')
            ->groupBy('merchantpayments.updated_at')
            ->where('merchantpayments.merchantId', $merchantId)
            ->get();
        return response()->json([
            'success' => true,
            'remittance_payments' => $merchantInvoice
        ]);
    }

    /**
     * Get parcels with status 'out-for-delivery' for the authenticated merchant (mobile API)
     * GET /api/merchant/parcel/out-for-delivery
     * Header: id (merchant id)
     */
    public function parcelsOutForDelivery(Request $request)
    {
        $merchantId = $request->header('id');
        if (!$merchantId) {
            return response()->json(['success' => false, 'message' => 'Merchant id header required.'], 400);
        }
        // Find the Parceltype id for 'out-for-delivery'
        $parcelType = \App\Parceltype::where('slug', 'out-for-delivery')->first();
        if (!$parcelType) {
            return response()->json(['success' => false, 'message' => 'Parceltype for out-for-delivery not found.'], 404);
        }
        $parcels = \DB::table('parcels')
            ->join('merchants', 'merchants.id', '=', 'parcels.merchantId')
            ->where('parcels.merchantId', $merchantId)
            ->where('parcels.status', $parcelType->id)
            ->select('parcels.*', 'merchants.firstName', 'merchants.lastName', 'merchants.phoneNumber', 'merchants.emailAddress', 'merchants.companyName', 'merchants.status as mstatus', 'merchants.id as mid')
            ->orderBy('parcels.updated_at', 'DESC')
            ->get();
        return response()->json([
            'success' => true,
            'parcels' => $parcels
        ]);
    }

    function dashboard($id) {

        $data = [];
        //this month
        $data['m_pending']         = Parcel::where('merchantId', $id)->whereMonth('updated_at', now())->whereYear('updated_at', now())->where('status', 1)->count();
        $data['m_pick']            = Parcel::where('merchantId', $id)->whereMonth('updated_at', now())->whereYear('updated_at', now())->where('status', 2)->count();
        $data['m_await']           = Parcel::where('merchantId', $id)->whereMonth('updated_at', now())->whereYear('updated_at', now())->where('status', 3)->count();
        $data['m_deliver']         = Parcel::where('merchantId', $id)->whereMonth('updated_at', now())->whereYear('updated_at', now())->where('status', 4)->count();
        $data['m_partial_deliver'] = Parcel::where('merchantId', $id)->whereMonth('updated_at', now())->whereYear('updated_at', now())->where('status', 6)->count();
        $data['m_return']          = Parcel::where('merchantId', $id)->whereMonth('updated_at', now())->whereYear('updated_at', now())->where('status', 8)->count();
        $data['m_da']              = Parcel::where('merchantId', $id)->whereMonth('updated_at', now())->whereYear('updated_at', now())->where('status', 10)->count();
        $data['m_hold']            = Parcel::where('merchantId', $id)->whereMonth('updated_at', now())->whereYear('updated_at', now())->where('status', 5)->count();
        $data['m_wallet']          = RemainTopup::where('merchant_id', $id)->sum('amount');

        //total
        $data['t_pending']         = Parcel::where('merchantId', $id)->where('status', 1)->count();
        $data['t_pick']            = Parcel::where('merchantId', $id)->where('status', 2)->count();
        $data['t_await']           = Parcel::where('merchantId', $id)->where('status', 3)->count();
        $data['t_deliver']         = Parcel::where('merchantId', $id)->where('status', 4)->count();
        $data['t_partial_deliver'] = Parcel::where('merchantId', $id)->where('status', 6)->count();
        $data['t_return']          = Parcel::where('merchantId', $id)->where('status', 8)->count();
        $data['t_da']              = Parcel::where('merchantId', $id)->where('status', 10)->count();
        $data['t_hold']            = Parcel::where('merchantId', $id)->where('status', 5)->count();

        $data['parcels'] = Parcel::where('merchantId', $id)->orderBy('updated_at', 'DESC')->limit(50)->with('merchant', 'parcelnote')
            ->get();

        $data['notice'] = Disclamer::find(1);

        $data['merchant'] = DB::table('merchants')->where('id', $id)->first();

        return $data;
    }

    function profile(Request $request) {
        $id = $request->header('id');

        $profileinfos = Merchant::where('id', $id)->first();

        return $profileinfos;
    }

    function nearestZone($state) {
        $nearestzones = Nearestzone::where('state', $state)->where('status', 1)->get();

        return $nearestzones;
    }

    function parcelType() {
        $parcelTypes = Parceltype::all();

        return $parcelTypes;
    }

    function profileUpdate(Request $request) {
        $id                                = $request->header('id');
        $update_merchant                   = Merchant::find($id);
        $update_merchant->phoneNumber      = $request->phoneNumber;
        $update_merchant->pickLocation     = $request->pickLocation;
        $update_merchant->nearestZone      = $request->nearestZone;
        $update_merchant->pickupPreference = $request->pickupPreference;
        $update_merchant->paymentMethod    = $request->paymentMethod;
        $update_merchant->withdrawal       = $request->withdrawal;
        $update_merchant->nameOfBank       = $request->nameOfBank;
        $update_merchant->bankBranch       = $request->bankBranch;
        $update_merchant->bankAcHolder     = $request->bankAcHolder;
        $update_merchant->bankAcNo         = $request->bankAcNo;
        $update_merchant->bkashNumber      = $request->bkashNumber;
        $update_merchant->roketNumber      = $request->rocketNumber;
        $update_merchant->nogodNumber      = $request->nogodNumber;
        $update_merchant->save();

        return ["success" => true, "message" => "Your account update successfully", "data" => Merchant::find($id)];
    }

    function chooseservice() {
        return Deliverycharge::where('status', 1)->get();
    }

    function getServiceBySlug(Request $request) {
        $slug = $request->header('slug');

        return Deliverycharge::where('slug', $slug)->first();
    }

    function getCodCharge() {
        return Codcharge::where('status', 1)->orderBy('id', 'DESC')->first();
    }

    function getPackageCharges($id) {
        $charges = Merchantcharge::where('merchantId', $id)->orderBy('id', 'DESC')->get();

        if ($charges->isEmpty()) {
            $deliveryCharges = Deliverycharge::where('status', 1)->get();

            foreach ($deliveryCharges as $delivery) {
                $store_charge = new Merchantcharge();

                $store_charge->merchantId    = $id;
                $store_charge->packageId     = $delivery->id;
                $store_charge->delivery      = $delivery->deliverycharge;
                $store_charge->extradelivery = $delivery->extradeliverycharge;
                $store_charge->cod           = $delivery->cod;

                $store_charge->save();
            }

            $charges = Merchantcharge::where('merchantId', $id)->orderBy('id', 'DESC')->get();
        }

        return $charges;
    }

    public function parcelinvoice($id) {
        Log::info($id);
        $show_data = DB::table('parcels')
            ->join('merchants', 'merchants.id', '=', 'parcels.merchantId')
            ->where(['parcels.merchantId' => Session::get('merchantId'), 'parcels.id' => $id])
            ->join('nearestzones', 'parcels.reciveZone', '=', 'nearestzones.id')
            ->where('parcels.id', $id)
            ->join('deliverycharges', 'deliverycharges.id', '=', 'nearestzones.state')
            ->select('parcels.*', 'deliverycharges.title', 'nearestzones.zonename', 'nearestzones.state', 'merchants.firstName', 'merchants.lastName', 'merchants.phoneNumber', 'merchants.emailAddress', 'merchants.companyName', 'merchants.status as mstatus', 'merchants.id as mid')
            ->first();

        return $show_data;
    }

    public function createParcel(Request $request) {
        $merchantId = $request->merchant_id;

        $state = Deliverycharge::find($request->package);
        $area  = Nearestzone::find($request->reciveZone);

        if ($request->weight > 1 || $request->weight != NULL) {
            $extraweight    = $request->weight - 1;
            $deliverycharge = $state->deliverycharge + $area->extradeliverycharge + ($extraweight * $state->extradeliverycharge);
            $weight         = $request->weight;
        } else {
            $deliverycharge = $state->deliverycharge + $area->extradeliverycharge;
            $weight         = 1;
        }

        if ($request->payment_option == 2) {
            $state = Deliverycharge::find($request->package);

            if ($state) {
                $codcharge = ($request->cod * $state->cod) / 100;
            } else {
                $codcharge = 0;
            }

            $merchantAmount = ($request->cod) - ($deliverycharge + $codcharge);
            $merchantDue    = ($request->cod) - ($deliverycharge + $codcharge);

        } else {
            $merchant = Merchant::find($merchantId);

            if ($merchant->balance < $deliverycharge) {
                return ["message" => "Insufficient wallet balance."];
            }

            $merchant->balance = $merchant->balance - $deliverycharge;
            $merchant->save();
            $codcharge      = 0;
            $merchantAmount = 0;
            $merchantDue    = 0;
        }

        $store_parcel                   = new Parcel();
        $store_parcel->invoiceNo        = $request->invoiceno;
        $store_parcel->merchantId       = $merchantId;
        $store_parcel->cod              = $request->cod;
        $store_parcel->percelType       = $request->percelType;
        $store_parcel->payment_option   = $request->payment_option;
        $store_parcel->recipientName    = $request->name;
        $store_parcel->recipientAddress = $request->address;
        $store_parcel->recipientPhone   = $request->phonenumber;
        $store_parcel->productWeight    = $weight;
        $store_parcel->trackingCode     = 'ZIDROP' . mt_rand(111111, 999999);
        $store_parcel->note             = $request->note;
        $store_parcel->deliveryCharge   = $deliverycharge;
        $store_parcel->codCharge        = $codcharge;
        $store_parcel->reciveZone       = $request->reciveZone;
        $store_parcel->productPrice     = $request->productPrice;
        $store_parcel->productName      = $request->productName;
        $store_parcel->productQty       = $request->productQty;
        $store_parcel->productColor     = $request->productColor;
        $store_parcel->merchantAmount   = $merchantAmount;
        $store_parcel->merchantDue      = $merchantDue;
        $store_parcel->orderType        = $request->package;
        $store_parcel->codType          = 1;
        $store_parcel->status           = 1;
        $store_parcel->save();

        if ($request->payment_option == 1) {
            RemainTopup::create([
                'parcel_id'     => $store_parcel->id,
                'parcel_status' => 1,
                'merchant_id'   => $merchant->id,
                'amount'        => $deliverycharge,
            ]);
        }

        $note           = new Parcelnote();
        $note->parcelId = $store_parcel->id;
        $note->note     = 'parcel create successfully';

        return $store_parcel;
    }

    function pickupRequest(Request $request) {
        $merchantId = $request->id;

        $this->validate($request, [
            'pickupAddress' => 'required',
        ]);

        $date = date('Y-m-d');

        $findpickup = Pickup::where('date', $date)->Where('merchantId', $merchantId)->count();

        if ($findpickup) {
            return ["success" => false, "message" => "Sorry! your pickup request already pending"];
        } else {
            $store_pickup                = new Pickup();
            $store_pickup->merchantId    = $merchantId;
            $store_pickup->pickuptype    = $request->pickuptype;
            $store_pickup->area          = $request->area;
            $store_pickup->pickupAddress = $request->pickupAddress;
            $store_pickup->note          = $request->note;
            $store_pickup->date          = $date;
            $store_pickup->estimedparcel = $request->estimedparcel;
            $store_pickup->save();

            try {
                $merchant = Merchant::find($merchantId);
                \Illuminate\Support\Facades\Mail::to([
                    'e-tailing@zidrop.com'
                ])->send(new NewPickupRequestEmail($merchant, $store_pickup));

            } catch (\Exception $exception) {
                Log::info('API- New Pickup Request Mail Error: '.$exception->getMessage());
            }

            return ["success" => true, "message" => "Thanks! your pickup request send successfully"];
        }

    }

    function pickup(Request $request, $startFrom) {
        $merchantId = $request->header('id');

        $show_data = DB::table('pickups')
            ->where('pickups.merchantId', $merchantId)
            ->orderBy('pickups.id', 'DESC')
            ->select('pickups.*')
            ->skip($startFrom)
            ->take(20)
            ->get();

        return $show_data;
    }

    function deliveryman($id) {
        $deliverymen = Deliveryman::where('id', $id)->first();

        return $deliverymen;
    }

    function parcels(Request $request, $startFrom) {
        $merchantId = $request->header('id');
        $type       = (int) $request->header('type');

        if ($type == 0) {
            $allparcel = DB::table('parcels')
                ->join('merchants', 'merchants.id', '=', 'parcels.merchantId')
                ->where('parcels.merchantId', $merchantId)
                ->select('parcels.*', 'merchants.firstName', 'merchants.lastName', 'merchants.phoneNumber', 'merchants.emailAddress', 'merchants.companyName', 'merchants.status as mstatus', 'merchants.id as mid')
                ->orderBy('parcels.id', 'DESC')
                ->skip($startFrom)
                ->take(20)
                ->get();
        } else {
            $allparcel = DB::table('parcels')
                ->join('merchants', 'merchants.id', '=', 'parcels.merchantId')
                ->where('parcels.merchantId', $merchantId)
                ->where('parcels.status', $type)
                ->select('parcels.*', 'merchants.firstName', 'merchants.lastName', 'merchants.phoneNumber', 'merchants.emailAddress', 'merchants.companyName', 'merchants.status as mstatus', 'merchants.id as mid')
                ->orderBy('parcels.id', 'DESC')
                ->skip($startFrom)
                ->take(20)
                ->get();
        }

        return $allparcel;
    }

    function parceldetails($id, Request $request) {
        $merchantId = $request->header('id');

        $parceldetails = DB::table('parcels')
            ->join('merchants', 'merchants.id', '=', 'parcels.merchantId')
            ->where('parcels.id', (string) $id)
            ->select('parcels.*', 'merchants.firstName', 'merchants.lastName', 'merchants.phoneNumber', 'merchants.emailAddress', 'merchants.companyName', 'merchants.status as mstatus', 'merchants.id as mid')
            ->first();

        if (!$parceldetails) {
            return ["success" => false, "message" => "Parcel not found", "data" => null];
        }

        $notes = DB::table('parcelnotes')
            ->join('notes', 'parcelnotes.note', '=', 'notes.id')
            ->where('parcelId', $parceldetails->id)
            ->select('parcelnotes.*', 'notes.title as noteTitle')
            ->orderBy('id', 'DESC')
            ->get();

        return ["success" => true, "message" => "Parcel Found", "data" => $parceldetails, "parcel_notes" => $notes];
    }

    function getServiceById($id) {
        return Deliverycharge::where('id', $id)->first();
    }

    function parcelupdate(Request $request) {
        $merchantId = $request->header('id');

        $this->validate($request, [
            'cod'         => 'required',
            'name'        => 'required',
            'address'     => 'required',
            'phoneNumber' => 'required',
        ]);

// fixed delivery charge
        if ($request->weight > 1 || $request->weight != NULL) {
            $extraweight    = $request->weight - 1;
            $deliverycharge = ($request->deliveryCharge * 1) + ($extraweight * $request->extraDeliveryCharge);
            $weight         = $request->weight;
        } else {
            $deliverycharge = ($request->deliveryCharge);
            $weight         = 1;
        }

// fixed cod charge
        if ($request->cod > 100) {
            $extracod       = $request->cod - 100;
            $extracodcharge = $extracod / 100;
            $extracodcharge = 0;
            $codcharge      = $request->codCharge + $extracodcharge;
        } else {
            $codcharge = $request->codCharge;
        }

        $update_parcel                   = Parcel::find($request->hidden_id);
        $update_parcel->invoiceNo        = $request->invoiceNo;
        $update_parcel->merchantId       = $merchantId;
        $update_parcel->cod              = $request->cod;
        $update_parcel->percelType       = $request->percelType;
        $update_parcel->recipientName    = $request->name;
        $update_parcel->recipientAddress = $request->address;
        $update_parcel->recipientPhone   = $request->phoneNumber;
        $update_parcel->productWeight    = $weight;
        $update_parcel->note             = $request->note;
        $update_parcel->reciveZone       = $request->reciveZone;
        $update_parcel->deliveryCharge   = $deliverycharge;
        $update_parcel->codCharge        = $codcharge;
        $update_parcel->orderType        = $request->package;
        $update_parcel->merchantAmount   = ($request->cod) - ($deliverycharge + $codcharge);
        $update_parcel->merchantDue      = ($request->cod) - ($deliverycharge + $codcharge);
        $update_parcel->codType          = 1;
        $update_parcel->save();

        return ["success" => true, "message" => "Thanks! your parcel update successfully"];
    }

    function payments($id) {
        $merchantInvoice = DB::table('merchantpayments')
            ->join('parcels', 'parcels.id', 'merchantpayments.parcelId')
            ->selectRaw('count(merchantpayments.id) as total_parcel,sum(parcels.merchantPaid) as total, merchantpayments.updated_at')
            ->groupBy('merchantpayments.updated_at')
            ->where('merchantpayments.merchantId', $id)
//            ->orderBy('merchantpayments.updated_at', 'DESC')
            ->get();
            /*->map(function ($inv) use ($id) {
                $updated_at = Carbon::make($inv->updated_at)->format('Y-m-d H:i:s.'.$id);
                return [
                    'total_parcel' => $inv->total_parcel,
                    'total' => $inv->total,
                    'updated_at' => $updated_at,
                ];
            })*/

        return $merchantInvoice;
    }

    function parcelPayments(Request $request) {
        $update = $request->update;
        Log::info($request);
        Log::info(json_decode(request()->getContent(), true));
        $parcelId = Merchantpayment::where('updated_at', $update)->pluck('parcelId')->toArray();
        $parcels  = DB::table('parcels')->whereIn('id', $parcelId)->get();

        return $parcels;
    }

    function parceltrack($trackid) {
        $trackparcel = DB::table('parcels')
            ->join('nearestzones', 'parcels.reciveZone', '=', 'nearestzones.id')
            ->where('parcels.trackingCode', 'LIKE', '%' . $trackid . "%")
            ->select('parcels.*', 'nearestzones.zonename')
            ->orderBy('id', 'DESC')
            ->first();

        if ($trackparcel) {
            //   $trackInfos = Parcelnote::where('parcelId',$trackparcel->id)->orderBy('id','ASC')->get();
            // $parceldetails = DB::table('parcels')
            // ->join('nearestzones', 'parcels.reciveZone', '=', 'nearestzones.id')
            // ->where(['parcels.merchantId' => Session::get('merchantId'), 'parcels.id' => $id])
            // ->select('parcels.*', 'nearestzones.zonename')
            // ->first();
        $trackInfos = Parcelnote::where('parcelId', $trackparcel->id)->orderBy('id', 'ASC')->with('notes')->get();


            // $trackInfos = DB::table('parcelnotes')
            //     ->join('notes', 'parcelnotes.note', '=', 'notes.id')
            //     ->where('parcelId', $trackparcel->id)
            //     ->select('parcelnotes.*', 'notes.title as noteTitle')
            //     ->orderBy('id', 'ASC')
            //     ->get();

            $parceldetails = DB::table('parcels')
                ->join('merchants', 'merchants.id', '=', 'parcels.merchantId')
                ->where('parcels.id', $trackparcel->id)
                ->select('parcels.*', 'merchants.firstName', 'merchants.lastName', 'merchants.phoneNumber', 'merchants.emailAddress', 'merchants.companyName', 'merchants.status as mstatus', 'merchants.id as mid')
                ->first();

            return ["success" => true, "message" => "Parcel Found", "data" => $trackInfos, "parcel" => $parceldetails];
        } else {
            return ["success" => false, "message" => "Parcel not found", "data" => null];
        }

    }

//   public function inovicedetails($id){

//         $invoiceInfo = Merchantpayment::find($id);

//         $inovicedetails = Parcel::where('paymentInvoice',$id)->get();

//         return view('frontEnd.layouts.pages.merchant.inovicedetails',compact('inovicedetails','invoiceInfo'));
//     }

    public function merchantSupport(Request $request) {
        $merchantId = $request->header('id');

        $this->validate($request, [
            'subject'     => 'required',
            'description' => 'required',
        ]);
        $findMerchant = Merchant::find($merchantId);

        // return $findMerchant;

        $data = [
            'subject'     => $request->subject,
            'description' => $request->description,
            'firstName'   => $findMerchant->firstName,
            'phoneNumber' => $findMerchant->phoneNumber,
            'id'          => $findMerchant->id,
        ];

        $send = Mail::send('frontEnd.emails.support', $data, function ($textmsg) use ($data) {
            $textmsg->from('zadumia441@gmail.com');
            $textmsg->to('support@zuri.express');
            $textmsg->subject($data['description']);
        });

        if ($send) {
            return ["success" => true, "message" => "Message sent successfully!"];
        } else {
            return ["success" => false, "message" => "Message sent successfully"];
        }

    }

}
