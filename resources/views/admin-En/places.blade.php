@extends('adminLayout-En.master')
@section('admincontent')
    <div class="app-content">
        <div class="app-content-header" style="width:51.5%;">
            <h1 class="app-content-headerText">Places</h1>

            <!-- add -->
            <button type="button" class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                 add place
            </button>

            <!-- Modal -->
            <div class="modal fade " style="overflow-y:scroll;" data-bs-backdrop="static" id="exampleModal3" tabindex="-1"
                aria-labelledby="exampleModal3Label" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content toggle">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModal3Label">New place</h5>
                            <button type="button" class="btn-close m-0 close"
                                onclick="removeMessages(), document.getElementById('add-form').reset()"
                                data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="add-form" action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <table style=" width: 400px; direction: rtl;" id="addTable"
                                    class="table-striped table-hover table-bordered m-auto text-primary myTable">

                                    <tr>
                                        <td></td>
                                        <td><input type="text" class="toggle text-primary in" name="name_ar" required
                                                style="width: 100%;"></th>
                                        <td>name (Arabic)</td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td colspan="2" class=" text-danger p-1"><span id="name_ar_error"></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td><input type="text" class="toggle text-primary in" name="name_en" required
                                                style="width: 100%;"></th>
                                        <td>name (English)  </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2" class=" text-danger p-1"><span id="name_en_error"></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>
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
                                                            onclick="setCity({{ $city->id }}, '{{ $city->translations()->where('locale', 'en')->first()->name }}', 'city_{{ $city->id }}'), filterDistricts({{ $city->id }})"
                                                            href="#">
                                                            {{ $city->translations()->where('locale', 'en')->first()->name }}
                                                        </option>
                                                    @endforeach
                                                    <input type="text" id="city_id" name="city_id" hidden>

                                                </div>
                                            </div>
                                        </td>
                                        <td>city</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2" class=" text-danger p-1"><span id="city_error"></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td>
                                            <div class="dropdown toggle text-primary in" style="display:inline-block; ;">

                                                <label class="dropdown-toggle" type="button" id="dropdownMenuButton"
                                                    data-toggle="dropdown" aria-expanded="false">

                                                </label>
                                                <span id="district-name"></span>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    @foreach ($districts as $district)
                                                        <option style="cursor: pointer;"
                                                            class="dropdown-item district_filter_option district_city_{{ $district->city->id }}"
                                                            value="{{ $district->id }}" id="district_{{ $district->id }}"
                                                            onclick="setDistrict({{ $district->id }}, '{{ $district->translations()->where('locale', 'en')->first()->name }}', 'district_{{ $district->id }}')"
                                                            hidden href="#">
                                                            {{ $district->translations()->where('locale', 'en')->first()->name }}
                                                        </option>
                                                    @endforeach
                                                    <input type="text" id="district_id" name="district_id" hidden>

                                                </div>
                                            </div>
                                        </td>
                                        <td>district</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2" class=" text-danger p-1"><span
                                                id="district_error"></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td>
                                            <div class="dropdown toggle text-primary in" style="display:inline-block; ;">

                                                <label class="dropdown-toggle" type="button" id="dropdownMenuButton"
                                                    data-toggle="dropdown" aria-expanded="false">

                                                </label>
                                                <span id="sub-cat-name"></span>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    @foreach ($sub_categories as $sub_category)
                                                        <option style="cursor: pointer;" class="dropdown-item"
                                                            value="{{ $sub_category->id }}"
                                                            id="sub_category_{{ $sub_category->id }}"
                                                            onclick="setSubCategory({{ $sub_category->id }}, '{{ $sub_category->translations()->where('locale', 'en')->first()->name }}', 'sub_category_{{ $sub_category->id }}')"
                                                            href="#">
                                                            {{ $sub_category->translations()->where('locale', 'en')->first()->name }}
                                                        </option>
                                                    @endforeach
                                                    <input type="text" id="sub_category_id" name="sub_category_id"
                                                        hidden>

                                                </div>
                                            </div>
                                        </td>
                                        <td> sub category</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2" class=" text-danger p-1"><span
                                                id="sub_category_error"></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td><input class="toggle text-primary in" type="text" name="description_ar"
                                                required style="width: 100%;"></th>
                                        <td>description (Arabic)</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2" class=" text-danger p-1"><span
                                                id="description_ar_error"></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td><input class="toggle text-primary in" type="text" name="description_en"
                                                required style="width: 100%;"></th>
                                        <td>description (English)</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2" class=" text-danger p-1"><span
                                                id="description_en_error"></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td><input class="toggle text-primary in" type="email" name="email" required
                                                style="width: 100%;"></th>
                                        <td>email</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2" class=" text-danger p-1"><span
                                                id="email_error"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input class="toggle text-primary in" type="number" name="phone" required
                                                style="width: 100%;"></th>
                                        <td>phone</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2" class=" text-danger p-1"><span
                                                id="phone_error"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input class="toggle text-primary in" type="number" name="cost"
                                                style="width: 100%;"></th>
                                        <td>cost</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2" class=" text-danger p-1"><span id="cost_error"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input class="toggle text-primary in" type="number" name="profit_ratio_1"
                                                required style="width: 100%;"></th>
                                        <td style="width: 150px;">external earnings ratio</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2" class=" text-danger p-1"><span
                                                id="profit_ratio_1_error"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input class="toggle text-primary in" type="number" name="profit_ratio_2"
                                                required style="width: 100%;"></th>
                                        <td>internal earnings ratio</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2" class=" text-danger p-1"><span
                                                id="profit_ratio_2_error"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <!--add map -->
                                        <td class="text-center"><img class="m-3" data-bs-toggle="modal"
                                                id="mapimg" data-bs-target="#exampleModal6"
                                                style="cursor:pointer; border-radius:6px;" src="img/sy.jpg"
                                                width="150px" height="70px"></td>
                                        <input type="hidden" name="geolocation" id="coordinates">

                                        <td>location</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2" class=" text-danger p-1"><span
                                                id="geolocation_error"></span>
                                        </td>
                                    </tr>
                                    <div class="modal fade bg-light" id="exampleModal6" data-bs-backdrop="static"
                                        tabindex="-1" aria-labelledby="exampleModal6Label" aria-hidden="true">
                                        <div class="modal-dialog h-100" style="margin:0%; max-width:100%; ">
                                            <div class="modal-content toggle w-100 h-100">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModal6Label">Add the place on the map</h5>
                                                    <button type="button" class="btn-close m-0 close"
                                                        onclick="hidemap('exampleModal6')" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="add-map" class="w-100 h-100"></div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="action-button active"
                                                        onclick="hidemap('exampleModal6')">close</button>
                                                    <button type="button" id="save-map-btn" onclick="spinner()"
                                                        class="app-content-headerButton">save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- end add map -->


                                </table>
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="action-button active close"
                                onclick="removeMessages(), document.getElementById('add-form').reset()"
                                data-bs-dismiss="modal">close</button>
                            <button type="button" id="add-place-btn" onclick="addPlace('add-form')"
                                class="app-content-headerButton">save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end add -->

        <div class="app-content-actions" style="width:52%;">
            <input class="search-bar" onkeyup="searchFunction()" id="search" placeholder="search in name..."
                type="text">
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
                        <label>city</label>
                        <select>
                            <option>كل المدن</option>
                            <option>حلب</option>
                            <option>حماة</option>
                            <option>حمص</option>
                            <option>دمشق</option>
                            <option>طرطوس</option>
                        </select>
                        <label>sub category</label>
                        <select>
                            <option>كل الأصناف الفرعية</option>
                            <option>مساجد</option>
                            <option>كنائس</option>
                            <option>مطاعم</option>
                            <option>فنادق</option>
                            <option>ملاهي</option>
                        </select>
                       
                        <div class="filter-menu-buttons">

                            <button class="filter-button apply">
                                ok
                            </button>
                        </div>
                    </div>
                </div> --}}
                <!-- end filter -->
                

                <div class="nav-item dropdown">
                    <button class="action-button list dropdown-toggle" data-bs-toggle="dropdown" title="translate"> <i
                            class="fas fa-globe "></i> </button>

                    <div class="dropdown-menu border-0 rounded-0 m-0 toggle">
                        <a href="{{ route('place_ar') }}" class="dropdown-item"> Arabic</a>
                        <a href="{{ route('place_en') }}" class="dropdown-item">English </a>

                    </div>
                </div>
                <button class="mode-switch" title="switch thim" style="margin-left:5px;">
                    <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                        <defs></defs>
                        <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                    </svg>
                </button>

            </div>
        </div>
        <div class="scroll-class" style="width:51%;">
            <div class="products-area-wrapper tableView" id="placesTable">
                <div class="products-header">
                    <div class="product-cell">#</div>
                    <div class="product-cell">Name</div>
                    <div class="product-cell">city</div>
                    <div class="product-cell">distrect</div>
                    <div class="product-cell">sub category</div>
                    <div class="product-cell">description</div>
                    <div class="product-cell">location</div>
                    <div class="product-cell">email</div>
                    <div class="product-cell">phone</div>
                    <div class="product-cell">cost</div>
                    <div class="product-cell">internal earnings ratio</div>
                    <div class="product-cell">external earnings ratio</div>
                    <div class="product-cell">actions</div>

                </div>

                <div id="places-data">
                    <?php $i = 1; ?>
                    @foreach ($places as $place)
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
                                                                <td>City</td>
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
                                                                                    onclick="setEditSubCategory({{ $sub_category->id }}, {{ $place->id }}, '{{ $sub_category->translations()->where('locale', 'en')->first()->name }}', 'edit_sub_category_{{ $place->id }}_{{ $sub_category->id }}')"
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
                                <a href="{{route('place_pic_en', ['id' => $place->id])}}" class="text-body" title="Pictures"><i class="fas fa-photo-film"></i></a>
                            </div>

                            <!-- end action -->


                        </div>
                    @endforeach

                    {{-- مودل عرض الخريطة بالجدول --}}

                    <!-- Modal -->

                    <div class="modal fade bg-light" id="exampleModal8" data-bs-backdrop="static" tabindex="-1"
                        aria-labelledby="exampleModal8Label" aria-hidden="true">
                        <div class="modal-dialog h-100" style="margin:0%; max-width:100%; ">
                            <div class="modal-content toggle w-100 h-100">
                                <div class="modal-header">
                                    <button type="button" class="btn-close m-0 close" onclick="hidemap('exampleModal8')"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div id="show-map" class="w-100 h-100"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- نهاية مودل عرض الخريطة بالجدول --}}




                    {{-- مودل تعديل الخريطة --}}
                    <div class="modal fade p-0" id="exampleModal9" tabindex="-2" aria-labelledby="exampleModal9Label"
                        aria-hidden="true">
                        <div class="modal-dialog h-100" style="margin:0%; max-width:100%; ">
                            <div class="modal-content toggle w-100 h-100">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModal9Label">
                                    edit location on the map                                        
                                    </h5>
                                    <button type="button" class="btn-close m-0 close"
                                        onclick="hidemap('exampleModal9')">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {{-- الخريطة --}}
                                    <div id="show-edit-map" class="w-100 h-100"></div>
                                </div>
                                <div class="modal-footer" style="direction: ltr;">
                                    <button type="button" class="action-button active close"
                                        onclick="hidemap('exampleModal9')">close</button>
                                    <button type="button" id="save-map-btn-edit" onclick="spinner()"
                                        class="app-content-headerButton">save</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- نهاية مودل تعديل الخريطة --}}
                </div>
            </div>

        </div>
    </div>


    </div>


    </div>
