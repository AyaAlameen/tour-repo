@extends('layout-En.master')
@section('content')

{{-- Gallery --}}
    <div class="d-flex container mt-2 justify-content-center">
        <div style="width: 45%; height: 540px;">
            <img src="img/440px-Aleppo_Citadel_02_-_Bastion.jpg" width="100%" height="100%">
            <button
                style="position: relative; left:75%; bottom:35px; border-radius:20px; font-size:14px; border-color:var(--app-bg);"
                data-bs-toggle="modal" data-bs-target="#exampleModal">عرض
                جميع الصور</button>

            {{-- picturs modal --}}

            <!-- Modal -->
            <div class="modal fade " data-bs-backdrop="static" id="exampleModal" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " style="max-width: 800px;">
                    <div class="modal-content toggle">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModal3Label">جميع الصور</h5>
                            <button type="button" class="btn-close m-0 close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <!-- صور المكان -->
                            <div id="carouselExample2Indicators" class="carousel slide  m-auto w-100"
                                data-bs-ride="carousel">

                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="img-fluid w-100" style="padding-inline: 80px;"
                                            src="img/36d7d6476b1b16d50bf45f9bcf19bdcc.jpg" alt="">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="img-fluid w-100" style="padding-inline: 80px;"
                                            src="img/36d7d6476b1b16d50bf45f9bcf19bdcc.jpg" alt="">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="img-fluid w-100" style="padding-inline: 80px;"
                                            src="img/36d7d6476b1b16d50bf45f9bcf19bdcc.jpg" alt="">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExample2Indicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon"
                                        style="background-image:url(../img/previous.png); " aria-hidden="false"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExample2Indicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" style="background-image:url(../img/next.png);"
                                        aria-hidden="false"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <!-- نهاية صور المكان -->
                        </div>


                    </div>
                </div>
            </div>
            {{-- end pic modal --}}
        </div>
        <div style="width: 35%; height: 540px;">
            <img src="img/caption.jpg" width="100%" height="60%">
            <img src="img/ALEPPO458976.gif" width="100%" height="40%">
        </div>
    </div>
    {{-- end Gallery --}}

    <div class="serv d-flex" style="flex-direction: row; align-items: center;">

