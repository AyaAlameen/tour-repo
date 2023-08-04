<?php $i = 1; ?>
@foreach ($places as $place)
    @if ($loop->last)
    <div class="products-row">

        <div class="product-cell">
            <span>{{ $i++ }}</span>
        </div>
        <div class="product-cell">
            <span
                class="search-value">{{ $place->translations()->where('locale', 'en')->first()->name }}</span>
        </div>
        <div class="product-cell">
            <span>{{ $place->district->city->translations()->where('locale', 'en')->first()->name }}</span>
        </div>
        <div class="product-cell">
            <span> {{ $place->district->translations()->where('locale', 'en')->first()->name }}</span>
        </div>
        <div class="product-cell">
            <span>{{ $place->subCategory->translations()->where('locale', 'en')->first()->name }}</span>
        </div>
        <div class="product-cell">
            <span>{{ $place->translations()->where('locale', 'en')->first()->description }}</span>
        </div>
        {{-- عرض الموقع --}}
        <div class="product-cell" style="cursor: pointer;">
            <span><img
                    onclick="showGeolocation({{ $place->getGeolocationArray()[0] }}, {{ $place->getGeolocationArray()[1] }})"
                    data-toggle="modal" data-target="#exampleModal8" title="Delete"
                    data-toggle="tooltip" src="img/syria.png" id="show_location_img"
                    style="width: 35px; height: 35px;"></span>
        </div>
        {{-- نهاية عرض الموقع --}}
        <div class="product-cell">
            <span>{{ $place->email }}</span>
        </div>
        <div class="product-cell">
            <span>{{ $place->phone }}</span>
        </div>
        <div class="product-cell">
            <span>{{ $place->cost }}</span>
        </div>

        <div class="product-cell">
            <span>{{ $place->profit_ratio_1 }}</span>
        </div>

        <div class="product-cell">
            <span>{{ $place->profit_ratio_2 }}</span>
        </div>
        <div class="product-cell">
            <!-- start action -->
            <div class="p-3">

                <!-- edit -->
                <a href="#" class="edit p-2" data-toggle="modal"
                    data-target="#editPlace{{ $place->id }}" title="Edit"><i
                        class="fas fa-pen"></i></a>
                <!-- Modal -->
                <div class="modal fade" style="overflow-y: auto !important;" data-backdrop="static"
                    id="editPlace{{ $place->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" style="direction:ltr;">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="edit-form-{{ $place->id }}" action="" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <table id="editTable"
                                        class="table-striped table-hover table-bordered m-auto text-primary myTable"
                                        style="direction: rtl;">
                                        <tr>
                                            <td></td>
                                            <td><input type="text" class="toggle text-primary in"
                                                    name="name_ar" required style="width: 100%;"
                                                    value="{{ $place->translations()->where('locale', 'ar')->first()->name }}">
                                                </th>
                                            <td>Name (Arabic)</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2"><span style="color: red"
                                                    class="name_ar_error_edit"></span></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="text" class="toggle text-primary in"
                                                    name="name_en" required style="width: 100%;"
                                                    value="{{ $place->translations()->where('locale', 'en')->first()->name }}">
                                                </th>
                                            <td>name (English) </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2"><span style="color: red"
                                                    class="name_en_error_edit"></span></td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td>

                                                <div class="dropdown toggle text-primary in"
                                                    style="display:inline-block; ;">

                                                    <label class="dropdown-toggle" type="button"
                                                        id="dropdownMenuButtonEdit{{ $place->id }}"
                                                        data-toggle="dropdown" aria-expanded="false">

                                                    </label>

                                                    <span
                                                        id="city-name-{{ $place->id }}">{{ $place->district->city->translations()->where('locale', 'en')->first()->name }}</span>
                                                    <div class="dropdown-menu"
                                                        aria-labelledby="dropdownMenuButtonEdit{{ $place->id }}">
                                                        @foreach ($cities as $city)
                                                            <option
                                                                style="cursor: pointer; @if ($city->id == $place->district->city_id) color: #90aaf8 !important; @endif"
                                                                class="dropdown-item"
                                                                value="{{ $city->id }}"
                                                                id="edit_city_{{ $place->id }}_{{ $city->id }}"
                                                                onclick="setEditCity({{ $city->id }}, {{ $place->id }}, '{{ $city->translations()->where('locale', 'en')->first()->name }}', 'edit_city_{{ $place->id }}_{{ $city->id }}'), filterEditDistricts({{ $city->id }}, {{ $place->id }})"
                                                                href="#">
                                                                {{ $city->translations()->where('locale', 'en')->first()->name }}
                                                            </option>
                                                        @endforeach
                                                        <input type="text"
                                                            id="edit_city_id_{{ $place->id }}"
                                                            name="city_id"
                                                            value="{{ $place->district->city_id }}"
                                                            hidden>

                                                    </div>
                                                </div>
                                            </td>
                                            <td>Governorate</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2"><span style="color: red"
                                                    class="city_error_edit"></span></td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td>
                                                <div class="dropdown toggle text-primary in"
                                                    style="display:inline-block; ;">

                                                    <label class="dropdown-toggle" type="button"
                                                        id="dropdownMenuButtonEdit{{ $place->id }}"
                                                        data-toggle="dropdown" aria-expanded="false">

                                                    </label>
                                                    <span
                                                        id="district-name-{{ $place->id }}">{{ $place->district->translations()->where('locale', 'en')->first()->name }}</span>
                                                    <div class="dropdown-menu"
                                                        aria-labelledby="dropdownMenuButtonEdit{{ $place->id }}">
                                                        @foreach ($districts as $district)
                                                            <option
                                                                style="cursor: pointer; @if ($district->id == $place->district_id) color: #90aaf8 !important; @endif"
                                                                class="dropdown-item edit_district_filter_option edit_district_city_{{ $district->city->id }}"
                                                                value="{{ $district->id }}"
                                                                id="edit_district_{{ $place->id }}_{{ $district->id }}"
                                                                onclick="setEditDistrict({{ $district->id }}, {{ $place->id }}, '{{ $district->translations()->where('locale', 'en')->first()->name }}', 'edit_district_{{ $place->id }}_{{ $district->id }}')"
                                                                href="#">
                                                                {{ $district->translations()->where('locale', 'en')->first()->name }}
                                                            </option>
                                                        @endforeach
                                                        <input type="text"
                                                            id="edit_district_id_{{ $place->id }}"
                                                            name="district_id"
                                                            value="{{ $place->district_id }}" hidden>

                                                    </div>
                                                </div>
                                            </td>
                                            <td>distrect</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2"><span style="color: red"
                                                    class="district_error_edit"></span></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div class="dropdown toggle text-primary in"
                                                    style="display:inline-block; ;">

                                                    <label class="dropdown-toggle" type="button"
                                                        id="dropdownMenuButtonEdit{{ $place->id }}"
                                                        data-toggle="dropdown" aria-expanded="false">

                                                    </label>
                                                    <span
                                                        id="sub-cat-name-{{ $place->id }}">{{ $place->subCategory->translations()->where('locale', 'en')->first()->name }}</span>
                                                    <div class="dropdown-menu"
                                                        aria-labelledby="dropdownMenuButtonEdit{{ $place->id }}">
                                                        @foreach ($sub_categories as $sub_category)
                                                            <option
                                                                style="cursor: pointer; @if ($sub_category->id == $place->sub_category_id) color: #90aaf8 !important; @endif"
                                                                class="dropdown-item"
                                                                value="{{ $sub_category->id }}"
                                                                id="edit_sub_category_{{ $place->id }}_{{ $sub_category->id }}"
                                                                onclick="setEditSubCategory({{ $sub_category->id }}, {{ $place->id }}, '{{ $sub_category->translations()->where('locale', 'ar')->first()->name }}', 'edit_sub_category_{{ $place->id }}_{{ $sub_category->id }}')"
                                                                href="#">
                                                                {{ $sub_category->translations()->where('locale', 'en')->first()->name }}
                                                            </option>
                                                        @endforeach
                                                        <input type="text"
                                                            id="edit_sub_category_id_{{ $place->id }}"
                                                            name="sub_category_id"
                                                            value="{{ $place->sub_category_id }}"
                                                            hidden>

                                                    </div>
                                                </div>
                                            </td>
                                            <td>sub category</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2"><span style="color: red"
                                                    class="sub_cat_error_edit"></span></td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td><input class="toggle text-primary in" type="text"
                                                    name="description_ar" required
                                                    value="{{ $place->translations()->where('locale', 'ar')->first()->description }}"
                                                    style="width: 100%;"></td>
                                            <td>description (Arabic)</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2"><span style="color: red"
                                                    class="des_error_edit"></span></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input class="toggle text-primary in" type="text"
                                                    name="description_en" required
                                                    value="{{ $place->translations()->where('locale', 'en')->first()->description }}"
                                                    style="width: 100%;"></th>
                                            <td>description (English)</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2"><span style="color: red"
                                                    class="des_error_edit"></span></td>
                                        </tr>
                                        <tr>

                                            <td></td>
                                            <td><input type="email" class="toggle text-primary in"
                                                    name="email" value="{{ $place->email }}">
                                            </td>
                                            <td>email</td>

                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2"><span style="color: red"
                                                    class="email_error_edit"></span></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="number" class="toggle text-primary in"
                                                    name="phone" value="{{ $place->phone }}">
                                            </td>
                                            <td>phone</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2"><span style="color: red"
                                                    class="phone_error_edit"></span></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="number" class="toggle text-primary in"
                                                    name="cost" value="{{ $place->cost }}">
                                            </td>
                                            <td>cost</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2"><span style="color: red"
                                                    class="cost_error_edit"></span></td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td><input type="number" class="toggle text-primary in"
                                                    name="profit_ratio_1"
                                                    value="{{ $place->profit_ratio_1 }}">
                                            </td>
                                            <td>external earnings ratio</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2"><span style="color: red"
                                                    class="profit_ratio_1_error_edit"></span></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="number" class="toggle text-primary in"
                                                    name="profit_ratio_2"
                                                    value="{{ $place->profit_ratio_2 }}">
                                            </td>
                                            <td>internal earnings ratio</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2"><span style="color: red"
                                                    class="profit_ratio_2_error_edit"></span></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="text-center"><img
                                                    onclick="setEditGeolocation({{ $place->getGeolocationArray()[0] }}, {{ $place->getGeolocationArray()[1] }}, {{ $place->id }})"
                                                    class="m-3" data-toggle="modal"
                                                    id="edit_location_img"
                                                    data-target="#exampleModal9"
                                                    style="cursor:pointer; border-radius:6px; width:150px; height:70px"
                                                    src="img/sy.jpg"></td>
                                            <td>location</td>
                                            <input type="hidden" name="geolocation"
                                                id="coordinates_{{ $place->id }}"
                                                value="{{ $place->geolocation }}">


                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2"><span style="color: red"
                                                    class="geolocation_error_edit"></span></td>
                                        </tr>
                                        <tr>
                                            <td onclick="removePic()"><i
                                                    class="fas fa-close text-body"></i></td>
                                            <td class="d-flex align-items-center"
                                                style="justify-content: space-between;">
                                                <i class="fas fa-plus text-body"
                                                    style="text-align: center; font-size:15px;  cursor:pointer;"
                                                    onclick="editPic()" id="edit-pic-input"
                                                    data-picid="1" title="Add Another Picture"></i>
                                                <input type="file" name="image"
                                                    class="toggle text-primary in" required
                                                    style="width:75% !important; font-size:16px;"
                                                    hidden disabled myid="first_input_edit"
                                                    onchange="previewImage(this, 'first_pic_edit')">
                                                {{-- مرري هون أول صورة من الصور مالك ببقية الشغلات --}}
                                                @if ($place->images->count() > 0)
                                                    @if ($place->images()->first()->count() > 0)
                                                        <img src="{{ asset(str_replace(app_path(), '', $place->images()->first()->image)) }}"
                                                            class="m-3" alt=""
                                                            style="cursor:pointer; width:150px; height:70px"
                                                            id="first_pic_edit">
                                                    @else
                                                        <input type="file">
                                                    @endif
                                                @endif
                                            </td>
                                            <td>images</td>
                                        </tr>
                                        @if ($place->images->count() > 0)
                                            @foreach ($place->images as $image)
                                                @if ($loop->first)
                                                @else
                                                    <tr>
                                                        <td><i onclick="removeRow()"
                                                                class="fas fa-close text-body pl-1"></i>
                                                        </td>

                                                        <td>
                                                            {{-- عرضي هون بقية الصور بحلقة فور   --}}

                                                            <img src="{{ asset(str_replace(app_path(), '', $image->image)) }}"
                                                                class="m-3" alt=""
                                                                style="cursor:pointer; width:150px; height:70px">


                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                    </table>

                                </div>
                            </form>
                            <div class="modal-footer">
                                <button type="button" class="action-button active close"
                                    data-dismiss="modal">close</button>
                                <button type="submit" id="edit-place-btn-{{ $place->id }}"
                                    onclick="editPlace('edit-form-{{ $place->id }}', {{ $place->id }})"
                                    class="app-content-headerButton">save changes</button>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- end edit -->

                <!-- delete -->
                <a href="#" class="delete" data-toggle="modal"
                    data-target="#deletePlace{{ $place->id }}" title="Delete"
                    data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                <!-- Modal -->
                <div class="modal fade" id="deletePlace{{ $place->id }}" tabindex="-1"
                    aria-labelledby="exampleModal2Label" aria-hidden="true">

                    <div class="modal-dialog">
                        <div class="modal-content" style="direction:ltr;">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="delete-form-{{ $place->id }}" action=""
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="id" value="{{ $place->id }}"
                                    hidden>
                                <div class="modal-body" style="direction:rtl;">
                                  Are you shure that you want to delete this place ?(<span
                                        style="color: #90aaf8;">{{ $place->translations()->where('locale', 'en')->first()->name }}</span>)
                                    ؟ </div>
                                <div class="modal-footer">
                                    <button type="button" class="action-button active close"
                                        data-dismiss="modal">close</button>
                                    <button type="submit" id="delete-place-btn-{{ $place->id }}"
                                        onclick="deletePlace(`delete-form-{{ $place->id }}`, {{ $place->id }})"
                                        class="app-content-headerButton">yes</button>
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

        <div class="product-cell">
            <span>{{ $i++ }}</span>
        </div>
        <div class="product-cell">
            <span
                class="search-value">{{ $place->translations()->where('locale', 'en')->first()->name }}</span>
        </div>
        <div class="product-cell">
            <span>{{ $place->district->city->translations()->where('locale', 'en')->first()->name }}</span>
        </div>
        <div class="product-cell">
            <span> {{ $place->district->translations()->where('locale', 'en')->first()->name }}</span>
        </div>
        <div class="product-cell">
            <span>{{ $place->subCategory->translations()->where('locale', 'en')->first()->name }}</span>
        </div>
        <div class="product-cell">
            <span>{{ $place->translations()->where('locale', 'en')->first()->description }}</span>
        </div>
        {{-- عرض الموقع --}}
        <div class="product-cell" style="cursor: pointer;">
            <span><img
                    onclick="showGeolocation({{ $place->getGeolocationArray()[0] }}, {{ $place->getGeolocationArray()[1] }})"
                    data-toggle="modal" data-target="#exampleModal8" title="Delete"
                    data-toggle="tooltip" src="img/syria.png" id="show_location_img"
                    style="width: 35px; height: 35px;"></span>
        </div>
        {{-- نهاية عرض الموقع --}}
        <div class="product-cell">
            <span>{{ $place->email }}</span>
        </div>
        <div class="product-cell">
            <span>{{ $place->phone }}</span>
        </div>
        <div class="product-cell">
            <span>{{ $place->cost }}</span>
        </div>

        <div class="product-cell">
            <span>{{ $place->profit_ratio_1 }}</span>
        </div>

        <div class="product-cell">
            <span>{{ $place->profit_ratio_2 }}</span>
        </div>
        <div class="product-cell">
            <!-- start action -->
            <div class="p-3">

                <!-- edit -->
                <a href="#" class="edit p-2" data-toggle="modal"
                    data-target="#editPlace{{ $place->id }}" title="Edit"><i
                        class="fas fa-pen"></i></a>
                <!-- Modal -->
                <div class="modal fade" style="overflow-y: auto !important;" data-backdrop="static"
                    id="editPlace{{ $place->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" style="direction:ltr;">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="edit-form-{{ $place->id }}" action="" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <table id="editTable"
                                        class="table-striped table-hover table-bordered m-auto text-primary myTable"
                                        style="direction: rtl;">
                                        <tr>
                                            <td></td>
                                            <td><input type="text" class="toggle text-primary in"
                                                    name="name_ar" required style="width: 100%;"
                                                    value="{{ $place->translations()->where('locale', 'ar')->first()->name }}">
                                                </th>
                                            <td>Name (Arabic)</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2"><span style="color: red"
                                                    class="name_ar_error_edit"></span></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="text" class="toggle text-primary in"
                                                    name="name_en" required style="width: 100%;"
                                                    value="{{ $place->translations()->where('locale', 'en')->first()->name }}">
                                                </th>
                                            <td>name (English) </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2"><span style="color: red"
                                                    class="name_en_error_edit"></span></td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td>

                                                <div class="dropdown toggle text-primary in"
                                                    style="display:inline-block; ;">

                                                    <label class="dropdown-toggle" type="button"
                                                        id="dropdownMenuButtonEdit{{ $place->id }}"
                                                        data-toggle="dropdown" aria-expanded="false">

                                                    </label>

                                                    <span
                                                        id="city-name-{{ $place->id }}">{{ $place->district->city->translations()->where('locale', 'en')->first()->name }}</span>
                                                    <div class="dropdown-menu"
                                                        aria-labelledby="dropdownMenuButtonEdit{{ $place->id }}">
                                                        @foreach ($cities as $city)
                                                            <option
                                                                style="cursor: pointer; @if ($city->id == $place->district->city_id) color: #90aaf8 !important; @endif"
                                                                class="dropdown-item"
                                                                value="{{ $city->id }}"
                                                                id="edit_city_{{ $place->id }}_{{ $city->id }}"
                                                                onclick="setEditCity({{ $city->id }}, {{ $place->id }}, '{{ $city->translations()->where('locale', 'en')->first()->name }}', 'edit_city_{{ $place->id }}_{{ $city->id }}'), filterEditDistricts({{ $city->id }}, {{ $place->id }})"
                                                                href="#">
                                                                {{ $city->translations()->where('locale', 'en')->first()->name }}
                                                            </option>
                                                        @endforeach
                                                        <input type="text"
                                                            id="edit_city_id_{{ $place->id }}"
                                                            name="city_id"
                                                            value="{{ $place->district->city_id }}"
                                                            hidden>

                                                    </div>
                                                </div>
                                            </td>
                                            <td>Governorate</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2"><span style="color: red"
                                                    class="city_error_edit"></span></td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td>
                                                <div class="dropdown toggle text-primary in"
                                                    style="display:inline-block; ;">

                                                    <label class="dropdown-toggle" type="button"
                                                        id="dropdownMenuButtonEdit{{ $place->id }}"
                                                        data-toggle="dropdown" aria-expanded="false">

                                                    </label>
                                                    <span
                                                        id="district-name-{{ $place->id }}">{{ $place->district->translations()->where('locale', 'en')->first()->name }}</span>
                                                    <div class="dropdown-menu"
                                                        aria-labelledby="dropdownMenuButtonEdit{{ $place->id }}">
                                                        @foreach ($districts as $district)
                                                            <option
                                                                style="cursor: pointer; @if ($district->id == $place->district_id) color: #90aaf8 !important; @endif"
                                                                class="dropdown-item edit_district_filter_option edit_district_city_{{ $district->city->id }}"
                                                                value="{{ $district->id }}"
                                                                id="edit_district_{{ $place->id }}_{{ $district->id }}"
                                                                onclick="setEditDistrict({{ $district->id }}, {{ $place->id }}, '{{ $district->translations()->where('locale', 'en')->first()->name }}', 'edit_district_{{ $place->id }}_{{ $district->id }}')"
                                                                href="#">
                                                                {{ $district->translations()->where('locale', 'en')->first()->name }}
                                                            </option>
                                                        @endforeach
                                                        <input type="text"
                                                            id="edit_district_id_{{ $place->id }}"
                                                            name="district_id"
                                                            value="{{ $place->district_id }}" hidden>

                                                    </div>
                                                </div>
                                            </td>
                                            <td>distrect</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2"><span style="color: red"
                                                    class="district_error_edit"></span></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div class="dropdown toggle text-primary in"
                                                    style="display:inline-block; ;">

                                                    <label class="dropdown-toggle" type="button"
                                                        id="dropdownMenuButtonEdit{{ $place->id }}"
                                                        data-toggle="dropdown" aria-expanded="false">

                                                    </label>
                                                    <span
                                                        id="sub-cat-name-{{ $place->id }}">{{ $place->subCategory->translations()->where('locale', 'en')->first()->name }}</span>
                                                    <div class="dropdown-menu"
                                                        aria-labelledby="dropdownMenuButtonEdit{{ $place->id }}">
                                                        @foreach ($sub_categories as $sub_category)
                                                            <option
                                                                style="cursor: pointer; @if ($sub_category->id == $place->sub_category_id) color: #90aaf8 !important; @endif"
                                                                class="dropdown-item"
                                                                value="{{ $sub_category->id }}"
                                                                id="edit_sub_category_{{ $place->id }}_{{ $sub_category->id }}"
                                                                onclick="setEditSubCategory({{ $sub_category->id }}, {{ $place->id }}, '{{ $sub_category->translations()->where('locale', 'ar')->first()->name }}', 'edit_sub_category_{{ $place->id }}_{{ $sub_category->id }}')"
                                                                href="#">
                                                                {{ $sub_category->translations()->where('locale', 'en')->first()->name }}
                                                            </option>
                                                        @endforeach
                                                        <input type="text"
                                                            id="edit_sub_category_id_{{ $place->id }}"
                                                            name="sub_category_id"
                                                            value="{{ $place->sub_category_id }}"
                                                            hidden>

                                                    </div>
                                                </div>
                                            </td>
                                            <td>sub category</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2"><span style="color: red"
                                                    class="sub_cat_error_edit"></span></td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td><input class="toggle text-primary in" type="text"
                                                    name="description_ar" required
                                                    value="{{ $place->translations()->where('locale', 'ar')->first()->description }}"
                                                    style="width: 100%;"></td>
                                            <td>description (Arabic)</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2"><span style="color: red"
                                                    class="des_error_edit"></span></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input class="toggle text-primary in" type="text"
                                                    name="description_en" required
                                                    value="{{ $place->translations()->where('locale', 'en')->first()->description }}"
                                                    style="width: 100%;"></th>
                                            <td>description (English)</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2"><span style="color: red"
                                                    class="des_error_edit"></span></td>
                                        </tr>
                                        <tr>

                                            <td></td>
                                            <td><input type="email" class="toggle text-primary in"
                                                    name="email" value="{{ $place->email }}">
                                            </td>
                                            <td>email</td>

                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2"><span style="color: red"
                                                    class="email_error_edit"></span></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="number" class="toggle text-primary in"
                                                    name="phone" value="{{ $place->phone }}">
                                            </td>
                                            <td>phone</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2"><span style="color: red"
                                                    class="phone_error_edit"></span></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="number" class="toggle text-primary in"
                                                    name="cost" value="{{ $place->cost }}">
                                            </td>
                                            <td>cost</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2"><span style="color: red"
                                                    class="cost_error_edit"></span></td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td><input type="number" class="toggle text-primary in"
                                                    name="profit_ratio_1"
                                                    value="{{ $place->profit_ratio_1 }}">
                                            </td>
                                            <td>external earnings ratio</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2"><span style="color: red"
                                                    class="profit_ratio_1_error_edit"></span></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="number" class="toggle text-primary in"
                                                    name="profit_ratio_2"
                                                    value="{{ $place->profit_ratio_2 }}">
                                            </td>
                                            <td>internal earnings ratio</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2"><span style="color: red"
                                                    class="profit_ratio_2_error_edit"></span></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="text-center"><img
                                                    onclick="setEditGeolocation({{ $place->getGeolocationArray()[0] }}, {{ $place->getGeolocationArray()[1] }}, {{ $place->id }})"
                                                    class="m-3" data-toggle="modal"
                                                    id="edit_location_img"
                                                    data-target="#exampleModal9"
                                                    style="cursor:pointer; border-radius:6px; width:150px; height:70px"
                                                    src="img/sy.jpg"></td>
                                            <td>location</td>
                                            <input type="hidden" name="geolocation"
                                                id="coordinates_{{ $place->id }}"
                                                value="{{ $place->geolocation }}">


                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2"><span style="color: red"
                                                    class="geolocation_error_edit"></span></td>
                                        </tr>
                                        <tr>
                                            <td onclick="removePic()"><i
                                                    class="fas fa-close text-body"></i></td>
                                            <td class="d-flex align-items-center"
                                                style="justify-content: space-between;">
                                                <i class="fas fa-plus text-body"
                                                    style="text-align: center; font-size:15px;  cursor:pointer;"
                                                    onclick="editPic()" id="edit-pic-input"
                                                    data-picid="1" title="Add Another Picture"></i>
                                                <input type="file" name="image"
                                                    class="toggle text-primary in" required
                                                    style="width:75% !important; font-size:16px;"
                                                    hidden disabled myid="first_input_edit"
                                                    onchange="previewImage(this, 'first_pic_edit')">
                                                {{-- مرري هون أول صورة من الصور مالك ببقية الشغلات --}}
                                                @if ($place->images->count() > 0)
                                                    @if ($place->images()->first()->count() > 0)
                                                        <img src="{{ asset(str_replace(app_path(), '', $place->images()->first()->image)) }}"
                                                            class="m-3" alt=""
                                                            style="cursor:pointer; width:150px; height:70px"
                                                            id="first_pic_edit">
                                                    @else
                                                        <input type="file">
                                                    @endif
                                                @endif
                                            </td>
                                            <td>images</td>
                                        </tr>
                                        @if ($place->images->count() > 0)
                                            @foreach ($place->images as $image)
                                                @if ($loop->first)
                                                @else
                                                    <tr>
                                                        <td><i onclick="removeRow()"
                                                                class="fas fa-close text-body pl-1"></i>
                                                        </td>

                                                        <td>
                                                            {{-- عرضي هون بقية الصور بحلقة فور   --}}

                                                            <img src="{{ asset(str_replace(app_path(), '', $image->image)) }}"
                                                                class="m-3" alt=""
                                                                style="cursor:pointer; width:150px; height:70px">


                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                    </table>

                                </div>
                            </form>
                            <div class="modal-footer">
                                <button type="button" class="action-button active close"
                                    data-dismiss="modal">close</button>
                                <button type="submit" id="edit-place-btn-{{ $place->id }}"
                                    onclick="editPlace('edit-form-{{ $place->id }}', {{ $place->id }})"
                                    class="app-content-headerButton">save changes</button>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- end edit -->

                <!-- delete -->
                <a href="#" class="delete" data-toggle="modal"
                    data-target="#deletePlace{{ $place->id }}" title="Delete"
                    data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                <!-- Modal -->
                <div class="modal fade" id="deletePlace{{ $place->id }}" tabindex="-1"
                    aria-labelledby="exampleModal2Label" aria-hidden="true">

                    <div class="modal-dialog">
                        <div class="modal-content" style="direction:ltr;">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="delete-form-{{ $place->id }}" action=""
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="id" value="{{ $place->id }}"
                                    hidden>
                                <div class="modal-body" style="direction:rtl;">
                                  Are you shure that you want to delete this place ?(<span
                                        style="color: #90aaf8;">{{ $place->translations()->where('locale', 'en')->first()->name }}</span>)
                                    ؟ </div>
                                <div class="modal-footer">
                                    <button type="button" class="action-button active close"
                                        data-dismiss="modal">close</button>
                                    <button type="submit" id="delete-place-btn-{{ $place->id }}"
                                        onclick="deletePlace(`delete-form-{{ $place->id }}`, {{ $place->id }})"
                                        class="app-content-headerButton">yes</button>
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
