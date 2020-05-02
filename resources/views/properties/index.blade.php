@extends('layouts.app')

@section('content')
<div class="container">
   <h1>NUEVOCASAS</h1>

    <a href="{{route('propiedades.create')}}">Crear Propiedad</a>
    <section style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr; grid-gap:15px">

    @foreach($properties as $property)

        @if($property->id_user == $user)
        <article>
            <a href="{{route('propiedades.show', $property->id)}}">
            <article style="background-image: url('{{asset('storage/'.$property->facade)}}')">

            <h1>{{$property->city}}</h1>
            <p>{{$property->price}}€</p>
            <p>{{$property->area}} m2</p>
            <p>{{$property->direction}}</p>
            </article>
            </a>
            <p><a href="{{route('propiedades.edit', $property->id)}}">Edit</a></p>

            <form action="{{route('propiedades.destroy', $property->id)}}"method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar</button>
            </form>


        </article>
            @endif
        @endforeach

    </section>
</div>
@endsection
