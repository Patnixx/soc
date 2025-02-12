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
    public $divclass;
    public $iptclass;

    public function __construct($name, $type, $placeholder, $id, $value, $icon, $divclass="", $iptclass="")
    {
        $this->name = $name;
        $this->type = $type;
        $this->placeholder = $placeholder;
        $this->id = $id;
        $this->value = $value;
        $this->icon = $icon;
        $this->divclass = $divclass;
        $this->iptclass = $iptclass;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-div');
    }
}
