@extends('adminLayout-Ar.master')
@section('admincontent')

<div class="app-content">
    <div class="app-content-header w-100">
      <h1 class="app-content-headerText">النواحي</h1>
    <h3 class="app-content-headerText">"{{$city->translations()->where('locale', 'ar')->first()->name}}"</h3>
      

          <!-- add -->
<button type="button" class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#exampleModal3">
 إضافة ناحية
</button>

<!-- Modal -->
<div class="modal fade " data-bs-backdrop="static" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModal3Label" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content toggle">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal3Label">ناحية جديدة</h5>
        <button type="button" class="btn-close m-0 close" onclick="removeMessages(), document.getElementById('add-form').reset()" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="add-form" action="" method="post" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
      <table style="color: rgb(22, 22, 22); width: 400px; " class="table-striped table-hover table-bordered m-auto text-primary myTable" >
       
      <input type="text" hidden="true" name="city_id" class="toggle text-primary in" value="{{$city->id}}">

              <tr>
                        
                  <td ><input class="toggle text-primary in" type="text" name="name_ar" required style="width: 100%;"></th>  
                 <td style="width: 35%;">الاسم(العربية)</td>  
              </tr>  
              <tr>       
                <td colspan="2" class="text-end text-danger p-1"><span id="name_ar_error"></span></td>                
              </tr> 
              <tr>
                 
                  <td ><input type="text" class="toggle text-primary in" name="name_en" required style="width: 100%;"></td> 
                  <td style="width: 35%;">الاسم(الإنجليزية)</td> 
              </tr>
              <tr>       
                <td colspan="2" class="text-end text-danger p-1"><span id="name_en_error"></span></td>                
              </tr>
                
      </table>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="action-button active close" onclick="removeMessages(), document.getElementById('add-form').reset()" data-bs-dismiss="modal">إغلاق</button>
        <button type="button" id="add-district-btn" onclick="addDistrict('add-form')" class="app-content-headerButton">حفظ</button>
      </div>
    </div>
  </div>
</div>
    </div>
    <!-- end add -->
    
    <div class="app-content-actions w-100">
      <input class="search-bar" onkeyup="searchFunction()" id="search" placeholder="... ابحث عن طريق الاسم" type="text">
      <div class="app-content-actions-wrapper">

        
        
        <div class="nav-item dropdown" >
                            <button class="action-button list dropdown-toggle" data-bs-toggle="dropdown" title="ترجمة">  <i class="fas fa-globe "  ></i> </button>
                           
                            <div class="dropdown-menu border-0 rounded-0 m-0 toggle">
                                <a href="{{route ('getDistrictsAr', ['id' => $city->id])}}"  class="dropdown-item"> العربية</a>
                                <a href="{{route ('getDistrictsEn', ['id' => $city->id])}}" class="dropdown-item">الانجليزية </a>
                    
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
    <div class="products-area-wrapper tableView" id="districtsTable" style="direction:rtl;">
      <div class="products-header">
        <div class="product-cell">#</div>
        <div class="product-cell">الاسم</div>
        <div class="product-cell ">الأحداث</div>
      </div>
      <div id="districts-data">
        <?php $i = 1 ?>
      @foreach($districts as $district)
      <div class="products-row">
        <button class="cell-more-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
          <div class="product-cell">
            <span> {{$i++}}</span>
          </div>
          <div class="product-cell">
            <span class="search-value"> {{$district->translations()->where('locale', 'ar')->first()->name}}</span>
          </div>
            <div class="product-cell">
     <!-- start action -->
