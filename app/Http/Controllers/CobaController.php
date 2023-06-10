<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\BusChair;
use App\Models\ChairName;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class CobaController extends Controller
{
    public function coba()
    {
        // $role = User::find($user)->userRole()->first();
        // $findChair = ChairName::where('name', 'A1')->first();
        // $coba = ChairName::find($findChair->id)->busChair()->where('buses_id', 2)->first();
        // $price = Bus::where('name', 'Bus Pertama')->first();
        // $attribute['row_active'] = true;
        // $findChair->update($attribute);
        // $coba = Db::table('bus_chairs')->insert([
        //     'buses_id' => 2,
        //     'chair_name_id' => 3
        // ]);

        // $coba = BusChair::where('buses_id', 2)->where('chair_name_id', 3)->first();
        $coba = Role::all();
        return $coba;
    }
}
