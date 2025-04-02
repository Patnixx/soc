<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class courseInputDiv extends Component
{
    /**
     * Create a new component instance.
     */
    public $name;
    public $teachers;
    public $description;
    public $class;
    public $length;
    public $status;
    public $season;
    public $id;
    
    public function __construct($name, $teachers, $description, $class, $length, $status, $season, $id)
    {
        //
        $this->name = $name;
        $this->teachers = $teachers;
        $this->description = $description;
        $this->class = $class;
        $this->length = $length;
        $this->status = $status;
        $this->season = $season;
        $this->id = $id;
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.progress.course-input-div');
    }
}
