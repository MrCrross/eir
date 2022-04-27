<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\LkController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\WorkerController;
use App\Models\Seance;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->role === 2) {
            return redirect()->intended(RouteServiceProvider::HOME_DOCTOR);
        }
        if (Auth::user()->role === 1) {
            return redirect()->intended(RouteServiceProvider::HOME_ADMIN);
        }
    }
    $users = User::with('workers.post')->whereHas('workers')->get();
    $seances = Seance::with('workers')
        ->whereHas('workers', function ($q) use ($users) {
            return $q->where('id', $users[0]->workers[0]->id);
        })->get();
    return view('welcome', [
        'users' => $users,
        'seances' => $seances
    ]);
})->name('main');


Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', UserController::class);
    Route::resource('workers', WorkerController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('posts', PostController::class);
    Route::resource('lk', LkController::class);
    Route::resource('visits', VisitController::class);
    Route::get('records/my/{id}', [RecordController::class, 'my'])->name('records.my');
});
Route::resource('records', RecordController::class);
Route::post('records/seances', [RecordController::class, 'seances'])->name('records.seances');

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
