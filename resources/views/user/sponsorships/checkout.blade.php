@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row g-4">
            <div class="col-12">
                <div class="py-4">
                    <h1 class="text-uppercase">
                        Pay your sponsorship
                    </h1>
                    <h6 class="fs-5 pb-3">
                        Pay in security your best sponsorship.
                    </h6>
                </div>

                <form id="payment-form" action="{{ route('user.sponsorships.store', ['apartment' => $apartment->id, 'sponsorship' => $sponsorship->id]) }}" method="POST">
                    @csrf
                    <!-- Putting the empty container you plan to pass to
                      `braintree.dropin.create` inside a form will make layout and flow
                      easier to manage -->
                    <div id="dropin-container"></div>
                    <input class="btn my-btn" type="submit" />
                    <input class="btn my-btn" type="hidden" id="nonce" name="payment_method_nonce"/>
                  </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @vite('resources/js/sponsorship.js')
@endsection

