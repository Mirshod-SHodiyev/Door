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

    // Parametrlarni olish
    $width = $request->input('width');   // Eshik eni
    $height = $request->input('height'); // Eshik bo'yi
    $discount = $request->input('discount'); // Chegirma
    $isDoorService = $request->input('door_dimensions_id'); // Eshik xizmati
    $selectedDoorFrame = $request->input('door_frames_id'); // Ramka turi
    $selectedTopSection = $request->input('has_top_sections_id'); // Yuqori bo'lim
    $selectedKnob = $request->input('knobs_id'); // Tutqich
    $selectedFrameId = $request->input('frames_id'); // Ramka identifikatori
    $selectedNumber = $request->input('door_types_id'); // Eshik turi

    // Ramka narxlarini belgilash
    $doorFramePriceMapping = [
        '10 lik tekis nalichka' => 100000,
        '2 ta tirnoqcha nalichka' => 200000,
        '3 ta tirnoqcha nalichka' => 300000,
        '1.6 lik nalichka' => 160000,
        '1.6 lik profo nalichka' => 170000,
        '1-qoator apklat nalichka' => 200000,
        '2-qoator apklat nalichka' => 250000,
        'gulli nalichka' => 220000,
        'lagmoncha nalichka' => 230000,
        'toshkent fason nalichka' => 240000,
    ];

    $doorFramePrice = 0;
    if ($selectedDoorFrame && isset($doorFramePriceMapping[$selectedDoorFrame])) {
        $doorFramePrice = $doorFramePriceMapping[$selectedDoorFrame];
    }

    // Eshik turlari uchun bazaviy narxlar
    $numbers = [
        '210' => 2100000, '211' => 2100000, '204' => 2350000, '201' => 1900000, '206' => 2700000,
        '209' => 1090000, '202' => 2100000, '205' => 2650000, '207' => 2950000, '226' => 5100000,
        '220' => 4300000, '232' => 2200000, '203' => 2330000, '230' => 1850000, '231' => 1850000,
        '218' => 2500000, '219' => 2600000, '221' => 2830000, '113' => 2550000, '212' => 3750000,
        '110' => 2850000, '225' => 2700000, '208' => 2400000, '224' => 2250000, '235' => 2500000,
        '289' => 3400000, '298' => 2700000, '291' => 3350000, '293' => 2750000, '295' => 2200000,
        '297' => 4700000, '296' => 2500000, '255' => 3300000, '290' => 6000000, '292' => 4900000,
        '294' => 3800000, '299' => 4000000,
    ];
    $price = 0;

    // Eshik turi bo'yicha narx olish
    if ($selectedNumber && isset($numbers[$selectedNumber])) {
        $basePrice = $numbers[$selectedNumber];

        // Narxni o'zgartirish
        if ($width >= 100 && $width <= 130 && $height >= 210 && $height <= 270) {
            $price = $basePrice * 1.5; // Narxni 50% oshirish
        } elseif ($width >= 131 && $width <= 180 && $height >= 210 && $height <= 310) {
            $price = $basePrice * 2; // Narxni 2 baravar oshirish
        }

        // Balandlikdan qo'shimcha narx qo'shish
        if ($height > 210) {
            $extraHeight = $height - 210;
            $extraPercentage = ceil($extraHeight / 10) * 0.05;
            $price += $basePrice * $extraPercentage;
        }
    }

    // Xizmat bo'lsa yoki bo'lmasa narxni kamaytirish yoki oshirish
    $doorDimension = DoorDimension::find($isDoorService);
    if ($doorDimension && $doorDimension->service_free === 'yo\'q') {
        $price -= 250;
    }

    // Kubik sapajok uchun qo'shimcha narx
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

    // Yuqori bo'lim uchun qo'shimcha narx
    $topSectionPrice = 0;
    $topSectionsMapping = [
        'Section 1' => 10000,
        'Section 2' => 20000,
        'Section 3' => 30000,
        'Section 4' => 40000,
    ];

    if ($selectedTopSection && isset($topSectionsMapping[$selectedTopSection])) {
        $topSectionPrice = $topSectionsMapping[$selectedTopSection];
    }

    // Tutqich narxi
    $knobPrice = 0;

    if ($selectedKnob) {
        $knob = Knob::find($selectedKnob);
        if ($knob) {
            if ($knob->name == 'ha') {
                $knobPrice = 200000;
            }
        }
    }

    // Barcha qo'shimcha narxlarni hisoblash
    $price += $doorFramePrice + $extraPrice + $topSectionPrice + $knobPrice;

    // Chegirma qo'shish
    if ($discount) {
        $price -= $discount;
    }

    return view('ads.hisob', compact('doorTypes', 'ads', 'ad', 'action', 'doorDimensions', 'doorExtras', 'knobs', 'doorFrames', 'price', 'width', 'height', 'hasTopSections', 'frames'));
 }
}