 <!-- Topbar Start -->
 <div class="container-fluid bg-light pt-3 pb-3 d-none d-lg-block toggle">
     <div class="container">
         <div class="row">
             <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">

             </div>
             <div class="col-lg-6 text-center text-lg-right">
                 <div class="d-inline-flex align-items-center">
                     <a class="text-primary px-3" href="">
                         <i class="fab fa-facebook-f"></i>
                     </a>
                     <a class="text-primary px-3" href="">
                         <i class="fab fa-twitter "></i>
                     </a>

                     <a class="text-primary px-3" href="">
                         <i class="fab fa-instagram "></i>
                     </a>
                     <a class="text-primary pl-3" href="">
                         <i class="fab fa-youtube "></i>
                     </a>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Topbar End -->


 <!-- Navbar Start -->
 <div class="container-fluid position-relative nav-bar p-0" style="background-color:var(--header);">
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
                    @if (\Auth::check())
                        @if (\Auth::user()->is_employee == 1 || \Auth::user()->is_employee == 2)
                            <a href="{{ route('home_en') }}" class="nav-item nav-link active">Dashboard</a>
                        @endif
                    @endif
                     
                     <a href="{{ route('home-en') }}" class="nav-item nav-link ">Home</a>

                     <div class="nav-item dropdown">
                         <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Syria</a>
                         <div class="dropdown-menu border-0 rounded-0 m-0">
                            a href="#Governorates" class="dropdown-item">Governorates of Syria</a>
                            <a href="#Trips" class="dropdown-item">Trip groups</a>
                            <a href="#Offers" class="dropdown-item">Offers</a>
                            <a href="#Events" class="dropdown-item">Events</a>
                            <a href="#Nearby" class="dropdown-item">Nearby you</a>
                            <a href="#Gallery" class="dropdown-item">Photographs from Syria</a>
                         </div>
                     </div>
                     <div class="nav-item dropdown">
                         <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Services</a>
                         <div class="dropdown-menu border-0 rounded-0 m-0">
                             <a href="{{ route('transport') }}" class="dropdown-item">Transport Companies</a>
                             <a href="{{ route('travelguides') }}" class="dropdown-item">Tourist Guide</a>
                             <a href="{{ route('trips') }}" class="dropdown-item">Trip</a>
                             <a href="{{ route('offer-en') }}" class="dropdown-item">Offers</a>
                             <a href="{{ route('event-en') }}" class="dropdown-item">Events</a>

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

                     {{-- ticket --}}
                     <a class="nav-item nav-link"> <i class="fas fa-ticket-alt" title="حجوزاتك"
                             style=" color:var(--bambi);  cursor: pointer;" type="button" data-bs-toggle="offcanvas"
                             data-bs-target="#offcanvasRight1" aria-controls="offcanvasRight1"></i></a>
                     <a class="nav-item nav-link"> <i class="fas fa-heart heart" title="favorite"
                             onClick="getFavorite()" style=" color:var(--bambi);  cursor: pointer;" type="button"
                             data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                             aria-controls="offcanvasRight"></i></a>

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
         <img src="img/folder.png" width="130px" height="130px" style="margin-left:125px; margin-top:160px; opacity: 0.5;" />
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

 <!-- tickets -->


 <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight1" aria-labelledby="offcanvasRight1Label">
     <div class="offcanvas-header" >
         <h3 id="offcanvasRight1Label " class="text-primary ">your bookings:</h3>
         <button type="button" class="btn-close m-0 close" data-bs-dismiss="offcanvas" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
     </div>
     <div class="offcanvas-body">
         {{-- اذا ما حجز لسا --}}
         {{-- <img src="img/ticket.png" width="150px" height="150px" style="margin-left:100px; margin-top:160px; opacity: 0.5;" />
   <p class="text-body px-3 text-center mt-4">سارع بالحجز في أفضل الأماكن</p> --}}
         {{-- اذا حجز  --}}

         <div class="d-flex mb-3"
             style="flex-direction: column; height: auto; align-items: center; color: #fff; background-color:var(--bambi); clip-path: polygon(0% 20%, 20% 0%, 80% 0%, 100% 20%, 100% 80%, 80% 100%, 20% 100%, 0% 80%);
       border-radius: 30px; padding-block: 10px;">
             <h6 style="font-size: 16px;">- Booking Information -</h6>
             <div class="mr-2 text-center" style="position: relative;">
                 <h6 style="font-size: 16px;"> حجز اسم المكان أو العرض أو الرحلة</h6>
                 {{-- إذا عرض أو رحلة منذكر المكان --}}
                 {{-- <h6 style="font-size: 16px;"></h6> اسم المكان</h6> --}}
                 {{-- إذا حجز خدمة منذكر اسما --}}
                 {{-- <h6 style="font-size: 16px;">اسم الخدمة</h6> --}}
                 <h6 style="font-size: 16px;"> في محافظة حلب</h6>
                 <h6 style="font-size: 16px;">from: 20-3-2023 </h6>
                 <h6 style="font-size: 16px;">to: 22-3-2023 </h6>
                 <h6 style="font-size: 16px;">cost : 2222 </h6>
                 <div class="d-flex justify-content-center" style="flex-direction: row-reverse;">
                  <i style="font-size: 16px; color: #dc3545; cursor: pointer; margin-left: 3px;"
                         class="fas fa-cancel"></i>
                     <h6 onclick="showToast('h6_id_0')" id="h6_id_0"
                         style="font-size: 16px; color: #dc3545; cursor: pointer;">cancle booking
                     </h6> 
                 </div>

                 <h6 class="word_ticket">Ticket</h6>

             </div>


         </div>
         {{-- توست إلغاء الحجز --}}

         <div id="toast_h6_id_0" class="alert alert-primary d-none text-center"
             style="background-color: #fff; border: 2px solid; font-size: 16px;" role="alert">
             <button type="button" onclick="hideToast('h6_id_0')" class="close_toast btn-close m-0 close"
             aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
             are you shure that you want to cancle the book?
            
             <div class="modal-footer p-0 pt-3 mt-1" >
                 <button type="button" class="btn btn-secondary" onclick="hideToast('h6_id_0')">close</button>
                 <button type="button" id="add-guide-btn" class="app-content-headerButton">yes</button>
             </div>
         </div>
         {{-- نهاية توست إلغااء الحجز --}}


     </div>
 </div>
 <!-- end tickets -->


 <!-- Navbar End -->
 <!-- partial:index.partial.html -->
 <div class="app-container">
     <div class="sidebar">
         <div class="sidebar-header">
             <div class="app-icon">
                 <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                     <path fill="currentColor"
                         d="M507.606 371.054a187.217 187.217 0 00-23.051-19.606c-17.316 19.999-37.648 36.808-60.572 50.041-35.508 20.505-75.893 31.452-116.875 31.711 21.762 8.776 45.224 13.38 69.396 13.38 49.524 0 96.084-19.286 131.103-54.305a15 15 0 004.394-10.606 15.028 15.028 0 00-4.395-10.615zM27.445 351.448a187.392 187.392 0 00-23.051 19.606C1.581 373.868 0 377.691 0 381.669s1.581 7.793 4.394 10.606c35.019 35.019 81.579 54.305 131.103 54.305 24.172 0 47.634-4.604 69.396-13.38-40.985-.259-81.367-11.206-116.879-31.713-22.922-13.231-43.254-30.04-60.569-50.039zM103.015 375.508c24.937 14.4 53.928 24.056 84.837 26.854-53.409-29.561-82.274-70.602-95.861-94.135-14.942-25.878-25.041-53.917-30.063-83.421-14.921.64-29.775 2.868-44.227 6.709-6.6 1.576-11.507 7.517-11.507 14.599 0 1.312.172 2.618.512 3.885 15.32 57.142 52.726 100.35 96.309 125.509zM324.148 402.362c30.908-2.799 59.9-12.454 84.837-26.854 43.583-25.159 80.989-68.367 96.31-125.508.34-1.267.512-2.573.512-3.885 0-7.082-4.907-13.023-11.507-14.599-14.452-3.841-29.306-6.07-44.227-6.709-5.022 29.504-15.121 57.543-30.063 83.421-13.588 23.533-42.419 64.554-95.862 94.134zM187.301 366.948c-15.157-24.483-38.696-71.48-38.696-135.903 0-32.646 6.043-64.401 17.945-94.529-16.394-9.351-33.972-16.623-52.273-21.525-8.004-2.142-16.225 2.604-18.37 10.605-16.372 61.078-4.825 121.063 22.064 167.631 16.325 28.275 39.769 54.111 69.33 73.721zM324.684 366.957c29.568-19.611 53.017-45.451 69.344-73.73 26.889-46.569 38.436-106.553 22.064-167.631-2.145-8.001-10.366-12.748-18.37-10.605-18.304 4.902-35.883 12.176-52.279 21.529 11.9 30.126 17.943 61.88 17.943 94.525.001 64.478-23.58 111.488-38.702 135.912zM266.606 69.813c-2.813-2.813-6.637-4.394-10.615-4.394a15 15 0 00-10.606 4.394c-39.289 39.289-66.78 96.005-66.78 161.231 0 65.256 27.522 121.974 66.78 161.231 2.813 2.813 6.637 4.394 10.615 4.394s7.793-1.581 10.606-4.394c39.248-39.247 66.78-95.96 66.78-161.231.001-65.256-27.511-121.964-66.78-161.231z" />
                 </svg>
             </div>
         </div>
         <ul class="sidebar-list">
             <li class="sidebar-list-item">
                 <span class="account-info">
                     <span class="account-info-picture">
                         <img src="{{ asset(Auth::user()->image) }}" alt="Account">
                     </span>
                     <span class="account-info-name">{{ Auth::user()->user_name }}</span>
                     <!-- account form -->
                     <button class="account-info-more" title="Account Info" data-bs-toggle="modal"
                         data-bs-target="#exampleModal4">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-more-horizontal">
                             <circle cx="12" cy="12" r="1" />
                             <circle cx="19" cy="12" r="1" />
                             <circle cx="5" cy="12" r="1" />
                         </svg>
                     </button>
                     <!-- Modal -->
                     <div class="modal fade " data-bs-backdrop="static" id="exampleModal4" tabindex="-1"
                         aria-labelledby="exampleModal4Label" aria-hidden="true">
                         <div class="modal-dialog ">
                             <div class="modal-content toggle">
                                 <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModal3Label">Account Information</h5>
                                     <button type="button" class="btn-close m-0 close" data-bs-dismiss="modal"
                                         aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                     </button>
                                 </div>
                                 <div class="acc-pic position-relative m-auto">
                                     <img src="{{ asset(Auth::user()->image) }}" id="edit_previewImage_{{Auth::user()->id}}'" alt="Account" width="150px"
                                         height="150px" style="border-radius:50%; margin:auto; margin-block:40px;">
                                     <input type="file" onchange="previewImage(this, 'edit_previewImage_{{Auth::user()->id}}')"
                                         style="position:absolute; z-index:9999; left:80%; top:63%; opacity:0; width:30px;">
                                     <span class="position-absolute translate-middle badge rounded-pill mr-3"
                                         style="left:90%; background-color:var(--navi);top:70%; width:35px; height:35px;">
                                         <i class="fas fa-pen"
                                             style="color:#fff !important; padding-top:7px; padding-left:7px;">
                                         </i></span>
                                 </div>
                                 <hr class="w-50 m-auto">
                                 <div class="acc-info pt-5 pl-5">
                                     <div class="d-flex ">
                                         <i class="fas fa-user "></i>
                                         <h6>UserName</h6>
                                     </div>
                                     <input disabled class="m-auto p-1" type="text"
                                         style="font-size:14px; border:1px solid #0400ff36; width:70%; margin-left:30px !important; border-radius:5px;"
                                         value={{ Auth::user()->user_name }} />

                                     <div class="d-flex  pt-5 ">
                                         <i class="fas fa-envelope "></i>
                                         <h6>Email</h6>
                                     </div>
                                     <input disabled class="m-auto p-1" type="email"
                                         value={{ Auth::user()->email }}
                                         style="font-size:14px; border:1px solid #0400ff36; width:70%; margin-left:30px !important; border-radius:5px;" />


                                     <div class="d-flex  pt-5  justify-content-center pr-5">
                                         <button style="cursor: pointer;" onclick="ablePassword()"
                                             class="btn-primary">Edit Password</button>
                                     </div>



                                     <div id="OldPassword" hidden="true">
                                         <div class="d-flex pt-5">
                                             <i class="fas fa-lock"></i>
                                             <h6>Old Password</h6>
                                         </div>
                                         <input class="m-auto p-1" type="password" value=""
                                             style="font-size:14px; border:1px solid #0400ff36; width:70%; margin-left:30px !important; border-radius:5px;" />
                                     </div>


                                     <div id="NewPassword" hidden="true">
                                         <div class="d-flex pt-5">
                                             <i class="fas fa-lock "></i>
                                             <h6>New Password</h6>
                                         </div>
                                         <input class="m-auto p-1" type="password" value=""
                                             style="font-size:14px; border:1px solid #0400ff36; width:70%; margin-left:30px !important; border-radius:5px;"
                                              />
                                     </div>

                                     <div id="confirmPassword" hidden="true">
                                         <div class="d-flex pt-5">
                                             <i class="fas fa-lock "></i>
                                             <h6>Confirm Password</h6>
                                         </div>
                                         <input class="m-auto p-1" type="password" value=""
                                             style="font-size:14px; border:1px solid #0400ff36; width:70%; margin-left:30px !important; border-radius:5px;"
                                              />
                                     </div>

                                 </div>
                                 <div class="modal-footer mt-5">
                                     <button type="button" class="action-button active"
                                         data-bs-dismiss="modal">Close</button>
                                     <button type="button" id="add-guide-btn"
                                         class="app-content-headerButton">Save</button>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- end account form -->
                 </span>
             </li>

             <li class="sidebar-list-item " onclick="active_part()">
                 <a href="{{ route('home_en') }}" id="sss">
                     <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-shopping-bag">
                         <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                         <line x1="3" y1="6" x2="21" y2="6" />
                         <path d="M16 10a4 4 0 0 1-8 0" />
                     </svg>
                     <span>Home</span>
                 </a>
             </li>
             <li class="sidebar-list-item " onclick="active_part()">
                 <a href="{{ route('employee_en') }}">
                     <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-shopping-bag">
                         <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                         <line x1="3" y1="6" x2="21" y2="6" />
                         <path d="M16 10a4 4 0 0 1-8 0" />
                     </svg>
                     <span>Employees</span>
                 </a>
             </li>


             <li class="accordion accordion-flush sidebar-list-item" id="accordionFlushExample">
                 <div class="accordion-item ">
                     <h2 class="accordion-header " id="flush-headingOne">
                         <button class="accordion-button collapsed pl-3 sidebar-list-item" id="accBtn"
                             onclick="accordion()"
                             style="flex-direction:row; font-size:14px; outline:none; box-shadow:none;" type="button"
                             data-bs-toggle="collapse" data-bs-target="#flush-collapseOnee"
                             aria-controls="flush-collapseOnee">
                             <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag">
                                 <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                                 <line x1="3" y1="6" x2="21" y2="6" />
                                 <path d="M16 10a4 4 0 0 1-8 0" />
                             </svg>
                             Bookings
                             <img id="arrow" src="../img/upload.png" width="18" height="18"
                                 class="ml-5">

                         </button>

                     </h2>
                     <div id="flush-collapseOne" class="accordion-collapse collapse"
                         aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                         <div class="accordion-body p-0">
                             <hr class="m-0">
                             <ul class="sidebar-list">
                                 <li class="sidebar-list-item" onclick="active_part()">
                                     <a href="{{ route('offers_booking_en') }}">
                                         <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-shopping-bag">
                                             <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                                             <line x1="3" y1="6" x2="21" y2="6" />
                                             <path d="M16 10a4 4 0 0 1-8 0" />
                                         </svg>
                                         <span>Offers Bookings</span>
                                     </a>
                                 </li>

                                 <li class="sidebar-list-item" onclick="active_part()">
                                     <a href="{{ route('services_booking_en') }}">
                                         <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-shopping-bag">
                                             <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                                             <line x1="3" y1="6" x2="21" y2="6" />
                                             <path d="M16 10a4 4 0 0 1-8 0" />
                                         </svg>
                                         <span>Services Bookings</span>
                                     </a>
                                 </li>

                                 <li class="sidebar-list-item" onclick="active_part()">
                                     <a href="{{ route('places_booking_en') }}">
                                         <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-shopping-bag">
                                             <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                                             <line x1="3" y1="6" x2="21" y2="6" />
                                             <path d="M16 10a4 4 0 0 1-8 0" />
                                         </svg>
                                         <span>Places Bookings</span>
                                     </a>
                                 </li>

                                 <li class="sidebar-list-item" onclick="active_part()">
                                     <a href="{{ route('events_booking_en') }}">
                                         <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-shopping-bag">
                                             <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                                             <line x1="3" y1="6" x2="21" y2="6" />
                                             <path d="M16 10a4 4 0 0 1-8 0" />
                                         </svg>
                                         <span>Events Bookings</span>
                                     </a>
                                 </li>

                             </ul>

                             <hr class="m-0">
                         </div>
                     </div>
                 </div>
             </li>

             <li class="sidebar-list-item " onclick="active_part()">
                 <a href="{{ route('city_en') }}">
                     <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-shopping-bag">
                         <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                         <line x1="3" y1="6" x2="21" y2="6" />
                         <path d="M16 10a4 4 0 0 1-8 0" />
                     </svg>
                     <span>Cities</span>
                 </a>
             </li>

             <li class="sidebar-list-item " onclick="active_part()">
                 <a href="{{ route('category_en') }}">
                     <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-shopping-bag">
                         <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                         <line x1="3" y1="6" x2="21" y2="6" />
                         <path d="M16 10a4 4 0 0 1-8 0" />
                     </svg>
                     <span>Categories</span>
                 </a>
             </li>
             <li class="sidebar-list-item " onclick="active_part()">
                 <a href="{{ route('place_en') }}">
                     <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-shopping-bag">
                         <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                         <line x1="3" y1="6" x2="21" y2="6" />
                         <path d="M16 10a4 4 0 0 1-8 0" />
                     </svg>
                     <span>Places</span>
                 </a>
             </li>

             <li class="sidebar-list-item " onclick="active_part()">
                 <a href="{{ route('event_en') }}">
                     <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-shopping-bag">
                         <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                         <line x1="3" y1="6" x2="21" y2="6" />
                         <path d="M16 10a4 4 0 0 1-8 0" />
                     </svg>
                     <span>Events</span>
                 </a>
             </li>

             <li class="sidebar-list-item " onclick="active_part()">
                 <a href="{{ route('service_en') }}">
                     <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-shopping-bag">
                         <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                         <line x1="3" y1="6" x2="21" y2="6" />
                         <path d="M16 10a4 4 0 0 1-8 0" />
                     </svg>
                     <span>Services</span>
                 </a>
             </li>
             <li class="sidebar-list-item " onclick="active_part()">
                 <a href="{{ route('offer_en') }}">
                     <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-shopping-bag">
                         <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                         <line x1="3" y1="6" x2="21" y2="6" />
                         <path d="M16 10a4 4 0 0 1-8 0" />
                     </svg>
                     <span>Offers</span>
                 </a>
             </li>
             <li class="sidebar-list-item " onclick="active_part()">
                 <a href="{{ route('tourist_guide_en') }}">
                     <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-shopping-bag">
                         <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                         <line x1="3" y1="6" x2="21" y2="6" />
                         <path d="M16 10a4 4 0 0 1-8 0" />
                     </svg>
                     <span>Tourist Guide</span>
                 </a>
             </li>
             </li>
             <li class="sidebar-list-item " onclick="active_part()">
                 <a href="{{ route('emp-places-En') }}">
                     <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-shopping-bag">
                         <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                         <line x1="3" y1="6" x2="21" y2="6" />
                         <path d="M16 10a4 4 0 0 1-8 0" />
                     </svg>
                     <span>Places Employees</span>
                 </a>
             </li>
             <li class="sidebar-list-item " onclick="active_part()">
                 <a href="{{ route('groupe_en') }}">
                     <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-shopping-bag">
                         <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                         <line x1="3" y1="6" x2="21" y2="6" />
                         <path d="M16 10a4 4 0 0 1-8 0" />
                     </svg>
                     <span>Groups</span>
                 </a>
             </li>
             <li class="sidebar-list-item " onclick="active_part()">
                 <a href="{{ route('transport_company_en') }}">
                     <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-shopping-bag">
                         <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                         <line x1="3" y1="6" x2="21" y2="6" />
                         <path d="M16 10a4 4 0 0 1-8 0" />
                     </svg>
                     <span>Transport Companies</span>
                 </a>
             </li>
             <li class="sidebar-list-item " onclick="active_part()">
                 <a href="{{ route('message_en') }}">
                     <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-shopping-bag">
                         <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                         <line x1="3" y1="6" x2="21" y2="6" />
                         <path d="M16 10a4 4 0 0 1-8 0" />
                     </svg>
                     <span>Messages received</span>
                 </a>
             </li>

         </ul>

     </div>

     <!-- alert message false-->
     <div id="popup" class="parent" hidden="true">
         <div class="popup">
             <img src="../img/false.png">
             <h3> Faild</h3>

             <button type="button" onclick='hide()'>Ok</button>
         </div>
     </div>
     <!-- end alert message -->


     <!-- alert message true-->
     <div id="popuptrue" class="parenttrue" hidden="true">
         <div class="popuptrue">
             <img src="../img/true.png">
             <h3> Succeeded</h3>

             <button type="button" onclick='hide()'>Ok</button>
         </div>
     </div>
     <!-- end alert message -->
     <!-- partial -->
     <script>
         function ablePassword() {
             var con = document.getElementById("confirmPassword").hidden;
             var newpass = document.getElementById("NewPassword").hidden;
             var oldpass = document.getElementById("OldPassword").hidden;

             console.log(con)
             if (newpass & con & oldpass) {

                 document.getElementById("confirmPassword").hidden = false;
                 document.getElementById("NewPassword").hidden = false;
                 document.getElementById("OldPassword").hidden = false;

             }
             if (!(newpass & con & oldpass)) {
                 document.getElementById("confirmPassword").hidden = true;
                 document.getElementById("NewPassword").hidden = true;
                 document.getElementById("OldPassword").hidden = true;

             }

         }
     </script>
