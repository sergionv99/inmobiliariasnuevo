@extends('layouts.app')

@section('content')
    <div>

        <h1 class="my-4">Property edit</h1>
        <form action="{{route('propiedades.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <br/>
            <label for="state">Que quieres hacer</label>

            <select name="state" id="state">
                <option value="venta">Vender</option>
                <option value="alquiler">Alquilar</option>
            </select>

            <label for="type">Inmueble</label>

            <select name="type" id="type">
                <option value="casa">Casa</option>
                <option value="piso">Piso</option>
                <option value="terreno">Terreno</option>
            </select>

            <label for="description">Descripcion </label>
            <input type="text" name="description" class="form form-control">

            <label for="price">Price </label>
            <input type="number" name="price" class="form form-control">

            <label for="area">Area </label>
            <input type="number" name="area" class="form form-control">

            <label for="direction">Direccion</label>
            <input type="text" name="direction" class="form form-control">

            <label for="city">Ciudad </label>
            <input type="city" name="city" class="form form-control">

            <label for="cp">Codigo Postal</label>
            <input type="number" name="cp" class="form form-control">

            <label for="province">Provincia</label>
            <input type="text" name="province" class="form form-control">

            <label for="facade">Portada</label>
            <input type="file" name="facade" class="form form-control">

            <label for="photo">Imagenes</label>
            <input type="file" name="photo[]" multiple>

            <label for="published">Publicar</label>
            <input type="checkbox" name="published" multiple>

            <input type="submit" class="btn btn-primary" value="Crear">
            <br/>
            <br/>
        </form>
        <br/>
    </div>

@endsection
