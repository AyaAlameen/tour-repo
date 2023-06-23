
<?php $i = 1; ?>
@foreach($districts as $district)
    @if($loop->last)
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
                                          هل أنت متأكد من أنك تريد حذف هذه الناحية (<span style="color: #90aaf8;">{{$district->translations()->where('locale', 'ar')->first()->name}}</span>) ؟
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
                     <div class="modal fade" id="editDistrict{{$district->id}}" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                  <td>الاسم(العربية)</td>    
                                </tr> 
                                <tr>       
                                  <td colspan="2" class="text-end text-danger p-1"><span class="name_ar_error_edit"></span></td>                
                                </tr>  
                                <tr>
                                  <td ><input type="text" class="toggle text-primary in" name="name_en" required style="width: 100%;" value="{{$district->translations()->where('locale', 'en')->first()->name}}"></td> 
                                  <td >الاسم(الانكليزي)</td>     
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
    @else
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
                                          هل أنت متأكد من أنك تريد حذف هذه الناحية (<span style="color: #90aaf8;">{{$district->translations()->where('locale', 'ar')->first()->name}}</span>) ؟
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
                     <div class="modal fade" id="editDistrict{{$district->id}}" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                  <td>الاسم(العربية)</td>    
                                </tr>   
                                <tr>       
                                  <td colspan="2" class="text-end text-danger p-1"><span class="name_ar_error_edit"></span></td>                
                                </tr>
                                <tr>
                                  <td ><input type="text" class="toggle text-primary in" name="name_en" required style="width: 100%;" value="{{$district->translations()->where('locale', 'en')->first()->name}}"></td> 
                                  <td >الاسم(الانكليزي)</td>     
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
    @endif
@endforeach

