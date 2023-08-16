@extends('adminLayout-En.master')
@section('admincontent')
    <div class="app-content">
        <div class="app-content-header">
            <h1 class="app-content-headerText">Transportations</h1>
            <h3 class="app-content-headerText ">"{{ $company->translations()->where('locale', 'en')->first()->name }}"</h3>

            <!-- add -->
            <button type="button" class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                Add Transportation
            </button>

            <!-- Modal -->
            <div class="modal fade " data-bs-backdrop="static" id="exampleModal3" tabindex="-1"
                aria-labelledby="exampleModal3Label" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content toggle">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModal3Label">New Transportation</h5>
                            <button type="button" class="btn-close m-0 close"
                                onclick="removeMessages(), document.getElementById('add-form').reset()"
                                data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="add-form" action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <table style="color: rgb(22, 22, 22); width: 400px;"
                                    class="table-striped table-hover table-bordered m-auto text-primary myTable">

                                    <input type="text" class="toggle text-primary in" hidden name="transport_company_id"
                                        value="{{ $company->id }}" required style="width: 100%;">

                                    <tr>
                                        <td>Car ID</td>
                                        <td><input type="number" name="carId" class="toggle text-primary in" required
                                                style="width: 100%;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><span class="text-danger p-1" id="carId_error"></span></td>
                                    </tr>
                                    
                                    <tr>
                                        <td>City</td>
                                        <td>
                                            <div class="dropdown toggle text-primary in" style="display:inline-block; ;">

                                                <label class="dropdown-toggle" type="button" id="dropdownMenuButton"
                                                    data-toggle="dropdown" aria-expanded="false">

                                                </label>
                                                <span id="city-name"></span>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    @foreach ($cities as $city)
                                                        <option style="cursor: pointer;" class="dropdown-item"
                                                            value="{{ $city->id }}" id="city_{{ $city->id }}"
                                                            onclick="setCity({{ $city->id }}, '{{ $city->translations()->where('locale', 'en')->first()->name }}', 'city_{{ $city->id }}')"
                                                            href="#">
                                                            {{ $city->translations()->where('locale', 'en')->first()->name }}
                                                        </option>
                                                    @endforeach
                                                    <input type="text" id="city_id" name="city_id" hidden>

                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td colspan="2"><span class="text-danger p-1" id="city_error"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Count Of Passengers</td>
                                        <td><input class="toggle text-primary in" type="number" name="passengers_number"
                                                required style="width: 100%;"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><span class="text-danger p-1"
                                                id="passengers_number_error"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Description(Arabic) </td>
                                        <td><input type="text" name="description_ar" class="toggle text-primary in"
                                                required style="width: 100%;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><span class="text-danger p-1"
                                                id="description_ar_error"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Description(English) </td>
                                        <td><input type="text" name="description_en" class="toggle text-primary in"
                                                required style="width: 100%;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><span class="text-danger p-1"
                                                id="description_en_error"></span></td>
                                    </tr>

                                </table>
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="action-button active close"
                                onclick="removeMessages(), document.getElementById('add-form').reset()"
                                data-bs-dismiss="modal">Close</button>
                            <button type="button" id="add-transportation-btn" onclick="addTransportation('add-form')"
                                class="app-content-headerButton">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end add -->

        <div class="app-content-actions">
            <input class="search-bar" onkeyup="searchFunction()" id="search" placeholder="Search By Car ID..." type="text">
            <div class="app-content-actions-wrapper">

               
                <div class="nav-item dropdown">
                    <button class="action-button list dropdown-toggle" data-bs-toggle="dropdown" title="Translate"> <i
                            class="fas fa-globe "></i> </button>

                    <div class="dropdown-menu border-0 rounded-0 m-0 toggle">
                        <a href="{{ route('getTransportationsEn', ['id' => $company->id]) }}"
                            class="dropdown-item">English</a>
                        <a href="{{ route('getTransportationsAr', ['id' => $company->id]) }}" class="dropdown-item">Arabic
                        </a>

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
        <div class="products-area-wrapper tableView" id="transportationsTable">
            <div class="products-header">
                <div class="product-cell">#</div>
                <div class="product-cell">Car Id</div>
                <div class="product-cell image ">City</div>
                <div class="product-cell">Count Of Passengers</div>
                <div class="product-cell">Description</div>
                <div class="product-cell ">Actions</div>

            </div>
            <div id="transportations-data">
                <?php $i = 1; ?>
                @foreach ($transportations as $transportation)
                    <div class="products-row">
                        <button class="cell-more-button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-more-vertical">
                                <circle cx="12" cy="12" r="1" />
                                <circle cx="12" cy="5" r="1" />
                                <circle cx="12" cy="19" r="1" />
                            </svg>
                        </button>
                        <div class="product-cell">
                            <span>{{ $i++ }}</span>
                        </div>

                        <div class="product-cell">
                            <span  class="search-value">{{ $transportation->carId }}</span>
                        </div>


                        <div class="product-cell">
                            <span>{{ $transportation->city->translations()->where('locale', 'en')->first()->name }}</span>
                        </div>

                        <div class="product-cell">
                            <span> {{ $transportation->passengers_number }} </span>
                        </div>
                        <div class="product-cell">
                            <span>{{ $transportation->translations()->where('locale', 'en')->first()->description }}</span>
                        </div>

                        <div class="product-cell">
                            <!-- start action -->
                            <div class="p-3">

                                <!-- delete -->

                                <!-- edit -->
                                <a href="#" class="edit p-2" data-toggle="modal"
                                    data-target="#editTransportation{{ $transportation->id }}" title="Edit"><i
                                        class="fas fa-pen"></i></a>

                                <!-- Modal -->
                                <div class="modal fade" data-backdrop="static"
                                    id="editTransportation{{ $transportation->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" onclick="removeMessages()"
                                                    data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form id="edit-form-{{ $transportation->id }}" action="" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="text" hidden name="transport_company_id"
                                                    class="toggle text-primary in" value="{{ $company->id }}">

                                                <div class="modal-body">
                                                    <table
                                                        class="table-striped table-hover table-bordered m-auto text-primary myTable"
                                                        style="width: 400px;">
                                                        <tr>
                                                            <td>Car ID</td>
                                                            <td><input type="number" name="carId" class="toggle text-primary in"
                                                                value="{{ $transportation->carId }}"></td>

                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"><span style="color: red"
                                                                    class="carId_error_edit"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>City</td>
                                                            <td>
                                                                <div class="dropdown toggle text-primary in"
                                                                    style="display:inline-block; ;">

                                                                    <label class="dropdown-toggle" type="button"
                                                                        id="dropdownMenuButtonEdit{{ $transportation->id }}"
                                                                        data-toggle="dropdown" aria-expanded="false">

                                                                    </label>
                                                                    <span
                                                                        id="city-name-{{ $transportation->id }}">{{ $transportation->city->translations()->where('locale', 'en')->first()->name }}</span>
                                                                    <div class="dropdown-menu"
                                                                        aria-labelledby="dropdownMenuButtonEdit{{ $transportation->id }}">
                                                                        @foreach ($cities as $city)
                                                                            <option
                                                                                style="cursor: pointer; @if ($city->id == $transportation->city_id) color: #90aaf8 !important; @endif"
                                                                                class="dropdown-item"
                                                                                value="{{ $city->id }}"
                                                                                id="edit_city_{{ $transportation->id }}_{{ $city->id }}"
                                                                                onclick="setEditCity({{ $city->id }}, {{ $transportation->id }}, '{{ $city->translations()->where('locale', 'en')->first()->name }}', 'edit_city_{{ $transportation->id }}_{{ $city->id }}')"
                                                                                href="#">
                                                                                {{ $city->translations()->where('locale', 'en')->first()->name }}
                                                                            </option>
                                                                        @endforeach
                                                                        <input type="text"
                                                                            id="edit_city_id_{{ $transportation->id }}"
                                                                            name="city_id"
                                                                            value="{{ $transportation->city_id }}" hidden>

                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"><span style="color: red"
                                                                    class="city_error_edit"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Count Of Passengers</td>
                                                            <td><input type="number"  name="passengers_number"
                                                                    class="toggle text-primary in"
                                                                    value="{{ $transportation->passengers_number }}"></td>

                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"><span style="color: red"
                                                                    class="passengers_number_error_edit"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Description(Arabic) </td>
                                                            <td><input type="text" class="toggle text-primary in" name="description_ar"
                                                                    value="{{ $transportation->translations()->where('locale', 'ar')->first()->description }}" required style="width: 100%;"></td>
                                                        </tr>

                                                        <tr>
                                                            <td>Specifications(English) </td>
                                                            <td><input type="text" class="toggle text-primary in" name="description_en"
                                                                    value="{{ $transportation->translations()->where('locale', 'en')->first()->description }}" required style="width: 100%;"></td>
                                                        </tr>


                                                    </table>

                                                </div>
                                            </form>
                                            <div class="modal-footer">
                                                <button type="button" class="action-button active close"  onclick="removeMessages()"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" id="edit-transportation-btn-{{ $transportation->id }}"
                                                    onclick="editTransportation('edit-form-{{ $transportation->id }}', {{ $transportation->id }})" class="app-content-headerButton">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end edit -->
                                <a href="#" class="delete" data-toggle="modal" data-target="#deleteCompany{{ $transportation->id }}"
                                    title="Delete" data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                                <!-- Modal -->
                                <div class="modal fade" id="deleteCompany{{ $transportation->id }}" tabindex="-1"
                                    aria-labelledby="exampleModal2Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form id="delete-form-{{ $transportation->id }}" action=""
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="text" name="id" value="{{ $transportation->id }}"
                                                    hidden>
                                                <input type="text" name="transport_company_id"
                                                    value="{{ $company->id }}" hidden>
                                            <div class="modal-body">
                                                Are you sure that you want to delete This transportation (<span
                                                style="color: #90aaf8;">{{ $transportation->carId }}</span>)?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="action-button active close"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" id="delete-transportation-btn-{{ $transportation->id }}"
                                                    onclick="deleteTransportation(`delete-form-{{ $transportation->id }}`, {{ $transportation->id }})" class="app-content-headerButton">Yes</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end delete -->


                        </div>
                        <!-- end action -->
                    </div>
                @endforeach
            </div>

        </div>

    </div>
    </div>
    </div>
    </div>
