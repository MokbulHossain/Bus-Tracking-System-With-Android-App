<!DOCTYPE HTML>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{url('fontawesome-free-5.3.1-web/css/all.css')}}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
</head>
<body>
	 @include('layouts.header');
	 <div class="container">
		<div class="row">
			<div <th scope="col">All trips</th></div>
			<div class="col-12">
				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">SL</th>
				      <th scope="col">Date</th>
				      <th scope="col">Day</th>
				      <th scope="col">Time</th>
				      <th scope="col">Bus</th>
				      <th scope="col">Helper</th>
				      <th scope="col">From</th>
				      <th scope="col">via</th>
				      <th scope="col">destination</th>
				      <th scope="col">Driver</th>
				       @if(session()->has('admin_email'))
				      <th scope="col">Action</th>
				      @endif
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i=1; ?>

				  	@foreach($trip as $b)
				    <tr id="{{$i}}" onmousemove="showCoords(event,this.id)" onmouseout="hide(this.id)" style="position: relative;">
				      <th scope="row">{{ $i }}</th>
				      <td>{{$b->date}}</td>
				      <td>{{$b->day}}</td>
				      <td>{{$b->start_time}}</td>
				      <td>{{$b->bus()}}</td>
				      <td>{{$b->helper()->name}}</td>
				      <td>{{$b->route()->start}}</td>
				      <td>{{$b->route()->via}}</td>
				      <td>{{$b->route()->destination}}</td>
				      <td>{{$b->driver()->name}}</td>
				       @if(session()->has('admin_email'))
				      <td>
				      	<a href="{{ route('trip.edit',$b->id) }}" class="btn btn-primary">Update</a>
				      	<a href="{{ route('trip.destroy',$b->id) }}" class="btn btn-warning">Delete</a>
				      
				      </td>
				      @endif
				    </tr>

				    <tr id="{{$i++}}1" style="display:none; position: absolute;background-color:rgb(17, 226, 71);">
				    	<td>
				    		{{$b->driver()->name}}:{{$b->driver()->contact}}<br>
				    		{{$b->helper()->name}}:{{$b->helper()->contact}}
				    	</td>
				    </tr>

				   @endforeach
				  </tbody>
				</table>
			</div>
			 @if(session()->has('admin_email'))
			<div class="col-12"><a href="{{ route('trip.create') }}" class="btn btn-primary">Create</a></div>
			@endif
		</div>
	</div>
	<div class="container">
		<div class="row">
		
			<div class="col-12">
				<form action="{{ route('trip.store') }}" method="post" id="create_form">
					{{ csrf_field() }}
				  <div class="form-group">
				    <label for="date">Date</label>
				    <input type="date" required class="form-control" id="date" aria-describedby="emailHelp" placeholder="Enter Date" name="date">
				  
				  </div>
				  <div class="form-group">
				    <label for="contact">Day</label>
				    <input type="day" required class="form-control" id="day" aria-describedby="emailHelp" placeholder="Enter Day" name="day">
				  </div>
				   <div class="form-group">
				    <label for="contact">Start Time</label>
				    <input type="time" required class="form-control" id="time" aria-describedby="emailHelp" placeholder="Enter Contact" name="start_time">
				  </div>

				  <div class="form-group">
				    <label for="license">Route</label>
				    <select class="form-control" name="route_id">
				    	<option>Please select a route</option>
				    	@foreach($routes as $route)
				    	<option value="{{ $route->id }}">{{$route->destination}}</option>
				    	@endforeach
				    </select>
				  
				  </div>
				   
				   <div class="form-group">
				    <label for="license">Bus</label>
				    <select class="form-control" name="bus_id">
				    	<option>Please select a bus</option>
				    	@foreach($buses as $bus)
				    	<option value="{{ $bus->id }}">{{$bus->name}}</option>
				    	@endforeach
				    </select>

				    <div class="form-group">
				    <label for="license">Driver</label>
				    <select class="form-control" name="driver_id">
				    	<option>Please select a driver</option>
				    	@foreach($drivers as $driver)
				    	<option value="{{ $driver->id }}">{{$driver->name}}</option>
				    	@endforeach
				    </select>
				  
				  
				  </div>
				  <div class="form-group">
				    <label for="license">Helper</label>
				    <select class="form-control" name="helper_id">
				    	<option>Please select a helper</option>
				    	@foreach($helpers as $helper)
				    	<option value="{{ $helper->id }}">{{$helper->name}}</option>
				    	@endforeach
				    </select>
				  
				  </div>
				  
							  <button type="submit" class="btn btn-primary">Submit</button>
				  <button type="button" id="clear" class="btn btn-primary" onclick="clear()">Clear</button>
				</form>
			</div>
		</div>
	</div>
</body>

<script type="text/javascript">
	$(document).ready(function() {
    $('#clear').click(function() {
	$('#create_form')[0].reset();
	});
	});
function showCoords(event,getid) {
    var id1=document.getElementById(getid+"1");
    var x = event.clientX;
     if (x < 1045) {
    id1.style.display="block";
    id1.style.marginLeft=x+"px";
    }
    else{
    	hide(getid);
    }

}
function hide(getid){
	getid=getid+"1";
 	var id1=document.getElementById(getid);
    id1.style.display="none";
    id1.style.marginLeft="0";
}
</script>