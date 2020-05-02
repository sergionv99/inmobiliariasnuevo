<?php

namespace App\Http\Controllers;

use App\Propierty;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //middleware ha de cumplir la condicion de estar logueado
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $properties= Propierty::all();
//        $request->user()->authorizeRoles(['user', 'admin']);
       return view('welcome',compact('properties'));
//        return view('home');


    }
}
