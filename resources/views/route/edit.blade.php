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
				<form action="{{ route('route.update',$route->id) }}" method="post">
					{{ csrf_field() }}
					{{ method_field('PATCH') }}
					 <div class="form-group">
				    <label for="start">Start</label>
				    <input type="string" required class="form-control" id="start" aria-describedby="emailHelp" placeholder="Start Time" name="start" value="{{$route->start}}">
				  
				  </div>

				   <div class="form-group">
				    <label for="via">Via</label>
				    <input type="string" required class="form-control" id="via" aria-describedby="emailHelp" placeholder="Via" name="via" value="{{$route->via}}">
				  
				  </div>

				  <div class="form-group">
				    <label for="destination">Destination</label>
				    <input type="string" required class="form-control" value="{{$route->destination}}" id="destination" placeholder="Enter destination" name="destination">
				  
				  </div>

				  <button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</body>