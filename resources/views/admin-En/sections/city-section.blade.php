<?php $i = 1; ?>
@foreach($cities as $city)
    @if($loop->last)
    <div class="products-row" >
        <button class="cell-more-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
        <div class="product-cell">
            <span>{{$i++}}</span>
          </div>
          <div class="product-cell">
            <span>{{$city->translations()->where('locale', 'en')->first()->name}}</span>
          </div>
          <div class="product-cell image">
            <img src="{{ asset(str_replace(app_path(),'',$city -> image))}}"  alt="product">
          </div>
          <div class="product-cell">
     <!-- start action -->
<div class="p-3">

                 
                     <!-- edit -->
                     <a href="#" class="edit text-success m-3" data-toggle="modal" data-target="#editCity{{$city->id}}" title="Edit"><i class="fas fa-pen"></i></a>

                          <!-- Modal -->
                     <div class="modal" id="editCity{{$city->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                           <form id="edit-form-{{$city->id}}" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                           <div class="modal-body">
                           <table class="table-striped table-hover table-bordered m-auto text-primary myTable" style="width: 400px;">
                           
                            <tr> 
                                <td>Name(Arabic)</td>
                                <td ><input type="text" name="name_ar" class="toggle text-primary in" value="{{$city->translations()->where('locale', 'ar')->first()->name}}"></td>  
                                <span style="color: red">@error('name_ar'){{$message}}@enderror</span>
                            </tr> 
                                
                            <tr> 
                                <td>Name(English)</td>
                                <td ><input type="text" name="name_en" class="toggle text-primary in" value="{{$city->translations()->where('locale', 'en')->first()->name}}"></td>  
                                <span style="color: red">@error('name_en'){{$message}}@enderror</span>
                            </tr>      
                        
    
                            <tr>
                                <td>Image </td>
                                <td ><input type="file" name="image" id="img"> 
                                <label for="img" ><img src="{{ asset(str_replace(app_path(),'',$city -> image))}}" style="padding-top: 5px; border-radius: 0px;"  width="30px" height="50px"></label></td>      
                                <span style="color: red">@error('image'){{$message}}@enderror</span>
                            </tr>  
      
                               </table>
                            
                           </div>
                            </form>
                           <div class="modal-footer">
                <button type="button" class="action-button active close" data-dismiss="modal">Close</button>
                             <button type="submit" id="edit-city-btn-{{$city->id}}" onclick="editCity(`edit-form-{{$city->id}}`, {{$city->id}})" class="app-content-headerButton">Save changes</button>
                           </div>
                         </div>
                       </div>
                       </div>
                     <!-- end edit -->
                     <!-- delete -->
                 <a href="#" class="delete" data-toggle="modal" data-target="#deleteCity{{$city->id}}" title="Delete" data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                              <!-- Modal -->
                              <div class="modal fade" id="deleteCity{{$city->id}}" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form id="delete-form-{{$city->id}}" action="" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" name="id" value="{{$city->id}}" hidden>
                                    <div class="modal-body">
                                      Are you shure that you want to delete This City (<span style="color: #EB455F;">{{$city->translations()->where('locale', 'en')->first()->name}}</span>) ?
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="action-button active close" data-dismiss="modal">Close</button>
                                      <button type="submit" id="delete-city-btn-{{$city->id}}" onclick="deleteCity(`delete-form-{{$city->id}}`, {{$city->id}})" class="app-content-headerButton">Yes</button>
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
      </div>
    @else
    <div class="products-row" >
        <button class="cell-more-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
        <div class="product-cell">
            <span>{{$i++}}</span>
          </div>
          <div class="product-cell">
            <span>{{$city->translations()->where('locale', 'en')->first()->name}}</span>
          </div>
          <div class="product-cell image">
            <img src="{{ asset(str_replace(app_path(),'',$city -> image))}}"  alt="product">
          </div>
          <div class="product-cell">
     <!-- start action -->
<div class="p-3">

                 
                     <!-- edit -->
                     <a href="#" class="edit text-success m-3" data-toggle="modal" data-target="#editCity{{$city->id}}" title="Edit"><i class="fas fa-pen"></i></a>

                          <!-- Modal -->
                     <div class="modal" id="editCity{{$city->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                           <form id="edit-form-{{$city->id}}" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                           <div class="modal-body">
                           <table class="table-striped table-hover table-bordered m-auto text-primary myTable" style="width: 400px;">
                           
                            <tr> 
                                <td>Name(Arabic)</td>
                                <td ><input type="text" name="name_ar" class="toggle text-primary in" value="{{$city->translations()->where('locale', 'ar')->first()->name}}"></td>  
                                <span style="color: red">@error('name_ar'){{$message}}@enderror</span>
                            </tr> 
                                
                            <tr> 
                                <td>Name(English)</td>
                                <td ><input type="text" name="name_en" class="toggle text-primary in" value="{{$city->translations()->where('locale', 'en')->first()->name}}"></td>  
                                <span style="color: red">@error('name_en'){{$message}}@enderror</span>
                            </tr>      
                        
    
                            <tr>
                                <td>Image </td>
                                <td ><input type="file" name="image" id="img"> 
                                <label for="img" ><img src="{{ asset(str_replace(app_path(),'',$city -> image))}}" style="padding-top: 5px; border-radius: 0px;"  width="30px" height="50px"></label></td>      
                                <span style="color: red">@error('image'){{$message}}@enderror</span>
                            </tr>  
      
                               </table>
                            
                           </div>
                            </form>
                           <div class="modal-footer">
                <button type="button" class="action-button active close" data-dismiss="modal">Close</button>
                             <button type="submit" id="edit-city-btn-{{$city->id}}" onclick="editCity(`edit-form-{{$city->id}}`, {{$city->id}})" class="app-content-headerButton">Save changes</button>
                           </div>
                         </div>
                       </div>
                       </div>
                     <!-- end edit -->
                     <!-- delete -->
                 <a href="#" class="delete" data-toggle="modal" data-target="#deleteCity{{$city->id}}" title="Delete" data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                              <!-- Modal -->
                              <div class="modal fade" id="deleteCity{{$city->id}}" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form id="delete-form-{{$city->id}}" action="" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" name="id" value="{{$city->id}}" hidden>
                                    <div class="modal-body">
                                      Are you shure that you want to delete This City (<span style="color: #EB455F;">{{$city->translations()->where('locale', 'en')->first()->name}}</span>) ?
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="action-button active close" data-dismiss="modal">Close</button>
                                      <button type="submit" id="delete-city-btn-{{$city->id}}" onclick="deleteCity(`delete-form-{{$city->id}}`, {{$city->id}})" class="app-content-headerButton">Yes</button>
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
      </div>

    @endif
@endforeach

