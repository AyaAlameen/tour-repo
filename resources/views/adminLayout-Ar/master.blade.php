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

        function active_part() {
            console.log(event.target)
            var element = document.getElementById(event.target)
            //  var element_color =  element.style.backgroundColor="red";
            localStorage.setItem('bg-color', element);
            //         localStorage.setItem('activeItem', event.target)
            //         console.log(localStorage.getItem('activeItem'))
            //   const Bg_activeItemEle=  localStorage.getItem('activeItem')
            //   activeItemEle.style.color="red";
        }

        var color = localStorage.getItem('bg-color');
        console.log(color)
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

        //----------------------- add map --------------------------------------
        var map = L.map('add-map').setView([51.505, -0.09], 13); // set the initial view of the map
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { // add the OpenStreetMap tiles
            maxZoom: 18,
            attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
        }).addTo(map);

        map.on('click', function(e) {
            document.getElementById('coordinates').value = e.latlng.lat + ',' + e.latlng.lng;
        });

        var markerIcon = L.icon({
            iconUrl: '{{ asset('img/marker.svg') }}',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
        });

        // add a marker to the map
        var marker = L.marker([0, 0], {
            icon: markerIcon
        });

        map.on('click', function(e) {
            marker.addTo(map);
            marker.setLatLng(e.latlng); // move the marker to the clicked location
            document.getElementById('coordinates').value = e.latlng.lat + ',' + e.latlng
                .lng; // update the hidden input field with the coordinates
        });


        // -----------------------------------------------------------------------------
        // ------------------------ show map------------------------------------


        var show_map = L.map('show-map').setView([51.505, -0.09], 13); // set the initial view of the map.
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { // add the OpenStreetMap tiles.
            maxZoom: 18,
            attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
        }).addTo(show_map);
        // ------------------------ show edit map------------------------------------

        var place_for_geolocation;

        var show_edit_map = L.map('show-edit-map').setView([51.505, -0.09], 13); // set the initial view of the map.
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { // add the OpenStreetMap tiles.
            maxZoom: 18,
            attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
        }).addTo(show_edit_map);

        show_edit_map.on('click', function(e) {
            marker.addTo(show_edit_map);
            marker.setLatLng(e.latlng); // move the marker to the clicked location
            document.getElementById(`coordinates_${place_for_geolocation}`).value = e.latlng.lat + ',' + e.latlng
                .lng; // update the hidden input field with the coordinates
        });
        // map.on('click', function(e) {
        //     document.getElementById('coordinates').value = e.latlng.lat + ',' + e.latlng.lng;
        // });

        // var markerIcon = L.icon({
        //     iconUrl: '{{ asset('img/marker.svg') }}',
        //     iconSize: [25, 41],
        //     iconAnchor: [12, 41],
        //     popupAnchor: [1, -34],
        // });

        // // add a marker to the map
        // var marker = L.marker([0, 0], {
        //     icon: markerIcon
        // });

        // map.on('click', function(e) {
        //     marker.addTo(map);
        //     marker.setLatLng(e.latlng); // move the marker to the clicked location
        //     document.getElementById('coordinates').value = e.latlng.lat + ',' + e.latlng
        //         .lng; // update the hidden input field with the coordinates
        // });

        //--------------------------------------------
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
        // لحذف الصور
        document.addEventListener('DOMNodeInserted', function(event) {
            // للإضافة
            const closeElements_add = document.querySelectorAll('[id^="close_"]');
            for (let i = 0; i < closeElements_add.length; i++) {
                closeElements_add[i].addEventListener('click', function() {
                    removeRow();
                });
            }

            // للتعديل
            const closeElements = document.querySelectorAll('[id^="edit_picture_"]');
            for (let i = 0; i < closeElements.length; i++) {
                closeElements[i].addEventListener('click', function() {
                    removeRow();
                });
            }
        });
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
        function hidemap(modal_id) {
            $('#' + modal_id).hide();
               $('#edit_location_img').click()
        }
        // زر حفظ الخريظة
        function spinner() {
            // للإضافة
            setTimeout(function() {
                $("#save-map-btn").attr("disabled", false).html('حفظ');
                $("#exampleModal6").hide();
                $("#exampleModal7").hide();
                $("#mapimg").click();
                $("#editmapimg").click();
            }, 1000); // 2 seconds delay
            $("#save-map-btn").attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');

            //للتعديل
            setTimeout(function() {
                $("#save-map-btn-edit").attr("disabled", false).html('حفظ');
                $("#exampleModal6").hide();
                $("#exampleModal7").hide();
                $("#mapimg").click();
                $("#editmapimg").click();
            }, 1000); // 2 seconds delay
            $("#save-map-btn-edit").attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');


        }

        // إضافة أكثر من صورة
        function addPic() {
            var Param_id = document.getElementById('add-pic-input').getAttribute('data-picid');
            console.log(Param_id);
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
            close.id = "close_" + Param_id;
            document.getElementById('add-pic-input').setAttribute('data-picid', ++Param_id);
            cell1.style.width = "25px";
            cell1.style.textAlign = "center";
            cell1.appendChild(close);
            cell2.innerHTML =
                ` <input type="file"  onchange="previewImage(this, 'add_previewImage_${Param_id}')" id="add_input_${Param_id}" class="toggle text-primary in"  name="image_${Param_id}" required style="width:75% !important; font-size:16px;">
                <label for="add_input_${Param_id}"> <img id="add_previewImage_${Param_id}" width="170px"
                        height="90px" style="display: none; padding:6px;"></label>`;
            newRow.appendChild(cell1);
            newRow.appendChild(cell2);
            newRow.appendChild(cell3);
            table.appendChild(newRow);
        }
        // تعديل الصور
        function editPic() {
            var Param_id = document.getElementById('edit_pic_input').getAttribute('data-picid');
            var table = document.getElementById("editTable");
            var newRow = document.createElement("tr");
            var cell1 = document.createElement("td");
            var cell2 = document.createElement("td");
            var cell3 = document.createElement("td");
            var close = document.createElement("span");
            close.classList.add("fas", "fa-close", "text-body", "pt-2", "pl-2");
            close.title = "delete pic";
            close.style.fontSize = "12px";
            close.style.cursor = "pointer";
            close.id = "edit_picture_" + Param_id;
            document.getElementById('edit_pic_input').setAttribute('data-picid', ++Param_id);
            cell1.style.width = "15px";
            cell1.style.textAlign = "center";
            cell1.appendChild(close);
            cell2.innerHTML =
                ` <input type="file" onchange="previewImage(this, 'edit_previewImage_${Param_id}')" class="toggle text-primary in" id="edit_input_${Param_id}"  required style="width:75% !important; font-size:16px;">
                                            <label for="edit_input_${Param_id}"> <img id="edit_previewImage_${Param_id}"  style="display: none; padding:6px;width:170px; height:90px;"></label>`;
            newRow.appendChild(cell1);
            newRow.appendChild(cell2);
            newRow.appendChild(cell3);
            table.appendChild(newRow);


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

        document.querySelector('.is_add').addEventListener('change', function() {
            if (document.querySelector('.is_add').value == "true")
                document.querySelector('.is_add').value = "false";
            else
            if (document.querySelector('.is_add').value == "false")
                document.querySelector('.is_add').value = "true";
        });

        function showToast(ticId) {
            $('#toast_' + ticId).removeClass('d-none');
        }

        function hideToast(ticId) {
            $('#toast_' + ticId).addClass('d-none');

        }
    </script>

</body>

</html>
