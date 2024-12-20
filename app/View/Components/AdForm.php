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
    public  $doorTypes = [];
    public  $doorDimensions = [];
    public $doorDimension;


    public function __construct()
    {
        $this->colors = \App\Models\Color::all();
        $this->doorTypes = \App\Models\DoorType::all();
        $this->doorDimensions = \App\Models\DoorDimension::all();

    }


    public function render(): View|Closure|string
    {
        return view('components.ad-form');
    }
}
