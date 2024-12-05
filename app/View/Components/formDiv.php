<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class formDiv extends Component
{
    /**
     * Create a new component instance.
     */

    public $fname;
    public $lname;
    public $email;
    public $birthday;
    public $season;
    public $length;
    public $class;
    public $reason;
    public $dtlroute;
    public $editroute;
    public $delroute;
    
    public function __construct($fname, $lname, $email, $birthday, $season, $length, $class, $reason, $dtlroute, $editroute, $delroute)
    {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->birthday = $birthday;
        $this->season = $season;
        $this->length = $length;
        $this->class = $class;
        $this->reason = $reason;
        $this->dtlroute = $dtlroute;
        $this->editroute = $editroute;
        $this->delroute = $delroute;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.progress.form-div');
    }
}
