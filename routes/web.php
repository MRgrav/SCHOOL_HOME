<?php

use App\Http\Controllers\DepartmentController;
use App\Models\Department;
use App\Models\Role;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\OnlineRegistrationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Models\Notification;
use App\Models\Profile;
use Illuminate\Validation\Rules\Numeric;
use Nette\Utils\Strings;

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

    $roles = Role::whereIn('name', ['principal', 'vice_principal', 'coordinator'])->pluck('id', 'name');

    $profiles = [
        'principal'       => Profile::where('role_id', $roles['principal'])->first(),
        'vice_principal'  => Profile::where('role_id', $roles['vice_principal'])->first(),
        'coordinator'     => Profile::where('role_id', $roles['coordinator'])->first(),
    ];

    // Safely load role relation if profile exists
    foreach ($profiles as $key => $profile) {
        if ($profile) {
            $profile->load('role');
        }
    }

    return Inertia::render('Home', [
        'notifications' => $notifications,
        'profiles' => $profiles,
    ]);
})->name('home');

/**
 * Faculty page
 */
Route::get('/faculty', function () {

    $departments = Department::all();
    $profiles = Profile::all();
    return Inertia::render('Faculty/Index', [
        'departments' => $departments,
        'profiles' => $profiles,
    ]);

})->name('faculty');

/** 
 * Notifications page
*/
Route::get('/notifications', function () {
    $notifications = Notification::orderBy('created_at', 'desc')
        ->get();

    return Inertia::render('Notifications/Index', [
        'notifications' => $notifications,
    ]);
})->name('notifications');

Route::get('/notifications/{notification}', function (Notification $notification) {
    return Inertia::render('Notifications/Show', [
        'notification' => $notification,
    ]);
})->name('notifications.show');



Route::get('/profiles/{id}', function (int $id) {
    $profile = Profile::findOrFail($id);
    $profile->load('role');
    return Inertia::render('Profile', [
        'profile' => $profile,
    ]);
})->whereNumber('id');

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


        // Profiles Admin page
        Route::get('/profiles', [ProfileController::class, 'index'])
            ->name('school-admin.profiles.index');

        Route::get('/profiles/create', [ProfileController::class, 'create'])
            ->name('school-admin.profiles.create');

        Route::post('/profiles', [ProfileController::class, 'store'])
            ->name('school-admin.profiles.store');

        Route::get('/profiles/{id}/edit', [ProfileController::class, 'edit'])
            ->name('school-admin.profiles.edit');

        Route::post('/profiles/{id}/update', [ProfileController::class, 'update'])
            ->name('school-admin.profiles.update');

        Route::delete('/profiles/{id}', [ProfileController::class, 'destroy'])
            ->name('school-admin.profiles.delete');

        Route::get('/profiles/{id}', [ProfileController::class, 'show'])
            ->name('school-admin.profiles.show');

        // Departments Admin page
        Route::get('/departments', [DepartmentController::class, 'index'])
            ->name('school-admin.departments.index');

        Route::get('/departments/create', [DepartmentController::class, 'create'])
            ->name('school-admin.departments.create');

        Route::post('/departments', [DepartmentController::class, 'store'])
            ->name('school-admin.departments.store');

        Route::get('/departments/{id}/edit', [DepartmentController::class, 'edit'])
            ->name('school-admin.departments.edit');

        Route::post('/departments/{id}/update', [DepartmentController::class, 'update'])
            ->name('school-admin.departments.update');

        Route::delete('/departments/{id}', [DepartmentController::class, 'destroy'])
            ->name('school-admin.departments.delete');

        Route::get('/departments/{id}', [DepartmentController::class, 'show'])
            ->name('school-admin.departments.show');


        // Posts page
        Route::get('/posts', function () {
            return Inertia::render('school-admin/Posts');
        })->name('school-admin.posts');

        Route::resource('profiles', ProfileController::class);


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
require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
