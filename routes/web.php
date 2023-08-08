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

Route::get('/Ekle/Film', function(){ return view('Contents/Movie/add'); })->name("content.movie");
Route::post('/Ekle/Film', [App\Http\Controllers\Contents\MovieController::class, 'addMovie'])->name("content.movie.add");

Route::get('/Ekle/Dizi', function(){ return view('Contents/Serie/add'); })->name("content.serie");
Route::post('/Ekle/Dizi', [App\Http\Controllers\Contents\SerieController::class, 'addSerie'])->name("content.serie.add");

Route::get('/Ekle/Yazar', function(){ return view('Contents/Writer/add'); })->name("content.writer");
Route::post('/Ekle/Yazar', [App\Http\Controllers\Contents\WriterController::class, 'addWriter'])->name("content.writer.add");

Route::get('/Ekle/Cevirmen', function(){ return view('Contents/Actor/add'); })->name("content.actor");
Route::post('/Ekle/Cevirmen', [App\Http\Controllers\Contents\ActorController::class, 'addActor'])->name("content.actor.add");

Route::get('/Ekle/Yonetmen', function(){ return view('Contents/Director/add'); })->name("content.director");
Route::post('/Ekle/Yonetmen', [App\Http\Controllers\Contents\DirectorController::class, 'addDirector'])->name("content.director.add");
// |İçerik Ekleme Sayfaları------------------------------------------------------------------

// |Tekil İçerik Sayfaları------------------------------------------------------------------
Route::get('/Kitap/{slug}', [App\Http\Controllers\Contents\BookController::class, 'indexBook'])->name("book.index");
Route::get('/Film/{slug}', [App\Http\Controllers\Contents\MovieController::class, 'indexMovie'])->name("movie.index");
Route::get('/Dizi/{slug}', [App\Http\Controllers\Contents\SerieController::class, 'indexSerie'])->name("serie.index");
Route::get('/Yazar/{slug}', [App\Http\Controllers\Contents\WriterController::class, 'indexWriter'])->name("writer.index");
Route::get('/Cevirmen/{slug}', [App\Http\Controllers\Contents\ActorController::class, 'indexActor'])->name("actor.index");
Route::get('/Yonetmen/{slug}', [App\Http\Controllers\Contents\DirectorController::class, 'indexDirector'])->name("director.index");
// |Tekil İçerik Sayfaları------------------------------------------------------------------

// |Çoğul İçerik Sayfaları------------------------------------------------------------------
Route::get('/Kitaplar', [App\Http\Controllers\Contents\BookController::class, 'indexBooks'])->name("books.index");
Route::get('/Filmler', [App\Http\Controllers\Contents\MovieController::class, 'indexMovies'])->name("movies.index");
Route::get('/Diziler', [App\Http\Controllers\Contents\SerieController::class, 'indexSeries'])->name("series.index");
Route::get('/Yazarlar', [App\Http\Controllers\Contents\WriterController::class, 'indexWriters'])->name("writers.index");
Route::get('/Oyuncular', [App\Http\Controllers\Contents\ActorController::class, 'indexActors'])->name("actors.index");
Route::get('/Yonetmen', [App\Http\Controllers\Contents\DirectorController::class, 'indexDirectors'])->name("directors.index");
// |Çoğul İçerik Sayfaları------------------------------------------------------------------