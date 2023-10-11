<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buscompany;
use App\Models\Route;
use App\Models\Schedule;
use App\Models\Buses;
use App\Models\Cities;
use App\Models\Terminal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Seat;
use App\Models\Ticket;
use Illuminate\Support\Facades\Session;

class BusCompaniesController extends Controller
{
     public function buses()
    {
        $user = Auth::user();
        $company = Buscompany::where('name', $user->name)->first();
        $buses = Buses::where('comp_id', $company->id)->get();
        $page = 'buses';
        $date = Carbon::now();
        return view('buscompany.buses', compact('buses', 'date', 'company', 'page'));
    }
    public function delete_bus($bus_id)
    {
        $busdel = Buses::where('id', $bus_id)->delete();
        return redirect()->back()->with('message', 'Bus Deleted Successfully!!');
    }
    public function add_bus(Request $req)
    {
        $validation = $req->validate([
            'platenumber' => 'required|string|min:8|regex:/^\d{5}\s[A-Z]{2}$/',
            'busid' => 'required|string|min:6|regex:/^[A-Za-z]{3}\d{3}$/',
            'sidenumber' => 'required|digits:4',
            'capacity' => 'required|integer|min:49|max:60',
            'status' => 'required|string',
        ]);

        $user = Auth::user();
        $company = Buscompany::where('name', $user->name)->first();
        $buses = Buses::where('comp_id', $company->id)->first();

        $searchplate = Buses::where('bus_plate_number', $req->platenumber)->first();

        if ($searchplate) {
            return redirect()->back()->withErrors(['platenumber' => 'You cannot use the requested plate number!!']);
        }

        $searchbusid = Buses::where('bus_com_id', $req->busid)->first();

        if ($searchbusid) {
            return redirect()->back()->withErrors(['busid' => 'You cannot use the requested bus id!!']);
        }


        $newbus = new Buses();
        $newbus->bus_plate_number = $req->platenumber;
        $newbus->bus_com_id = $req->busid;
        $newbus->bus_side_num = $req->sidenumber;
        $newbus->comp_id = $company->id;
        $newbus->capacity = $req->capacity;
        $newbus->status = $req->status;
        $newbus->save();
        return redirect()->back()->with('message', 'Bus Added Successfully!!');
    }
    public function cities()
    {
        $cities = Cities::all();
        $page = 'cities';
        $date = Carbon::now();
        return view('buscompany.cities', compact('cities', 'date', 'page'));
    }
    public function Available_route()
    {
        $user = Auth::user();
        $company = Buscompany::where('name', $user->name)->first();

        $distinctRouteIds = Schedule::where('comp_id', $company->id)
            ->distinct('route_id')
            ->pluck('route_id');
        $routes = Route::whereIn('id', $distinctRouteIds)->get();

        $buses = Buses::where('comp_id', $company->id)->count();
        $schedule = Schedule::where('comp_id', $company->id)->count();
        $page = 'route';
        $date = Carbon::now();
        return view('buscompany.route', compact('routes', 'date', 'page'));
    }
    public function schedules()
    {
        $user = Auth::user();

        $company = Buscompany::where('name', $user->name)->first();

        $combuses = Buses::where('comp_id', $company->id)->get();

        $distinctBusIds = Schedule::where('comp_id', $company->id)
            ->pluck('bus_id');

        $distinctRouteIds = Schedule::where('comp_id', $company->id)
            ->distinct('route_id')
            ->pluck('route_id');

        // Delete rows with expired end dates
        Schedule::where('comp_id', $company->id)
            ->whereDate('end_date', '<', now())
            ->delete();

        $routes = Route::whereIn('id', $distinctRouteIds)->get();

        $troutes = Route::all();

        $schedule = Schedule::where('comp_id', $company->id)->get();

        $buses = Buses::whereIn('id', $distinctBusIds)->get();

        $terminal = Terminal::all();

        $page = 'schedule';

        $cities = Cities::all();

        $cities2 = Cities::all();

        $date = Carbon::now();

        return view('buscompany.schedule', compact('routes', 'date', 'troutes', 'buses', 'combuses', 'schedule', 'terminal', 'cities', 'cities2', 'page'))->with('message','Schedule with past end dates will be deleted so rember to update on time!!');
    }
    
