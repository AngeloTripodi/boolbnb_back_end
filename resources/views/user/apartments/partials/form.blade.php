{{--Creo un unico form per edit e create || creo una variabile per la rotta--}}

    <form action="{{ route($routeName, $apartment) }}" method="POST" enctype="multipart/form-data" class="py-3">
        @csrf
        {{--Inserisco la variabile creata in edit e create blade // per vedere rotte -> route:list--}}
        @method($method)
    
        <div class="card px-5 py-3 mb-3">
            
            <div class="form-outline w-100 mb-3">
                <label for="title<" class="form-label @error('title') is-invalid @enderror">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Insert title" name="title" value="{{old('title', $apartment->title)}}">
                @error('title')
                    <div class="invalid-feedback px-2">
                        <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                    </div>
                @enderror                  
            </div>

            <div class="form-outline mb-3">
                <label for="description<" class="form-label @error('description') is-invalid @enderror">Description</label>
                <textarea class="form-control" id="description" placeholder="Insert description"  rows="10" name="description">{{old('description', $apartment->description)}}</textarea>
                @error('description')
                    <div class="invalid-feedback px-2">
                        <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                    </div>
                @enderror                  
            </div>

            <div class="form-outline w-25 pt-4 mb-3">
                <label for="image" class="form-label @error('image') is-invalid @enderror">Select image:</label>
                <input type="file" class="form-control" id="image" name="image" value="{{old('image', $apartment->image)}}">
            @error('image')
                <div class="invalid-feedback px-2">
                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                </div>
            @enderror  
            </div>

            <div class="form-outline w-50 mb-3">
                <label for="latitude" class="form-label @error('latitude') is-invalid @enderror">Latitude</label>
                <input type="text" class="form-control" id="latitude" placeholder="Insert latitude" name="latitude" value="{{old('latitude', $apartment->latitude)}}">
                @error('latitude')
                    <div class="invalid-feedback px-2">
                        <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                    </div>
                @enderror                  
            </div>

            <div class="form-outline w-50 mb-3">
                <label for="longitude" class="form-label @error('longitude') is-invalid @enderror">Longitude</label>
                <input type="text" class="form-control" id="longitude" placeholder="Insert longitude" name="longitude" value="{{old('longitude', $apartment->longitude)}}">
                @error('longitude')
                    <div class="invalid-feedback px-2">
                        <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                    </div>
                @enderror                  
            </div>

            <div class="form-outline w-50 mb-3">
                <label for="n_beds" class="form-label @error('n_beds') is-invalid @enderror">Number of Beds</label>
                <input type="number" class="form-control" id="n_beds" placeholder="Insert number of beds" name="n_beds" value="{{old('n_beds', $apartment->n_beds)}}">
                @error('n_beds')
                    <div class="invalid-feedback px-2">
                        <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                    </div>
                @enderror                  
            </div>

            <div class="form-outline w-50 mb-3">
                <label for="n_bathrooms" class="form-label @error('n_bathrooms') is-invalid @enderror">Number of Bathrooms</label>
                <input type="number" class="form-control" id="n_bathrooms" placeholder="Insert number of bathrooms" name="n_bathrooms" value="{{old('n_bathrooms', $apartment->n_bathrooms)}}">
                @error('n_bathrooms')
                    <div class="invalid-feedback px-2">
                        <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                    </div>
                @enderror                  
            </div>

            <div class="form-outline w-50 mb-3">
                <label for="square_meters" class="form-label @error('square_meters') is-invalid @enderror">Square Meters</label>
                <input type="number" class="form-control" id="square_meters" placeholder="Insert number of square meters" name="square_meters" value="{{old('square_meters', $apartment->square_meters)}}">
                @error('square_meters')
                    <div class="invalid-feedback px-2">
                        <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                    </div>
                @enderror                  
            </div>

            {{--Aggiungo una checkbox per i servizi dell'appartamento--}}
            <div class="card p-3 shadow-none">
                <p class="fw-bold">Services</p>

                <div class="d-flex flex-wrap">

                    @foreach ($services as $service)
                        <div>
                            <input type="checkbox" class="form-check-input" name="services[]" value="{{ $service->id }}"
                            {{--Controllo se ci sono errori sulla validation, definisco i valori da mantenere checked--}}
                            @if ($errors->any())
                                @checked(in_array($service->id, old('service',[])))
                            @endif>

                            <label class="form-check-label ms-2 me-5" for="services">{{ $service->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mb-3">
                <input class="form-check-input" type="checkbox" value="1" {{ old('is_visible', $apartment->is_visible) ? 'checked' : '' }} name="is_visible" id="is_visible">
                <label class="form-check-label" for="is_visible">Visible</label>
            </div>
        </div>
        
        {{--Aggiungo una rotta per tornare all'index degli appartamenti--}}
        <div class="card-footer text-end py-4 d-flex justify-content-between">
            <a href="{{ route('user.apartments.index')}}" class="btn btn-dark rounded-circle"><i class="fa-solid fa-angles-left"></i></a>
            <button type="submit" class="btn btn-success rounded-circle"><i class="fa-solid fa-plus"></i></button>
        </div>
    
    </form>

    