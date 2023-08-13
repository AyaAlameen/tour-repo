@extends('layout-En.master')
@section('content')
    <div class="d-flex" style="justify-content: space-around; align-items: center;">

        <h2 class="p-5" style="text-align: right;"> ({{ $place->translations()->where('locale', 'en')->first()->name }})
        </h2>
        <div class="contact_place_info" style="padding-left: 100px;
    padding-right: 150px;">
            <p> <i class="fas fa-phone"></i> {{ $place->phone }}</p>
            <p> <i class="fas fa-envelope"></i> {{ $place->email }}</p>
        </div>
    </div>
    {{-- Gallery --}}
    <div class="d-flex container mt-2 justify-content-center">
        <div style="width: 45%; height: 540px;">
            @if ($place->images()->count() > 0)
                <img src="{{ asset(str_replace(app_path(), '', $place->images()->first()->image)) }}" width="100%"
                    height="100%">
            @endif
            <button
                style="position: relative; left:75%; bottom:35px; border-radius:20px; font-size:14px; border-color:var(--app-bg);"
                data-bs-toggle="modal" data-bs-target="#exampleModal">view all picture</button>

            {{-- picturs modal --}}

            <!-- Modal -->
            <div class="modal fade " data-bs-backdrop="static" id="exampleModal" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " style="max-width: 800px;">
                    <div class="modal-content toggle">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModal3Label">All picture</h5>
                            <button type="button" class="btn-close m-0 close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <!-- صور المكان -->
                            <div id="carouselExample2Indicators" class="carousel slide  m-auto w-100"
                                data-bs-ride="carousel">

                                <div class="carousel-inner">
                                    @foreach ($place->images as $image)
                                        <div
                                            @if ($loop->first) class="carousel-item active" @else class="carousel-item" @endif>
                                            <img class="img-fluid w-100" style="padding-inline: 80px;"
                                                src="{{ asset(str_replace(app_path(), '', $image->image)) }}"
                                                alt="">
                                        </div>
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
        <div style="width: 35%; height: 540px;">
            @if ($place->images()->skip(1)->take(1)->get()->count() == 1)
                <img src="{{ asset(str_replace(app_path(),'',$place->images()->skip(1)->take(1)->get()->first()->image)) }}"
                    width="100%" height="60%">
            @endif
            @if ($place->images()->skip(2)->take(1)->get()->count() == 1)
                <img src="{{ asset(str_replace(app_path(),'',$place->images()->skip(2)->take(1)->get()->first()->image)) }}"
                    width="100%" height="40%">
            @endif
        </div>
    </div>
    {{-- end Gallery --}}
    {{-- وصف المكان --}}
    <div class="container-fluid w-75 m-auto">
        <div class="d-flex" style="justify-content: space-around; align-items: start;">
            <div class="w-50">
                <h4 class="pt-5 pb-3">About
                    {{ $place->translations()->where('locale', 'en')->first()->name }} </h4>
                <p>{{ $place->translations()->where('locale', 'en')->first()->description }}</p>
            </div>
            <div class="d-flex pt-5 pb-3" style="flex-direction: column; align-items: center;">
                <img onclick="showGeolocation({{ $place->getGeolocationArray()[0] }}, {{ $place->getGeolocationArray()[1] }})"
                    class="m-3" data-bs-toggle="modal" id="editmapimg" data-bs-target="#exampleModal9"
                    style="cursor:pointer; border-radius:6px;" src="../img/sy.jpg" width="200px" height="120px">
                <p>See On Map</p>



            </div>
        </div>

    </div>
    {{-- نهاية الوصف --}}
    <div class="m-auto d-flex w-75 justify-content-center">
        <button class="w-25 rate_btn" data-bs-toggle="modal" data-bs-target="#exampleModal1"> <i class="fas fa-star"></i>
            Rate it now <i class="fas fa-star"></i></button>
        @isset(Auth::user()->id)
            <!-- Modal -->
            <div class="modal fade " data-bs-backdrop="static" id="exampleModal1" tabindex="-1"
                aria-labelledby="exampleModal1Label" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content toggle">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModal3Label">Share your review of the place</h5>
                            <button type="button" class="btn-close m-0 close close-star-modal" data-bs-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center stars-rating">

                                @if (\App\Models\Rating::where('user_id', Auth::user()->id)->where('place_id', $place->id)->where('stars', '!=', null)->first())
                                    @if (\App\Models\Rating::where('user_id', Auth::user()->id)->where('place_id', $place->id)->where('stars', '!=', null)->first()->stars == 0)
                                        <i class="far fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                        <i class="far fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                        <i class="far fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                        <i class="far fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                        <i class="far fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                    @elseif(\App\Models\Rating::where('user_id', Auth::user()->id)->where('place_id', $place->id)->where('stars', '!=', null)->first()->stars == 1)
                                        <i class="fas fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                        <i class="far fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                        <i class="far fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                        <i class="far fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                        <i class="far fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                    @elseif(\App\Models\Rating::where('user_id', Auth::user()->id)->where('place_id', $place->id)->where('stars', '!=', null)->first()->stars == 2)
                                        <i class="fas fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                        <i class="fas fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                        <i class="far fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                        <i class="far fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                        <i class="far fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                    @elseif(\App\Models\Rating::where('user_id', Auth::user()->id)->where('place_id', $place->id)->where('stars', '!=', null)->first()->stars == 3)
                                        <i class="fas fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                        <i class="fas fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                        <i class="fas fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                        <i class="far fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                        <i class="far fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                    @elseif(\App\Models\Rating::where('user_id', Auth::user()->id)->where('place_id', $place->id)->where('stars', '!=', null)->first()->stars == 4)
                                        <i class="fas fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                        <i class="fas fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                        <i class="fas fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                        <i class="fas fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                        <i class="far fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                    @elseif(\App\Models\Rating::where('user_id', Auth::user()->id)->where('place_id', $place->id)->where('stars', '!=', null)->first()->stars == 5)
                                        <i class="fas fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                        <i class="fas fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                        <i class="fas fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                        <i class="fas fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                        <i class="fas fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                    @endif
                                @else
                                    <i class="far fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                    <i class="far fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                    <i class="far fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                    <i class="far fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                    <i class="far fa-star" onclick="replaceStar()" style="font-size: 22px;"></i>
                                @endif



                            </div>
                            <p class="text-center">How many stars do you give this place?</p>


                        </div>
                        <div class="modal-footer">

                            <button type="button" id="save-stars-btn" onclick="saveStars({{ $place->id }})"
                                class="app-content-headerButton">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- نهاية المودل --}}
        @else
            <!-- Modal -->
            <div class="modal fade " data-bs-backdrop="static" id="exampleModal1" tabindex="-1"
                aria-labelledby="exampleModal1Label" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content toggle">
                        <div class="modal-header">
                            <button type="button" class="btn-close m-0 close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center p-5">
                            <h5>Log in to continue <a href="{{ route('login') }}"> From Here</a></h5>
                        </div>
                    </div>
                </div>
            </div>
            {{-- نهاية المودل --}}
        @endisset

        {{-- مودل عرض الخريطة بالجدول --}}

        <!-- Modal -->

        <div class="modal fade bg-light" id="exampleModal9" data-bs-backdrop="static" tabindex="-1"
            aria-labelledby="exampleModal9Label" aria-hidden="true">
            <div class="modal-dialog h-100" style="margin:0%; max-width:100%; ">
                <div class="modal-content toggle w-100 h-100">
                    <div class="modal-header">
                        <button type="button" class="btn-close m-0 close" onclick="hidemap('exampleModal9')"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="show-map" class="w-100 h-100"></div>
                    </div>

                </div>
            </div>
        </div>
        {{-- نهاية مودل عرض الخريطة بالجدول --}}




        {{-- بحال المكان ما فيو خدمات ديف كلاس السيرف بكون مخفي وبيطلع هاد الزر للحجز --}}

        @if ($place->services->count() < 0)
            @isset(Auth::user()->id)
                <button class="btn btn-primary ml-4" data-bs-toggle="modal" data-bs-target="#exampleModal20">حجز</button>
            @else
                <button onClick="loginBefore()" class="btn btn-primary w-25 mr-5 rate_btn">Booking</button>
            @endisset
        @endif
    </div>
    {{-- comments --}}
    <div class="container m-5">
        <h3>Reviews About {{ $place->translations()->where('locale', 'en')->first()->name }}</h3>
        <div class="d-flex align-items-start">
            <div>
                @if (\App\Models\Rating::where('place_id', $place->id)->where('reviews', '!=', null)->get())
                    <div id="comments-data">
                        @foreach (\App\Models\Rating::where('place_id', $place->id)->where('reviews', '!=', null)->latest()->take(4)->get() as $comment)
                            {{-- بداية التعليق --}}
                            <div class="m-5">
                                <div class=" d-flex align-items-center">
                                    @if ($comment->user->image)
                                        <img src="{{ asset(str_replace(app_path(), '', $comment->user->image)) }}"
                                            style="border-radius:50%; margin-right: 10px; " width="70px"
                                            height="70px">
                                    @else
                                        <img src="../img/1656869576_personalimg.jpg"
                                            style="border-radius:50%; margin-right: 10px; " width="70px"
                                            height="70px">
                                    @endif

                                    <h5>{{ $comment->user->user_name }}</h5>
                                </div>
                                <p class="text-body w-50 text-end" style="margin-left:10%; ">{{ $comment->reviews }}
                                </p>

                            </div>
                            {{-- نهاية التعليق --}}
                        @endforeach
                    </div>
                @endif

            </div>
            <div class="w-50">
                <img src="../img/popularity.png" width="300px" height="300px">
            </div>
        </div>

    </div>
    {{-- ادخال التعليق --}}
    <div class="container m-5">
        <h3>Also share your comments about {{ $place->translations()->where('locale', 'en')->first()->name }}</h3>
        @isset(Auth::user()->id)
            <form id="comment-form" action="" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="place_id" value="{{ $place->id }}" hidden>
                <div class="w-75 =pr-3 m-auto d-flex align-items-center">
                    <img src="{{ asset(Auth::user()->image) }}" style="border-radius: 50%;  margin-right:10px;"
                        width="40px" height="40px">
                    <textarea style="direction: ltr; width: 77%;" name="reviews" id="comment-content" placeholder="Leave your comment"></textarea>

                    <button type="button" id="save-comment-btn" onclick="saveComment({{ $place->id }})"
                        class="m-2 btn btn-primary"
                        style="font-size: 14px; height: 30px;  width: 12%; padding:3px;">Send</button>
                </div>
            </form>
        @else
            <div class="w-75 pr-3 m-auto d-flex align-items-center">
                <img src="{{ asset('img/1656869576_personalimg.jpg') }}" style="border-radius: 50%;  margin-left:10px;"
                    width="40px" height="40px">
                <textarea style="direction: rtl; width: 77%;" placeholder="Leave your comment"></textarea>
                <input type="submit" value="إرسال" onClick="loginBefore()" class="m-2 btn btn-primary"
                    style="font-size: 14px; height: 30px;  width: 12%; padding:3px;">
            </div>
        @endisset
    </div>
    {{-- نهاية ادخال التعليق --}}
    {{-- end comments --}}
    {{-- الخدمات --}}
    @if ($place->services->count() > 0)
        <div class="serv d-flex" style="flex-direction: row; align-items: center;">

            <div class="sidebar">
                <div class="sidebar-header">
                    <div class="app-icon">
                        <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                            <path fill="currentColor"
                                d="M507.606 371.054a187.217 187.217 0 00-23.051-19.606c-17.316 19.999-37.648 36.808-60.572 50.041-35.508 20.505-75.893 31.452-116.875 31.711 21.762 8.776 45.224 13.38 69.396 13.38 49.524 0 96.084-19.286 131.103-54.305a15 15 0 004.394-10.606 15.028 15.028 0 00-4.395-10.615zM27.445 351.448a187.392 187.392 0 00-23.051 19.606C1.581 373.868 0 377.691 0 381.669s1.581 7.793 4.394 10.606c35.019 35.019 81.579 54.305 131.103 54.305 24.172 0 47.634-4.604 69.396-13.38-40.985-.259-81.367-11.206-116.879-31.713-22.922-13.231-43.254-30.04-60.569-50.039zM103.015 375.508c24.937 14.4 53.928 24.056 84.837 26.854-53.409-29.561-82.274-70.602-95.861-94.135-14.942-25.878-25.041-53.917-30.063-83.421-14.921.64-29.775 2.868-44.227 6.709-6.6 1.576-11.507 7.517-11.507 14.599 0 1.312.172 2.618.512 3.885 15.32 57.142 52.726 100.35 96.309 125.509zM324.148 402.362c30.908-2.799 59.9-12.454 84.837-26.854 43.583-25.159 80.989-68.367 96.31-125.508.34-1.267.512-2.573.512-3.885 0-7.082-4.907-13.023-11.507-14.599-14.452-3.841-29.306-6.07-44.227-6.709-5.022 29.504-15.121 57.543-30.063 83.421-13.588 23.533-42.419 64.554-95.862 94.134zM187.301 366.948c-15.157-24.483-38.696-71.48-38.696-135.903 0-32.646 6.043-64.401 17.945-94.529-16.394-9.351-33.972-16.623-52.273-21.525-8.004-2.142-16.225 2.604-18.37 10.605-16.372 61.078-4.825 121.063 22.064 167.631 16.325 28.275 39.769 54.111 69.33 73.721zM324.684 366.957c29.568-19.611 53.017-45.451 69.344-73.73 26.889-46.569 38.436-106.553 22.064-167.631-2.145-8.001-10.366-12.748-18.37-10.605-18.304 4.902-35.883 12.176-52.279 21.529 11.9 30.126 17.943 61.88 17.943 94.525.001 64.478-23.58 111.488-38.702 135.912zM266.606 69.813c-2.813-2.813-6.637-4.394-10.615-4.394a15 15 0 00-10.606 4.394c-39.289 39.289-66.78 96.005-66.78 161.231 0 65.256 27.522 121.974 66.78 161.231 2.813 2.813 6.637 4.394 10.615 4.394s7.793-1.581 10.606-4.394c39.248-39.247 66.78-95.96 66.78-161.231.001-65.256-27.511-121.964-66.78-161.231z" />
                        </svg>
                    </div>
                </div>
                <form id="filter-service-form" action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="place_id" value="{{ $place->id }}"
                                    hidden>
                    <ul class="sidebar-list">
                        <li onclick="filterServices()" class="sidebar-list-item">
                            <a>
                                <i class="fas fa-filter"></i>
                                <span>فلتر </span>
                            </a>
                        </li>
                        <li class="sidebar-list-item ">
                            <a>
                                <i class="fas fa-users"></i>

                                <span> عدد الأشخاص :</span>
                            </a>
                        </li>

                        <li class="sidebar-list-item">

                            <input type="number" class="w-100" name="people-count-filter" style="margin-right: 20px;">

                        </li>

                        <li class="sidebar-list-item">
                            <a>
                                <i class="fas fa-dolar"></i>
                                <span>السعر بالليرة السوري:</span>

                            </a>
                        </li>


                        @php
                            $max = $place->services->max('cost');
                            $min = $place->services->min('cost');
                            $step = ($max + $min) / 4;
                        @endphp
                        <li class="sidebar-list-item ">
                            <a>
                                <label for="rang1"
                                    style="font-family: 'Courier New', Courier, monospace; font-size: 18px;">
                                    <input type="radio" value="all"
                                        name="cost-filter" id="rang1">
                                    الكل   
                                </label>
                            </a>
                        </li>

                        @for ($i = $min; $i < $max; $i += $step)
                            <li class="sidebar-list-item ">
                                <a>
                                    <label for="rang1"
                                        style="font-family: 'Courier New', Courier, monospace; font-size: 18px;">
                                        <input type="radio" value="{{ $i }} - {{ $i + $step }}"
                                            name="cost-filter" id="rang1">
                                        {{ $i }} - {{ $i + $step }}
                                    </label>
                                </a>
                            </li>
                        @endfor
                    </ul>
                </form>

            </div>
            {{-- الخدمات --}}
            
                <div id="services-data" class="pr-5 w-75">

                    <h4 class="p-5 " style="text-align: right; padding-bottom:5px !important;"> الخدمات الأساسية المقدمة
                        في
                        {{ $place->translations()->where('locale', 'ar')->first()->name }}</h4>
                    @foreach ($place->services as $service)
                        @if (!$service->is_additional)
                            {{-- بداسة كارد الخدمات الغير إضافية --}}
                            <div class="mainCard  w-75 m-auto " style="border-radius: 10px; ">
                                <div class="d-flex">
                                    <div class="text-center ">
                                        <img src="{{ asset(str_replace(app_path(), '', $service->image)) }}"
                                            style="padding: 10px; box-sizing: content-box; border-radius: 20px;"
                                            width="200px" height="200px">

                                    </div>
                                    <div class="pt-4 ">
                                        <div class="d-flex " style="justify-content: space-between;">
                                            <h4 class="text-right p-2">
                                                {{ $service->translations()->where('locale', 'ar')->first()->name }}</h4>
                                        </div>
                                        <p class="text-right pr-2 pl-2">
                                            {{ $place->translations()->where('locale', 'ar')->first()->description }}</p>
                                        <div class="d-flex m-3" style="justify-content: flex-end; align-items: baseline;">
                                            <h6 class="d-inline ml-4">التكلفة : {{ $service->cost }} ل.س</h6>
                                            @if ($service->people_count)
                                                <br>
                                                <h6 class="d-inline ml-4">عدد الأشخاص : {{ $service->people_count }}</h6>
                                            @endif
                                            @if ($service->reservation_period)
                                                <br>
                                                <h6 class="d-inline ml-4">مدة الحجز : @if ($service->reservation_period == '00:15')
                                                        <span> ربع ساعة </span>
                                                    @elseif($service->reservation_period == '00:30')
                                                        <span> نصف ساعة </span>
                                                    @elseif($service->reservation_period == '01:00')
                                                        <span>ساعة</span>
                                                    @elseif($service->reservation_period == '02:00')
                                                        <span> ساعتين </span>
                                                    @elseif($service->reservation_period == '03:00')
                                                        <span> ثلاث ساعات </span>
                                                    @elseif($service->reservation_period == '04:00')
                                                        <span> أربع ساعات </span>
                                                    @elseif(!$service->reservation_period)
                                                        <span> </span>
                                                    @endif
                                                </h6>
                                            @endif
                                            @isset(Auth::user()->id)
                                                <button class="btn btn-primary ml-4" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal20">حجز</button>
                                            @else
                                                <button onclick="loginBefore()" class="btn btn-primary ml-4">حجز</button>
                                            @endisset
                                        </div>
                                    </div>

                                </div>



                            </div>
                        @endif
                    @endforeach
                    {{-- نهاية كارد الخدمات الغير إضافية --}}


                    <h4 class="p-5" style="text-align: right; padding-bottom:5px !important;"> الخدمات الإضافية المقدمة
                        في
                        {{ $place->translations()->where('locale', 'ar')->first()->name }} </h4>
                    @foreach ($place->services as $service)
                        @if ($service->is_additional)
                            {{-- بداسة كارد الخدمات  الإضافية --}}
                            <div class="mainCard  w-75 m-auto " style="border-radius: 10px; ">
                                <div class="d-flex">
                                    <div class="text-center ">
                                        <img src="{{ asset(str_replace(app_path(), '', $service->image)) }}"
                                            style="padding: 10px; box-sizing: content-box; border-radius: 20px;"
                                            width="200px" height="200px">

                                    </div>
                                    <div class="pt-4 ">
                                        <div class="d-flex " style="justify-content: space-between;">
                                            <h4 class="text-right p-2">
                                                {{ $service->translations()->where('locale', 'ar')->first()->name }}</h4>
                                        </div>
                                        <p class="text-right pr-2 pl-2">
                                            {{ $place->translations()->where('locale', 'ar')->first()->description }}</p>
                                        <div class="d-flex m-3" style="justify-content: flex-end; align-items: baseline;">
                                            <h6 class="d-inline ml-4">التكلفة : {{ $service->cost }} ل.س</h6>
                                            @if ($service->people_count)
                                                <br>
                                                <h6 class="d-inline ml-4">عدد الأشخاص : {{ $service->people_count }}</h6>
                                            @endif
                                            @if ($service->reservation_period)
                                                <br>
                                                <h6 class="d-inline ml-4">مدة الحجز : @if ($service->reservation_period == '00:15')
                                                        <span> ربع ساعة </span>
                                                    @elseif($service->reservation_period == '00:30')
                                                        <span> نصف ساعة </span>
                                                    @elseif($service->reservation_period == '01:00')
                                                        <span>ساعة</span>
                                                    @elseif($service->reservation_period == '02:00')
                                                        <span> ساعتين </span>
                                                    @elseif($service->reservation_period == '03:00')
                                                        <span> ثلاث ساعات </span>
                                                    @elseif($service->reservation_period == '04:00')
                                                        <span> أربع ساعات </span>
                                                    @elseif(!$service->reservation_period)
                                                        <span> </span>
                                                    @endif
                                                </h6>
                                            @endif
                                            @isset(Auth::user()->id)
                                                <button class="btn btn-primary ml-4" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal20">حجز</button>
                                            @else
                                                <button onclick="loginBefore()" class="btn btn-primary ml-4">حجز</button>
                                            @endisset
                                        </div>
                                    </div>

                                </div>



                            </div>
                        @endif
                    @endforeach
                    {{-- نهاية كارد الخدمات  الإضافية --}}
                </div>






        </div>
    @endif
    {{-- نهاية  الخدمات --}}
