<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class courseUserDiv extends Component
{
    /**
     * Create a new component instance.
     */

    public $fname;
    public $lname;
    public $email;
    public $birthday;
    public $tel;
    public $userid;
    public $since;
    public $courseid;
    public $divclass;
    public $hclass;
    public $pclass;
    public $sclass;
    public function __construct($fname, $lname, $email, $birthday, $tel, $userid, $since, $courseid, $divclass="", $hclass="", $pclass="", $sclass="")
    {
        //
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->birthday = $birthday;
        $this->tel = $tel;
        $this->userid = $userid;
        $this->since = $since;
        $this->courseid = $courseid;
        $this->divclass = $divclass;
        $this->hclass = $hclass;
        $this->pclass = $pclass;
        $this->sclass = $sclass;
        
    }
    
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.progress.course-user-div');
    }
}
