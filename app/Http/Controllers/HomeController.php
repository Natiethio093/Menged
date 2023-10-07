<?php

namespace App\Http\Controllers;

use App\Models\Buscompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Route;
use App\Models\Schedule;
use App\Models\Buses;
use App\Models\Cities;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function visitor()
    {
        $bus = Buscompany::all();
        $route = Cities::all();
        return view('passenger.home', ['bus' => $bus, 'route' => $route]);
    }
    public function index()
    {
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
            return view('buscompany.home',compact('buses','schedule','cities','route','date','aroute','page'));
        }
    }
    public function about(){
        return view('passenger.about');
    }
}
