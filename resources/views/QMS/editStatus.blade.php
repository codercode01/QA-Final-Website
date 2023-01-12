@extends('Layout.Admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10" style="padding-top:5%;">

            <div class="card mx-5">
                <div class="card-header">
                    <h4>QMS Status</h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('/Quality-Assurance/QMS/Save-Edit-Status/'.$qms_status->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="">Description:</label>
                            <textarea type="text" name="description" id="description"  class="form-control" value="{{$qms_status->description}}">{!!$qms_status->description!!}</textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="">Certificate</label>
                            <input type="file" name="qms_image_status"  class="form-control">
                            <img src="{{ asset('uploads/qms_certificate/' .$qms_status->qms_image_status) }}" width="150px">
                            
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
<script>
        $(document).ready(function() {
            $("#description",).summernote(
                {
  height: 100,
  focus: true
}
            );
            $('.dropdown-toggle').dropdown();
        });
    </script>

@endsection

