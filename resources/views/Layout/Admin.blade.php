<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Quality Assurance</title>
    <link rel="stylesheet" type="text/css" href="/css/adminstyle.css">
    <link rel="stylesheet" type="text/css" href="/css/fullcalendar.css">
    <link rel = "icon" href ="/css/Images/QA Logo Final-1.png" type = "image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
</head>
<body>
  <div class="main-nav">    
      <div class="head">
        <h1 class="title" style="font-size:32px">Admin</h1>
        <nav>
         <h2 class="title2" style="font-size:32px">QUALITY ASSURANCE</h2>
        </nav>
      </div>
    
    <div class="sidenav">
        <a href="/admin/dashboard">Dashboard</a>
        <a href="/Quality-Assurance/About/Add-About-Content">About QA</a>
        <button  class="dropdown-btn">Section</button> 
            <div class="dropdown-container">
              <a href="/Quality-Assurance/Admin/Program-Accreditations">Program Accreditation</a>
              <a href="/Quality-Assurance/Admin/Institutional-Accreditation">Institutional Accreditation</a>
              <a href="/Quality-Assurance/Admin/International-Accreditation">International Acrreditation</a>
              <a href="/Quality-Assurance/Admin/Quality-Management-System">Quality Management System</a>
            </div>
        <a href="/Quality-Assurance/Admin/Calendar">Calendar</a>
        <a href="/Quality-Assurance/Admin/Gallery">Gallery</a>
        <a href="/Quality-Assurance/Contact/Add-Contact">Contact</a>
      </div>
    </div> 

    @yield('content')  

    @yield('inline_script')
    <script>
        /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
          dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display == "block") {
              dropdownContent.style.display = "none";
            } else {
              dropdownContent.style.display = "block";
            }
          });
        }
        </script>   
    
    
</body>
</html>