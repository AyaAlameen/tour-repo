@extends('layout-Ar.master')
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
      
            
    @foreach ($group->places as $place)
           
        @if($place->images()->count() >0)
        @forEach($place->images as $image)
        <div class="grid-item"> 
            <img src="{{ asset(str_replace(app_path(), '', $image->image)) }}">
        </div>
    @endforeach
    @endif

    @endforeach
    
     
</div>
    {{-- end Gallery --}}



    {{-- بداسة كارد الرحلة --}}
    <div class="mainCard  w-50 m-auto" style="border-radius: 10px; margin-top: 40px !important;">
        <div class="d-flex">
           
            <div class="p-4 w-100">
                <div class="d-flex " style="justify-content: space-between;">
                    <h4 class="text-right p-2 pl-2">معلومات الرحلة ({{$group->translations()->where('locale', 'ar')->first()->name}})</h4>
                </div>
                <p class="text-right pr-2 pl-2 text-body" >{{$group->translations()->where('locale', 'ar')->first()->description}} </p>
                    
                    <h5 class="text-right p-2 pl-2">مع الدليل السياحي:{{$group->touristGuide->translations()->where('locale', 'ar')->first()->name}}</h5>
                 
                  <div style="display: flex; align-items: baseline; flex-direction: row-reverse">
                    <i class="fa fa-calendar-alt"></i>
                    <h5 class="text-right p-2 pl-2">تبدأ الرحلة من تايخ : {{$group->start_date}}</h5>
                  </div>
                     <div style="display: flex; align-items: baseline; flex-direction: row-reverse">
                    <i class="fa fa-calendar-alt"></i>
                    <h5 class="text-right p-2 pl-2"> تنتهي في تاريخ: {{$group->end_date}}</h5>
                  </div>
                  {{-- <div style="display: flex; align-items: baseline; flex-direction: row-reverse">
                    <i class="fa fa-car-alt"></i>
                    <h5 class="text-right p-2 pl-2">بالتعاون مع شركة النقل : الروضة</h5>
                  </div> --}}
                  <div style="display: flex; align-items: baseline; flex-direction: row-reverse">
                    <i class="fas fa-location-dot"></i>
                    <h5 class="text-right p-2 pl-2">الوجهات المعتمدة في الرحلة </h5>
                  </div>
                  <ul style="direction: rtl;">
                    @foreach($group->places as $place)
                    <li><p class="text-body text-end">{{$place->translations()->where('locale', 'ar')->first()->name}}</p></li>
                    @endforeach

                    
                </ul>
                   
            
       

                <div class="d-flex" style="justify-content: flex-end; align-items: baseline;">
                    <h6 class="d-inline ml-4">التكلفة : {{$group->cost}}</h6>
                    @isset(Auth::user()->id)
                    <button class="btn btn-primary ml-4" data-bs-toggle="modal" data-bs-target="#exampleModal20">حجز</button>
                    @else
                    <button onclick="loginBefore()" class="btn btn-primary ml-4">حجز</button>
                    @endisset
                </div>
            </div>
    </div>


    {{-- نهاية كارد الرحلة --}}





</div>
{{-- نهاية  الخدمات --}}




@endsection