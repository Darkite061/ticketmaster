<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class artistController extends Controller
{
    public function index()
    {
        $artistas = DB :: table ('artists')->where('status','ACTIVE')->get();
        return view('/admin/artists/list')->with ('artists',$artistas);
    }

    public function create()
    {
        return view('/admin/artists/create');
    }

    public function store(Request $request)
    {
        //dd($request);
        $id=DB::table('artists')->insertGetId([
            'name' => $request ->name,
            'genre' =>$request ->genre,
            'image' =>$request ->image,
            'status' =>"ACTIVE",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        if($request->hasFile('image')){
            $ruta='imagenes/artists';
            $extension=$request->image->extension();
            $nombre='artista_'.$id.'.'.$extension;
            $path=$request->image->storeAs($ruta,$nombre,'public');
            DB::table('artists')->where('id',$id)
            ->update([
                'image' => '/storage/'.$path,
                'updated_at' => now(),
            ]);

        // if($request->hasFile('picture')){
        //     $ruta='imagenes/categories';
        //     $extension=$request->image->extension();
        //     $nombre='categoria_'.$id.'.'.$extension;
        //     $path=$request->image->storeAs($ruta,$nombre,'public');
        //     $id=DB::table('images')->insert([
        //         'name' => $path,
        //         'description' =>'informacion de prueba',
        //         'event_id' =>$id,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        }
        $artistas = DB :: table ('artists')->where('status','ACTIVE')->get();
        return view('/admin/artists/list')->with ('artists',$artistas);
    }

    public function show($id)
    {
        $artistas=DB::table('artists')->where('id',$id)->first();
        return view('/admin/artists/show')->with ('artists',$artistas);
    }

    public function edit($id)
    {
        $artistas=DB::table('artists')->where('id',$id)->first();
        return view('/admin/artists/edit')->with ('artists',$artistas);
    }

    public function update(Request $request, $id)
    {
        DB::table('artists')->where('id',$id)
        ->update([
            'name' => $request ->name,
            'genre' =>$request ->genre,
            'image' =>$request ->image,
            'updated_at' => now(),
        ]);
        if($request->hasFile('image')){
            $ruta='imagenes/artists';
            $extension=$request->image->extension();
            $nombre='artista_'.$id.'.'.$extension;
            $path=$request->image->storeAs($ruta,$nombre,'public');
            DB::table('artists')->where('id',$id)
            ->update([
                'image' => '/storage/'.$path,
                'updated_at' => now(),
            ]);
        }
        $artistas = DB :: table ('artists')->where('status','ACTIVE')->get();
        return view('/admin/artists/list')->with ('artists',$artistas)->with ('mensaje','registro realizado');
        // if($request->hasFile('image')){
        //     $ruta='imagenes/categories';
        //     $num=0;
        //     foreach($request -> photos as $img){
        //         $extension=$img->extension();$num++;
        //         $nombre='categoria_'.$id.'_'.$num.'.'.$extension;
        //         $path=$request->image->storeAs($ruta,$nombre,'public');
        //         DB::table('categories')->where('id',$id)
        //         ->update([
        //             'image' =>$path,
        //             'updated_at' => now(),
        //         ]);
        //     }
        // }
    }

    public function destroy($id)
    {
        DB::table('artists')->where('id',$id)
        ->update([
            
            'status' =>"INACTIVE",
        ]);
        $categorias = DB :: table ('artists')->where('status','ACTIVE')->get();
        return view('/admin/artists/list')->with ('artists',$categorias);
    }
}
