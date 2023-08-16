@extends('adminLayout-En.master')
@section('admincontent')

    <div class="app-content">
        <div class="app-content-header" style="width: 85%;">
            <h1 class="app-content-headerText">Places Bookings</h1>
            @if (\Auth::check())
                @if (\Auth::user()->is_employee == 2)
                    <button type="button" class="app-content-headerButton" data-bs-toggle="modal"
                        data-bs-target="#exampleModal3">
                        add booking
                    </button>
                    <!-- Modal -->
                    <div class="modal fade " id="exampleModal3" data-bs-backdrop="static" tabindex="-1"
                        aria-labelledby="exampleModal3Label" aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content toggle">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModal3Label">New Booking</h5>
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
                                                <td>Cost</td>
                                                <td><input type="text" disabled class="toggle text-primary in"
                                                        value="{{ \App\Models\UserPermission::where('user_id', \Auth::user()->id)->first()->place()->first()->cost }}"
                                                        required style="width: 100%;"></th>
                                                
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-danger p-1"><span id="cost_error"></span>
                                                </td>
                                            </tr>
                                            <input type="text" hidden class="toggle text-primary in" name="cost"
                                                value="{{ \App\Models\UserPermission::where('user_id', \Auth::user()->id)->first()->place()->first()->cost }}"
                                                required style="width: 100%;">
                                            <tr>
                                                <td>full name</td>
                                                <td><input type="text" class="toggle text-primary in" name="full_name"
                                                        required style="width: 100%;"></th>
                                                
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-danger p-1"><span id="full_name_error"></span>
                                                </td>
                                            </tr>
                                            

                                            <tr>
                                                <td>People_count</td>
                                                <td><input type="number" class="toggle text-primary in" name="people_count"
                                                        required style="width: 100%;"></td>
                                                
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-danger p-1"><span id="people_count_error"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Access date</td>
                                                <td><input class="toggle text-primary in" type="date" name="start_date"
                                                        required style="width: 100%;"></th>
                                                
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-danger p-1"><span id="start_date_error"></span>
                                                </td>
                                            </tr>


                                        </table>
                                    </div>
                                </form>
                                <div class="modal-footer">
                                    <button type="button" class="action-button active close"
                                        data-bs-dismiss="modal">close</button>
                                    <button onclick="addBooking('add-form')" type="button" id="add-booking-btn"
                                        class="app-content-headerButton">save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif

        </div>
        <div class="app-content-actions" style="width:85%;">
            <input class="search-bar" placeholder="Search..." type="text">
            <div class="app-content-actions-wrapper">


                <div class="nav-item dropdown">
                    <button class="action-button list dropdown-toggle" data-bs-toggle="dropdown" title="Translate"> <i
                            class="fas fa-globe "></i> </button>

                    <div class="dropdown-menu border-0 rounded-0 m-0 toggle">
                        <a href="{{ route('places_booking_en') }}" class="dropdown-item">English</a>
                        <a href="{{ route('places_booking_ar') }}" class="dropdown-item">Arabic </a>

                    </div>
                </div>
                <button class="mode-switch" title="Switch Theme" style="margin-left:5px;">
                    <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                        <defs></defs>
                        <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                    </svg>
                </button>

            </div>
        </div>
        <div class="scroll-class" style="width:85%;">
            <div class="products-area-wrapper tableView">
                <div class="products-header">
                    <div class="product-cell">#</div>
                    <div class="product-cell">Place</div>
                    <div class="product-cell image ">client</div>
                    <div class="product-cell">people count</div>
                    <div class="product-cell">cost</div>
                    <div class="product-cell">booking cost</div>
                    <div class="product-cell">start date</div>




                </div>
                <div id="bookings-data">

                </div>
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
                url: "{{ route('addPlaceBookingEn') }}",
                type: "POST",
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
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

            })
            .always(function() {
                // Re-enable the submit button and hide the loading spinner
                $("#add-booking-btn").attr("disabled", false).html('Save');
            });
    }

    //---------------------------------------------------------------
    window.onload = (event) => {
        $.ajax({
                url: "{{ route('get_places_booking_en') }}",
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


    }
    //--------------------------------------------
</script>
