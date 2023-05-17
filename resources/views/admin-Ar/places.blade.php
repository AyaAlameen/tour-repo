@extends('adminLayout-Ar.master')
@section('admincontent')
    <div class="app-content">
        <div class="app-content-header" style="width:51.5%;">
            <h1 class="app-content-headerText">الأماكن</h1>

            <!-- add -->
            <button type="button" class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                إضافة مكان
            </button>

            <!-- Modal -->
            <div class="modal fade " style="overflow-y:scroll;" data-bs-backdrop="static" id="exampleModal3" tabindex="-1"
                aria-labelledby="exampleModal3Label" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content toggle">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModal3Label">مكان جديد</h5>
                            <button type="button" class="btn-close m-0 close"
                                onclick="removeMessages(), document.getElementById('add-form').reset()"
                                data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="add-form" action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <table style=" width: 400px;" id="addTable"
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
                                                <span id="city-name"></span>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    @foreach ($cities as $city)
                                                        <option style="cursor: pointer;" class="dropdown-item"
                                                            value="{{ $city->id }}" id="city_{{ $city->id }}"
                                                            onclick="setCity({{ $city->id }}, '{{ $city->translations()->where('locale', 'ar')->first()->name }}', 'city_{{ $city->id }}'), filterDistricts({{ $city->id }})"
                                                            href="#">
                                                            {{ $city->translations()->where('locale', 'ar')->first()->name }}
                                                        </option>
                                                    @endforeach
                                                    <input type="text" id="city_id" name="city_id" hidden>

                                                </div>
                                            </div>
                                        </td>
                                        <td>المحافظة</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2" class="text-end text-danger p-1"><span id="city_error"></span>
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
                                                            onclick="setDistrict({{ $district->id }}, '{{ $district->translations()->where('locale', 'ar')->first()->name }}', 'district_{{ $district->id }}')"
                                                            hidden href="#">
                                                            {{ $district->translations()->where('locale', 'ar')->first()->name }}
                                                        </option>
                                                    @endforeach
                                                    <input type="text" id="district_id" name="district_id" hidden>

                                                </div>
                                            </div>
                                        </td>
                                        <td>الناحية</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2" class="text-end text-danger p-1"><span
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
                                                            onclick="setSubCategory({{ $sub_category->id }}, '{{ $sub_category->translations()->where('locale', 'ar')->first()->name }}', 'sub_category_{{ $sub_category->id }}')"
                                                            href="#">
                                                            {{ $sub_category->translations()->where('locale', 'ar')->first()->name }}
                                                        </option>
                                                    @endforeach
                                                    <input type="text" id="sub_category_id" name="sub_category_id"
                                                        hidden>

                                                </div>
                                            </div>
                                        </td>
                                        <td>الصنف الفرعي</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2" class="text-end text-danger p-1"><span
                                                id="sub_category_error"></span>
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
                                        <td>(الإنجليزية)وصف</td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td><input class="toggle text-primary in" type="email" name="email" required
                                                style="width: 100%;"></th>
                                        <td>الايميل</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2" class="text-end text-danger p-1"><span
                                                id="email_error"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input class="toggle text-primary in" type="number" name="phone" required
                                                style="width: 100%;"></th>
                                        <td>الهاتف</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2" class="text-end text-danger p-1"><span
                                                id="phone_error"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input class="toggle text-primary in" type="number" name="cost"
                                                style="width: 100%;"></th>
                                        <td>التكلفة</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2" class="text-end text-danger p-1"><span id="cost_error"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input class="toggle text-primary in" type="number" name="profit_ratio_1"
                                                required style="width: 100%;"></th>
                                        <td style="width: 150px;">نسبة الأرباح الخارجية </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2" class="text-end text-danger p-1"><span
                                                id="profit_ratio_1_error"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input class="toggle text-primary in" type="number" name="profit_ratio_2"
                                                required style="width: 100%;"></th>
                                        <td>نسبة الأرباح الداخلية </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2" class="text-end text-danger p-1"><span
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

                                        <td>الموقع</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2" class="text-end text-danger p-1"><span
                                                id="geolocation_error"></span>
                                        </td>
                                    </tr>
                                    <div class="modal fade bg-light" id="exampleModal6" data-bs-backdrop="static"
                                        tabindex="-1" aria-labelledby="exampleModal6Label" aria-hidden="true">
                                        <div class="modal-dialog h-100" style="margin:0%; max-width:100%; ">
                                            <div class="modal-content toggle w-100 h-100">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModal6Label">إضافة المكان على
                                                        الخريطة</h5>
                                                    <button type="button" class="btn-close m-0 close"
                                                        onclick="hidemap()" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="add-map" class="w-100 h-100"></div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="action-button active"
                                                        onclick="hidemap()">إغلاق</button>
                                                    <button type="button" id="save-map-btn"  onclick="spinner()" class="app-content-headerButton">حفظ</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <!-- end add map -->
                                        <td style="width:25px; text-align:center;"> <i
                                                class="fas fa-camera text-body pt-2 pl-2"
                                                style="font-size:15px; cursor:pointer;"></i></td>

                                        <td>
                                            <i class="fas fa-plus text-body pt-2 pl-2" id="add-pic-input" data-picid="1"
                                                onclick="addPic()" style="font-size:15px; float:left; cursor:pointer;"
                                                title="Add Another Picture"></i>
                                            <input type="file" class="toggle text-primary in" name="image_0" required
                                                style="width:75% !important; font-size:16px;">
                                        </td>
                                        <td>الصور </td>
                                        </tr>
                                    </div>
                                </table>
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="action-button active close"
                                onclick="removeMessages(), document.getElementById('add-form').reset()"
                                data-bs-dismiss="modal">إغلاق</button>
                            <button type="button" id="add-place-btn" onclick="addPlace('add-form')"
                                class="app-content-headerButton">حفظ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end add -->

        <div class="app-content-actions" style="width:52%;">
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
                        <label>المدينة</label>
                        <select>
                            <option>كل المدن</option>
                            <option>حلب</option>
                            <option>حماة</option>
                            <option>حمص</option>
                            <option>دمشق</option>
                            <option>طرطوس</option>
                        </select>
                        <label>الصنف الفرعي</label>
                        <select>
                            <option>كل الأصناف الفرعية</option>
                            <option>مساجد</option>
                            <option>كنائس</option>
                            <option>مطاعم</option>
                            <option>فنادق</option>
                            <option>ملاهي</option>
                        </select>
                        <label>النواحي</label>
                        <select>
                            <option>All Districts</option>
                            <option>الفرقان</option>
                            <option>موكاكبو</option>
                            <option>حي السبيل</option>
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
                        <a href="{{ route('place_ar') }}" class="dropdown-item"> العربية</a>
                        <a href="{{ route('place_en') }}" class="dropdown-item">الانجليزية </a>

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
        <div class="scroll-class" style="width:52%;">
            <div class="products-area-wrapper tableView">
                <div class="products-header">
                    <div class="product-cell">#</div>
                    <div class="product-cell">الاسم</div>
                    <div class="product-cell">المدينة</div>
                    <div class="product-cell">الناحية</div>
                    <div class="product-cell">الصنف الفرعي</div>
                    <div class="product-cell">وصف</div>
                    <div class="product-cell">الموقع</div>
                    <div class="product-cell">الايميل</div>
                    <div class="product-cell">الهاتف</div>
                    <div class="product-cell">الكلفة</div>
                    <div class="product-cell">نسبة الأرباح الداخلية</div>
                    <div class="product-cell">نسبة الأرباح الخارجية</div>
                    <div class="product-cell">الأحداث</div>


                </div>
                <div id="places-data">
                    <?php $i = 1; ?>
                    @foreach ($places as $place)
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
                                <span>{{ $place->translations()->where('locale', 'ar')->first()->name }}</span>
                            </div>
                            <div class="product-cell">
                                <span>دمشق</span>
                            </div>
                            <div class="product-cell">
                                <span> {{ $place->district->translations()->where('locale', 'ar')->first()->name }}</span>
                            </div>
                            <div class="product-cell">
                                <span>{{ $place->subCategory->translations()->where('locale', 'ar')->first()->name }}</span>
                            </div>
                            <div class="product-cell">
                                <span>{{ $place->translations()->where('locale', 'ar')->first()->description }}</span>
                            </div>
                            {{-- عرض الموقع --}}
                            <div class="product-cell">
                                <span><img data-toggle="modal" data-target="#exampleModal8" title="Delete"
                                        data-toggle="tooltip" src="img/syria.png"
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
                                            data-target="#exampleModal" title="Edit"><i class="fas fa-pen"></i></a>

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
                                                        id="editTable"
                                                            class="table-striped table-hover table-bordered m-auto text-primary myTable"
                                                            style="direction:ltr !important;">
                                                            <tr>
                                                                <td ></td>
                                                                <td><input type="text" class="toggle text-primary in"
                                                                        name="place_name" required style="width: 100%;">
                                                                    </th>
                                                                <td>الاسم(العربية)</td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td><input type="text" class="toggle text-primary in"
                                                                        name="place_name" required style="width: 100%;">
                                                                    </th>
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
                                                                            حلب
                                                                        </label>
                                                                        <div class="dropdown-menu"
                                                                            aria-labelledby="dropdownMenuButton">
                                                                            <a class="dropdown-item" href="#">--</a>
                                                                            <a class="dropdown-item" href="#">--</a>
                                                                            <a class="dropdown-item"
                                                                                href="#">---</a>
                                                                            <a class="dropdown-item"
                                                                                href="#">----</a>

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>المدينة </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                    <div class="dropdown toggle text-primary in"
                                                                        style="display:inline-block; ;">
                                                                        <label class="dropdown-toggle" type="button"
                                                                            id="dropdownMenuButton" data-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            ---
                                                                        </label>
                                                                        <div class="dropdown-menu"
                                                                            aria-labelledby="dropdownMenuButton">
                                                                            <a class="dropdown-item" href="#">--</a>
                                                                            <a class="dropdown-item" href="#">--</a>
                                                                            <a class="dropdown-item"
                                                                                href="#">---</a>
                                                                            <a class="dropdown-item"
                                                                                href="#">----</a>

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>الناحية </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                    <div class="dropdown toggle text-primary in"
                                                                        style="display:inline-block; ;">
                                                                        <label class="dropdown-toggle" type="button"
                                                                            id="dropdownMenuButton" data-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            ---
                                                                        </label>
                                                                        <div class="dropdown-menu"
                                                                            aria-labelledby="dropdownMenuButton">
                                                                            <a class="dropdown-item" href="#">--</a>
                                                                            <a class="dropdown-item" href="#">--</a>
                                                                            <a class="dropdown-item"
                                                                                href="#">---</a>
                                                                            <a class="dropdown-item"
                                                                                href="#">----</a>

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>الصنف الفرعي </td>
                                                            </tr>
                                        
                                                            <tr>
                                                                <td></td>
                                                                <td><input class="toggle text-primary in" type="text"
                                                                        name="place-description" required
                                                                        style="width: 100%;"></th>
                                                                <td>وصف(العربية)</td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td><input class="toggle text-primary in" type="text"
                                                                        name="place-description" required
                                                                        style="width: 100%;"></th>
                                                                <td>(الانكليزية)وصف</td>
                                                            </tr>
                                                            <tr>

                                                                <td></td>
                                                                <td><input type="email" class="toggle text-primary in"
                                                                        value="@gmail.com">
                                                                </td>
                                                                <td>الايميل</td>

                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td><input type="number" class="toggle text-primary in"
                                                                        value="09123456789">
                                                                </td>
                                                                <td>الهاتف</td>
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
                                                                <td class="text-center"><img class="m-3" data-bs-toggle="modal"
                                                                    id="editmapimg" data-bs-target="#exampleModal9"
                                                                    style="cursor:pointer; border-radius:6px;" src="img/sy.jpg"
                                                                    width="150px" height="70px"></td>                                                                
                                                                <td>الموقع</td>

                                                   
                                                            </tr>
                                                            <tr>
                    
                                                                <td style="width:25px; text-align:center;" >
                                                               </td>   
                                                                 <td>
                                                                     <i class="fas fa-plus text-body pt-4 pl-2" onclick="editPic()" style="font-size:15px; float:left; cursor:pointer;" title="Add Another Picture"></i>
                                                                     <input type="file" hidden id="edit_pic_input" data-picid="1">
                                                                          <label for="edit_pic_input"><img src="img/about-1.jpg"
                                                                            style="padding-top: 5px; border-radius: 0px;" width="30px" height="50px">
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

                                        <!-- delete -->
                                        <a href="#" class="delete" data-toggle="modal"
                                            data-target="#exampleModal2" title="Delete" data-toggle="tooltip"><i
                                                class="fas fa-trash"></i></a>
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
                                                        هل أنت متأكد من أنك تريد حذف هذا المكان؟
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="action-button active"
                                                            data-dismiss="modal">إغلاق</button>
                                                        <button type="submit"
                                                            class="app-content-headerButton">نعم</button>
                                                    </div>
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

