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
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/loginstyle.css">
    <link rel="stylesheet" href="../css/user.css">

    <!-- font -->
    <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=rawy-thin" />


</head>

<body>

    @include('layout-Ar.header')
    @yield('content')
    @include('layout-Ar.footer')

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
                origin == "http://127.0.0.1:8000/contact-ar") {
                console.log('aborted');
                event.preventDefault();
            }

            if (origin == "http://127.0.0.1:8000/#") {
                event.target.href = "http://127.0.0.1:8000/user_home_arabic"
            }
            if (origin == "http://127.0.0.1:8000/home") {
                event.target.href = "http://127.0.0.1:8000/user_home_arabic"
            }
            if (origin == "http://127.0.0.1:8000/about") {
                event.target.href = "http://127.0.0.1:8000/about-ar"

            }
            if (origin == "http://127.0.0.1:8000/contact-en") {
                event.target.href = "http://127.0.0.1:8000/contact-ar"

            }
        }



        function getURLEn() {

            let origin = window.location.href;
            console.log(origin)
            if (origin == "http://127.0.0.1:8000/" || origin == "http://127.0.0.1:8000/about" || origin ==
                "http://127.0.0.1:8000/contact-en") {
                console.log('aborted');
                preventDefault();
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
        }


        $(document).ready(function() {
        
            $('.carousel').carousel({
                interval: 5000
            })
        })

        //  إخفاء مودل الخريطة 
        function hidemap(modal_id) {
            $('#' + modal_id).hide();
            $('#editmapimg').click();
        }

        function loginBefore() {
            window.location = "/login";
        }
// إظهار وإخفاء توست إلغاء الحجز
      
        function showToast(ticId) {
            $('#toast_' + ticId).removeClass('d-none');
        }

        function hideToast(ticId) {
            $('#toast_' + ticId).addClass('d-none');

        }

    </script>

</body>

</html>
