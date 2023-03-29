@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">

                @foreach ( $messages as $message)
                   <h1>{{$message->name}}</h1> 
                   <h2>{{$message->email}}</h2>
                   <h5>{{$message->phone_number}}</h5>
                   <p>{{$message->message}}</p>
                   <a class="btn btn-primary" :href="mailto:{{$message->email}}">
                        Reply 
                   </a>
                @endforeach


            </div>
        </div>
    </div>

@endsection
