@extends('adminLayout-Ar.master')
@section('admincontent')

<div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">وسائل النقل</h1>
      <h3 class="app-content-headerText ">"شركة نقل الأمير"</h3>

        <!-- add -->
<button type="button" class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#exampleModal3">
إضافة وسيلة نقل
</button>

<!-- Modal -->
<div class="modal fade " id="exampleModal3" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModal3Label" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content toggle">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal3Label">وسيلة نقل جديدة</h5>
        <button type="button" class="btn-close m-0 close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table style="color: rgb(22, 22, 22); width: 400px;" class="table-striped table-hover table-bordered m-auto text-primary myTable" >

               
              <tr>
                  
                  <td ><input class="toggle text-primary in" type="number"  required style="width: 100%;"></td> 
                  <td>رقم السيارة</td>     
              </tr>
              <tr>
                  
                  <td ><div class="dropdown toggle text-primary in" style="display:inline-block;">
                  <lable  class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">  
                    
                  </lable>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">--</a>
                    <a class="dropdown-item" href="#">---</a>
                    <a class="dropdown-item" href="#">---</a>
                    <a class="dropdown-item" href="#">---</a>
                 
               
                  </div>
                </div></td>   
                <td>المحافظة</td>   
              </tr>
              
              <tr>
                  
                  <td ><input class="toggle text-primary in" type="number"  required style="width: 100%;"></td> 
                  <td>عدد الركاب</td>     
              </tr>
            
                  <tr>
                  <td ><input class="toggle text-primary in" type="text" name="description" required style="width: 100%;"></td>  
                  <td>المواصفات(العربية)</td>    
              </tr> 
              <tr>
                  
                  <td ><input class="toggle text-primary in" type="text" name="description" required style="width: 100%;"></td>  
                  <td>(الانكليزية)المواصفات</td>    
              </tr>
           
              

 
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="action-button active" data-bs-dismiss="modal">إغلاق</button>
        <button type="button" class="app-content-headerButton">حفظ</button>
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
                                <a href="{{route('transportation_ar')}}"  class="dropdown-item"> العربية</a>
                                <a href="{{route('transportation_en')}}" class="dropdown-item">الانجليزية </a>
                    
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
    <div class="scroll-class">
    <div class="products-area-wrapper tableView">
      <div class="products-header">
        <div class="product-cell">رقم السيارة</div>
        <div class="product-cell ">المحافظة</div>
        <div class="product-cell">عدد الركاب</div>
        <div class="product-cell">المواصفات</div>
        <div class="product-cell ">الأحداث</div>

      </div>
      <div class="products-row">

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
                  <lable  class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">  
                    حلب
                  </lable>
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
      </div>
</div>
    </div>
  </div>
@endsection
