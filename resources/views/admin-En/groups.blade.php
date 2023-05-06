@extends('adminLayout-En.master')
@section('admincontent')

<div class="app-content">
    <div class="app-content-header"  style="width:88%;">
      <h1 class="app-content-headerText">Groups</h1>
   
        <!-- add -->
<button type="button" class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#exampleModal3">
Add Group
</button>

<!-- Modal -->
<div class="modal fade " data-bs-backdrop="static" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModal3Label" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content toggle">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal3Label">New Group</h5>
        <button type="button" class="btn-close m-0 close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table style="color: rgb(22, 22, 22); width: 400px;" class="table-striped table-hover table-bordered m-auto text-primary myTable" >
      
              <tr>
                  <td>Group Number</td>
                  <td ><input type="number" class="toggle text-primary in" name="group_number" required style="width: 100%;"></th>      
              </tr>  
              <tr>
                  <td>Tourist Guide</td>
                  <td ><div class="dropdown toggle text-primary in" style="display:inline-block; ;">
                  <label  class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">  
                    
                  </label>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">ahmad</a>
                    <a class="dropdown-item" href="#">salem</a>
                    <a class="dropdown-item" href="#">emad</a>
                    <a class="dropdown-item" href="#">basem</a>
                 
               
                  </div>
                </div></th>      
              </tr>
              <tr>
                  <td>tour Duration</td>
                  <td ><input class="toggle text-primary in" type="number" required style="width: 100%;"></th>      
              </tr>

              <tr>
                  <td>Description(Arabic)</td>
                  <td ><textarea class="toggle text-primary in mt-2"  name="_group_description" required style="width: 100%; height:27.5px;"></textarea></th>      
              </tr> 
              <tr>
                  <td>Description(English)</td>
                  <td ><textarea class="toggle text-primary in mt-2"  name="_group_description" required style="width: 100%; height:27.5px;"></textarea></th>      
              </tr>    
              <tr>
                  <td>People Count</td>
                  <td ><input class="toggle text-primary in" type="number" name="people_cont" required style="width: 100%;"></th>      
              </tr>
              <tr>
                  <td>Cost</td>
                  <td ><input class="toggle text-primary in" type="number" name="group_cost" required style="width: 100%;"></th>      
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
    
    <div class="app-content-actions" style="width:88%;">
      <input class="search-bar" placeholder="Search..." type="text">
      <div class="app-content-actions-wrapper">
        <!-- filter -->
        <div class="filter-button-wrapper">
          <button class="action-button filter jsFilter"><span>Filter</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg></button>
          <div class="filter-menu">
            <label>Tourist Guide</label>
            <select>
              <option>All</option>
              <option>Furniture</option>       
              <option>Decoration</option>
              <option>Kitchen</option>
              <option>Bathroom</option>
            </select>
          
            <div class="filter-menu-buttons">

              <button class="filter-button apply">
                Apply
              </button>
            </div>
          </div>
        </div>
        <!-- end filter -->
        <button class="action-button list " title="List View">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
        </button>
        <button class="action-button grid" title="Grid View">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        </button>
        <div class="nav-item dropdown " >
                            <button class="action-button list dropdown-toggle" data-bs-toggle="dropdown" title="Translate">  <i class="fas fa-globe "  ></i> </button>
                           
                            <div class="dropdown-menu border-0 rounded-0 m-0 toggle">
                                <a href="{{route('groupe_en')}}"  class="dropdown-item">English</a>
                                <a href="{{route('groupe_ar')}}" class="dropdown-item">Arabic </a>
                    
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
    <div class="scroll-class" style="width:88%;">
    <div class="products-area-wrapper tableView">
      <div class="products-header">
        <div class="product-cell">#</div>
        <div class="product-cell">Tourist Guide</div>
        <div class="product-cell">Tour Duration</div>
        <div class="product-cell">Description</div>
        <div class="product-cell">People count</div>
        <div class="product-cell">cost</div>
        <div class="product-cell ">Actions</div>



 

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
            <span>4 Days</span>
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
          <div class="product-cell">
     <!-- start action -->
