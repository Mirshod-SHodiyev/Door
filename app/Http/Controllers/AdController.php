<?php

namespace App\Http\Controllers;
use App\Models\Ad;
use App\Models\Color;
use App\Models\DoorAddition;
use App\Models\Price;
use App\Models\DoorDimension;
use App\Models\DoorType;
use Illuminate\Http\Request;;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\DoorExtra;
use App\Models\Knob;
use App\Models\DoorFrame;



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
        $doorAdditions= DoorAddition::all();
        $doorExtras=DoorExtra::all();
        $colors = Color::all();
        $doorTypes = DoorType::all();
        $doorDimensions=DoorDimension::all();
        $ads=Ad::all();
        $ad=new Ad();
        $knobs=Knob::all();
        $doorDimension=new DoorDimension();
        $doorFrames=DoorFrame::all();
       
        return view('ads.create', compact('doorTypes','ads','colors','ad','action','doorDimensions','doorDimension' ,'doorExtras'  ,'doorAdditions','knobs' ,'doorFrames'));

    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
  
    {
        $request->validate([
            'phone_number' => 'required|digits_between:5,15|regex:/^[0-9]+$/',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
            'colors_id' => 'required|numeric',
            'door_types_id' => 'required|numeric',
            'door_dimensions_id' => 'required|numeric',
            'door_extras_id' => 'required|numeric',
            'door_additions_id' => 'required|numeric',
            'knobs_id' => 'required|numeric',
            
           
           
        ], [
            
            'colors_id.required'=>'Rangni tanlash majburiy', 
            'door_types_id' => 'Eshik turi tanlash majburiy',
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
            'user_id' => auth()->id(),
            'colors_id' => $request->input('colors_id'),
            'door_types_id' => $request->input('door_types_id'),
            'door_dimensions_id' => $request->input('door_dimensions_id'),
            'door_extras_id' => $request->input('door_extras_id'),
            'door_additions_id' => $request->input('door_additions_id'),
            'knobs_id' => $request->input('knobs_id'),
            'door_frames_id' => $request->input('door_frames_id'),
          
            
        ]);
         
            $width = $request->input('width');
            $height = $request->input('height');
            $area = $width * $height;  
            $price = $area * 20;  

            if ($request->input('door_dimensions_id') != '0') {
       
                $price -= 100;
            }
        
            Price::create([
                'price' => $price,
                'ad_id' => $ad->id
            ]);

        return redirect(route('house'))->with('message', "E'lon yaratildi ");
    }


    public function show(string $id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory
    {
        $ad = Ad::with(['color','doorDimension' , 'doorType', 'doorAddition', 'doorExtra', 'knob', 'doorFrame' ])->find($id);
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
    $doorAdditions = \App\Models\DoorAddition::all();
    $doorExtras = \App\Models\DoorExtra::all();
    $knobs=\App\Models\Knob::all();
    $doorFrames=DoorFrame::all();
    $action = route('ads.update', $ad->id); 
 
    return view('ads.edit', compact('ad', 'colors', 'doorTypes', 'doorDimensions' , 'action' , 'doorAdditions' , 'doorExtras' , 'knobs' , 'doorFrames'));
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
        'door_additions_id' => 'required|numeric',
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
        'colors_id' => $request->input('colors_id'),
        'door_types_id' => $request->input('door_types_id'),
        'door_dimensions_id' => $request->input('door_dimensions_id'),
        'door_extras_id' => $request->input('door_extras_id'),
        'door_additions_id' => $request->input('door_additions_id'),
        'knobs_id' => $request->input('knobs_id'),
        'door_frames_id' => $request->input('door_frames_id'),
    ]);


    $width = $request->input('width');
    $height = $request->input('height');
    $area = $width * $height;
    $price = $area * 20;

  
    if ($request->input('door_dimensions_id') != '0') {
       
        $price -= 100;
    }

    $priceRecord = Price::where('ad_id', $ad->id)->first();
    $priceRecord->update([
        'price' => $price
    ]);


    return redirect(route('house'))->with('message', "E'lon yangilandi");
}

    
    

    public function generatePDF(string $id)
    {
        $ad = Ad::with(['color', 'doorDimension', 'doorType'])->find($id);

        $pdf = PDF::loadView('components.pdf-ad', ['ad' => $ad]);

       
        return $pdf->download('ad-details.pdf');
    }


    public function find(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $searchPhrase = $request->input('search_phrase');
        $doorTypes = $request->input('door_types_id'); 
    
        $ads = Ad::query();
    
     
        if ($searchPhrase) {
            $ads->where('customers_info', 'like', '%' . $searchPhrase . '%');
        }
    
      
        if ($doorTypes) {
            $ads->where('door_types_id', $doorTypes);
        }
    
      
        $ads = $ads->get();  
    
        
        $doorTypes = DoorType::all();
    
      
        return view('ads.index', compact('ads', 'doorTypes'));
    }
    

  

}
