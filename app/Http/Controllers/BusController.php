<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\ChairName;
use App\Models\ChairType;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function getBus()
    {
        $bus = Bus::all();
        return response()->json([
            'data' => $bus
        ]);
    }
    public function getBusById($bus)
    {
        $bus = Bus::where('id', $bus)->first();
        return response()->json([
            'data' => $bus
        ]);
    }
    public function getChair()
    {
        $chair = ChairName::all();
        return response()->json([
            'data' => $chair
        ]);
    }
    public function getTypeChair()
    {
        $type = ChairType::all();
        return response()->json([
            'data' => $type
        ]);
    }
}
