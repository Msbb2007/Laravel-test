<?php

use Illuminate\Support\Facades\Route;

//Rout testing

//user route
Route::prefix('/user')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

//admin route
Route::prefix('/admin')->group(function () {
    Route::get('/', function () {
        return view('admin');
    });
});

//eror page
Route::fallback(function () {
    return view('404');
});
