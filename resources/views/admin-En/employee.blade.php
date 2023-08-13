@extends('adminLayout-En.master')
@section('admincontent')

<div class="app-content">
    <div class="app-content-header" style="width:55%;">
      <h1 class="app-content-headerText">Employees</h1>

            <!-- add -->
<button type="button" class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#exampleModal3">
Add employee
</button>

<!-- Modal -->
<div class="modal fade " data-bs-backdrop="static" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModal3Label" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content toggle">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal3Label">New Employee</h5>
        <button type="button" class="btn-close m-0 close" onclick="removeMessages(), document.getElementById('add-form').reset()" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="add-form" action="" method="post" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
      <table style="width: 400px;" class="table-striped table-hover table-bordered m-auto text-primary myTable" >
      
              <tr>
                  <td>Full Name(Arabic) </td>
                  <td ><input type="text" class="toggle text-primary in" name="full_name_ar" required style="width: 100%;"></th>      
              </tr>  
              <tr > <td colspan="2"><span class="text-danger p-1" id="name_ar_error"></span></td> </tr>
              <tr>
                  <td>Full Name(English)</td>
                  <td ><input type="text" class="toggle text-primary in" name="full_name_en" required style="width: 100%;"></th>      
              </tr> 
              <tr > <td colspan="2"><span class="text-danger p-1" id="name_en_error"></span></td> </tr>
             
              <tr>
                  <td >image </td>
                  <td><input type="file" id="add_img"
                    onchange="previewImage(this, 'add_previewImage_0')"
                    class="toggle text-primary in" name="image" required style="width: 100%;">
                <label for="add_img"> <img id="add_previewImage_0" width="170px"
                        height="90px" style="display: none; padding:6px;"></label>
            </td>     
              </tr> 
              <tr > <td colspan="2"><span class="text-danger p-1" id="image_error"></span></td> </tr>
              <tr>
                  <td>Username</td>
                  <td ><input class="toggle text-primary in" type="text" name="user_name" required style="width: 100%;"></th>      
              </tr>
              <tr > <td colspan="2"><span class="text-danger p-1" id="user_name_error"></span></td> </tr>
              
              <tr>
                  <td>Email</td>
                  <td ><input class="toggle text-primary in" type="email" name="email" required style="width: 100%;"></th>      
              </tr>  
              <tr > <td colspan="2"><span class="text-danger p-1" id="email_error"></span></td> </tr>
              <tr>
                  <td>Password</td>
                  <td ><input class="toggle text-primary in" type="password" name="password" required style="width: 100%;"></th>      
              </tr> 
              <tr > <td colspan="2"><span class="text-danger p-1" id="password_error"></span></td> </tr>
              <tr>
                  <td>Phone</td>
                  <td ><input class="toggle text-primary in" type="number" name="phone" required style="width: 100%;"></th>      
              </tr> 
              <tr > <td colspan="2"><span class="text-danger p-1" id="phone_error"></span></td> </tr>
              <tr>
                  <td>Address(Arabic)</td>
                  <td ><textarea class="toggle text-primary in" type="text" name="address_ar" required style="width: 100%;"></textarea></th>      
              </tr> 
              <tr>
                  <td>Address(English)</td>
                  <td ><textarea class="toggle text-primary in" type="text" name="address_en" required style="width: 100%;"></textarea></th>      
              </tr> 
              <tr>
                  <td>Salary</td>
                  <td ><input class="toggle text-primary in" type="number" name="salary" required style="width: 100%;"></th>      
              </tr>
              <tr > <td colspan="2"><span class="text-danger p-1" id="salary_error"></span></td> </tr>
              <tr>
                  <td>Job(Arabic)</td>
                  <td ><textarea class="toggle text-primary in" type="text" name="job_ar" required style="width: 100%;"></textarea></th>      
              </tr>
              <tr>
                  <td>Job(English)</td>
                  <td ><textarea class="toggle text-primary in" type="text" name="job_en" required style="width: 100%;"></textarea></th>      
              </tr>
              <tr>
                  <td>Identifier</td>
                  <td ><input class="toggle text-primary in" type="number" name="identifier" required style="width: 100%;"></th>      
              </tr>
              <tr > <td colspan="2"><span class="text-danger p-1" id="identifier_error"></span></td> </tr>
      </table>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="action-button active close" onclick="removeMessages(), document.getElementById('add-form').reset()" data-bs-dismiss="modal">Close</button>
        <button type="button" id="add-employee-btn" onclick="addEmployee('add-form')" class="app-content-headerButton">Save</button>
      </div>
    </div>
  </div>
