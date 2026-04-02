<?php

namespace App\Imports;

use App\Models\Master\CommunityUnit;
use App\Models\Master\StallPlace;
use App\Models\Master\NeighborhoodUnit;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StallPlaceImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return StallPlace|null
     */
    public function model(array $row)
    {
        $rw = CommunityUnit::where('no', $row['No Rw'])->first();
        if (!$rw) {
            throw new \Exception("RW tidak ditemukan: " . $row['No Rw']);
        }

        $rt = NeighborhoodUnit::where('no', $row['No Rt'])
            ->where('community_id', $rw->id)
            ->first();

        if (!$rt) {
            throw new \Exception("RT tidak ditemukan: " . $row['No Rt']);
        }

        return new StallPlace([
            'community_id' => $rw->id,
            'neighborhood_id' => $rt->id,
            'name' => $row['Nama Kios'],
            'rent_amount' => $row['Harga Sewa'],
            'stall_unit' => $row['Unit'],
        ]);
    }
}