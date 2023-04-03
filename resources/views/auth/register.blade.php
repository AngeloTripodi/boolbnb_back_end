<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boolbnb register</title>
    @vite(['resources/scss/app.scss'])

</head>

<body class="page-100">
    <section id="register" class="vertical-center">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col col-xl-7">
                    <div class="card my-shadow b-radius-1 bg-main-color border-0">
                        <div class="row g-0 align-items-end">
                            
                                <div class="col-md-5 col-lg-4 d-none d-md-block">
                                        <img src="{{ asset('img/' . 'bg-house.jpg') }}"
                                        alt="login form" class="img-fluid b-radius-left-1">
                                </div>
                                <div class="col-md-7 col-lg-8 d-flex align-items-center bg-white border b-radius-right-1 b-radius-m">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form class="form needs-validation" novalidate method="POST" action="{{ route('register') }}">
                                        @csrf
                                        {{-- Logo --}}
                                        <div class="d-flex align-items-center mb-2 pb-1">
                                            <img src="{{ asset('img/' . 'Logo.png') }}" alt="Image logo Boolbnb" style="width: 200px">
                                        </div>
            
                                        {{-- Name --}}
                                        <div class="form-outline mb-2">
                                            <label class="form-label m-1" for="name">{{ __('Name') }}</label>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
                                            <div class="text-danger" id="name-error-message"></div>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert" id="name-error-message">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
            
                                        {{-- Last name --}}
                                        <div class="form-outline mb-2">
                                            <label class="form-label m-1" for="last_name">{{ __('Last name') }}</label>
                                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus />
                                            <div class="text-danger" id="last-name-error-message"></div>
                                            @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
            
                                        {{-- Date of Birth --}}
                                        <div class="form-outline mb-2">
                                            <label class="form-label m-1" for="date_of_birth">{{ __('Date of birth') }}</label>
                                            <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" required autocomplete="date_of_birth" autofocus />
                                            <div class="text-danger" id="dob-error-message"></div>
                                            @error('date_of_birth')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        {{-- Email --}}
                                        <div class="form-outline mb-2">
                                            <label class="form-label m-1" for="email">{{ __('E-Mail Address')}}*</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                                            <div class="text-danger" id="email-error-message"></div>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
            
                                        {{-- Password --}}
                                        <div class="form-outline mb-2">
                                            <label class="form-label m-1" for="password">{{ __('Password') }}*</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus />
                                            <div class="text-danger" id="password-error-message"></div>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
            
                                        {{-- Password confirm --}}
                                        <div class="form-outline mb-4">
                                            <label class="form-label m-1" for="password-confirm">{{ __('Confirm Password') }}*</label>
                                            <input id="password-confirm" type="password" class="form-control"  name="password_confirmation" required autocomplete="new-password" autofocus />
                                            <div class="text-danger" id="confirm-password-error-message"></div>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        
            
                                        <div class="mb-1 row mb-0">
                                            <div class="pt-1 w-100">
                                                <button type="submit" class="btn w-100 my-btn">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    @vite('resources/js/client-validation.js')

</body>

</html>