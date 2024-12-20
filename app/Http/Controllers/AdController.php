<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Images;
use App\Models\Color;
use Faker\Factory;
use App\Models\Price;

use App\Models\DoorDimension;
use App\Models\DoorType;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use JetBrains\PhpStorm\NoReturn;
use PHPUnit\TextUI\Application;
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
                'doorTypes',
                'colors',
                'user',
                'doorDimensions',
                'price'
            ])
            ->get();
    
        return view('ads.index', compact('colors', 'ads', 'doorTypes'));
    }
    

    
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory
    {

        $action = route('ads.store');
        $colors = Color::all();
        $doorTypes = DoorType::all();
        $doorDimensions=DoorDimension::all();
        $ads=Ad::all();
        $ad=new Ad();
        $doorDimension=new DoorDimension();
        return view('ads.create', compact('doorTypes','ads','colors','ad','action','doorDimensions','doorDimension'));

    }

    /**
     * Store a newly created resource in storage.
     */
    #[NoReturn] public function store(Request $request)
  
    {

        $request->validate([
            'title' => 'required|min:5',
            'description' => 'required', 
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
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'customers_info' => $request->input('customers_info'),
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
            $price = $area * 3000;  

        
            Price::create([
                'price' => $price,
                'ad_id' => $ad->id
            ]);

        if ($request->hasFile('image')) {
            $file = Storage::disk('public')->put('/', $request->image);

            Images::query()->create([
                'ad_id' => $ad->id,
                'name'  => $file,
            ]);
        }

        return redirect(route('home'))->with('message', "E'lon yaratildi");
    }


    public function show(string $id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory
    {
        $ad = Ad::with(['colors','doorDimensions' , 'doorTypes'])->find($id);
      
        return view('components.single-ad', ['ad'=>$ad]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function generatePDF(string $id)
    {
        $ad = Ad::with(['colors', 'doorDimensions', 'doorTypes'])->find($id);

        $pdf = PDF::loadView('components.pdf-ad', ['ad' => $ad]);

       
        return $pdf->download('ad-details.pdf');
    }


    public function find(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $searchPhrase = $request->input('search_phrase');
        $doorTypes = $request->input('door_types_id');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        
        $ads = Ad::query();
    
       
        if ($searchPhrase) {
            $ads->where('title', 'like', '%' . $searchPhrase . '%');
        }
    
        
        if ($doorTypes) {
            $ads->where('door_types_id', $doorTypes);
        }
    
      
        if ($minPrice || $maxPrice) {
            $ads->whereHas('price', function ($query) use ($minPrice, $maxPrice) {
                if ($minPrice) {
                    $query->where('price', '>=', $minPrice);
                }
                if ($maxPrice) {
                    $query->where('price', '<=', $maxPrice);
                }
            });
        }
    
     
        $ads = $ads->with('price')->get();
    
     
        $doorTypes = DoorType::all(); 
    
      
        return view('ads.index', compact('ads', 'doorTypes'));
    }
    

  

}
