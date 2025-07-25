<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\OnlineRegistrationController;


Route::controller(OnlineRegistrationController::class)->group(function () {
    Route::get("/online-registration", 'create')->name('online-registration.create');
    Route::post("/online-registration", 'store')->name('online-registration.store');
});


Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');


Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified', 'admin'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
