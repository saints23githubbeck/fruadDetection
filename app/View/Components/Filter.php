<?php

namespace App\View\Components;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;


class Filter extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     *
     */

    public $categories;
    public function __construct(Collection $categories)
    {
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.filter');
    }
}
