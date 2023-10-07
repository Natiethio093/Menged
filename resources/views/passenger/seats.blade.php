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
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>
    <style>
        .card.no-border {
            border: none !important;
        }
    </style>

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
                        <p class="text-left" >Reserved</p>
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
                    <form id="addBookingForm" action="{{route('seatselects',['scheduleId' => $schedule->id ,'date' => $date])}}" method="POST" class="mt-5" id="myForm">
                        @csrf
                        <table id="seatsDiagram" class="table">
                            <tr>
                                <td id="seat-3" class="seat" data-name="3">
                                    <div class="d-flex justify-content-center">
                                        <p class=" mr-2">3</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image" data-color="black">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                        <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">
                                         
                                        <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                      
                                    </div>
                                </td>
                                <td id="seat-7" class="seat" data-name="7">
                                    <div class="d-flex justify-content-center">
                                        <p class="">7</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                        <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                        <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image"> 
                                    </div>
                                </td>
                                <td id="seat-11" class="seat" data-name="11">
                                    <div class="d-flex justify-content-center">
                                        <p class="">11</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                        <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                        <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">


                                    </div>
                                </td>
                                <td id="seat-15" class="seat " data-name="15">
                                    <div class="d-flex justify-content-center">
                                        <p class="">15</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                        <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                        <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-19" class="seat" data-name="19">
                                    <div class="d-flex justify-content-center">
                                        <p class="">19</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                        <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                        <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-23" class="seat" data-name="23">
                                    <div class="d-flex justify-content-center">
                                        <p class="">23</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                        <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                        <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-27" class="seat" data-name="27">
                                    <div class="d-flex justify-content-center">
                                        <p class="">27</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                        <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                        <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td class="space">&nbsp;</td>
                                <td id="seat-31" class="seat" data-name="31">
                                    <div class="d-flex justify-content-center">
                                        <p class="">31</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                        <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                        <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-35" class="seat" data-name="35">
                                    <div class="d-flex justify-content-center">
                                        <p class="">35</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                        <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                        <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-39" class="seat" data-name="39">
                                    <div class="d-flex justify-content-center">
                                        <p class="">39</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                        <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                        <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-43" class="seat" data-name="43">
                                    <div class="d-flex justify-content-center">
                                        <p class="">43</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                        <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                        <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-47" class="seat" data-name="47">
                                    <div class="d-flex justify-content-center">
                                        <p class="">47</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                         <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                         <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td id="seat-4" class="seat" data-name="4">
                                    <div class="d-flex justify-content-center">
                                        <p class="">4</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                         <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                         <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-8" class="seat" data-name="8">
                                    <div class="d-flex justify-content-center">
                                        <p class="">8</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                         <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                         <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-12" class="seat" data-name="12">
                                    <div class="d-flex justify-content-center">
                                        <p class="">12</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                         <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                         <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-16" class="seat" data-name="16">
                                    <div class="d-flex justify-content-center">
                                        <p class="">16</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                         <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                         <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-20" class="seat" data-name="20">
                                    <div class="d-flex justify-content-center">
                                        <p class="">20</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                         <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                         <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-24" class="seat" data-name="24">
                                    <div class="d-flex justify-content-center">
                                        <p class="">24</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                         <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                         <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-28" class="seat" data-name="28">
                                    <div class="d-flex justify-content-center">
                                        <p class="">28</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                         <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                         <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td class="space">&nbsp;</td>
                                <td id="seat-32" class="seat" data-name="32">
                                    <div class="d-flex justify-content-center">
                                        <p class="">32</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                         <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                         <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-36" class="seat " data-name="36">
                                    <div class="d-flex justify-content-center">
                                        <p class="">36</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                         <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                         <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-40" class="seat" data-name="40">
                                    <div class="d-flex justify-content-center">
                                        <p class="">40</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                         <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                         <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-44" class="seat" data-name="44">
                                    <div class="d-flex justify-content-center">
                                        <p class="">44</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                         <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                         <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-48" class="seat" data-name="48">
                                    <div class="d-flex justify-content-center">
                                        <p class="">48</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                         <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                         <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
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
                                <td id="seat-2" class="seat" data-name="2">
                                    <div class="d-flex justify-content-center">
                                        <p class="">2</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                        <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                        <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-6" class="seat" data-name="6">
                                    <div class="d-flex justify-content-center">
                                        <p class="">6</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                         <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                         <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-10" class="seat" data-name="10">
                                    <div class="d-flex justify-content-center">
                                        <p class="">10</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                         <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                         <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-14" class="seat" data-name="14">
                                    <div class="d-flex justify-content-center">
                                        <p class="">14</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                         <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                         <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-18" class="seat" data-name="18">
                                    <div class="d-flex justify-content-center">
                                        <p class="">18</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                         <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                         <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-22" class="seat" data-name="22">
                                    <div class="d-flex justify-content-center">
                                        <p class="">22</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                         <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                         <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-26" class="seat" data-name="26">
                                    <div class="d-flex justify-content-center">
                                        <p class="">26</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                         <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                         <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-30" class="seat" data-name="30">
                                    <div class="d-flex justify-content-center">
                                        <p class="">30</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                         <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                         <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-34" class="seat" data-name="34">
                                    <div class="d-flex justify-content-center">
                                        <p class="">34</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                         <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                         <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-38" class="seat" data-name="38">
                                    <div class="d-flex justify-content-center">
                                        <p class="">38</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                        <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                        <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-42" class="seat" data-name="42">
                                    <div class="d-flex justify-content-center">
                                        <p class="">42</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                         <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                         <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-46" class="seat" data-name="46">
                                    <div class="d-flex justify-content-center">
                                        <p class="">46</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                        <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                        <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-50" class="seat" data-name="50">
                                    <div class="d-flex justify-content-center">
                                        <p class="">50</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                         <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                         <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td id="seat-1" class="seat" data-name="1">
                                    <div class="d-flex justify-content-center">
                                        <p class="">1</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                         <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                         <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-5" class="seat" data-name="5">
                                    <div class="d-flex justify-content-center">
                                        <p class="">5</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                         <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                         <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-9" class="seat" data-name="9">
                                    <div class="d-flex justify-content-center">
                                        <p class="">9</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                         <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                         <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-13" class="seat" data-name="13">
                                    <div class="d-flex justify-content-center">
                                        <p class="">13</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                         <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                         <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-17" class="seat" data-name="17">
                                    <div class="d-flex justify-content-center">
                                        <p class="">17</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                         <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                         <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-21" class="seat" data-name="21">
                                    <div class="d-flex justify-content-center">
                                        <p class="">21</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                         <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                         <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-25" class="seat" data-name="25">
                                    <div class="d-flex justify-content-center">
                                        <p class="">25</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                        <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                        <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-29" class="seat" data-name="29">
                                    <div class="d-flex justify-content-center">
                                        <p class="">29</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                        <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                        <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-33" class="seat" data-name="33">
                                    <div class="d-flex justify-content-center">
                                        <p class="">33</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                        <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                        <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-37" class="seat" data-name="37">
                                    <div class="d-flex justify-content-center">
                                        <p class="">37</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                        <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                        <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-41" class="seat" data-name="41">
                                    <div class="d-flex justify-content-center">
                                        <p class="">41</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                         <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                         <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">

                                       
                                    </div>
                                </td>
                                <td id="seat-45" class="seat" data-name="45">
                                    <div class="d-flex justify-content-center">
                                        <p class="">45</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                         <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                         <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                                <td id="seat-49" class="seat" data-name="49">
                                    <div class="d-flex justify-content-center">
                                        <p class="">49</p>
                                        <img src="{{asset('images/chair.png')}}" width="70" height="70" class="seat-image" alt="Image">

                                        <img src="{{asset('images/Selected.png')}}" width="70" height="70" class="selected-image" alt="Selected Image">

                                         <img src="{{asset('images/Booked.png')}}" width="70" height="70" class="booked-images" alt="Booked Image">

                                         <img src="{{asset('images/Reserved.png')}}" width="70" height="70" class="reserved-images" alt="Reserved Image">
                                    </div>
                                </td>
                            </tr>
                        </table>
                </div>
                <div class="col-auto">
                    <input type="hidden" id="seatInput" class="form-control" name="seatInput" readonly>
                </div>
                
                <input type="hidden" id="bookedSeatsInput" value="{{ implode(',', $bookedSeats) }}" readonly>

                <input type="hidden" id="reservedSeatsInput" value="{{ implode(',', $reservedSeats) }}" readonly>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success bg-success text-white" name="submit">Next</button>
                </div>
                </form>
            </div>
        </section>
    </div>
   
    @include('passenger.footer')
    
<script src="{{asset('js/seatscript.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<!-- popper js -->
<script src="{{asset('js/popper.min.js')}}"></script>
<!-- bootstrap js -->
<script src="{{asset('js/bootstrap.js')}}"></script>
<!-- custom js -->
<script src="{{asset('js/custom.js')}}"></script>
</body>

</html>