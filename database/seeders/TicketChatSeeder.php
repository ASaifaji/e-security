<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ticket;
use App\Models\User;
use App\Models\TicketChat;
use App\Models\TicketAttachment;
use Faker\Factory as Faker;

class TicketChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        
        $tickets = Ticket::all();
        $users = User::all();

        if ($tickets->isEmpty() || $users->isEmpty()) {
            $this->command->info('No tickets or users found. Skipping chat seeding.');
            return;
        }

        
        foreach ($tickets as $ticket) {
            
            
            $user = $users->random();
            
            $chat = TicketChat::create([
                'ticket_id' => $ticket->id,
                'user_id'   => $user->id,
                'message'   => '<p>' . $faker->paragraph . '</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            
            TicketAttachment::create([
                'chat_id'  => $chat->id,
                'user_id'  => $user->id,
                'type'     => 'image/png',       
                'path'     => 'placeholders/sample.png', 
                'filename' => 'screenshot_error_' . rand(1, 100) . '.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            
            TicketChat::create([
                'ticket_id' => $ticket->id,
                'user_id'   => $users->random()->id,
                'message'   => '<p>Thank you for the update. We are checking the logs.</p>',
                'created_at' => now()->addMinutes(5),
                'updated_at' => now()->addMinutes(5),
            ]);
        }
    }
}