<?php
namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models;

class AdForm extends Component
{
    public $ad; // Mavjud e'lon
    public array|null $ads = null;
    public  $action; // Formaning action manzili
    public  $colors = [];
    public  $doorTypes = [];
    public  $doorDimensions = [];
    public $doorDimension;
  

    public function __construct($action = "/ads", $ad = null)
    {
        $this->action = $action;  // Yangi action qiymati
        $this->ad = $ad;          // Mavjud e'lonni olish
        $this->colors = \App\Models\Color::all();
        $this->doorTypes = \App\Models\DoorType::all();
        $this->doorDimensions = \App\Models\DoorDimension::all();
        
    }

    public function render(): View|Closure|string
    {
        return view('components.ad-form');
    }
}
