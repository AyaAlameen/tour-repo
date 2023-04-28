@extends('adminLayout-Ar.master')
@section('admincontent')
<div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">الجروبات</h1>
     
        <!-- add -->
<button type="button" class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#exampleModal3">
إضافة جروب
</button>

<!-- Modal -->
<div class="modal fade " data-bs-backdrop="static" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModal3Label" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content toggle">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal3Label">جروب جديد</h5>
        <button type="button" class="btn-close m-0 close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="add-form" action="" method="post" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
      <table style="color: rgb(22, 22, 22); width: 400px;" class="table-striped table-hover table-bordered m-auto text-primary myTable" >
      
              <tr>
                  
                  <td ><input type="number" class="toggle text-primary in" name="group_number" required style="width: 100%;"></th>  
                  <td>رقم الجروب</td>    
              </tr>  

              <tr>
                  
                  <td ><div class="dropdown toggle text-primary in" style="display:inline-block; ;">
                    
                  <label  class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">  
                    
                  </label>
                  <span id="guide-name"></span>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach ($guides as $guide)
                      <option style="cursor: pointer;" class="dropdown-item" value="{{$guide->id}}" id="guide_{{$guide->id}}" onclick="setGuide({{$guide->id}}, '{{$guide->translations()->where('locale', 'ar')->first()->name}}', 'guide_{{$guide->id}}')" href="#">{{$guide->translations()->where('locale', 'ar')->first()->name}}</option>
                    @endforeach
                    <input type="text" id="guide_id" name="tourist_guide_id" hidden>
                 
                  </div>
                </div></td>    
                <td>الدليل السياحي</td>  
              </tr>
             
              <tr>
                  
                  <td ><input class="toggle text-primary in" type="number"  required style="width: 100%;"></td> 
                  <td>مدة الرحلة</td>     
              </tr>

              <tr>
                  
                  <td ><textarea class="toggle text-primary in mt-2"  name="_group_description" required style="width: 100%; height:27.5px;"></textarea></td> 
                  <td>وصف(العربية)</td>     
              </tr>  
              <tr>
                  
                  <td ><textarea class="toggle text-primary in mt-2"  name="_group_description" required style="width: 100%; height:27.5px;"></textarea></td> 
                  <td>(الانكليزية)وصف</td>     
              </tr>   
              <tr>
                  
                  <td ><input class="toggle text-primary in" type="number" name="people_cont" required style="width: 100%;"></td> 
                  <td>عدد الأشخاص</td>     
              </tr>
              <tr>
                 
                  <td ><input class="toggle text-primary in" type="number" name="group_cost" required style="width: 100%;"></td>   
                  <td>الكلفة</td>   
              </tr> 


 
      </table>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="action-button active" data-bs-dismiss="modal">إغلاق</button>
        <button type="button" class="app-content-headerButton">حفظ</button>
      </div>
    </div>
  </div>
</div>
    </div>
    <!-- end add -->
    
    <div class="app-content-actions">
      <input class="search-bar" placeholder="...ابحث" type="text">
      <div class="app-content-actions-wrapper">
        <!-- filter -->
        <div class="filter-button-wrapper">
          <button class="action-button filter jsFilter"><span>Filter</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg></button>
          <div class="filter-menu">
            <label>الدليل السياحي</label>
            <select>
              <option>All</option>
              <option>Furniture</option>       
              <option>Decoration</option>
              <option>Kitchen</option>
              <option>Bathroom</option>
            </select>
          
            <div class="filter-menu-buttons">

              <button class="filter-button apply">
                أوافق
              </button>
            </div>
          </div>
        </div>
        <!-- end filter -->
        <button class="action-button list" title="عرض جدول">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
        </button>
        <button class="action-button grid" title="عرض لائحة">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        </button>
        
        <div class="nav-item dropdown" >
                            <button class="action-button list dropdown-toggle" data-toggle="dropdown" title="ترجمة">  <i class="fas fa-globe "  ></i> </button>
                           
                            <div class="dropdown-menu border-0 rounded-0 m-0 toggle">
                                <a href="{{route('groupe_ar')}}"  class="dropdown-item"> العربية</a>
                                <a href="{{route('groupe_en')}}" class="dropdown-item">الانجليزية </a>
                    
                            </div>
                        </div>
        <button class="mode-switch" title="تبديل الثيم" style="margin-left:5px;">
        <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
          <defs></defs>
          <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
        </svg>
      </button>
      </div>
    </div>
    <div class="scroll-class">
    <div class="products-area-wrapper tableView">
      <div class="products-header">
        <div class="product-cell">#</div>
        <div class="product-cell">الدليل السياحي</div>
        <div class="product-cell">مدة الرحلة </div>
        <div class="product-cell">وصف</div>
        <div class="product-cell"> عدد الأشخاص</div>
        <div class="product-cell">الكلفة</div>
        <div class="product-cell ">الأحداث</div>

      </div>
      <div id="groups-data">

      </div>
      </div>
      </div>
    </div>
  </div>
