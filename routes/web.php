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
Route::get('/Kitaplar', function(){ return view('Books/index'); })->name("books.index");
// | Kitap İşlemleri--------------------------------------------------------------------------

// | Ayarlar Sayfası--------------------------------------------------------------------------
Route::get('/Ayarlar', [App\Http\Controllers\UserController::class, 'userSettings'])->name("settings.index");
Route::post('/Ayarlar', [App\Http\Controllers\UserController::class, 'userSettingsUpdate'])->name("settings.index.update");
// | Ayarlar Sayfası--------------------------------------------------------------------------

// | İçerik Sayfaları-------------------------------------------------------------------------
Route::get('/Kitap/Ekle', function(){ return view('Contents/book'); })->name("contents.book");
Route::post('/Kitap/Ekle', [App\Http\Controllers\ContentController::class, 'bookAdd'])->name("contents.book.add");
Route::get('/Film/Ekle', function(){ return view('Contents/movie'); })->name("contents.movie");
Route::post('/Film/Ekle', [App\Http\Controllers\ContentController::class, 'movieAdd'])->name("contents.movie.add");
Route::get('/Dizi/Ekle', function(){ return view('Contents/serie'); })->name("contents.serie");
Route::post('/Dizi/Ekle', [App\Http\Controllers\ContentController::class, 'serieAdd'])->name("contents.serie.add");
Route::get('/Yazar/Ekle', function(){ return view('Contents/writer'); })->name("contents.writer");
Route::post('/Yazar/Ekle', [App\Http\Controllers\ContentController::class, 'writerAdd'])->name("contents.writer.add");
Route::get('/Aktor/Ekle', function(){ return view('Contents/actor'); })->name("contents.actor");
Route::post('/Aktor/Ekle', [App\Http\Controllers\ContentController::class, 'actorAdd'])->name("contents.actor.add");
Route::get('/Yonetmen/Ekle', function(){ return view('Contents/director'); })->name("contents.director");
Route::post('/Yonetmen/Ekle', [App\Http\Controllers\ContentController::class, 'directorAdd'])->name("contents.director.add");
// | İçerik Sayfaları-------------------------------------------------------------------------


// | Diğer Sayfalar---------------------------------------------------------------------------
Route::get("/About", function(){ return view("Others/About"); })->name("page.about");
Route::get("/Contact", function(){ return view("Others/Contact"); })->name("page.contact");
Route::get("/FAQ", function(){ return view("Others/FAQ"); })->name("page.faq");
Route::get("/PrivacyPolicy", function(){ return view("Others/PrivacyPolicy"); })->name("page.privacyPolicy");
// | Diğer Sayfalar---------------------------------------------------------------------------