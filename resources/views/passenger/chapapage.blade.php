<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Chapa Payment</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
    <style>
    .hero_area {
            display: flex;
            flex-direction: column;
            padding-top: 150px;
            height: 100vh;
        }
        .hero_area .row {
            justify-content: center;
        }
        @media(max-width: 991px) {
           .new {
            margin-bottom: 25px;
            margin-left: 115px;
           }
        }
        @media(max-width:768px) {
           .new {
            margin-bottom: 25px;
            margin-left: -25px;
           }
        }
           @media(max-width:360px) {
           .new {
            margin-bottom: 25px;
            margin-left: 90px;
           }
        }
        @media(max-width:390px) {
           .new {
            margin-bottom: 25px;
            margin-left: 105px;
           }
        }
        @media(max-width:412px) {
           .new {
            margin-bottom: 25px;
            margin-left: 109px;
           }
        }

  </style>
</head>


<body>
    <div class="hero_area">
        @include('passenger.header')
        <div class="container">
        @if(session('Failed'))
            <div class="alert alert-danger" id="flash-message" role="alert" style="text-align:center">
                {{ session('Failed')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="removeFlashMessage()">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
        @endif
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-2 col-md-2">
                    <div class="card shadow new" style="width: 150px; height: 100px;">
                        <img src="{{asset('images/chapa_logo.png')}}" class="card-img-top pt-3" alt="Chapa Logo" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                    </div>
                </div>
                <div class="col-lg-2">
                    <h3 class="mb-3 text-center">Pay By Chapa: {{$total}}</h3>
                    <form method="POST" action="{{ route('pay', ['total' => $total, 'bookedId' => $bookedId, 'seatId' => $seatId])}}" id="paymentForm">
                        @csrf
                        <input type="submit" value="Pay" class="btn btn-primary" />
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-top:-150px">
        @include('passenger.footer')
    </div>
    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <!-- popper js -->
    <script src="{{asset('js/popper.min.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <!-- custom js -->
    <script src="{{asset('js/custom.js')}}"></script>
</body>

</html>