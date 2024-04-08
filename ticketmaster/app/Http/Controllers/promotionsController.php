<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class promotionsController extends Controller
{
    public function index()
    {
        $promotions = DB :: table ('promotions')->where('status','ACTIVE')->get();
        return view('/admin/promotions/list')->with ('promotions',$promotions);
    }

    public function create()
    {
        return view('/admin/promotions/create');
    }

    public function store(Request $request)
    {
        //dd($request);
        $id=DB::table('promotions')->insertGetId([
            'code' => $request ->code,
            'description' =>$request ->description,
            'discount' =>$request ->discount,
            'start_date' =>$request ->start_date,
            'end_date' =>$request ->end_date,
            'status' =>"ACTIVE",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $promotions = DB :: table ('promotions')->where('status','ACTIVE')->get();
        return view('/admin/promotions/list')->with ('promotions',$promotions);
    }

    public function show($id)
    {
        $promotions = DB::table('promotions')->where('id',$id)->first();
        return view('/admin/promotions/show')->with ('promotions',$promotions);
    }

    public function edit($id)
    {
        $promotions = DB::table('promotions')->where('id',$id)->first();
        return view('/admin/promotions/edit')->with ('promotions',$promotions);
    }

    public function update(Request $request, $id)
    {
        DB::table('promotions')->where('id',$id)
        ->update([
            'code' => $request ->code,
            'description' =>$request ->description,
            'discount' =>$request ->discount,
            'start_date' =>$request ->start_date,
            'end_date' =>$request ->end_date,
            'updated_at' => now(),
        ]);
        $promotions = DB :: table ('promotions')->where('status','ACTIVE')->get();
        return view('/admin/promotions/list')->with ('promotions',$promotions)->with ('mensaje','registro realizado');
    }

    public function destroy($id)
    {
        DB::table('promotions')->where('id',$id)
        ->update([
            
            'status' =>"INACTIVE",
        ]);
        $promotions = DB :: table ('promotions')->where('status','ACTIVE')->get();
        return view('/admin/promotions/list')->with ('promotions',$promotions);
    }
}