</div>
    </div>
    <!-- end add -->
  
    <div class="app-content-actions" style="width:55%;">
      <input class="search-bar" onkeyup="searchFunction()" id="search" placeholder="Search By Name..." type="text">
      <div class="app-content-actions-wrapper">
        <!-- filter -->
        <div class="filter-button-wrapper">
          <button class="action-button filter jsFilter"><span>Filter</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg></button>
          <div class="filter-menu">
            <label>Jop</label>
            <select>
              <option>All Jops</option>
              <option>Drivers</option>       
              <option>Data interers</option>
              <option>Managers</option>
       
            </select>
            
            <div class="filter-menu-buttons">

              <button class="filter-button apply">
                Apply
              </button>
            </div>
          </div>
        </div>
        <!-- end filter -->
    
        <div class="nav-item dropdown" >
                            <button class="action-button list dropdown-toggle" data-bs-toggle="dropdown" title="Translate">  <i class="fas fa-globe "  ></i> </button>
                           
                            <div class="dropdown-menu border-0 rounded-0 m-0 toggle">
                                <a href="{{route('employee_en')}}"  class="dropdown-item">English</a>
                                <a href="{{route('employee_ar')}}" class="dropdown-item">Arabic </a>
                    
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
    <div class="scroll-class" style="width:55%;">
    <div class="products-area-wrapper tableView" id="employeesTable">
      <div class="products-header">
        <div class="product-cell"> #</div>
        <div class="product-cell"> Full Name</div>
        <div class="product-cell image ">Image</div>

        <div class="product-cell "> user Name</div>

        <div class="product-cell category">Email</div>
        <div class="product-cell status-cell">Phone</div>
        <div class="product-cell stock">Salary</div>
        <div class="product-cell ">Job</div>
        <div class="product-cell sales">Address</div>
        <div class="product-cell ">Identifier</div>
        <div class="product-cell ">Actions</div>


      </div>
      <div id="employees-data">

      </div>
      </div>
      </div>
      </div>
    </div>
  </div>
@endsection

<script>
  function addEmployee(formId){
      $("#add-employee-btn").attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
      var form = $(`#${formId}`);
      var formData = new FormData(document.getElementById('add-form'));
      $.ajax({
          url: "{{route('addEmployeeEn')}}" ,
          type: "POST",
          data: formData,
          processData: false, 
          cache: false,
          contentType: false,
      })
      .done(function(data)
          {   
              $("#employees-data").empty();
              $("#employees-data").append(data);
              $('.close').click();
          $('.parenttrue').attr("hidden", false);
          document.getElementById(formId).reset();
          })
      .fail(function(data)
          {
            // $('.close').click();
            // $('.parent').attr("hidden", false);

            removeMessages();
        
            if(data.responseJSON.errors.full_name_ar){
            document.querySelector(`#${formId} #name_ar_error`).innerHTML = data.responseJSON.errors.full_name_ar[0]; 

          }
          if(data.responseJSON.errors.full_name_en){

            document.querySelector(`#${formId} #name_en_error`).innerHTML = data.responseJSON.errors.full_name_en[0]; 

          }
          if(data.responseJSON.errors.image){

            document.querySelector(`#${formId} #image_error`).innerHTML = data.responseJSON.errors.image[0]; 

          }
          if(data.responseJSON.errors.user_name){

            document.querySelector(`#${formId} #user_name_error`).innerHTML = data.responseJSON.errors.user_name[0]; 

          }
          if(data.responseJSON.errors.email){

            document.querySelector(`#${formId} #email_error`).innerHTML = data.responseJSON.errors.email[0]; 

          }
          if(data.responseJSON.errors.password){

            document.querySelector(`#${formId} #password_error`).innerHTML = data.responseJSON.errors.password[0]; 

          }
          if(data.responseJSON.errors.phone){

            document.querySelector(`#${formId} #phone_error`).innerHTML = data.responseJSON.errors.phone[0]; 

          }
          if(data.responseJSON.errors.salary){

            document.querySelector(`#${formId} #salary_error`).innerHTML = data.responseJSON.errors.salary[0]; 

          }
          if(data.responseJSON.errors.identifier){

            document.querySelector(`#${formId} #identifier_error`).innerHTML = data.responseJSON.errors.identifier[0]; 

          }

          })
          .always(function() {
              // Re-enable the submit button and hide the loading spinner
              $("#add-employee-btn").attr("disabled", false).html('Save Changes');
          });
  }
