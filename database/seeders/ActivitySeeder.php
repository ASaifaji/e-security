<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Activity::create([
            'user_id' => rand(1, 3),
            'type' => 'primary',
            'description' => 'User created ticket TCKT-202602-001',
            'created_at' => now()->subDays(rand(0, 6)),
            'updated_at' => now()->subDays(rand(0, 6)),
        ]);

        Activity::create([
            'user_id' => rand(1, 3),
            'type' => 'secondary',
            'description' => 'User updated ticket TCKT-202602-001',
            'created_at' => now()->subDays(rand(0, 6)),
            'updated_at' => now()->subDays(rand(0, 6)),
        ]);

        Activity::create([
            'user_id' => rand(1, 3),
            'type' => 'danger',
            'description' => 'User closed ticket TCKT-202602-001',
            'created_at' => now()->subDays(rand(0, 6)),
            'updated_at' => now()->subDays(rand(0, 6)),
        ]);

        Activity::create([
            'user_id' => rand(1, 3),
            'type' => 'warning',
            'description' => 'User reopened ticket TCKT-202602-001',
            'created_at' => now()->subDays(rand(0, 6)),
            'updated_at' => now()->subDays(rand(0, 6)),
        ]);
    }
}
