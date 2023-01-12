@extends('Layout.Admin')
@section('content')
<div class="container">
     <div class="main">
        <h2>Section | International Accreditation</h2>
        <div class="welcome">     
        </div>
            <button class="tablink" onclick="openPage('Home', this, 'red')"id="defaultOpen">Program Status</button>
            <button class="tablink" onclick="openPage('News', this, 'green')" >Functions</button>
           

            <div id="Home" class="tabcontent">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-17" style="padding-top:1%; font-size:18px">

                        <div class="card mx-5" >
                            <div class="card-header">
                                <h4> Description</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('/Quality-Assurance/International-Accreditation/Save-Description') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="">Description</label>
                                        <textarea type="text" name="description" id="description" class="form-control"></textarea>
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
            
                <table style= "width:90%; margin-left:auto;margin-right:auto;font-size:18px;margin-top:10px;">

                <tr>
                    <thead>
                        <th style="width:72%">DESCRIPTION</th>
                        <th>IMAGE</th>  
                        <th>Action</th>
                    </thead>
                </tr> 
                <tbody>
                    <tr>
                    @foreach($internStatus as $status)
                            <tr>
                                <td>{!!$status->description!!}</td>
                                <td>
                                <img src="{{ asset('uploads/internationa_certificate/' .$status->international_image_status) }}" width="150px">
                                </td>
                                <td>
                                <button type="button" style="width: 54px; padding: 3px 12px;" class="btn btn-primary btn-sm"><a href="{{ url('/Quality-Assurance/International-Accreditation/Edit-Status/'.$status->id) }}" Style="color:white;text-decoration:none;" >Edit</a></button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="delete_status({{$status->id}})">Delete</button>
                                </td>
                            </tr>
                        
                    @endforeach
                    </tr>

                <td colspan="5"><a href="/Quality-Assurance/International-Accreditation/Add-status" type='button' style="width: 300px; padding: 3px 15px; border-radius:5px; text-decoration:none; text-align:center; background-color:green;color:white; margin-left:5%;">Add Certificate</button></a></td>
                </tr>
                    
                </tbody>

                </table>
            </div>

            <div id="News" class="tabcontent">
            <div class="container">
                <div class="row justify-content-center">
                <div class="col-md-17" style="padding-top:0%;">

            <div class="card mx-5">
                <div class="card-header">
                    <h4> International Function</h4>
                </div>
                <div class="card-body" style="font-size:18px">
                    <form action="{{ url('/Quality-Assurance/Accreditation/Save-International-Accreditation') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Description:</label>
                            <textarea class="summernote" name="description" id="descriptions" class="form-control">{!!$internationals->description!!}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Function:</label>
                            <textarea class="summernote" name="function" id="function" class="form-control">{!!$internationals->function!!}</textarea>
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
            $("#description").summernote(
                {
  height: 150,
  focus: true
}
            ).summernote('code', `{!!$status_description->description!!}`);
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
@section('inline_script')
<script>
        function delete_status(id){
            if(confirm("Are you sure to delete this data?")){
                $.post('/Quality-Assurance/International-Accreditation/Delete-status',{id:id,_token:'{{csrf_token()}}'}).then((data)=> {               
                    if(data){
                        window.location.href='/Quality-Assurance/Admin/International-Accreditation';
                    }
                });
            }
        }
</script>
@endsection
