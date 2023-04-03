@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="py-3">
            Add new Apartment:
        </h1>

        <!--Includo il metodo e la rotta da passare al form unico-->
        @include('user.apartments.partials.form', [
            'method' => 'POST',
            'routeName' => 'user.apartments.store',
        ])

    </div>
@endsection
