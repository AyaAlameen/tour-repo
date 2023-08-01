@extends('layout-En.master')
@section('content')

    {{-- بداسة كارد العرض --}}
    <div class="mainCard container w-100 m-auto d-flex" style="border-radius: 10px; margin-top: 50px !important; flex-direction: row-reverse;" >
        
            <img src="../img/pexels-jonathan-borba-2983101.jpg" class="p-5" alt="image" width="500px" height="500px">
        
        <div class="d-flex">
           
            <div class="p-4">
                <div class="d-flex " style="justify-content: space-between;">
                    <h4 class=" p-2 pl-2">event Information</h4>
                </div>
                <p class="pr-2 pl-2 text-body" style="text-align: justify;" >Descriptiin: Lorem ipsum dolor sit a
                    met consectetur adipisicing elit. Commodi nulla, dolor quidem, aspernatur adipisci voluptatem magnam inventore
                     assumenda accusantium ipsum est possimus minus saepe ad, ullam dolore facere vel optio?</p>
                     <div style="display: flex; align-items: baseline; ">
                        <i class="fa fa-location-dot"></i>
                        <h5 class=" p-2 pl-2">Abo malek for food</h5>
                      </div>
                      {{-- اذا كان العرض على خدمة --}}
                      <div style="display: flex; align-items: baseline; ">
                        <i class="fab fa-servicestack"></i>
                        <h5 class=" p-2 pl-2">service name</h5>
                      </div>
                  <div style="display: flex; align-items: baseline; ">
                    <i class="fa fa-calendar-alt"></i>
                    <h5 class=" p-2 pl-2">From :12-4-2023</h5>
                  </div>
                     <div style="display: flex; align-items: baseline; ">
                    <i class="fa fa-calendar-alt"></i>
                    <h5 class=" p-2 pl-2">To :13-4-2023</h5>
                  </div>
                <div class="d-flex h-25 mt-3" style="justify-content: flex-end; align-items: baseline;">
                    <h6 class="d-inline ml-4">cost : 60000</h6>
                    @isset(Auth::user()->id)
                    <button class="btn btn-primary ml-4" data-bs-toggle="modal" data-bs-target="#exampleModal20">book</button>
                    @else
                    <button onclick="loginBefore()" class="btn btn-primary ml-4">book</button>
                    @endisset
                </div>
            </div>
    </div>


    {{-- نهاية كارد العرض --}}

</div>


@endsection