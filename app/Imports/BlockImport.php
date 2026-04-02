<?php

namespace App\Imports;

use App\Models\Master\Block;
use App\Models\Master\NeighborhoodUnit;
use App\Models\Master\CommunityUnit;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BlockImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Cari RW berdasarkan nomor RW
        $rw = CommunityUnit::where('no', $row['No Rw'])->first();
        $rt = NeighborhoodUnit::where('no', $row['No Rt'])->where('community_id', $rw->id)->first();

        if (!$rw) {
            return null;
        }
        if (!$rt) {
            return null;
        }

        return new Block([
            'community_id' => $rw->id,
            'neighborhood_id' => $rt->id,
            'name' => $row['Nama Blok'],
        ]);
    }
}