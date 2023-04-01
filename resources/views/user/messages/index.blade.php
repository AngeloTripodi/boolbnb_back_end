@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="py-4">
                    <h1 class="text-uppercase">
                        Your Messages
                    </h1>
                    <h6 class="fs-5">
                        Check immediately the requests received.
                    </h6>
                </div>

                <div class="table-responsive">
                    <table id="messages-table" class="table table-hover table-sm mt-1">
                        <thead class="text-white fw-bolds">
                            <tr>
                                <th scope="col">Email</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Message</th>
                                <th scope="col">Apartment</th>
                                <th scope="col">Receipt date</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($messages as $message)
                                <tr>
                                    <th scope="row">{{ $message->email }}</th>
                                    <td>{{ $message->name }}</td>
                                    <td>{{ $message->phone_number }}</td>
                                    <td> {{ $message->message }}</td>
                                    <td>{{ $message->apartment->title }}</td>
                                    <td> {{ $message->created_at->format('d M y, H:i') }}</td>

                                    <td>
                                        <a class="btn btn-sm my-btn fw-bold"
                                            href="mailto:{{ $message->email }}?subject=Apartment Reservation from {{ $message->name }}">Reply
                                        </a>
                                    </td>
                                </tr>

                            @empty
                                <div class="d-flex align-items-center justify-content-center flex-column pt-5">
                                    <img src="https://i.pinimg.com/564x/30/92/a6/3092a6b1b828fe948246f75861b81490.jpg"
                                        alt="paceholde image" class="w-25">
                                    <h6>No incoming messages to show.</h6>
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
