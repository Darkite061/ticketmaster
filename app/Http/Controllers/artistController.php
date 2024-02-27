<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Http\Controllers\artistController;
use Illuminate\Support\Facades\DB;

class artistController extends Controller
{
    public function index(){
        $artistas = DB :: table ('artists')->get();
       return view('/admin/artist/list')->with ('artitas',$artistas);
       
      }
  
      public function crear(){
         return view('/admin/artist/create');
          
      }
  
      public function guardar(Request $request){
        //dd($request);
        DB::table('artists')->insert([
            'name' => $request ->name,
            'genre' =>$request ->genre,
        ]);
          return "nuevo registro";
      }
  
      public function editar(){
        return view('/admin/artist/edit');
      }
  
      public function actualizar(){
          return "actualizar datos";
      }
  
      public function mostrar(){
        return view('/admin/artist/show');
      }
  
      public function borrar(){
          return "Borra datos del registro";
      }
      /**
       * Show the form for creating a new resource.
       */
      public function create()
      {
          //
      }
  
      /**
       * Store a newly created resource in storage.
       */
      public function store(Request $request)
      {
          //
      }
  
      /**
       * Display the specified resource.
       */
      public function show(string $id)
      {
          //
      }
  
      /**
       * Show the form for editing the specified resource.
       */
      public function edit(string $id)
      {
          //
      }
  
      /**
       * Update the specified resource in storage.
       */
      public function update(Request $request, string $id)
      {
          //
      }
  
      /**
       * Remove the specified resource from storage.
       */
      public function destroy(string $id)
      {
          //
      }
}
