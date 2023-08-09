<?php

namespace App\Http\Controllers\Contents;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Director;
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
    public function indexDirector($slug){
        $director = Director::where("slug",$slug)->first();

        $directorDate = $director->date;
        $birthDate = Carbon::createFromFormat('Y-m-d', $directorDate);
        $currentDate = Carbon::now();
        $ageDirector = $currentDate->diffInYears($birthDate);

        return view("contents.director.single", compact("director","ageDirector"));
    }

    //* 
    public function deleteDirector(Request $request){
        
    }
}
