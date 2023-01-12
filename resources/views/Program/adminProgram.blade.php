@extends('Layout.Admin')
@section('content')
<div class="container">
     <div class="main">
        <h2>Section | Program Accreditation</h2>
        <div class="welcome">     
        </div>
            <button class="tablink" onclick="openPage('Home', this, 'red')"id="defaultOpen">Program Status</button>
            <button class="tablink" onclick="openPage('News', this, 'green')" >Functions</button>
           

            <div id="Home" class="tabcontent">
                <table style= "width:100%; margin-left:auto;margin-right:auto; font-size:18px;margin-top:80px;" >

            <tr>
                <thead>
                    <th>PROGRAM NAME</th>
                    <th>LEVEL OF ACCREDITATION</th>
                    <th>DATE OF VALIDITY</th>
                    <th>REMARKS</th>
                    <th>Action</th>
                </thead>
                    <td style="font-weight:bold; font-style:italic" colspan="5">Undergraduate</td>
            </tr> 
                <td style="font-weight:bold; text-decoration:underline;" colspan="5">City of Batac Campus</td>
            <tbody>
                <tr>
                @foreach($programs as $program)
                    @if($program->Campus == 'batac')
                        <tr>
                            <td>{{$program->program_name}}</td>
                            <td>{{$program->level_accreditation}}</td>
                            <td>{{$program->from_date}} - {{$program->to_date}}</td>
                            <td>{{$program->remarks}}</td>
                            <td>
                            <button type="button" style="width: 54px; padding: 3px 15px;" class="btn btn-primary btn-sm"><a href="/Quality-Assurance/Program-Status/Edit-Program/{{$program->id}}" Style="color:white;text-decoration:none;" >Edit</a></button>
                            <button type="button" class="btn btn-danger btn-sm" onclick="delete_program({{$program->id}})">Delete</button>
                            </td>
                        </tr>
                    @endif
                    
                @endforeach
                </tr>
            <tbody>
            <td colspan="5"></td>
            <tr>
                <td style="font-weight:bold; text-decoration:underline;" colspan="5">Laoag City Campus</td>
            </tr>
                <tr>
                @foreach($programs as $program)
                    @if($program->Campus == 'laoag')
                        <tr>
                            <td>{{$program->program_name}}</td>
                            <td>{{$program->level_accreditation}}</td>
                            <td>{{$program->from_date}} - {{$program->to_date}}</td>
                            <td>{{$program->remarks}}</td>
                            <td>
                            <button type="button" style="width: 54px; padding: 3px 15px;" class="btn btn-primary btn-sm"><a href="/Quality-Assurance/Program-Status/Edit-Program/{{$program->id}}" Style="color:white;text-decoration:none;" >Edit</a></button>
                            <button type="button" class="btn btn-danger btn-sm" onclick="delete_program({{$program->id}})">Delete</button>
                            </td>
                        </tr>
                    @endif
                    
                @endforeach
                </tr>
                <td colspan="5"></td>
            <tr>
                <td style="font-weight:bold; text-decoration:underline;" colspan="5">Curimao Campus</td>
            </tr>
                <tr>
                @foreach($programs as $program)
                    @if($program->Campus == 'curimao')

                        <tr>
                            <td>{{$program->program_name}}</td>
                            <td>{{$program->level_accreditation}}</td>
                            <td>{{$program->from_date}} - {{$program->to_date}}</td>
                            <td>{{$program->remarks}}</td>
                            <td>
                            <button type="button" style="width: 54px; padding: 3px 15px;" class="btn btn-primary btn-sm"><a href="/Quality-Assurance/Program-Status/Edit-Program/{{$program->id}}" Style="color:white;text-decoration:none;" >Edit</a></button>
                            <button type="button" class="btn btn-danger btn-sm" onclick="delete_program({{$program->id}})">Delete</button>
                            </td>
                        </tr>

                    @endif
                @endforeach
                </tr>
            <tr>   
                <td style="font-weight:bold; font-style:italic" colspan="5">Graduate</td>
            </tr>

                <tr>
                @foreach($programs as $program)
                            @if($program->level == 'graduate')
                            <tr>
                            <td>{{$program->program_name}}</td>
                            <td>{{$program->level_accreditation}}</td>
                            <td>{{$program->from_date}} - {{$program->to_date}}</td>
                            <td>{{$program->remarks}}</td>
                            <td>
                            <button type="button" style="width: 54px; padding: 3px 15px;" class="btn btn-primary btn-sm"><a href="/Quality-Assurance/Program-Status/Edit-Program/{{$program->id}}" Style="color:white;text-decoration:none;" >Edit</a></button>
                            <button type="button" class="btn btn-danger btn-sm" onclick="delete_program({{$program->id}})">Delete</button>
                            </td>
                            </tr>
                        @endif
                @endforeach
                </tr>
            <tr>
            <td colspan="5"><a href="/Quality-Assurance/Program-Status/Add-Program" type='button' style="width: 300px; padding: 3px 15px; border-radius:5px; text-decoration:none; text-align:center; background-color:green;color:white; margin-left:5%;">Add Program</button></a></td>
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
                    <h4> Program Function</h4>
                </div>
                <div class="card-body"style="font-size:18px;">
                    <form action="{{ url('/Quality-Assurance/Program-Accreditation/Save-Program-Accreditation') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Description:</label>
                            <textarea class="summernote" name="description" id="description" class="form-control">{!! $program_function->description!!}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Function:</label>
                            <textarea class="summernote" name="function" id="function" class="form-control">{!! $program_function->function!!}</textarea>
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
        function delete_program(id){
            if(confirm("Are you sure to delete this program?")){
                $.post('/Quality-Assurance/Program-Status/Delete-Program',{id:id,_token:'{{csrf_token()}}'}).then((data)=> {               
                    if(data){
                        window.location.href='/Quality-Assurance/Admin/Program-Accreditations';
                    }
                });
            }
        }
</script>
@endsection