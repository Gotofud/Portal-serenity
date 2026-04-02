<?php

namespace App\Imports;

use App\Models\Master\NeighborhoodUnit;
use App\Models\Master\CommunityUnit;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NuImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Cari RW berdasarkan nomor RW
        $rw = CommunityUnit::where('no', $row['No Rw'])->first();

        if (!$rw) {
            return null; 
        }

        return new NeighborhoodUnit([
            'no' => $row['No Rt'],
            'community_id' => $rw->id,
            'leader_name' => $row['Ketua Rt'],
        ]);
    }
}