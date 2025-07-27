<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\OnlineRegistrationController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
|
| These routes are accessible to all users without authentication.
|
*/

// Online registration form (public)
Route::controller(OnlineRegistrationController::class)->group(function () {
    Route::get('/online-registration', 'create')
        ->name('online-registration.create');

    Route::post('/online-registration', 'store')
        ->name('online-registration.store');
});

// Home page
Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

/*
|--------------------------------------------------------------------------
| School Admin Routes (Protected)
|--------------------------------------------------------------------------
|
| These routes are restricted to authenticated, verified, and admin users.
|
*/

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::prefix('school-admin')->group(function () {

        // Dashboard page
        Route::get('/dashboard', function () {
            return Inertia::render('school-admin/Dashboard');
        })->name('dashboard');

        // List all registrations
        Route::get('/registrations', [OnlineRegistrationController::class, 'schoolAdminIndex'])
            ->name('school-admin.registration');

        // Show a single registration detail page
        Route::get('/registrations/{id}', [OnlineRegistrationController::class, 'show'])
            ->name('school-admin.registration.detail')
            ->whereNumber('id'); // Only allow numeric IDs

        // Notifications page
        Route::get('/notifications', function () {
            return Inertia::render('school-admin/Notifications');
        })->name('school-admin.notifications');

        // Posts page
        Route::get('/posts', function () {
            return Inertia::render('school-admin/Posts');
        })->name('school-admin.posts');
    });
});

/*
|--------------------------------------------------------------------------
| Additional Route Files
|--------------------------------------------------------------------------
|
| Load modular route files.
|
*/
require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
