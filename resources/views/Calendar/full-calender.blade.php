@extends('Layout.main')

@section('content')
<section class="showcase">
    <img src="/css/images/banner1.jpg" class="img-fluid" alt="mmsu">
</section> 
<div class="container mt-2">
    <div class="row">   
        <div class="card">
            <div class="card-content" style="background: white,linear-gradient;">
                <h1 style="text-align:center">Quality Assurance Calendar</h1>
                <div id="calendar" style="margin-top:5%; z-index:0;"></div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->


<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modalTitle"></h4>
      </div>
      <div class="modal-body">
        <strong> Start:</strong>
        <span id="start"> </span>
        <br>
        <strong> End:</strong>
        <span id="end"></span>
        <br>
        <strong> Description:</strong>
        <span id="description"></span>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

   
<script>

$(document).ready(function () {

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
    var event = @json($events);
    

    $('#calendar').fullCalendar({
        header:{
            left:'prev,next today',
            center:'title',
            right:'month,agendaWeek,agendaDay'
        },
        events: event,
        selectable: true,
        selectHelper: true,
        
        eventClick: function(event, jsEvent, view){
            
          var start = event.start.format("MM-DD-YYYY HH:mm:ss");
          var end = event.end.format("MM-DD-YYYY HH:mm:ss");
          console.log(start)
            
            $('#modalTitle').html(event.title);
            $('#description').html(event.description);
            $('#start').html(start);
            $('#end').html(end);

            
            $('#detailModal').modal("show");
            
            
      },

    });

    

});
  
</script>
@endsection

