<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiMerchant;
use App\Http\Controllers\Api\ApiDeliveryman;
use App\Http\Controllers\Api\ApiMerchantDashboard;
use App\Http\Controllers\Api\ApiMerchantTopup;
use App\Http\Controllers\Api\ApiMerchantSummary;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\MerchantParcelController;
use App\Http\Controllers\Api\MerchantWalletController;
use App\Http\Controllers\Api\ParcelTrackController;
use App\Http\Controllers\Api\ApiKeyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::post('merchant/login', [ApiMerchant::class,"login"]);

Route::post('merchant/otpverify', [ApiMerchant::class,"phoneVerify"]);

// Merchant Registration with OTP
// Route::post('/merchant/register', [ApiMerchant::class, 'register']);
Route::post('/merchant/verify-otp', [ApiMerchant::class, 'verifyOtp']);
Route::post('/merchant/register', [ApiMerchant::class, 'register']);  

//Registration step:1
Route::post('merchant/request-otp', [ApiMerchant::class, 'requestEmailOtp']);
//Registration step:2
Route::post('/merchant/otp/verify', [ApiMerchant::class, 'otpVerify']);
//Registration step:3
Route::post('merchant/register-with-otp', [ApiMerchant::class, 'registerWithOtp']);
 


// Route::post('merchant/register', [ApiMerchant::class,"register"]);
Route::post('merchant/password/reset', [ApiMerchant::class,"passwordReset"]);
Route::post('merchant/password/verify', [ApiMerchant::class,"verifyAndChangePassword"]);
Route::post('merchant/password/change', [ApiMerchant::class, "changePassword"]);
Route::post('merchant/password/email-reset', [ApiMerchant::class, 'requestEmailPasswordReset']);
Route::post('merchant/password/email-verify', [ApiMerchant::class, 'verifyEmailPasswordReset']);
// Route::get('merchant/dashboard/test/report/{id}', [ApiMerchant::class,"dashboardTest"]);
// Route::get('merchant/dashboard/test2/report/{id}', [ApiMerchant::class,"dashboardTest2"]);

Route::middleware('auth:merchant')->group(function () { 
    Route::post('merchant/logout', [ApiMerchant::class,"logout"]);
    Route::post('refresh', [ApiMerchant::class, 'refresh']);
    Route::get('merchant/profile', [ApiMerchant::class,"profile"]);
    Route::get('charge/get', [ApiMerchant::class,"getPackageCharges"]);
    Route::get('merchant/topup-history',[ApiMerchant::class,"topupHistory"]);
    Route::get('merchant/dashboard/report', [ApiMerchant::class,"dashboard"]);
    Route::put('merchant/profile/update', [ApiMerchant::class,"profileUpdate"]);
    Route::post('merchant/store-payment', [ApiMerchant::class,"storePayment"]);
    Route::put('merchant/parcel/update', [ApiMerchant::class,"parcelupdate"]);
    Route::post('merchant/tax-charge', [ApiMerchant::class, 'calculateTaxCharge']);
    Route::post('merchant/cod-charge', [ApiMerchant::class, 'calculateCodCharge']);
    Route::post('merchant/parcel/create', [ApiMerchant::class,"createParcel"]);
    Route::post('merchant/delivery-charge', [ApiMerchant::class, 'calculateDeliveryCharge']);
    Route::post('merchant/pickup/request', [ApiMerchant::class,"pickupRequest"]);
    Route::post('merchant/parcel/payments', [ApiMerchant::class,"parcelPayments"]);
    Route::get('merchant/parcel/invoice/{id}', [ApiMerchant::class, 'parcelInvoiceApi']);
    Route::get('merchant/payments/{merchant_id}', [ApiMerchant::class,"payments"]);
    Route::get('merchant/pickup/{startFrom}', [ApiMerchant::class,"pickup"]);
    Route::get('merchant/parcels/{startFrom}', [ApiMerchant::class,"parcels"]);
    Route::get('merchant/parcel/{id}', [ApiMerchant::class,"parceldetails"]);
    Route::get('merchant/parcel/out-for-delivery', [ApiMerchant::class, 'parcelsOutForDelivery']);
    
    Route::get('parcel/track/{trackid}', [ApiMerchant::class,"parceltrack"]);
    Route::get('nearestZone/{state}', [ApiMerchant::class,"nearestZone"]);
    Route::get('parcelType', [ApiMerchant::class,"parcelType"]);
    Route::get('merchant/notice',[ApiMerchant::class,"notice"]);
    Route::post('merchant/support',[ApiMerchant::class,"merchantSupport"]);
    Route::get('merchant/return-payments', [ApiMerchant::class, 'apiReturnPayments']);
    Route::get('merchant/remittance-payments', [ApiMerchant::class, 'remittancePayments']);
    Route::get('merchant/get-status', [ApiMerchant::class, 'getMerchantStatus']);
    Route::get('merchant/dashboard/shipments', [ApiMerchantDashboard::class, 'recentShipments']);
    Route::get('merchant/dashboard/summary', [ApiMerchantSummary::class, 'summary']);
    Route::get('merchant/get/topup', [ApiMerchantTopup::class, 'getTopup']);
    Route::get('merchant/parcel-list', [MerchantParcelController::class, 'index']);
    Route::get('merchant/parcel-list-month/{slug}', [MerchantParcelController::class, 'parcelListMonth']);
    Route::get('merchant/parcel-list-full/{slug}', [MerchantParcelController::class, 'parcelList']);
    Route::get('merchant/wallet-history', [MerchantWalletController::class, 'history']);
    Route::post('merchant/payment/return-invoice-details', [MerchantWalletController::class, 'returnInvoiceDetails']);
    Route::get('merchant/parcel/pending', [ApiMerchant::class, 'pendingParcels']);
    Route::get('merchant/subscriptions', [ApiMerchant::class, 'subscriptions']);
    Route::get('subscription-plans', [ApiMerchant::class, 'subscriptionPlans']);
    Route::get('merchant/bank-account', [ApiMerchant::class, 'getBankAccount']);
    Route::put('merchant/bank-account', [ApiMerchant::class, 'updateBankAccount']);
    Route::get('merchant/subscription-history', [ApiMerchant::class, 'subscriptionHistory']);
    Route::post('merchant/same-day-pickup-request', [ApiMerchant::class, 'sameDayPickupRequest']);
    Route::get('merchant/dashboard/current-month-stats', [ApiMerchant::class, 'currentMonthStats']);




});
// Route::get('merchant/profile', [ApiMerchant::class,"profile"]);

