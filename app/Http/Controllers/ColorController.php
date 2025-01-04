<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Ad;
use App\Models\DoorDimension;
use App\Models\DoorType;
use App\Models\HasTopSection;
use App\Models\DoorExtra;
use App\Models\Knob;
use App\Models\DoorFrame;

class ColorController extends Controller
{
   
    public function hisob(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory
    {
        $action = route('hisob.post');
        $doorExtras = DoorExtra::all();
        $doorTypes = DoorType::all();
        $doorDimensions = DoorDimension::all();
        $ads = Ad::all();
        $ad = new Ad();
        $knobs = Knob::all();
        $hasTopSections = HasTopSection::all();
        $doorFrames = DoorFrame::all();

       
        $width = $request->input('width');
        $height = $request->input('height');
        
      
        $price = null;
        if ($width && $height) {
           
            $price = $width * $height * 100;
        }

        return view('ads.hisob', compact('doorTypes', 'ads', 'ad', 'action', 'doorDimensions', 'doorExtras',  'knobs', 'doorFrames', 'price', 'width', 'height' , 'hasTopSections'));
    }
}
