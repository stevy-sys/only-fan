<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OneGalleryComponent extends Component
{
    public $image;
    public $description;

    /**
     * Create a new component instance.
     */
    public function __construct($image,$description)
    {
        $this->image = $image;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.one-gallery-component');
    }
}
