@extends('main')

@section('title', 'Home ')

@section('content')
    
      <div class="col-8 offset-2">

        @if(count($jobs) >=3)

            <div id="slider1" class="carousel slide" data-ride="carousel"> 
            
            <ol class="carousel-indicators">
                 <li class ="active" data-target="#slider1" data-slide-to="0"> </li>
                 <li data-target="#slider1" data-slide-to="1"> </li>
                 <li data-target="#slider1" data-slide-to="2"> </li>
                 {{--<li data-target="#slider1" data-slide-to="3"> </li>
                 <li data-target="#slider1" data-slide-to="4"> </li>
                 <li data-target="#slider1" data-slide-to="5"> </li> --}}
            </ol>
            
            
            <div class= "carousel-inner" role = "listbox"> 
            
                <div class = "carousel-item active"> 
                    <img src = "{{ asset('img/1up.jpg') }}" height="300" class ="d-block img-fluid" alt ="1st"> 
                    <div class="carousel-caption">
                        @php
                            $job = $jobs->values()->get(0)
                        @endphp
                        <h4 class="" style="color: black"> {{ $job->title }}</h4>
                        <p class="" style="color: indigo"> {{ $job->requirements }}</p>
                    </div> 
                </div>
                <div class = "carousel-item"> 
                    <img src = "{{ asset('img/2up.jpg') }}" height="300" class ="d-block img-fluid" alt ="2nd">
                    
                    <div class="carousel-caption">
                        @php
                            $job = $jobs->values()->get(2)
                        @endphp
                        <h4 class="" style="color: lightgrey">{{ $job->title }}</h4>
                        <p class="" style="color: aqua"> {{ $job->requirements }}</p>
                    </div>    
                </div>
                <div class = "carousel-item">
                    
                    <img src = "{{ asset('img/4up.png') }}" height="300" class ="d-block img-fluid" alt ="3rd">
                    <div class="carousel-caption">
                        
                        <h4 class="" style="color: red"> Meet Our Alumni</h4>
                       <p class="" style="color: green"> <b>Communicate with them easily</b></p>
                    </div>
                </div>
                
            </div> <!-- carousel-inner -->
            
            
            <a href = "#slider1" class="carousel-control-prev" data-slide ="prev">             <span class= "carousel-control-prev-icon"> </span> 
            </a>
            
            
            
            <a href = "#slider1" class="carousel-control-next" data-slide ="next"> 
                <span class= "carousel-control-next-icon"> </span>
            </a>
            
            
        
        </div> <!-- slider1  -->





    @endif
    
    </div> {{-- col --}}
    
    
@endsection

@section('scripts')
  <script>
     $('.carousel').carousel({
        interval : 9500,
        pause: 'hover',
        wrap: true,
        keyboard: true
     });
  </script>
@endsection