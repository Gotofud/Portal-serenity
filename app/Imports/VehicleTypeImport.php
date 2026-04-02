<?php

namespace App\Imports;

use App\Models\Master\VehicleTypes;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VehicletypeImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return VehicleTypes|null
     */
    public function model(array $row)
    {
        return new VehicleTypes([
            'name' => $row['Jenis Kendaraan'],
        ]);
    }
}