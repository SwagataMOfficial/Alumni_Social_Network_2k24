<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Posts extends Component
{
    public $details;
    public $posts;
    /**
     * Create a new component instance.
     */
    public function __construct($details, $posts)
    {
        $this->details = $details;
        $this->posts = $posts;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.posts');
    }
}
