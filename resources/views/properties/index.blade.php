@extends('layouts.app')

@section('content')
<div class="container">

    @if(Auth::user()->hasRole('user'))
    <a class="btn btn-primary links-cortos" href="{{route('propiedades.create')}}">Crear Propiedad </a>
    @endif
    <section class="base_prod">

    @foreach($properties as $property)
        @if($property->id_user == $user)
                <article class="card inmueble">
                    <a href="{{route('propiedades.show', $property->id)}}">
                        <img style="width: 450px" src="{{asset('storage/'.$property->facade)}}">
                        <article class="grid-menu">
                            <div class="txt-prod"><span class="textos-productos">{{$property->referencia}}</span><span class="textos-productos">{{$property->city}}</span></div>
                            <div class="txt-prod"><span class="textos-productos">{{$property->direction}}, {{$property->city}}</span></div>
                            <div class="txt-prod"><span class="textos-productos">{{$property->price}}€</span></div>

                            <div class="alinear">

                                    <a class="btn btn-primary links-cortos"  href="{{route('propiedades.edit', $property->id)}}">Edit</a>

                                    <form action="{{route('propiedades.destroy', $property->id)}}"method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Eliminar</button>
                                    </form>
                            </div>
                        </article>

                    </a>

                </article>
    </section>
            @endif
        @endforeach
</div>
@if(Auth::user())
    @if(Auth::user()->hasRole('admin'))
        <div class="col-lg-12">
            <h1 class="my-4">Propiedades</h1>
            <a class="btn btn-primary" style="margin-bottom: 5px" href="{{route('propiedades.create')}}">Crear Propiedad</a>
            <table class="table">
                <thead>
                <tr>
                    <th>Referencia</th>
                    <th>Fachada</th>
                    <th>Description</th>
                    <th>DUeño</th>
                    <th>Price</th>
                    <th>Type</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach($properties as $property)
                <tr>

                    <td>{{$property->referencia}}</td>
                    <td><img style="width: 100px; height: 70px" src="{{asset('storage/'.$property->facade)}}"></td>
                    <td>{{$property->description}}</td>
                    <td>{{$property->user()->get('name')}}</td>
                    <td>{{$property->price}}</td>
                    <td>{{$property->type}}</td>
                    <td><a class="btn btn-primary" href="{{route('propiedades.edit',$property->id)}}">Edit</a>

                    </td>
                    <td><form action="{{route('propiedades.destroy', $property->id)}}"method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form></td>
                </tr>
                    @endforeach


                </thead>
            </table>
        </div>

    @endif


@endif
@endsection

