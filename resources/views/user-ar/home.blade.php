@extends('layout-Ar.master')
@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" style="height:800px;" src="../img/ALEPPO458976.gif" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">رحلات & سفر</h4>
                            <h1 class="display-3 text-white mb-md-4">لنكتشف العالم معا</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">احجز الآن</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" style="height:800px;" src="img/ياسمين دمشقي.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">رحلات & سفر</h4>
                            <h1 class="display-3 text-white mb-md-4">اكتشف أماكن رائعة معنا</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">احجز الأن</a>
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
    <div class="container-fluid py-5 ">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-6" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class=" w-100 h-100" src="../img/caption (4).jpg" alt="dfgfd" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pt-5 pb-lg-5" style="direction:rtl;">
                    <div style="box-shadow:#64686c33  3px -3px 6px 0.5px;" class="about-text bg-white p-4 p-lg-5 my-lg-5">
                        <h6 class="text-primary text-uppercase">حولنا</h6>
                        <h1 class="mb-3">نعمل على تأمين أفضل الرحلات السياحية بما يتناسب مع ميزانيتك</h1>
                        <p>Dolores lorem lorem ipsum sit et ipsum. Sadip sea amet diam dolore sed et. Sit rebum labore sit
                            sit ut vero no sit. Et elitr stet dolor sed sit et sed ipsum et kasd ut. Erat duo eos et erat
                            sed diam duo</p>
                        <div class="row mb-4">
                            <div class="col-6">
                                <img class="img-fluid" src="img/dam.jpg" alt="">
                            </div>
                            <div class="col-6">
                                <img class="img-fluid" src="img/latakia.jpg" alt="">
                            </div>
                        </div>
                        <div class="d-flex justify-content-start"><a href="" class="btn btn-primary mt-1">احجز
                                الآن</a></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Feature Start -->
    <div class="container-fluid pb-5 pt-5">
        <div class="container pb-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3"
                            style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-money-check-alt text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">عروض منافسة</h5>
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
                            <h5 class="">أفضل الخدمات</h5>
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
                            <h5 class="">تغطية شاملة</h5>
                            <p class="m-0">Magna sit magna dolor duo dolor labore rebum amet elitr est diam sea</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->


    <!-- Destination Start -->
    <div class="container-fluid py-5" id="Governorates">>
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase">الوجهة</h6>
                <h1>المحافظات السورية</h1>
            </div>
            <div class="row">
                @foreach ($cities as $city)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="destination-item position-relative overflow-hidden mb-2">
                            <img width="400px" height="250px"
                                src="{{ asset(str_replace(app_path(), '', $city->image)) }}" alt="">
                            <a class="destination-overlay text-white text-decoration-none" href="{{route('user-city-ar')}}">
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
                    style="; margin-left:300px; background-color:#ffffff10; backdrop-filter:blur(15px); padding:50px; border-radius:3px;">
                    <div class="mb-4">
                        <h1 class="text-white">شاهد <span class="text-primary"> المواقع الأقرب </span> إليك </h1>
                    </div>
                    <p class="text-white">تمتع بأفضل تجربة معنا عن طريق مشاهدة مواقع الأماكن الأقرب إليك و الحصول على
                        الحجوزات اللازمة بأقرب وقت وأسرع طريقة</p>
                        <ul class="d-flex text-white m-0 " style="list-style:none; align-items: center;">
                            <i class="fa fa-check text-primary mr-3 text-success"></i>
                            <li class="py-2">  قم بتحديد الصنف الذي ترغب بزيارته و من ثم استعرض الأماكن الأقرب إليك على الخريطة </li>
                           
                        </ul>
                    <div class="d-flex justify-content-center" style="flex-direction: row; align-items: baseline;">
                        <label for="hotel" style="font-weight: bold; font-size:25px; color: #fff; margin-right: 10px;">
                            فنادق
                        </label>
                        <input id="hotel" type="radio" name="r">
                    </div>
                    <div class="d-flex justify-content-center" style="flex-direction: row; align-items: baseline;">
                        <label for="res" style="font-weight: bold; font-size:25px; color: #fff; margin-right: 10px;">
                            مطاعم
                        </label>
                        <input id="res" type="radio" name="r">
                    </div>
                    <div class="d-flex justify-content-center" style="flex-direction: row; align-items: baseline;">
                        <label for="arch" style="font-weight: bold; font-size:25px; color: #fff; margin-right: 10px;">
                            أماكن أثرية
                        </label>
                        <input id="arch" type="radio" name="r">
                    </div>

                </div>

            </div>
            {{-- الخريطة --}}
            <div class="d-flex pt-3 bg-light" style="flex-direction: column; width: 30%; height: 90%;  backdrop-filter:blur(15px);  align-items: center; border-radius: 5px;">
                <img class="m-3" style="cursor:pointer; border-radius:6px;" src="img/sy.jpg" width="90%" height="220px">
            <h2>شاهد على الخريطة</h2>
            </div>
            {{-- نهاية الخريطة --}}
        </div>
    </div>
    <!-- nearby End -->

    <!-- Service Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase">الخدمات</h6>
                <h1>خدمات الرحلات و السفر </h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-route mx-auto mb-4"></i>
                        <h5 class="mb-2">دليل سياحي</h5>
                        <p class="m-0">Justo sit justo eos amet tempor amet clita amet ipsum eos elitr. Amet lorem est
                            amet labore</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-ticket-alt mx-auto mb-4"></i>
                        <h5 class="mb-2">بطاقات حجز</h5>
                        <p class="m-0">Justo sit justo eos amet tempor amet clita amet ipsum eos elitr. Amet lorem est
                            amet labore</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-hotel mx-auto mb-4"></i>
                        <h5 class="mb-2">حجوزات فنادق</h5>
                        <p class="m-0">Justo sit justo eos amet tempor amet clita amet ipsum eos elitr. Amet lorem est
                            amet labore</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fas fa-utensils mx-auto mb-4"></i>
                        <h5 class="mb-2">حجوزات مطاعم</h5>
                        <p class="m-0">Justo sit justo eos amet tempor amet clita amet ipsum eos elitr. Amet lorem est
                            amet labore</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-landmark mx-auto mb-4"></i>
                        <h5 class="mb-2">رحلات لأماكن أثرية </h5>
                        <p class="m-0">Justo sit justo eos amet tempor amet clita amet ipsum eos elitr. Amet lorem est
                            amet labore</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-car mx-auto mb-4"></i>
                        <h5 class="mb-2">تأمين المواصلات</h5>
                        <p class="m-0">Justo sit justo eos amet tempor amet clita amet ipsum eos elitr. Amet lorem est
                            amet labore</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Packages Start -->
    <div class="container-fluid py-5" id="Trips">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase">رحلات</h6>
                <h1>أفضل الرحلات السياحية</h1>
            </div>
            <div class="row">
                @foreach ($groups as $group)
                    <!-- بداية الكارد -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="package-item bg-white mb-2">
                            <!-- صور أماكن الرحلة -->
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="0" class="active" aria-current="true"
                                        aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="img-fluid w-100" src="img/36d7d6476b1b16d50bf45f9bcf19bdcc.jpg"
                                            alt="">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="img-fluid w-100" src="img/36d7d6476b1b16d50bf45f9bcf19bdcc.jpg"
                                            alt="">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="img-fluid w-100" src="img/36d7d6476b1b16d50bf45f9bcf19bdcc.jpg"
                                            alt="">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <!-- نهاية صور أماكن الرحلة -->
                            <div class="p-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <small class="m-0"><i
                                            class="fa fa-map-marker-alt text-primary mr-2"></i>دمشق</small>
                                    <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>3
                                        أيام</small>
                                </div>
                                <br>
                                <a class="h5 text-decoration-none" href="">الوصف</a>
                                <div class="border-top mt-4 pt-4">
                                    <div class="d-flex justify-content-between align-items-baseline">
                                        <h5 class="m-0" style="direction:rtl;">500.000 <small>ل.س</small></h5>
                                        <h6><button class="btn btn-primary" style="border-radius:3px;">
                                                المزيد من التفاصيل للحجز</button></h6>
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
    <div class="text-center">
        <a href="{{ route('trip-ar') }}" style="font-size: 25px; color:var(--bambi);"><img src="img/menu.png"
                width="20px" height="20px"> عرض المزيد <img src="img/menu.png" width="20px" height="20px"></a>
    </div>

    <!-- Packages End -->
    <!-- Gallery -->
    <div id="Gallery" class="filterGallery">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-2">
                    <h6 class="text-primary text-uppercase">المعرض</h6>
                    <h1>صور من سوريا</h1>
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
                <div class="row align-items-center" style="flex-wrap:nowrap; width:700px;">
                    <div class="col-lg-7"
                        style="margin-bottom:170px; margin-left:300px; background-color:#ffffff10; backdrop-filter:blur(15px); padding:50px; border-radius:3px;">
                        <div class="mb-4">
                            <h6 class="text-primary text-uppercase">عروض المسافر</h6>
                            <h1 class="text-white"><span class="text-primary">30% حسم</span> من أجل شهر العسل</h1>
                        </div>
                        <p class="text-white">Invidunt lorem justo sanctus clita. Erat lorem labore ea, justo dolor lorem
                            ipsum ut sed eos,
                            ipsum et dolor kasd sit ea justo. Erat justo sed sed diam. Ea et erat ut sed diam sea ipsum est
                            dolor</p>
                        <ul class="list-inline text-white m-0">
                            <li class="py-2">افضل الخصومات والحسومات لكافة المناسبات <i
                                    class="fa fa-check text-primary mr-3"></i></li>
                            <li class="py-2">شاركنا مناسبتك واترك لنا الإدارة <i
                                    class="fa fa-check text-primary mr-3"></i></li>
                            <li class="py-2">استمتع بأفضل العروض و الخدمات من شركتنا<i
                                    class="fa fa-check text-primary mr-3"></i></li>
                        </ul>
                    </div>
                    @if (!Auth::check())
                        <div class="d-md-flex half">

                            <div class="contents" style="background-color:#0d6dfd00;">
                                <div class="container">

                                    <div style="width:500px; margin-left:400px;"
                                        class="align-items-center justify-content-center">
                                        <div class="form-block mx-auto">

                                            <div style="background-color:var(--bambi); width:100%;  height:50px;"
                                                class="text-center mb-4">
                                                <h3 style="color:#fff;" class="pt-2"> إنشاء حساب</h3>
                                            </div>

                                            <div class="col-md-12">
                                                <form method="POST" action="{{ route('register') }}"
                                                    enctype="multipart/form-data">
                                                    @csrf

                                                    <div class="form-group d-flex mb-3 first align-items-center">
                                                        <label for="user_name"
                                                            class="col-md-4 col-form-label text-md-start">{{ __('اسم المستخدم') }}</label>

                                                        <div class="d-flex  w-100" style="flex-direction: column;">
                                                            <input id="user_name" placeholder="اسم المستخدم"
                                                                type="text"
                                                                class="form-control @error('user_name') is-invalid @enderror"
                                                                name="user_name" value="{{ old('user_name') }}" required
                                                                autocomplete="user_name">

                                                            @error('user_name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="form-group mb-3 d-flex align-items-center">
                                                        <label for="email"
                                                            class="col-md-4 col-form-label text-md-start">{{ __('الايميل') }}</label>

                                                        <div class="d-flex w-100" style="flex-direction: column;">
                                                            <input id="email" placeholder="example@example.com"
                                                                type="email"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                name="email" value="{{ old('email') }}" required
                                                                autocomplete="email">

                                                            @error('email')
                                                                <div class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                            @enderror
                                                        </div>


                                                    </div>

                                                    <div class="form-group mb-3 d-flex align-items-center">
                                                        <label for="password"
                                                            class="col-md-4 col-form-label text-md-start">{{ __('كلمة السر') }}</label>

                                                        <div class="d-flex w-100" style="flex-direction: column;">
                                                            <input id="password" placeholder="********" type="password"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                name="password" required autocomplete="new-password">

                                                            @error('password')
                                                                <div class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group  mb-3 last d-flex align-items-center">
                                                        <label for="password-confirm"
                                                            class="col-md-4 col-form-label text-md-start">{{ __('تأكيد كلمة السر') }}</label>

                                                        <input id="password-confirm" type="password" class="form-control"
                                                            name="password_confirmation" required
                                                            autocomplete="new-password">

                                                    </div>


                                                    <div class="row mb-0 mt-3 justify-content-center">
                                                        <div class="col-md-6 offset-md-10">
                                                            <button type="submit" class="btn btn-block text-light"
                                                                style="background-color:var(--bambi);">
                                                                {{ __('إنشاء') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
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
        <div class="container-fluid py-2">
            <div class="container pt-5 pb-3">
                <div class="text-center mb-3 pb-3">
                    <h6 class="text-primary text-uppercase">فريقنا </h6>
                    <h1>أدلاؤنا السياحيون</h1>
                </div>
                <div class="row">
                    <!-- بداية الكارد -->
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
                                    <a class="text-50 mb-2" href="{{ route('travelguidesformore-ar') }}">للمزيد</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- نهاية الكارد -->

                </div>
            </div>
        </div>
        <!-- Team End -->


        <!-- offers Start -->
        <div class="container-fluid py-5" id="Offers">
            <div class="container py-5">
                <div class="text-center mb-3 pb-3">
                    <h6 class="text-primary text-uppercase">العروض</h6>
                    <h1>أفضل العروض</h1>
                </div>
                <div class="owl-carousel testimonial-carousel">
                    <!-- بداية الكارد -->
                    <div class="text-center pb-4 mb-3" style="direction:rtl;">
                        <img class="img-fluid m-auto" src="img/gift.png" style="width: 100px; height: 100px;">
                        <div class="testimonial-text bg-white p-4 mt-n5" style="height: 400px;">
                            <h5 class="text-truncate mt-5">اسم المكان أو الخدمة</h5>
                            <h5 class="text-truncate">اسم العرض</h5>
                            <p class="mt-2 h-50">Lorem ipsum dolor sit amet consectetur adipisicing elit. In animi, tempore
                                maiores modi iure consequuntur
                                eum vel voluptate excepturi veritatis commodi.
                                A unde fuga quas voluptates ab sunt blanditiis eaque! rrrrrrrrr rrrrrrrrrrr
                                rrrrrrrrrrrrrrrrr rrrrrrrrrr rrrrrrrr rrrrrrrrrr rrrr rrrrr rrrrr rrrr rr
                            </p>

                            <div class="d-flex h-25" style="flex-direction:row; justify-content:space-around;">
                                <span>الكلفة : 40000</span>
                                <button class="btn btn-primary app-content-headerButton"
                                    style="float:left; border-radius:3px;">احجز الآن</button>
                            </div>
                        </div>
                    </div>
                    <!-- نهاية الكارد -->


                    <!-- بداية الكارد -->
                    <div class="text-center pb-4 mb-3" style="direction:rtl;">
                        <img class="img-fluid m-auto" src="img/gift.png" style="width: 100px; height: 100px;">
                        <div class="testimonial-text bg-white p-4 mt-n5" style="height: 400px;">
                            <h5 class="text-truncate mt-5">اسم المكان أو الخدمة</h5>
                            <h5 class="text-truncate">اسم العرض</h5>
                            <p class="mt-2 h-50">Lorem ipsum dolor sit amet consectetur adipisicing elit. In animi, tempore
                                maiores modi iure consequuntur
                                eum vel voluptate excepturi veritatis commodi.
                                A unde fuga quas voluptates ab sunt blanditiis eaque! dghld sdkhusd sdfudfus fsuu </p>

                            <div class="d-flex h-25" style="flex-direction:row; justify-content:space-around;">
                                <span>الكلفة : 40000</span>
                                <button class="btn btn-primary app-content-headerButton"
                                    style="float:left; border-radius:3px;">احجز الآن</button>
                            </div>
                        </div>
                    </div>
                    <!-- نهاية الكارد -->


                    <!-- بداية الكارد -->
                    <div class="text-center pb-4 mb-3" style="direction:rtl;">
                        <img class="img-fluid m-auto" src="img/gift.png" style="width: 100px; height: 100px;">
                        <div class="testimonial-text bg-white p-4 mt-n5" style="height: 400px;">
                            <h5 class="text-truncate mt-5">اسم المكان أو الخدمة</h5>
                            <h5 class="text-truncate">اسم العرض</h5>
                            <p class="mt-2 h-50">Lorem ipsum dolor sit amet consectetur adipisicing elit. In animi, tempore
                                maiores modi iure consequuntur
                                eum vel voluptate ex </p>

                            <div class="d-flex h-25" style="flex-direction:row; justify-content:space-around;">
                                <span>الكلفة : 40000</span>
                                <button class="btn btn-primary app-content-headerButton"
                                    style="float:left; border-radius:3px;">احجز الآن</button>
                            </div>
                        </div>
                    </div>
                    <!-- نهاية الكارد -->


                    <!-- بداية الكارد -->
                    <div class="text-center pb-4 mb-3" style="direction:rtl;">
                        <img class="img-fluid m-auto" src="img/gift.png" style="width: 100px; height: 100px;">
                        <div class="testimonial-text bg-white p-4 mt-n5" style="height: 400px;">
                            <h5 class="text-truncate mt-5">اسم المكان أو الخدمة</h5>
                            <h5 class="text-truncate">اسم العرض</h5>
                            <p class="mt-2 h-50">Lorem ipsum dolor sit amet consectetur adipisicing elit. In animi, tempore
                                maiores modi iure consequuntur
                                eum vel voluptate excepturi veritatis commodi.
                                A unde fuga quas voluptates ab sunt blanditiis eaque! </p>

                            <div class="d-flex h-25" style="flex-direction:row; justify-content:space-around;">
                                <span>الكلفة : 40000</span>
                                <button class="btn btn-primary app-content-headerButton"
                                    style="float:left; border-radius:3px;">احجز الآن</button>
                            </div>
                        </div>
                    </div>
                    <!-- نهاية الكارد -->


                    <!-- بداية الكارد -->
                    <div class="text-center pb-4 mb-3" style="direction:rtl;">
                        <img class="img-fluid m-auto" src="img/gift.png" style="width: 100px; height: 100px;">
                        <div class="testimonial-text bg-white p-4 mt-n5" style="height: 400px;">
                            <h5 class="text-truncate mt-5">اسم المكان أو الخدمة</h5>
                            <h5 class="text-truncate">اسم العرض</h5>
                            <p class="mt-2 h-50">Lorem ipsum dolor sit amet consectetur adipisicing elit. In animi, tempore
                                maiores modi iure consequuntur
                                eum vel voluptate excepturi veritatis commodi.
                                A unde fuga quas voluptates ab sunt blanditiis eaque! ddd ddd ddd ddd ddd ddd ddd ddd ddd
                                ddd ddd ddd ddd ddd </p>

                            <div class="d-flex h-25" style="flex-direction:row; justify-content:space-around;">
                                <span>الكلفة : 40000</span>
                                <button class="btn btn-primary app-content-headerButton"
                                    style="float:left; border-radius:3px;">احجز الآن</button>
                            </div>
                        </div>
                    </div>
                    <!-- نهاية الكارد -->




                </div>
            </div>
        </div>
        <!-- offers End -->


        <!-- events Start -->
        <div class="container-fluid py-5" id="Events">
            <div class="container pt-5 pb-3">
                <div class="text-center mb-3 pb-3">
                    <h6 class="text-primary text-uppercase">الفعاليات</h6>
                    <h1>أهم الفعاليات المقامة</h1>
                </div>
                <div class="row pb-3">
                    {{-- بداية الكارد --}}
                    <div class="col-lg-4 col-md-6 mb-4 pb-2">
                        <div class="blog-item">
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="img/blog-1.jpg" alt="">
                                <div class="blog-date">
                                    <h6 class="font-weight-bold mb-n1">01</h6>
                                    <small class="text-white text-uppercase">Jan</small>
                                </div>
                            </div>
                            <div class="bg-white p-4">
                                <div class="d-flex mb-2">
                                    <a class="text-primary text-uppercase text-decoration-none" href="">كافيه لايكي</a>
                                    <span class="text-primary px-2">|</span>
                                    <a class="text-primary text-uppercase text-decoration-none" href="">كأس العالم</a>
                                </div>
                                <h6 class="d-flex justify-content-end"><a class="btn btn-primary"  href="{{route('event-ar')}}" style="border-radius:3px;">المزيد من التفاصيل للحجز</a></h6>

                            </div>
                        </div>
                    </div>
       
           {{-- نهاية الكارد --}}
                </div>
            </div>
        </div>
        <!-- events End -->
    @endsection
