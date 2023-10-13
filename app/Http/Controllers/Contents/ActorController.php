<?php

namespace App\Http\Controllers\Contents;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Actor;
use App\Models\User;
use Carbon\Carbon;

class ActorController extends Controller
{
    //* 
    public function addActor(Request $request){
        $actor = new Actor;
        $actor->name = $request->name;
        $actor->slug = Str::slug($request->name,"-");;
        $actor->about = $request->about;
        $actor->gender = $request->gender;

        $imageName = Str::slug($request->name,"-")."-".rand(10000,99999).".".$request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads/actor'), $imageName);
        $actor->image = 'uploads/actor/'.$imageName;

        $actor->birthplace = $request->birthplace;
        $actor->date = $request->date;
        $actor->addPerson = Auth::user()->username;
        $actor->save();
        toastr()->success("Yazar kaydı başarıyla gönderildi.","Başarılı");
        return redirect()->back();
    }

    //* 
    public function indexActors(){
        $actors_1 = Actor::orderBy("likes","DESC")->get(); //* En Beğenilen Yazarlar
        $actors_2 = Actor::orderBy("likes","ASC")->get(); //* En Çok Okunan Yazarlar
        $actors_3 = Actor::orderBy("rating","DESC")->get(); //* En İyi Yazarlar
        $actors_4 = Actor::orderBy("created_at","DESC")->get(); //* Tüm Yazarlar

        return view("contents.actor.list", compact("actors_1","actors_2","actors_3","actors_4"));
    }

    //* 
    public function indexActor($id){
        $actor = Actor::where("id",$id)->first();

        $actorData = Actor::select('data')->where("id",$id)->first();
        $actorData = json_decode($actorData->data, true);

        $actorDate = $actor->date;
        $birthDate = Carbon::createFromFormat('Y-m-d', $actorDate);
        $currentDate = Carbon::now();
        $ageActor = $currentDate->diffInYears($birthDate);

        if(isset(Auth::user()->username)){
            $userData = User::where('username', Auth::user()->username)->first();
            $userData = json_decode($userData->data, true);
            $favoriID = [];
            $takipID = [];
            foreach($userData["favorite_actors"] as $key){ array_unshift($favoriID, $key["id"]); }
            foreach($userData["followed_actors"] as $key){ array_unshift($takipID, $key["id"]); }

            return view("contents.actor.single", compact("actor","ageActor","favoriID","takipID","actorData"));
        }else{
            return view("contents.actor.single", compact("actor","ageActor","actorData"));
        }
    }

    //* 
    public function deleteActor(Request $request){
        
    }

    public function islemTakipEt($id,$name,$slug){
        $user = User::where('username', Auth::user()->username)->first();
        $userData = json_decode($user->data, true);
        $idler = [];
        foreach($userData["followed_actors"] as $key){ array_unshift($idler, $key["id"]); }
        if(in_array($id, $idler)){
            $updatedFavoriteBooks = array_filter($userData['followed_actors'], function ($book) use ($id) {
                return $book['id'] !== $id;
            });
            $userData['followed_actors'] = $updatedFavoriteBooks;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("Takipten çıkartıldı","Başarılı");
        }else{
            $newFollowedBook = [
                "id" => $id,
                "name" => $name,
                "slug" => $slug
            ];
            $userData['followed_actors'][] = $newFollowedBook;
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
        foreach($userData["favorite_actors"] as $key){ array_unshift($idler, $key["id"]); }
        if(in_array($id, $idler)){
            $updatedFavoriteBooks = array_filter($userData['favorite_actors'], function ($book) use ($id) {
                return $book['id'] !== $id;
            });
            $userData['favorite_actors'] = $updatedFavoriteBooks;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("Favorilerden kaldırıldı","Başarılı");
        }else{
            $newFollowedBook = [ // Yeni takip edilen kitabın bilgilerini oluşturun
                "id" => $id,
                "name" => $name,
                "slug" => $slug
            ];
            $userData['favorite_actors'][] = $newFollowedBook; // "favorite_actors" içine yeni kitabı ekleyin
            $user->data = json_encode($userData); // JSON verisini güncelle
            $user->save(); // Kullanıcıyı kaydet
            toastr()->success("Favorilere eklendi","Başarılı");
        }
        return redirect()->back();
    }

    public function islemInceleme(Request $request){
        $actor = Actor::where('id', $request->id)->first();
        $actorData = json_decode($actor->data, true);
        $newReviews = [
            "actorId" => $request->id,
            "userId" => Auth::user()->id,
            "date" => date("Y-m-d H:i"),
            "reviews" => $request->reviews
        ];
        $actorData['reviews'][] = $newReviews;
        $actor->data = json_encode($actorData);
        $actor->save();

        toastr()->success("","Başarılı");
        return redirect()->back();
    }

    public function islemAlinti(Request $request){
        $actor = Actor::where('id', $request->id)->first();
        $actorData = json_decode($actor->data, true);
        $newReviews = [
            "actorId" => $request->id,
            "userId" => Auth::user()->id,
            "date" => date("Y-m-d H:i"),
            "quotes" => $request->quotes
        ];
        $actorData['quotes'][] = $newReviews;
        $actor->data = json_encode($actorData);
        $actor->save();

        toastr()->success("","Başarılı");
        return redirect()->back();
    }
}
