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
            'first_name' => 'Manager/Team Lead',
            'last_name' => '1',
            'email' => 'team@helpdesk.com',
            'password' => Hash::make('abcd1234'),
            'role_id' => 2,
            'department_id' => 1,
            'is_active' => true,
        ]);

        User::create([
            'first_name' => 'First',
            'last_name' => 'Programmer',
            'email' => 'user1@helpdesk.com',
            'password' => Hash::make('abcd1234'),
            'role_id' => 3,
            'department_id' => 1,
            'is_active' => true,
        ]);

        User::create([
            'first_name' => 'Second',
            'last_name' => 'Programmer',
            'email' => 'user2@helpdesk.com',
            'password' => Hash::make('abcd1234'),
            'role_id' => 3,
            'department_id' => 1,
            'is_active' => true,
        ]);
    }
}
