@extends('adminLayout-En.master')
@section('admincontent')

<div class="app-content" >
    <div class="app-content-header">
      <h1 class="app-content-headerText">Cities</h1>
      
      <!-- add -->
<button type="button" class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#exampleModal3">
 Add City
</button>

<!-- Modal -->
<div class="modal fade " data-bs-backdrop="static" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModal3Label" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content toggle">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal3Label">New City</h5>
        <button type="button" class="btn-close m-0 close" onclick="removeMessages(), document.getElementById('add-form').reset()" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="add-form" action="" method="post" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
      <table style="width: 400px;" class="table-striped table-hover table-bordered m-auto text-primary myTable" >
              <tr>
                  <td>Name(Arabic) </td>
                  <td ><input type="text" class="toggle text-primary in" name="name_ar" required style="width: 100%;"></th>      
              </tr>  
              <tr > <td colspan="2"><span class="text-danger p-1" id="name_ar_error"></span></td> </tr>
              <tr>
                  <td>Name(English) </td>
                  <td ><input type="text" class="toggle text-primary in" name="name_en" required style="width: 100%;"></th>      
              </tr>
              <tr > <td colspan="2"><span class="text-danger p-1" id="name_en_error"></span></td> </tr>
              <tr>
                <td>Description(Arabic)</td>
                <td ><textarea class="toggle text-primary in mt-2"  name="description_ar" required style="width: 100%; height:27.5px;"></textarea></th>      
            </tr> 
            <tr > <td colspan="2"><span class="text-danger p-1" id="des_error"></span></td> </tr>

            <tr>
                <td>Description(English)</td>
                <td ><textarea class="toggle text-primary in mt-2"  name="description_en" required style="width: 100%; height:27.5px;"></textarea></th>      
            </tr> 
            <tr > <td colspan="2"><span class="text-danger p-1" id="des_error"></span></td> </tr>
            <tr>
                  <td >Image </td>
                  <td><input type="file" class="toggle text-primary in"  name="image" required style="width: 100%;"></th>      
              </tr>     
              <tr > <td colspan="2"><span class="text-danger p-1" id="image_error"></span></td> </tr>
      </table>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="action-button active close" onclick="removeMessages(), document.getElementById('add-form').reset()" data-bs-dismiss="modal">Close</button>
        <button type="button" id="add-city-btn" onclick="addCity('add-form')" class="app-content-headerButton">Save</button>
      </div>
    </div>
  </div>
</div>
    </div>
    <!-- end add -->
    <div class="app-content-actions">
      <input class="search-bar" onkeyup="searchFunction()" id="search" placeholder="Search By Name..." type="text">
      <div class="app-content-actions-wrapper">

        <div class="nav-item dropdown" >
                            <button class="action-button list dropdown-toggle" data-bs-toggle="dropdown" title="Translate">  <i class="fas fa-globe "  ></i> </button>
                           
                            <div class="dropdown-menu border-0 rounded-0 m-0 toggle">
                                <a href="{{route('city_en')}}"  class="dropdown-item">English</a>
                                <a href="{{route('city_ar')}}" class="dropdown-item">Arabic </a>
                    
                            </div>
                        </div>
        <button class="mode-switch" title="Switch Theme" style="margin-left:5px;">
        <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
          <defs></defs>
          <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
        </svg>
      </button>
      
      </div>
    </div>
    <div class="products-area-wrapper tableView" id="citiesTable">
      <div class="products-header">
      <div class="product-cell">#</div>
        <div class="product-cell">Name</div>
        <div class="product-cell image ">Image</div>
        <div class="product-cell image ">Description</div>
        <div class="product-cell">Districts</div>
        <div class="product-cell ">Actions</div>



 

      </div>
      <!-- output rows -->
      <div id="cities-data"></div>
      
      
      <!-- end output rows -->
      </div>
    </div>
  </div>
@endsection


