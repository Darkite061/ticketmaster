<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\categoriesController;
use Illuminate\Support\Facades\DB;

class categoriesController extends Controller
{
    public function index()
    {
        $categorias = DB :: table ('categories')->where('status','ACTIVE')->get();
        // foreach($categorias as $cat){
        //     $photos=DB::table('images')->where('event_id',$categoria->id)->get();
        //     $cat->photos=photos;
        // }
        return view('/admin/categories/list')->with ('categorias',$categorias);
    }

    public function create()
    {
        return view('/admin/categories/create');
    }

    public function store(Request $request)
    {
        //dd($request);
        $id=DB::table('categories')->insertGetId([
            'name' => $request ->name,
            'description' =>$request ->description,
            'image' =>$request ->image,
            'status' =>"ACTIVE",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        if($request->hasFile('image')){
            $ruta='imagenes/categories';
            $extension=$request->image->extension();
            $nombre='categoria_'.$id.'.'.$extension;
            $path=$request->image->storeAs($ruta,$nombre,'public');
            DB::table('categories')->where('id',$id)
            ->update([
                'image' =>$path,
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
        $categorias = DB :: table ('categories')->where('status','ACTIVE')->get();
        return view('/admin/categories/list')->with ('categorias',$categorias);
    }

    public function show($id)
    {
        $categoria=DB::table('categories')->where('id',$id)->first();
        return view('/admin/categories/show')->with ('categoria',$categoria);
    }

    public function edit($id)
    {
        $categoria=DB::table('categories')->where('id',$id)->first();
        return view('/admin/categories/edit')->with ('categoria',$categoria);
    }

    public function update(Request $request, $id)
    {
        DB::table('categories')->where('id',$id)
        ->update([
            'name' => $request ->name,
            'description' =>$request ->description,
            'image' =>$request ->image,
            'updated_at' => now(),
        ]);
        if($request->hasFile('image')){
            $ruta='imagenes/categories';
            $extension=$request->image->extension();
            $nombre='categoria_'.$id.'.'.$extension;
            $path=$request->image->storeAs($ruta,$nombre,'public');
            DB::table('categories')->where('id',$id)
            ->update([
                'image' =>$path,
                'updated_at' => now(),
            ]);
        }
        $categorias = DB :: table ('categories')->where('status','ACTIVE')->get();
        return view('/admin/categories/list')->with ('categorias',$categorias)->with ('mensaje','registro realizado');
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
        DB::table('categories')->where('id',$id)
        ->update([
            
            'status' =>"INACTIVE",
        ]);
        $categorias = DB :: table ('categories')->where('status','ACTIVE')->get();
        return view('/admin/categories/list')->with ('categorias',$categorias);
    }
}
