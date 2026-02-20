<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'admin@helpdesk.com',
            'password' => Hash::make('abcd1234'),
            'role_id' => 1,
            'department_id' => 1,
            'is_active' => true,
        ]);

        User::create([
            'first_name' => 'Test',
            'last_name' => 'Teknisi',
            'email' => 'tech@helpdesk.com',
            'password' => Hash::make('abcd1234'),
            'role_id' => 2,
            'department_id' => 1,
            'is_active' => true,
        ]);

        User::create([
            'first_name' => 'Test',
            'last_name' => 'User1',
            'email' => 'user1@helpdesk.com',
            'password' => Hash::make('abcd1234'),
            'role_id' => 3,
            'department_id' => 1,
            'is_active' => true,
        ]);

        User::create([
            'first_name' => 'Test',
            'last_name' => 'User2',
            'email' => 'user2@helpdesk.com',
            'password' => Hash::make('abcd1234'),
            'role_id' => 3,
            'department_id' => 1,
            'is_active' => true,
        ]);
    }
}
