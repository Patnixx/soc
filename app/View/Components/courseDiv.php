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
    public $dtlroute;
    public $editroute;
    public $delroute;
    
    public function __construct($name, $teacher, $description, $class, $length, $status, $season, $dtlroute, $editroute, $delroute)
    {
        //
        $this->name = $name;
        $this->teacher = $teacher;
        $this->description = $description;
        $this->class = $class;
        $this->length = $length;
        $this->status = $status;
        $this->season = $season;
        $this->dtlroute = $dtlroute;
        $this->editroute = $editroute;
        $this->delroute = $delroute;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.progress.course-div');
    }
}