<div class="p-3">
  <!-- destination -->
<!-- dest first form -->
<div class="modal fade" data-bs-backdrop="static" id="exampleModalTogglee" aria-hidden="true" aria-labelledby="exampleModalToggleeLabel" tabindex="-1">
  <div class="modal-dialog" style="max-width:1000px; margin: 5% 20%;">
    <div class="modal-content" style="width:800px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleeLabel">Added destinations</h5>
        <button type="button" class="btn-close m-0 close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- !!!بيان انتبهي  -->
        <!-- هاد الشكل بحال كان لسا مالو ضايف وسائل  -->
     <img src="../img/destination.png" class="m-3" style="width:150px; height:150px; opacity:0.5;" >
     <p class="text-body mb-4">No destinations has been added yet</p>
     <!-- هاد الشكل بحال كان ضايف وسائل -->
      <!-- <table style="color: rgb(22, 22, 22); width: 700px;" class="table-striped table-hover table-bordered m-auto text-primary myTable">
        <tr>
          <td class="text-center">place</td>
          <td class="text-center">district</td>
          <td class="text-center" style="width:140px;">cost</td>
          <td class="text-center" style="width:290px;">description</td>
    
          <td style="width:40px;"></td>
        </tr>
        <tr>
          <td class="text-center">shahbarows</td>
          <td class="text-center">alsaha</td>
          <td class="text-center">120000</td>
          <td class="text-center" style="max-width:200px; overflow-x:scroll;"  >Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque nihil dolores totam eum cum,
             ipsum perspiciatis debitis .</td>
         
          <td> <a href="#" class="delete mr-3 ml-2" style="font-size:14px;" title="Delete" data-toggle="tooltip"><i class="fas fa-trash"></i></a></td>

        </tr>
      </table> -->
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary"  style="border-radius:3px;" data-bs-target="#exampleModalTogglee2" data-bs-toggle="modal" data-bs-dismiss="modal">Add new destination</button>
      </div>
    </div>
  </div>
</div>
<!-- end dest first form -->

<!-- dest second form -->
<div class="modal fade" data-bs-backdrop="static" id="exampleModalTogglee2" aria-hidden="true" aria-labelledby="exampleModalToggleeLabel2" tabindex="-1">
  <div class="modal-dialog " style="max-width:1000px; margin: 5% 30%;">
    <div class="modal-content" style="width:500px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleeLabel2">New destination</h5>
        <button type="button" class="btn-close m-0 close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table style="color: rgb(22, 22, 22); width: 450px;" class="table-striped table-hover table-bordered m-auto text-primary myTable" >
      
      <tr>
          <td>district</td>
          <td style="width:340px;" ><div class="dropdown toggle text-primary in" style="display:inline-block;">
          <label  class="dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">  
            
          </label>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Alamir</a>
            <a class="dropdown-item" href="#">Alkadmous</a>

         
       
          </div>
        </div></td>   
   
      </tr>  

      </table>
      <table id="tablePlace" style="color: rgb(22, 22, 22); width: 450px; margin-top:20px !important; margin-bottom:15px !important;" class="table-striped table-hover table-bordered m-auto text-primary myTable">
      <tr>
           <td>Place</td>
           <td style="width:300px;" ><div class="dropdown toggle text-primary in" style="display:inline-block; ;">
          <label  class="dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">  
            
          </label>
          <div class="dropdown-menu"  aria-labelledby="dropdownMenuButton">
          <ul>
    <li>
    <div class="d-inline-block w-100" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus"
           data-bs-content='cost : (12)  description : Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque nihil dolores totam eum cum,
             ipsum perspiciatis debitis .'>
          <a class="dropdown-item" href="#">place1</a>
    </div>
    </li>
  </ul>
   
          </div>
        </div></td>
        <td style="width:30px; padding-right:6px !important;"><button type="button" class="btn-close m-0 close" onclick="removePlace()">
        <span  aria-hidden="true">&times;</span>
        </button></td>
      </tr>
      <tr>
           <td>services</td>
           <td style="width:300px;" ><div class="dropdown toggle text-primary in" style="display:inline-block; ;">
          <label  class="dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
