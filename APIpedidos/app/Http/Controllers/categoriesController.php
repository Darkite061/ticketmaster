<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class categoriesController extends Controller
{
    public function index()
    {
        $categorias = DB :: table ('categories')->where('status','ACTIVE')->get();
        
        return response()->json(["categories"=>$categorias,'estatus'=>200]);
    }

    public function store(Request $request)
    {
         dd($request);
        $id=DB::table('categories')->insertGetId([
            'name' => $request ->name,
            'description' =>$request ->description,
            'image' =>'storage/imagenes/productos/default.jpg',
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
                'image' => '/storage/'.$path,
                'updated_at' => now(),
            ]);
        }
        return response()->json([
            'success'=>'true',
            'message'=>'La categoria fue registrado con exito',
            'datos'=>$id,
        ],200);
    }

    public function show($id)
    {
        //equivalencia select * from products where id=$id
        $product=DB::table("categories")->where('id',$id)->where('estatus','ACTIVO')->first();
        $product->imagen=asset($product->imagen);
        return response()->json(['categories'=>$product,'status'=>200]);
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
                'image' => '/storage/'.$path,
                'updated_at' => now(),
            ]);
        }
        return response()->json([
            'success'=>'true',
            'message'=>'La categoria fue actualizado con exito',
            'datos'=>$affected,
        ],201);
    }

    public function destroy($id)
    {
        $affected=DB::table('categories')->where('id', $id)->update([
            'estatus'=>'INACTIVO',
            'updated_at'=>now(),
        ]);

        //return response()->json(['rows'=>$affected,'status'=>200]);
        return response()->json([
            'success'=>'true',
            'message'=>'La categoria fue borrado con exito',
            'datos'=>$affected,
        ],202);
    }
}
