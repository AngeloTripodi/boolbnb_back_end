@extends('layouts.app')

@section('content')
    <div class="container-fluid py-5">

        <!--Aggiungo un if session per conferma sponsorship-->
        @if (session('message'))
            <div class="fw-bold text-center fs-6 alert alert-custom">
                {{ session('message') }}
            </div>
        @endif

        <div class="show-cards">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <h2 class="card-title pb-2">{{ $apartment->title }}</h2>
                    <h6>{{ $apartment->address }}</h6>
                </div>
                <div class="col-12 col-lg-6 d-flex justify-content-end">
                    <div class="actions">

                        <a href="{{ route('user.apartments.index') }}" class="btn card_btn">
                            <i class="fa-solid fa-angles-left pe-1"></i>
                            Back
                        </a>

                        <a href="{{ route('user.apartments.edit', $apartment->id) }}" class="btn card_btn">
                            <i class="fa-solid fa-edit"></i>
                            Edit
                        </a>
                        <form class="d-inline-block form-delete double-confirm delete"
                            action="{{ route('user.apartments.destroy', $apartment->id) }}" method="POST"
                            data-element-name="{{ $apartment->title }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Delete" class="btn card_btn">
                                <i class="fa-solid fa-trash"></i>
                                Delete
                            </button>
                        </form>
                        <form action="{{ route('user.toggle', $apartment->id) }}" method="POST" class="d-inline">
                            @method('PATCH')
                            @csrf
                            <button type="submit" title="{{ $apartment->is_visible ? 'visible' : 'not visible' }}"
                                class="btn btn-outline pe-0">
                                <i
                                    class="fa-2x fa-solid fas fa-fw {{ $apartment->is_visible ? 'fa-toggle-on' : 'fa-toggle-off' }}">
                                </i>
                            </button>
                        </form>

                    </div>
                </div>
                <div class="card-image py-4">
                    {{-- Creo un if per visualizzare correttamente le immagine sul db e le immagini uploadate --}}
                    <div class="mb-3 position-relative">
                        @if (str_starts_with($apartment->image, 'uploads'))
                            <img class="w-100 rounded-3 {{ $apartment->is_visible ? '' : 'opacity-50' }}"
                                src="{{ asset('storage/' . $apartment->image) }}" alt="Image of {{ $apartment->title }}">
                        @else
                            <img class="w-100 rounded-3 {{ $apartment->is_visible ? '' : 'opacity-50' }}"
                                src="{{ asset('img/' . $apartment->image) }}" alt="Image of {{ $apartment->title }}">
                        @endif

                    </div>
                    <div class="d-flex justify-content-between">
                        <h3>
                            Host: {{ Auth::user()->name }}
                        </h3>
                        <div>
                            @if ($isSponsored)
                                <p id="sponsored-apartment-icon"><i class="fa-solid fa-crown"></i></p>
                            @endif
                        </div>
                    </div>
                    <h6>
                        Price per night: &euro; {{ $apartment->n_price }}
                    </h6>
                    <h6>
                        Rooms: {{ $apartment->n_rooms }} - Beds: {{ $apartment->n_beds }} - Bathrooms:
                        {{ $apartment->n_bathrooms }} - Mq: {{ $apartment->square_meters }}
                    </h6>
                    <p>
                        {{ $apartment->description }}
                    </p>
                    <div class="apartment-info">
                        <h5>
                            Services:
                        </h5>
                        <ul class="ps-0">
                            @foreach ($apartment->services as $service)
                                <li>
                                    <i class="fa-solid fa-check"></i> {{ $service->name }}
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="d-flex justify-content-center">
                        <a class="btn my-btn fw-bold"
                            href="{{ route('user.sponsorships.index', ['apartment' => $apartment->id]) }}">
                            Sponsor your apartment!
                        </a>
                    </div>
                </div>
            @endsection

            @section('script')
                @vite('resources/js/deleteHandler.js')
            @endsection
