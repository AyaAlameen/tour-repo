<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TRAVELER - Free Travel Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">
    <!-- bootstrap -->
<link rel="stylesheet" href="../css/bootstrap.min.css"/>
    
    <!-- Font Awesome -->
    <link href="../css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    
<!-- English styles -->
<link href="../css/style-En.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/dashStyle-En.css"> 
 <link href="../css/tablestyle.css" rel="stylesheet" />

 <!-- Google Web Fonts -->
 <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 
   
</head>

<body >



@include ('adminLayout-En.header')
        @yield ('admincontent')
        @include ('adminLayout-En.footer')

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

<!-- Contact Javascript File -->
<script src="../mail/jqBootstrapValidation.min.js"></script>
<script src="../mail/contact.js"></script>

<!-- Template Javascript -->
<script src="../js/main.js"></script>
<script  src="../js/dashScript.js"></script>
<!-- fontawesome -->
<script src="../js/all.min.js"></script>
<script>
  function accordion() {
  var btn = document.getElementById("arrow");
  console.log(btn)
  var flush =document.getElementById("flush-collapseOne")
  if (flush.classList.contains("show")) {
  flush.classList.remove("show");
  flush.classList.add("collapsing");

  btn.src="../img/upload.png";


  console.log(flush.classList)

  }
  
 else 
 {
  if (!(flush.classList.contains("show"))) {

    flush.classList.add("show");
  flush.classList.remove("collapsing");

  btn.src="../img/down-arrow (1).png";



    console.log(flush.classList)

  }
}
  }
  
  
</script>


<script>
//   function active_part() {
//   }
// </script>
</body>

</html>