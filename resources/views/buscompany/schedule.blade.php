<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Available Schedules</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{asset('css/bustyle.css')}}" rel="stylesheet" />
    <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/dashboard.css')}}" />

    <style>
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f1f1f1;
        }
    </style>
  
    <?php

    use App\Models\Buses;
    use App\Models\Route;
    ?>
</head>

<body>
    @include('buscompany.slider', ['page' => $page])
    <div class="heading-container heading-center m-5" style="padding-top:50px">
        <h2 class="pl-5 fs-1 text-primary custom-font">Available Schedues</h2>
        <div class="d-flex gx-3">
            <a class="btn btn-dark " data-toggle="modal" data-target="#exampleModal">Add Round Schedule</a>
            <a class="btn btn-dark mx-2" data-toggle="modal" data-target="#oneexampleModal">Add One Time Schedule</a>
        </div>
    </div>

    @if(isset($schedule) && $schedule->count()>0)
    <div class="container ">
        @if(session('message'))
        <div class=" d-flex  alert alert-success " id="flash-message" role="alert">
            <div class="" style="font-size:20px">{{session('message')}}</div>
            <button type="button" class="close closebtn" data-dismiss="alert" aria-label="Close" onclick="removeFlashMessage()">
                <span class="" aria-hidden="true">X</span>
            </button>
        </div>
        @elseif(session('failed'))
        <div class=" d-flex  alert alert-danger " id="flash-message" role="alert">
            <div class="" style="font-size:20px">{{session('failed')}}</div>
            <button type="button" class="close closebtn" data-dismiss="alert" aria-label="Close" onclick="removeFlashMessage()">
                <span class="" aria-hidden="true">X</span>
            </button>
        </div>
        @elseif($errors->any())
        <div class=" d-flex  alert alert-danger " id="flash-message" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close closebtn" data-dismiss="alert" aria-label="Close" onclick="removeFlashMessage()">
                <span class="" aria-hidden="true">X</span>
            </button>
        </div>
        @endif
        <div class="table-responsive">
            <table class="table table-striped  table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Source</th>
                        <th>Destination</th>
                        <th>Route Type</th>
                        <th>Bus Id</th>
                        <th>Price</th>
                        <th>Terminal</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                @foreach($schedule as $schedules)
                <tr>
                    <?php
                    $route = Route::where('id', $schedules->route_id)->first();
                    ?>
                    <td>{{$route->source}}</td>
                    <td>{{$route->destination}}</td>
                    <td>{{$schedules->route_type}}</td>
                    <?php
                      $bus = Buses::where('id', $schedules->bus_id)->first();
                    ?>
                    <td>{{$bus->bus_com_id}}</td>
                    <td>{{$schedules->price}}</td>
                    <td>{{$schedules->terminal}}</td>
                    <td>{{date('l F j, Y', strtotime($schedules->start_date))}}</td>
                    <td>{{date('l F j, Y', strtotime($schedules->end_date))}}</td>
                    <td>{{$schedules->status}}</td>
                    <td>
                        <div class="d-flex gap-2 align-items-center">
                            <a class="btn btn-success text-white" href="{{url('edit',$schedules->id)}}" data-bs-toggle="tooltip" data-bs-placement="right" title="Edit Schedule">
                                <i class='bx bx-pencil nav_icon'></i>
                            </a>
                            <a class="btn btn-danger " data-toggle="modal" data-target="#confirmDeleteModal{{$schedules->id}}">
                                <i class="fa fa-trash"></i>
                            </a>
                            @if($schedules->status == 'Available')
                            <a class="btn btn-primary text-white"  data-bs-toggle="tooltip" data-bs-placement="right" title="Close Schedule" href="{{url('close',$schedules->id)}}">
                              <i class="fa fa-times" aria-hidden="true"></i>
                            </a>
                            @else
                            <a class="btn btn-info text-white" data-bs-toggle="tooltip" data-bs-placement="right" title="Open Schedule" href="{{url('open',$schedules->id)}}" >
                            <i class="fa fa-check" aria-hidden="true"></i>
                            </a>
                            @endif
                        </div>
                    </td>
                   
                </tr>


                <!-- Modal Delete-->
                <div class="modal fade" id="confirmDeleteModal{{$schedules->id}}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModal{{$schedules->id}}Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeleteModal{{$schedules->id}}Label">Confirm Delete Schedule</h5>
                                <a type="button" class="close" style="opacity:1" data-dismiss="modal" aria-label="Close">
                                    <span style="border-radius:3px;opacity:1;" aria-hidden="true" class="bg-danger text-white p-1 pt-1 fs-5">&times;</span>
                                </a>
                            </div>
                            <div class="modal-body contents">
                                <p>Are you sure you want to delete this schedule?</p>
                            </div>
                            <div class="modal-footer">
                                <a style="color: white;" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                <a href="{{url('delete_schedules',$schedules->id)}}" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </table>
        </div>



        @else
        <div class="text-center message">
            <p>No Schedule Yet!!</p>
        </div>
        @endif

        <!--Model Add Round Schedule-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg"> <!-- Added modal-lg class for a wider modal -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Round Schedule</h1>
                        <a type="button" class="close" style="opacity:1" data-dismiss="modal" aria-label="Close">
                            <span style="border-radius:3px;opacity:1;" aria-hidden="true" class="bg-danger text-white p-1 pt-1 fs-5">&times;</span>
                        </a>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('add_schedules')}}" method="post">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-5">
                                    <label for="source" class="col-form-label"><strong>Source:</strong></label>
                                    <select name="source" class="form-select form-select-lg mb-3" aria-label="Large select example">
                                        <option selected disabled>Select Source</option>
                                        @foreach($cities as $onecities)
                                        <option value="{{$onecities->name}}">{{$onecities->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label for="destination" class="col-form-label"><strong>Destination:</strong></label>
                                    <select name="destination" class="form-select form-select-lg mb-3" aria-label="Large select example">
                                        <option selected disabled>Select Destination</option>
                                        @foreach($cities2 as $city2)
                                        <option value="{{$city2->name}}">{{$city2->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label for="routetype" class="col-form-label"><strong>Route Type:</strong></label>
                                    <select name="routetype" class="form-select form-select-lg mb-3" aria-label="Large select example">
                                        <option selected disabled>Select</option>
                                        <option value="Even">Even</option>
                                        <option value="Odd">Odd</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3"> <!-- Wrap the next two inputs in a row -->
                                <div class="col-md-6">
                                    <label for="startdate" class="col-form-label"><strong>Start Date:</strong></label>
                                    <input type="date" class="form-control" id="floatingInput" name="startdate" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="enddate" class="col-form-label"><strong>End Date:</strong></label>
                                    <input type="date" class="form-control" id="floatingInput" name="enddate" placeholder="" required>
                                </div>
                            </div>
                            <div class="row mb-3"> <!-- Wrap the next two inputs in a row -->
                                <div class="col-md-6">
                                    <label for="bus" class="col-form-label"><strong>Assign Bus:</strong></label>
                                    <select name="bus" class="form-select form-select-lg mb-3" aria-label="Large select example">
                                        <option selected disabled>Select Bus</option>
                                        @foreach($combuses as $bus)
                                        <option value="{{$bus->bus_com_id}}">{{$bus->bus_com_id}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="price" class="col-form-label"><strong>Ticket Price:</strong></label>
                                    <input type="number" name="price" min="1" class="form-control" id="price" placeholder="Enter Ticket Price" required>
                                </div>
                            </div>
                            <div class="row mb-3"> <!-- Wrap the remaining two inputs in a row -->
                                <div class="col-md-6">
                                    <label for="status" class="col-form-label"><strong>Status:</strong></label>
                                    <select name="status" class="form-select form-select-lg mb-3" aria-label="Large select example">
                                        <option selected disabled>Select Schedule Status</option>
                                        <option value="Available">Available</option>
                                        <option value="Unavailable">Unavailable</option>
                                        <option value="Expired">Expired</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary bg-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success bg-success">Add Schedule</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Model One time schedule -->
        <div class="modal fade" id="oneexampleModal" tabindex="-1" aria-labelledby="oneexampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg"> <!-- Added modal-lg class for a wider modal -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="oneexampleModalLabel">Add One time Schedule</h1>
                        <a type="button" class="close" style="opacity:1" data-dismiss="modal" aria-label="Close">
                            <span style="border-radius:3px;opacity:1;" aria-hidden="true" class="bg-danger text-white p-1 pt-1 fs-5">&times;</span>
                        </a>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('add_one_schedules')}}" method="post">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-5">
                                    <label for="source" class="col-form-label"><strong>Source:</strong></label>
                                    <select name="source" class="form-select form-select-lg mb-3" aria-label="Large select example">
                                        <option selected disabled>Select Source</option>
                                        @foreach($cities as $cities)
                                        <option value="{{$cities->name}}">{{$cities->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label for="destination" class="col-form-label"><strong>Destination:</strong></label>
                                    <select name="destination" class="form-select form-select-lg mb-3" aria-label="Large select example">
                                        <option selected disabled>Select Destination</option>
                                        @foreach($cities2 as $city2)
                                        <option value="{{$city2->name}}">{{$city2->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label for="routetype" class="col-form-label"><strong>Route Type:</strong></label>
                                    <select name="routetype" class="form-select form-select-lg mb-3" aria-label="Large select example">
                                        <option selected disabled>Select</option>
                                        <option value="Even">Even</option>
                                        <option value="Odd">Odd</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3"> <!-- Wrap the next two inputs in a row -->
                                <div class="col-md-6">
                                    <label for="date" class="col-form-label"><strong>Date:</strong></label>
                                    <input type="date" class="form-control" id="floatingInput" name="date" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="bus" class="col-form-label"><strong>Assign Bus:</strong></label>
                                    <select name="bus" class="form-select form-select-lg mb-3" aria-label="Large select example">
                                        <option selected disabled>Select Bus</option>
                                        @foreach($combuses as $bus)
                                        <option value="{{$bus->bus_com_id}}">{{$bus->bus_com_id}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3"> <!-- Wrap the next two inputs in a row -->

                                <div class="col-md-6">
                                    <label for="price" class="col-form-label"><strong>Ticket Price:</strong></label>
                                    <input type="number" name="price" min="1" class="form-control" id="price" placeholder="Enter Ticket Price" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="status" class="col-form-label"><strong>Status:</strong></label>
                                    <select name="status" class="form-select form-select-lg mb-3" aria-label="Large select example">
                                        <option selected disabled>Select Schedule Status</option>
                                        <option value="Available">Available</option>
                                        <option value="Unavailable">Unavailable</option>
                                        <option value="Expired">Expired</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary bg-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success bg-success">Add Schedule</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function removeFlashMessage() {
            var flashMessage = document.getElementById('flash-message');
            if (flashMessage) {
                flashMessage.parentNode.removeChild(flashMessage);
            }
        }
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- popper js -->
    <script src="{{asset('js/popper.min.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <!-- custom js -->
    <script src="{{asset('/js/custom.js')}}"></script>

    <script src="{{asset('js/dasboard.js')}}"></script>
</body>

</html>