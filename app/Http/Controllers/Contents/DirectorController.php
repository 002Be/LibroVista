<?php

namespace App\Http\Controllers\Contents;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Director;
use App\Models\User;
use Carbon\Carbon;

class DirectorController extends Controller
{
    //* 
    public function addDirector(Request $request){
        $director = new Director;
        $director->name = $request->name;
        $director->slug = Str::slug($request->name,"-");;
        $director->about = $request->about;
        $director->gender = $request->gender;

        $imageName = Str::slug($request->name,"-")."-".rand(10000,99999).".".$request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads/director'), $imageName);
        $director->image = 'uploads/director/'.$imageName;

        $director->birthplace = $request->birthplace;
        $director->date = $request->date;
        $director->addPerson = Auth::user()->username;
        $director->save();
        toastr()->success("Yönetmen kaydı başarıyla gönderildi.","Başarılı");
        return redirect()->back();
    }

    //* 
    public function indexDirectors(){
        $directors_1 = Director::orderBy("likes","DESC")->take(10)->where('id', '!=', 1)->get(); //* En Beğenilen Yazarlar
        $directors_2 = Director::orderBy("likes","ASC")->take(10)->where('id', '!=', 1)->get(); //* En Çok Okunan Yazarlar
        $directors_3 = Director::orderBy("rating","DESC")->take(10)->where('id', '!=', 1)->get(); //* En İyi Yazarlar
        $directors_4 = Director::orderBy("created_at","DESC")->where('id', '!=', 1)->take(10)->get(); //* Tüm Yazarlar

        return view("contents.director.list", compact("directors_1","directors_2","directors_3","directors_4"));
    }

    //* 
    public function indexDirector($id){
        $director = Director::where("id",$id)->first();

        $directorData = Director::select('data')->where("id",$id)->first();
        $directorData = json_decode($directorData->data, true);

        $directorDate = $director->date;
        $birthDate = Carbon::createFromFormat('Y-m-d', $directorDate);
        $currentDate = Carbon::now();
        $ageDirector = $currentDate->diffInYears($birthDate);

        if(isset(Auth::user()->username)){
            $userData = User::where('username', Auth::user()->username)->first();
            $userData = json_decode($userData->data, true);
            $favoriID = [];
            $takipID = [];
            foreach($userData["favorite_directors"] as $key){ array_unshift($favoriID, $key["id"]); }
            foreach($userData["followed_directors"] as $key){ array_unshift($takipID, $key["id"]); }

            return view("contents.director.single", compact("director","ageDirector","favoriID","takipID","directorData"));
        }else{
            return view("contents.director.single", compact("director","ageDirector","directorData"));
        }
    }

    //* 
    public function deleteDirector(Request $request){
        
    }

    public function islemTakipEt($id,$name,$slug){
        $user = User::where('username', Auth::user()->username)->first();
        $userData = json_decode($user->data, true);
        $idler = [];
        foreach($userData["followed_directors"] as $key){ array_unshift($idler, $key["id"]); }
        if(in_array($id, $idler)){
            $updatedFavoriteBooks = array_filter($userData['followed_directors'], function ($book) use ($id) {
                return $book['id'] !== $id;
            });
            $userData['followed_directors'] = $updatedFavoriteBooks;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("Takipten çıkartıldı","Başarılı");
        }else{
            $newFollowedBook = [
                "id" => $id,
                "name" => $name,
                "slug" => $slug
            ];
            $userData['followed_directors'][] = $newFollowedBook;
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
        foreach($userData["favorite_directors"] as $key){ array_unshift($idler, $key["id"]); }
        if(in_array($id, $idler)){
            $updatedFavoriteBooks = array_filter($userData['favorite_directors'], function ($book) use ($id) {
                return $book['id'] !== $id;
            });
            $userData['favorite_directors'] = $updatedFavoriteBooks;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("Favorilerden kaldırıldı","Başarılı");
        }else{
            $newFollowedBook = [ // Yeni takip edilen kitabın bilgilerini oluşturun
                "id" => $id,
                "name" => $name,
                "slug" => $slug
            ];
            $userData['favorite_directors'][] = $newFollowedBook; // "favorite_directors" içine yeni kitabı ekleyin
            $user->data = json_encode($userData); // JSON verisini güncelle
            $user->save(); // Kullanıcıyı kaydet
            toastr()->success("Favorilere eklendi","Başarılı");
        }
        return redirect()->back();
    }

    public function islemInceleme(Request $request){
        $director = Director::where('id', $request->id)->first();
        $directorData = json_decode($director->data, true);
        $newReviews = [
            "directorId" => $request->id,
            "userId" => Auth::user()->id,
            "date" => date("Y-m-d H:i"),
            "reviews" => $request->reviews
        ];
        $directorData['reviews'][] = $newReviews;
        $director->data = json_encode($directorData);
        $director->save();

        toastr()->success("","Başarılı");
        return redirect()->back();
    }

    public function islemAlinti(Request $request){
        $director = Director::where('id', $request->id)->first();
        $directorData = json_decode($director->data, true);
        $newReviews = [
            "directorId" => $request->id,
            "userId" => Auth::user()->id,
            "date" => date("Y-m-d H:i"),
            "quotes" => $request->quotes
        ];
        $directorData['quotes'][] = $newReviews;
        $director->data = json_encode($directorData);
        $director->save();

        toastr()->success("","Başarılı");
        return redirect()->back();
    }
}
