@extends('layout-En.master')
@section('content')
    <h2 class="p-5"> Discover ({{$city->translations()->where('locale', 'en')->first()->name}}) </h2>
    <div style="width: 400px; height: 300px; margin: auto; text-align: center;">
        <img src="{{ asset(str_replace(app_path(), '', $city->image)) }}" alt="image" style="width: 100%; height: 100%;">
      </div>

    {{-- وصف المحافظة --}}
    <div class="container w-50 m-auto">
        <h4 class="pt-5 pb-3">About ({{$city->translations()->where('locale', 'en')->first()->name}}) </h4>
        <p >{{$city->translations()->where('locale', 'en')->first()->description}}</p>
    </div>
    {{-- نهاية الوصف --}}
    
        {{-- أشهر الأماكن بالتصنيفات --}}
        <h4 class="p-5" style=" padding-bottom:5px !important;">اشهر الأماكن في ({{$city->translations()->where('locale', 'en')->first()->name}})
        </h4>
        <div class="container">
            @foreach($Category_places as $category)
            {{-- الأصناف --}}
            <div class="container">
                <h4 class="p-5"> Places ({{$category[0]->subCategory()->first()->category()->first()->translations()->where('locale', 'en')->first()->name}}) </h4>
                <div class="container d-flex justify-content-center m-3">
                    <button class="m-2 btn btn-primary">صنف فرعي 1</button>
                    <button class="m-2 btn btn-primary">صنف فرعي 6</button>
                    <button class="m-2 btn btn-primary">صنف فرعي 5</button>
                    <button class="m-2 btn btn-primary">صنف فرعي 4</button>
                    <button class="m-2 btn btn-primary">صنف فرعي 3</button>
                    <button class="m-2 btn btn-primary">صنف فرعي 2</button>
                </div>
                @foreach($category as $place)
                {{-- بداسة كارد المكان --}}
                <div class="mainCard  w-75 m-auto " style="border-radius: 10px;">
                    <div class="d-flex">
                        <div class="text-center ">
                            <img src="{{ asset(str_replace(app_path(), '', $place->images()->first()->image)) }}"
                                style="padding: 10px; box-sizing: content-box; border-radius: 20px;" width="200px"
                                height="200px">
                            <i class="fas fa-star p-2"></i>
                            <i class="fas fa-star p-2 "></i>
                            <i class="fas fa-star p-2 "></i>
                            <i class="fas fa-star p-2"></i>
                        </div>
                        <div>
                            <div class="d-flex " style="justify-content: space-between;">
                                <h4 class="text-right p-2">{{$place->translations()->where('locale', 'en')->first()->name}}</h4>
                                <div>
                                    <h5 class="p-2 pl-4">8.2</h5>
                                </div>
                            </div>
                            <h5 class="pl-2">{{$place->district->translations()->where('locale', 'en')->first()->name}}</h5>
                            <p class="pl-2 text-primary"><a href="mailto: {{$place->email}}">{{$place->email}}</a></p>
                            <p class="pl-2">{{$place->translations()->where('locale', 'ar')->first()->description}}</p>
                        </div>
                    </div>
                    @isset(Auth::user()->id)
                        <div class="w-100 pl-3 m-auto">
                            <img src="{{ asset(Auth::user()->image) }}" style="border-radius: 50%;  margin-right:4px;" width="40px"
                            height="40px">
                            <input type="text" style=" width: 77%;" placeholder="Leave a comment">
                            <input type="submit" value="send" class="m-2 btn btn-primary"
                                style="font-size: 14px; height: 30px;  width: 12%; padding:3px;">
                        
                            
                            
                        </div>
                    @else
                        <div class="w-100 t pl-3 m-auto">
                            <img src="{{ asset('img/1656869576_personalimg.jpg') }}" style="border-radius: 50%;  margin-right:4px;"
                            width="40px" height="40px">
                            <input type="text" style=" width: 77%;" placeholder="Leave a comment">
                            <input type="submit" value="send" onClick="loginBefore()" class="m-2 btn btn-primary"
                                style="font-size: 14px; height: 30px;  width: 12%; padding:3px;">
                        
                        
                        </div>
                    @endisset

                </div>
                <button class="m-2 btn btn-primary"
                    style="width: 70%; margin-left: 15% !important ; margin-bottom: 35px !important;"><a
                        style="color: #fff; width: 100%; display: inline-block;" href="{{ route('place_details_en') }}">
                    more details about place name for booking </a>
                </button>

                {{-- نهاية كارد المكان --}}
                @endforeach

            </div>
            {{-- نهاية الأصناف --}}
            @endforeach
        </div>
        {{-- نهاية أشهر الأماكن --}}
   
@endsection
