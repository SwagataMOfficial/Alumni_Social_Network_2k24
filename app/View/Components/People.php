<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class People extends Component {
    public $username;
    public $about;
    public $imageLink;
    /**
     * Create a new component instance.
     */
    public function __construct($username = "", $about = "", $imageLink = "") {
        $this->username = $username;
        $this->about = $about;
        $this->imageLink = $imageLink;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string {
        return view('components.people');
    }
}
