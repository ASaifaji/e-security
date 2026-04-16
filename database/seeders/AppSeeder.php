<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\App;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App::create([
            'name' => 'Web Application 1 (2025)',
            'user_id' => 4,
        ]);

        App::create([
            'name' => 'Web Application 2 (marketing)',
            'user_id' => 3,
        ]);
    }
}
