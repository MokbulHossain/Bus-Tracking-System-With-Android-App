<nav class="navbar navbar-expand-lg bg-dark">
 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#"><img src="{{url('pic/diu.png')}}" width="20%"></a>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
   
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        @if(session()->has('admin_email'))
        <a class="nav-link" href="{{url('admin_home')}}"><i class="fas fa-home" style="font-size: 15px;"></i> Dashboard <span class="sr-only">(current)</span></a>
        @else
        <a class="nav-link" href="{{url('admin_home')}}"><i class="fas fa-home" style="font-size: 15px;"></i> Home <span class="sr-only">(current)</span></a>
        @endif
      </li>
        @if(session()->has('admin_email'))
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-users" style="font-size: 15px;"></i> Inputs
        </a>
        
        <div class="dropdown-menu" aria-labelledby="navbarDropdown"> 
          <a class="dropdown-item" href="{{url('driver')}}">Driver</a>
          <a class="dropdown-item" href="{{url('helper')}}">Helper</a>
           <a class="dropdown-item" href="{{url('bus')}}">Bus</a>
            <a class="dropdown-item" href="{{url('route')}}">Route</a>
             
             <a class="dropdown-item" href="{{url('booked_trip')}}">Booked_Trip</a>
        </div>
      </li>
      @endif
      <li class="nav-item active">

        <a class="nav-link" href="{{url('trip')}}"><i class="fas fa-bus" style="font-size: 15px;"></i> Schedule Trip</a>
      </li>
       <li class="nav-item active">

        <a class="nav-link" href="{{url('search_index')}}"><i class="fas fa-search" style="font-size: 15px;"></i> Search <span class="sr-only">(current)</span></a>
      </li>
    </ul>

  <ul class="navbar-nav mr-rg">
      
                        <!--end of col-->
         </ul>



    <ul class="navbar-nav mr-rg">
      @if(session()->has('admin_email'))
       <li class="nav-item">
        <a class="nav-link" href="{{url('logout')}}">Logout</a>
      </li>
      @else
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="{{url('admin_login')}}" >
          Admin Login
        </a>
      </li>  
     @endif
    </ul>
  </div>
</nav>
 