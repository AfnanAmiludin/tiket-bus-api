<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\BusBooking;
use App\Models\ChairName;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class TiketController extends Controller
{
    public function booking(Request $request, ChairName $chairNameTable)
    {
        $user = Auth::user();
        $attribute = $request->validate([
            'name' => ['required'],
            'bank' => ['required']
        ]);
        $coba = 'aku bisa';

        $findChair = ChairName::where('name', $attribute)->first();
        if ($findChair->row_active) {
            return response([
                'message' => 'Kursi sudah di booking, harap memilih kursi yang lain!'
            ]);
        }

        try {
            DB::beginTransaction();
            $serverKey  = config('midtrans.key');
            $orderId    = Str::uuid()->toString();
            $grossAmount = $findChair->price;

            $response = Http::withBasicAuth($serverKey, '')
                ->post('https://api.sandbox.midtrans.com/v2/charge', [
                    'payment_type'          => 'bank_transfer',
                    'transaction_details'   => [
                        'order_id'          => $orderId,
                        'gross_amount'      => $grossAmount
                    ],
                    'bank_transfer'         => [
                        'bank'              => $request->bank
                    ],
                    'customer_details'      => [
                        'email'             => $user->email,
                        'first_name'        => $user->name,
                        'last_name'         => $user->name,
                    ]
                ]);

            if ($response->failed()) {
                return response()->json(['message' => 'failed charge'], 500);
            }
            $result = $response->json();
            if ($result['status_code'] != '201') {
                return response()->json(['message' => $result['status_message']], 500);
            }
            DB::table('transactions')->insert([
                'id'                => $orderId,
                'booking_code'      => Str::random(6),
                'chair_names_id'    => $findChair->id,
                'total_payment'     => $grossAmount,
                'status'            => 'BOOKED',
                'created_at'        => now(),
                'updated_at'        => now()
            ]);

            $attribute['row_active'] = true;
            $findChair->update($attribute);

            DB::commit();
            return response()->json([
                'data' => [
                    'va' => $result['va_numbers'][0]['va_number']
                ]
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function dataBooking()
    {
        $user = Auth::user()->id;
        $dataBooking = User::find($user)->busBooking()->get();
        return response([
            'status' => 'SUCCES',
            'message' => 'get data bookong succes',
            'data' => $dataBooking
        ]);
    }
}
