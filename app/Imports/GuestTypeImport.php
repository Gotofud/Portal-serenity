<?php

namespace App\Imports;

use App\Models\Master\GuestTypes;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GuestypeImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return GuestTypes|null
     */
    public function model(array $row)
    {
        return new GuestTypes([
            'name' => $row['Jenis Tamu'],
        ]);
    }
}