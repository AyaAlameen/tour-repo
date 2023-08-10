@extends('adminLayout-En.master')
@section('admincontent')

<div class="app-content">
    <div class="app-content-header" style="width: 85%;">
      <h1 class="app-content-headerText">Events Bookings</h1>
      @if (\Auth::check())
      @if (\Auth::user()->is_employee == 2)
          <button type="button" class="app-content-headerButton" data-bs-toggle="modal"
              data-bs-target="#exampleModal3">
               add booking
          </button>
          <!-- Modal -->
          <div class="modal fade " id="exampleModal3" data-bs-backdrop="static" tabindex="-1"
              aria-labelledby="exampleModal3Label" aria-hidden="true">
              <div class="modal-dialog ">
                  <div class="modal-content toggle">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModal3Label">New Booking</h5>
                          <button type="button" class="btn-close m-0 close" data-bs-dismiss="modal"
                              aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <form id="add-form" action="" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="modal-body">
                              <table style="width: 400px;"
                                  class="table-striped table-hover table-bordered m-auto text-primary myTable">

                                  <tr>

                                      <td><input type="text" class="toggle text-primary in" name="full_name_ar"
                                              required style="width: 100%;"></th>
                                      <td>full name</td>
                                  </tr>
                                  <tr>
                                      <td colspan="2" class="text-end text-danger p-1"><span></span>
                                      </td>
                                  </tr>
                                  <tr>

                                      <td><input type="number" class="toggle text-primary in" name="identifire"
                                              required style="width: 100%;"></td>
                                      <td>identifire</td>
                                  </tr>
                                  <tr>
                                      <td colspan="2" class="text-end text-danger p-1"><span></span>
                                      </td>
                                  </tr>


                                  <tr>
                                      <td>
                                          <div class="dropdown toggle text-primary" style="display:inline-block;">
                                              <lable class="dropdown-toggle" type="button"
                                                  id="dropdownMenuButton" data-toggle="dropdown"
                                                  aria-expanded="false">

                                              </lable>
                                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                  <a class="dropdown-item" href="#">عرض الشاورما</a>
                                                  <a class="dropdown-item" href="#">عرض الكاتو والعصير</a>
                                              </div>
                                          </div>
                                      </td>
                                      <td>the event</td>

                                  </tr>
                                  <tr>
                                      <td colspan="2"><span class="text-danger"></span></td>

                                  </tr>
                                  <tr>
                                    <td>
                                        <div class="dropdown toggle text-primary" style="display:inline-block;">
                                            <lable class="dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown"
                                                aria-expanded="false">

                                            </lable>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#"> ---</a>
                                                <a class="dropdown-item" href="#">---</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>the service</td>

                                </tr>
                                <tr>
                                    <td colspan="2"><span class="text-danger"></span></td>

                                </tr> 
                                  <tr>

                                    <td><input type="number" class="toggle text-primary in" name="people_count"
                                            required style="width: 100%;"></td>
                                    <td>number of people</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-end text-danger p-1"><span></span>
                                    </td>
                                </tr>
                                <tr>
                                  
                                  <td>
                                      <div class="dropdown toggle text-primary"
                                          style="display:inline-block;">
                                          <lable class="dropdown-toggle" type="button"
                                              id="dropdownMenuButton" data-toggle="dropdown"
                                              aria-expanded="false">
                                              
                                          </lable>
                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                              <a class="dropdown-item" href="#">12:00 - 13:00</a>
                                              <a class="dropdown-item" href="#">13:00 - 14:00</a>
                                          </div>
                                      </div>
                                  </td>
                                  <td>booking period</td>
                               </tr>
                               <tr>
                                  <td colspan="2"><span class="text-danger"></span></td>
                              
                              </tr>
                                  {{-- <tr>
                                      <td><input class="toggle text-primary in" type="date" name="access_date"
                                              required style="width: 100%;"></th>
                                      <td>تاريخ الوصول</td>
                                  </tr>
                                  <tr>
                                      <td colspan="2" class="text-end text-danger p-1"><span
                                            ></span>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td><input class="toggle text-primary in" type="date" name="depart_date"
                                              required style="width: 100%;"></th>
                                      <td>تاريخ المغادرة</td>
                                  </tr>
                                  <tr>
                                      <td colspan="2" class="text-end text-danger p-1"><span></span></td>
                                  </tr> --}}

                                 
                              </table>
                          </div>
                      </form>
                      <div class="modal-footer">
                          <button type="button" class="action-button active close"
                              data-bs-dismiss="modal">close</button>
                          <button type="button" id="add-employee-btn"
                              class="app-content-headerButton">save</button>
                      </div>
                  </div>
              </div>
          </div>
      @endif
  @endif
      
    </div>
    <div class="app-content-actions"  style="width:85%;">
      <input class="search-bar" placeholder="Search..." type="text">
      <div class="app-content-actions-wrapper">

        
        <div class="nav-item dropdown" >
                            <button class="action-button list dropdown-toggle" data-bs-toggle="dropdown" title="Translate">  <i class="fas fa-globe "  ></i> </button>
                           
                            <div class="dropdown-menu border-0 rounded-0 m-0 toggle">
                                <a href="{{route('events_booking_en')}}"  class="dropdown-item">English</a>
                                <a href="{{route('events_booking_ar')}}" class="dropdown-item">Arabic </a>
                    
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
    <div class="scroll-class" style="width:85%;">
    <div class="products-area-wrapper tableView">
      <div class="products-header">
      <div class="product-cell">Events Name</div>
        <div class="product-cell"> Client</div>
        <div class="product-cell">People Count</div>  
        <div class="product-cell image ">pLlace</div>
        <div class="product-cell image ">cost</div>
        <div class="product-cell">Start Date</div>
        <div class="product-cell">End Date</div>


 

      </div>
      <div class="products-row">
        <!-- بداية البيانات -->
        <div class="product-cell">
            <span>world Cup </span>
          </div>
          <div class="product-cell">
          <span>bayan</span>
        </div>
        <div class="product-cell">
          <span>6</span>
        </div>
        <div class="product-cell">
          <span>Liki cafee</span>
        </div>
        <div class="product-cell">
          <span>6</span>
        </div>
        
        <div class="product-cell">
          <span>6-6-2023</span>
        </div>
        <div class="product-cell">
          <span>8-6-2023</span>
        </div>
        <!-- نهاية البيانات -->
        
      </div>
      </div>
    </div>
</div>
  </div> 
@endsection
