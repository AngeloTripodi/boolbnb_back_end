{{-- Creo un unico form per edit e create || creo una variabile per la rotta --}}

<form autocomplete="off" id="validate-form" action="{{ route($routeName, $apartment) }}" method="POST"
    enctype="multipart/form-data" class="py-3 needs-validation" novalidate>
    @csrf
    {{-- Inserisco la variabile creata in edit e create blade // per vedere rotte -> route:list --}}
    @method($method)

    <div class="card px-5 py-3 mb-3">

        <div class="form-outline w-100 mb-3">
            <label for="title" class="form-label @error('title') is-invalid @enderror">Title*</label>
            <input type="text" class="form-control" id="title" placeholder="Insert title" name="title"
                value="{{ old('title', $apartment->title) }}" required>
            <div class="text-danger" id="title-error-message"></div>
            @error('title')
                <div class="invalid-feedback px-2">
                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-outline mb-3">
            <label for="description" class="form-label @error('description') is-invalid @enderror">Description</label>
            <textarea class="form-control" id="description" placeholder="Insert description" rows="10" name="description">{{ old('description', $apartment->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback px-2">
                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                </div>
            @enderror
        </div>

        <label for="address" class="form-label @error('address') is-invalid @enderror">Address*</label>
        <div class="form-outline w-100" id="autocomplete-list">
            {{-- <input type="text" class="form-control" id="address" placeholder="Insert address" name="address"
                value="{{ old('address', $apartment->address) }}" required> --}}
        </div>
        <div class="text-danger" id="address-error-message"></div>
        @error('address')
            <div class="invalid-feedback px-2">
                <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
            </div>
        @enderror

        <div class="form-outline w-50 pt-4 mb-3">
            <label for="image" class="form-label @error('image') is-invalid @enderror">Select image:*</label>
            <input type="file" class="form-control" id="image" name="image"
                value="{{ old('image', $apartment->image) }}" required>
            @error('image')
                <div class="invalid-feedback px-2">
                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                </div>
            @enderror
        </div>


        {{-- 
        <div class="form-outline w-50 mb-3">
            <label for="latitude" class="form-label @error('latitude') is-invalid @enderror">Latitude</label>
            <input type="text" class="form-control" id="latitude" placeholder="Insert latitude" name="latitude"
                value="{{ old('latitude', $apartment->latitude) }}" required>
            @error('latitude')
                <div class="invalid-feedback px-2">
                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-outline w-50 mb-3">
            <label for="longitude" class="form-label @error('longitude') is-invalid @enderror">Longitude</label>
            <input type="text" class="form-control" id="longitude" placeholder="Insert longitude" name="longitude"
                value="{{ old('longitude', $apartment->longitude) }}" required>
            @error('longitude')
                <div class="invalid-feedback px-2">
                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                </div>
            @enderror
        </div> --}}

        <div class="form-outline w-50 mb-3">
            <label for="n_rooms" class="form-label @error('n_rooms') is-invalid @enderror">Number of Rooms*</label>
            <input type="number" class="form-control" id="n_rooms" placeholder="Insert number of rooms"
                name="n_rooms" value="{{ old('n_rooms', $apartment->n_rooms) }}" required>
            <div class="text-danger" id="rooms-error-message"></div>
            @error('n_rooms')
                <div class="invalid-feedback px-2">
                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-outline w-50 mb-3">
            <label for="n_beds" class="form-label @error('n_beds') is-invalid @enderror">Number of Beds*</label>
            <input type="number" class="form-control" id="n_beds" placeholder="Insert number of beds" name="n_beds"
                value="{{ old('n_beds', $apartment->n_beds) }}" required>
            <div class="text-danger" id="beds-error-message"></div>
            @error('n_beds')
                <div class="invalid-feedback px-2">
                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-outline w-50 mb-3">
            <label for="n_bathrooms" class="form-label @error('n_bathrooms') is-invalid @enderror">Number of
                Bathrooms*</label>
            <input type="number" class="form-control" id="n_bathrooms" placeholder="Insert number of bathrooms"
                name="n_bathrooms" value="{{ old('n_bathrooms', $apartment->n_bathrooms) }}" required>
            <div class="text-danger" id="bathrooms-error-message"></div>
            @error('n_bathrooms')
                <div class="invalid-feedback px-2">
                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-outline w-50 mb-3">
            <label for="square_meters" class="form-label @error('square_meters') is-invalid @enderror">Square
                Meters*</label>
            <input type="number" class="form-control" id="square_meters" placeholder="Insert number of square meters"
                name="square_meters" value="{{ old('square_meters', $apartment->square_meters) }}" required>
            <div class="text-danger" id="mq-error-message"></div>
            @error('square_meters')
                <div class="invalid-feedback px-2">
                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                </div>
            @enderror
        </div>

        {{-- Aggiungo una checkbox per i servizi dell'appartamento --}}
        <div class="card p-3 shadow-none">
            <p class="fw-bold">Services*</p>
            <div class="d-flex flex-wrap border rounded-3 p-2">
                @foreach ($services as $service)
                    <div>
                        <input id="{{ $service->id }}" type="checkbox" class="form-check-input" name="services[]"
                            value="{{ $service->id }}"
                            @if ($errors->any()) @checked(in_array($service->id, old('services', [])))
                    @else
                        @checked($apartment->services->contains($service->id)) @endif>
                        <label class="form-check-label ms-2 me-5" for="services">{{ $service->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="text-danger" id="services-error-message"></div>
        @if ($errors->has('services'))
            <div class="text-danger my-error mb-3">
                <i class="fa-solid fa-circle-exclamation pe-1"></i>Select at least one service
            </div>
        @endif

        <div class="my-3 d-flex">
            <label for="is_visible">Visibility:*</label>
            <div class="form-check mx-3">
                <input class="form-check-input" type="radio" name="is_visible" id="is_visible_yes" value="1"
                    {{ old('is_visible', $apartment->is_visible) == 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="is_visible_yes">
                    Yes
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_visible" id="is_visible_no" value="0"
                    {{ old('is_visible', $apartment->is_visible) == 0 ? 'checked' : '' }}>
                <label class="form-check-label" for="is_visible_no">
                    No
                </label>
            </div>
        </div>
    </div>

    {{-- Aggiungo una rotta per tornare all'index degli appartamenti --}}
    <div class="card-footer text-end py-4 d-flex justify-content-between">
        <a href="{{ route('user.apartments.index') }}" class="btn card_btn">
            <i class="fa-solid fa-angles-left pe-1"></i>
            Go Back To Apartments
        </a>
        @if($routeName == 'user.apartments.store')
        <button type="submit" class="btn card_btn">
            <i class="fa-solid fa-plus pe-1"></i>
            Add New Apartment
        </button>
        @else
        <button type="submit" class="btn card_btn">
            <i class="fa-solid fa-edit"></i>
            Edit Apartment
        </button>
        @endif
    </div>

</form>

{{-- <script>
    let input = document.querySelector('input[name="address"]');
    let list = document.querySelector('#autocomplete-list');

    input.addEventListener('input', function() {
        let value = this.value.trim();
        if (value.length >= 3) {
            axios.get('/autocomplete', {
                    params: {
                        address: value
                    }
                })
                .then(function(response) {
                    let html = '';
                    for (let i = 0; i < response.data.length; i++) {
                        html += '<li>' + response.data[i] + '</li>';
                    }
                    list.innerHTML = html;
                })
                .catch(function(error) {
                    console.error(error);
                });
        } else {
            list.innerHTML = '';
        }
    });
</script> --}}

@section('script')
    @vite('resources/js/apiCall.js')
    @vite('resources/js/apartment-form-validation.js')
@endsection
