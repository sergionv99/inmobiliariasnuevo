@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="{{route('propiedades.update',$property->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <br/>
            <label for="state">Que quieres hacer</label>

            <select name="state" id="state">
                @if($property->state == "venta");
                <option value="venta" selected="selected">Venta</option>
                <option value="alquiler">Alquiler</option>
                @else
                    <option value="venta">Venta</option>
                    <option value="alquiler" selected="selected">Alquiler</option>
                @endif
            </select>

            <label for="type">Inmueble</label>

            <select name="type" id="type">
                @if($property->type == "casa");
                <option value="casa" selected="selected">Casa</option>
                <option value="piso">Piso</option>
                   @else
                    <option value="casa">Casa</option>
                    <option value="piso" selected="selected">Piso</option>
                    @endif
            </select>

            <label for="description">Descripcion </label>
            <input type="text" name="description" value="{{$property->description}}" class="form form-control">

            <label for="price">Price </label>
            <input type="number" name="price" value="{{$property->price}}" class="form form-control">

            <label for="area">Area </label>
            <input type="number" name="area" value="{{$property->area}}" class="form form-control">

            <label for="direction">Direccion</label>
            <input type="text" name="direction" value="{{$property->direction}}" class="form form-control">

            <label for="city">Ciudad </label>
            <input type="city" name="city" value="{{$property->city}}" class="form form-control">

            <label for="cp">Codigo Postal</label>
            <input type="number" name="cp" value="{{$property->cp}}" class="form form-control">

            <label for="province">Provincia</label>
            <input type="text" name="province" value="{{$property->province}}" class="form form-control">

            <label for="facade">Portada</label>
            <input type="file" name="facade">

            <label for="photo">Imagenes</label>
            <input type="file" name="photo[]" multiple>

            <label for="published">Publicar</label>
            <input type="checkbox" name="published" multiple>

            <input type="submit" class="btn btn-primary" value="Crear">
            <br/>
            <br/>

{{--            @foreach($photospropertys as $photos)--}}
{{--                <div class="carousel-item {{ $loop->first ? ' active' : '' }}">--}}
{{--                    <img src="{{asset('storage/'.$photos->photo)}}" style="width: 500px">--}}
{{--                </div>--}}

{{--                <form action="{{route('fotografias.destroy', $photos->id)}}"method="POST">--}}
{{--                    @csrf--}}
{{--                    @method('DELETE')--}}
{{--                    <button type="submit">Eliminar</button>--}}
{{--                </form>--}}

{{--            @endforeach--}}

        </form>

            <form action="{{route('propiedades.destroy', $property->id)}}"method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar</button>
            </form>








    </div>

@endsection
