<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Profilesection extends Component
{
    public $friend;
    public $details;
    public $amifrind;
    /**
     * Create a new component instance.
     */
    public function __construct($friend, $details, $amifrind)
    {
        $this->friend = $friend;
        $this->details = $details;
        $this->amifrind = $amifrind;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.profilesection');
    }
}
