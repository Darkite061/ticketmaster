<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class reviewsController extends Controller
{
    public function index()
    {
        $reviews = DB :: table ('reviews')->where('status','ACTIVE')->get();
        return view('/admin/reviews/list')->with ('reviews',$reviews);
    }

    public function create()
    {
        return view('/admin/reviews/create');
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
        $reviews = DB::table('reviews')->where('id',$id)->first();
        return view('/admin/reviews/show')->with ('reviews',$reviews);
    }

    public function edit($id)
    {
        // Consulta para obtener solo id y nombre de la tabla 'events'
        $events = DB::table('events')->select('id', 'name')->get();

        $reviews = DB::table('reviews')->where('id',$id)->first();
        return view('/admin/reviews/edit',compact('events'))->with ('reviews',$reviews);
    }

    public function update(Request $request, $id)
    {
        // Consulta para obtener solo id y nombre de la tabla 'categories'
        $events = DB::table('events')->select('id', 'name')->get();

        DB::table('reviews')->where('id',$id)
        ->update([
            'event_id' => $request ->event_id,
            'rating' =>$request ->rating,
            'comment' =>$request ->comment,
            'updated_at' => now(),
        ]);
        $reviews = DB :: table ('reviews')->where('status','ACTIVE')->get();
        return view('/admin/reviews/list')->with ('reviews',$reviews)->with ('mensaje','registro realizado');
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
