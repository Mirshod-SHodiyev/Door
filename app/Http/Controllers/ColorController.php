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
use App\Models\Frame;


class ColorController extends Controller
{
    public function hisob(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory
{
    $action = route('hisob.post');
    $doorExtras = DoorExtra::all();
    $doorTypes = DoorType::all();
    $doorDimensions = DoorDimension::all();
    $frames=Frame::all();
    $ads = Ad::all();
    $ad = new Ad();
    $knobs = Knob::all();
    $hasTopSections = HasTopSection::all();
    $doorFrames = DoorFrame::all();

    $width = $request->input('width');
    $height = $request->input('height');
    $discount = $request->input('discount');
    $isDoorService = $request->input('door_dimensions_id');
    $selectedDoorFrame = $request->input('door_frames_id');
    $selectedTopSection = $request->input('has_top_sections_id'); 
    $selectedKnob = $request->input('knobs_id');
    $selectedFrameId = $request->input('frames_id');
    $framePriceAdjustment = 0;





 
    $doorFramePriceMapping = [
        '10 lik tekis nalichka' => 10000,
        '2 ta tirnoqcha nalichka' => 20000,
        '3 ta tirnoqcha nalichka' => 30000,
        '1.6 lik nalichka' => 16000,
        '1.6 lik profo nalichka' => 17000,
        '1-qoator apklat nalichka' => 20000,
        '2-qoator apklat nalichka' => 25000,
        'gulli nalichka' => 22000,
        'lagmoncha nalichka' => 23000,
        'toshkent fason nalichka' => 24000,
    ];

  
  
    $doorFramePrice = 0;
    if ($selectedDoorFrame && isset($doorFramePriceMapping[$selectedDoorFrame])) {
        $doorFramePrice = $doorFramePriceMapping[$selectedDoorFrame];
    }

    
    $numbers = [
        '210' => 2100000,
        '211' => 2100000,
        '204' => 2350000,
        '201' => 1900000,
        '206' => 2700000,
        '209' => 1090000,
        '202' => 2100000,
        '205' => 2650000,
        '207' => 2950000,
        '226' => 5100000,
        '220' => 4300000,
        '232' => 2200000,
        '203' => 2330000,
        '230' => 1850000,
        '231' => 1850000,
        '218' => 2500000,
        '219' => 2600000,
        '221' => 2830000,
        '113' => 2550000,
        '212' => 3750000,
        '110' => 2850000,
        '225' => 2700000,
        '208' => 2400000,
        '224' => 2250000,
        '235' => 2500000,
        '289' => 3400000,
        '298' => 2700000,
        '291' => 33500000,
        '293' => 2750000,
        '295' => 2200000,
        '297' => 4700000,
        '296' => 2500000,
        '255' => 3300000,
        '290' => 6000000,
        '292' => 4900000,
        '294' => 3800000,
        '299' => 4000000,
    ];

    $selectedNumber = $request->input('doortype');
    $price = 0;

    if ($selectedNumber && isset($numbers[$selectedNumber])) {
        $basePrice = $numbers[$selectedNumber];

        if (($width >= 70 && $width <= 95) && ($height >= 150 && $height <= 210)) {
            $price = $basePrice;
        } elseif ($width > 100 && $height > 220) {
            $price = $basePrice * 1.5;
        } else {
            $price = $basePrice * $width * $height;
        }

        if ($discount) {
            $price -= $discount;
        }

        if ($isDoorService) {
            $price -= 100000;
        }
    }

   
    $selectedExtra = $request->input('door_extras_id');
    $extraPrice = 0;

    if ($selectedExtra) {
        $doorExtra = DoorExtra::find($selectedExtra);
        if ($doorExtra) {
            if ($doorExtra->name == 'krashni kubik sapajok') {
                $extraPrice = 50000;
            } elseif ($doorExtra->name == 'shipon kubik sapajok') {
                $extraPrice = 100000;
            }
        }
    }


    $topSectionPrice = 0;
    $topSectionsMapping = [
        'Section 1' => 10,  
        'Section 2' => 20, 
        'Section 3' => 30,   
        'Section 4' => 40,  
    ];

    if ($selectedTopSection && isset($topSectionsMapping[$selectedTopSection])) {
        $topSectionPrice = $topSectionsMapping[$selectedTopSection];
    }
 
    $knobPrice = 0;

    if ($selectedKnob) {
        $knob = Knob::find($selectedKnob);
        if ($knob) {
            if ($knob->name == 'ha') {
                $knobPrice = 200000; 
            }
        }
    }
    
    

     
    $price += $doorFramePrice + $extraPrice+$topSectionPrice+$knobPrice;

    return view('ads.hisob', compact('doorTypes', 'ads', 'ad', 'action', 'doorDimensions', 'doorExtras', 'knobs', 'doorFrames', 'price', 'width', 'height', 'hasTopSections','frames'));
}

}