@extends('adminLayout-Ar.master')
@section('admincontent')

<div class="app-content">
    <div class="app-content-header w-100">
      <h1 class="app-content-headerText">وسائل النقل</h1>
      <h3 class="app-content-headerText ">"{{$company->translations()->where('locale', 'ar')->first()->name}}"</h3>

        <!-- add -->
<button type="button" class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#exampleModal3">
إضافة وسيلة نقل
</button>

<!-- Modal -->
<div class="modal fade " id="exampleModal3" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModal3Label" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content toggle">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal3Label">وسيلة نقل جديدة</h5>
        <button type="button" class="btn-close m-0 close" onclick="removeMessages(), document.getElementById('add-form').reset()" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="add-form" action="" method="post" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
      <table style="color: rgb(22, 22, 22); width: 400px;" class="table-striped table-hover table-bordered m-auto text-primary myTable" >

              <input type="text" class="toggle text-primary in" hidden name="transport_company_id" value="{{$company->id}}" required style="width: 100%;">
        
              <tr>
                  
                  <td ><input class="toggle text-primary in" type="number" name="carId"  required style="width: 100%;"></td> 
                  <td>رقم السيارة</td>     
              </tr>
              <tr>       
                <td colspan="2" class="text-end text-danger p-1"><span id="carId_error"></span></td>                
              </tr> 
              <tr>
                <td ><div class="dropdown toggle text-primary in" style="display:inline-block; ;">
                  
                <label  class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">  
                  
                </label>
                <span id="city-name"></span>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  @foreach ($cities as $city)
                    <option style="cursor: pointer;" class="dropdown-item" value="{{$city->id}}" id="city_{{$city->id}}" onclick="setCity({{$city->id}}, '{{$city->translations()->where('locale', 'ar')->first()->name}}', 'city_{{$city->id}}')" href="#">{{$city->translations()->where('locale', 'ar')->first()->name}}</option>
                  @endforeach
                  <input type="text" id="city_id" name="city_id" hidden>
               
                </div>
              </div></td>    
              <td>المحافظة</td>  
            </tr>
            <tr>       
              <td colspan="2" class="text-end text-danger p-1"><span id="city_error"></span></td>                
            </tr> 
              <tr>
                  
                  <td ><input class="toggle text-primary in" name="passengers_number" type="number"  required style="width: 100%;"></td> 
                  <td>عدد الركاب</td>     
              </tr>
              <tr>       
                <td colspan="2" class="text-end text-danger p-1"><span id="passengers_number_error"></span></td>                
              </tr> 
            
                  <tr>
                  <td ><input class="toggle text-primary in" type="text" name="description_ar" required style="width: 100%;"></td>  
                  <td>المواصفات(العربية)</td>    
              </tr> 
              <tr>
                  
                  <td ><input class="toggle text-primary in" type="text" name="description_en" required style="width: 100%;"></td>  
                  <td>(الإنجليزية)المواصفات</td>    
              </tr>
           
              

 
      </table>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="action-button active close" onclick="removeMessages(), document.getElementById('add-form').reset()" data-bs-dismiss="modal">إغلاق</button>
        <button type="button" id="add-transportation-btn" onclick="addTransportation('add-form')" class="app-content-headerButton">حفظ</button>
      </div>
    </div>
  </div>
