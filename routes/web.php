<?php

use App\Models\User;
use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\AdminController as AdminAdminController;
use App\Http\Controllers\EventController as ControllersEventController;
use App\Http\Controllers\Frontend\MenuController as FrontendMenuController;
use App\Http\Controllers\Frontend\ReservationController as FrontendReservationController;

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


Route::get('/', [WelcomeController::class, 'index']) ->name('welcome');

 // Corrected the closure function

// Moved outside the closure




//homepages
Route::get('my-reservations', function(){
    $user = Auth::user();
    $reservation = Reservation::where('email', $user->email)->get();
    $event = Event::where('email', $user->email)->get();

    
    return view('homepages.myReservations', compact('reservation', 'event'));

});


Route::delete('cancel-reservation/{id}', [ReservationController::class, 'destroy'])->name('cancel.reservation');
Route::delete('cancel-event/{id}', [EventController::class, 'destroy'])->name('cancel.event');


Route::get("/home", [HomeController::class, "index"]) ->middleware('auth') ->name('home');

Route::post("/table-reservation", [HomeController::class, "index"]) ->middleware('auth') ->name('table.reservation');
Route::post("/event-reservation", [HomeController::class, "event"]) ->middleware('auth') ->name('event.reservation');

/*Route::get("/users", [UserController::class, "user"]);

Route::delete("/deleteuser/{id}", [UserController::class, "deleteuser"])->name('delete.user');*/

Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {

   Route::get('/admin', [AdminAdminController::class, "index"])->name('admin.dashboard');

   //DASHBOARD
   Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

    Route::resource('/menus', MenuController::class);
    Route::resource('/tables', TableController::class);
    Route::resource('/reservation', ReservationController::class);
    Route::resource('/events', EventController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function(){
    //PLACE YOUR ROUTES HERE FOR VERIFIED USER


    //APPS
    Route::get('apps-todolist', [HomeController::class, 'todolist']);
});


require __DIR__.'/auth.php';
