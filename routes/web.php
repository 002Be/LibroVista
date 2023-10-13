<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\MainController::class, 'indexPage'])->name("HomePage");

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
Route::post("/Contact", [App\Http\Controllers\ContactController::class, 'contactCreate'])->name("contact.create");
Route::get("/Contact", function(){ return view("Others/Contact"); })->name("page.contact");
Route::get("/FAQ", function(){ return view("Others/FAQ"); })->name("page.faq");
Route::get("/PrivacyPolicy", function(){ return view("Others/PrivacyPolicy"); })->name("page.privacyPolicy");
// |Diğer Sayfalar---------------------------------------------------------------------------

// |İçerik Ekleme Sayfaları------------------------------------------------------------------
Route::get('/Ekle/Kitap', [App\Http\Controllers\Contents\BookController::class, 'addBookPage'])->name("content.book");
Route::post('/Ekle/Kitap', [App\Http\Controllers\Contents\BookController::class, 'addBook'])->name("content.book.add");

Route::get('/Ekle/Film', [App\Http\Controllers\Contents\MovieController::class, 'addMoviePage'])->name("content.movie");
Route::post('/Ekle/Film', [App\Http\Controllers\Contents\MovieController::class, 'addMovie'])->name("content.movie.add");

Route::get('/Ekle/Dizi', [App\Http\Controllers\Contents\SerieController::class, 'addSeriePage'])->name("content.serie");
Route::post('/Ekle/Dizi', [App\Http\Controllers\Contents\SerieController::class, 'addSerie'])->name("content.serie.add");

Route::get('/Ekle/Yazar', function(){ return view('Contents/Writer/add'); })->name("content.writer");
Route::post('/Ekle/Yazar', [App\Http\Controllers\Contents\WriterController::class, 'addWriter'])->name("content.writer.add");

Route::get('/Ekle/Oyuncu', function(){ return view('Contents/Actor/add'); })->name("content.actor");
Route::post('/Ekle/Oyuncu', [App\Http\Controllers\Contents\ActorController::class, 'addActor'])->name("content.actor.add");

Route::get('/Ekle/Yonetmen', function(){ return view('Contents/Director/add'); })->name("content.director");
Route::post('/Ekle/Yonetmen', [App\Http\Controllers\Contents\DirectorController::class, 'addDirector'])->name("content.director.add");
// |İçerik Ekleme Sayfaları------------------------------------------------------------------

// |Tekil İçerik Sayfaları------------------------------------------------------------------
Route::get('/Kitap/{id}', [App\Http\Controllers\Contents\BookController::class, 'indexBook'])->name("book.index");
Route::get('/Kitap/Islem/TakipEt/{id}-{name}-{slug}', [App\Http\Controllers\Contents\BookController::class, 'islemTakipEt'])->name("book.islem.TakipEt");
Route::get('/Kitap/Islem/FavorilereEkle/{id}-{name}-{slug}', [App\Http\Controllers\Contents\BookController::class, 'islemFavorilereEkle'])->name("book.islem.FavorilereEkle");
Route::get('/Kitap/Islem/Okunacak/{id}-{name}-{slug}', [App\Http\Controllers\Contents\BookController::class, 'islemOkunacak'])->name("book.islem.Okunacak");
Route::get('/Kitap/Islem/Okunan/{id}-{name}-{slug}', [App\Http\Controllers\Contents\BookController::class, 'islemOkunan'])->name("book.islem.Okunan");
Route::get('/Kitap/Islem/Okudum/{id}-{name}-{slug}', [App\Http\Controllers\Contents\BookController::class, 'islemOkudum'])->name("book.islem.Okudum");
Route::get('/Kitap/Islem/Biraktim/{id}-{name}-{slug}', [App\Http\Controllers\Contents\BookController::class, 'islemBiraktim'])->name("book.islem.Biraktim");
Route::post('/Kitap/Islem/Inceleme', [App\Http\Controllers\Contents\BookController::class, 'islemInceleme'])->name("book.islem.Inceleme");
Route::post('/Kitap/Islem/Alinti', [App\Http\Controllers\Contents\BookController::class, 'islemAlinti'])->name("book.islem.Alinti");

