<?php
namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;


class AdForm extends Component
{
    public $ad; // Mavjud e'lon
    public array|null $ads = null;
    public  $action; // Formaning action manzili
    public  $colors = [];
    public  $doorTypes = [];
    public  $doorDimensions = [];
    public $doorDimension;
    public $doorExtra;
    public $doorExtras=[];
    public $knobs=[];
    public $doorFrames=[];
    public $hasTopSections=[];
    public $hasTopSection;
    public $frames=[];
    public $frame;
    public $materials=[];
    
  

    public function __construct($action = "/ads", $ad = null)
    {
        $this->action = $action;  
        $this->ad = $ad;         
        $this->colors = \App\Models\Color::all();
        $this->doorTypes = \App\Models\DoorType::all();
        $this->doorDimensions = \App\Models\DoorDimension::all();
        $this->doorExtras = \App\Models\DoorExtra::all();
        $this->knobs = \App\Models\Knob::all();
        $this->doorFrames = \App\Models\DoorFrame::all();
        $this->hasTopSections = \App\Models\HasTopSection::all();
        $this->frames = \App\Models\Frame::all();
        $this->materials = \App\Models\Material::all();
     
        
    }

    public function render(): View|Closure|string
    {
        return view('components.ad-form');
    }
}