@endsection

<script>
 
  function addGroup(formId){
      $("#add-group-btn").attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
      var formData = new FormData(document.getElementById('add-form'));
      $.ajax({
          url: "{{route('addGroupAr')}}" ,
          type: "POST",
          data: formData,
          processData: false, 
          cache: false,
          contentType: false,
      })
      .done(function(data){   
          $("#groups-data").empty();
          $("#groups-data").append(data);
          $('.close').click();
          $('.parenttrue').attr("hidden", false);
          // clearInput();
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
          $("#add-category-btn").attr("disabled", false).html('حفظ');
      });
  }
  //----------------------------------------------------------

  function editCategory(formId, id){

      $("#edit-category-btn-"+id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
      var formData = new FormData(document.getElementById(formId));
      formData.append('id', id);
      $.ajax({
          url: `{{route('editCategoryAr')}}` ,
          type: "POST",
          data: formData,
          processData: false, 
          cache: false,
          contentType: false,
      })
      .done(function(data){   
        
          $("#categories-data").empty();
          $("#categories-data").append(data);
          $('.close').click();
          $('.parenttrue').attr("hidden", false);
          // clearInput();
      })
      .fail(function(data){
        removeMessages();
          // $('.close').click();
          // $('.parent').attr("hidden", false);
          if(data.responseJSON.errors.name_ar){
            document.querySelector(`#${formId} .name_ar_error_edit`).innerHTML = data.responseJSON.errors.name_ar[0]; 

          }
          if(data.responseJSON.errors.name_en){
            console.log(document.querySelector(`#${formId} .name_en_error_edit`));

            document.querySelector(`#${formId} .name_en_error_edit`).innerHTML = data.responseJSON.errors.name_en[0]; 

          }

      })
      .always(function() {
          // Re-enable the submit button and hide the loading spinner
          $("#edit-category-btn-"+id).attr("disabled", false).html('حفظ');
      });
  }

  //---------------------------------------------------------------
  function deleteCategory(formId, id){
      $("#delete-category-btn-"+id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');

      var formData = new FormData(document.getElementById(formId));
      $.ajax({
          url: `{{route('deleteCategoryAr')}}` ,
          type: "POST",
          data: formData,
          processData: false, 
          cache: false,
          contentType: false,
      })
      .done(function(data){   
          $("#categories-data").empty();
          $("#categories-data").append(data);
          $('.close').click();
          $('.parenttrue').attr("hidden", false);
          // clearInput();
      })
      .fail(function(){
        $('.close').click();
          $('.parent').attr("hidden", false);

      })
      .always(function() {
          // Re-enable the submit button and hide the loading spinner
          $("#delete-category-btn-"+id).attr("disabled", false).html('نعم');
      });
  }

  //---------------------------------------------------------------
  window.onload = (event) => {
      $.ajax({
          url: "{{route('getGroupsAr')}}" ,
          type: "GET",
          processData: false, 
          cache: false,
          contentType: false,
      }) 
      .done(function(data){
          $("#groups-data").append(data);
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
      filter = input.value;
      table = document.getElementById("categoriesTable");
      // tr = table.getElementsByTagName("tr");
      tr = table.getElementsByClassName("products-row");
      // Loop through all table rows, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByClassName("search-value");
              
          if (td) {
              txtValue = td[0].textContent || td[0].innerText;
              if(txtValue){

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
function setGuide(guide_id, guide, option_id) {
  var guides_options = document.querySelectorAll('[id^="guide_"]');
  guides_options.forEach(option => {
    option.style.setProperty("color", "#1f1c2e", "important");
    
  });
  document.getElementById('guide-name').innerHTML  = guide;
  document.getElementById(option_id).style.setProperty("color", "#EB455F", "important");
  document.getElementById('guide_id').value = `${guide_id}`;
}
//--------------------------------------------


</script>


