<?php

namespace Database\Seeders;

use App\Models\TicketType;
use Illuminate\Database\Seeder;

class TicketTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        TicketType::create([
            'name' => 'Deploy'
        ]);

        TicketType::create([
            'name' => 'Test'
        ]);

        TicketType::create([
            'name' => 'Laporan'
        ]);
    }
}
