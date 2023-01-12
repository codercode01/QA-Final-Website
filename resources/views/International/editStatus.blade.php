@extends('Layout.Admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10" style="padding-top:5%;">

            <div class="card mx-5">
                <div class="card-header">
                    <h4>International Status</h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('/Quality-Assurance/International-Accreditation/Save-Edit-Status/'.$internStatus->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="">Description:</label>
                            <textarea type="text" name="description" id="description"  class="form-control" value="{{$internStatus->description}}">{!!$internStatus->description!!}</textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="">Certificate</label>
                            <input type="file" name="international_image_status"  class="form-control">
                            <img src="{{ asset('uploads/internationa_certificate/' .$internStatus->international_image_status) }}" width="150px">
                            
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

