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
    // ==== validation rules ====
    protected $rules = [
        'title' => ['required', 'min:2', 'max:150'],
        'n_rooms' => ['required', 'numeric', 'min:1', 'max:20'],
        'n_beds' => ['required', 'numeric', 'min:1', 'max:30'],
        'n_bathrooms' => ['required', 'numeric', 'min:0', 'max:25'],
        'square_meters' => ['required', 'numeric', 'min:10', 'max:2000'],
        'address' => ['required', 'min:3', 'max:255'],
        'latitude' => ['required', 'numeric'],
        'longitude' => ['required', 'numeric'],
        'image' => ['required', 'image', 'max:2048'],
        'services' => ['required', 'exists:services,id'],
        'is_visible' => ['required', 'boolean'],
        'description' => ['required']
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
        $data = $request->validate($this->rules);
        $data['slug'] = Str::slug($data['title']);
        $data['image'] = Storage::put('uploads/images/apartment', $data['image']);

        $data['user_id'] = Auth::user()->id;

        $newApartment = new Apartment();
        $newApartment->fill($data);
        $newApartment->save();
        $message = "{$newApartment->title} has been created";

        $newApartment->services()->sync($data['services'] ?? []);
        return redirect()->route('user.apartments.index')->with('message', $message)->with('alert-type', 'alert-success');

        //controllo i valori della checkbox
        if (!isset($request->is_visible)) {
            $data['is_visible'] = false;
        } else {
            $data['is_visible'] = true;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
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

        $data['image'] = Storage::put('uploads/images/apartment', $data['image']);

        $apartment->update($data);
        $message = "{$apartment->title} has been modified";
        return redirect()->route('user.apartments.index', compact('apartment'))->with('message', $message)->with('alert-type', 'alert-warning');
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
        return redirect()->route('user.apartments.index')->with('message', $message)->with('alert-type', 'alert-danger');
    }
}
