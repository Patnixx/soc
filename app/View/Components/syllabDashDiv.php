<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class syllabDashDiv extends Component
{
    /**
     * Create a new component instance.
     */
    public $id;
    public $title;
    public $iclass;
    public $sclass;
    public $aclass;
    public $user;
    public function __construct($id, $title, $iclass="", $sclass="", $aclass="", $user)
    {
        $this->id = $id;
        $this->title = $title;
        $this->iclass = $iclass;
        $this->sclass = $sclass;
        $this->aclass = $aclass;
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.syllab-dash-div');
    }
}
