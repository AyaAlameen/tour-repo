@extends('adminLayout.master')
@section('admincontent')

<div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">Places</h1>
      <button class="mode-switch" title="Switch Theme">
        <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
          <defs></defs>
          <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
        </svg>
      </button>
      <button class="app-content-headerButton">Add Place</button>
    </div>
    <div class="app-content-actions">
      <input class="search-bar" placeholder="Search..." type="text">
      <div class="app-content-actions-wrapper">
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

      </div>
      </div>
    </div>
  </div>
@endsection
