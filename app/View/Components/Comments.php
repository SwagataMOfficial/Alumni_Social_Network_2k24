<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Comments extends Component
{
    public $comments;
    public $userdetails;
    public $key;
    public $index;
    /**
     * Create a new component instance.
     */
    public function __construct($comments, $userdetails, $key, $index) {
        $this->comments = $comments;
        $this->userdetails = $userdetails;
        $this->key = $key;
        $this->index = $index;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.comments');
    }
}
