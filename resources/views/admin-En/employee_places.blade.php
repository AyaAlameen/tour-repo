@extends('adminLayout-En.master')
@section('admincontent')
    <div class="app-content">
        <div class="app-content-header" style="width: 87%;">
            <h1 class="app-content-headerText">Employees</h1>

            <!-- add -->
            <button type="button" class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                Add Employee
            </button>

            <!-- Modal -->
            <div class="modal fade " id="exampleModal3" data-bs-backdrop="static" tabindex="-1"
                aria-labelledby="exampleModal3Label" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content toggle">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModal3Label">New employee</h5>
                            <button type="button" class="btn-close m-0 close"
                                onclick="removeMessages(), document.getElementById('add-form').reset()"
                                data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="add-form" action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <table style="width: 400px; direction: rtl;"
                                    class="table-striped table-hover table-bordered m-auto text-primary myTable">

                                    <tr>

                                        <td><input type="text" class="toggle text-primary in" name="full_name_ar"
                                                required style="width: 100%;"></th>
                                        <td>(العربية) Full Name</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-end text-danger p-1"><span id="name_ar_error"></span>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td><input type="text" class="toggle text-primary in" name="full_name_en"
                                                required style="width: 100%;"></td>
                                        <td>(الإنجليزية) Full Name</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-end text-danger p-1"><span id="name_en_error"></span>
                                        </td>
                                    </tr>


                                    <tr>

                                        <td><input class="toggle text-primary in" type="text" name="user_name" required
                                                style="width: 100%;"></th>
                                        <td> UserName</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-end text-danger p-1"><span
                                                id="user_name_error"></span></td>
                                    </tr>
                                    <tr>
                                        <td><input class="toggle text-primary in" type="email" name="email" required
                                                style="width: 100%;"></th>
                                        <td>Email</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-end text-danger p-1"><span id="email_error"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="toggle text-primary in" type="password" name="password" required
                                                style="width: 100%;"></th>
                                        <td>Password</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-end text-danger p-1"><span
                                                id="password_error"></span></td>
                                    </tr>
                                    <tr>
                                        <td >image </td>
                                        <td><input type="file" class="toggle text-primary in"  name="image" required style="width: 100%;"></th>      
                                    </tr> 
                                    <tr > <td colspan="2"><span class="text-danger p-1" id="image_error"></span></td> </tr>
                                    <tr>
                                        <td>
                                            <div class="dropdown toggle text-primary in" style="display:inline-block; ;">

                                                <label class="dropdown-toggle" type="button" id="dropdownMenuButton"
                                                    data-toggle="dropdown" aria-expanded="false">

                                                </label>
                                                <span id="place-name"></span>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    @foreach ($places as $place)
                                                        <option style="cursor: pointer;" class="dropdown-item"
                                                            value="{{ $place->id }}" id="place_{{ $place->id }}"
                                                            onclick="setPlace({{ $place->id }}, '{{ $place->translations()->where('locale', 'ar')->first()->name }}', 'place_{{ $place->id }}')"
                                                            href="#">
                                                            {{ $place->translations()->where('locale', 'ar')->first()->name }}
                                                        </option>
                                                    @endforeach
                                                    <input type="text" id="place_id" name="place_id" hidden>

                                                </div>
                                            </div>
                                        </td>
                                        <td>Workplace</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2" class="text-end text-danger p-1"><span id="place_error"></span>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="action-button active close"
                                onclick="removeMessages(), document.getElementById('add-form').reset()"
                                data-bs-dismiss="modal">Close</button>
                            <button type="button" id="add-employee-btn" onclick="addEmployee('add-form')"
                                class="app-content-headerButton">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end add -->

        <div class="app-content-actions" style="width: 87%;">
            <input class="search-bar" onkeyup="searchFunction()" id="search" placeholder="search By Full Name... "
                type="text">
            <div class="app-content-actions-wrapper">

              

                <div class="nav-item dropdown">
                    <button class="action-button list dropdown-toggle" data-bs-toggle="dropdown" title="ترجمة"> <i
                            class="fas fa-globe "></i> </button>

                    <div class="dropdown-menu border-0 rounded-0 m-0 toggle">
                        <a href="{{ route('emp-places-Ar') }}" class="dropdown-item"> Arabic</a>
                        <a href="{{ route('emp-places-En') }}" class="dropdown-item">English </a>

                    </div>
                </div>
                <button class="mode-switch" title="Switch mode" style="margin-left:5px;">
                    <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                        <defs></defs>
                        <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                    </svg>
                </button>

            </div>
        </div>
        <div class="scroll-class" style="width:87%;">
        <div class="products-area-wrapper tableView " id="employeesTable">
            <div class="products-header">
                <div class="product-cell">#</div>
                <div class="product-cell"> Full Name</div>
                <div class="product-cell "> UserName </div>
                <div class="product-cell ">Email</div>
                <div class="product-cell ">Image</div>
                <div class="product-cell ">Place</div>
                <div class="product-cell ">Events</div>
            </div>

            <div id="employees-data">

            </div>

        </div>
    </div>
    </div>

    </div>
