<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Import the models
        // use App\Models\Berita;
        // use App\Models\NewsCategory;

        // Get categories by slug for relation
        $categories = \App\Models\NewsCategory::all()->keyBy('slug');

        // Define the current data for seeding, synchronized with the Berita model
        $beritas = [
            [
                'title' => 'Pengumuman Penerimaan Mahasiswa Baru 2024',
                'content' => 'Pendaftaran mahasiswa baru tahun ajaran 2024 telah dibuka. Silakan kunjungi website resmi untuk informasi lebih lanjut.',
                'category_id' => $categories['pengumuman']->id ?? null,
                'published_at' => now()->subDays(10),
                'slug' => 'pengumuman-penerimaan-mahasiswa-baru-2024',
            ],
            [
                'title' => 'Prestasi Mahasiswa di Kompetisi Nasional',
                'content' => 'Selamat kepada tim mahasiswa yang berhasil meraih juara 1 dalam kompetisi nasional pengembangan aplikasi.',
                'category_id' => $categories['prestasi']->id ?? null,
                'published_at' => now()->subDays(7),
                'slug' => 'prestasi-mahasiswa-di-kompetisi-nasional',
            ],
            [
                'title' => 'Kegiatan Bakti Sosial Kampus',
                'content' => 'Kampus mengadakan kegiatan bakti sosial di desa binaan sebagai bentuk pengabdian kepada masyarakat.',
                'category_id' => $categories['kegiatan']->id ?? null,
                'published_at' => now()->subDays(5),
                'slug' => 'kegiatan-bakti-sosial-kampus',
            ],
            [
                'title' => 'Workshop Pengembangan Karir',
                'content' => 'Dapatkan tips dan trik pengembangan karir di era digital melalui workshop yang akan diadakan minggu depan.',
                'category_id' => $categories['lainnya']->id ?? null,
                'published_at' => now()->subDays(3),
                'slug' => 'workshop-pengembangan-karir',
            ],
            [
                'title' => 'Informasi Libur Semester Genap',
                'content' => 'Libur semester genap akan dimulai tanggal 1 Juli 2024 hingga 31 Juli 2024.',
                'category_id' => $categories['pengumuman']->id ?? null,
                'published_at' => now()->subDay(),
                'slug' => 'informasi-libur-semester-genap',
            ],
            [
                'title' => 'Pelatihan Softskill untuk Mahasiswa',
                'content' => 'Pelatihan softskill akan diadakan pada 15 Juli 2024 di Aula Kampus. Segera daftarkan diri Anda.',
                'category_id' => $categories['kegiatan']->id ?? null,
                'published_at' => now()->subDays(2),
                'slug' => 'pelatihan-softskill-untuk-mahasiswa',
            ],
            [
                'title' => 'Pendaftaran Beasiswa Prestasi 2024',
                'content' => 'Beasiswa prestasi dibuka untuk mahasiswa aktif. Syarat dan ketentuan dapat dilihat di website kampus.',
                'category_id' => $categories['pengumuman']->id ?? null,
                'published_at' => now()->subDays(4),
                'slug' => 'pendaftaran-beasiswa-prestasi-2024',
            ],
            [
                'title' => 'Tim Robotik Juara di Ajang Internasional',
                'content' => 'Tim robotik kampus berhasil meraih juara 2 di kompetisi internasional di Singapura.',
                'category_id' => $categories['prestasi']->id ?? null,
                'published_at' => now()->subDays(6),
                'slug' => 'tim-robotik-juara-di-ajang-internasional',
            ],
            [
                'title' => 'Sosialisasi Program Magang Merdeka',
                'content' => 'Sosialisasi program magang merdeka akan dilaksanakan secara daring pada 20 Juli 2024.',
                'category_id' => $categories['kegiatan']->id ?? null,
                'published_at' => now()->subDays(8),
                'slug' => 'sosialisasi-program-magang-merdeka',
            ],
            [
                'title' => 'Pengumuman Hasil Seleksi PKM',
                'content' => 'Hasil seleksi Program Kreativitas Mahasiswa (PKM) telah diumumkan. Cek nama Anda di portal akademik.',
                'category_id' => $categories['pengumuman']->id ?? null,
                'published_at' => now()->subDays(9),
                'slug' => 'pengumuman-hasil-seleksi-pkm',
            ],
            [
                'title' => 'Mahasiswa Raih Medali Emas di PON',
                'content' => 'Selamat kepada mahasiswa yang berhasil meraih medali emas pada Pekan Olahraga Nasional.',
                'category_id' => $categories['prestasi']->id ?? null,
                'published_at' => now()->subDays(11),
                'slug' => 'mahasiswa-raih-medali-emas-di-pon',
            ],
            [
                'title' => 'Seminar Nasional Teknologi Informasi',
                'content' => 'Seminar nasional akan menghadirkan pembicara dari industri IT ternama. Daftar segera!',
                'category_id' => $categories['kegiatan']->id ?? null,
                'published_at' => now()->subDays(12),
                'slug' => 'seminar-nasional-teknologi-informasi',
            ],
            [
                'title' => 'Lomba Desain Poster Digital',
                'content' => 'Lomba desain poster digital terbuka untuk seluruh mahasiswa. Pendaftaran hingga 25 Juli 2024.',
                'category_id' => $categories['lainnya']->id ?? null,
                'published_at' => now()->subDays(13),
                'slug' => 'lomba-desain-poster-digital',
            ],
            [
                'title' => 'Pengumuman Jadwal Ujian Akhir Semester',
                'content' => 'Jadwal ujian akhir semester telah dipublikasikan. Silakan cek di portal akademik.',
                'category_id' => $categories['pengumuman']->id ?? null,
                'published_at' => now()->subDays(14),
                'slug' => 'pengumuman-jadwal-ujian-akhir-semester',
            ],
            [
                'title' => 'Mahasiswa Berprestasi Tingkat Nasional',
                'content' => 'Mahasiswa kampus terpilih sebagai mahasiswa berprestasi tingkat nasional tahun ini.',
                'category_id' => $categories['prestasi']->id ?? null,
                'published_at' => now()->subDays(15),
                'slug' => 'mahasiswa-berprestasi-tingkat-nasional',
            ],
            [
                'title' => 'Pelatihan Kewirausahaan Digital',
                'content' => 'Pelatihan kewirausahaan digital akan diadakan untuk membekali mahasiswa dengan skill bisnis online.',
                'category_id' => $categories['lainnya']->id ?? null,
                'published_at' => now()->subDays(16),
                'slug' => 'pelatihan-kewirausahaan-digital',
            ],
            [
                'title' => 'Donor Darah Bersama PMI',
                'content' => 'Ayo ikuti kegiatan donor darah yang akan dilaksanakan di kampus bersama PMI.',
                'category_id' => $categories['kegiatan']->id ?? null,
                'published_at' => now()->subDays(17),
                'slug' => 'donor-darah-bersama-pmi',
            ],
        ];

        // Sinkronisasi data: updateOrCreate berdasarkan slug (unique)
        foreach ($beritas as $data) {
            \App\Models\Berita::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );
        }
    }
}
