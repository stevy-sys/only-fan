<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardPaymentComponent extends Component
{
    public $icon;
    public $description;

    public function __construct($icon, $description)
    {
        $this->icon = $icon;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-payment-component');
    }
}
