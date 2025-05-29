<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RemainTopup;
use App\Parcel;

class MerchantWalletController extends Controller
{
    // Get paginated wallet usage history for a merchant
    public function history(Request $request)
    {
        $merchantId = $request->header('id') ?? $request->query('merchant_id');
        $perPage = $request->query('per_page', 10);
        if (!$merchantId) {
            return response()->json(['success' => false, 'message' => 'Merchant id required.'], 400);
        }
        $transactions = RemainTopup::where('merchant_id', $merchantId)
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        $data = $transactions->map(function($tx) {
            $recipientInfo = 'Manual by Admin. (Deduction)';
            if ($tx->parcel_id) {
                $parcel = Parcel::find($tx->parcel_id);
                if ($parcel) {
                    $recipientInfo = $parcel->recipientName;
                    // Optionally add status (DELIVERED, CANCELLED, etc.)
                    if ($parcel->status == 4) {
                        $recipientInfo .= ' DELIVERED';
                    } elseif ($parcel->status == 3) {
                        $recipientInfo .= ' CANCELLED';
                    }
                }
            }
            return [
                'recipient_info' => $recipientInfo,
                'amount' => $tx->amount,
                'created_at' => $tx->created_at->format('Y-m-d H:i:s'),
            ];
        });

        return response()->json([
            'success' => true,
            'transactions' => $data,
            'pagination' => [
                'current_page' => $transactions->currentPage(),
                'last_page' => $transactions->lastPage(),
                'per_page' => $transactions->perPage(),
                'total' => $transactions->total(),
            ]
        ]);
    }
} 