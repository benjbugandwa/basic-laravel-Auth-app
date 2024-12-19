<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use app\Http\Controllers\PasswordResetController;
use App\Http\Controllers\PasswordRecoveryController;
use App\Http\Controllers\PasswordManagerController;

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/register', function () {
    return view('user.register');
})->name('register');*/

//Users
Route::get('/dashboard', [AuthController::class, 'showDashboardForm'])->name('dashboard');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.connect');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/password/reset', [PasswordRecoveryController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [PasswordRecoveryController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [PasswordRecoveryController::class, 'showResetForm'])->name('password.reset');
//Route::post('/password/reset', [PasswordRecoveryController::class, 'reset'])->name('password.update');
Route::post('/password/update/{token}', [PasswordRecoveryController::class, 'update']);


/*Route::get('password/reset', [PasswordManagerController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [PasswordManagerController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [PasswordManagerController::class, 'showResetForm'])->name('password.reset');
Route::post('password/update', [PasswordManagerController::class, 'reset'])->name('password.update');*/