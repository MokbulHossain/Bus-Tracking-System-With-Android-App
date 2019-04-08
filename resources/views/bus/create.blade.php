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
			<div <th scope="col">All Buses</th></div>
			<div class="col-12">
				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">ID</th>
				      <th scope="col">Name</th>
				      <th scope="col">AC</th>
				      <th scope="col">Seat</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i=1; ?>
				  	@foreach($bus as $b)
				    <tr>
				      <th scope="row">{{ $i++ }}</th>
				      <td>{{$b->name}}</td>
				      <td>{{$b->ac}}</td>
				      <td>{{ $b->seat}}</td>
				      <td>
				      	<a href="{{ route('bus.edit',$b->id) }}" class="btn btn-primary">Update</a>
				      	<a href="{{ route('bus.destroy',$b->id) }}" class="btn btn-warning">Delete</a>
				      
				      </td>
				    </tr>
				   @endforeach
				  </tbody>
				</table>
			</div>
			<div class="col-12"><a href="{{ route('bus.create') }}" class="btn btn-primary">Create</a></div>
		</div>

	<div class="container">
		<div class="row">
		
			<div class="col-12">
				<form action="{{ route('bus.store') }}" method="post" id="create_form">
					{{ csrf_field() }}
				  <div class="form-group">
				    <label for="name">Name</label>
				    <input type="text" required class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter Name" name="name">
				  
				  </div>
				  
				  <div class="form-check">
				    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="ac">
				    <label class="form-check-label" for="exampleCheck1">AC?</label>
				  </div>
				  <div class="form-group">
				    <label for="seat">Seat</label>
				    <input type="number" required class="form-control" id="seat" placeholder="Enter Seat number" name="seat">
				  
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
</script>