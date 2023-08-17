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
                    @if (\Auth::check())
                        @if (\Auth::user()->is_employee == 1 || \Auth::user()->is_employee == 2)
                            <a href="{{ route('welcome_home_en') }}" class="nav-item nav-link active">Dashboard</a>
                        @endif
                    @endif
                    <a href="{{ route('home-en') }}" class="nav-item nav-link active">Home</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Syria</a>
                        <div class="dropdown-menu border-0 rounded-0 m-0">
                            <a href="#Governorates" class="dropdown-item">Governorates of Syria</a>
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
                            <a href="{{ route('trips') }}" class="dropdown-item">Trips</a>
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
                                <a class="dropdown-item" style="cursor: pointer;" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal4">Account info</a>
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
                        <!-- account form -->
                        <div class="modal fade " data-bs-backdrop="static" id="exampleModal4" tabindex="-1"
                            aria-labelledby="exampleModal4Label" aria-hidden="true">
                            <div class="modal-dialog ">
                                <div class="modal-content toggle">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModal4Label">Account Information</h5>
                                        <button type="button" class="btn-close m-0 close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="acc-pic position-relative m-auto">
                                        <img src="{{ asset(Auth::user()->image) }}"
                                            id="edit_previewImage_{{ Auth::user()->id }}" alt="Account" width="150px"
                                            height="150px" style="border-radius:50%; margin:auto; margin-block:40px;">
                                        <input type="file"
                                            onchange="previewImage(this, 'edit_previewImage_{{ Auth::user()->id }}')"
                                            style="position:absolute; z-index:9999; left:80%; top:63%; opacity:0; width:30px;">
                                        <span class="position-absolute translate-middle badge rounded-pill mr-3"
                                            style="left:90%; background-color:var(--navi);top:70%; width:35px; height:35px;">
                                            <i class="fas fa-pen" style="color:#fff !important; padding-top:7px;">
                                            </i></span>
                                    </div>
                                    <hr class="w-50 m-auto">
                                    <div class="acc-info pt-5 pl-5">
                                        <div class="d-flex ">
                                            <i class="fas fa-user mr-2"></i>
                                            <h6>UserName</h6>
                                        </div>
                                        <input disabled class="m-auto p-1" type="text"
                                            style="font-size:14px; border:1px solid #0400ff36; width:70%; margin-left:30px !important; border-radius:5px;"
                                            value="{{ Auth::user()->user_name }}" />

                                        <div class="d-flex  pt-5 ">
                                            <i class="fas fa-envelope mr-2"></i>
                                            <h6>Email</h6>
                                        </div>
                                        <input disabled class="m-auto p-1" type="email"
                                            value="{{ Auth::user()->email }}"
                                            style="font-size:14px; border:1px solid #0400ff36; width:70%; margin-left:30px !important; border-radius:5px;"
                                            value="Aya Alameen" />


                                        <div class="d-flex  pt-5  justify-content-center pr-5">
                                            <button style="cursor: pointer;" onclick="ablePassword()"
                                                class="btn-primary">Edit Password</button>
                                        </div>



                                        
                                    <form id="edit-profile-form" action="" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div id="OldPassword" hidden="true">
                                            <div class="d-flex pt-5">
                                                <i class="fas fa-lock pr-2"></i>
                                                <h6>Old Password</h6>
                                            </div>
                                            <input class="m-auto p-1" type="password" value=""
                                                name="old_password"
                                                style="font-size:14px; border:1px solid #0400ff36; width:70%; margin-left:30px !important; border-radius:5px;" />
                                            <p id="old_error" class="m-auto p-1 text-danger"
                                                style="text-align: left; margin-left:30px !important;"></p>
                                        </div>


                                        <div id="NewPassword" hidden="true">
                                            <div class="d-flex pt-5">
                                                <i class="fas fa-lock pr-2"></i>
                                                <h6>New Password</h6>
                                            </div>
                                            <input class="m-auto p-1" type="password" value=""
                                                name="password"
                                                style="font-size:14px; border:1px solid #0400ff36; width:70%; margin-left:30px !important; border-radius:5px;" />
                                            <p id="new_error" class="m-auto p-1 text-danger"
                                                style="text-align: left; margin-left:30px !important;"></p>

                                        </div>

                                        <div id="confirmPassword" hidden="true">
                                            <div class="d-flex pt-5">
                                                <i class="fas fa-lock pr-2"></i>
                                                <h6>Confirm Password</h6>
                                            </div>
                                            <input class="m-auto p-1" type="password" value=""
                                                name="password_confirmation"
                                                style="font-size:14px; border:1px solid #0400ff36; width:70%; margin-left:30px !important; border-radius:5px;" />
                                            <p id="confirmation_error" class="m-auto p-1 text-danger"
                                                style="text-align: left; margin-left:30px !important;"></p>

                                        </div>
                                    </form>

                                </div>
                                <div class="modal-footer mt-5">
                                    <button type="button" class="btn btn-secondary close" style="font-size: 14px;"
                                    onclick="removeMessages(), document.getElementById('edit-profile-form').reset()"
                                            data-bs-dismiss="modal">Close</button>
                                    
                                    <button type="button" id="edit-profile-btn"
                                        onclick="editProfile('edit-profile-form')"
                                        class="app-content-headerButton">Save</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end account form -->
                @endguest
                {{-- ticket --}}
                <!-- <a class="nav-item nav-link"> <i class="fas fa-ticket-alt" title="حجوزاتك"
                        style=" color:var(--bambi);  cursor: pointer;" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasRight1" aria-controls="offcanvasRight1"></i></a> -->
                {{-- fav --}}
                @isset(Auth::user()->id)
                    <a class="nav-item nav-link"> <i class="fas fa-heart heart" title="favorite"
                            onClick="getFavorite()" style=" color:var(--bambi);  cursor: pointer;" type="button"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                            aria-controls="offcanvasRight"></i></a>
                @else
                <a class="nav-item nav-link"> <i class="fas fa-heart heart" title="favorite"
                    onClick="loginBefore()" style=" color:var(--bambi);  cursor: pointer;" type="button"
                    data-bs-toggle="offcanvas" data-bs-target=""
                    aria-controls="offcanvasRight"></i></a>
                @endisset
                <div class="nav-item dropdown ">
                    <a class="action-button list nav-link dropdown-toggle" style="cursor:pointer;"
                        data-toggle="dropdown" title="ترجمة"> <i class="fas fa-globe "
                            style=" color:var(--bambi); "></i> </a>
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
    <div id="favorites-data" class="offcanvas-body">
        

    </div>
