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


// Route::get('dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified', 'admin'])->name('admin.');

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::prefix('school-admin')->group(function () {

        Route::get('/dashboard', function () {
            return Inertia::render('school-admin/Dashboard');
        })->name('dashboard');

        Route::get('/registrations', function () {
            return Inertia::render('school-admin/Registrations');
        })->name('school-admin.registration');

        Route::get('/notifications', function () {
            return Inertia::render('school-admin/Notifications');
        })->name('school-admin.notifications');

        Route::get('/posts', function () {
            return Inertia::render('school-admin/Posts');
        })->name('school-admin.posts');

    });
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
