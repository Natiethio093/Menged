<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Booked;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendTicketNumber;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Ticket;
class TicketController extends Controller
{
  public function Tickets()
    {
        $user = Auth::user();
       
        $page = 'ticket';

        $date = Carbon::now();

       
        $ticketcomp = Ticket::where('comp_name', $user->name)->get();

        return view('buscompany.tickets', compact('ticketcomp','page','date'));
    }
    public function email(){

      $user = Auth::user();

      $tiketdetails = Session::get('ticketdetails');

      $ticketnumber =  $tiketdetails['ticketnumber'];
      $button =  $tiketdetails['button'];
      $url =  $tiketdetails['url'];

      Session::forget('ticketdetails');

      $bookeduser = User::find($user->id);

      $details=[
        'greeting' => 'Hello Passenger',
        'firstline' => 'Welcome To Menged Bus Tickets',
        'body' => 'The ticket reference down below  can be used as ticket reference for all passenger tickets you paid  and you can also get QR code using the link Provided',
        'ticketnumber' =>  $ticketnumber,
        'button' => $button,
        'url' => $url,
        'lastline' => 'Have a great Journey!!',
     ];
     Notification::send($bookeduser, new SendTicketNumber($details));//find email from the user table and send to that specific user 
     return redirect('/home')->with([
        'paysuccess' => 'Payment Successful!! We have already emailed your ticket reference number.And also you can download the QR Code there!',
        'ticketnumber' => $ticketnumber,
    ]);
    }
}
