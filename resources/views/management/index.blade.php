@extends('layouts.app')

@section('content')


    <div class="col-lg-12">
        <h1 class="my-4">Usuarios</h1>
        <a class="btn btn-primary" style="margin-bottom: 5px" href="{{route('usuarios.create')}}">Nuevo usuario</a>
        <table class="table">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th></th>
                <th></th>
            </tr>
            @foreach($users as $user)
                @foreach ($user->roles as $role)

                <tr>

                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$role->name}}</td>
                    <td><a class="btn btn-primary" href="{{route('usuarios.edit',$user->id)}}">Editar</a>
                    </td>
                    <td><form action="{{route('usuarios.destroy', $user->id)}}"method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form></td>
                </tr>

                @endforeach
            @endforeach


            </thead>
        </table>
    </div>


@endsection
