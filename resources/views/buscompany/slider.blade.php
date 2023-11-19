<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <title></title>
  <?php
   
  ?>
</head>

<body id="body-pd">
  <header class="header" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    <p class="nav_name">{{date('l F j, Y', strtotime($date))}}</p>
     <div class="header_img"> <img src="{{asset('images/logo1.png')}}" alt=""> </div>
    <x-app-layout></x-app-layout>
  </header>
  <div class="l-navbar" id="nav-bar">
    <nav class="nav">
      <div>
        <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Bus Administrator</span> </a>
            <span class="nav_logo-name"> </span> 
        <div class="nav_list">
          <a href="/home" class="nav_link @if($page == 'dashboard') active @endif" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard">
            <i class='bx bx-grid-alt nav_icon'></i>
            <span class="nav_name">Dashboard</span>
          </a>
          <a href="#" class="nav_link " data-bs-toggle="tooltip" data-bs-placement="right" title="Passengers">
            <i class='bx bx-user nav_icon'></i>
            <span class="nav_name">Passengers</span>
          </a>
          <a href="{{url('buses')}}" class="nav_link @if($page == 'buses') active @endif" data-bs-toggle="tooltip" data-bs-placement="right" title="Buses">
            <i class='bx bx-bus nav_icon'></i>
            <span class="nav_name">Buses</span>
          </a>
          <a href="{{url('cities')}}" class="nav_link @if($page == 'cities') active @endif" data-bs-toggle="tooltip" data-bs-placement="right" title="Cities">
            <i class='bx bx-building-house nav_icon'></i>
            <span class="nav_name">Cities</span>
          </a>
          <a href="{{url('Available_route')}}" class="nav_link @if($page == 'route') active @endif" data-bs-toggle="tooltip" data-bs-placement="right" title="Available Routes">
            <i class='fa fa-road'></i>
            <span class="nav_name">Available  Routes</span>
          </a>
          <a href="{{url('schedules')}}" class="nav_link @if($page == 'schedule') active @endif" data-bs-toggle="tooltip" data-bs-placement="right" title="Schedules">
            <i class='bx bx-calendar nav_icon'></i>
            <span class="nav_name">Schedules</span>
          </a>
          <a href="#" class="nav_link " data-bs-toggle="tooltip" data-bs-placement="right" title="Bookings">
            <i class='bx bx-book nav_icon'></i>
            <span class="nav_name">Bookings</span>
          </a>
          <a href="{{url('ticket')}}" class="nav_link @if($page == 'ticket') active @endif" data-bs-toggle="tooltip" data-bs-placement="right" title="Tickets">
            <i class='bx bx-receipt nav_icon'></i>
            <span class="nav_name">Tickets</span>
          </a>
        </div>
      </div>
    </nav>
   
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://unpkg.com/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script>
  <script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
  </script>
</body>

</html>