@extends('Layout.main')
@section('content')

<div class="tabs">       
<h1 class="title1">PROGRAM ACCREDITATION</h1>
<div class="container">
          <h1 class="title">Description</h1>
          <p class="description" style="padding:0; border-bottom:none;">{!!$program_function->description!!}</p>
        </div>
<div class="mytabs">
      <input type="radio" id="tabsilver" name="mytabs" checked="checked">
        <label for="tabsilver">Functions</label>
        <div class="tab">               
        {!! $program_function->function!!}
        </div>
            
      
        <input type="radio" id="tabfree" name="mytabs" >
          <label for="tabfree" >Status</label>
              <div class="tab">
                  <h1 class="title2">LIST OF ACCREDITED PROGRAMS FOR ACCREDITATION</h1>
                  <h2 class="title2">As of December 2022</h2> 
                  <table style= "width:100%; margin-left:auto;margin-right:auto; font-size:18px;margin-top:25;" >
              <tr>
            <thead>
                <th>PROGRAM NAME</th>
                <th>LEVEL OF ACCREDITATION</th>
                <th>DATE OF VALIDITY</th>
                <th>REMARKS</th>
                
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
                        
                        </tr>
                    @endif
            @endforeach
            </tr>   
        </tbody>
        </table>
        </div>


        </div> 
    </div>  
@endsection
