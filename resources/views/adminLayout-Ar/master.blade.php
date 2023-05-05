<!DOCTYPE html>
<html lang="en">

<head id="head">
    <meta charset="utf-8">
    <title>TRAVELER</title>
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


<!-- Arabic styles -->
<link href="../css/style-Ar.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/dashStyle-Ar.css"> 
 <link href="../css/tablestyle.css" rel="stylesheet" />
 
<!-- arabic font -->
<link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=rawy-thin" />


<link rel="stylesheet" href="{{ asset('css/leaflet.css') }}">
<script src="../js/leaflet.js"></script>
</head>

<body>

        @include('adminLayout-Ar.header')
        @yield('admincontent')
        @include('adminLayout-Ar.footer')
<script>
  //switch and save mode
const modeElement =document.querySelector('.mode-switch');
console.log(modeElement)
var isDarkMode= false;
console.log(isDarkMode)
modeElement.addEventListener('click', function () {       
  if (isDarkMode){
  document.documentElement.classList.remove('light');
  modeElement.classList.remove("active")
  isDarkMode=false;
  console.log(isDarkMode)
}
else{
  document.documentElement.classList.add('light');
  modeElement.classList.add("active")
  isDarkMode=true;
  console.log(isDarkMode)

}
if(isDarkMode){
  localStorage.setItem('myTheme','light')
}
else{
  localStorage.setItem('myTheme','dark')
}
  });
  console.log(isDarkMode)


//get mode

const  savedTheme=localStorage.getItem('myTheme');
console.log("store : "+localStorage.getItem('myTheme'))
if(savedTheme=='light'){
  document.documentElement.classList.add('light');
  modeElement.classList.add("active")
  isDarkMode=true;
}
else{
  document.documentElement.classList.remove('light');
  modeElement.classList.remove("active")
  isDarkMode=false;
}
</script>

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
  function hide() {
    $('.parent').attr("hidden", true);
    $('.parenttrue').attr("hidden", true);
 

    }
</script>
<script>
  $(document).ready(function () {
    $('[ data-bs-toggle="popover"]').popover();
  });
  function addDate() {
    $('.toast').toast('show');
  }
 </script>
</body>

</html>