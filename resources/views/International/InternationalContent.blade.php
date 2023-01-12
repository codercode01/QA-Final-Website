@extends('Layout.Admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10" style="padding-top:15%;">

            <div class="card mx-5">
                <div class="card-header">
                    <h4> International Function</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/Quality-Assurance/Accreditation/Save-International-Accreditation') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="">Function:</label>
                            <textarea class="summernote" name="function" id="function" class="form-control">{!!$internationals->function!!}</textarea>
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
            $("#function").summernote(
                {
  height: 400,
  focus: true
}
            );
            $('.dropdown-toggle').dropdown();
        });
    </script>
@endsection
