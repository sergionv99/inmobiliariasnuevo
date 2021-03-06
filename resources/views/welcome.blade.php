@extends('layouts.app')
@section('content')
        <div class="container">
            <div class="content">
                <div>
                    <article class="buscador">
                    <form action="{{route('buscar')}}">
                        <label class="h2" for="search">¿Donde te gustaria vivir?</label>
                        <br>
                        <input  type="text" name="search">
                        <input type="submit" value="Buscar">
                    </form>
                    </article>
                </div>
                <section class="base_prod">
                    @foreach($properties as $property)
                        @if($property->published == 0)
                            @if(Auth::user())
                                @if($property->id_user != $user)
                                <article class="card inmueble">
                                    <a class="colores-txt" href="{{route('propiedades.show', $property->id)}}">
                                    <img style="width: 450px" src="{{asset('storage/'.$property->facade)}}">
                                    <article class="grid-menu">
                                        <div class="txt-prod"><span class="city">{{$property->city}}</span></div>
                                        <div class="txt-prod"><span class="direccion">{{$property->direction}}</span></div>
                                        <div class="txt-prod"><span class="precio">{{$property->price}}€@if($property->state == 'alquiler')/mes @endif</span></div>

                                            @if(Auth::user()->hasRole('admin'))
                                                <form action="{{route('propiedades.destroy', $property->id)}}"method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                                </form>
                                            @endif
                                    </article>

                                    </a>
                                    </article>

                                @endif

                            @else
                                <article class="card inmueble">
                                    <a class="colores-txt" href="{{route('propiedades.show', $property->id)}}">
                                        <img style="width: 450px" src="{{asset('storage/'.$property->facade)}}">
                                        <article class="grid-menu">
                                            <div class="txt-prod"><span class="city">{{$property->city}}</span></div>
                                            <div class="txt-prod"><span class="direccion">{{$property->direction}}</span></div>
                                            <div class="txt-prod"><span class="precio">{{$property->price}}€@if($property->state == 'alquiler')/mes @endif</span></div>
                                        </article>

                                    </a>
                                </article>

                                @endif

                                @endif




                    @endforeach
                </section>
            </div>
        </div>
@endsection
