<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request; // Bu yerga Requestni qo'shing
use App\Models\Color;
use App\Models\Ad;
use App\Models\Images;
use App\Models\DoorDimension;
use App\Models\DoorType;
use App\Models\DoorAddition;
use App\Models\DoorExtra;
use App\Models\Knob;
use App\Models\DoorFrame;

class ColorController extends Controller
{
   
    public function hisob(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory
    {
        $action = route('hisob.post');
        $doorAdditions = DoorAddition::all();
        $doorExtras = DoorExtra::all();
        $doorTypes = DoorType::all();
        $doorDimensions = DoorDimension::all();
        $ads = Ad::all();
        $ad = new Ad();
        $knobs = Knob::all();
        $doorFrames = DoorFrame::all();

       
        $width = $request->input('width');
        $height = $request->input('height');
        
      
        $price = null;
        if ($width && $height) {
           
            $price = $width * $height * 300;
        }

        return view('ads.hisob', compact('doorTypes', 'ads', 'ad', 'action', 'doorDimensions', 'doorExtras', 'doorAdditions', 'knobs', 'doorFrames', 'price', 'width', 'height'));
    }
}
