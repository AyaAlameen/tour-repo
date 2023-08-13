<?php $i = 1; ?>
@foreach($services as $service)
    @if($loop->last)
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
                                                            onclick="setEditServiceCount('00:30', 'نصف ساعة', {{ $service->id }})"
                                                            href="#">
                                                            نصف ساعة
                                                        </option>
                                                        <option
                                                            style="cursor: pointer; @if ($service->reservation_period == '01:00') color: #90aaf8 !important; @endif"
                                                            class="dropdown-item"
                                                            id="edit_period_01:00_{{ $service->id }}"
                                                            value="01:00"
                                                            onclick="setEditServiceCount('01:00', 'ساعة', {{ $service->id }})"
                                                            href="#">
                                                            ساعة
                                                        </option>
                                                        <option
                                                            style="cursor: pointer;  @if ($service->reservation_period == '02:00') color: #90aaf8 !important; @endif"
                                                            class="dropdown-item"
                                                            id="edit_period_02:00_{{ $service->id }}"
                                                            value="02:00"
                                                            onclick="setEditServiceCount('02:00', 'ساعتين', {{ $service->id }})"
                                                            href="#">
                                                            ساعتين
                                                        </option>
                                                        <option
                                                            style="cursor: pointer; @if ($service->reservation_period == '03:00') color: #90aaf8 !important; @endif"
                                                            class="dropdown-item"
                                                            id="edit_period_03:00_{{ $service->id }}"
                                                            value="03:00"
                                                            onclick="setEditServiceCount('03:00', 'ثلاث ساعات', {{ $service->id }})"
                                                            href="#">
                                                            ثلاث ساعات
                                                        </option>
                                                        <option
                                                            style="cursor: pointer; @if ($service->reservation_period == '04:00') color: #90aaf8 !important; @endif"
                                                            class="dropdown-item"
                                                            id="edit_period_04:00_{{ $service->id }}"
                                                            value="04:00"
                                                            onclick="setEditServiceCount('04:00', 'أربع ساعات', {{ $service->id }})"
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
    @else
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
                                                            onclick="setEditServiceCount('00:30', 'نصف ساعة', {{ $service->id }})"
                                                            href="#">
                                                            نصف ساعة
                                                        </option>
                                                        <option
                                                            style="cursor: pointer; @if ($service->reservation_period == '01:00') color: #90aaf8 !important; @endif"
                                                            class="dropdown-item"
                                                            id="edit_period_01:00_{{ $service->id }}"
                                                            value="01:00"
                                                            onclick="setEditServiceCount('01:00', 'ساعة', {{ $service->id }})"
                                                            href="#">
                                                            ساعة
                                                        </option>
                                                        <option
                                                            style="cursor: pointer;  @if ($service->reservation_period == '02:00') color: #90aaf8 !important; @endif"
                                                            class="dropdown-item"
                                                            id="edit_period_02:00_{{ $service->id }}"
                                                            value="02:00"
                                                            onclick="setEditServiceCount('02:00', 'ساعتين', {{ $service->id }})"
                                                            href="#">
                                                            ساعتين
                                                        </option>
                                                        <option
                                                            style="cursor: pointer; @if ($service->reservation_period == '03:00') color: #90aaf8 !important; @endif"
                                                            class="dropdown-item"
                                                            id="edit_period_03:00_{{ $service->id }}"
                                                            value="03:00"
                                                            onclick="setEditServiceCount('03:00', 'ثلاث ساعات', {{ $service->id }})"
                                                            href="#">
                                                            ثلاث ساعات
                                                        </option>
                                                        <option
                                                            style="cursor: pointer; @if ($service->reservation_period == '04:00') color: #90aaf8 !important; @endif"
                                                            class="dropdown-item"
                                                            id="edit_period_04:00_{{ $service->id }}"
                                                            value="04:00"
                                                            onclick="setEditServiceCount('04:00', 'أربع ساعات', {{ $service->id }})"
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
    @endif
@endforeach
