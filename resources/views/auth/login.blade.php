<section class="vh-100" style="background: #6a11cb; width: 100%; height: 100%;
                         background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
                         background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))">
<div class="container py-5 h-100" style="    background: #3b3343;
                                         border-radius: 20px;
                                             width: calc(40%);
                                                 height: 80%;
                                                 margin-left: calc(30%);
                                                     position: absolute;
                                                    margin-top: 5%;
                                        ">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
          @if ($message = Session::get('messages'))
          <div class="alert alert-warning">
                    <p>{{ __($message) }}</p>
                </div>
                @endif
            <div class="mb-md-5 mt-md-4 pb-5">
                <form method="POST" action="{{ route('login') }}">
                        @csrf
              <h2 class="fw-bold mb-2 text-uppercase" style="    color: white;
    font-size: 2.3em;
    padding-left: 40%;
    padding-top: 40px;
    font-family: sans-serif;">LOGIN</h2>
              <p class="text-white-50 mb-5" style="color: #9c9393;
    font-family: sans-serif;
    padding-left: 25%;
    padding-bottom: 5%;
    font-weight: 600;">Please enter your login and password!</p>

              <div class="form-outline form-white mb-4" style="    display: flex;
    flex-direction: column-reverse;">
                
                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus style="    width: 80%;
    height: 40px;
    margin: 10px 0 30px 50px;
    background: transparent;
    border: 1px solid white;
    border-radius: 3px;
    font-size: 17px;
    color: white;">
                <label class="form-label" for="email" style="    color: white;
    padding-left: 50px;
    font-size: x-large;
    font-family: sans-serif;">Email</label>
                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
              </div>

              <div class="form-outline form-white mb-4" style="display: flex;
    flex-direction: column-reverse;">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" style="    width: 80%;
    height: 40px;
    margin: 10px 0 30px 50px;
    background: transparent;
    border: 1px solid white;
    border-radius: 3px;
    font-size: 17px;
    color: white;">
                <label class="form-label" for="password" style="color: white;
    padding-left: 50px;
    font-size: x-large;
    font-family: sans-serif;">Password</label>
                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
              </div>
              <!-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->
        
              @if (Route::has('password.request'))
              <p class="small mb-5 pb-lg-2">   <a class="text-white-50" href="{{ route('password.request') }}" style="color: #9c9393;
    font: none;
    margin-left: 36%;
    font-size: 15px;
    font-family: sans-serif;
    font-weight: 600;">
                                        {{ __('Forgot Your Password?') }}
                                    </a></p>
                                @endif

              <button class="btn btn-outline-light btn-lg px-5" type="submit" style="color: white;
    border-radius: 3px;
    border: 1px solid white;
    width: 30%;
    height: 7%;
    background: transparent;
    font-size: larger;
    margin-left: 35%;
    margin-bottom: 20px;">LOGIN</button>

            </div>

            <div style="margin-left: 32%;
    font-size: 15px;
    font-family: sans-serif;
    font-weight: 600;">
              <p class="mb-0" style="color:white;">Don't have an account? <a href="{{ route('register') }}" class="text-white-50 fw-bold" style="color: #9c9393;">Sign Up</a>
              </p>
            </div>
                </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

 

<!-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if ($message = Session::get('messages'))
                <div class="alert alert-warning">
                    <p>{{ __($message) }}</p>
                </div>
                @endif
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> -->

                        <!-- <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> -->

                        <!-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link forget-password" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection -->
