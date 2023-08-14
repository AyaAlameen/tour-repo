@extends('adminLayout-Ar.master')
@section('admincontent')

<div class="app-content">
    <div class="app-content-header" style="width:74%;">
      <h1 class="app-content-headerText">الدليل السياحي</h1>
      
            <!-- add -->
<button type="button" class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#exampleModal3">
إضافة دليل سياحي
</button>

<!-- Modal -->
<div class="modal fade " data-bs-backdrop="static" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModal3Label" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content toggle">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal3Label">دليل سياحي جديد</h5>
        <button type="button" class="btn-close m-0 close" onclick="removeMessages(), document.getElementById('add-form').reset()" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="add-form" action="" method="post" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
      <table style=" width: 400px;" class="table-striped table-hover table-bordered m-auto text-primary myTable" >
      
              <tr>
                  <td ><input type="text" class="toggle text-primary in" name="name_ar" required style="width: 100%;"></th>   
                  <td>الاسم(العربية)</td>   
              </tr>  
              
              <tr>       
                <td colspan="2" class="text-end text-danger p-1"><span id="name_ar_error"></span></td>                
              </tr> 
              <tr>
                 <td ><input type="text" class="toggle text-primary in" name="name_en" required style="width: 100%;"></th>   
                 <td>(الإنجليزية)الاسم </td>   
             </tr> 
             
             <tr>       
                <td colspan="2" class="text-end text-danger p-1"><span id="name_en_error"></span></td>                
              </tr> 
              <tr>
                  <td>  <input type="file" id="add_input_0"
                    onchange="previewImage(this, 'add_previewImage_0')" class="toggle text-primary in"
                    name="event_image" required style="width:75% !important; font-size:16px;">
                <label for="add_input_0"> <img id="add_previewImage_0" width="170px"
                        height="90px" style="display: none; padding:6px;"></label></td>    
                  <td >الصورة </td>  
              </tr> 
               
              <tr>       
                <td colspan="2" class="text-end text-danger p-1"><span id="image_error"></span></td>                
              </tr> 
              <tr>
                  <td ><input class="toggle text-primary in" type="number" name="phone" required style="width: 100%;"></th> 
                  <td>الهاتف</td>     
              </tr>
                  
              <tr>       
                <td colspan="2" class="text-end text-danger p-1"><span id="phone_error"></span></td>                
              </tr> 
              <tr>
                  <td ><input class="toggle text-primary in" type="email" name="email" required style="width: 100%;"></th>
                  <td>الايميل</td>      
              </tr>  
              
              <tr>       
                <td colspan="2" class="text-end text-danger p-1"><span id="email_error"></span></td>                
              </tr> 
              <tr>
                  <td ><input class="toggle text-primary in" type="number" name="salary" required style="width: 100%;"></th>  
                  <td>الراتب</td>    
              </tr>
              
              <tr>       
                <td colspan="2" class="text-end text-danger p-1"><span id="salary_error"></span></td>                
              </tr> 
              <tr>
                  <td ><textarea class="toggle text-primary in mt-2"  name="description_ar" style="width: 100%; height:27.5px;"></textarea></th> 
                  <td>المهارات(العربية)</td>     
              </tr>
              <tr>       
                <td colspan="2" class="text-end text-danger p-1"><span id="description_ar_error"></span></td>                
              </tr>

              <tr>
                  <td ><textarea class="toggle text-primary in mt-2"  name="description_en" style="width: 100%; height:27.5px;"></textarea></th> 
                  <td>(الانكليزية)المهارات</td>     
              </tr>
              <tr>       
                <td colspan="2" class="text-end text-danger p-1"><span id="description_en_error"></span></td>                
              </tr>
              

              <tr>
                  <td ><textarea class="toggle text-primary in mt-2"  name="certificates_ar" style="width: 100%; height:27.5px;"></textarea></th> 
                  <td>(العربية)الشهادات</td>     
              </tr>
              <tr>       
                <td colspan="2" class="text-end text-danger p-1"><span id="certificates_ar_error"></span></td>                
              </tr>

              <tr>
                  <td ><textarea class="toggle text-primary in mt-2"  name="certificates_en" style="width: 100%; height:27.5px;"></textarea></th> 
                  <td>(الإنجليزية)الشهادات</td>     
              </tr>
              <tr>       
                <td colspan="2" class="text-end text-danger p-1"><span id="certificates_en_error"></span></td>                
              </tr>
             
      </table>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="action-button active close" onclick="removeMessages(), document.getElementById('add-form').reset()" data-bs-dismiss="modal">إغلاق</button>
        <button type="button" id="add-guide-btn" onclick="addGuide('add-form')" class="app-content-headerButton">حفظ</button>
      </div>
    </div>
  </div>
