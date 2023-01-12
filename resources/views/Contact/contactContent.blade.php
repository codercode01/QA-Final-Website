@extends('Layout.Admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10" style="padding-top:5%;">

            <div class="card mx-5">
                <div class="card-header">
                    <h4> Contact Content</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/Quality-Assurance/Contact/Save-About-Contact') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            
                            <textarea type="text" name="contacts" id="contacts" class="form-control">{!!$contacts->contacts!!}</textarea>
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
            $("#contacts").summernote(
                {
  height: 400,
  focus: true
}
            );
            $('.dropdown-toggle').dropdown();
        });
    </script>
@endsection
