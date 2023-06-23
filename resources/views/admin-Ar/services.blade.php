@extends('adminLayout-Ar.master')
@section('admincontent')
    <div class="app-content">
        <div class="app-content-header" style="width:83%;">
            <h1 class="app-content-headerText">الخدمات</h1>

            <!-- add -->
            <button type="button" class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                إضافة خدمة
            </button>

            <!-- Modal -->
            <div class="modal fade " data-bs-backdrop="static" id="exampleModal3" tabindex="-1"
                aria-labelledby="exampleModal3Label" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content toggle">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModal3Label">خدمة جديدة</h5>
                            <button type="button" class="btn-close m-0 close"
                                onclick="removeMessages(), document.getElementById('add-form').reset()"
                                data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="add-form" action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <table style="color: rgb(22, 22, 22); width: 400px;" id="addTable"
                                    class="table-striped table-hover table-bordered m-auto text-primary myTable">

                                    <tr>
                                        <td></td>
                                        <td><input type="text" class="toggle text-primary in" name="name_ar" required
                                                style="width: 100%;"></th>
                                        <td>الاسم(العربية)</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2" class="text-end text-danger p-1"><span id="name_ar_error"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="text" class="toggle text-primary in" name="name_en" required
                                                style="width: 100%;"></th>
                                        <td>(الإنجليزية)الاسم </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2" class="text-end text-danger p-1"><span id="name_en_error"></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>
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
                                        <td>المكان</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2" class="text-end text-danger p-1"><span id="place_error"></span>
                                        </td>
                                    </tr>



                                    <tr>
                                        <td></td>

                                        <td><input class="toggle text-primary in" type="text" name="description_ar"
                                                required style="width: 100%;"></th>
                                        <td>وصف(العربية)</td>
                                    </tr>
                                    <tr>
                                        <td></td>

                                        <td><input class="toggle text-primary in" type="text" name="description_en"
                                                required style="width: 100%;"></th>
                                        <td>(الانكليزية)وصف</td>
                                    </tr>
                                    <tr>
                                        <td></td>

                                        <td><input class="toggle text-primary in" type="number" name="cost" required
                                                style="width: 100%;"></th>
                                        <td>الكلفة</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2" class="text-end text-danger p-1"><span id="cost_error"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>

                                            <input type="checkbox" value="false" name="is_additional" class="is_add">

                                        </td>
                                        <td>إضافية؟</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2" class="text-end text-danger p-1"><span
                                                id="is_additional_error"></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width:25px; text-align:center;"> <i
                                                class="fas fa-camera text-body pt-2 pl-2"
                                                style="font-size:15px; cursor:pointer;"></i></td>

                                        <td class="pl-2">
                                            <i class="fas fa-plus text-body pt-2 pr-5"
                                                style="text-align: center; line-height: 1.5; font-size:15px;  cursor:pointer;"onclick="addPic()"
                                                id="add-pic-input" data-picid="1" title="Add Another Picture"></i>
                                            <input type="file" id="add_input_0"
                                                onchange="previewImage(this, 'add_previewImage_0')"
                                                class="toggle text-primary in" name="event_image" required
                                                style="width:75% !important; font-size:16px;">
                                            <label for="add_input_0"> <img id="add_previewImage_0" width="170px"
                                                    height="90px" style="display: none; padding:6px;"></label>
                                        </td>
                                        <td>الصور </td>
                                    </tr>

                                </table>
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="action-button active close"
                                onclick="removeMessages(), document.getElementById('add-form').reset()"
                                data-bs-dismiss="modal">إغلاق</button>
                            <button type="button" id="add-service-btn" onclick="addService('add-form')"
                                class="app-content-headerButton">حفظ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end add -->

        <div class="app-content-actions"style="width:84%;">
            <input class="search-bar" placeholder="...ابحث" type="text">
            <div class="app-content-actions-wrapper">
                <!-- filter -->
                <div class="filter-button-wrapper">
                    <button class="action-button filter jsFilter"><span>Filter</span><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-filter">
                            <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" />
                        </svg></button>
                    <div class="filter-menu">
                        <label>الأماكن</label>
                        <select>
                            <option>All places</option>
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
                </div>
                <!-- end filter -->
                <button class="action-button list" title="عرض جدول">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-list">
                        <line x1="8" y1="6" x2="21" y2="6" />
                        <line x1="8" y1="12" x2="21" y2="12" />
                        <line x1="8" y1="18" x2="21" y2="18" />
                        <line x1="3" y1="6" x2="3.01" y2="6" />
                        <line x1="3" y1="12" x2="3.01" y2="12" />
                        <line x1="3" y1="18" x2="3.01" y2="18" />
                    </svg>
                </button>
                <button class="action-button grid" title="عرض لائحة">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-grid">
                        <rect x="3" y="3" width="7" height="7" />
                        <rect x="14" y="3" width="7" height="7" />
                        <rect x="14" y="14" width="7" height="7" />
                        <rect x="3" y="14" width="7" height="7" />
                    </svg>
                </button>

                <div class="nav-item dropdown">
                    <button class="action-button list dropdown-toggle" data-bs-toggle="dropdown" title="ترجمة"> <i
                            class="fas fa-globe "></i> </button>

                    <div class="dropdown-menu border-0 rounded-0 m-0 toggle">
                        <a href="{{ route('service_ar') }}" class="dropdown-item"> العربية</a>
                        <a href="{{ route('service_en') }}" class="dropdown-item">الانجليزية </a>

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
        <div class="scroll-class" style="width:83%;">
            <div class="products-area-wrapper tableView">
                <div class="products-header">
                    <div class="product-cell">#</div>
                    <div class="product-cell">الاسم</div>
                    <div class="product-cell image ">الصورة</div>
                    <div class="product-cell">المكان</div>
                    <div class="product-cell">وصف</div>
                    <div class="product-cell">الكلفة</div>
                    <div class="product-cell">إضافية؟</div>
                    <div class="product-cell ">الأحداث</div>

                </div>
                <div id="services-data">
                    <?php $i = 1; ?>
                    @foreach ($services as $service)
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
                                <span> {{ $i++ }} </span>
                            </div>
                            <div class="product-cell">
                                <span> {{ $service->translations()->where('locale', 'ar')->first()->name }} </span>
                            </div>
                            <div class="product-cell">
                                <img src="{{ asset(str_replace(app_path(), '', $service->images()->first()->image)) }}"
                                    alt="product">
                            </div>
                            <div class="product-cell">
                                <span> {{ $service->place->translations()->where('locale', 'ar')->first()->name }} </span>
                            </div>
                            <div class="product-cell">
                                <span> {{ $service->translations()->where('locale', 'ar')->first()->description }} </span>
                            </div>
                            <div class="product-cell">
                                <span> {{ $service->cost }} </span>
                            </div>
                            <div class="product-cell">
                                <span>
                                    @if ($service->is_additional)
                                        <img src="img/true.png" style="width: 30px; height:30px;" />
                                    @else
                                        <img src="img/false.png" style="width: 30px; height:30px;" />
                                    @endif
                                </span>
                            </div>
                            <div class="product-cell">
                                <!-- start action -->
                                <div class="p-3">

                                    <!-- delete -->
                                    <a href="#" class="delete" data-toggle="modal" data-target="#exampleModal2"
                                        title="Delete" data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal2" tabindex="-1"
                                        aria-labelledby="exampleModal2Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="direction:ltr;">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="direction:rtl;">
                                                    هل أنت متأكد من أنك تريد حذف هذه الخدمة؟
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="action-button active"
                                                        data-dismiss="modal">إغلاق</button>
                                                    <button type="submit" class="app-content-headerButton">نعم</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end delete -->

                                <!-- edit -->
                                <a href="#" class="edit" data-toggle="modal" data-target="#exampleModal"
                                    title="Edit"><i class="fas fa-pen"></i></a>

                                <!-- Modal -->
                                <div class="modal fade" data-backdrop="static" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content" style="direction:ltr;">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <table
                                                    class="table-striped table-hover table-bordered m-auto text-primary myTable"
                                                    id="editTable" style="width: 400px;">
                                                    <tr>
                                                        <td></td>
                                                        <td><input type="text" class="toggle text-primary in"
                                                                name="service_name" required style="width: 100%;"></th>
                                                        <td>الاسم(العربية)</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td><input type="text" class="toggle text-primary in"
                                                                name="service_name" required style="width: 100%;"></th>
                                                        <td>(الانكليزية)الاسم </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>

                                                        <td>
                                                            <div class="dropdown toggle text-primary in"
                                                                style="display:inline-block; ;">
                                                                <label class="dropdown-toggle" type="button"
                                                                    id="dropdownMenuButton" data-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    liki
                                                                </label>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" href="#">--</a>
                                                                    <a class="dropdown-item" href="#">--</a>
                                                                    <a class="dropdown-item" href="#">---</a>
                                                                    <a class="dropdown-item" href="#">----</a>

                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>المكان </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td><input class="toggle text-primary in" type="text"
                                                                name="description" required style="width: 100%;"></th>
                                                        <td>وصف(العربية)</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td><input class="toggle text-primary in" type="text"
                                                                name="description" required style="width: 100%;"></th>
                                                        <td>(الانكليزية)وصف</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td><input type="number" class="toggle text-primary in"
                                                                value="100000">
                                                        </td>
                                                        <td>الكلفة</td>
                                                    </tr>

                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <div class="dropdown toggle text-primary in"
                                                                style="display:inline-block;">
                                                                <label class="dropdown-toggle" type="button"
                                                                    id="dropdownMenuButton" data-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    نعم
                                                                </label>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" href="#">نعم</a>
                                                                    <a class="dropdown-item" href="#">لا</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>إضافية؟</td>

                                                    </tr>


                                                    <tr>

                                                        <td style="width:25px; text-align:center;">
                                                        </td>
                                                        <td>
                                                            <i class="fas fa-plus text-body" onclick="editPic()"
                                                                id="edit_pic_input" data-picid="1"
                                                                style="font-size:15px; text-align: center; padding-right:80px; line-height: 1.5; cursor:pointer;"
                                                                title="Add Another Picture"></i>
                                                            <input type="file" hidden id="img">
                                                            <label for="img"><img src="img/about-1.jpg"
                                                                    style="padding-top: 5px; border-radius: 0px; width:170px; height:90px;">
                                                            </label>
                                                        </td>
                                                        <td>الصور </td>
                                                    </tr>
                                                </table>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="action-button active"
                                                    data-dismiss="modal">إغلاق</button>
                                                <button type="submit" class="app-content-headerButton">حفظ
                                                    التغييرات</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end edit -->

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
    </div>
