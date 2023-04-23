@extends('layouts.app')

@section('content')
<div class="d-md-flex half justify-content-center bg-light">

 

    <div class="contents ">
        <div class="container ">
        <div class="row align-items-center  justify-content-center">
            <div style="width:600px; margin-bottom:100px;" class="form-block mx-auto">
       
            <div class="text-left mb-1">
              <h3 style="color:var(--navi);">Reset Password : </h3>
              </div>
              <hr>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="col-md-12 ">

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group d-flex first align-items-center">
                            <label for="email" class="col-md-4 col-form-label text-md-start">{{ __('Email Address') }}</label>

                            
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        
                            <div class="row mb-0 mt-3 justify-content-center">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-block p-2 text-light" style="background-color:var(--bambi);">
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
</div>

@endsection
