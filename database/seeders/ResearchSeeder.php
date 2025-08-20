<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Project;
use App\Models\Publication;
use App\Models\Software;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ResearchSeeder extends Seeder
{
    public function run(): void
    {
        // Students
        $students = collect([
            ['name' => 'Adi Wijaya', 'year_of_graduation' => 2023, 'email' => 'adi@example.com', 'phone' => '628111111111', 'program_study' => 'Teknik Informatika'],
            ['name' => 'Budi Santoso', 'year_of_graduation' => 2024, 'email' => 'budi@example.com', 'phone' => '628122222222', 'program_study' => 'Teknik Informatika'],
            ['name' => 'Citra Lestari', 'year_of_graduation' => 2022, 'email' => 'citra@example.com', 'phone' => '628133333333', 'program_study' => 'Teknik Informatika'],
        ])->map(fn($s) => Student::firstOrCreate(['email' => $s['email']], $s));

        // Publications
        foreach ($students as $i => $student) {
            Publication::updateOrCreate([
                'doi' => '10.1234/polindra.' . ($i+1),
            ], [
                'student_id' => $student->id,
                'title' => 'Penelitian Sistem Informasi ' . ($i+1),
                'journal' => 'Jurnal Teknologi Informasi',
                'published_at' => now()->subMonths(6 - $i),
                'url' => 'https://example.com/publikasi-' . ($i+1),
                'abstract' => 'Abstrak singkat penelitian mengenai pengembangan sistem informasi.',
                'keywords' => ['sistem informasi','laravel','tailwind'],
                'is_peer_reviewed' => true,
            ]);
        }

        // Projects
        foreach ($students as $i => $student) {
            Project::updateOrCreate([
                'title' => 'Project Aplikasi Kampus ' . ($i+1),
            ], [
                'student_id' => $student->id,
                'description' => 'Aplikasi untuk manajemen kegiatan kampus.',
                'repository_url' => 'https://github.com/example/repo-' . ($i+1),
                'status' => $i % 2 === 0 ? 'berjalan' : 'selesai',
                'start_date' => now()->subMonths(8 - $i),
                'end_date' => $i % 2 === 0 ? null : now()->subMonths(2),
                'tags' => ['vue','laravel','api'],
            ]);
        }

        // Software
        foreach ($students as $i => $student) {
            Software::updateOrCreate([
                'name' => 'Perangkat Lunak ' . ($i+1),
            ], [
                'student_id' => $student->id,
                'description' => 'Aplikasi web untuk kebutuhan internal kampus.',
                'repo_url' => 'https://gitlab.com/example/app-' . ($i+1),
                'website_url' => 'https://apps.example.com/' . ($i+1),
                'license' => 'MIT',
                'version' => '1.0.' . $i,
                'tech_stack' => ['laravel','tailwind','mysql'],
                'screenshots' => [],
            ]);
        }

        // News categories
        $categories = collect(['Pengumuman','Kegiatan','Prestasi'])->map(function ($name) {
            return NewsCategory::firstOrCreate(['slug' => Str::slug($name)], ['name' => $name]);
        });

        // News
        foreach (range(1,6) as $i) {
            $title = 'Berita Internal #' . $i;
            News::updateOrCreate([
                'slug' => Str::slug($title),
            ], [
                'title' => $title,
                'category_id' => $categories[$i % $categories->count()]->id,
                'content' => 'Konten berita internal Polindra mengenai kegiatan dan pengumuman terkini.',
                'published_at' => now()->subDays(10 - $i),
                'is_internal' => true,
            ]);
        }
    }
}


