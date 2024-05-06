<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class usersController extends Controller
{
    public function index()
    {
        $users = DB :: table ('users')->where('status','ACTIVE')->get();
        return view('/admin/users/list')->with ('users',$users);
    }

    public function create()
    {
        return view('/admin/users/create');
    }

    public function store(Request $request)
    {
        //dd($request);
        $id=DB::table('users')->insertGetId([
            'name' => $request ->name,
            'last_name' =>$request ->last_name,
            'image' =>$request ->image,
            'email' =>$request ->email,
            'password' =>$request ->password,
            'permission' =>$request ->permission,
            'status' =>"ACTIVE",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        if($request->hasFile('image')){
            $ruta='imagenes/users';
            $extension=$request->image->extension();
            $nombre='user_'.$id.'.'.$extension;
            $path=$request->image->storeAs($ruta,$nombre,'public');
            DB::table('users')->where('id',$id)
            ->update([
                'image' => '/storage/'.$path,
                'updated_at' => now(),
            ]);
        }
        $users = DB :: table ('users')->where('status','ACTIVE')->get();
        return view('/admin/users/list')->with ('users',$users);
    }

    public function show($id)
    {
        $users=DB::table('users')->where('id',$id)->first();
        return view('/admin/users/show')->with ('users',$users);
    }

    public function edit($id)
    {
        $users=DB::table('users')->where('id',$id)->first();
        return view('/admin/users/edit')->with ('users',$users);
    }

    public function update(Request $request, $id)
    {
        DB::table('users')->where('id',$id)
        ->update([
            'name' => $request ->name,
            'last_name' =>$request ->last_name,
            'image' =>$request ->image,
            'email' =>$request ->email,
            'password' =>$request ->password,
            'permission' =>$request ->permission,
            'updated_at' => now(),
        ]);
        if($request->hasFile('image')){
            $ruta='imagenes/users';
            $extension=$request->image->extension();
            $nombre='user_'.$id.'.'.$extension;
            $path=$request->image->storeAs($ruta,$nombre,'public');
            DB::table('users')->where('id',$id)
            ->update([
                'image' => '/storage/'.$path,
                'updated_at' => now(),
            ]);
        }
        $users = DB :: table ('users')->where('status','ACTIVE')->get();
        return view('/admin/users/list')->with ('users',$users)->with ('mensaje','registro realizado');
    }

    public function destroy($id)
    {
        DB::table('users')->where('id',$id)
        ->update([
            
            'status' =>"INACTIVE",
        ]);
        $users = DB :: table ('users')->where('status','ACTIVE')->get();
        return view('/admin/users/list')->with ('users',$users);
    }
}
