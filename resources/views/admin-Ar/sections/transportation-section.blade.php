<?php $i = 1 ?>
@foreach($transportations as $transportation)
    @if($loop->last)

    @else
    <div class="products-row">

        <div class="product-cell">
          <span>{{$i++}}</span>
        </div>
        <div class="product-cell">
          <span>6913</span>
        </div>

        <div class="product-cell">
          <span>حلب</span>
        </div>

        
        <div class="product-cell">
          <span>12</span>
        </div>

        <div class="product-cell">
          <span> ----- </span>
        </div>
    

        <div class="product-cell">
   <!-- start action -->
<div class="p-3">

               <!-- delete -->
               <a href="#" class="delete" data-toggle="modal" data-target="#exampleModal2" title="Delete" data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content"  style="direction:ltr;">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body"  style="direction:rtl;">
                                    هل أنت متأكد من أنك تريد حذف وسيلة النقل هذه ؟
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
                   <a href="#" class="edit" data-toggle="modal" data-target="#exampleModal" title="Edit"><i class="fas fa-pen"></i></a>

                        <!-- Modal -->
                   <div class="modal fade" data-backdrop="static" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                       <div class="modal-content"  style="direction:ltr;">
                         <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>
                         <div class="modal-body">
                         <table class="table-striped table-hover table-bordered m-auto text-primary myTable" style="width: 400px;"> 
                         <tr>   
                       <td ><input type="number" class="toggle text-primary in" value="12"></td>  
                       <td>رقم السيارة</td>
                         
                </tr> 

 
             <tr>
                
                <td ><div class="dropdown toggle text-primary in" style="display:inline-block; ;">
                <label  class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">  
                  حلب
                </label>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">--</a>
                  <a class="dropdown-item" href="#">--</a>
                  <a class="dropdown-item" href="#">---</a>
                  <a class="dropdown-item" href="#">----</a>
        
                </div>
              </div></td>      
              <td>المحافظة </td>
            </tr>  

                <tr>   
                       <td ><input type="number" class="toggle text-primary in" value="12"></td>  
                       <td>عدد الركاب</td>
                         
                </tr>   
            <tr>
                <td ><input class="toggle text-primary in" type="text" value="----"  required style="width: 100%;"></th>  
                <td>المواصفات(العربية)</td>    
            </tr> 
            <tr>
                
                <td ><input class="toggle text-primary in" type="text" value="----"  required style="width: 100%;"></th>  
                <td>(الانكليزية)المواصفات</td>    
            </tr>
 

                             </table>
                          
                         </div>
                         <div class="modal-footer">
              <button type="button" class="action-button active" data-dismiss="modal">إغلاق</button>
                           <button type="submit" class="app-content-headerButton">حفظ التغييرات</button>
                         </div>
                       </div>
                     </div>
                     </div>
                   <!-- end edit -->
 
</div>
<!-- end action -->
    

    </div>

    </div>
    @endif
@endforeach