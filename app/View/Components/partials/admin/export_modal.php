<?php

namespace App\View\Components\partials\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class export_modal extends Component
{
    /**
     * Create a new component instance.
     */
    public $exportPdf;
    public $exportExcel;
    public function __construct($exportExcel, $exportPdf)
    {
        $this->exportExcel = $exportExcel;
        $this->exportPdf = $exportPdf;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.partials.admin.export_modal');
    }
}
