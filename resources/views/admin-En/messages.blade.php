@extends('adminLayout-En.master')
@section('admincontent')

<div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">All Messages</h1>    

    </div>
    

    <div class="app-content-actions">
      <input class="search-bar" placeholder="Search..." type="text">
      <div class="app-content-actions-wrapper">
       
        <div class="nav-item dropdown" >
                            <button class="action-button list dropdown-toggle" data-toggle="dropdown" title="Translate">  <i class="fas fa-globe "  ></i> </button>
                           
                            <div class="dropdown-menu border-0 rounded-0 m-0 toggle">
                                <a href="{{route('message_en')}}"  class="dropdown-item">English</a>
                                <a href="{{route('message_ar')}}" class="dropdown-item">Arabic </a>
                    
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
  <!-- startcard -->
  <div class="card mb-4 w-auto" style="padding-inline:80px; background-color:var(--header);">
  <div class="card-body">
    <h5 class="card-title" style="color:var(--title-color);" >user name1</h5>
    <h6 class="card-subtitle mb-2 text-muted">useremail@gmail.com</h6>
    <p class="card-text" style="color:var(--title-color);" >Some quick example text to build on the card title and make up the bulk of the card's content.</p>
   <div class="d-flex" style="justify-content: space-between;">
     <div class="d-flex align-items-center">
   <input class="mr-1" type="checkbox" id="1"/>
   <lable class="mr-4" for="1" >seen</lable>
   <input class="mr-1" type="checkbox" id="2"/>
   <lable for="2" >post</lable>
   </div>
   <button class="app-content-headerButton" >Delete</button>

   </div>
   
  </div>
</div>
<!-- endcard -->

  <!-- startcard -->
  <div class="card w-auto" style="padding-inline:80px; background-color:var(--header);">
  <div class="card-body">
    <h5 class="card-title" style="color:var(--title-color);" >user name1</h5>
    <h6 class="card-subtitle mb-2 text-muted">useremail@gmail.com</h6>
    <p class="card-text" style="color:var(--title-color);" >Some quick example text to build on the card title and make up the bulk of the card's content.</p>
   <div class="d-flex" style="justify-content: space-between;">
     <div class="d-flex align-items-center">
   <input class="mr-1" type="checkbox" id="1"/>
   <lable class="mr-4" for="1" >seen</lable>
   <input class="mr-1" type="checkbox" id="2"/>
   <lable for="2" >post</lable>
   </div>
   <button class="app-content-headerButton" >Delete</button>

   </div>
   
  </div>
</div>
<!-- endcard -->
      </div>
    </div>
  </div>
@endsection
