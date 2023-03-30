@extends('adminLayout-En.master')
@section('admincontent')

<div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">Places</h1>
     
      <!-- add -->
<button type="button" class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#exampleModal3">
Add place
</button>

<!-- Modal -->
<div class="modal fade " id="exampleModal3" tabindex="-1" aria-labelledby="exampleModal3Label" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content toggle">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal3Label">New place</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <table style=" width: 400px;" class="table-striped table-hover table-bordered m-auto text-primary myTable" >
      
              <tr>
                  <td>Name </td>
                  <td ><input type="text" class="toggle text-primary in" name="place_name" required style="width: 100%;"></th>      
              </tr>  
              <tr>
                  <td >image </td>
                  <td><input type="file" class="toggle text-primary in"  name="place_image" required style="width: 100%;"></th>      
              </tr> 
              <tr>
                  <td>City</td>
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
              </tr>
              <tr>
                  <td>District</td>
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
              </tr>
              <tr>
                  <td>subcat</td>
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
              </tr>  
              <tr>
                  <td>location</td>
                  <td ><input class="toggle text-primary in" type="text" name="place-location" required style="width: 100%;"></th>      
              </tr> 
              <tr>
                  <td>Description</td>
                  <td ><input class="toggle text-primary in" type="text" name="place-description" required style="width: 100%;"></th>      
              </tr> 
              
              <tr>
                  <td>email</td>
                  <td ><input class="toggle text-primary in" type="email" name="place-email" required style="width: 100%;"></th>      
              </tr>
              <tr>
                  <td>phone</td>
                  <td ><input class="toggle text-primary in" type="number" name="place-phone" required style="width: 100%;"></th>      
              </tr>
              <tr>
                  <td>Url</td>
                  <td ><input class="toggle text-primary in" type="text" name="place-url" required style="width: 100%;"></th>      
              </tr> 
              <tr>
                  <td>Cost</td>
                  <td ><input class="toggle text-primary in" type="text" name="place_cost" required style="width: 100%;"></th>      
              </tr> 
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="action-button active" data-bs-dismiss="modal">Close</button>
        <button type="button" class="app-content-headerButton">Save</button>
      </div>
    </div>
  </div>
