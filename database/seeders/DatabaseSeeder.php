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

        $this->call([
            TagSeeder::class,
        ]);

        $this->call([
            CategorySeeder::class,
        ]);

        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User1',
        //     'email' => 'test1@example.com',
        // ]);

        User::factory()->create([
            'name' => 'dzaky',
            'email' => 'dzaky1@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        User::factory()->create([
            'name' => 'daffa',
            'email' => 'daffa1@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        User::factory()->create([
            'name' => 'dzikra',
            'email' => 'dzikra1@gmail.com',
            'password' => Hash::make('admin123'),
        ]);



        User::factory()->create([
            'name' => 'danish',
            'email' => 'danish1@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        User::factory()->create([
            'name' => 'dzahira',
            'email' => 'dzahira1@gmail.com',
            'password' => Hash::make('admin123'),
        ]);
    }
}
