<?php $i = 1 ?>
      @foreach($subCategories as $subCategory)
      @if($loop->last)
      <div class="products-row">
        <button class="cell-more-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
          <div class="product-cell">
            <span>{{$i++}}</span>
          </div>
          <div class="product-cell">
            <span class="search-value">{{$subCategory->translations()->where('locale', 'ar')->first()->name}}</span>
          </div>
          <div class="product-cell">
            <img src="{{ asset(str_replace(app_path(),'',$subCategory -> image))}}" alt="product">
          </div>
          <div class="product-cell">
     <!-- start action -->
<div class="p-3">

                 <!-- delete -->
                 <a href="#" class="delete" data-toggle="modal" data-target="#deleteSubCategory{{$subCategory->id}}" title="Delete" data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                              <!-- Modal -->
                              <div class="modal fade" id="deleteSubCategory{{$subCategory->id}}" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content" style="direction:ltr;">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form id="delete-form-{{$subCategory->id}}" action="" method="POST" enctype="multipart/form-data">
                                        @csrf
                                          <input type="text" name="id" value="{{$subCategory->id}}" hidden>
                                          <input type="text" name="category_id" value="{{$category->id}}" hidden>
                                    <div class="modal-body" style="direction:rtl;">
                                    هل أنت متأكد من أنك تريد حذف هذا الصنف الفرعي (<span style="color: #90aaf8;">{{$subCategory->translations()->where('locale', 'ar')->first()->name}}</span>) ؟
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="action-button active" data-dismiss="modal">إغلاق</button>
                                      <button type="submit" id="delete-sub-category-btn-{{$subCategory->id}}" onclick="deleteSubCategory(`delete-form-{{$subCategory->id}}`, {{$subCategory->id}})" class="app-content-headerButton">نعم</button>
                                    </div>
                                  </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <!-- end delete -->

                     <!-- edit -->
                     <a href="#" class="edit text-success" data-toggle="modal" data-target="#editSubCategory{{$subCategory->id}}" title="Edit"><i class="fas fa-pen"></i></a>

                          <!-- Modal -->
                     <div class="modal fade" id="editSubCategory{{$subCategory->id}}" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                       <div class="modal-dialog">
                         <div class="modal-content" style="direction:ltr;">
                           <div class="modal-header">
                             <button type="button" class="close" onclick="removeMessages()" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                           <form id="edit-form-{{$subCategory->id}}" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                           <div class="modal-body">
                           <table class="table-striped table-hover table-bordered m-auto text-primary myTable" style="width: 400px; direction:rtl;">
                           <input type="text" hidden name="category_id" class="toggle text-primary in" value="{{$category->id}}">
                          
                          <tr> 
                            <td>الاسم(العربية)</td>
                            <td ><input type="text" name="name_ar" class="toggle text-primary in" value="{{$subCategory->translations()->where('locale', 'ar')->first()->name}}"></td>  
                             
                         </tr>    
                         <tr>
                          <td><span style="color: red" class="name_ar_error_edit"></span></td>
                        </tr>  
                          <tr> 
                            <td>(الإنجليزية)الاسم</td>
                            <td ><input type="text" name="name_en" class="toggle text-primary in" value="{{$subCategory->translations()->where('locale', 'en')->first()->name}}"></td>  
                             
                         </tr>      
                         <tr>
                          <td><span style="color: red" class="name_en_error_edit"></span></td>
                        </tr>
    
                       <tr>
                       <td>الصورة </td>
                       <td ><input type="file" name="image" id="img"> 
                            <label for="img" ><img src="{{ asset(str_replace(app_path(),'',$subCategory -> image))}}" style="padding-top: 5px; border-radius: 0px;"  width="30px" height="50px"></label></td>      
                       </tr>  
      
                               </table>
                            
                           </div>
                            </form>
                           <div class="modal-footer">
                <button type="button" class="action-button active close" onclick="removeMessages()" data-dismiss="modal">إغلاق</button>
                             <button type="submit" id="edit-sub-category-btn-{{$subCategory->id}}" onclick="editSubCategory('edit-form-{{$subCategory->id}}', {{$subCategory->id}})" class="app-content-headerButton">حفظ التغييرات</button>
                           </div>
                         </div>
                       </div>
                       </div>
                     <!-- end edit -->
   
