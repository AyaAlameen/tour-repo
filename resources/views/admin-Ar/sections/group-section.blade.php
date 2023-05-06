<?php $i = 1; ?>
@foreach($groups as $group)
    @if($loop->last)

    @else
    <div class="products-row">
        <button class="cell-more-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
          <div class="product-cell">
            <span>{{$i++}}</span>
          </div>
    
          <div class="product-cell">
            <span>{{$group->translations()->where('locale', 'ar')->first()->name}}</span>
          </div>
          <div class="product-cell">
            <span>{{$group->touristGuide->translations()->where('locale', 'ar')->first()->name}}</span>
          </div>
          <div class="product-cell">
            <span>{{$group->start_date}}</span>
          </div>
          <div class="product-cell">
            <span>{{$group->end_date}}</span>
          </div>
          <div class="product-cell">
            <span>{{$group->people_count}}</span>
          </div>
          <div class="product-cell">
            <span>{{$group->cost}}</span>
          </div>
          <div class="product-cell">
            <span>{{$group->translations()->where('locale', 'ar')->first()->description}}</span>
          </div>
          <div class="product-cell" >
     <!-- start action -->
    <div>
      <!-- edit -->
      <a href="#" class="edit pl-3" style="font-size:14px;" data-toggle="modal" data-target="#exampleModal" title="Edit"><i class="fas fa-pen"></i></a>
    
      <!-- Modal -->
      <div class="modal fade" data-backdrop="static" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content" style="direction:ltr;">
            <div class="modal-header">
              <button type="button" class="close" onclick="removeMessages()" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <form id="edit-form-{{$group->id}}" action="" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="modal-body">
            <table class="table-striped table-hover table-bordered m-auto text-primary myTable" style="width: 400px;"> 
          <tr> 
          
              <td ><input type="text" name="name_ar" class="toggle text-primary in" value="{{$group->translations()->where('locale', 'ar')->first()->name}}"></td> 
              <td>الاسم(العربية)</td>                  
          </tr> 
          <tr>
            <td colspan="2"><span style="color: red" class="name_ar_error_edit"></span></td>
          </tr>
          <tr> 
          
              <td ><input type="text" name="name_en" class="toggle text-primary in" value="{{$group->translations()->where('locale', 'en')->first()->name}}"></td> 
              <td>الاسم(الإنجليزية)</td>                  
          </tr> 
          <tr>
            <td colspan="2"><span style="color: red" class="name_en_error_edit"></span></td>
          </tr>
          <tr>
            <td ><input class="toggle text-primary in" type="date" name="start_date" required style="width: 100%;" value="{{$group->start_date}}"></td>   
            <td>تاريخ البداية</td>   
          </tr> 
          <tr>
            <td colspan="2"><span style="color: red" class="start_date_error_edit"></span></td>
          </tr>
          <tr>
            <td ><input class="toggle text-primary in" type="date" name="end_date" required style="width: 100%;" value="{{$group->end_date}}"></td>   
            <td>تاريخ النهاية</td>   
        </tr> 
        <tr>
          <td colspan="2"><span style="color: red" class="end_date_error_edit"></span></td>
        </tr>
        <tr>
          <td ><div class="dropdown toggle text-primary in" style="display:inline-block; ;">
            
          <label  class="dropdown-toggle" type="button" id="dropdownMenuButtonEdit{{$group->id}}" data-toggle="dropdown" aria-expanded="false">  
            
          </label>
          <span id="guide-name-{{$group->id}}">{{$group->touristGuide->translations()->where('locale', 'ar')->first()->name}}</span>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonEdit{{$group->id}}">
            @foreach ($guides as $guide)
              <option style="cursor: pointer; @if($guide->id == $group->tourist_guide_id) color: #EB455F !important; @endif" class="dropdown-item" value="{{$guide->id}}" id="edit_guide_{{$group->id}}_{{$guide->id}}" onclick="setEditGuide({{$guide->id}}, {{$group->id}}, '{{$guide->translations()->where('locale', 'ar')->first()->name}}', 'edit_guide_{{$group->id}}_{{$guide->id}}')" href="#">{{$guide->translations()->where('locale', 'ar')->first()->name}}</option>
            @endforeach
            <input type="text" id="edit_guide_id_{{$group->id}}" name="tourist_guide_id" value="{{$group->tourist_guide_id}}" hidden>
        
          </div>
        </div></td>    
        <td>الدليل السياحي</td>  
      </tr>
      <tr>
        <td colspan="2"><span style="color: red" class="guide_error_edit"></span></td>
      </tr>
      <tr>

      <td ><textarea class="toggle text-primary in mt-2"  name="description_ar" required style="width: 100%; height:27.5px;">{{$group->translations()->where('locale', 'ar')->first()->description}}</textarea></th> 
      <td>وصف(العربية)</td>     
      </tr>  
      <tr>

      <td ><textarea class="toggle text-primary in mt-2"  name="description_en" required style="width: 100%; height:27.5px;">{{$group->translations()->where('locale', 'en')->first()->description}}</textarea></th> 
      <td>(الإنجليزية)وصف</td>     
      </tr> 
      <tr> 
          
          <td ><input type="number" name="people_count" class="toggle text-primary in" value="{{$group->people_count}}"></td>    
          <td>عدد الأشخاص</td>               
      </tr> 
      <tr>
        <td colspan="2"><span style="color: red" class="people_count_error_edit"></span></td>
      </tr>
      <tr> 
          
          <td ><input type="number" name="cost" class="toggle text-primary in" value="{{$group->cost}}"></td>    
          <td>التكلفة</td>               
      </tr> 
      <tr>
        <td colspan="2"><span style="color: red" class="cost_error_edit"></span></td>
      </tr>



           </table>
        
       </div>
            </form>
       <div class="modal-footer">
<button type="button" class="action-button active close" onclick="removeMessages()" data-dismiss="modal">إغلاق</button>
         <button type="submit" id="edit-group-btn-{{$group->id}}" onclick="editGroup('edit-form-{{$group->id}}', {{$group->id}})" class="app-content-headerButton">حفظ التغييرات</button>
       </div>
     </div>
   </div>
   </div>
 <!-- end edit -->

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
     <p class="text-body mb-4">لا يوجد بعد وسائل نقل مضافة </p>
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
</table>
      <table>
      <tr>
     <td><input class="toggle text-primary in" type="date"  required style="width: 100%;"></td> 
        <td> تاريخ اليوم الذي سيتم فيه استخدام هذه الوسيلة</td>
        <td><button type="button" class="btn-close m-0 close" onclick="removeRow()">
        <span aria-hidden="true">&times;</span>
        </button></td>
      </tr>
      </table>
      <button class="app-content-headerButton m-3" style="float:left;" onclick="addDate()">إضافة تاريخ آخر</button>

    
      <div class="toast hide w-50 m-auto " role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header" >
  <p class="m-auto text-body">  تمت إضافة التاريخ</p>
  <button type="button" class="btn-close m-0 close" style="float:right;" data-bs-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
  </div>

</div>
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
                 <a href="#" class="delete pr-1" style="font-size:14px;" data-toggle="modal" data-target="#exampleModal2" title="Delete" data-toggle="tooltip"><i class="fas fa-trash"></i></a>
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
    
                     
    </div>
    </div>
    <!-- end action -->
      
    </div>
      </div>
    @endif
@endforeach

