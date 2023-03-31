<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Sponsorship;
use Illuminate\Http\Request;

class SponsorshipController extends Controller
{
    public function index()
    {
        $apartments = Apartment::whereHas('sponsorships', function ($query) {
            $query->where('ending_date', '>', now());
        })->with('sponsorships')->get();

        return response()->json([
            'success' => true,
            'results' => $apartments
        ]);
    }
}
