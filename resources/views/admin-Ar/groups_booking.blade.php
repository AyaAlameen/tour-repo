@extends('adminLayout-Ar.master')
@section('admincontent')

<div class="app-content" >
    <div class="app-content-header"  >
      <h1 class="app-content-headerText">حجوزات الرحلات</h1>
     
    </div>
    <div class="app-content-actions" style="width: 95%;">
      <input class="search-bar" placeholder="...ابحث" type="text">
      <div class="app-content-actions-wrapper">

        
        <div class="nav-item dropdown" >
                            <button class="action-button list dropdown-toggle" data-bs-toggle="dropdown" title="ترجمة">  <i class="fas fa-globe "  ></i> </button>
                           
                            <div class="dropdown-menu border-0 rounded-0 m-0 toggle">
                                <a href="{{route('groups_booking_en')}}"  class="dropdown-item">الانكليزية</a>
                                <a href="{{route('groups_booking_ar')}}" class="dropdown-item">العربية </a>
                    
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
    
    <div class="products-area-wrapper tableView" style="direction: rtl; width: 100%;">
      <div class="products-header">
        <div class="product-cell">الرحلة</div>
        <div class="product-cell"> صاحب الحجز</div>
        <div class="product-cell">عدد الأشخاص</div>  
        <div class="product-cell image ">الكلفة</div>
        <div class="product-cell">كلفة الحجز</div>
        <div class="product-cell">تاريخ بداية الرحلة</div>
        <div class="product-cell">تاريخ نهاية الرحلة</div>

      </div>
      <div class="products-row">
<!-- بداية البيانات -->
          <div class="product-cell">
            <span>رحلة 1 </span>
          </div>
          <div class="product-cell">
          <span>بيان</span>
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
@endsection
