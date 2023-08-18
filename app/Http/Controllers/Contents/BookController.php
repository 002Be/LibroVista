<?php

namespace App\Http\Controllers\Contents;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Writer;
use App\Models\Book;
use App\Models\User;
use Carbon\Carbon;


class BookController extends Controller
{
    //* Kitap ekleme sayfası
    public function addBookPage(){
        $writers = Writer::get();
        return view("contents.book.add", compact("writers"));
    }

    //* Kitap ekleme sayfası
    public function addBook(Request $request){
        $book = new Book;
        $book->name = $request->name;
        $book->slug = Str::slug($request->name,"-");;
        $book->about = $request->about;
        $book->category = $request->category;
        $book->image = $request->image;

        $imageName = Str::slug($request->name,"-")."-".rand(10000,99999).'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads/books'), $imageName);
        $book->image = 'uploads/books/'.$imageName;

        $book->page = $request->page;
        $book->releaseYear = $request->releaseYear;
        $book->writer = $request->writer;
        $book->addPerson = Auth::user()->username;
        $book->save();
        toastr()->success("Kitap kaydı başarıyla gönderildi.","Başarılı");
        return redirect()->back();
    }

    //* Kitaplar sayfası
    public function indexBooks(){
        $books_1 = Book::orderBy("likes","DESC")->take(10)->get(); //* En Beğenilen Kitaplar
        $books_2 = Book::orderBy("releaseYear","DESC")->take(10)->get(); //* Yeni Çıkan Kitaplar
        $books_3 = Book::orderBy("releaseYear","ASC")->take(10)->get(); //* En Çok Okunan Kitaplar
        $books_4 = Book::orderBy("rating","DESC")->take(10)->get(); //* En İyi Kitaplar
        $books_5 = Book::orderBy("created_at","DESC")->take(10)->get(); //* Tüm Kitaplar

        return view("contents.book.list", compact("books_1","books_2","books_3","books_4","books_5"));
    }

    //* Kitap sayfası
    public function indexBook($id){
        $book = Book::where("id",$id)->first();

        $userData = User::where('username', Auth::user()->username)->first();
        $userData = json_decode($userData->data, true);

        $favoriID = [];
        foreach($userData["favorite_books"] as $key){ array_unshift($favoriID, $key["id"]); }
        $takipID = [];
        foreach($userData["followed_books"] as $key){ array_unshift($takipID, $key["id"]); }
        $okunacakID = [];
        foreach($userData["books_to_read"] as $key){ array_unshift($okunacakID, $key["id"]); }
        $okuyorumID = [];
        foreach($userData["books_read"] as $key){ array_unshift($okuyorumID, $key["id"]); }
        $okudumID = [];
        foreach($userData["books_finished"] as $key){ array_unshift($okudumID, $key["id"]); }
        $biraktimID = [];
        foreach($userData["books_dropped"] as $key){ array_unshift($biraktimID, $key["id"]); }

        $bookData = Book::select('data')->where("id",$id)->first();
        $bookData = json_decode($bookData->data, true);

        return view("contents.book.single", compact("book","favoriID","takipID","okunacakID","okuyorumID","okudumID","biraktimID","bookData"));
    }

    //* Kitabı sil
    public function deleteBook(Request $request){
        
    }

    public function islemTakipEt($id,$name,$slug){
        $user = User::where('username', Auth::user()->username)->first();
        $userData = json_decode($user->data, true);
        $idler = [];
        foreach($userData["followed_books"] as $key){ array_unshift($idler, $key["id"]); }
        if(in_array($id, $idler)){
            $updatedFavoriteBooks = array_filter($userData['followed_books'], function ($book) use ($id) {
                return $book['id'] !== $id;
            });
            $userData['followed_books'] = $updatedFavoriteBooks;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("Takipten çıkartıldı","Başarılı");
        }else{
            $newFollowedBook = [
                "id" => $id,
                "name" => $name,
                "slug" => $slug
            ];
            $userData['followed_books'][] = $newFollowedBook;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("Takip edildi","Başarılı");
        }
        return redirect()->back();
    }

    public function islemFavorilereEkle($id,$name,$slug){
        $user = User::where('username', Auth::user()->username)->first();
        $userData = json_decode($user->data, true);
        $idler = [];
        foreach($userData["favorite_books"] as $key){ array_unshift($idler, $key["id"]); }
        if(in_array($id, $idler)){
            $updatedFavoriteBooks = array_filter($userData['favorite_books'], function ($book) use ($id) {
                return $book['id'] !== $id;
            });
            $userData['favorite_books'] = $updatedFavoriteBooks;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("Favorilerden kaldırıldı","Başarılı");
        }else{
            $newFollowedBook = [ // Yeni takip edilen kitabın bilgilerini oluşturun
                "id" => $id,
                "name" => $name,
                "slug" => $slug
            ];
            $userData['favorite_books'][] = $newFollowedBook; // "favorite_books" içine yeni kitabı ekleyin
            $user->data = json_encode($userData); // JSON verisini güncelle
            $user->save(); // Kullanıcıyı kaydet
            toastr()->success("Favorilere eklendi","Başarılı");
        }
        return redirect()->back();
    }

    public function islemOkunacak($id,$name,$slug){ //books_to_read
        $user = User::where('username', Auth::user()->username)->first();
        $userData = json_decode($user->data, true);
        $idler = [];
        foreach($userData["books_to_read"] as $key){ array_unshift($idler, $key["id"]); }
        if(in_array($id, $idler)){
            $updatedFavoriteBooks = array_filter($userData['books_to_read'], function ($book) use ($id) {
                return $book['id'] !== $id;
            });
            $userData['books_to_read'] = $updatedFavoriteBooks;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("","Başarılı");
        }else{
            $durumlar= ["books_finished", "books_dropped", "books_read"];
            foreach ($durumlar as $durum) {
                $idler = [];
                foreach($userData[$durum] as $key){ array_unshift($idler, $key["id"]); }
                if(in_array($id, $idler)){
                    $updatedFavoriteBooks = array_filter($userData[$durum], function ($book) use ($id) {
                        return $book['id'] !== $id;
                    });
                    $userData[$durum] = $updatedFavoriteBooks;
                    $user->data = json_encode($userData);
                    $user->save();
                }
            }
            $newFollowedBook = [
                "id" => $id,
                "name" => $name,
                "slug" => $slug
            ];
            $userData['books_to_read'][] = $newFollowedBook;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("","Başarılı");
        }
        return redirect()->back();
    }

    public function islemOkudum($id,$name,$slug){ //books_finished
        $user = User::where('username', Auth::user()->username)->first();
        $userData = json_decode($user->data, true);
        $idler = [];
        foreach($userData["books_finished"] as $key){ array_unshift($idler, $key["id"]); }
        if(in_array($id, $idler)){
            $updatedFavoriteBooks = array_filter($userData['books_finished'], function ($book) use ($id) {
                return $book['id'] !== $id;
            });
            $userData['books_finished'] = $updatedFavoriteBooks;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("","Başarılı");
        }else{
            $durumlar= ["books_to_read", "books_dropped", "books_read"];
            foreach ($durumlar as $durum) {
                $idler = [];
                foreach($userData[$durum] as $key){ array_unshift($idler, $key["id"]); }
                if(in_array($id, $idler)){
                    $updatedFavoriteBooks = array_filter($userData[$durum], function ($book) use ($id) {
                        return $book['id'] !== $id;
                    });
                    $userData[$durum] = $updatedFavoriteBooks;
                    $user->data = json_encode($userData);
                    $user->save();
                }
            }
            $newFollowedBook = [
                "id" => $id,
                "name" => $name,
                "slug" => $slug
            ];
            $userData['books_finished'][] = $newFollowedBook;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("","Başarılı");
        }
        return redirect()->back();
    }

    public function islemBiraktim($id,$name,$slug){ //books_dropped
        $user = User::where('username', Auth::user()->username)->first();
        $userData = json_decode($user->data, true);
        $idler = [];
        foreach($userData["books_dropped"] as $key){ array_unshift($idler, $key["id"]); }
        if(in_array($id, $idler)){
            $updatedFavoriteBooks = array_filter($userData['books_dropped'], function ($book) use ($id) {
                return $book['id'] !== $id;
            });
            $userData['books_dropped'] = $updatedFavoriteBooks;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("","Başarılı");
        }else{
            $durumlar= ["books_to_read", "books_finished", "books_read"];
            foreach ($durumlar as $durum) {
                $idler = [];
                foreach($userData[$durum] as $key){ array_unshift($idler, $key["id"]); }
                if(in_array($id, $idler)){
                    $updatedFavoriteBooks = array_filter($userData[$durum], function ($book) use ($id) {
                        return $book['id'] !== $id;
                    });
                    $userData[$durum] = $updatedFavoriteBooks;
                    $user->data = json_encode($userData);
                    $user->save();
                }
            }
            $newFollowedBook = [
                "id" => $id,
                "name" => $name,
                "slug" => $slug
            ];
            $userData['books_dropped'][] = $newFollowedBook;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("","Başarılı");
        }
        return redirect()->back();
    }

    public function islemOkunan($id,$name,$slug){ //books_read
        $user = User::where('username', Auth::user()->username)->first();
        $userData = json_decode($user->data, true);
        $idler = [];
        foreach($userData["books_read"] as $key){ array_unshift($idler, $key["id"]); }
        if(in_array($id, $idler)){
            $updatedFavoriteBooks = array_filter($userData['books_read'], function ($book) use ($id) {
                return $book['id'] !== $id;
            });
            $userData['books_read'] = $updatedFavoriteBooks;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("","Başarılı");
        }else{
            $durumlar= ["books_to_read", "books_finished", "books_dropped"];
            foreach ($durumlar as $durum) {
                $idler = [];
                foreach($userData[$durum] as $key){ array_unshift($idler, $key["id"]); }
                if(in_array($id, $idler)){
                    $updatedFavoriteBooks = array_filter($userData[$durum], function ($book) use ($id) {
                        return $book['id'] !== $id;
                    });
                    $userData[$durum] = $updatedFavoriteBooks;
                    $user->data = json_encode($userData);
                    $user->save();
                }
            }
            $newFollowedBook = [
                "id" => $id,
                "name" => $name,
                "slug" => $slug
            ];
            $userData['books_read'][] = $newFollowedBook;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("","Başarılı");
        }
        return redirect()->back();
    }



    public function islemInceleme(Request $request){
        $book = Book::where('id', $request->id)->first();
        $bookData = json_decode($book->data, true);
        $newReviews = [
            "bookId" => $request->id,
            "userId" => Auth::user()->id,
            "date" => date("Y-m-d H:i"),
            "reviews" => $request->reviews
        ];
        $bookData['reviews'][] = $newReviews;
        $book->data = json_encode($bookData);
        $book->save();

        toastr()->success("","Başarılı");
        return redirect()->back();
    }

    public function islemAlinti(Request $request){
        $book = Book::where('id', $request->id)->first();
        $bookData = json_decode($book->data, true);
        $newReviews = [
            "bookId" => $request->id,
            "userId" => Auth::user()->id,
            "date" => date("Y-m-d H:i"),
            "quotes" => $request->quotes
        ];
        $bookData['quotes'][] = $newReviews;
        $book->data = json_encode($bookData);
        $book->save();

        toastr()->success("","Başarılı");
        return redirect()->back();
    }
}
