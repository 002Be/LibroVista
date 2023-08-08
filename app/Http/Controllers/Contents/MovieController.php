<?php

namespace App\Http\Controllers\Contents;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Movie;

class MovieController extends Controller
{
    //*
    public function addMovie(Request $request){
        $movie = new Movie;
        $movie->name = $request->name;
        $movie->slug = Str::slug($request->name,"-");;
        $movie->about = $request->about;
        $movie->category = $request->category;
        $movie->image = $request->image;

        $imageName = Str::slug($request->name,"-")."-".rand(10000,99999).'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads/movies'), $imageName);
        $movie->image = 'uploads/movies/'.$imageName;

        $movie->duration = $request->duration;
        $movie->releaseYear = $request->releaseYear;
        $movie->director = $request->director;
        $movie->addPerson = Auth::user()->username;
        $movie->save();
        toastr()->success("Film kaydı başarıyla gönderildi.","Başarılı");
        return redirect()->back();
    }

    //*
    public function indexMovies(){
        $movies_1 = Movie::orderBy("likes","DESC")->take(10)->get(); //* En Beğenilen Kitaplar
        $movies_2 = Movie::orderBy("releaseYear","DESC")->take(10)->get(); //* Yeni Çıkan Kitaplar
        $movies_3 = Movie::orderBy("releaseYear","ASC")->take(10)->get(); //* En Çok Okunan Kitaplar
        $movies_4 = Movie::orderBy("rating","DESC")->take(10)->get(); //* En İyi Kitaplar
        $movies_5 = Movie::orderBy("created_at","DESC")->take(10)->get(); //* Tüm Kitaplar

        return view("contents.movie.list", compact("movies_1","movies_2","movies_3","movies_4","movies_5"));
    }

    //*
    public function indexMovie($slug){
        $movie = Movie::where("slug",$slug)->first();

        return view("contents.movie.single", compact("movie"));
    }

    //*
    public function deleteMovie(Request $request){
        
    }
}
