@extends('adminLayout-En.master')
@section('admincontent')
    <div class="app-content">
        <div class="app-content-header" style="width:73%;">
            <h1 class="app-content-headerText">Groups</h1>

            <!-- add -->
            <button type="button" class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                 add group
            </button>

            <!-- Modal -->
            <div class="modal fade " data-bs-backdrop="static" id="exampleModal3" tabindex="-1"
                aria-labelledby="exampleModal3Label" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content toggle">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModal3Label">New group</h5>
                            <button type="button" class="btn-close m-0 close"
                                onclick="removeMessages(), document.getElementById('add-form').reset()"
                                data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="add-form" action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <table style="color: rgb(22, 22, 22); width: 400px; direction: rtl;"
                                    class="table-striped table-hover table-bordered m-auto text-primary myTable">
                                    <tr>
                                        <td><input class="toggle text-primary in" type="text" name="name_ar" required
                                                style="width: 100%;"></td>
                                        <td>name(Arabic)</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class=" text-danger p-1"><span id="name_ar_error"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="toggle text-primary in" type="text" name="name_en" required
                                                style="width: 100%;"></td>
                                        <td>name(English)</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class=" text-danger p-1"><span id="name_en_error"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="toggle text-primary in" type="date" name="start_date" required
                                                style="width: 100%;"></td>
                                        <td>start date</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class=" text-danger p-1"><span
                                                id="start_date_error"></span></td>
                                    </tr>
                                    <tr>
                                        <td><input class="toggle text-primary in" type="date" name="end_date" required
                                                style="width: 100%;"></td>
                                        <td>end date</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class=" text-danger p-1"><span
                                                id="end_date_error"></span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="dropdown toggle text-primary in" style="display:inline-block; ;">

                                                <label class="dropdown-toggle" type="button" id="dropdownMenuButton"
                                                    data-toggle="dropdown" aria-expanded="false">

                                                </label>
                                                <span id="guide-name"></span>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    @foreach ($guides as $guide)
                                                        <option style="cursor: pointer; text-align: right;" class="dropdown-item"
                                                            value="{{ $guide->id }}" id="guide_{{ $guide->id }}"
                                                            onclick="setGuide({{ $guide->id }}, '{{ $guide->translations()->where('locale', 'en')->first()->name }}', 'guide_{{ $guide->id }}')"
                                                            href="#">
                                                            {{ $guide->translations()->where('locale', 'en')->first()->name }}
                                                        </option>
                                                    @endforeach
                                                    <input type="text" id="guide_id" name="tourist_guide_id" hidden>

                                                </div>
                                            </div>
                                        </td>
                                        <td>tourist guide</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class=" text-danger p-1"><span id="guide_error"></span>
                                        </td>
                                    </tr>

                                    <tr>

                                        <td>
                                            <textarea class="toggle text-primary in mt-2" name="description_ar" required style="width: 100%; height:27.5px;"></textarea>
                                        </td>
                                        <td>description (Arabic)</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class=" text-danger p-1"><span id="description_ar_error"></span>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td>
                                            <textarea class="toggle text-primary in mt-2" name="description_en" required style="width: 100%; height:27.5px;"></textarea>
                                        </td>
                                        <td>description(English)</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class=" text-danger p-1"><span id="description_en_error"></span>
                                        </td>
                                    </tr>
                                    
                                    <tr>

                                        <td><input class="toggle text-primary in" type="number" name="people_count"
                                                required style="width: 100%;"></td>
                                        <td> people count</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class=" text-danger p-1"><span
                                                id="people_count_error"></span></td>
                                    </tr>
                                    <tr>

                                        <td><input class="toggle text-primary in" type="number" name="cost" required
                                                style="width: 100%;"></td>
                                        <td>cost</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class=" text-danger p-1"><span id="cost_error"></span>
                                        </td>
                                    </tr>



                                </table>
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" onclick="removeMessages(), document.getElementById('add-form').reset()"
                                class="action-button active close" data-bs-dismiss="modal">close</button>
                            <button type="button" id="add-group-btn" onclick="addGroup('add-form')"
                                class="app-content-headerButton">save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end add -->

        <div class="app-content-actions" style="width:73%;">
            <input class="search-bar" placeholder="search..." type="text">
            <div class="app-content-actions-wrapper">
                <!-- filter -->
                {{-- <div class="filter-button-wrapper">
                    <button class="action-button filter jsFilter"><span>Filter</span><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-filter">
                            <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" />
                        </svg></button>
                    <div class="filter-menu">
                        <label>الدليل السياحي</label>
                        <select>
                            <option>All</option>
                            <option>Furniture</option>
                            <option>Decoration</option>
                            <option>Kitchen</option>
                            <option>Bathroom</option>
                        </select>

                        <div class="filter-menu-buttons">

                            <button class="filter-button apply">
                                أوافق
                            </button>
                        </div>
                    </div>
                </div> --}}
                <!-- end filter -->
              
                <div class="nav-item dropdown">
                    <button class="action-button list dropdown-toggle" data-bs-toggle="dropdown" title="ترجمة"> <i
                            class="fas fa-globe "></i> </button>

                    <div class="dropdown-menu border-0 rounded-0 m-0 toggle">
                        <a href="{{ route('groupe_ar') }}" class="dropdown-item"> Arabic</a>
                        <a href="{{ route('groupe_en') }}" class="dropdown-item">English </a>

                    </div>
                </div>
                <button class="mode-switch" title="sitch thim" style="margin-left:5px;">
                    <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                        <defs></defs>
                        <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="scroll-class" style="width:73%;">
            <div class="products-area-wrapper tableView">
                <div class="products-header">
                    <div class="product-cell">#</div>
                    <div class="product-cell">name</div>
                    <div class="product-cell">tourist guide</div>
                    <div class="product-cell">start date </div> 
                    <div class="product-cell">end date </div>
                    <div class="product-cell">people count</div>
                    <div class="product-cell">cost</div>
                    <div class="product-cell">description</div>
                    <div class="product-cell ">actions</div>

                </div>
                <div id="groups-data">

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

