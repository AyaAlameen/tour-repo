@extends('layout-Ar.master')
@section('content')

<div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            
            <div class="row">
                @foreach ($guides as $guide)
                    <div class="col-lg-3 col-md-4 col-sm-6 pb-2">
                        <div class="team-item bg-white mb-4">
                            <div class="team-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="{{ asset(str_replace(app_path(), '', $guide->image)) }}" alt="">
                                <div class="team-social">
                                            <a class="btn btn-outline-primary btn-square" type="button"
                                                title="{{$guide->phone}}"><i class="fa fa-phone"></i></a>
                                            <a class="btn btn-outline-primary btn-square"
                                                href="mailto: {{$guide->email}}"><i class="far fa-envelope"></i></a>
                                        </div>
                            </div>
                            <div class="text-center py-4">
                                <h5 class="text-truncate">{{$guide->translations()->where('locale', 'ar')->first()->name}}</h5>
                                <a class="text-50 mb-2" href="{{route('travelguidesformore-ar', ['id'=> $guide->id])}}">للمزيد</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
    </div>

@endsection