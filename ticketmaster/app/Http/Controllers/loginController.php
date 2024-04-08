<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function registro(Request $request){
        $user = new User();

        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->image = $request->image;
        if($request->hasFile('image')){
            $ruta='imagenes/users';
            $extension=$request->image->extension();
            $nombre='user_'.$user->name.'.'.$extension;
            $path=$request->image->storeAs($ruta,$nombre,'public');
            $user->image = '/storage/'.$path;
        }
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->permission = $request->permission;
        $user->status = "ACTIVE";
        $user->created_at = now();
        $user->updated_at = now();

        $user->save();

        Auth::login($user);

        return redirect(route('/index'));
    }
    public function login(Request $request){
        $credentials = [
            'email' => $request ->email,
            'password' => $request ->password,
            'status' => "ACTIVE",
        ];

        $remember = ($request->has('remember') ? true : false);

        if(Auth::attempt($credentials,$remember)){
            $request->session()->regenerate();

            return redirect()->intended('index');
        }else{
            return redirect('login')->with ('mensaje','Error usuario erroneo');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}