@endsection



<script>
    function addService(formId) {
        $("#add-service-btn").attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById('add-form'));
        $.ajax({
                url: "{{ route('addServiceAr') }}",
                type: "POST",
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
                $("#services-data").empty();
                $("#services-data").append(data);
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
                if (data.responseJSON.errors.is_additional) {
                    document.querySelector(`#${formId} #is_additional_error`).innerHTML = data.responseJSON.errors
                        .is_additional[0];
                }


            })
            .always(function() {
                // Re-enable the submit button and hide the loading spinner
                $("#add-service-btn").attr("disabled", false).html('حفظ');
            });
    }
    //----------------------------------------------------------

    function editEvent(formId, id) {

        $("#edit-event-btn-" + id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById(formId));
        formData.append('id', id);
        $.ajax({
                url: `{{ route('editEventAr') }}`,
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
                $("#edit-event-btn-" + id).attr("disabled", false).html('حفظ');
            });
    }

    //---------------------------------------------------------------
    function deleteEvent(formId, id) {
        $("#delete-event-btn-" + id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');

        var formData = new FormData(document.getElementById(formId));
        $.ajax({
                url: `{{ route('deleteEventAr') }}`,
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
                $("#delete-event-btn-" + id).attr("disabled", false).html('نعم');
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
        filter = input.value;
        table = document.getElementById("categoriesTable");
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
        // document.getElementById('name_ar_error').innerHTML = '';
        // document.getElementById('name_en_error').innerHTML = '';
        // document.getElementById('image_error').innerHTML = '';
        // document.getElementById('city_error').innerHTML = '';
        // document.getElementById('image_error').innerHTML = '';
        // document.getElementById('image_error').innerHTML = '';
        // document.getElementById('image_error').innerHTML = '';
        // document.getElementById('image_error').innerHTML = '';

        // const name_ar = document.querySelectorAll('.name_ar_error_edit');
        // name_ar.forEach(name => {
        //     name.innerHTML = '';
        // });

        // const name_en = document.querySelectorAll('.name_en_error_edit');
        // name_en.forEach(name => {
        //     name.innerHTML = '';
        // });

        // const images = document.querySelectorAll('.image_error_edit');
        // images.forEach(image => {
        //     image.innerHTML = '';
        // });
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
</script>
