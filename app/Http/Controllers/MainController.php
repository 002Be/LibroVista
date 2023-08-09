<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Movie;
use App\Models\Serie;
use App\Models\Actor;
use App\Models\Writer;
use App\Models\Director;

class MainController extends Controller
{
    public function indexPage(){
        $contentsBook = Book::orderBy("created_at","DESC")->get();
        $contentsMovie = Movie::orderBy("created_at","DESC")->get();
        $contentsSerie = Serie::orderBy("created_at","DESC")->get();
        $contentsActor = Actor::orderBy("created_at","DESC")->get();
        $contentsWriter = Writer::orderBy("created_at","DESC")->where('id', '!=', 1)->get();
        $contentsDirector = Director::orderBy("created_at","DESC")->where('id', '!=', 1)->get();
        $discoverContents = [$contentsBook, $contentsMovie, $contentsSerie, $contentsActor, $contentsWriter, $contentsDirector];

        return view("HomePage", compact("discoverContents"));
    }
}
