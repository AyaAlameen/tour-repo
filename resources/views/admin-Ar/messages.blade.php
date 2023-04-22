@extends('adminLayout-Ar.master')
@section('admincontent')

<div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText"> جميع الرسائل</h1>

     
    </div>
    <div class="app-content-actions">
      <input class="search-bar" placeholder="...ابحث" type="text">
      <div class="app-content-actions-wrapper">

        <div class="nav-item dropdown" >
                            <button class="action-button list dropdown-toggle" data-toggle="dropdown" title="ترجمة">  <i class="fas fa-globe "  ></i> </button>
                           
                            <div class="dropdown-menu border-0 rounded-0 m-0 toggle">
                                <a href="{{route('message_en')}}"  class="dropdown-item">الانجلزية</a>
                                <a href="{{route('message_ar')}}" class="dropdown-item">العربية </a>
                    
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

       <!-- startcard -->
       <div class="card w-auto mb-4" style="padding-inline:80px; background-color:var(--header);">
  <div class="card-body">
    <h5 class="card-title" style="color:var(--title-color); text-align:end;" >المستخدم الثاني</h5>
    <h6 class="card-subtitle mb-2 text-muted" style="text-align:end;">useremail@gmail.com</h6>
    <p class="card-text" style="color:var(--title-color); text-align:end;" >كان الموقع جميل و مفيد و اطلعنا على حضارة سورية و ثقافتها </p>
    <div class="d-flex" style="justify-content: space-between;">
    
   <button class="app-content-headerButton" >حذف</button>

   <div class="d-flex align-items-center">
   <lable class="ml-4" for="1" >رأيت</lable>
   <input class="ml-1" type="checkbox" id="1"/>
   <lable class="ml-3" for="2" >نشر</lable>
   <input class="ml-1" type="checkbox" id="2"/>
   </div>
   </div>
   
  </div>
</div>
<!-- endcard -->

       <!-- startcard -->
       <div class="card w-auto mb-4" style="padding-inline:80px; background-color:var(--header);">
  <div class="card-body">
    <h5 class="card-title" style="color:var(--title-color); text-align:end;" >المستخدم الثاني</h5>
    <h6 class="card-subtitle mb-2 text-muted" style="text-align:end;">useremail@gmail.com</h6>
    <p class="card-text" style="color:var(--title-color); text-align:end;" >كان الموقع جميل و مفيد و اطلعنا على حضارة سورية و ثقافتها </p>
    <div class="d-flex" style="justify-content: space-between;">
    
   <button class="app-content-headerButton" >حذف</button>

   <div class="d-flex align-items-center">
   <lable class="ml-4" for="1" >رأيت</lable>
   <input class="ml-1" type="checkbox" id="1"/>
   <lable class="ml-3" for="2" >نشر</lable>
   <input class="ml-1" type="checkbox" id="2"/>
   </div>
   </div>
   
  </div>
</div>
<!-- endcard -->
      </div>
    </div>
  </div> 
@endsection
