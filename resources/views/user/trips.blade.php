@extends('layout-En.master')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid trip-page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Trips</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Trips</p>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <div class="container mt-5 ">
        <div class="row">
        <!-- بداية الكارد -->
        @foreach ($groups as $group)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="package-item bg-white mb-2">
                    <!-- صور أماكن الرحلة -->
                    <div id="carouselExampleIndicators{{ $group->id }}" class="carousel slide" data-bs-ride="carousel">

                        <div class="carousel-inner">
                            {{-- بداية الصور --}}
                            {{-- بس أول صور بدا كلاس active --}}
                            @foreach ($group->places as $place)
                                @if ($place->images()->count() > 0)
                                    @if ($loop->first)
                                        <div class="carousel-item active">
                                            <img class="img-fluid w-100"
                                                src="{{ asset(str_replace(app_path(), '', $place->images()->first()->image)) }}"
                                                alt="">
                                        </div>
                                    @else
                                        <div class="carousel-item">
                                            <img class="img-fluid w-100"
                                                src="{{ asset(str_replace(app_path(), '', $place->images()->first()->image)) }}"
                                                alt="">
                                        </div>
                                    @endif
                                @else
                                    <div class="carousel-item active">
                                        <img class="img-fluid w-100" src="img/no-group.png" alt="">
                                    </div>
                                @endif
                            @endforeach
                            {{-- نهاية الصور --}}

                        </div>
                        <button class="carousel-control-prev" type="button"
                            data-bs-target="#carouselExampleIndicators{{ $group->id }}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button"
                            data-bs-target="#carouselExampleIndicators{{ $group->id }}" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <!-- نهاية صور أماكن الرحلة -->
                    <div class="p-4">
                        <div class="d-flex justify-content-between mb-3">

                            <small class="m-0"><i
                                class="fa fa-calendar-alt text-primary mr-2"></i>From:&nbsp;{{ $group->start_date }}</small>
                        <small class="m-0"><i
                                class="fa fa-calendar-alt text-primary mr-2"></i>To:&nbsp;{{ $group->end_date }}
                            </small>
                        </div>
                        <br>
                        <a class="h5 text-decoration-none"
                                href="{{ route('tripmore', ['id' => $group->id]) }}">{{ $group->translations()->where('locale', 'en')->first()->name }}</a>
                                <p>{{ $group->translations()->where('locale', 'en')->first()->description }}</p>

                        <div class="border-top mt-4 pt-4">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="m-0">{{ $group->cost }} <small>spy</small></h6>
                                <h6><a class="btn btn-primary" href="{{ route('tripmore', ['id' => $group->id]) }}"
                                        style="border-radius:3px;">More details for booking</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- نهاية الكارد -->

        </div>
    </div>
@endsection
