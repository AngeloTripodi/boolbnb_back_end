<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Sponsorship;
use App\Models\Apartment;
use Illuminate\Http\Request;

class SponsorshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Apartment $apartment)
    {        
        $apartment = Apartment::findOrFail($apartment->id);
        $sponsorships = Sponsorship::all();

        //dd($sponsorships);
        return view('user.sponsorships.index', [
            'apartment' => $apartment,
            'sponsorships' => $sponsorships,
        ]);
    }

    public function checkout(Apartment $apartment, Sponsorship $sponsorship)
    {
        $apartment = Apartment::findOrFail($apartment->id);
        $sponsorship = Sponsorship::findOrFail($sponsorship->id);
        //dd($sponsorships);
        return view('user.sponsorships.checkout', [
            'apartment' => $apartment,
            'sponsorship' => $sponsorship,
        ]);
    }

    public function store(Apartment $apartment, Sponsorship $sponsorship)
    {
    // Recupera l'appartamento utilizzando l'id
    $apartment = Apartment::findOrFail($apartment->id);

    // Recupera la sponsorizzazione utilizzando l'id
    $sponsorship = Sponsorship::findOrFail($sponsorship->id);

    // Salva la relazione many-to-many nella tabella pivot
    $apartment->sponsorships()->attach($sponsorship, [
        'starting_date' => now(),
        'ending_date' => now()->addHours($sponsorship->duration)
    ]);

    return redirect()->route('user.apartments.show', $apartment->id)->with('success', 'Sponsorizzazione salvata correttamente!');

    }
}
