@extends('Layout.main')
@section('content')
<div class="container">      
        <ul class="groups"> 
             <h1 style="color: gray;text-align: center;font-size:40px;padding-top:80px;">GALLERY </h1>
             <form action="" class="col-5" style="z-index:1; margin-left:60%;" >
                <div class="input-group mb-3">
                    <input type="search" class="form-control" placeholder="Search" name="search" value="{{$search}}">
                    <div class="input-group-append">
                    <button style="background-color:green"><i class="material-icons" style="font-size:25px;color:white">search</i></button>
                    </div>
                 </div>
            </form>
             @foreach($galleries as $gallery)
            <li>
                <div class="card2">
                    <div class="image-session">
                        <span><img class="image1" src="{{ asset('uploads/gallery/' .$gallery->image) }}"></img></span>
                    </div>
                    <div class="body">
                        <h2 class="title5">{!!$gallery->title!!}</h2>
                        <p style="color: light-gray; font-size:12px;padding: 5px 0;">{{$gallery->created_at}}</p>

                        <div class="comment more">
                        @if(strlen($gallery->description) > 400)
                        {{substr($gallery->description,0,400)}}
                        <span class="read-more-show hide_content">Read More<i class="fa fa-angle-down"></i></span>
                        <span class="read-more-content"> {{substr($gallery->description,400,strlen($gallery->description))}} 
                        <span class="read-more-hide hide_content">Hide <i class="fa fa-angle-up"></i></span> </span>
                        @else
                        {{$gallery->description}}
                        @endif
                        </div>
                    </div>
                    <br>
                    
                </div>
            </li>
            @endforeach
            {{ $galleries->links() }}
            

    </ul>
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
