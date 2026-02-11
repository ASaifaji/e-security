<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ticket;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Ticket::create([
            'ticket_number' => 'TCKT-001',
            'subject' => 'Sample Ticket 1',
            'description' => 'This is a sample ticket description.',
            'vulnerability_details' => null,
            'app_id' => 1,
            'requester_id' => 1,
            'tester_id' => 2,
            'priority_id' => 1,
            'severity_id' => 2,
            'status_id' => 1,
            'resolved_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Ticket::create([
            'ticket_number' => 'TCKT-002',
            'subject' => 'Sample Ticket 2',
            'description' => 'This is a sample ticket description 2.',
            'vulnerability_details' => null,
            'app_id' => 2,
            'requester_id' => 4,
            'tester_id' => 3,
            'priority_id' => 3,
            'severity_id' => 1,
            'status_id' => 1,
            'resolved_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
