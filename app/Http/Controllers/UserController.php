<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\Propierty;
use App\User;
use App\Role_user;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $users=User::all();
        return view('management.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('management.newuser');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->user()->authorizeRoles(['admin']);
        $rol = $request->role;


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user
            ->roles()
            ->attach(Role::where('name', $rol)->first());

        return redirect()->route('usuarios.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = User::find($id);
        return view('management.user', compact('user'));
    }

    public function perfil()
    {
        $id_user = auth()->user()->id;
        $user = User::find($id_user);
        return view('welcome', compact( 'user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('management.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->user()->authorizeRoles(['admin']);
        $user = User::find($id);
        $pass = $request->password;
        $role_user_id = Role_user::all()->where('user_id', $id)->first();

        //Sacar al admin
        $id_user = auth()->user()->id;
        $admin = User::find($id_user);


//        var_dump($role);
//        die;
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email
        ]);

        if($pass != null){
            $user->update([
                'password' => Hash::make($pass)
            ]);
        }




        if($request->role != null){
            $role = $request->role;

            if($role == "admin"){
                $role_user_id->update([
                   'role_id'=> 2
                ]);
            }
            if($role =="user"){
                $role_user_id->update([
                    'role_id'=> 1
                ]);


            }

        }



        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('usuarios.index');
    }
}
