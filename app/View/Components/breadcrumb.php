<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class breadcrumb extends Component
{
    /**
     * Create a new component instance.
     */
    public $routeIndex;
    public $listName;
    public $currentPage;
    public function __construct($routeIndex, $listName, $currentPage)
    {
        $this->routeIndex = $routeIndex;
        $this->listName = $listName;
        $this->currentPage = $currentPage;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.breadcrumb');
    }
}
