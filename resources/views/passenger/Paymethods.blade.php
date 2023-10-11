<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <!-- <base href="/public"> -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Payment Methods</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="{{asset('css/seat-option.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('css/style3.css')}}" rel="stylesheet" />
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
    <style>
        .hero_area {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .hero_area .row {
            justify-content: center;
        }

        @media(max-width: 991px) {
            .new {
                margin-bottom: 25px;
                margin-left: 105px;
            }

            .hero_area .row {
                align-content: center;
            }
        }

        @media(min-width: 992px) {
            .hero_area .container {
                display: flex;
                flex-direction: column;
                align-items: stretch;
            }
        }
    </style>
    <script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="hero_area">
        <!-- Header section starts -->
        @include('passenger.header')
        @if(session('mess'))
        <div class="alert alert-info" id="flash-message" role="alert">
            {{ session('mess') }}
            <button type="button" class="close closebtn" data-dismiss="alert" aria-label="Close" onclick="removeFlashMessage()">
                <span class="" aria-hidden="true">X</span>
            </button>
        </div>
        @endif
        <div id="countdown" class="fs-5 fw-bold text-danger" data-expiration="30"></div><!--The time is in second so change it based on your requirement-->
       
        <div class="heading_container heading_center head" style="margin-bottom:20px">
            <h2 class="des">Payment <span style=" color:#198754">Options</span></h2>
        </div>
        <div class="container">
            <!-- <p>{{$total}}</p> -->
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-2">
                    <a href="{{ route('chapa', ['total' => $total, 'bookedId' => $bookedId , 'seatId' => $seatId]) }}" class="card shadow new" style="width: 150px; height: 100px; display: flex; align-items: center; justify-content: center;">
                        <img src="{{asset('images/chapa_logo.png')}}" alt="Chapa Logo" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                    </a>
                </div>
                <div class="col-lg-2">
                    <a href="{{ route('stripe', ['total' => $total, 'bookedId' => $bookedId , 'seatId' => $seatId ,'seatsel' => $seatsel,'remainingTime' => remainingTime]) }}" class="card shadow new" style="width: 150px; height: 100px; display: flex; align-items: center; justify-content: center;">
                        <img src="{{ asset('images/stripe_logo.png') }}" alt="Stripe Logo" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('passenger.footer')

    <script>
    const expirationTime = document.getElementById('countdown').dataset.expiration;
    let remainingTime = expirationTime;
    function updateCountdown() {
        const countdownElement = document.getElementById('countdown');

        
        const hours = Math.floor(remainingTime / 3600);
        const minutes = Math.floor((remainingTime % 3600) / 60);
        const seconds = remainingTime % 60;

        countdownElement.textContent = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

       
        remainingTime--;

       
        if (remainingTime <= 0) {
           
            window.location.href = redirectURL;
          
            clearInterval(countdownInterval);
        }
    }

    const redirectURL = "{{ route('timeout', ['bookedId' => $bookedId, 'seatsel' => $seatsel, 'seatId' => $seatId]) }}";

   
    const countdownInterval = setInterval(updateCountdown, 1000);
</script>

    <script>
        function removeFlashMessage() {
            var flashMessage = document.getElementById('flash-message');
            if (flashMessage) {
                flashMessage.parentNode.removeChild(flashMessage);
            }
        }
    </script>

    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <!-- popper js -->
    <script src="{{asset('js/popper.min.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <!-- custom js -->
    <script src="{{asset('js/custom.js')}}"></script>
</body>

</html>