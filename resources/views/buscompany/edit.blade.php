<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit Schedules</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{asset('css/bustyle.css')}}" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/dashboard.css')}}" />

    <style>
        .span{
          color:red;
        }
    </style>
</head>

<body>
    @include('buscompany.slider', ['page' => $page])


    <div class="container " style="margin-top:100px">

     
        <div class="row">

            @if(session('edit'))
            <div class="d-flex alert alert-success alert-dismissible fade show" id="flash-message" role="alert">
                <div class="flex-grow-1" style="font-size: 20px">{{session('edit')}}</div>
                <button type="button" class="close closebtn" data-dismiss="alert" aria-label="Close" onclick="removeFlashMessage()">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            @endif
            
            <div class="col-md-6 col-sm-3 offset-md-3">
                <div class="card  transparent-bg shadow">
                    <div class="card-body">
                        <div class="heading-container heading-center" style="">
                            <h2 class="pl-4 fs-1 text-primary custom-font">Edit Schedue</h2>
                        </div>
                        <form action="{{url('editschedule',$schedule->id)}}" method="post">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="source" class="col-form-label"><strong>Source:</strong></label>
                                    <select name="source" class="form-select form-select-lg mb-3" aria-label="Large select example">
                                        <option value="{{$route->source}}">{{$route->source}}</option>
                                        @foreach($cities as $onecities)
                                        @if ($onecities->name !== $route->source)
                                        <option value="{{$onecities->name}}">{{$onecities->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <span class="span">@error('source'){{$message}}@enderror</span>
                                </div>
                                <div class="col-md-6">
                                    <label for="destination" class="col-form-label"><strong>Destination:</strong></label>
                                    <select name="destination" class="form-select form-select-lg mb-3" aria-label="Large select example">
                                        <option value="{{$route->destination}}">{{$route->destination}}</option>
                                        @foreach($cities2 as $city2)
                                        @if ($city2->name !== $route->destination)
                                        <option value="{{$city2->name}}">{{$city2->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <span class="span">@error('destination'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="routetype" class="col-form-label"><strong>Route Type:</strong></label>
                                    <select name="routetype" class="form-select form-select-lg mb-3" aria-label="Large select example">
                                        <option value="{{$schedule->route_type}}">{{$schedule->route_type}}</option>
                                        @if($schedule->route_type == 'Even')
                                        <option value="Odd">Odd</option>
                                        @elseif($schedule->route_type == 'Odd')
                                        <option value="Even">Even</option>
                                        @endif
                                    </select>
                                    <span class="span">@error('routetype'){{$message}}@enderror</span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="startdate" class="col-form-label"><strong>Start Date:</strong></label>
                                    <input type="date" class="form-control" id="floatingInput" name="startdate" placeholder="" value="{{$schedule->start_date}}" required>
                                    <span class="span">@error('startdate'){{$message}}@enderror</span>
                                </div>
                                <div class="col-md-6">
                                    <label for="enddate" class="col-form-label"><strong>End Date:</strong></label>
                                    <input type="date" class="form-control" id="floatingInput" name="enddate" value="{{$schedule->end_date}}" placeholder="" required>
                                    <span class="span">@error('enddate'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="bus" class="col-form-label"><strong>Assign Bus:</strong></label>
                                    <select name="bus" class="form-select form-select-lg mb-3" aria-label="Large select example">
                                        @foreach($combuses as $bus)
                                        @if ($bus->bus_com_id !== $busId->bus_com_id)
                                        <option value="{{$bus->bus_com_id}}">{{$bus->bus_com_id}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <span class="span">@error('bus'){{$message}}@enderror</span>
                                </div>
                                <div class="col-md-6">
                                    <label for="price" class="col-form-label"><strong>Ticket Price:</strong></label>
                                    <input type="number" name="price" min="1" class="form-control" id="price" value="{{$schedule->price}}" placeholder="Enter Ticket Price" required>
                                    <span class="span">@error('price'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="row mb-3 mt-3">
                                <div class="col-md-12">
                                <select name="terminal" class="form-select form-select-lg mb-3" aria-label="Large select example">
                                   <option value="{{$schedule->terminal}}">{{$schedule->terminal}}</option>
                                        @foreach($terminal as $term)
                                        @if ($term->name !== $schedule->terminal)
                                         <option value="{{$term->name}}">{{$term->name}}</option>
                                        @endif
                                        @endforeach
                                </select>
                                    <span class="span">@error('bus'){{$message}}@enderror</span>
                                </div>
                             </div>
                             <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="status" class="col-form-label"><strong>Status:</strong></label>
                                    <select name="status" class="form-select form-select-lg mb-3" aria-label="Large select example">
                                        <option value="{{$schedule->status}}">{{$schedule->status}}</option>
                                        @if($schedule->status == 'Available')
                                        <option value="Unavailable">Unavailable</option>
                                        <option value="Expired">Expired</option>
                                        @elseif($schedule->status == 'Unvailable')
                                        <option value="Available">Available</option>
                                        <option value="Expired">Expired</option>
                                        @else
                                        <option value="Available">Available</option>
                                        <option value="Unavailable">Unavailable</option>
                                        @endif
                                    </select>
                                    <span class="span">@error('status'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success bg-success">Edit Schedule</button>
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