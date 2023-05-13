@extends('adminLayout-Ar.master')
@section('admincontent')
    <div class="app-content">
        <div class="app-content-header">
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
                            <button type="button" class="btn-close m-0 close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table id="addTable" style=" width: 400px;"
                                class="table-striped table-hover table-bordered m-auto text-primary myTable">

                                <tr>
                                    <td></td>
                                    <td><input type="text" class="toggle text-primary in" name="place_name" required
                                            style="width: 100%;"></th>
                                    <td>الاسم(العربية)</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="text" class="toggle text-primary in" name="place_name" required
                                            style="width: 100%;"></th>
                                    <td>(الانكليزية)الاسم </td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>
                                        <div class="dropdown toggle text-primary in" style="display:inline-block;">
                                            <label class="dropdown-toggle" type="button" id="dropdownMenuButton"
                                                data-toggle="dropdown" aria-expanded="false">

                                            </label>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">--</a>
                                                <a class="dropdown-item" href="#">---</a>
                                                <a class="dropdown-item" href="#">---</a>
                                                <a class="dropdown-item" href="#">---</a>


                                            </div>
                                        </div>
                                    </td>
                                    <td>المدينة</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>
                                        <div class="dropdown toggle text-primary in" style="display:inline-block;">
                                            <label class="dropdown-toggle" type="button" id="dropdownMenuButton"
                                                data-toggle="dropdown" aria-expanded="false">

                                            </label>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">--</a>
                                                <a class="dropdown-item" href="#">---</a>
                                                <a class="dropdown-item" href="#">---</a>
                                                <a class="dropdown-item" href="#">---</a>


                                            </div>
                                        </div>
                                    </td>
                                    <td>الناحية</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>
                                        <div class="dropdown toggle text-primary in" style="display:inline-block;">
                                            <label class="dropdown-toggle" type="button" id="dropdownMenuButton"
                                                data-toggle="dropdown" aria-expanded="false">

                                            </label>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">--</a>
                                                <a class="dropdown-item" href="#">---</a>
                                                <a class="dropdown-item" href="#">---</a>
                                                <a class="dropdown-item" href="#">---</a>

                                            </div>
                                        </div>
                                    </td>
                                    <td>الصنف الابن</td>
                                </tr>



                                <tr>
                                    <td></td>
                                    <td><input class="toggle text-primary in" type="text" name="place-description"
                                            required style="width: 100%;"></th>
                                    <td>وصف(العربية)</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input class="toggle text-primary in" type="text" name="place-description"
                                            required style="width: 100%;"></th>
                                    <td>(الانكليزية)وصف</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td><input class="toggle text-primary in" type="email" name="place-email" required
                                            style="width: 100%;"></th>
                                    <td>الايميل</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input class="toggle text-primary in" type="number" name="place-phone" required
                                            style="width: 100%;"></th>
                                    <td>الهاتف</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td><input class="toggle text-primary in" type="text" name="place_cost" required
                                            style="width: 100%;"></th>
                                    <td>الكلفة</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <!-- map -->
                                    <td class="text-center"><img class="m-3" data-bs-toggle="modal" id="mapimg"
                                            data-bs-target="#exampleModal6" style="cursor:pointer;" src="img/sy.jpg"
                                            width="200px" height="100px"></td>

                                    <td>الموقع</td>
                                </tr>
                                <div class="modal fade bg-light" id="exampleModal6" data-bs-backdrop="static"
                                    tabindex="-1" aria-labelledby="exampleModal6Label" aria-hidden="true">
                                    <div class="modal-dialog h-100" style="margin:0%; max-width:100%; ">
                                        <div class="modal-content toggle w-100 h-100">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModal6Label">الخريطة</h5>
                                                <button type="button" class="btn-close m-0 close" onclick="hidemap()"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div id="map" style="width: 100%; height: 300px;"
                                                    class="w-100 h-100"></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="action-button active"
                                                    onclick="hidemap()">إغلاق</button>
                                                <button type="button" class="app-content-headerButton">حفظ</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <!-- end map -->

                                    <tr>
                                        <td style="width:25px; text-align:center;"> <i
                                                class="fas fa-camera text-body pl-2"
                                                style="font-size:15px; cursor:pointer;"></i></td>
                                        <td>
                                            <i class="fas fa-plus text-body pt-2 pl-2" onclick="addPic(9)"
                                                style="font-size:15px; float:left; cursor:pointer;"
                                                title="Add Another Picture"></i>
                                            <input type="file" class="toggle text-primary in" name="place_image"
                                                required style="width:75% !important; font-size:16px;">
                                        </td>
                                        <td>الصورة </td>
                                    </tr>

                                </div>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="action-button active" data-bs-dismiss="modal">إغلاق</button>
                            <button type="button" class="app-content-headerButton">حفظ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end add -->

        <div class="app-content-actions">
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
        <div class="scroll-class">
            <div class="products-area-wrapper tableView">
                <div class="products-header">
                    <div class="product-cell">الاسم</div>
                    <div class="product-cell image ">الصورة</div>
                    <div class="product-cell">المدينة</div>
                    <div class="product-cell">الناحية</div>
                    <div class="product-cell">الصنف الفرعي</div>
                    <div class="product-cell">الموقع</div>
                    <div class="product-cell">وصف</div>
                    <div class="product-cell">الايميل</div>
                    <div class="product-cell">الهاتف</div>
                    <div class="product-cell">الكلفة</div>
                    <div class="product-cell">الأحداث</div>


                </div>
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
                        <span>الجامع الأموي</span>
                    </div>
                    <div class="product-cell">
                        <img src="img/omayyad.jpg" alt="product">
                    </div>
                    <div class="product-cell">
                        <span>دمشق</span>
                    </div>
                    <div class="product-cell">
                        <span> دمشق القديمة</span>
                    </div>
                    <div class="product-cell">
                        <span>مساجد</span>
                    </div>
                    <div class="product-cell">
                        <span>وسط دمشق</span>
                    </div>
                    <div class="product-cell">
                        <span>----</span>
                    </div>
                    <div class="product-cell">
                        <span>-----</span>
                    </div>
                    <div class="product-cell">
                        <span>264837283</span>
                    </div>

                    <div class="product-cell">
                        <span>----</span>
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
                                            هل أنت متأكد من أنك تريد حذف هذا المكان؟
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
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table id="editTable"
                                            class="table-striped table-hover table-bordered m-auto text-primary myTable"
                                            style="direction:ltr !important;">
                                            <tr>
                                                <td></td>
                                                <td><input type="text" class="toggle text-primary in"
                                                        name="place_name" required style="width: 100%;"></th>
                                                <td>الاسم(العربية)</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><input type="text" class="toggle text-primary in"
                                                        name="place_name" required style="width: 100%;"></th>
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
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#">--</a>
                                                            <a class="dropdown-item" href="#">--</a>
                                                            <a class="dropdown-item" href="#">---</a>
                                                            <a class="dropdown-item" href="#">----</a>

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
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#">--</a>
                                                            <a class="dropdown-item" href="#">--</a>
                                                            <a class="dropdown-item" href="#">---</a>
                                                            <a class="dropdown-item" href="#">----</a>

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
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#">--</a>
                                                            <a class="dropdown-item" href="#">--</a>
                                                            <a class="dropdown-item" href="#">---</a>
                                                            <a class="dropdown-item" href="#">----</a>

                                                        </div>
                                                    </div>
                                                </td>
                                                <td>الصنف الفرعي </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><input type="text" class="toggle text-primary in" value="-----">
                                                </td>
                                                <td>الموقع</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><input class="toggle text-primary in" type="text"
                                                        name="place-description" required style="width: 100%;"></th>
                                                <td>وصف(العربية)</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><input class="toggle text-primary in" type="text"
                                                        name="place-description" required style="width: 100%;"></th>
                                                <td>(الانكليزية)وصف</td>
                                            </tr>
                                            <tr>

                                                <td></td>
                                                <td><input type="email" class="toggle text-primary in"
                                                        value="@gmail.com"></td>
                                                <td>الايميل</td>

                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><input type="number" class="toggle text-primary in"
                                                        value="09123456789"></td>
                                                <td>الهاتف</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><input type="number" class="toggle text-primary in" value="100000">
                                                </td>
                                                <td>الكلفة</td>
                                            </tr>
                                            <tr>
                                                <td style="width:25px; text-align:center;"> </td>
                                                <td>
                                                    <i class="fas fa-plus text-body pt-4 pl-2" onclick="editPic(9)"
                                                        style="font-size:15px; float:left; cursor:pointer;"
                                                        title="Add Another Picture"></i>
                                                    <input type="file" hidden id="img">
                                                    <label for="img"><img src="img/about-1.jpg"
                                                            style="padding-top: 5px; border-radius: 0px;" width="30px"
                                                            height="50px">
                                                    </label>
                                                </td>
                                                <td>الصورة </td>
                                            </tr>

                                        </table>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="action-button active"
                                            data-dismiss="modal">إغلاق</button>
                                        <button type="submit" class="app-content-headerButton">حفظ التغييرات</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end edit -->

                    </div>
                    <!-- end action -->


                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
    {{-- <div id="map" style="width: 100%; height: 300px;"></div> --}}
@endsection

<script></script>
