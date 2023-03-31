<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Service;
use Illuminate\Http\Request;
use Location\Coordinate;
use Location\Distance\Vincenty;


class ApartmentController extends Controller
{
    public function index(Request $request, Apartment $apartment)
    {
        $lat1 = $request->input('latitude'); // latitudine della città di ricerca
        $lon1 = $request->input('longitude'); // longitudine della città di ricerca
        $radius = $request->input('radius') * 1000; // Converti il raggio in metri

        $data = Apartment::with('services')
            // condition when(boolean, callback function) to filter services only if requested
            ->when($request->input('services'), function ($query, $services) {
                $query->whereHas('services', function ($query) use ($services) {
                    // whereIn per ottenere gli appartamenti che hanno tutti i servizi richiesti
                    $query->whereIn('slug', $services);
                }, '=', count($services));
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

        $filteredApartments = [];
        $coordinate1 = new Coordinate($lat1, $lon1); // Coordinate della ricerca
        foreach ($data as $apartment) {
            $lat2 = $apartment->latitude;
            $lon2 = $apartment->longitude;

            $coordinate2 = new Coordinate($lat2, $lon2); // Coordinate dell'appartamento
            $distance = $coordinate1->getDistance($coordinate2, new Vincenty()); // Distanza in metri

            if ($distance <= $radius) {
                array_push($filteredApartments, $apartment);
            }
        }
        $data = collect($filteredApartments);

        // Reindizziamo la collection per avere indici numerici consecutivi
        $data = $data->values();

        return response()->json([
            'success' => true,
            'results' => [
                'apartments' => $data,
                'services' => Service::all(),
            ]
        ]);






        //     $lat1 = $request->input('latitude'); // latitudine della città di ricerca
        //     $lon1 = $request->input('longitude'); // longitudine della città di ricerca
        //     $radius = $request->input('radius') * 1000; // Converti il raggio in metri

        //     //Join services table
        //     $data = Apartment::with('services')
        //         // condition when(boolean, callback function) to filter services only if requested
        //         ->when($request->input('services'), function ($query, $services) {
        //             $query->whereHas('services', function ($query) use ($services) {
        //                 // whereIn per ottenere gli appartamenti che hanno tutti i servizi richiesti
        //                 $query->whereIn('slug', $services);
        //             }, '=', count($services));
        //         })
        //         ->when($request->input('n_beds'), function ($query, $n_beds) {
        //             $query->where('n_beds', '>=', $n_beds);
        //         })

        //         ->when($request->input('n_rooms'), function ($query, $n_rooms) {
        //             $query->where('n_rooms', '>=', $n_rooms);
        //         })
        //         ->where('is_visible', true)

        //         // TODO orderBy title for now
        //         ->orderBy('title', 'asc')
        //         ->get();

        //     $data = $data->filter(function ($apartment) use ($lat1, $lon1, $radius) {
        //         $lat2 = $apartment->latitude;
        //         $lon2 = $apartment->longitude;

        //         $distance = 6371 * acos(cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($lon2) - deg2rad($lon1)) + sin(deg2rad($lat1)) * sin(deg2rad($lat2)));

        //         return $distance <= $radius;
        //     });

        //     // Reindizziamo la collection per avere indici numerici consecutivi
        //     $data = $data->values();

        //     return response()->json([
        //         'success' => true,
        //         'results' => [
        //             'apartments' => $data,
        //             'services' => Service::all(),
        //         ]
        //     ]);




        // $data = Apartment::with('services')
        //     // condition when(boolean, callback function) to filter services only if requested
        //     ->when($request->input('services'), function ($query, $services) {
        //         $query->whereHas('services', function ($query) use ($services) {
        //             // whereIn per ottenere gli appartamenti che hanno tutti i servizi richiesti
        //             $query->whereIn('slug', $services);
        //             //count ci indica il numero di servizi nella query, quindi filtriamo gli appartamenti che hanno un numero di servizi corrispondente a quello della query
        //         }, '=', count($services));
        //     })
        //     ->when($request->input('n_beds'), function ($query, $n_beds) {
        //         $query->where('n_beds', '>=', $n_beds);
        //     })

        //     ->when($request->input('n_rooms'), function ($query, $n_rooms) {
        //         $query->where('n_rooms', '>=', $n_rooms);
        //     })
        //     ->where('is_visible', true)

        //     // TODO orderBy title for now
        //     ->orderBy('title', 'asc')
        //     ->get();

        // // Prendi la latitudine e la longitudine dell'utente
        // $user_latitude = $request->input('latitude');
        // $user_longitude = $request->input('longitude');
        // $radius = $request->input('radius') * 1000; // Converti il raggio in metri

        // // Filtriamo gli appartamenti in base alla distanza dall'utente
        // $data = $data->filter(function ($apartment) use ($user_latitude, $user_longitude, $radius) {
        //     $earth_radius = 6371000; // Raggio terrestre in metri

        //     $dLat = deg2rad($apartment->latitude - $user_latitude);
        //     $dLon = deg2rad($apartment->longitude - $user_longitude);

        //     $a = sin($dLat / 2) * sin($dLat / 2) +
        //         cos(deg2rad($user_latitude)) * cos(deg2rad($apartment->latitude)) *
        //         sin($dLon / 2) * sin($dLon / 2);
        //     $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        //     $distance = $earth_radius * $c; // Distanza in metri tra l'appartamento e l'utente

        //     return $distance <= $radius;
        // });

        // // Reindizziamo la collection per avere indici numerici consecutivi
        // $data = $data->values();

        // return response()->json([
        //     'success' => true,
        //     'results' => [
        //         'apartments' => $data,
        //         'services' => Service::all(),
        //     ]
        // ]);


        //     $lat1 = $request->input('latitude'); // latitudine della città di ricerca
        //     $lon1 = $request->input('longitude'); // longitudine della città di ricerca
        //     $radius = 20 * 1000; // Converti il raggio in metri

        //     //Join services table
        //     $data = Apartment::with('services')
        //         // condition when(boolean, callback function) to filter services only if requested
        //         ->when($request->input('services'), function ($query, $services) {
        //             $query->whereHas('services', function ($query) use ($services) {
        //                 // whereIn per ottenere gli appartamenti che hanno tutti i servizi richiesti
        //                 $query->whereIn('slug', $services);
        //             }, '=', count($services));
        //         })
        //         ->when($request->input('n_beds'), function ($query, $n_beds) {
        //             $query->where('n_beds', '>=', $n_beds);
        //         })

        //         ->when($request->input('n_rooms'), function ($query, $n_rooms) {
        //             $query->where('n_rooms', '>=', $n_rooms);
        //         })
        //         ->where('is_visible', true)

        //         // TODO orderBy title for now
        //         ->orderBy('title', 'asc')
        //         ->get();

        //     // Filtriamo gli appartamenti in base alla distanza
        //     $filteredApartments = [];
        //     foreach ($data as $apartment) {
        //         $lat2 = $apartment->latitude;
        //         $lon2 = $apartment->longitude;

        //         $distance = 6371 * acos(cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($lon2) - deg2rad($lon1)) + sin(deg2rad($lat1)) * sin(deg2rad($lat2)));

        //         if ($distance <= $radius) {
        //             array_push($filteredApartments, $apartment);
        //         }
        //     }

        //     // Creiamo una nuova collection con gli appartamenti filtrati
        //     $data = collect($filteredApartments);

        //     // Reindizziamo la collection per avere indici numerici consecutivi
        //     $data = $data->values();

        //     return response()->json([
        //         'success' => true,
        //         'results' => [
        //             'apartments' => $data,
        //             'services' => Service::all(),
        //         ]
        //     ]);
    }


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
