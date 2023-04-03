
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boolbnb login</title>
    @vite(['resources/scss/app.scss'])
    
</head>
<body class="page-100">
    <section id="login" class="vertical-center">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col col-lg-10 col-xl-8">
                    <div class="card my-shadow b-radius-1">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="{{ asset('img/' . 'bg-house.jpg') }}"
                                alt="login form" class="img-fluid b-radius-left-1" />
                            </div>
                            
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        {{-- Logo --}}
                                        <div class="d-flex align-items-center mb-2 pb-1">
                                            <img src="{{ asset('img/' . 'Logo.png') }}" alt="Image logo Boolbnb" style="width: 200px">
                                        </div>
                                        
                                        <h5 class="fw-normal mb-2 pb-3">Sign into your account</h5>
                                        
                                        {{-- Email --}}
                                        <div class="form-outline mb-4">
                                            <label class="form-label m-1" for="email">{{ __('E-Mail Address')}}</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        
                                        {{-- Password --}}
                                        <div class="form-outline mb-4">
                                            <label for="password" class="form-label m-1">{{ __('Password')}}</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        
                                        {{-- Remember me --}}
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{old('remember') ? 'checked' : '' }}
                                            {{old('remember') ? 'checked' : '' }}>
                                            
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                        <div class="pt-1 mb-4 w-100">
                                            <button class="btn w-100 my-btn" type="submit">{{ __('Login') }}</button>
                                        </div>
                                        
                                        {{-- forgot password --}}
                                        @if (Route::has('password.request'))
                                        <a class="small text-muted text-decoration-none" href="{{ route('password.request') }}">{{ __('Forgot Password?') }}</a>
                                        @endif
                                        <div class="register">
                                            <span class="pb-lg-2">Don't have an account? <a href="{{ route('register') }}" class="text-decoration-none main-color">{{ __('Register here') }}</a></span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</body>
</html>
