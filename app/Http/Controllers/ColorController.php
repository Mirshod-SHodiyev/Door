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
use App\Models\Material;

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
        $materials=Material::all();
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
        $selectedMaterial=$request->input('materials_id');
        //  Eshik turi bo'yicha narxni olish  1
        $doorType = DoorType::find($selectedDoorType);

     
        if ($doorType) {
            // Agar doorType topilsa, asosiy narxni olish
            $basePrice = $doorType->price;
            $thickness = $doorType->thickness;
           // Eshikning qalinligini olish
        } else {
            $basePrice = 0;
            $thickness = 0;  // Agar eshik turi topilmasa, qalinlikni 0 qilib belgilash
        }
 
        

        

       

        // Eshik o'lchamlari bo'yicha narxni o'zgartirish 2
        if ($width >= 96 && $width <= 130 && $height >= 211 && $height <= 270) {
            $basePrice *= 1.5; // Narxni 50% oshirish
        } elseif ($width >= 131 && $width <= 180 && $height >= 210 && $height <= 310) {
            $basePrice *= 2; // Narxni 2 baravar oshirish
        }

       

        // Chegirma qo'llash 3
        

        // Qo'shimcha xizmatlar (yoki ramka, yuqori bo'lim, tutqich va h.k.) uchun narxlarni hisoblash 4
        $totalPrice = $basePrice;

        

        if ($thickness == 8 && $request->input('thickness') == 12) {
            $totalPrice += 300000; 
        }

        if ($discount) {
            $totalPrice -= $discount; // Chegirma bo'yicha aniq miqdorni narxdan ayirish
        }

        if ($isDoorService) {
            $doorDimension = DoorDimension::find($isDoorService);
            if ($doorDimension) {
                // Agar 'service_free' "yo'q" bo'lsa, 300,000 so'm ayrish
                if ($doorDimension->service_free === 'ha') {
                    $totalPrice += 300000;  // 300,000 so'm qo'shish
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
                    if ($frame->name === 'ha' && $height > 210 && $height <= 260) {
                        // Eshik turi narxiga 30% qo'shish
                        $doorType = DoorType::find($selectedDoorType);  // Eshik turini olish
                        if ($doorType) {
                            $totalPrice += $doorType->price * 0.30;  // 30% qo'shish
                        }
                    } elseif ($frame->name === 'ha' && $height > 260) {
                        // Agar bo'yi 260 sm dan ortiq bo'lsa, 50% qo'shish
                        $doorType = DoorType::find($selectedDoorType);  // Eshik turini olish
                        if ($doorType) {
                            $totalPrice += $doorType->price * 0.50;  // 50% qo'shish
                        }
                    } else {
                        // Agar 'service_free' "yo'q" bo'lsa va bo'yi 210 sm dan oshsa
                        if ($height >= 210) {
                            // Har 10 sm uchun 5% qo'shish
                            $extraHeight = $height - 210;  // Bo'yi 210 sm dan ortiqcha
                            $extraPricePercentage = floor($extraHeight / 10) * 0.05;  // Har 10 sm uchun 5% qo'shish

                            // Eshik turi narxiga qo'shish
                            $doorType = DoorType::find($selectedDoorType);  // Eshik turini olish
                            if ($doorType) {
                                $totalPrice += $doorType->price * $extraPricePercentage;  // 5% qo'shish
                            }
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

                $material=Material::find($selectedMaterial);
                if ($material) {
                    $totalPrice += $material->price; 
                }
                  

        // Hisoblangan jami narxni view ga uzatish
        return view('ads.hisob', compact(
            'doorTypes', 'ads', 'ad', 'action', 'doorDimensions', 
            'doorExtras', 'knobs', 'doorFrames', 'width', 'height', 
            'hasTopSections', 'frames',  'materials', 'totalPrice'
        ));
    }
}
