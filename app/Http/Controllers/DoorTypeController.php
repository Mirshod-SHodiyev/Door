<?php
namespace App\Http\Controllers;

use App\Models\DoorType;
use Illuminate\Http\Request;

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
}
