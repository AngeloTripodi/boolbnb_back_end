@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div>
                        <div class="py-4">
                            <h1 class="text-uppercase">
                                Your Sponsorships
                            </h1>
                            <h6 class="fs-5 pb-3">
                                Sponsor immediatly your apartments.
                            </h6>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-between">
                                @foreach ($sponsorships as $sponsorship)
                                <div class="card p-5 col-12-sm">
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
    </div>
@endsection



