@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center pt-5">
                    <h1>Sponsorships</h1>
                    <hr>
                        <h2>Select your sponsorship plan:</h2>
                        <div class="row py-5">
                            @foreach ($sponsorships as $sponsorship)
                            <div class="card py-4 me-1 col-sm-12 col-lg-4 mb-4">
                                <h5>Sponsorship level: <span class="fw-bold" >{{ucfirst($sponsorship->name)}}</span> </h5> 
                                <p>Price: {{$sponsorship->price}} $</p>
                                <a class="btn my-btn fw-bold py-2" href="{{ route('user.sponsorships.checkout', ['apartment' => $apartment->id, 'sponsorship' => $sponsorship->id]) }}">Select</a>
                            </div>
                            @endforeach
                        </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection



