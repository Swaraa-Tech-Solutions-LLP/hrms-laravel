<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('/');
Route::get('/login', function () {
    return view('pages.login');
});
Route::get('/single', function () {
    return view('pages.single');
});

