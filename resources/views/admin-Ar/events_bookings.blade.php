@extends('adminLayout-Ar.master')
@section('admincontent')

<div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">حجوزات الفعاليات</h1>

     
    </div>
    <div class="app-content-actions">
      <input class="search-bar" placeholder="...ابحث" type="text">
      <div class="app-content-actions-wrapper">

        <button class="action-button list " title="عرض جدول">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
        </button>
        <button class="action-button grid" title="عرض لائحة">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        </button>
        <div class="nav-item dropdown" >
                            <button class="action-button list dropdown-toggle" data-toggle="dropdown" title="ترجمة">  <i class="fas fa-globe "  ></i> </button>
                           
                            <div class="dropdown-menu border-0 rounded-0 m-0">
                                <a href="{{route('events_booking_en')}}"  class="dropdown-item">الانكليزية</a>
                                <a href="{{route('events_booking_ar')}}" class="dropdown-item">العربية </a>
                    
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
        <div class="product-cell">الفعالية</div>
        <div class="product-cell"> صاحب الحجز</div>
        <div class="product-cell">عدد الأشخاص</div>  
        <div class="product-cell image ">المكان</div>
        <div class="product-cell image ">الكلفة</div>
        <div class="product-cell">كلفة الحجز</div>
        <div class="product-cell">تاريخ البداية</div>
        <div class="product-cell">تاريخ النهاية</div>

      </div>
      <div class="products-row">
<!-- بداية البيانات -->
          <div class="product-cell">
            <span>كأس العالم</span>
          </div>
          <div class="product-cell">
          <span>بيان</span>
        </div>
        <div class="product-cell">
          <span>6</span>
        </div>
        <div class="product-cell">
          <span>كافيه لايكي</span>
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
