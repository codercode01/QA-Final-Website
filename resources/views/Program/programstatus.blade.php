@extends('Layout.main')
@section('content')

<div class="container" style="text-align:center">
    <div style="padding-top:15%">
        <h2>LIST OF ACCREDITED PROGRAMS FOR ACCREDITATION</h2>
        <h2>As of December 31, 2021<h2>
    </div>
</div>
<br>

    <table style= "width:70%; margin-left:auto;margin-right:auto;"  class="table table-bordered">

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
                        <button type="button" style="width: 58px; padding: 3px 15px;" class="btn btn-primary btn-sm"><a href="/Quality-Assurance/Program-Status/Edit-Program/{{$program->id}}" Style="color:white;text-decoration:none;" >Edit</a></button>
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
                        <button type="button" style="width: 58px; padding: 3px 15px;" class="btn btn-primary btn-sm"><a href="/Quality-Assurance/Program-Status/Edit-Program/{{$program->id}}" Style="color:white;text-decoration:none;" >Edit</a></button>
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
                        <button type="button" style="width: 58px; padding: 3px 15px;" class="btn btn-primary btn-sm"><a href="/Quality-Assurance/Program-Status/Edit-Program/{{$program->id}}" Style="color:white;text-decoration:none;" >Edit</a></button>
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
                        <button type="button" style="width: 58px; padding: 3px 15px;" class="btn btn-primary btn-sm"><a href="/Quality-Assurance/Program-Status/Edit-Program/{{$program->id}}" Style="color:white;text-decoration:none;" >Edit</a></button>
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





