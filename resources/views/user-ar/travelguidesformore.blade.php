@extends('layout-Ar.master')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="container pt-5 pb-3 ">
            <div class=" m-auto" style="width:800px ; box-shadow: 0 0 30px #CCCCCC;">
                <div class="position-relative p-3 d-flex justify-content-center">
                    <img src="{{ asset(str_replace(app_path(), '', $guide->image)) }}" alt="" style="width:500px;">
                </div>
                <div  >
                    <div class="mb-2 p-3" >
                        <h5 style="color: var(--navi); margin-bottom: 1rem; text-align: center;" >{{$guide->translations()->where('locale', 'ar')->first()->name}}</h5>
                        <h6 style="color: var(--navi); margin-bottom: 1rem; text-align: center;" class="text-body"><i class="fas fa-phone"></i> : {{$guide->phone}}</h6>
                        <h6 style="color: var(--navi); margin-bottom: 1rem; text-align: center;" class="text-body" ><i class="fas fa-envelope"></i> : {{$guide->email}}</h6>
                        <div class="pr-5 pl-5 text-end">
                            <p style="color: var(--navi);">  حول : {{$guide->translations()->where('locale', 'ar')->first()->description}}</p>
                            <p style="color: var(--navi);">الشهادات : {{$guide->translations()->where('locale', 'ar')->first()->certificates}} </p>
                        </div>
                       
                    </div>

                </div>
            </div>

        </div>
    </div>


@endsection