@extends('layout-En.master')
@section('content')

    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Contact</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Contact</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->



     <!-- Contact Start -->
     <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-3 pb-3">
                <h1 class="text-primary">Contact us for any question</h1>
            </div>
            @if (!Auth::check())
                <div class="text-center mb-3 pb-3">
                    <h3 class="text-primary">Log in and create your account for a better communication experience</h3>
                
                </div>
                <div class="row mb-0 mt-3 justify-content-center">
                    <div class="col-md-3 offset-md-10">
                        <a href="{{route('login')}}"><button type="submit" class="btn btn-block text-light"
                            style="background-color:var(--bambi);">
                            {{ __('Login') }}
                        </button></a>
                        
                    </div>
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form bg-white" style="padding: 30px;">
                        <div id="success"></div>
                        <form name="sentMessage" id="contactForm" novalidate="novalidate">
                            @csrf
                            @if (Auth::check())
                            <div class="form-row mb-4">
                                <div class="control-group col-sm-6">
                                    <input type="text" class="form-control p-4" id="name" disabled value="{{ Auth::user()->user_name }}" />
                                   
                                </div>
                              <div class="control-group col-sm-6">
                                    <input type="email" class="form-control p-4" disabled id="email" value="{{ Auth::user()->email }}"/>
                                   
                                </div>
                            </div>
                            @endif

             

                            <div class="control-group">
                                <textarea class="form-control py-3 px-4" name="message" rows="5" id="message" placeholder="Message"
                                    required="required"
                                    data-validation-required-message="Please enter your message"></textarea>
                                <p id="message_error" class="help-block text-danger"></p>
                            </div>
                            <div class="text-end">
                                <button onclick="submitMessage()" class="btn btn-primary ml-3 py-3 px-4" style="border-radius:4px;" type="button" id="sendMessageButton">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

@endsection


<script>
    function submitMessage() {
        console.log('test');
        $("#sendMessageButton").attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
        
        var formData = new FormData(document.getElementById('contactForm'));
        $.ajax({
                url: "{{ route('submitMessageEn') }}",
                type: "POST",
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
                removeMessages();
                $('.parenttrue').attr("hidden", false);
                document.getElementById('contactForm').reset();
            })
            .fail(function(data) {
                $('.parent').attr("hidden", false);

                removeMessages();

                if (data.responseJSON.errors.message) {
                    document.querySelector(`#contactForm #message_error`).innerHTML = data.responseJSON.errors
                        .message[0];

                }
                
            })
            .always(function() {
                // Re-enable the submit button and hide the loading spinner
                $("#sendMessageButton").attr("disabled", false).html('Send');
            });
    }
    function removeMessages(){
        document.getElementById('message_error').innerHTML = '';
    }
</script>