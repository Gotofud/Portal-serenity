<?php

namespace App\Exports;

use App\Models\Finance\Bills;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BillsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
     * Export data tagihan dari database
     * 
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Bills::all()->map(function ($bill) {
            return [
                'kode' => $bill->code,
                'house_id' => $bill->house_id,
                'tahun' => $bill->year,
                'bulan' => $bill->month,
                'status' => $bill->status,
                'tanggal_bayar' => $bill->paid_at?->format('Y-m-d'),
                'tanggal_jatuh_tempo' => $bill->due_at?->format('Y-m-d'),
            ];
        });
    }

    /**
     * Header kolom export
     * 
     * @return array
     */
    public function headings(): array
    {
        return [
            'kode',
            'house_id',
            'tahun',
            'bulan',
            'status',
            'tanggal_bayar',
            'tanggal_jatuh_tempo',
        ];
    }

    /**
     * Styling sheet
     * 
     * @param Worksheet $sheet
     * @return array
     */
    public function styles(Worksheet $sheet)
    {
        return [
            // Styling untuk header row
            1 => [
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => 'FFFFFF'],
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '4472C4'],
                ],
            ],
        ];
    }
}
