@extends('layout-En.master')
@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" style="height:800px;" src="../img/ALEPPO458976.gif" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Tours & Travel</h4>
                            <h1 class="display-3 text-white mb-md-4">Let's Discover The World Together</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" style="height:800px;" src="../img/ياسمين دمشقي.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Tours & Travel</h4>
                            <h1 class="display-3 text-white mb-md-4">Discover Amazing Places With Us</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->



    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-6" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class=" w-100 h-100" src="../img/ياسمين دمشقي بالطول.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pt-5 pb-lg-5" style="position: relative; left: 70px;">
                    <div class="about-text bg-white p-4 p-lg-5 my-lg-5" style="box-shadow: #64686c33 3px -3px 6px 0.5px;">
                        <h6 class="text-primary text-uppercase">About us</h6>
                        <h1 class="mb-3"> We Provide Best Tour Packages In Your Budget</h1>
                        <p>A website that specializes in helping you book your hotel, tourist tour, car rental, and tourist
                            information about all the places, regions, and tourist and archaeological attractions in Syria.
                        </p>
                        <div class="row mb-4">
                            <div class="col-6">
                                <img class="img-fluid" src="img/36d7d6476b1b16d50bf45f9bcf19bdcc.jpg" alt="">
                            </div>
                            <div class="col-6">
                                <img class="img-fluid" src="img/d90d3ccf930b10d60f4d7cc7e96c342c.jpg" alt="">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Feature Start -->
    <div class="container-fluid pb-5 mt-5">
        <div class="container pb-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3"
                            style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-money-check-alt text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Competitive Offers</h5>
                            <p class="m-0">Magna sit magna dolor duo dolor labore rebum amet elitr est diam sea</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3"
                            style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-award text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Best Services</h5>
                            <p class="m-0">Magna sit magna dolor duo dolor labore rebum amet elitr est diam sea</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3"
                            style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-globe text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Worldwide Coverage</h5>
                            <p class="m-0">Magna sit magna dolor duo dolor labore rebum amet elitr est diam sea</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->


    <!-- Destination Start -->
    <div class="container-fluid py-2" id="Governorates">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Destination</h6>
                <h1>Governorates of Syria</h1>
            </div>
            <div class="row">
                @foreach ($cities as $city)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="destination-item position-relative overflow-hidden mb-2">
                            <img width="400px" height="250px"
                                src="{{ asset(str_replace(app_path(), '', $city->image)) }}" alt="">
                            <a class="destination-overlay text-white text-decoration-none"
                                href="{{ route('user-city-en', ['id' => $city->id]) }}">
                                <h4 class="text-white">{{ $city->translations()->where('locale', 'en')->first()->name }}
                                </h4>

                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Destination end -->


    <!-- nearby Start -->
    <div class="container-fluid bg-nearby py-5" style="margin: 90px 0; height:700px;" id="Nearby">
        <div class="container py-5 d-flex align-items-center">
            <div style="flex-wrap:nowrap; width:750px;">
                <div class="col-lg-7"
                    style="; margin-right:300px; background-color:#ffffff10; backdrop-filter:blur(15px); padding:50px; border-radius:3px;">
                    <div class="mb-4">
                        <h1 class="text-white">See <span class="text-primary"> The Nearest Places </span> For You </h1>
                    </div>
                    <p class="text-white">Enjoy the best experience with us by viewing the locations of the places closest to you and getting
                        The necessary reservations as soon as possible and the fastest way</p>
                    <ul class="d-flex text-white m-0 " style="list-style:none; align-items: center;">
                        <i class="fa fa-check text-primary mr-3 text-success"></i>
                        <li class="py-2">Select the category you want to visit, and then browse the places closest to you on the map</li>

                    </ul>
                    <div class="d-flex justify-content-center" style="flex-direction: row; align-items: baseline;">
                        <input id="hotel" type="radio" name="r">
                        <label for="hotel" style="font-weight: bold; font-size:25px; color: #fff; margin-left: 10px;">
                            Hotels
                        </label>
                    </div>
                    <div class="d-flex justify-content-center" style="flex-direction: row; align-items: baseline;">
                        <input id="res" type="radio" name="r">
                        <label for="res" style="font-weight: bold; font-size:25px; color: #fff; margin-left: 10px;">
                            Restaurants
                        </label>
                    </div>
                    <div class="d-flex justify-content-center" style="flex-direction: row; align-items: baseline;">
                        <input id="arch" type="radio" name="r">
                        <label for="arch" style="font-weight: bold; font-size:25px; color: #fff; margin-left: 10px;">
                            archaeological sites
                        </label>
                    </div>

                </div>

            </div>
            {{-- الخريطة --}}
            <div class="d-flex pt-3 bg-light"
                style="flex-direction: column;  width: 30%; height: 90%;  align-items: center; border-radius: 5px;">
                <img class="m-3" data-bs-toggle="modal" onclick="showNearestPlaces()" data-bs-target="#exampleModal6"  id="map_div"
                    style="cursor:pointer; border-radius:6px;" src="img/zgj3ryuyqrz-w1920.jpg" width="90%"
                    height="220px">
                <h3 style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#exampleModal6">See on the Map</h3>
            </div>
            {{-- map modal --}}
            <div class="modal fade bg-light" id="exampleModal6" data-bs-backdrop="static" tabindex="-1"
                aria-labelledby="exampleModal6Label" aria-hidden="true">
                <div class="modal-dialog h-100" style="margin:0%; max-width:100%; ">
                    <div class="modal-content toggle w-100 h-100">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModal6Label">Nearest Places For You
                            </h5>
                            <button type="button" class="btn-close m-0 close" onclick="hidemap('exampleModal6')"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <div id="add-map" class="w-100 h-100"></div>
                        </div>

                    </div>
                </div>
            </div>
            {{-- end map modal --}}
            {{-- نهاية الخريطة --}}
        </div>
    </div>
    <!-- nearby End -->


    <!-- Service Start -->
    <div class="container-fluid py-2">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Services</h6>
                <h1>Tours & Travel Services</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-route mx-auto mb-4"></i>
                        <h5 class="mb-2">Travel Guide</h5>
                        <p class="m-0">Justo sit justo eos amet tempor amet clita amet ipsum eos elitr. Amet lorem est
                            amet labore</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-ticket-alt mx-auto mb-4"></i>
                        <h5 class="mb-2">Ticket Booking</h5>
                        <p class="m-0">Justo sit justo eos amet tempor amet clita amet ipsum eos elitr. Amet lorem est
                            amet labore</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-hotel mx-auto mb-4"></i>
                        <h5 class="mb-2">Hotel Bookings</h5>
                        <p class="m-0">Justo sit justo eos amet tempor amet clita amet ipsum eos elitr. Amet lorem est
                            amet labore</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fas fa-utensils mx-auto mb-4"></i>
                        <h5 class="mb-2">Restaurant Bookings</h5>
                        <p class="m-0">Justo sit justo eos amet tempor amet clita amet ipsum eos elitr. Amet lorem est
                            amet labore</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-landmark mx-auto mb-4"></i>
                        <h5 class="mb-2">Excursions to archaeological sites </h5>
                        <p class="m-0">Justo sit justo eos amet tempor amet clita amet ipsum eos elitr. Amet lorem est
                            amet labore</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-car mx-auto mb-4"></i>
                        <h5 class="mb-2">Transportation insurance </h5>
                        <p class="m-0">Justo sit justo eos amet tempor amet clita amet ipsum eos elitr. Amet lorem est
                            amet labore</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Service End -->



    <!-- trips Start -->
    <div class="container-fluid py-5" id="Trips">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase">Trips</h6>
                <h1>Best Off Our Trips</h1>
            </div>
            <div class="row">
                @foreach ($groups as $group)
                    <!-- بداية الكارد -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="package-item bg-white mb-2">
                            <!-- صور أماكن الرحلة -->
                            <div id="carouselExampleIndicators{{ $group->id }}" class="carousel slide"
                                data-bs-ride="carousel">

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
                                            class="fa fa-calendar-alt text-primary mr-2"></i>To:&nbsp;{{ $group->end_date }}&nbsp;</small>
                                </div>
                                <br>
                                <a class="h5 text-decoration-none"
                                    href="{{ route('tripmore', ['id' => $group->id]) }}">{{ $group->translations()->where('locale', 'en')->first()->name }}</a>
                                <p>{{ $group->translations()->where('locale', 'en')->first()->description }}</p>

                                <div class="border-top mt-4 pt-4">
                                    <div class="d-flex justify-content-between align-items-baseline">
                                        <h6 class="m-0">{{ $group->cost }} <small>spy</small></h6>
                                        <h6><a class="btn btn-primary"
                                                href="{{ route('tripmore', ['id' => $group->id]) }}"
                                                style="border-radius:3px;">More details for booking</a></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- نهاية الكارد -->
                @endforeach



            </div>
        </div>
    </div>
    </div>
    </div>


    <!-- trips End -->


    <!-- Gallery -->
    <div id="Gallery" class="filterGallery">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-2">
                    <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Gallery</h6>
                    <h1>Photographs from Syria</h1>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="grid">
                        <div class="element-item development">
                            <a class="popup-with-move-anim" href="#project-1">
                                <div class="element-item-overlay"></div><img
                                    src="../img/8bb93ea296a2f66346711d1612113d4a.jpg" alt="alternative">
                            </a>
                        </div>
                        <div class="element-item development">
                            <a class="popup-with-move-anim" href="#project-2">
                                <div class="element-item-overlay"></div><img
                                    src="../img/a072ebd1e062a7b0e9dc1e1d92f768f1.jpg" alt="alternative">
                            </a>
                        </div>
                        <div class="element-item design development marketing">
                            <a class="popup-with-move-anim" href="#project-3">
                                <div class="element-item-overlay"></div><img
                                    src="../img/1acbfbbed180ec5ee32543bbf5867530.jpg" alt="alternative">
                            </a>
                        </div>
                        <div class="element-item design development marketing">
                            <a class="popup-with-move-anim" href="#project-4">
                                <div class="element-item-overlay"></div><img
                                    src="../img/35d697ca091f4aba90c840adbb6f805f.jpg" alt="alternative">
                            </a>
                        </div>
                        <div class="element-item design development marketing seo">
                            <a class="popup-with-move-anim" href="#project-5">
                                <div class="element-item-overlay"></div><img
                                    src="../img/26164e5a82973fc301a83b20a95b7676.jpg" alt="alternative">
                            </a>
                        </div>
                        <div class="element-item design marketing seo">
                            <a class="popup-with-move-anim" href="#project-6">
                                <div class="element-item-overlay"></div><img
                                    src="../img/dfd68a72e216b1044c59840f0514b1ae.jpg" alt="alternative">
                            </a>
                        </div>
                        <div class="element-item design marketing">
                            <a class="popup-with-move-anim" href="#project-7">
                                <div class="element-item-overlay"></div><img
                                    src="../img/ada0abf73e807404f7ea9275831d5f93.jpg" alt="alternative">
                            </a>
                        </div>
                        <div class="element-item design marketing">
                            <a class="popup-with-move-anim" href="#project-8">
                                <div class="element-item-overlay"></div><img
                                    src="../img/1f629b3f65809e87b4de552e1a11e9df.jpg" alt="alternative">
                            </a>
                        </div>
                        <div class="element-item design marketing">
                            <a class="popup-with-move-anim" href="#project-8">
                                <div class="element-item-overlay"></div><img
                                    src="../img/ae3b92ed9bb301d4f55026dd35fd8bcc.jpg" alt="alternative">
                            </a>
                        </div>
                        <div class="element-item design marketing">
                            <a class="popup-with-move-anim" href="#project-8">
                                <div class="element-item-overlay"></div><img
                                    src="../img/65db68b9ce1dc3cac3fb4de2b272d74a.jpg" alt="alternative">
                            </a>
                        </div>
                        <div class="element-item design marketing">
                            <a class="popup-with-move-anim" href="#project-8">
                                <div class="element-item-overlay"></div><img
                                    src="../img/78e7ece2eb10a34ce9f21541978dd3cb.jpg" alt="alternative">
                            </a>
                        </div>
                        <div class="element-item design marketing">
                            <a class="popup-with-move-anim" href="#project-8">
                                <div class="element-item-overlay"></div><img
                                    src="../img/2d342eea70239214700de5be3440efea.jpg" alt="alternative">
                            </a>
                        </div>
                    </div> <!-- end of grid -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->

        <!-- end of Gallery -->





        <!-- Registration Start -->
        <div class="container-fluid bg-registration py-5" style="margin: 90px 0; height:700px;">
            <div class="container py-5">
                <div class="row align-items-center" style="flex-wrap:nowrap; ">
                    <div class="col-lg-5"
                        style="margin-bottom:170px;background-color:#ffffff10; backdrop-filter:blur(15px); padding:50px; border-radius:3px;">
                        <div class="mb-4">
                            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">our Offer</h6>
                            <h1 class="text-white"><span class="text-primary">30% OFF</span> For Honeymoon</h1>
                        </div>
                        <p class="text-white">Invidunt lorem justo sanctus clita. Erat lorem labore ea, justo dolor lorem
                            ipsum ut sed eos,
                            ipsum et dolor kasd sit ea justo. Erat justo sed sed diam. Ea et erat ut sed diam sea ipsum est
                            dolor</p>
                        <ul class="list-inline text-white m-0">
                            <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Labore eos amet dolor amet
                                diam</li>
                            <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Etsea et sit dolor amet ipsum
                            </li>
                            <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Diam dolor diam elitripsum
                                vero.</li>
                        </ul>
                    </div>
                    @if (!Auth::check())
                        <div class="d-md-flex half  col-lg-7">

                            <div class="contents" style="background-color:#0d6dfd00; margin-left: 100px;">
                                <div class="align-items-center justify-content-center">
                                    <div class="form-block mx-auto">

                                        <div style="background-color:var(--bambi); width:100%;  height:50px;"
                                            class="text-center mb-4">
                                            <h3 style="color:#fff;" class="pt-2"> Signup Now !</h3>
                                        </div>

                                        <div class="col-md-12">
                                            <form method="POST" action="{{ route('register') }}">
                                                @csrf

                                                <div class="form-group d-flex first align-items-center">
                                                    <label for="name"
                                                        class="col-md-4 text-center col-form-label text-md-end">{{ __('Name') }}</label>


                                                    <input id="name" placeholder="eg.Aya Alameen" type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        name="name" value="{{ old('name') }}" required
                                                        autocomplete="name">

                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>

                                                <div class="form-group d-flex align-items-center">
                                                    <label for="email"
                                                        class="col-md-4 text-center col-form-label text-md-end">{{ __('Email') }}</label>


                                                    <input id="email" placeholder="your-email@gmail.com"
                                                        type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" required
                                                        autocomplete="email">

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>

                                                <div class="form-group d-flex align-items-center">
                                                    <label for="password"
                                                        class="col-md-4 text-center col-form-label text-md-end">{{ __('Password') }}</label>


                                                    <input id="password" placeholder="Your Password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" required autocomplete="new-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>

                                                <div class="form-group last d-flex align-items-center">
                                                    <label for="password-confirm"
                                                        class="col-md-4 text-center col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                                    <input id="password-confirm" type="password" class="form-control"
                                                        name="password_confirmation" required autocomplete="new-password">

                                                </div>

                                                <div class="row mb-0 mt-3 justify-content-center">
                                                    <div class="col-md-6 offset-md-4">
                                                        <button type="submit" class="btn btn-block btn-primary">
                                                            {{ __('Signup') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- Registration End -->


        <!-- Team Start -->
        <div class="container-fluid py-5" id="Guids">
            <div class="container pt-5 pb-3">
                <div class="text-center mb-3 pb-3">
                    <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Guides</h6>
                    <h1>Our Travel Guides</h1>
                </div>
                <div class="row">

                    @foreach ($guides as $guide)
                        <div class="col-lg-3 col-md-4 col-sm-6 pb-2">
                            <div class="team-item bg-white mb-4">
                                <div class="team-img position-relative overflow-hidden">
                                    <img class="img-fluid w-100"
                                        src="{{ asset(str_replace(app_path(), '', $guide->image)) }}" alt="">
                                    <div class="team-social">
                                        <a class="btn btn-outline-primary btn-square" type="button"
                                            title="{{ $guide->phone }}"><i class="fa fa-phone"></i></a>
                                        <a class="btn btn-outline-primary btn-square"
                                            href="mailto: {{ $guide->email }}"><i class="far fa-envelope"></i></a>
                                    </div>
                                </div>
                                <div class="text-center py-4">
                                    <h5 class="text-truncate">
                                        {{ $guide->translations()->where('locale', 'en')->first()->name }}</h5>
                                    {{-- <p class="m-0">Designation</p> --}}
                                    <a class="text-50 mb-2"
                                        href="{{ route('travelguidesformore', ['id' => $guide->id]) }}">For More</a>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Team End -->


        <!-- offers Start -->
        <div class="container-fluid py-5" id="Offers">
            <div class="container py-5">
                <div class="text-center mb-3 pb-3">
                    <h6 class="text-primary text-uppercase">offers</h6>
                    <h1>Best of our offers</h1>
                </div>
                <div class="owl-carousel testimonial-carousel">
                    @foreach ($offers as $offer)
                        <!-- بداية الكارد -->
                        <div class="text-center pb-4 mb-3">
                            <img class="img-fluid m-auto" src="img/gift.png" style="width: 100px; height: 100px;">
                            <div class="testimonial-text bg-white p-4 mt-n5" style="height: 400px;">
                                <h5 class="text-truncate mt-5">
                                    {{ $offer->place->translations()->where('locale', 'en')->first()->name }}</h5>
                                <h5 class="text-truncate">
                                    {{ $offer->translations()->where('locale', 'en')->first()->name }}</h5>
                                <p class="mt-2 h-50">
                                    {{ $offer->translations()->where('locale', 'en')->first()->description }}
                                </p>

                                <div class="d-flex h-25"
                                    style="flex-direction:row; justify-content:space-around; align-items: baseline;">
                                    <span>cost : {{ $offer->cost }} S.P</span>
                                    <h6><a class="btn btn-primary"
                                            href="{{ route('offer_details-en', ['id' => $offer->id]) }}"
                                            style="border-radius:3px;">Book Now </a></h6>
                                </div>
                            </div>
                        </div>
                        <!-- نهاية الكارد -->
                    @endforeach






                </div>
            </div>
        </div>
        <!-- offers End -->



        <!-- events Start -->
        <div class="container-fluid py-5" id="Events">
            <div class="container pt-5 pb-3">
                <div class="text-center mb-3 pb-3">
                    <h6 class="text-primary text-uppercase">events</h6>
                    <h1>Best of our events</h1>
                </div>
                <div class="row pb-3">
                    @foreach ($events as $event)
                        {{-- بداية الكارد --}}
                        <div class="col-lg-4 col-md-6 mb-4 pb-2" style="height: 300px">
                            <div class="blog-item h-100">
                                <div class="position-relative h-100">
                                    @if ($event->service_id)
                                        <img class="img-fluid w-100 h-100"
                                            src="{{ asset(str_replace(app_path(), '', $event->service->image)) }}"
                                            alt="">
                                    @elseif($event->place->images()->count() > 0)
                                        <img class="img-fluid w-100 h-100"
                                            src="{{ asset(str_replace(app_path(), '', $event->place->images()->first()->image)) }}"
                                            alt="">
                                    @else
                                        <img class="img-fluid w-100 h-100" src="img/event.png" alt="">
                                    @endif
                                    <div class="blog-date" style="width: 87px;">
                                        <h6 class="font-weight-bold mb-n1">{{ date('y', strtotime($event->start_date)) }} / {{ date('m', strtotime($event->start_date)) }} 
                                            / <i class="text-white text-uppercase">{{ date('d', strtotime($event->start_date)) }}</i></b>
                                    </div>
                                </div>
                                <div class="bg-white p-4 h-25">
                                    <div class="d-flex mb-2">
                                        <a class="text-primary text-uppercase text-decoration-none" href="">{{ $event->place->translations()->where('locale', 'en')->first()->name }}</a>
                                        <span class="text-primary px-2">|</span>
                                        <a class="text-primary text-uppercase text-decoration-none"
                                            href="">{{ $event->translations()->where('locale', 'en')->first()->name }}</a>
                                    </div>
                                    <h6 class="d-flex justify-content-end"><a class="btn btn-primary"
                                            href="{{ route('event_details-en', ['id' => $event->id]) }}" style="border-radius:3px;">More
                                            details
                                            for
                                            Booking</a></h6>

                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- نهاية الكارد --}}
                </div>
            </div>
        </div>
        <!-- events End -->
    @endsection
