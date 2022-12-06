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
          <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            <div class="mb-md-5 mt-md-4 pb-5">
                <form method="POST" action="{{ route('password.email') }}">
                        @csrf
              <h2 class="fw-bold mb-2 text-uppercase" style="    color: white;
    font-size: 2.3em;
    padding-left: 30%;
    padding-top: 40px;
    padding-bottom: 70px;
    font-family: sans-serif;">{{ __('Reset Password') }}</h2>
 

              <div class="form-outline form-white mb-4" style="    display: flex;
    flex-direction: column-reverse;">
                
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="    width: 80%;
    height: 40px;
    margin: 10px 0 70px 50px;
    background: transparent;
    border: 1px solid white;
    border-radius: 3px;
    font-size: 17px;
    color: white;">
                <label class="form-label" for="email" style="    color: white;
    padding-left: 50px;
    font-size: x-large;
    font-family: sans-serif;">{{ __('Email Address') }}</label>
                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
              </div>


              <button class="btn btn-outline-light btn-lg px-5" type="submit" style="color: white;
    border-radius: 3px;
    border: 1px solid white;
    width: 50%;
    height: 7%;
    background: transparent;
    font-size: larger;
    margin-left: 25%;
    margin-bottom: 120px;
    "> {{ __('Send Password Reset Link') }}</button>

 <div style="margin-left: 32%;
    font-size: 15px;
    font-family: sans-serif;
    font-weight: 600;">
              <p class="mb-0" style="color:white;">Would you like to <a href="{{ route('login') }}" class="text-white-50 fw-bold" style="color: #9c9393;">Go Back</a> ?
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



<!-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf -->

                        <!-- <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> -->

                                <!-- @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> -->
<!-- 
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
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
