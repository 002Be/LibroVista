<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('HomePage');
});

// | Auth İşlemleri--------------------------------------------------------------------------
Route::post('/', [App\Http\Controllers\UserController::class, 'userLoginRegister'])->name("userLoginRegister");
// | Auth İşlemleri--------------------------------------------------------------------------