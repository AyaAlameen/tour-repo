<?php $i = 1; ?>
@foreach ($employees as $employee)
    @if ($loop->last)
        <div class="products-row">

            <div class="product-cell">
                <span>{{ $i++ }}</span>
            </div>
            <div class="product-cell">
                <span
                    class="search-value">{{ $employee->translations()->where('locale', 'ar')->first()->full_name }}</span>
            </div>
            <div class="product-cell">
                <img src="{{ asset(str_replace(app_path(), '', $employee->image)) }}" alt="product">
            </div>
            <div class="product-cell">{{ $employee->user_name }}</div>

            <div class="product-cell ">{{ $employee->email }}</div>
            <div class="product-cell ">{{ $employee->phone }} </div>
            <div class="product-cell ">{{ $employee->employeeProfile->salary }}</div>
            <div class="product-cell ">{{ $employee->translations()->where('locale', 'ar')->first()->job }}</div>
            <div class="product-cell ">{{ $employee->translations()->where('locale', 'ar')->first()->address }}</div>
            <div class="product-cell">{{ $employee->employeeProfile->identifier }}</div>
            <div class="product-cell">
                <!-- start action -->
                <div class="p-3">
                    <!-- edit -->
                    <a href="#" class="edit" data-toggle="modal" data-target="#editEmployee{{ $employee->id }}"
                        title="Edit"><i class="fas fa-pen"></i></a>

                    <!-- Modal -->
                    <div class="modal fade" id="editEmployee{{ $employee->id }}" data-backdrop="static" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content" style="direction:ltr;">
                                <div class="modal-header">
                                    <button type="button" class="close" onclick="removeMessages()"
                                        data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="edit-form-{{ $employee->id }}" action="" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <table
                                            class="table-striped table-hover table-bordered m-auto text-primary myTable"
                                            style="width: 450px;">

                                            <tr>

                                                <td><input type="text" class="toggle text-primary in"
                                                        name="full_name_ar" required style="width: 100%;"
                                                        value="{{ $employee->translations()->where('locale', 'ar')->first()->full_name }}">
                                                    </th>
                                                <td>الاسم الكامل(العربية)</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><span style="color: red"
                                                        class="name_ar_error_edit"></span></td>
                                            </tr>
                                            <tr>

                                                <td><input type="text" class="toggle text-primary in"
                                                        name="full_name_en" required style="width: 100%;"
                                                        value="{{ $employee->translations()->where('locale', 'en')->first()->full_name }}">
                                                </td>
                                                <td>الاسم الكامل(الإنجليزية)</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><span style="color: red"
                                                        class="name_en_error_edit"></span></td>
                                            </tr>

                                            <tr>

                                                <td><input type="file" name="image" id="img">
                                                    <label for="img"><img
                                                            src="{{ asset(str_replace(app_path(), '', $employee->image)) }}"
                                                            style="padding-top: 5px; border-radius: 0px;" width="30px"
                                                            height="50px"></label>
                                                </td>
                                                <td>الصورة </td>
                                            </tr>

                                            <tr>

                                                <td><input type="text" class="toggle text-primary in"
                                                        name="user_name" value="{{ $employee->user_name }}"></td>
                                                <td>اسم المستخدم</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><span style="color: red"
                                                        class="user_name_error_edit"></span></td>
                                            </tr>
                                            <tr>

                                                <td><input type="email" class="toggle text-primary in" name="email"
                                                        value="{{ $employee->email }}"></td>
                                                <td>الإيميل</td>

                                            </tr>
                                            <tr>
                                                <td colspan="2"><span style="color: red"
                                                        class="email_error_edit"></span></td>
                                            </tr>
                                            <tr>

                                                <td><input type="number" class="toggle text-primary in" name="phone"
                                                        value="{{ $employee->phone }}"></td>
                                                <td>الهاتف</td>

                                            </tr>
                                            <tr>
                                                <td colspan="2"><span style="color: red"
                                                        class="phone_error_edit"></span></td>
                                            </tr>
                                            <tr>

                                                <td>
                                                    <textarea class="toggle text-primary in" type="text" name="address_ar" required style="width: 100%;">{{ $employee->translations()->where('locale', 'ar')->first()->address }}</textarea>
                                                    </th>
                                                <td>العنوان (العربية)</td>
                                            </tr>
                                            <tr>

                                                <td>
                                                    <textarea class="toggle text-primary in" type="text" name="address_en" required style="width: 100%;">{{ $employee->translations()->where('locale', 'en')->first()->address }}</textarea>
                                                    </th>
                                                <td>(الانكليزية)العنوان</td>
                                            </tr>
                                            <tr>

                                                <td><input type="number" class="toggle text-primary in" name="salary"
                                                        value="{{ $employee->employeeProfile->salary }}"></td>
                                                <td>الراتب</td>

                                            </tr>
                                            <tr>
                                                <td colspan="2"><span style="color: red"
                                                        class="salary_error_edit"></span></td>
                                            </tr>
                                            <tr>

                                                <td>
                                                    <textarea class="toggle text-primary in" type="text" name="job_ar" required style="width: 100%;">{{ $employee->translations()->where('locale', 'ar')->first()->job }}</textarea>
                                                    </th>
                                                <td>العمل(العربية)</td>
                                            </tr>
                                            <tr>

                                                <td>
                                                    <textarea class="toggle text-primary in" type="text" name="job_en" required style="width: 100%;">{{ $employee->translations()->where('locale', 'en')->first()->job }}</textarea>
                                                    </th>
                                                <td>(الانكليزية)العمل</td>
                                            </tr>
                                            <tr>

                                                <td><input type="number" class="toggle text-primary in"
                                                        name="identifier"
                                                        value="{{ $employee->employeeProfile->identifier }}"></td>
                                                <td>الرقم الوطني</td>

                                            </tr>
                                            <tr>
                                                <td colspan="2"><span style="color: red"
                                                        class="identifier_error_edit"></span></td>
                                            </tr>
                                        </table>

                                    </div>
                                </form>
                                <div class="modal-footer">
                                    <button type="button" class="action-button active close"
                                        onclick="removeMessages()" data-dismiss="modal">إغلاق</button>
                                    <button type="submit" id="edit-employee-btn-{{ $employee->id }}"
                                        onclick="editEmployee('edit-form-{{ $employee->id }}', {{ $employee->id }})"
                                        class="app-content-headerButton">حفظ التغييرات</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end edit -->

                    <!-- delete -->
                    <a href="#" class="delete mr-2" data-toggle="modal"
                        data-target="#deleteCategory{{ $employee->id }}" title="Delete" data-toggle="tooltip"><i
                            class="fas fa-trash"></i></a>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteCategory{{ $employee->id }}" tabindex="-1"
                        aria-labelledby="exampleModal2Label" aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content" style="direction:ltr;">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="delete-form-{{ $employee->id }}" action="" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="id" value="{{ $employee->id }}" hidden>
                                    <div class="modal-body">
                                        هل أنت متأكد من أنك تريد حذف هذا الموظف (<span
                                            style="color: #EB455F;">{{ $employee->translations()->where('locale', 'ar')->first()->full_name }}</span>)
                                        ؟
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="action-button active close"
                                            data-dismiss="modal">إغلاق</button>
                                        <button type="submit" id="delete-employee-btn-{{ $employee->id }}"
                                            onclick="deleteEmployee(`delete-form-{{ $employee->id }}`, {{ $employee->id }})"
                                            class="app-content-headerButton">نعم</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end delete -->

                    {{-- permessions --}}

                    <div class="modal fade" style="direction:ltr;" data-bs-backdrop="static"
                        id="exampleModalTogglee" aria-hidden="true" aria-labelledby="exampleModalToggleeLabel"
                        tabindex="-1">
                        <div class="modal-dialog" style="max-width:1000px; margin: 5% auto">
                            <div class="modal-content m-auto" style="width:450px;">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalToggleeLabel">سماحيات الموظف</h5>
                                    <button type="button" class="btn-close m-0 close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <table style="color: rgb(22, 22, 22); width: 400px !important; direction:rtl;"
                                        class="table-striped table-hover table-bordered m-auto text-primary myTable">
                                        <tr>
                                            <th>السماحية</th>
                                            <td style="width:40px;"></td>
                                        </tr>

                                        <tr>
                                            <td> <label for="p1">سماحية موظفي الأماكن</label> </td>
                                            <td class="text-center pl-2"><input id="p1" type="checkbox"></td>

                                        </tr>
                                        <tr>
                                            <td> <label for="p2">سماحية تعديل الرواتب</label> </td>
                                            <td class="text-center pl-2"><input id="p2" type="checkbox"></td>

                                        </tr>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="action-button active close"
                                        data-bs-dismiss="modal">إغلاق</button>
                                    <button type="submit" class="app-content-headerButton">حفظ</button>

                                </div>
                            </div>
                        </div>
                    </div>

                    <a class="delete " title="permessions" data-bs-toggle="modal" href="#exampleModalTogglee"><img
                            src="img/key.png" style="width: 21px; height: 21px;"></a>

                    {{-- end permessions --}}
                </div>

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
                    class="search-value">{{ $employee->translations()->where('locale', 'ar')->first()->full_name }}</span>
            </div>
            <div class="product-cell">
                <img src="{{ asset(str_replace(app_path(), '', $employee->image)) }}" alt="product">
            </div>
            <div class="product-cell">{{ $employee->user_name }}</div>
            <div class="product-cell">{{ $employee->email }}</div>
            <div class="product-cell ">{{ $employee->phone }} </div>
            <div class="product-cell ">{{ $employee->employeeProfile->salary }}</div>
            <div class="product-cell ">{{ $employee->translations()->where('locale', 'ar')->first()->job }}</div>
            <div class="product-cell ">{{ $employee->translations()->where('locale', 'ar')->first()->address }}</div>
            <div class="product-cell">{{ $employee->employeeProfile->identifier }}</div>
            <div class="product-cell">
                <!-- start action -->
                <div class="p-3">
                    <!-- edit -->
                    <a href="#" class="edit p-2" data-toggle="modal"
                        data-target="#editEmployee{{ $employee->id }}" title="Edit"><i class="fas fa-pen"></i></a>

                    <!-- Modal -->
                    <div class="modal fade" id="editEmployee{{ $employee->id }}" data-backdrop="static"
                        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content" style="direction:ltr;">
                                <div class="modal-header">
                                    <button type="button" class="close" onclick="removeMessages()"
                                        data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="edit-form-{{ $employee->id }}" action="" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <table
                                            class="table-striped table-hover table-bordered m-auto text-primary myTable"
                                            style="width: 450px;">

                                            <tr>

                                                <td><input type="text" class="toggle text-primary in"
                                                        name="full_name_ar" required style="width: 100%;"
                                                        value="{{ $employee->translations()->where('locale', 'ar')->first()->full_name }}">
                                                    </th>
                                                <td>الاسم الكامل(العربية)</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><span style="color: red"
                                                        class="name_ar_error_edit"></span></td>
                                            </tr>
                                            <tr>

                                                <td><input type="text" class="toggle text-primary in"
                                                        name="full_name_en" required style="width: 100%;"
                                                        value="{{ $employee->translations()->where('locale', 'en')->first()->full_name }}">
                                                </td>
                                                <td>الاسم الكامل(الإنجليزية)</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><span style="color: red"
                                                        class="name_en_error_edit"></span></td>
                                            </tr>

                                            <tr>

                                                <td><input type="file" name="image" id="img">
                                                    <label for="img"><img
                                                            src="{{ asset(str_replace(app_path(), '', $employee->image)) }}"
                                                            style="padding-top: 5px; border-radius: 0px;"
                                                            width="30px" height="50px"></label>
                                                </td>
                                                <td>الصورة </td>
                                            </tr>

                                            <tr>

                                                <td><input type="text" class="toggle text-primary in"
                                                        name="user_name" value="{{ $employee->user_name }}"></td>
                                                <td>اسم المستخدم</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><span style="color: red"
                                                        class="user_name_error_edit"></span></td>
                                            </tr>
                                            <tr>

                                                <td><input type="email" class="toggle text-primary in"
                                                        name="email" value="{{ $employee->email }}"></td>
                                                <td>الإيميل</td>

                                            </tr>
                                            <tr>
                                                <td colspan="2"><span style="color: red"
                                                        class="email_error_edit"></span></td>
                                            </tr>
                                            <tr>

                                                <td><input type="number" class="toggle text-primary in"
                                                        name="phone" value="{{ $employee->phone }}"></td>
                                                <td>الهاتف</td>

                                            </tr>
                                            <tr>
                                                <td colspan="2"><span style="color: red"
                                                        class="phone_error_edit"></span></td>
                                            </tr>
                                            <tr>

                                                <td>
                                                    <textarea class="toggle text-primary in" type="text" name="address_ar" required
                                                        style="width: 100%; height:26.5px;">{{ $employee->translations()->where('locale', 'ar')->first()->address }}</textarea>
                                                    </th>
                                                <td>العنوان (العربية)</td>
                                            </tr>
                                            <tr>

                                                <td>
                                                    <textarea class="toggle text-primary in" type="text" name="address_en" required
                                                        style="width: 100%; height:26.5px;">{{ $employee->translations()->where('locale', 'en')->first()->address }}</textarea>
                                                    </th>
                                                <td>(الانكليزية)العنوان</td>
                                            </tr>
                                            <tr>

                                                <td><input type="number" class="toggle text-primary in"
                                                        name="salary"
                                                        value="{{ $employee->employeeProfile->salary }}"></td>
                                                <td>الراتب</td>

                                            </tr>
                                            <tr>
                                                <td colspan="2"><span style="color: red"
                                                        class="salary_error_edit"></span></td>
                                            </tr>
                                            <tr>

                                                <td>
                                                    <textarea class="toggle text-primary in" type="text" name="job_ar" required style="width: 100%; height:26.5px;">{{ $employee->translations()->where('locale', 'ar')->first()->job }}</textarea>
                                                    </th>
                                                <td>العمل(العربية)</td>
                                            </tr>
                                            <tr>

                                                <td>
                                                    <textarea class="toggle text-primary in" type="text" name="job_en" required style="width: 100%; height:26.5px;">{{ $employee->translations()->where('locale', 'en')->first()->job }}</textarea>
                                                    </th>
                                                <td>(الانكليزية)العمل</td>
                                            </tr>
                                            <tr>

                                                <td><input type="number" class="toggle text-primary in"
                                                        name="identifier"
                                                        value="{{ $employee->employeeProfile->identifier }}"></td>
                                                <td>الرقم الوطني</td>

                                            </tr>
                                            <tr>
                                                <td colspan="2"><span style="color: red"
                                                        class="identifier_error_edit"></span></td>
                                            </tr>
                                        </table>

                                    </div>
                                </form>
                                <div class="modal-footer">
                                    <button type="button" class="action-button active close"
                                        onclick="removeMessages()" data-dismiss="modal">إغلاق</button>
                                    <button type="submit" id="edit-employee-btn-{{ $employee->id }}"
                                        onclick="editEmployee('edit-form-{{ $employee->id }}', {{ $employee->id }})"
                                        class="app-content-headerButton">حفظ التغييرات</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end edit -->


                    <!-- delete -->
                    <a href="#" class="delete" data-toggle="modal"
                        data-target="#deleteCategory{{ $employee->id }}" title="Delete" data-toggle="tooltip"><i
                            class="fas fa-trash"></i></a>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteCategory{{ $employee->id }}" tabindex="-1"
                        aria-labelledby="exampleModal2Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content" style="direction:ltr;">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="delete-form-{{ $employee->id }}" action="" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="id" value="{{ $employee->id }}" hidden>
                                    <div class="modal-body">
                                        هل أنت متأكد من أنك تريد حذف هذا الموظف (<span
                                            style="color: #EB455F;">{{ $employee->translations()->where('locale', 'ar')->first()->full_name }}</span>)
                                        ؟
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="action-button active close"
                                            data-dismiss="modal">إغلاق</button>
                                        <button type="submit" id="delete-employee-btn-{{ $employee->id }}"
                                            onclick="deleteEmployee(`delete-form-{{ $employee->id }}`, {{ $employee->id }})"
                                            class="app-content-headerButton">نعم</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- end delete -->

                    {{-- permessions --}}

                    <div class="modal fade" style="direction:ltr;" data-bs-backdrop="static"
                        id="exampleModalTogglee" aria-hidden="true" aria-labelledby="exampleModalToggleeLabel"
                        tabindex="-1">
                        <div class="modal-dialog" style="max-width:1000px; margin: 5% auto">
                            <div class="modal-content m-auto" style="width:450px;">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalToggleeLabel">سماحيات الموظف</h5>
                                    <button type="button" class="btn-close m-0 close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <table style="color: rgb(22, 22, 22); width: 400px !important; direction:rtl;"
                                        class="table-striped table-hover table-bordered m-auto text-primary myTable">
                                        <tr>
                                            <th>السماحية</th>
                                            <td style="width:40px;"></td>
                                        </tr>

                                        <tr>
                                            <td> <label for="p1">سماحية موظفي الأماكن</label> </td>
                                            <td class="text-center pl-2"><input id="p1" type="checkbox"></td>

                                        </tr>
                                        <tr>
                                            <td> <label for="p2">سماحية تعديل الرواتب</label> </td>
                                            <td class="text-center pl-2"><input id="p2" type="checkbox"></td>

                                        </tr>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="action-button active close"
                                        data-bs-dismiss="modal">إغلاق</button>
                                    <button type="submit" class="app-content-headerButton">حفظ</button>

                                </div>
                            </div>
                        </div>
                    </div>

                    <a class="delete " title="permessions" data-bs-toggle="modal" href="#exampleModalTogglee"><img
                            src="img/key.png" style="width: 21px; height: 21px;"></a>

                    {{-- end permessions --}}
                </div>
                <!-- end action -->
            </div>
    @endif
@endforeach
