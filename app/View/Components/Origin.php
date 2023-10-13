<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Origin extends Component
{
    public $proba;
    /**
     * Create a new component instance.
     */
    public function __construct($proba, public $origins)
    {
        $this->proba = $proba;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.origin');
    }
}
