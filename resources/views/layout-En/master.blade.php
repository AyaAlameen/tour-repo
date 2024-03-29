<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TRAVELER</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Font Awesome -->
    <link href="../css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />


    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/loginstyle.css">
    <link href="../css/style-En.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/leaflet.css') }}">
    <script src="../js/leaflet.js"></script>

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
            if (origin == "http://127.0.0.1:8000/user_home_arabic" || origin == "http://127.0.0.1:8000/about-ar" ||
                origin == "http://127.0.0.1:8000/contact-ar" || origin == "http://127.0.0.1:8000/transport-ar" || origin ==
                "http://127.0.0.1:8000/travelguides-ar" || origin == "http://127.0.0.1:8000/travelguidesformore-ar" ||
                origin == "http://127.0.0.1:8000/trip-ar" || origin == "http://127.0.0.1:8000/tripmore-ar") {
                console.log('aborted');
                event.preventDefault();

            }
            if (origin == "http://127.0.0.1:8000/home-en") {
                event.target.href = "http://127.0.0.1:8000/user_home_arabic"
            }
            if (origin == "http://127.0.0.1:8000/home-en#Gallery") {
                event.target.href = "http://127.0.0.1:8000/user_home_arabic"
            }
            if (origin == "http://127.0.0.1:8000/home-en#Nearby") {
                event.target.href = "http://127.0.0.1:8000/user_home_arabic"
            }
            if (origin == "http://127.0.0.1:8000/home-en#Offers") {
                event.target.href = "http://127.0.0.1:8000/user_home_arabic"
            }
            if (origin == "http://127.0.0.1:8000/home-en#Events") {
                event.target.href = "http://127.0.0.1:8000/user_home_arabic"
            }
            if (origin == "http://127.0.0.1:8000/home-en#Trips") {
                event.target.href = "http://127.0.0.1:8000/user_home_arabic"
            }
            if (origin == "http://127.0.0.1:8000/home-en#Governorates") {
                event.target.href = "http://127.0.0.1:8000/user_home_arabic"
            }
            if (origin == "http://127.0.0.1:8000/#") {
                event.target.href = "http://127.0.0.1:8000/user_home_arabic"
            }
            if (origin == "http://127.0.0.1:8000/") {
                event.target.href = "http://127.0.0.1:8000/user_home_arabic"
            }

            if (origin == "http://127.0.0.1:8000/about") {
                event.target.href = "http://127.0.0.1:8000/about-ar"

            }
            if (origin == "http://127.0.0.1:8000/contact-en") {
                event.target.href = "http://127.0.0.1:8000/contact-ar"

            }
            if (origin == "http://127.0.0.1:8000/transport") {
                event.target.href = "http://127.0.0.1:8000/transport-ar"

            }
            if (origin == "http://127.0.0.1:8000/travelguides") {
                event.target.href = "http://127.0.0.1:8000/travelguides-ar"

            }
            if (origin == "http://127.0.0.1:8000/travelguidesformore") {
                event.target.href = "http://127.0.0.1:8000/travelguidesformore-ar"

            }
            if (origin == "http://127.0.0.1:8000/trips") {
                event.target.href = "http://127.0.0.1:8000/trip-ar"

            }
           
            if (origin == "http://127.0.0.1:8000/offer-en") {
                event.target.href = "http://127.0.0.1:8000/offer-ar"

            }
          
            if (origin == "http://127.0.0.1:8000/event-en") {
                event.target.href = "http://127.0.0.1:8000/event-ar"

            }
           
          
            var city_index = [];
            for (var i = 1; i <= 1000; i++) {
                city_index.push(i);
            }

            for (let i = 0; i < city_index.length; i++) {
                if (origin == "http://127.0.0.1:8000/user_city_en/" + city_index[i]) {
                    event.target.href = "http://127.0.0.1:8000/user_city_ar/" + city_index[i]

                }

            }
            for (let i = 0; i < city_index.length; i++) {
                if (origin == "http://127.0.0.1:8000/tripmore/" + city_index[i]) {
                    event.target.href = "http://127.0.0.1:8000/tripmore-ar/" + city_index[i]

                }

            }
            for (let i = 0; i < city_index.length; i++) {
            if (origin == "http://127.0.0.1:8000/place_details_en/" + city_index[i]) {
                event.target.href = "http://127.0.0.1:8000/place_details_ar/"+ city_index[i]

            }
        }
        for (let i = 0; i < city_index.length; i++) {
            if (origin == "http://127.0.0.1:8000/offer_details-en/" + city_index[i]) {
                event.target.href = "http://127.0.0.1:8000/offer_details-en/"+ city_index[i]

            }
        }
        for (let i = 0; i < city_index.length; i++) {
            if (origin == "http://127.0.0.1:8000/event_details-en/" + city_index[i]) {
                event.target.href = "http://127.0.0.1:8000/event_details-en/"+ city_index[i]

            }
        }
        for (let i = 0; i < city_index.length; i++) {
        if (origin == "http://127.0.0.1:8000/travelguidesformore/"+ city_index[i]) {
                event.target.href = "http://127.0.0.1:8000/travelguidesformore-ar/" + city_index[i]

            }
        }
    }



        function getURLEn() {

            if (origin == "http://127.0.0.1:8000/home" || origin == "http://127.0.0.1:8000/" || origin ==
                "http://127.0.0.1:8000/#" || origin == "http://127.0.0.1:8000/about" || origin ==
                "http://127.0.0.1:8000/contact-en" || origin == "http://127.0.0.1:8000/transport" || origin ==
                "http://127.0.0.1:8000/travelguides" || origin == "http://127.0.0.1:8000/travelguidesformore" || origin ==
                "http://127.0.0.1:8000/trips" || origin == "http://127.0.0.1:8000/tripmore" || origin ==
                "http://127.0.0.1:8000/place_details_en" || origin == "http://127.0.0.1:8000/user_city_en") {
                console.log('aborted');
                event.preventDefault();
            }

            if (origin == "http://127.0.0.1:8000/user_home_arabic") {
                event.target.href = "http://127.0.0.1:8000/#"
            }
            if (origin == "http://127.0.0.1:8000/user_home_arabic") {
                event.target.href = "http://127.0.0.1:8000/"
            }
            if (origin == "http://127.0.0.1:8000/about-ar") {
                event.target.href = "http://127.0.0.1:8000/about"

            }
            if (origin == "http://127.0.0.1:8000/contact-ar") {
                event.target.href = "http://127.0.0.1:8000/contact-en"

            }
            if (origin == "http://127.0.0.1:8000/transport-ar") {
                event.target.href = "http://127.0.0.1:8000/transport"

            }
            if (origin == "http://127.0.0.1:8000/travelguides-ar") {
                event.target.href = "http://127.0.0.1:8000/travelguides"

            }
            if (origin == "http://127.0.0.1:8000/travelguidesformore-ar") {
                event.target.href = "http://127.0.0.1:8000/travelguidesformore"

            }
            if (origin == "http://127.0.0.1:8000/trip-ar") {
                event.target.href = "http://127.0.0.1:8000/trips"

            }
            if (origin == "http://127.0.0.1:8000/tripmore-ar") {
                event.target.href = "http://127.0.0.1:8000/tripmore"

            }
            if (origin == "http://127.0.0.1:8000/offer-ar") {
                event.target.href = "http://127.0.0.1:8000/offer-en"

            }
            
            if (origin == "http://127.0.0.1:8000/event-ar") {
                event.target.href = "http://127.0.0.1:8000/event-en"

            }
            
           
            var city_index = [];
            for (var i = 1; i <= 1000; i++) {
                city_index.push(i);
            }
            for (let i = 0; i < city_index.length; i++) {
                if (origin == "http://127.0.0.1:8000/user_city_ar/" + city_index[i]) {
                    event.target.href = "http://127.0.0.1:8000/user_city_en/" + city_index[i];

                }
            }
            
            for (let i = 0; i < city_index.length; i++) {
                if (origin == "http://127.0.0.1:8000/tripmore-ar/" + city_index[i]) {
                    event.target.href = "http://127.0.0.1:8000/tripmore/" + city_index[i];

                }
            }
            for (let i = 0; i < city_index.length; i++) {
            if (origin == "http://127.0.0.1:8000/place_details_ar/"+ city_index[i]) {
                event.target.href = "http://127.0.0.1:8000/place_details_en/" + city_index[i];

            }
        }
        for (let i = 0; i < city_index.length; i++) {
        if (origin == "http://127.0.0.1:8000/event_details-ar/"+ city_index[i]) {
                event.target.href = "http://127.0.0.1:8000/event_details-en/" + city_index[i]

            }
        }
        for (let i = 0; i < city_index.length; i++) {
        if (origin == "http://127.0.0.1:8000/offer_details-ar/"+ city_index[i]) {
                event.target.href = "http://127.0.0.1:8000/offer_details-en/" + city_index[i]

            }
        }
        for (let i = 0; i < city_index.length; i++) {
        if (origin == "http://127.0.0.1:8000/travelguidesformore-ar/"+ city_index[i]) {
                event.target.href = "http://127.0.0.1:8000/travelguidesformore/" + city_index[i]

            }
        }
        }
        
        function loginBefore() {
            window.location = "/login";
        }

