<?php $i = 1; ?>

@foreach ($employees as $employee)
    @if ($loop->last)
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
            <span>{{ $i++ }}</span>
        </div>
        <div class="product-cell">
            <span
                class="search-value">{{ $employee->translations()->where('locale', 'en')->first()->full_name }}</span>
        </div>
        <div class="product-cell">
            <img src="{{ asset(str_replace(app_path(), '', $employee->image)) }}" alt="product">
        </div>
        <div class="product-cell"><span>{{ $employee->user_name }}</span></div>

        <div class="product-cell"><span>{{ $employee->email }}</span></div>
        <div class="product-cell status-cell"><span>{{ $employee->phone }}</span> </div>
        <div class="product-cell stock"><span>{{ $employee->employeeProfile->salary }}</span></div>
        <div class="product-cell price">
            <span>{{ $employee->translations()->where('locale', 'en')->first()->job }}</span>
        </div>
        <div class="product-cell sales">
            <span>{{ $employee->translations()->where('locale', 'en')->first()->address }}</span>
        </div>

        <div class="product-cell"><span>{{ $employee->employeeProfile->identifier }}</span></div>
        <div class="product-cell">
            <!-- start action -->
            <div class="p-3">


                <!-- edit -->
                <a href="#" class="edit p-2" data-toggle="modal"
                    data-target="#editEmployee{{ $employee->id }}" title="Edit"><i
                        class="fas fa-pen"></i></a>

                <!-- Modal -->
                <div class="modal fade" data-backdrop="static" id="editEmployee{{ $employee->id }}"
                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
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
                                        style="width: 400px;">

                                        <tr>
                                            <td>Full name(Arabic) </td>
                                            <td><input type="text" class="toggle text-primary in"
                                                    name="full_name_ar" required style="width: 100%;"
                                                    value="{{ $employee->translations()->where('locale', 'ar')->first()->full_name }}">
                                                </th>
                                        </tr>
                                        <td colspan="2"><span style="color: red"
                                                class="name_ar_error_edit"></span></td>
                                        <tr>
                                            <td>FullName(English)</td>
                                            <td><input type="text" class="toggle text-primary in"
                                                    name="full_name_en" required style="width: 100%;"
                                                    value="{{ $employee->translations()->where('locale', 'en')->first()->full_name }}">
                                                </th>
                                        </tr>
                                        <td colspan="2"><span style="color: red"
                                                class="name_en_error_edit"></span></td>

                                        <tr>
                                            <td>Image </td>
                                            <td ><input type="file" name="image" id="img{{$employee->id}}" hidden onchange="previewImage(this, 'edit_previewImage_{{$employee->id}}')">
                                                <label for="img{{$employee->id}}" ><img id="edit_previewImage_{{$employee->id}}" src="{{ asset(str_replace(app_path(),'',$employee -> image))}}" style="padding-top: 5px; border-radius: 0px; width:170px; height:90px;"></label></td>      
                                          
                                        </tr>

                                        <tr>
                                            <td>username</td>
                                            <td><input type="text" class="toggle text-primary in"
                                                    name="user_name" value="{{ $employee->user_name }}"></td>
                                        </tr>
                                        <td colspan="2"><span style="color: red"
                                                class="user_name_error_edit"></span></td>
                                        <tr>
                                            <td>email</td>
                                            <td><input type="email" name="email"
                                                    class="toggle text-primary in"
                                                    value="{{ $employee->email }}"></td>

                                        </tr>
                                        <td colspan="2"><span style="color: red"
                                                class="email_error_edit"></span></td>
                                        <tr>
                                            <td>Phone</td>
                                            <td><input type="number" name="phone"
                                                    class="toggle text-primary in"
                                                    value="{{ $employee->phone }}"></td>

                                        </tr>
                                        <td colspan="2"><span style="color: red"
                                                class="phone_error_edit"></span></td>
                                        <tr>
                                            <td>Address(Arabic)</td>
                                            <td><input class="toggle text-primary in" type="text"
                                                    name="address_ar" required style="width: 100%;"
                                                    value="{{ $employee->translations()->where('locale', 'ar')->first()->address }}">
                                                </th>
                                        </tr>
                                        <tr>
                                            <td>Address(English)</td>
                                            <td><input class="toggle text-primary in" type="text"
                                                    name="address_en" required style="width: 100%;"
                                                    value="{{ $employee->translations()->where('locale', 'en')->first()->address }}">
                                                </th>
                                        </tr>
                                        <tr>
                                            <td>Salary</td>
                                            <td><input type="number" name="salary"
                                                    class="toggle text-primary in"
                                                    value="{{ $employee->employeeProfile->salary }}">
                                            </td>

                                        </tr>
                                        <td colspan="2"><span style="color: red"
                                                class="salary_error_edit"></span></td>
                                        <tr>
                                            <td>Job(Arabic)</td>
                                            <td><input class="toggle text-primary in" type="text"
                                                    name="job_ar" required style="width: 100%;"
                                                    value="{{ $employee->translations()->where('locale', 'ar')->first()->job }}">
                                                </th>
                                        </tr>
                                        <tr>
                                            <td>job(English)</td>
                                            <td><input class="toggle text-primary in" type="text"
                                                    name="job_en" required style="width: 100%;"
                                                    value="{{ $employee->translations()->where('locale', 'en')->first()->job }}">
                                                </th>
                                        </tr>
                                        <tr>
                                            <td>Identifier</td>
                                            <td><input type="number" name="identifier"
                                                    class="toggle text-primary in"
                                                    value="{{ $employee->employeeProfile->identifier }}">
                                            </td>

                                        </tr>
                                        <td colspan="2"><span style="color: red"
                                                class="identifier_error_edit"></span></td>
                                    </table>

                                </div>
                            </form>
                            <div class="modal-footer">
                                <button type="button" class="action-button active close"
                                    onclick="removeMessages()" data-dismiss="modal">Close</button>
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
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="delete-form-{{ $employee->id }}" action="" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="id" value="{{ $employee->id }}" hidden>
                                <div class="modal-body">
                                    Are you sure that you want to delete This Employee (<span
                                        style="color: #90aaf8;">{{ $employee->translations()->where('locale', 'en')->first()->full_name }}</span>)
                                    ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="action-button active close"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" id="delete-employee-btn-{{ $employee->id }}"
                                        onclick="deleteEmployee(`delete-form-{{ $employee->id }}`, {{ $employee->id }})"
                                        class="app-content-headerButton">Yes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- end delete -->

                {{-- permessions --}}

                <div class="modal fade" style="direction:ltr;" data-backdrop="static"
                    id="permissionsEmployee{{ $employee->id }}" aria-hidden="true" aria-labelledby="exampleModalToggleeLabel"
                    tabindex="-1">
                    <div class="modal-dialog" style="max-width:1000px; margin: 5% auto">
                        <div class="modal-content m-auto" style="width:450px;">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalToggleeLabel">Employee permessions
                                </h5>
                                <button type="button" class="btn-close m-0 close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="permissions-form-{{ $employee->id }}" action="" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="id" value="{{ $employee->id }}" hidden>
                            <div class="modal-body">

                                <table style="color: rgb(22, 22, 22); width: 400px !important; "
                                    class="table-striped table-hover table-bordered m-auto text-primary myTable">
                                    <tr>
                                        <th>permession</th>
                                        <td style="width:40px;"></td>
                                    </tr>

                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td> <label for="p_{{ $permission->id }}">{{ $permission->translations()->where('locale', 'en')->first()->name }}</label> </td>
                                            <td class="text-center pl-2"><input @if ($employee->permissions->pluck('id')->contains($permission->id)) checked @endif
                                                id="p_{{ $permission->id }}" name="permission_id[]"
                                                value="{{ $permission->id }}" type="checkbox">
                                            </td>

                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            </form>
                            <div class="modal-footer">
                                <button type="button" class="action-button active close"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" id="permissions-employee-btn-{{ $employee->id }}"
                                    onclick="permissions(`permissions-form-{{ $employee->id }}`, {{ $employee->id }})" class="app-content-headerButton">Save</button>

                            </div>
                        </div>
                    </div>
                </div>

                {{-- <a class="delete ml-1" title="permessions" data-bs-toggle="modal"
                    href="#exampleModalTogglee"><img src="img/key.png"
                        style="width: 21px; height: 21px;"></a> --}}

                        <a href="#" class="delete" data-toggle="modal"
                data-target="#permissionsEmployee{{ $employee->id }}" title="Delete" data-toggle="tooltip"><img src="img/key.png"
                style="width: 21px; height: 21px;"></a>

                {{-- end permessions --}}


            </div>

            <!-- end action -->
        </div>

        </div>
        @else
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
                    <span>{{ $i++ }}</span>
                </div>
                <div class="product-cell">
                    <span
                        class="search-value">{{ $employee->translations()->where('locale', 'en')->first()->full_name }}</span>
                </div>
                <div class="product-cell">
                    <img src="{{ asset(str_replace(app_path(), '', $employee->image)) }}" alt="product">
                </div>
                <div class="product-cell"><span>{{ $employee->user_name }}</span></div>

                <div class="product-cell"><span>{{ $employee->email }}</span></div>
                <div class="product-cell status-cell"><span>{{ $employee->phone }}</span> </div>
                <div class="product-cell stock"><span>{{ $employee->employeeProfile->salary }}</span></div>
                <div class="product-cell price">
                    <span>{{ $employee->translations()->where('locale', 'en')->first()->job }}</span>
                </div>
                <div class="product-cell sales">
                    <span>{{ $employee->translations()->where('locale', 'en')->first()->address }}</span>
                </div>

                <div class="product-cell"><span>{{ $employee->employeeProfile->identifier }}</span></div>
                <div class="product-cell">
                    <!-- start action -->
                    <div class="p-3">


                        <!-- edit -->
                        <a href="#" class="edit p-2" data-toggle="modal"
                            data-target="#editEmployee{{ $employee->id }}" title="Edit"><i
                                class="fas fa-pen"></i></a>

                        <!-- Modal -->
                        <div class="modal fade" data-backdrop="static" id="editEmployee{{ $employee->id }}"
                            tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
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
                                                style="width: 400px;">

                                                <tr>
                                                    <td>Full name(Arabic) </td>
                                                    <td><input type="text" class="toggle text-primary in"
                                                            name="full_name_ar" required style="width: 100%;"
                                                            value="{{ $employee->translations()->where('locale', 'ar')->first()->full_name }}">
                                                        </th>
                                                </tr>
                                                <td colspan="2"><span style="color: red"
                                                        class="name_ar_error_edit"></span></td>
                                                <tr>
                                                    <td>FullName(English)</td>
                                                    <td><input type="text" class="toggle text-primary in"
                                                            name="full_name_en" required style="width: 100%;"
                                                            value="{{ $employee->translations()->where('locale', 'en')->first()->full_name }}">
                                                        </th>
                                                </tr>
                                                <td colspan="2"><span style="color: red"
                                                        class="name_en_error_edit"></span></td>

                                                <tr>
                                                    <td>Image </td>
                                                    <td ><input type="file" name="image" id="img{{$employee->id}}" hidden onchange="previewImage(this, 'edit_previewImage_{{$employee->id}}')">
                                                        <label for="img{{$employee->id}}" ><img id="edit_previewImage_{{$employee->id}}" src="{{ asset(str_replace(app_path(),'',$employee -> image))}}" style="padding-top: 5px; border-radius: 0px; width:170px; height:90px;"></label></td>      
                                                  
                                                </tr>

                                                <tr>
                                                    <td>username</td>
                                                    <td><input type="text" class="toggle text-primary in"
                                                            name="user_name" value="{{ $employee->user_name }}"></td>
                                                </tr>
                                                <td colspan="2"><span style="color: red"
                                                        class="user_name_error_edit"></span></td>
                                                <tr>
                                                    <td>email</td>
                                                    <td><input type="email" name="email"
                                                            class="toggle text-primary in"
                                                            value="{{ $employee->email }}"></td>

                                                </tr>
                                                <td colspan="2"><span style="color: red"
                                                        class="email_error_edit"></span></td>
                                                <tr>
                                                    <td>Phone</td>
                                                    <td><input type="number" name="phone"
                                                            class="toggle text-primary in"
                                                            value="{{ $employee->phone }}"></td>

                                                </tr>
                                                <td colspan="2"><span style="color: red"
                                                        class="phone_error_edit"></span></td>
                                                <tr>
                                                    <td>Address(Arabic)</td>
                                                    <td><input class="toggle text-primary in" type="text"
                                                            name="address_ar" required style="width: 100%;"
                                                            value="{{ $employee->translations()->where('locale', 'ar')->first()->address }}">
                                                        </th>
                                                </tr>
                                                <tr>
                                                    <td>Address(English)</td>
                                                    <td><input class="toggle text-primary in" type="text"
                                                            name="address_en" required style="width: 100%;"
                                                            value="{{ $employee->translations()->where('locale', 'en')->first()->address }}">
                                                        </th>
                                                </tr>
                                                <tr>
                                                    <td>Salary</td>
                                                    <td><input type="number" name="salary"
                                                            class="toggle text-primary in"
                                                            value="{{ $employee->employeeProfile->salary }}">
                                                    </td>

                                                </tr>
                                                <td colspan="2"><span style="color: red"
                                                        class="salary_error_edit"></span></td>
                                                <tr>
                                                    <td>Job(Arabic)</td>
                                                    <td><input class="toggle text-primary in" type="text"
                                                            name="job_ar" required style="width: 100%;"
                                                            value="{{ $employee->translations()->where('locale', 'ar')->first()->job }}">
                                                        </th>
                                                </tr>
                                                <tr>
                                                    <td>job(English)</td>
                                                    <td><input class="toggle text-primary in" type="text"
                                                            name="job_en" required style="width: 100%;"
                                                            value="{{ $employee->translations()->where('locale', 'en')->first()->job }}">
                                                        </th>
                                                </tr>
                                                <tr>
                                                    <td>Identifier</td>
                                                    <td><input type="number" name="identifier"
                                                            class="toggle text-primary in"
                                                            value="{{ $employee->employeeProfile->identifier }}">
                                                    </td>

                                                </tr>
                                                <td colspan="2"><span style="color: red"
                                                        class="identifier_error_edit"></span></td>
                                            </table>

                                        </div>
                                    </form>
                                    <div class="modal-footer">
                                        <button type="button" class="action-button active close"
                                            onclick="removeMessages()" data-dismiss="modal">Close</button>
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
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="delete-form-{{ $employee->id }}" action="" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" name="id" value="{{ $employee->id }}" hidden>
                                        <div class="modal-body">
                                            Are you sure that you want to delete This Employee (<span
                                                style="color: #90aaf8;">{{ $employee->translations()->where('locale', 'en')->first()->full_name }}</span>)
                                            ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="action-button active close"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" id="delete-employee-btn-{{ $employee->id }}"
                                                onclick="deleteEmployee(`delete-form-{{ $employee->id }}`, {{ $employee->id }})"
                                                class="app-content-headerButton">Yes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- end delete -->

                        {{-- permessions --}}

                        <div class="modal fade" style="direction:ltr;" data-backdrop="static"
                            id="permissionsEmployee{{ $employee->id }}" aria-hidden="true" aria-labelledby="exampleModalToggleeLabel"
                            tabindex="-1">
                            <div class="modal-dialog" style="max-width:1000px; margin: 5% auto">
                                <div class="modal-content m-auto" style="width:450px;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalToggleeLabel">Employee permessions
                                        </h5>
                                        <button type="button" class="btn-close m-0 close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="permissions-form-{{ $employee->id }}" action="" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" name="id" value="{{ $employee->id }}" hidden>
                                    <div class="modal-body">

                                        <table style="color: rgb(22, 22, 22); width: 400px !important; "
                                            class="table-striped table-hover table-bordered m-auto text-primary myTable">
                                            <tr>
                                                <th>permession</th>
                                                <td style="width:40px;"></td>
                                            </tr>

                                            @foreach ($permissions as $permission)
                                                <tr>
                                                    <td> <label for="p_{{ $permission->id }}">{{ $permission->translations()->where('locale', 'en')->first()->name }}</label> </td>
                                                    <td class="text-center pl-2"><input @if ($employee->permissions->pluck('id')->contains($permission->id)) checked @endif
                                                        id="p_{{ $permission->id }}" name="permission_id[]"
                                                        value="{{ $permission->id }}" type="checkbox">
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                    </form>
                                    <div class="modal-footer">
                                        <button type="button" class="action-button active close"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" id="permissions-employee-btn-{{ $employee->id }}"
                                            onclick="permissions(`permissions-form-{{ $employee->id }}`, {{ $employee->id }})" class="app-content-headerButton">Save</button>

                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <a class="delete ml-1" title="permessions" data-bs-toggle="modal"
                            href="#exampleModalTogglee"><img src="img/key.png"
                                style="width: 21px; height: 21px;"></a> --}}

                                <a href="#" class="delete" data-toggle="modal"
                        data-target="#permissionsEmployee{{ $employee->id }}" title="Delete" data-toggle="tooltip"><img src="img/key.png"
                        style="width: 21px; height: 21px;"></a>

                        {{-- end permessions --}}


                    </div>

                    <!-- end action -->

                </div>
                </div>
    @endif
@endforeach
