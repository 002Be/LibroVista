<?php

namespace App\Http\Controllers\Contents;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Director;
use App\Models\User;
use App\Models\Serie;

class SerieController extends Controller
{
    //*
    public function addSeriePage(){
        $directors = Director::get();
        return view("contents.serie.add", compact("directors"));
    }

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
    public function indexSerie($id){
        $serie = Serie::where("id",$id)->first();

        $serieData = Serie::select('data')->where("id",$id)->first();
        $serieData = json_decode($serieData->data, true);

        if(isset(Auth::user()->username)){
            $userData = User::where('username', Auth::user()->username)->first();
            $userData = json_decode($userData->data, true);
            $favoriID = [];
            foreach($userData["favorite_series"] as $key){ array_unshift($favoriID, $key["id"]); }
            $takipID = [];
            foreach($userData["followed_series"] as $key){ array_unshift($takipID, $key["id"]); }
            $izlenecekID = [];
            foreach($userData["series_to_watched"] as $key){ array_unshift($izlenecekID, $key["id"]); }
            $izliyorumID = [];
            foreach($userData["series_watched"] as $key){ array_unshift($izliyorumID, $key["id"]); }
            $izledimID = [];
            foreach($userData["series_finished"] as $key){ array_unshift($izledimID, $key["id"]); }
            $biraktimID = [];
            foreach($userData["series_dropped"] as $key){ array_unshift($biraktimID, $key["id"]); }

            return view("contents.serie.single", compact("serie","favoriID","takipID","izlenecekID","izliyorumID","izledimID","biraktimID","serieData"));
        }else{
            return view("contents.serie.single", compact("serie","serieData"));
        }
    }

    //*
    public function deleteSerie(Request $request){
        
    }