{{-- مودل عرض الخريطة بالجدول --}}

 <!-- Modal -->
 <div class="modal fade" id="exampleModal8" tabindex="-1" 
 aria-labelledby="exampleModal8Label" aria-hidden="true">
 <div class="modal-dialog">
     <div class="modal-content" style="direction:ltr;">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal"
                 aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <div class="modal-body" style="direction:ltr;">
             {{-- الخريطة --}}
             <div class="modal-footer">
                 <button type="button" class="action-button active"
                     data-dismiss="modal">إغلاق</button>
             </div>
         </div>
     </div>
 </div>
 </div>
{{-- نهاية مودل عرض الخريطة بالجدول --}}


             {{-- مودل تعديل الخريطة --}}
             <div class="modal fade bg-light" id="exampleModal9" data-bs-backdrop="static"
             tabindex="-1" aria-labelledby="exampleModal9Label" aria-hidden="true">
             <div class="modal-dialog h-100" style="margin:0%; max-width:100%; ">
                 <div class="modal-content toggle w-100 h-100">
                     <div class="modal-header">
                         <h5 class="modal-title" id="exampleModal9Label">تعديل الموقع على
                             الخريطة</h5>
                         <button type="button" class="btn-close m-0 close"
                             onclick="hidemap()" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">
                         {{-- الخريطة --}}
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="action-button active"
                             onclick="hidemap()">إغلاق</button>
                         <button type="button" id="save-map-btn-edit"  onclick="spinner()" class="app-content-headerButton">حفظ</button>
                     </div>
                 </div>
             </div>
         </div>
             {{-- نهاية مودل تعديل الخريطة --}}


