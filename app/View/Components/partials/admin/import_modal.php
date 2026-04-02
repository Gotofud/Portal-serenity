<?php

namespace App\View\Components\partials\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class import_modal extends Component
{
    /**
     * Create a new component instance.
     */
    public $downloadRoute;
    public $importRoute;
    public function __construct($downloadRoute, $importRoute)
    {
        $this->downloadRoute = $downloadRoute;
        $this->importRoute = $importRoute;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.partials.admin.import_modal');
    }
}
