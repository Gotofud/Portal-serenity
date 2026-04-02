<?php

namespace App\Imports;

use App\Models\Finance\Bills;
use App\Models\Master\House;
use App\Models\Master\BuildingType;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Carbon\Carbon;

class BillsImport implements ToModel, WithHeadingRow, SkipsEmptyRows
{
    /**
     * Update pembayaran tagihan berdasarkan kode tagihan atau house_id + tahun + bulan
     * Kolom yang diharapkan: kode, house_id, tahun, bulan, tanggal bayar, status, jumlah
     * 
     * @param array $row
     * @return Bills|null
     */
    public function model(array $row)
    {
        // Normalized keys - handle berbagai format input
        $kode = $row['kode'] ?? $row['code'] ?? null;
        $houseId = $row['house_id'] ?? $row['house id'] ?? null;
        $tahun = $row['tahun'] ?? $row['year'] ?? null;
        $bulan = $row['bulan'] ?? $row['month'] ?? null;
        $tanggalBayar = $row['tanggal_bayar'] ?? $row['tanggal bayar'] ?? $row['tanggal_bayar'] ?? $row['paid_at'] ?? null;
        $status = $row['status'] ?? null;
        
        // Lewati jika tidak ada data kode atau house_id
        if (empty($kode) && empty($houseId)) {
            return null;
        }

        // Cari tagihan berdasarkan kode (lebih akurat)
        if (!empty($kode)) {
            $bill = Bills::where('code', $kode)->first();
        } else {
            // Atau cari berdasarkan house_id + tahun + bulan
            $bill = Bills::where('house_id', $houseId)
                ->where('year', $tahun ?? null)
                ->where('month', $bulan ?? null)
                ->first();
        }

        // Jika tagihan tidak ditemukan, lewati baris ini
        if (!$bill) {
            return null;
        }

        // Update data pembayaran
        $updateData = ['status' => $status ?? $bill->status];
        
        if (!empty($tanggalBayar)) {
            try {
                $updateData['paid_at'] = Carbon::parse($tanggalBayar);
                // Jika ada tanggal bayar, ubah status jadi 'paid' otomatis
                if ($status === null) {
                    $updateData['status'] = 'paid';
                }
            } catch (\Exception $e) {
                // Skip jika format tanggal salah
            }
        }

        $bill->update($updateData);

        return $bill;
    }
}
