<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\PoliSeeder;
use Database\Seeders\PasienSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'zaidan',
            'email' => 'zpr7002@gmail.com',
            'password' => bcrypt('zai'),
        ]);
        $this->call(PasienSeeder::class);
        $this->call(PoliSeeder::class);
    }
}
