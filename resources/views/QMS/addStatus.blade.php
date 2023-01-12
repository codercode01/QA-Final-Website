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

                    <form action="{{ url('/Quality-Assurance/QMS/Save-Status') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="">Description:</label>
                            <textarea type="text" name="description" id="description"  class="form-control"></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="">Certificate</label>
                            <input type="file" name="qms_image_status" required class="form-control">
                            
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

