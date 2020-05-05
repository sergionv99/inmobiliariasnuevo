@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('usuarios.update', $user->id)}}" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Nombre </label>
            <input type="text" name="name" class="form form-control" value="{{$user->name}}">

            <label for="email">Email </label>
            <input type="text" name="email" class="form form-control" value="{{$user->email}}">

            <label for="password">Password </label>
            <input type="password" name="password" class="form form-control">

            @if(Auth::user()->hasRole('admin'))
            <select name="role" id="type">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            @endif

            <input type="submit" class="btn btn-primary" value="Actualizar">
            <br/>
            <br/>
        </form>
    </div>
@endsection