<div class="sidebar">
    <div class="sidebar-header">
        <div class="app-icon">
            <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                <path fill="currentColor"
                    d="M507.606 371.054a187.217 187.217 0 00-23.051-19.606c-17.316 19.999-37.648 36.808-60.572 50.041-35.508 20.505-75.893 31.452-116.875 31.711 21.762 8.776 45.224 13.38 69.396 13.38 49.524 0 96.084-19.286 131.103-54.305a15 15 0 004.394-10.606 15.028 15.028 0 00-4.395-10.615zM27.445 351.448a187.392 187.392 0 00-23.051 19.606C1.581 373.868 0 377.691 0 381.669s1.581 7.793 4.394 10.606c35.019 35.019 81.579 54.305 131.103 54.305 24.172 0 47.634-4.604 69.396-13.38-40.985-.259-81.367-11.206-116.879-31.713-22.922-13.231-43.254-30.04-60.569-50.039zM103.015 375.508c24.937 14.4 53.928 24.056 84.837 26.854-53.409-29.561-82.274-70.602-95.861-94.135-14.942-25.878-25.041-53.917-30.063-83.421-14.921.64-29.775 2.868-44.227 6.709-6.6 1.576-11.507 7.517-11.507 14.599 0 1.312.172 2.618.512 3.885 15.32 57.142 52.726 100.35 96.309 125.509zM324.148 402.362c30.908-2.799 59.9-12.454 84.837-26.854 43.583-25.159 80.989-68.367 96.31-125.508.34-1.267.512-2.573.512-3.885 0-7.082-4.907-13.023-11.507-14.599-14.452-3.841-29.306-6.07-44.227-6.709-5.022 29.504-15.121 57.543-30.063 83.421-13.588 23.533-42.419 64.554-95.862 94.134zM187.301 366.948c-15.157-24.483-38.696-71.48-38.696-135.903 0-32.646 6.043-64.401 17.945-94.529-16.394-9.351-33.972-16.623-52.273-21.525-8.004-2.142-16.225 2.604-18.37 10.605-16.372 61.078-4.825 121.063 22.064 167.631 16.325 28.275 39.769 54.111 69.33 73.721zM324.684 366.957c29.568-19.611 53.017-45.451 69.344-73.73 26.889-46.569 38.436-106.553 22.064-167.631-2.145-8.001-10.366-12.748-18.37-10.605-18.304 4.902-35.883 12.176-52.279 21.529 11.9 30.126 17.943 61.88 17.943 94.525.001 64.478-23.58 111.488-38.702 135.912zM266.606 69.813c-2.813-2.813-6.637-4.394-10.615-4.394a15 15 0 00-10.606 4.394c-39.289 39.289-66.78 96.005-66.78 161.231 0 65.256 27.522 121.974 66.78 161.231 2.813 2.813 6.637 4.394 10.615 4.394s7.793-1.581 10.606-4.394c39.248-39.247 66.78-95.96 66.78-161.231.001-65.256-27.511-121.964-66.78-161.231z" />
            </svg>
        </div>
    </div>
    <ul class="sidebar-list">
        <li class="sidebar-list-item">
            <a>
                <i class="fas fa-filter"></i>
                <span>filter </span>
            </a>
        </li>
        <li class="sidebar-list-item ">
            <a>
                <i class="fas fa-users"></i>

                <span> عدد الأشخاص :</span>
            </a>
        </li>

        <li class="sidebar-list-item">

            <input type="number" class="w-100" style="margin-right: 20px;">

        </li>

        <li class="sidebar-list-item">
            <a>
                <i class="fas fa-dolar"></i>
                <span>السعر بالليرة السوري:</span>
            </a>
        </li>


        <li class="sidebar-list-item ">
            <a>
                <label for="rang1" style="font-family: 'Courier New', Courier, monospace; font-size: 18px;">
                    <input type="radio" name="option" id="rang1">
                    1000-2000
                </label>
            </a>
        </li>

        <li class="sidebar-list-item ">
            <a>
                <label for="rang2" style="font-family: 'Courier New', Courier, monospace; font-size: 18px;">
                    <input type="radio" name="option" id="rang2">
                    1500-1800
                </label>
            </a>
        </li>

        <li class="sidebar-list-item ">
            <a>
                <label for="rang3" style="font-family: 'Courier New', Courier, monospace; font-size: 18px;">
                    <input type="radio" name="option" id="rang3">
                    133300-200333
                </label>
            </a>
        </li>

</div>
<div class="pr-5">

   

    {{-- بداسة كارد الخدمات --}}
    <div class="mainCard  w-75 m-auto " style="border-radius: 10px;">
        <div class="d-flex">
           
            <div class="pt-4">
                <div class="d-flex " style="justify-content: space-between;">
                    <h4 class="text-right p-2 pl-2">اسم الكروب</h4>
                </div>
                <p class="text-right pr-2 pl-2" style="color:#212121">الوصف: سوف ينطلق الكروب في رحلته يوم الأحد من مدينة حلب إلى دمشق و سوف يمر في حماة 
                و سوف يتوقف لمشاهدت النواعرالجميلة و سوف يتغدا الكروب في مطعم النواعر و
                 منه سوف نطلق إلى حمص و سوف ننام في حمص </p>
                    
                    <h5 class="text-right p-2 pl-2">الدليل السياحي:محمد</h5>
                 
                  <div style="display: flex; align-items: baseline; flex-direction: row-reverse">
                    <i class="fa fa-calendar-alt"></i>
                    <h5 class="text-right p-2 pl-2">تاريخ البداية:2023\3\3</h5>
                  </div>
                     <div style="display: flex; align-items: baseline; flex-direction: row-reverse">
                    <i class="fa fa-calendar-alt"></i>
                    <h5 class="text-right p-2 pl-2">تاريخ النهاية:2023\3\3</h5>
                  </div>
                   
                    <h5 class="text-right p-2 pl-2">عدد الأشخاص:10</h5>
                   
            
       

                <div class="d-flex" style="justify-content: flex-end; align-items: baseline;">
                    <h6 class="d-inline ml-4">التكلفة : 60000</h6>
                     @isset(Auth::user()->id)
                    <button class="btn btn-primary ml-4">حجز</button>
                    @else
                    <button onclick="loginBefore()" class="btn btn-primary ml-4">حجز</button>
                    @endisset
                </div>
            </div>

        </div>



    </div>


    {{-- نهاية كارد المكان --}}
</div>




</div>
{{-- نهاية  الخدمات --}}


@endsection