@extends('adminLayout-Ar.master')
@section('admincontent')

<div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">الصنف الفرعي</h1>
    <h3 class="app-content-headerText pl-5">[{{$category->translations()->where('locale', 'ar')->first()->name}}]</h3>
 <!-- add -->
 <button type="button" class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#exampleModal3">
 إضافة صنف فرعي
</button>

<!-- Modal -->
<div class="modal fade " id="exampleModal3" tabindex="-1" aria-labelledby="exampleModal3Label" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content toggle">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal3Label">صنف فرعي جديد</h5>
        <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="add-form" action="" method="post" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
      <table style="width: 400px;" class="table-striped table-hover table-bordered m-auto text-primary myTable" >
               
              <tr>
                  
                  <td ><input type="text" class="toggle text-primary in" hidden name="category_id" value="{{$category->id}}" required style="width: 100%;"></th>  
                  
              </tr>  
              <tr>
                  
                  <td ><input type="text" class="toggle text-primary in" name="name_ar" required style="width: 100%;"></th>  
                  <td>الاسم(العربية)</td>    
              </tr>  
              <tr>
                  
                  <td ><input type="text" class="toggle text-primary in" name="name_en" required style="width: 100%;"></th>  
                  <td>(الإنجليزية)الاسم</td>    
              </tr> 
              <tr>
                  
                  <td><input type="file" class="toggle text-primary in"  name="image" required style="width: 100%;"></th>  
                  <td >الصورة </td>    
              </tr>     
      </table>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="action-button active close" data-bs-dismiss="modal">إغلاق</button>
        <button type="button" id="add-sub-category-btn" onclick="addSubCategory('add-form')" class="app-content-headerButton">حفظ</button>
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
                           
                            <div class="dropdown-menu border-0 rounded-0 m-0">
                                <a href="{{route ('getSubCategoriesAr', ['id' => $category->id])}}"  class="dropdown-item"> العربية</a>
                                <a href="{{route ('getSubCategoriesEn', ['id' => $category->id])}}" class="dropdown-item">الانجليزية </a>
                    
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
        <div class="product-cell ">الأحداث</div>


      

      </div>
      <div id="sub-categories-data">
        <?php $i = 1 ?>
      @foreach($subCategories as $subCategory)
      <div class="products-row">
        <button class="cell-more-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
          <div class="product-cell">
            <span>{{$i++}}</span>
          </div>
          <div class="product-cell">
            <span>{{$subCategory->translations()->where('locale', 'ar')->first()->name}}</span>
          </div>
          <div class="product-cell">
            <img src="{{ asset(str_replace(app_path(),'',$subCategory -> image))}}" alt="product">
          </div>
          <div class="product-cell">
     <!-- start action -->
<div class="p-3">

                 <!-- delete -->
                 <a href="#" class="delete" data-toggle="modal" data-target="#exampleModal2" title="Delete" data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                              <!-- Modal -->
                              <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                  هل أنت متأكد من أنك تريد هذف هذا الصنف الفرعي؟
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="action-button active" data-dismiss="modal">إغلاق</button>
                                      <button type="submit" class="app-content-headerButton">نعم</button>
                                    </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <!-- end delete -->

                     <!-- edit -->
                     <a href="#" class="edit text-success" data-toggle="modal" data-target="#editSubCategory{{$subCategory->id}}" title="Edit"><i class="fas fa-pen"></i></a>

                          <!-- Modal -->
                     <div class="modal" id="editSubCategory{{$subCategory->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                           <form id="edit-form-{{$subCategory->id}}" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                           <div class="modal-body">
                           <table class="table-striped table-hover table-bordered m-auto text-primary myTable" style="width: 400px;">
                         <input type="text" hidden name="caegory_id" class="toggle text-primary in" value="{{$category->id}}">
                          
                         <tr>
                  
                  <td ><input type="text" class="toggle text-primary in" name="name_ar" required style="width: 100%;"></th>  
                  <td>الاسم(العربية)</td>    
              </tr>  
              <tr>
                  
                  <td ><input type="text" class="toggle text-primary in" name="name_en" required style="width: 100%;"></th>  
                  <td>(الإنجليزية)الاسم</td>    
              </tr>     
                        
    
                       <tr>
                       
                       <td ><input type="file" name="image" id="img"> 
                            <label for="img" ><img src="{{ asset(str_replace(app_path(),'',$subCategory -> image))}}" style="padding-top: 5px; border-radius: 0px;"  width="30px" height="50px"></label></td>      
                            <td>الصورة </td>
                          </tr>  
      
                               </table>
                            
                           </div>
                          </form>
                           <div class="modal-footer">
                <button type="button" class="action-button active close" data-dismiss="modal">إغلاق</button>
                             <button type="submit" id="edit-sub-category-btn-{{$subCategory->id}}" onclick="editSubCategory('edit-form-{{$subCategory->id}}', {{$subCategory->id}})" class="app-content-headerButton">حفظ التغييرات</button>
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
    function addSubCategory(formId){
        $("#add-sub-category-btn").attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById('add-form'));
        $.ajax({
            url: "{{route('addSubCategoryAr')}}" ,
            type: "POST",
            data: formData,
            processData: false, 
            cache: false,
            contentType: false,
        })
        .done(function(data){   
            $("#sub-categories-data").empty();
            $("#sub-categories-data").append(data);
            $('.close').click();
        })
        .fail(function(){
            alert('فشلت العملية');
        })
        .always(function() {
            // Re-enable the submit button and hide the loading spinner
            $("#add-sub-category-btn").attr("disabled", false).html('حفظ');
        });
    }
    //----------------------------------------------------------

    function editSubCategory(formId, id){

        $("#edit-sub-category-btn-"+id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        var formData = new FormData(document.getElementById(formId));
        formData.append('id', id);
        $.ajax({
            url: `{{route('editSubCategoryAr')}}` ,
            type: "POST",
            data: formData,
            processData: false, 
            cache: false,
            contentType: false,
        })
        .done(function(data){   
            $("#sub-categories-data").empty();
            $("#sub-categories-data").append(data);
            $('.close').click();
        })
        .fail(function(){
            alert('فشلت العملية');
        })
        .always(function() {
            // Re-enable the submit button and hide the loading spinner
            $("#edit-sub-category-btn-"+id).attr("disabled", false).html('حفظ');
        });
    }

    //---------------------------------------------------------------
    // function deleteCategory(formId, id){
    //     $("#delete-category-btn-"+id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');

    //     var formData = new FormData(document.getElementById(formId));
    //     $.ajax({
    //         url: `{{route('deleteCategoryAr')}}` ,
    //         type: "POST",
    //         data: formData,
    //         processData: false, 
    //         cache: false,
    //         contentType: false,
    //     })
    //     .done(function(data){   
    //         $("#categories-data").empty();
    //         $("#categories-data").append(data);
    //         $('.close').click();
    //     })
    //     .fail(function(){
    //         alert('فشلت العملية');
    //     })
    //     .always(function() {
    //         // Re-enable the submit button and hide the loading spinner
    //         $("#delete-category-btn-"+id).attr("disabled", false).html('نعم');
    //     });
    // }

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
    //         alert('فشلت العملية');
    //     });
    // };
//--------------------------------------------
</script>
