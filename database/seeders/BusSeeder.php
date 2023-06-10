<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('buses')->insert([
            'name' => 'Bus Pertama',
            'type' => 'Bus Listrik',
            'origin_destination' => 'Halte Kenjeran -> Halte Merr',
            'price' => '10000',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('buses')->insert([
            'name' => 'Bus Kedua',
            'type' => 'Bus Listrik',
            'origin_destination' => 'Halte ITS -> Halte UNESA',
            'price' => '15000',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('buses')->insert([
            'name' => 'Bus Ketiga',
            'type' => 'Bus Listrik',
            'origin_destination' => 'Terminal Purabaya -> Terminal Rajawali',
            'price' => '5000',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('buses')->insert([
            'name' => 'Bus Keempat',
            'type' => 'Bus Listrik',
            'origin_destination' => 'Halte Pens -> Halte Simpang',
            'price' => '5000',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
