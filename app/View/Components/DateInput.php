<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DateInput extends Component
{
    public $id;
    public $name;
    public $value;
    public $required;
    public $min;
    public $max;

    public function __construct($id, $name, $value = null, $required = false, $min = null, $max = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->value = $value;
        $this->required = $required;
        $this->min = $min ?? now()->subYears(80)->format('Y-m-d');
        $this->max = $max ?? now()->subYears(14)->format('Y-m-d');
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.date-input');
    }
}
