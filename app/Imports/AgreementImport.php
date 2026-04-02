<?php

namespace App\Imports;

use App\Models\Master\BuildingType;
use App\Models\Master\CommunityUnit;
use App\Models\Master\ReportCategories;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AgreementImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return ReportCategories|null
     */
    public function model(array $row)
    {
        $rw = CommunityUnit::where('no', $row['No Rw'])->first();
        if (!$rw) {
            throw new \Exception("RW tidak ditemukan: " . $row['No Rw']);
        }

        $btInput = strtolower(trim($row['Tipe Bangunan']));
        $buildingType = BuildingType::whereRaw('LOWER(name) = ?', [$btInput])->first();

        if (!$buildingType) {
            throw new \Exception("Tipe Bangunan tidak valid: " . $row['Tipe Bangunan']);
        }

        return new ReportCategories([
            'community_id' => $rw->id,
            'building_types_id' => $buildingType->id,
        ]);
    }
}