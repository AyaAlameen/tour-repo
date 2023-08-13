@extends('layout-En.master')
@section('content')

<style type="text/css">
   
  
    .grid-item {
     background-color: #f2f2f2;
     border: 1px solid #ccc;
     padding: 10px;
     text-align: center;
     font-size: 20px;
     width: 300px;
     height: 200px;
transition: all linear 1s;

    }
  
    img {
     max-width:280px ;
     height: 180px;
    }
    .grid-item:hover {
   background-color: var(--bambi);
   cursor: pointer;
}
   </style>

{{-- Gallery --}}
    <div class="d-flex container mt-5  justify-content-center" style="flex-wrap: wrap;">
      
            
                {{-- @foreach ($group->places as $place)
                       
                    @if($place->images()->count() >0)
                    @forEach($place->images as $image)
                    <div class="grid-item"> 
                        <img src="{{ asset(str_replace(app_path(), '', $image->image)) }}">
                    </div>
                @endforeach
                @endif
          
                @endforeach --}}
                @foreach ($group->places as $place)
                    @if($place->images()->count() >0)
                        @forEach($place->images()->get() as $image)
                            <div class="grid-item"> 
                                <img src="{{ asset(str_replace(app_path(), '', $image->image)) }}">
                            </div>
                        @endforeach
                    @endif

                @endforeach
    
               
                 
    </div>
    {{-- end Gallery --}}
             
               

    {{-- بداسة كارد الرحلة --}}
    <div class="mainCard  w-50 m-auto" style="border-radius: 10px; margin-top: 40px !important;"">
        <div class="d-flex">
           
            <div class="p-4">
                <div class="d-flex " style="justify-content: space-between;">
                    <h4 class=" p-2 pl-2">Trip Information: ({{$group->translations()->where('locale', 'en')->first()->name}})</h4>
                </div>
                <p class="pr-2 pl-2 text-body" >{{$group->translations()->where('locale', 'en')->first()->description}}</p>
                    
                    <h5 class=" p-2 pl-2">With Guide: {{$group->touristGuide->translations()->where('locale', 'en')->first()->name}}</h5>
                 
                  <div style="display: flex; align-items: baseline; ">
                    <i class="fa fa-calendar-alt"></i>
                    <h5 class=" p-2 pl-2">From :{{$group->start_date}}</h5>
                  </div>
                     <div style="display: flex; align-items: baseline; ">
                    <i class="fa fa-calendar-alt"></i>
                    <h5 class=" p-2 pl-2">To :{{$group->end_date}}</h5>
                  </div>
                  {{-- <div style="display: flex; align-items: baseline;">
                    <i class="fa fa-car-alt"></i>
                    <h5 class=" p-2 pl-2">In cooperation with the transportation company : alrawda</h5>
                  </div> --}}
                  <div style="display: flex; align-items: baseline; ">
                    <i class="fas fa-location-dot"></i>
                    <h5 class=" p-2 pl-2">Destinations: </h5>
                  </div>
                  <ul >
                    @foreach($group->places as $place)
                    <li><p class="text-body">{{$place->translations()->where('locale', 'en')->first()->name}}</p></li>
                    @endforeach

                    
                </ul>
                   
            
       

                <div class="d-flex" style="justify-content: flex-end; align-items: baseline;">
                    <h6 class="d-inline ml-4">Cost : {{$group->cost}}</h6>
                    @isset(Auth::user()->id)
                    <button class="btn btn-primary ml-4" data-bs-toggle="modal" data-bs-target="#exampleModal20">book</button>
                    @else
                    <button onclick="loginBefore()" class="btn btn-primary ml-4">book</button>
                    @endisset
                </div>
            </div>
    </div>


    {{-- نهاية كارد الرحلة --}}





</div>
{{-- نهاية  الخدمات --}}


@endsection