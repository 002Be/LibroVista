<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('HomePage');
})->name("HomePage");

// | Auth İşlemleri--------------------------------------------------------------------------
Route::post('/', [App\Http\Controllers\UserController::class, 'userLoginRegister'])->name("userLoginRegister");
// | Auth İşlemleri--------------------------------------------------------------------------

// | Kitap İşlemleri--------------------------------------------------------------------------
Route::get('/kitaplar', function () {
    return view('books/index');
})->name("books.index");
// | Kitap İşlemleri--------------------------------------------------------------------------

// | Diğer Sayfalar---------------------------------------------------------------------------
Route::get("/About", function(){return view("Others/About");})->name("page.about");
Route::get("/Contact", function(){return view("Others/Contact");})->name("page.contact");
Route::get("/FAQ", function(){return view("Others/FAQ");})->name("page.faq");
Route::get("/PrivacyPolicy", function(){return view("Others/PrivacyPolicy");})->name("page.privacyPolicy");
// | Diğer Sayfalar---------------------------------------------------------------------------