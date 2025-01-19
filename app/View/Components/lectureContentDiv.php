<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class lectureContentDiv extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $content;
    public $image;
    public $imgRoute;
    public function __construct($title, $image = null, $content, $imgRoute = null)
    {
        $this->title = $title;
        $this->image = $image;
        $this->imgRoute = $imgRoute;
        $this->content = $content;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.lecture-content-div');
    }
}
