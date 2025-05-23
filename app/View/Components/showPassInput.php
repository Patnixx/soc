<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class showPassInput extends Component
{
    /**
     * Create a new component instance.
     */
    public $name;
    public $id;
    public $class;
    
    public function __construct($name, $id, $class='')
    {
        //
        $this->name=$name;
        $this->id=$id;
        $this->class=$class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.auth.show-pass-input');
    }
}
