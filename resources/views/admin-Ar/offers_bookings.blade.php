@extends('adminLayout-Ar.master')
@section('admincontent')

    <div class="app-content">
        <div class="app-content-header" style="width: 75%;">
            <h1 class="app-content-headerText">حجوزات العروض</h1>
            @if (\Auth::check())
                @if (\Auth::user()->is_employee == 2)
                    <button type="button" class="app-content-headerButton" data-bs-toggle="modal"
                        data-bs-target="#exampleModal3">
                        إضافة حجز
                    </button>
                    <!-- Modal -->
                    <div class="modal fade " id="exampleModal3" data-bs-backdrop="static" tabindex="-1"
                        aria-labelledby="exampleModal3Label" aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content toggle">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModal3Label">حجز جديد</h5>
                                    <button type="button" class="btn-close m-0 close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="add-form" action="" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <table style="width: 400px;"
                                            class="table-striped table-hover table-bordered m-auto text-primary myTable">

                                            <tr>

                                                <td><input type="text" class="toggle text-primary in" name="full_name"
                                                        required style="width: 100%;"></th>
                                                <td>الاسم الكامل</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-end text-danger p-1"><span id="full_name_error"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="dropdown toggle text-primary in" style="display:inline-block; ;">
            
                                                        <label class="dropdown-toggle" type="button" id="dropdownMenuButton"
                                                            data-toggle="dropdown" aria-expanded="false">
            
                                                        </label>
                                                        <span id="service-name"></span>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            
                                                            @foreach ($offers as $offer)
                                                                <option style="cursor: pointer;"
                                                                    id="service_{{ $offer->id }}"
                                                                    class="dropdown-item service_filter_option service_place_{{ $offer->place->id }}"
                                                                    value="{{ $offer->id }}" id="dservice_{{ $offer->id }}"
                                                                    onclick="setService({{ $offer->id }}, '{{ $offer->translations()->where('locale', 'ar')->first()->name }} | {{$offer->cost}}', 'service_{{ $offer->id }}', {{$offer->cost}})"
                                                                    href="#">
                                                                    {{ $offer->translations()->where('locale', 'ar')->first()->name }} | {{$offer->cost}}
                                                                </option>
                                                            @endforeach
                                                            <input type="text" id="service_id" name="offer_id" hidden>
                                                            <input type="text" id="cost" name="cost" hidden>
            
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>العرض</td>
                                            </tr>
                                            <tr>
            
                                                <td colspan="2" class="text-end text-danger p-1"><span id="service_error"></span>
                                                </td>
                                            </tr>

                                            <tr>

                                                <td><input type="number" class="toggle text-primary in" name="people_count"
                                                        required style="width: 100%;"></td>
                                                <td>عدد الأشخاص</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-end text-danger p-1"><span id="people_count_error"></span>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td><input class="toggle text-primary in" type="date" name="start_date"
                                                        required style="width: 100%;"></th>
                                                <td>تاريخ الوصول</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-end text-danger p-1"><span id="start_date_error"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input class="toggle text-primary in" type="date" name="end_date"
                                                        required style="width: 100%;"></th>
                                                <td>تاريخ المغادرة</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-end text-danger p-1"><span id="end_date_error"></span></td>
                                            </tr>


                                        </table>
                                    </div>
                                </form>
                                <div class="modal-footer">
                                    <button type="button" class="action-button active close"
                                        data-bs-dismiss="modal">إغلاق</button>
                                    <button onclick="addBooking('add-form')" type="button" id="add-booking-btn"
                                        class="app-content-headerButton">حفظ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif

        </div>
        <div class="app-content-actions" style="width:75%;">
            <input class="search-bar" placeholder="... ابحث عن طريق اسم صاحب الحجز" type="text">
            <div class="app-content-actions-wrapper">


                <div class="nav-item dropdown">
                    <button class="action-button list dropdown-toggle" data-bs-toggle="dropdown" title="ترجمة"> <i
                            class="fas fa-globe "></i> </button>

                    <div class="dropdown-menu border-0 rounded-0 m-0 toggle">
                        <a href="{{ route('offers_booking_en') }}" class="dropdown-item">الانجلزية</a>
                        <a href="{{ route('offers_booking_ar') }}" class="dropdown-item">العربية </a>

                    </div>
                </div>
                <button class="mode-switch" title="تبديل الثيم" style="margin-left:5px;">
                    <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                        <defs></defs>
                        <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                    </svg>
                </button>

            </div>
        </div>
        <div class="scroll-class" style="width:75%;">
            <div class="products-area-wrapper tableView">
                <div class="products-header">
                    <div class="product-cell">#</div>
                    <div class="product-cell">العرض</div>
                    <div class="product-cell ">صاحب الحجز</div>
                    <div class="product-cell">عدد الأشخاص</div>
                    <div class="product-cell"> المكان</div>
                    <div class="product-cell">الكلفة</div>
                    <div class="product-cell">كلفة الحجز</div>
                    <div class="product-cell">تاريخ الوصول</div>
                    <div class="product-cell">تاريخ المغادرة</div>




                </div>
                <div id="bookings-data"></div>
            </div>
        </div>
    </div>
    </div>
