<?php

namespace App\Http\Controllers;
use App\Models\Ad;
use App\Models\Images;
use App\Models\Color;
use App\Models\Price;
use App\Models\DoorDimension;
use App\Models\DoorType;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;



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
                'images'
            ])
            ->get();
    
        return view('ads.index', compact('colors', 'ads', 'doorTypes' ));
    }
    

    
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory
    {
      
        $action = route('ads.store');
        $colors = Color::all();
        $images = Images::all();
        $doorTypes = DoorType::all();
        $doorDimensions=DoorDimension::all();
        $ads=Ad::all();
        $ad=new Ad();
        $doorDimension=new DoorDimension();
        return view('ads.create', compact('doorTypes','ads','colors','ad','action','doorDimensions','doorDimension' ,'images'));

    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
  
    {

        $request->validate([
            'phone_number' => 'required|digits_between:5,15|regex:/^[0-9]+$/',
            'width' => 'required',
            'height' => 'required',
            'colors_id' => 'required',
            'door_types_id' => 'required',
            'door_dimensions_id' => 'required',
           
           
        ], [
            'title.required' => 'Titlni kiritish majburiy',
            'description.required' => 'Izoh kiritish majburiy',
            'colors_id.required'=>'Rangni tanlash majburiy', 
        ]);
     
     
         $ad = Ad::create([
           'phone_number' => $request->input('phone_number'),
            'customers_info' => $request->input('customers_info'),
            'extra_info' => 'nullable|string',
            'width' => $request->input('width'),
            'height' => $request->input('height'),
            'user_id' => auth()->id(),
            'colors_id' => $request->input('colors_id'),
            'door_types_id' => $request->input('door_types_id'),
            'door_dimensions_id' => $request->input('door_dimensions_id')
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

            if ($request->has('selected_images')) {
                $selectedImages = $request->input('selected_images'); // Tanlangan rasmlar
        
                foreach ($selectedImages as $imageId) {
                    Images::where('id', $imageId)->update(['ad_id' => $ad->id]);
                }
            }

        return redirect(route('house'))->with('message', "E'lon yaratildi");
    }


    public function show(string $id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory
    {
        $ad = Ad::with(['color','doorDimension' , 'doorType' ])->find($id);
      
        return view('components.single-ad', ['ad'=>$ad]);
    }

    /**
     * Show the form for editing the specified resource.
     */
   

    /**
     * Update the specified resource in storage.
     */
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function edit(Ad $ad)
{

    $colors = \App\Models\Color::all();
 
    $doorTypes = \App\Models\DoorType::all();
    $doorDimensions = \App\Models\DoorDimension::all();

 
    return view('ads.edit', compact('ad', 'colors', 'doorTypes', 'doorDimensions'));
}


public function update(Request $request, Ad $ad)
{
    $request->validate([
        'phone_number' => 'required|digits_between:5,15|regex:/^[0-9]+$/',
        'width' => 'required',
        'height' => 'required',
        'colors_id' => 'required',
        'door_types_id' => 'required',
        'door_dimensions_id' => 'required',
    ], [
        'title.required' => 'Titlni kiritish majburiy',
        'description.required' => 'Izoh kiritish majburiy',
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
        'door_dimensions_id' => $request->input('door_dimensions_id')
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

    if ($request->has('selected_images')) {
        $selectedImages = $request->input('selected_images'); // Tanlangan rasmlar

        foreach ($selectedImages as $imageId) {
            Images::where('id', $imageId)->update(['ad_id' => $ad->id]);
        }
    }

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
            $ads->where('title', 'like', '%' . $searchPhrase . '%');
        }
    
        
        if ($doorTypes) {
            $ads->where('door_types_id', $doorTypes);
        }
    
     
        $ads = $ads->with('price')->get();
    
     
        $doorTypes = DoorType::all(); 
    
      
        return view('ads.index', compact('ads', 'doorTypes'));
    }
    

  

}
