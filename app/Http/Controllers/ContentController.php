<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Book;

class ContentController extends Controller
{
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

    public function indexBook(){
        $books_1 = Book::orderBy("likes","DESC")->get(); //* En Beğenilen Kitaplar
        $books_2 = Book::orderBy("releaseYear","DESC")->get(); //* Yeni Çıkan Kitaplar
        $books_3 = Book::orderBy("releaseYear","ASC")->get(); //* En Çok Okunan Kitaplar
        $books_4 = Book::orderBy("rating","DESC")->get(); //* En İyi Kitaplar
        $books_5 = Book::orderBy("created_at","DESC")->get(); //* Tüm Kitaplar

        return view("Contents.Books", compact("books_1","books_2","books_3","books_4","books_5"));
    }

    public function updateBook(Request $request){
        
    }
}
