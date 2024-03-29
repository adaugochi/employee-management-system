<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\PaymentHistoryController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\SetPasswordController;
use App\Http\Controllers\HomeController;
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
    return redirect(route('login'));
})->name('index');

Auth::routes();

// Password reset routes
Route::group(['prefix' => 'password', 'middleware' => []], function () {
    Route::post('send-reset-link', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.forget');
    Route::post('reset', [ResetPasswordController::class, 'reset'])->name('password.update');
    Route::get('reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
});

// Set Password
Route::post('set-password', [SetPasswordController::class, 'setPassword'])->name('password.create');
Route::get('set-password/{token}', [SetPasswordController::class, 'showSetPasswordForm'])->name('password.set');

// Employee
Route::group(['prefix' => 'employee', 'middleware' => ['auth', 'employee']], function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('employee.home');
    Route::get('/profile', [HomeController::class, 'profile'])->name('employee.profile');
    Route::post('/profile', [HomeController::class, 'updateProfile'])->name('update.profile');
    Route::get('/change-password', [HomeController::class, 'account'])->name('employee.account');
    Route::post('/change-password', [HomeController::class, 'changePassword'])->name('change-password');
    Route::get('/wallet-histories', [HomeController::class, 'walletHistory'])->name('employee.wallets');
});

// Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.home');

    // Employee
    Route::get('/employees', [EmployeeController::class, 'index'])->name('admin.employees');
    Route::get('/employees/user/{id?}', [EmployeeController::class, 'addEmployee'])->name('admin.employee');
    Route::post('/employee', [EmployeeController::class, 'saveEmployee'])->name('admin.employee.save');
    Route::post('set-password/resend/{id}', [EmployeeController::class, 'resendToken'])->name('password.resend.token');

    // PaymentHistory
    Route::get('/payment-history', [PaymentHistoryController::class, 'index'])->name('admin.payment-history');
    Route::get('/payment-history/new', [PaymentHistoryController::class, 'makePayment'])->name('admin.payment-history.new');
    Route::post('/payment-history/save', [PaymentHistoryController::class, 'createPayroll'])->name('admin.payment-history.save');
});

