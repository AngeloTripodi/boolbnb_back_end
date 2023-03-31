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
            <div class="col-12 col-md-6 mb-2 mb-md-0">
                <h1 class="text-uppercase">
                    Your apartments
                </h1>
                <h6 class="fs-5">
                    From here you can edit, view, or delete your apartments
                </h6>
            </div>
            <div class="col-12 col-md-4 text-end">
                <a href="{{ route('user.apartments.create') }}" class="btn my-btn fw-bold">
                    New apartment
                </a>
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

                @forelse ($apartments as $apartment)
                    <div class="col-sm-12 col-lg-6 d-flex">
                        <div
                            class="card border-0 card-block rounded-3 p-3 align-items-stretch align-content-between {{ $apartment->is_visible ? '' : 'opacity-50' }}">
                            {{-- <div class="dropdown dropdown-index position-absolute btn-group">
                                <button class="btn btn-custom-index dropdown-toggle rounded-0" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item"
                                            href="{{ route('user.apartments.show', $apartment->id) }}">Visualizza</a></li>
                                    <li> <a class="dropdown-item"
                                            href="{{ route('user.apartments.edit', $apartment->id) }}">Modifica</a></li>
                                    <li>
                                        <form action="{{ route('user.apartments.destroy', $apartment->id) }}" method="POST"
                                            class=" delete double-confirm">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item btn btn-link">Cancella</button>
                                        </form>
                                    </li>
                                </ul>
                            </div> --}}


                            {{--Creo un if per visualizzare correttamente le immagine sul db e le immagini uploadate--}}
                                <div class="index-img mb-3 position-relative">
                                    @if (str_starts_with($apartment->image, 'uploads'))
                                    <img class="img-fluid rounded-3" src="{{ asset('storage/' . $apartment->image) }}"
                                    alt="Image of {{ $apartment->title }}">
                                @else
                                    <img class="img-fluid rounded-3" src="{{ asset('img/' . $apartment->image) }}"
                                    alt="Image of {{ $apartment->title }}">
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h4 class="card-title">{{ $apartment->title }}</h4>
                                    <h6>{{ $apartment->address }}</h6>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <form action="{{ route('user.toggle', $apartment->id) }}" method="POST">
                                        @method('PATCH')
                                        @csrf
                                        <button type="submit"
                                            title="{{ $apartment->is_visible ? 'visible' : 'not visible' }}"
                                            class="btn btn-outline">
                                            <i
                                                class="fa-2x fa-solid fas fa-fw {{ $apartment->is_visible ? 'fa-toggle-on' : 'fa-toggle-off' }}"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="text-end">
                                    <a href="{{ route('user.apartments.show', $apartment->id) }}" class="btn card_btn">
                                        <i class="fa-regular fa-eye"></i>
                                        Show
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
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="https://i.pinimg.com/564x/41/33/fc/4133fc74007d45c442cb41f0aeb6d919.jpg"
                            alt="paceholde image" class="w-25 pt-5">
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
{{-- js delete handler on apartment delete --}}
@section('script')
    @vite('resources/js/deleteHandler.js')
@endsection
