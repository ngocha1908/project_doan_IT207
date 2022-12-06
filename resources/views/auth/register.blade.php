<section class="vh-100" style="background: #6a11cb; width: 100%; height: 100%;
                         background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
                         background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))">
<div class="container py-5 h-100" style="    background: #3b3343;
                                         border-radius: 20px;
                                             width: calc(40%);
                                                 height: 90%;
                                                 margin-left: calc(30%);
                                                     position: absolute;
                                                    margin-top: 2%;
                                        ">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <div class="mb-md-5 mt-md-4 pb-5">
      
                <form method="POST" action="{{ route('register') }}">
                        @csrf
              <h2 class="fw-bold mb-2 text-uppercase" style="    color: white;
    font-size: 2.3em;
    padding-left: 35%;
    padding-top: 10px;
    font-family: sans-serif;">REGISTER</h2>


              <div class="form-outline form-white mb-4" style="    display: flex;
    flex-direction: column-reverse;">
                
                <input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ old('fullname') }}" required autocomplete="name" autofocus style="width: 80%;
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
    font-family: sans-serif;">{{ __('Fullname') }}</label>
                  @error('fullname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
              </div>

              <div class="form-outline form-white mb-4" style="display: flex;
    flex-direction: column-reverse;">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" style="    width: 80%;
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
    font-family: sans-serif;">{{ __('Email Address') }}</label>
                
                @error('email')
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
                        <div class="form-outline form-white mb-4" style="display: flex;
    flex-direction: column-reverse;">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" style="    width: 80%;
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
    font-family: sans-serif;">{{ __('Password') }}</label>
                
                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
              </div>
              <div class="form-outline form-white mb-4" style="display: flex;
    flex-direction: column-reverse;">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" style="    width: 80%;
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
    font-family: sans-serif;">{{ __('Confirm Password') }}</label>

              </div>


              <button class="btn btn-outline-light btn-lg px-5" type="submit" style="color: white;
    border-radius: 3px;
    border: 1px solid white;
    width: 30%;
    height: 7%;
    background: transparent;
    font-size: larger;
    margin-left: 35%;
    margin-bottom: 20px;">REGISTER</button>
 <div style="margin-left: 32%;
    font-size: 15px;
    font-family: sans-serif;
    font-weight: 600;">
              <p class="mb-0" style="color:white;">Already have an account? <a href="{{ route('login') }}" class="text-white-50 fw-bold" style="color: #9c9393;">Login</a>
              </p>
            </div>
            </div>
                </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Fullname') }}</label>

                            <div class="col-md-6">
                                <input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ old('fullname') }}" required autocomplete="name" autofocus>

                                @error('fullname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> -->

                        <div class="row mb-3">
                            <!-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> -->

                        <!-- <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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
@endsection -->
