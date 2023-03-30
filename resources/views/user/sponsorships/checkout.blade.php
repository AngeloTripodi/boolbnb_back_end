@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Sponsorship</h1>

                <div id="dropin-wrapper">
                    <div id="checkout-message"></div>
                    <div id="dropin-container"></div>
                    <button id="submit-button">Submit payment</button>
                </div>
              
            </div>
        </div>
    </div>
@endsection

@section('script')
    @vite('resources/js/sponsorship.js')
    @vite('resources/js/checkout.js')
@endsection

