@extends('adminLayout-En.master')
@section('admincontent')
    <div class="app-content">
        <div class="app-content-header" style="width:68%;">
            <h1 class="app-content-headerText">Events</h1>

            <!-- add -->
            <button type="button" class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                Add Event
            </button>

            <!-- Modal -->
            <div class="modal fade " data-bs-backdrop="static" id="exampleModal3" tabindex="-1"
                aria-labelledby="exampleModal3Label" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content toggle">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModal3Label">New Event</h5>
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

                                    <tr>
                                        <td>Name(Arabic) </td>
                                        <td><input type="text" class="toggle text-primary in" name="name_ar" required
                                                style="width: 100%;"></th>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><span class="text-danger p-1" id="name_ar_error"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Name(English) </td>
                                        <td><input type="text" class="toggle text-primary in" name="name_en" required
                                                style="width: 100%;"></th>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><span class="text-danger p-1" id="name_en_error"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Place</td>
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
                                                            onclick="setPlace({{ $place->id }}, '{{ $place->translations()->where('locale', 'ar')->first()->name }}', 'place_{{ $place->id }}'), filterServices({{ $place->id }})"
                                                            href="#">
                                                            {{ $place->translations()->where('locale', 'ar')->first()->name }}
                                                        </option>
                                                    @endforeach
                                                    <input type="text" id="place_id" name="place_id" hidden>

                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td colspan="2"><span class="text-danger p-1" id="place_error"></span></td>
                                    </tr>

                                    <tr>
                                        <td>Service</td>
                                        <td>
                                            <div class="dropdown toggle text-primary in" style="display:inline-block; ;">

                                                <label class="dropdown-toggle" type="button" id="dropdownMenuButton"
                                                    data-toggle="dropdown" aria-expanded="false">

                                                </label>
                                                <span id="service-name"></span>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    @foreach ($services as $service)
                                                        <option style="cursor: pointer;"
                                                            id="service_{{ $service->id }}"
                                                            class="dropdown-item service_filter_option service_place_{{ $service->place->id }}"
                                                            value="{{ $service->id }}" id="dservice_{{ $service->id }}"
                                                            onclick="setService({{ $service->id }}, '{{ $service->translations()->where('locale', 'ar')->first()->name }}', 'service_{{ $service->id }}')"
                                                            hidden href="#">
                                                            {{ $service->translations()->where('locale', 'ar')->first()->name }}
                                                        </option>
                                                    @endforeach
                                                    <input type="text" id="service_id" name="service_id" hidden>

                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td colspan="2"><span class="text-danger p-1" id="service_id_error"></span></td>
                                    </tr>

                                    <tr>
                                        <td>Description(Arabic)</td>
                                        <td><input class="toggle text-primary in" type="text" name="description_ar"
                                                required style="width: 100%;"></th>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><span class="text-danger p-1" id="description_ar_error"></span></td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Description(English)</td>
                                        <td><input class="toggle text-primary in" type="text" name="description_en"
                                                required style="width: 100%;"></th>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><span class="text-danger p-1" id="description_en_error"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Cost</td>
                                        <td><input class="toggle text-primary in" type="text" name="cost" required
                                                style="width: 100%;"></th>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><span class="text-danger p-1" id="cost_error"></span></td>
                                    </tr>

                                    <tr>
                                        <td>Start Date</td>
                                        <td><input class="toggle text-primary in" type="date" name="start_date"
                                                required style="width: 100%;"></th>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><span class="text-danger p-1" id="start_date_error"></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>End Date</td>
                                        <td><input class="toggle text-primary in" type="date" name="end_date" required
                                                style="width: 100%;"></th>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><span class="text-danger p-1" id="end_date_error"></span></td>
                                    </tr>


                                </table>
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="action-button active close"
                                onclick="removeMessages(), document.getElementById('add-form').reset()"
                                data-bs-dismiss="modal">Close</button>
                            <button type="button" id="add-event-btn" onclick="addEvent('add-form')"
                                class="app-content-headerButton">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end add -->

        <div class="app-content-actions" style="width:68%;">
            <input class="search-bar" onkeyup="searchFunction()" id="search" placeholder="Search By Name..." type="text">
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
                        <label>Place</label>
                        <select>
                            <option>All Places</option>
                            <option>Furniture</option>
                            <option>Decoration</option>
                            <option>Kitchen</option>
                            <option>Bathroom</option>
                        </select>

                        <div class="filter-menu-buttons">

                            <button class="filter-button apply">
                                Apply
                            </button>
                        </div>
                    </div>
                </div> --}}
                <!-- end filter -->
               
                <div class="nav-item dropdown">
                    <button class="action-button list dropdown-toggle" data-bs-toggle="dropdown" title="Translate"> <i
                            class="fas fa-globe "></i> </button>

                    <div class="dropdown-menu border-0 rounded-0 m-0 toggle">
                        <a href="{{ route('event_en') }}" class="dropdown-item">English</a>
                        <a href="{{ route('event_ar') }}" class="dropdown-item">Arabic </a>

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
        <div class="scroll-class" style="width:68%;">
            <div class="products-area-wrapper tableView" id="eventsTable">
                <div class="products-header">
                    <div class="product-cell">#</div>
                    <div class="product-cell">Name</div>
                    <div class="product-cell">Place</div>
                    <div class="product-cell">Service</div>
                    <div class="product-cell">Description</div>
                    <div class="product-cell">cost</div>
                    <div class="product-cell">Start Date</div>
                    <div class="product-cell">End Date</div>
                    <div class="product-cell ">Actions</div>

                </div>
                <div id="events-data">
                    <?php $i = 1; ?>
                    @foreach ($events as $event)
                        <div class="products-row">
                            <button class="cell-more-button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                                    <circle cx="12" cy="12" r="1" />
                                    <circle cx="12" cy="5" r="1" />
                                    <circle cx="12" cy="19" r="1" />
                                </svg>
                            </button>
                            <div class="product-cell">
                                <span>{{ $i++ }}</span>
                            </div>
                            <div class="product-cell">
                                <span class="search-value">{{ $event->translations()->where('locale', 'en')->first()->name }}</span>
                            </div>

                            <div class="product-cell">
                                <span>{{ $event->place->translations()->where('locale', 'ar')->first()->name }}</span>
                            </div>
                            <div class="product-cell">
                                <span>{{ optional(optional(optional(optional($event->service)->translations())->where('locale', 'ar'))->first())->name }}</span>
                            </div>
                            <div class="product-cell">
                                <span>{{ $event->translations()->where('locale', 'ar')->first()->description }}</span>
                            </div>
                            <div class="product-cell">
                                <span>{{ $event->cost }}</span>
                            </div>
                            <div class="product-cell">
                                <span>{{ $event->start_date }}</span>
                            </div>
                            <div class="product-cell">
                                <span>{{ $event->end_date }}</span>
                            </div>
                            <div class="product-cell">
                                <!-- start action -->


                                <!-- edit -->
                                <a href="#" class="edit" data-toggle="modal"
                                    data-target="#editEvent{{ $event->id }}" title="Edit"><i
                                        class="fas fa-pen"></i></a>

                                <!-- Modal -->
                                <div class="modal fade" data-backdrop="static" id="editEvent{{ $event->id }}"
                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form id="edit-form-{{ $event->id }}" action="" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <table
                                                        class="table-striped table-hover table-bordered m-auto text-primary myTable"
                                                        style="width: 400px;">
                                                        <tr>
                                                            <td>Name(Arabic) </td>
                                                            <td><input type="text" class="toggle text-primary in"
                                                                    name="name_ar" required style="width: 100%;"
                                                                    value="{{ $event->translations()->where('locale', 'ar')->first()->name }}">
                                                                </th>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"><span
                                                                    class="text-danger p-1 name_ar_error_edit"></span></td>
                                                        </tr>

                                                        <tr>
                                                            <td>Name(English) </td>
                                                            <td><input type="text" class="toggle text-primary in"
                                                                    name="name_en" required style="width: 100%;"
                                                                    value="{{ $event->translations()->where('locale', 'en')->first()->name }}">
                                                                </th>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"><span
                                                                    class="text-danger p-1 name_en_error_edit"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Place</td>
                                                            <td>

                                                                <div class="dropdown toggle text-primary in"
                                                                    style="display:inline-block; ;">

                                                                    <label class="dropdown-toggle" type="button"
                                                                        id="dropdownMenuButtonEdit{{ $event->id }}"
                                                                        data-toggle="dropdown" aria-expanded="false">

                                                                    </label>

                                                                    <span
                                                                        id="place-name-{{ $event->id }}">{{ $event->place->translations()->where('locale', 'ar')->first()->name }}</span>
                                                                    <div class="dropdown-menu"
                                                                        aria-labelledby="dropdownMenuButtonEdit{{ $event->id }}">
                                                                        @foreach ($places as $place)
                                                                            <option
                                                                                style="cursor: pointer; @if ($place->id == $event->place_id) color: #90aaf8 !important; @endif"
                                                                                class="dropdown-item"
                                                                                value="{{ $place->id }}"
                                                                                id="edit_place_{{ $event->id }}_{{ $place->id }}"
                                                                                onclick="setEditPlace({{ $place->id }}, {{ $event->id }}, '{{ $place->translations()->where('locale', 'ar')->first()->name }}', 'edit_place_{{ $event->id }}_{{ $place->id }}'), filterEditServices({{ $place->id }}, {{ $event->id }})"
                                                                                href="#">
                                                                                {{ $place->translations()->where('locale', 'ar')->first()->name }}
                                                                            </option>
                                                                        @endforeach
                                                                        <input type="text"
                                                                            id="edit_place_id_{{ $event->id }}"
                                                                            name="place_id"
                                                                            value="{{ $event->place_id }}" hidden>

                                                                    </div>
                                                                </div>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"><span
                                                                    class="text-danger p-1 place_error_edit"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Service</td>
                                                            <td>
                                                                <div class="dropdown toggle text-primary in"
                                                                    style="display:inline-block; ;">

                                                                    <label class="dropdown-toggle" type="button"
                                                                        id="dropdownMenuButtonEdit{{ $event->id }}"
                                                                        data-toggle="dropdown" aria-expanded="false">

                                                                    </label>
                                                                    <span
                                                                        id="service-name-{{ $event->id }}">{{ optional(optional(optional(optional($event->service)->translations())->where('locale', 'ar'))->first())->name }}</span>
                                                                    <div class="dropdown-menu"
                                                                        aria-labelledby="dropdownMenuButtonEdit{{ $event->id }}">
                                                                        @foreach ($services as $service)
                                                                            <option
                                                                                style="cursor: pointer; @if ($service->id == $event->service_id) color: #90aaf8 !important; @endif"
                                                                                class="dropdown-item edit_service_filter_option edit_service_place_{{ $service->place->id }}"
                                                                                value="{{ $service->id }}"
                                                                                id="edit_service_{{ $event->id }}_{{ $service->id }}"
                                                                                onclick="setEditService({{ $service->id }}, {{ $event->id }}, '{{ $service->translations()->where('locale', 'ar')->first()->name }}', 'edit_service_{{ $event->id }}_{{ $service->id }}')"
                                                                                href="#">
                                                                                {{ $service->translations()->where('locale', 'ar')->first()->name }}
                                                                            </option>
                                                                        @endforeach
                                                                        <input type="text"
                                                                            id="edit_service_id_{{ $event->id }}"
                                                                            name="service_id"
                                                                            value="{{ $event->service_id }}" hidden>

                                                                    </div>
                                                                </div>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"><span
                                                                    class="text-danger p-1 service_error_edit"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Description(Arabic)</td>
                                                            <td><input class="toggle text-primary in" type="text"
                                                                    name="description_ar" required style="width: 100%;"
                                                                    value="{{ $event->translations()->where('locale', 'ar')->first()->description }}">
                                                                </th>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"><span
                                                                    class="text-danger p-1 des_error_edit"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Description(English)</td>
                                                            <td><input class="toggle text-primary in" type="text"
                                                                    name="description_en" required style="width: 100%;"
                                                                    value="{{ $event->translations()->where('locale', 'en')->first()->description }}">
                                                                </th>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"><span
                                                                    class="text-danger p-1 des_error_edit"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>cost</td>
                                                            <td><input type="number" name="cost"
                                                                    class="toggle text-primary in"
                                                                    value="{{ $event->cost }}">
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"><span
                                                                    class="text-danger p-1 cost_error_edit"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Start date</td>
                                                            <td><input type="date" name="start_date"
                                                                    class="toggle text-primary in"
                                                                    value="{{ $event->start_date }}"></td>

                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"><span
                                                                    class="text-danger p-1 start_date_error_edit"></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>end date</td>
                                                            <td><input type="date" name="end_date"
                                                                    class="toggle text-primary in"
                                                                    value="{{ $event->end_date }}"></td>

                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"><span
                                                                    class="text-danger p-1 end_date_error_edit"></span>
                                                            </td>
                                                        </tr>
                                                    </table>

                                                </div>
                                            </form>
                                            <div class="modal-footer">
                                                <button type="button" class="action-button active close"
                                                    onclick="removeMessages()" data-dismiss="modal">Close</button>
                                                <button type="submit" id="edit-event-btn-{{ $event->id }}"
                                                    onclick="editEvent('edit-form-{{ $event->id }}', {{ $event->id }})"
                                                    class="app-content-headerButton">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end edit -->

                                <div class="p-3">

                                    <!-- delete -->
                                    <a href="#" class="delete" data-toggle="modal"
                                        data-target="#deleteEvent{{ $event->id }}" title="Delete"
                                        data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteEvent{{ $event->id }}" tabindex="-1"
                                        aria-labelledby="exampleModal2Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form id="delete-form-{{ $event->id }}" action="" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="text" name="id" value="{{ $event->id }}"
                                                        hidden>
                                                    <div class="modal-body">
                                                        Are you sure that you want to delete This Event (<span
                                                        style="color: #90aaf8;">{{ $event->translations()->where('locale', 'en')->first()->name }}</span>)?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="action-button active close"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit"
                                                            id="delete-event-btn-{{ $event->id }}"
                                                            onclick="deleteEvent(`delete-form-{{ $event->id }}`, {{ $event->id }})"
                                                            class="app-content-headerButton">Yes</button>
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
    function addEvent(formId) {
        $("#add-event-btn").attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById('add-form'));
        console.log(document.getElementById('add-form'));
        $.ajax({
                url: "{{ route('addEventEn') }}",
                type: "POST",
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
                $("#events-data").empty();
                $("#events-data").append(data);
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

                if (data.responseJSON.errors.place_id) {
                    document.querySelector(`#${formId} #place_error`).innerHTML = data.responseJSON.errors
                        .place_id[0];
                }


                if (data.responseJSON.errors.cost) {
                    document.querySelector(`#${formId} #cost_error`).innerHTML = data.responseJSON.errors.cost[0];
                }


                if (data.responseJSON.errors.start_date) {
                    document.querySelector(`#${formId} #start_date_error`).innerHTML = data.responseJSON.errors
                        .start_date[0];
                }

                if (data.responseJSON.errors.end_date) {
                    document.querySelector(`#${formId} #end_date_error`).innerHTML = data.responseJSON.errors
                        .end_date[0];
                }

            })
            .always(function() {
                // Re-enable the submit button and hide the loading spinner
                $("#add-event-btn").attr("disabled", false).html('Save');
            });
    }
    //----------------------------------------------------------

    function editEvent(formId, id) {

        $("#edit-event-btn-" + id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById(formId));
        formData.append('id', id);
        $.ajax({
                url: `{{ route('editEventEn') }}`,
                type: "POST",
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {

                $("#events-data").empty();
                $("#events-data").append(data);
                $('.close').click();
                $('.parenttrue').attr("hidden", false);
                // clearInput();
            })
            .fail(function(data) {
                removeMessages();

                if (data.responseJSON.errors.name_ar) {
                    document.querySelector(`#${formId} .name_ar_error_edit`).innerHTML = data.responseJSON.errors
                        .name_ar[0];
                }

                if (data.responseJSON.errors.name_en) {
                    document.querySelector(`#${formId} .name_en_error_edit`).innerHTML = data.responseJSON.errors
                        .name_en[0];
                }

                if (data.responseJSON.errors.place_id) {
                    document.querySelector(`#${formId} .place_error_edit`).innerHTML = data.responseJSON.errors
                        .place_id[0];
                }


                if (data.responseJSON.errors.cost) {
                    document.querySelector(`#${formId} .cost_error_edit`).innerHTML = data.responseJSON.errors.cost[
                        0];
                }


                if (data.responseJSON.errors.start_date) {
                    document.querySelector(`#${formId} .start_date_error_edit`).innerHTML = data.responseJSON.errors
                        .start_date[0];
                }

                if (data.responseJSON.errors.end_date) {
                    document.querySelector(`#${formId} .end_date_error_edit`).innerHTML = data.responseJSON.errors
                        .end_date[0];
                }

            })
            .always(function() {
                // Re-enable the submit button and hide the loading spinner
                $("#edit-event-btn-" + id).attr("disabled", false).html('Save Changes');
            });
    }

    //---------------------------------------------------------------
    function deleteEvent(formId, id) {
        $("#delete-event-btn-" + id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');

        var formData = new FormData(document.getElementById(formId));
        $.ajax({
                url: `{{ route('deleteEventEn') }}`,
                type: "POST",
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
                $("#events-data").empty();
                $("#events-data").append(data);
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
                $("#delete-event-btn-" + id).attr("disabled", false).html('Yes');
            });
    }

    //---------------------------------------------------------------
    {{-- // window.onload = (event) => {
  //     $.ajax({
  //             url: "{{ route('getPlacesAr') }}",
  //             type: "GET",
  //             processData: false,
  //             cache: false,
  //             contentType: false,
  //         })
  //         .done(function(data) {
  //             $("#places-data").append(data);
  //         })
  //         .fail(function() {
  //             $('.parent').attr("hidden", false);


  //         });
  // }; 
  --}}
    //--------------------------------------------------------

    function searchFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search");
        filter = input.value.toUpperCase();
        table = document.getElementById("eventsTable");
        // tr = table.getElementsByTagName("tr");
        tr = table.getElementsByClassName("products-row");
        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByClassName("search-value");

            if (td) {
                txtValue = td[0].textContent || td[0].innerText;
                if (txtValue) {

                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
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
        document.getElementById('place_error').innerHTML = '';
        document.getElementById('service_id_error').innerHTML = '';
        document.getElementById('cost_error').innerHTML = '';
        document.getElementById('start_date_error').innerHTML = '';
        document.getElementById('end_date_error').innerHTML = '';

        const name_ar = document.querySelectorAll('.name_ar_error_edit');
        name_ar.forEach(name => {
            name.innerHTML = '';
        });

        const name_en = document.querySelectorAll('.name_en_error_edit');
        name_en.forEach(name => {
            name.innerHTML = '';
        });

        const places = document.querySelectorAll('.place_error_edit');
        places.forEach(place => {
            place.innerHTML = '';
        });
        const costs = document.querySelectorAll('.cost_error_edit');
        costs.forEach(cost => {
            cost.innerHTML = '';
        });
        const start_date = document.querySelectorAll('.start_date_error_edit');
        start_date.forEach(start_date => {
            start_date.innerHTML = '';
        });
        const end_date = document.querySelectorAll('.end_date_error_edit');
        end_date.forEach(end_date => {
            end_date.innerHTML = '';
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
    function setEditPlace(place_id, event_id, place, option_id) {
        var places_options = document.querySelectorAll('[id^="edit_place_"]');
        places_options.forEach(option => {
            option.style.setProperty("color", "#1f1c2e", "important");

        });
        document.getElementById('place-name-' + event_id).innerHTML = place;
        document.getElementById(option_id).style.setProperty("color", "#90aaf8", "important");
        document.getElementById('edit_place_id_' + event_id).value = `${place_id}`;
    }
    //---------------------------------------------
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
    function setEditService(service_id, place_id, service, option_id) {
        var services_options = document.querySelectorAll('[id^="edit_service_"]');
        services_options.forEach(option => {
            option.style.setProperty("color", "#1f1c2e", "important");

        });
        document.getElementById('service-name-' + place_id).innerHTML = service;
        document.getElementById(option_id).style.setProperty("color", "#90aaf8", "important");
        document.getElementById('edit_service_id_' + place_id).value = `${service_id}`;
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
    function filterEditServices(place_id, event_id) {
        var services = document.querySelectorAll(`.edit_service_filter_option`);
        var place_services = document.querySelectorAll(`.edit_service_place_${place_id}`);

        services.forEach(service => {
            service.setAttribute("hidden", true);

        });
        place_services.forEach(service => {
            service.removeAttribute("hidden");

        });
        document.getElementById(`edit_service_id_${event_id}`).value = "";
        document.getElementById(`service-name-${event_id}`).innerHTML = '';
        // var districts_options = document.querySelectorAll('[id^="district_"]');
        services.forEach(option => {
            option.style.setProperty("color", "#1f1c2e", "important");

        });
    }
</script>
