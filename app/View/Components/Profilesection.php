<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Profilesection extends Component
{
    public $friend;
    public $details;
    /**
     * Create a new component instance.
     */
    public function __construct($friend=0, $details=0)
    {
        $this->friend = $friend;
        $this->details = $details;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.profilesection');
    }
}
