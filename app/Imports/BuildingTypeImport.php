<?php

namespace App\Imports;

use App\Models\Master\BuildingType;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BuildingTypeImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return BuildingType|null
     */
    public function model(array $row)
    {
        return new BuildingType([
            'name' => $row['Jenis Bangunan'],
        ]);
    }
}