<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class eventDiv extends Component
{
    /**
     * Create a new component instance.
     */

    public $aclass;
    public $sclass;
    public $id;
    public $name;
    public $start;
    public $diff;
    public $iclass;
    public function __construct($aclass, $sclass, $id, $name, $start, $diff, $iclass)
    {
        //
        $this->aclass=$aclass;
        $this->sclass=$sclass;
        $this->id=$id;
        $this->name=$name;
        $this->start=$start;
        $this->diff=$diff;
        $this->iclass=$iclass;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.event-div');
    }
}
