<?php

namespace App\Imports;

use App\Models\Master\CommunityUnit;
use App\Models\Master\NeighborhoodUnit;
use App\Models\Master\Role;
use App\Models\Resident\NeighborhoodOperator;
use App\Models\Resident\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OperatorImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $role_id = Role::where('name', 'Admin')->value('id');

        $user = new User([
            'name' => $row['Nama Operator'],
            'email' => $row['Email Operator'],
            'role_id' => $role_id,
            'password' => Hash::make($row['Password']),
            'status' => $row['Status'] ?? 'Aktif',
        ]);

        // Simpan user dulu
        $user->save();

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

        // Jika file ada kolom community_id dan neighborhood_id, gunakan
        if (isset($rw) && isset($rt)) {
            NeighborhoodOperator::create([
                'user_id' => $user->id,
                'community_id' => $rw->id,
                'neighborhood_id' => $rt->id,
            ]);
        }

        return $user;
    }
}