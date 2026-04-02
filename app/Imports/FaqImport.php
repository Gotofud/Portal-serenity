<?php

namespace App\Imports;

use App\Models\Master\Faq;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Validation\ValidationException;

class FaqImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Faq|null
     */
    public function model(array $row)
    {
        $categoryInput = Trim(strtolower($row['Kategori']));
        $map = [
            'umum' => 'Umum',
            'akun pengguna' => 'Akun Pengguna',
            'kebijakan' => 'Kebijakan',
            'produk' => 'Produk'
        ];

        if (!array_key_exists($categoryInput, $map)) {
            throw ValidationException::withMessages([
                'category' => 'Kategori Tidak Valid: ' . $row['Kategori']
            ]);
        }

        return new Faq([
            'subject' => $row['Pertanyaan'],
            'answer' => $row['Jawaban'],
            'category' => $map[$categoryInput],
        ]);
    }
}