<div class="p-3">

                 <!-- delete -->
                 <a href="#" class="delete" data-toggle="modal" data-target="#deleteDistrict{{$district->id}}" title="Delete" data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                              <!-- Modal -->
                              <div class="modal fade" id="deleteDistrict{{$district->id}}" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content" style="direction:ltr;">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form id="delete-form-{{$district->id}}" action="" method="POST" enctype="multipart/form-data">
                                        @csrf
                                          <input type="text" name="id" value="{{$district->id}}" hidden>
                                          <input type="text" name="city_id" value="{{$city->id}}" hidden>

                                          <div class="modal-body">
                                          هل أنت متأكد من أنك تريد حذف هذه الناحية (<span style="color: #EB455F;">{{$district->translations()->where('locale', 'ar')->first()->name}}</span>) ؟
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="action-button active close" data-dismiss="modal">إغلاق</button>
                                            <button type="submit" id="delete-district-btn-{{$district->id}}" onclick="deleteDistrict(`delete-form-{{$district->id}}`, {{$district->id}})" class="app-content-headerButton">نعم</button>
                                          </div>
                                    </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <!-- end delete -->

                     <!-- edit -->
                     <a href="#" class="edit" data-toggle="modal" data-target="#editDistrict{{$district->id}}" title="Edit"><i class="fas fa-pen"></i></a>

                          <!-- Modal -->
                     <div class="modal fade" data-backdrop="static" id="editDistrict{{$district->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                       <div class="modal-dialog">
                         <div class="modal-content" style="direction:ltr;">
                           <div class="modal-header">
                             <button type="button" class="close" onclick="removeMessages()" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                           <form id="edit-form-{{$district->id}}" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                           <div class="modal-body">
                           <table class="table-striped table-hover table-bordered m-auto text-primary myTable" style="width: 400px;"> 
                              <input type="text" hidden name="city_id" class="toggle text-primary in" value="{{$city->id}}">
                              <tr>
                                  <td ><input class="toggle text-primary in" type="text" name="name_ar" required style="width: 100%;" value="{{$district->translations()->where('locale', 'ar')->first()->name}}"></th>  
                                  <td style="width: 35%;">الاسم(العربية)</td>    
                                </tr>   
                                <tr>       
                                  <td colspan="2" class="text-end text-danger p-1"><span class="name_ar_error_edit"></span></td>                
                                </tr>
                                <tr>
                                  <td ><input type="text" class="toggle text-primary in" name="name_en" required style="width: 100%;" value="{{$district->translations()->where('locale', 'en')->first()->name}}"></td> 
                                  <td style="width: 35%;" >الاسم(الانكليزي)</td>     
                                </tr> 
                                <tr>       
                                  <td colspan="2" class="text-end text-danger p-1"><span class="name_en_error_edit"></span></td>                
                                </tr>
                            </table>
                          </div>
                        </form>
                           <div class="modal-footer">
                <button type="button" class="action-button active close" onclick="removeMessages()" data-dismiss="modal">إغلاق</button>
                             <button type="submit" id="edit-district-btn-{{$district->id}}" onclick="editDistrict('edit-form-{{$district->id}}', {{$district->id}})" class="app-content-headerButton">حفظ التغييرات</button>
                           </div>
                         </div>
                       </div>
                       </div>
                     <!-- end edit -->
   
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
    function addDistrict(formId){
        $("#add-district-btn").attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById('add-form'));
        $.ajax({
            url: "{{route('addDistrictAr')}}" ,
            type: "POST",
            data: formData,
            processData: false, 
            cache: false,
            contentType: false,
        })
        .done(function(data){   
            $("#districts-data").empty();
            $("#districts-data").append(data);
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
            $("#add-district-btn").attr("disabled", false).html('حفظ');
        });
    }
    //----------------------------------------------------------

    function editDistrict(formId, id){

        $("#edit-district-btn-"+id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById(formId));
        formData.append('id', id);
        $.ajax({
            url: `{{route('editDistrictAr')}}` ,
            type: "POST",
            data: formData,
            processData: false, 
            cache: false,
            contentType: false,
        })
        .done(function(data){   
            $("#districts-data").empty();
            $("#districts-data").append(data);
            $('.close').click();
            $('.parenttrue').attr("hidden", false);
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
            $("#edit-district-btn-"+id).attr("disabled", false).html('حفظ');
        });
    }

    //---------------------------------------------------------------
    function deleteDistrict(formId, id){
        $("#delete-district-btn-"+id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');

        var formData = new FormData(document.getElementById(formId));
        $.ajax({
            url: `{{route('deleteDistrictAr')}}` ,
            type: "POST",
            data: formData,
            processData: false, 
            cache: false,
            contentType: false,
        })
        .done(function(data){   
            $("#districts-data").empty();
            $("#districts-data").append(data);
            $('.close').click();
            $('.parenttrue').attr("hidden", false);
        })
        .fail(function(){
          $('.close').click();
          $('.parent').attr("hidden", false);
        })
        .always(function() {
            // Re-enable the submit button and hide the loading spinner
            $("#delete-district-btn-"+id).attr("disabled", false).html('نعم');
        });
    }

    //---------------------------------------------------------------
    function searchFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search");
        filter = input.value;
        table = document.getElementById("districtsTable");
        // tr = table.getElementsByTagName("tr");
        tr = table.getElementsByClassName("products-row");
        console.log(tr);
        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByClassName("search-value");
                
            if (td) {
                txtValue = td[0].textContent || td[0].innerText;
                console.log(i, td[0],td[0].textContent);
                if(txtValue){
                    console.log(txtValue, filter);

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
    document.getElementById('name_ar_error').innerHTML = ''; 
    document.getElementById('name_en_error').innerHTML = ''; 

    const name_ar = document.querySelectorAll('.name_ar_error_edit');
    name_ar.forEach(name => {
      name.innerHTML = '';
    });

    const name_en = document.querySelectorAll('.name_en_error_edit');
    name_en.forEach(name => {
      name.innerHTML = '';
    });

  }
//--------------------------------------------
</script>
