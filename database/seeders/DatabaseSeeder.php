<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        if (User::whereEmail('admin@admin.com')->count() < 1)
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'password' =>bcrypt('password'),
        ]);
    }
}
