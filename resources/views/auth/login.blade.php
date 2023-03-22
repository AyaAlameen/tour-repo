@extends('layouts.app')

@section('content')
<div class="d-md-flex half" id="app">
    <div class="bg" style="background-image: url('img/ححح.jpg');"></div>   
      <div class="contents">
          <div class="container">
             <div class="row align-items-center justify-content-center">
                
           <div class="col-md-12">
            <div style="max-width:400px" class="form-block mx-auto">
            <div class="text-center mb-5">
              <h3 style="color:var(--navi);">Login to <strong style="color:var(--bambi);">traveler</strong></h3>
              </div>
                    
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group  first">
                            <label for="email">{{ __('Email') }}</label>

                        
                                <input id="email" type="email" placeholder="your-email@gmail.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group last mb-3">
                            <label for="password">{{ __('Password') }}</label>

                        
                                <input id="password" type="password" placeholder="Your Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="d-sm-flex mb-5 align-items-center">
                            
                                

                                    <label class="control control--checkbox mb-3 mb-sm-0" for="remember">
                                        {{ __('Remember Me') }}
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <div class="control__indicator"></div>
  
                                    </label>
                            
                            
                                    @if (Route::has('password.request'))
                                    <span class="ml-auto"> 
                                        <a class="forgot-pass" href="{{ route('password.request') }}">
                                        {{ __('Forgot Password') }}
                                    </a>
                                    </span>
                                   
                                @endif
                        </div>

                   
                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ __('Login') }}
                                </button>
                                <span class="d-flex justify-content-center mt-3"> 
                                        <a class="forgot-pass " href="{{ route('register') }}">
                                        {{ __('Not Register yet ? ') }}
                                    </a>
                                    </span>
                                   
              
                    </form>
                
            </div>
         </div>
        </div>
     </div>
   </div>
</div>


@endsection
