<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Images;
use App\Models\Color;
use Faker\Factory;
use App\Models\Price;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use JetBrains\PhpStorm\NoReturn;
use PHPUnit\TextUI\Application;
use Barryvdh\DomPDF\Facade\Pdf;



class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $ads = Ad::with('price')->get();
            $colors=Color::all();
            $userId = auth()->id();
            $ads = Ad::query()->withCount([
               'bookmarkedByUsers as bookmarked' => function ($query) use ($userId) {
                $query->where('user_id', $userId);
               }
            ])->get();
            return view('ads.index' ,compact('colors','ads' ));
    }

    
    

    
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory
    {

        // $action = route('ads.store');
        $colors = Color::all();
        $ads=Ad::all();
        $ad=new Ad();
        return view('ads.create', compact('ads','colors','ad'));

    }

    /**
     * Store a newly created resource in storage.
     */
    #[NoReturn] public function store(Request $request)
    {

        $request->validate([
            'title' => 'required | min:5',
            'description' => 'required',
           
        ],[
            'title'=>['required' => 'Titlini kiritish majburiy'],
            'description' => ['required' => 'Izoh kiritish majburiy'],
        ]);

        $ad = Ad::query()->create([
            'title' => $request->input("title"),
            'description' => $request->input("description"),
            'users_id'=> auth()->id(),
            'door_dimensions_id' => $request->input("door_dimensions_id"),
            'branches_id' => $request->input("branch_id"),
            'colors_id' => $request->input("color_id"),
            'price_id' => $request->input("price_id"),


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
        $ad = Ad::with(['colors','price','doorDimensions' , 'doorTypes'])->find($id);
      
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
       
        $ad = Ad::with(['colors', 'price', 'doorDimensions', 'doorTypes'])->find($id);
    
      
        $pdf = PDF::loadView('components.single-ad', ['ad' => $ad]);
    
        // PDF faylini yuklab olish
        return $pdf->download('ad-details.pdf');
    }


    public function find(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $searchPhrase = $request->input('search_phrase');
        $colorId = $request->input('colors_id');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        $ads = Ad::query();
        if ($searchPhrase) {
            $ads->where('title', 'like', '%' . $searchPhrase . '%');
        }
        if ($colorId) {
            $ads->where('colors_id', $colorId);
        }
        if ($minPrice) {
            $ads->where('price', '>=', $minPrice);
        }
        if ($maxPrice) {
            $ads->where('price', '<=', $maxPrice);
        }
        $ads = $ads->with('colors')->get();
        $colors = Color::all();
        return view('ads.index', compact('ads', 'colors'));
    }


  

}
