<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Agreement;
use App\Models\AgreementItem;
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

        // if not in production
        if (app()->environment() !== 'production') {
            // create fake data
            User::factory(10)->create()->each(function ($user) {
                Agreement::factory(rand(1, 3))->create(['created_by' => $user->id])->each(function ($agreement) {
                    AgreementItem::factory(rand(1, 5))->create(['agreement_id' => $agreement->id]);
                });
            });
        }

    }
}
