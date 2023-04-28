<?php $i = 1; ?>
@foreach($groups as $group)
    @if($loop->last)

    @else
    <div class="products-row">
        <button class="cell-more-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
          <div class="product-cell">
            <span>1</span>
          </div>
    
          <div class="product-cell">
            <span>Ahmad</span>
          </div>
          <div class="product-cell">
            <span> 4 أيام </span>
          </div>
          <div class="product-cell">
            <span>----</span>
          </div>
          <div class="product-cell">
            <span>50</span>
          </div>
          <div class="product-cell">
            <span>200000</span>
          </div>
          <div class="product-cell" >
     <!-- start action -->
    <div>
    <!-- destination -->
    <a href="#" class="delete ml-3" title="الوجهات" style="font-size:14px;" data-toggle="tooltip"><i class="fas fa-map-location-dot"></i></a>
    <!-- transport -->
    <!-- first form -->
    <div class="modal fade" data-bs-backdrop="static" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog" style="max-width:1000px; margin: 5% 20%;">
    <div class="modal-content" style="width:800px; direction:ltr;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">إضافة وسيلة نقل</h5>
        <button type="button" class="btn-close m-0 close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- !!!بيان انتبهي  -->
        <!-- هاد الشكل بحال كان لسا مالو ضايف وسائل  -->
     <img src="../img/vehicles.png" class="m-3" style="width:150px; height:150px; opacity:0.5;" >
     <p class="text-body mb-4">لا يوجد بعد وسئل نقل مضافة </p>
     <!-- هاد الشكل بحال كان ضايف وسائل -->
      <!-- <table style="color: rgb(22, 22, 22); width: 700px; direction:rtl;" class="table-striped table-hover table-bordered m-auto text-primary myTable">
        <tr>
          <td class="text-center">شركة النقل</td>
          <td class="text-center">وسيلة النقل</td>
          <td class="text-center" style="width:90px;">عدد الركاب</td>
          <td class="text-center" style="width:290px;">المواصفات</td>
          <td>في تاريخ</td>
          <td></td>
        </tr>
        <tr>
          <td class="text-center">شركة الأمير</td>
          <td class="text-center">6913 حلب</td>
          <td class="text-center">12</td>
          <td class="text-center" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque nihil dolores totam eum cum,
             ipsum perspiciatis.</td>
             <td>11-11-2023</td>
           <td> <a href="#" class="delete ml-2 mr-2" style="font-size:14px;" title="Delete" data-toggle="tooltip"><i class="fas fa-trash"></i></a></td>
          
             
        </tr>
      </table> -->
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary"  style="border-radius:3px;" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">إضافة وسيلة نقل جديدة</button>
      </div>
    </div>
    </div>
    </div>
    <!-- end first form -->
    
    <!-- second form -->
    <div class="modal fade" data-bs-backdrop="static" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog " style="max-width:1000px; margin: 5% 30%;">
    <div class="modal-content" style="width:500px; direction:ltr;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">وسيلة نقل جديدة</h5>
        <button type="button" class="btn-close m-0 close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table style="color: rgb(22, 22, 22); width: 450px;" class="table-striped table-hover table-bordered m-auto text-primary myTable" >
      
      <tr>
          <td ><div class="dropdown toggle text-primary in" style="display:inline-block; ;">
          <label  class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">  
            
          </label>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">الأمير</a>
            <a class="dropdown-item" href="#">القدموس</a>
          </div>
        </div></td>     
        <td>شركات النقل المتاحة</td>
    
      </tr>  
      <tr>
          <td ><div class="dropdown toggle text-primary in" style="display:inline-block; ;">
          <label  class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">  
            
          </label>
          <div class="dropdown-menu" style="width:200px;" aria-labelledby="dropdownMenuButton">
    
          <span class="d-inline-block w-100" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus"
          data-bs-content='عدد الركاب  : (12) --------------------المواصفات : باص مع خدمة التكييف وإتاحة شبكة واي فاي مجانا لجميع الركاب'>
              <a class="dropdown-item" href="#">6913 حلب</a>
          </span>
      
          <span class="d-inline-block w-100" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus"
           data-bs-content='عدد الركاب  : (12) --------------------المواصفات : باص مع خدمة التكييف وإتاحة شبكة واي فاي مجانا لجميع الركاب'>
          <a class="dropdown-item" href="#">6913 حلب</a>
          </span>
      
          <span class="d-inline-block w-100" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus"
          data-bs-content='عدد الركاب  : (12) --------------------المواصفات : باص مع خدمة التكييف وإتاحة شبكة واي فاي مجانا لجميع الركاب'>
              <a class="dropdown-item" href="#">6913 حلب</a>
          </span>
      
       
          </div>
        </div></td>  
        
        <td>وسائل النقل المتاحة في هذه الشركة</td>
        
      </tr>
      <tr>
     <td><input class="toggle text-primary in" type="date"  required style="width: 100%;"></td> 
        <td> تاريخ اليوم الذي سيتم فيه استخدام هذه الوسيلة</td>
    
      </tr>
    
    </table>
      </div>
      <div class="modal-footer">
        <button class="app-content-headerButton" style="border-radius:3px;" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">عودة</button>
        <button type="button" class="app-content-headerButton" style="background-color:var(--bambi);">حفظ</button>
    
      </div>
    </div>
    </div>
    </div>
    <!-- end second form -->
    <a  class="delete ml-2" data-bs-toggle="modal" href="#exampleModalToggle"   title="Transportation" ><i class="fas fa-bus"></i></a>
    
    <!-- end transort -->
                 <!-- delete -->
                 <a href="#" class="delete" style="font-size:14px;" data-toggle="modal" data-target="#exampleModal2" title="Delete" data-toggle="tooltip"><i class="fas fa-trash"></i></a>
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
                                     هل أنت متأكد من أنك تريد حذف هذا الجروب؟
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="action-button active" data-dismiss="modal">إغلاق</button>
                                      <button type="submit" class="app-content-headerButton">نعم</button>
                                    </div>
                                    </div>
                                  </div>
                                </div>
                  
                            <!-- end delete -->
    
                     <!-- edit -->
                     <a href="#" class="edit pr-3" style="font-size:14px;" data-toggle="modal" data-target="#exampleModal" title="Edit"><i class="fas fa-pen"></i></a>
    
                          <!-- Modal -->
                     <div class="modal fade" data-backdrop="static" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                       <div class="modal-dialog">
                         <div class="modal-content" style="direction:ltr;">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                           <div class="modal-body">
                           <table class="table-striped table-hover table-bordered m-auto text-primary myTable" style="width: 400px;"> 
                        <tr> 
                         
                         <td ><input type="number" class="toggle text-primary in" value="1"></td> 
                         <td>رقم الجروب</td>                  
                  </tr> 
    
                  <tr> 
                        
                         <td ><input type="text" class="toggle text-primary in" value="ahmad"></td> 
                         <td>الدليل السياحي</td>                  
                  </tr> 
    
                  <tr> 
                         
                         <td ><input type="number" class="toggle text-primary in" value="4"></td> 
                         <td>مدة الرحلة</td>                  
                  </tr> 
                  <tr>
                  
                  <td ><textarea class="toggle text-primary in mt-2"  name="_group_description" required style="width: 100%; height:27.5px;">----</textarea></th> 
                  <td>وصف(العربية)</td>     
              </tr>  
              <tr>
                  
                  <td ><textarea class="toggle text-primary in mt-2"  name="_group_description" required style="width: 100%; height:27.5px;">----</textarea></th> 
                  <td>(الانكليزية)وصف</td>     
              </tr> 
                   <tr> 
                        
                         <td ><input type="number" class="toggle text-primary in" value="15"></td>    
                         <td>عدد الأشخاص</td>               
                  </tr> 
                  <tr> 
                        
                         <td ><input type="number" class="toggle text-primary in" value="100000"></td>    
                         <td>الكلفة</td>               
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
    </div>
    <!-- end action -->
      
    </div>
      </div>
    @endif
@endforeach

