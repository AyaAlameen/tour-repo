@extends('adminLayout-Ar.master')
@section('admincontent')

<div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">الجروبات</h1>
     
        <!-- add -->
<button type="button" class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#exampleModal3">
إضافة جروب
</button>

<!-- Modal -->
<div class="modal fade " id="exampleModal3" tabindex="-1" aria-labelledby="exampleModal3Label" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content toggle">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal3Label">جروب جديد</h5>
        <button type="button" class="btn-close m-0 close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="add-form" action="" method="post" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
      <table style="color: rgb(22, 22, 22); width: 400px;" class="table-striped table-hover table-bordered m-auto text-primary myTable" >
      
              <tr>
                  
                  <td ><input type="number" class="toggle text-primary in" name="group_number" required style="width: 100%;"></th>  
                  <td>رقم الجروب</td>    
              </tr>  

              <tr>
                  
                  <td ><div class="dropdown toggle text-primary in" style="display:inline-block; ;">
                  <lable  class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">  
                    
                  </lable>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">ahmad</a>
                    <a class="dropdown-item" href="#">salem</a>
                    <a class="dropdown-item" href="#">emad</a>
                    <a class="dropdown-item" href="#">basem</a>
                 
               
                  </div>
                </div></td>    
                <td>الدليل السياحي</td>  
              </tr>
             

              <tr>
                  
                  <td ><textarea class="toggle text-primary in mt-2"  name="_group_description" required style="width: 100%; height:27.5px;"></textarea></td> 
                  <td>وصف(العربية)</td>     
              </tr>  
              <tr>
                  
                  <td ><textarea class="toggle text-primary in mt-2"  name="_group_description" required style="width: 100%; height:27.5px;"></textarea></td> 
                  <td>(الانكليزية)وصف</td>     
              </tr>   
              <tr>
                  
                  <td ><input class="toggle text-primary in" type="number" name="people_cont" required style="width: 100%;"></td> 
                  <td>عدد الأشخاص</td>     
              </tr>
              <tr>
                 
                  <td ><input class="toggle text-primary in" type="number" name="group_cost" required style="width: 100%;"></td>   
                  <td>الكلفة</td>   
              </tr> 


 
      </table>
      </div>
      </form>
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
        <!-- filter -->
        <div class="filter-button-wrapper">
          <button class="action-button filter jsFilter"><span>Filter</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg></button>
          <div class="filter-menu">
            <label>الدليل السياحي</label>
            <select>
              <option>All</option>
              <option>Furniture</option>       
              <option>Decoration</option>
              <option>Kitchen</option>
              <option>Bathroom</option>
            </select>
          
            <div class="filter-menu-buttons">

              <button class="filter-button apply">
                أوافق
              </button>
            </div>
          </div>
        </div>
        <!-- end filter -->
        <button class="action-button list" title="عرض جدول">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
        </button>
        <button class="action-button grid" title="عرض لائحة">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        </button>
        
        <div class="nav-item dropdown" >
                            <button class="action-button list dropdown-toggle" data-toggle="dropdown" title="ترجمة">  <i class="fas fa-globe "  ></i> </button>
                           
                            <div class="dropdown-menu border-0 rounded-0 m-0 toggle">
                                <a href="{{route('groupe_ar')}}"  class="dropdown-item"> العربية</a>
                                <a href="{{route('groupe_en')}}" class="dropdown-item">الانجليزية </a>
                    
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
        <div class="product-cell">الدليل السياحي</div>
        <div class="product-cell">وصف</div>
        <div class="product-cell"> عدد الأشخاص</div>
        <div class="product-cell">الكلفة</div>
        <div class="product-cell ">الأحداث</div>



 

      </div>
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
 <a href="#" class="delete mr-3" title="الوجهات" style="font-size:14px;" data-toggle="tooltip"><i class="fas fa-map-location-dot"></i></a>
<!-- transport -->
<a href="#" class="delete mr-3"  title="وسائل النقل" style="font-size:14px;" data-toggle="tooltip"><i class="fas fa-bus"></i></a>

                 <!-- delete -->
                 <a href="#" class="delete" style="font-size:14px;" data-toggle="modal" data-target="#exampleModal2" title="Delete" data-toggle="tooltip"><i class="fas fa-trash"></i></a>
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
                     <a href="#" class="edit pl-3" style="font-size:14px;" data-toggle="modal" data-target="#exampleModal" title="Edit"><i class="fas fa-pen"></i></a>

                          <!-- Modal -->
                     <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                       <div class="modal-dialog">
                         <div class="modal-content">
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
      </div>
    </div>
  </div>
@endsection
