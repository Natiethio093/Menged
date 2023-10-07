<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title></title>
</head>
<body>
<div class=" mt-4">
<!-- <img class="d-block w-100" src="{{asset('images/busimage.png')}}" alt="Third slide"> -->
  <img class=" d-block w-100" src="{{asset('images/busimage.png')}}" alt="Background Image">
  <div id="textCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="carousel-caption">
          <h2 class="carousel-heading" style="color:black">Heading 1</h2>
          <p class="carousel-description">Description 1</p>
        </div>
      </div>
      <div class="carousel-item">
        <div class="carousel-caption">
          <h2 class="carousel-heading ">Heading 2</h2>
          <p class="carousel-description">Description 2</p>
        </div>
      </div>
       <div class="carousel-item">
        <div class="carousel-caption">
          <h2 class="carousel-heading ">Heading 2</h2>
          <p class="carousel-description">Description 2</p>
        </div>
      </div>
      <!-- Add more carousel items as needed -->
    </div>
    <ol class="carousel-indicators">
      <li data-target="#textCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#textCarousel" data-slide-to="1"></li>
      <li data-target="#textCarousel" data-slide-to="2"></li>
      <!-- Add more carousel indicators as needed -->
    </ol>
  </div>
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
  $(document).ready(function() {
    $('#textCarousel').carousel();
  });
</script>
</body>
</html>