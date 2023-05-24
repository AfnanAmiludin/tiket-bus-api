<?php

namespace App\Http\Controllers;

use App\Models\MidtransHistory;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HandlePaymentNotifController extends Controller
{
    public function handlePayment(Request $request)
    {
        $payload = $request->all();

        Log::info('Message : incoming-midtrans', [
            'payload'   =>  $payload
        ]);

        $orderId = $payload['order_id'];
        $statusCode = $payload['status_code'];
        $grossAmount = $payload['gross_amount'];
        $reqSignature = $payload['signature_key'];
        $signature = hash(algo: 'sha512', data: $orderId . $statusCode . $grossAmount . config(key: 'midtrans.key'));

        if ($signature != $reqSignature) {
            return response()->json([
                'message' => 'invalid signature'
            ], status: 401);
        }
        $transactionStatus = $payload['transaction_status'];

        MidtransHistory::create([
            'order_id' => $orderId,
            'status' => $transactionStatus,
            'payload' => json_encode($payload),
            'user_id' => 1
        ]);

        $order = Transaction::find($orderId);
        if (!$order) {
            return response()->json([
                'message' => 'invalid order'
            ], status: 400);
        }

        if ($transactionStatus == 'settlement') {
            $order->status = 'PAID';
            $order->created_at = now();
            $order->updated_at = now();
            $order->save();
        } else if ($transactionStatus == 'expire') {
            $order->status = 'EXPIRED';
            $order->created_at = now();
            $order->updated_at = now();
            $order->save();
        }

        return response()->json([
            'message' => 'succes'
        ]);
    }
}
