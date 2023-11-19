<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Buses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{asset('css/bustyle.css')}}" rel="stylesheet" />
    <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/dashboard.css')}}" />
    <?php
    $page = "buses";
    ?>
</head>

<body>
    @include('buscompany.slider', ['page' => $page])
    <div class="heading-container heading-center m-5" style="padding-top:50px">
        <h2 class="pl-5 fs-1 text-primary custom-font">Buses</h2>
        <a class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">Add Bus</a>
    </div>

    @if(isset($buses) && $buses->count()>0)
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
            <table class="table table-striped table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Plate Number</th>
                        <th>Bus Id</th>
                        <th>Side Number</th>
                        <th>Capacity</th>
                        <th>Available Seats</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                @foreach($buses as $buses)
                <tr>
                    <td>{{$buses->bus_plate_number}}</td>
                    <td>{{$buses->bus_com_id }}</td>
                    <td>{{$buses->bus_side_num}}</td>
                    <td>{{$buses->capacity}}</td>
                    <td>{{$buses->seat_available}}</td>
                    <td>{{$buses->status}}</td>
                    <td>
                        <a class="btn btn-success text-white" href="#">
                            Edit
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal{{$buses->id}}">
                            Delete
                        </a>
                    </td>
                </tr>

                <!-- Modal Delete-->
                <div class="modal fade" id="confirmDeleteModal{{$buses->id}}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModal{{$buses->id}}Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeleteModal{{$buses->id}}Label">Confirm Delete Bus</h5>
                                <a type="button" class="close" style="opacity:1" data-dismiss="modal" aria-label="Close">
                                    <span style="border-radius:3px;opacity:1;" aria-hidden="true" class="bg-danger text-white p-1 pt-1 fs-5">&times;</span>
                                </a>
                            </div>
                            <div class="modal-body contents">
                                <p>Are you sure you want to delete this bus?</p>
                            </div>
                            <div class="modal-footer">
                                <a style="color: white;" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                <a href="{{url('delete_bus',$buses->id)}}" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </table>
        </div>
        <!--Model Add Bus-->
        
    </div>

    @else
    <div class="text-center message">
        <p>No Bus Register</p>
    </div>
    @endif
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Bus</h1>
                        <a type="button" class="close" style="opacity:1" data-dismiss="modal" aria-label="Close">
                            <span style="border-radius:3px;opacity:1;" aria-hidden="true" class="bg-danger text-white p-1 pt-1 fs-5">&times;</span>
                        </a>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('add_bus')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="platenumber" class="col-form-label"><strong>Plate Number:</strong></label>
                                <input type="text" name="platenumber" class="form-control" id="platenumber" placeholder="Enter Plate number" required>
                            </div>
                            <div class="mb-3">
                                <label for="busid" class="col-form-label"><strong>Bus Id:</strong></label>
                                <input type="text" name="busid" class="form-control" id="busid"  placeholder="Enter Bus Id" required>
                            </div>
                            <div class="mb-3">
                                <label for="sidenumber" class="col-form-label"><strong>Side Number:</strong></label>
                                <input type="number" name="sidenumber" min="1" class="form-control" id="sidenumber"  placeholder="Enter Side number"  required>
                            </div>
                            <div class="mb-3">
                                <label for="capacity" class="col-form-label"><strong>Capacity:</strong></label>
                                <input type="number" name="capacity" min="1" class="form-control" id="capacity"  placeholder="Enter Bus Capacity" required>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="col-form-label"><strong>Status:</strong></label>
                                <select name="status" class="form-select form-select-lg mb-3" name="status" aria-label="Large select example">
                                    <option selected disabled>Select Bus Status</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                    <option value="on maintenance">On Maintenance</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary bg-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success bg-success">Add Bus</button>
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


    <!-- popper js -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script> -->
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