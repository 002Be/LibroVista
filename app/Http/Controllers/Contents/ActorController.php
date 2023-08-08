<?php

namespace App\Http\Controllers\Contents;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Actor;
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
    public function indexActor($slug){
        $actor = Actor::where("slug",$slug)->first();

        $actorDate = $actor->date;
        $birthDate = Carbon::createFromFormat('Y-m-d', $actorDate);
        $currentDate = Carbon::now();
        $ageActor = $currentDate->diffInYears($birthDate);

        return view("contents.actor.single", compact("actor","ageActor"));
    }

    //* 
    public function deleteActor(Request $request){
        
    }
}
