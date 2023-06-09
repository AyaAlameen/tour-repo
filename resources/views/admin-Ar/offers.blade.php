@extends('adminLayout-Ar.master')
@section('admincontent')
    <div class="app-content">
        <div class="app-content-header" style="width:75%;">
            <h1 class="app-content-headerText">العروض</h1>

            <!-- add -->
            <button type="button" class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                إضافة عرض
            </button>

            <!-- Modal -->
            <div class="modal fade " data-bs-backdrop="static" id="exampleModal3" tabindex="-1"
                aria-labelledby="exampleModal3Label" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content toggle">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModal3Label">عرض جديد</h5>
                            <button type="button" class="btn-close m-0 close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table id="addTable" style="color: rgb(22, 22, 22); width: 400px;"
                                class="table-striped table-hover table-bordered m-auto text-primary myTable">

                                <tr>
                                    <td></td>

                                    <td><input type="text" class="toggle text-primary in" name="event_name" required
                                            style="width: 100%;"></th>
                                    <td>الاسم(العربية)</td>
                                </tr>
                                <tr>

                                    <td></td>
                                    <td><input type="text" class="toggle text-primary in" name="event_name" required
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
                                    <td>المكان</td>
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
                                    <td>الخدمة</td>
                                </tr>

                                <tr>
                                    <td></td>

                                    <td><input class="toggle text-primary in" type="text" name="description" required
                                            style="width: 100%;"></th>
                                    <td>وصف(العربية)</td>
                                </tr>
                                <tr>
                                    <td></td>

                                    <td><input class="toggle text-primary in" type="text" name="description" required
                                            style="width: 100%;"></th>
                                    <td>(الانكليزية)وصف</td>
                                </tr>
                                <tr>

                                    <td></td>
                                    <td><input class="toggle text-primary in" type="number" name="event_cost" required
                                            style="width: 100%;"></th>
                                    <td>الكلفة</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input class="toggle text-primary in" type="date" name="event_start_date"
                                            required style="width: 100%;"></th>
                                    <td>تاريخ البداية</td>
                                </tr>
                                <tr>
                                    <td></td>

                                    <td><input class="toggle text-primary in" type="date" name="event_end_date" required
                                            style="width: 100%;"></th>
                                    <td>تاريخ النهاية</td>
                                </tr>
                                <tr>
                                    <td style="width:25px; text-align:center;"> <i class="fas fa-camera text-body pt-2 pl-2"
                                            style="font-size:15px; cursor:pointer;"></i></td>

                                    <td class="pl-2">
                                        <i class="fas fa-plus text-body pt-2 pr-5"
                                            style="text-align: center; line-height: 1.5; font-size:15px;  cursor:pointer;"onclick="addPic()"
                                            id="add-pic-input" data-picid="1" title="Add Another Picture"></i>
                                        <input type="file" id="add_input_0"
                                            onchange="previewImage(this, 'add_previewImage_0')" class="toggle text-primary in"
                                            name="event_image" required style="width:75% !important; font-size:16px;">
                                        <label for="add_input_0"> <img id="add_previewImage_0" width="170px"
                                                height="90px" style="display: none; padding:6px;"></label>
                                    </td>
                                    <td>الصور </td>
                                </tr>
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


        <div class="app-content-actions" style="width:75%;">
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
                            <option>All Places</option>
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
                        <a href="{{ route('offer_ar') }}" class="dropdown-item"> العربية</a>
                        <a href="{{ route('offer_en') }}" class="dropdown-item">الانجليزية </a>

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
        <div class="scroll-class" style="width:75%;">
            <div class="products-area-wrapper tableView">
                <div class="products-header">
                    <div class="product-cell">الاسم</div>
                    <div class="product-cell image ">الصورة</div>
                    <div class="product-cell">المكان</div>
                    <div class="product-cell">الخدمة</div>
                    <div class="product-cell">وصف</div>
                    <div class="product-cell">الكلفة</div>
                    <div class="product-cell">تاريخ البداية</div>
                    <div class="product-cell">تاريخ النهاية</div>
                    <div class="product-cell ">الأحداث</div>




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
                        <span>عرض مرستقة خانم</span>
                    </div>
                    <div class="product-cell">
                        <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80"
                            alt="product">
                    </div>

                    <div class="product-cell">
                        <span>مطعم أبو مالك</span>
                    </div>

                    <div class="product-cell">
                        <span> ----- </span>
                    </div>
                    <div class="product-cell">
                        <span>-----</span>
                    </div>
                    <div class="product-cell">
                        <span>40000</span>
                    </div>
                    <div class="product-cell">
                        <span>15-2-1-2023</span>
                    </div>
                    <div class="product-cell">
                        <span>15-3-2023</span>
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
                                            هل أنت متأكد من أنك تريد حذف هذا العرض؟
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
                                            style="width: 400px;">
                                            <tr>
                                                <td></td>
                                                <td><input type="text" class="toggle text-primary in"
                                                        name="event_name" required style="width: 100%;"></th>
                                                <td>الاسم(العربية)</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><input type="text" class="toggle text-primary in"
                                                        name="event_name" required style="width: 100%;"></th>
                                                <td>(الانكليزية)الاسم </td>
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td>
                                                    <div class="dropdown toggle text-primary in"
                                                        style="display:inline-block; ;">
                                                        <lable class="dropdown-toggle" type="button"
                                                            id="dropdownMenuButton" data-toggle="dropdown"
                                                            aria-expanded="false">
                                                            liki
                                                        </lable>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
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
                                                <td>
                                                    <div class="dropdown toggle text-primary in"
                                                        style="display:inline-block; ;">
                                                        <lable class="dropdown-toggle" type="button"
                                                            id="dropdownMenuButton" data-toggle="dropdown"
                                                            aria-expanded="false">
                                                            ---
                                                        </lable>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#">--</a>
                                                            <a class="dropdown-item" href="#">--</a>
                                                            <a class="dropdown-item" href="#">---</a>
                                                            <a class="dropdown-item" href="#">----</a>

                                                        </div>
                                                    </div>
                                                </td>
                                                <td>الخدمة </td>
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
                                                <td><input type="number" class="toggle text-primary in" value="100000">
                                                </td>
                                                <td>الكلفة</td>

                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><input type="date" class="toggle text-primary in"
                                                        value="2023-10-11"></td>
                                                <td>تاريخ البداية</td>

                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><input type="date" class="toggle text-primary in"
                                                        value="2023-10-10"></td>
                                                <td>تاريخ النهاية</td>
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
@endsection
