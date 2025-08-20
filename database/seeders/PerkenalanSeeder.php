<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerkenalanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Synchronize with the Perkenalan model and update the data accordingly

        // Import the model at the top of the file:
        // use App\Models\Perkenalan;

        // Define the current data for seeding
        $perkenalans = [
            [
                'name' => 'Adi Wijaya',
                'program_study' => 'Teknik Informatika',
                'year_of_graduation' => 2023,
                'email' => 'adi@example.com',
                'phone' => '628111111111',
            ],
            [
                'name' => 'Budi Santoso',
                'program_study' => 'Teknik Informatika',
                'year_of_graduation' => 2024,
                'email' => 'budi@example.com',
                'phone' => '628122222222',
            ],
            [
                'name' => 'Citra Lestari',
                'program_study' => 'Teknik Informatika',
                'year_of_graduation' => 2022,
                'email' => 'citra@example.com',
                'phone' => '628133333333',
            ],
            [
                'name' => 'Dewi Anggraini',
                'program_study' => 'Sistem Informasi',
                'year_of_graduation' => 2021,
                'email' => 'dewi.anggraini@example.com',
                'phone' => '628144444444',
            ],
            [
                'name' => 'Eko Prasetyo',
                'program_study' => 'Teknik Komputer',
                'year_of_graduation' => 2020,
                'email' => 'eko.prasetyo@example.com',
                'phone' => '628155555555',
            ],
            [
                'name' => 'Fitri Handayani',
                'program_study' => 'Teknik Informatika',
                'year_of_graduation' => 2023,
                'email' => 'fitri.handayani@example.com',
                'phone' => '628166666666',
            ],
            [
                'name' => 'Gilang Saputra',
                'program_study' => 'Sistem Informasi',
                'year_of_graduation' => 2022,
                'email' => 'gilang.saputra@example.com',
                'phone' => '628177777777',
            ],
            [
                'name' => 'Hana Putri',
                'program_study' => 'Teknik Komputer',
                'year_of_graduation' => 2024,
                'email' => 'hana.putri@example.com',
                'phone' => '628188888888',
            ],
            [
                'name' => 'Indra Kurniawan',
                'program_study' => 'Teknik Informatika',
                'year_of_graduation' => 2021,
                'email' => 'indra.kurniawan@example.com',
                'phone' => '628199999999',
            ],
            [
                'name' => 'Joko Susilo',
                'program_study' => 'Sistem Informasi',
                'year_of_graduation' => 2020,
                'email' => 'joko.susilo@example.com',
                'phone' => '628100000000',
            ],
            [
                'name' => 'Kartika Sari',
                'program_study' => 'Teknik Komputer',
                'year_of_graduation' => 2023,
                'email' => 'kartika.sari@example.com',
                'phone' => '628111122222',
            ],
            [
                'name' => 'Lukman Hakim',
                'program_study' => 'Teknik Informatika',
                'year_of_graduation' => 2022,
                'email' => 'lukman.hakim@example.com',
                'phone' => '628122233344',
            ],
            [
                'name' => 'Maya Puspita',
                'program_study' => 'Sistem Informasi',
                'year_of_graduation' => 2021,
                'email' => 'maya.puspita@example.com',
                'phone' => '628133344455',
            ],
            [
                'name' => 'Nanda Permana',
                'program_study' => 'Teknik Komputer',
                'year_of_graduation' => 2024,
                'email' => 'nanda.permana@example.com',
                'phone' => '628144455566',
            ],
            // Tambahkan data baru di sini jika ingin menambah perkenalan
        ];

        // Sinkronisasi data: updateOrCreate berdasarkan email (unique)
        foreach ($perkenalans as $data) {
            \App\Models\Perkenalan::updateOrCreate(
                ['email' => $data['email']],
                $data
            );
        }
    }
}
