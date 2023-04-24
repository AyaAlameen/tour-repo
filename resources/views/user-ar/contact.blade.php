@extends('layout-ar.master')
@section('content')

    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">تواصل معنا</h3>
                <div class="d-inline-flex text-white" style="flex-direction:row-reverse;">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">الرئيسة</a></p>
                    <i class="fa fa-angle-double-left pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">تواصل معنا</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-3 pb-3">
                <h1 class="text-primary">تواصل معنا من أجل أي استفسار</h1>
            </div>
            <div class="row justify-content-center" style="direction: rtl;">
                <div class="col-lg-8">
                    <div class="contact-form bg-white" style="padding: 30px;">
                        <div id="success"></div>
                        <form name="sentMessage" id="contactForm" novalidate="novalidate">
                            <div class="form-row mb-4">
                                <div class="control-group col-sm-6">
                                    <input type="text" class="form-control p-4" id="name" disabled value="اسم المستخدم" />
                                   
                                </div>
                              <div class="control-group col-sm-6">
                                    <input type="email" class="form-control p-4" disabled id="email" value="الايميل"/>
                                   
                                </div>
                            </div>

             

                            <div class="control-group">
                                <textarea class="form-control py-3 px-4" rows="5" id="message" placeholder="الرسالة"
                                    required="required"
                                    data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="text-start">
                                <button class="btn btn-primary ml-3 py-3 px-4" style="border-radius:4px;" type="submit" id="sendMessageButton">إرسال</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

@endsection