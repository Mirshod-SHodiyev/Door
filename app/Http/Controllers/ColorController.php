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
        // Foydalanuvchi yuborgan formani qayta ishlash
        $action = route('hisob.post');

        // Kerakli modellardan ma'lumotlarni olish
        $doorExtras = DoorExtra::all();
        $doorTypes = DoorType::all();
        $doorDimensions = DoorDimension::all();
        $frames = Frame::all();
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
        $selectedFrame = $request->input('frames_id'); // Ramka identifikatori
        $selectedDoorType = $request->input('door_types_id');
        $selectedDoorExtra = $request->input('door_extras_id'); 
        $thickness = $request->input('thickness');  
        //  Eshik turi bo'yicha narxni olish  1
        $doorType = DoorType::find($selectedDoorType);

     
        if ($doorType) {
            // Agar doorType topilsa, asosiy narxni olish
            $basePrice = $doorType->price;
            $thickness = $doorType->thickness;  // Eshikning qalinligini olish
        } else {
            $basePrice = 0;
            $thickness = 0;  // Agar eshik turi topilmasa, qalinlikni 0 qilib belgilash
        }
 
        

        if ($thickness == 8 && $request->input('thickness') == 12) {
            $basePrice += 300000; 
        }

       

        // Eshik o'lchamlari bo'yicha narxni o'zgartirish 2
        if ($width >= 100 && $width <= 130 && $height >= 210 && $height <= 270) {
            $basePrice *= 1.5; // Narxni 50% oshirish
        } elseif ($width >= 131 && $width <= 180 && $height >= 210 && $height <= 310) {
            $basePrice *= 2; // Narxni 2 baravar oshirish
        }

        if ($height > 220) {
            $extraHeight = $height - 220; // 220 dan ortiq bo'lgan qismini olish
            $extraFactor = ceil($extraHeight / 10) * 0.05; // Har 10 sm ga 5% qo'shish
            $basePrice *= (1 + $extraFactor); // Narxni qo'shimcha foiz bilan oshirish
        }

        // Chegirma qo'llash 3
        

        // Qo'shimcha xizmatlar (yoki ramka, yuqori bo'lim, tutqich va h.k.) uchun narxlarni hisoblash 4
        $totalPrice = $basePrice;

        if ($discount) {
            $totalPrice -= $discount; // Chegirma bo'yicha aniq miqdorni narxdan ayirish
        }

        if ($isDoorService) {
            $doorDimension = DoorDimension::find($isDoorService);
            if ($doorDimension) {
                // Agar 'service_free' "yo'q" bo'lsa, 300,000 so'm ayrish
                if ($doorDimension->service_free === 'yo\'q') {
                    $totalPrice -= 300000;  // 300,000 so'm qo'shish
                }
        
                // Narxni qo'shish
                $totalPrice += $doorDimension->price;
            }
        }
        
               // Ramka narxini qo'shish
                    if ($selectedDoorFrame) {
                        $doorFrame = DoorFrame::find($selectedDoorFrame);
                        if ($doorFrame) {
                            // Eshikning o'lchamini olish
                            $width = $request->input('width');   // Eshik eni (santimetrda)
                            $height = $request->input('height'); // Eshik bo'yi (santimetrda)
                            
                            // Santimetrni metrga o'tkazish
                            $widthInMeters = $width / 100;   // Eshik eni metrda
                            $heightInMeters = $height / 100; // Eshik bo'yi metrda
                            
                            // Ramka narxini o'lchamlarga ko'paytirish
                            // Ramka narxini eshikning eni (metrda), bo'yi (metrda ikki marta) va 55 sm (metrga o'tkazilgan) qo'shib ko'paytiramiz
                            $framePrice = $doorFrame->price * ($widthInMeters + ($heightInMeters * 2) + 0.55); // 55 sm -> 0.55 m

                            // Umumiy narxga ramka narxini qo'shish
                            $totalPrice += $framePrice;
                        }
                    }



        // Yuqori bo'lim narxini qo'shish 5
        if ($selectedTopSection) {
            $topSection = HasTopSection::find($selectedTopSection);
            if ($topSection) {
                $totalPrice += $topSection->price;
            }
        }

        // Tutqich narxini qo'shish 6
            if ($selectedKnob) {
                $knob = Knob::find($selectedKnob);
                if ($knob) {
                    // Agar 'service_free' "ha" bo'lsa, 200,000 so'm qo'shish
                    if ($knob->name === 'ha') {
                        $totalPrice += 200000;  // 200,000 so'm qo'shish
                    }

             // Narxni qo'shish
               $totalPrice += $knob->price;
    }
}


      // Ramka identifikatori bo'yicha narxni qo'shish 7
        if ($selectedFrame) {
            $frame = Frame::find($selectedFrame);
            if ($frame) {
                // Agar 'service_free' "ha" bo'lsa va o'lchamlar mos kelsa
                if ($frame->service_free === 'ha' && $width > 100 && $height > 210) {
                    // Eshik turi narxiga 30% qo'shish
                    $doorType = DoorType::find($selectedDoorType);  // Eshik turini olish
                    if ($doorType) {
                        $totalPrice += $doorType->price * 0.30;  // 30% qo'shish
                    }
                }

                // Ramka narxini qo'shish
                $totalPrice += $frame->price;
            }
}

                if ($selectedDoorExtra) {    
                    $doorExtra = DoorExtra::find($selectedDoorExtra);
                    if ($doorExtra) {
                        $totalPrice += $doorExtra->price;  // Tanlangan DoorExtra narxini qo'shish 8
                    }
                }

        // Hisoblangan jami narxni view ga uzatish
        return view('ads.hisob', compact(
            'doorTypes', 'ads', 'ad', 'action', 'doorDimensions', 
            'doorExtras', 'knobs', 'doorFrames', 'width', 'height', 
            'hasTopSections', 'frames', 'totalPrice'
        ));
    }
}
