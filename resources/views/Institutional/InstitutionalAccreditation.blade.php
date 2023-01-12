@extends('Layout.main')
@section('content')

<div class="tabs">       
<h1 class="title1">INSTITUTIONAL ACCREDITATION</h1>
<div class="container">
          <h1 class="title">Description</h1>
          <p class="description" style="padding:0; border-bottom:none;">{!!$institutionals->description!!}</p>
        </div>
<div class="mytabs">
      <input type="radio" id="tabsilver" name="mytabs" checked="checked">
        <label for="tabsilver">Functions</label>
        <div class="tab">               
        {!! $institutionals->function!!}
        </div>

      
        <input type="radio" id="tabfree" name="mytabs" >
          <label for="tabfree">Status</label>
              <div class="tab">
              <h1 class="title2">{!!$institutionals_status->status!!}</h1>
        </div>


        </div> 
    </div>  
@endsection