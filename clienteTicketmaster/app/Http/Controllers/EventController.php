<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    
    public function eventList()
    {
        $events = Product::all();

        return view('events', compact('events'));
    }
}
