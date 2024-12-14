<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class userDiv extends Component
{
    /**
     * Create a new component instance.
     */
    public $id;
    public $fname;
    public $lname;
    public $email;
    public $role;
    public $birthday;
    public $telnum;
    public $iclass;
    public $sclass;
    public $gradient;
    public function __construct($id, $fname, $lname, $email, $role, $birthday, $telnum, $iclass="", $sclass="", $gradient="")
    {
        $this->id = $id;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->role = $role;
        $this->birthday = $birthday;
        $this->telnum = $telnum;
        $this->iclass = $iclass;
        $this->sclass = $sclass;
        $this->gradient = $gradient;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user-div');
    }
}
