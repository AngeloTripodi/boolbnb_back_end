
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boolbnb login</title>
    @vite(['resources/scss/app.scss']);

    
</head>
<body>
    <section id="login">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card my-shadow" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="https://images.unsplash.com/photo-1622632434843-ae4727340fff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2787&q=80"
                                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        {{-- Logo --}}
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            {{-- insert logo here --}}
                                            <i class="fa-solid fa-b fa-2x me-3" style="color: #fe8376;"></i>
                                            <span class="h1 fw-bold mb-0">Boolbnb</span>
                                        </div>
                                        
                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
                                        
                                        {{-- Email --}}
                                        <div class="form-outline mb-4">
                                            <label class="form-label m-0" for="form2Example17">{{ __('E-Mail Address')}}</label>
                                            <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        
                                        {{-- Password --}}
                                        <div class="form-outline mb-4">
                                            <label for="password" class="form-label m-0">{{ __('Password')}}</label>
                                            <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
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
                                            <button class="btn btn-lg w-100 text-white" type="button" style="background-color: #fe8376">{{ __('Login') }}</button>
                                        </div>
                                        
                                        {{-- forgot password --}}
                                        @if (Route::has('password.request'))
                                        <a class="small text-muted text-decoration-none" href="{{ route('password.request') }}">{{ __('Forgot Password?') }}</a>
                                        @endif
                                        <div class="register">
                                            <span class="pb-lg-2">Don't have an account? <a href="{{ route('register') }}" class="text-decoration-none" style="color: #fe8376;">{{ __('Register here') }}</a></span>
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
