<?php

namespace App\Imports;

use App\Models\Master\ReportCategories;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Validation\ValidationException;

class ReportCategoriesImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return ReportCategories|null
     */
    public function model(array $row)
    {
        $categoryInput = Trim(strtolower($row['Tipe']));
        $map = [
            'bencana dan darurat' => 'Bencana dan Darurat',
            'fasilitas umum dan lingkungan' => 'Fasilitas Umum dan Lingkungan',
            'sosial dan keamanan umum' => 'Sosial dan Keamanan Umum',
            'laporan khusus dan manajemen' => 'Laporan Khusus dan Manajemen'
        ];

        if (!array_key_exists($categoryInput, $map)) {
            throw ValidationException::withMessages([
                'types' => 'Tipe Tidak Valid: ' . $row['Tipe']
            ]);
        }

        return new ReportCategories([
            'name' => $row['Jenis Laporan'],
            'types' => $map[$categoryInput]
        ]);
    }
}