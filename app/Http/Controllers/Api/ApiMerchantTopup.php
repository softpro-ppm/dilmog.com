<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Topup;

class ApiMerchantTopup extends Controller
{
    /**
     * Get topup history for a merchant (for mobile dashboard)
     * GET /api/merchant/get/topup
     * Header: id (merchant id)
     */
    public function getTopup(Request $request)
    {
        $merchantId = $request->header('id');
        if (!$merchantId) {
            return response()->json(['success' => false, 'message' => 'Merchant id header required.'], 400);
        }
        $topups = Topup::where('merchant_id', $merchantId)
            ->orderBy('id', 'desc')
            ->get();
        return response()->json([
            'success' => true,
            'topups' => $topups
        ]);
    }

    /**
     * Make a new topup for a merchant (for mobile dashboard)
     * POST /api/merchant/topup
     * Header: id (merchant id)
     * Body: amount, reference, channel, currency, status, email, mobile
     */
    public function makeTopup(Request $request)
    {
        $merchantId = $request->header('id');
        if (!$merchantId) {
            return response()->json(['success' => false, 'message' => 'Merchant id header required.'], 400);
        }
        $request->validate([
            'amount' => 'required|numeric',
            'reference' => 'required',
            'channel' => 'required',
            'currency' => 'required',
            'status' => 'required',
            'email' => 'nullable|email',
            'mobile' => 'nullable',
        ]);
        $topup = Topup::create([
            'merchant_id' => $merchantId,
            'email'       => $request->email,
            'amount'      => $request->amount,
            'reference'   => $request->reference,
            'status'      => $request->status,
            'channel'     => $request->channel,
            'currency'    => $request->currency,
            'mobile'      => $request->mobile,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Topup created successfully.',
            'topup' => $topup
        ]);
    }
}
