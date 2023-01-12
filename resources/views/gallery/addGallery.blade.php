@extends('Layout.Admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10" style="padding-top:5%;">

            <div class="card mx-5">
                <div class="card-header">
                    <h4>Gallery Form</h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('/Quality-Assurance/Gallery/Save-Gallery') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="">Title:</label>
                            <textarea type="text" name="title" id="title"  class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Description:</label>
                            <textarea type="text" rows="10" cols="100"  name="description" class="form-control"></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="">Upload Image</label>
                            <input type="file" name="image" required class="form-control">
                            
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
            $("#title",).summernote(
                {
                    
            focus: true
            }
                        );
                        $('.dropdown-toggle').dropdown();
        });
    </script>
@endsection

