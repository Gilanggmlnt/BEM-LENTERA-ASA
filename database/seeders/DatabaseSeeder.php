<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            KementerianSeeder::class,
            JabatanSeeder::class,
            FungsionarisSeeder::class,
            ProkerSeeder::class,
            AgendaSeeder::class,
            AdminSeeder::class,
        ]);

    }
}
