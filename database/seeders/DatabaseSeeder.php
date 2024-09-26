<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
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

        // if admin user does not exist, create one
        if (!User::where('email', 'admin@buyback.org')->exists()) {
            // create admin
            User::factory()->create([
                'name' => 'Admin User',
                'email' => 'admin@buyback.org',
                'password' => Hash::make('Gluten3-Tissue7-Bookmark3'),
                'role' => 'admin',
            ]);
        }


    }
}
