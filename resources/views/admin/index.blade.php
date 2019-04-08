<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>


<!-- Latest compiled and minified JavaScript -->
<link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('fontawesome-free-5.3.1-web/css/all.css')}}">

<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="{{url('js/bootstrap.min.js')}}"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
      

        <!-- Styles -->
        <style>
          

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
               
                position: relative!important;
                top: -24px;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                color:white;
                font-weight: bold;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
      @include('layouts.header');
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/admin_home') }}">Home</a>
                    @else
                  @endif
                </div>
            @endif
        </div>
 <div class="container">
            <div class="row">
  <div class="col-md-4">
    <div class="row">
      <div class="col-sm-12">
        <div class="thumbnail">
          <div class="caption text-center">
            <img src="{{url('pic/bus2.jpg')}}" style="width: 100px;height: 100px;">
          </div>
          <div class="caption card-footer text-center">
            <h4>Number of Bus : {{count($bus)}}</h4>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-2">&nbsp;</div>
  </div>

  <div class="col-md-4">
    <div class="row">
      <div class="col-sm-12">
        <div class="thumbnail">
          <div class="caption text-center">
            <img src="{{url('pic/driver.jpg')}}" style="width: 100px;height: 100px;">
          </div>
          <div class="caption card-footer text-center">
            <h4>Number of Driver : {{count($driver)}}</h4>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-2">&nbsp;</div>
  </div>

   <div class="col-md-4">
    <div class="row">
      <div class="col-sm-12">
        <div class="thumbnail">
          <div class="caption text-center">
            <img src="{{url('pic/helper.jpg')}}" style="width: 100px;height: 100px;">
          </div>
          <div class="caption card-footer text-center">
            <h4>Number of Helper : {{count($helper)}}</h4>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-2">&nbsp;</div>
  </div>
</div>


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
                    </tr>
                   @endforeach
                  </tbody>
                </table>
            </div>


 <div <th scope="col">All Helpers</th></div>
            <div class="col-12">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Name</th>
                      <th scope="col">Contact</th>
                      <th scope="col">NID</th>
                      <th scope="col">Address</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; ?>
                    @foreach($helper as $b)
                    <tr>
                      <th scope="row">{{ $i++ }}</th>
                      <td>{{$b->name}}</td>
                      <td>{{$b->contact}}</td>
                      <td>{{ $b->nid}}</td>
                      <td>{{ $b->address}}</td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>
            </div>

<div <th scope="col">All Buses</th></div>
            <div class="col-12">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Name</th>
                      <th scope="col">AC</th>
                      <th scope="col">Seat</th>
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
                    </tr>
                   @endforeach
                  </tbody>
                </table>
            </div>

        </div>
    </body>
</html>