    public function add_schedules(Request $request)
    {
        $currentDate = Carbon::now()->format('Y-m-d');
        $rules = [
            'source' => 'required',
            'destination' => 'required|different:source',
            'routetype' => 'required|in:Even,Odd',
            'startdate' => 'required|date|after_or_equal:' . $currentDate,
            'enddate' => 'required|date|after_or_equal:startdate',
            // 'terminal'=>'required',
            'bus' => 'required',
            'price' => 'required|numeric|min:1',
            'status' => 'required|in:Available,Unavailable,Expired',
        ];

        $messages = [
            'destination.different' => 'The destination must be different from the source.',
            'enddate.after_or_equal' => 'The end date must be after or equal to the start date.',
            'startdate.after_or_equal' => 'The start date must be on or after today.',
        ];

        $validatedData = $request->validate($rules, $messages);

        $route = Route::where('source', $validatedData['source'])->where('destination', $validatedData['destination'])->first();

        $routetwo = Route::where('source', $validatedData['destination'])->where('destination', $validatedData['source'])->first();

        if (!$route) {
            return redirect()->back()->with('failed', 'This route is not currently available!!');
        }

        if (!$routetwo) {
            return redirect()->back()->with('failed', 'This reverse route is not currently available!!');
        }

      

        if ($validatedData['routetype'] == 'Even') {
            $routetype = 'Odd';
        } else if ($validatedData['routetype'] == 'Odd') {
            $routetype = 'Even';
        }

        $user = Auth::user();

        $company = Buscompany::where('name', $user->name)->first();

        $bus = Buses::where('bus_com_id', $validatedData['bus'])->first();

        $businschedule = Schedule::where('bus_id', $bus->id)->count();

        if ($businschedule >= 2) {
            return redirect()->back()->with('failed', 'Attempt to use bus multiple times!!');
        }

        $cityId = Cities::where('name', $validatedData['source'])->first();

        $cityId2 = Cities::where('name', $validatedData['destination'])->first();

        $vterminal = Terminal::where('city_id', $cityId->id)->first();

        $vterminal2 = Terminal::where('city_id', $cityId2->id)->first();


        $newSchedule = new Schedule();
        $newScheduletwo = new Schedule();

        $newSchedule->comp_id = $company->id;
        $newSchedule->name = $company->name; //or $user->name
        $newSchedule->route_id = $route->id;
        $newSchedule->route_type = $validatedData['routetype'];
        $newSchedule->bus_id = $bus->id;
        $newSchedule->price = $validatedData['price'];
        $newSchedule->terminal = $vterminal->name;
        $newSchedule->terminal_id = $vterminal->id;
        $newSchedule->start_date = $validatedData['startdate'];
        $newSchedule->end_date = $validatedData['enddate'];
        $newSchedule->status = $validatedData['status'];

        $newScheduletwo->comp_id = $company->id;
        $newScheduletwo->name = $company->name; //or $user->name
        $newScheduletwo->route_id = $routetwo->id;
        $newScheduletwo->route_type = $routetype;
        $newScheduletwo->bus_id = $bus->id;
        $newScheduletwo->price = $validatedData['price'];
        $newScheduletwo->terminal = $vterminal2->name;
        $newScheduletwo->terminal_id = $vterminal2->id;
        $newScheduletwo->start_date = $validatedData['startdate'];
        $newScheduletwo->end_date = $validatedData['enddate'];
        $newScheduletwo->status = $validatedData['status'];

        $newSchedule->save();
        $newScheduletwo->save();

        return redirect()->back()->with('message', 'Schedule Added Successfully!!');
    }
    public function add_one_schedules(Request $request)
    {
        $currentDate = Carbon::now()->format('Y-m-d');
        $rules = [
            'source' => 'required',
            'destination' => 'required|different:source',
            'routetype' => 'required|in:Even,Odd',
            'date' => 'required|date|after_or_equal:' . $currentDate,
            // 'terminal'=>'required',
            'bus' => 'required',
            'price' => 'required|numeric|min:1',
            'status' => 'required|in:Available,Unavailable,Expired',
        ];

        $messages = [
            'destination.different' => 'The destination must be different from the source.',
            'date.after_or_equal' => 'The  date must be on or after today.',
        ];

        $validatedData = $request->validate($rules, $messages);

        $route = Route::where('source', $validatedData['source'])->where('destination', $validatedData['destination'])->first();

        $routetwo = Route::where('source', $validatedData['destination'])->where('destination', $validatedData['source'])->first();

        if (!$route) {
            return redirect()->back()->with('failed', 'This route is not currently available!!');
        }

        if (!$routetwo) {
            return redirect()->back()->with('failed', 'This reverse route is not currently available!!');
        }

        if ($validatedData['routetype'] == 'Even') {
            $routetype = 'Odd';
        } else if ($validatedData['routetype'] == 'Odd') {
            $routetype = 'Even';
        }

        $user = Auth::user();

        $company = Buscompany::where('name', $user->name)->first();

        $bus = Buses::where('bus_com_id', $validatedData['bus'])->first();

        $businschedule = Schedule::where('bus_id', $bus->id)->count();

        if ($businschedule >= 2) {
            return redirect()->back()->with('failed', 'Attempt to use bus multiple times!!');
        }

        $cityId = Cities::where('name', $validatedData['source'])->first();

        $cityId2 = Cities::where('name', $validatedData['destination'])->first();

        $vterminal = Terminal::where('city_id', $cityId->id)->first();


        $newSchedule = new Schedule();

        $newSchedule->comp_id = $company->id;
        $newSchedule->name = $company->name; //or $user->name
        $newSchedule->route_id = $route->id;
        $newSchedule->route_type = $validatedData['routetype'];
        $newSchedule->bus_id = $bus->id;
        $newSchedule->price = $validatedData['price'];
        $newSchedule->terminal = $vterminal->name;
        $newSchedule->terminal_id = $vterminal->id;
        $newSchedule->start_date = $validatedData['date'];
        $newSchedule->end_date = $validatedData['date'];
        $newSchedule->status = $validatedData['status'];

        $newSchedule->save();


        return redirect()->back()->with('message', 'One Time Schedule Added Successfully!!');
    }


