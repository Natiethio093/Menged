<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buscompanies</title>
  <link href="{{asset('css/bustyle.css')}}" rel="stylesheet" />
  <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet" />
  <style>
    /* .buses{
      background-color:#e5e3e3;
    } */
  </style>


</head>
<body id="body-pd" style="">
 
     @include('buscompany.slider', ['page' => $page])
     <div class="buses" id="buses" style="margin-top:100px" >
        @include('buscompany.dashboard')
     </div>

  <script src="{{asset('js/dasboard.js')}}"></script>
 
</body>

</html>
<!--Container Main end-->