<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bookings')->insert([
            'status' => 'sudah',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('bookings')->insert([
            'status' => 'belum',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
