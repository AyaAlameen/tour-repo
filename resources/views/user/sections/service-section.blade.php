<h4 class="p-5 " style="text-align: right; padding-bottom:5px !important;"> الخدمات الأساسية المقدمة
    في
    {{ $place->translations()->where('locale', 'en')->first()->name }}</h4>
@foreach ($services as $service)
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
                            {{ $service->translations()->where('locale', 'en')->first()->name }}</h4>
                    </div>
                    <p class="text-right pr-2 pl-2">
                        {{ $place->translations()->where('locale', 'en')->first()->description }}</p>
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
    {{ $place->translations()->where('locale', 'en')->first()->name }} </h4>
@foreach ($services as $service)
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
                            {{ $service->translations()->where('locale', 'en')->first()->name }}</h4>
                    </div>
                    <p class="text-right pr-2 pl-2">
                        {{ $place->translations()->where('locale', 'en')->first()->description }}</p>
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