<!--lable disabled هي الجملة منعرضا بحال كان المكان مالو خدمات ومنعمل ال  -->
            <!-- there is no services in this place -->
          </label>
          <div class="dropdown-menu"  aria-labelledby="dropdownMenuButton">
          <ul>
    <li>
    <div class="d-inline-block w-100" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus"
           data-bs-content='cost : (12)  description : Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque nihil dolores totam eum cum,
             ipsum perspiciatis debitis .'>
          <a class="dropdown-item" href="#">servic1</a>
    </div>
    </li>
  </ul>
   
          </div>
        </div></td>
        <td style="width:30px; padding-right:6px !important;"><button type="button" class="btn-close m-0 close" onclick="removeRow()">
        <span  aria-hidden="true">&times;</span>
        </button></td>
      </tr>
      </table>
      <button class="app-content-headerButton m-3" style="float:right;" onclick="addPlace()">Add Another place</button>

      </div>
      <div class="modal-footer">
        <button class="app-content-headerButton" style="border-radius:3px;" data-bs-target="#exampleModalTogglee" data-bs-toggle="modal" data-bs-dismiss="modal">Back</button>
        <button type="button" class="app-content-headerButton" style="background-color:var(--bambi);">Save</button>

      </div>
    </div>
  </div>
</div>
<!-- end dest second form -->

<a class="delete mr-2" title="destinations" data-bs-toggle="modal" href="#exampleModalTogglee" ><i class="fas fa-map-location-dot"></i></a>


<!-- end destination -->

<!-- transport -->
<!-- first form -->
<div class="modal fade" data-bs-backdrop="static" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog" style="max-width:1000px; margin: 5% 20%;">
    <div class="modal-content" style="width:800px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Added transportation</h5>
        <button type="button" class="btn-close m-0 close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- !!!بيان انتبهي  -->
        <!-- هاد الشكل بحال كان لسا مالو ضايف وسائل  -->
     <img src="../img/vehicles.png" class="m-3" style="width:150px; height:150px; opacity:0.5;" >
     <p class="text-body mb-4">No transportation has been added yet</p>
     <!-- هاد الشكل بحال كان ضايف وسائل -->
      <!-- <table style="color: rgb(22, 22, 22); width: 750px;" class="table-striped table-hover table-bordered m-auto text-primary myTable">
        <tr>
          <td class="text-center">transport company</td>
          <td class="text-center">transportation</td>
          <td class="text-center">count of passengers</td>
          <td class="text-center">Specifications</td>
          <td>in date</td>
          <td style="width:40px;"></td>
        </tr>
        <tr>
          <td class="text-center">Alamir company</td>
          <td class="text-center">6913 حلب</td>
          <td class="text-center">12</td>
          <td class="text-center" style="max-width:200px; overflow-x:scroll;" >Lorem ipsum dolor sit amet consectetur adipisicing elit.  Eaque nihil dolores totam eum cum,
             ipsum perspiciatis debitis .</td>
             <td>11-11-2023</td>
          <td> <a href="#" class="delete mr-3 ml-2" style="font-size:14px;" title="Delete" data-toggle="tooltip"><i class="fas fa-trash"></i></a></td>

        </tr>
      </table> -->
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary"  style="border-radius:3px;" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Add new transportation</button>
      </div>
    </div>
  </div>
</div>
<!-- end first form -->

