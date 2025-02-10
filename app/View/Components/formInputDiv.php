<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class formInputDiv extends Component
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
    public $approval;
    public $id;
    public $courseid;
    public $divclass;
    public $hclass;
    public $pclass;
    public $sclass;
    public $selclass;
    public $iptclass;
    public $user; 
    
    public function __construct($fname, $lname, $email, $birthday, $season, $length, $class, $reason, $approval, $id, $courseid='', $divclass='', $hclass='', $pclass='', $sclass='', $selclass='', $iptclass='', $user)
    {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->birthday = $birthday;
        $this->season = $season;
        $this->length = $length;
        $this->class = $class;
        $this->reason = $reason;
        $this->approval = $approval;
        $this->id = $id;
        $this->divclass = $divclass;
        $this->hclass = $hclass;
        $this->pclass = $pclass;
        $this->sclass = $sclass;
        $this->selclass = $selclass;
        $this->iptclass = $iptclass;
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.progress.form-input-div');
    }
}
