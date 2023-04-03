@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="py-4">
                <h1 class="text-uppercase">
                    Your Sponsorships
                </h1>
                <h6 class="fs-5 pb-3">
                    Sponsor immediatly your apartments.
                </h6>
            </div>
        </div>
    </div>

    <div class="row align-items-stretch">
        @foreach ($sponsorships as $sponsorship)
            <div class="col-12 col-lg-4 mb-4">
                <div class="p-3 border rounded-3">
                    <h5>Sponsorship level: <span class="fw-bold">{{ucfirst($sponsorship->name)}}</span></h5> 
                    <p>Price: {{$sponsorship->price}} $</p>
                    <a class="btn my-btn fw-bold py-2" href="{{ route('user.sponsorships.checkout', ['apartment' => $apartment->id, 'sponsorship' => $sponsorship->id]) }}">Select</a>
                </div>
            </div>
        @endforeach
    </div>
    
</div>

@endsection



