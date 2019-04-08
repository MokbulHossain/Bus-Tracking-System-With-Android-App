<!DOCTYPE HTML>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{url('fontawesome-free-5.3.1-web/css/all.css')}}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	@include('layouts.header');
	<div class="container">
		<div class="row">
      
			<div class="col-12">
				<form action="{{ route('booked_trip.update',$booked_trip->id) }}" method="post">
					{{ csrf_field() }}
					{{ method_field('PATCH') }}
					 <div class="form-group">
				    <label for="date">Date</label>
				    <input type="date" required class="form-control" id="date" aria-describedby="emailHelp" placeholder="Enter Date" name="date" value="{{$booked_trip->date}}">
				  
				  </div>

				  <div class="form-group">
				    <label for="location">Location</label>
				    <input type="string" required class="form-control" id="location" aria-describedby="emailHelp" placeholder="Enter location" name="location" value="{{$booked_trip->location}}">
				  </div>

				   <div class="form-group">
				    <label for="contact">Start Time</label>
				    <input type="time" required class="form-control" id="time" aria-describedby="emailHelp" placeholder="Enter Time" name="start_time" value="{{$booked_trip->start_time}}">
				  </div>

				  <div class="form-group">
				    <label for="end_time">End Time</label>
				    <input type="time" required class="form-control" id="time" aria-describedby="emailHelp" placeholder="Enter Time" name="end_time" value="{{$booked_trip->end_time}}">
				  
				  </div>
				   
				   <div class="form-group">
				    <label for="license">Bus</label>
				    <select class="form-control" name="bus_id">
				    	<option>Please select a bus</option>
				    	@foreach($buses as $bus)
				    	<option value="{{ $bus->id }}">{{$bus->name}}</option>
				    	@endforeach
				    </select>

				    </div>

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
				</form>
			</div>
		</div>
	</div>
</body>