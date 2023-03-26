@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="show-cards">
            <div class="row align-items-center">
                <div class="col-6">
                    <h2 class="card-title pb-2">{{ $apartment->title }}</h2>
                    <h6>{{ $apartment->address }}</h6>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <div class="actions pe-3">

                        <a href="{{ route('user.apartments.index') }}" class="btn card_btn">
                            <i class="fa-solid fa-arrow-left"></i>
                            Go back to the apartments
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
                                class="btn btn-outline">
                                <i
                                    class="fa-2x fa-solid fas fa-fw {{ $apartment->is_visible ? 'fa-toggle-on' : 'fa-toggle-off' }}"></i>
                            </button>
                        </form>

                    </div>
                </div>
                <div class="card-image py-4">                         
                    {{--Creo un if per visualizzare correttamente le immagine sul db e le immagini uploadate--}}
                    <div class="mb-3 position-relative">
                        @if (str_starts_with($apartment->image, 'uploads'))
                        <img class="img-fluid rounded-3 {{ $apartment->is_visible ? '' : 'opacity-50' }}" src="{{ asset('storage/' . $apartment->image) }}"
                        alt="Image of {{ $apartment->title }}">
                    @else
                        <img class="img-fluid rounded-3 {{ $apartment->is_visible ? '' : 'opacity-50' }}" src="{{ asset('img/' . $apartment->image) }}"
                        alt="Image of {{ $apartment->title }}">
                    @endif
                    
                </div>
                <h3>
                    Host: {{ Auth::user()->name }}
                </h3>
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
            </div>

        </div>

    </div>
    </div>
@endsection

@section('script')
    @vite('resources/js/deleteHandler.js')
@endsection
