<!DOCTYPE html>
<html>

<head>
    <title>Menged Bus Tickets</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.10.2/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.css">
    <!-- font awesome style -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

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
                    dangerMode: true,
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

    <script src="{{asset('home/js/jquery-3.4.1.min.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js" integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @if(Session::has('success'))
    <script>
        toastr.options = {
            "progressBar": true,
            "positionClass": "toast-top-right",
            "closeButton": true,
        }
        toastr.success("{{ Session::get('success') }}", 'Success!', {
            timeOut: 5000
        });
    </script>
    @elseif(Session::has('message'))
    <script>
        toastr.options = {
            "progressBar": true,
            "positionClass": "toast-top-right",
            "closeButton": true,
        }
        toastr.error("{{ Session::get('message') }}", 'Error!', {
            timeOut: 10000
        });
    </script>
    @elseif(Session::has('info'))
    <script>
        toastr.options = {
            "progressBar": true,
            "positionClass": "toast-top-right",
            "closeButton": true,
        }
        toastr.info("{{ Session::get('info') }}", 'Information!', {
            timeOut: 12000
        });
    </script>
    @elseif(Session::has('sellinfo'))
    <script>
        toastr.options = {
            "progressBar": true,
            "positionClass": "toast-top-right",
            "closeButton": true,
        }
        toastr.info("{{ Session::get('sellinfo') }}", 'Information!', {
            timeOut: 17000
        });
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
    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <!-- popper js -->
    <script src="{{asset('js/popper.min.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <!-- custom js -->
    <script src="{{asset('js/custom.js')}}"></script>
</body>

</html>