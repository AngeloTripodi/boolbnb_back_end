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


    <h1 class="py-3 text-center">{{ Auth::user()->name }} uploaded apartments:</h1>

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
<script>
    const popup = document.getElementById('popup_message');
    if (popup) {
    // show a message in a toast
        Swal.fire({
            toast: true,
            animation: false,
            icon: popup.dataset.type,
            title: popup.dataset.message,
            type: popup.dataset.type,
            position: 'top-right',
            timer: 3000,
            showConfirmButton: false,
        });
    }

    const deleteBtns = document.querySelectorAll('form.delete');

    deleteBtns.forEach((formDelete) => {
        formDelete.addEventListener('submit', function (event) {
        event.preventDefault();
        var doubleconfirm = event.target.classList.contains('double-confirm');
        Swal.fire({
            title: 'Are you sure ?',
            text: "Please confirm your request !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, confirm !'
        }).then((result) => {
            if (result.value) {

                // if double confirm
                    if (doubleconfirm) {

                        Swal.fire({
                            title: 'Confirm request',
                            html: "Please type <b>CONFIRM</b>",
                            input: 'text',
                            type: 'warning',
                            inputPlaceholder: 'CONFIRM',
                            showCancelButton: true,
                            confirmButtonText: 'Confirm',
                            cancelButtonText: 'Cancel',
                            showLoaderOnConfirm: true,
                        allowOutsideClick: () => !Swal.isLoading(),
                        preConfirm: (txt) => {
                            return (txt.toUpperCase() == "CONFIRM");
                        },

                        }).then((result) => {
                            if (result.value) this.submit();
                        })
                    } else {
                        this.submit();
                    }
                }
            });
        });
    });
</script>
@endsection
