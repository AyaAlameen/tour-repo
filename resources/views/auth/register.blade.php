@extends('layouts.app')

@section('content')
<div class="d-md-flex half">
<div class="bg" style="background-image: url('../img/ححح.jpg');"></div>   

    <div class="contents">
        <div class="container">
            <div class="row align-items-center justify-content-center">
            <div style="width:600px;" class="form-block mx-auto">
       
            <div class="text-left mb-1 d-flex" style="align-items: baseline; justify-content: space-between;">
              <h3 style="color:var(--navi);">Register : </h3>
              <a href="{{ route('userhome-ar') }}" style="margin-right: 30px;"> <i class="fas fa-home homeicon"></i> </a>
              </div>
              <hr>
                <div class="col-md-12">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" >
                        @csrf

                        <div class="acc-pic position-relative d-flex justify-content-center">
                            <img src="img/1656869576_personalimg.jpg" alt="Account" id="add_previewImage_0" width="100px" height="100px"
                                style="border-radius:50%; margin-block:30px;">
                            <input type="file" id="add_input_0" accept="image/*" 
                            onchange="previewImage(this, 'add_previewImage_0')"
                                style="position:absolute; z-index:9999; left:55%; top:63%; opacity:0; width:30px;" class="form-control" name="image">
                            <span class="position-absolute translate-middle badge rounded-pill mr-3"
                                style="left:58%; background-color:var(--navi);top:70%; width:35px; height:35px;">
                                <i class="fas fa-pen" style="color:#fff !important; padding-top:7px;">
                                </i></span>
                        </div>
                        <div class="d-flex justify-content-center mb-2">
                            <span style="color: #dc3545;font-size: .875em; text-align: center;">@error('image')<strong>{{$message}}</strong>@enderror</span>

                        </div>
                        <div class="form-group d-flex mb-3 first align-items-center">
                            <label for="user_name"   class="col-md-4 col-form-label text-md-start">{{ __('Username') }}</label>

                            <div class="d-flex  w-100" style="flex-direction: column;">
                                <input id="user_name" placeholder="eg.aya-alameen" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name">

                                @error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3 d-flex align-items-center">
                            <label for="email" class="col-md-4 col-form-label text-md-start">{{ __('Email Address') }}</label>

                            <div class="d-flex w-100" style="flex-direction: column;" >
                                <input id="email" placeholder="your-email@gmail.com" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                                
                            
                        </div>

                        <div class="form-group mb-3 d-flex align-items-center">
                            <label for="password"   class="col-md-4 col-form-label text-md-start">{{ __('Password') }}</label>

                            <div class="d-flex w-100" style="flex-direction: column;" >
                                <input id="password" placeholder="Your Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group  mb-3 last d-flex align-items-center">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-start">{{ __('Confirm Password') }}</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                       
                        </div>

                        {{-- <div class="form-group mb-3 d-flex align-items-center">
                            <label class="col-md-4 col-form-label text-md-start">{{ __('Image') }}</label>    
                            <div class="d-flex w-100" style="flex-direction: column;" >        
                                <input style="padding-top:15px; padding-left:12.5%;"  type="file" class="form-control" name="image" >    
                              
                            </div>
                        </div> --}}

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
