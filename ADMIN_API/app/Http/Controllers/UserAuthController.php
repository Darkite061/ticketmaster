<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserAuthController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('sign-in.index');
    }

        /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function auth(Request $request)
    {
        //dd($request->all());
        $url="http://localhost:8010/23a-awos-api/api/login";
        $response = Http::post($url,
            ['email'=>$request->email,
            'password'=>$request->password,
            ]);
        //dd($response);
        $body = json_decode($response->body());

        $json = '$body->token';

        //dd($body);
        // Session::put(['api_key'=>$body->token]);
        Session::put(['api_key'=> $json]);
        // Session::put(['user'=> $body->user ]);
        Session::put(['user'=> 'user_Test' ]);
        //dd(Session::get('api_key'));
        
        if(isset($json)){
            Session::put('token',$json);
            return redirect('/categorias');
        }else{
            return view('/admin/plantilla/index')->with('success','Datos erroneos');
        }
    }

    public function out(Request $request){
        $url="http://localhost:8010/23a-awos-api/api/logout";
        //dd(Session::get('api_key'));
        $response=Http::withToken(Session::get('api_key'))->
        post($url);
        //dd($response);
        $body=json_decode($response->body());
        //dd($body);
        //dd($body->datos);
        // return view('sign-in.index', ['message'=>$body->message]);
        return view('/login');
    }

        /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {

        $url="http://localhost:8010/23a-awos-api/api/register";
        $response = Http::post($url,
            ['email'=>$request->email,
            'password'=>$request->password,
            ]);
        //dd($response->json());
        $body = json_decode($response->body());
        //$body=$response->json();
        dd($body);
        return redirect()->route('posts.index')
                        ->with('success',$body->mensaje);
    }

}
