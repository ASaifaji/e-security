<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            [
                'name' => 'Hardware',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Software',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Network',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Security',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