</div>
<!-- end favorite -->

<!-- tickets -->


<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight1" aria-labelledby="offcanvasRight1Label">
    <div class="offcanvas-header">
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

            <div class="modal-footer p-0 pt-3 mt-1">
                <button type="button" class="btn btn-secondary" onclick="hideToast('h6_id_0')">close</button>
                <button type="button" class="app-content-headerButton">yes</button>
            </div>
        </div>
        {{-- نهاية توست إلغااء الحجز --}}


    </div>
</div>
<!-- end tickets -->

{{-- مودل الحجز --}}
<div class="modal fade " data-bs-backdrop="static" id="exampleModal20" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content toggle">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModaLabel">Enter your information for booking</h5>
                <button type="button" class="btn-close m-0 close"
                     data-bs-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <table style="width: 100%;" class="table-striped table-bordered m-auto text-primary myTable">

                        <tr>
                            <td class="text-center">Full Name</td>
                            <td><input type="text" class="toggle text-primary in" name="full_name" required
                                    style="width: 100%;"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><span class="text-danger" id="full_name_booking_error"></span></td>
                        <tr>
                            <td class="text-center">Phone</td>
                            <td><input type="number" class="toggle text-primary in" name="phone" required
                                    style="width: 100%;"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><span class="text-danger" id="phone_booking_error"></span></td>
                        </tr>
                        <tr>
                            <td class="text-center">Identifier</td>
                            <td><input type="number" class="toggle text-primary in" name="user_identifire" required
                                    style="width: 100%;"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><span class="text-danger" id="id_booking_error"></span></td>
                        </tr>
                        <tr>
                            <td class="text-center">People count</td>
                            <td><input type="number" class="toggle text-primary in" name="people_count" required
                                    style="width: 100%;"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><span class="text-danger" id="people_count_booking_error"></span></td>
                        </tr>

                        <tr>
                            <td class="text-center">Access date</td>
                            <td><input type="date" class="toggle text-primary in" name="access_date" required
                                    style="width: 100%;"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><span class="text-danger" id="start_date_booking_error"></span></td>
                        </tr>
                        <tr id="end_date_booking_tr">
                            <td class="text-center" >Depart date</td>
                            <td><input type="date" class="toggle text-primary in" name="depart_date" required
                                    style="width: 100%;"></td>
                        </tr>
                        <tr id="end_date_booking_error_tr">
                            <td colspan="2"><span class="text-danger" id="end_date_booking_error"></span></td>
                        </tr>
                        <tr id="reservation_period_booking_tr">
                            <td class="text-center"> Booking period (from clock - to clock)</td>
                            <td>
                                <div class="dropdown toggle text-primary in" style="display:inline-block;">
                                    <label class="dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-expanded="false">

                                    </label>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">12:00 - 13:00</a>
                                        <a class="dropdown-item" href="#">13:00 - 14:00</a>
                                    </div>
                                </div>
                            </td>
                            <input type="text" hidden id="reservation_period_booking">
                        </tr>
                        <tr id="reservation_period_booking_error_tr">
                            <td colspan="2"><span class="text-danger" id="reservation_period_booking_error"></span></td>

                        </tr>
                        <input type="text" hidden  id="booking_type">
                    </table>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
                <button type="button" id="add-city-btn" class="app-content-headerButton">done</button>
            </div>
        </div>
    </div>
