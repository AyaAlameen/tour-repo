<?php $i = 1; ?>
@foreach ($companies as $company)
    @if ($loop->last)
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
                <span>{{ $i++ }}</span>
            </div>
            <div class="product-cell">
                <span class="search-value">{{ $company->translations()->where('locale', 'en')->first()->name }}</span>
            </div>
            <div class="product-cell">
                <img style="height: 75px !important;" src="{{ asset(str_replace(app_path(), '', $company->image)) }}"
                    alt="product">
            </div>
            <div class="product-cell">
                {{ $company->email }}
            </div>
            <div class="product-cell">
                {{ $company->phone }}
            </div>
            <div class="product-cell">
                <button class="app-content-headerButton"><a href=""
                        style="color:var(--title ); text-decoration:none;">Details</a> </button>
            </div>


            <div class="product-cell">
                <!-- start action -->
                <div class="p-3">
                    <!-- edit -->
                    <a href="#" class="edit" data-toggle="modal" data-target="#editCompany{{ $company->id }}"
                        title="Edit"><i class="fas fa-pen"></i></a>
                    <!-- Modal -->
                    <div class="modal fade" data-bs-backdrop="static" id="editCompany{{ $company->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="edit-form-{{ $company->id }}" action="" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <table
                                            class="table-striped table-hover table-bordered m-auto text-primary myTable"
                                            style="width: 400px;">
                                            <tr>
                                                <td>Name(Arabic) </td>
                                                <td><input type="text" class="toggle text-primary in" name="name_ar"
                                                        required style="width: 100%;"
                                                        value="{{ $company->translations()->where('locale', 'ar')->first()->name }}">
                                                    </th>
                                            </tr>
                                            <tr>
                                                <td>Name(English) </td>
                                                <td><input type="text" class="toggle text-primary in" name="name_en"
                                                        required style="width: 100%;"
                                                        value="{{ $company->translations()->where('locale', 'en')->first()->name }}">
                                                    </th>
                                            </tr>
                                            <tr>
                                                <td>email</td>
                                                <td><input type="email" class="toggle text-primary in" name="email"
                                                        style="width: 100%;" value="{{ $company->email }}"></td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td><input type="number" class="toggle text-primary in" name="phone"
                                                        style="width: 100%;" value="{{ $company->phone }}"></td>
                                            </tr>
                                            <tr>
                                                <td>Image </td>
                                                <td><input type="file" name="image" id="img">
                                                    <label for="img"><img
                                                            src="{{ asset(str_replace(app_path(), '', $company->image)) }}"
                                                            name="image" style="padding-top: 5px; border-radius: 0px;"
                                                            width="30px" height="50px"></label>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </form>
                                <div class="modal-footer">
                                    <button type="button" class="action-button active close"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" id="edit-company-btn-{{ $company->id }}"
                                        onclick="editCompany('edit-form-{{ $company->id }}', {{ $company->id }})"
                                        class="app-content-headerButton">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end edit -->
                    <!-- delete -->
                    <a href="#" class="delete" data-toggle="modal"
                        data-target="#deleteCompany{{ $company->id }}" title="Delete" data-toggle="tooltip"><i
                            class="fas fa-trash"></i></a>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteCompany{{ $company->id }}" tabindex="-1"
                        aria-labelledby="exampleModal2Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="delete-form-{{ $company->id }}" action="" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="id" value="{{ $company->id }}" hidden>
                                    <div class="modal-body">
                                        Are you shure that you want to delete This Company (<span
                                            style="color: #90aaf8;">{{ $company->translations()->where('locale', 'en')->first()->name }}</span>)?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="action-button active close"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" id="delete-company-btn-{{ $company->id }}"
                                            onclick="deleteCompany(`delete-form-{{ $company->id }}`, {{ $company->id }})"
                                            class="app-content-headerButton">Yes</button>
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
                <span class="search-value">{{ $company->translations()->where('locale', 'en')->first()->name }}</span>
            </div>
            <div class="product-cell">
                <img style="height: 75px !important;" src="{{ asset(str_replace(app_path(), '', $company->image)) }}"
                    alt="product">
            </div>
            <div class="product-cell">
                {{ $company->email }}
            </div>
            <div class="product-cell">
                {{ $company->phone }}
            </div>
            <div class="product-cell">
                <button class="app-content-headerButton"><a href=""
                        style="color:var(--title ); text-decoration:none;">Details</a> </button>
            </div>


            <div class="product-cell">
                <!-- start action -->
                <div class="p-3">
                    <!-- edit -->
                    <a href="#" class="edit" data-toggle="modal"
                        data-target="#editCompany{{ $company->id }}" title="Edit"><i class="fas fa-pen"></i></a>
                    <!-- Modal -->
                    <div class="modal fade" data-bs-backdrop="static" id="editCompany{{ $company->id }}"
                        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="edit-form-{{ $company->id }}" action="" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <table
                                            class="table-striped table-hover table-bordered m-auto text-primary myTable"
                                            style="width: 400px;">
                                            <tr>
                                                <td>Name(Arabic) </td>
                                                <td><input type="text" class="toggle text-primary in"
                                                        name="name_ar" required style="width: 100%;"
                                                        value="{{ $company->translations()->where('locale', 'ar')->first()->name }}">
                                                    </th>
                                            </tr>
                                            <tr>
                                                <td>Name(English) </td>
                                                <td><input type="text" class="toggle text-primary in"
                                                        name="name_en" required style="width: 100%;"
                                                        value="{{ $company->translations()->where('locale', 'en')->first()->name }}">
                                                    </th>
                                            </tr>
                                            <tr>
                                                <td>email</td>
                                                <td><input type="email" class="toggle text-primary in"
                                                        name="email" style="width: 100%;"
                                                        value="{{ $company->email }}"></td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td><input type="number" class="toggle text-primary in"
                                                        name="phone" style="width: 100%;"
                                                        value="{{ $company->phone }}"></td>
                                            </tr>
                                            <tr>
                                                <td>Image </td>
                                                <td><input type="file" name="image" id="img">
                                                    <label for="img"><img
                                                            src="{{ asset(str_replace(app_path(), '', $company->image)) }}"
                                                            name="image"
                                                            style="padding-top: 5px; border-radius: 0px;"
                                                            width="30px" height="50px"></label>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </form>
                                <div class="modal-footer">
                                    <button type="button" class="action-button active close"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" id="edit-company-btn-{{ $company->id }}"
                                        onclick="editCompany('edit-form-{{ $company->id }}', {{ $company->id }})"
                                        class="app-content-headerButton">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end edit -->
                    <!-- delete -->
                    <a href="#" class="delete" data-toggle="modal"
                        data-target="#deleteCompany{{ $company->id }}" title="Delete" data-toggle="tooltip"><i
                            class="fas fa-trash"></i></a>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteCompany{{ $company->id }}" tabindex="-1"
                        aria-labelledby="exampleModal2Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="delete-form-{{ $company->id }}" action="" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="id" value="{{ $company->id }}" hidden>
                                    <div class="modal-body">
                                        Are you shure that you want to delete This Company (<span
                                            style="color: #90aaf8;">{{ $company->translations()->where('locale', 'en')->first()->name }}</span>)?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="action-button active close"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" id="delete-company-btn-{{ $company->id }}"
                                            onclick="deleteCompany(`delete-form-{{ $company->id }}`, {{ $company->id }})"
                                            class="app-content-headerButton">Yes</button>
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
