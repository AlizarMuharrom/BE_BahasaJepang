<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'fullname' => 'Alizar Muharrom',
                'username' => 'AllromGaming',
                'email' => 'alizar@gmail.com',
                'password' => 'Alizar123'
            ]
        ];
        foreach ($users as $user) {
            User::create(
                $user
            );
        }
    }
}
