<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApartmentController extends Controller
{
    // ==== validation rules ==== // nelle rules vanno tutti i campi che devono essere aggiornati nel DB, anche se non obbligatori //
    protected $rules = [
        'title' => ['required', 'min:2', 'max:150'],
        'description' => ['nullable'],
        'n_rooms' => ['required', 'numeric', 'min:1', 'max:20'],
        'n_beds' => ['required', 'numeric', 'min:1', 'max:30'],
        'n_bathrooms' => ['required', 'numeric', 'min:0', 'max:25'],
        'square_meters' => ['required', 'numeric', 'min:10', 'max:2000'],
        'address' => ['min:3', 'max:255'],
        // 'latitude' => ['required', 'numeric'],
        // 'longitude' => ['required', 'numeric'],
        'image' => ['nullable'],
        'services' => ['required', 'exists:services,id'],
        'is_visible' => ['required', 'boolean']
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $apartments = Apartment::where('user_id', Auth::user()->id)->get();
        return view('user.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Apartment $apartment)
    {

        $apartment->is_visible = 1;
        return view('user.apartments.create', compact('apartment'), ['services' => Service::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newRules = $this->rules;

        //// aggiungo una nuova regola alle validation dicendo che qui l'immagine è required ////
        $newRules['image'] = ['required'];
        $data = $request->validate($newRules);

        $data['slug'] = Str::slug($data['title']);

        $data['image'] = Storage::put('uploads/images/apartment', $data['image']);

        $data['user_id'] = Auth::user()->id;

        $newApartment = new Apartment();
        $newApartment->fill($data);

        $newApartment->save();
        $message = "{$newApartment->title} has been created";
        $newApartment->services()->sync($data['services'] ?? []);

        // Effettua la chiamata all'API di TomTom
        $address = $data['address'];
        $url = 'https://api.tomtom.com/search/2/geocode/' . urlencode($address) . '.json?key=RXZp1eMMbMPK1bi0VTiW9y75pW4mVOkk';
        $response = file_get_contents($url);

        // Analizza la risposta JSON
        $json = json_decode($response);
        $latitude = $json->results[0]->position->lat;
        $longitude = $json->results[0]->position->lon;

        // Salva la longitudine e la latitudine nel database
        $newApartment->update([
            'latitude' => $latitude,
            'longitude' => $longitude,
        ]);


        // Restituisci una risposta di successo
        return redirect()->route('user.apartments.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        //error 403 when user is not correct
        if ($apartment->user_id !== Auth::user()->id) {
            abort(403);
        }
        $apartments = Apartment::where('user_id', Auth::user()->id)->get();
        return view('user.apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        //error 403 when user is not correct
        if ($apartment->user_id !== Auth::user()->id) {
            abort(403);
        }

        return view('user.apartments.edit', compact('apartment'), ['services' => Service::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {

        $data = $request->validate($this->rules);
        //delete image from db when change cover image
        if ($request->hasFile('image')) {
            Storage::delete($apartment->image);
        };


        //// verifico se è stata caricata una nuova immagine e l'aggiorno, altrimenti non faccio nulla e resta settata l'immagine precedente /////
        // @dump($data);
        if (isset($data['image'])) {
            $data['image'] = Storage::put('uploads/images/apartment', $data['image']);
        }

        $apartment->update($data);
        $apartment->services()->sync($data['services'] ?? []);

        // Effettua la chiamata all'API di TomTom
        $address = $data['address'];
        $url = 'https://api.tomtom.com/search/2/geocode/' . urlencode($address) . '.json?key=RXZp1eMMbMPK1bi0VTiW9y75pW4mVOkk';
        $response = file_get_contents($url);

        // Analizza la risposta JSON
        $json = json_decode($response);
        $latitude = $json->results[0]->position->lat;
        $longitude = $json->results[0]->position->lon;

        // Salva la longitudine e la latitudine nel database
        $apartment->update([
            'latitude' => $latitude,
            'longitude' => $longitude,
        ]);

        $message = "{$apartment->title} has been modified";
        return redirect()->route('user.apartments.index', compact('apartment'))->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        $apartment->services()->sync([]);
        // delete image from db
        Storage::delete($apartment->image);
        $apartment->delete();
        // apartment deleted message
        $message = "{$apartment->title} has been deleted";
        return redirect()->route('user.apartments.index')->with('message', $message);
        // ->with('alert-type', 'alert-success');
    }

    // public function autocomplete(Request $request)
    // {
    //     $address = $request->input('address');
    //     $url = 'https://api.tomtom.com/search/2/autocomplete/' . urlencode($address) . '.json?key=RXZp1eMMbMPK1bi0VTiW9y75pW4mVOkk&countrySet=IT&language=it-IT';
    //     $response = file_get_contents($url);
    //     $json = json_decode($response);

    //     // Restituisci l'intera risposta JSON dell'API di TomTom
    //     return response()->json($json);
    // }

    public function enableToggle(Apartment $apartment)
    {
        $apartment->is_visible = !$apartment->is_visible;
        $apartment->save();

        $message = ($apartment->is_visible) ? "visible" : "not visible";
        return redirect()->back()->with('alert-type', 'success')->with('alert-message', "$apartment->title:&nbsp;<b>$message</b>");
    }
}
