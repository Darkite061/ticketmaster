<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class eventsController extends Controller
{
    public function index()
    {
        $events = DB :: table ('events')->where('status','ACTIVE')->get();
        // foreach($events as $cat){
        //     $photos=DB::table('images')->where('event_id',$events->id)->get();
        //     $cat->photos=photos;
        // }
        return view('/admin/events/list')->with ('events',$events);
    }

    public function create()
    {
        // Consulta para obtener solo id y nombre de la tabla 'categories'
        $categories = DB::table('categories')->select('id', 'name')->get();

        // Consulta para obtener solo id y nombre de la tabla 'artists'
        $artists = DB::table('artists')->select('id', 'name')->get();

        // Consulta para obtener solo id y nombre de la tabla 'places'
        $places = DB::table('places')->select('id', 'name')->get();
        return view('/admin/events/create', compact('categories', 'artists', 'places'));
    }

    public function store(Request $request)
    {
        // Consulta para obtener solo id y nombre de la tabla 'categories'
        $categories = DB::table('categories')->select('id', 'name')->get();

        // Consulta para obtener solo id y nombre de la tabla 'artists'
        $artists = DB::table('artists')->select('id', 'name')->get();

        // Consulta para obtener solo id y nombre de la tabla 'places'
        $places = DB::table('places')->select('id', 'name')->get();
        //dd($request);
        $id=DB::table('events')->insertGetId([
            'name' => $request->name,
            'date' => $request->date,
            'description' => $request->description,
            'image' => $request->image,
            'price_tickets' => $request->price_tickets,
            'category_id' => $request->category_id,
            'artist_id' => $request->artist_id,
            'places_id' => $request->places_id,
            'status' => "ACTIVE",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        if($request->hasFile('image')){
            $ruta='imagenes/events';
            $extension=$request->image->extension();
            $nombre='categoria_'.$id.'.'.$extension;
            $path=$request->image->storeAs($ruta,$nombre,'public');
            DB::table('events')->where('id',$id)
            ->update([
                'image' => '/storage/'.$path,
                'updated_at' => now(),
            ]);
        if($request->hasFile('photos')){
           $ruta='imagenes/events';
            $extension=$request->image->extension();
            $nombre='events_'.$id.'.'.$extension;
            $path=$request->image->storeAs($ruta,$nombre,'public');
            $id=DB::table('images')->insert([
                'name' => $path,
                'description' =>'informacion de prueba',
                'event_id' =>$id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        }
        $events = DB :: table ('events')->where('status','ACTIVE')->get();
        return view('/admin/events/list')->with ('events',$events);
    }

    public function show($id)
    {
        $events=DB::table('events')->where('id',$id)->first();
        return view('/admin/events/show')->with ('events',$events);
    }

    public function edit($id)
    {
        // Consulta para obtener solo id y nombre de la tabla 'categories'
        $categories = DB::table('categories')->select('id', 'name')->get();

        // Consulta para obtener solo id y nombre de la tabla 'artists'
        $artists = DB::table('artists')->select('id', 'name')->get();

        // Consulta para obtener solo id y nombre de la tabla 'places'
        $places = DB::table('places')->select('id', 'name')->get();

        $events=DB::table('events')->where('id',$id)->first();
        return view('/admin/events/edit',compact('categories', 'artists', 'places'))->with ('events',$events);
    }

    public function update(Request $request, $id)
    {
        // Consulta para obtener solo id y nombre de la tabla 'categories'
        $categories = DB::table('categories')->select('id', 'name')->get();

        // Consulta para obtener solo id y nombre de la tabla 'artists'
        $artists = DB::table('artists')->select('id', 'name')->get();

        // Consulta para obtener solo id y nombre de la tabla 'places'
        $places = DB::table('places')->select('id', 'name')->get();
        DB::table('events')->where('id',$id)
        ->update([
            'name' => $request->name,
            'date' => $request->date,
            'description' => $request->description,
            'image' => $request->image,
            'price_tickets' => $request->price_tickets,
            'category_id' => $request->category_id,
            'artist_id' => $request->artist_id,
            'places_id' => $request->places_id,
            'status' => "ACTIVE",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        if($request->hasFile('image')){
            $ruta='imagenes/events';
            $extension=$request->image->extension();
            $nombre='events_'.$id.'.'.$extension;
            $path=$request->image->storeAs($ruta,$nombre,'public');
            DB::table('events')->where('id',$id)
            ->update([
                'image' => '/storage/'.$path,
                'updated_at' => now(),
            ]);
        }
        if($request->hasFile('photos')){
            $ruta='imagenes/events';
            $num=0;
            foreach($request -> photos as $img){
                $extension=$img->extension();$num++;
                $nombre='events_'.$id.'_'.$num.'.'.$extension;
                $path=$request->image->storeAs($ruta,$nombre,'public');
                DB::table('events')->where('id',$id)
                ->update([
                    'image' =>$path,
                    'updated_at' => now(),
                ]);
            }
        }
        $events = DB :: table ('events')->where('status','ACTIVE')->get();
        return view('/admin/events/list')->with ('events',$events)->with ('mensaje','registro realizado');
    }

    public function destroy($id)
    {
        DB::table('events')->where('id',$id)
        ->update([
            
            'status' =>"INACTIVE",
        ]);
        $events = DB :: table ('events')->where('status','ACTIVE')->get();
        return view('/admin/events/list')->with ('events',$events);
    }
}
