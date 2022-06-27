<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PrintComponent extends Component
{
    public $distribution;
    public $simcards;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($dist, $sim)
    {
        $this->distribution = $dist;
        $this->simcards = $sim;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.print-component')->with([
            'distributions' => $this->distribution,
            'simcards' => $this->simcards
        ]);
    }
}
