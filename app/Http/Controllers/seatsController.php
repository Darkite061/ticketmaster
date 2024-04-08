<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class seatsController extends Controller
{
    public function index()
    {
        $seats = DB :: table ('seats')->where('status','ACTIVE')->get();
        return view('/admin/seats/list')->with ('seats',$seats);
    }

    public function create()
    {
        // Consulta para obtener solo id y nombre de la tabla 'places'
        $events = DB::table('events')->select('id', 'name')->get();

        return view('/admin/seats/create', compact('events'));
    }

    public function store(Request $request)
    {
        //dd($request);
        $id=DB::table('seats')->insertGetId([
            'event_id' => $request ->event_id,
            'section' =>$request ->section,
            'row' =>$request ->row,
            'number' =>$request ->number,
            'status' =>"ACTIVE",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $seats = DB :: table ('seats')->where('status','ACTIVE')->get();
        return view('/admin/seats/list')->with ('seats',$seats);
    }

    public function show($id)
    {
        $seats = DB::table('seats')->where('id',$id)->first();
        return view('/admin/seats/show')->with ('seats',$seats);
    }

    public function edit($id)
    {
        // Consulta para obtener solo id y nombre de la tabla 'events'
        $events = DB::table('events')->select('id', 'name')->get();

        $seats = DB::table('seats')->where('id',$id)->first();
        return view('/admin/seats/edit',compact('events'))->with ('seats',$seats);
    }

    public function update(Request $request, $id)
    {
        DB::table('seats')->where('id',$id)
        ->update([
            'event_id' => $request ->event_id,
            'section' =>$request ->section,
            'row' =>$request ->row,
            'number' =>$request ->number,
            'updated_at' => now(),
        ]);
        $seats = DB :: table ('seats')->where('status','ACTIVE')->get();
        return view('/admin/seats/list')->with ('seats',$seats)->with ('mensaje','registro realizado');
    }

    public function destroy($id)
    {
        DB::table('seats')->where('id',$id)
        ->update([
            
            'status' =>"INACTIVE",
        ]);
        $seats = DB :: table ('seats')->where('status','ACTIVE')->get();
        return view('/admin/seats/list')->with ('seats',$seats);
    }
}
