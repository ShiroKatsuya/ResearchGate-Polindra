<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ResearchSeeder;
use Database\Seeders\PublikasiSeeder;
use Database\Seeders\ProyekSeeder;
use Database\Seeders\PerankatLunakSeeder;
use Database\Seeders\NewsCategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            // Seed base data first (includes students)
            ResearchSeeder::class,
            NewsCategorySeeder::class,
            ProyekSeeder::class,
            PerankatLunakSeeder::class,
            PublikasiSeeder::class,
            BeritaSeeder::class,
            PerkenalanSeeder::class,
            
        ]);
    }
}
