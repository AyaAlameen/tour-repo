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
            <span class="search-value">{{$subCategory->translations()->where('locale', 'en')->first()->name}}</span>
          </div>
          <div class="product-cell">
            <img src="{{ asset(str_replace(app_path(),'',$subCategory -> image))}}" alt="product">
          </div>
          <div class="product-cell">
     <!-- start action -->
<div class="p-3">
                     <!-- edit -->
                     <a href="#" class="edit text-success p-2" data-toggle="modal" data-target="#editSubCategory{{$subCategory->id}}" title="Edit"><i class="fas fa-pen"></i></a>

                          <!-- Modal -->
                     <div class="modal fade" data-bs-backdrop="static" id="editSubCategory{{$subCategory->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" onclick="removeMessages()" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                           <form id="edit-form-{{$subCategory->id}}" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                           <div class="modal-body">
                           <table class="table-striped table-hover table-bordered m-auto text-primary myTable" style="width: 400px;">
                         <input type="text" hidden name="category_id" class="toggle text-primary in" value="{{$category->id}}">
                          
                           <tr>
                  <td>Name(Arabic) </td>
                  <td ><input type="text" class="toggle text-primary in" name="name_ar" required style="width: 100%;" value="{{$subCategory->translations()->where('locale', 'ar')->first()->name}}"></th>      
              </tr>
              <tr > <td colspan="2"><span class="text-danger p-1 name_ar_error_edit"></span></td> </tr> 
              <tr>
                  <td>Name(English) </td>
                  <td ><input type="text" class="toggle text-primary in" name="name_en" required style="width: 100%;" value="{{$subCategory->translations()->where('locale', 'en')->first()->name}}"></th>      
              </tr> 
    
              <tr > <td colspan="2"><span class="text-danger p-1 name_en_error_edit"></span></td> </tr> 
              <tr>
                       <td>Image </td>
                       <td ><input type="file" name="image" id="img"> 
                            <label for="img" ><img src="{{ asset(str_replace(app_path(),'',$subCategory -> image))}}"  style="padding-top: 5px; border-radius: 0px;"  width="30px" height="50px"></label></td>      
                       </tr>  
      
                               </table>
                            
                           </div>
                            </form>
                           <div class="modal-footer">
                <button type="button" class="action-button active close" onclick="removeMessages()" data-dismiss="modal">Close</button>
                             <button id="edit-sub-category-btn-{{$subCategory->id}}" onclick="editSubCategory('edit-form-{{$subCategory->id}}', {{$subCategory->id}})" type="submit" class="app-content-headerButton">Save changes</button>
                           </div>
                         </div>
                       </div>
                       </div>
                     <!-- end edit -->

                     {{-- additionalFields --}}

                     <div class="modal fade" style="direction:ltr;" data-backdrop="static"
                     id="additionalFields{{ $subCategory->id }}" aria-hidden="true"
                     aria-labelledby="exampleModalToggleeLabel" tabindex="-1">
                     <div class="modal-dialog" style="max-width:1000px; margin: 5% auto">
                         <div class="modal-content m-auto" style="width:450px;">
                             <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalToggleeLabel">Additional Fields
                                 </h5>
                                 <button type="button" class="btn-close m-0 close" data-dismiss="modal"
                                     aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                             </div>
                             <form id="fields-form-{{ $subCategory->id }}" action="" method="POST"
                                 enctype="multipart/form-data">
                                 @csrf
                                 <input type="text" name="id" value="{{ $subCategory->id }}"
                                     hidden>
                                 <input type="text" name="category_id"
                                     value="{{ $subCategory->category_id }}" hidden>

                                 <div class="modal-body">

                                     <table
                                         style="color: rgb(22, 22, 22); width: 400px !important; direction:rtl;"
                                         class="table-striped table-hover table-bordered m-auto text-primary myTable">
                                         <tr>
                                             <td style="width:40px;"></td>

                                             <th>Fields</th>
                                         </tr>


                                         <tr>
                                             <td class="text-center pl-2">
                                                 {{-- فحصي اذا مصفوفة الاديشينال فيها قيمة مدة الحجز او لا  --}}
                                                 <input
                                                     @if ($subCategory->additional_fields) @if (in_array('reservation_period', $subCategory->additional_fields)) checked @endif
                                                     @endif
                                                 id="p_1" name="additional_fields[]"
                                                 value="reservation_period" type="checkbox">
                                             </td>
                                             <td> <label for="p_1">Reservation Period</label>
                                             </td>

                                         </tr>


                                         <tr>
                                             <td class="text-center pl-2">
                                                 {{-- فحصي اذا مصفوفة الاديشينال فيها قيمة مدة الحجز او لا  --}}
                                                 <input
                                                     @if ($subCategory->additional_fields) @if (in_array('tables_count', $subCategory->additional_fields)) checked @endif
                                                     @endif
                                                 id="p_1" name="additional_fields[]"
                                                 value="tables_count" type="checkbox">
                                             </td>
                                             <td> <label for="p_1">Tables Count</label>
                                             </td>

                                         </tr>

                                         <tr>
                                             <td class="text-center pl-2">
                                                 {{-- فحصي اذا مصفوفة الاديشينال فيها قيمة مدة الحجز او لا  --}}
                                                 <input
                                                     @if ($subCategory->additional_fields) @if (in_array('table_people_count', $subCategory->additional_fields)) checked @endif
                                                     @endif
                                                 id="p_1" name="additional_fields[]"
                                                 value="table_people_count" type="checkbox">
                                             </td>
                                             <td> <label for="p_1">Number of people at the
                                                     table</label>
                                             </td>

                                         </tr>

                                         <tr>
                                             <td class="text-center pl-2">
                                                 {{-- فحصي اذا مصفوفة الاديشينال فيها قيمة مدة الحجز او لا  --}}
                                                 <input
                                                     @if ($subCategory->additional_fields) @if (in_array('rooms_count', $subCategory->additional_fields)) checked @endif
                                                     @endif
                                                 id="p_1" name="additional_fields[]"
                                                 value="rooms_count" type="checkbox">
                                             </td>
                                             <td> <label for="p_1">Rooms Count</label>
                                             </td>

                                         </tr>

                                         <tr>
                                             <td class="text-center pl-2">
                                                 {{-- فحصي اذا مصفوفة الاديشينال فيها قيمة مدة الحجز او لا  --}}
                                                 <input
                                                     @if ($subCategory->additional_fields) @if (in_array('room_people_count', $subCategory->additional_fields)) checked @endif
                                                     @endif
                                                 id="p_1" name="additional_fields[]"
                                                 value="room_people_count" type="checkbox">
                                             </td>
                                             <td> <label for="p_1">Number of people in the room</label>
                                             </td>

                                         </tr>

                                     </table>
                                 </div>
                             </form>
                             <div class="modal-footer">
                                 <button type="button" class="action-button active close"
                                     data-dismiss="modal">Close</button>
                                 <button type="submit" id="fields-btn-{{ $subCategory->id }}"
                                     onclick="fields(`fields-form-{{ $subCategory->id }}`, {{ $subCategory->id }})"
                                     class="app-content-headerButton">Save</button>

                             </div>
                         </div>
                     </div>
                 </div>
                 <a href="#" class="delete text-primary p-2" data-toggle="modal"
                     data-target="#additionalFields{{ $subCategory->id }}" title="Additional Fields"
                     data-toggle="tooltip"><i class="fas fa-plus"></i></a>

                 {{-- end additionalFields --}}

                     <!-- delete -->
                 <a href="#" class="delete" data-toggle="modal" data-target="#deleteSubCategory{{$subCategory->id}}" title="Delete" data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                              <!-- Modal -->
                              <div class="modal fade" id="deleteSubCategory{{$subCategory->id}}" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form id="delete-form-{{$subCategory->id}}" action="" method="POST" enctype="multipart/form-data">
                                        @csrf
                                          <input type="text" name="id" value="{{$subCategory->id}}" hidden>
                                          <input type="text" name="category_id" value="{{$category->id}}" hidden>

                                    <div class="modal-body">
                                      Are you sure that you want to delete This sub category (<span style="color: #90aaf8;">{{$subCategory->translations()->where('locale', 'en')->first()->name}}</span>) ?
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="action-button active close" data-dismiss="modal">Close</button>
                                      <button type="submit" id="delete-sub-category-btn-{{$subCategory->id}}" onclick="deleteSubCategory(`delete-form-{{$subCategory->id}}`, {{$subCategory->id}})" class="app-content-headerButton">Yes</button>
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
    @else
    <div class="products-row">
        <button class="cell-more-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
          <div class="product-cell">
            <span>{{$i++}}</span>
          </div>
          <div class="product-cell">
            <span class="search-value">{{$subCategory->translations()->where('locale', 'en')->first()->name}}</span>
          </div>
          <div class="product-cell">
            <img src="{{ asset(str_replace(app_path(),'',$subCategory -> image))}}" alt="product">
          </div>
          <div class="product-cell">
     <!-- start action -->