@endsection

<script>
    function addPlace(formId) {
        $("#add-place-btn").attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById('add-form'));
        $.ajax({
                url: "{{ route('addPlaceAr') }}",
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

    function editCategory(formId, id) {

        $("#edit-category-btn-" + id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById(formId));
        formData.append('id', id);
        $.ajax({
                url: `{{ route('editCategoryAr') }}`,
                type: "POST",
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {

                $("#categories-data").empty();
                $("#categories-data").append(data);
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
                    console.log(document.querySelector(`#${formId} .name_en_error_edit`));

                    document.querySelector(`#${formId} .name_en_error_edit`).innerHTML = data.responseJSON.errors
                        .name_en[0];

                }

            })
            .always(function() {
                // Re-enable the submit button and hide the loading spinner
                $("#edit-category-btn-" + id).attr("disabled", false).html('حفظ');
            });
    }

    //---------------------------------------------------------------
    function deleteCategory(formId, id) {
        $("#delete-category-btn-" + id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');

        var formData = new FormData(document.getElementById(formId));
        $.ajax({
                url: `{{ route('deleteCategoryAr') }}`,
                type: "POST",
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
                $("#categories-data").empty();
                $("#categories-data").append(data);
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
                $("#delete-category-btn-" + id).attr("disabled", false).html('نعم');
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
    function setEditSubCategory(district_id, place_id, district, option_id) {
        var districts_options = document.querySelectorAll('[id^="edit_district_"]');
        districts_options.forEach(option => {
            option.style.setProperty("color", "#1f1c2e", "important");

        });
        document.getElementById('district-name-' + place_id).innerHTML = district;
        document.getElementById(option_id).style.setProperty("color", "#90aaf8", "important");
        document.getElementById('edit_district_id_' + place_id).value = `${district_id}`;
    }
    //--------------------------------------------
</script>
