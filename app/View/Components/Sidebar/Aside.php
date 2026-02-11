<?php

namespace App\View\Components\Sidebar;

use Illuminate\View\Component;

class Aside extends Component
{
    public $logo;

    /**
     * Create a new component instance.
     * 
     *
     * @return void
     */
    public function __construct($logo = null)
    {
        //
        $this->logo = $logo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sidebar.aside');
    }
}
