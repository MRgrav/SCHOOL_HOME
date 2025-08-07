<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\OnlineRegistrationController;
use App\Http\Controllers\NotificationController;
use App\Models\Notification;

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

    Route::get('/online-registration/{id}/pdf', 'downloadPdf')
        ->name('online-registration.pdf')
        ->whereNumber('id'); 

    // Uncomment the following line to enable the test route for sending registration emails
    // Route::get('/online-registration/mail', 'test')
    //     ->name('online-registration.mail');

    Route::post('/online-registration', 'store')
        ->name('online-registration.store');
});

// Home page
Route::get('/', function () {
     $notifications = Notification::orderBy('created_at', 'desc')
                                    ->limit(4)
                                    ->get();

    return Inertia::render('Home', [
       'notifications' => $notifications,
    ]);
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

        // // Notifications page
        Route::get('/notifications', [NotificationController::class, 'schoolAdminIndex'])
            ->name('school-admin.notifications.schoolAdminIndex');

        Route::get('/notifications/create', [NotificationController::class, 'create'])
            ->name('school-admin.notifications.create');
        
        Route::post('/notifications', [NotificationController::class, 'store'])
            ->name('school-admin.notifications.store');

        Route::get('/notifications/{notification}/edit', [NotificationController::class, 'edit'])
            ->name('school-admin.notifications.edit');

        Route::put('/notifications/{id}', [NotificationController::class, 'update'])
            ->name('school-admin.notifications.update');

        Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])
            ->name('school-admin.notifications.delete');
        Route::get('/notifications/{id}', [NotificationController::class, 'show'])
            ->name('school-admin.notifications.show');


        // Posts page
        Route::get('/posts', function () {
            return Inertia::render('school-admin/Posts');
        })->name('school-admin.posts');

        // Route::resource('notifications', NotificationController::class);

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
