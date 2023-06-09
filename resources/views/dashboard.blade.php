{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.app')
@section('content')
    <div class="container-fluid py-4">
        
        <div class="p-5 mb-4 border rounded-3">
            <div class="container-fluid py-3">
                <h3 class="fw-bold">Your Apartments:</h3>
                <p class="col-md-8">Here you can view your published apartments, manage them, and add new ones. </br>
                    You can also sponsor them to attract more customers.</p>
                <a class="btn my-btn" href="{{ route('user.apartments.index') }}">
                    Check your apartments
                </a>
            </div>
        </div>
        <div class="p-5 mb-4 border rounded-3">
            <div class="container-fluid d-sm-flex justify-content-between align-items-center">
                <h3 class="fw-bold col-12 col-sm-6">Add New Apartment</h3>
                <div class="">
                    <a class="btn my-btn" href="{{ route('user.apartments.create') }}">
                        Add new apartment
                    </a>
                </div>
            </div>
        </div>

        <div class="row align-items-md-stretch">
            <div class="col-lg-12 mb-4">
                <div class="h-100 p-5 border rounded-3">
                    <h3 class="fw-bold">Messages</h3>
                    <p class="">Check immediately the requests received from users regarding your homes published on our site.</p>
                    <a class="btn my-btn" href="{{ route('user.messages.index') }}">
                        Messagges
                    </a>
                </div>
            </div>
            {{-- <div class="col-lg-6 mb-4">
                <div class="h-100 p-5 border rounded-3">
                    <h2>Statistics</h2>
                    <p class="fs-6">Check the statistics related to the sponsorships of your apartments</p>
                    <a class="btn my-btn" href="">
                        Statistics
                    </a>
                </div>
            </div> --}}
        </div>

    </div>
    <!-- Usando Vite -->
    @vite(['resources/scss/app.scss'])
    {{-- @vite(['resources/js/dashboard.js']) --}}
@endsection
