@extends('adminLayout-Ar.master')
@section('admincontent')

<div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">الأصناف</h1>
      
            <!-- add -->
<button type="button" class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#exampleModal3">
 إضافة صنف
</button>

<!-- Modal -->
<div class="modal fade " id="exampleModal3" tabindex="-1" aria-labelledby="exampleModal3Label" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content toggle">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal3Label">صنف جديد</h5>
        <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="add-form" action="" method="post" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
      <table style="width: 400px;" class="table-striped table-hover table-bordered m-auto text-primary myTable" >
      
              <tr>
                 
                  <td ><input type="text" id="name_ar" class="toggle text-primary in" name="name_ar" required style="width: 100%;"></td> 
                  <td >الاسم(العربية)</td>    
                  <span style="color: red">@error('name_ar'){{$message}}@enderror</span>
              </tr>  
              <tr>
                 
                  <td ><input type="text" id="name_en"  class="toggle text-primary in" name="name_en" required style="width: 100%;"></td> 
                  <td >الاسم(الإنجليزية)</td>   
                  <span style="color: red">@error('name_en'){{$message}}@enderror</span>
              </tr> 
              <tr>
                
                  <td><input type="file" multiple id="image" class="toggle text-primary in"  name="image" required style="width: 100%;"></td>   
                  <td >الصورة </td>   
                  <span style="color: red">@error('image'){{$message}}@enderror</span>
              </tr>     
      </table>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="action-button active close" data-bs-dismiss="modal">إغلاق</button>
        <button type="button" id="add-category-btn" onclick="addCategory('add-form')" class="app-content-headerButton">حفظ</button>
      </div>
    
    </div>
  </div>
</div>
    </div>
    <!-- end add -->

    <div class="app-content-actions">
      <input class="search-bar" placeholder="...ابحث" type="text">
      <div class="app-content-actions-wrapper">

        <button class="action-button list" title="عرض جدول">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
        </button>
        <button class="action-button grid" title="عرض لائحة">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        </button>
     
                         <div class="nav-item dropdown" >
                            <button class="action-button list dropdown-toggle" data-toggle="dropdown" title="ترجمة">  <i class="fas fa-globe "  ></i> </button>
                           
                            <div class="dropdown-menu border-0 rounded-0 m-0 toggle">
                                <a href="{{route('category_ar')}}"  class="dropdown-item"> العربية</a>
                                <a href="{{route('category_en')}}" class="dropdown-item">الانجليزية </a>
                    
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
        <div class="products-area-wrapper tableView">
            <div class="products-header">
                <div class="product-cell">#</div>
                <div class="product-cell">الاسم</div>
                <div class="product-cell image ">الصورة</div>
                <div class="product-cell ">الصنف الفرعي</div>
                <div class="product-cell ">الأحداث</div>
            </div>
            
            <div id="categories-data"></div>
</div>
      </div>
    </div>
  </div>
@endsection

<script>
 
    function addCategory(formId){
        $("#add-category-btn").attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById('add-form'));
        $.ajax({
            url: "{{route('addCategoryAr')}}" ,
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

        })
        .fail(function(){
            $('.parent').attr("hidden", false);


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


        })
        .fail(function(){
            $('.parent').attr("hidden", false);

            
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

        })
        .fail(function(){
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
            url: "{{route('getCategoriesAr')}}" ,
            type: "GET",
            processData: false, 
            cache: false,
            contentType: false,
        }) 
        .done(function(data){
            $("#categories-data").append(data);
        })
        .fail(function(){
            $('.parent').attr("hidden", false);


        });
    };
    
//--------------------------------------------
</script>

