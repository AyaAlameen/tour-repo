@extends('adminLayout-Ar.master')
@section('admincontent')

<div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">شركات النقل</h1>
   
 <!-- add -->
<button type="button" class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#exampleModal3">
 إضافة شركة نقل
</button>

<!-- Modal -->
<div class="modal fade " id="exampleModal3" tabindex="-1" aria-labelledby="exampleModal3Label" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content toggle">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal3Label">شركة جديدة</h5>
        <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="add-form" action="" method="post" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
      <table style="width: 400px;" class="table-striped table-hover table-bordered m-auto text-primary myTable" >
     
              <tr>
                  <td ><input type="text" class="toggle text-primary in" name="name_ar" required style="width: 100%;"></th> 
                  <td>الاسم(العربية)</td>     
              </tr>  
              <tr>
                  <td ><input type="text" class="toggle text-primary in" name="name_en" required style="width: 100%;"></th> 
                  <td>(الإنجليزية)الاسم </td>     
              </tr> 
              <tr>
                 
                  <td ><input class="toggle text-primary in" type="email" name="email" required style="width: 100%;"></th>
                  <td>الايميل</td>      
              </tr>     
              <tr>
                 
                  <td ><input class="toggle text-primary in" type="number" name="phone" required style="width: 100%;"></th>   
                  <td>الهاتف</td>   
              </tr> 
      </table>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="action-button active close" data-bs-dismiss="modal">إغلاق</button>
        <button type="button" id="add-company-btn" onclick="addCompany('add-form')" class="app-content-headerButton">حفظ</button>
      </div>
    </div>
  </div>
</div>
    </div>
    <!-- end add -->
 
    <div class="app-content-actions">
      <input class="search-bar" onkeyup="searchFunction()" id="search" placeholder="... ابحث عن طريق الاسم" type="text">
      <div class="app-content-actions-wrapper">

        <button class="action-button list" title="عرض لائحة">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
        </button>
        <button class="action-button grid" title="عرض جدول">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        </button>
        
        <div class="nav-item dropdown" >
                            <button class="action-button list dropdown-toggle" data-toggle="dropdown" title="ترجمة">  <i class="fas fa-globe "  ></i> </button>
                           
                            <div class="dropdown-menu border-0 rounded-0 m-0 toggle">
                                <a href="{{route('transport_company_ar')}}"  class="dropdown-item"> العربية</a>
                                <a href="{{route('transport_company_en')}}" class="dropdown-item">الانجليزية </a>
                    
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
    <div class="products-area-wrapper tableView" id="companiesTable">
      <div class="products-header">
        <div class="product-cell">#</div>
        <div class="product-cell">الاسم</div>
        <div class="product-cell">الايميل</div>
        <div class="product-cell">الهاتف</div>
        <div class="product-cell ">الأحداث</div>
      </div>
      <div id="companies-data">
       
      </div>

      </div>
      </div>
    </div>
  </div>
@endsection

<script>
    function addCompany(formId){
        $("#add-company-btn").attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById('add-form'));
        $.ajax({
            url: "{{route('addTransportCompanyAr')}}" ,
            type: "POST",
            data: formData,
            processData: false, 
            cache: false,
            contentType: false,
        })
        .done(function(data){   
            $("#companies-data").empty();
            $("#companies-data").append(data);
            $('.close').click();
            $('.parenttrue').attr("hidden", false);

        })
        .fail(function(){
          $('.close').click();
            $('.parent').attr("hidden", false);


        })
        .always(function() {
            // Re-enable the submit button and hide the loading spinner
            $("#add-company-btn").attr("disabled", false).html('حفظ');
        });
    }
    //----------------------------------------------------------

    function editCompany(formId, id){

        $("#edit-company-btn-"+id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById(formId));
        formData.append('id', id);
        $.ajax({
            url: `{{route('editTransportCompanyAr')}}` ,
            type: "POST",
            data: formData,
            processData: false, 
            cache: false,
            contentType: false,
        })
        .done(function(data){   
            $("#companies-data").empty();
            $("#companies-data").append(data);
            $('.close').click();
            $('.parenttrue').attr("hidden", false);


        })
        .fail(function(){
          $('.close').click();
            $('.parent').attr("hidden", false);

            
        })
        .always(function() {
            // Re-enable the submit button and hide the loading spinner
            $("#edit-company-btn-"+id).attr("disabled", false).html('حفظ');
        });
    }

    //---------------------------------------------------------------
    function deleteCompany(formId, id){
        $("#delete-company-btn-"+id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');

        var formData = new FormData(document.getElementById(formId));
        $.ajax({
            url: `{{route('deleteTransportCompanyAr')}}` ,
            type: "POST",
            data: formData,
            processData: false, 
            cache: false,
            contentType: false,
        })
        .done(function(data){   
            $("#companies-data").empty();
            $("#companies-data").append(data);
            $('.close').click();
            $('.parenttrue').attr("hidden", false);

        })
        .fail(function(){
          $('.close').click();
            $('.parent').attr("hidden", false);

        })
        .always(function() {
            // Re-enable the submit button and hide the loading spinner
            $("#delete-company-btn-"+id).attr("disabled", false).html('نعم');
        });
    }

    //---------------------------------------------------------------
    window.onload = (event) => {
        $.ajax({
            url: "{{route('getTransportCompaniesAr')}}" ,
            type: "GET",
            processData: false, 
            cache: false,
            contentType: false,
        }) 
        .done(function(data){
            $("#companies-data").append(data);
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
        table = document.getElementById("companiesTable");
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
</script>