@endsection

<script>
    function addTransportation(formId) {
        $("#add-transportation-btn").attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById('add-form'));
        $.ajax({
                url: "{{ route('addTransportationEn') }}",
                type: "POST",
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
                $("#transportations-data").empty();
                $("#transportations-data").append(data);
                $('.close').click();
                $('.parenttrue').attr("hidden", false);
                document.getElementById(formId).reset();

            })
            .fail(function(data) {
                // $('.close').click();
                // $('.parent').attr("hidden", false);
                removeMessages();

                if (data.responseJSON.errors.carId) {
                    document.querySelector(`#${formId} #carId_error`).innerHTML = data.responseJSON.errors.carId[0];

                }
                if (data.responseJSON.errors.city_id) {

                    document.querySelector(`#${formId} #city_error`).innerHTML = data.responseJSON.errors.city_id[
                        0];

                }
                if (data.responseJSON.errors.passengers_number) {

                    document.querySelector(`#${formId} #passengers_number_error`).innerHTML = data.responseJSON
                        .errors.passengers_number[0];

                }

            })
            .always(function() {
                // Re-enable the submit button and hide the loading spinner
                $("#add-transportation-btn").attr("disabled", false).html('حفظ');
            });
    }
    //----------------------------------------------------------

    function editTransportation(formId, id) {

        $("#edit-transportation-btn-" + id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById(formId));
        formData.append('id', id);
        $.ajax({
                url: `{{ route('editTransportationEn') }}`,
                type: "POST",
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
                $("#transportations-data").empty();
                $("#transportations-data").append(data);
                $('.close').click();
                $('.parenttrue').attr("hidden", false);
            })
            .fail(function(data) {
                removeMessages();
                // $('.close').click();
                // $('.parent').attr("hidden", false);
                if (data.responseJSON.errors.carId) {
                    document.querySelector(`#${formId} .carId_error_edit`).innerHTML = data.responseJSON.errors
                        .carId[0];

                }
                if (data.responseJSON.errors.city_id) {

                    document.querySelector(`#${formId} .city_error_edit`).innerHTML = data.responseJSON.errors
                        .city_id[0];

                }
                if (data.responseJSON.errors.passengers_number) {

                    document.querySelector(`#${formId} .passengers_number_error_edit`).innerHTML = data.responseJSON
                        .errors.passengers_number[0];

                }

            })
            .always(function() {
                // Re-enable the submit button and hide the loading spinner
                $("#edit-transportation-btn-" + id).attr("disabled", false).html('حفظ');
            });
    }

    //---------------------------------------------------------------
    function deleteTransportation(formId, id) {
        $("#delete-transportation-btn-" + id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');

        var formData = new FormData(document.getElementById(formId));
        $.ajax({
                url: `{{ route('deleteTransportationEn') }}`,
                type: "POST",
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
                $("#transportations-data").empty();
                $("#transportations-data").append(data);
                $('.close').click();
                $('.parenttrue').attr("hidden", false);
            })
            .fail(function() {
                $('.close').click();
                $('.parent').attr("hidden", false);
            })
            .always(function() {
                // Re-enable the submit button and hide the loading spinner
                $("#delete-transportation-btn-" + id).attr("disabled", false).html('نعم');
            });
    }

    //---------------------------------------------------------------
    // window.onload = (event) => {
    //     $.ajax({
    //         url: "{{ route('getCategoriesAr') }}" ,
    //         type: "GET",
    //         processData: false, 
    //         cache: false,
    //         contentType: false,
    //     }) 
    //     .done(function(data){
    //         $("#categories-data").append(data);
    //     })
    //     .fail(function(){
    //     $('.parent').attr("hidden", false);

    //     });
    // };
    //--------------------------------------------------------

    function searchFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search");
        filter = input.value;
        table = document.getElementById("transportationsTable");
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
        document.getElementById('carId_error').innerHTML = '';
        document.getElementById('city_error').innerHTML = '';
        document.getElementById('passengers_number_error').innerHTML = '';

        const carId = document.querySelectorAll('.carId_error_edit');
        carId.forEach(id => {
            id.innerHTML = '';
        });

        const cities = document.querySelectorAll('.city_error_edit');
        cities.forEach(city => {
            city.innerHTML = '';
        });

        const numbers = document.querySelectorAll('.passengers_number_error_edit');
        numbers.forEach(number => {
            number.innerHTML = '';
        });
    }
    //--------------------------------------------
    function setCity(city_id, city, option_id) {
        var cities_options = document.querySelectorAll('[id^="city_"]');
        cities_options.forEach(option => {
            option.style.setProperty("color", "#1f1c2e", "important");

        });
        document.getElementById('city-name').innerHTML = city;
        document.getElementById(option_id).style.setProperty("color", "#90aaf8", "important");
        document.getElementById('city_id').value = `${city_id}`;
    }
    //--------------------------------------------
    function setEditCity(city_id, transportation_id, city, option_id) {
        var cities_options = document.querySelectorAll('[id^="edit_city_"]');
        cities_options.forEach(option => {
            option.style.setProperty("color", "#1f1c2e", "important");

        });
        document.getElementById('city-name-' + transportation_id).innerHTML = city;
        document.getElementById(option_id).style.setProperty("color", "#90aaf8", "important");
        document.getElementById('edit_city_id_' + transportation_id).value = `${city_id}`;
    }
    //--------------------------------------------
</script>
