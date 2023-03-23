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

    @include('user.apartments.partials.popup')
    <div class="container pb-5">
        <div class="row justify-content-between align-items-center py-4">
            <div class="col-6">
                <h4 class="text-uppercase">Your apartments</h4>
                <h6>From here you can edit, view, or delete your apartments</h6>
            </div>
            <div class="col-2">
                <a href="{{ route('user.apartments.create') }}" class="btn btn-secondary bg-transparent text-dark "><i
                        class="fa-solid fa-plus me-2"></i>Add
                    new apartment</a>
            </div>
        </div>
        {{-- @section('messages')
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
        @endsection --}}
        <div class="mt-2 my-cards-index">
            <div class="row g-4">

                @foreach ($apartments as $apartment)
                    <div class="col-6 d-flex">
                        <div class="card card-block p-3 align-items-stretch align-content-between">
                            {{-- <img src="{{ asset('storage/' . $apartment->image) }}" alt="{{ $apartment->image }}"> --}}
                            <div class="index-img mb-3">
                                <img class="img-fluid" src="{{ asset('storage/' . $apartment->image) }}"
                                    alt="Image of {{ $apartment->title }}">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h4 class="card-title">{{ $apartment->title }}</h4>
                                    <h6>{{ $apartment->address }}</h6>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <div class="actions pe-3">
                                        <a href="{{ route('user.apartments.index') }}" class="btn"><i
                                                class="fa-solid fa-arrow-left"></i></a>
                                        <a href="{{ route('user.apartments.edit', $apartment->id) }}" class="btn"><i
                                                class="fa-solid fa-edit"></i></a>
                                        <form class="d-inline-block form-delete double-confirm delete"
                                            action="{{ route('user.apartments.destroy', $apartment->id) }}" method="POST"
                                            data-element-name="{{ $apartment->title }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Delete" class="btn"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
{{-- js delete handler on apartment delete --}}
@section('script')
    @vite('resources/js/deleteHandler.js')
@endsection
