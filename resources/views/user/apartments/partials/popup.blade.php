@if (session('message'))
    <div id="popup_message" class="d-none" data-type="{{ session('alert-type') }}" data-message="{{ session('message') }}"></div>
@endif