    public function islemTakipEt($id,$name,$slug){
        $user = User::where('username', Auth::user()->username)->first();
        $userData = json_decode($user->data, true);
        $idler = [];
        foreach($userData["followed_series"] as $key){ array_unshift($idler, $key["id"]); }
        if(in_array($id, $idler)){
            $updatedFavoriteBooks = array_filter($userData['followed_series'], function ($serie) use ($id) {
                return $serie['id'] !== $id;
            });
            $userData['followed_series'] = $updatedFavoriteBooks;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("Takipten çıkartıldı","Başarılı");
        }else{
            $newFollowedBook = [
                "id" => $id,
                "name" => $name,
                "slug" => $slug
            ];
            $userData['followed_series'][] = $newFollowedBook;
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
        foreach($userData["favorite_series"] as $key){ array_unshift($idler, $key["id"]); }
        if(in_array($id, $idler)){
            $updatedFavoriteBooks = array_filter($userData['favorite_series'], function ($serie) use ($id) {
                return $serie['id'] !== $id;
            });
            $userData['favorite_series'] = $updatedFavoriteBooks;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("Favorilerden kaldırıldı","Başarılı");
        }else{
            $newFollowedBook = [ // Yeni takip edilen kitabın bilgilerini oluşturun
                "id" => $id,
                "name" => $name,
                "slug" => $slug
            ];
            $userData['favorite_series'][] = $newFollowedBook; // "favorite_series" içine yeni kitabı ekleyin
            $user->data = json_encode($userData); // JSON verisini güncelle
            $user->save(); // Kullanıcıyı kaydet
            toastr()->success("Favorilere eklendi","Başarılı");
        }
        return redirect()->back();
    }

    public function islemIzlenilecek($id,$name,$slug){ //series_to_watched
        $user = User::where('username', Auth::user()->username)->first();
        $userData = json_decode($user->data, true);
        $idler = [];
        foreach($userData["series_to_watched"] as $key){ array_unshift($idler, $key["id"]); }
        if(in_array($id, $idler)){
            $updatedFavoriteBooks = array_filter($userData['series_to_watched'], function ($serie) use ($id) {
                return $serie['id'] !== $id;
            });
            $userData['series_to_watched'] = $updatedFavoriteBooks;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("","Başarılı");
        }else{
            $durumlar= ["series_finished", "series_dropped", "series_watched"];
            foreach ($durumlar as $durum) {
                $idler = [];
                foreach($userData[$durum] as $key){ array_unshift($idler, $key["id"]); }
                if(in_array($id, $idler)){
                    $updatedFavoriteBooks = array_filter($userData[$durum], function ($serie) use ($id) {
                        return $serie['id'] !== $id;
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
            $userData['series_to_watched'][] = $newFollowedBook;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("","Başarılı");
        }
        return redirect()->back();
    }

    public function islemIzledim($id,$name,$slug){ //series_finished
        $user = User::where('username', Auth::user()->username)->first();
        $userData = json_decode($user->data, true);
        $idler = [];
        foreach($userData["series_finished"] as $key){ array_unshift($idler, $key["id"]); }
        if(in_array($id, $idler)){
            $updatedFavoriteBooks = array_filter($userData['series_finished'], function ($serie) use ($id) {
                return $serie['id'] !== $id;
            });
            $userData['series_finished'] = $updatedFavoriteBooks;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("","Başarılı");
        }else{
            $durumlar= ["series_to_watched", "series_dropped", "series_watched"];
            foreach ($durumlar as $durum) {
                $idler = [];
                foreach($userData[$durum] as $key){ array_unshift($idler, $key["id"]); }
                if(in_array($id, $idler)){
                    $updatedFavoriteBooks = array_filter($userData[$durum], function ($serie) use ($id) {
                        return $serie['id'] !== $id;
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
            $userData['series_finished'][] = $newFollowedBook;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("","Başarılı");
        }
        return redirect()->back();
    }

    public function islemBiraktim($id,$name,$slug){ //series_dropped
        $user = User::where('username', Auth::user()->username)->first();
        $userData = json_decode($user->data, true);
        $idler = [];
        foreach($userData["series_dropped"] as $key){ array_unshift($idler, $key["id"]); }
        if(in_array($id, $idler)){
            $updatedFavoriteBooks = array_filter($userData['series_dropped'], function ($serie) use ($id) {
                return $serie['id'] !== $id;
            });
            $userData['series_dropped'] = $updatedFavoriteBooks;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("","Başarılı");
        }else{
            $durumlar= ["series_to_watched", "series_finished", "series_watched"];
            foreach ($durumlar as $durum) {
                $idler = [];
                foreach($userData[$durum] as $key){ array_unshift($idler, $key["id"]); }
                if(in_array($id, $idler)){
                    $updatedFavoriteBooks = array_filter($userData[$durum], function ($serie) use ($id) {
                        return $serie['id'] !== $id;
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
            $userData['series_dropped'][] = $newFollowedBook;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("","Başarılı");
        }
        return redirect()->back();
    }

    public function islemIzlenilen($id,$name,$slug){ //series_watched
        $user = User::where('username', Auth::user()->username)->first();
        $userData = json_decode($user->data, true);
        $idler = [];
        foreach($userData["series_watched"] as $key){ array_unshift($idler, $key["id"]); }
        if(in_array($id, $idler)){
            $updatedFavoriteBooks = array_filter($userData['series_watched'], function ($serie) use ($id) {
                return $serie['id'] !== $id;
            });
            $userData['series_watched'] = $updatedFavoriteBooks;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("","Başarılı");
        }else{
            $durumlar= ["series_to_watched", "series_finished", "series_dropped"];
            foreach ($durumlar as $durum) {
                $idler = [];
                foreach($userData[$durum] as $key){ array_unshift($idler, $key["id"]); }
                if(in_array($id, $idler)){
                    $updatedFavoriteBooks = array_filter($userData[$durum], function ($serie) use ($id) {
                        return $serie['id'] !== $id;
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
            $userData['series_watched'][] = $newFollowedBook;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("","Başarılı");
        }
        return redirect()->back();
    }

    public function islemInceleme(Request $request){
        $serie = Serie::where('id', $request->id)->first();
        $serieData = json_decode($serie->data, true);
        $newReviews = [
            "serieId" => $request->id,
            "userId" => Auth::user()->id,
            "date" => date("Y-m-d H:i"),
            "reviews" => $request->reviews
        ];
        $serieData['reviews'][] = $newReviews;
        $serie->data = json_encode($serieData);
        $serie->save();

        toastr()->success("","Başarılı");
        return redirect()->back();
    }

    public function islemAlinti(Request $request){
        $serie = Serie::where('id', $request->id)->first();
        $serieData = json_decode($serie->data, true);
        $newReviews = [
            "serieId" => $request->id,
            "userId" => Auth::user()->id,
            "date" => date("Y-m-d H:i"),
            "quotes" => $request->quotes
        ];
        $serieData['quotes'][] = $newReviews;
        $serie->data = json_encode($serieData);
        $serie->save();

        toastr()->success("","Başarılı");
        return redirect()->back();
    }
}
