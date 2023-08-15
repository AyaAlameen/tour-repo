@extends('adminLayout-Ar.master')
@section('admincontent')
    <div class="app-content d-flex" style="flex-direction: column;" >
        <div class="app-content-header">
            <h1 class="app-content-headerText">الرئيسة</h1>
        </div>
        <div class="app-content-actions w-100" style="justify-content: left;">
           
                <div class="nav-item dropdown">
                    <button class="action-button list dropdown-toggle" data-bs-toggle="dropdown" title="ترجمة"> <i
                            class="fas fa-globe"></i> </button>

                    <div class="dropdown-menu border-0 rounded-0 m-0 toggle">
                        <a href="{{ route('welcome_home_ar') }}" class="dropdown-item"> العربية</a>
                        <a href="{{ route('welcome_home_en') }}" class="dropdown-item">الانجليزية </a>

                    </div>
                </div>
                <button class="mode-switch" title="تبديل الثيم">
                    <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                        <defs></defs>
                        <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                    </svg>
                </button>
            </div>
            <div class="container mt-2">
                <img src="../img/undraw_Hello_re_3evm.png"  width="100%">
                <h1 style="text-align: center; direction: rtl;">مرحبا {{ Auth::user()->user_name }}</h1>
                <h3 class="text-body" style="text-align: center;">استمتع بوقتك</h3>
    
            </div>
        </div>
      
        
    
    </div>
 
@endsection


<script>


    
</script>
