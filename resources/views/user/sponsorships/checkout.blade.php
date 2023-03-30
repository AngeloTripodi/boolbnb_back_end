@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="py-4">Pay your sponsorship</h1>

                <div id="dropin-wrapper">
                    <div id="checkout-message"></div>
                    <div id="dropin-container"></div>
                    <a class="btn my-btn" type="submit" id="submit-button">Submit payment</a>
                </div>
              
            </div>
        </div>
    </div>
@endsection

@section('script')
    @vite('resources/js/sponsorship.js')
@endsection

