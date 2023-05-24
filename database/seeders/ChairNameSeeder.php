<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChairNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chair_names')->insert([
            'name' => 'A1',
            'chair_type_id' => 1,
            'price' => '10000',
            'price' => '10000',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('chair_names')->insert([
            'name' => 'A2',
            'chair_type_id' => 1,
            'price' => '10000',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('chair_names')->insert([
            'name' => 'B1',
            'chair_type_id' => 1,
            'price' => '10000',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('chair_names')->insert([
            'name' => 'B2',
            'chair_type_id' => 1,
            'price' => '10000',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('chair_names')->insert([
            'name' => 'C1',
            'chair_type_id' => 1,
            'price' => '10000',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('chair_names')->insert([
            'name' => 'C2',
            'chair_type_id' => 1,
            'price' => '10000',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('chair_names')->insert([
            'name' => 'D1',
            'chair_type_id' => 1,
            'price' => '10000',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('chair_names')->insert([
            'name' => 'D2',
            'chair_type_id' => 1,
            'price' => '10000',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('chair_names')->insert([
            'name' => 'E1',
            'chair_type_id' => 2,
            'price' => '10000',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('chair_names')->insert([
            'name' => 'E2',
            'chair_type_id' => 2,
            'price' => '10000',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('chair_names')->insert([
            'name' => 'F1',
            'chair_type_id' => 2,
            'price' => '10000',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('chair_names')->insert([
            'name' => 'F2',
            'chair_type_id' => 2,
            'price' => '10000',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('chair_names')->insert([
            'name' => 'G1',
            'chair_type_id' => 3,
            'price' => '10000',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('chair_names')->insert([
            'name' => 'G2',
            'chair_type_id' => 3,
            'price' => '10000',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('chair_names')->insert([
            'name' => 'H1',
            'chair_type_id' => 3,
            'price' => '10000',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('chair_names')->insert([
            'name' => 'H2',
            'chair_type_id' => 3,
            'price' => '10000',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
