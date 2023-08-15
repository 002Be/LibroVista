<?php

namespace App\Http\Controllers\Contents;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Writer;
use App\Models\User;
use Carbon\Carbon;

class WriterController extends Controller
{
    //* 
    public function addWriter(Request $request){
        $writer = new Writer;
        $writer->name = $request->name;
        $writer->slug = Str::slug($request->name,"-");;
        $writer->about = $request->about;
        $writer->gender = $request->gender;

        $imageName = Str::slug($request->name,"-")."-".rand(10000,99999).".".$request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads/writer'), $imageName);
        $writer->image = 'uploads/writer/'.$imageName;

        $writer->birthplace = $request->birthplace;
        $writer->date = $request->date;
        $writer->addPerson = Auth::user()->username;
        $writer->save();
        toastr()->success("Yazar kaydı başarıyla gönderildi.","Başarılı");
        return redirect()->back();
    }

    //* 
    public function indexWriters(){
        $writers_1 = Writer::orderBy("likes","DESC")->take(10)->where('id', '!=', 1)->get(); //* En Beğenilen Yazarlar
        $writers_2 = Writer::orderBy("likes","ASC")->take(10)->where('id', '!=', 1)->get(); //* En Çok Okunan Yazarlar
        $writers_3 = Writer::orderBy("rating","DESC")->take(10)->where('id', '!=', 1)->get(); //* En İyi Yazarlar
        $writers_4 = Writer::orderBy("created_at","DESC")->where('id', '!=', 1)->take(10)->get(); //* Tüm Yazarlar

        return view("contents.writer.list", compact("writers_1","writers_2","writers_3","writers_4"));
    }

    //* 
    public function indexWriter($id){
        $writer = Writer::where("id",$id)->first();

        $writerDate = $writer->date;
        $birthDate = Carbon::createFromFormat('Y-m-d', $writerDate);
        $currentDate = Carbon::now();
        $ageWriter = $currentDate->diffInYears($birthDate);

        $userData = User::where('username', Auth::user()->username)->first();
        $userData = json_decode($userData->data, true);
        $favoriID = [];
        $takipID = [];
        foreach($userData["favorite_writers"] as $key){ array_unshift($favoriID, $key["id"]); }
        foreach($userData["followed_writers"] as $key){ array_unshift($takipID, $key["id"]); }

        return view("contents.writer.single", compact("writer","ageWriter","favoriID","takipID"));
    }

    //* 
    public function deleteWriter(Request $request){
        
    }

    public function islemTakipEt($id,$name,$slug){
        $user = User::where('username', Auth::user()->username)->first();
        $userData = json_decode($user->data, true);
        $idler = [];
        foreach($userData["followed_writers"] as $key){ array_unshift($idler, $key["id"]); }
        if(in_array($id, $idler)){
            $updatedFavoriteBooks = array_filter($userData['followed_writers'], function ($writer) use ($id) {
                return $writer['id'] !== $id;
            });
            $userData['followed_writers'] = $updatedFavoriteBooks;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("Takipten çıkartıldı","Başarılı");
        }else{
            $newFollowedBook = [
                "id" => $id,
                "name" => $name,
                "slug" => $slug
            ];
            $userData['followed_writers'][] = $newFollowedBook;
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
        foreach($userData["favorite_writers"] as $key){ array_unshift($idler, $key["id"]); }
        if(in_array($id, $idler)){
            $updatedFavoriteBooks = array_filter($userData['favorite_writers'], function ($writer) use ($id) {
                return $writer['id'] !== $id;
            });
            $userData['favorite_writers'] = $updatedFavoriteBooks;
            $user->data = json_encode($userData);
            $user->save();
            toastr()->success("Favorilerden kaldırıldı","Başarılı");
        }else{
            $newFollowedBook = [ // Yeni takip edilen kitabın bilgilerini oluşturun
                "id" => $id,
                "name" => $name,
                "slug" => $slug
            ];
            $userData['favorite_writers'][] = $newFollowedBook; // "favorite_writers" içine yeni kitabı ekleyin
            $user->data = json_encode($userData); // JSON verisini güncelle
            $user->save(); // Kullanıcıyı kaydet
            toastr()->success("Favorilere eklendi","Başarılı");
        }
        return redirect()->back();
    }
}
