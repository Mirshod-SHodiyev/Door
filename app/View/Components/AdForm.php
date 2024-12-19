<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdForm extends Component
{
    public $ad;
    public array|null $ads =null;
    public  $action = "/ads";
    public   $colors = [];


    public function __construct()
    {
        $this->colors = \App\Models\Color::all();
    }


    public function render(): View|Closure|string
    {
        return view('components.ad-form');
    }
}
