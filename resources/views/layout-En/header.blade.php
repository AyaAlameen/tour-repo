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
                 <h1 class="m-0" style="color:var(--bambi);"><span class="text-dark">TRAVEL</span>ER</h1>
             </a>
             <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                 <div class="navbar-nav ml-auto py-0">
                     <a href="{{ route('userhome') }}" class="nav-item nav-link active">Home</a>

                     <div class="nav-item dropdown">
                         <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Syria</a>
                         <div class="dropdown-menu border-0 rounded-0 m-0">
                             <a href="blog" class="dropdown-item">Visit Syria</a>
                             <a href="blog" class="dropdown-item">Governorates of Syria</a>
                             <a href="single" class="dropdown-item">Syria Hotels</a>
                             <a href="destination" class="dropdown-item">Syria Restaurants</a>
                             <a href="guide" class="dropdown-item">Historical places in Syria</a>
                             <a href="guide" class="dropdown-item">Trip groups</a>
                             <a href="testimonial" class="dropdown-item">Photographs from Syria</a>
                         </div>
                     </div>
                     <a href="{{ route('about') }}" class="nav-item nav-link">About</a>


                     <a href="{{ route('contact-en') }}" class="nav-item nav-link">Contact</a>
                     {{-- Authentication Links --}}
                     @guest
                         @if (Route::has('login'))
                             <a class="nav-link" href="{{ route('login') }}"><span> {{ __('Login') }}</span></a>
                         @endif
                     @else
                         <div class="nav-item dropdown">
                             <a href="#" class="nav-link dropdown-toggle"
                                 data-toggle="dropdown">{{ Auth::user()->user_name }} </a>
                             <div class="dropdown-menu border-0 rounded-0 m-0">
                                <a href="#" class="dropdown-item" >Account info</a>
                                 <a class="dropdown-item" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                     <span> {{ __('Logout') }} </span>
                                 </a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
       
                             </div>
                         </div>       
                     @endguest
                     <a class="nav-item nav-link"> <i class="fas fa-heart heart" title="favorite"
                             onClick="getFavorite()" style=" color:var(--bambi);  cursor: pointer;" type="button"
                             data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                             aria-controls="offcanvasRight"></i></a>
                     <div class="nav-item dropdown ">
                         <a class="action-button list nav-link dropdown-toggle" style="cursor:pointer;"
                             data-toggle="dropdown" title="ترجمة"> <i class="fas fa-globe "></i> </a>
                         <div id="langList" class="dropdown-menu border-0 rounded-0 m-0">
                             <a onclick="getURLAr()" class="dropdown-item" style="cursor:pointer;"> Arabic</a>
                             <a onclick="getURLEn()" class="dropdown-item" style="cursor:pointer;">English </a>

                         </div>
                     </div>
                 </div>
             </div>
         </nav>
     </div>
 </div>


 <!-- favorite -->


 <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
     <div class="offcanvas-header">
         <h3 id="offcanvasRightLabel" class="text-primary">Favorites :</h3>
         <button type="button" class="btn-close m-0 close" data-bs-dismiss="offcanvas" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
     </div>
     <div class="offcanvas-body">
        {{-- اذا ما اختار مفضلة لسا --}}
         <img src="img/folder.png" width="130px" height="130px" style="margin-left:125px; margin-top:160px;" />
         <p class="text-body px-3 text-center mt-4">choose your favorite places</p>

         {{-- اذا اختار أماكن مفضلة  --}}
         
         {{-- <div class="d-flex" style="flex-direction: column; align-items: center; ">
             <img src="img/aleppo-palace-hotel.jpg"
                 style="padding: 10px; box-sizing: content-box; border-radius: 20px;" width="200px" height="200px">
                 <h4>فندق قصر حلب</h4>
         </div> --}}

     </div>
 </div>
 <!-- end favorite -->

 <!-- Navbar End -->
