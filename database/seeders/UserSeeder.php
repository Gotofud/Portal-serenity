<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Role Seeder
        $role = [
            ['name' => 'Super Admin'],
            ['name' => 'Admin'],
            ['name' => 'Resident'],
        ];

        foreach ($role as $roles) {
            \App\Models\Master\Role::create($roles);
        }
        
        // Account Seeder
         $account = [
            [
                'name' => 'Gotofud',
                'email' => 'sa@serenity.com',
                'role_id' => 1,
                'is_verified' => 1,
                'email_verified_at' => now(),
                'password' => bcrypt('serenity12345'),
            ],
        ];


        foreach ($account as $users) {
            \App\Models\User::create($users);
        }
    }
}
