<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Posts extends Component
{
    public $details;
    public $posts;
    public $iamfriend;
    /**
     * Create a new component instance.
     */
    public function __construct($details, $posts, $iamfriend)
    {
        $this->details = $details;
        $this->posts = $posts;
        $this->iamfriend = $iamfriend;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.posts');
    }
}
