@extends('layout-Ar.master')
@section('content')
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">

            <div class="row">
                @foreach ($companies as $company)
                    <div class="col-lg-3 col-md-4 col-sm-6 pb-2 w-25">
                        <div class="team-item bg-white mb-4" style="height: 400px;">
                            <div class="team-img position-relative overflow-hidden" style="flex-direction:column;">
                                <img class="img-fluid p-5" style="width: 150px; height: 150px; box-sizing:content-box;"
                                    src="{{ asset(str_replace(app_path(), '', $company->image)) }}" alt="">

                            </div>
                            <div class="text-center py-4" style="margin-top: -20px;">
                                <h5 class="text-truncate">{{$company->translations()->where('locale', 'ar')->first()->name}}</h5>
                                <h6 class="text-truncate">{{$company->email}} : الايميل</h6>
                                <h6 class="text-truncate"> {{$company->phone}} : الهاتف </h6>
                            </div>
                        </div>
                    </div>
                @endforeach
                

            </div>
        </div>
    </div>


    <div class="car move">
        <img src="img/car.png" style="width: 200px; height: 200px; padding-bottom: 150px; box-sizing: content-box;">
    </div>
@endsection