<script>
    function addGroup(formId) {
        $("#add-group-btn").attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById('add-form'));
        $.ajax({
                url: "{{ route('addGroupEn') }}",
                type: "POST",
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
                $("#groups-data").empty();
                $("#groups-data").append(data);
                $('.close').click();
                $('.parenttrue').attr("hidden", false);
                // clearInput();
                document.getElementById(formId).reset();


            })
            .fail(function(data) {
                // $('.close').click();
                // $('.parent').attr("hidden", false);
                removeMessages();

                if (data.responseJSON.errors.name_ar) {
                    document.querySelector(`#${formId} #name_ar_error`).innerHTML = data.responseJSON.errors
                        .name_ar[0];

                }
                if (data.responseJSON.errors.name_en) {

                    document.querySelector(`#${formId} #name_en_error`).innerHTML = data.responseJSON.errors
                        .name_en[0];

                }
                if (data.responseJSON.errors.start_date) {

                    document.querySelector(`#${formId} #start_date_error`).innerHTML = data.responseJSON.errors
                        .start_date[0];

                }
                if (data.responseJSON.errors.end_date) {

                    document.querySelector(`#${formId} #end_date_error`).innerHTML = data.responseJSON.errors
                        .end_date[0];

                }
                if (data.responseJSON.errors.tourist_guide_id) {

                    document.querySelector(`#${formId} #guide_error`).innerHTML = data.responseJSON.errors
                        .tourist_guide_id[0];

                }
                if (data.responseJSON.errors.people_count) {

                    document.querySelector(`#${formId} #people_count_error`).innerHTML = data.responseJSON.errors
                        .people_count[0];

                }
                if (data.responseJSON.errors.cost) {

                    document.querySelector(`#${formId} #cost_error`).innerHTML = data.responseJSON.errors.cost[0];

                }

            })
            .always(function() {
                // Re-enable the submit button and hide the loading spinner
                $("#add-group-btn").attr("disabled", false).html('Save');
            });
    }
    //----------------------------------------------------------

    function editGroup(formId, id) {

        $("#edit-group-btn-" + id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById(formId));
        formData.append('id', id);
        $.ajax({
                url: `{{ route('editGroupEn') }}`,
                type: "POST",
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {

                $("#groups-data").empty();
                $("#groups-data").append(data);
                $('.close').click();
                $('.parenttrue').attr("hidden", false);
                // clearInput();
            })
            .fail(function(data) {
                removeMessages();
                // $('.close').click();
                // $('.parent').attr("hidden", false);
                if (data.responseJSON.errors.name_ar) {
                    document.querySelector(`#${formId} .name_ar_error_edit`).innerHTML = data.responseJSON.errors
                        .name_ar[0];

                }
                if (data.responseJSON.errors.name_en) {

                    document.querySelector(`#${formId} .name_en_error_edit`).innerHTML = data.responseJSON.errors
                        .name_en[0];

                }
                if (data.responseJSON.errors.start_date) {

                    document.querySelector(`#${formId} .start_date_error_edit`).innerHTML = data.responseJSON.errors
                        .start_date[0];

                }
                if (data.responseJSON.errors.end_date) {

                    document.querySelector(`#${formId} .end_date_error_edit`).innerHTML = data.responseJSON.errors
                        .end_date[0];

                }
                if (data.responseJSON.errors.tourist_guide_id) {

                    document.querySelector(`#${formId} .guide_error_edit`).innerHTML = data.responseJSON.errors
                        .tourist_guide_id[0];

                }
                if (data.responseJSON.errors.people_count) {

                    document.querySelector(`#${formId} .people_count_error_edit`).innerHTML = data.responseJSON
                        .errors.people_count[0];

                }
                if (data.responseJSON.errors.cost) {

                    document.querySelector(`#${formId} .cost_error_edit`).innerHTML = data.responseJSON.errors.cost[
                        0];

                }

            })
            .always(function() {
                // Re-enable the submit button and hide the loading spinner
                $("#edit-group-btn-" + id).attr("disabled", false).html('Save Changes');
            });
    }

    //---------------------------------------------------------------
    function deleteGroup(formId, id) {
        $("#delete-group-btn-" + id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');

        var formData = new FormData(document.getElementById(formId));
        $.ajax({
                url: `{{ route('deleteGroupEn') }}`,
                type: "POST",
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
                $("#groups-data").empty();
                $("#groups-data").append(data);
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
                $("#delete-group-btn-" + id).attr("disabled", false).html('Yes');
            });
    }
    

    //---------------------------------------------------------------
    window.onload = (event) => {
        $.ajax({
                url: "{{ route('getGroupsEn') }}",
                type: "GET",
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
                $("#groups-data").append(data);
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
        table = document.getElementById("groupsTable");
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
        document.getElementById('start_date_error').innerHTML = '';
        document.getElementById('end_date_error').innerHTML = '';
        document.getElementById('guide_error').innerHTML = '';
        document.getElementById('people_count_error').innerHTML = '';
        document.getElementById('cost_error').innerHTML = '';
        

        const name_ar = document.querySelectorAll('.name_ar_error_edit');
        name_ar.forEach(name => {
            name.innerHTML = '';
        });

        const name_en = document.querySelectorAll('.name_en_error_edit');
        name_en.forEach(name => {
            name.innerHTML = '';
        });
        const start_dates = document.querySelectorAll('.start_date_error_edit');
        start_dates.forEach(start_date => {
            start_date.innerHTML = '';
        });
        const end_dates = document.querySelectorAll('.end_date_error_edit');
        end_dates.forEach(end_date => {
            end_date.innerHTML = '';
        });

        const places = document.querySelectorAll('.guide_error_edit');
        places.forEach(place => {
            place.innerHTML = '';
        });
        const people_counts = document.querySelectorAll('.people_count_error_edit');
        people_counts.forEach(people_count => {
            people_count.innerHTML = '';
        });
        const costs = document.querySelectorAll('.cost_error_edit');
        costs.forEach(cost => {
            cost.innerHTML = '';
        });
        
    }
    //--------------------------------------------
    function setGuide(guide_id, guide, option_id) {
        var guides_options = document.querySelectorAll('[id^="guide_"]');
        guides_options.forEach(option => {
            option.style.setProperty("color", "#1f1c2e", "important");

        });
        document.getElementById('guide-name').innerHTML = guide;
        document.getElementById(option_id).style.setProperty("color", "#EB455F", "important");
        document.getElementById('guide_id').value = `${guide_id}`;
    }
    //--------------------------------------------
    function setEditGuide(guide_id, group_id, guide, option_id) {
        var guides_options = document.querySelectorAll('[id^="edit_guide_"]');
        guides_options.forEach(option => {
            option.style.setProperty("color", "#1f1c2e", "important");

        });
        document.getElementById('guide-name-' + group_id).innerHTML = guide;
        document.getElementById(option_id).style.setProperty("color", "#EB455F", "important");
        document.getElementById('edit_guide_id_' + group_id).value = `${guide_id}`;
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
    function setDistrict(district_id, district, option_id) {
        var districts_options = document.querySelectorAll('[id^="district_"]');
        districts_options.forEach(option => {
            option.style.setProperty("color", "#1f1c2e", "important");

        });
        document.getElementById('district-name').innerHTML = district;
        document.getElementById(option_id).style.setProperty("color", "#90aaf8", "important");
        document.getElementById('district_id').value = `${district_id}`;
    }
    //--------------------------------------------
    function setEditDistrict(district_id, place_id, district, option_id) {
        var districts_options = document.querySelectorAll('[id^="edit_district_"]');
        districts_options.forEach(option => {
            option.style.setProperty("color", "#1f1c2e", "important");

        });
        document.getElementById('district-name-' + place_id).innerHTML = district;
        document.getElementById(option_id).style.setProperty("color", "#90aaf8", "important");
        document.getElementById('edit_district_id_' + place_id).value = `${district_id}`;
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

    function setService(service_id, service, option_id) {
        var services_options = document.querySelectorAll('[id^="service_"]');
        services_options.forEach(option => {
            option.style.setProperty("color", "#1f1c2e", "important");

        });
        document.getElementById('service-name').innerHTML = service;
        document.getElementById(option_id).style.setProperty("color", "#90aaf8", "important");
        document.getElementById('service_id').value = `${service_id}`;
    }

    //--------------------------------------------
    function filterDistricts(city_id) {
        var districts = document.querySelectorAll(`.district_filter_option`);
        var city_districts = document.querySelectorAll(`.district_city_${city_id}`);

        districts.forEach(district => {
            district.setAttribute("hidden", true);

        });
        city_districts.forEach(district => {
            district.removeAttribute("hidden");

        });
        document.getElementById('district_id').value = "";
        document.getElementById('district-name').innerHTML = '';
        var districts_options = document.querySelectorAll('[id^="district_"]');
        districts_options.forEach(option => {
            option.style.setProperty("color", "#1f1c2e", "important");

        });
    }
    //--------------------------------------------
    function filterPlaces(district_id) {
        var places = document.querySelectorAll(`.place_filter_option`);
        var district_places = document.querySelectorAll(`.place_district_${district_id}`);

        places.forEach(place => {
            place.setAttribute("hidden", true);

        });
        district_places.forEach(place => {
            place.removeAttribute("hidden");

        });
        document.getElementById('place_id').value = "";
        document.getElementById('place-name').innerHTML = '';
        var places_options = document.querySelectorAll('[id^="place_"]');
        places_options.forEach(option => {
            option.style.setProperty("color", "#1f1c2e", "important");

        });
    }
    //--------------------------------------------
    function filterServices(place_id) {
        var services = document.querySelectorAll(`.service_filter_option`);
        var place_services = document.querySelectorAll(`.service_place_${place_id}`);

        services.forEach(service => {
            service.setAttribute("hidden", true);

        });
        place_services.forEach(service => {
            service.removeAttribute("hidden");

        });
        document.getElementById('service_id').value = "";
        document.getElementById('service-name').innerHTML = '';
        var services_options = document.querySelectorAll('[id^="service_"]');
        services_options.forEach(option => {
            option.style.setProperty("color", "#1f1c2e", "important");

        });
    }
    //--------------------------------------------
    function addDestination(formId) {
        $("#add-dest-btn").attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById('add-dest-form'));
        $.ajax({
                url: "{{ route('addGroupDestinationEn') }}",
                type: "POST",
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
                $("#groups-data").empty();
                $("#groups-data").append(data);
                $('.close').click();
                $('.parenttrue').attr("hidden", false);
                // clearInput();
                document.getElementById(formId).reset();
                document.getElementById('group_id').value = '';


            })
            .fail(function(data) {
                // $('.close').click();
                // $('.parent').attr("hidden", false);
                removeMessages();

                if (data.responseJSON.errors.city_id) {
                    document.querySelector(`#${formId} #city_error`).innerHTML = data.responseJSON.errors
                        .city_id[0];

                }
                if (data.responseJSON.errors.district_id) {

                    document.querySelector(`#${formId} #district_error`).innerHTML = data.responseJSON.errors
                        .district_id[0];

                }
                if (data.responseJSON.errors.place_id) {

                    document.querySelector(`#${formId} #place_error`).innerHTML = data.responseJSON.errors
                        .place_id[0];

                }
                if (data.responseJSON.errors.service_id) {

                    document.querySelector(`#${formId} #service_id_error`).innerHTML = data.responseJSON.errors
                        .service_id[0];

                }
                

            })
            .always(function() {
                // Re-enable the submit button and hide the loading spinner
                $("#add-dest-btn").attr("disabled", false).html('Save');
            });
    }
    //--------------------------------------------
    function deleteDist(formId, id) {
        $("#delete-dist-btn-" + id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');

        var formData = new FormData(document.getElementById(formId));
        formData.append('id', id);
        console.log(id);
        $.ajax({
                url: `{{ route('deleteDistEn') }}`,
                type: "POST",
                data: formData,
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
                $("#groups-data").empty();
                $("#groups-data").append(data);
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
                $("#delete-dist-btn-" + id).attr("disabled", false).html('<i class="fas fa-trash"></i>');
            });
    }
    //--------------------------------------------
    function setGroupId(group_id){
        document.getElementById('group_id').value = `${group_id}`;
    }
    //--------------------------------------------
    function setGroupIdForCompany(group_id){
        document.getElementById('group_id_for_company').value = `${group_id}`;
    }
    //--------------------------------------------

    function setCompany(city_id, city, option_id) {
        var cities_options = document.querySelectorAll('[id^="company_"]');
        cities_options.forEach(option => {
            option.style.setProperty("color", "#1f1c2e", "important");

        });
        document.getElementById('company-name').innerHTML = city;
        document.getElementById(option_id).style.setProperty("color", "#90aaf8", "important");
        document.getElementById('company_id').value = `${city_id}`;
    }
    //--------------------------------------------
    function setTransportation(district_id, district, option_id) {
        var districts_options = document.querySelectorAll('[id^="transportation_"]');
        districts_options.forEach(option => {
            option.style.setProperty("color", "#1f1c2e", "important");

        });
        document.getElementById('transportation-name').innerHTML = district;
        document.getElementById(option_id).style.setProperty("color", "#90aaf8", "important");
        document.getElementById('transportation_id').value = `${district_id}`;
    }
    //--------------------------------------------
    function filterTransportations(city_id) {
        var districts = document.querySelectorAll(`.transportation_filter_option`);
        var city_districts = document.querySelectorAll(`.transportation_company_${city_id}`);

        districts.forEach(district => {
            district.setAttribute("hidden", true);

        });
        city_districts.forEach(district => {
            district.removeAttribute("hidden");

        });
        document.getElementById('transportation_id').value = "";
        document.getElementById('transportation-name').innerHTML = '';
        var districts_options = document.querySelectorAll('[id^="transportation_"]');
        districts_options.forEach(option => {
            option.style.setProperty("color", "#1f1c2e", "important");

        });
    }
    //--------------------------------------------
    function addTransportation(formId) {
        $("#add-transport-btn").attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById('add-transport-form'));
        $.ajax({
                url: "{{ route('addGroupTransportationEn') }}",
                type: "POST",
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
                $("#groups-data").empty();
                $("#groups-data").append(data);
                $('.close').click();
                $('.parenttrue').attr("hidden", false);
                // clearInput();
                document.getElementById(formId).reset();
                document.getElementById('group_id_for_company').value = '';


            })
            .fail(function(data) {
                // $('.close').click();
                // $('.parent').attr("hidden", false);
                removeMessages();

                if (data.responseJSON.errors.transportation_id) {
                    document.querySelector(`#${formId} #transportation_error`).innerHTML = data.responseJSON.errors
                        .transportation_id[0];

                }
                if (data.responseJSON.errors['dates.0']) {
                    // console.log(element)
                    // data.responseJSON.errors.dates.forEach(element => {
                        document.querySelector(`#${formId} #dates_error`).innerHTML = data.responseJSON.errors['dates.0'][0];
                    // });
                    

                }
                if (data.responseJSON.errors.dates) {

                    document.querySelector(`#${formId} #dates_error`).innerHTML = data.responseJSON.errors
                        .dates[0];

                }
                

            })
            .always(function() {
                // Re-enable the submit button and hide the loading spinner
                $("#add-transport-btn").attr("disabled", false).html('Save');
            });
    }
    //--------------------------------------------
    function deleteTrans(formId, id) {
        $("#delete-trans-btn-" + id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');

        var formData = new FormData(document.getElementById(formId));
        formData.append('id', id);
        console.log(id);
        $.ajax({
                url: `{{ route('deleteTransEn') }}`,
                type: "POST",
                data: formData,
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
                $("#groups-data").empty();
                $("#groups-data").append(data);
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
                $("#delete-trans-btn-" + id).attr("disabled", false).html('<i class="fas fa-trash"></i>');
            });
    }
    //--------------------------------------------
</script>
