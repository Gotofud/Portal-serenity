<?php

namespace App\Imports;

use App\Models\Master\CommunityUnit;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CuImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return CommunityUnit|null
     */
    public function model(array $row)
    {
        return new CommunityUnit([
            'no' => $row['No Rw'],
            'leader_name' => $row['Ketua Rw'],
        ]);
    }
}