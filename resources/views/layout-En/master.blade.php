<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TRAVELER</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
 <!-- Font Awesome -->
 <link href="../css/all.min.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />


  <!-- Customized Bootstrap Stylesheet -->
<link rel="stylesheet" href="../css/bootstrap.min.css"/>
<link rel="stylesheet" href="../css/loginstyle.css" >
<link href="css/style-En.css" rel="stylesheet">

</head>
<body>

        @include('layout-En.header')
        @yield('content')
        @include('layout-En.footer')

 <!-- Back to Top -->
 <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- bootsrap -->
<script src="../js/bootstrap.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<!-- JavaScript Libraries -->
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="../lib/easing/easing.min.js"></script>
<script src="../lib/owlcarousel/owl.carousel.min.js"></script>
<script src="../lib/tempusdominus/js/moment.min.js"></script>
<script src="../lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="../js/main.js"></script>

<script>
    function getURLAr() {
        
        let origin = window.location.href;
         console.log(origin)
         if (origin == "http://127.0.0.1:8000/user_home_arabic" || origin== "http://127.0.0.1:8000/about-ar" || origin== "http://127.0.0.1:8000/contact-ar" ||  origin== "http://127.0.0.1:8000/transport-ar"  ||  origin== "http://127.0.0.1:8000/travelguides-ar" ||  origin== "http://127.0.0.1:8000/travelguidesformore-ar" ||  origin== "http://127.0.0.1:8000/trip-ar" ||  origin== "http://127.0.0.1:8000/tripmore-ar"){
            console.log('aborted');
            event.preventDefault();

         }
      
            
            if (origin == "http://127.0.0.1:8000/home-en")
            {
              event.target.href="http://127.0.0.1:8000/user_home_arabic"
            }

            if (origin == "http://127.0.0.1:8000/#")
            {
              event.target.href="http://127.0.0.1:8000/user_home_arabic"
            }
            if (origin == "http://127.0.0.1:8000/")
            {
              event.target.href="http://127.0.0.1:8000/user_home_arabic"
            }
        
            if (origin == "http://127.0.0.1:8000/about") {
              event.target.href="http://127.0.0.1:8000/about-ar"
                
            }
            if (origin == "http://127.0.0.1:8000/contact-en") {
              event.target.href="http://127.0.0.1:8000/contact-ar"
                
            }
            if (origin == "http://127.0.0.1:8000/transport") {
              event.target.href="http://127.0.0.1:8000/transport-ar"
                
            }
            if (origin == "http://127.0.0.1:8000/travelguides") {
              event.target.href="http://127.0.0.1:8000/travelguides-ar"
                
            }
            if (origin == "http://127.0.0.1:8000/travelguidesformore") {
              event.target.href="http://127.0.0.1:8000/travelguidesformore-ar"
                
            }
            if (origin == "http://127.0.0.1:8000/trips") {
              event.target.href="http://127.0.0.1:8000/trip-ar"
                
            }
            if (origin == "http://127.0.0.1:8000/tripmore") {
              event.target.href="http://127.0.0.1:8000/tripmore-ar"
                
            }
          }
    


    function getURLEn() {
    
        if (origin == "http://127.0.0.1:8000/home" || origin == "http://127.0.0.1:8000/" ||  origin == "http://127.0.0.1:8000/#" ||  origin== "http://127.0.0.1:8000/about" || origin== "http://127.0.0.1:8000/contact-en" || origin== "http://127.0.0.1:8000/transport" || origin== "http://127.0.0.1:8000/travelguides" || origin== "http://127.0.0.1:8000/travelguidesformore" || origin== "http://127.0.0.1:8000/trips" || origin== "http://127.0.0.1:8000/tripmore"){
            console.log('aborted');
            event.preventDefault();
         }
        
            if (origin == "http://127.0.0.1:8000/user_home_arabic")
            {
              event.target.href="http://127.0.0.1:8000/#"
            }
            if (origin == "http://127.0.0.1:8000/user_home_arabic")
            {
              event.target.href="http://127.0.0.1:8000/"
            }
            if (origin == "http://127.0.0.1:8000/about-ar") {
              event.target.href="http://127.0.0.1:8000/about"
                
            }
            if (origin == "http://127.0.0.1:8000/contact-ar") {
              event.target.href="http://127.0.0.1:8000/contact-en"
                
            }
            if (origin == "http://127.0.0.1:8000/transport-ar") {
              event.target.href="http://127.0.0.1:8000/transport"
                
            }
            if (origin == "http://127.0.0.1:8000/travelguides-ar") {
              event.target.href="http://127.0.0.1:8000/travelguides"
                
            }
            if (origin == "http://127.0.0.1:8000/travelguidesformore-ar") {
              event.target.href="http://127.0.0.1:8000/travelguidesformore"
                
            }
            if (origin == "http://127.0.0.1:8000/trip-ar") {
              event.target.href="http://127.0.0.1:8000/trips"
                
            }
            if (origin == "http://127.0.0.1:8000/tripmore-ar") {
              event.target.href="http://127.0.0.1:8000/tripmore"
                
            }
            if (origin == "http://127.0.0.1:8000/place_details_ar") {
              event.target.href="http://127.0.0.1:8000/place_details_en"
                
            }
            if (origin == "http://127.0.0.1:8000/user_city_ar") {
              event.target.href="http://127.0.0.1:8000/user_city_en"
                
            }
           
         }
         function loginBefore() {
        window.location = "/login";
    }

    
  function showToast(ticId) {
            $('#toast_' + ticId).removeClass('d-none');
        }

        function hideToast(ticId) {
            $('#toast_' + ticId).addClass('d-none');

        }
 // فنكشن إخفاء رسائل النجاح أو الفشل
 function hide() {
            $('.parent').attr("hidden", true);
            $('.parenttrue').attr("hidden", true);
        }
</script>
</body>

</html>