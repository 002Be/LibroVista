<?php

namespace App\Http\Controllers\Contents;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Book;


class BookController extends Controller
{
    //* Kitap ekleme sayfası
    public function addBook(Request $request){
        $book = new Book;
        $book->name = $request->name;
        $book->slug = Str::slug($request->name,"-");;
        $book->about = $request->about;
        $book->category = $request->category;
        $book->image = $request->image;

        $imageName = Str::slug($request->name,"-").'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads/books'), $imageName);
        $book->image = 'uploads/books/'.$imageName;

        $book->page = $request->page;
        $book->releaseYear = $request->releaseYear;
        $book->writer = $request->writer;
        $book->publisher = $request->publisher;
        $book->addPerson = Auth::user()->username;
        $book->save();
        toastr()->success("Kitab kaydı başarıyla gönderildi.","Başarılı");
        return redirect()->back();
    }

    //* Kitaplar sayfası
    public function indexBooks(){
        $books_1 = Book::orderBy("likes","DESC")->get(); //* En Beğenilen Kitaplar
        $books_2 = Book::orderBy("releaseYear","DESC")->get(); //* Yeni Çıkan Kitaplar
        $books_3 = Book::orderBy("releaseYear","ASC")->get(); //* En Çok Okunan Kitaplar
        $books_4 = Book::orderBy("rating","DESC")->get(); //* En İyi Kitaplar
        $books_5 = Book::orderBy("created_at","DESC")->get(); //* Tüm Kitaplar

        return view("contents.book.list", compact("books_1","books_2","books_3","books_4","books_5"));
    }

    //* Kitap sayfası
    public function indexBook($slug){
        $book = Book::where("slug",$slug)->first();

        return view("contents.book.single", compact("book"));
    }

    //* Kitabı sil
    public function deleteBook(Request $request){
        
    }
}
