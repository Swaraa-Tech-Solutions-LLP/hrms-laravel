<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Deduction\DeductionController;

Route::middleware([RedirectIfAuthenticated::class])->group(function () {
    Route::get('/', [HomeController::class,'index'])->name('login');
});
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');

    Route::resource('employee', EmployeeController::class)->names([
        'index' => 'employee',
        'create' => 'employee.create',
        'store' => 'employee.store',
        'edit' => 'employee.edit',
        'update' => 'employee.update',
        'destroy' => 'employee.destroy',
    ]);

    Route::resource('deductions', DeductionController::class)->names([
        'index' => 'deductions.index',
        'store' => 'deductions.store',
        'edit' => 'deductions.edit',
        'update' => 'deductions.update',
        'destroy' => 'deductions.destroy',
    ]);

});