</div>
    </div>
    <!-- end add -->

    <div class="app-content-actions">
      <input class="search-bar" placeholder="Search..." type="text">
      <div class="app-content-actions-wrapper">
        <!-- filter -->
        <div class="filter-button-wrapper">
          <button class="action-button filter jsFilter"><span>Filter</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg></button>
          <div class="filter-menu">
          <label>City</label>
            <select>
            <option>كل المدن</option>
              <option>حلب</option>
              <option>حماة</option>       
              <option>حمص</option>
              <option>دمشق</option>
              <option>طرطوس</option>
            </select>
            <label>Sub_category</label>
            <select>
            <option>ALL SUB</option>
              <option>مساجد</option>
              <option>كنائس</option>       
              <option>مطاعم</option>
              <option>فنادق</option>
              <option>ملاهي</option>
            </select>
            <label>District</label>
            <select>
            <option>All Districts</option>
              <option>الفرقان</option>
              <option>موكاكبو</option>
              <option>حي السبيل</option>
            </select>
            <div class="filter-menu-buttons">

              <button class="filter-button apply">
                Apply
              </button>
            </div>
          </div>
        </div>
        <!-- end filter -->
        <button class="action-button list" title="List View">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
        </button>
        <button class="action-button grid" title="Grid View">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        </button>
        <div class="nav-item dropdown" >
                            <button class="action-button list dropdown-toggle" data-toggle="dropdown" title="Translate">  <i class="fas far fa-globe "  ></i> </button>
                           
                            <div class="dropdown-menu border-0 rounded-0 m-0">
                                <a href="{{route('category_en')}}"  class="dropdown-item">English</a>
                                <a href="{{route('category_ar')}}" class="dropdown-item">Arabic </a>
                    
                            </div>
                        </div>
        <button class="mode-switch" title="Switch Theme" style="margin-left:5px;">
        <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
          <defs></defs>
          <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
        </svg>
      </button>
      
      </div>
    </div>
    <div class="products-area-wrapper tableView">
      <div class="products-header">
        <div class="product-cell">Name</div>
        <div class="product-cell image ">Image</div>
        <div class="product-cell">City</div>
        <div class="product-cell">District</div>
        <div class="product-cell">Sub_category</div>
        <div class="product-cell">location</div>
        <div class="product-cell">Description</div>
        <div class="product-cell">Email</div>
        <div class="product-cell">Phone</div>
        <div class="product-cell">URL</div>
        <div class="product-cell">cost</div>

      </div>
      <div class="products-row">
        <button class="cell-more-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
          <div class="product-cell">
            <span>الجامع الأموي</span>
          </div>
          <div class="product-cell">
            <img src="img/omayyad.jpg" alt="product">
          </div>
          <div class="product-cell">
            <span>دمشق</span>
          </div>
          <div class="product-cell">
            <span> دمشق القديمة</span>
          </div>
          <div class="product-cell">
            <span>مساجد</span>
          </div>
          <div class="product-cell">
            <span>وسط دمشق</span>
          </div>
          <div class="product-cell">
            <span>----</span>
          </div>
          <div class="product-cell">
            <span>-----</span>
          </div>
          <div class="product-cell">
            <span>264837283</span>
          </div>
          <div class="product-cell">
            <span>----</span>
          </div>
          <div class="product-cell">
            <span>----</span>
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
                                      Are you shure that you want to delete This place ?
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="action-button active" data-dismiss="modal">Close</button>
                                      <button type="submit" class="app-content-headerButton">Yes</button>
                                    </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <!-- end delete -->

                     <!-- edit -->
                     <a href="#" class="edit" data-toggle="modal" data-target="#exampleModal" title="Edit"><i class="fas fa-pen"></i></a>

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
                         <td>name</td>
                         <td ><input type="text" class="toggle text-primary in" value="حلب"></td>                   
                  </tr> 
                  <tr>
                       <td>Image </td>
                       <td ><input type="file" hidden id="img"> 
                            <label for="img" ><img src="img/about-1.jpg" style="padding-top: 5px; border-radius: 0px;"  width="30px" height="50px"></label></td>      
                       </tr>
       <tr>
                  <td>city </td>
                  <td ><div class="dropdown toggle text-primary in" style="display:inline-block; ;">
                  <lable  class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">  
                    liki
                  </lable>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">--</a>
                    <a class="dropdown-item" href="#">--</a>
                    <a class="dropdown-item" href="#">---</a>
                    <a class="dropdown-item" href="#">----</a>
          
                  </div>
                </div></th>      
              </tr>  
              <tr>
                  <td>District </td>
                  <td ><div class="dropdown toggle text-primary in" style="display:inline-block; ;">
                  <lable  class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">  
                    ---
                  </lable>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">--</a>
                    <a class="dropdown-item" href="#">--</a>
                    <a class="dropdown-item" href="#">---</a>
                    <a class="dropdown-item" href="#">----</a>
          
                  </div>
                </div></td>      
              </tr>  
              <tr>
                  <td>subcat </td>
                  <td ><div class="dropdown toggle text-primary in" style="display:inline-block; ;">
                  <lable  class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">  
                    ---
                  </lable>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">--</a>
                    <a class="dropdown-item" href="#">--</a>
                    <a class="dropdown-item" href="#">---</a>
                    <a class="dropdown-item" href="#">----</a>
          
                  </div>
                </div></td>      
              </tr>  
              <tr> 
                         <td>location</td>
                         <td ><input type="text" class="toggle text-primary in" value="-----"></td>  
                           
                  </tr>
                  <tr> 
                         <td>Description</td>
                         <td ><input type="text" class="toggle text-primary in" value="-----"></td>  
                           
                  </tr>
                  <tr> 
                  
                         <td>email</td>
                         <td ><input type="email" class="toggle text-primary in" value="@gmail.com"></td>  
                           
                  </tr> 
                  <tr> 
                         <td>phone</td>
                         <td ><input type="number" class="toggle text-primary in" value="09123456789"></td>  
                           
                  </tr> 
                  <tr> 
                         <td>url</td>
                         <td ><input type="text" class="toggle text-primary in" value="-----"></td>  
                           
                  </tr>
                  <tr>
                         <td>cost</td>
                         <td ><input type="number" class="toggle text-primary in" value="100000"></td>  
                           
                  </tr> 
                  
                               </table>
                            
                           </div>
                           <div class="modal-footer">
                <button type="button" class="action-button active" data-dismiss="modal">Close</button>
                             <button type="submit" class="app-content-headerButton">Save changes</button>
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
@endsection
