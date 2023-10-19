<!DOCTYPE html>
<html>

<head>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <style>
      .nav-link a:hover {
         color: orange;
      }
   </style>
</head>
<header class="header_section">
   <div class="container">
      <nav class="navbar navbar-expand-lg custom_nav-container fixed-top bg-white p-3 shadow">
         <a class="navbar-brand" href="/"><img width="250"  src="{{asset('images/logo1.png')}}" alt="#" /></a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
         </button>
         <div class=" navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link" href="/">Home <span class="sr-only"></span></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{url('about')}}">About</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{url('contact')}}">Contact</a>
               </li>
               @if(Route::has('login'))
               @auth
               <!-- Move the x-app-layout component here -->
               <x-app-layout></x-app-layout>
               @else
               <li class="nav-item mb-1">
                  <a class="btn btn-outline-success" href="{{route('login')}}" id="logincss">Login</a>
               </li>
               <li class="nav-item">
                  <a class="btn btn-outline-danger" href="{{route('register')}}">Register</a>
               </li>
               @endauth
               @endif
            </ul>
         </div>
      </nav>
   </div>
 </header>
 </html>