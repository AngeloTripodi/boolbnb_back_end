<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
            ->when($request->has('address'), function ($query) use ($request) {
                $query->where('address', 'like', '%' . $request->input('address') . '%');
            })
            ->when($request->input('n_beds'), function ($query, $n_beds) {
                $query->where('n_beds', '>=', $n_beds);
            })

            ->when($request->input('n_rooms'), function ($query, $n_rooms) {
                $query->where('n_rooms', '>=', $n_rooms);
            })

            // TODO orderBy title for now
            ->orderBy('title', 'asc')
            ->get();

            $apiKey = 'l22YSe5gZiJE598IOyCxIX93kwokqfqn';
            $address = $request->input('address');

            $response = Http::get('https://api.tomtom.com/search/2/geocode/{address}.json', [
                'key' => $apiKey,
                'query' => $address,
            ]);

            $coordinates = $response->json()['results'][0]['position'];
            $latitude = $coordinates['latitude'];
            $longitude = $coordinates['longitude']; 

        return response()->json([
            'success' => true,
            'results' => $apartments
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
