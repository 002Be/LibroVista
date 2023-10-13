<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use App\Models\Book;
use App\Models\Movie;
use App\Models\Serie;
use App\Models\Actor;
use App\Models\Writer;
use App\Models\Director;

class UserController extends Controller
{
    public function userLoginRegister(Request $request){
        if($request->process=="register"){

            $user = new User;
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->date = now();
            $user->password = bcrypt($request->password);
            $user->save();
            toastr()->success("Kayıt Olundu","Kayıt Başarılı");
            return redirect()->back();

        }elseif($request->process=="login"){
            if(
                Auth::attempt([
                    "username" => $request->username,
                    "password" => $request->password
                ])
            ){
                toastr()->success("Giriş Yapıldı","Başarılı");
                return redirect()->back();
            }else{
                toastr()->error("Kullanıcı Adı veya Şifre hatalı!","Başarısız");
                return redirect()->back();
            }
        }else{
            Auth::logout();
            toastr()->success("Çıkış Yapıldı","Başarılı");
            return redirect()->route("HomePage");
        }
    }

    public function userProfile($username){
        $users = User::where("username", $username)->get();

        $userData = User::select('data')->where('username', $username)->first();
        $json_data = $userData->data;
        $userData = json_decode($json_data, true);

        $uAddBook = Book::where("addPerson", $username)->get();
        $uAddMovie = Movie::where("addPerson", $username)->get();
        $uAddSerie = Serie::where("addPerson", $username)->get();
        $uAddActor = Actor::where("addPerson", $username)->get();
        $uAddWriter = Writer::where("addPerson", $username)->get();
        $uAddDirector = Director::where("addPerson", $username)->get();
        $userAddContentsAll = [$uAddBook, $uAddMovie, $uAddSerie, $uAddActor, $uAddWriter, $uAddDirector];

        $aBooks = Book::get();
        $aMovies = Movie::get();
        $aSeries = Serie::get();
        $aActors = Actor::get();
        $aWriters = Writer::get();
        $aDirectors = Director::get();
        $contentsJsonAll = ["favorite_books","favorite_movies","favorite_series","favorite_actors","favorite_writers","favorite_directors"];

        return view("profile.index", compact("users","userData","userAddContentsAll", "aBooks", "aMovies", "aSeries", "aActors", "aWriters", "aDirectors"));
    }

    public function userSettings(){
        $user = User::where("username", Auth::user()->username)->first();

        $userData = User::select('data')->where('username', Auth::user()->username)->first();
        $json_data = $userData->data;
        $userData = json_decode($json_data, true);

        return view("settings.index", compact("user","userData"));
    }

    public function userSettingsUpdate(Request $request){
        $user = User::where('username', Auth::user()->username)->first();
        if($request->process == "publicInfo"){

            $user->name = $request->name;
            $user->username = $request->username;
            $user->date = $request->date;

            $user->data = json_decode($user->data, true);
            $user->data = collect($user->data)->merge([
                'biography' => $request->biography,
            ]);
            $user->data = collect($user->data)->merge([
                'location' => $request->location,
            ]);

            $user->save();

            toastr()->success("Bilgiler başarıyla değiştirildi","Başarılı");
            return redirect()->back();

        }else if($request->process == "email"){

            if($user->email == $request->oldEmail && $request->newEmail == $request->newEmailR){
                $user->email = $request->newEmail;
                $user->save();
                toastr()->success("E-Posta adresi değiştirildi","Başarılı");
                return redirect()->back();
            }else{
                toastr()->error("E-Posta adresi değiştirilemedi","Başarısız");
                return redirect()->back();
            }

        }else if($request->process == "password"){
            // if(Auth::attempt(["password" => $request->oldPassword])){
            if($user->password == $request->oldPassword){
                if($request->newPassword == $request->newPasswordR){
                    $user->password = bcrypt($request->newPassword);
                    $user->save();
                    toastr()->success("Şifre değiştirildi","Başarılı");
                    return redirect()->back();
                }else{
                    toastr()->error("Yeni şifreler uyuşmuyor!","Başarısız");
                    return redirect()->back();
                }
            }else{
                toastr()->error("Şifrenizi hatalı girdiniz!","Başarısız");
                return redirect()->back();
            }

        }else if($request->process == "notification"){

            

        }else if($request->process == "deleteAccount"){

            

        }else{
            return view("HomePage");
        }
    }
}