@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('usuarios.store')}}" method="POST">
            @csrf
            @method('POST')

            <label for="name">Nombre </label>
            <input type="text" name="name" class="form form-control">

            <label for="email">Email </label>
            <input type="text" name="email" class="form form-control">

            <label for="password">Password </label>
            <input type="password" name="password" class="form form-control">

            <select name="role" id="type">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>

            <input type="submit" class="btn btn-primary" value="Crear">
            <br/>
            <br/>
        </form>
    </div>
@endsection
