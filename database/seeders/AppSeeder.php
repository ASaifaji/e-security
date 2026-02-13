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
            'name' => 'Test Application',
            'type' => 'New',
            'user_id' => 1,
        ]);

        App::create([
            'name' => 'Test Application 2',
            'type' => 'Existing',
            'user_id' => 1,
        ]);
    }
}
