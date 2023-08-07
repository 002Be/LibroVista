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

// | Sayfalar---------------------------------------------------------------------------------
Route::get('/Kitaplar', [App\Http\Controllers\ContentController::class, 'indexBook'])->name("books.index");
// | Sayfalar---------------------------------------------------------------------------------

// | Ayarlar Sayfası--------------------------------------------------------------------------
Route::get('/Ayarlar', [App\Http\Controllers\UserController::class, 'userSettings'])->name("settings.index");
Route::post('/Ayarlar', [App\Http\Controllers\UserController::class, 'userSettingsUpdate'])->name("settings.index.update");
// | Ayarlar Sayfası--------------------------------------------------------------------------

// | İçerik Sayfaları-------------------------------------------------------------------------
Route::get('/Kitap/Ekle', function(){ return view('Content/book'); })->name("content.book");
Route::post('/Kitap/Ekle', [App\Http\Controllers\ContentController::class, 'addBook'])->name("content.book.add");
Route::get('/Film/Ekle', function(){ return view('Content/movie'); })->name("content.movie");
Route::post('/Film/Ekle', [App\Http\Controllers\ContentController::class, 'addMovie'])->name("content.movie.add");
Route::get('/Dizi/Ekle', function(){ return view('Content/serie'); })->name("content.serie");
Route::post('/Dizi/Ekle', [App\Http\Controllers\ContentController::class, 'addSerie'])->name("content.serie.add");
Route::get('/Yazar/Ekle', function(){ return view('Content/writer'); })->name("content.writer");
Route::post('/Yazar/Ekle', [App\Http\Controllers\ContentController::class, 'addWriter'])->name("content.writer.add");
Route::get('/Aktor/Ekle', function(){ return view('Content/actor'); })->name("content.actor");
Route::post('/Aktor/Ekle', [App\Http\Controllers\ContentController::class, 'addActor'])->name("content.actor.add");
Route::get('/Yonetmen/Ekle', function(){ return view('Content/director'); })->name("content.director");
Route::post('/Yonetmen/Ekle', [App\Http\Controllers\ContentController::class, 'addDirector'])->name("content.director.add");
Route::get('/Cevirmen/Ekle', function(){ return view('Content/translator'); })->name("content.translator");
Route::post('/Cevirmen/Ekle', [App\Http\Controllers\ContentController::class, 'addTranslator'])->name("content.translator.add");
// | İçerik Sayfaları-------------------------------------------------------------------------


// | Diğer Sayfalar---------------------------------------------------------------------------
Route::get("/About", function(){ return view("Others/About"); })->name("page.about");
Route::get("/Contact", function(){ return view("Others/Contact"); })->name("page.contact");
Route::get("/FAQ", function(){ return view("Others/FAQ"); })->name("page.faq");
Route::get("/PrivacyPolicy", function(){ return view("Others/PrivacyPolicy"); })->name("page.privacyPolicy");
// | Diğer Sayfalar---------------------------------------------------------------------------