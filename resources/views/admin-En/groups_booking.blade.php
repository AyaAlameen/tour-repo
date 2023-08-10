@extends('adminLayout-En.master')
@section('admincontent')

<div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">Groups Bookings</h1>
      <button class="mode-switch" title="Switch Theme">
        <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
          <defs></defs>
          <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
        </svg>
      </button>
     
    </div>
    <div class="app-content-actions"  style="width:86%;">
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
    
    <div class="products-area-wrapper tableView" style="width: 90%:">
      <div class="products-header">
      <div class="product-cell">Group Name</div>
        <div class="product-cell"> Client</div>
        <div class="product-cell">People Count</div>  
        <div class="product-cell image ">cost</div>
        <div class="product-cell">Booking Cost</div>
        <div class="product-cell">Trip start Date</div>
        <div class="product-cell">Trip end Date</div>


 

      </div>
      <div class="products-row">
        <!-- بداية البيانات -->
        <div class="product-cell">
            <span>trip1</span>
          </div>
          <div class="product-cell">
          <span>bayan</span>
        </div>
        <div class="product-cell">
          <span>6</span>
        </div>
       
        <div class="product-cell">
          <span>6</span>
        </div>
        <div class="product-cell">
          <span>36</span>
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
