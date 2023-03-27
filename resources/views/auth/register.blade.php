<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boolbnb register</title>
    @vite(['resources/scss/app.scss'])

</head>

<body>
    <section id="register">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col col-xl-8">
                    <div class="card my-shadow b-radius-1 bg-main-color border-0">
                        <div class="row g-0 align-items-end">
                            
                                <div class="col-md-6 col-lg-5 d-none d-md-block">
                                        <img src="{{ asset('img/' . 'bg-house.jpg') }}"
                                        alt="login form" class="img-fluid b-radius-left-1">
                                </div>
                                <div class="col-md-6 col-lg-7 d-flex align-items-center bg-white border b-radius-right-1 b-radius-m">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form class="form needs-validation" novalidate method="POST" action="{{ route('register') }}">
                                        @csrf
                                        {{-- Logo --}}
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            {{-- insert logo here --}}
                                            <i class="fa-solid fa-b fa-2x me-3 main-color"></i>
                                            <span class="h1 fw-bold mb-0">Boolbnb</span>
                                        </div>
            
                                        {{-- Name --}}
                                        <div class="form-outline mb-3">
                                            <label class="form-label m-1" for="name">{{ __('Name') }}</label>
                                            <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
                                            <div class="text-danger" id="name-error-message"></div>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert" id="name-error-message">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
            
                                        {{-- Last name --}}
                                        <div class="form-outline mb-3">
                                            <label class="form-label m-1" for="last_name">{{ __('Last name') }}</label>
                                            <input id="last_name" type="text" class="form-control form-control-lg @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus />
                                            <div class="text-danger" id="last-name-error-message"></div>
                                            @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
            
                                        {{-- Date of Birth --}}
                                        <div class="form-outline mb-3">
                                            <label class="form-label m-1" for="date_of_birth">{{ __('Date of birth') }}</label>
                                            <input id="date_of_birth" type="date" class="form-control form-control-lg @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" required autocomplete="date_of_birth" autofocus />
                                            <div class="text-danger" id="dob-error-message"></div>
                                            @error('date_of_birth')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        {{-- Email --}}
                                        <div class="form-outline mb-3">
                                            <label class="form-label m-1" for="email">{{ __('E-Mail Address')}}*</label>
                                            <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                                            <div class="text-danger" id="email-error-message"></div>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
            
                                        {{-- Password --}}
                                        <div class="form-outline mb-3">
                                            <label class="form-label m-1" for="password">{{ __('Password') }}*</label>
                                            <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus />
                                            <div class="text-danger" id="password-error-message"></div>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
            
                                        {{-- Password confirm --}}
                                        <div class="form-outline mb-3">
                                            <label class="form-label m-1" for="password-confirm">{{ __('Confirm Password*') }}</label>
                                            <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password" autofocus />
                                            <div class="text-danger" id="confirm-password-error-message"></div>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
            
                                        <div class="mb-3 row mb-0">
                                            <div class="pt-1 mb-3 w-100">
                                                <button type="submit" class="btn btn-lg w-100 my-btn">
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