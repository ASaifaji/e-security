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
            'ticket_number' => 'TCKT-202602-001',
            'subject' => 'Sample Ticket 1',
            'description' => 'This is a sample ticket description.',
            'vulnerability_details' => null,
            'app_id' => 1,
            'requester_id' => 2,
            'assigned_id' => 3,
            'priority_id' => 1,
            'severity_id' => 2,
            'status_id' => 4,
            'resolved_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Ticket::create([
            'ticket_number' => 'TCKT-202602-002',
            'subject' => 'Sample Ticket 2',
            'description' => 'This is a sample ticket description 2.',
            'vulnerability_details' => null,
            'app_id' => 2,
            'requester_id' => 2,
            'assigned_id' => 3,
            'priority_id' => 3,
            'severity_id' => 1,
            'status_id' => 1,
            'resolved_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Ticket::create([
            'ticket_number' => 'TCKT-202602-003',
            'subject' => 'Sample Ticket 3',
            'description' => 'This is a sample ticket description 3.',
            'vulnerability_details' => null,
            'app_id' => 2,
            'requester_id' => 2,
            'assigned_id' => 3,
            'priority_id' => 3,
            'severity_id' => 1,
            'status_id' => 2,
            'resolved_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Ticket::create([
            'ticket_number' => 'TCKT-202602-004',
            'subject' => 'Sample Ticket 4',
            'description' => 'This is a sample ticket description 4.',
            'vulnerability_details' => null,
            'app_id' => 2,
            'requester_id' => 2,
            'assigned_id' => 4,
            'priority_id' => 1,
            'severity_id' => 4,
            'status_id' => 1,
            'resolved_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
