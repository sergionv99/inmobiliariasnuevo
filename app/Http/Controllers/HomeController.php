<?php

namespace App\Http\Controllers;

use App\Propierty;
use App\User;
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
        if(auth()->user()){
            $user = auth()->user()->id;

            return view('welcome',compact('properties','user'));
        }
        else{
            return view('welcome',compact('properties'));

        }
    }

    public function busqueda(Request $request)
    {
        $input = $request->all();

        $busqueda =$request->search;

        $properties= Propierty::all();

        if($busqueda){
            $properties = Propierty::where("city", "LIKE", "%{$request->get('search')}%")
            ->orWhere("direction", "LIKE", "%{$request->get('search')}%")
            ->orWhere("referencia", "LIKE", "%{$request->get('search')}%")

                ->paginate(25);

            if(auth()->user()){
                $user = auth()->user()->id;

                return view('welcome',compact('properties','user','busqueda'));
            }
            else{
                return view('welcome',compact('properties','busqueda'));

            }

        }
    }




}
