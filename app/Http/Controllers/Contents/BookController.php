<?php

namespace App\Http\Controllers\Contents;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Writer;
use App\Models\Book;
use App\Models\User;


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

        return view("contents.book.single", compact("book"));
    }

    //* Kitabı sil
    public function deleteBook(Request $request){
        
    }

    public function islemTakipEt($id,$name,$slug){
        $user = User::where('username', Auth::user()->username)->first();
        $userData = json_decode($user->data, true);
        $newFollowedBook = [ // Yeni takip edilen kitabın bilgilerini oluşturun
            "id" => $id,
            "name" => $name,
            "slug" => $slug
        ];
        $userData['followed_books'][] = $newFollowedBook; // "followed_books" içine yeni kitabı ekleyin
        $user->data = json_encode($userData); // JSON verisini güncelle
        $user->save(); // Kullanıcıyı kaydet
        return redirect()->back();
    }

    public function islemFavorilereEkle($id,$name,$slug){
        $user = User::where('username', Auth::user()->username)->first();
        $userData = json_decode($user->data, true);
        $newFollowedBook = [ // Yeni takip edilen kitabın bilgilerini oluşturun
            "id" => $id,
            "name" => $name,
            "slug" => $slug
        ];
        $userData['favorite_books'][] = $newFollowedBook; // "favorite_books" içine yeni kitabı ekleyin
        $user->data = json_encode($userData); // JSON verisini güncelle
        $user->save(); // Kullanıcıyı kaydet
        return redirect()->back();
    }

    public function islemOkunacak($id,$name,$slug){
        $user = User::where('username', Auth::user()->username)->first();
        $userData = json_decode($user->data, true);
        $newFollowedBook = [ // Yeni takip edilen kitabın bilgilerini oluşturun
            "id" => $id,
            "name" => $name,
            "slug" => $slug
        ];
        $userData['books_to_read'][] = $newFollowedBook; // "followed_books" içine yeni kitabı ekleyin
        $user->data = json_encode($userData); // JSON verisini güncelle
        $user->save(); // Kullanıcıyı kaydet
        return redirect()->back();
    }

    public function islemOkudum($id,$name,$slug){
        $user = User::where('username', Auth::user()->username)->first();
        $userData = json_decode($user->data, true);
        $newFollowedBook = [ // Yeni takip edilen kitabın bilgilerini oluşturun
            "id" => $id,
            "name" => $name,
            "slug" => $slug
        ];
        $userData['books_finished'][] = $newFollowedBook; // "followed_books" içine yeni kitabı ekleyin
        $user->data = json_encode($userData); // JSON verisini güncelle
        $user->save(); // Kullanıcıyı kaydet
        return redirect()->back();
    }

    public function islemBiraktim($id,$name,$slug){
        $user = User::where('username', Auth::user()->username)->first();
        $userData = json_decode($user->data, true);
        $newFollowedBook = [ // Yeni takip edilen kitabın bilgilerini oluşturun
            "id" => $id,
            "name" => $name,
            "slug" => $slug
        ];
        $userData['books_dropped'][] = $newFollowedBook; // "followed_books" içine yeni kitabı ekleyin
        $user->data = json_encode($userData); // JSON verisini güncelle
        $user->save(); // Kullanıcıyı kaydet
        return redirect()->back();
    }

    public function islemOkunan($id,$name,$slug){
        $user = User::where('username', Auth::user()->username)->first();
        $userData = json_decode($user->data, true);
        $newFollowedBook = [ // Yeni takip edilen kitabın bilgilerini oluşturun
            "id" => $id,
            "name" => $name,
            "slug" => $slug
        ];
        $userData['books_read'][] = $newFollowedBook; // "followed_books" içine yeni kitabı ekleyin
        $user->data = json_encode($userData); // JSON verisini güncelle
        $user->save(); // Kullanıcıyı kaydet
        return redirect()->back();
    }
}
