<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // First create the admin
        User::factory()->admin()->create();

        // Then generate fake urls related to that admin 
        $this->call([
            UrlSeeder::class,
        ]);
    }
}
