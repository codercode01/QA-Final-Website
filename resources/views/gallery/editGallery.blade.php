@extends('Layout.Admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10" style="padding-top:5%">

            <div class="card mx-5" >
                <div class="card-header">
                    <h4>Gallery Form</h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('/Quality-Assurance/Gallery/Save-Edit-Gallery/'.$edit_gallery->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="">Title:</label>
                            <textarea type="text" name="title" id="title" class="form-control" value="{{$edit_gallery->title}}">{{$edit_gallery->title}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Description:</label>
                            <textarea type="text" name="description" rows="10" cols="100" class="form-control" value="{{$edit_gallery->description}}">{{$edit_gallery->description}}</textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="">Upload Image</label>
                            <input type="file" name="image"class="form-control" >
                            <img src="{{ asset('uploads/gallery/'.$edit_gallery->image) }}" width="150 px" height="150px">
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
            $("#title").summernote(
                {
  focus: true
}
            );
            $('.dropdown-toggle').dropdown();
        });
    </script>

@endsection
