@extends('adminLayout-En.master')
@section('admincontent')

<div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">Tourist Guides</h1>
      

            <!-- add -->
<button type="button" class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#exampleModal3">
Add Tourist Guide
</button>

<!-- Modal -->
<div class="modal fade " id="exampleModal3" tabindex="-1" aria-labelledby="exampleModal3Label" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content toggle">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal3Label">New Tourist Guide</h5>
        <button type="button" class="btn-close m-0 close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="add-form" action="" method="post" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
      <table style=" width: 400px;" class="table-striped table-hover table-bordered m-auto text-primary myTable" >
      
              <tr>
                  <td>Name(Arabic) </td>
                  <td ><input type="text" class="toggle text-primary in" name="name_ar" required style="width: 100%;"></th>      
              </tr>
              <tr>
                  <td>Name(English) </td>
                  <td ><input type="text" class="toggle text-primary in" name="name_en" required style="width: 100%;"></th>      
              </tr>   
              <tr>
                  <td >image </td>
                  <td><input type="file" class="toggle text-primary in"  name="image" required style="width: 100%;"></th>      
              </tr> 
               
              <tr>
                  <td>Phone</td>
                  <td ><input class="toggle text-primary in" type="number" name="phone" required style="width: 100%;"></td>      
              </tr>
                  
              <tr>
                  <td>Email</td>
                  <td ><input class="toggle text-primary in" type="email" name="email" required style="width: 100%;"></td>      
              </tr>
              <tr>
                  <td>Salary</td>
                  <td ><input class="toggle text-primary in" type="number" name="salary" required style="width: 100%;"></td>      
              </tr>
              <tr>
                  <td>Description(Arabic)</td>
                  <td ><textarea class="toggle text-primary in mt-2"  name="description_ar" required style="width: 100%; height:27.5px;"></textarea></td>      
              </tr>
              <tr>
                  <td>Description(English)</td>
                  <td ><textarea class="toggle text-primary in mt-2"  name="description_en" required style="width: 100%; height:27.5px;"></textarea></td>      
              </tr>
              <tr>
                  <td>Certificates(Arabic)</td>
                  <td ><textarea class="toggle text-primary in mt-2"  name="certificates_ar" required style="width: 100%; height:27.5px;"></textarea></td>      
              </tr>
              <tr>
                  <td>Certificates(English)</td>
                  <td ><textarea class="toggle text-primary in mt-2"  name="certificates_en" required style="width: 100%; height:27.5px;"></textarea></td>      
              </tr>
             
      </table>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="action-button active close" data-bs-dismiss="modal">Close</button>
        <button type="button" id="add-guide-btn" onclick="addGuide('add-form')" class="app-content-headerButton">Save</button>
      </div>
    </div>
  </div>
</div>
    </div>
    <!-- end add -->
  
    <div class="app-content-actions">
      <input class="search-bar" onkeyup="searchFunction()" id="search" placeholder="Search By Name..." type="text">
      <div class="app-content-actions-wrapper">

        <button class="action-button list " title="List View">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
        </button>
        <button class="action-button grid" title="Grid View">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        </button>
        <div class="nav-item dropdown" >
                            <button class="action-button list dropdown-toggle" data-toggle="dropdown" title="Translate">  <i class="fas fa-globe "  ></i> </button>
                           
                            <div class="dropdown-menu border-0 rounded-0 m-0 toggle">
                                <a href="{{route('tourist_guide_en')}}"  class="dropdown-item">English</a>
                                <a href="{{route('tourist_guide_ar')}}" class="dropdown-item">Arabic </a>
                    
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
    <div class="products-area-wrapper tableView" id="guidesTable">
      <div class="products-header">
      <div class="product-cell">#</div>
        <div class="product-cell">Name</div>
        <div class="product-cell image ">Image</div>
        <div class="product-cell">Phone</div>
        <div class="product-cell">Email</div>
        <div class="product-cell">Salary</div>
        <div class="product-cell">Description</div>
        <div class="product-cell">Certificates</div>
        <div class="product-cell ">Actions</div>
      </div>
      <div id="guides-data">
      
      </div>
      </div>
    </div>
  </div>
  </div>
@endsection

<script>
    function addGuide(formId){
        $("#add-guide-btn").attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById('add-form'));
        $.ajax({
            url: "{{route('addTouristGuideEn')}}" ,
            type: "POST",
            data: formData,
            processData: false, 
            cache: false,
            contentType: false,
        })
        .done(function(data){   
            $("#guides-data").empty();
            $("#guides-data").append(data);
            $('.close').click();
            $('.parenttrue').attr("hidden", false);

        })
        .fail(function(){
          $('.close').click();
            $('.parent').attr("hidden", false);


        })
        .always(function() {
            // Re-enable the submit button and hide the loading spinner
            $("#add-guide-btn").attr("disabled", false).html('Save');
        });
    }
    //----------------------------------------------------------

    function editGuide(formId, id){

        $("#edit-guide-btn-"+id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById(formId));
        formData.append('id', id);
        $.ajax({
            url: `{{route('editTouristGuideEn')}}` ,
            type: "POST",
            data: formData,
            processData: false, 
            cache: false,
            contentType: false,
        })
        .done(function(data){   
            $("#guides-data").empty();
            $("#guides-data").append(data);
            $('.close').click();
            $('.parenttrue').attr("hidden", false);


        })
        .fail(function(){
          $('.close').click();
            $('.parent').attr("hidden", false);

            
        })
        .always(function() {
            // Re-enable the submit button and hide the loading spinner
            $("#edit-guide-btn-"+id).attr("disabled", false).html('Save Changes');
        });
    }

    //---------------------------------------------------------------
    function deleteGuide(formId, id){
        $("#delete-guide-btn-"+id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');

        var formData = new FormData(document.getElementById(formId));
        $.ajax({
            url: `{{route('deleteTouristGuideEn')}}` ,
            type: "POST",
            data: formData,
            processData: false, 
            cache: false,
            contentType: false,
        })
        .done(function(data){   
            $("#guides-data").empty();
            $("#guides-data").append(data);
            $('.close').click();
            $('.parenttrue').attr("hidden", false);

        })
        .fail(function(){
          $('.close').click();
            $('.parent').attr("hidden", false);

        })
        .always(function() {
            // Re-enable the submit button and hide the loading spinner
            $("#delete-guide-btn-"+id).attr("disabled", false).html('Yes');
        });
    }

    //---------------------------------------------------------------
    window.onload = (event) => {
        $.ajax({
            url: "{{route('getTouristGuideEn')}}" ,
            type: "GET",
            processData: false, 
            cache: false,
            contentType: false,
        }) 
        .done(function(data){
            $("#guides-data").append(data);
        })
        .fail(function(){
            $('.parent').attr("hidden", false);


        });
    };
    //--------------------------------------------------------

    function searchFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search");
        filter = input.value.toUpperCase();
        table = document.getElementById("guidesTable");
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
</script>
