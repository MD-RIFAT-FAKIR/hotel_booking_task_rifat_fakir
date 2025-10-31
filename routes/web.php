<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookingController;

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

/*----------------------booking all route----------------------*/
//hotel booking form
Route::get('booking/form', [BookingController::class, 'bookingForm'])->name('hotel.booking.form');


//check availability of room
Route::post('/chek-availability', [BookingController::class, 'checkAvailability'])->name('check.availability');

//confirm booking
Route::post('/confirm', [BookingController::class, 'confirmBooking'])->name('booking.confirm');

//thank you page
Route::get('/booking-thank-you/{id}', [BookingController::class, 'thankYou'])->name('booking.thankyou');





/*----------------------end booking all route----------------------*/








Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
