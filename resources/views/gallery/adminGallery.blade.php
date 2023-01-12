@extends('Layout.Admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" style="padding-top:5%;">

            <div class="card mx-5">
            <h1 style="color: black;text-align: center;font-size:40px;padding-top:10px">GALLERY </h1>
            <div>
             <form action="" class="col-12" style="z-index:1" >
               
                <div class="input-group mb-3">
                <input type="search" class="form-control" placeholder="Search" name="search" value="{{$search}}">
                <div class="input-group-append">
                <button style="background-color:green"><i class="material-icons" style="font-size:25px;color:white">search</i></button>
                </div>
            </div>
                
            </form>
            </div>
<table style= "width:90%; margin-left:auto;margin-right:auto;">

<tr>
    <thead>
        <th style="width:20%">TITLE</th>
        <th>IMAGE</th>
        <th>DESCRIPTION</th>
        <th style="width:4%">Action</th>
    </thead>
</tr> 
<tbody>
    <tr>
    @foreach($galleries as $gallery)
            <tr>
                <td>{!!$gallery->title!!}</td>
                
                <td>
                <div class="comment more">
                        @if(strlen($gallery->description) > 200)
                        {{substr($gallery->description,0,200)}}
                        <span class="read-more-show hide_content">Read More<i class="fa fa-angle-down"></i></span>
                        <span class="read-more-content"> {{substr($gallery->description,200,strlen($gallery->description))}}
                        <span class="read-more-hide hide_content">Hide <i class="fa fa-angle-up"></i></span> </span>
                        @else
                        {{$gallery->description}}
                        @endif
                    </div>
                </td>
                <td>
                <img src="{{ asset('uploads/gallery/' .$gallery->image) }}" width="150px">
                </td>
                <td>
                <button type="button" style="width: 54px; padding: 3px 12px;" class="btn btn-primary btn-sm"><a href="{{ url('/Quality-Assurance/Gallery/Edit-Gallery/'.$gallery->id) }}" Style="color:white;text-decoration:none;" >Edit</a></button>
                <button type="button" class="btn btn-danger btn-sm" onclick="delete_gallery({{$gallery->id}})">Delete</button>
                </td>
            </tr>
        
    @endforeach
    </tr>

<td colspan="5"><a href="/Quality-Assurance/Gallery/Add-gallery" type='button' style="width: 300px; padding: 3px 15px; border-radius:5px; text-decoration:none; text-align:center; background-color:green;color:white; margin-left:5%;">Add Gallery</button></a></td>
</tr>
    
</tbody>

</table>

            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript">
// Hide the extra content initially, using JS so that if JS is disabled, no problemo:
            $('.read-more-content').addClass('hide_content')
            $('.read-more-show, .read-more-hide').removeClass('hide_content')

            // Set up the toggle effect:
            $('.read-more-show').on('click', function(e) {
              $(this).next('.read-more-content').removeClass('hide_content');
              $(this).addClass('hide_content');
              e.preventDefault();
            });

            // Changes contributed by @diego-rzg
            $('.read-more-hide').on('click', function(e) {
              var p = $(this).parent('.read-more-content');
              p.addClass('hide_content');
              p.prev('.read-more-show').removeClass('hide_content'); // Hide only the preceding "Read More"
              e.preventDefault();
            });
</script>

@endsection
@section('inline_script')
    <script>
        function delete_gallery(id){
            if(confirm("Are you sure to delete this gallery event?")){
                $.post('/Quality-Assurance/Gallery/Delete-Gallery',{id:id,_token:'{{csrf_token()}}'}).then((data)=> {               
                    if(data){
                        window.location.href='/Quality-Assurance/Admin/Gallery';
                    }
                });
            }
        }
</script>
@endsection
