@extends('Layout.Admin')

@section('content')
<div class="container ">
    <div class="row" style="padding-top:50px">   
        <div class="card">
            <div class="card-content" style="background: white,linear-gradient; padding-left: 30px">
                <h1 style="text-align:center">Quality Assurance Calendar</h1>
                <div id="calendar" style="margin-top:5%; z-index:0;"></div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="EventModal" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="event">Event</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group mb-1">
            <label for="title" class="control-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" required>
                <span id="titleError" class="text-danger"></span>
            </div>
            <div class="form-group mb-1">
                <label for="description" class="control-label">Description</label>
                <textarea rows="3" class="form-control" name="description" id="description" required></textarea>
            </div>
            <div class="form-group mb-1">
                 <label for="start_datetime" class="control-label">Start</label>
                 <input type="datetime-local" class="form-control" name="start" id="start" required>
            </div>
            <div class="form-group mb-1">
                <label for="end_datetime" class="control-label">End</label>
                <input type="datetime-local" class="form-control" name="end" id="end" required>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save">Save</button>
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
        select: function(start, end, allDays){
            $('#EventModal').modal('toggle');

            $('#save').click(function(){
                var title =$('#title').val();
                var description =$('#description').val();
                var start =$('#start').val(); 
                var end =$('#end').val();

               $.ajax({
                url:"{{ route('calendar.store') }}",
                            type:"POST",
                            dataType:'json',
                            data:{ title, description, start, end  },
                            success:function(response)
                            {
                                $('#EventModal').modal('hide')
                                $('#calendar').fullCalendar('renderEvent', {
                                    'title': response.title,
                                    'description': response.description,
                                    'start' : response.start,
                                    'end'  : response.end
                                    
                                });
                            },

               });
            });
        },
        editable:true,
        eventDrop: function(event){
            var id =event.id;
                var start = moment(event.start).format("YYYY-MM-DD HH:mm:ss");
                var end =moment(event.end).format("YYYY-MM-DD HH:mm:ss");

                $.ajax({
                            url:"{{ route('calendar.update', '') }}" +'/'+ id,
                            type:"PATCH",
                            dataType:'json',
                            data:{ start, end  },
                            success:function(response)
                            {
                                swal("Success!", "Event Updated!", "success");
                            },
                            error:function(error)
                            {
                                console.log(error)
                            },
                        });   
        },
        eventClick: function(event){
                    var id = event.id;
                    if(confirm('Are you sure want to remove it')){
                        $.ajax({
                            url:"{{ route('calendar.destroy', '') }}" +'/'+ id,
                            type:"DELETE",
                            dataType:'json',
                            success:function(response)
                            {
                                $('#calendar').fullCalendar('removeEvents', response);
                                // swal("Good job!", "Event Deleted!", "success");
                            },
                            error:function(error)
                            {
                                console.log(error)
                            },
                        });
                    }
                },
                selectAllow: function(event)
                {
                    return moment(event.start).utcOffset(false).isSame(moment(event.end).subtract(1, 'second').utcOffset(false), 'day');
                },

            });
            $("#EventModal").on("hidden.bs.modal", function () {
            $('#save').unbind();
    });

});
  
</script>
@endsection

