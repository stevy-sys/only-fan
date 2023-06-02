<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OneProductComponent extends Component
{
    public $image ;
    public $id ;
    public $name ;
    public $inCart ;
    public $price ;
    public $wallet ;
    /**
     * Create a new component instance.
     */
    public function __construct($image,$id,$nameproduct,$inCart,$price,$wallet)
    {
        $this->image = $image;
        $this->id = $id;
        $this->name = $nameproduct;
        $this->inCart = $inCart;
        $this->price = $price;
        $this->wallet = $wallet;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.one-product-component');
    }
}
