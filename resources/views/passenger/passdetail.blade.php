<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passenger Detail</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.10.2/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset('css/seat-option.css')}}" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="{{asset('css/style3.css')}}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <style>
        .transparent-bg {
            background-color: transparent;
        }

        .card.no-border {
            border: none !important;
        }
    </style>
    @php
    $i = 1;
    @endphp
</head>

<body>

    <div class="hero_area mt-5">
        @include('passenger.header')
        <div id="head" class="head">
            <img src="{{ asset('images/' . $buscompany->image) }}" alt="Bus Company Image" class="card-title-image rounded-circle">
            <h4 class="pt-2 fs-3">Select Seat</h4>
        </div>
        <div class="row justify-content-center " style="margin-left:90px">
            <div class="col-md-11 mb-4" style="margin-left: 20px">
                <div class="card no-border">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-10 col-md-9 col-sm-12">

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <p class="card-text text-lg-start text-md-start text-sm-center fs-5">
                                            {{$route->source}}
                                        </p>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <p class="card-text text-lg-end text-md-start text-sm-center fs-5">
                                            {{$route->destination}}
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <p class="card-text text-lg-start text-md-end text-sm-center">
                                            {{ date('l F j, Y', strtotime($date)) }}
                                        </p>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <p class="card-text text-lg-end text-md-end text-sm-center">
                                            {{ date('l F j, Y', strtotime($date)) }}
                                        </p>
                                    </div>
                                    <!-- <div class="col-lg-6 col-md-6 col-sm-6">
                                                <p class="card-text text-lg-end text-md-end text-sm-center">
                                                    <span class="text-danger fs-3">{{$schedule->price}} ETB</span>
                                                </p>
                                            </div> -->
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <p class="card-text text-lg-start text-md-start text-sm-center fs-4">
                                            <strong>{{$route->dep_time}}</strong>
                                        </p>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 mt-3">
                                        <div class="line-container">
                                            <hr class="line">
                                            <div class="duration">{{$route->duration}}</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <p class="card-text text-lg-end text-md-end text-sm-center font-weight-bold fs-4">
                                            <strong>{{$route->est_arrival_time}}</strong>
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <h2 style="opacity:0.8" class="fs-2">Fill Passenger Details</h2>
        </div>


        <div class="container mt-4">
            <div class="row">
                <div class="col-md-8 col-sm-3 offset-md-2">
                    <div class="card  shadow transparent-bg">
                        <div class="card-body">
                            @if(session('message'))
                            <div class="alert alert-danger" id="flash-message" role="alert">
                                {{ session('message') }}
                                <button type="button" class="close closebtn" data-dismiss="alert" aria-label="Close" onclick="removeFlashMessage()">
                                    <span class="" aria-hidden="true">X</span>
                                </button>
                            </div>
                            @endif

                            <form action="{{route('detail')}}" method="post" class="search-form-container">
                                @csrf
                                @foreach($selectedseats as $seat)
                                <div class="d-flex justify-content-between mt-3">
                                    <h1 class="fs-4">Passenger Detail:{{$i}}</h1>
                                    <div class="seat">
                                        <p class="">{{$seat}}</p>
                                        <img src="{{asset('images/chair.png')}}" width="50" height="50" class="seat-image" alt="Image">
                                    </div>
                                </div>

                                <div class="card  shadow transparent-bg p-3 m-3 ">


                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingInput" name="passenger[{{ $i }}][name]" placeholder="Full Name" required>
                                        <span style="color:red">@error('passenger[{{ $i }}][name]'){{ $message }}@enderror</span>
                                        <label for="floatingSelect">Enter full name</label>
                                    </div>


                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="floatingInput" name="passenger[{{ $i }}][phone]" placeholder="Phone" required>
                                        <span style="color:red">@error('phone'){{ $message }}@enderror</span>
                                        <label for="floatingSelect">Enter phone number</label>
                                    </div>

                                    <div class="form-floating">
                                        <input type="hidden" class="form-control" id="floatingInput" name="passenger[{{ $i }}][seat]" value="{{$seat}}">
                                    </div>

                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="passenger[{{ $i }}][terminal]">
                                            <option value="" selected disabled>Select Terminal</option>
                                            @foreach($terminal as $terminals)
                                            <option value="{{ $terminals->name }}">{{ $terminals->name }}</option>
                                            @endforeach
                                        </select>
                                        <span style="color:red">@error('terminal'){{ $message }}@enderror</span>
                                        <label for="floatingSelect">Terminal</label>
                                    </div>


                                </div>

                                <?php $i++ ?>
                                @endforeach

                                <input type="hidden" name="scheduleId" value="{{ $schedule->id }}">

                                <input type="hidden" name="seatId" value="{{ $seatId }}">

                                <input type="hidden" name="seatsel" value="{{ $selectedseats2 }}">

                                <input type="hidden" name="date" value="{{ $date }}">

                                <button type="submit" class="btn btn-success mt-3 bg-success text-white">Book Ticket</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    </div>
    @include('passenger.footer')
</body>

</html>