<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class iconDiv extends Component
{
    /**
     * Create a new component instance.
     */

    public $icon;
    public $text;
    public $route;
    public $class;
    public $sclass;

    public function __construct($icon, $text, $route, $class="", $sclass="")
    {
        //
        $this->icon = $icon;
        $this->text = $text;
        $this->route = $route;
        $this->class = $class;
        $this->sclass = $sclass;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.icon-div');
    }
}
