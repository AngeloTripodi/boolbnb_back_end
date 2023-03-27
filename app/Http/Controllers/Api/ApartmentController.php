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
        $query = Apartment::query();

        // Filtra per indirizzo o città
        if ($request->has('address')) {
            $query->where('address', 'like', '%' . $request->input('address') . '%');
        }

        // Altri filtri qui ...

        $apartments = $query->get();

        return response()->json([
            'success' => true,
            'results' => $apartments
        ]);

        //Join services table
        // $apartments = Apartment::with('services')
        //     // condition when(boolean, callback function) to filter services only if requested
        //     ->when($request->input('services'), function ($query, $services) {
        //         // foreach service build the query with whereHas method to define additional query constraints
        //         foreach ($services as $service) {
        //             $query->whereHas('services', function ($query) use ($service) {
        //                 // TODO use slug for now
        //                 $query->where('slug', $service);
        //             });
        //         }
        //     })
        //     ->when($request->input('n_beds'), function ($query, $n_beds) {
        //         $query->where('n_beds', '>=', $n_beds);
        //     })

        //     ->when($request->input('n_rooms'), function ($query, $n_rooms) {
        //         $query->where('n_rooms', '>=', $n_rooms);
        //     })

        //     // TODO orderBy title for now
        //     ->orderBy('title', 'asc')
        //     ->get();

        // return response()->json([
        //     'success' => true,
        //     'results' => $apartments
        // ]);
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