<script>
    function addCity(formId){
        $("#add-city-btn").attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById('add-form'));
        $.ajax({
            url: "{{route('addCityEn')}}" ,
            type: "POST",
            data: formData,
            processData: false, 
            cache: false,
            contentType: false,
        })
        .done(function(data){   
            $("#cities-data").empty();
            $("#cities-data").append(data);
            $('.close').click();
            $('.parenttrue').attr("hidden", false);
            document.getElementById(formId).reset();

        })
        .fail(function(data){
          // $('.close').click();
          // $('.parent').attr("hidden", false);
          removeMessages();
          
          if(data.responseJSON.errors.name_ar){
              document.querySelector(`#${formId} #name_ar_error`).innerHTML = data.responseJSON.errors.name_ar[0]; 

            }
            if(data.responseJSON.errors.name_en){

              document.querySelector(`#${formId} #name_en_error`).innerHTML = data.responseJSON.errors.name_en[0]; 

            }
            if(data.responseJSON.errors.image){

              document.querySelector(`#${formId} #image_error`).innerHTML = data.responseJSON.errors.image[0]; 

            }

        })
        .always(function() {
            // Re-enable the submit button and hide the loading spinner
            $("#add-city-btn").attr("disabled", false).html('Save');
        });
    }
    //----------------------------------------------------------

    function editCity(formId, id){

        $("#edit-city-btn-"+id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById(formId));
        formData.append('id', id);
        $.ajax({
            url: `{{route('editCityEn')}}` ,
            type: "POST",
            data: formData,
            processData: false, 
            cache: false,
            contentType: false,
        })
        .done(function(data){   
            $("#cities-data").empty();
            $("#cities-data").append(data);
            $('.close').click();
            $('.parenttrue').attr("hidden", false);

        })
        .fail(function(data){
          removeMessages();
            // $('.close').click();
            // $('.parent').attr("hidden", false);
            if(data.responseJSON.errors.name_ar){
              console.log(document.querySelector(`#${formId}`));

              document.querySelector(`#${formId} .name_ar_error_edit`).innerHTML = data.responseJSON.errors.name_ar[0]; 

            }
            if(data.responseJSON.errors.name_en){
              console.log(document.querySelector(`#${formId} .name_en_error_edit`));

              document.querySelector(`#${formId} .name_en_error_edit`).innerHTML = data.responseJSON.errors.name_en[0]; 

            }

        })
        .always(function() {
            // Re-enable the submit button and hide the loading spinner
            $("#edit-city-btn-"+id).attr("disabled", false).html('Save Changes');
        });
    }

    //---------------------------------------------------------------
    function deleteCity(formId, id){
        $("#delete-city-btn-"+id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');

        var formData = new FormData(document.getElementById(formId));
        $.ajax({
            url: `{{route('deleteCityEn')}}` ,
            type: "POST",
            data: formData,
            processData: false, 
            cache: false,
            contentType: false,
        })
        .done(function(data){   
            $("#cities-data").empty();
            $("#cities-data").append(data);
            $('.close').click();
            $('.parenttrue').attr("hidden", false);

        })
        .fail(function(){
          $('.close').click();
          $('.parent').attr("hidden", false);

        })
        .always(function() {
            // Re-enable the submit button and hide the loading spinner
            $("#delete-city-btn-"+id).attr("disabled", false).html('Yes');
        });
    }

    //---------------------------------------------------------------
    window.onload = (event) => {
        $.ajax({
            url: "{{route('getCitiesEn')}}" ,
            type: "GET",
            processData: false, 
            cache: false,
            contentType: false,
        }) 
        .done(function(data){
            $("#cities-data").append(data);
        })
        .fail(function(){
          $('.parent').attr("hidden", false);

        });

    };
    //----------------------------------------------------------
 

    function searchFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search");
        filter = input.value.toUpperCase();
        table = document.getElementById("citiesTable");
        // tr = table.getElementsByTagName("tr");
        tr = table.getElementsByClassName("products-row");
        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByClassName("search-value");
                
            if (td) {
                txtValue = td[0].textContent || td[0].innerText;
                if(txtValue){

                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    }
//--------------------------------------------
function removeMessages(){
    document.getElementById('name_ar_error').innerHTML = ''; 
    document.getElementById('name_en_error').innerHTML = ''; 
    document.getElementById('image_error').innerHTML = ''; 

    const name_ar = document.querySelectorAll('.name_ar_error_edit');
    name_ar.forEach(name => {
      name.innerHTML = '';
    });

    const name_en = document.querySelectorAll('.name_en_error_edit');
    name_en.forEach(name => {
      name.innerHTML = '';
    });

    const images = document.querySelectorAll('.image_error_edit');
    images.forEach(image => {
      image.innerHTML = '';
    });
  }
//--------------------------------------------
</script>
