<!DOCTYPE html>
<html>

<head>
    <title>Bus Ticketing System</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.10.2/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <style>
        .navbar-toggler {
            border: none;
            background: transparent;
        }

        a {
            text-decoration: none;
        }

        .search-form-container {
            background-image: url('images/route.jpg');
            background-size: cover;
            padding: 20px;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    @if (Session::has('paysuccess'))
    <script>
        swal({
            title: "Menged Bus Tickets",
            text: "Ticket reference number: {{ Session::get('ticketnumber') }}\n\n{{ Session::get('paysuccess') }}",
            icon: "success",
            buttons: {
                confirm: {
                    text: "OK",
                    value: true,
                    visible: true,
                    className: "btn btn-success",
                    closeModal: true
                }
            },
            html: true
        });
    </script>
    @endif
    @if (Session::has('payfaild'))
    <script>
        swal({
            title: "Booking Failed ",
            text: "{{ Session::get('payfaild') }}",
            icon: "error",
            buttons: {
                confirm: {
                    text: "OK",
                    value: true,
                    visible: true,
                    className: "btn btn-danger",
                    closeModal: true,
                    dangerMode:true,
                }
            },
            html: true
        });
    </script>
@endif

    <!-- Navigation -->
    @include('passenger.header')

    <!-- Carousels -->
    @include('passenger.buscarousal')

    <div id="search">
        @include('passenger.search')
    </div>

    <!-- Transport Service Providers -->
    <div class="bus">
        @include('passenger.transport')
    </div>
    @include('passenger.why')

    <!-- Footer -->
    @include('passenger.footer')

    <script>
        function removeFlashMessage() {
            var flashMessage = document.getElementById('flash-message');
            if (flashMessage) {
                flashMessage.parentNode.removeChild(flashMessage);
            }
        }
    </script>
    <script>
        var passengerCount = 1;

        function updatePassengerCount() {
            var passengerCountElement = document.getElementById("passengerCount");
            passengerCountElement.textContent = passengerCount;
        }

        function incrementPassengerCount() {
            passengerCount++;
            updatePassengerCount();
        }

        function decrementPassengerCount() {
            if (passengerCount > 1) {
                passengerCount--;
                updatePassengerCount();
            }
        }

        document.getElementById("increment").addEventListener("click", incrementPassengerCount);
        document.getElementById("decrement").addEventListener("click", decrementPassengerCount);
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>