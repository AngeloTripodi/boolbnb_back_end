@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">

                <h1 class="pt-5">Incoming Messages</h1>
                <hr>
                @forelse( $messages as $message)
                <div class="py-5">
                    <h6>From: {{$message->name}}</h1> 
                    <h6>Email: {{$message->email}}</h2>
                    <p>Phone Number: {{$message->phone_number}}</p>
                    <hr>
                    <p>Message: {{$message->message}}</p>
                    <a class="btn my-btn" href="mailto:{{$message->email}}?subject=Apartment Reservation from {{$message->name}}">
                        Reply 
                   </a>
                </div> 

                @empty
                <div class="d-flex align-items-center justify-content-center flex-column pt-5">
                    <img src="https://i.pinimg.com/564x/30/92/a6/3092a6b1b828fe948246f75861b81490.jpg"
                        alt="paceholde image" class="w-25">
                        <h6>No incoming messages to show.</h6> 
                </div>
                @endforelse 
            </div>
        </div>
    </div>

@endsection
