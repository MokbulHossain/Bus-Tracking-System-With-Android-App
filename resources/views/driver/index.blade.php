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
			<div <th scope="col">All Drivers</th></div>
			<div class="col-12">
				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">ID</th>
				      <th scope="col">Name</th>
				      <th scope="col">Contact</th>
				      <th scope="col">License</th>
				      <th scope="col">Address</th>
				      <th scope="col">NID</th>
				       @if(session()->has('admin_email'))
				      <th scope="col">Action</th>
				      @endif
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i=1; ?>
				  	@foreach($driver as $b)
				    <tr>
				      <th scope="row">{{ $i++ }}</th>
				      <td>{{$b->name}}</td>
				      <td>{{$b->contact}}</td>
				      <td>{{ $b->license}}</td>
				      <td>{{ $b->address}}</td>
				      <td>{{ $b->nid}}</td>
				       @if(session()->has('admin_email'))
				      <td>
				      	<a href="{{ route('driver.edit',$b->id) }}" class="btn btn-primary">Update</a>
				      	<a href="{{ route('driver.destroy',$b->id) }}" class="btn btn-warning">Delete</a>
				      
				      </td>
				      @endif
				    </tr>
				   @endforeach
				  </tbody>
				</table>
			</div>
			 @if(session()->has('admin_email'))
			<div class="col-12"><a href="{{ route('driver.create') }}" class="btn btn-primary">Create</a></div>
			@endif
		</div>
	</div>
</body>