//not required 

Route::get('services/choose', [ApiMerchant::class,"chooseservice"]);
Route::get('service', [ApiMerchant::class,"getServiceBySlug"]);
Route::get('service/{id}', [ApiMerchant::class,"getServiceById"]);
Route::get('cod/get', [ApiMerchant::class,"getCodCharge"]);


























//temp
// Route::post('admin/merchant-active-inactive', [ApiMerchant::class, 'adminMerchantStatusChange']);



// Recent shipment status updates for merchant dashboard (mobile)


// Merchant dashboard summary for mobile (Next Payout, Returned-To-Merchant Due, Overall Paid Amount)


// Get topup history for merchant (mobile)


// Make a new topup for merchant (mobile)
//Route::post('merchant/topup', [ApiMerchantTopup::class, 'makeTopup']);

Route::get('notes', [ApiDeliveryman::class,"getNotes"]);
Route::post('deliveryman/login', [ApiDeliveryman::class,"login"]);
Route::post('deliveryman/password/reset', [ApiDeliveryman::class,"passwordReset"]);
Route::post('deliveryman/password/verify', [ApiDeliveryman::class,"verifyAndChangePassword"]);
Route::get('deliveryman/dashboard/report', [ApiDeliveryman::class,"dashboard"]);
Route::get('deliveryman/{id}', [ApiMerchant::class,"deliveryman"]);
Route::post('deliveryman/parcels/{search}', [ApiDeliveryman::class,"parcels"]);
Route::post('deliveryman/parcel/{parcelId}', [ApiDeliveryman::class,"parcel"]);
Route::post('deliveryman/parcel/status/update', [ApiDeliveryman::class,"parcelStatusUpdate"]);
Route::post('deliveryman/pickups/{search}', [ApiDeliveryman::class,"pickups"]);
Route::post('deliveryman/pickup/{pickupId}', [ApiDeliveryman::class,"pickup"]);
Route::post('deliveryman/pickup/status/update', [ApiDeliveryman::class,"pickupStatusUpdate"]);

Route::get('cities', [LocationController::class, 'cities']);
Route::get('cities/{city}/towns', [LocationController::class, 'towns']);
















// Public API Key routes (no auth)
Route::get('api-keys', [ApiKeyController::class, 'index']);
Route::post('api-keys/{id}', [ApiKeyController::class, 'update']);
Route::get('track/parcel/{trackid}', [ParcelTrackController::class, 'track']);