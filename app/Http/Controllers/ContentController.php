<?php

namespace App\Http\Controllers;

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
        $book->save();
        toastr()->success("Kitab kaydı başarıyla gönderildi.","Başarılı");
        return redirect()->back();
    }

    public function updateBook(Request $request){
        
    }
}
