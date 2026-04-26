<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::unguarded(function () {
            User::updateOrCreate(
                ['email' => 'amorosijavier@gmail.com'],
                [
                    'name' => 'Javier Admin',
                    'password' => Hash::make('password'),
                    'is_admin' => true,
                ]
            );
        });
    }
}
