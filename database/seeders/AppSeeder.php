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
            'type' => 'New',
            'user_id' => 4,
        ]);

        App::create([
            'name' => 'Web Application 2 (marketing)',
            'type' => 'Existing',
            'user_id' => 3,
        ]);
    }
}