Route::get('/Film/{id}', [App\Http\Controllers\Contents\MovieController::class, 'indexMovie'])->name("movie.index");
Route::get('/Film/Islem/TakipEt/{id}-{name}-{slug}', [App\Http\Controllers\Contents\MovieController::class, 'islemTakipEt'])->name("movie.islem.TakipEt");
Route::get('/Film/Islem/FavorilereEkle/{id}-{name}-{slug}', [App\Http\Controllers\Contents\MovieController::class, 'islemFavorilereEkle'])->name("movie.islem.FavorilereEkle");
Route::get('/Film/Islem/Izlenilecek/{id}-{name}-{slug}', [App\Http\Controllers\Contents\MovieController::class, 'islemIzlenilecek'])->name("movie.islem.Izlenilecek");
Route::get('/Film/Islem/Izledim/{id}-{name}-{slug}', [App\Http\Controllers\Contents\MovieController::class, 'islemIzledim'])->name("movie.islem.Izledim");
Route::get('/Film/Islem/Biraktim/{id}-{name}-{slug}', [App\Http\Controllers\Contents\MovieController::class, 'islemBiraktim'])->name("movie.islem.Biraktim");
Route::post('/Film/Islem/Inceleme', [App\Http\Controllers\Contents\MovieController::class, 'islemInceleme'])->name("movie.islem.Inceleme");
Route::post('/Film/Islem/Alinti', [App\Http\Controllers\Contents\MovieController::class, 'islemAlinti'])->name("movie.islem.Alinti");
Route::post('/Film/Islem/Oyuncu', [App\Http\Controllers\Contents\MovieController::class, 'islemOyuncu'])->name("movie.islem.Oyuncu");

Route::get('/Dizi/{id}', [App\Http\Controllers\Contents\SerieController::class, 'indexSerie'])->name("serie.index");
Route::get('/Dizi/Islem/TakipEt/{id}-{name}-{slug}', [App\Http\Controllers\Contents\SerieController::class, 'islemTakipEt'])->name("serie.islem.TakipEt");
Route::get('/Dizi/Islem/FavorilereEkle/{id}-{name}-{slug}', [App\Http\Controllers\Contents\SerieController::class, 'islemFavorilereEkle'])->name("serie.islem.FavorilereEkle");
Route::get('/Dizi/Islem/Izlenilecek/{id}-{name}-{slug}', [App\Http\Controllers\Contents\SerieController::class, 'islemIzlenilecek'])->name("serie.islem.Izlenilecek");
Route::get('/Dizi/Islem/Izlenilen/{id}-{name}-{slug}', [App\Http\Controllers\Contents\SerieController::class, 'islemIzlenilen'])->name("serie.islem.Izlenilen");
Route::get('/Dizi/Islem/Izledim/{id}-{name}-{slug}', [App\Http\Controllers\Contents\SerieController::class, 'islemIzledim'])->name("serie.islem.Izledim");
Route::get('/Dizi/Islem/Biraktim/{id}-{name}-{slug}', [App\Http\Controllers\Contents\SerieController::class, 'islemBiraktim'])->name("serie.islem.Biraktim");
Route::post('/Dizi/Islem/Inceleme', [App\Http\Controllers\Contents\SerieController::class, 'islemInceleme'])->name("serie.islem.Inceleme");
Route::post('/Dizi/Islem/Alinti', [App\Http\Controllers\Contents\SerieController::class, 'islemAlinti'])->name("serie.islem.Alinti");
Route::post('/Dizi/Islem/Oyuncu', [App\Http\Controllers\Contents\SerieController::class, 'islemOyuncu'])->name("serie.islem.Oyuncu");

