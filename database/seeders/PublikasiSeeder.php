<?php

namespace Database\Seeders;

use App\Models\publikasi;
use App\Models\Student;
use Illuminate\Database\Seeder;

class PublikasiSeeder extends Seeder
{
    public function run(): void
    {
        // Get existing students
        $students = Student::all();
        
        if ($students->isEmpty()) {
            // Create some students if none exist
            $students = collect([
                ['name' => 'Adi Wijaya', 'year_of_graduation' => 2023, 'email' => 'adi@example.com', 'phone' => '628111111111', 'program_study' => 'Teknik Informatika'],
                ['name' => 'Budi Santoso', 'year_of_graduation' => 2024, 'email' => 'budi@example.com', 'phone' => '628122222222', 'program_study' => 'Teknik Informatika'],
                ['name' => 'Citra Lestari', 'year_of_graduation' => 2022, 'email' => 'citra@example.com', 'phone' => '628133333333', 'program_study' => 'Teknik Informatika'],
            ])->map(fn($s) => Student::firstOrCreate(['email' => $s['email']], $s));
        }

        // Create sample publikasi records
        $publikasis = [
            [
                'title' => 'Pengembangan Sistem Informasi Akademik Berbasis Web',
                'journal' => 'Jurnal Teknologi Informasi dan Komunikasi',
                'abstract' => 'Penelitian ini mengembangkan sistem informasi akademik yang terintegrasi untuk meningkatkan efisiensi pengelolaan data akademik di perguruan tinggi.',
                'doi' => '10.1234/polindra.001',
                'url' => 'https://example.com/publikasi-001',
                'student_id' => $students->first()->id,
                'published_at' => now()->subMonths(3),
            ],
            [
                'title' => 'Implementasi Machine Learning untuk Prediksi Kelulusan Mahasiswa',
                'journal' => 'Jurnal Ilmu Komputer dan Teknologi',
                'abstract' => 'Studi tentang penggunaan algoritma machine learning untuk memprediksi kelulusan mahasiswa berdasarkan data akademik dan non-akademik.',
                'doi' => '10.1234/polindra.002',
                'url' => 'https://example.com/publikasi-002',
                'student_id' => $students->get(1)->id,
                'published_at' => now()->subMonths(2),
            ],
            [
                'title' => 'Analisis Keamanan Aplikasi E-Learning dengan Metode OWASP',
                'journal' => 'Jurnal Keamanan Informasi',
                'abstract' => 'Penelitian ini menganalisis tingkat keamanan aplikasi e-learning menggunakan framework OWASP untuk mengidentifikasi kerentanan keamanan.',
                'doi' => '10.1234/polindra.003',
                'url' => 'https://example.com/publikasi-003',
                'student_id' => $students->last()->id,
                'published_at' => now()->subMonth(),
            ],
            [
                'title' => 'Pengembangan Aplikasi Mobile untuk Monitoring Kesehatan',
                'journal' => 'Jurnal Teknologi Mobile',
                'abstract' => 'Aplikasi mobile yang dikembangkan untuk monitoring kesehatan harian dengan fitur tracking aktivitas fisik dan pola makan.',
                'doi' => '10.1234/polindra.004',
                'url' => 'https://example.com/publikasi-004',
                'student_id' => $students->first()->id,
                'published_at' => now()->subWeeks(2),
            ],
            [
                'title' => 'Optimasi Database Query untuk Sistem E-Commerce',
                'journal' => 'Jurnal Database dan Sistem Informasi',
                'abstract' => 'Penelitian tentang optimasi query database untuk meningkatkan performa sistem e-commerce dengan berbagai teknik indexing dan query optimization.',
                'doi' => '10.1234/polindra.005',
                'url' => 'https://example.com/publikasi-005',
                'student_id' => $students->get(1)->id,
                'published_at' => now()->subWeek(),
            ],
            [
                'title' => 'Penerapan Blockchain pada Sistem Pembayaran Digital',
                'journal' => 'Jurnal Teknologi Finansial',
                'abstract' => 'Studi ini membahas penerapan teknologi blockchain untuk meningkatkan keamanan dan transparansi pada sistem pembayaran digital.',
                'doi' => '10.1234/polindra.006',
                'url' => 'https://example.com/publikasi-006',
                'student_id' => $students->first()->id,
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'Desain UI/UX untuk Aplikasi Edukasi Anak',
                'journal' => 'Jurnal Desain Interaksi',
                'abstract' => 'Penelitian mengenai desain antarmuka pengguna dan pengalaman pengguna pada aplikasi edukasi berbasis mobile untuk anak-anak.',
                'doi' => '10.1234/polindra.007',
                'url' => 'https://example.com/publikasi-007',
                'student_id' => $students->get(2)->id,
                'published_at' => now()->subDays(15),
            ],
            [
                'title' => 'Pengaruh Internet of Things pada Otomatisasi Rumah',
                'journal' => 'Jurnal Sistem Cerdas',
                'abstract' => 'Analisis dampak penggunaan IoT dalam sistem otomatisasi rumah untuk meningkatkan efisiensi energi dan kenyamanan.',
                'doi' => '10.1234/polindra.008',
                'url' => 'https://example.com/publikasi-008',
                'student_id' => $students->get(1)->id,
                'published_at' => now()->subDays(20),
            ],
            [
                'title' => 'Evaluasi Kinerja Jaringan Komputer di Lingkungan Kampus',
                'journal' => 'Jurnal Jaringan Komputer',
                'abstract' => 'Penelitian ini mengevaluasi kinerja jaringan komputer di lingkungan kampus dan memberikan rekomendasi peningkatan.',
                'doi' => '10.1234/polindra.009',
                'url' => 'https://example.com/publikasi-009',
                'student_id' => $students->first()->id,
                'published_at' => now()->subDays(25),
            ],
            [
                'title' => 'Sistem Rekomendasi Buku Menggunakan Algoritma Collaborative Filtering',
                'journal' => 'Jurnal Sistem Informasi',
                'abstract' => 'Pengembangan sistem rekomendasi buku berbasis collaborative filtering untuk meningkatkan pengalaman pengguna.',
                'doi' => '10.1234/polindra.010',
                'url' => 'https://example.com/publikasi-010',
                'student_id' => $students->get(2)->id,
                'published_at' => now()->subDays(30),
            ],
            [
                'title' => 'Analisis Sentimen Media Sosial Menggunakan NLP',
                'journal' => 'Jurnal Kecerdasan Buatan',
                'abstract' => 'Studi tentang penerapan Natural Language Processing untuk analisis sentimen pada data media sosial.',
                'doi' => '10.1234/polindra.011',
                'url' => 'https://example.com/publikasi-011',
                'student_id' => $students->get(1)->id,
                'published_at' => now()->subDays(35),
            ],
            [
                'title' => 'Pengembangan Chatbot untuk Layanan Akademik',
                'journal' => 'Jurnal Teknologi Informasi',
                'abstract' => 'Penelitian ini mengembangkan chatbot berbasis AI untuk membantu layanan akademik di perguruan tinggi.',
                'doi' => '10.1234/polindra.012',
                'url' => 'https://example.com/publikasi-012',
                'student_id' => $students->first()->id,
                'published_at' => now()->subDays(40),
            ],
            [
                'title' => 'Implementasi Augmented Reality pada Pembelajaran Sains',
                'journal' => 'Jurnal Multimedia',
                'abstract' => 'Studi tentang penggunaan teknologi augmented reality untuk meningkatkan pemahaman konsep sains pada siswa.',
                'doi' => '10.1234/polindra.013',
                'url' => 'https://example.com/publikasi-013',
                'student_id' => $students->get(2)->id,
                'published_at' => now()->subDays(45),
            ],
            [
                'title' => 'Keamanan Data Pribadi pada Aplikasi Mobile Banking',
                'journal' => 'Jurnal Keamanan Siber',
                'abstract' => 'Analisis risiko dan solusi keamanan data pribadi pada aplikasi mobile banking di Indonesia.',
                'doi' => '10.1234/polindra.014',
                'url' => 'https://example.com/publikasi-014',
                'student_id' => $students->get(1)->id,
                'published_at' => now()->subDays(50),
            ],
            [
                'title' => 'Pengembangan Sistem Absensi Online Berbasis QR Code',
                'journal' => 'Jurnal Sistem Informasi',
                'abstract' => 'Penelitian ini mengembangkan sistem absensi online menggunakan QR Code untuk meningkatkan efisiensi dan akurasi pencatatan kehadiran.',
                'doi' => '10.1234/polindra.015',
                'url' => 'https://example.com/publikasi-015',
                'student_id' => $students->first()->id,
                'published_at' => now()->subDays(55),
            ],
        ];

        foreach ($publikasis as $publikasi) {
            publikasi::firstOrCreate(
                ['doi' => $publikasi['doi']],
                $publikasi
            );
        }
    }
}
