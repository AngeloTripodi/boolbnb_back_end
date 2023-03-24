<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    //
    public function index()
    {
        $apartments = Apartment::all();
        return response()->json([
            'success' => true,
            'results' => $apartments
        ]);
    }

    //find or fail da fare 404 con Header? Forse...
    public function show(Apartment $apartment)
    {
        $apartment = Apartment::with('services')->findOrFail($apartment->id);
        return response()->json([
            'success' => true,
            'results' => $apartment

        ]);
    }
}
