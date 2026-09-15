<?php

use App\Http\Controllers\Admin\adminController;
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
    Route::get('/',[adminController::class,'index'])->name('adminHome');
    Route::get('/user/create',[adminController::class,'create'])->name('admin.users.create');
    Route::post('/user/store',[adminController::class,'saveUser'])->name('admin.save-user');
});

//eror page
Route::fallback(function () {
    return view('404');
})->name('notFound');
