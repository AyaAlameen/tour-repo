@extends('adminLayout-Ar.master')
@section('admincontent')
    <div class="app-content">
        <div class="app-content-header" style="width:63%;">
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
                                        <td><input type="text" class="toggle text-primary in" name="name_ar" required
                                                style="width: 100%;"></th>
                                        <td>الاسم(العربية)</td>
                                    </tr>
                                    <tr>

                                        <td colspan="2" class="text-end text-danger p-1"><span id="name_ar_error"></span>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td><input type="text" class="toggle text-primary in" name="name_en" required
                                                style="width: 100%;"></th>
                                        <td>(الإنجليزية)الاسم </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-end text-danger p-1"><span id="name_en_error"></span>
                                        </td>
                                    </tr>
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
                                        <td>المكان</td>
                                    </tr>
                                    <tr>

                                        <td colspan="2" class="text-end text-danger p-1"><span id="place_error"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                       <td><input class="toggle text-primary in" type="text" name="description_ar"
                                                required style="width: 100%;"></th>
                                        <td>وصف(العربية)</td>
                                    </tr>
                                    <tr>


                                        <td><input class="toggle text-primary in" type="text" name="description_en"
                                                required style="width: 100%;"></th>
                                        <td>(الانكليزية)وصف</td>
                                    </tr>
                                    <tr>
                                        <td><input class="toggle text-primary in" type="number" name="cost" required
                                                style="width: 100%;"></th>
                                        <td>الكلفة</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-end text-danger p-1"><span id="cost_error"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="toggle text-primary in" type="number" name="people_count" required
                                                style="width: 100%;"></th>
                                        <td>عدد الأشخاص</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-end text-danger p-1"><span id="people_count"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="toggle text-primary in" type="number" name="booking_period" required
                                                style="width: 100%;"></th>
                                        <td>مدة الحجز</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-end text-danger p-1"><span id="booking_period"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label><input type="radio" name="is_additional" value="1"> إضافية</label>
                                            <label><input type="radio" name="is_additional" value="0" checked> غير
                                                إضافية</label>
                                        </td>
                                        <td>إضافية؟</td>
                                    </tr>
                                    <tr>

                                        <td colspan="2" class="text-end text-danger p-1"><span
                                                id="is_additional_error"></span>
                                        </td>
                                    </tr>

                                    <tr>

                                        <td><input type="file" id="add_img"
                                                onchange="previewImage(this, 'add_previewImage_0')"
                                                class="toggle text-primary in" name="image" required style="width: 100%;">
                                            <label for="add_img"> <img id="add_previewImage_0" width="170px"
                                                    height="90px" style="display: none; padding:6px;"></label>
                                        </td>
                                        <td>الصورة</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-end text-danger p-1"><span id="image_error"></span>
                                        </td>
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

        <div class="app-content-actions"style="width:63%;">
            <input class="search-bar" onkeyup="searchFunction()" id="search" placeholder="... ابحث عن طريق الاسم "
                type="text">
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
        <div class="scroll-class" style="width:63%;">
            <div class="products-area-wrapper tableView" id="servicesTable">
                <div class="products-header">
                    <div class="product-cell">#</div>
                    <div class="product-cell">الاسم</div>
                    <div class="product-cell image ">الصورة</div>
                    <div class="product-cell">المكان</div>
                    <div class="product-cell">وصف</div>
                    <div class="product-cell">الكلفة</div>
                    <div class="product-cell">عدد الأشخاص</div>
                    <div class="product-cell">مدة الحجز</div>
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
                                <span class="search-value">
                                    {{ $service->translations()->where('locale', 'ar')->first()->name }} </span>
                            </div>
                            <div class="product-cell">
                                <img src="{{ asset(str_replace(app_path(), '', $service->image)) }}"
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
                                <span> عدد الأشخاص </span>
                            </div>
                            <div class="product-cell">
                                <span> مدة الحجز </span>
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


                                    <!-- edit -->
                                    <a href="#" class="edit p-2" data-toggle="modal"
                                        data-target="#editService{{ $service->id }}" title="Edit"><i
                                            class="fas fa-pen"></i></a>

                                    <!-- Modal -->
                                    <div class="modal fade" data-backdrop="static" id="editService{{ $service->id }}"
                                        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="direction:ltr;">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form id="edit-form-{{ $service->id }}" action="" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <table
                                                            class="table-striped table-hover table-bordered m-auto text-primary myTable"
                                                            id="editTable" style="width: 400px;">
                                                            <tr>
                                                               
                                                                <td><input type="text" class="toggle text-primary in"
                                                                        name="name_ar"
                                                                        value="{{ $service->translations()->where('locale', 'ar')->first()->name }}"
                                                                        required style="width: 100%;">
                                                                </td>
                                                                <td>الاسم(العربية)</td>
                                                            </tr>
                                                            <tr>
                                                              
                                                                <td colspan="2"><span style="color: red"
                                                                        class="name_ar_error_edit"></span></td>

                                                            </tr>
                                                            <tr>
                                                            
                                                                <td><input type="text" class="toggle text-primary in"
                                                                        name="name_en"
                                                                        value="{{ $service->translations()->where('locale', 'en')->first()->name }}"
                                                                        required style="width: 100%;">
                                                                    </th>
                                                                <td>(الإنجليزية)الاسم </td>
                                                            </tr>
                                                            <tr>
                                                              
                                                                <td colspan="2"><span style="color: red"
                                                                        class="name_en_error_edit"></span></td>

                                                            </tr>
                                                            <tr>
                                                        
                                                                <td>
                                                                    <div class="dropdown toggle text-primary in"
                                                                        style="display:inline-block; ;">

                                                                        <label class="dropdown-toggle" type="button"
                                                                            id="dropdownMenuButtonEdit{{ $service->id }}"
                                                                            data-toggle="dropdown" aria-expanded="false">

                                                                        </label>
                                                                        <span
                                                                            id="place-name-{{ $service->id }}">{{ $service->place->translations()->where('locale', 'ar')->first()->name }}</span>
                                                                        <div class="dropdown-menu"
                                                                            aria-labelledby="dropdownMenuButtonEdit{{ $service->id }}">
                                                                            @foreach ($places as $place)
                                                                                <option
                                                                                    style="cursor: pointer; @if ($place->id == $service->place_id) color: #90aaf8 !important; @endif"
                                                                                    class="dropdown-item"
                                                                                    value="{{ $place->id }}"
                                                                                    id="edit_place_{{ $service->id }}_{{ $place->id }}"
                                                                                    onclick="setEditPlace({{ $place->id }}, {{ $service->id }}, '{{ $place->translations()->where('locale', 'ar')->first()->name }}', 'edit_place_{{ $service->id }}_{{ $place->id }}')"
                                                                                    href="#">
                                                                                    {{ $place->translations()->where('locale', 'ar')->first()->name }}
                                                                                </option>
                                                                            @endforeach
                                                                            <input type="text"
                                                                                id="edit_place_id_{{ $service->id }}"
                                                                                name="place_id"
                                                                                value="{{ $service->place_id }}" hidden>

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>المكان</td>
                                                            </tr>
                                                            <tr>
                                                              
                                                                <td colspan="2"><span style="color: red"
                                                                        class="place_error_edit"></span></td>

                                                            </tr>

                                                            <tr>
                                                              
                                                                <td><input class="toggle text-primary in" type="text"
                                                                        name="description_ar"
                                                                        value="{{ $service->translations()->where('locale', 'ar')->first()->description }}"
                                                                        required style="width: 100%;">
                                                                    </th>
                                                                <td>وصف(العربية)</td>
                                                            </tr>
                                                            <tr>
                                                               
                                                                <td><input class="toggle text-primary in" type="text"
                                                                        name="description_en"
                                                                        value="{{ $service->translations()->where('locale', 'en')->first()->description }}"
                                                                        required style="width: 100%;">
                                                                    </th>
                                                                <td>(الإنجليزية)وصف</td>
                                                            </tr>
                                                            <tr>
                                                               
                                                                <td><input type="number" name="cost"
                                                                        class="toggle text-primary in"
                                                                        value="{{ $service->cost }}">
                                                                </td>
                                                                <td>الكلفة</td>
                                                            </tr>
                                                            <tr>
                                                               
                                                                <td><input type="number" name="cost"
                                                                        class="toggle text-primary in"
                                                                        value="">
                                                                </td>
                                                                <td>عدد الأشخاص</td>
                                                            </tr>
                                                             <tr>
                                                               
                                                                <td><input type="number" name="cost"
                                                                        class="toggle text-primary in"
                                                                        value="">
                                                                </td>
                                                                <td>مدة الحجز</td>
                                                            </tr>
                                                            <tr>
                                                   
                                                                <td>

                                                                    <label><input type="radio" name="is_additional"
                                                                            value="1"
                                                                            @if ($service->is_additional) checked @endif>
                                                                        إضافية</label>
                                                                    <label><input type="radio" name="is_additional"
                                                                            value="0"
                                                                            @if (!$service->is_additional) checked @endif>
                                                                        غير
                                                                        إضافية</label>
                                                                </td>
                                                                <td>إضافية؟</td>

                                                            </tr>


                                                            <tr>
                                                                <td ><input type="file" name="image" id="img{{$service->id}}" hidden onchange="previewImage(this, 'edit_previewImage_{{$service->id}}')">
                                                                     <label for="img{{$service->id}}" ><img id="edit_previewImage_{{$service->id}}" src="{{ asset(str_replace(app_path(),'',$service -> image))}}" style="padding-top: 5px; border-radius: 0px; width:170px; height:90px;"></label></td>      
                                                                <td>الصورة </td>
                                                                     
                                                                </tr>  
                                                        </table>

                                                    </div>
                                                </form>
                                                <div class="modal-footer">
                                                    <button type="button" class="action-button active close"
                                                        onclick="removeMessages()" data-dismiss="modal">إغلاق</button>
                                                    <button type="submit" id="edit-service-btn-{{ $service->id }}"
                                                        onclick="editService('edit-form-{{ $service->id }}', {{ $service->id }})"
                                                        class="app-content-headerButton">حفظ
                                                        التغييرات</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end edit -->

                                    <!-- delete -->
                                    <a href="#" class="delete" data-toggle="modal"
                                        data-target="#deleteService{{ $service->id }}" title="Delete"
                                        data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteService{{ $service->id }}" tabindex="-1"
                                        aria-labelledby="exampleModal2Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="direction:ltr;">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form id="delete-form-{{ $service->id }}" action="" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="text" name="id" value="{{ $service->id }}"
                                                        hidden>
                                                    <div class="modal-body" style="direction:rtl;">
                                                        هل أنت متأكد من أنك تريد حذف هذه الخدمة (<span
                                                            style="color: #90aaf8;">{{ $service->translations()->where('locale', 'ar')->first()->name }}</span>)
                                                        ؟ </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="action-button active close"
                                                            data-dismiss="modal">إغلاق</button>
                                                        <button type="submit"
                                                            id="delete-service-btn-{{ $service->id }}"
                                                            onclick="deleteService(`delete-form-{{ $service->id }}`, {{ $service->id }})"
                                                            class="app-content-headerButton">نعم</button>
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
                if (data.responseJSON.errors.image) {
                    document.querySelector(`#${formId} #image_error`).innerHTML = data.responseJSON.errors
                        .image[0];
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

    function editService(formId, id) {

        $("#edit-service-btn-" + id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById(formId));
        formData.append('id', id);
        $.ajax({
                url: `{{ route('editServiceAr') }}`,
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
            })
            .fail(function(data) {
                removeMessages();

                if (data.responseJSON.errors.name_ar) {
                    document.querySelector(`#${formId} #name_ar_error_edit`).innerHTML = data.responseJSON.errors
                        .name_ar[0];
                }

                if (data.responseJSON.errors.name_en) {
                    document.querySelector(`#${formId} #name_en_error_edit`).innerHTML = data.responseJSON.errors
                        .name_en[0];
                }

                if (data.responseJSON.errors.place_id) {
                    document.querySelector(`#${formId} #place_error_edit`).innerHTML = data.responseJSON.errors
                        .place_id[0];
                }


                if (data.responseJSON.errors.cost) {
                    document.querySelector(`#${formId} #cost_error_edit`).innerHTML = data.responseJSON.errors.cost[
                        0];
                }
                if (data.responseJSON.errors.is_additional) {
                    document.querySelector(`#${formId} #is_additional_error_edit`).innerHTML = data.responseJSON
                        .errors
                        .is_additional[0];
                }

            })
            .always(function() {
                // Re-enable the submit button and hide the loading spinner
                $("#edit-service-btn-" + id).attr("disabled", false).html('حفظ');
            });
    }

    //---------------------------------------------------------------
    function deleteService(formId, id) {
        $("#delete-service-btn-" + id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');

        var formData = new FormData(document.getElementById(formId));
        $.ajax({
                url: `{{ route('deleteServiceAr') }}`,
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
            })
            .fail(function() {
                $('.close').click();
                $('.parent').attr("hidden", false);

            })
            .always(function() {
                // Re-enable the submit button and hide the loading spinner
                $("#delete-services-btn-" + id).attr("disabled", false).html('نعم');
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
        table = document.getElementById("servicesTable");
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
    function setEditPlace(place_id, service_id, place, option_id) {
        var places_options = document.querySelectorAll('[id^="edit_place_"]');
        places_options.forEach(option => {
            option.style.setProperty("color", "#1f1c2e", "important");

        });
        document.getElementById('place-name-' + service_id).innerHTML = place;
        document.getElementById(option_id).style.setProperty("color", "#90aaf8", "important");
        document.getElementById('edit_place_id_' + service_id).value = `${place_id}`;
    }
</script>
