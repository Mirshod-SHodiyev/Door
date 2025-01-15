<?php

namespace App\Http\Controllers;
use App\Models\Ad;
use App\Models\Color;
use App\Models\Price;
use App\Models\DoorDimension;
use App\Models\DoorType;
use Illuminate\Http\Request;
use App\Models\DoorExtra;
use App\Models\Knob;
use App\Models\DoorFrame;
use App\Models\HasTopSection;
use App\Models\Frame;
use App\Models\Material;



class AdController extends Controller
{
   

    public function index()
    {
        
        $colors = Color::all();
        $doorTypes = DoorType::all();
        $userId = auth()->id(); 
        $ads = Ad::query()
            ->where('user_id', $userId)  
            ->with([
                'doorType',
                'color',
                'user',
                'doorDimension',
                'price',
            
            ]) ->get();
           
    
        return view('ads.index', compact('colors', 'ads', 'doorTypes' ));
    }
    

    
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory
    {
      
        $action = route('ads.store');
      
        $doorExtras=DoorExtra::all();
        $frames=Frame::all();
        $colors = Color::all();
        $doorTypes = DoorType::all();
        $hasTopSections=HasTopSection::all();
        $doorDimensions=DoorDimension::all();
        $ads=Ad::all();
        $ad=new Ad();
         $materials=Material::all();
        $knobs=Knob::all();
        $doorDimension=new DoorDimension();
        $doorFrames=DoorFrame::all();
       
        return view('ads.create', compact('doorTypes','ads','colors','ad','action','doorDimensions' ,'doorExtras'  ,'knobs' ,'doorFrames', 'hasTopSections' ,'frames','materials'));

    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
  
    {
        $request->validate([
            'phone_number' => 'required|digits_between:5,15|regex:/^[0-9]+$/',
            'has_top_sections_id' => 'exists:has_top_sections,id',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
            'colors_id' => 'required|numeric',
            'door_types_id' => 'required|numeric',
            'door_dimensions_id' => 'required|numeric',
            'door_extras_id' => 'required|numeric',
            'knobs_id' => 'required|numeric',
            'thickness' => 'required|numeric',
            
           
           
        ], [
            'colors_id.required'=>'Rangni tanlash majburiy', 
            'door_types_id' => 'Eshik turi tanlash majburiy',
            'door_dimensions_id' => 'Eshik o\'lchami tanlash majburiy',
            'door_extras_id' => 'Eshik xususiyatlari tanlash majburiy',
            'knobs_id' => 'Eshik kovalari tanlash majburiy',
            'has_top_sections_id' => 'Eshik qoshini tanlash majburiy',

        ]);
     
         

        $doorType = DoorType::find($request->door_types_id);
        if (!$doorType) {
            return redirect()->back()->with('error', 'Eshik turi topilmadi.');
        }
    
       
    

         $ad = Ad::create([
           'phone_number' => $request->input('phone_number'),
            'customers_info' => $request->input('customers_info'),
            'extra_info' => $request->input('extra_info'),
            'width' => $request->input('width'),
            'height' => $request->input('height'),
            'discount' => $request->input('discount', 0),
            'thickness' => $request->input('thickness'),
            'user_id' => auth()->id(),
            'colors_id' => $request->input('colors_id'),
            'door_types_id' => $request->input('door_types_id'),
            'door_dimensions_id' => $request->input('door_dimensions_id'),
            'door_extras_id' => $request->input('door_extras_id'),
            'knobs_id' => $request->input('knobs_id'),
            'door_frames_id' => $request->input('door_frames_id'),
            'has_top_sections_id' => $request->input('has_top_sections_id'),
            'frames_id' => $request->input('frames_id'),
            'materials_id' => $request->input('materials_id'),
          
            
        ]);
         
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
        $selectedMaterial = $request->input('materials_id');
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
                            if ($height > 210) {
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
        
            Price::create([
                'price' => $totalPrice,
                'ad_id' => $ad->id
            ]);

            return redirect()->route('generate.pdf', ['id' => $ad->id])
            ->with('message', "E'lon yaratildi va PDF yuklanmoqda.");
    }


    public function show(string $id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory
    {
        $ad = Ad::with(['color','doorDimension' , 'doorType',  'doorExtra', 'knob', 'doorFrame' , 'hasTopSection' , 'frame' , 'material'])->find($id);
        return view('components.single-ad', ['ad'=>$ad]);
    }
      
    public function destroy(string $id)
    {
        //
    }
    public function edit(Ad $ad)
{

    $colors = \App\Models\Color::all();
     $doorTypes = \App\Models\DoorType::all();
    $doorDimensions = \App\Models\DoorDimension::all();
    $doorExtras = \App\Models\DoorExtra::all();
    $knobs=\App\Models\Knob::all();
    $hasTopSections=\App\Models\HasTopSection::all();
    $frames=\App\Models\Frame::all();
    $doorFrames=DoorFrame::all();
    $materials=Material::all();
    
    $action = route('ads.update', $ad->id); 
 
    return view('ads.edit', compact('ad', 'colors', 'doorTypes', 'doorDimensions' , 'action' , 'doorExtras' , 'knobs' , 'doorFrames', 'hasTopSections', 'frames' ,'doorFrames' ,'materials'));
}


public function update(Request $request, Ad $ad)
{
    $request->validate([
        'phone_number' => 'required|digits_between:5,15|regex:/^[0-9]+$/',
        'width' => 'required|numeric',
        'height' => 'required|numeric',
        'colors_id' => 'required|numeric',
        'door_types_id' => 'required|numeric',
        'door_dimensions_id' => 'required|numeric',
        'door_extras_id' => 'required|numeric',
        'knobs_id' => 'required|numeric',
    ], [
        
        'colors_id.required' => 'Rangni tanlash majburiy',
    ]);

 
    $ad->update([
         'phone_number'=> $request->input('phone_number'),
         'extra_info' => $request->input('extra_info'),
        'customers_info' => $request->input('customers_info'),
        'width' => $request->input('width'),
        'height' => $request->input('height'),
        'discount' => $request->input('discount', 0),
        'thickness' => $request->input('thickness'),
        'colors_id' => $request->input('colors_id'),
        'door_types_id' => $request->input('door_types_id'),
        'door_dimensions_id' => $request->input('door_dimensions_id'),
        'door_extras_id' => $request->input('door_extras_id'),
        'knobs_id' => $request->input('knobs_id'),
        'door_frames_id' => $request->input('door_frames_id'),
        'has_top_sections_id' => $request->input('has_top_sections_id'),
        'frames_id' => $request->input('frames_id'),
        'materials_id' => $request->input('materials_id'),
    ]);

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
         $selectedMaterial = $request->input('materials_id'); // Material identifikatori
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
                        if ($height > 210) {
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
 

    $priceRecord = Price::where('ad_id', $ad->id)->first();
    $priceRecord->update([
        'price' => $totalPrice
    ]);


    return redirect()->route('generate.pdf', ['id' => $ad->id])
    ->with('message', "E'lon yaratildi va PDF yuklanmoqda.");
}


}
