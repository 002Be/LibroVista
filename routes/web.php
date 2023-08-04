<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('HomePage');
})->name("HomePage");

// | Auth İşlemleri--------------------------------------------------------------------------
Route::post('/', [App\Http\Controllers\UserController::class, 'userLoginRegister'])->name("userLoginRegister");
// | Auth İşlemleri--------------------------------------------------------------------------

// | Profil Sayfası---------------------------------------------------------------------------
Route::get('/Profil/{username}', [App\Http\Controllers\UserController::class, 'userProfile'])->name("profile.index");
// | Profil Sayfası---------------------------------------------------------------------------

// | Kitap İşlemleri--------------------------------------------------------------------------
Route::get('/Kitaplar', function(){ return view('books/index'); })->name("books.index");
// | Kitap İşlemleri--------------------------------------------------------------------------

// | Ayarlar Sayfası--------------------------------------------------------------------------
Route::get('/Ayarlar', [App\Http\Controllers\UserController::class, 'userSettings'])->name("settings.index");
// | Ayarlar Sayfası--------------------------------------------------------------------------

// | Diğer Sayfalar---------------------------------------------------------------------------
Route::get("/About", function(){ return view("Others/About"); })->name("page.about");
Route::get("/Contact", function(){ return view("Others/Contact"); })->name("page.contact");
Route::get("/FAQ", function(){ return view("Others/FAQ"); })->name("page.faq");
Route::get("/PrivacyPolicy", function(){ return view("Others/PrivacyPolicy"); })->name("page.privacyPolicy");
// | Diğer Sayfalar---------------------------------------------------------------------------