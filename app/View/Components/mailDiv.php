<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class mailDiv extends Component
{
    /**
     * Create a new component instance.
     */
    public $sender;
    public $title;
    public $content;
    public $sclass;
    public $date;
    public $id;
    public $route;
    public $iclass;
    public function __construct($sender, $title, $content, $sclass="", $date, $id, $route, $iclass="")
    {
        $this->sender = $sender;
        $this->title = $title;
        $this->content = $content;
        $this->sclass = $sclass;
        $this->date = $date;
        $this->id = $id;
        $this->route = $route;
        $this->iclass = $iclass;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.mail-div');
    }
}
