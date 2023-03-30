<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Sponsorship;
use Illuminate\Http\Request;

class SponsorshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsorships = Sponsorship::all();
        //dd($sponsorships);
        return view('user.sponsorships.index', compact('sponsorships'));
    }

    public function checkout()
    {
        $sponsorships = Sponsorship::all();
        //dd($sponsorships);
        return view('user.sponsorships.checkout', compact('sponsorships'));
    }
}
