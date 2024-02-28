<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Http\Controllers\CartegoriesController;
use Illuminate\Support\Facades\DB;

class CartegoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categorias = DB :: table ('categories')->where('status','active')->get();
        return view('/admin/categories/list')->with ('categorias',$categorias);
        return "Mostrar la lista de categorias";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/admin/categories/create');
        return "Mostrar el formulario para crear una categoria";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request);
        DB::table('categories')->insert([
            'name' => $request ->name,
            'description' =>$request ->description,
        ]);
        $categorias = DB :: table ('categories')->where('estado','activo')->get();
        return view('/admin/categories/list')->with ('categorias',$categorias);
        return "crea un nuevo registro";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $categoria=DB::table('categories')->where('id',$id)->first();
        return view('/admin/categories/show')->with ('categoria',$categoria);
        return "Mostrar la lista de categorias";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categoria=DB::table('categories')->where('id',$id)->first();
        // $categorias = DB :: table ('categories')->get();
        return view('/admin/categories/edit')->with ('categoria',$categoria);
        return "Mostrar datos para su actualizacion";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //dd($request);
        DB::table('categories')->where('id',$id)
        ->update([
            'name' => $request ->name,
            'description' =>$request ->description,
        ]);
          
        $categorias = DB :: table ('categories')->where('estado','activo')->get();
        return view('/admin/categories/list')->with ('categorias',$categorias);
        return "actualiza los datos";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // $deleted = DB::table('categories')->where('votes', $id)->delete();
        DB::table('categories')->where('id',$id)
        ->update([
            
            'estado' =>"inactivo",
        ]);
        $categorias = DB :: table ('categories')->where('estado','activo')->get();
        return view('/admin/categories/list')->with ('categorias',$categorias);
        return "borra el registro";
    }
}
