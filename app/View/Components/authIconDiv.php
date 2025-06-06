<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class authIconDiv extends Component
{
    /**
     * Create a new component instance.
     */
    public $icon;
    public $text;
    public $route;

    public function __construct($icon, $text, $route)
    {
        //
        $this->icon = $icon;
        $this->text = $text;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.auth.auth-icon-div');
    }
}
