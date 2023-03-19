<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApartmentController extends Controller
{
    // ==== validation rules ====
    protected $rules = [
        'title' => ['required', 'min:2', 'max:150'],
        'n_rooms' => ['required', 'numeric', 'min:1', 'max:20'],
        'n_beds' => ['required', 'numeric', 'min:1', 'max:30'],
        'n_bathrooms' => ['required', 'numeric', 'max:25'],
        'square_meters' => ['required', 'numeric', 'min:10', 'max:2000'],
        'address' => ['required', 'min:3', 'max:255'],
        'latitude' => ['required', 'numeric'],
        'longitude' => ['required', 'numeric'],
        'image' => ['image', 'max:2048'],
        'services' => ['distinct', 'exists:services,id'],
        'is_visible' => ['boolean']
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $apartments = Apartment::all();
        return view('user.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Apartment $apartment)
    {
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
        $newApartment = new Apartment();
        $newApartment->fill($data);
        $newApartment->save();
        return redirect()->route('user.apartments.index');
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
        return view('user.apartments.edit', compact('apartments'), ['services' => Service::all()]);
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
        if ($request->hasFile('preview')) {
            Storage::delete($apartment->image);
            $data['image'] =  Storage::put('img/uploads', $data['image']);
        };
        $apartment->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        $apartment->delete();
        return redirect()->route('user.apartments.index');
    }
}
