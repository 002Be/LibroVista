<?php

namespace App\Http\Controllers\Contents;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Serie;

class SerieController extends Controller
{
    //*
    public function addSerie(Request $request){
        $serie = new Serie;
        $serie->name = $request->name;
        $serie->slug = Str::slug($request->name,"-");;
        $serie->about = $request->about;
        $serie->category = $request->category;
        $serie->image = $request->image;

        $imageName = Str::slug($request->name,"-")."-".rand(10000,99999).'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads/series'), $imageName);
        $serie->image = 'uploads/series/'.$imageName;

        $serie->season = $request->season;
        $serie->releaseYear = $request->releaseYear;
        $serie->director = $request->director;
        $serie->addPerson = Auth::user()->username;
        $serie->save();
        toastr()->success("Kitab kaydı başarıyla gönderildi.","Başarılı");
        return redirect()->back();
    }

    //*
    public function indexSeries(){
        $series_1 = Serie::orderBy("likes","DESC")->take(10)->get(); //* En Beğenilen Kitaplar
        $series_2 = Serie::orderBy("releaseYear","DESC")->take(10)->get(); //* Yeni Çıkan Kitaplar
        $series_3 = Serie::orderBy("releaseYear","ASC")->take(10)->get(); //* En Çok Okunan Kitaplar
        $series_4 = Serie::orderBy("rating","DESC")->take(10)->get(); //* En İyi Kitaplar
        $series_5 = Serie::orderBy("created_at","DESC")->take(10)->get(); //* Tüm Kitaplar

        return view("contents.serie.list", compact("series_1","series_2","series_3","series_4","series_5"));
    }

    //*
    public function indexSerie($slug){
        $serie = Serie::where("slug",$slug)->first();

        return view("contents.serie.single", compact("serie"));
    }

    //*
    public function deleteSerie(Request $request){
        
    }
}
