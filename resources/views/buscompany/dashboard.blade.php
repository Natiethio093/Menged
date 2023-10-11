<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/dashboard.css')}}" />
</head>
<style>
   /* .body{
    background-color:#e5e3e3;
   } */
</style>

<body class="body" style="">

<section class="body">

<div class="heading-container heading-center m-5">
        <h2 class="pl-5 fs-1 text-primary custom-font">Dashboard</h2>
    </div>
    <div class="container">
   
        <div class="row dashboard">
            <div class="col-md-3 col-sm-6 ">
                <div class="card passenger shadow">
                    <i class="icon fa fa-user"></i>
                    <div>Passengers</div>
                    <div>10</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 ">
                <div class="card buscard shadow">
                    <i class="icon fa fa-bus"></i>
                    <div>Buses</div>
                    <div>{{$buses}}</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card cities shadow">
                    <i class="icon fa fa-map-marker"></i>
                    <div>Cities</div>
                    <div>{{$cities}}</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card route shadow">
                    <i class="icon fa fa-road"></i>
                    <div>Total Route</div>
                    <div>{{$route}}</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card aroute shadow">
                    <i class="icon fa fa-road"></i>
                    <div>Available Route</div>
                    <div>{{$aroute}}</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card schedule shadow">
                    <i class="icon fa fa-calendar"></i>
                    <div>Schedule</div>
                    <div>{{$schedule}}</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card booking shadow">
                    <i class="icon fa fa-book"></i>
                    <div>Booking</div>
                    <div>0</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card ticket shadow">
                    <i class="icon fa fa-receipt"></i>
                    <div>Ticket</div>
                    <div>4</div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>