@extends('adminLayout-En.master')
@section('admincontent')
    <div class="app-content">
        <div class="app-content-header w-100">
            <h1 class="app-content-headerText">Images</h1>
            <h3 class="app-content-headerText ">"{{ $place->translations()->where('locale', 'en')->first()->name }}"</h3>
            <!-- add -->
            <button type="button" class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                add pictures
            </button>

            <!-- Modal -->
            <div class="modal fade " id="exampleModal3" tabindex="-1" data-bs-backdrop="static"
                aria-labelledby="exampleModal3Label" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content toggle">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModal3Label">New Picturs</h5>
                            <button type="button" class="btn-close m-0 close"
                                onclick="removeMessages(), document.getElementById('add-form').reset()"
                                data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="add-form" action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <table style="width: 400px; direction: rtl;" id="addTable"
                                    class="table-striped table-hover table-bordered m-auto text-primary myTable">

                                    <input type="text" name="id" value="{{ $place->id }}" hidden>
                                    <tr>
                                        <td style="width:25px; text-align:center;"> <i
                                                class="fas fa-camera text-body pt-2 pr-2"
                                                style="font-size:15px; cursor:pointer;"></i></td>

                                        <td class="pl-2">
                                            {{-- <i class="fas fa-plus text-body pl-3"
                                                style="text-align: center; line-height: 1.5; font-size:15px;  cursor:pointer;"onclick="addPic()"
                                                id="add-pic-input" data-picid="1" title="Add Another Picture"></i>
                                            <input type="file" id="add_input_0"
                                                onchange="previewImage(this, 'add_previewImage_0')"
                                                class="toggle text-primary in" name="event_image" required
                                                style="width:75% !important; font-size:16px;">
                                            <label for="add_input_0"> <img id="add_previewImage_0" width="170px"
                                                    height="90px" style="display: none; padding:6px;"></label> --}}
                                            <input type="file" name="image">
                                        </td>
                                        <td>images </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><span class="text-danger p-1" id="image_error"></span></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" onclick="removeMessages(), document.getElementById('add-form').reset()"
                                class="action-button active close" data-bs-dismiss="modal">close</button>
                            <button type="button" id="add-category-btn" onclick="addCategory('add-form')"
                                class="app-content-headerButton">save</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end add -->

        <div class="app-content-actions w-100">

            <div class="app-content-actions-wrapper">



                <div class="nav-item dropdown">
                    <button class="action-button list dropdown-toggle" data-bs-toggle="dropdown" title="translate"> <i
                            class="fas fa-globe "></i> </button>

                    <div class="dropdown-menu border-0 rounded-0 m-0 toggle">
                        <a href="{{ route('place_pic_ar', ['id' => $place->id]) }}" class="dropdown-item"> Arabic</a>
                        <a href="{{ route('place_pic_en', ['id' => $place->id]) }}" class="dropdown-item">English </a>

                    </div>
                </div>
                <button class="mode-switch" title="switch thim" style="margin-left:5px;">
                    <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                        <defs></defs>
                        <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                    </svg>
                </button>

            </div>
        </div>

        <div class="products-area-wrapper tableView">
            <div class="products-header">
                <div class="product-cell">#</div>
                <div class="product-cell image ">image</div>
                <div class="product-cell ">actions</div>
            </div>
            <div id="categories-data">
                <?php $i = 1; ?>
                @foreach ($images as $image)
                    <div class="products-row">
                        <div class="product-cell">
                            <span>{{$i++}}</span>
                        </div>
                        <div class="product-cell">
                            <span><img src="{{ asset(str_replace(app_path(),'',$image -> image))}}" alt="product"></span>
                        </div>
                        <div class="product-cell">
                            <span>
                                <!-- delete -->
                                <a href="#" class="delete" data-toggle="modal" data-target="#deletePic{{$image->id}}" title="Delete"
                                    data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                                <!-- Modal -->
                                <div class="modal fade" id="deletePic{{$image->id}}" tabindex="-1" aria-labelledby="exampleModal2Label"
                                    aria-hidden="true">

                                    <div class="modal-dialog">
                                        <div class="modal-content" style="direction:ltr;">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form id="delete-form-{{$image->id}}" action="" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="text" value="{{$image->id}}" name="image_id" hidden>
                                                <input type="text" value="{{$place->id}}" name="id" hidden>
                                                <div class="modal-body" style="direction:rtl;">
                                                    ?Are You sure that you want to delete this picture 

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="action-button active close"
                                                        data-dismiss="modal">close</button>
                                                    <button type="submit" id="delete-category-btn-{{$image->id}}" onclick="deleteCategory(`delete-form-{{$image->id}}`, {{$image->id}})" class="app-content-headerButton">yes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <!-- end delete -->
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>

    </div>
    </div>
@endsection


<script>
    function addCategory(formId) {
        $("#add-category-btn").attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById('add-form'));
        $.ajax({
                url: "{{ route('addPlaceImageEn') }}",
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
                document.getElementById(formId).reset();


            })
            .fail(function(data) {
                // $('.close').click();
                // $('.parent').attr("hidden", false);
                removeMessages();


                if (data.responseJSON.errors.image) {

                    document.querySelector(`#${formId} #image_error`).innerHTML = data.responseJSON.errors.image[0];

                }

            })
            .always(function() {
                // Re-enable the submit button and hide the loading spinner
                $("#add-category-btn").attr("disabled", false).html('Save');
            });
    }
    //---------------------------------------------------------------
    function deleteCategory(formId, id) {
        $("#delete-category-btn-" + id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');

        var formData = new FormData(document.getElementById(formId));
        $.ajax({
                url: `{{ route('deletePlaceImageEn') }}`,
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
                $("#delete-category-btn-" + id).attr("disabled", false).html('Yes');
            });
    }


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

        document.getElementById('image_error').innerHTML = '';

    }
    //--------------------------------------------
</script>
