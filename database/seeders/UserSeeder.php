<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create(['name' => 'Dzaky Perwira', 'email' => 'dzaky@example.com']);
        User::create(['name' => 'Aulia Rahman', 'email' => 'aulia@example.com']);
        User::create(['name' => 'Rina Putri', 'email' => 'rina@example.com']);
    }
}
