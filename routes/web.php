<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('HomePage');
})->name("HomePage");

// |Auth İşlemleri---------------------------------------------------------------------------
Route::post('/', [App\Http\Controllers\UserController::class, 'userLoginRegister'])->name("userLoginRegister");
// |Auth İşlemleri---------------------------------------------------------------------------

// |Profil Sayfası---------------------------------------------------------------------------
Route::get('/Profil/{username}', [App\Http\Controllers\UserController::class, 'userProfile'])->name("profile.index");
// |Profil Sayfası---------------------------------------------------------------------------

// |Ayarlar Sayfası--------------------------------------------------------------------------
Route::get('/Ayarlar', [App\Http\Controllers\UserController::class, 'userSettings'])->name("settings.index");
Route::post('/Ayarlar', [App\Http\Controllers\UserController::class, 'userSettingsUpdate'])->name("settings.index.update");
// |Ayarlar Sayfası--------------------------------------------------------------------------

// |Diğer Sayfalar---------------------------------------------------------------------------
Route::get("/About", function(){ return view("Others/About"); })->name("page.about");
Route::get("/Contact", function(){ return view("Others/Contact"); })->name("page.contact");
Route::get("/FAQ", function(){ return view("Others/FAQ"); })->name("page.faq");
Route::get("/PrivacyPolicy", function(){ return view("Others/PrivacyPolicy"); })->name("page.privacyPolicy");
// |Diğer Sayfalar---------------------------------------------------------------------------

// |İçerik Ekleme Sayfaları------------------------------------------------------------------
Route::get('/Ekle/Kitap', function(){ return view('Contents/Book/add'); })->name("content.book");
Route::post('/Ekle/Kitap', [App\Http\Controllers\Contents\BookController::class, 'addBook'])->name("content.book.add");
// |İçerik Ekleme Sayfaları------------------------------------------------------------------

// |Tekil İçerik Sayfaları------------------------------------------------------------------
Route::get('/Kitap/{slug}', [App\Http\Controllers\Contents\BookController::class, 'indexBook'])->name("book.index");
// |Tekil İçerik Sayfaları------------------------------------------------------------------

// |Çoğul İçerik Sayfaları------------------------------------------------------------------
Route::get('/Kitaplar', [App\Http\Controllers\Contents\BookController::class, 'indexBooks'])->name("books.index");
// |Çoğul İçerik Sayfaları------------------------------------------------------------------