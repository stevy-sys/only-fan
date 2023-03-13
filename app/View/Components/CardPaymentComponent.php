<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardPaymentComponent extends Component
{
    public $icon;
    public $devise;
    public $description;
    public $amount;
    public $id;

    public function __construct($id,$icon, $devise,$description,$amount)
    {
        $this->icon = $icon;
        $this->id = $id;
        $this->devise = $devise;
        $this->description = $description;
        $this->amount = $amount;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-payment-component');
    }
}
