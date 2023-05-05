 <!-- Topbar Start -->
 <div class="container-fluid bg-light pt-3 d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <p><i class="fa fa-envelope mr-2"></i>traveler@example.com</p>
                        <p class="text-body px-3">|</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+012 345 6789</p>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-primary px-3" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-primary px-3" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-primary px-3" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-primary px-3" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-primary pl-3" href="">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="" class="navbar-brand">
                    <h1 class="m-0" style="color:var(--bambi);"><span class="text-dark">المسا</span>فر</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="{{route('userhome-ar')}}" class="nav-item nav-link active">الرئيسة</a>
                     
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">سوريا</a>
                            <div class="dropdown-menu border-0 rounded-0 m-0">
                                <a href="blog" class="dropdown-item">زيارة سوريا</a>
                                <a href="blog" class="dropdown-item">المحافظات السورية</a>
                                <a href="single" class="dropdown-item">فنادق سوريا</a>
                                <a href="destination" class="dropdown-item">مطاعم سوريا</a>
                                <a href="guide" class="dropdown-item">أماكن أثرية في سوريا</a>
                                <a href="guide" class="dropdown-item">جروبات رحلات</a>
                                <a href="testimonial" class="dropdown-item">صور فوتوغرافية لسوريا</a>
                            </div>
                        </div>
                        <a href="{{route('about-ar')}}" class="nav-item nav-link">حولنا</a>

                       
                        <a href="{{route('contact-ar')}}" class="nav-item nav-link">تواصل معنا</a>
                       <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('تسجيل الدخول') }}</a>
                                </li>
                            @endif
<!-- 
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif -->
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                       <a class="nav-item nav-link"> <i class="fas fa-heart heart" title="المفضلة" onClick="getFavorite()" style=" color:var(--bambi);  cursor: pointer;"  type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"></i></a>
                       <div class="nav-item dropdown " >
                            <a class="nav-link dropdown-toggle"  data-bs-toggle="dropdown" title="ترجمة">  <i class="fas fa-globe "  ></i> </a>                           
                            <div id="langList" class="dropdown-menu border-0 rounded-0 m-0">
                                <a href=""  onclick="getURLAr()" class="dropdown-item" style="cursor:pointer;"> العربية</a>
                                <a href="" onclick="getURLEn()" class="dropdown-item" style="cursor:pointer;">الانجليزية </a>
                    
                            </div>
                        </div>
                    </div>
                    
                </div>
            </nav>
        </div>
    </div>


    <!-- favorite --> 
 

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header" style="flex-direction: row-reverse;">
    <h3 id="offcanvasRightLabel " class="text-primary " >:المفضلة</h3>
    <button type="button" class="btn-close m-0 close" data-bs-dismiss="offcanvas" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
  </div>
  <div class="offcanvas-body">
    <img src="img/folder.png" width="130px" height="130px" style="margin-left:125px; margin-top:160px;"/>
    <p class="text-body px-3 text-center mt-4">اختر أماكنك المفضلة</p>

  </div>
</div>
 <!-- end favorite -->

    <!-- Navbar End -->


   


