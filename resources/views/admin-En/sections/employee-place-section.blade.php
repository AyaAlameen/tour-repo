<?php $i = 1; ?>
@foreach ($employees as $employee)
    @if ($loop->last)
    <div class="products-row">

        <div class="product-cell">
            <span>{{ $i++ }}</span>
        </div>
        <div class="product-cell">
            <span
                class="search-value">{{ $employee->translations()->where('locale', 'en')->first()->full_name }}</span>
        </div>

        <div class="product-cell">{{ $employee->user_name }}</div>
        <div class="product-cell ">{{ $employee->email }}</div>
        <div class="product-cell">
            <img src="{{ asset(str_replace(app_path(), '', $employee->image)) }}" alt="product">
        </div>
        <div class="product-cell">
            {{ $employee->permissions()->first()->pivot->place()->first()->translations()->where('locale', 'en')->first()->name }}
        </div>
        <div class="product-cell">
            <!-- start action -->
            <div class="p-3">
                <!-- edit -->
                <a href="#" class="edit p-2" data-toggle="modal" data-target="#editEmployee{{ $employee->id }}"
                    title="Edit"><i class="fas fa-pen"></i></a>

                <!-- Modal -->
                <div class="modal fade" id="editEmployee{{ $employee->id }}" data-backdrop="static" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" >
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
                                        style="width: 450px; direction: rtl;">

                                        <tr>

                                            <td><input type="text" class="toggle text-primary in"
                                                    name="full_name_ar" required style="width: 100%;"
                                                    value="{{ $employee->translations()->where('locale', 'ar')->first()->full_name }}">
                                                </th>
                                            <td>Full Name (Arabic)</td>
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
                                            <td style="width: 30%;">Full Name (English)</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><span style="color: red"
                                                    class="name_en_error_edit"></span></td>
                                        </tr>


                                        <tr>

                                            <td><input type="text" class="toggle text-primary in"
                                                    name="user_name" value="{{ $employee->user_name }}"></td>
                                            <td>UserName</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><span style="color: red"
                                                    class="user_name_error_edit"></span></td>
                                        </tr>
                                        <tr>

                                            <td><input type="email" class="toggle text-primary in" name="email"
                                                    value="{{ $employee->email }}"></td>
                                            <td>Email</td>

                                        </tr>
                                        <tr>
                                            <td colspan="2"><span style="color: red"
                                                    class="email_error_edit"></span></td>
                                        </tr>
                                        <tr>
                                         
                                            <td><input type="file" name="image"
                                                id="img{{ $employee->id }}" hidden
                                                onchange="previewImage(this, 'edit_previewImage_{{ $employee->id }}')">
                                            <label for="img{{ $employee->id }}"><img
                                                    id="edit_previewImage_{{ $employee->id }}"
                                                    src="{{ asset(str_replace(app_path(), '', $employee->image)) }}"
                                                    style="padding-top: 5px; border-radius: 0px; width:170px; height:90px;"></label>
                                        </td>
                                            <td>Image </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><span style="color: red"
                                                    class="image_error_edit"></span></td>
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
                                                        id="place-name-{{ $employee->id }}">{{ $employee->permissions()->first()->pivot->place()->first()->translations()->where('locale', 'en')->first()->name }}</span>
                                                    <div class="dropdown-menu"
                                                        aria-labelledby="dropdownMenuButtonEdit{{ $employee->id }}">
                                                        @foreach ($places as $place)
                                                            <option
                                                                style="cursor: pointer; @if ($place->id == $employee->permissions()->first()->pivot->place_id) color: #90aaf8 !important; @endif"
                                                                class="dropdown-item" value="{{ $place->id }}"
                                                                id="edit_place_{{ $employee->id }}_{{ $place->id }}"
                                                                onclick="setEditPlace({{ $place->id }}, {{ $employee->id }}, '{{ $place->translations()->where('locale', 'en')->first()->name }}', 'edit_place_{{ $employee->id }}_{{ $place->id }}')"
                                                                href="#">
                                                                {{ $place->translations()->where('locale', 'en')->first()->name }}
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
                                            <td>Workplace</td>
                                        </tr>
                                        <tr>

                                            <td colspan="2"><span style="color: red"
                                                    class="place_error_edit"></span></td>

                                        </tr>

                                    </table>

                                </div>
                            </form>
                            <div class="modal-footer">
                                <button type="button" class="action-button active close" onclick="removeMessages()"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" id="edit-employee-btn-{{ $employee->id }}"
                                    onclick="editEmployee('edit-form-{{ $employee->id }}', {{ $employee->id }})"
                                    class="app-content-headerButton">Save changes</button>
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
                                    Are you sure that you want to delete this employee? (<span
                                        style="color: #90aaf8;">{{ $employee->translations()->where('locale', 'ar')->first()->full_name }}</span>)
                                    
                                    </div>
                                <div class="modal-footer">
                                    <button type="button" class="action-button active close"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" id="delete-employee-btn-{{ $employee->id }}"
                                        onclick="deleteEmployee(`delete-form-{{ $employee->id }}`, {{ $employee->id }})"
                                        class="app-content-headerButton">yes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- end delete -->



            </div>

            <!-- end action -->
        </div>

        </div>
        @else
        <div class="products-row">

            <div class="product-cell">
                <span>{{ $i++ }}</span>
            </div>
            <div class="product-cell">
                <span
                    class="search-value">{{ $employee->translations()->where('locale', 'en')->first()->full_name }}</span>
            </div>

            <div class="product-cell">{{ $employee->user_name }}</div>
            <div class="product-cell ">{{ $employee->email }}</div>
            <div class="product-cell">
                <img src="{{ asset(str_replace(app_path(), '', $employee->image)) }}" alt="product">
            </div>
            <div class="product-cell">
                {{ $employee->permissions()->first()->pivot->place()->first()->translations()->where('locale', 'en')->first()->name }}
            </div>
            <div class="product-cell">
                <!-- start action -->
                <div class="p-3">
                    <!-- edit -->
                    <a href="#" class="edit p-2" data-toggle="modal" data-target="#editEmployee{{ $employee->id }}"
                        title="Edit"><i class="fas fa-pen"></i></a>

                    <!-- Modal -->
                    <div class="modal fade" id="editEmployee{{ $employee->id }}" data-backdrop="static" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content" >
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
                                            style="width: 450px; direction: rtl;">

                                            <tr>

                                                <td><input type="text" class="toggle text-primary in"
                                                        name="full_name_ar" required style="width: 100%;"
                                                        value="{{ $employee->translations()->where('locale', 'ar')->first()->full_name }}">
                                                    </th>
                                                <td>Full Name (Arabic)</td>
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
                                                <td>Full Name (English)</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><span style="color: red"
                                                        class="name_en_error_edit"></span></td>
                                            </tr>


                                            <tr>

                                                <td><input type="text" class="toggle text-primary in"
                                                        name="user_name" value="{{ $employee->user_name }}"></td>
                                                <td>UserName</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><span style="color: red"
                                                        class="user_name_error_edit"></span></td>
                                            </tr>
                                            <tr>

                                                <td><input type="email" class="toggle text-primary in" name="email"
                                                        value="{{ $employee->email }}"></td>
                                                <td>Email</td>

                                            </tr>
                                            <tr>
                                                <td colspan="2"><span style="color: red"
                                                        class="email_error_edit"></span></td>
                                            </tr>
                                            <tr>
                                               
                                                <td><input type="file" name="image"
                                                    id="img{{ $employee->id }}" hidden
                                                    onchange="previewImage(this, 'edit_previewImage_{{ $employee->id }}')">
                                                <label for="img{{ $employee->id }}"><img
                                                        id="edit_previewImage_{{ $employee->id }}"
                                                        src="{{ asset(str_replace(app_path(), '', $employee->image)) }}"
                                                        style="padding-top: 5px; border-radius: 0px; width:170px; height:90px;"></label>
                                            </td>
                                                <td>Image </td>
                                            </tr>
                                            <tr>
                                            <td colspan="2"><span style="color: red"
                                                    class="image_error_edit"></span></td>
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
                                                            id="place-name-{{ $employee->id }}">{{ $employee->permissions()->first()->pivot->place()->first()->translations()->where('locale', 'en')->first()->name }}</span>
                                                        <div class="dropdown-menu"
                                                            aria-labelledby="dropdownMenuButtonEdit{{ $employee->id }}">
                                                            @foreach ($places as $place)
                                                                <option
                                                                    style="cursor: pointer; @if ($place->id == $employee->permissions()->first()->pivot->place_id) color: #90aaf8 !important; @endif"
                                                                    class="dropdown-item" value="{{ $place->id }}"
                                                                    id="edit_place_{{ $employee->id }}_{{ $place->id }}"
                                                                    onclick="setEditPlace({{ $place->id }}, {{ $employee->id }}, '{{ $place->translations()->where('locale', 'en')->first()->name }}', 'edit_place_{{ $employee->id }}_{{ $place->id }}')"
                                                                    href="#">
                                                                    {{ $place->translations()->where('locale', 'en')->first()->name }}
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
                                                <td>Workplace</td>
                                            </tr>
                                            <tr>

                                                <td colspan="2"><span style="color: red"
                                                        class="place_error_edit"></span></td>

                                            </tr>

                                        </table>

                                    </div>
                                </form>
                                <div class="modal-footer">
                                    <button type="button" class="action-button active close" onclick="removeMessages()"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" id="edit-employee-btn-{{ $employee->id }}"
                                        onclick="editEmployee('edit-form-{{ $employee->id }}', {{ $employee->id }})"
                                        class="app-content-headerButton">Save changes</button>
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
                                        Are you sure that you want to delete this employee? (<span
                                            style="color: #90aaf8;">{{ $employee->translations()->where('locale', 'ar')->first()->full_name }}</span>)
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="action-button active close"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" id="delete-employee-btn-{{ $employee->id }}"
                                            onclick="deleteEmployee(`delete-form-{{ $employee->id }}`, {{ $employee->id }})"
                                            class="app-content-headerButton">yes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- end delete -->



                </div>

                <!-- end action -->

            </div>
            </div>
    @endif
@endforeach