</div>
    </div>
    <!-- end add -->
  
    <div class="app-content-actions" style="width:75%;">
      <input class="search-bar" onkeyup="searchFunction()" id="search" placeholder="... ابحث عن طريق الاسم" type="text">
      <div class="app-content-actions-wrapper">

       
        <div class="nav-item dropdown" >
                            <button class="action-button list dropdown-toggle" data-bs-toggle="dropdown" title="ترجمة">  <i class="fas fa-globe "  ></i> </button>
                           
                            <div class="dropdown-menu border-0 rounded-0 m-0 toggle">
                                <a href="{{route('tourist_guide_ar')}}"  class="dropdown-item"> العربية</a>
                                <a href="{{route('tourist_guide_en')}}" class="dropdown-item">الانجليزية </a>
                    
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
    <div class="scroll-class" style="width:75%;">
    <div class="products-area-wrapper tableView" id="guidesTable">
      <div class="products-header">
        <div class="product-cell">#</div>
        <div class="product-cell">الاسم</div>
        <div class="product-cell image ">الصورة</div>
        <div class="product-cell">الهاتف</div>
        <div class="product-cell">الايميل</div>
        <div class="product-cell">الراتب</div>
        <div class="product-cell">المهارات</div>
        <div class="product-cell">الشهادات</div>
        <div class="product-cell ">الأحداث</div>
      </div>
      <div id="guides-data">

      
      </div>
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
            url: "{{route('addTouristGuideAr')}}" ,
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
            if(data.responseJSON.errors.phone){
                document.querySelector(`#${formId} #phone_error`).innerHTML = data.responseJSON.errors.phone[0]; 
            }
            if(data.responseJSON.errors.email){
                document.querySelector(`#${formId} #email_error`).innerHTML = data.responseJSON.errors.email[0]; 
            }
            if(data.responseJSON.errors.salary){
                document.querySelector(`#${formId} #salary_error`).innerHTML = data.responseJSON.errors.salary[0]; 
            }

        })
        .always(function() {
            // Re-enable the submit button and hide the loading spinner
            $("#add-guide-btn").attr("disabled", false).html('حفظ');
        });
    }
    //----------------------------------------------------------

    function editGuide(formId, id){

        $("#edit-guide-btn-"+id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById(formId));
        formData.append('id', id);
        $.ajax({
            url: `{{route('editTouristGuideAr')}}` ,
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
        .fail(function(data){
            removeMessages();
            // $('.close').click();
            // $('.parent').attr("hidden", false);
            if(data.responseJSON.errors.name_ar){
                document.querySelector(`#${formId} .name_ar_error_edit`).innerHTML = data.responseJSON.errors.name_ar[0]; 
            }
            if(data.responseJSON.errors.name_en){
                document.querySelector(`#${formId} .name_en_error_edit`).innerHTML = data.responseJSON.errors.name_en[0]; 
            }
            if(data.responseJSON.errors.phone){
                document.querySelector(`#${formId} .phone_error_edit`).innerHTML = data.responseJSON.errors.phone[0]; 
            }
            if(data.responseJSON.errors.email){
                document.querySelector(`#${formId} .email_error_edit`).innerHTML = data.responseJSON.errors.email[0]; 
            }
            if(data.responseJSON.errors.salary){
                document.querySelector(`#${formId} .salary_error_edit`).innerHTML = data.responseJSON.errors.salary[0]; 
            }
        })
        .always(function() {
            // Re-enable the submit button and hide the loading spinner
            $("#edit-guide-btn-"+id).attr("disabled", false).html('حفظ');
        });
    }

    //---------------------------------------------------------------
    function deleteGuide(formId, id){
        $("#delete-guide-btn-"+id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');

        var formData = new FormData(document.getElementById(formId));
        $.ajax({
            url: `{{route('deleteTouristGuideAr')}}` ,
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
            $("#delete-guide-btn-"+id).attr("disabled", false).html('نعم');
        });
    }

    //---------------------------------------------------------------
    window.onload = (event) => {
        $.ajax({
            url: "{{route('getTouristGuideAr')}}" ,
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
        filter = input.value;
        table = document.getElementById("guidesTable");
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
    
//----------------------------------------------
    function removeMessages(){
        document.getElementById('name_ar_error').innerHTML = ''; 
        document.getElementById('name_en_error').innerHTML = ''; 
        document.getElementById('image_error').innerHTML = ''; 
        document.getElementById('salary_error').innerHTML = ''; 
        document.getElementById('phone_error').innerHTML = ''; 
        document.getElementById('email_error').innerHTML = ''; 

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

        const emails = document.querySelectorAll('.email_error_edit');
        emails.forEach(email => {
            email.innerHTML = '';
        });

        const salaries = document.querySelectorAll('.salary_error_edit');
        salaries.forEach(salary => {
            salary.innerHTML = '';
        });

        const phones = document.querySelectorAll('.phone_error_edit');
        phones.forEach(phone => {
            phone.innerHTML = '';
        });
    }
//--------------------------------------------
</script>
