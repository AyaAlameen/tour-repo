<?php $i = 1; ?>
@foreach ($events as $event)
    @if ($loop->last)
        <div class="products-row">
            <button class="cell-more-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-more-vertical">
                    <circle cx="12" cy="12" r="1" />
                    <circle cx="12" cy="5" r="1" />
                    <circle cx="12" cy="19" r="1" />
                </svg>
            </button>
            <div class="product-cell">
                <span>{{ $i++ }}</span>
            </div>
            <div class="product-cell">
                <span class="search-value">{{ $event->translations()->where('locale', 'ar')->first()->name }}</span>
            </div>


            <div class="product-cell">
                <span>{{ $event->place->translations()->where('locale', 'ar')->first()->name }}</span>
            </div>

            <div class="product-cell">
                <span>
                    {{ optional(optional(optional(optional($event->service)->translations())->where('locale', 'ar'))->first())->name }}
                </span>
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
                <a href="#" class="edit" data-toggle="modal" data-target="#editEvent{{ $event->id }}"
                    title="Edit"><i class="fas fa-pen"></i></a>

                <!-- Modal -->
                <div class="modal fade" data-backdrop="static" id="editEvent{{ $event->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" style="direction:ltr;">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="edit-form-{{ $event->id }}" action="" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <table class="table-striped table-hover table-bordered m-auto text-primary myTable"
                                        style="width: 400px;" id="editTable">
                                        <tr>

                                            <td><input type="text" class="toggle text-primary in" name="name_ar"
                                                    required style="width: 100%;"
                                                    value="{{ $event->translations()->where('locale', 'ar')->first()->name }}">
                                            </td>
                                            <td>الاسم(العربية)</td>
                                        </tr>
                                        <tr>

                                            <td colspan="2"><span style="color: red"
                                                    class="name_ar_error_edit"></span></td>

                                        </tr>

                                        <tr>

                                            <td><input type="text" class="toggle text-primary in" name="name_en"
                                                    required style="width: 100%;"
                                                    value="{{ $event->translations()->where('locale', 'en')->first()->name }}">
                                            </td>
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
                                                                class="dropdown-item" value="{{ $place->id }}"
                                                                id="edit_place_{{ $event->id }}_{{ $place->id }}"
                                                                onclick="setEditPlace({{ $place->id }}, {{ $event->id }}, '{{ $place->translations()->where('locale', 'ar')->first()->name }}', 'edit_place_{{ $event->id }}_{{ $place->id }}'), filterEditServices({{ $place->id }}, {{ $event->id }})"
                                                                href="#">
                                                                {{ $place->translations()->where('locale', 'ar')->first()->name }}
                                                            </option>
                                                        @endforeach
                                                        <input type="text" id="edit_place_id_{{ $event->id }}"
                                                            name="place_id" value="{{ $event->place_id }}" hidden>

                                                    </div>
                                                </div>
                                            </td>
                                            <td>المكان</td>
                                        </tr>
                                        <tr>

                                            <td colspan="2"><span style="color: red" class="place_error_edit"></span>
                                            </td>

                                        </tr>
                                        <tr>
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
                                                            name="service_id" value="{{ $event->service_id }}"
                                                            hidden>

                                                    </div>
                                                </div>
                                            </td>
                                            <td>الخدمة</td>
                                        </tr>
                                        <tr>

                                         <td colspan="2"><span style="color: red" class="service_error_edit"></span>
                                          </td>

                                        </tr>
                                        <tr>

                                            <td><input class="toggle text-primary in" type="text"
                                                    name="description_ar" required style="width: 100%;"
                                                    value="{{ $event->translations()->where('locale', 'en')->first()->description }}">
                                            </td>
                                            <td>وصف(العربية)</td>
                                        </tr>
                                        <tr>

                                         <td colspan="2"><span style="color: red" class="description_ar_error_edit"></span>
                                          </td>

                                        </tr>
                                        <tr>
                                            <td><input class="toggle text-primary in" type="text"
                                                    name="description_en" required style="width: 100%;"
                                                    value="{{ $event->translations()->where('locale', 'en')->first()->description }}">
                                            </td>
                                            <td>(الانكليزية)وصف</td>
                                        </tr>
                                        <tr>

                                         <td colspan="2"><span style="color: red" class="description_en_error_edit"></span>
                                          </td>

                                        </tr>
                                        
                                        <tr>

                                            <td><input type="number" name="cost" class="toggle text-primary in"
                                                    value="{{ $event->cost }}">
                                            </td>
                                            <td>الكلفة</td>

                                        </tr>
                                        <tr>

                                            <td colspan="2"><span style="color: red"
                                                    class="cost_error_edit"></span></td>

                                        </tr>
                                        <tr>

                                            <td><input type="date" name="start_date"
                                                    class="toggle text-primary in" value="{{ $event->start_date }}">
                                            </td>
                                            <td>تاريخ البداية</td>

                                        </tr>
                                        <tr>

                                            <td colspan="2"><span style="color: red"
                                                    class="start_date_error_edit"></span></td>

                                        </tr>
                                        <tr>

                                            <td><input type="date" name="end_date" class="toggle text-primary in"
                                                    value="{{ $event->end_date }}"></td>
                                            <td>تاريخ النهاية</td>

                                        </tr>
                                        <tr>

                                            <td colspan="2"><span style="color: red"
                                                    class="end_date_error_edit"></span></td>

                                        </tr>


                                    </table>

                                </div>
                            </form>
                            <div class="modal-footer">
                                <button type="button" class="action-button active close" onclick="removeMessages()"
                                    data-dismiss="modal">إغلاق</button>
                                <button type="submit" id="edit-event-btn-{{ $event->id }}"
                                    onclick="editEvent('edit-form-{{ $event->id }}', {{ $event->id }})"
                                    class="app-content-headerButton">حفظ
                                    التغييرات</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end edit -->

                <div class="p-3">

                    <!-- delete -->
                    <a href="#" class="delete" data-toggle="modal"
                        data-target="#deleteEvent{{ $event->id }}" title="Delete" data-toggle="tooltip"><i
                            class="fas fa-trash"></i></a>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteEvent{{ $event->id }}" tabindex="-1"
                        aria-labelledby="exampleModal2Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content" style="direction:ltr;">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="delete-form-{{ $event->id }}" action="" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="id" value="{{ $event->id }}" hidden>
                                    <div class="modal-body" style="direction:rtl;">
                                        هل أنت متأكد من أنك تريد حذف هذه الفعالية (<span
                                            style="color: #90aaf8;">{{ $event->translations()->where('locale', 'ar')->first()->name }}</span>)
                                        ؟
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="action-button active close"
                                            data-dismiss="modal">إغلاق</button>
                                        <button type="submit" id="delete-event-btn-{{ $event->id }}"
                                            onclick="deleteEvent(`delete-form-{{ $event->id }}`, {{ $event->id }})"
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
                <span>{{ $event->translations()->where('locale', 'ar')->first()->name }}</span>
            </div>


            <div class="product-cell">
                <span class="search-value">{{ $event->place->translations()->where('locale', 'ar')->first()->name }}</span>
            </div>

            <div class="product-cell">
                <span>
                    {{ optional(optional(optional(optional($event->service)->translations())->where('locale', 'ar'))->first())->name }}
                </span>
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
                <a href="#" class="edit" data-toggle="modal" data-target="#editEvent{{ $event->id }}"
                    title="Edit"><i class="fas fa-pen"></i></a>

                <!-- Modal -->
                <div class="modal fade" data-backdrop="static" id="editEvent{{ $event->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" style="direction:ltr;">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="edit-form-{{ $event->id }}" action="" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <table class="table-striped table-hover table-bordered m-auto text-primary myTable"
                                        style="width: 400px;" id="editTable">
                                        <tr>

                                            <td><input type="text" class="toggle text-primary in" name="name_ar"
                                                    required style="width: 100%;"
                                                    value="{{ $event->translations()->where('locale', 'ar')->first()->name }}">
                                            </td>
                                            <td>الاسم(العربية)</td>
                                        </tr>
                                        <tr>

                                            <td colspan="2"><span style="color: red"
                                                    class="name_ar_error_edit"></span></td>

                                        </tr>

                                        <tr>

                                            <td><input type="text" class="toggle text-primary in" name="name_en"
                                                    required style="width: 100%;"
                                                    value="{{ $event->translations()->where('locale', 'en')->first()->name }}">
                                            </td>
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
                                                                class="dropdown-item" value="{{ $place->id }}"
                                                                id="edit_place_{{ $event->id }}_{{ $place->id }}"
                                                                onclick="setEditPlace({{ $place->id }}, {{ $event->id }}, '{{ $place->translations()->where('locale', 'ar')->first()->name }}', 'edit_place_{{ $event->id }}_{{ $place->id }}'), filterEditServices({{ $place->id }}, {{ $event->id }})"
                                                                href="#">
                                                                {{ $place->translations()->where('locale', 'ar')->first()->name }}
                                                            </option>
                                                        @endforeach
                                                        <input type="text" id="edit_place_id_{{ $event->id }}"
                                                            name="place_id" value="{{ $event->place_id }}" hidden>

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
                                                            name="service_id" value="{{ $event->service_id }}"
                                                            hidden>

                                                    </div>
                                                </div>
                                            </td>
                                            <td>الخدمة</td>
                                        </tr>
                                        <tr>

                                         <td colspan="2"><span style="color: red" class="service_error_edit"></span>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td><input class="toggle text-primary in" type="text"
                                                    name="description_ar" required style="width: 100%;"
                                                    value="{{ $event->translations()->where('locale', 'en')->first()->description }}">
                                            </td>
                                            <td>وصف(العربية)</td>
                                        </tr>
                                        <tr>

                                         <td colspan="2"><span style="color: red" class="description_ar_error_edit"></span>
                                          </td>

                                        </tr>
                                        <tr>
                                            <td><input class="toggle text-primary in" type="text"
                                                    name="description_en" required style="width: 100%;"
                                                    value="{{ $event->translations()->where('locale', 'en')->first()->description }}">
                                            </td>
                                            <td>(الانكليزية)وصف</td>
                                        </tr>
                                        <tr>

                                         <td colspan="2"><span style="color: red" class="description_en_error_edit"></span>
                                          </td>

                                        </tr>
                                        <tr>

                                            <td><input type="number" name="cost" class="toggle text-primary in"
                                                    value="{{ $event->cost }}">
                                            </td>
                                            <td>الكلفة</td>

                                        </tr>
                                        <tr>

                                            <td colspan="2"><span style="color: red"
                                                    class="cost_error_edit"></span></td>

                                        </tr>
                                        <tr>

                                            <td><input type="date" name="start_date"
                                                    class="toggle text-primary in" value="{{ $event->start_date }}">
                                            </td>
                                            <td>تاريخ البداية</td>

                                        </tr>
                                        <tr>

                                            <td colspan="2"><span style="color: red"
                                                    class="start_date_error_edit"></span></td>

                                        </tr>
                                        <tr>

                                            <td><input type="date" name="end_date" class="toggle text-primary in"
                                                    value="{{ $event->end_date }}"></td>
                                            <td>تاريخ النهاية</td>

                                        </tr>
                                        <tr>

                                            <td colspan="2"><span style="color: red"
                                                    class="end_date_error_edit"></span></td>

                                        </tr>


                                    </table>

                                </div>
                            </form>
                            <div class="modal-footer">
                                <button type="button" class="action-button active close" onclick="removeMessages()"
                                    data-dismiss="modal">إغلاق</button>
                                <button type="submit" id="edit-event-btn-{{ $event->id }}"
                                    onclick="editEvent('edit-form-{{ $event->id }}', {{ $event->id }})"
                                    class="app-content-headerButton">حفظ
                                    التغييرات</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end edit -->

                <div class="p-3">

                    <!-- delete -->
                    <a href="#" class="delete" data-toggle="modal"
                        data-target="#deleteEvent{{ $event->id }}" title="Delete" data-toggle="tooltip"><i
                            class="fas fa-trash"></i></a>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteEvent{{ $event->id }}" tabindex="-1"
                        aria-labelledby="exampleModal2Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content" style="direction:ltr;">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="delete-form-{{ $event->id }}" action="" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="id" value="{{ $event->id }}" hidden>
                                    <div class="modal-body" style="direction:rtl;">
                                        هل أنت متأكد من أنك تريد حذف هذه الفعالية (<span
                                            style="color: #90aaf8;">{{ $event->translations()->where('locale', 'ar')->first()->name }}</span>)
                                        ؟
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="action-button active close"
                                            data-dismiss="modal">إغلاق</button>
                                        <button type="submit" id="delete-event-btn-{{ $event->id }}"
                                            onclick="deleteEvent(`delete-form-{{ $event->id }}`, {{ $event->id }})"
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
