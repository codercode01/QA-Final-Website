@extends('Layout.main')
@section('content')

<div class="tabs">       
<h1 class="title1">QUALITY MANAGEMENT SYSTEM</h1>
<div class="container">
          <h1 class="title">Description</h1>
          <p class="description" style="padding:0; border-bottom:none;">{!!$qms->description!!}</p>
        </div>
<div class="mytabs">
      <input type="radio" id="tabsilver" name="mytabs" checked="checked">
        <label for="tabsilver">Functions</label>
        <div class="tab">               
        {!! $qms->function!!}
        </div>

      
        <input type="radio" id="tabfree" name="mytabs" >
          <label for="tabfree">Status</label>
              <div class="tab">
              <h1 class="title2">Quality Management System Certificate</h1>
              
              <div class="row1">
              @foreach($qms_status as $status)
                        <div class="column">
                        
                                <div class="content">
                                <img src="{{ asset('uploads/qms_certificate/' .$status->qms_image_status) }}" style="width:100%;">
                                    <p style="padding:5px;">{!!$status->description!!}</p>
                                    </div>
                        
                                </div>
                                @endforeach
                    </div>
                    

                <div class="container">
                                    <p class="description1">{!!$status_description->description!!}</p>
                </div>
            
       
    </div>
</div>
        </div>


        </div> 
    </div>  
@endsection