@endsection
<script>
    function replaceStar() {
        var element = event.target; // العنصر الحالي
        var previousSibling = element.previousElementSibling; // الشقيق السابق
        var nextSibling = element.nextElementSibling; //الشقيق التالي
        if (previousSibling == null || previousSibling.classList.contains("fas")) {
            // console.log(nextSibling)
            if (nextSibling == null || nextSibling.classList.contains('far'))
                if (event.target.classList.contains("fas")) {
                    event.target.classList.remove("fas", "fa-star")
                    event.target.classList.add("far", "fa-star")
                } else
            if (event.target.classList.contains("far")) {
                event.target.classList.remove("far", "fa-star")
                event.target.classList.add("fas", "fa-star")
            }
        }


    }


    //--------------------------------------------

    function saveStars(place_id) {
        $("#save-stars-btn").attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');

        var stars = document.querySelectorAll('.stars-rating .fas');
        console.log(stars.length);
        var formData = new FormData();
        formData.append('place_id', place_id);
        formData.append('stars', stars.length);
        $.ajax({
                url: `{{ route('startsPlaceAr') }}`,
                type: "POST",
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
                // $(`#places-category-${category_id}`).empty();
                // $(`#places-category-${category_id}`).append(data);
                $('.close-star-modal').click();
                $('.parenttrue').attr("hidden", false);

            })
            .fail(function() {
                $('.parent').attr("hidden", false);


            }).always(function() {
                // Re-enable the submit button and hide the loading spinner
                $("#save-stars-btn").attr("disabled", false).html('Save');
            });
    }

    //--------------------------------------------

    function saveComment(place_id) {
        $("#save-comment-btn").attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById('comment-form'));


        $.ajax({
                url: `{{ route('reviewsPlaceEn') }}`,
                type: "POST",
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
                console.log(data);
                $(`#comments-data`).empty();
                $(`#comments-data`).append(data);
                // $('.close-comment-modal').click();
                $('.parenttrue').attr("hidden", false);
                document.getElementById('comment-content').value = '';

            })
            .fail(function() {
                $('.parent').attr("hidden", false);


            }).always(function() {
                // Re-enable the submit button and hide the loading spinner
                $("#save-comment-btn").attr("disabled", false).html('Send');
            });
    }
    //--------------------------------------------

    function filterServices() {
        // $("#save-comment-btn").attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById('filter-service-form'));


        $.ajax({
                url: `{{ route('filterServicesEn') }}`,
                type: "POST",
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
                console.log(data);
                $(`#services-data`).empty();
                $(`#services-data`).append(data);
                // $('.close-comment-modal').click();
                // $('.parenttrue').attr("hidden", false);
                // document.getElementById('comment-content').value = '';

            })
            .fail(function() {
                $('.parent').attr("hidden", false);


            }).always(function() {
                // Re-enable the submit button and hide the loading spinner
                // $("#save-comment-btn").attr("disabled", false).html('إرسال');
            });
    }
    //--------------------------------------------

    function showGeolocation(lat, lng) {
        // iterate over the map's layers
        show_map.eachLayer(function(layer) {
            // check if the layer is a marker
            if (layer instanceof L.Marker) {
                // remove the marker from the map
                show_map.removeLayer(layer);
            }
        });
        var geolocation = [lat, lng];

        var marker_icon = L.icon({
            iconUrl: '{{ asset('img/marker.svg') }}',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
        });

        // add a marker to the map
        var marker_map = L.marker([0, 0], {
            icon: marker_icon
        });

        marker_map.addTo(show_map);
        marker_map.setLatLng(geolocation); // move the marker to the clicked location
    }
</script>
