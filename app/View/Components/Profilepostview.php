<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Profilepostview extends Component
{
    public $details;
    public $posts;
    public $key;
    public $likeduser;
    public $comments;
    /**
     * Create a new component instance.
     */
    public function __construct($details, $posts, $key, $likeduser, $comments)
    {
        $this->details = $details;
        $this->posts = $posts;
        $this->key = $key;
        $this->likeduser = $likeduser;
        $this->comments = $comments;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.profilepostview');
    }
}
