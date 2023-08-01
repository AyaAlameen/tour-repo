@extends('layout-Ar.master')
@section('content')
<div class="container" style="flex-direction: row;">
  
     


    {{-- بداسة كارد العرض --}}
    <div class="mainCard container w-100 m-auto d-flex" style="border-radius: 10px; margin-top: 50px !important;" >

       

        <div class="d-flex">

            <div class="p-4">
                <div class="d-flex " style="justify-content: space-between;">
                    <h4 class=" p-2 pr-2">معلومات الفعالية</h4>
                </div>
                <p class="pr-2 pr-2 text-body text-end" style="text-align: justify;">الوصف: ييسي سبيسيب سيبسيبس يبسيب سبسب سيبسب بسبس سسس سسس سسس سسس سسس سسس سس سسس    >الوصف: ييسي سبيسيب سيبسيبس يبسيب سبسب سيبسب بسبس سسس سسس سسس سسس سسس سسس س سسس سس</p>
                <div class="d-flex" style=" align-items: baseline; ">
                    <i class="fa fa-location-dot"></i>
                    <h5 class=" p-2 pr-2">أبو مالك للمأكولات</h5>
                </div>
                {{-- اذا كان العرض على خدمة --}}
                <div class="d-flex" style=" align-items: baseline; ">
                    <i class="fab fa-servicestack"></i>
                    <h5 class=" p-2 pr-2"> اسم الخدمة</h5>
                </div>
                <div class="d-flex" style="align-items: baseline; ">
                    <i class="fa fa-calendar-alt"></i>
                    <h5 class=" p-2 pr-2">من تاريخ :12-4-2023</h5>
                </div>
                <div class="d-flex" style="align-items: baseline; ">
                    <i class="fa fa-calendar-alt"></i>
                    <h5 class=" p-2 pr-2">إلى تاريخ :13-4-2023</h5>
                </div>






                <div class="d-flex h-25 mt-5" style="justify-content: flex-end; align-items: baseline;">
                    <h6 class="d-inline ml-4">الكلفة : 60000</h6>
                    @isset(Auth::user()->id)
                        <button class="btn btn-primary ml-4" data-bs-toggle="modal"
                            data-bs-target="#exampleModal20">حجز</button>
                    @else
                        <button onclick="loginBefore()" class="btn btn-primary ml-4">حجز</button>
                    @endisset
                </div>
            </div>
        </div>


        {{-- نهاية كارد العرض --}}


        <img src="../img/pexels-jonathan-borba-2983101.jpg" alt="image" class="p-5" width="500px" height="500px">


    </div>
    {{-- نهاية  الخدمات --}}
</div>
   
@endsection
