<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class inputDiv extends Component
{
    /**
     * Create a new component instance.
     */

    public $name;
    public $type;
    public $placeholder;
    public $id;
    public $value;
    public $icon;

    public function __construct($name, $type, $placeholder, $id, $value, $icon)
    {
        $this->name = $name;
        $this->type = $type;
        $this->placeholder = $placeholder;
        $this->id = $id;
        $this->value = $value;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-div');
    }
}
