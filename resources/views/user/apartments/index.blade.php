@extends('layouts.app')

@section('content')
{{-- <div class="container">
    {{-- <div class="col-12 mt-3 text-end">
        @if ($trashed)
        <a class="btn btn-danger me-3" href="{{ route('user.apartments.trashed') }}"><b>{{ $trashed }}</b>
            item/s in
            recycled bin</a>
            @endif
        </div> --}}
        
        <h1 class="py-3 ">{{ Auth::user()->name }} uploaded apartments:</h1>
        @section('messages')
            <div class="container-fluid">
                <div class="row d-flex mt-2">
                    <div class="col-12 p-0">
                        <div class="controllers w-100 d-flex gap-2">
                            @if (session('message'))
                            <div class="my-alert message alert text-center flex-grow-1 {{session('alert-type')}}">
                                <span >{{session('message')}}</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    <div class="container mt-2 my-cards">
        <div class="row g-4">
            <a href="{{ route('user.apartments.create') }}" class="btn btn-secondary"><i class="fa-solid fa-plus me-2"></i>Add new apartment</a>
            @foreach ($apartments as $apartment)
                <div class="col-6 d-flex">
                    <div class="card card-block p-3 align-items-stretch align-content-between">
                        {{-- <img src="{{ asset('storage/' . $apartment->image) }}" alt="{{ $apartment->image }}"> --}}
                        <img class="img-fluid" src="{{ asset('storage/' . $apartment->image) }}"
                            alt="Image of {{ $apartment->title }}">
                        <h4 class="card-title-ap text-right pt-3">{{ $apartment->title }}</h4>
                        <p>{{ $apartment->address }}</p>
                        <div class="actions">
                            <a href="{{ route('user.apartments.show', $apartment->id) }}" class="btn btn-sm btn-primary"><i
                                    class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('user.apartments.edit', $apartment->id) }}" class="btn btn-sm btn-success"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{ route('user.apartments.destroy', $apartment->id) }}" method="POST"
                                class="d-inline-block delete double-confirm">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('user.apartments.partials.popup')
@endsection
{{-- js delete handler on apartment delete --}}
@section('script')
    @vite('resources/js/deleteHandler.js')
@endsection
