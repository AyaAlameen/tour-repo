@extends('layout-Ar.master')
@section('content')
    <h2 class="p-5" style="text-align: right;"> ^_^ استكشف (اسم المحافظة) </h2>
    {{-- Gallery --}}
    <div class="d-flex container mt-2 justify-content-center">
        <div style="width: 45%; height: 540px;">
            <img src="img/440px-Aleppo_Citadel_02_-_Bastion.jpg" width="100%" height="100%">
            <button
                style="position: relative; left:75%; bottom:35px; border-radius:20px; font-size:14px; border-color:var(--app-bg);">عرض
                جميع الصور</button>
        </div>
        <div style="width: 35%; height: 540px;">
            <img src="img/caption.jpg" width="100%" height="60%">
            <img src="img/ALEPPO458976.gif" width="100%" height="40%">
        </div>
    </div>
    {{-- end Gallery --}}
    {{-- وصف المحافظة --}}
    <div class="container w-50 m-auto">
        <h4 class="pt-5 pb-3" style="text-align: right;">نبذة عن (اسم المحافظة ^_^ ) </h4>
        <p style="text-align: right;">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Ea sed voluptas fuga modi. Voluptatem distinctio debitis tenetur quos unde nostrum,
            omnis, expedita, maxime maiores ipsam exercitationem itaque! Atque, voluptates iste!</p>
    </div>
    {{-- نهاية الوصف --}}
    {{-- أشهر الأماكن بالتصنيفات --}}
    <div class="container">
        <h4 class="p-5" style="text-align: right; padding-bottom:5px !important;">اشهر الأماكن في (اسم المحافظة ^_^ )
        </h4>
        {{-- الأصناف --}}
        <div class="container">
            <h4 class="p-5" style="text-align: right;"> أماكن (اسم الصنف ^_^ ) </h4>
            <div class="container d-flex justify-content-center m-3">
                <button class="m-2 btn btn-primary">صنف فرعي 1</button>
                <button class="m-2 btn btn-primary">صنف فرعي 6</button>
                <button class="m-2 btn btn-primary">صنف فرعي 5</button>
                <button class="m-2 btn btn-primary">صنف فرعي 4</button>
                <button class="m-2 btn btn-primary">صنف فرعي 3</button>
                <button class="m-2 btn btn-primary">صنف فرعي 2</button>
            </div>
            {{-- بداسة كارد المكان --}}
            <div class="mainCard w-75 m-auto ">

                <div style="direction: rtl; border-radius: 10px;">
                    <img src="img/aleppo-palace-hotel.jpg"
                        style="padding: 10px; box-sizing: content-box; border-radius: 20px;" width="200px" height="200px">
                    <h4 class="d-inline" style="padding: 10px;">فندق قصر حلب</h4>
                <h5 class="d-inline">ناحية الشهباء</h5>

                </div>


            </div>
            {{-- نهاية كارد المكان --}}
        </div>
        {{-- نهاية الأصناف --}}
    </div>
    {{-- نهاية أشهر الأماكن --}}
@endsection