    public function delete_schedules($id)
    {
        $schedule = Schedule::where('id', $id)->delete();
        return redirect()->back()->with('message', 'Schedule Deleted Successfully!!');
    }
    public function close($scheduleId){
       $schedule= Schedule::where('id',$scheduleId)->first();
       $schedule->status = 'Unavailable';
       $schedule->save();
       return redirect()->back()->with('message','The Schedule is Successfully Closed!!');
    }
    public function open($scheduleId){
        $schedule= Schedule::where('id',$scheduleId)->first();
        $schedule->status = 'Available';
        $schedule->save();
        return redirect()->back()->with('message','The Schedule is Successfully Opend!!');
     }
     public function edit($ScheduleId){
        
        $user = Auth::user();

        $date = Carbon::now();

        $schedule = Schedule::where('id',$ScheduleId)->first();

        $route = Route::where('id',$schedule->route_id)->first();

        $city = Cities::where('name',$route->source)->first();

        $terminal = Terminal::where('city_id',  $city->id)->get();

        $cities = Cities::all();

        $cities2 = Cities::all();

        $busId=Buses::where('id', $schedule->bus_id)->first();

        $buscompname = Buscompany::where('name',$user->name)->first();

        $combuses = Buses::where('comp_id', $buscompname->id)->get();

        $page = 'schedule';

        Session::put('edit','Edit the schedule with the following previous values');
        
        return view('buscompany.edit',compact('schedule','route','date','page','cities','busId','combuses','cities2','terminal'));
     }
     public function editschedule(Request $req ,$ScheduleId){
        $user = Auth::user();
        $currentDate = Carbon::now()->format('Y-m-d');
        $validationdata = $req->validate([
            'source' => 'required',
            'destination' => 'required|different:source',
            'routetype' => 'required|in:Even,Odd',
            'startdate' => 'required|date',
            'enddate' => 'required|date|after_or_equal:' . $currentDate,
            'terminal'=>'required',
            'bus' => 'required',
            'price' => 'required|numeric|min:1',
            'status' => 'required|in:Available,Unavailable,Expired',
        ]);

        $route = Route::where('source',$validationdata['source'])
        ->where('destination',$validationdata['destination'])
        ->first();

        $company = Buscompany::where('name',$user->name)->first();
      
        $schedule = Schedule::where('id',$ScheduleId)->first();

        $bus = Buses::where('bus_com_id',$validationdata['bus'])->first();

        $terminalId = Terminal::where('name',$validationdata['terminal'])->first();

        $schedule->comp_id  = $company->id;
        $schedule->name = $user->name;
        $schedule->route_id  = $route->id;
        $schedule->route_type = $validationdata['routetype'];
        $schedule->bus_id  = $bus->id;
        $schedule->price =$validationdata['price'];
        $schedule->terminal  =$validationdata['terminal'];
        $schedule->terminal_id = $terminalId->id;
        $schedule->start_date  = $validationdata['startdate'];
        $schedule->end_date  = $validationdata['enddate'];
        $schedule->status = $validationdata['status'];

        $schedule->save();

        return redirect('schedules')->with('message','Schedule updated successfully!!');
      
     }
}
