<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\BusBooking;
use App\Models\BusChair;
use App\Models\ChairName;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserTransaction;
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
            'chairId' => ['required'],
            'busId' => ['required'],
        ]);

        $findChairName = ChairName::where('id', $attribute['chairId'])->first();
        $findBusName = Bus::where('id', $attribute['busId'])->first();
        // dd($findBusName);
        $rowActive = ChairName::find($findChairName->id)->busChair()->where('buses_id', $findBusName->id)->first();
        $findBus = Bus::where('id', $attribute['busId'])->first();

        if ($rowActive == false) {
            try {
                $serverKey  = config('midtrans.key');
                $orderId    = Str::uuid()->toString();

                $grossAmount = $findBus->price;

                $response = Http::withBasicAuth($serverKey, '')
                    ->post('https://app.sandbox.midtrans.com/snap/v1/transactions', [
                        'transaction_details'   => [
                            'order_id'          => $orderId,
                            'gross_amount'      => $grossAmount
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

                $busChair = BusChair::create([
                    'buses_id' => $findBus->id,
                    'chair_name_id' => $findChairName->id,
                    'row_active' => true,
                ]);

                $transaction = Transaction::create([
                    'booking_code'      => Str::random(6),
                    'total_payment'     => $grossAmount,
                    'status'            => 'BOOKED',
                    'bus_chairs_id'      => $busChair->id,
                    'midtrans_order_id' => $orderId
                ]);

                UserTransaction::create([
                    'user_id' => $user->id,
                    'transactions_id' => $transaction->id
                ]);

                return response()->json([$result]);
            } catch (\Exception $e) {
                return response()->json([
                    'message' => $e->getMessage()
                ], 500);
            }
        } else if (!$rowActive->row_active) {
            return response([
                'message' => 'Kursi sudah di booking, harap memilih kursi yang lain!'
            ], 400);
        }
    }
    public function dataBooking()
    {
        $user = Auth::user()->id;
        // $rowActive = ChairName::find($findChairName->id)->busChair()->where('buses_id', $findBusName->id)->first();
        $history = User::find($user)->userTransaction()->get();
        if ($history == null) {
            return response()->json([]);
        } else {
            return response([
                'status' => 'SUCCES',
                'message' => 'get data bookong succes',
                'data' => $history
            ]);
        }
    }
    public function delete(BusChair $bus)
    {
        // $user = Auth::user()->id;
        // $userTransaction = UserTransaction::where('user_id', $user)->first();
        // $transaction = Transaction::where('id', $userTransaction->transactions_id)->first();
        $busChair = BusChair::where('id', $bus->id)->first();
        // dd($bus->id);
        $busChair->delete();
        return "SUCCES";
    }
    public function getBus()
    {
        $data = BusChair::all();
        return response()->json([
            'data' => $data
        ]);
    }
}
