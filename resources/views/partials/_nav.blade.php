<nav class="navbar navbar-light bg-light navbar-expand-md">
      <div class="container">
        <a class = "navbar-brand" href="#"> Alumni Job Portal </a>

        
       @if (Auth::check())
            <button class ="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#click"> <span class = "navbar-toggler-icon">  </span></button>


                <div class = "collapse navbar-collapse" id ="click">
                  <ul class = "navbar-nav mx-auto">
                    <li class = "navbar-item ">
                      <a class = "nav-link" href="#">Home</a>
                    </li>

                    @if(Auth::user()->role ==3)
                      <li class = "navbar-item ">
                        <a class = "nav-link" href="#">About</a>
                      </li>
                      <li class = "navbar-item ">
                        <a class = "nav-link" href="#">Contact us</a>
                      </li>
                    @endif 


                    @if(Auth::user()->role ==2)
                      <li class = "navbar-item ">
                        <a class = "nav-link" href="#">Create job</a>
                      </li>
                      <li class = "navbar-item ">
                        <a class = "nav-link" href="#">My jobs</a>
                      </li>
                      @endif 
                    @if(Auth::user()->role == 3)
                      <li class="navbar-item"> 
                        <a class="nav-link text-primary" href="/get-form"> Be an Alumni</a>
                      </li>
                    @endif

                    {{--show job options for alumni+ students (dropdown menu)--}}
                    

                    <li class = "navbar-item" >
                      <a class = "nav-link" href="/jobs">Jobs</a>
                    </li>
                    


                    <li class = "navbar-item">
                      <a class = "nav-link" href="/alerts"> Notifications</a>
                    </li>

                    <li class="navbar-item">
                      
                      <form class = "form-inline ml-auto"> 
                        <input class ="form-control"type="text" placeholder= "Search by name">
                        <button class = "btn btn-success"> Search</button>
                      </form>

                    </li>




                  </ul>
                </div> <!-- collpase div-->

                
            
              <ul class="navbar-nav mx-auto">
                <li class = "navabr-item dropdown">
                  

                  <a class = "nav-link dropdown-toggle" data-toggle="dropdown" href="#"> 
                    @if(Auth::user()->role ==1)
                      <span class ="font-weight-bold text-danger"> Admin </span>
                    @elseif(Auth::user()->role ==2)
                      <span class ="font-weight-bold text-warning"> {{ Auth::user()->first_name." ".Auth::user()->last_name }} </span>
                    @else
                      <span class ="font-weight-bold text-success">  {{ Auth::user()->first_name." ".Auth::user()->last_name }} </span>
                    @endif

                  </a>


                  <div class="dropdown-menu">
                      <a href="/profiles/{{ Auth::user()->id }}" class="dropdown-item text-center"> Profile</a>
                      <a href="/profiles/{{ Auth::user()->id }}" class="dropdown-item text-center"> Change password</a>
                    @if (Auth::user()->role == 1 || Auth::user()->role == 2)
                      <a href="/show-reqs" class="dropdown-item">Alumni requests </a>                      


                    @endif

                    @if (Auth::user()->role == 2)
                        <a href="/jobs/create" class="dropdown-item text-center"> Create a job</a>
                    @endif

                    @if (Auth::user()->role == 2)
                        <a href="" class="dropdown-item text-center"> All students</a>
                    @endif

                    @if (Auth::user()->role == 3)
                        <a href="" class="dropdown-item text-center"> View alumnis</a>
                    @endif

                    @if (Auth::user()->role == 2)
                      <a href="/posted-jobs" class="dropdown-item text-center">My Jobs </a>
                    @endif


                    @if (Auth::user()->role == 2 || Auth::user()->role == 3)
                      <a href="/applied-jobs" class="dropdown-item text-center">Applied jobs </a>
                      <a href="/show-interview-calls" class="dropdown-item text-center">Interview calls </a>
                    @endif
                  

                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button class="btn btn-default btn-block " type="submit" > Logout </button>
                    </form>
                  </div>
                </li>

              @endif
              
              </ul>

        </div> <!-- container -->

        @if(Auth::check() ==false)
                <a style="margin-right:5px"class=" btn btn-success" href="{{ route('login') }}"> Login </a>
                <a class=" btn btn-danger" href="{{ route('login') }}"> Register </a>
        @endif
    </nav>
