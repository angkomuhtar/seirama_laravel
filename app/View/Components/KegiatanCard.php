<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class KegiatanCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $pretitle, 
        public string $title, 
        public string $pelaksana = "",
        public string $num = "",
    )
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user.kegiatan-card');
    }
}
