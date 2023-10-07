<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" 
integrity="sha384-eZP+7I5CZLwVv9Yh5Se5QV8vFW3pEwBn6jDbO1u4JZQg1C+uZ0qOZ3YveOjG/Jf9" crossorigin="anonymous">
<link href="{{asset('css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('css/responsive.css')}}" rel="stylesheet"/>
   <style>
 .widget_menu ul li a{
   text-decoration:none;
   margin-top: 10px;
   line-height: 5px;
 }
 .widget_menu ul li a:hover{
   padding-left:5px;
 }
 .social-media-links {
   display: flex;
   justify-content: space-between;
   margin-top: 10px;
}

.social-media-links a {
   display: inline-block;
   width: 30px;
   height: 30px;
   text-align: center;
   line-height: 30px;
   transition: background-color 0.3s, color 0.3s;
   margin-right: 1px; /* Adjust the margin to control the spacing */
}

.social-media-links a:last-child {
   margin-right: 0; /* Remove the margin for the last icon */
}

.social-media-links a:hover {
   background-color:white;
   color: black;
}
@media (max-width: 576px) {
   .social-media-links {
      justify-content: flex-start; /* Align icons to the start */
   }

   .social-media-links a {
      margin-right: 6px; /* Adjust the margin for smaller spacing */
   }
}

@media (max-width: 320px) {
   .social-media-links a {
      margin-right: 4px; /* Further reduce the margin for smaller spacing */
   }
}
   </style>
</head>
<section class="shadow">
<footer class=" bg-black text-light">
   <div class="container">
      <div class="row">
         <div class="col-md-3">
            <div class="full">
               <div class="logo_footer">
                  <a href="/"><img width="210" src="{{asset('images/logocartt.png')}}" alt="#" /></a>
               </div>
               <div class="information_f">
                  <p><strong>ADDRESS:</strong> Mexico K Building 1st floor</p>
                  <p><strong>EMAIL:</strong> natman@gmail.com</p>
                  <p><strong>Phone:</strong> 0970951608</p>
               </div>
            </div>
         </div>
         <div class="col-md-9">
            <div class="row">
               <div class="col-md-8">
                  <div class="row">
                     <div class="col-md-4">
                        <div class="widget_menu">
                           <h3 class="fs-5 opacity-50">LINKS</h3>
                           <ul>
                              <li><a class="pb-3 text-light" href="/">Home</a></li>
                              <li><a class="pb-3 text-light" href="/about">About</a></li>
                              <li><a class="pb-3 text-light" href="/contact">Contact</a></li>
                              <li><a class="pb-3 text-light" href="/contact">Help</a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="widget_menu">
                           <h3  class="fs-5 opacity-50">CARRIERS</h3>
                           <ul>
                              <li><a class="pb-3 text-light" href="#">Abay Bus</a></li>
                              <li><a class="pb-3 text-light" href="#">Golden Bus</a></li>
                              <li><a class="pb-3 text-light" href="#">Zemen Bus</a></li>
                              <li><a class="pb-3 text-light" href="#">Walya Bus</a></li>
                              <li><a class="pb-3 text-light" href="#">Yeya Bus</a></li>
                              <li><a class="pb-3 text-light" href="#">Dream Bus</a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="widget_menu">
                           <h3  class="fs-5 opacity-50">ROUTES</h3>
                           <ul>
                              <li><a class="pb-3 text-light" href="#">Addis  -> Bahirdar</a></li>
                              <li><a class="pb-3 text-light" href="#">Addis  -> Hawassa</a></li>
                              <li><a class="pb-3 text-light" href="#">Addis  -> Mekele</a></li>
                              <li><a class="pb-3 text-light" href="#">Addis  -> Dire Dawa</a></li>
                              <li><a class="pb-3 text-light" href="#">Moyale  -> Addis</a></li>
                              <li><a class="pb-3 text-light" href="#">Addis  -> Arbaminch</a></li>
                              <li><a class="pb-3 text-light" href="#">Addis  -> jigjiga</a></li>
                           </ul>
                        </div>
                     </div>
                    
                  </div>
               </div>
             
       <div class="col-lg-3 col-md-3 col-sm-5">
                  <div class="widget_menu">
                     <div class="footer-col">
                        <h3  class="fs-5 opacity-50">Follow us</h3>
                        <div class="social-media-links">
                           <a href="#" class="rounded-circle bg-dark"><i class="fa fa-facebook text-white" aria-hidden="true"></i></a>
                           <a href="#" class="rounded-circle bg-dark"><i class="fa fa-twitter text-white" aria-hidden="true"></i></a>
                           <a href="#" class="rounded-circle bg-dark"><i class="fa fa-instagram text-white" aria-hidden="true"></i></a>
                           <a href="#" class="rounded-circle bg-dark"><i class="fa fa-linkedin text-white" aria-hidden="true"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   </div>
</footer>
<div class="cpy_ bg-success ">
   <p class="mx-auto">© 2023 All Rights Reserved By <a href="/" class="text-warning">Menged</a><br>
   </p>
</div>
</section>
   </html>