</div>
    </div>
    <!-- end add -->
    
    <div class="app-content-actions w-100">
      <input class="search-bar" placeholder="...ابحث" type="text">
      <div class="app-content-actions-wrapper">
   
        <button class="action-button list" title="عرض جدول">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
        </button>
        <button class="action-button grid" title="عرض لائحة">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        </button>
        
        <div class="nav-item dropdown" >
                            <button class="action-button list dropdown-toggle" data-bs-toggle="dropdown" title="ترجمة">  <i class="fas fa-globe "  ></i> </button>
                           
                            <div class="dropdown-menu border-0 rounded-0 m-0 toggle">
                                <a href="{{route ('getTransportationsAr', ['id' => $company->id])}}"  class="dropdown-item"> العربية</a>
                                <a href="{{route ('getTransportationsEn', ['id' => $company->id])}}" class="dropdown-item">الانجليزية </a>
                    
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

    <div class="products-area-wrapper tableView" style="direction:rtl;">
      <div class="products-header">
        <div class="product-cell">#</div>
        <div class="product-cell">رقم السيارة</div>
        <div class="product-cell ">المحافظة</div>
        <div class="product-cell">عدد الركاب</div>
        <div class="product-cell">المواصفات</div>
        <div class="product-cell ">الأحداث</div>

      </div>
		<div id="transportations-data">
        <?php $i = 1 ?>
        @foreach($transportations as $transportation)
			<div class="products-row">
				<div class="product-cell">
					<span>{{$i++}}</span>
				</div>
				<div class="product-cell">
					<span>{{$transportation->carId}}</span>
				</div>
				<div class="product-cell">
					<span>{{$transportation->city->translations()->where('locale', 'ar')->first()->name}}</span>
				</div>
				<div class="product-cell">
					<span>{{$transportation->passengers_number}}</span>
				</div>
				<div class="product-cell">
					<span> {{$transportation->translations()->where('locale', 'ar')->first()->description}} </span>
				</div>
				<div class="product-cell">
					<!-- start action -->
					<div class="p-3">
						<!-- edit -->
						<a href="#" class="edit p-2" data-toggle="modal" data-target="#editTransportation{{$transportation->id}}" title="Edit"><i class="fas fa-pen"></i></a>
                        <!-- Modal -->
						<div class="modal fade" data-backdrop="static" id="editTransportation{{$transportation->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content"  style="direction:ltr;">
									<div class="modal-header">
										<button type="button" class="close"  onclick="removeMessages()" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form id="edit-form-{{$transportation->id}}" action="" method="POST" enctype="multipart/form-data">
										@csrf
										<input type="text" hidden name="transport_company_id" class="toggle text-primary in" value="{{$company->id}}">

									<div class="modal-body">
										<table class="table-striped table-hover table-bordered m-auto text-primary myTable" style="width: 400px;"> 
											<tr>   
												<td ><input type="number" name="carId" class="toggle text-primary in" value="{{$transportation->carId}}"></td>  
												<td>رقم السيارة</td>
											</tr> 
											<tr>
												<td colspan="2"><span style="color: red" class="carId_error_edit"></span></td>
											  </tr>


											<tr>
												<td ><div class="dropdown toggle text-primary in" style="display:inline-block; ;">
												  
												<label  class="dropdown-toggle" type="button" id="dropdownMenuButtonEdit{{$transportation->id}}" data-toggle="dropdown" aria-expanded="false">  
												  
												</label>
												<span id="city-name-{{$transportation->id}}">{{$transportation->city->translations()->where('locale', 'ar')->first()->name}}</span>
												<div class="dropdown-menu" aria-labelledby="dropdownMenuButtonEdit{{$transportation->id}}">
												  @foreach ($cities as $city)
													<option style="cursor: pointer; @if($city->id == $transportation->city_id) color: #EB455F !important; @endif" class="dropdown-item" value="{{$city->id}}" id="edit_city_{{$transportation->id}}_{{$city->id}}" onclick="setEditCity({{$city->id}}, {{$transportation->id}}, '{{$city->translations()->where('locale', 'ar')->first()->name}}', 'edit_city_{{$transportation->id}}_{{$city->id}}')" href="#">{{$city->translations()->where('locale', 'ar')->first()->name}}</option>
												  @endforeach
												  <input type="text" id="edit_city_id_{{$transportation->id}}" name="city_id" value="{{$transportation->city_id}}" hidden>
											  
												</div>
											  </div></td>    
											  <td>المحافظة</td>  
											</tr>
											<tr>
												<td colspan="2"><span style="color: red" class="city_error_edit"></span></td>
											  </tr>

											<tr>   
												<td ><input type="number" class="toggle text-primary in" name="passengers_number" value="{{$transportation->passengers_number}}"></td>  
												<td>عدد الركاب</td>
											</tr> 
											<tr>
												<td colspan="2"><span style="color: red" class="passengers_number_error_edit"></span></td>
											  </tr>  
											<tr>
												<td ><input class="toggle text-primary in" name="description_ar" type="text" value="{{$transportation->translations()->where('locale', 'ar')->first()->description}}"  required style="width: 100%;"></th>  
												<td>المواصفات(العربية)</td>    
											</tr> 
											<tr>
												<td ><input class="toggle text-primary in" name="description_en" type="text" value="{{$transportation->translations()->where('locale', 'en')->first()->description}}"  required style="width: 100%;"></th>  
												<td>(الانكليزية)المواصفات</td>    
											</tr>
										</table>
									</div>
									</form>
									<div class="modal-footer">
										<button type="button" class="action-button active close" onclick="removeMessages()" data-dismiss="modal">إغلاق</button>
										<button type="submit" id="edit-transportation-btn-{{$transportation->id}}" onclick="editTransportation('edit-form-{{$transportation->id}}', {{$transportation->id}})" class="app-content-headerButton">حفظ التغييرات</button>
									</div>
								</div>
							</div>
						</div>
						<!-- end edit -->

						<!-- delete -->
						<a href="#" class="delete" data-toggle="modal" data-target="#deleteCompany{{$transportation->id}}" title="Delete" data-toggle="tooltip"><i class="fas fa-trash"></i></a>
						<!-- Modal -->
						<div class="modal fade" id="deleteCompany{{$transportation->id}}" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content"  style="direction:ltr;">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form id="delete-form-{{$transportation->id}}" action="" method="POST" enctype="multipart/form-data">
										@csrf
										<input type="text" name="id" value="{{$transportation->id}}" hidden>
										<input type="text" name="transport_company_id" value="{{$company->id}}" hidden>
										<div class="modal-body"  style="direction:rtl;">
											هل أنت متأكد من أنك تريد حذف وسيلة النقل ذات الرقم (<span style="color: #EB455F;">{{$transportation->carId}}</span>) ؟
										</div>
										<div class="modal-footer">
											<button type="button" class="action-button active close" data-dismiss="modal">إغلاق</button>
											<button type="submit" id="delete-transportation-btn-{{$transportation->id}}" onclick="deleteTransportation(`delete-form-{{$transportation->id}}`, {{$transportation->id}})" class="app-content-headerButton">نعم</button>
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
		@endforeach
      </div>
      </div>
	</div>
    </div>
  </div>
