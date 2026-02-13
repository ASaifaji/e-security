<?php

namespace Database\Seeders;

use App\Models\Severity;
use Illuminate\Database\Seeder;

class SeveritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Severity::create(['name' => 'Critical']);
        Severity::create(['name' => 'Major']);
        Severity::create(['name' => 'Moderate']);
        Severity::create(['name' => 'Low']);
    }
}
