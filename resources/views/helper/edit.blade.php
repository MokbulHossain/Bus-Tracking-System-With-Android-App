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
				<form action="{{ route('helper.update',$helper->id) }}" method="post">
					{{ csrf_field() }}
					{{ method_field('PATCH') }}
				  <div class="form-group">
				    <label for="name">Name</label>
				    <input type="text" required class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter Name" name="name" value="{{$helper->name}}">
				  
				  </div>

				  <div class="form-group">
				    <label for="contact">Contact</label>
				    <input type="string" required class="form-control" id="contact" aria-describedby="emailHelp" placeholder="Enter Contact" name="contact" value="{{$helper->contact}}">
				  
				  </div>

				  <div class="form-group">
				    <label for="nid">NID</label>
				    <input type="number" required class="form-control" id="nid" aria-describedby="emailHelp" placeholder="Enter NID" name="nid" value="{{$helper->nid}}">
				  
				  </div>

				  <div class="form-group">
				    <label for="address">Address</label>
				    <input type="string" required class="form-control" value="{{$helper->address}}" id="address" placeholder="Enter Address" name="address">
				  
				  </div>
				   <button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</body>
