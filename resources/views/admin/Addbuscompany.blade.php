<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  @include('admin.css')
  <style>
    .div_center {
      text-align: center;
      padding-top: 40px;
    }

    .div_center h1 {
      font-size: 40px;
      padding-bottom: 40px;
    }

    .input_col {
      color: black;
      width:250px;
      padding-bottom: 20px;
    }

    label {
      display: inline-block;
      width: 200px;
      margin-left: 1px;
      /* vertical-align: top; */
      text-align: left;
    }

    .div_design {
      padding-bottom: 15px;
    }

    .span {
      color: red;
      margin-top: 10px;
    }

    .alert .close {
      margin-left:750px;
    }

   /* .alert:hover .close {
      display: block;
      margin-left:900px;
    } */
  </style>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
    <!-- partial -->
    @include('admin.header')
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="div_center" >
          @if(session()->has('message'))
          <div class="alert alert-success" role="alert" id="flash-message">
            {{session()->get('message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true" onclick="removeFlashMessage()">X</span>
          </div>
          @endif
          <script>
            function removeFlashMessage(){
              var flashMessage = document.getElementById('flash-message');
              if (flashMessage) {
                flashMessage.parentNode.removeChild(flashMessage);
              }
            }
          </script>
          <h1>Add Bus Transport Company</h1>
          <form action="{{url('add_company')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="div_design">
              <label>Company Name:</label>
              <input class="input_col" type="text" name="name" placeholder="Enter Company Name" /><br>
              <span class="span">@error('name'){{$message}}@enderror</span>
            </div>
            <div class="div_design">
              <label>Company Email:</label>
              <input class="input_col" type="email" name="email" placeholder="Enter Company Email" /><br>
              <span class="span">@error('email'){{$message}}@enderror</span>
            </div>
            <div class="div_design">
              <label>Company Phone:</label>
              <input class="input_col" type="number" name="phone" placeholder="Enter Company Phone" /><br>
              <span class="span">@error('phone'){{$message}}@enderror</span>
            </div>
            <div class="div_design">
              <label>Company Address:</label>
              <input class="input_col" type="text" name="address" placeholder="Enter Company Address" /><br>
              <span class="span">@error('address'){{$message}}@enderror</span>
            </div>
            <div class="div_design">
              <label>Password:</label>
              <input class="input_col" type="text" name="password" placeholder="Enter Password" /><br>
              <span class="span">@error('password'){{$message}}@enderror</span>
            </div>
            <div class="div_design">
              <label>Company Description:</label>
              <input class="input_col" type="text" name="description" placeholder="Enter Company Description" /><br>
              <span class="span">@error('description'){{$message}}@enderror</span>
            </div>
            <div class="div_design">
              <label>Number of Buses:</label>
              <input class="input_col" type="number" name="busnumber" placeholder="Enter Number Of Buses" /><br>
              <span class="span">@error('busnumber'){{$message}}@enderror</span>
            </div>
            <div class="div_design">
              <label>Company Bus Image Here:</label>
              <input type="file" name="cimage" placeholder="Bus  Image" /><br>
              <span class="span">@error('cimage'){{$message}}@enderror</span>
            </div>
            <!-- <div class="div_design">
              <label>Company Logo Here:</label>
              <input type="file" name="logo" placeholder="Company Logo" /><br>
              <span class="span">@error('logo'){{$message}}@enderror</span>
            </div> -->
            <div class="div_design">
              <input type="submit" value="Add Company" class="btn btn-primary">
            </div>
          </form>
        </div>

      </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script>
      function removeFlashMessage() {
        var flashMessage = document.getElementById('flash-message');
        if (flashMessage) {
          flashMessage.parentNode.removeChild(flashMessage);
        }
      }
    </script>
    @include('admin.script')
    <!-- End custom js for this page -->
</body>

</html>