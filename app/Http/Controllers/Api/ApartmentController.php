<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    //
    public function index(Request $request)
    {
        //Join services table
        $apartments = Apartment::with('services')
            // condition when(boolean, callback function) to filter services only if requested
            ->when($request->input('services'), function ($query, $services) {
                // foreach service build the query with whereHas method to define additional query constraints
                foreach ($services as $service) {
                    $query->whereHas('services', function ($query) use ($service) {
                        // TODO use slug for now
                        $query->where('slug', $service);
                    });
                }
            })
            // TODO orderBy title for now
            ->orderBy('title', 'asc')
            ->get();

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
