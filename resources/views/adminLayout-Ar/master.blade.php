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
    <link rel="stylesheet" href="../css/bootstrap.min.css" />

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
        const modeElement = document.querySelector('.mode-switch');
        console.log(modeElement)
        var isDarkMode = false;
        console.log(isDarkMode)
        modeElement.addEventListener('click', function() {
            if (isDarkMode) {
                document.documentElement.classList.remove('light');
                modeElement.classList.remove("active")
                isDarkMode = false;
                console.log(isDarkMode)
            } else {
                document.documentElement.classList.add('light');
                modeElement.classList.add("active")
                isDarkMode = true;
                console.log(isDarkMode)

            }
            if (isDarkMode) {
                localStorage.setItem('myTheme', 'light')
            } else {
                localStorage.setItem('myTheme', 'dark')
            }
        });
        console.log(isDarkMode)


        //get mode

        const savedTheme = localStorage.getItem('myTheme');
        console.log("store : " + localStorage.getItem('myTheme'))
        if (savedTheme == 'light') {
            document.documentElement.classList.add('light');
            modeElement.classList.add("active")
            isDarkMode = true;
        } else {
            document.documentElement.classList.remove('light');
            modeElement.classList.remove("active")
            isDarkMode = false;
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
    <script src="../js/dashScript.js"></script>
    <!-- fontawesome -->
    <script src="../js/all.min.js"></script>

    <script>
        // var map = L.map('map').setView([51.505, -0.09], 13);
        // // var syriaBounds = L.latLngBounds([[32.312937, 35.700797], [37.319488, 42.377956]]);
        // // map.fitBounds(syriaBounds);

        // L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        // }).addTo(map);

        var map = L.map('add-map').setView([51.505, -0.09], 13); // set the initial view of the map
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { // add the OpenStreetMap tiles
            maxZoom: 18,
            attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
        }).addTo(map);

		map.on('click', function(e) {
			document.getElementById('coordinates').value = e.latlng.lat + ',' + e.latlng.lng;
		});

		var markerIcon = L.icon({
			iconUrl: '{{asset("img/marker.svg")}}',
			iconSize: [25, 41],
			iconAnchor: [12, 41],
			popupAnchor: [1, -34],
		});

		var marker = L.marker([0, 0], {icon: markerIcon}).addTo(map); // add a marker to the map

		map.on('click', function(e) {
			marker.setLatLng(e.latlng); // move the marker to the clicked location
			document.getElementById('coordinates').value = e.latlng.lat + ',' + e.latlng.lng; // update the hidden input field with the coordinates
		});

		// var marker = L.marker([51.505, -0.09]).addTo(map); // add a marker to the map

		// map.on('click', function(e) {
		// 	marker.setLatLng(e.latlng); // move the marker to the clicked location
		// 	document.getElementById('coordinates').value = e.latlng.lat + ',' + e.latlng.lng; // update the hidden input field with the coordinates
		// });


        // var map = L.map('map');

        // var syriaBounds = L.latLngBounds([[32.312937, 35.700797], [37.319488, 42.377956]]);
        // map.fitBounds(syriaBounds);

        // L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //     attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
        //     maxZoom: 18,
        // }).addTo(map);

        // L.marker([51.5, -0.09]).addTo(map)
        //     .bindPopup('A pretty CSS popup.<br> Easily customizable.')
        //     .openPopup();

        // فنكشن أوكورديون الحجز بالأسايد
        function accordion() {
            var btn = document.getElementById("arrow");
            console.log(btn)
            var flush = document.getElementById("flush-collapseOne")
            if (flush.classList.contains("show")) {
                flush.classList.remove("show");
                flush.classList.add("collapsing");
                btn.src = "../img/upload.png";
                console.log(flush.classList)

            } else {
                if (!(flush.classList.contains("show"))) {
                    flush.classList.add("show");
                    flush.classList.remove("collapsing");
                    btn.src = "../img/down-arrow (1).png";
                    console.log(flush.classList)

                }
            }
        }


        // فنكشن إخفاء رسائل النجاح أو الفشل
        function hide() {
            $('.parent').attr("hidden", true);
            $('.parenttrue').attr("hidden", true);
        }
    </script>

    <script>
        // لإظهار البوبأوفر
        $(document).ready(function() {
            $('[ data-bs-toggle="popover"]').popover();
        });

        // إضافة تاريخ جديد لمواصلات الجروبات
        function addDate() {
            var table = document.getElementById("tableDate");
            var newRow = document.createElement("tr");
            var cell1 = document.createElement("td");
            var cell2 = document.createElement("td");
            var cell3 = document.createElement("td");
            cell3.style.textAlign = "center";
            cell2.innerHTML = '<input class="toggle text-primary in" type="date"  required style="width: 100%;">';
            cell1.innerHTML = `<button type="button" class="btn-close m-0 close pl-2 pb-2" onclick="removeRow()">
        <span aria-hidden="true">&times;</span>
        </button>`;
            newRow.appendChild(cell1);
            newRow.appendChild(cell2);
            newRow.appendChild(cell3);
            table.appendChild(newRow);

        }


        // إضافة خدمة جديدة لمكان للجروبات
        function addserv() {
            $(document).ready(function() {
                $('[ data-bs-toggle="popover"]').popover();
            });
            var table = document.getElementById("tablePlace");
            var newRow = document.createElement("tr");
            var cell1 = document.createElement("td");
            var cell2 = document.createElement("td");
            var cell3 = document.createElement("td");
            cell2.innerHTML = `<div class="dropdown toggle text-primary in" style="display:inline-block; ;">
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
          <a class="dropdown-item" href="#">خدمة1</a>
    </div>
    </li>
  </ul>
   
          </div>
        </div>`;
            cell3.innerHTML = `<button type="button" class="btn-close m-0 close pl-2 pb-2" onclick="removeRow()">
        <span  aria-hidden="true">&times;</span>
        </button>`;
            newRow.appendChild(cell1);
            newRow.appendChild(cell2);
            newRow.appendChild(cell3);
            table.appendChild(newRow);
        }

        // حذف سطر من جدول
        function removeRow() {
            var selectedElement = event.target;
            var row = selectedElement.closest('tr');
            row.remove()
        }

        //  إخفاء مودل الخريطة 
        function hidemap() {
            $("#exampleModal6").hide();
            $("#exampleModal7").hide();
            $("#mapimg").click();
            $("#editmapimg").click();

        }


        // إضافة أكثر من صورة
        function addPic(Param_id) {
            var table = document.getElementById("addTable");
            var newRow = document.createElement("tr");
            var cell1 = document.createElement("td");
            var cell2 = document.createElement("td");
            var cell3 = document.createElement("td");
            var close = document.createElement("span");
            close.classList.add("fas", "fa-close", "text-body", "pt-2", "pl-2");
            close.title = "delete pic";
            close.style.fontSize = "15px";
            close.style.cursor = "pointer";
            close.id = Param_id;
            cell1.style.width = "25px";
            cell1.style.textAlign = "center";
            cell1.appendChild(close);
            cell2.innerHTML =
                ' <input type="file" id="pic1" class="toggle text-primary in"  name="event_image" required style="width:75% !important; font-size:16px;">';
            newRow.appendChild(cell1);
            newRow.appendChild(cell2);
            newRow.appendChild(cell3);
            table.appendChild(newRow);
            document.getElementById(close.id).addEventListener('click', function() {
                removeRow();
            });

        }
        // تعديل الصور
        function editPic(Param_id) {
            var table = document.getElementById("editTable");
            var newRow = document.createElement("tr");
            var cell1 = document.createElement("td");
            var cell2 = document.createElement("td");
            var cell3 = document.createElement("td");
            var close = document.createElement("span");
            close.classList.add("fas", "fa-close", "text-body", "pt-2", "pl-2");
            close.title = "delete pic";
            close.style.fontSize = "15px";
            close.style.cursor = "pointer";
            close.id = Param_id;
            cell1.style.width = "25px";
            cell1.style.textAlign = "center";
            cell1.appendChild(close);
            cell2.innerHTML =
                ' <input type="file" id="pic1" class="toggle text-primary in"  name="event_image" required style="width:75% !important; font-size:16px;">';
            newRow.appendChild(cell1);
            newRow.appendChild(cell2);
            newRow.appendChild(cell3);
            table.appendChild(newRow);
            document.getElementById(close.id).addEventListener('click', function() {
                removeRow();
            });

        }
    </script>

</body>

</html>
