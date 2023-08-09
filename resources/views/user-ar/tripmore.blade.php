@extends('layout-Ar.master')
@section('content')
{{-- Gallery --}}
    <div class="d-flex container mt-5 justify-content-center">
        <div style="width: 45%; height: 440px;">
            {{-- هي حلقة الفور يلي عم اعرض فيها الصور نفسا استخدميها لتعرضيون بالغريد --}}
            @foreach ($group->places as $place)
                @if($place->images()->count() >0)
                @forEach($place->images as $image)
                    <img src="{{ asset(str_replace(app_path(), '', $image->image)) }}" width="100%" height="100%">
                    
            @endforeach
            @endif
            @endforeach
            {{-- لهون --}}
            
            <button
                style="position: relative; left:75%; bottom:35px; border-radius:20px; font-size:14px; border-color:var(--app-bg);"
                data-bs-toggle="modal" data-bs-target="#exampleModal">عرض
                جميع الصور</button>

            {{-- picturs modal --}}

            <!-- Modal -->
            <div class="modal fade " data-bs-backdrop="static" id="exampleModal" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " style="max-width: 800px;">
                    <div class="modal-content toggle">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModal3Label">جميع الصور</h5>
                            <button type="button" class="btn-close m-0 close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <!-- صور المكان -->
                            <div id="carouselExample2Indicators" class="carousel slide  m-auto w-100"
                                data-bs-ride="carousel">

                                <div class="carousel-inner">
                                    @foreach($group->places as $place)
                                        @if($place->images()->count() >0)
                                            @forEach($place->images as $image)
                                                <div @if ($loop->first) class="carousel-item active" @else class="carousel-item" @endif>
                                                    <img class="img-fluid w-100" style="padding-inline: 80px;"
                                                        src="{{ asset(str_replace(app_path(), '', $image->image)) }}" alt="">
                                                </div>
                                            @endforeach
                                        @endif
                                    @endforeach
                                    
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExample2Indicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon"
                                        style="background-image:url(../img/previous.png); " aria-hidden="false"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExample2Indicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" style="background-image:url(../img/next.png);"
                                        aria-hidden="false"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <!-- نهاية صور المكان -->
                        </div>


                    </div>
                </div>
            </div>
            {{-- end pic modal --}}
        </div>
        {{--  هدول بلاهون من هون--}}
        <div style="width: 35%; height: 440px;">
            <img src="img/caption.jpg" width="100%" height="60%">
            <img src="img/ALEPPO458976.gif" width="100%" height="40%">
        </div>
        {{-- لهون --}}
    </div>
    {{-- end Gallery --}}



    {{-- بداسة كارد الرحلة --}}
    <div class="mainCard  w-50 m-auto" style="border-radius: 10px; margin-top: 40px !important;">
        <div class="d-flex">
           
            <div class="p-4">
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