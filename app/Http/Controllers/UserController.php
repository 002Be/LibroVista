<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
            return redirect()->route("homepage");
        }
    }
}
