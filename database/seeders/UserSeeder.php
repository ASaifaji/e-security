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
            'name' => 'Super Admin',
            'email' => 'admin@helpdesk.com',
            'password' => Hash::make('abcd1234'),
            'role_id' => 1,
            'department_id' => 1,
            'is_active' => true,
        ]);

        User::create([
            'name' => 'test teknisi',
            'email' => 'tech@helpdesk.com',
            'password' => Hash::make('abcd1234'),
            'role_id' => 2,
            'department_id' => 1,
            'is_active' => true,
        ]);
    }
}
