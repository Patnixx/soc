<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class materialCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $icon;
    public $text;
    public $route;
    public $syllab;

    public function __construct($icon, $text, $route, $syllab)
    {
        $this->icon = $icon;
        $this->text = $text;
        $this->route = $route;
        $this->syllab = $syllab;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.material-card');
    }
}