Route::get('/Yazar/{id}', [App\Http\Controllers\Contents\WriterController::class, 'indexWriter'])->name("writer.index");
Route::get('/Yazar/Islem/TakipEt/{id}-{name}-{slug}', [App\Http\Controllers\Contents\WriterController::class, 'islemTakipEt'])->name("writer.islem.TakipEt");
Route::get('/Yazar/Islem/FavorilereEkle/{id}-{name}-{slug}', [App\Http\Controllers\Contents\WriterController::class, 'islemFavorilereEkle'])->name("writer.islem.FavorilereEkle");
Route::post('/Yazar/Islem/Inceleme', [App\Http\Controllers\Contents\WriterController::class, 'islemInceleme'])->name("writer.islem.Inceleme");
Route::post('/Yazar/Islem/Alinti', [App\Http\Controllers\Contents\WriterController::class, 'islemAlinti'])->name("writer.islem.Alinti");

Route::get('/Oyuncu/{id}', [App\Http\Controllers\Contents\ActorController::class, 'indexActor'])->name("actor.index");
Route::get('/Oyuncu/Islem/TakipEt/{id}-{name}-{slug}', [App\Http\Controllers\Contents\ActorController::class, 'islemTakipEt'])->name("actor.islem.TakipEt");
Route::get('/Oyuncu/Islem/FavorilereEkle/{id}-{name}-{slug}', [App\Http\Controllers\Contents\ActorController::class, 'islemFavorilereEkle'])->name("actor.islem.FavorilereEkle");
Route::post('/Oyuncu/Islem/Inceleme', [App\Http\Controllers\Contents\ActorController::class, 'islemInceleme'])->name("actor.islem.Inceleme");
Route::post('/Oyuncu/Islem/Alinti', [App\Http\Controllers\Contents\ActorController::class, 'islemAlinti'])->name("actor.islem.Alinti");

Route::get('/Yonetmen/{id}', [App\Http\Controllers\Contents\DirectorController::class, 'indexDirector'])->name("director.index");
Route::get('/Yonetmen/Islem/TakipEt/{id}-{name}-{slug}', [App\Http\Controllers\Contents\DirectorController::class, 'islemTakipEt'])->name("director.islem.TakipEt");
Route::get('/Yonetmen/Islem/FavorilereEkle/{id}-{name}-{slug}', [App\Http\Controllers\Contents\DirectorController::class, 'islemFavorilereEkle'])->name("director.islem.FavorilereEkle");
Route::post('/Yonetmen/Islem/Inceleme', [App\Http\Controllers\Contents\DirectorController::class, 'islemInceleme'])->name("director.islem.Inceleme");
Route::post('/Yonetmen/Islem/Alinti', [App\Http\Controllers\Contents\DirectorController::class, 'islemAlinti'])->name("director.islem.Alinti");
// |Tekil İçerik Sayfaları------------------------------------------------------------------

// |Çoğul İçerik Sayfaları------------------------------------------------------------------
Route::get('/Kitaplar', [App\Http\Controllers\Contents\BookController::class, 'indexBooks'])->name("books.index");
Route::get('/Filmler', [App\Http\Controllers\Contents\MovieController::class, 'indexMovies'])->name("movies.index");
Route::get('/Diziler', [App\Http\Controllers\Contents\SerieController::class, 'indexSeries'])->name("series.index");
Route::get('/Yazarlar', [App\Http\Controllers\Contents\WriterController::class, 'indexWriters'])->name("writers.index");
Route::get('/Oyuncular', [App\Http\Controllers\Contents\ActorController::class, 'indexActors'])->name("actors.index");
Route::get('/Yonetmen', [App\Http\Controllers\Contents\DirectorController::class, 'indexDirectors'])->name("directors.index");
// |Çoğul İçerik Sayfaları------------------------------------------------------------------