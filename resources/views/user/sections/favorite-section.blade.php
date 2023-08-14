@if ($favorites->count() > 0)
    @foreach ($favorites as $fav)
        <div class="d-flex" style="flex-direction: column; align-items: center; ">
            <img src="{{ asset(str_replace(app_path(),'',$fav->place->images()->first() -> image))}}" style="padding: 10px; box-sizing: content-box; border-radius: 20px;"
                width="200px" height="200px">
            <a href="{{ route('place_details_en', ['id' => $fav->place->id]) }}"><h4>{{ $fav->place->translations()->where('locale', 'en')->first()->name }}</h4></a>
        </div>

    @endforeach
@else
    {{-- اذا ما اختار اماكن مفضلة لسا --}}
    <img src="img/folder.png" width="130px" height="130px"
    style="margin-left:125px; margin-top:160px; opacity: 0.5;" />
    <p class="text-body px-3 text-center mt-4">Choose your favorite places</p>
    {{-- اذا اختار أماكن مفضلة  --}}
@endif