@endsection


<script>
    function addPlace(formId) {
        $("#add-place-btn").attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById('add-form'));
        $.ajax({
                url: "{{ route('addPlaceEn') }}",
                type: "POST",
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
                $("#places-data").empty();
                $("#places-data").append(data);
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


                if (data.responseJSON.errors.city_id) {
                    document.querySelector(`#${formId} #city_error`).innerHTML = data.responseJSON.errors.city_id[
                        0];
                }

                if (data.responseJSON.errors.district_id) {
                    document.querySelector(`#${formId} #district_error`).innerHTML = data.responseJSON.errors
                        .district_id[0];
                }

                if (data.responseJSON.errors.sub_category_id) {
                    document.querySelector(`#${formId} #sub_category_error`).innerHTML = data.responseJSON.errors
                        .sub_category_id[0];
                }

                if (data.responseJSON.errors.email) {
                    document.querySelector(`#${formId} #email_error`).innerHTML = data.responseJSON.errors.email[0];
                }

                if (data.responseJSON.errors.phone) {
                    document.querySelector(`#${formId} #phone_error`).innerHTML = data.responseJSON.errors.phone[0];
                }

                if (data.responseJSON.errors.cost) {
                    document.querySelector(`#${formId} #cost_error`).innerHTML = data.responseJSON.errors.cost[0];
                }

                if (data.responseJSON.errors.profit_ratio_1) {
                    document.querySelector(`#${formId} #profit_ratio_1_error`).innerHTML = data.responseJSON.errors
                        .profit_ratio_1[0];
                }

                if (data.responseJSON.errors.profit_ratio_2) {
                    document.querySelector(`#${formId} #profit_ratio_2_error`).innerHTML = data.responseJSON.errors
                        .profit_ratio_2[0];
                }

                if (data.responseJSON.errors.geolocation) {
                    document.querySelector(`#${formId} #geolocation_error`).innerHTML = data.responseJSON.errors
                        .geolocation[0];
                }

            })
            .always(function() {
                // Re-enable the submit button and hide the loading spinner
                $("#add-place-btn").attr("disabled", false).html('حفظ');
            });
    }
    //----------------------------------------------------------

    function editPlace(formId, id) {

        $("#edit-place-btn-" + id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById(formId));
        formData.append('id', id);
        $.ajax({
                url: `{{ route('editPlaceEn') }}`,
                type: "POST",
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {

                $("#places-data").empty();
                $("#places-data").append(data);
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


                if (data.responseJSON.errors.city_id) {
                    document.querySelector(`#${formId} .city_error_edit`).innerHTML = data.responseJSON.errors
                        .city_id[
                            0];
                }

                if (data.responseJSON.errors.district_id) {
                    document.querySelector(`#${formId} .district_error_edit`).innerHTML = data.responseJSON.errors
                        .district_id[0];
                }

                if (data.responseJSON.errors.sub_category_id) {
                    document.querySelector(`#${formId} .sub_category_error_edit`).innerHTML = data.responseJSON
                        .errors
                        .sub_category_id[0];
                }

                if (data.responseJSON.errors.email) {
                    document.querySelector(`#${formId} .email_error_edit`).innerHTML = data.responseJSON.errors
                        .email[0];
                }

                if (data.responseJSON.errors.phone) {
                    document.querySelector(`#${formId} .phone_error_edit`).innerHTML = data.responseJSON.errors
                        .phone[0];
                }

                if (data.responseJSON.errors.cost) {
                    document.querySelector(`#${formId} .cost_error_edit`).innerHTML = data.responseJSON.errors.cost[
                        0];
                }

                if (data.responseJSON.errors.profit_ratio_1) {
                    document.querySelector(`#${formId} .profit_ratio_1_error_edit`).innerHTML = data.responseJSON
                        .errors
                        .profit_ratio_1[0];
                }

                if (data.responseJSON.errors.profit_ratio_2) {
                    document.querySelector(`#${formId} .profit_ratio_2_error_edit`).innerHTML = data.responseJSON
                        .errors
                        .profit_ratio_2[0];
                }

                if (data.responseJSON.errors.geolocation) {
                    document.querySelector(`#${formId} .geolocation_error_edit`).innerHTML = data.responseJSON
                        .errors
                        .geolocation[0];
                }

            })
            .always(function() {
                // Re-enable the submit button and hide the loading spinner
                $("#edit-place-btn-" + id).attr("disabled", false).html('حفظ');
            });
    }

    //---------------------------------------------------------------
    function deletePlace(formId, id) {
        $("#delete-place-btn-" + id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');

        var formData = new FormData(document.getElementById(formId));
        $.ajax({
                url: `{{ route('deletePlaceEn') }}`,
                type: "POST",
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
                $("#places-data").empty();
                $("#places-data").append(data);
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
                $("#delete-place-btn-" + id).attr("disabled", false).html('نعم');
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
        table = document.getElementById("placesTable");
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
        document.getElementById('city_error').innerHTML = '';
        document.getElementById('district_error').innerHTML = '';
        document.getElementById('sub_category_error').innerHTML = '';
        document.getElementById('email_error').innerHTML = '';
        document.getElementById('phone_error').innerHTML = '';
        document.getElementById('cost_error').innerHTML = '';
        document.getElementById('profit_ratio_1_error').innerHTML = '';
        document.getElementById('profit_ratio_2_error').innerHTML = '';
        document.getElementById('geolocation_error').innerHTML = '';

        const name_ar = document.querySelectorAll('.name_ar_error_edit');
        name_ar.forEach(name => {
            name.innerHTML = '';
        });

        const name_en = document.querySelectorAll('.name_en_error_edit');
        name_en.forEach(name => {
            name.innerHTML = '';
        });

        const citys = document.querySelectorAll('.city_error_edit');
        citys.forEach(city => {
            city.innerHTML = '';
        });
        const districts = document.querySelectorAll('.district_error_edit');
        districts.forEach(district => {
            district.innerHTML = '';
        });
        const sub_categorys = document.querySelectorAll('.sub_category_error_edit');
        sub_categorys.forEach(sub_category => {
            sub_category.innerHTML = '';
        });
        const emails = document.querySelectorAll('.email_error_edit');
        emails.forEach(email => {
            email.innerHTML = '';
        });
        const phones = document.querySelectorAll('.phone_error_edit');
        phones.forEach(phone => {
            phone.innerHTML = '';
        });
        const costs = document.querySelectorAll('.cost_error_edit');
        costs.forEach(cost => {
            cost.innerHTML = '';
        });
        const profit_ratio_1s = document.querySelectorAll('.profit_ratio_1_error_edit');
        profit_ratio_1s.forEach(profit_ratio_1 => {
            profit_ratio_1.innerHTML = '';
        });
        const profit_ratio_2s = document.querySelectorAll('.profit_ratio_2_error_edit');
        profit_ratio_2s.forEach(profit_ratio_2 => {
            profit_ratio_2.innerHTML = '';
        });
        const geolocations = document.querySelectorAll('.geolocation_error_edit');
        geolocations.forEach(geolocation => {
            geolocation.innerHTML = '';
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
    function setEditCity(city_id, place_id, city, option_id) {
        var cities_options = document.querySelectorAll('[id^="edit_city_"]');
        cities_options.forEach(option => {
            option.style.setProperty("color", "#1f1c2e", "important");

        });
        document.getElementById('city-name-' + place_id).innerHTML = city;
        document.getElementById(option_id).style.setProperty("color", "#90aaf8", "important");
        document.getElementById('edit_city_id_' + place_id).value = `${city_id}`;
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
    function filterEditDistricts(city_id, place_id) {
        var districts = document.querySelectorAll(`.edit_district_filter_option`);
        var city_districts = document.querySelectorAll(`.edit_district_city_${city_id}`);

        districts.forEach(district => {
            district.setAttribute("hidden", true);

        });
        city_districts.forEach(district => {
            district.removeAttribute("hidden");

        });
        document.getElementById(`edit_district_id_${place_id}`).value = "";
        document.getElementById(`district-name-${place_id}`).innerHTML = '';
        // var districts_options = document.querySelectorAll('[id^="district_"]');
        districts.forEach(option => {
            option.style.setProperty("color", "#1f1c2e", "important");

        });
    }
    //--------------------------------------------
    function setSubCategory(sub_id, sub, option_id) {
        var subs_options = document.querySelectorAll('[id^="sub_category_"]');
        subs_options.forEach(option => {
            option.style.setProperty("color", "#1f1c2e", "important");

        });
        document.getElementById('sub-cat-name').innerHTML = sub;
        document.getElementById(option_id).style.setProperty("color", "#90aaf8", "important");
        document.getElementById('sub_category_id').value = `${sub_id}`;
    }
    //--------------------------------------------
    function setEditSubCategory(sub_category_id, place_id, sub_category, option_id) {
        var sub_categories_options = document.querySelectorAll('[id^="edit_sub_category_"]');
        sub_categories_options.forEach(option => {
            option.style.setProperty("color", "#1f1c2e", "important");

        });
        document.getElementById('sub-cat-name-' + place_id).innerHTML = sub_category;
        document.getElementById(option_id).style.setProperty("color", "#90aaf8", "important");
        document.getElementById('edit_sub_category_id_' + place_id).value = `${sub_category_id}`;
    }
    //--------------------------------------------
    function showGeolocation(lat, lng) {
        // iterate over the map's layers
        show_map.eachLayer(function(layer) {
            // check if the layer is a marker
            if (layer instanceof L.Marker) {
                // remove the marker from the map
                show_map.removeLayer(layer);
            }
        });
        var geolocation = [lat, lng];

        var marker_icon = L.icon({
            iconUrl: '{{ asset('img/marker.svg') }}',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
        });

        // add a marker to the map
        var marker_map = L.marker([0, 0], {
            icon: marker_icon
        });

        marker_map.addTo(show_map);
        marker_map.setLatLng(geolocation); // move the marker to the clicked location
    }
    //--------------------------------------------

    function setEditGeolocation(lat, lng, place_id) {
        console.log('hhhh')
        // iterate over the map's layers
        show_edit_map.eachLayer(function(layer) {
            // check if the layer is a marker
            if (layer instanceof L.Marker) {
                // remove the marker from the map
                show_edit_map.removeLayer(layer);
            }
        });
        var geolocation = [lat, lng];

        var marker_icon = L.icon({
            iconUrl: '{{ asset('img/marker.svg') }}',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
        });

        // add a marker to the map
        marker_edit_map = L.marker([0, 0], {
            icon: marker_icon
        });

        marker_edit_map.addTo(show_edit_map);
        marker_edit_map.setLatLng(geolocation); // move the marker to the clicked location
        place_for_geolocation = place_id;
    }
</script>
