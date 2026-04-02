<?php

namespace App\Exports;

use App\Models\Master\NeighborhoodUnit;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class NuExport implements FromView
{
    public function view(): View
    {
        return view('exports.excel.neighborhood-units', [
            'rts' => NeighborhoodUnit::all()
        ]);
    }
}