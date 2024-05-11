<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class categoriesController extends Controller
{

    private $url_categorias = 'http://127.0.0.1:8010/api/categories/';

    public function index()
    {
        $response = Http::withToken(Session::get('token'))->get($this->url_categorias);
        $json=json_decode($response->body());
        // dd($json);

        return view('/admin/categories/list')->with('categories', $json->categories);
    }
    
    public function create()
    {
        return view('/admin/categories/create');
    }

    public function store(Request $request)
    {
       // dd($request->name);
       
        $response = Http::withToken(Session::get('token'))
        ->attach(
            'image', //nombre del campo enviado a la api
            $request->file('image')->getContent(),  //contenido de la imagen
            $request->file('image')->getClientOriginalName() //nombre del archivo
        )->post($this->url_categorias,[
            'name' => $request ->name,
            'description' =>$request ->description,
            'image' =>$request ->image,
            'status' =>"ACTIVE",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $json=json_decode($response->body());

        dd( "json" . $json);
        return redirect()->route('categorias.index');
        
  
    }

    public function show($id)
    {//Vista
        $response = Http::withToken(Session::get('token'))
        ->get($this->url_categorias.$id);
        $json=json_decode($response->body());
        // dd($json);

        return view('/admin/categories/show')->with('categories', $json->categories);
    }

    public function edit($id)
    {//Vista
        $response = Http::withToken(Session::get('token'))
        ->get($this->url_categorias.$id);
        $json=json_decode($response->body());
        //dd($json);

        return view('/admin/categories/edit')->with('categories', $json->categories);
    }

    public function update(Request $request, $id)
    {
        $response = Http::withToken(Session::get('token'))
        ->attach(
            'image', //nombre del campo enviado a la api
            $request->file('image')->getContent(),  //contenido de la imagen
            $request->file('image')->getClientOriginalName() //nombre del archivo
        )->post($this->url_categorias.$id,[
            'name' => $request ->name,
            'description' =>$request ->description,
            'image' =>$request ->image,
            '_method' =>"PUT",
        ]);

        $json=json_decode($response->body());

        //dd($json);
        return redirect()->route('categorias.index');
    }

    public function destroy(Request $request, $id)
    {//Proceso
        //dd($request);
        $response = Http::withToken(Session::get('token'))
        ->post($this->url_categorias.$id,[
            '_method' => 'DELETE',
        ]);
        $json=json_decode($response->body());
        
        //dd($json);


     
        return redirect()->route('categorias.index');
    //     view('/admin/productos/list')
    //         ->with('mensaje', $json->message);
    }
}
