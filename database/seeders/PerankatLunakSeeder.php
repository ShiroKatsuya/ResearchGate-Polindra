<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Perangkatlunak;

class PerankatLunakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
              // Import the required models


              // Get or create students for foreign key relation
              $students = collect([
                  ['name' => 'Adi Wijaya', 'year_of_graduation' => 2023, 'email' => 'adi@example.com', 'phone' => '628111111111', 'program_study' => 'Teknik Informatika'],
                  ['name' => 'Budi Santoso', 'year_of_graduation' => 2024, 'email' => 'budi@example.com', 'phone' => '628122222222', 'program_study' => 'Teknik Informatika'],
                  ['name' => 'Citra Lestari', 'year_of_graduation' => 2022, 'email' => 'citra@example.com', 'phone' => '628133333333', 'program_study' => 'Teknik Informatika'],
              ])->map(fn($s) => Student::firstOrCreate(['email' => $s['email']], $s))->values();

              // Sample perangkat lunak data based on model fields
              $perangkatlunaks = [
                  [
                      'name' => 'Sistem Informasi Akademik',
                      'description' => 'Aplikasi untuk manajemen data akademik kampus.',
                      'repo_url' => 'https://github.com/example/akademik',
                      'website_url' => null,
                      'student_id' => $students[0]->id,
                  ],
                  [
                      'name' => 'Aplikasi Monitoring Kesehatan',
                      'description' => 'Aplikasi mobile untuk monitoring kesehatan harian.',
                      'repo_url' => 'https://github.com/example/monitoring-kesehatan',
                      'website_url' => null,
                      'student_id' => $students[1]->id,
                  ],
                  [
                      'name' => 'Website E-Learning',
                      'description' => 'Platform pembelajaran daring untuk mahasiswa.',
                      'repo_url' => null,
                      'website_url' => null,
                      'student_id' => $students[2]->id,
                  ],
                  [
                      'name' => 'Sistem Rekomendasi Buku',
                      'description' => 'Sistem rekomendasi buku berbasis collaborative filtering.',
                      'repo_url' => 'https://github.com/example/rekomendasi-buku',
                      'website_url' => null,
                      'student_id' => $students[0]->id,
                  ],
                  [
                      'name' => 'Aplikasi Absensi QR Code',
                      'description' => 'Aplikasi absensi menggunakan QR Code untuk kehadiran mahasiswa.',
                      'repo_url' => 'https://github.com/example/absensi-qr',
                      'website_url' => null,
                      'student_id' => $students[1]->id,
                  ],
                  [
                      'name' => 'Sistem Penjadwalan Kuliah',
                      'description' => 'Sistem otomatisasi penjadwalan kuliah berbasis web.',
                      'repo_url' => 'https://github.com/example/penjadwalan-kuliah',
                      'website_url' => null,
                      'student_id' => $students[2]->id,
                  ],
                  [
                      'name' => 'Aplikasi Pengingat Tugas',
                      'description' => 'Aplikasi mobile untuk mengingatkan deadline tugas mahasiswa.',
                      'repo_url' => 'https://github.com/example/pengingat-tugas',
                      'website_url' => null,
                      'student_id' => $students[0]->id,
                  ],
                  [
                      'name' => 'Portal Alumni',
                      'description' => 'Website untuk jaringan alumni dan lowongan kerja.',
                      'repo_url' => null,
                      'website_url' => null,
                      'student_id' => $students[1]->id,
                  ],
                  [
                      'name' => 'Sistem Inventaris Lab',
                      'description' => 'Aplikasi manajemen inventaris laboratorium kampus.',
                      'repo_url' => 'https://github.com/example/inventaris-lab',
                      'website_url' => null,
                      'student_id' => $students[2]->id,
                  ],
                  [
                      'name' => 'Aplikasi Peminjaman Buku',
                      'description' => 'Aplikasi untuk peminjaman dan pengembalian buku perpustakaan.',
                      'repo_url' => 'https://github.com/example/peminjaman-buku',
                      'website_url' => null,
                      'student_id' => $students[0]->id,
                  ],
                  [
                      'name' => 'Sistem Penilaian Otomatis',
                      'description' => 'Sistem untuk penilaian otomatis ujian berbasis web.',
                      'repo_url' => 'https://github.com/example/penilaian-otomatis',
                      'website_url' => null,
                      'student_id' => $students[1]->id,
                  ],
                  [
                      'name' => 'Aplikasi Konsultasi Dosen',
                      'description' => 'Platform konsultasi online antara mahasiswa dan dosen.',
                      'repo_url' => 'https://github.com/example/konsultasi-dosen',
                      'website_url' => null,
                      'student_id' => $students[2]->id,
                  ],
                  [
                      'name' => 'Sistem Pengelolaan UKM',
                      'description' => 'Aplikasi untuk pengelolaan Unit Kegiatan Mahasiswa.',
                      'repo_url' => null,
                      'website_url' => null,
                      'student_id' => $students[0]->id,
                  ],
                  [
                      'name' => 'Aplikasi Pengajuan Beasiswa',
                      'description' => 'Sistem pengajuan dan seleksi beasiswa mahasiswa.',
                      'repo_url' => 'https://github.com/example/pengajuan-beasiswa',
                      'website_url' => null,
                      'student_id' => $students[1]->id,
                  ],
                  [
                      'name' => 'Website Event Kampus',
                      'description' => 'Portal informasi dan pendaftaran event kampus.',
                      'repo_url' => 'https://github.com/example/event-kampus',
                      'website_url' => null,
                      'student_id' => $students[2]->id,
                  ],
                  [
                      'name' => 'Aplikasi Monitoring Tugas Akhir',
                      'description' => 'Aplikasi untuk memonitor progres tugas akhir mahasiswa.',
                      'repo_url' => 'https://github.com/example/monitoring-ta',
                      'website_url' => null,
                      'student_id' => $students[0]->id,
                  ],
                  [
                      'name' => 'Sistem Booking Ruang Kelas',
                      'description' => 'Aplikasi untuk pemesanan ruang kelas secara online.',
                      'repo_url' => null,
                      'website_url' => 'https://bookingruang.example.com',
                      'student_id' => $students[1]->id,
                  ],
                  [
                      'name' => 'Aplikasi Absensi Online',
                      'description' => 'Sistem absensi berbasis web untuk mahasiswa dan dosen.',
                      'repo_url' => 'https://github.com/example/absensi-online',
                      'website_url' => null,
                      'student_id' => $students[2]->id,
                  ],
                  [
                      'name' => 'Portal Informasi Beasiswa',
                      'description' => 'Website untuk informasi dan pengumuman beasiswa kampus.',
                      'repo_url' => null,
                      'website_url' => 'https://beasiswa.example.com',
                      'student_id' => $students[0]->id,
                  ],
                  [
                      'name' => 'Aplikasi Penjadwalan Kuliah',
                      'description' => 'Aplikasi untuk penjadwalan kuliah otomatis.',
                      'repo_url' => 'https://github.com/example/penjadwalan-kuliah',
                      'website_url' => null,
                      'student_id' => $students[1]->id,
                  ],
                  [
                      'name' => 'Sistem Evaluasi Dosen',
                      'description' => 'Aplikasi untuk evaluasi kinerja dosen oleh mahasiswa.',
                      'repo_url' => null,
                      'website_url' => null,
                      'student_id' => $students[2]->id,
                  ],
                  [
                      'name' => 'Aplikasi Koperasi Mahasiswa',
                      'description' => 'Sistem manajemen koperasi mahasiswa berbasis web.',
                      'repo_url' => 'https://github.com/example/koperasi-mahasiswa',
                      'website_url' => null,
                      'student_id' => $students[0]->id,
                  ],
                  [
                      'name' => 'Sistem Pengajuan Cuti Akademik',
                      'description' => 'Aplikasi untuk pengajuan cuti akademik mahasiswa.',
                      'repo_url' => null,
                      'website_url' => 'https://cuti.example.com',
                      'student_id' => $students[1]->id,
                  ],
                  [
                      'name' => 'Aplikasi Layanan IT Helpdesk',
                      'description' => 'Platform pengaduan dan layanan IT untuk civitas kampus.',
                      'repo_url' => 'https://github.com/example/it-helpdesk',
                      'website_url' => null,
                      'student_id' => $students[2]->id,
                  ],
                  [
                      'name' => 'Sistem Pendaftaran UKM',
                      'description' => 'Aplikasi pendaftaran Unit Kegiatan Mahasiswa secara online.',
                      'repo_url' => null,
                      'website_url' => 'https://ukm.example.com',
                      'student_id' => $students[0]->id,
                  ],
                  [
                      'name' => 'Aplikasi Pengelolaan Seminar',
                      'description' => 'Sistem manajemen seminar dan workshop kampus.',
                      'repo_url' => 'https://github.com/example/pengelolaan-seminar',
                      'website_url' => null,
                      'student_id' => $students[1]->id,
                  ],
                  [
                      'name' => 'Portal Pengumuman Akademik',
                      'description' => 'Website untuk pengumuman akademik dan jadwal penting.',
                      'repo_url' => null,
                      'website_url' => 'https://pengumuman.example.com',
                      'student_id' => $students[2]->id,
                  ],
              ];

              foreach ($perangkatlunaks as $data) {
                  Perangkatlunak::updateOrCreate(
                      ['name' => $data['name']],
                      $data
                  );
              }
    }

}