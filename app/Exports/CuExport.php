<?php

namespace App\Exports;

use App\Models\Master\CommunityUnit;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CuExport implements FromView
{
    public function view(): View
    {
        return view('exports.excel.community-units', [
            'rws' => CommunityUnit::all()
        ]);
    }
}