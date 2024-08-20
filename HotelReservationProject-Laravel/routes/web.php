<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ImgController;
use App\Models\Event;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/reserve', [CustomerController::class, 'showRooms']);

    Route::post('/reserve', [CustomerController::class, 'reserveRoom'])->name('reserve');
    Route::get('/user-info', [CustomerController::class,'retrieveUserInfo'])->name('user-info');

});

Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/login', function () {
    return view('auth.login');
});

require __DIR__.'/auth.php';

Route::get('home', function () {
    return view('welcome');
});

// Route::get('/reserve', function () {
//     return view('reserve');
// });

Route::get("/", 'App\Http\Controllers\Customercontroller@index')->name('home');

// moved this part under the middleware to restrict
//   Route::get('/reserve', [CustomerController::class, 'showRooms']);

//   Route::post('/reserve', [CustomerController::class, 'reserveRoom']);

 Route::get('rooms', [CustomerController::class, 'allRooms']);
// Route for the about page, including form and weather display
Route::get('/about', [WeatherController::class, 'index'])->name('about');
Route::post('/weather', [WeatherController::class, 'getWeather'])->name('weather.get');
Route::get('/store-rooms', [RoomController::class, 'storeRooms']);


Route::get('/calendar',[CustomerController::class,'calendar']);

Route::get('/events', function () {
    $events = Event::select('id', 'title','date')->get();
    return response()->json($events);
 }); 
 
 Route::get('/logout', function(){
 //Auth::logout();
 return redirect(route('home'))->with('successMSG','Successfully Logged Out');



 });
 
 Route::get('/imgserve', [ImgController::class, 'imgserve']);
