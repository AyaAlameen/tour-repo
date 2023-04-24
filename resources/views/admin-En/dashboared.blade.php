@extends('adminLayout-En.master')
@section('admincontent')
<div class="app-content" >
    <div class="app-content-header" >

    <h1 class="app-content-headerText">Home</h1>
      
  
    </div>
    <div class="app-content-actions" >
      <input class="search-bar" placeholder="Search..." type="text">
      <div class="app-content-actions-wrapper">
      
      <button type="button" class="btn position-relative action-button mr-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Messages
  <span class="position-absolute btn-primary top-0 start-100 translate-middle badge rounded-pill mr-3">
    99+
    
  </span>
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" style="max-width:none;">
    <div class="modal-content m-auto h-100" style="width: 600px;  background-color:var(--header);" >
      <div class="modal-header">
        <h5 class="modal-title" style="color:var(--title-color);" id="exampleModalLabel">Messages received</h5>
        <button type="button" class="btn-close m-0 close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
  <div class="carousel-inner">
    <div class="carousel-item active">
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
    <div class="carousel-item">
    <!-- startcard -->
    <div class="card w-auto" style="padding-inline:80px; background-color:var(--header);">
  <div class="card-body">
    <h5 class="card-title" style="color:var(--title-color);" >user name2</h5>
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
    <div class="carousel-item">
     <!-- startcard -->
     <div class="card w-auto" style="padding-inline:80px; background-color:var(--header);">
  <div class="card-body">
    <h5 class="card-title" style="color:var(--title-color);" >user name3</h5>
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
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" style="background-image:url(../img/previous.png); " aria-hidden="false"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
    <span class="carousel-control-next-icon" style="background-image:url(../img/next.png);" aria-hidden="false"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
      </div>
      
    </div>
  </div>
</div>
        <button class="action-button list" title="List View">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
        </button>
        <button class="action-button grid" title="Grid View">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        </button>
        <div class="nav-item dropdown" >
                            <button class="action-button list dropdown-toggle" data-toggle="dropdown" title="Translate"> <i class="fas fa-globe "  ></i> </button>
                           
                            <div class="dropdown-menu border-0 rounded-0 m-0 toggle">
                                <a href="{{route('home_en')}}" id="eee"  class="dropdown-item">English</a>
                                <a href="{{route('home_ar')}}" class="dropdown-item">Arabic </a>
                    
                            </div>
                        </div>
        <button class="mode-switch"  id="mode" title="Switch Theme">
        <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
          <defs></defs>
          <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
        </svg>
      </button>
      </div>
    </div>
    
  </div>
  </div>



@endsection
