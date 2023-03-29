<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Service;
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
                $query->whereHas('services', function ($query) use ($services) {
                    // whereIn per ottenere gli appartamenti che hanno tutti i servizi richiesti
                    $query->whereIn('slug', $services);
                    //count ci indica il numero di servizi nella query, quindi filtriamo gli appartamenti che hanno un numero di servizi corrispondente a quello della query
                }, '=', count($services));
            })
            ->when($request->has('address'), function ($query) use ($request) {
                $query->where('address', 'like', '%' . $request->input('address') . '%');
            })
            ->when($request->input('n_beds'), function ($query, $n_beds) {
                $query->where('n_beds', '>=', $n_beds);
            })

            ->when($request->input('n_rooms'), function ($query, $n_rooms) {
                $query->where('n_rooms', '>=', $n_rooms);
            })
            ->where('is_visible', true)

            // TODO orderBy title for now
            ->orderBy('title', 'asc')
            ->get();

        return response()->json([
            'success' => true,
            'results' => [
                'apartments' => $apartments,
                'services' => Service::all(),
            ]
        ]);
    }

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


    //find or fail da fare 404 con Header? Forse...
    public function show($slug)
    {
        // show apartment by slug, findOrFail method works only  with ID
        $apartment = Apartment::where('slug', $slug)->with('services')->firstOrFail();
        return response()->json([
            'success' => true,
            'results' => $apartment

        ]);
    }
}
