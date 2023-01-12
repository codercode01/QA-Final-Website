@extends('Layout.main')
@section('content')
<section class="showcase">
    <img src="/css/images/banner1.jpg" class="img-fluid" alt="mmsu">
</section> 

<div class="container">
        <div class="contact">
                <h1 class="title">CONTACT INFORMATION</h1>
                <div class="card1">                    
                   <p>
                   {!! $contacts->contacts!!}
                    </p>    
                   
                </div>
                 
        </div>
</div> 
@endsection
