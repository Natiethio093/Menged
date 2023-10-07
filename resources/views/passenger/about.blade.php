<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>About</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />
    <!-- font awesome style -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .image-wrapper {
            position: relative;
            width: 100%;
            padding-top: 75%;
            /* Adjust this value to control the image aspect ratio */
            overflow: hidden;
        }

        .image-wrapper img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    @include('passenger.header')
    <!-- Hero Section -->
    <section class="hero bg-success text-white text-center py-5" style="margin-top:40px">
        <div class="container">
            <h1 class="fs-5" style="font-size:20px">Welcome to Menged Tickets</h1>
            <p class="lead"> </p>
            <a href="{{url('/#search')}}" class="btn btn-light btn-lg">Book Now</a>
        </div>
    </section>

    <!-- Vision Section -->
    <section class="vision py-5">
        <div class="container text-center shadow py-4">
            <h2 class="pb-3" style="font-size:25px;font-style:bold"><i style="font-size:25px" class="fas fa-eye"></i> Our Vision</h2>
            <p>Our vision is to revolutionize the way people travel by bus. We envision a future where booking bus tickets is seamless,
                convenient, and hassle-free. Our aim is to provide a user-friendly platform that connects travelers with a wide range of bus companies,
                offering a variety of routes and schedules. We strive to enhance the overall travel experience, ensuring reliability, comfort,
                and affordability for our customers. With our innovative technology and commitment to exceptional service, we aspire to be the go-to platform for bus travel,
                empowering individuals to explore and connect with the world.</p>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="mission py-5">
        <div class="container text-center  shadow py-4">
            <h2 style="font-size:25px;font-style:bold" class="pb-3"><i class="fas fa-bullseye"></i> Our Mission</h2>
            <p> Our mission is to simplify bus travel for everyone. We are dedicated to providing a seamless and reliable booking experience,
                making it easy for travelers to find and reserve bus tickets with confidence.We collaborate with trusted bus transport companies,
                ensuring safety, punctuality, and customer satisfaction. We strive to offer a diverse range of routes, giving our customers flexibility and choice.
                Through continuous innovation and optimization of our platform, we aim to deliver a personalized and efficient service that exceeds expectations.
                Generally we have mission that can  inspire and enable seamless bus travel, connecting people and places while creating unforgettable journeys.</p>
        </div>
    </section>
    @include('passenger.why')
    <!-- Featured Products Section -->

    <section class="featured-products py-5">
        <div class="container">
            <h2 class="text-center mb-4" style="font-size:30px;font-style:bold">Carriers</h2>
            <div id="productCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3500">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="image-wrapper">
                                        <img src="{{asset('images/abay.jpg')}}" class="card-img-top" alt="Product 1">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Abay Bus</h5>
                                        <p class="card-text"></p>
                                        <a href="/#search" class="btn btn-primary">Book Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="image-wrapper">
                                        <img src="{{asset('images/goldenbus.jpeg')}}" class="card-img-top" alt="Product 1">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Golden Bus</h5>
                                        <p class="card-text"> </p>
                                        <a href="/#search" class="btn btn-primary">Book Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="image-wrapper">
                                        <img src="{{asset('images/zemen.jpg')}}" class="card-img-top" alt="Product 1">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Zemen Bus</h5>
                                        <p class="card-text"> </p>
                                        <a href="/#search" class="btn btn-primary">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="image-wrapper">
                                        <img src="{{asset('images/walyabus2.jpeg')}}" class="card-img-top" alt="Product 3">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Walya Bus</h5>
                                        <p class="card-text"> </p>
                                        <a href="/#search" class="btn btn-primary">Book Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="image-wrapper">
                                        <img src="{{asset('images/yegna.jpg')}}" class="card-img-top" alt="Product 3">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Yegna Bus</h5>
                                        <p class="card-text"> </p>
                                        <a href="/#search" class="btn btn-primary">Book Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="image-wrapper">
                                        <img src="{{asset('images/selam.jpg')}}" class="card-img-top" alt="Product 3">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Selam Bus</h5>
                                        <p class="card-text"> </p>
                                        <a href="/#search" class="btn btn-primary">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('passenger.footer')

    <script src="{{asset('home/js/bootstrap.js')}}"></script>
    <!-- custom js -->
    <script src="{{asset('home/js/custom.js')}}"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>