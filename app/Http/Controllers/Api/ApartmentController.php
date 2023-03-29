<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ApartmentController extends Controller
{
    
    // public $distances = [];

    public function index(Request $request)
    {
        // ! possibile soluzione ma non funzina ancora
        // if($request->input('address') != null){

        //     $lat = $request->input('latitude'); // latitudine della città di ricerca
        //     $lng =  $request->input('longitude'); // longitudine della città di ricerca
        //     $radius = 20; // raggio in km
            
        //     $apartments = DB::table('apartments')
        //         ->select(DB::raw("( 6371 acos( cos( radians(?) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(?) ) + sin( radians(?) ) * sin( radians( latitude ) ) ) ) AS distance"))
        //         ->having("distance", "<", $radius)
        //         ->orderBy("distance")
        //         ->setBindings([$lat, $lng, $lat])
        //         ->get();
        // }

        // $apartments = Apartment::all();
        
        // // Esegui il calcolo della distanza tra le coordinate dell'indirizzo inserito dall'utente e le coordinate di ogni appartmento nel database
        // foreach($apartments as $apartment){
        //     $lat2 = $apartment->latitude;
        //     $lon2 = $apartment->longitude;

        //     $distance = 6371 * acos( cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($lon2) - deg2rad($lon1)) + sin(deg2rad($lat1)) * sin(deg2rad($lat2))
        //     );
        //     array_push($this->distances, $distance);
        // }
        
        
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
            // ->when($request->input('distance'), function($query, $userInputDistance){
            //     foreach ($this->distances as $distance) {
            //         $query->where('distance', '<=', $distance);
            //     }
            // })

            // TODO orderBy title for now
            ->orderBy('title', 'asc')
            ->get();
            
        return response()->json([
            'success' => true,
            'results' => $apartments,
        ]);
    }
    
    // public function getDistance(Request $request, Apartment $apartment)
    // {
        

    //     // Restituisci la distanza calcolata come risposta alla richiesta HTTP
    //     // ! potrebbe essere sbagliato
    //     return response()->json($this->distances);
    // }


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
