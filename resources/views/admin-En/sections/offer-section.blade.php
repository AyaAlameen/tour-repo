<?php $i = 1; ?>
@foreach ($offers as $offer)
    @if ($loop->last)
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
            <span
                class="search-value">{{ $offer->translations()->where('locale', 'en')->first()->name }}</span>
        </div>
        <div class="product-cell">
            <img src="{{ asset(str_replace(app_path(), '', $offer->image)) }}" alt="product">
        </div>

        <div class="product-cell">
            <span>{{ $offer->place->translations()->where('locale', 'en')->first()->name }}</span>
        </div>

        <div class="product-cell">
            <span>
                {{ optional(optional(optional(optional($offer->service)->translations())->where('locale', 'en'))->first())->name }}
            </span>
        </div>
        <div class="product-cell">
            <span>{{ $offer->translations()->where('locale', 'en')->first()->description }}</span>
        </div>
        <div class="product-cell">
            <span>{{ $offer->cost }}</span>
        </div>
        <div class="product-cell">
            <span>{{ $offer->start_date }}</span>
        </div>
        <div class="product-cell">
            <span>{{ $offer->end_date }}</span>
        </div>
        <div class="product-cell">
            <!-- start action -->


            <!-- edit -->
            <a href="#" class="edit" data-toggle="modal"
                data-target="#editOffer{{ $offer->id }}" title="Edit"><i
                    class="fas fa-pen"></i></a>

            <!-- Modal -->
            <div class="modal fade" data-backdrop="static" id="editOffer{{ $offer->id }}"
                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="edit-form-{{ $offer->id }}" action="" method="POST"
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
                                                value="{{ $offer->translations()->where('locale', 'ar')->first()->name }}">
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
                                                value="{{ $offer->translations()->where('locale', 'en')->first()->name }}">
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
                                                    id="dropdownMenuButtonEdit{{ $offer->id }}"
                                                    data-toggle="dropdown" aria-expanded="false">

                                                </label>

                                                <span
                                                    id="place-name-{{ $offer->id }}">{{ $offer->place->translations()->where('locale', 'ar')->first()->name }}</span>
                                                <div class="dropdown-menu"
                                                    aria-labelledby="dropdownMenuButtonEdit{{ $offer->id }}">
                                                    @foreach ($places as $place)
                                                        <option
                                                            style="cursor: pointer; @if ($place->id == $offer->place_id) color: #90aaf8 !important; @endif"
                                                            class="dropdown-item"
                                                            value="{{ $place->id }}"
                                                            id="edit_place_{{ $offer->id }}_{{ $place->id }}"
                                                            onclick="setEditPlace({{ $place->id }}, {{ $offer->id }}, '{{ $place->translations()->where('locale', 'ar')->first()->name }}', 'edit_place_{{ $offer->id }}_{{ $place->id }}'), filterEditServices({{ $place->id }}, {{ $offer->id }})"
                                                            href="#">
                                                            {{ $place->translations()->where('locale', 'ar')->first()->name }}
                                                        </option>
                                                    @endforeach
                                                    <input type="text"
                                                        id="edit_place_id_{{ $offer->id }}"
                                                        name="place_id"
                                                        value="{{ $offer->place_id }}" hidden>

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
                                                    id="dropdownMenuButtonEdit{{ $offer->id }}"
                                                    data-toggle="dropdown" aria-expanded="false">

                                                </label>
                                                <span
                                                    id="service-name-{{ $offer->id }}">{{ optional(optional(optional(optional($offer->service)->translations())->where('locale', 'ar'))->first())->name }}</span>
                                                <div class="dropdown-menu"
                                                    aria-labelledby="dropdownMenuButtonEdit{{ $offer->id }}">
                                                    @foreach ($services as $service)
                                                        <option
                                                            style="cursor: pointer; @if ($service->id == $offer->service_id) color: #90aaf8 !important; @endif"
                                                            class="dropdown-item edit_service_filter_option edit_service_place_{{ $service->place->id }}"
                                                            value="{{ $service->id }}"
                                                            id="edit_service_{{ $offer->id }}_{{ $service->id }}"
                                                            onclick="setEditService({{ $service->id }}, {{ $offer->id }}, '{{ $service->translations()->where('locale', 'ar')->first()->name }}', 'edit_service_{{ $offer->id }}_{{ $service->id }}')"
                                                            href="#">
                                                            {{ $service->translations()->where('locale', 'ar')->first()->name }}
                                                        </option>
                                                    @endforeach
                                                    <input type="text"
                                                        id="edit_service_id_{{ $offer->id }}"
                                                        name="service_id"
                                                        value="{{ $offer->service_id }}" hidden>

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
                                                value="{{ $offer->translations()->where('locale', 'ar')->first()->description }}">
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
                                                value="{{ $offer->translations()->where('locale', 'en')->first()->description }}">
                                            </th>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><span
                                                class="text-danger p-1 des_error_edit"></span></td>
                                    </tr>
                                    <tr>
                                        <td>cost</td>
                                        <td><input type="number" class="toggle text-primary in"
                                                name="cost" value="{{ $offer->cost }}">
                                        </td>

                                    </tr>

                                    <tr>
                                        <td colspan="2"><span
                                                class="text-danger p-1 cost_error_edit"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Start date</td>
                                        <td><input type="date" class="toggle text-primary in"
                                                name="start_date" value="{{ $offer->start_date }}">
                                        </td>

                                    </tr>
                                    <tr>
                                        <td colspan="2"><span
                                                class="text-danger p-1 start_date_error_edit"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>end date</td>
                                        <td><input type="date" class="toggle text-primary in"
                                                name="end_date" value="{{ $offer->end_date }}"></td>

                                    </tr>
                                    <tr>
                                        <td colspan="2"><span
                                                class="text-danger p-1 end_date_error_edit"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Image </td>
                                        <td><input type="file" name="image"
                                                id="img{{ $offer->id }}" hidden
                                                onchange="previewImage(this, 'edit_previewImage_{{ $offer->id }}')">
                                            <label for="img{{ $offer->id }}"><img
                                                    id="edit_previewImage_{{ $offer->id }}"
                                                    src="{{ asset(str_replace(app_path(), '', $offer->image)) }}"
                                                    style="padding-top: 5px; border-radius: 0px; width:170px; height:90px;"></label>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td colspan="2"><span
                                                class="text-danger p-1 image_error_edit"></span>
                                        </td>
                                    </tr>
                                </table>

                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="action-button active close"
                                onclick="removeMessages()" data-dismiss="modal">Close</button>
                            <button type="submit" class="app-content-headerButton"
                                id="edit-offer-btn-{{ $offer->id }}"
                                onclick="editOffer('edit-form-{{ $offer->id }}', {{ $offer->id }})">Save
                                changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end edit -->

            <div class="p-3">

                <!-- delete -->
                <a href="#" class="delete" data-toggle="modal"
                    data-target="#deleteOffer{{ $offer->id }}" title="Delete"
                    data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                <!-- Modal -->
                <div class="modal fade" id="deleteOffer{{ $offer->id }}" tabindex="-1"
                    aria-labelledby="exampleModal2Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="delete-form-{{ $offer->id }}" action="" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="id" value="{{ $offer->id }}"
                                    hidden>
                                <div class="modal-body">
                                    Are you sure that you want to delete This offer (<span
                                        style="color: #90aaf8;">{{ $offer->translations()->where('locale', 'en')->first()->name }}</span>)?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="action-button active close"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" id="delete-offer-btn-{{ $offer->id }}"
                                        onclick="deleteOffer(`delete-form-{{ $offer->id }}`, {{ $offer->id }})"
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
            <span>{{ $i++ }}</span>
        </div>
        <div class="product-cell">
            <span
                class="search-value">{{ $offer->translations()->where('locale', 'en')->first()->name }}</span>
        </div>
        <div class="product-cell">
            <img src="{{ asset(str_replace(app_path(), '', $offer->image)) }}" alt="product">
        </div>

        <div class="product-cell">
            <span>{{ $offer->place->translations()->where('locale', 'en')->first()->name }}</span>
        </div>

        <div class="product-cell">
            <span>
                {{ optional(optional(optional(optional($offer->service)->translations())->where('locale', 'en'))->first())->name }}
            </span>
        </div>
        <div class="product-cell">
            <span>{{ $offer->translations()->where('locale', 'en')->first()->description }}</span>
        </div>
        <div class="product-cell">
            <span>{{ $offer->cost }}</span>
        </div>
        <div class="product-cell">
            <span>{{ $offer->start_date }}</span>
        </div>
        <div class="product-cell">
            <span>{{ $offer->end_date }}</span>
        </div>
        <div class="product-cell">
            <!-- start action -->


            <!-- edit -->
            <a href="#" class="edit" data-toggle="modal"
                data-target="#editOffer{{ $offer->id }}" title="Edit"><i
                    class="fas fa-pen"></i></a>

            <!-- Modal -->
            <div class="modal fade" data-backdrop="static" id="editOffer{{ $offer->id }}"
                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="edit-form-{{ $offer->id }}" action="" method="POST"
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
                                                value="{{ $offer->translations()->where('locale', 'ar')->first()->name }}">
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
                                                value="{{ $offer->translations()->where('locale', 'en')->first()->name }}">
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
                                                    id="dropdownMenuButtonEdit{{ $offer->id }}"
                                                    data-toggle="dropdown" aria-expanded="false">

                                                </label>

                                                <span
                                                    id="place-name-{{ $offer->id }}">{{ $offer->place->translations()->where('locale', 'ar')->first()->name }}</span>
                                                <div class="dropdown-menu"
                                                    aria-labelledby="dropdownMenuButtonEdit{{ $offer->id }}">
                                                    @foreach ($places as $place)
                                                        <option
                                                            style="cursor: pointer; @if ($place->id == $offer->place_id) color: #90aaf8 !important; @endif"
                                                            class="dropdown-item"
                                                            value="{{ $place->id }}"
                                                            id="edit_place_{{ $offer->id }}_{{ $place->id }}"
                                                            onclick="setEditPlace({{ $place->id }}, {{ $offer->id }}, '{{ $place->translations()->where('locale', 'ar')->first()->name }}', 'edit_place_{{ $offer->id }}_{{ $place->id }}'), filterEditServices({{ $place->id }}, {{ $offer->id }})"
                                                            href="#">
                                                            {{ $place->translations()->where('locale', 'ar')->first()->name }}
                                                        </option>
                                                    @endforeach
                                                    <input type="text"
                                                        id="edit_place_id_{{ $offer->id }}"
                                                        name="place_id"
                                                        value="{{ $offer->place_id }}" hidden>

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
                                                    id="dropdownMenuButtonEdit{{ $offer->id }}"
                                                    data-toggle="dropdown" aria-expanded="false">

                                                </label>
                                                <span
                                                    id="service-name-{{ $offer->id }}">{{ optional(optional(optional(optional($offer->service)->translations())->where('locale', 'ar'))->first())->name }}</span>
                                                <div class="dropdown-menu"
                                                    aria-labelledby="dropdownMenuButtonEdit{{ $offer->id }}">
                                                    @foreach ($services as $service)
                                                        <option
                                                            style="cursor: pointer; @if ($service->id == $offer->service_id) color: #90aaf8 !important; @endif"
                                                            class="dropdown-item edit_service_filter_option edit_service_place_{{ $service->place->id }}"
                                                            value="{{ $service->id }}"
                                                            id="edit_service_{{ $offer->id }}_{{ $service->id }}"
                                                            onclick="setEditService({{ $service->id }}, {{ $offer->id }}, '{{ $service->translations()->where('locale', 'ar')->first()->name }}', 'edit_service_{{ $offer->id }}_{{ $service->id }}')"
                                                            href="#">
                                                            {{ $service->translations()->where('locale', 'ar')->first()->name }}
                                                        </option>
                                                    @endforeach
                                                    <input type="text"
                                                        id="edit_service_id_{{ $offer->id }}"
                                                        name="service_id"
                                                        value="{{ $offer->service_id }}" hidden>

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
                                                value="{{ $offer->translations()->where('locale', 'ar')->first()->description }}">
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
                                                value="{{ $offer->translations()->where('locale', 'en')->first()->description }}">
                                            </th>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><span
                                                class="text-danger p-1 des_error_edit"></span></td>
                                    </tr>
                                    <tr>
                                        <td>cost</td>
                                        <td><input type="number" class="toggle text-primary in"
                                                name="cost" value="{{ $offer->cost }}">
                                        </td>

                                    </tr>

                                    <tr>
                                        <td colspan="2"><span
                                                class="text-danger p-1 cost_error_edit"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Start date</td>
                                        <td><input type="date" class="toggle text-primary in"
                                                name="start_date" value="{{ $offer->start_date }}">
                                        </td>

                                    </tr>
                                    <tr>
                                        <td colspan="2"><span
                                                class="text-danger p-1 start_date_error_edit"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>end date</td>
                                        <td><input type="date" class="toggle text-primary in"
                                                name="end_date" value="{{ $offer->end_date }}"></td>

                                    </tr>
                                    <tr>
                                        <td colspan="2"><span
                                                class="text-danger p-1 end_date_error_edit"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Image </td>
                                        <td><input type="file" name="image"
                                                id="img{{ $offer->id }}" hidden
                                                onchange="previewImage(this, 'edit_previewImage_{{ $offer->id }}')">
                                            <label for="img{{ $offer->id }}"><img
                                                    id="edit_previewImage_{{ $offer->id }}"
                                                    src="{{ asset(str_replace(app_path(), '', $offer->image)) }}"
                                                    style="padding-top: 5px; border-radius: 0px; width:170px; height:90px;"></label>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td colspan="2"><span
                                                class="text-danger p-1 image_error_edit"></span>
                                        </td>
                                    </tr>
                                </table>

                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="action-button active close"
                                onclick="removeMessages()" data-dismiss="modal">Close</button>
                            <button type="submit" class="app-content-headerButton"
                                id="edit-offer-btn-{{ $offer->id }}"
                                onclick="editOffer('edit-form-{{ $offer->id }}', {{ $offer->id }})">Save
                                changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end edit -->

            <div class="p-3">

                <!-- delete -->
                <a href="#" class="delete" data-toggle="modal"
                    data-target="#deleteOffer{{ $offer->id }}" title="Delete"
                    data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                <!-- Modal -->
                <div class="modal fade" id="deleteOffer{{ $offer->id }}" tabindex="-1"
                    aria-labelledby="exampleModal2Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="delete-form-{{ $offer->id }}" action="" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="id" value="{{ $offer->id }}"
                                    hidden>
                                <div class="modal-body">
                                    Are you sure that you want to delete This offer (<span
                                        style="color: #90aaf8;">{{ $offer->translations()->where('locale', 'en')->first()->name }}</span>)?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="action-button active close"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" id="delete-offer-btn-{{ $offer->id }}"
                                        onclick="deleteOffer(`delete-form-{{ $offer->id }}`, {{ $offer->id }})"
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
    @endif
@endforeach
