<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartamentController extends Controller
{
    public function index()
    {
        $apartaments = Apartment::all();
        return response()->json([
            'success' => true,
            'results' => $apartaments
        ]);
    }
    public function show($slug)
    {
        $apartament = Apartment::where('slug', $slug)->with('mediabook', 'category', 'service', 'sponsor')->first();
        if ($apartament) {
            return response()->json([
                'success' => true,
                'results' => $apartament
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => 'Nessun appartamento  trovato'
            ]);
        }
    }
}
