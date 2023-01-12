@extends('Layout.Admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10" style="padding-top:5%;">

            <div class="card mx-5">
                <div class="card-header"> 
                    <h4>About Content</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/Quality-Assurance/About/Save-About-Content') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="">Description:</label>
                            <textarea type="text" name="description" id="description" class="form-control">{!!$about->description!!}</textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="">Organizational Structure</label>
                            <input type="file" name="Org_image" class="form-control">
                            <img src="{{ asset('uploads/Org/'.$about->Org_image) }}" width="300 px" height="300px">

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
<script>
        $(document).ready(function() {
            $("#description").summernote(
                {
  height: 200,
  focus: true
}
            );
            $('.dropdown-toggle').dropdown();
        });
    </script>
@endsection
