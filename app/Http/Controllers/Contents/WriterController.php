<?php

namespace App\Http\Controllers\Contents;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Writer;
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
        $writers_1 = Writer::orderBy("likes","DESC")->take(10)->get(); //* En Beğenilen Yazarlar
        $writers_2 = Writer::orderBy("likes","ASC")->take(10)->get(); //* En Çok Okunan Yazarlar
        $writers_3 = Writer::orderBy("rating","DESC")->take(10)->get(); //* En İyi Yazarlar
        $writers_4 = Writer::orderBy("created_at","DESC")->take(10)->get(); //* Tüm Yazarlar

        return view("contents.writer.list", compact("writers_1","writers_2","writers_3","writers_4"));
    }

    //* 
    public function indexWriter($slug){
        $writer = Writer::where("slug",$slug)->first();

        $writerDate = $writer->date;
        $birthDate = Carbon::createFromFormat('Y-m-d', $writerDate);
        $currentDate = Carbon::now();
        $ageWriter = $currentDate->diffInYears($birthDate);

        return view("contents.writer.single", compact("writer","ageWriter"));
    }

    //* 
    public function deleteWriter(Request $request){
        
    }
}