@endsection


<script>
    function addBooking(formId) {
        $("#add-booking-btn").attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById('add-form'));
        $.ajax({
                url: "{{ route('addOfferBookingAr') }}",
                type: "POST",
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
                removeMessages();

                $("#bookings-data").empty();
                $("#bookings-data").append(data);
                $('.close').click();
                $('.parenttrue').attr("hidden", false);
                document.getElementById(formId).reset();

            })
            .fail(function(data) {
                // $('.close').click();
                // $('.parent').attr("hidden", false);
                removeMessages();

                if (data.responseJSON.errors.full_name) {
                    document.querySelector(`#${formId} #full_name_error`).innerHTML = data.responseJSON.errors
                        .full_name[0];

                }
                if (data.responseJSON.errors.people_count) {

                    document.querySelector(`#${formId} #people_count_error`).innerHTML = data.responseJSON.errors
                        .people_count[0];

                }
                if (data.responseJSON.errors.start_date) {

                    document.querySelector(`#${formId} #start_date_error`).innerHTML = data.responseJSON.errors
                        .start_date[0];

                }
                if (data.responseJSON.errors.end_date) {

                    document.querySelector(`#${formId} #end_date_error`).innerHTML = data.responseJSON.errors
                        .end_date[0];

                }
                if (data.responseJSON.errors.offer_id) {

                    document.querySelector(`#${formId} #service_error`).innerHTML = data.responseJSON.errors
                        .offer_id[0];

                }

            })
            .always(function() {
                // Re-enable the submit button and hide the loading spinner
                $("#add-booking-btn").attr("disabled", false).html('حفظ');
            });
    }

    //---------------------------------------------------------------
    window.onload = (event) => {
        $.ajax({
                url: "{{ route('get_offers_booking_ar') }}",
                type: "GET",
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
                $("#bookings-data").append(data);
            })
            .fail(function() {
                $('.parent').attr("hidden", false);

            });
    };

    //--------------------------------------------------------

    function searchFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search");
        filter = input.value;
        table = document.getElementById("citiesTable");
        // tr = table.getElementsByTagName("tr");
        tr = table.getElementsByClassName("products-row");
        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByClassName("search-value");

            if (td) {
                txtValue = td[0].textContent || td[0].innerText;
                if (txtValue) {

                    if (txtValue.indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    }
    //--------------------------------------------
    function removeMessages() {
        document.getElementById('full_name_error').innerHTML = '';
        document.getElementById('people_count_error').innerHTML = '';
        document.getElementById('start_date_error').innerHTML = '';
        document.getElementById('end_date_error').innerHTML = '';
        document.getElementById('service_error').innerHTML = '';


    }
    //---------------------------------------------
    function setService(service_id, service, option_id, cost) {
        console.log(service_id);
        var services_options = document.querySelectorAll('[id^="service_"]');
        services_options.forEach(option => {
            option.style.setProperty("color", "#1f1c2e", "important");

        });
        document.getElementById('service-name').innerHTML = service;
        document.getElementById(option_id).style.setProperty("color", "#90aaf8", "important");
        document.getElementById('service_id').value = `${service_id}`;
        document.getElementById('cost').value = `${cost}`;
    }
    //--------------------------------------------
</script>
