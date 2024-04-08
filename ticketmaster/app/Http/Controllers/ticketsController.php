<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ticketsController extends Controller
{
    public function index()
    {
        $tickets = DB :: table ('tickets')->where('status','ACTIVE')->get();
        return view('/admin/tickets/list')->with ('tickets',$tickets);
    }

    public function create()
    {
        return view('/admin/tickets/create');
    }

    public function store(Request $request)
    {
        // //dd($request);
        // $id=DB::table('purchases')->insertGetId([
        //     'code' => $request ->code,
        //     'description' =>$request ->description,
        //     'discount' =>$request ->discount,
        //     'start_date' =>$request ->start_date,
        //     'end_date' =>$request ->end_date,
        //     'status' =>"ACTIVE",
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // $promotions = DB :: table ('promotions')->where('status','ACTIVE')->get();
        // return view('/admin/promotions/list')->with ('promotions',$promotions);
    }

    public function show($id)
    {
        $tickets = DB::table('tickets')->where('id',$id)->first();
        return view('/admin/tickets/show')->with ('tickets',$tickets);
    }

    public function edit($id)
    {
        // Consulta para obtener solo id y nombre de la tabla 'events'
        $events = DB::table('events')->select('id', 'name')->get();

        // Consulta para obtener solo id y nombre de la tabla 'events'
        $users = DB::table('users')->select('id', 'name')->get();

        $tickets = DB::table('tickets')->where('id',$id)->first();
        return view('/admin/tickets/edit',compact('events', 'users'))->with ('tickets',$tickets);
    }

    public function update(Request $request, $id)
    {
        // Consulta para obtener solo id y nombre de la tabla 'categories'
        $events = DB::table('events')->select('id', 'name')->get();

        DB::table('tickets')->where('id',$id)
        ->update([
            'event_id' => $request ->event_id,
            'user_id' =>$request ->user_id,
            'price' =>$request ->price,
            'updated_at' => now(),
        ]);
        $tickets = DB :: table ('tickets')->where('status','ACTIVE')->get();
        return view('/admin/tickets/list')->with ('tickets',$tickets)->with ('mensaje','registro realizado');
    }

    public function destroy($id)
    {
        DB::table('reviews')->where('id',$id)
        ->update([
            
            'status' =>"INACTIVE",
        ]);
        $reviews = DB :: table ('reviews')->where('status','ACTIVE')->get();
        return view('/admin/reviews/list')->with ('reviews',$reviews);
    }
}
