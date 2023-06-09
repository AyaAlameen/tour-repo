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

        <div class="product-cell">{{ $employee->user_name }}</div>
        <div class="product-cell ">{{ $employee->email }}</div>
        <div class="product-cell">
            {{ $employee->permissions()->first()->pivot->place()->first()->translations()->where('locale', 'ar')->first()->name }}
        </div>
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
                                            <td>
                                                <div class="dropdown toggle text-primary in"
                                                    style="display:inline-block; ;">

                                                    <label class="dropdown-toggle" type="button"
                                                        id="dropdownMenuButtonEdit{{ $employee->id }}"
                                                        data-toggle="dropdown" aria-expanded="false">

                                                    </label>
                                                    <span
                                                        id="place-name-{{ $employee->id }}">{{ $employee->permissions()->first()->pivot->place()->first()->translations()->where('locale', 'ar')->first()->name }}</span>
                                                    <div class="dropdown-menu"
                                                        aria-labelledby="dropdownMenuButtonEdit{{ $employee->id }}">
                                                        @foreach ($places as $place)
                                                            <option
                                                                style="cursor: pointer; @if ($place->id == $employee->permissions()->first()->pivot->place_id) color: #90aaf8 !important; @endif"
                                                                class="dropdown-item" value="{{ $place->id }}"
                                                                id="edit_place_{{ $employee->id }}_{{ $place->id }}"
                                                                onclick="setEditPlace({{ $place->id }}, {{ $employee->id }}, '{{ $place->translations()->where('locale', 'ar')->first()->name }}', 'edit_place_{{ $employee->id }}_{{ $place->id }}')"
                                                                href="#">
                                                                {{ $place->translations()->where('locale', 'ar')->first()->name }}
                                                            </option>
                                                        @endforeach
                                                        <input type="text"
                                                            id="edit_place_id_{{ $employee->id }}"
                                                            name="place_id"
                                                            value="{{ $employee->permissions()->first()->pivot->place_id }}"
                                                            hidden>

                                                    </div>
                                                </div>
                                            </td>
                                            <td>مكان العمل</td>
                                        </tr>
                                        <tr>

                                            <td colspan="2"><span style="color: red"
                                                    class="place_error_edit"></span></td>

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
                    class="search-value">{{ $employee->translations()->where('locale', 'ar')->first()->full_name }}</span>
            </div>

            <div class="product-cell">{{ $employee->user_name }}</div>
            <div class="product-cell ">{{ $employee->email }}</div>
            <div class="product-cell">
                {{ $employee->permissions()->first()->pivot->place()->first()->translations()->where('locale', 'ar')->first()->name }}
            </div>
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
                                                <td>
                                                    <div class="dropdown toggle text-primary in"
                                                        style="display:inline-block; ;">

                                                        <label class="dropdown-toggle" type="button"
                                                            id="dropdownMenuButtonEdit{{ $employee->id }}"
                                                            data-toggle="dropdown" aria-expanded="false">

                                                        </label>
                                                        <span
                                                            id="place-name-{{ $employee->id }}">{{ $employee->permissions()->first()->pivot->place()->first()->translations()->where('locale', 'ar')->first()->name }}</span>
                                                        <div class="dropdown-menu"
                                                            aria-labelledby="dropdownMenuButtonEdit{{ $employee->id }}">
                                                            @foreach ($places as $place)
                                                                <option
                                                                    style="cursor: pointer; @if ($place->id == $employee->permissions()->first()->pivot->place_id) color: #90aaf8 !important; @endif"
                                                                    class="dropdown-item" value="{{ $place->id }}"
                                                                    id="edit_place_{{ $employee->id }}_{{ $place->id }}"
                                                                    onclick="setEditPlace({{ $place->id }}, {{ $employee->id }}, '{{ $place->translations()->where('locale', 'ar')->first()->name }}', 'edit_place_{{ $employee->id }}_{{ $place->id }}')"
                                                                    href="#">
                                                                    {{ $place->translations()->where('locale', 'ar')->first()->name }}
                                                                </option>
                                                            @endforeach
                                                            <input type="text"
                                                                id="edit_place_id_{{ $employee->id }}"
                                                                name="place_id"
                                                                value="{{ $employee->permissions()->first()->pivot->place_id }}"
                                                                hidden>

                                                        </div>
                                                    </div>
                                                </td>
                                                <td>مكان العمل</td>
                                            </tr>
                                            <tr>

                                                <td colspan="2"><span style="color: red"
                                                        class="place_error_edit"></span></td>

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
                </div>
                <!-- end delete -->



            </div>

            <!-- end action -->


        </div>
    @endif
@endforeach
