@extends('adminLayout-Ar.master')
@section('admincontent')
    <div class="app-content">
        <div class="app-content-header" style="width:60%;">
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
                                                            onclick="setPlace({{ $place->id }}, '{{ $place->translations()->where('locale', 'ar')->first()->name }}', 'place_{{ $place->id }}'), showAdditionalFields({{ collect($place->subCategory->additional_fields) }})"
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

                                        <td colspan="2" class="text-end text-danger p-1"><span id="des_error"></span>
                                        </td>
                                    </tr>
                                    <tr>


                                        <td><input class="toggle text-primary in" type="text" name="description_en"
                                                required style="width: 100%;"></th>
                                        <td>(الانكليزية)وصف</td>
                                    </tr>
                                    <tr>

                                        <td colspan="2" class="text-end text-danger p-1"><span id="des_error"></span>
                                        </td>
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
                                    <tr hidden id="services_count">
                                        <td><input class="toggle text-primary in" type="number" name="services_count"
                                                required style="width: 100%;"></th>
                                        <td>العدد المتوفر من الخدمة</td>
                                    </tr>
                                    <tr hidden id="services_count_tr">
                                        <td colspan="2" class="text-end text-danger p-1"><span
                                                id="services_count_error"></span>
                                        </td>
                                    </tr>
                                    <tr hidden id="people_count">
                                        <td><input class="toggle text-primary in" type="number" name="people_count"
                                                required style="width: 100%;"></th>
                                        <td>عدد الأشخاص</td>
                                    </tr>
                                    <tr hidden id="people_count_tr">
                                        <td colspan="2" class="text-end text-danger p-1"><span
                                                id="people_count_error"></span>
                                        </td>
                                    </tr>
                                    <tr hidden id="reservation_period">
                                        <td>
                                            <div class="dropdown toggle text-primary in" style="display:inline-block; ;">

                                                <label class="dropdown-toggle" type="button" id="dropdownMenuButton"
                                                    data-toggle="dropdown" aria-expanded="false">

                                                </label>
                                                <span id="period-name"></span>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <option style="cursor: pointer;" class="dropdown-item"
                                                        id="period_00:15" value="00:15"
                                                        onclick="setServiceCount('00:15', 'ربع ساعة')" href="#">
                                                        ربع ساعة
                                                    </option>
                                                    <option style="cursor: pointer;" class="dropdown-item"
                                                        id="period_00:30" value="00:30"
                                                        onclick="setServiceCount('00:30', 'نصف ساعة')" href="#">
                                                        نصف ساعة
                                                    </option>
                                                    <option style="cursor: pointer;" class="dropdown-item"
                                                        id="period_01:00" value="01:00"
                                                        onclick="setServiceCount('01:00', 'ساعة')" href="#">
                                                        ساعة
                                                    </option>
                                                    <option style="cursor: pointer;" class="dropdown-item"
                                                        id="period_02:00" value="02:00"
                                                        onclick="setServiceCount('02:00', 'ساعتين')" href="#">
                                                        ساعتين
                                                    </option>
                                                    <option style="cursor: pointer;" class="dropdown-item"
                                                        id="period_03:00" value="03:00"
                                                        onclick="setServiceCount('03:00', 'ثلاث ساعات')" href="#">
                                                        ثلاث ساعات
                                                    </option>
                                                    <option style="cursor: pointer;" class="dropdown-item"
                                                        id="period_04:00" value="04:00"
                                                        onclick="setServiceCount('04:00', 'أربع ساعات')" href="#">
                                                        أربع ساعات
                                                    </option>


                                                    <input type="text" id="reservation_period_input"
                                                        name="reservation_period" hidden>

                                                </div>
                                            </div>
                                        </td>
                                        <td>مدة الحجز</td>
                                    </tr>
                                    <tr hidden id="reservation_period_tr">
                                        <td colspan="2" class="text-end text-danger p-1"><span
                                                id="reservation_period_error"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label><input type="radio" name="is_additional" value="1">
                                                إضافية</label>
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
                                                class="toggle text-primary in" name="image" required
                                                style="width: 100%;">
                                            <label for="add_img"> <img id="add_previewImage_0" width="170px"
                                                    height="90px" style="display: none; padding:6px;"></label>
                                        </td>
                                        <td>الصورة</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-end text-danger p-1"><span
                                                id="image_error"></span>
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

        <div class="app-content-actions"style="width:60%;">
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
        <div class="scroll-class" style="width:60%;">
            <div class="products-area-wrapper tableView" id="servicesTable">
                <div class="products-header">
                    <div class="product-cell">#</div>
                    <div class="product-cell">الاسم</div>
                    <div class="product-cell image ">الصورة</div>
                    <div class="product-cell">المكان</div>
                    <div class="product-cell">وصف</div>
                    <div class="product-cell">الكلفة</div>
                    <div class="product-cell">عدد الأشخاص</div>
                    <div class="product-cell">عدد الخدمة</div>
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
                                <img src="{{ asset(str_replace(app_path(), '', $service->image)) }}" alt="product">
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
                                <span> {{ $service->people_count }} </span>
                            </div>
                            <div class="product-cell">
                                <span> {{ $service->service_count }} </span>
                            </div>
                            <div class="product-cell">
                                @if ($service->reservation_period == '00:15')
                                    <span> ربع ساعة </span>
                                @elseif($service->reservation_period == '00:30')
                                    <span> نصف ساعة </span>
                                @elseif($service->reservation_period == '01:00')
                                    <span>ساعة</span>
                                @elseif($service->reservation_period == '02:00')
                                    <span> ساعتين </span>
                                @elseif($service->reservation_period == '03:00')
                                    <span> ثلاث ساعات </span>
                                @elseif($service->reservation_period == '04:00')
                                    <span> أربع ساعات </span>
                                @elseif(!$service->reservation_period)
                                    <span> </span>
                                @endif
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
                                                                                    onclick="setEditPlace({{ $place->id }}, {{ $service->id }}, '{{ $place->translations()->where('locale', 'ar')->first()->name }}', 'edit_place_{{ $service->id }}_{{ $place->id }}'), showEditAdditionalFields({{ collect($place->subCategory->additional_fields) }}, {{ $service->id }})"
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

                                                                <td colspan="2"><span style="color: red"
                                                                        class="des_error_edit"></span></td>

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

                                                                <td colspan="2"><span style="color: red"
                                                                        class="des_error_edit"></span></td>

                                                            </tr>
                                                            <tr>

                                                                <td><input type="number" name="cost"
                                                                        class="toggle text-primary in"
                                                                        value="{{ $service->cost }}">
                                                                </td>
                                                                <td>الكلفة</td>
                                                            </tr>
                                                            <tr>

                                                                <td colspan="2"><span style="color: red"
                                                                        class="cost_error_edit"></span></td>

                                                            </tr>
                                                            <tr @if (!in_array('services_count', $service->place->subCategory->additional_fields ?? [])) hidden @endif
                                                                id="services_count_{{ $service->id }}">
                                                                <td><input class="toggle text-primary in" type="number"
                                                                        name="services_count" required
                                                                        value="{{ $service->services_count }}"
                                                                        style="width: 100%;"></th>
                                                                <td>العدد المتوفر من الخدمة</td>
                                                            </tr>
                                                            <tr @if (!in_array('services_count', $service->place->subCategory->additional_fields ?? [])) hidden @endif
                                                                id="services_count_tr_{{ $service->id }}">
                                                                <td colspan="2" class="text-end text-danger p-1"><span
                                                                        class="services_count_error_edit"></span>
                                                                </td>
                                                            </tr>
                                                            <tr @if (!in_array('people_count', $service->place->subCategory->additional_fields ?? [])) hidden @endif
                                                                id="people_count_{{ $service->id }}">
                                                                <td><input class="toggle text-primary in" type="number"
                                                                        name="people_count" required
                                                                        value="{{ $service->people_count }}"
                                                                        style="width: 100%;"></th>
                                                                <td>عدد الأشخاص</td>
                                                            </tr>
                                                            <tr @if (!in_array('people_count', $service->place->subCategory->additional_fields ?? [])) hidden @endif
                                                                id="people_count_tr_{{ $service->id }}">
                                                                <td colspan="2" class="text-end text-danger p-1"><span
                                                                        class="people_count_error_edit"></span>
                                                                </td>
                                                            </tr>
                                                            <tr @if (!in_array('reservation_period', $service->place->subCategory->additional_fields ?? [])) hidden @endif
                                                                id="reservation_period_{{ $service->id }}">
                                                                <td>
                                                                    <div class="dropdown toggle text-primary in"
                                                                        style="display:inline-block; ;">

                                                                        <label class="dropdown-toggle" type="button"
                                                                            id="dropdownMenuButton" data-toggle="dropdown"
                                                                            aria-expanded="false">

                                                                        </label>
                                                                        @if ($service->reservation_period == '00:15')
                                                                            <span id="period-name-{{ $service->id }}">
                                                                                ربع ساعة </span>
                                                                        @elseif($service->reservation_period == '00:30')
                                                                            <span id="period-name-{{ $service->id }}">
                                                                                نصف ساعة </span>
                                                                        @elseif($service->reservation_period == '01:00')
                                                                            <span
                                                                                id="period-name-{{ $service->id }}">ساعة</span>
                                                                        @elseif($service->reservation_period == '02:00')
                                                                            <span id="period-name-{{ $service->id }}">
                                                                                ساعتين </span>
                                                                        @elseif($service->reservation_period == '03:00')
                                                                            <span id="period-name-{{ $service->id }}">
                                                                                ثلاث ساعات </span>
                                                                        @elseif($service->reservation_period == '04:00')
                                                                            <span id="period-name-{{ $service->id }}">
                                                                                أربع ساعات </span>
                                                                        @elseif(!$service->reservation_period)
                                                                            <span id="period-name-{{ $service->id }}">
                                                                            </span>
                                                                        @endif
                                                                        <div class="dropdown-menu"
                                                                            aria-labelledby="dropdownMenuButton">
                                                                            <option
                                                                                style="cursor: pointer; @if ($service->reservation_period == '00:15') color: #90aaf8 !important; @endif"
                                                                                class="dropdown-item"
                                                                                id="edit_period_00:15_{{ $service->id }}"
                                                                                value="00:15"
                                                                                onclick="setEditServiceCount('00:15', 'ربع ساعة', {{ $service->id }})"
                                                                                href="#">
                                                                                ربع ساعة
                                                                            </option>
                                                                            <option
                                                                                style="cursor: pointer; @if ($service->reservation_period == '00:30') color: #90aaf8 !important; @endif"
                                                                                class="dropdown-item"
                                                                                id="edit_period_00:30_{{ $service->id }}"
                                                                                value="00:30"
                                                                                onclick="setEditServiceCount('00:30', 'نصف ساعة', {{ $service->id }}))"
                                                                                href="#">
                                                                                نصف ساعة
                                                                            </option>
                                                                            <option
                                                                                style="cursor: pointer; @if ($service->reservation_period == '01:00') color: #90aaf8 !important; @endif"
                                                                                class="dropdown-item"
                                                                                id="edit_period_01:00_{{ $service->id }}"
                                                                                value="01:00"
                                                                                onclick="setEditServiceCount('01:00', 'ساعة', {{ $service->id }}))"
                                                                                href="#">
                                                                                ساعة
                                                                            </option>
                                                                            <option
                                                                                style="cursor: pointer;  @if ($service->reservation_period == '02:00') color: #90aaf8 !important; @endif"
                                                                                class="dropdown-item"
                                                                                id="edit_period_02:00_{{ $service->id }}"
                                                                                value="02:00"
                                                                                onclick="setEditServiceCount('02:00', 'ساعتين', {{ $service->id }}))"
                                                                                href="#">
                                                                                ساعتين
                                                                            </option>
                                                                            <option
                                                                                style="cursor: pointer; @if ($service->reservation_period == '03:00') color: #90aaf8 !important; @endif"
                                                                                class="dropdown-item"
                                                                                id="edit_period_03:00_{{ $service->id }}"
                                                                                value="03:00"
                                                                                onclick="setEditServiceCount('03:00', 'ثلاث ساعات', {{ $service->id }}))"
                                                                                href="#">
                                                                                ثلاث ساعات
                                                                            </option>
                                                                            <option
                                                                                style="cursor: pointer; @if ($service->reservation_period == '04:00') color: #90aaf8 !important; @endif"
                                                                                class="dropdown-item"
                                                                                id="edit_period_04:00_{{ $service->id }}"
                                                                                value="04:00"
                                                                                onclick="setEditServiceCount('04:00', 'أربع ساعات', {{ $service->id }}))"
                                                                                href="#">
                                                                                أربع ساعات
                                                                            </option>


                                                                            <input type="text"
                                                                                id="edit_reservation_period_input_{{ $service->id }}"
                                                                                value="{{ $service->reservation_period }}"
                                                                                name="reservation_period" hidden>

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>مدة الحجز</td>
                                                            </tr>
                                                            <tr @if (!in_array('reservation_period', $service->place->subCategory->additional_fields ?? [])) hidden @endif
                                                                id="reservation_period_tr_{{ $service->id }}">
                                                                <td colspan="2" class="text-end text-danger p-1"><span
                                                                        class="reservation_period_error_edit"></span>
                                                                </td>
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
                                                                <td><input type="file" name="image"
                                                                        id="img{{ $service->id }}" hidden
                                                                        onchange="previewImage(this, 'edit_previewImage_{{ $service->id }}')">
                                                                    <label for="img{{ $service->id }}"><img
                                                                            id="edit_previewImage_{{ $service->id }}"
                                                                            src="{{ asset(str_replace(app_path(), '', $service->image)) }}"
                                                                            style="padding-top: 5px; border-radius: 0px; width:170px; height:90px;"></label>
                                                                </td>
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
                if (data.responseJSON.errors.services_count) {
                    document.querySelector(`#${formId} #services_count_error`).innerHTML = data.responseJSON.errors
                        .services_count[0];
                }
                if (data.responseJSON.errors.people_count) {
                    document.querySelector(`#${formId} #people_count_error`).innerHTML = data.responseJSON.errors
                        .people_count[0];
                }
                if (data.responseJSON.errors.reservation_period) {
                    document.querySelector(`#${formId} #reservation_period_error`).innerHTML = data.responseJSON
                        .errors
                        .reservation_period[0];
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
                if (data.responseJSON.errors.is_additional) {
                    document.querySelector(`#${formId} .is_additional_error_edit`).innerHTML = data.responseJSON
                        .errors
                        .is_additional[0];
                }
                if (data.responseJSON.errors.services_count) {
                    document.querySelector(`#${formId} .services_count_error_edit`).innerHTML = data.responseJSON
                        .errors
                        .services_count[0];
                }
                if (data.responseJSON.errors.people_count) {
                    document.querySelector(`#${formId} .people_count_error_edit`).innerHTML = data.responseJSON
                        .errors
                        .people_count[0];
                }
                if (data.responseJSON.errors.reservation_period) {
                    document.querySelector(`#${formId} .reservation_period_error_edit`).innerHTML = data
                        .responseJSON.errors
                        .reservation_period[0];
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
    //----------------------------------------------

    function showAdditionalFields(fields) {
        document.getElementById('services_count').setAttribute("hidden", true);
        document.getElementById('people_count').setAttribute("hidden", true);
        document.getElementById('reservation_period').setAttribute("hidden", true);
        document.getElementById('services_count_tr').setAttribute("hidden", true);
        document.getElementById('people_count_tr').setAttribute("hidden", true);
        document.getElementById('reservation_period_tr').setAttribute("hidden", true);

        if (fields.length > 0) {
            fields.forEach(field => {
                document.getElementById(`${field}`).removeAttribute("hidden");
                document.getElementById(`${field}_tr`).removeAttribute("hidden");

            });
        }
    }

    //-----------------------------------------------------

    function showEditAdditionalFields(fields, service_id) {
        document.getElementById(`services_count_${service_id}`).setAttribute("hidden", true);
        document.getElementById(`people_count_${service_id}`).setAttribute("hidden", true);
        document.getElementById(`reservation_period_${service_id}`).setAttribute("hidden", true);
        document.getElementById(`services_count_tr_${service_id}`).setAttribute("hidden", true);
        document.getElementById(`people_count_tr_${service_id}`).setAttribute("hidden", true);
        document.getElementById(`reservation_period_tr_${service_id}`).setAttribute("hidden", true);

        if (fields.length > 0) {
            fields.forEach(field => {
                document.getElementById(`${field}_${service_id}`).removeAttribute("hidden");
                document.getElementById(`${field}_tr_${service_id}`).removeAttribute("hidden");

            });
        }
    }
    //--------------------------------------------
    function setServiceCount(period_value, option_name) {
        var places_options = document.querySelectorAll('[id^="period_0"]');
        places_options.forEach(option => {
            option.style.setProperty("color", "#1f1c2e", "important");

        });
        console.log(period_value)
        document.getElementById('period-name').innerHTML = option_name;
        document.getElementById(`period_${period_value}`).style.setProperty("color", "#90aaf8", "important");
        document.getElementById('reservation_period_input').value = `${period_value}`;
    }
    //-----------------------------------------------------
    function setEditServiceCount(period_value, option_name, service_id) {
        var places_options = document.querySelectorAll('[id^="edit_period_0"]');
        places_options.forEach(option => {
            option.style.setProperty("color", "#1f1c2e", "important");

        });
        document.getElementById('period-name-' + service_id).innerHTML = option_name;
        document.getElementById(`edit_period_${period_value}_${service_id}`).style.setProperty("color", "#90aaf8",
            "important");
        document.getElementById('edit_reservation_period_input_' + service_id).value = `${period_value}`;
    }
</script>
