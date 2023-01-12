@extends('Layout.Admin')
@section('content')
<div class="container">
     <div class="main">
        <h2>Section | Institutional Accreditation</h2>
        <div class="welcome">     
        </div>
            <button class="tablink" onclick="openPage('Home', this, 'red')"id="defaultOpen">Program Status</button>
            <button class="tablink" onclick="openPage('News', this, 'green')" >Functions</button>
           

            <div id="Home" class="tabcontent">
            <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-17" style="padding-top:0%;">

            <div class="card mx-5" >
                <div class="card-header" style="font-size:18px">
                    <h4> Institutional Status</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/Quality-Assurance/Accreditation/Save-Institutional-Status') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="">Institutional Status:</label>
                            <textarea type="text" class="summernote" name="status" id="status" class="form-control">{!!$institutionals_status->status!!}</textarea>
                        </div>
                        
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
            </div>

            <div id="News" class="tabcontent">
            <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-17" style="padding-top:0%;">

            <div class="card mx-5" >
                <div class="card-header">
                    <h4> Institutional Function</h4>
                </div>
                <div class="card-body" style="font-size:18px;">
                    <form action="{{ url('/Quality-Assurance/Accreditation/Save-Institutional-Accreditation') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Description:</label>
                            <textarea class="summernote" name="description" id="descriptions" class="form-control">{!!$institutionals->description!!}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Function:</label>
                            <textarea class="summernote" name="function" id="function" class="form-control"> {!!$institutionals->function!!}</textarea>
                        </div>
                        
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
            </div>

           
      </div> 


            <script>
                function openPage(pageName,elmnt,color) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablink");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].style.backgroundColor = "";
                }
                document.getElementById(pageName).style.display = "block";
                elmnt.style.backgroundColor = color;
                }

                // Get the element with id="defaultOpen" and click on it
                document.getElementById("defaultOpen").click();

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
              <script>
        $(document).ready(function() {
            $("#status").summernote(
                {
  height: 200,
  focus: true
}
            );
            $('.dropdown-toggle').dropdown();
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#function").summernote(
                {
  height: 450,
  focus: true
}
            );
            $('.dropdown-toggle').dropdown();
        });
</script>

<script>
        $(document).ready(function() {
            $("#descriptions").summernote(
                {
  height: 100,
  focus: true
}
            );
            $('.dropdown-toggle').dropdown();
        });
</script>
@endsection
