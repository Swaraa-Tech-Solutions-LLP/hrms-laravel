<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Employee\EmployeeController;


Route::middleware([RedirectIfAuthenticated::class])->group(function () {
    Route::get('/', [HomeController::class,'index'])->name('login');
});
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');

    Route::get('/employee',[EmployeeController::class,'index'])->name('employee');
    Route::get('employee/create',[EmployeeController::class,'create'])->name('employee.create');
    Route::post('employee/store',[EmployeeController::class,'store'])->name('employee.store');
});



