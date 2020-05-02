@extends('layouts.app')

@section('content')
    <div class="col-lg-12">

        <h1 class="my-4">Property edit</h1>
        <form action="{{route('propiedades.update',$property->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            Description
            <br/>
            <input type="text" name="city" value="{{$property->city}}" class="form form-control">
            Price
            <br/>
            <input type="number" step="any" name="price" value="{{$property->price}}" class="form form-control">
            Owner
            <br/>
            <input class="list-group " list="owner_id" name="owner_id" value="{{$property->id_user}}">
{{--            @foreach($users as $user)--}}
{{--                <datalist id="owner_id">--}}
{{--                    <option value="{{$user->id}}">{{$user->email}}</option>--}}
{{--                </datalist>--}}
{{--            @endforeach--}}
            <br/>

{{--            Cargar las imagene directamente con un img para que el usaruio vea las que tiene--}}
            <label for="photo">Imagenes</label>
            <input type="file" name="photo[]" multiple>

            <input type="submit" class="btn btn-primary" value="Save">

            <br/>
            <br/>
        </form>
        <br/>
    </div>

@endsection
