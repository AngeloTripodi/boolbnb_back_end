@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="py-4">Pay your sponsorship</h1>

                <form id="payment-form" action="{{ route('user.sponsorships.store', ['apartment' => $apartment->id, 'sponsorship' => $sponsorship->id]) }}" method="POST">
                    @csrf
                    <!-- Putting the empty container you plan to pass to
                      `braintree.dropin.create` inside a form will make layout and flow
                      easier to manage -->
                    <div id="dropin-container"></div>
                    <input type="submit" />
                    <input type="hidden" id="nonce" name="payment_method_nonce"/>
                  </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @vite('resources/js/sponsorship.js')
@endsection

