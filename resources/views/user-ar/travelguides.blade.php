@extends('layout-Ar.master')
@section('content')

<div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 pb-2">
                    <div class="team-item bg-white mb-4">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/testimonial-1.jpg" alt="">
                            <div class="team-social">
                                        <a class="btn btn-outline-primary btn-square" type="button"
                                            title=""><i class="fa fa-phone"></i></a>
                                        <a class="btn btn-outline-primary btn-square"
                                            href="mailto: "><i class="far fa-envelope"></i></a>
                                    </div>
                        </div>
                        <div class="text-center py-4">
                            <h5 class="text-truncate">اياد</h5>
                            <a class="text-50 mb-2" href="{{route('travelguidesformore-ar')}}">للمزيد</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-2">
                    <div class="team-item bg-white mb-4">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/team-2.jpg" alt="">
                            <div class="team-social">
                                        <a class="btn btn-outline-primary btn-square" type="button"
                                            title=""><i class="fa fa-phone"></i></a>
                                        <a class="btn btn-outline-primary btn-square"
                                            href="mailto: "><i class="far fa-envelope"></i></a>
                                    </div>
                        </div>
                        <div class="text-center py-4">
                            <h5 class="text-truncate">مجد</h5>
                            <a class="text-50 mb-2" href="{{route('travelguidesformore-ar')}}">للمزيد</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-2">
                    <div class="team-item bg-white mb-4">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/testimonial-3.jpg" alt="">
                            <div class="team-social">
                                        <a class="btn btn-outline-primary btn-square" type="button"
                                            title=""><i class="fa fa-phone"></i></a>
                                        <a class="btn btn-outline-primary btn-square"
                                            href="mailto:"><i class="far fa-envelope"></i></a>
                                    </div>
                        </div>
                        <div class="text-center py-4">
                            <h5 class="text-truncate">مهند</h5>
                            <a class="text-50 mb-2" href="{{route('travelguidesformore-ar')}}">للمزيد</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-2">
                    <div class="team-item bg-white mb-4">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/team-4.jpg" alt="">
                            <div class="team-social">
                                        <a class="btn btn-outline-primary btn-square" type="button"
                                            title=""><i class="fa fa-phone"></i></a>
                                        <a class="btn btn-outline-primary btn-square"
                                            href="mailto: "><i class="far fa-envelope"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h5 class="text-truncate">حسام</h5>
                            <a class="text-50 mb-2" href="{{route('travelguidesformore-ar')}}">للمزيد</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection