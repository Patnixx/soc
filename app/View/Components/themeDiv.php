<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class themeDiv extends Component
{
    /**
     * Create a new component instance.
     */
    public $spanSide;
    public function __construct($spanSide)
    {
        //
        $this->spanSide = $spanSide;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.theme-div');
    }
}
