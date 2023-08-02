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
            return redirect()->back();

        }else{

            if(
                Auth::attempt([
                    "username" => $request->username,
                    "password" => $request->password
                ])
            ){
                // return redirect()->route("admin.dashboard");
                return "Başarılı";
            }else{
                // return redirect()->route("admin.login")->withErrors("Parola veya E-Posta hatalı!");
                return "Başarısız";
            }

        }
    }
}
