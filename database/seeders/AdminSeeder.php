<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['username' => 'admin123'],
            [
                'name' => 'Admin BEM',
                'email' => 'admin@bempolines.org',
                'password' => Hash::make('gueadmin2526'),
            ]
        );
    }
}
