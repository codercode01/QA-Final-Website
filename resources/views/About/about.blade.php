@extends('Layout.main')
@section('content')

<section class="showcase">
            <img src="/css/images/banner1.jpg" class="img-fluid" alt="mmsu">
        </section> 
    <br>
    <section class="body">
    
        <div class="container">
          <h1 class="title">ABOUT THE DIRECTORATE</h1>
          <p class="description">{!!$abouts->description!!}</p>
        </div>

      <div class="container">
      <h1 class="title">ORGANIZATIONAL STRUCTURE</h1>
        <img src="{{ asset('uploads/Org/' .$abouts->Org_image) }}" alt="mmsu" class="image">
      </div>
      
    
    </section>
  
@endsection
