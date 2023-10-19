<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Buscompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Route;
use App\Models\Schedule;
use App\Models\Buses;
use App\Models\Cities;
use Illuminate\Support\Carbon;
use App\Models\Seat;
use App\Models\Terminal;
use App\Models\Ticket;
use App\Models\Booked;
use Exception;
use Stripe;
use Stripe\Exception\ApiConnectionException;
use Stripe\Exception\CardException;
use Illuminate\Support\Facades\Session;

class VisitorController extends Controller
{
    public function visitor()
    {
        $bus = Buscompany::all();
        $route = Cities::all();
        return view('passenger.home', ['bus' => $bus, 'route' => $route]);
    }
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth::user()->usertype;
            if ($usertype == 0) {
                $bus = Buscompany::all();
                $route = Cities::all();
                return view('passenger.home', ['bus' => $bus, 'route' => $route]);
            } else if ($usertype == 1) {
                return view('admin.home');
            } else if ($usertype == 2) {
                $user = Auth::user();
                $cities = Cities::count();
                $company = Buscompany::where('name', $user->name)->first();
                $buses = Buses::where('comp_id', $company->id)->count();
                $route = Route::count();
                $aroute = Schedule::where('comp_id', $company->id)
                    ->distinct('route_id')
                    ->count('route_id');
                $schedule = Schedule::where('comp_id', $company->id)->count();
                $page = 'dashboard';
                $date = Carbon::now();
                return view('buscompany.home', compact('buses', 'schedule', 'cities', 'route', 'date', 'aroute', 'page'));
            }
        } else {
            $bus = Buscompany::orderBy('name', 'asc')->get();
            $route = Route::all();
            $route = Cities::all();
            return view('passenger.home', ['bus' => $bus, 'route' => $route]);
        }
    }
    public function search(Request $req)
    {
        $validator = $req->validate([
            'source' => "required|String",
            'destination' => "required|String",
            'date' => "required|String|date",
        ]);

        $nextDay = Carbon::now()->addDay();
        $now = Carbon::now();
        $reqDate = Carbon::parse($req->date);

        if ($reqDate->isSameDay($now)) {
            return redirect("/#search")->with('message', 'No Ticket Left For Today!!!!');
        } else if ($reqDate->lt($now)) {
            return redirect("/#search")->with('message', 'The Date is Already Passed!!');
        }

        $route = Route::where('source', $req->source)
            ->where('destination', $req->destination)
            ->first();


        if (!$route) {
            return redirect("/#search")->with('message', 'No Trip Found');
        }

        $dayOfMonth = (int) date('j', strtotime($req->date));
        $routeType = ($dayOfMonth % 2 === 0) ? 'Even' : 'Odd';

        $schedules = Schedule::where('route_id', $route->id)
            ->where('start_date', '<=', $reqDate)
            ->where('end_date', '>=', $reqDate)
            ->where('status', 'Available')
            ->where('route_type', $routeType)
            ->get();

        if ($schedules->isEmpty()) {
            return redirect("/#search")->with('message', 'No Trip Found');
        }

        $busIds = $schedules->pluck('bus_id')->toArray();
        $buses = Buses::whereIn('id', $busIds)->get();

        $carrierids = $buses->pluck('comp_id')->toArray();
        $carrier = Buscompany::whereIn('id', $carrierids)->get();
        $date = $req->input('date');
        return view('passenger.result', ['route' => $route, 'schedules' => $schedules, 'carrier' => $carrier, 'buses' => $buses, 'date' => $date]);
    }
    public function selectseat( $scheduleId,$date)
    {

            if (Auth::id()) {

            Seat::whereDate('date', '<', now())
                ->delete();

            $schedule = Schedule::where('id', $scheduleId)->first();
            $buscompany = Buscompany::where('id', $schedule->comp_id)->first();

            $route = Route::where('id', $schedule->route_id)->first();

            $seats = Seat::where('bus_id', $schedule->bus_id)
                ->where('date', $date)
                ->first();

            if ($seats) {
                $bookedSeats = explode(',', $seats->booked_seats);
                $reservedSeats = explode(',', $seats->reserved_seats);
            }
            return view('passenger.seatland', [
                'carriername' => $schedule->name,
                'schedule' => $schedule,
                'buscompany' => $buscompany,
                'date' => $date,
                'bookedSeats' => $bookedSeats ?? [],
                'reservedSeats' =>  $reservedSeats ?? [],
                'route' =>  $route
            ]);
        } else {

            session(['previous_url' => url()->current()]);

            return redirect('login');
        }
    }
    public function about()
    {
        return view('passenger.about');
    }

    public function selectseats(Request $req)
    {
        $selectedSeats = $req->seatInput;
        $scheduleId = $req->scheduleId;
        $date = date('Y-m-d', strtotime($req->date));

        Seat::where('date', '<', today())->delete();

        if (!$selectedSeats) {
            return redirect()->back()->with('error', 'Please select your seat');
        }

        $schedule = Schedule::where('id', $scheduleId)->first();

        $bus = Buses::where('id', $schedule->bus_id)->first();

        $buscompany = Buscompany::where('id', $schedule->comp_id)->first();

        $route = Route::where('id', $schedule->route_id)->first();

        $city =  Cities::where('name', $route->source)->first();

        $terminal = Terminal::where('city_id', $city->id)->get();

        // Check if there are existing seats booked for the same bus and date
        $existingSeats = Seat::where('bus_com_id', $bus->bus_com_id)
            ->where('date', $date)
            ->first();

         if ($existingSeats) {

            $seatsavailable = $existingSeats->seat_available;

            $bookedSeatsArray = explode(',', $existingSeats->booked_seats);

            $selectedSeatsArray = array_filter(explode(',', $selectedSeats), function ($seat) use ($bookedSeatsArray) {
                return !in_array($seat, $bookedSeatsArray);
            });


            $bookedSeatsArray = array_merge($bookedSeatsArray, $selectedSeatsArray);
            $bookedSeatsArray = array_filter($bookedSeatsArray); // Remove empty elements
            sort($bookedSeatsArray);
            $bookedSeatsCount = count($bookedSeatsArray);

            if ($existingSeats->reserved_seats !== null) {
                $reservedSeatsArray = explode(',', $existingSeats->reserved_seats);
                $reservedSeatsCount = count($reservedSeatsArray);
                $availableSeats =  51 - ($bookedSeatsCount + $reservedSeatsCount);
            } else {

                $availableSeats =  51 - $bookedSeatsCount;
            }

            $existingSeats->booked_seats = implode(',', $bookedSeatsArray);
            $existingSeats->seat_available = $availableSeats;
            $existingSeats->save();
            $seatId = $existingSeats->id;
        } else {
            $seat = new Seat();

            $SeatsArray = explode(',',  $selectedSeats);
            sort($SeatsArray);
            $bookedSeatsString = implode(',', $SeatsArray);

            $newbookedSeatsArray = explode(',',  $selectedSeats);

            $newbookedSeatsCount = count($newbookedSeatsArray);

            $newavailableSeats = 51 - $newbookedSeatsCount;

            $seat->schedule_id = $schedule->id;
            $seat->bus_id = $bus->id;
            $seat->bus_com_id = $bus->bus_com_id;
            $seat->date = $date;
            $seat->booked_seats = $bookedSeatsString;
            $seat->seat_available =  $newavailableSeats;
            $seat->save();
            $seatId = $seat->id;
        }
        $SeatsArray = explode(',',  $selectedSeats);
        sort($SeatsArray);
        // return redirect()->back()->with('success', 'Selected Successfully!!')->with('selectedSeats', $selectedSeats);
        return view('passenger.passdetail', [
            'schedule' => $schedule,
            'buscompany' => $buscompany,
            'date' => $date,
            'selectedseats' => $SeatsArray,
            'selectedseats2' => $selectedSeats,
            'terminal' => $terminal,
            'seatId' =>   $seatId,
            'route' =>  $route
        ]);
    }

    public function passengerdetail(Request $req)
    {
        //critical  logic unhandled error  when refresing the page 
        $ScheduleId = $req->scheduleId;

        $seatId = $req->seatId;

        $seatsel = $req->seatsel;

        $date = date('Y-m-d', strtotime($req->date));
      
        $validator = Validator::make($req->all(), [
            'passenger.*.name' => 'required|string|regex:/^[A-Za-z]+\s[A-Za-z]+$/',
            'passenger.*.phone' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }



        $user = Auth::user();
        $passengerDetails = $req->input('passenger');
        $passengerCount = count($passengerDetails);

        $names = [];
        $phones = [];
        $seats = [];
        $terminals = [];

        foreach ($passengerDetails as $passenger) {
            $names[] = $passenger['name'];
            $phones[] = $passenger['phone'];
            $seats[] = $passenger['seat'];
            $terminals[] = $passenger['terminal'];
        }

        $schedule = Schedule::where('id', $ScheduleId)->first();
        $price = $schedule->price;
        $total = $price * $passengerCount;

        $existingBooking = Booked::where('user_id', $user->id)
            ->where('schedule_id', $ScheduleId)
            ->where('date', $date)
            ->get();

        $existingSeats = collect($existingBooking)
            ->pluck('seat_no')
            ->flatMap(function ($seats) {
                return explode(',', $seats);
            })
            ->unique()
            ->toArray();

        $conflictingSeats = array_intersect($existingSeats, $seats);

        if (!empty($conflictingSeats)) {
            $existingBooking = Booked::where('user_id', $user->id)
                ->where('schedule_id', $ScheduleId)
                ->where('total', $total)
                ->where('date', $date)->delete();
        }

        $bookedTicket = new Booked();
        $bookedTicket->user_id = $user->id;
        $bookedTicket->schedule_id = $ScheduleId;
        $bookedTicket->name = implode(', ', $names);
        $bookedTicket->phone = implode(', ', $phones);
        $bookedTicket->seat_no = implode(', ', $seats);
        $bookedTicket->date = $date;
        $bookedTicket->terminal = implode(', ', $terminals);
        $bookedTicket->total = $total;
        $bookedTicket->status = 'Unpaid';
        $bookedTicket->save();
        $bookedId =  $bookedTicket->id;

        $currentTime = Carbon::now();

        // Calculate the expiration time (5 minutes from the current time)
        $expirationTime = $currentTime->addMinutes(1);

        // Store the expiration time in the session
        $req->session()->put('expiration_time', $expirationTime);
        Session::put('mess', 'Please complete the payment before the time ended!!');

        return view('passenger.Paymethods', compact('total', 'existingBooking', 'seats', 'bookedId', 'seatId', 'expirationTime', 'seatsel'));
    }

    public function expiredBookingHandler()
    {
       
        $expired = Session::get('expired');

        $bookedId =  $expired['bookedId'];

        $seatsel  =  $expired['seatsel'];

        $seatId  =  $expired['seatId'];

        Session::forget('expired');

        $seatselArray = explode(',', $seatsel);

        $bookedseat = Seat::where('id',$seatId)->first();

        $existingseat =  Booked::where('id', $bookedId)->first();

        $seatbookedSeatsArray = explode(',', $bookedseat->booked_seats);
      
        $booknew = array_diff($seatbookedSeatsArray , $seatselArray);

        $updatedSeatsArray = array_filter($booknew);

        $ArrayCount = count($updatedSeatsArray);

        $updatedSeatsString = implode(',', $booknew);

        $seatnew=Seat::where('id',$seatId)->first();

        $selectedSeatsCount = count($seatselArray);

         if($ArrayCount) {

          $availableseat = $seatnew->seat_available;

          $seatnew->booked_seats = $updatedSeatsString;

          $seatnew->seat_available = $availableseat + $selectedSeatsCount;

          $seatnew->save();

        }

        else {

          $availableseat =  $seatnew->seat_available;

          $seatnew->booked_seats =  null;

          $seatnew->seat_available =  $availableseat + $selectedSeatsCount;

          $seatnew->save();

        }

        Booked::where('id', $bookedId)->delete();

        return redirect('/home')->with([
            'payfaild' => 'Booking Expired!! Please try to pay within 5 minutes next time',
        ]);
    }

    public function stripe(Request $req)
    {

        $total = $req->total;

        $bookedId = $req->bookedId;

        $seatId =   $req->seatId;

        return view('passenger.stripe', compact('total', 'bookedId', 'seatId'));
    }
    public function chapa(Request $req)
    {

        $total = $req->total;

        $bookedId = $req->bookedId;

        $seatId =   $req->seatId;


        return view('passenger.chapapage', compact('total', 'bookedId', 'seatId'));
    }

    public function stripePost(Request $request)
    {
        
        $total = $request->total;

        $bookedId = $request->bookedId;

        $seatId =   $request->seatId;

        try {
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            Stripe\Charge::create([
                "amount" => $total * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thank you for payment!!"
            ]);
        } catch (ApiConnectionException $exception) {
            // Stripe API connection exception
            return redirect()->back()->with('failed', 'No internet connection. Please check your network.');
        } catch (CardException $exception) {
            // Stripe card exception
            return redirect()->back()->with('failed', 'Card error. Please check your card details and try again.');
        }
        $user = Auth::user();


        $ticketNumber = mt_rand(1000000000, 9999999999);

        $booked = Booked::where('id', $bookedId)->first();
        $compname = Schedule::where('id', $booked->schedule_id)->first();
        $passengerNames = explode(', ', $booked->name);
        $passengerPhones = explode(', ', $booked->phone);
        $passengerSeats = explode(', ', $booked->seat_no);
        $passengerTerminals = explode(', ', $booked->terminal);

        foreach ($passengerNames as $index => $passengerName) {
            $ticket = new Ticket();
            $ticket->comp_name =  $compname->name;
            $ticket->summary = "Reserved Ticket";
            $ticket->name = $passengerName;
            $ticket->phone = $passengerPhones[$index];
            $ticket->seat_no = $passengerSeats[$index];
            $ticket->schedule_id = $booked->schedule_id;
            $ticket->date = $booked->date;
            $ticket->ticketreference = $ticketNumber;
            $ticket->terminal = $passengerTerminals[$index];
            $ticket->status = "paid";
            $ticket->save();
        }


        $seat = Seat::where('id', $seatId)->first();
        $bookedseat = explode(',', $seat->booked_seats);
        $reservedseat = explode(',', $seat->reserved_seats);

        $reservednew = array_merge($reservedseat, $bookedseat);
        $reservednew = array_filter($reservednew); // Remove empty elements

        $seat->reserved_seats = implode(',', $reservednew);
        $seat->booked_seats = null;
        $seat->save();




        Session::put('ticketdetails', [
            'ticketnumber' =>   $ticketNumber,
            'button' => 'QR Code',
            'url' => 'https://github.com/',
        ]);


        $booked->delete();

        // return redirect('/home')->with('paysuccess','Payment Successfull!! We already email your ticket number!!');
        return redirect('/email');
    }

    public function confirmchapapayment()
    {

        $user = Auth::user();

        $paymentParams = Session::get('payment_parameters');


        $total = $paymentParams['total'];
        $bookedId = $paymentParams['bookedId'];
        $seatId = $paymentParams['seatId'];

        Session::forget('payment_parameters');

        $ticketNumber = mt_rand(1000000000, 9999999999);
        $booked = Booked::where('id', $bookedId)->first();
        $compname = Schedule::where('id', $booked->schedule_id)->first();
        $passengerNames = explode(', ', $booked->name);
        $passengerPhones = explode(', ', $booked->phone);
        $passengerSeats = explode(', ', $booked->seat_no);
        $passengerTerminals = explode(', ', $booked->terminal);

        foreach ($passengerNames as $index => $passengerName) {
            $ticket = new Ticket();
            $ticket->comp_name =  $compname->name;
            $ticket->summary = "Reserved Ticket";
            $ticket->name = $passengerName;
            $ticket->phone = $passengerPhones[$index];
            $ticket->seat_no = $passengerSeats[$index];
            $ticket->schedule_id = $booked->schedule_id;
            $ticket->date = $booked->date;
            $ticket->ticketreference = $ticketNumber;
            $ticket->terminal = $passengerTerminals[$index];
            $ticket->status = "paid";
            $ticket->save();
        }

        // Update seat reservations
        $seat = Seat::where('id', $seatId)->first();
        $bookedseat = explode(',', $seat->booked_seats);
        $reservedseat = explode(',', $seat->reserved_seats);

        $reservednew = array_merge($reservedseat, $bookedseat);
        $reservednew = array_filter($reservednew); // Remove empty elements

        $seat->reserved_seats = implode(',', $reservednew);
        $seat->booked_seats = null;
        $seat->save();




        Session::put('ticketdetails', [
            'ticketnumber' =>   $ticketNumber,
            'button' => 'QR Code',
            'url' => 'https://github.com/',
        ]);


        $booked->delete();

        return redirect('/email');
    }
}
