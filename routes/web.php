<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\TicketController;
use App\Models\Buscompany;
use App\Http\Controllers\ChapaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BusCompaniesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home',function(){
//   return view('home');
// });
Route::get('/',[VisitorController::class,'index']);
Route::get('/home',[VisitorController::class,'index'])->name('home');
Route::post('/seatselects/{scheduleId}/{date}',[VisitorController::class,'selectseats'])->name('seatselects');
Route::post('/detail/{scheduleId}/{date}/{seatId}/{seatsel}',[VisitorController::class,'passengerdetail'])->name('detail');
Route::get('/timeout/{bookedId}/{seatsel}/{seatId}', [VisitorController::class,'expiredBookingHandler'])->name('timeout');
Route::get('/tickets',[TicketController::class,'index'])->name('tickets.index');
Route::post('/search',[VisitorController::class,'search']);
Route::get('/about',[VisitorController::class,'about']);
Route::get('/email',[TicketController::class,'email']);
Route::get('stripe/{total}/{bookedId}/{seatId}',[VisitorController::class,'stripe'])->name('stripe');
Route::get('chapa/{total}/{bookedId}/{seatId}',[VisitorController::class,'chapa'])->name('chapa');
Route::post('pay/{total}/{bookedId}/{seatId}',[ChapaController::class,'initialize'])->name('pay');
Route::get('callback/{reference}', [ChapaController::class,'callback'])->name('callback');
Route::post('/stripes/{total}/{bookedId}/{seatId}',[VisitorController::class,'stripePost'])->name('stripe.post');
Route::get('/seatselect/{scheduleId}/{date}',[VisitorController::class, 'selectseat'])->name('selectseat');
Route::get('/Add_bus_company',[AdminController::class,'Add_bus_company']);
Route::get('/show_bus_company',[AdminController::class,'showcompany']);
Route::get('/deletecomp/compId/',[AdminController::class,'deletecomp']);
Route::get('/buses',[BusCompaniesController::class,'buses']);
Route::get('confirmchapapayment',[VisitorController::class,'confirmchapapayment']);
Route::get('/buses',[BusCompaniesController::class,'buses']);
Route::get('/delete_bus/{bus_id}',[BusCompaniesController::class,'delete_bus']);
Route::post('/add_bus',[BusCompaniesController::class,'add_bus']);
Route::get('/cities',[BusCompaniesController::class,'cities']);
Route::get('/Available_route',[BusCompaniesController::class,'Available_route']);
Route::get('/schedules',[BusCompaniesController::class,'schedules']);
Route::get('/ticket',[TicketController::class,'Tickets']);
Route::post('/add_schedules',[BusCompaniesController::class,'add_schedules']);
Route::post('/add_one_schedules',[BusCompaniesController::class,'add_one_schedules']);
Route::get('/delete_schedules/{id}',[BusCompaniesController::class,'delete_schedules']);
Route::get('close/{ScheduleId}', [BusCompaniesController::class,'close']);
Route::get('open/{ScheduleId}', [BusCompaniesController::class,'open']);
Route::get('edit/{ScheduleId}',[BusCompaniesController::class,'edit']);
Route::post('editschedule/{ScheduleId}',[BusCompaniesController::class,'editschedule']);
Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
