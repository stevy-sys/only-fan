<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CounterComponent extends Component
{
    public $type;
    public $counter;
    /**
     * Create a new component instance.
     */
    public function __construct($type,$counter)
    {
        $this->type =$type;
        $this->counter =$counter;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.counter-component');
    }
}
