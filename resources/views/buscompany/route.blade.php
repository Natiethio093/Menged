<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Available Routes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{asset('css/bustyle.css')}}" rel="stylesheet" />
    <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/dashboard.css')}}" />
</head>

<body>
    @include('buscompany.slider', ['page' => $page])
    <link rel="stylesheet" type="text/css" href="{{asset('css/dashboard.css')}}" />
    <div class="heading-container heading-center m-5" style="padding-top:50px">
        <h2 class="pl-5 fs-1 text-primary custom-font">Available Routes</h2>
    </div>
   <div class="container">
    @if(isset($routes) && $routes->count()>0)
        <div class="table-responsive">
            <table class="table table-striped  table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Route Id</th>
                        <th>Source</th>
                        <th>Destination</th>
                        <th>Distance</th>
                        <th>Duration</th>
                        <th>Departure Time</th>
                        <th>Arrival Time</th>
                    </tr>
                </thead>
                @foreach($routes as $route)
                <tr>
                    <td>{{$route->id}}</td>
                    <td>{{$route->source}}</td>
                    <td>{{$route->destination}}</td>
                    <td>{{$route->distance}}</td>
                    <td>{{$route->duration}}</td>
                    <td>{{$route->dep_time}}</td>
                    <td>{{$route->est_arrival_time}}</td>
                </tr>
                @endforeach
            </table>
        </div>
        @else
        <div class="text-center message">
            <p>No Routes Yet!!</p>
        </div>
       @endif
     </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <!-- popper js -->
    <script src="{{asset('js/popper.min.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <!-- custom js -->
    <script src="{{asset('/js/custom.js')}}"></script>
    <script src="{{asset('js/dasboard.js')}}"></script>
</body>

</html>