</div>
@endsection


<script>
    function addEmployee(formId) {
        $("#add-employee-btn").attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById('add-form'));
        $.ajax({
                url: "{{ route('addPlaceEmployeeEn') }}",
                type: "POST",
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
                $("#employees-data").empty();
                $("#employees-data").append(data);
                $('.close').click();
                $('.parenttrue').attr("hidden", false);
                // clearInput();
                document.getElementById(formId).reset();


            })
            .fail(function(data) {
                // $('.close').click();
                // $('.parent').attr("hidden", false);
                removeMessages();

                if (data.responseJSON.errors.full_name_ar) {
                    document.querySelector(`#${formId} #name_ar_error`).innerHTML = data.responseJSON.errors
                        .full_name_ar[0];

                }
                if (data.responseJSON.errors.full_name_en) {

                    document.querySelector(`#${formId} #name_en_error`).innerHTML = data.responseJSON.errors
                        .full_name_en[0];

                }
                if (data.responseJSON.errors.user_name) {

                    document.querySelector(`#${formId} #user_name_error`).innerHTML = data.responseJSON.errors
                        .user_name[0];

                }
                if (data.responseJSON.errors.email) {

                    document.querySelector(`#${formId} #email_error`).innerHTML = data.responseJSON.errors.email[0];

                }
                if (data.responseJSON.errors.password) {

                    document.querySelector(`#${formId} #password_error`).innerHTML = data.responseJSON.errors
                        .password[0];

                }
                if (data.responseJSON.errors.place_id) {

                    document.querySelector(`#${formId} #place_error`).innerHTML = data.responseJSON.errors
                        .place_id[0];

                }

            })
            .always(function() {
                // Re-enable the submit button and hide the loading spinner
                $("#add-employee-btn").attr("disabled", false).html('Save');
            });
    }
    //----------------------------------------------------------

    function editEmployee(formId, id) {
        $("#edit-employee-btn-" + id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById(formId));
        formData.append('id', id);
        $.ajax({
                url: `{{ route('editPlaceEmployeeEn') }}`,
                type: "POST",
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {

                $("#employees-data").empty();
                $("#employees-data").append(data);
                $('.close').click();
                $('.parenttrue').attr("hidden", false);
                // clearInput();
            })
            .fail(function(data) {
                removeMessages();
                // $('.close').click();
                // $('.parent').attr("hidden", false);
                if (data.responseJSON.errors.full_name_ar) {
                    document.querySelector(`#${formId} .name_ar_error_edit`).innerHTML = data.responseJSON.errors
                        .full_name_ar[0];

                }
                if (data.responseJSON.errors.full_name_en) {

                    document.querySelector(`#${formId} .name_en_error_edit`).innerHTML = data.responseJSON.errors
                        .full_name_en[0];

                }
                if (data.responseJSON.errors.user_name) {

                    document.querySelector(`#${formId} .user_name_error_edit`).innerHTML = data.responseJSON.errors
                        .user_name[0];

                }
                if (data.responseJSON.errors.email) {

                    document.querySelector(`#${formId} .email_error_edit`).innerHTML = data.responseJSON.errors
                        .email[0];

                }
                if (data.responseJSON.errors.place_id) {

                    document.querySelector(`#${formId} .place_error_edit`).innerHTML = data.responseJSON.errors
                        .place_id[0];

                }

            })
            .always(function() {
                // Re-enable the submit button and hide the loading spinner
                $("#edit-employee-btn-" + id).attr("disabled", false).html('Save Changes');
            });
    }

    //---------------------------------------------------------------
    function deleteEmployee(formId, id) {
        $("#delete-employee-btn-" + id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');

        var formData = new FormData(document.getElementById(formId));
        $.ajax({
                url: `{{ route('deletePlaceEmployeeEn') }}`,
                type: "POST",
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
                $("#employees-data").empty();
                $("#employees-data").append(data);
                $('.close').click();
                $('.parenttrue').attr("hidden", false);
                // clearInput();
            })
            .fail(function() {
                $('.close').click();
                $('.parent').attr("hidden", false);

            })
            .always(function() {
                // Re-enable the submit button and hide the loading spinner
                $("#delete-employee-btn-" + id).attr("disabled", false).html('Yes');
            });
    }

    //---------------------------------------------------------------
    window.onload = (event) => {
        $.ajax({
                url: "{{ route('getPlacesEmployeesEn') }}",
                type: "GET",
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
                $("#employees-data").append(data);
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
        table = document.getElementById("employeesTable");
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

    //----------------------------------------------
    function removeMessages() {
        document.getElementById('name_ar_error').innerHTML = '';
        document.getElementById('name_en_error').innerHTML = '';
        document.getElementById('user_name_error').innerHTML = '';
        document.getElementById('email_error').innerHTML = '';
        document.getElementById('password_error').innerHTML = '';


        const name_ar = document.querySelectorAll('.name_ar_error_edit');
        name_ar.forEach(name => {
            name.innerHTML = '';
        });

        const name_en = document.querySelectorAll('.name_en_error_edit');
        name_en.forEach(name => {
            name.innerHTML = '';
        });

        const user_names = document.querySelectorAll('.user_name_error_edit');
        user_names.forEach(user_name => {
            user_name.innerHTML = '';
        });

        const emails = document.querySelectorAll('.email_error_edit');
        emails.forEach(email => {
            email.innerHTML = '';
        });

        const places = document.querySelectorAll('.place_error_edit');
        places.forEach(place => {
            place.innerHTML = '';
        });
    }
        //--------------------------------------------

        function setPlace(place_id, place, option_id) {
        var places_options = document.querySelectorAll('[id^="place_"]');
        places_options.forEach(option => {
            option.style.setProperty("color", "#1f1c2e", "important");

        });
        document.getElementById('place-name').innerHTML = place;
        document.getElementById(option_id).style.setProperty("color", "#90aaf8", "important");
        document.getElementById('place_id').value = `${place_id}`;
    }
    //--------------------------------------------
    function setEditPlace(place_id, employee_id, place, option_id) {
        var places_options = document.querySelectorAll('[id^="edit_place_"]');
        places_options.forEach(option => {
            option.style.setProperty("color", "#1f1c2e", "important");

        });
        document.getElementById('place-name-' + employee_id).innerHTML = place;
        document.getElementById(option_id).style.setProperty("color", "#90aaf8", "important");
        document.getElementById('edit_place_id_' + employee_id).value = `${place_id}`;
    }
    //--------------------------------------------
</script>
