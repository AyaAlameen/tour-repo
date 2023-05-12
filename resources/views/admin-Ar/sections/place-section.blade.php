<?php $i = 1; ?>
@foreach ($places as $plase)
    @if ($loop->last)
    @else
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
                <span>{{$i++}}</span>
            </div>
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
                    <a href="#" class="delete" data-toggle="modal" data-target="#exampleModal2" title="Delete"
                        data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content" style="direction:ltr;">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                <a href="#" class="edit" data-toggle="modal" data-target="#exampleModal" title="Edit"><i
                        class="fas fa-pen"></i></a>

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
                                <table class="table-striped table-hover table-bordered m-auto text-primary myTable"
                                    style="direction:ltr !important;">
                                    <tr>

                                        <td><input type="text" class="toggle text-primary in" name="place_name"
                                                required style="width: 100%;"></th>
                                        <td>الاسم(العربية)</td>
                                    </tr>
                                    <tr>

                                        <td><input type="text" class="toggle text-primary in" name="place_name"
                                                required style="width: 100%;"></th>
                                        <td>(الانكليزية)الاسم </td>
                                    </tr>
                                    <tr>

                                        <td><input type="file" hidden id="img">
                                            <label for="img"><img src="img/about-1.jpg"
                                                    style="padding-top: 5px; border-radius: 0px;" width="30px"
                                                    height="50px"></label>
                                        </td>
                                        <td>الصورة </td>
                                    </tr>
                                    <tr>

                                        <td>
                                            <div class="dropdown toggle text-primary in"
                                                style="display:inline-block; ;">
                                                <label class="dropdown-toggle" type="button" id="dropdownMenuButton"
                                                    data-toggle="dropdown" aria-expanded="false">
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

                                        <td>
                                            <div class="dropdown toggle text-primary in"
                                                style="display:inline-block; ;">
                                                <label class="dropdown-toggle" type="button" id="dropdownMenuButton"
                                                    data-toggle="dropdown" aria-expanded="false">
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

                                        <td>
                                            <div class="dropdown toggle text-primary in"
                                                style="display:inline-block; ;">
                                                <label class="dropdown-toggle" type="button" id="dropdownMenuButton"
                                                    data-toggle="dropdown" aria-expanded="false">
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

                                        <td><input type="text" class="toggle text-primary in" value="-----">
                                        </td>
                                        <td>الموقع</td>
                                    </tr>
                                    <tr>

                                        <td><input class="toggle text-primary in" type="text"
                                                name="place-description" required style="width: 100%;"></th>
                                        <td>وصف(العربية)</td>
                                    </tr>
                                    <tr>

                                        <td><input class="toggle text-primary in" type="text"
                                                name="place-description" required style="width: 100%;"></th>
                                        <td>(الانكليزية)وصف</td>
                                    </tr>
                                    <tr>


                                        <td><input type="email" class="toggle text-primary in" value="@gmail.com">
                                        </td>
                                        <td>الايميل</td>

                                    </tr>
                                    <tr>

                                        <td><input type="number" class="toggle text-primary in" value="09123456789">
                                        </td>
                                        <td>الهاتف</td>
                                    </tr>
                                    <tr>

                                        <td><input type="number" class="toggle text-primary in" value="100000">
                                        </td>
                                        <td>الكلفة</td>
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
    @endif
@endforeach
