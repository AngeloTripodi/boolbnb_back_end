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

                        <a href="{{ route('user.apartments.index') }}" class="btn"><i
                                class="fa-solid fa-arrow-left"></i></a>
                        <form action="{{ route('user.toggle', $apartment->id) }}" method="POST" class="d-inline">
                            @method('PATCH')
                            @csrf
                            <button type="submit" title="{{ $apartment->is_visible ? 'visible' : 'not visible' }}"
                                class="btn btn-outline"><i
                                    class="fa-regular {{ $apartment->is_visible ? 'fa-eye visibility-icon' : 'fa-eye-slash visibility-icon' }}"></i></button>
                        </form>
                        <a href="{{ route('user.apartments.edit', $apartment->id) }}" class="btn"><i
                                class="fa-solid fa-edit"></i></a>
                        <form class="d-inline-block form-delete double-confirm delete"
                            action="{{ route('user.apartments.destroy', $apartment->id) }}" method="POST"
                            data-element-name="{{ $apartment->title }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Delete" class="btn"><i class="fa-solid fa-trash"></i></button>
                        </form>

                    </div>
                </div>
                <div class="card-image py-4">
                    <img src="{{ asset('storage/' . $apartment->image) }}" alt="{{ $apartment->title }}" class="img-fluid">
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
