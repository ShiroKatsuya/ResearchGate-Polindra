<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NewsCategory;

class NewsCategorySeeder extends Seeder
{
    public function run(): void
    {
        $defaults = [
            ['name' => 'Pengumuman', 'slug' => 'pengumuman'],
            ['name' => 'Prestasi', 'slug' => 'prestasi'],
            ['name' => 'Kegiatan', 'slug' => 'kegiatan'],
            ['name' => 'Lainnya', 'slug' => 'lainnya'],
        ];

        foreach ($defaults as $item) {
            NewsCategory::firstOrCreate(
                ['slug' => $item['slug']],
                ['name' => $item['name']]
            );
        }
    }
}


