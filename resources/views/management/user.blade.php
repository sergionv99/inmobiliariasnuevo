@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{route('propiedades.destroy', $property->id)}}"method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
   <h1>NUEVOCASAS</h1>

            <h2>{{$user->name}} €</h2>
            <p class="prueba">Descripcion: {{$user->email}}</p>
        </div>

    </section>
    <button onclick="myFunction()">Pulsar</button>
</div>
@endsection
