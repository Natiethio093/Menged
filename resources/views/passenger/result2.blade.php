<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <!-- <base href="/public"> -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Avilable Tickets</title>
    <!-- bootstrap core css -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <!-- font awesome style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
    <style>
        .modal-body {
            text-align: center;
        }
  
        .line-container {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .line {
            flex-grow: 1;
            height: 1px;
            background-color: black;
            margin: 0;
        }

        .duration {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            padding: 0 10px;
            background-color: white;
        }

        .closebtn {
            margin-left: 600px;

        }

        .card-body .card-text {
            padding-bottom: 5px;
        }

        .card-title-container {
            display: flex;
            align-items: center;
        }

        .card-title-image {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        @include('passenger.header')
        <div class="heading_container heading_center m-5" style="padding-top:90px ">
            <h2 class="pl-5">Avilable <span style=" color:#fb4b57">Tickets</span></h2>
        </div>
        @if (isset($route))
        <div class="row justify-content-center">
            @foreach($carrier as $index => $carrierItem)
            <?php
            $bus = $buses->where('comp_id', $carrierItem->id)->first();
            $schedule = $schedules->where('route_id', $route[0]->id)
                ->where('bus_id', $bus->id)
                ->first();
            $cardClass = count($carrier) === 1 ? 'col-12 mb-4' : 'col-lg-6 col-md-8 col-sm-12 mb-4';
            ?>
            <div class="col-md-11 mb-4" style="margin-left: 20px">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <div class="card-title-container">
                                    <img src="images/{{$carrierItem->image}}" alt="Company Logo" class="card-title-image rounded-circle">
                                    <h5 class="card-title fs-5">{{$carrierItem->name}}</h5>
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-9 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <p class="card-text text-lg-start text-md-start text-sm-center">
                                            {{date('l F j, Y', strtotime($date))}}
                                        </p>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <p class="card-text text-lg-end text-md-end text-sm-center">
                                            <span class="text-danger fs-3">{{$schedule->price}} ETB</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <p class="card-text text-lg-start text-md-start text-sm-center">
                                            {{$route[0]->source}}
                                        </p>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <p class="card-text text-lg-end text-md-end text-sm-center">
                                            {{$route[0]->destination}}
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <p class="card-text text-lg-start text-md-start text-sm-center fs-4">
                                            <strong>{{$route[0]->dep_time}}</strong>
                                        </p>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 mt-3">
                                        <div class="line-container">
                                            <hr class="line">
                                            <div class="duration">{{$route[0]->duration}}</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <p class="card-text text-lg-end text-md-end text-sm-center font-weight-bold fs-4">
                                            <strong>{{$route[0]->est_arrival_time}}</strong>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-sm-3">
                                        <p class="card-text text-lg-end text-md-end text-sm-center">
                                        <p style="background-color:#c5ebe1;" class="rounded">{{$bus->seat_available}} available seats</p>
                                        </p>
                                    </div>
                                    <div class="col-lg-10 col-md-8 col-sm-9 mt-2">
                                        <a class="btn btn-success text-white" href="{{url('selectseat', $carrierItem->name)}}">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- </div> -->
        @else
        <p>No trips found.</p>
        @endif



        @include('passenger.footer')

    </div>



    <!-- popper js -->
    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <!-- popper js -->
    <script src="{{asset('js/popper.min.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <!-- custom js -->
    <script src="{{asset('js/custom.js')}}"></script>
</body>

</html>