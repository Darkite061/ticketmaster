<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class placesController extends Controller
{
    public function index()
    {
        $artistas = DB :: table ('places')->where('status','ACTIVE')->get();
        return view('/admin/places/list')->with ('places',$artistas);
    }

    public function create()
    {
        return view('/admin/places/create');
    }

    public function store(Request $request)
    {
        //dd($request);
        $id=DB::table('places')->insertGetId([
            'name' => $request ->name,
            'address' =>$request ->address,
            'capacity' =>$request ->capacity,
            'image' =>$request ->image,
            'status' =>"ACTIVE",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        if($request->hasFile('image')){
            $ruta='imagenes/places';
            $extension=$request->image->extension();
            $nombre='place_'.$id.'.'.$extension;
            $path=$request->image->storeAs($ruta,$nombre,'public');
            DB::table('places')->where('id',$id)
            ->update([
                'image' => '/storage/'.$path,
                'updated_at' => now(),
            ]);
        }
        $artistas = DB :: table ('places')->where('status','ACTIVE')->get();
        return view('/admin/places/list')->with ('places',$artistas);
    }

    public function show($id)
    {
        $artistas=DB::table('places')->where('id',$id)->first();
        return view('/admin/places/show')->with ('places',$artistas);
    }

    public function edit($id)
    {
        $artistas=DB::table('places')->where('id',$id)->first();
        return view('/admin/places/edit')->with ('places',$artistas);
    }

    public function update(Request $request, $id)
    {
        DB::table('places')->where('id',$id)
        ->update([
            'name' => $request ->name,
            'address' =>$request ->address,
            'capacity' =>$request ->capacity,
            'image' =>$request ->image,
            'updated_at' => now(),
        ]);
        if($request->hasFile('image')){
            $ruta='imagenes/places';
            $extension=$request->image->extension();
            $nombre='place_'.$id.'.'.$extension;
            $path=$request->image->storeAs($ruta,$nombre,'public');
            DB::table('places')->where('id',$id)
            ->update([
                'image' => '/storage/'.$path,
                'updated_at' => now(),
            ]);
        }
        $artistas = DB :: table ('places')->where('status','ACTIVE')->get();
        return view('/admin/places/list')->with ('places',$artistas)->with ('mensaje','registro realizado');
    }

    public function destroy($id)
    {
        DB::table('places')->where('id',$id)
        ->update([
            
            'status' =>"INACTIVE",
        ]);
        $categorias = DB :: table ('places')->where('status','ACTIVE')->get();
        return view('/admin/places/list')->with ('places',$categorias);
    }
}
