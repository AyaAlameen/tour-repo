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
                     <a href="{{ route('userhome-ar') }}" class="nav-item nav-link active">الرئيسة</a>

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
                     <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">خدماتنا</a>
                            <div class="dropdown-menu border-0 rounded-0 m-0">
                                <a href="{{route('transport-ar')}}" class="dropdown-item">الشركات النقل</a>
                                <a href="{{route('travelguides-ar')}}" class="dropdown-item">الدليل السياحي</a>
                                <a href="single" class="dropdown-item">الرحلات</a>
                            
                            </div>
                        </div>

                     <a href="{{ route('about-ar') }}" class="nav-item nav-link">حولنا</a>


                     <a href="{{ route('contact-ar') }}" class="nav-item nav-link">تواصل معنا</a>
                     <!-- Authentication Links -->
                     @guest
                         @if (Route::has('login'))
                             <a class="nav-link" href="{{ route('login') }}"><span> {{ __('تسجيل الدخول') }}</span></a>
                         @endif
                     @else
                         <div class="nav-item dropdown">
                             <a href="#" class="nav-link dropdown-toggle"
                                 data-toggle="dropdown">{{ Auth::user()->user_name }} </a>
                             <div class="dropdown-menu border-0 rounded-0 m-0">
                                 <a class="dropdown-item" style="cursor: pointer;" data-bs-toggle="modal"
                                     data-bs-target="#exampleModal4">معلومات
                                     الحساب</a>
                                 <a class="dropdown-item" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                     <span> {{ __('تسجيل الخروج') }} </span>
                                 </a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                     @csrf
                                 </form>

                             </div>
                         </div>
                     @endguest
                     {{-- heart --}}
                     <a class="nav-item nav-link"> <i class="fas fa-heart heart" title="المفضلة" onClick="getFavorite()"
                             style=" color:var(--bambi);  cursor: pointer;" type="button" data-bs-toggle="offcanvas"
                             data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"></i></a>
                     {{-- ticket --}}
                     <a class="nav-item nav-link"> <i class="fas fa-ticket-alt" title="حجوزاتك"
                             style=" color:var(--bambi);  cursor: pointer;" type="button" data-bs-toggle="offcanvas"
                             data-bs-target="#offcanvasRight1" aria-controls="offcanvasRight1"></i></a>

                     <div class="nav-item dropdown ">
                         <a class="nav-link dropdown-toggle" data-toggle="dropdown" title="ترجمة"> <i
                                 class="fas fa-globe "></i> </a>
                         <div id="langList" class="dropdown-menu border-0 rounded-0 m-0">
                             <a href="" onclick="getURLAr()" class="dropdown-item" style="cursor:pointer;">
                                 العربية</a>
                             <a href="" onclick="getURLEn()" class="dropdown-item"
                                 style="cursor:pointer;">الانجليزية </a>

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
         <h3 id="offcanvasRightLabel " class="text-primary ">:المفضلة</h3>
         <button type="button" class="btn-close m-0 close" data-bs-dismiss="offcanvas" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
     </div>
     <div class="offcanvas-body">
         {{-- اذا ما اختار اماكن مفضلة لسا --}}
         <img src="img/folder.png" width="130px" height="130px" style="margin-left:125px; margin-top:160px;" />
         <p class="text-body px-3 text-center mt-4">اختر أماكنك المفضلة</p>
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


 <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasRight1" aria-labelledby="offcanvasRight1Label">
     <div class="offcanvas-header" style="flex-direction: row-reverse;">
         <h3 id="offcanvasRight1Label " class="text-primary ">:حجوزاتك</h3>
         <button type="button" class="btn-close m-0 close" data-bs-dismiss="offcanvas" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
     </div>
     <div class="offcanvas-body">
         {{-- اذا ما حجز لسا --}}
         {{-- <img src="img/ticket.png" width="150px" height="150px" style="margin-left:100px; margin-top:160px;" />
         <p class="text-body px-3 text-center mt-4">سارع بالحجز في أفضل الأماكن</p> --}}
         {{-- اذا حجز  --}}

         <div class="d-flex mb-3"
             style="flex-direction: column; height: auto; align-items: center; color: #fff; background-color:var(--bambi); clip-path: polygon(0% 20%, 20% 0%, 80% 0%, 100% 20%, 100% 80%, 80% 100%, 20% 100%, 0% 80%);
             border-radius: 30px; padding-block: 10px;">
             <h6 style="font-size: 20px;">- معلومات الحجز -</h6>
             <div class="mr-2 text-center" style="position: relative;">
                 <h6 style="font-size: 20px;"> حجز اسم المكان أو العرض أو الرحلة</h6>
                 {{-- إذا عرض أو رحلة منذكر المكان --}}
                 {{-- <h6 style="font-size: 20px;"></h6> اسم المكان</h6> --}}
                 {{-- إذا حجز خدمة منذكر اسما --}}
                 {{-- <h6 style="font-size: 20px;">اسم الخدمة</h6> --}}
                 <h6 style="font-size: 20px;"> في محافظة حلب</h6>
                 <h6 style="font-size: 20px;">20-3-2032 : من تاريخ </h6>
                 <h6 style="font-size: 20px;">22-3-2032 : إلى تاريخ </h6>
                 <h6 style="font-size: 20px;">20325 : بكلفة </h6>
                 <h6 onclick="showToast('h6_id_0')" id="h6_id_0"
                     style="font-size: 20px; color: #dc3545; cursor: pointer;"><i class="fas fa-cancel">إلغاء الحجز
                     </i></h6>
                 <h6 class="word_ticket">Ticket</h6>

             </div>


         </div>
         {{-- توست إلغاء الحجز --}}

         <div id="toast_h6_id_0" class="alert alert-primary d-none text-center"
             style="background-color: #fff; border: 2px solid; font-size: 20px;" role="alert">
             هل أنت متأكد من أنك تريد إلغاء الحجز؟
             <button type="button" onclick="hideToast('h6_id_0')" class="close_toast btn-close m-0 close"
                 aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
             <div class="modal-footer mt-1" style="direction:ltr;">
                 <button type="button" class="btn btn-secondary" onclick="hideToast('h6_id_0')">إغلاق</button>
                 <button type="button" id="add-guide-btn" class="app-content-headerButton">نعم</button>
             </div>
         </div>
         {{-- نهاية توست إلغااء الحجز --}}

         <div class="d-flex mb-3"
             style="flex-direction: column; height: auto; align-items: center; color: #fff; background-color:var(--bambi); clip-path: polygon(0% 20%, 20% 0%, 80% 0%, 100% 20%, 100% 80%, 80% 100%, 20% 100%, 0% 80%);
             border-radius: 30px; padding-block: 10px;">
             <h6 style="font-size: 20px;">- معلومات الحجز -</h6>
             <div class="mr-2 text-center" style="position: relative;">
                 <h6 style="font-size: 20px;"> حجز اسم المكان أو العرض أو الرحلة</h6>
                 {{-- إذا عرض أو رحلة منذكر المكان --}}
                 {{-- <h6 style="font-size: 20px;"></h6> اسم المكان</h6> --}}
                 {{-- إذا حجز خدمة منذكر اسما --}}
                 {{-- <h6 style="font-size: 20px;">اسم الخدمة</h6> --}}
                 <h6 style="font-size: 20px;"> في محافظة حلب</h6>
                 <h6 style="font-size: 20px;">20-3-2032 : من تاريخ </h6>
                 <h6 style="font-size: 20px;">22-3-2032 : إلى تاريخ </h6>
                 <h6 style="font-size: 20px;">20325 : بكلفة </h6>
                 <h6 onclick="showToast('h6_id_1')" id="h6_id_0"
                     style="font-size: 20px; color: #dc3545; cursor: pointer;"><i class="fas fa-cancel">إلغاء الحجز
                     </i></h6>
                 <h6 class="word_ticket">Ticket</h6>

             </div>


         </div>
         {{-- توست إلغاء الحجز --}}

         <div id="toast_h6_id_1" class="alert alert-primary d-none text-center"
             style="background-color: #fff; border: 2px solid; font-size: 20px;" role="alert">
             هل أنت متأكد من أنك تريد إلغاء الحجز؟
             <button type="button" onclick="hideToast('h6_id_1')" class="close_toast btn-close m-0 close"
                 aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
             <div class="modal-footer mt-1" style="direction:ltr;">
                 <button type="button" class="btn btn-secondary" onclick="hideToast('h6_id_10')">إغلاق</button>
                 <button type="button" id="add-guide-btn" class="app-content-headerButton">نعم</button>
             </div>
         </div>
         {{-- نهاية توست إلغااء الحجز --}}

     </div>
 </div>
 <!-- end tickets -->

 <!-- account form -->
 <div class="modal fade " data-bs-backdrop="static" id="exampleModal4" tabindex="-1"
     aria-labelledby="exampleModal4Label" aria-hidden="true">
     <div class="modal-dialog ">
         <div class="modal-content toggle">
             <div class="modal-header" style="direction:ltr;">
                 <h5 class="modal-title" id="exampleModal4Label">معلومات الحساب</h5>
                 <button type="button" class="btn-close m-0 close" data-bs-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="acc-pic position-relative m-auto">
                 <img src="../img/p1.jpg" alt="Account" class="" width="150px" height="150px"
                     style="border-radius:50%; margin:auto; margin-block:40px;">
                 <input type="file"
                     style="position:absolute; z-index:9999; left:80%; top:63%; opacity:0; width:30px;">
                 <span class="position-absolute translate-middle badge rounded-pill mr-3"
                     style="left:80%; background-color:var(--navi);top:70%; width:35px; height:35px;">
                     <i class="fas fa-pen" style="color:#fff !important; padding-top:7px;">
                     </i></span>
             </div>
             <hr class="w-50 m-auto">
             <div class="acc-info pt-5 pr-5">
                 <div class="d-flex mr-4">
                     <i class="fas fa-user ml-2"></i>
                     <h6>اسم المستخدم</h6>
                 </div>
                 <input disabled class="m-auto p-1" type="text"
                     style="font-size:14px; border:1px solid #0400ff36; width:70%; margin-left:95px !important; border-radius:5px;"
                     value="Aya Alameen" />

                 <div class="d-flex  pt-5 mr-4">
                     <i class="fas fa-envelope ml-2"></i>
                     <h6>الايميل</h6>
                 </div>
                 <input disabled class="m-auto p-1" type="email" value="aya@gmail.com"
                     style="font-size:14px; border:1px solid #0400ff36; width:70%; margin-left:95px !important; border-radius:5px;"
                     value="Aya Alameen" />


                 <div class="d-flex  pt-5 mr-4">
                     <i class="fas fa-lock ml-2"></i>
                     <h6>كلمة السر</h6>
                 </div>
                 <input disabled="true" id="account_password" class="m-auto p-1 " type="password" value="12345678"
                     style="font-size:14px; border:1px solid #0400ff36; width:70%; margin-left:95px !important; border-radius:5px;"
                     value="Aya Alameen" />
                 <i class="fas fa-pen" onclick="ablePassword()"
                     style="color:var(--title)!important; cursor: pointer; font-size:14px; position:relative; right: 30px;"></i>

                 <div id="NewPassword" hidden="true">
                     <div class="d-flex pt-5 mr-4">
                         <i class="fas fa-lock ml-2"></i>
                         <h6> كلمة السر الجديدة</h6>
                     </div>
                     <input class="m-auto p-1" type="password" value=""
                         style="font-size:14px; border:1px solid #0400ff36; width:70%; margin-left:95px !important; border-radius:5px;"
                         value="Aya Alameen" />
                 </div>

                 <div id="confirmPassword" hidden="true">
                     <div class="d-flex pt-5 mr-4">
                         <i class="fas fa-lock ml-2"></i>
                         <h6>تأكيد كلمة السر</h6>
                     </div>
                     <input class="m-auto p-1" type="password" value=""
                         style="font-size:14px; border:1px solid #0400ff36; width:70%; margin-left:95px !important; border-radius:5px;"
                         value="Aya Alameen" />
                 </div>

             </div>
             <div class="modal-footer mt-5" style="direction:ltr;">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                 <button type="button" id="add-guide-btn" class="app-content-headerButton">حفظ</button>
             </div>
         </div>
     </div>
 </div>
 <!-- end account form -->


 <!-- Navbar End -->


 <script>
     function ablePassword() {
         var con = document.getElementById("confirmPassword").hidden;
         var newpass = document.getElementById("NewPassword").hidden;
         console.log(con)
         if (newpass & con) {

             document.getElementById("confirmPassword").hidden = false;
             document.getElementById("NewPassword").hidden = false;
         }
         if (!(newpass & con)) {
             document.getElementById("confirmPassword").hidden = true;
             document.getElementById("NewPassword").hidden = true;
         }

     }
 </script>
