<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChairTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chair_types')->insert([
            'type' => 'umum',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('chair_types')->insert([
            'type' => 'pregnant mother',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('chair_types')->insert([
            'type' => 'disability',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
