<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proyek;
use App\Models\Student;

class ProyekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get or create students for foreign key relation
        $students = collect([
            ['name' => 'Adi Wijaya', 'year_of_graduation' => 2023, 'email' => 'adi@example.com', 'phone' => '628111111111', 'program_study' => 'Teknik Informatika'],
            ['name' => 'Budi Santoso', 'year_of_graduation' => 2024, 'email' => 'budi@example.com', 'phone' => '628122222222', 'program_study' => 'Teknik Informatika'],
            ['name' => 'Citra Lestari', 'year_of_graduation' => 2022, 'email' => 'citra@example.com', 'phone' => '628133333333', 'program_study' => 'Teknik Informatika'],
        ])->map(fn($s) => Student::firstOrCreate(['email' => $s['email']], $s));

        // Sample projects based on migration fields
        $proyeks = [
            [
                'title' => 'Sistem Informasi Akademik',
                'description' => 'Aplikasi untuk manajemen data akademik kampus.',
                'status' => 'berjalan',
                'start_date' => now()->subMonths(6)->toDateString(),
                'end_date' => null,
                'repository_url' => 'https://github.com/example/akademik',
                'website_url' => 'https://akademik.example.com',
                'student_id' => $students[0]->id,
            ],
            [
                'title' => 'Aplikasi Monitoring Kesehatan',
                'description' => 'Aplikasi mobile untuk monitoring kesehatan harian.',
                'status' => 'selesai',
                'start_date' => now()->subMonths(12)->toDateString(),
                'end_date' => now()->subMonths(2)->toDateString(),
                'repository_url' => 'https://github.com/example/monitoring-kesehatan',
                'website_url' => 'https://health-monitor.example.com',
                'student_id' => $students[1]->id,
            ],
            [
                'title' => 'Website E-Learning',
                'description' => 'Platform pembelajaran daring untuk mahasiswa.',
                'status' => 'tertunda',
                'start_date' => now()->subMonths(3)->toDateString(),
                'end_date' => null,
                'repository_url' => null,
                'website_url' => null,
                'student_id' => $students[2]->id,
            ],
            [
                'title' => 'Sistem Rekomendasi Buku',
                'description' => 'Sistem rekomendasi buku berbasis collaborative filtering.',
                'status' => 'berjalan',
                'start_date' => now()->subMonths(2)->toDateString(),
                'end_date' => null,
                'repository_url' => 'https://github.com/example/rekomendasi-buku',
                'website_url' => 'https://book-recommender.example.com',
                'student_id' => $students[0]->id,
            ],
            [
                'title' => 'Aplikasi Absensi QR Code',
                'description' => 'Aplikasi absensi menggunakan QR Code untuk kehadiran mahasiswa.',
                'status' => 'berjalan',
                'start_date' => now()->subMonths(4)->toDateString(),
                'end_date' => null,
                'repository_url' => 'https://github.com/example/absensi-qr',
                'website_url' => 'https://qr-attendance.example.com',
                'student_id' => $students[1]->id,
            ],
            [
                'title' => 'Sistem Penjadwalan Kuliah',
                'description' => 'Sistem otomatisasi penjadwalan kuliah berbasis web.',
                'status' => 'selesai',
                'start_date' => now()->subMonths(10)->toDateString(),
                'end_date' => now()->subMonths(1)->toDateString(),
                'repository_url' => 'https://github.com/example/penjadwalan-kuliah',
                'website_url' => 'https://schedule.example.com',
                'student_id' => $students[2]->id,
            ],
            [
                'title' => 'Aplikasi Pengingat Tugas',
                'description' => 'Aplikasi mobile untuk mengingatkan deadline tugas mahasiswa.',
                'status' => 'berjalan',
                'start_date' => now()->subMonths(1)->toDateString(),
                'end_date' => null,
                'repository_url' => 'https://github.com/example/pengingat-tugas',
                'website_url' => 'https://task-reminder.example.com',
                'student_id' => $students[0]->id,
            ],
            [
                'title' => 'Portal Alumni',
                'description' => 'Website untuk jaringan alumni dan lowongan kerja.',
                'status' => 'tertunda',
                'start_date' => now()->subMonths(5)->toDateString(),
                'end_date' => null,
                'repository_url' => null,
                'website_url' => null,
                'student_id' => $students[1]->id,
            ],
            [
                'title' => 'Sistem Inventaris Lab',
                'description' => 'Aplikasi untuk mengelola inventaris laboratorium komputer.',
                'status' => 'selesai',
                'start_date' => now()->subMonths(8)->toDateString(),
                'end_date' => now()->subMonths(3)->toDateString(),
                'repository_url' => 'https://github.com/example/inventaris-lab',
                'website_url' => 'https://lab-inventory.example.com',
                'student_id' => $students[2]->id,
            ],
            [
                'title' => 'Aplikasi Pengelolaan Perpustakaan',
                'description' => 'Sistem manajemen perpustakaan digital.',
                'status' => 'berjalan',
                'start_date' => now()->subMonths(7)->toDateString(),
                'end_date' => null,
                'repository_url' => 'https://github.com/example/perpustakaan',
                'website_url' => 'https://library.example.com',
                'student_id' => $students[0]->id,
            ],
            [
                'title' => 'Sistem Pengelolaan UKM',
                'description' => 'Aplikasi untuk pengelolaan Unit Kegiatan Mahasiswa.',
                'status' => 'tertunda',
                'start_date' => now()->subMonths(9)->toDateString(),
                'end_date' => null,
                'repository_url' => null,
                'website_url' => null,
                'student_id' => $students[0]->id,
            ],
            [
                'title' => 'Aplikasi Pengajuan Beasiswa',
                'description' => 'Sistem pengajuan dan seleksi beasiswa mahasiswa.',
                'status' => 'berjalan',
                'start_date' => now()->subMonths(3)->toDateString(),
                'end_date' => null,
                'repository_url' => 'https://github.com/example/pengajuan-beasiswa',
                'website_url' => 'https://scholarship.example.com',
                'student_id' => $students[1]->id,
            ],
            [
                'title' => 'Website Event Kampus',
                'description' => 'Portal informasi dan pendaftaran event kampus.',
                'status' => 'selesai',
                'start_date' => now()->subMonths(11)->toDateString(),
                'end_date' => now()->subMonths(1)->toDateString(),
                'repository_url' => 'https://github.com/example/event-kampus',
                'website_url' => 'https://campus-events.example.com',
                'student_id' => $students[2]->id,
            ],
        ];

        foreach ($proyeks as $proyek) {
            Proyek::updateOrCreate(
                ['title' => $proyek['title']],
                $proyek
            );
        }
    }
}
