<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class purchasesController extends Controller
{
    public function index()
    {
        $purchases = DB :: table ('purchases')->where('status','ACTIVE')->get();
        return view('/admin/purchases/list')->with ('purchases',$purchases);
    }

    public function create()
    {
        return view('/admin/purchases/create');
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
        $purchases = DB::table('purchases')->where('id',$id)->first();
        return view('/admin/purchases/show')->with ('purchases',$purchases);
    }

    public function edit($id)
    {
        $purchases = DB::table('purchases')->where('id',$id)->first();
        return view('/admin/purchases/edit')->with ('purchases',$purchases);
    }

    public function update(Request $request, $id)
    {
        DB::table('purchases')->where('id',$id)
        ->update([
            'user_id' => $request ->user_id,
            'date' =>$request ->date,
            'total_amount' =>$request ->total_amount,
            'updated_at' => now(),
        ]);
        $purchases = DB :: table ('purchases')->where('status','ACTIVE')->get();
        return view('/admin/purchases/list')->with ('purchases',$purchases)->with ('mensaje','registro realizado');
    }

    public function destroy($id)
    {
        DB::table('purchases')->where('id',$id)
        ->update([
            
            'status' =>"INACTIVE",
        ]);
        $promotions = DB :: table ('purchases')->where('status','ACTIVE')->get();
        return view('/admin/purchases/list')->with ('purchases',$purchases);
    }
}
