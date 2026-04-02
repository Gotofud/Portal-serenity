<?php

namespace App\Imports;

use App\Models\Master\Block;
use App\Models\Master\BuildingType;
use App\Models\Master\CommunityUnit;
use App\Models\Master\House;
use App\Models\Master\NeighborhoodUnit;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HouseImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return House|null
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

        $blockInput = strtolower(trim($row['Blok']));
        $block = Block::where('community_id', $rw->id)
            ->where('neighborhood_id', $rt->id)
            ->whereRaw('LOWER(name) = ?', [$blockInput])
            ->first();

        if (!$block) {
            throw new \Exception("Blok tidak valid: " . $row['Blok']);
        }

        $btInput = strtolower(trim($row['Tipe Bangunan']));
        $buildingType = BuildingType::whereRaw('LOWER(name) = ?', [$btInput])->first();

        if (!$buildingType) {
            throw new \Exception("Tipe Bangunan tidak valid: " . $row['Tipe Bangunan']);
        }

        return new House([
            'community_id' => $rw->id,
            'neighborhood_id' => $rt->id,
            'block_id' => $block->id,
            'number' => $row['Nomor'],
            'building_types_id' => $buildingType->id,
        ]);
    }
}