@endsection


<script>
  function addTransportation(formId){
      $("#add-transportation-btn").attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
      var formData = new FormData(document.getElementById('add-form'));
      $.ajax({
          url: "{{route('addTransportationAr')}}" ,
          type: "POST",
          data: formData,
          processData: false, 
          cache: false,
          contentType: false,
      })
      .done(function(data){   
          $("#transportations-data").empty();
          $("#transportations-data").append(data);
          $('.close').click();
          $('.parenttrue').attr("hidden", false);
          document.getElementById(formId).reset();

      })
      .fail(function(data){
        // $('.close').click();
        // $('.parent').attr("hidden", false);
        removeMessages();
        
        if(data.responseJSON.errors.carId){
            document.querySelector(`#${formId} #carId_error`).innerHTML = data.responseJSON.errors.carId[0]; 

          }
          if(data.responseJSON.errors.city_id){

            document.querySelector(`#${formId} #city_error`).innerHTML = data.responseJSON.errors.city_id[0]; 

          }
          if(data.responseJSON.errors.passengers_number){

            document.querySelector(`#${formId} #passengers_number_error`).innerHTML = data.responseJSON.errors.passengers_number[0]; 

          }

      })
      .always(function() {
          // Re-enable the submit button and hide the loading spinner
          $("#add-transportation-btn").attr("disabled", false).html('حفظ');
      });
  }
  //----------------------------------------------------------

  function editTransportation(formId, id){

      $("#edit-transportation-btn-"+id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
      var formData = new FormData(document.getElementById(formId));
      formData.append('id', id);
      $.ajax({
          url: `{{route('editTransportationAr')}}` ,
          type: "POST",
          data: formData,
          processData: false, 
          cache: false,
          contentType: false,
      })
      .done(function(data){   
          $("#transportations-data").empty();
          $("#transportations-data").append(data);
          $('.close').click();
          $('.parenttrue').attr("hidden", false);
      })
      .fail(function(data){
        removeMessages();
          // $('.close').click();
          // $('.parent').attr("hidden", false);
          if(data.responseJSON.errors.carId){
            document.querySelector(`#${formId} .carId_error_edit`).innerHTML = data.responseJSON.errors.carId[0]; 

          }
          if(data.responseJSON.errors.city_id){

            document.querySelector(`#${formId} .city_error_edit`).innerHTML = data.responseJSON.errors.city_id[0]; 

          }
          if(data.responseJSON.errors.passengers_number){

            document.querySelector(`#${formId} .passengers_number_error_edit`).innerHTML = data.responseJSON.errors.passengers_number[0]; 

          }

      })
      .always(function() {
          // Re-enable the submit button and hide the loading spinner
          $("#edit-transportation-btn-"+id).attr("disabled", false).html('حفظ');
      });
  }

  //---------------------------------------------------------------
  function deleteTransportation(formId, id){
      $("#delete-transportation-btn-"+id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');

      var formData = new FormData(document.getElementById(formId));
      $.ajax({
          url: `{{route('deleteTransportationAr')}}` ,
          type: "POST",
          data: formData,
          processData: false, 
          cache: false,
          contentType: false,
      })
      .done(function(data){   
          $("#transportations-data").empty();
          $("#transportations-data").append(data);
          $('.close').click();
          $('.parenttrue').attr("hidden", false);
      })
      .fail(function(){
        $('.close').click();
        $('.parent').attr("hidden", false);
      })
      .always(function() {
          // Re-enable the submit button and hide the loading spinner
          $("#delete-transportation-btn-"+id).attr("disabled", false).html('نعم');
      });
  }

  //---------------------------------------------------------------
  // window.onload = (event) => {
  //     $.ajax({
  //         url: "{{route('getCategoriesAr')}}" ,
  //         type: "GET",
  //         processData: false, 
  //         cache: false,
  //         contentType: false,
  //     }) 
  //     .done(function(data){
  //         $("#categories-data").append(data);
  //     })
  //     .fail(function(){
  //     $('.parent').attr("hidden", false);

  //     });
  // };
     //--------------------------------------------------------

     function searchFunction() {
      // Declare variables
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("search");
      filter = input.value;
      table = document.getElementById("subCategoriesTable");
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
//--------------------------------------------
function removeMessages(){
  document.getElementById('carId_error').innerHTML = ''; 
  document.getElementById('city_error').innerHTML = ''; 
  document.getElementById('passengers_number_error').innerHTML = ''; 

  const carId = document.querySelectorAll('.carId_error_edit');
  carId.forEach(id => {
    id.innerHTML = '';
  });

  const cities = document.querySelectorAll('.city_error_edit');
  cities.forEach(city => {
    city.innerHTML = '';
  });

  const numbers = document.querySelectorAll('.passengers_number_error_edit');
  numbers.forEach(number => {
    number.innerHTML = '';
  });
}
//--------------------------------------------
function setCity(city_id, city, option_id) {
  var cities_options = document.querySelectorAll('[id^="city_"]');
  cities_options.forEach(option => {
    option.style.setProperty("color", "#1f1c2e", "important");
    
  });
  document.getElementById('city-name').innerHTML  = city;
  document.getElementById(option_id).style.setProperty("color", "#EB455F", "important");
  document.getElementById('city_id').value = `${city_id}`;
}
//--------------------------------------------
function setEditCity(city_id, transportation_id, city, option_id) {
  var cities_options = document.querySelectorAll('[id^="edit_city_"]');
  cities_options.forEach(option => {
    option.style.setProperty("color", "#1f1c2e", "important");
    
  });
  document.getElementById('city-name-' + transportation_id).innerHTML  = city;
  document.getElementById(option_id).style.setProperty("color", "#EB455F", "important");
  document.getElementById('edit_city_id_' + transportation_id).value = `${city_id}`;
}
//--------------------------------------------
</script>