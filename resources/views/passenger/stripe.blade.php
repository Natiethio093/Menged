<!DOCTYPE html>
<html>
<head>
      <base href="/public">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>Stripe</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />
      
      <!-- font awesome style -->
      <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('css/responsive.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<div class="hero_area">
      
      <span class="" style="font-size:15px;width:1500px;">@include('passenger.header')</span>
    
      <div class="container mt-5">
    
          @if(session('success'))
            <h1 style="text-align:center; font-size:24px;padding-bottom:20px" class="pt-5">Total Paid - Amount {{$total}}<span style="color:orange">ETB</span></h1>
          @else
            <h1 style="text-align:center; font-size:24px;padding-bottom:20px" class="pt-5">Pay Using Your Card - Total Amount {{$total}}<span style="color:orange">ETB</span></h1>
         
          @endif
    
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                        <h3 class="panel-title" >Payment Details</h3>
                </div>
                <div class="panel-body">
                          @if (Session::has('success'))
                            <div class="alert alert-success" id="flash-message" role="alert"  style="font-size:17px">
                            <p>{{ Session::get('success') }}</p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true" onclick="removeFlashMessage()">X</span>
                               </button>
                            </div>
                            @elseif(session('failed'))
                            <div class="alert alert-danger" id="flash-message" role="alert"  style="font-size:17px">
                                {{ session('failed') }}
                                <button type="button" class="close close-btn" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true" onclick="removeFlashMessage()">X</span>
                                </button>
                            </div>
                            @endif
    
                    <form 
                            role="form" 
                            action="{{ route('stripe.post')}}" 
                            method="post" 
                            class="require-validation"
                            data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                            id="payment-form">
                        @csrf
                        <input type="hidden" name="total" value="{{ $total }}">

                        <input type="hidden" name="bookedId" value="{{ $bookedId }}">

                        <input type="hidden" name="seatId" value="{{ $seatId }}">

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label fs-4'>Name on Card</label> <input
                                    class='form-control' size='4' type='text' style="height:30px;font-size:16px;">
                            </div>
                        </div>
    
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label fs-4'>Card Number</label> <input
                                    autocomplete='off' class='form-control card-number' size='20'
                                    type='text' style="height:30px;font-size:16px;">
                            </div>
                        </div>
    
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label fs-4'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='text' style="height:30px;font-size:16px;">
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label fs-4'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text' style="height:30px;font-size:16px;">
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label fs-4'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text' style="height:30px;font-size:16px;">
                            </div>
                        </div>
    
                        <div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-success bg-success btn-lg btn-block fs-4" type="submit">Pay Now</button>
                            </div>
                        </div>
                            
                    </form>
                </div>
            </div>        
        </div>
    </div>
        
</div>
    
</body>
    
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    
<script type="text/javascript">
  
$(function() {
  
    
    
    var $form = $(".require-validation");
     
    $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid = true;
        $errorMessage.addClass('hide');
    
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });
     
        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
    
    });
      
   
    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
                 
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
     
});
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

</html>
