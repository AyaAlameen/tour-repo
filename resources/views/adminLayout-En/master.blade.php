<!DOCTYPE html>
<html lang="en">

<head>
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
    
<!-- English styles -->
<link href="../css/style-En.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/dashStyle-En.css"> 
 <link href="../css/tablestyle.css" rel="stylesheet" />
 <link rel="stylesheet" href="{{ asset('css/leaflet.css') }}">
 <script src="{{ asset('js/leaflet.js') }}"></script>

</head>

<body>



@include ('adminLayout-En.header')
        @yield ('admincontent')
        @include ('adminLayout-En.footer')

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
  

  function addDate() {
   var table =document.getElementById("tableDate").innerHTML;
   console.log(table)

   document.getElementById("tableDate").innerHTML = table + `   <tr>
           <td>The date of the day the transportation will be used</td>
           <td><input class="toggle text-primary in" type="date"  required style="width: 100%;"></td> 
           <td><button type="button" class="btn-close m-0 close" onclick="removeRow()" data-bs-dismiss="transportRow" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></td>
      </tr>`
      console.log(table)
  }
     

  function addPlace() {
    $(document).ready(function () {
    $('[ data-bs-toggle="popover"]').popover();
  });
   var table =document.getElementById("tablePlace").innerHTML;
   console.log(table)

   document.getElementById("tablePlace").innerHTML = table +       `      <tr>
           <td>Place</td>
           <td style="width:300px;" ><div class="dropdown toggle text-primary in" style="display:inline-block; ;">
          <label  class="dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">  
            
          </label>
          <div class="dropdown-menu"  aria-labelledby="dropdownMenuButton">
          <ul>
    <li>
    <div class="d-inline-block w-100" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus"
           data-bs-content='cost : (12)  description : Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque nihil dolores totam eum cum,
             ipsum perspiciatis debitis .'>
          <a class="dropdown-item" href="#">place1</a>
    </div>
    </li>
  </ul>
   
          </div>
        </div></td>
        <td style="width:30px; padding-right:6px !important;"><button type="button" class="btn-close m-0 close" onclick="removeRow()">
        <span  aria-hidden="true">&times;</span>
        </button></td>
      </tr>
      <tr>
           <td>services</td>
           <td style="width:300px;" ><div class="dropdown toggle text-primary in" style="display:inline-block; ;">
          <label  class="dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
<!--lable disabled هي الجملة منعرضا بحال كان المكان مالو خدمات ومنعمل ال  -->
            <!-- there is no services in this place -->
          </label>
          <div class="dropdown-menu"  aria-labelledby="dropdownMenuButton">
          <ul>
    <li>
    <div class="d-inline-block w-100" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus"
           data-bs-content='cost : (12)  description : Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque nihil dolores totam eum cum,
             ipsum perspiciatis debitis .'>
          <a class="dropdown-item" href="#">servic1</a>
    </div>
    </li>
  </ul>
   
          </div>
        </div></td>
        <td style="width:30px; padding-right:6px !important;"><button type="button" class="btn-close m-0 close" onclick="removeRow()">
        <span  aria-hidden="true">&times;</span>
        </button></td>
      </tr>`
      console.log(table)
  }

       function removeRow() {
        var thirdParent=event.target.parentElement.parentElement.parentElement;
     console.log(event.target.parentElement.parentElement.parentElement)  
     thirdParent.remove();
       }

       function removePlace() {
        var fourthParent=event.target.parentElement.parentElement.parentElement.parentElement;
     console.log(event.target.parentElement.parentElement.parentElement.parentElement)  
     fourthParent.remove();
       }
       $(document).ready(function () {
    $('[ data-bs-toggle="popover"]').popover();
  });

 </script>

</body>

</html>