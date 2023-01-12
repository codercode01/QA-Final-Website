
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=2.0">
    <link rel = "icon" href ="/css/images/QA Logo Final-1.png" type = "image/x-icon">
    <title>Quality Assurance</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/fullcalendar.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">


    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />

</head>
<body>
    <div class="main-nav">
        <div class="banner">
            <div class="txt">
                <a >QUALITY ASSURANCE</a>
            </div>
            <div class="row">
                <div class="box">
                    <a href="/"><img src="/css/images/QA Logo Final-1.png"  class="logo" alt="mmsu-logo"/></a>
                </div>
            </div>
        </div>

        <nav class="nav-mmsu">
            <div class="wrapper" style="z-index:5">
            <input type="checkbox" id="hamburger">
            <label for="hamburger"style="padding-top:15px">menu</label>
                    <ul class="nav-links" style="padding-top:15px">
                        <li><a href="/">ABOUT QA</a></li>
                        <li><a >SECTION</a>
                            <ul class="drop-menu">
                                <li><a href="/Quality-Assurance/Program-Accreditation">Program Accreditation</a></li>
                                <li><a href="/Quality-Assurance/Institutional-Accreditation">Institutional Accreditation</a></li>
                                <li><a href="/Quality-Assurance/International-Accreditation">International Accreditation</a></li>
                                <li><a href="/Quality-Assurance/Quality-Management-System">Quality Management System</a></li>
                            </ul>
                        </li>
                        <li><a href="/Quality-Assurance/Calendar">CALENDAR</a></li>
                        <li><a href="/Quality-Assurance/Gallery">GALLERY</a></li>
                        <li><a href="/Quality-Assurance/Contact">CONTACT US</a></li>
                    </ul>
                </div>      
            </div>
        </nav>
    </div> 
     @yield('content')
    </div>
    <div>
        @yield('inline_script')

        <footer class="mmsu-footer">
    <h3 style="margin-left:11%;  padding-top:35px;"><strong>QUICK LINKS</strong></h3>
        <div class="row1">
            <div class="content1">
            <ul class="footer-links"> 
                <li><a href="/">ARTICLES</a></li>
                <li><a href="/">DEPARTMENTS</a></li>
                <li><a href="/">DOWNLOADS</a></li>
                <li><a href="/">PUBLICATION</a></li>
            </ul>
            <ul class="footer-links"  > 
                <li><a href="/">NEWS</a></li>
                <li><a href="/">ANNOUNCEMENT</a></li>
                <li><a href="/">OPPORTUNITIES</a></li>
                <li><a href="/"></a></li>          
            </ul>
            </div>
             <img src="/css/images/logo_dn.png" alt="logo" class="img-footer" >
        </div>
        <div class="last-mmsu">
            <p style="margin-bottom:0px"> &copy; 2019 MARIANO MARCOS STATE UNIVERSITY. All Right Reserved</p>
        </div>  
    </footer>

     
</body>
</html>