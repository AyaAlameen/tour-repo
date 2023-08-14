@extends('adminLayout-En.master')
@section('admincontent')
    <div class="app-content">
        <div class="app-content-header">

            <h1 class="app-content-headerText">Home2</h1>


        </div>
        <div class="app-content-actions">
           

                <button class="mode-switch" id="mode" title="Switch Theme">
                    <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                        <defs></defs>
                        <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                    </svg>
                </button>
               
                <div class="nav-item dropdown">
                    <button class="action-button list dropdown-toggle" data-bs-toggle="dropdown" title="Translate"> <i
                            class="fas fa-globe "></i> </button>

                    <div class="dropdown-menu border-0 rounded-0 m-0" >
                        <a href="{{ route('welcome_home_en') }}" id="eee" class="dropdown-item">English</a>
                        <a href="{{ route('welcome_home_ar') }}" class="dropdown-item">Arabic </a>

                    </div>
                </div>
                
            </button>
            </div>
        </div>
    </div>
    </div>
@endsection

<script>

</script>
