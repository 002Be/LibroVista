<?php

namespace App\Http\Controllers\Contents;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Director;
use App\Models\Movie;
use App\Models\User;

class MovieController extends Controller
{
    //*
    public function addMoviePage(){
        $directors = Director::get();
        return view("contents.movie.add", compact("directors"));
    }

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
    public function indexMovie($id){
        $movie = Movie::where("id",$id)->first();

        $userData = User::where('username', Auth::user()->username)->first();
        $userData = json_decode($userData->data, true);
        $favoriID = [];
        foreach($userData["favorite_movies"] as $key){ array_unshift($favoriID, $key["id"]); }
        $takipID = [];
        foreach($userData["followed_movies"] as $key){ array_unshift($takipID, $key["id"]); }
        $izlenecekID = [];
        foreach($userData["movies_to_watched"] as $key){ array_unshift($izlenecekID, $key["id"]); }
        $izledimID = [];
        foreach($userData["movies_finished"] as $key){ array_unshift($izledimID, $key["id"]); }
        $biraktimID = [];
        foreach($userData["movies_dropped"] as $key){ array_unshift($biraktimID, $key["id"]); }

        return view("contents.movie.single", compact("movie","favoriID","takipID","izlenecekID","izledimID","biraktimID"));
    }

    //*
    public function deleteMovie(Request $request){
        
    }

    public function islemTakipEt($id,$name,$slug){
        $user = User::where('username', Auth::user()->username)->first();
        $userData = json_decode($user->data, true);
        $idler = [];
        foreach($userData["followed_movies"] as $key){ array_unshift($idler, $key["id"]); }
        if(in_array($id, $idler)){
            $updatedFavoriteBooks = array_filter($userData['followed_movies'], function ($movie) use ($id) {
                return $movie['id'] !== $id;
            });
            $userData['followed_movies'] = $updatedFavoriteBooks;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("Takipten çıkartıldı","Başarılı");
        }else{
            $newFollowedBook = [
                "id" => $id,
                "name" => $name,
                "slug" => $slug
            ];
            $userData['followed_movies'][] = $newFollowedBook;
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
        foreach($userData["favorite_movies"] as $key){ array_unshift($idler, $key["id"]); }
        if(in_array($id, $idler)){
            $updatedFavoriteBooks = array_filter($userData['favorite_movies'], function ($movie) use ($id) {
                return $movie['id'] !== $id;
            });
            $userData['favorite_movies'] = $updatedFavoriteBooks;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("Favorilerden kaldırıldı","Başarılı");
        }else{
            $newFollowedBook = [ // Yeni takip edilen kitabın bilgilerini oluşturun
                "id" => $id,
                "name" => $name,
                "slug" => $slug
            ];
            $userData['favorite_movies'][] = $newFollowedBook; // "favorite_movies" içine yeni kitabı ekleyin
            $user->data = json_encode($userData); // JSON verisini güncelle
            $user->save(); // Kullanıcıyı kaydet
            toastr()->success("Favorilere eklendi","Başarılı");
        }
        return redirect()->back();
    }

    public function islemIzlenilecek($id,$name,$slug){ //movies_to_watched
        $user = User::where('username', Auth::user()->username)->first();
        $userData = json_decode($user->data, true);
        $idler = [];
        foreach($userData["movies_to_watched"] as $key){ array_unshift($idler, $key["id"]); }
        if(in_array($id, $idler)){
            $updatedFavoriteBooks = array_filter($userData['movies_to_watched'], function ($movie) use ($id) {
                return $movie['id'] !== $id;
            });
            $userData['movies_to_watched'] = $updatedFavoriteBooks;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("","Başarılı");
        }else{
            $durumlar= ["movies_finished", "movies_dropped", "movies_watched"];
            foreach ($durumlar as $durum) {
                $idler = [];
                foreach($userData[$durum] as $key){ array_unshift($idler, $key["id"]); }
                if(in_array($id, $idler)){
                    $updatedFavoriteBooks = array_filter($userData[$durum], function ($movie) use ($id) {
                        return $movie['id'] !== $id;
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
            $userData['movies_to_watched'][] = $newFollowedBook;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("","Başarılı");
        }
        return redirect()->back();
    }

    public function islemIzledim($id,$name,$slug){ //movies_finished
        $user = User::where('username', Auth::user()->username)->first();
        $userData = json_decode($user->data, true);
        $idler = [];
        foreach($userData["movies_finished"] as $key){ array_unshift($idler, $key["id"]); }
        if(in_array($id, $idler)){
            $updatedFavoriteBooks = array_filter($userData['movies_finished'], function ($movie) use ($id) {
                return $movie['id'] !== $id;
            });
            $userData['movies_finished'] = $updatedFavoriteBooks;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("","Başarılı");
        }else{
            $durumlar= ["movies_to_watched", "movies_dropped", "movies_watched"];
            foreach ($durumlar as $durum) {
                $idler = [];
                foreach($userData[$durum] as $key){ array_unshift($idler, $key["id"]); }
                if(in_array($id, $idler)){
                    $updatedFavoriteBooks = array_filter($userData[$durum], function ($movie) use ($id) {
                        return $movie['id'] !== $id;
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
            $userData['movies_finished'][] = $newFollowedBook;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("","Başarılı");
        }
        return redirect()->back();
    }

    public function islemBiraktim($id,$name,$slug){ //movies_dropped
        $user = User::where('username', Auth::user()->username)->first();
        $userData = json_decode($user->data, true);
        $idler = [];
        foreach($userData["movies_dropped"] as $key){ array_unshift($idler, $key["id"]); }
        if(in_array($id, $idler)){
            $updatedFavoriteBooks = array_filter($userData['movies_dropped'], function ($movie) use ($id) {
                return $movie['id'] !== $id;
            });
            $userData['movies_dropped'] = $updatedFavoriteBooks;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("","Başarılı");
        }else{
            $durumlar= ["movies_to_watched", "movies_finished", "movies_watched"];
            foreach ($durumlar as $durum) {
                $idler = [];
                foreach($userData[$durum] as $key){ array_unshift($idler, $key["id"]); }
                if(in_array($id, $idler)){
                    $updatedFavoriteBooks = array_filter($userData[$durum], function ($movie) use ($id) {
                        return $movie['id'] !== $id;
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
            $userData['movies_dropped'][] = $newFollowedBook;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("","Başarılı");
        }
        return redirect()->back();
    }
}
