<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class lectureViewDiv extends Component
{
    /**
     * Create a new component instance.
     */
    public $id;
    public $elder;
    public $parent;
    public $title;
    public $content;
    public $iclass;
    public $sclass;
    public $aclass;
    public $syllab;
    public $childid , $parentid , $elderid , $rank;
    public function __construct($id, $elder, $parent, $title, $content, $iclass="", $sclass="", $aclass="", $syllab, $childid, $elderid, $parentid, $rank)
    {
        $this->id = $id;
        $this->parent = $parent;
        $this->title = $title;
        $this->content = $content;
        $this->iclass = $iclass;
        $this->sclass = $sclass;
        $this->aclass = $aclass;
        $this->syllab = $syllab;
        $this->elder = $elder;
        $this->childid = $childid;
        $this->parentid = $parentid;
        $this->elderid = $elderid;
        $this->rank = $rank;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.lecture-view-div');
    }
}
