<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    
    public function eventList()
    {
        $events = DB :: table ('events')->where('status','ACTIVE')->get();
        return view('/catalogo/producto')->with ('events',$events);
        // $events = Product::all();

        // return view('events', compact('events'));
    }
}