//-------------------------------------------------
function editEmployee(formId, id){
    $("#edit-employee-btn-"+id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
      
      var formData = new FormData(document.getElementById(formId));
      formData.append('id', id);
      $.ajax({
          url: `{{route('editEmployeeEn')}}` ,
          type: "POST",
          data: formData,
          processData: false, 
          cache: false,
          contentType: false,
      })
      .done(function(data)
          {   
              $("#employees-data").empty();
              $("#employees-data").append(data);
              $('.close').click();
              $('.parenttrue').attr("hidden", false);

          })
      .fail(function(data)
          {
            removeMessages();
          // $('.close').click();
          // $('.parent').attr("hidden", false);
          
          if(data.responseJSON.errors.full_name_ar){
            document.querySelector(`#${formId} .name_ar_error_edit`).innerHTML = data.responseJSON.errors.full_name_ar[0]; 

          }
          if(data.responseJSON.errors.full_name_en){

            document.querySelector(`#${formId} .name_en_error_edit`).innerHTML = data.responseJSON.errors.full_name_en[0]; 

          }
          if(data.responseJSON.errors.user_name){

            document.querySelector(`#${formId} .user_name_error_edit`).innerHTML = data.responseJSON.errors.user_name[0]; 

          }
          if(data.responseJSON.errors.email){

            document.querySelector(`#${formId} .email_error_edit`).innerHTML = data.responseJSON.errors.email[0]; 

          }
          if(data.responseJSON.errors.phone){

            document.querySelector(`#${formId} .phone_error_edit`).innerHTML = data.responseJSON.errors.phone[0]; 

          }
          if(data.responseJSON.errors.salary){

            document.querySelector(`#${formId} .salary_error_edit`).innerHTML = data.responseJSON.errors.salary[0]; 

          }
          if(data.responseJSON.errors.identifier){

            document.querySelector(`#${formId} .identifier_error_edit`).innerHTML = data.responseJSON.errors.identifier[0]; 

          }

          })
          .always(function() {
              // Re-enable the submit button and hide the loading spinner
              $("#edit-employee-btn-"+id).attr("disabled", false).html('Save Changes');
          });
  }

  //---------------------------------------------------------------
  function permissions(formId, id){

$("#permissions-employee-btn-"+id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
var formData = new FormData(document.getElementById(formId));
// formData.append('id', id);
$.ajax({
    url: `{{route('employeePermissionsEn')}}` ,
    type: "POST",
    data: formData,
    processData: false, 
    cache: false,
    contentType: false,
})
.done(function(data){   
  
    $("#employees-data").empty();
    $("#employees-data").append(data);
    $('.close').click();
    $('.parenttrue').attr("hidden", false);
    // clearInput();
})
.fail(function(data){
    $('.close').click();
    $('.parent').attr("hidden", false);
    

})
.always(function() {
    // Re-enable the submit button and hide the loading spinner
    $("#permissions-employee-btn-"+id).attr("disabled", false).html('Save');
});
}
  
  //---------------------------------------------------------------

  function deleteEmployee(formId, id){
    $("#delete-employee-btn-"+id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');

    var formData = new FormData(document.getElementById(formId));
      
    $.ajax({
          url: `{{route('deleteEmployeeEn')}}` ,
          type: "POST",
          data: formData,
          processData: false, 
          cache: false,
          contentType: false,
      })
      .done(function(data)
          {   
              $("#employees-data").empty();
              $("#employees-data").append(data);
              $('.close').click();
          $('.parenttrue').attr("hidden", false);

          })
      .fail(function()
          {
            $('.close').click();
            $('.parent').attr("hidden", false);
          })
          .always(function() {
              // Re-enable the submit button and hide the loading spinner
              $("#delete-employee-btn-"+id).attr("disabled", false).html('Yes');
          });
  }
//----------------------------------------------------------

  window.onload = (event) => {
      $.ajax({
              url: "{{route('getEmployeesEn')}}" ,
              type: "GET",
              processData: false, 
              cache: false,
              contentType: false,
          }) 
          .done(function(data)
              {
                  $("#employees-data").append(data);
              })
          .fail(function()
              {
                $('.parent').attr("hidden", false);

              });
  };
  //----------------------------------------------------------


  function searchFunction() {
      // Declare variables
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("search");
      filter = input.value.toUpperCase();
      table = document.getElementById("employeesTable");
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
  document.getElementById('user_name_error').innerHTML = ''; 
  document.getElementById('email_error').innerHTML = ''; 
  document.getElementById('password_error').innerHTML = ''; 
  document.getElementById('phone_error').innerHTML = ''; 
  document.getElementById('salary_error').innerHTML = ''; 
  document.getElementById('identifier_error').innerHTML = ''; 

  const name_ar = document.querySelectorAll('.name_ar_error_edit');
  name_ar.forEach(name => {
    name.innerHTML = '';
  });

  const name_en = document.querySelectorAll('.name_en_error_edit');
  name_en.forEach(name => {
    name.innerHTML = '';
  });

  const user_names = document.querySelectorAll('.user_name_error_edit');
  user_names.forEach(user_name => {
    user_name.innerHTML = '';
  });
  
  const emails = document.querySelectorAll('.email_error_edit');
  emails.forEach(email => {
    email.innerHTML = '';
  });

  const phones = document.querySelectorAll('.phone_error_edit');
  phones.forEach(phone => {
    phone.innerHTML = '';
  });

  const salaries = document.querySelectorAll('.salary_error_edit');
  salaries.forEach(salary => {
    salary.innerHTML = '';
  });

  const identifiers = document.querySelectorAll('.identifier_error_edit');
  identifiers.forEach(identifier => {
    identifier.innerHTML = '';
  });
}
//--------------------------------------------
</script>

