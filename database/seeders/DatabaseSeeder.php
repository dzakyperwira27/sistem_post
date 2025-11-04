<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory()->create([
            'name' => 'dzaky',
            'email' => 'dzaky@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        User::factory()->create([
            'name' => 'dzikra',
            'email' => 'dzikra@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        User::factory()->create([
            'name' => 'daffa',
            'email' => 'daffa@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        User::factory()->create([
            'name' => 'danish',
            'email' => 'danish@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        User::factory()->create([
            'name' => 'dzahira',
            'email' => 'dzahira@gmail.com',
            'password' => Hash::make('admin123'),
        ]);
    }
}
