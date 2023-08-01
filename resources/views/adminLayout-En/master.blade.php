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
  
     // عرض الصور بدل الأسماء

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
     

       function removeRow() {
        var thirdParent=event.target.parentElement.parentElement.parentElement;
     console.log(event.target.parentElement.parentElement.parentElement)  
     thirdParent.remove();
       }

       $(document).ready(function () {
    $('[ data-bs-toggle="popover"]').popover();
  });

  function showToast(ticId) {
            $('#toast_' + ticId).removeClass('d-none');
        }

        function hideToast(ticId) {
            $('#toast_' + ticId).addClass('d-none');

        }

//   document.querySelector('.is_add').addEventListener('change', function() {
//    if( document.querySelector('.is_add').value == "true")
//     document.querySelector('.is_add').value = "false";
//     else
//     if( document.querySelector('.is_add').value == "false")
//     document.querySelector('.is_add').value = "true";
// });
 </script>

</body>

</html>