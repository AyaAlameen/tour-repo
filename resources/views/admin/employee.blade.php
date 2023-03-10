@extends('adminLayout.master')
@section('admincontent')

<div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">Employees</h1>
      <button class="mode-switch" title="Switch Theme">
        <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
          <defs></defs>
          <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
        </svg>
      </button>
            <!-- add -->
<button type="button" class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#exampleModal">
Add employee
</button>

<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content toggle">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <table style="color: rgb(22, 22, 22); width: 400px;" class="table-striped table-hover table-bordered m-auto text-primary myTable" >
      
              <tr>
                  <td>Full name </td>
                  <td ><input type="text" class="toggle text-primary in" name="full_name" required style="width: 100%;"></th>      
              </tr>  
              <tr>
                  <td >image </td>
                  <td><input type="file" class="toggle text-primary in"  name="emp_image" required style="width: 100%;"></th>      
              </tr> 
              <tr>
                  <td>Username</td>
                  <td ><input class="toggle text-primary in" type="text" name="username" required style="width: 100%;"></th>      
              </tr>
              <tr>
                  <td>Email</td>
                  <td ><input class="toggle text-primary in" type="email" name="emp-email" required style="width: 100%;"></th>      
              </tr>  
              <tr>
                  <td>Phone</td>
                  <td ><input class="toggle text-primary in" type="number" name="emp_phone" required style="width: 100%;"></th>      
              </tr> 
              <tr>
                  <td>Address</td>
                  <td ><input class="toggle text-primary in" type="text" name="emp_address" required style="width: 100%;"></th>      
              </tr> 
              <tr>
                  <td>Salary</td>
                  <td ><input class="toggle text-primary in" type="number" name="emp_salary" required style="width: 100%;"></th>      
              </tr>
              <tr>
                  <td>Jop</td>
                  <td ><input class="toggle text-primary in" type="text" name="jop" required style="width: 100%;"></th>      
              </tr>
              <tr>
                  <td>Identifier</td>
                  <td ><input class="toggle text-primary in" type="number" name="emp_id" required style="width: 100%;"></th>      
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
        <div class="filter-button-wrapper">
          <button class="action-button filter jsFilter"><span>Filter</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg></button>
          <div class="filter-menu">
            <label>Jop</label>
            <select>
              <option>All Jops</option>
              <option>Drivers</option>       
              <option>Data interers</option>
              <option>Managers</option>
       
            </select>
            
            <div class="filter-menu-buttons">

              <button class="filter-button apply">
                Apply
              </button>
            </div>
          </div>
        </div>
        <button class="action-button list active" title="List View">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
        </button>
        <button class="action-button grid" title="Grid View">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        </button>
      </div>
    </div>
    <div class="products-area-wrapper tableView">
      <div class="products-header">
        <div class="product-cell"> Full Name</div>
        <div class="product-cell image ">Image</div>

        <div class="product-cell "> user Name</div>

        <div class="product-cell category">Email</div>
        <div class="product-cell status-cell">Phone</div>
        <div class="product-cell sales">Address</div>
        <div class="product-cell stock">Salary</div>
        <div class="product-cell ">Jop</div>
        <div class="product-cell ">Identifier</div>

      </div>
      <div class="products-row">
        <button class="cell-more-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
          <div class="product-cell">
            <span>Ahmad</span>
          </div>
          <div class="product-cell">
            <img src="img/team-2.jpg" alt="product">
          </div>
        <div class="product-cell"><span>ahmad434</span></div>

        <div class="product-cell"><span>ahmad434@</span></div>
        <div class="product-cell status-cell"><span >0949040012</span> </div>
        <div class="product-cell sales"><span>Aleppo-alfurkan</span></div>
        <div class="product-cell stock"><span >500000</span></div>
        <div class="product-cell price"><span >driver</span></div>
        <div class="product-cell"><span>0214537235</span></div>

      </div>
      </div>
    </div>
  </div>
@endsection
