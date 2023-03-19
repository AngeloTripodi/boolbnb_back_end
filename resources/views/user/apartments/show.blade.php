@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-3 mt-5 shadow-lg">
            <div class="card-header text-center">
                <h3 class="card-title">{{ $apartment->title }}</h3>
            </div>
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                <div class="card-image py-4">
                    <img src="{{ $apartment->image }}" alt="{{ $apartment->title }}" class="img-fluid">
                </div>
                <div class="pb-5">
                    @foreach ($apartment->services as $service)
                        #{{ $service->name }}
                    @endforeach
                </div>
                <p class="card-text text-center fw-bold">{{ $apartment->description }}</p>
                <ul class="list-unstyled text-center mb-4">
                    <li class="text-muted"> {{ $apartment->slug }}</li>
                    <li class="text-muted">Type: {{ $apartment->user->first_name }} {{ $apartment->user->last_name }}</li>
                    <li class="text-muted">LONG: {{ $apartment->address }}</li>
                    <li class="text-muted">LAT: {{ $apartment->latitude }}</li>
                    <li class="text-muted">LONG: {{ $apartment->longitude }}</li>
                    <li class="text-muted">Beds: {{ $apartment->n_beds }}</li>
                    <li class="text-muted">Bathrooms: {{ $apartment->n_bathrooms }}</li>
                    <li class="text-muted">Square meters: {{ $apartment->square_meters }}</li>
                </ul>
                <div class="actions d-flex justify-content-between w-100">
                    <div class="main-actions">
                        <a href="{{ route('user.apartments.index') }}" class="btn btn-success"><i
                                class="fa-solid fa-arrow-left"></i></a>
                    </div>
                    <div class="secondary-actions">
                        <a href="{{ route('user.apartments.edit', $apartment->id) }}" class="btn btn-warning"><i
                                class="fa-solid fa-edit"></i></a>
                        <form class="d-inline-block form-delete double-confirm"
                            action="{{ route('user.apartments.destroy', $apartment->id) }}" method="POST"
                            data-element-name="{{ $apartment->title }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Delete" class="btn btn-danger"><i
                                    class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
