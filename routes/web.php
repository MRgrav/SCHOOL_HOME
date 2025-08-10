<?php

use App\Http\Controllers\DepartmentController;
use App\Models\Department;
use App\Models\Role;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\OnlineRegistrationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Notification;
use App\Models\Post;
use App\Models\Profile;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
|
| These routes are accessible to all users without authentication.
|
*/

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

    $posts = Post::orderBy('created_at', 'desc')
        ->limit(6)
        ->get();

    return Inertia::render('Home', [
        'notifications' => $notifications,
        'profiles' => $profiles,
        'posts' => $posts
    ]);
})->name('home');


/**
 * Academic Section
 */
Route::get('/academic-calendar', function () {
    return Inertia::render('AcademicCalendar');
});

Route::get('/holiday-list', function () {
    return Inertia::render('HolidayList');
});

Route::get('/school-timing', function () {
    return Inertia::render('CommingSoon',[
        'title' => "School Timing"
    ]);
});

Route::get('/school-uniform', function () {
    return Inertia::render('SchoolUniform');
});

Route::get('/list-of-books', function () {
    return Inertia::render('CommingSoon',[
        'title' => "List of Books"
    ]);
});

Route::get('/subjects-offered', function () {
    return Inertia::render('CommingSoon',[
        'title' => "Subjects Offered"
    ]);
});


/**
 * Non Academic Section
 */
Route::get('/news-events', function () {
    $posts = Post::orderBy('created_at', 'desc')
        ->get();
    return Inertia::render('NewsAndEvents/Index', [
        'posts' => $posts,
    ]);
});
Route::get('/news-events/{id}', function (int $id) {
    $post = Post::findOrFail($id);
    return Inertia::render('NewsAndEvents/Show', [
        'post' => $post,
    ]);
})->whereNumber('id');

Route::get('/sports-calendar', function () {
    return Inertia::render('CommingSoon',[
        'title' => "Sports Calendar"
    ]);
});

Route::get('/ncc', function () {
    return Inertia::render('NCC/Index');
});


/**
 * Admission Section
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

Route::get('/admission-procedure', function () {
    return Inertia::render('AdmissionProcedure/Index');
});

Route::get('/fees-structure', function () {
    return Inertia::render('FeesStructure/Index');
});

Route::get('/testimonials', function () {
    return Inertia::render('CommingSoon',[
        'title' => "Testimonials"
    ]);
});

Route::get('/office-remittances', function () {
    return Inertia::render('CommingSoon',[
        'title' => "Office Remittances"
    ]);
});

Route::get('/transfer-certificate', function () {
    return Inertia::render('TransferCertificate/Index');
});

Route::get('/orientation-program', function () {
    return Inertia::render('CommingSoon',[
        'title' => "Orientation Program"
    ]);
});

Route::get('/age-limits', function () {
    return Inertia::render('CommingSoon',[
        'title' => "Age Limits"
    ]);
});


/**
 * Infrastructure Section
 */

Route::prefix('/laboratory')->group(function () {
    Route::get('/computer', function () {
        return Inertia::render('Laboratory/Computer/Index');
    });
    Route::get('/physics', function () {
        return Inertia::render('Laboratory/Physics/Index');
    });
    Route::get('/chemistry', function () {
        return Inertia::render('Laboratory/Chemistry/Index');
    });
    Route::get('/biology', function () {
        return Inertia::render('Laboratory/Biology/Index');
    });
});

Route::get('/classrooms', function () {
    return Inertia::render('CommingSoon',[
        'title' => "Classrooms"
    ]);
});

Route::get('/library', function () {
    return Inertia::render('CommingSoon',[
        'title' => "Library"
    ]);
});

Route::get('/playground-sports', function () {
    return Inertia::render('CommingSoon',[
        'title' => "Playground Sport"
    ]);
});

Route::get('/creative-performing-arts', function () {
    return Inertia::render('CommingSoon',[
        'title' => "Creative Performing Arts"
    ]);
});

Route::get('/medical-care', function () {
    return Inertia::render('CommingSoon',[
        'title' => "Medical Care"
    ]);
});


/**
 * Activities Section
 */
 Route::prefix('/house')->group(function () {
    Route::get('/gandhi', function () {
        return Inertia::render('CommingSoon',[
            'title' => "Gandhi House"
        ]);
    });
    Route::get('/nehru', function () {
        return Inertia::render('CommingSoon',[
            'title' => "Nehru House"
        ]);
    });
    Route::get('/subhash', function () {
        return Inertia::render('CommingSoon',[
            'title' => "Subhash House"
        ]);
    });
    Route::get('/tagore', function () {
        return Inertia::render('CommingSoon',[
            'title' => "Tagore House"
        ]);
    });
 });

Route::get('/sports', function () {
    return Inertia::render('CommingSoon',[
        'title' => "Sports"
    ]);
});


/**
 * Achievements Section
 */
Route::get('/academic-achievements', function () {
    return Inertia::render('CommingSoon',[
        'title' => "Academic Achievements"
    ]);
});


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


/** 
 * More Public Pages Not Under Navlinks
 */

// Faculty page
Route::get('/faculty', function () {

    $departments = Department::all();
    $profiles = Profile::all();
    return Inertia::render('Faculty/Index', [
        'departments' => $departments,
        'profiles' => $profiles,
    ]);

})->name('faculty');

// Profile page of people
Route::get('/profiles/{id}', function (int $id) {
    $profile = Profile::findOrFail($id);
    $profile->load('role');
    return Inertia::render('Profile', [
        'profile' => $profile,
    ]);
})->whereNumber('id');


Route::get('/about', function () {
    return Inertia::render('CommingSoon',[
        'title' => "About Us"
    ]);
});

Route::get('/magazine', function () {
    return Inertia::render('CommingSoon',[
        'title' => "Magazine"
    ]);
});

Route::get('/staff', function () {
    return Inertia::render('CommingSoon',[
        'title' => "Staff"
    ]);
});

Route::get('/rules-regulations', function () {
    return Inertia::render('CommingSoon',[
        'title' => "Rules Regulations"
    ]);
});

Route::get('/results', function () {
    return Inertia::render('CommingSoon',[
        'title' => "Results"
    ]);
});

Route::get('/career', function () {
    return Inertia::render('CommingSoon',[
        'title' => "Career"
    ]);
});

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


        // Posts Admin page
        Route::get('/posts', [PostController::class, 'index'])
            ->name('school-admin.posts.index');

        Route::get('/posts/create', [PostController::class, 'create'])
            ->name('school-admin.posts.create');

        Route::post('/posts', [PostController::class, 'store'])
            ->name('school-admin.posts.store');

        Route::get('/posts/{id}/edit', [PostController::class, 'edit'])
            ->name('school-admin.posts.edit');

        Route::post('/posts/{id}/update', [PostController::class, 'update'])
            ->name('school-admin.posts.update');

        Route::delete('/posts/{id}', [PostController::class, 'destroy'])
            ->name('school-admin.posts.delete');

        Route::get('/posts/{id}', [PostController::class, 'show'])
            ->name('school-admin.posts.show');

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