//  إخفاء مودل الخريطة 
function hidemap(modal_id) {
            $('#' + modal_id).hide();
            $('#editmapimg').click();
            $('#map_div').click();

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
        // عرض الصور بدل الأسماء
        // ------------------------ show map------------------------------------

            if (document.getElementById('show-map')) {
                var show_map = L.map('show-map').setView([34.8021, 38.9968], 7); // set the initial view of the map.
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { // add the OpenStreetMap tiles.
                    maxZoom: 18,
                    attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
                }).addTo(show_map);
            }


        //--------------------------------------------------

        // ------------------------ show-nearest-map------------------------------------
        function showNearestPlaces() {
            if (document.getElementById('show-nearest-map')) {
                // Create a new map instance
                var show_nearst_map = L.map('show-nearest-map');
                // console.log(show_nearst_map);

                // Use the Geolocation API to get the user's current location
                navigator.geolocation.getCurrentPosition(function(position) {
                    // Get the latitude and longitude from the position object
                    var lat = position.coords.latitude;
                    var lng = position.coords.longitude;
                    console.log(lat);
                    console.log(lng);

                    // Create a new marker at the user's location
                    var marker = L.marker([lat, lng]).addTo(show_nearst_map);

                    // Center the map on the user's location
                    show_nearst_map.setView([lat, lng], 13);
                });

                // var show_nearst_map = L.map('show-nearest-map').setView([51.505, -0.09], 13); // set the initial view of the map.
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { // add the OpenStreetMap tiles.
                    maxZoom: 18,
                    attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
                }).addTo(show_nearst_map);
            }
        }

        //--------------------------------------------------
        

        function previewImage(input, previewId) {
            const previewImage = document.getElementById(previewId);
            const file = input.files[0];
            const reader = new FileReader();
            previewImage.style.display = "inline";
            input.style.display = "none";
            reader.addEventListener('load', function() {
                previewImage.src = reader.result;
            }, false);

            if (file) {
                reader.readAsDataURL(file);
            }
        }
        //----------------------Pre Booking Place-------------------
        function preBookingPlace(place){
            console.log(place);
            if(place.services.length == 0){
                $('#end_date_booking_tr').attr('hidden', true);
                $('#end_date_booking_error_tr').attr('hidden', true);
                $('#reservation_period_booking_tr').attr('hidden', true);
                $('#reservation_period_booking_error_tr').attr('hidden', true);
            }
            

        }
        //--------------------------------------------------
    </script>
</body>

</html>
