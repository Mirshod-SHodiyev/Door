<?php
namespace App\Http\Controllers;

use App\Models\DoorType;
use Illuminate\Http\Request;
use App\Models\Ad;
use Barryvdh\DomPDF\Facade\Pdf;

class DoorTypeController extends Controller
{
    public function getDoorTypeWithImage(Request $request)
    {
    
        $request->validate([
            'door_type_id' => 'required|exists:door_types,id', 
        ]);

        
        $doorType = DoorType::find($request->door_type_id);

        if ($doorType) {
            return response()->json([
                'name' => $doorType->name,
                'image_url' => $doorType->image_url, 
            ]);
        } else {
            return response()->json(['message' => 'Eshik turi topilmadi.'], 404);
        }
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
    


    public function generatePDF(string $id)
    {
        $ad = Ad::with(['color', 'doorDimension', 'doorType' , 'doorExtra', 'knob', 'doorFrame', 'hasTopSection', 'frame', 'material'])->find($id);

        $pdf = PDF::loadView('components.pdf-ad', ['ad' => $ad]);

       
        return $pdf->stream('ad-details.pdf');
    }

}
