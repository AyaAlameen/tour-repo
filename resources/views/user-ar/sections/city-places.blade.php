@foreach ($places as $place)
    @if ($loop->last)
{{-- بداسة كارد المكان --}}
<div class="mainCard  w-75 m-auto " style="border-radius: 10px;">
    <div class="d-flex">
        <div class="text-center ">
            @if ($place->images()->count() > 0)
                <img src="{{ asset(str_replace(app_path(), '', $place->images()->first()->image)) }}"
                    style="padding: 10px; box-sizing: content-box; border-radius: 20px;"
                    width="200px" height="200px">
            @endif
            <div>
                <i class="fas fa-star p-2"></i>
                <i class="fas fa-star p-2 "></i>
                <i class="fas fa-star p-2 "></i>
                <i class="fas fa-star p-2"></i>
            </div>

        </div>
        <div style="justify-content: space-between; width: 100%;">
            <div class="d-flex" style="justify-content: space-between; width: 100%;">
                <h4 class="text-right p-2">
                    {{ $place->translations()->where('locale', 'ar')->first()->name }}</h4>
                <div class="d-flex" style=" align-items: baseline;">
                    <h5 class="p-2 pl-4">8.2</h5>
                    @isset(Auth::user()->id)
                        <i class=" @if (!(\App\Models\Favorite::where('user_id', Auth::user()->id)->where('place_id', $place->id)->first())) far fa-heart @else fas fa-heart @endif pl-4"
                            onclick="switch_heart({{$place->id}})" style="font-size: 22px;"></i>
                    @else
                        <div class="w-75 pr-3 m-auto d-flex align-items-center">
                            <i class="far fa-heart pl-4" onclick="loginBefore()"
                                style="font-size: 22px;"></i>

                        </div>
                    @endisset

                </div>
            </div>
            <h5 class="text-right pr-2">
                {{ $place->district->translations()->where('locale', 'ar')->first()->name }}</h5>
            <p class="text-right pr-2 text-primary"><a
                    href="mailto: {{ $place->email }}">{{ $place->email }}</a></p>
            <p class="text-right pr-2">
                {{ $place->translations()->where('locale', 'ar')->first()->description }}</p>
        </div>
    </div>


</div>
<button class="m-2 btn btn-primary"
    style="width: 70%; margin-left: 15% !important ; margin-bottom: 35px !important;"><a
        style="color: #fff; width: 100%; display: inline-block;"
        href="{{ route('place_details_ar', ['id' => $place->id]) }}">
        المزيد من التفاصيل حول اسم المكان للحجز</a>
</button>

{{-- نهاية كارد المكان --}}
    @else
        {{-- بداسة كارد المكان --}}
        <div class="mainCard  w-75 m-auto " style="border-radius: 10px;">
            <div class="d-flex">
                <div class="text-center ">
                    @if ($place->images()->count() > 0)
                        <img src="{{ asset(str_replace(app_path(), '', $place->images()->first()->image)) }}"
                            style="padding: 10px; box-sizing: content-box; border-radius: 20px;"
                            width="200px" height="200px">
                    @endif
                    <div>
                        <i class="fas fa-star p-2"></i>
                        <i class="fas fa-star p-2 "></i>
                        <i class="fas fa-star p-2 "></i>
                        <i class="fas fa-star p-2"></i>
                    </div>

                </div>
                <div style="justify-content: space-between; width: 100%;">
                    <div class="d-flex" style="justify-content: space-between; width: 100%;">
                        <h4 class="text-right p-2">
                            {{ $place->translations()->where('locale', 'ar')->first()->name }}</h4>
                        <div class="d-flex" style=" align-items: baseline;">
                            <h5 class="p-2 pl-4">8.2</h5>
                            @isset(Auth::user()->id)
                                <i class=" @if (!(\App\Models\Favorite::where('user_id', Auth::user()->id)->where('place_id', $place->id)->first())) far fa-heart @else fas fa-heart @endif pl-4"
                                    onclick="switch_heart({{$place->id}})" style="font-size: 22px;"></i>
                            @else
                                <div class="w-75 pr-3 m-auto d-flex align-items-center">
                                    <i class="far fa-heart pl-4" onclick="loginBefore()"
                                        style="font-size: 22px;"></i>

                                </div>
                            @endisset

                        </div>
                    </div>
                    <h5 class="text-right pr-2">
                        {{ $place->district->translations()->where('locale', 'ar')->first()->name }}</h5>
                    <p class="text-right pr-2 text-primary"><a
                            href="mailto: {{ $place->email }}">{{ $place->email }}</a></p>
                    <p class="text-right pr-2">
                        {{ $place->translations()->where('locale', 'ar')->first()->description }}</p>
                </div>
            </div>


        </div>
        <button class="m-2 btn btn-primary"
            style="width: 70%; margin-left: 15% !important ; margin-bottom: 35px !important;"><a
                style="color: #fff; width: 100%; display: inline-block;"
                href="{{ route('place_details_ar', ['id' => $place->id]) }}">
                المزيد من التفاصيل حول اسم المكان للحجز</a>
        </button>

        {{-- نهاية كارد المكان --}}
    @endif
@endforeach
