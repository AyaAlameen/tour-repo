@extends('layouts.app')

@section('content')
<div class="d-md-flex half">
<div class="bg" style="background-image: url('../img/ححح.jpg');"></div>   

    <div class="contents">
        <div class="container">
            <div class="row align-items-center justify-content-center">
            <div style="width:600px;" class="form-block mx-auto">
       
            <div class="text-left mb-1">
              <h3 style="color:var(--navi);">Register : </h3>
              </div>
              <hr>
                <div class="col-md-12">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf



                        <div class="form-group d-flex mb-3 first align-items-center">
                            <label for="user_name"   class="col-md-4 col-form-label text-md-start">{{ __('Username') }}</label>

                            
                                <input id="user_name" placeholder="eg.aya-alameen" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name">

                                @error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group mb-3 d-flex align-items-center">
                            <label for="email" class="col-md-4 col-form-label text-md-start">{{ __('Email Address') }}</label>

                            
                                <input id="email" placeholder="your-email@gmail.com" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group mb-3 d-flex align-items-center">
                            <label for="password"   class="col-md-4 col-form-label text-md-start">{{ __('Password') }}</label>

                           
                                <input id="password" placeholder="Your Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                         
                        </div>



                        <div class="form-group  mb-3 last d-flex align-items-center">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-start">{{ __('Confirm Password') }}</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                       
                        </div>

                        <div class="form-group mb-3 d-flex align-items-center">
                            <label class="col-md-4 col-form-label text-md-start">{{ __('Image') }}</label>            
                                <input style="padding-top:15px; padding-left:12.5%;"  type="file" class="form-control @error('password') is-invalid @enderror" name="image" >    
                        </div>

                        <div class="row mb-0 mt-3 justify-content-center">
                            <div class="col-md-6 offset-md-10">
                                <button type="submit" class="btn btn-block text-light" style="background-color:var(--bambi);">
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
@endsection
