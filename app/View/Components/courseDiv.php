<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class courseDiv extends Component
{
    /**
     * Create a new component instance.
     */

    public $name;
    public $teacher;
    public $description;
    public $class;
    public $length;
    public $status;
    public $season;
    public $id;
    public $students;
    public $divclass;
    public $hclass;
    public $pclass;
    public $sclass;
    public $tclass;
    
    public function __construct($name, $teacher, $description, $class, $length, $status, $season, $id, $students="", $divclass="", $hclass="", $pclass="", $sclass="", $tclass="")
    {
        //
        $this->name = $name;
        $this->teacher = $teacher;
        $this->description = $description;
        $this->class = $class;
        $this->length = $length;
        $this->status = $status;
        $this->season = $season;
        $this->id = $id;
        $this->students = $students;
        $this->divclass = $divclass;
        $this->hclass = $hclass;
        $this->pclass = $pclass;
        $this->sclass = $sclass;
        $this->tclass = $tclass;
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.progress.course-div');
    }
}
