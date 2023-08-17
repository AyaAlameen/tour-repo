@extends('layout-Ar.master')
@section('content')
    <form id="filter-form" action="" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="city_id" value="{{ $city->id }}" hidden>
    </form>
    <h2 class="p-5" style="text-align: right; padding-right:170px !important;"> استكشف {{ $city->translations()->where('locale', 'ar')->first()->name }}
    </h2>
    <div style="width: 400px; height: 300px; margin: auto; text-align: center;">
        <img src="{{ asset(str_replace(app_path(), '', $city->image)) }}" alt="image" style="width: 100%; height: 100%;">
    </div>
    {{-- وصف المحافظة --}}
    <div class="container w-50 m-auto">
        <h4 class="pt-5 pb-3" style="text-align: right;">نبذة عن
            {{ $city->translations()->where('locale', 'ar')->first()->name }} </h4>
        <p style="text-align: right;">{{ $city->translations()->where('locale', 'ar')->first()->description }}</p>
    </div>
    {{-- نهاية الوصف --}}
    {{-- أشهر الأماكن بالتصنيفات --}}
    <div class="container">
        <h4 class="p-5" style="text-align: right; padding-bottom:5px !important;  ">اشهر الأماكن في
           {{ $city->translations()->where('locale', 'ar')->first()->name }}
        </h4>
        {{-- الأصناف --}}
        @foreach ($Category_places as $category)
            <h4 class="p-5" style="text-align: right; padding-right:70px !important;"> 
                {{ $category[0]->subCategory()->first()->category()->first()->translations()->where('locale', 'ar')->first()->name }}
            </h4>

            <div class="container">

                <div class="container d-flex justify-content-center m-3">
                    <button class="m-2 btn btn-primary"
                        onclick="filterPlaces('all', {{ $category[0]->subCategory()->first()->category()->first()->id }})">الكل</button>
                    @foreach ($category[0]->subCategory()->first()->category()->first()->subCategories as $subCategory)
                        <button class="m-2 btn btn-primary"
                            onclick="filterPlaces({{ $subCategory->id }}, {{ $category[0]->subCategory()->first()->category()->first()->id }})">{{ $subCategory->translations()->where('locale', 'ar')->first()->name }}</button>
                    @endforeach

                </div>
                <div id="places-category-{{ $category[0]->subCategory()->first()->category()->first()->id }}">
                    @foreach ($category as $place)
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
                                        <?php $random_stars =  rand(1, 5); ?>
                                        @for ($i = 0; $i < $random_stars; $i++)
                                        <i class="fas fa-star p-2"></i>
                                        @endfor
                                        
                                    </div>

                                </div>
                                <div style="justify-content: space-between; width: 100%;">
                                    <div class="d-flex" style="justify-content: space-between; width: 100%;">
                                        <h4 class="text-right p-2">
                                            {{ $place->translations()->where('locale', 'ar')->first()->name }}</h4>
                                        <div class="d-flex mt-3" style=" align-items: baseline;">
                                            
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
                    @endforeach
                </div>

            </div>
        @endforeach


        {{-- نهاية الأصناف --}}
    </div>
    {{-- نهاية أشهر الأماكن --}}
@endsection


<script>
    function switch_heart(place_id) {
        var formData = new FormData();

        console.log(place_id);
        formData.append('place_id', place_id);
        if (event.target.classList.contains('far'))
            event.target.classList.replace('far', 'fas')
        else
        if (event.target.classList.contains('fas'))
            event.target.classList.replace('fas', 'far')
            $.ajax({
                url: `{{ route('favoritePlaceAr') }}`,
                type: "POST",
                data: formData,
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
                // $(`#places-category-${category_id}`).empty();
                // $(`#places-category-${category_id}`).append(data);
            })
            .fail(function() {
                // $('.parent').attr("hidden", false);


            });
    }

    function filterPlaces(sub, category_id) {
        var formData = new FormData(document.getElementById('filter-form'));

        formData.append('sub_category_id', sub);
        formData.append('category_id', category_id);

        $.ajax({
                url: `{{ route('getSubCategoryPlaceAr') }}`,
                type: "POST",
                data: formData,

                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
                $(`#places-category-${category_id}`).empty();
                $(`#places-category-${category_id}`).append(data);
            })
            .fail(function() {
                $('.parent').attr("hidden", false);


            });
    }
</script>