<div class="p-3">
                     <!-- edit -->
                     <a href="#" class="edit text-success p-2" data-toggle="modal" data-target="#editSubCategory{{$subCategory->id}}" title="Edit"><i class="fas fa-pen"></i></a>

                          <!-- Modal -->
                     <div class="modal fade" data-bs-backdrop="static" id="editSubCategory{{$subCategory->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <div class="modal-header">
                             <button type="button" class="close" onclick="removeMessages()" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                           <form id="edit-form-{{$subCategory->id}}" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                           <div class="modal-body">
                           <table class="table-striped table-hover table-bordered m-auto text-primary myTable" style="width: 400px;">
                         <input type="text" hidden name="category_id" class="toggle text-primary in" value="{{$category->id}}">
                          
                           <tr>
                  <td>Name(Arabic) </td>
                  <td ><input type="text" class="toggle text-primary in" name="name_ar" required style="width: 100%;" value="{{$subCategory->translations()->where('locale', 'ar')->first()->name}}"></th>      
              </tr>
              <tr > <td colspan="2"><span class="text-danger p-1 name_ar_error_edit"></span></td> </tr> 
              <tr>
                  <td>Name(English) </td>
                  <td ><input type="text" class="toggle text-primary in" name="name_en" required style="width: 100%;" value="{{$subCategory->translations()->where('locale', 'en')->first()->name}}"></th>      
              </tr> 
    
                        <tr > <td colspan="2"><span class="text-danger p-1 name_en_error_edit"></span></td> </tr> 
                        <tr>
                       <td>Image </td>
                       <td ><input type="file" name="image" id="img"> 
                            <label for="img" ><img src="{{ asset(str_replace(app_path(),'',$subCategory -> image))}}"  style="padding-top: 5px; border-radius: 0px;"  width="30px" height="50px"></label></td>      
                       </tr>  
      
                               </table>
                            
                           </div>
                            </form>
                           <div class="modal-footer">
                <button type="button" class="action-button active close" onclick="removeMessages()" data-dismiss="modal">Close</button>
                             <button id="edit-sub-category-btn-{{$subCategory->id}}" onclick="editSubCategory('edit-form-{{$subCategory->id}}', {{$subCategory->id}})" type="submit" class="app-content-headerButton">Save changes</button>
                           </div>
                         </div>
                       </div>
                       </div>
                     <!-- end edit -->

                     {{-- additionalFields --}}

                     <div class="modal fade" style="direction:ltr;" data-backdrop="static"
                     id="additionalFields{{ $subCategory->id }}" aria-hidden="true"
                     aria-labelledby="exampleModalToggleeLabel" tabindex="-1">
                     <div class="modal-dialog" style="max-width:1000px; margin: 5% auto">
                         <div class="modal-content m-auto" style="width:450px;">
                             <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalToggleeLabel">Additional Fields
                                 </h5>
                                 <button type="button" class="btn-close m-0 close" data-dismiss="modal"
                                     aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                             </div>
                             <form id="fields-form-{{ $subCategory->id }}" action="" method="POST"
                                 enctype="multipart/form-data">
                                 @csrf
                                 <input type="text" name="id" value="{{ $subCategory->id }}"
                                     hidden>
                                 <input type="text" name="category_id"
                                     value="{{ $subCategory->category_id }}" hidden>

                                 <div class="modal-body">

                                     <table
                                         style="color: rgb(22, 22, 22); width: 400px !important; direction:rtl;"
                                         class="table-striped table-hover table-bordered m-auto text-primary myTable">
                                         <tr>
                                             <td style="width:40px;"></td>

                                             <th>Fields</th>
                                         </tr>


                                         <tr>
                                             <td class="text-center pl-2">
                                                 {{-- فحصي اذا مصفوفة الاديشينال فيها قيمة مدة الحجز او لا  --}}
                                                 <input
                                                     @if ($subCategory->additional_fields) @if (in_array('reservation_period', $subCategory->additional_fields)) checked @endif
                                                     @endif
                                                 id="p_1" name="additional_fields[]"
                                                 value="reservation_period" type="checkbox">
                                             </td>
                                             <td> <label for="p_1">Reservation Period</label>
                                             </td>

                                         </tr>


                                         <tr>
                                             <td class="text-center pl-2">
                                                 {{-- فحصي اذا مصفوفة الاديشينال فيها قيمة مدة الحجز او لا  --}}
                                                 <input
                                                     @if ($subCategory->additional_fields) @if (in_array('tables_count', $subCategory->additional_fields)) checked @endif
                                                     @endif
                                                 id="p_1" name="additional_fields[]"
                                                 value="tables_count" type="checkbox">
                                             </td>
                                             <td> <label for="p_1">Tables Count</label>
                                             </td>

                                         </tr>

                                         <tr>
                                             <td class="text-center pl-2">
                                                 {{-- فحصي اذا مصفوفة الاديشينال فيها قيمة مدة الحجز او لا  --}}
                                                 <input
                                                     @if ($subCategory->additional_fields) @if (in_array('table_people_count', $subCategory->additional_fields)) checked @endif
                                                     @endif
                                                 id="p_1" name="additional_fields[]"
                                                 value="table_people_count" type="checkbox">
                                             </td>
                                             <td> <label for="p_1">Number of people at the
                                                     table</label>
                                             </td>

                                         </tr>

                                         <tr>
                                             <td class="text-center pl-2">
                                                 {{-- فحصي اذا مصفوفة الاديشينال فيها قيمة مدة الحجز او لا  --}}
                                                 <input
                                                     @if ($subCategory->additional_fields) @if (in_array('rooms_count', $subCategory->additional_fields)) checked @endif
                                                     @endif
                                                 id="p_1" name="additional_fields[]"
                                                 value="rooms_count" type="checkbox">
                                             </td>
                                             <td> <label for="p_1">Rooms Count</label>
                                             </td>

                                         </tr>

                                         <tr>
                                             <td class="text-center pl-2">
                                                 {{-- فحصي اذا مصفوفة الاديشينال فيها قيمة مدة الحجز او لا  --}}
                                                 <input
                                                     @if ($subCategory->additional_fields) @if (in_array('room_people_count', $subCategory->additional_fields)) checked @endif
                                                     @endif
                                                 id="p_1" name="additional_fields[]"
                                                 value="room_people_count" type="checkbox">
                                             </td>
                                             <td> <label for="p_1">Number of people in the room</label>
                                             </td>

                                         </tr>

                                     </table>
                                 </div>
                             </form>
                             <div class="modal-footer">
                                 <button type="button" class="action-button active close"
                                     data-dismiss="modal">Close</button>
                                 <button type="submit" id="fields-btn-{{ $subCategory->id }}"
                                     onclick="fields(`fields-form-{{ $subCategory->id }}`, {{ $subCategory->id }})"
                                     class="app-content-headerButton">Save</button>

                             </div>
                         </div>
                     </div>
                 </div>
                 <a href="#" class="delete text-primary p-2" data-toggle="modal"
                     data-target="#additionalFields{{ $subCategory->id }}" title="Additional Fields"
                     data-toggle="tooltip"><i class="fas fa-plus"></i></a>

                 {{-- end additionalFields --}}

                     <!-- delete -->
                 <a href="#" class="delete" data-toggle="modal" data-target="#deleteSubCategory{{$subCategory->id}}" title="Delete" data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                              <!-- Modal -->
                              <div class="modal fade" id="deleteSubCategory{{$subCategory->id}}" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form id="delete-form-{{$subCategory->id}}" action="" method="POST" enctype="multipart/form-data">
                                        @csrf
                                          <input type="text" name="id" value="{{$subCategory->id}}" hidden>
                                          <input type="text" name="category_id" value="{{$category->id}}" hidden>

                                    <div class="modal-body">
                                      Are you sure that you want to delete This sub category (<span style="color: #90aaf8;">{{$subCategory->translations()->where('locale', 'en')->first()->name}}</span>) ?
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="action-button active close" data-dismiss="modal">Close</button>
                                      <button type="submit" id="delete-sub-category-btn-{{$subCategory->id}}" onclick="deleteSubCategory(`delete-form-{{$subCategory->id}}`, {{$subCategory->id}})" class="app-content-headerButton">Yes</button>
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
    @endif
@endforeach