</div>
  <!-- end action -->
      

      </div>
      @else
      <div class="products-row">
        <button class="cell-more-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
          <div class="product-cell">
            <span>{{$i++}}</span>
          </div>
          <div class="product-cell">
            <span class="search-value">{{$subCategory->translations()->where('locale', 'ar')->first()->name}}</span>
          </div>
          <div class="product-cell">
            <img src="{{ asset(str_replace(app_path(),'',$subCategory -> image))}}" alt="product">
          </div>
          <div class="product-cell">
     <!-- start action -->
<div class="p-3">

                 <!-- delete -->
                 <a href="#" class="delete" data-toggle="modal" data-target="#deleteSubCategory{{$subCategory->id}}" title="Delete" data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                              <!-- Modal -->
                              <div class="modal fade" id="deleteSubCategory{{$subCategory->id}}" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content" style="direction:ltr;">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form id="delete-form-{{$subCategory->id}}" action="" method="POST" enctype="multipart/form-data">
                                        @csrf
                                          <input type="text" name="id" value="{{$subCategory->id}}" hidden>
                                          <input type="text" name="category_id" value="{{$category->id}}" hidden>
                                    <div class="modal-body" style="direction:rtl;">
                                    هل أنت متأكد من أنك تريد حذف هذا الصنف الفرعي (<span style="color: #90aaf8;">{{$subCategory->translations()->where('locale', 'ar')->first()->name}}</span>) ؟
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="action-button active" data-dismiss="modal">إغلاق</button>
                                      <button type="submit" id="delete-sub-category-btn-{{$subCategory->id}}" onclick="deleteSubCategory(`delete-form-{{$subCategory->id}}`, {{$subCategory->id}})" class="app-content-headerButton">نعم</button>
                                    </div>
                                  </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <!-- end delete -->

                     <!-- edit -->
                     <a href="#" class="edit text-success" data-toggle="modal" data-target="#editSubCategory{{$subCategory->id}}" title="Edit"><i class="fas fa-pen"></i></a>

                          <!-- Modal -->
                     <div class="modal fade" id="editSubCategory{{$subCategory->id}}" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                       <div class="modal-dialog">
                         <div class="modal-content" style="direction:ltr;">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" onclick="removeMessages()" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                           <form id="edit-form-{{$subCategory->id}}" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                           <div class="modal-body">
                           <table class="table-striped table-hover table-bordered m-auto text-primary myTable" style="width: 400px; direction:rtl;">
                           <input type="text" hidden name="category_id" class="toggle text-primary in" value="{{$category->id}}">
                          
                          <tr> 
                            <td>الاسم(العربية)</td>
                            <td ><input type="text" name="name_ar" class="toggle text-primary in" value="{{$subCategory->translations()->where('locale', 'ar')->first()->name}}"></td>  
                             
                         </tr> 
                         <tr>
                          <td><span style="color: red" class="name_ar_error_edit"></span></td>
                        </tr>     
                          <tr> 
                            <td>(الإنجليزية)الاسم</td>
                            <td ><input type="text" name="name_en" class="toggle text-primary in" value="{{$subCategory->translations()->where('locale', 'en')->first()->name}}"></td>  
                             
                         </tr>      
                         <tr>
                          <td><span style="color: red" class="name_en_error_edit"></span></td>
                        </tr>
    
                       <tr>
                       <td>الصورة </td>
                       <td ><input type="file" name="image" id="img"> 
                            <label for="img" ><img src="{{ asset(str_replace(app_path(),'',$subCategory -> image))}}" style="padding-top: 5px; border-radius: 0px;"  width="30px" height="50px"></label></td>      
                       </tr>  
      
                               </table>
                            
                           </div>
                            </form>
                           <div class="modal-footer">
                <button type="button" class="action-button active close" onclick="removeMessages()" data-dismiss="modal">إغلاق</button>
                             <button type="submit" id="edit-sub-category-btn-{{$subCategory->id}}" onclick="editSubCategory('edit-form-{{$subCategory->id}}', {{$subCategory->id}})" class="app-content-headerButton">حفظ التغييرات</button>
                           </div>
                         </div>
                       </div>
                       </div>
                     <!-- end edit -->
   
</div>
  <!-- end action -->
      

      </div>
@endif
      @endforeach