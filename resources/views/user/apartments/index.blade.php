@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- <div class="col-12 mt-3 text-end">
            @if ($trashed)
                <a class="btn btn-danger me-3" href="{{ route('user.apartments.trashed') }}"><b>{{ $trashed }}</b>
                    item/s in
                    recycled bin</a>
            @endif
            <a href="{{ route('user.apartments.create') }}" class="btn btn-secondary"><i class="fa-solid fa-plus"></i></a>
        </div> --}}
        <table class="table table-striped table-bordered table-hover mt-5">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Address</th>
                    <th scope="col">Lat</th>
                    <th scope="col">Long</th>
                    <th scope="col">#beds</th>
                    <th scope="col">#bathrooms</th>
                    <th scope="col">Square meters</th>
                    <th scope="col">Is visible</th>
                    <th scope="col" class="text-center">
                        <a href="" class="btn btn-sm btn-primary">
                            <i class="fa-solid fa-plus"></i>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($apartments as $apartment)
                    <tr>
                        <td>{{ $apartment->id }}</td>
                        <td>{{ $apartment->title }}</td>
                        <td>{{ $apartment->address }}</td>
                        <td>{{ $apartment->latitude }}</td>
                        <td>{{ $apartment->longitude }}</td>
                        <td>{{ $apartment->n_beds }}</td>
                        <td>{{ $apartment->n_bathrooms }}</td>
                        <td>{{ $apartment->square_meters }}</td>
                        <td>
                            @if ($apartment->is_visible)
                                <i class="fa-solid fa-check"></i>
                            @else
                                <i class="fa-solid fa-xmark"></i>
                            @endif
                        </td>
                        <td>
                            @forelse ($apartment->services as $service)
                                {{ $service->name }}
                            @empty
                                <i class="fa-solid fa-xmark"></i>
                            @endforelse
                        </td>
                        <td class="text-center">
                            <a href="{{ route('user.apartments.show', $apartment->id) }}" class="btn btn-sm btn-primary"><i
                                    class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('user.apartments.edit', $apartment->id) }}" class="btn btn-sm btn-success"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{ route('user.apartments.destroy', $apartment->id) }}" method="POST"
                                class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $apartments->links() }} --}}
    </div>
@endsection
