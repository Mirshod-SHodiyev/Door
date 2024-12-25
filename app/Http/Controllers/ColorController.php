<?php

namespace App\Http\Controllers;
use App\Models\Color;
use App\Models\Ad;
use App\Models\Images;
use App\Models\DoorDimension;
use App\Models\DoorType;
use Illuminate\Http\Request;


class ColorController extends Controller
{
   
    
    protected $fillable = ['name'];


    public function hisob(){
      
        return view('ads.hisob');

    }

    public function hisobPost(Request $request)
{
    
    $width = (float) $request->input('width'); 
    $height = (float) $request->input('height'); 
    $doorType = $request->input('door_types_id'); 
    $frame = $request->input('frame'); 
    $topSection = $request->input('topSection'); 
    $service = $request->input('service');

    
    $area = ($width / 100) * ($height / 100); 
    $basePricePerSquareMeter = 50000; 
    $price = $area * $basePricePerSquareMeter;

    if ($frame == "ha") {
        $price += 100000; 
    }
    if ($topSection == "ha") {
        $price += 100000; 
    }
    if ($service == "yo'q") {
        $price -= 100000; 
    }
    if ($doorType == "ha") {
        $price += 100000; 
    }

   
    return view('ads.hisob', [
        'price' => $price,
    ]);

 
}
  
}
