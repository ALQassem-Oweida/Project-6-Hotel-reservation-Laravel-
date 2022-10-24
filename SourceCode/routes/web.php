<?php

use App\Http\Controllers\ContactusController;
use App\Http\Controllers\ReviewuserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RoomListingController;
use App\Http\Controllers\UserPublicController;
use App\Http\Middleware\GuestMiddleware;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('pages.index');
});

Route::get('/index', function () {
    return view('pages.index');
})->name('home');





Route::get('/about', function () {
    return view('pages.about');
})->name('about');



Route::get('/service', function () {
    return view('pages.service');
})->name('service');



Route::get('/room', [RoomListingController::class, 'index'])->name('room');
Route::post('/roomsearch', [RoomListingController::class, 'avilable'])->name('avilable');
Route::middleware([GuestMiddleware::class])->group(function () {
    Route::get('/room/{id}/book', [RoomListingController::class, 'book'])->name('room.book');
    Route::post('/room/{id}/booking/confirm', [RoomListingController::class, 'confirm'])->name('room.book.confirm');
    
});




Route::get('/team', function () {
    return view('pages.team');
});
Route::get('/testimonial', function () {
    return view('pages.testimonial');
});

Route::get('/Privacy Policy', function () {
    return view('pages.Privacy Policy');
});

Route::get('/Terms and Condition', function () {
    return view('pages.Terms and Condition');
});

Route::get('/dashboard', [RoomListingController::class, 'index'])->name('dashboard');



Route::resource('/userprofile', UserPublicController::class);

Route::resource('/contactus', ContactusController::class);
Route::resource('/review', ReviewuserController::class);


Route::get('middleware', function () {
    $collection = collect(Route::getRoutes())->map(function ($r) {
        if (isset($r->action['middleware']))
            return $r->action['middleware'];
    })->flatten();
    return array_unique($collection->toArray());
});




Route::get('/Event&party', function () {
    return view('pages.Event&party');
});
Route::get('/Spa&Fitness', function () {
    return view('pages.Spa&Fitness');
});
Route::get('/Food&Restaurant', function () {
    return view('pages.Food&Restaurant');
});
Route::get('/GYM&Yoga', function () {
    return view('pages.GYM&Yoga');
});
Route::get('/Sports&Gaming', function () {
    return view('pages.Sports&Gaming');
});
