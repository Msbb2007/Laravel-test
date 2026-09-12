<?php

use Illuminate\Support\Facades\Route;

//Rout testing

//user route
Route::prefix('/user')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('userHome');
});

//admin route
Route::prefix('/admin')->group(function () {
    Route::get('/', function () {
        return view('admin');
    })->name('adminHome');
});

//eror page
Route::fallback(function () {
    return view('404');
})->name('notFound');
