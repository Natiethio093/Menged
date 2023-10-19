<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seats</title>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="{{asset('css/seat-option.css')}}" rel="stylesheet" />
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('css/style3.css')}}" rel="stylesheet" />
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Font Awesome -->
    <style>
        .card.no-border {
            border: none !important;
        }

        .toast-success {
            background-color: #094f07 !important;
            color: #fff !important;
        }

        .toast-error {
            background-color: #b91515 !important;
            color: #fff !important;
        }

        .toast-info {
            background-color: #0a617e !important;
            color: #fff !important;
        }
    </style>
    <?php

    use Illuminate\Support\Facades\Session;
    ?>



</head>

<body>
    <div class="container  d-flex justify-content-center">
        <section id="seat" class="body">

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
                                                <p class="card-text text-lg-center text-md-start text-sm-center fs-5">
                                                    {{$route->source}}
                                                </p>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <p class="card-text text-lg-center text-md-start text-sm-center fs-5">
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
                <div class=" d-flex flex-wrap justify-content-center">
                    <div class="col-md-2 pr-5">
                        <img src="{{asset('images/Selected.png')}}" width="40" height="40" class="" alt="Image">
                        <p class="text-left">Selected</p>
                    </div>
                    <div class="col-md-2">
                        <img src="{{asset('images/Reserved.png')}}" width="40" height="40" class="" alt="Image">
                        <p class="text-left">Reserved</p>
                    </div>
                    <div class="col-md-2">
                        <img src="{{asset('images/Booked.png')}}" width="40" height="40" class="" alt="Image">
                        <p class="text-left">Booked</p>
                    </div>
                    <div class="col-md-2">
                        <img src="{{asset('images/chair.png')}}" width="40" height="40" class="" alt="Image">
                        <p class="text-left">Available</p>
                    </div>
                    <div class="col-md-2">
                        <img src="{{asset('images/Disabled.png')}}" width="40" height="40" class="" alt="Image">
                        <p class="text-left">Disabled</p>
                    </div>
                </div>

                @if (session('error'))
                <div class="alert alert-danger" id="flash-message" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close closebtn" data-dismiss="alert" aria-label="Close" onclick="removeFlashMessage()">
                        <span class="" aria-hidden="true">X</span>
                    </button>
                </div>
                @elseif (session('success'))
                <div class="alert alert-success" id="flash-message" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close closebtn" data-dismiss="alert" aria-label="Close" onclick="removeFlashMessage()">
                        <span class="" aria-hidden="true">X</span>
                    </button>
                </div>
                @endif
                <div class="mb-3">
                    <form id="addBookingForm" action="{{url('seatselects')}}" method="POST" class="mt-5" id="myForm">
                        @csrf
                        <table id="seatsDiagram" class="table">
                            <tr>
                                <script>
                                    for (let i = 3; i <= 47; i += 4) {
                                        if (i === 27) {
                                            document.write(`<td class="space">&nbsp;</td>`);
                                        }

                                        document.write(`
                                            <td id="seat-${i}" class="seat" data-name="${i}">
                                                <div class="d-flex justify-content-center">
                                                    <p>${i}</p>
                                                    <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">
                                                    <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">
                                                    <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">
                                                    <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                                </div>
                                            </td>
                                        `);
                                    }
                                </script>
                            </tr>
                            <tr>
                                <script>
                                    for (let i = 4; i <= 48; i += 4) {

                                        if (i === 28) {
                                            document.write(`<td class="space">&nbsp;</td>`);
                                        }

                                        document.write(`
                                            <td id="seat-${i}" class="seat" data-name="${i}">
                                                <div class="d-flex justify-content-center">
                                                    <p>${i}</p>
                                                    <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">
                                                    <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">
                                                    <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">
                                                    <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                                </div>
                                            </td>
                                        `);
                                    }
                                </script>
                            </tr>
                            <tr>
                                <td class="space">&nbsp;</td>
                                <td class="space">&nbsp;</td>
                                <td class="space">&nbsp;</td>
                                <td class="space">&nbsp;</td>
                                <td class="space">&nbsp;</td>
                                <td class="space">&nbsp;</td>
                                <td class="space">&nbsp;</td>
                                <td class="space">&nbsp;</td>
                                <td class="space">&nbsp;</td>
                                <td class="space">&nbsp;</td>
                                <td class="space">&nbsp;</td>
                                <td class="space">&nbsp;</td>
                                <td id="seat-51" class="seat" data-name="51">
                                    <div class="d-flex justify-content-center">
                                        <p class="">51</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                        <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">
                                        <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <script>
                                    for (let i = 2; i <= 50; i += 4) {
                                        document.write(`
                                            <td id="seat-${i}" class="seat" data-name="${i}">
                                                <div class="d-flex justify-content-center">
                                                    <p>${i}</p>
                                                    <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">
                                                    <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">
                                                    <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">
                                                    <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                                </div>
                                            </td>
                                        `);
                                    }
                                </script>
                            <tr>
                                <script>
                                    for (let i = 1; i <= 49; i += 4) {
                                        document.write(`
                                            <td id="seat-${i}" class="seat" data-name="${i}">
                                                <div class="d-flex justify-content-center">
                                                    <p>${i}</p>
                                                    <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">
                                                    <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">
                                                    <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">
                                                    <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                                </div>
                                            </td>
                                        `);
                                    }
                                </script>
                            </tr>
                        </table>
                </div>
                <div class="col-auto">
                    <input type="hidden" id="seatInput" class="form-control" name="seatInput" readonly>
                </div>

                <input type="hidden" id="bookedSeatsInput" value="{{ implode(',', $bookedSeats) }}" readonly>

                <input type="hidden" id="reservedSeatsInput" value="{{ implode(',', $reservedSeats) }}" readonly>

                <input type="hidden" name="scheduleId" value="{{ $schedule->id }}">

                <input type="hidden" name="date" value="{{ $date }}">

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success bg-success text-white" name="submit">Next</button>
                </div>
                </form>
            </div>
    </div>
    </section>
    @include('passenger.footer')

    <script src="{{asset('home/js/jquery-3.4.1.min.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js" integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    
    @if(Session::has('error'))
      <script>
        toastr.options = {
            "progressBar": true,
            "positionClass": "toast-top-right",
            "closeButton": true,
        }
        toastr.error("{{ Session::get('error') }}", 'Error!', {timeOut: 10000 });
      </script>
    @endif

    <script>
      function removeFlashMessage() {
         var flashMessage = document.getElementById('flash-message');
         if (flashMessage) {
            flashMessage.parentNode.removeChild(flashMessage);
         }
      }
   </script>

    <script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>

    <script src="{{asset('js/seatscript.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <!-- popper js -->
    <script src="{{asset('js/popper.min.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <!-- custom js -->
    <script src="{{asset('js/custom.js')}}"></script>
</body>

</html>