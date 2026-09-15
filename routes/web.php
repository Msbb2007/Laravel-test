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
    Route::get('/user/{id}/edit',[adminController::class,'edit'])->name('admin.users.edit');
    Route::put('/user/{id}/update',[adminController::class,'update'])->name('admin.users.update');
    Route::get('/user/deleted_users',[adminController::class,'deleted_users'])->name('admin.users.deleted_users');
    Route::delete('/user/{id}/delete',[adminController::class,'softDelete'])->name('admin.users.softDelete');
    Route::put('/user/{id}/restore',[adminController::class,'restore'])->name('admin.users.restore');
    Route::delete('/user/{id}/hard_delete',[adminController::class,'hard_delete'])->name('admin.users.hard_delete');
});

//eror page
Route::fallback(function () {
    return view('404');
})->name('notFound');
