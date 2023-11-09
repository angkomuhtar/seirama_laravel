<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BrosurHome extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $img,
        public string $title,
        public string $content,
        public string $num
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.brosur-home');
    }
}
