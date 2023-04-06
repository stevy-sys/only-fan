<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OneGalleryComponent extends Component
{
    public $file;
    public $description;
    public $id;
    public $type;
    public $enctype;
    public $active;

    /**
     * Create a new component instance.
     */
    public function __construct($file,$description,$id,$type,$enctype,$active)
    {
        $this->file = $file;
        $this->description = $description;
        $this->id = $id;
        $this->type = $type;
        $this->enctype = $enctype;
        $this->active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.one-gallery-component');
    }
}