</div>
{{-- نهاية مودل الحجز --}}


<!-- Navbar End -->
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

    function editProfile(formId) {

        $("#edit-profile-btn").attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById(formId));
        $.ajax({
                url: `{{ route('editProfileEn') }}`,
                type: "POST",
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
                $('.close').click();
                $('.parenttrue').attr("hidden", false);
                // clearInput();
            })
            .fail(function(data) {
                removeMessages();
               
                if (data.responseJSON.errors.old_password) {
                    document.querySelector(`#${formId} #old_error`).innerHTML = data.responseJSON.errors
                        .old_password[0];
                }

                if (data.responseJSON.errors.password) {
                    document.querySelector(`#${formId} #new_error`).innerHTML = data.responseJSON.errors
                        .password[0];
                }

                if (data.responseJSON.errors.password_confirmation) {
                    document.querySelector(`#${formId} #confirmation_error`).innerHTML = data.responseJSON.errors
                        .password_confirmation[0];
                }




            })
            .always(function() {
                // Re-enable the submit button and hide the loading spinner
                $("#edit-profile-btn").attr("disabled", false).html('Save');
            });
    }

    function getFavorite() {
        // $("#edit-profile-btn").attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        // var formData = new FormData(document.getElementById(formId));
        $.ajax({
                url: `{{ route('userFavoritesEn') }}`,
                type: "GET",
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
                // $('.close').click();
                // $('.parenttrue').attr("hidden", false);
                // clearInput();
                $("#favorites-data").empty();
                $("#favorites-data").append(data);
            })
            .fail(function(data) {

                $('.parent').attr("hidden", false);




            })
            .always(function() {
                // Re-enable the submit button and hide the loading spinner
                // $("#edit-profile-btn").attr("disabled", false).html('Save');
            });
    }

    //----------------------------------------------
    function removeMessages() {
        document.getElementById('old_error').innerHTML = '';
        document.getElementById('new_error').innerHTML = '';
        document.getElementById('confirmation_error').innerHTML = '';

    }
</script>
