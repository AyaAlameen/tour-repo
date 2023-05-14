<?php $i = 1; ?>
@foreach ($transportations as $transportation)
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
            <span  class="search-value">{{ $transportation->carId }}</span>
        </div>


        <div class="product-cell">
            <span>{{ $transportation->city->translations()->where('locale', 'en')->first()->name }}</span>
        </div>

        <div class="product-cell">
            <span> {{ $transportation->passengers_number }} </span>
        </div>
        <div class="product-cell">
            <span>{{ $transportation->translations()->where('locale', 'en')->first()->description }}</span>
        </div>

        <div class="product-cell">
            <!-- start action -->
            <div class="p-3">

                <!-- delete -->

                <!-- edit -->
                <a href="#" class="edit p-2" data-toggle="modal"
                    data-target="#editTransportation{{ $transportation->id }}" title="Edit"><i
                        class="fas fa-pen"></i></a>

                <!-- Modal -->
                <div class="modal fade" data-backdrop="static"
                    id="editTransportation{{ $transportation->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" onclick="removeMessages()"
                                    data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="edit-form-{{ $transportation->id }}" action="" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="text" hidden name="transport_company_id"
                                    class="toggle text-primary in" value="{{ $company->id }}">

                                <div class="modal-body">
                                    <table
                                        class="table-striped table-hover table-bordered m-auto text-primary myTable"
                                        style="width: 400px;">
                                        <tr>
                                            <td>Car ID</td>
                                            <td><input type="number" name="carId" class="toggle text-primary in"
                                                value="{{ $transportation->carId }}"></td>

                                        </tr>
                                        <tr>
                                            <td colspan="2"><span style="color: red"
                                                    class="carId_error_edit"></span></td>
                                        </tr>
                                        <tr>
                                            <td>City</td>
                                            <td>
                                                <div class="dropdown toggle text-primary in"
                                                    style="display:inline-block; ;">

                                                    <label class="dropdown-toggle" type="button"
                                                        id="dropdownMenuButtonEdit{{ $transportation->id }}"
                                                        data-toggle="dropdown" aria-expanded="false">

                                                    </label>
                                                    <span
                                                        id="city-name-{{ $transportation->id }}">{{ $transportation->city->translations()->where('locale', 'en')->first()->name }}</span>
                                                    <div class="dropdown-menu"
                                                        aria-labelledby="dropdownMenuButtonEdit{{ $transportation->id }}">
                                                        @foreach ($cities as $city)
                                                            <option
                                                                style="cursor: pointer; @if ($city->id == $transportation->city_id) color: #90aaf8 !important; @endif"
                                                                class="dropdown-item"
                                                                value="{{ $city->id }}"
                                                                id="edit_city_{{ $transportation->id }}_{{ $city->id }}"
                                                                onclick="setEditCity({{ $city->id }}, {{ $transportation->id }}, '{{ $city->translations()->where('locale', 'en')->first()->name }}', 'edit_city_{{ $transportation->id }}_{{ $city->id }}')"
                                                                href="#">
                                                                {{ $city->translations()->where('locale', 'en')->first()->name }}
                                                            </option>
                                                        @endforeach
                                                        <input type="text"
                                                            id="edit_city_id_{{ $transportation->id }}"
                                                            name="city_id"
                                                            value="{{ $transportation->city_id }}" hidden>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><span style="color: red"
                                                    class="city_error_edit"></span></td>
                                        </tr>
                                        <tr>
                                            <td>Count Of Passengers</td>
                                            <td><input type="number"  name="passengers_number"
                                                    class="toggle text-primary in"
                                                    value="{{ $transportation->passengers_number }}"></td>

                                        </tr>
                                        <tr>
                                            <td colspan="2"><span style="color: red"
                                                    class="passengers_number_error_edit"></span></td>
                                        </tr>
                                        <tr>
                                            <td>Description(Arabic) </td>
                                            <td><input type="text" class="toggle text-primary in" name="description_ar"
                                                    value="{{ $transportation->translations()->where('locale', 'ar')->first()->description }}" required style="width: 100%;"></td>
                                        </tr>

                                        <tr>
                                            <td>Specifications(English) </td>
                                            <td><input type="text" class="toggle text-primary in" name="description_en"
                                                    value="{{ $transportation->translations()->where('locale', 'en')->first()->description }}" required style="width: 100%;"></td>
                                        </tr>


                                    </table>

                                </div>
                            </form>
                            <div class="modal-footer">
                                <button type="button" class="action-button active close"  onclick="removeMessages()"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" id="edit-transportation-btn-{{ $transportation->id }}"
                                    onclick="editTransportation('edit-form-{{ $transportation->id }}', {{ $transportation->id }})" class="app-content-headerButton">Save
                                    changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end edit -->
                <a href="#" class="delete" data-toggle="modal" data-target="#deleteCompany{{ $transportation->id }}"
                    title="Delete" data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                <!-- Modal -->
                <div class="modal fade" id="deleteCompany{{ $transportation->id }}" tabindex="-1"
                    aria-labelledby="exampleModal2Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="delete-form-{{ $transportation->id }}" action=""
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="id" value="{{ $transportation->id }}"
                                    hidden>
                                <input type="text" name="transport_company_id"
                                    value="{{ $company->id }}" hidden>
                            <div class="modal-body">
                                Are you sure that you want to delete This transportation (<span
                                style="color: #90aaf8;">{{ $transportation->carId }}</span>)?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="action-button active close"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" id="delete-transportation-btn-{{ $transportation->id }}"
                                    onclick="deleteTransportation(`delete-form-{{ $transportation->id }}`, {{ $transportation->id }})" class="app-content-headerButton">Yes</button>
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
            <span  class="search-value">{{ $transportation->carId }}</span>
        </div>


        <div class="product-cell">
            <span>{{ $transportation->city->translations()->where('locale', 'en')->first()->name }}</span>
        </div>

        <div class="product-cell">
            <span> {{ $transportation->passengers_number }} </span>
        </div>
        <div class="product-cell">
            <span>{{ $transportation->translations()->where('locale', 'en')->first()->description }}</span>
        </div>

        <div class="product-cell">
            <!-- start action -->
            <div class="p-3">

                <!-- delete -->

                <!-- edit -->
                <a href="#" class="edit p-2" data-toggle="modal"
                    data-target="#editTransportation{{ $transportation->id }}" title="Edit"><i
                        class="fas fa-pen"></i></a>

                <!-- Modal -->
                <div class="modal fade" data-backdrop="static"
                    id="editTransportation{{ $transportation->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" onclick="removeMessages()"
                                    data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="edit-form-{{ $transportation->id }}" action="" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="text" hidden name="transport_company_id"
                                    class="toggle text-primary in" value="{{ $company->id }}">

                                <div class="modal-body">
                                    <table
                                        class="table-striped table-hover table-bordered m-auto text-primary myTable"
                                        style="width: 400px;">
                                        <tr>
                                            <td>Car ID</td>
                                            <td><input type="number" name="carId" class="toggle text-primary in"
                                                value="{{ $transportation->carId }}"></td>

                                        </tr>
                                        <tr>
                                            <td colspan="2"><span style="color: red"
                                                    class="carId_error_edit"></span></td>
                                        </tr>
                                        <tr>
                                            <td>City</td>
                                            <td>
                                                <div class="dropdown toggle text-primary in"
                                                    style="display:inline-block; ;">

                                                    <label class="dropdown-toggle" type="button"
                                                        id="dropdownMenuButtonEdit{{ $transportation->id }}"
                                                        data-toggle="dropdown" aria-expanded="false">

                                                    </label>
                                                    <span
                                                        id="city-name-{{ $transportation->id }}">{{ $transportation->city->translations()->where('locale', 'en')->first()->name }}</span>
                                                    <div class="dropdown-menu"
                                                        aria-labelledby="dropdownMenuButtonEdit{{ $transportation->id }}">
                                                        @foreach ($cities as $city)
                                                            <option
                                                                style="cursor: pointer; @if ($city->id == $transportation->city_id) color: #90aaf8 !important; @endif"
                                                                class="dropdown-item"
                                                                value="{{ $city->id }}"
                                                                id="edit_city_{{ $transportation->id }}_{{ $city->id }}"
                                                                onclick="setEditCity({{ $city->id }}, {{ $transportation->id }}, '{{ $city->translations()->where('locale', 'en')->first()->name }}', 'edit_city_{{ $transportation->id }}_{{ $city->id }}')"
                                                                href="#">
                                                                {{ $city->translations()->where('locale', 'en')->first()->name }}
                                                            </option>
                                                        @endforeach
                                                        <input type="text"
                                                            id="edit_city_id_{{ $transportation->id }}"
                                                            name="city_id"
                                                            value="{{ $transportation->city_id }}" hidden>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><span style="color: red"
                                                    class="city_error_edit"></span></td>
                                        </tr>
                                        <tr>
                                            <td>Count Of Passengers</td>
                                            <td><input type="number"  name="passengers_number"
                                                    class="toggle text-primary in"
                                                    value="{{ $transportation->passengers_number }}"></td>

                                        </tr>
                                        <tr>
                                            <td colspan="2"><span style="color: red"
                                                    class="passengers_number_error_edit"></span></td>
                                        </tr>
                                        <tr>
                                            <td>Description(Arabic) </td>
                                            <td><input type="text" class="toggle text-primary in" name="description_ar"
                                                    value="{{ $transportation->translations()->where('locale', 'ar')->first()->description }}" required style="width: 100%;"></td>
                                        </tr>

                                        <tr>
                                            <td>Specifications(English) </td>
                                            <td><input type="text" class="toggle text-primary in" name="description_en"
                                                    value="{{ $transportation->translations()->where('locale', 'en')->first()->description }}" required style="width: 100%;"></td>
                                        </tr>


                                    </table>

                                </div>
                            </form>
                            <div class="modal-footer">
                                <button type="button" class="action-button active close"  onclick="removeMessages()"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" id="edit-transportation-btn-{{ $transportation->id }}"
                                    onclick="editTransportation('edit-form-{{ $transportation->id }}', {{ $transportation->id }})" class="app-content-headerButton">Save
                                    changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end edit -->
                <a href="#" class="delete" data-toggle="modal" data-target="#deleteCompany{{ $transportation->id }}"
                    title="Delete" data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                <!-- Modal -->
                <div class="modal fade" id="deleteCompany{{ $transportation->id }}" tabindex="-1"
                    aria-labelledby="exampleModal2Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="delete-form-{{ $transportation->id }}" action=""
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="id" value="{{ $transportation->id }}"
                                    hidden>
                                <input type="text" name="transport_company_id"
                                    value="{{ $company->id }}" hidden>
                            <div class="modal-body">
                                Are you sure that you want to delete This transportation (<span
                                style="color: #90aaf8;">{{ $transportation->carId }}</span>)?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="action-button active close"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" id="delete-transportation-btn-{{ $transportation->id }}"
                                    onclick="deleteTransportation(`delete-form-{{ $transportation->id }}`, {{ $transportation->id }})" class="app-content-headerButton">Yes</button>
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
