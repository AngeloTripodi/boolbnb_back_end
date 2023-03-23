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

        <div class="p-5 mb-4 text-bg-dark rounded-3">
            <div class="container-fluid py-3">
                <h1 class="display-5 fw-bold">Your Apartment:</h1>
                <p class="col-md-8 fs-4">Here you can view your published apartments, manage them, and add new ones. </br>
                    You can also sponsor them to attract more customers.</p>
                <a class="btn btn-sm" href="{{ route('user.apartments.index') }}">
                    Check your apartments
                </a>
            </div>
        </div>
        <div class="p-5 mb-4 text-bg-dark rounded-3">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <h1 class="display-5 fw-bold">Add New Apartment</h1>
                <div>
                    <a class="btn btn-sm" href="{{ route('user.apartments.create') }}">
                        Add new apartment
                    </a>
                </div>
            </div>
        </div>

        <div class="row align-items-md-stretch">
            <div class="col-md-6">
                <div class="h-100 p-5 text-bg-dark rounded-3">
                    <h2>Messages</h2>
                    <p>Check immediately the requests received from users regarding your homes published on our site.</p>
                    <a class="btn btn-sm" href="{{ route('user.message.index') }}">
                        Check your messagges
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="h-100 p-5 text-bg-dark border rounded-3">
                    <h2>Statistics</h2>
                    <p>Check the statistics related to the sponsorships of your apartments</p>
                    <button class="btn btn-sm" href="{{ route('user.sponsorship.index') }}">
                        Check your statistics
                    </button>
                </div>
            </div>
        </div>

    </div>
    <!-- Usando Vite -->
    @vite(['resources/scss/app.scss'])
    {{-- @vite(['resources/js/dashboard.js']) --}}
@endsection
