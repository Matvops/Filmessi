<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class movies extends Component
{

    public array $movies;

    /**
     * Create a new component instance.
     */
    public function __construct(array $movies)
    {
        $this->movies = $movies;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.new_movies');
    }
}
