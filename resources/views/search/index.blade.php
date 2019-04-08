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
      
   

<div class="col-12 col-md-12 col-lg-12">
                            <form class="card card-sm" action="{{route('search')}}" method="get" style="background-color: transparent;">
                              {{csrf_field()}}
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <select class="form-control" name="option_name">
                                          <option value="Driver">Driver</option>
                                          <option value="Helper">Helper</option>
                                          <option value="Bus">Bus</option>  
                                          <option value="Trip">Trip</option>
                                        </select>
                                    </div>
                                    <!--end of col-->
                                    <div class="col">
                                        <input name="search" class="form-control form-control-lg form-control-borderless" type="search" placeholder="Enter Name " required="true">
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto">
                                        <button class="btn btn-lg btn-success" type="submit">Search <i class="fas fa-search" style="font-size: 20px;" style="color: blue;"></i></button>

                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>
         </div>

          </div>
  </div>
</body>
</html>