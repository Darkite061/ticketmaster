<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ClienteProductoController extends Controller
{
    //
    public function catalogo(){
        $events = DB :: table ('events')->where('status','ACTIVE')->get();
        return view('/catalogo/producto')->with ('events',$events);
    }

    public function detalle($id){
        $events = DB :: table ('events')->where('id',$id)->where('status','ACTIVE')->first();
        return view('/catalogo/detalle')->with ('events',$events);
    }

}
