<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QRController;
use App\Http\Controllers\SpecialController;
use App\Http\Controllers\ReservationController;


Route::get('/', function () {
    return view('landing');
});


// Routes for QR Controller
Route::get('/qr', [QRController::class, 'index']);
Route::post('/generate-qr', [QRController::class, 'generateQR']);

// Routes for Reservation Controller
Route::get('/reservations', [ReservationController::class, 'index'])->name('reservation.index');
Route::get('/reservations/pdf', [ReservationController::class, 'pdf'])->name('reservations.pdf');
Route::get('/reservations/csv', [ReservationController::class, 'exportToCsv'])->name('reservations.csv');
Route::post('/reservations/import-csv', [ReservationController::class, 'importCsv'])->name('reservations.import.csv');
Route::get('/reservations/create', [ReservationController::class, 'create'])->name('reservation.create');
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservation.store');
Route::get('/reservations/{id}', [ReservationController::class, 'show'])->name('reservation.show');
Route::delete('/reservations/deleteAll', [ReservationController::class, 'deleteAll'])->name('reservations.deleteAll');



// Routes For Special
Route::get('/specials', [SpecialController::class, 'index'])->name('special.index');



