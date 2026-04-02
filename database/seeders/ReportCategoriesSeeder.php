<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            // Bencana dan Darurat (Emergency)
            [
                'name' => 'Bencana Alam',
                'types' => 'Bencana dan Darurat',
            ],
            [
                'name' => 'Keamanan',
                'types' => 'Bencana dan Darurat',
            ],
            [
                'name' => 'Bencana Non-Alam',
                'types' => 'Bencana dan Darurat',
            ],
            [
                'name' => 'Medis Darurat',
                'types' => 'Bencana dan Darurat',
            ],
            // Fasilitas Umum dan Lingkungan (Sarpras)
            [
                'name' => 'Infrastruktur',
                'types' => 'Fasilitas Umum dan Lingkungan',
            ],
            [
                'name' => 'Utilitas',
                'types' => 'Fasilitas Umum dan Lingkungan',
            ],
            [
                'name' => 'Lingkungan',
                'types' => 'Fasilitas Umum dan Lingkungan',
            ],
            // Sosial dan Keamanan Umum (Ketertiban)
            [
                'name' => 'Ketertiban Warga',
                'types' => 'Sosial dan Keamanan Umum',
            ],
            [
                'name' => 'Pelanggaran Aturan',
                'types' => 'Sosial dan Keamanan Umum',
            ],
            // Laporan Khusus dan Manajemen
            [
                'name' => 'Keamanan Terpadu',
                'types' => 'Laporan Khusus dan Manajemen',
            ],
            [
                'name' => 'Risiko Bencana',
                'types' => 'Laporan Khusus dan Manajemen',
            ],
        ];

        foreach ($categories as $data) {
            \App\Models\Master\ReportCategories::create($data);
        }
    }
}