<!-- second form -->
<div class="modal fade" data-bs-backdrop="static" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog " style="max-width:1000px; margin: 5% 30%;">
    <div class="modal-content" style="width:500px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">New transportation</h5>
        <button type="button" class="btn-close m-0 close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table style="color: rgb(22, 22, 22); width: 450px;" class="table-striped table-hover table-bordered m-auto text-primary myTable" >
      
      <tr>
          <td>Transport companies available</td>
          <td ><div class="dropdown toggle text-primary in" style="display:inline-block; ;">
          <label  class="dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">  
            
          </label>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Alamir</a>
            <a class="dropdown-item" href="#">Alkadmous</a>

         
       
          </div>
        </div></td>   
   
      </tr>  
      <tr>
          <td>Transportation available in this company</td>
          <td ><div class="dropdown toggle text-primary in" style="display:inline-block; ;">
          <label  class="dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">  
            
          </label>
          <div class="dropdown-menu" style="width:200px;" aria-labelledby="dropdownMenuButton">
  <ul>
    <li>
    <div class="d-inline-block w-100" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus"
           data-bs-content='count of passenger : (12)  Specifications : Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque nihil dolores totam eum cum,
             ipsum perspiciatis debitis .'>
          <a class="dropdown-item" href="#">6913 حلب</a>
    </div>
    </li>
    <li>
    <div class="d-inline-block w-100" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus"
           data-bs-content='count of passenger : (12)  Specifications : Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque nihil dolores totam eum cum,
             ipsum perspiciatis debitis .'>
          <a class="dropdown-item" href="#">6913 حلب</a>
          </div>
    </li>
  </ul>
        
          </div>
        </div></td>  
         
      </tr>
      </table>
      <table id="tableDate" style="color: rgb(22, 22, 22); width: 450px; margin-top:20px !important; margin-bottom:15px !important;" class="table-striped table-hover table-bordered m-auto text-primary myTable">
      <tr id="transportRow">
           <td>The date of the day the transportation will be used</td>
           <td><input class="toggle text-primary in" type="date"  required style="width: 100%;"></td> 
           <td><button type="button" class="btn-close m-0 close" onclick="removeRow()">
        <span aria-hidden="true">&times;</span>
        </button></td>
      </tr>
 
      </table>

      <button class="app-content-headerButton m-3" style="float:right;" onclick="addDate()">Add Another Date</button>



      </div>
      <div class="modal-footer">
        <button class="app-content-headerButton" style="border-radius:3px;" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Back</button>
        <button type="button" class="app-content-headerButton" style="background-color:var(--bambi);">Save</button>

      </div>
    </div>
  </div>
</div>
<!-- end second form -->
<a  class="delete mr-2" data-bs-toggle="modal" href="#exampleModalToggle"   title="Transportation" ><i class="fas fa-bus"></i></a>

<!-- end transort -->
                 <!-- delete -->
                 <a href="#" class="delete" data-toggle="modal" data-target="#exampleModal2" title="Delete" data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                              <!-- Modal -->
                              <div class="modal fade " id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      Are you shure that you want to delete This Group ?
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
                     <div class="modal fade" data-backdrop="static" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                         <td>Group number</td>
                         <td ><input type="number" class="toggle text-primary in" value="1"></td>                   
                  </tr> 

                  <tr> 
                         <td>Tourist Guide</td>
                         <td ><input type="text" class="toggle text-primary in" value="ahmad"></td>                   
                  </tr> 
                  <tr> 
                         <td>Tour Duration</td>
                         <td ><input type="number" class="toggle text-primary in" value="4"></td>                   
                  </tr> 
                  <tr>
                  <td>Description(Arabic)</td>
                  <td ><textarea class="toggle text-primary in mt-2"  name="_group_description" required style="width: 100%; height:27.5px;">---</textarea></th>      
              </tr> 
              <tr>
                  <td>Description(English)</td>
                  <td ><textarea class="toggle text-primary in mt-2"  name="_group_description" required style="width: 100%; height:27.5px;">---</textarea></th>      
              </tr>  
                   <tr> 
                         <td>People count</td>
                         <td ><input type="number" class="toggle text-primary in" value="15" style="width: 100%;"></td>                   
                  </tr> 
                  <tr> 
                         <td>Cost</td>
                         <td ><input type="number" class="toggle text-primary in" value="100000" style="width: 100%;"></td>                   
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
  </div>

      @endsection
