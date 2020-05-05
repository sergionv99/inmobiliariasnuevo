@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>NUEVOCASAS</h1>

{{--        <a href="{{route('usuarios.create'}}">--}}
{{--        Crear Usuarios--}}
{{--        </a>--}}
        <a class="btn btn-primary links-cortos" href="{{route('usuarios.create')}}">Crear Propiedad </a>
        <section class="users_list">
            @foreach($users as $user)
                <a href="{{route('usuarios.show', $user->id)}}">
                <article>
                    <article>

                        <h1>{{$user->name}}</h1>
                        <p>{{$user->email}}</p>
                    </article>

                </article>
                </a>
                <form action="{{route('usuarios.destroy', $user->id)}}"method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            @endforeach

        </section>
    </div>
@endsection
