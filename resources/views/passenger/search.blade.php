<head>
    <style>
        .transparent-bg {
            background-color: transparent;
        }
    </style>
</head>
  <div class="container mt-4">
     <div class="row">
        <div class="col-md-8 col-sm-3 offset-md-2">
            <div class="card  transparent-bg">
                <div class="card-body">
                    <form action="{{ url('/search') }}" method="POST" class="search-form-container">
                        @csrf
                        <h2 style="opacity:0.5" class="fs-2">Search For Tickets</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" aria-label="Floating label select example" name="source">
                                        <option value="" selected disabled>Select Source</option>
                                        @foreach($route as $routeItem)
                                        <option value="{{ $routeItem->name }}">{{ $routeItem->name }}</option>
                                        @endforeach
                                    </select>
                                    <span style="color:red">@error('source'){{ $message }}@enderror</span>
                                    <label for="floatingSelect">Leaving From</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="destination">
                                        <option value="" selected disabled>Select Destination</option>
                                        @foreach($route as $routeItem)
                                        <option value="{{ $routeItem->name }}">{{ $routeItem->name }}</option>
                                        @endforeach
                                    </select>
                                    <span style="color:red">@error('destination'){{ $message }}@enderror</span>
                                    <label for="floatingSelect">Destination</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3 mt-3">
                            <input type="date" class="form-control" id="floatingInput" name="date" placeholder="">
                            <span style="color:red">@error('date'){{ $message }}@enderror</span>
                            <label for="floatingInput">Departure Date</label>
                        </div>
                        <div class="mt-3">
                            <a id="decrement" class="border rounded-circle"><i class="fa fa-minus-circle text-success fs-3" aria-hidden="true"></i></a>
                            <span id="passengerCount">1</span> <span class="fs-5">passengers</span>
                            <a id="increment"><i class="fa fa-plus-circle text-success fs-3" aria-hidden="true"></i></a>
                        </div>
                        <!-- @if(session('message'))
                        <div class="alert alert-danger" id="flash-message" role="alert">
                            {{ session('message') }}
                            <button type="button" class="close closebtn d-flex flex-column align-item-center" stype="margin-top:-70px" data-dismiss="alert" aria-label="Close" onclick="removeFlashMessage()">
                                <span class=""  stype="margin-top:-70px" aria-hidden="true">X</span>
                            </button>
                        </div>
                        @endif -->
                        <button type="submit" class="btn btn-success mt-3 bg-success text-white">Search</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>