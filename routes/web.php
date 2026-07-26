<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Models\UserMembership;
use App\Models\WorkoutPlan;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MembershipPlanController;
use App\Http\Controllers\WorkoutPlanController;
use App\Http\Controllers\WorkoutVideoController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\UserMembershipController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminLoginController;
use App\Models\Progress;
use App\Models\Payment;
use App\Models\Attendance;

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    $user = Auth::user();

    // Active Membership
    $membership = UserMembership::with('plan')
        ->where('user_id', $user->id)
        ->where('status', 'active')
        ->latest()
        ->first();

    // Workout Plans
    $workouts = WorkoutPlan::all();

    // Latest Progress
    $progress = Progress::where('user_id', $user->id)
        ->latest()
        ->first();

    // Latest Payment
    $payment = Payment::with('membership')
        ->where('user_id', $user->id)
        ->latest()
        ->first();

    // Attendance Count
    $attendance = Attendance::where('user_id', $user->id)
        ->count();

    return view('dashboard', compact(
        'user',
        'membership',
        'workouts',
        'progress',
        'payment',
        'attendance'
    ));

})->middleware('auth')->name('dashboard');

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

/*
|--------------------------------------------------------------------------
| Membership
|--------------------------------------------------------------------------
*/

Route::resource('membership-plans', MembershipPlanController::class);

Route::post('/buy-membership/{id}',
    [UserMembershipController::class, 'store'])
    ->middleware('auth')
    ->name('buy.membership');

/*
|--------------------------------------------------------------------------
| Workout Plans
|--------------------------------------------------------------------------
*/

Route::resource('workout-plans', WorkoutPlanController::class)
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| Workout Videos
|--------------------------------------------------------------------------
*/

Route::resource('workout-videos', WorkoutVideoController::class)
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| Progress
|--------------------------------------------------------------------------
*/

Route::resource('progress', ProgressController::class)
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| Admin Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/admin/dashboard', function () {

    if (auth()->user()->role != 'admin') {

        abort(403);

    }

    return app(App\Http\Controllers\AdminController::class)->index();

})->middleware('auth')->name('admin.dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/users', function () {

        if (auth()->user()->role != 'admin') {

            abort(403);

        }

        return app(App\Http\Controllers\UserController::class)->index(request());

    })->name('users.index');

    Route::delete('/users/{id}', function ($id) {

        if (auth()->user()->role != 'admin') {

            abort(403);

        }

        return app(App\Http\Controllers\UserController::class)->destroy($id);

    })->name('users.destroy');

});
Route::resource('attendance', AttendanceController::class)
    ->middleware('auth');

Route::resource('payments', PaymentController::class)
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| Admin Login
|--------------------------------------------------------------------------
*/

Route::get('/admin-login', [AdminLoginController::class, 'showLogin'])
    ->name('admin.login');

Route::post('/admin-login', [AdminLoginController::class, 'login'])
    ->name('admin.login.submit');

Route::post('/admin-logout', [AdminLoginController::class, 'logout'])
    ->middleware('auth')
    ->name('admin.logout');
/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';