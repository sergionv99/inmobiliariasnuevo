@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>NUEVOCASAS</h1>

        <section class="product_style">
            <div id="carouselExampleControls" class="carousel slide" data-interval="false" data-ride="carousel">
                <div class="carousel-inner">
                    @php
                        $tam =0;
                    @endphp
                    @foreach($photospropertys as $photos)
                        {{--                    <p>{{$tam}}</p>--}}

                        <div class="carousel-item {{ $loop->first ? ' active' : '' }}">
                            <img id=" {{$tam = $tam + 1}}" src="{{asset('storage/'.$photos->photo)}}" style="width: 500px">
                            <p class="slider-n">{{$tam ?? ''}}/{{$total}}</p>
                        </div>

                    @endforeach

                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>

                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>

                </a>
            </div>
            <div>
                @if($property->type == "casa" && $property->state=="venta")
                    <p>{{$property->type}} a la {{$property->state}} en {{$property->city}}</p>
                @elseif($property->type == "casa" && $property->state=="alquiler"))
                <p>{{$property->type}} {{$property->state}} en {{$property->city}}</p>
                @elseif($property->type == "piso" && $property->state=="alquiler"))
                <p>{{$property->type}} {{$property->state}} en {{$property->city}}</p>
                @elseif($property->type == "piso" && $property->state=="venta")
                    <p>{{$property->type}} a la {{$property->state}} en {{$property->city}}</p>

                @endif
                <h2>{{$property->price}} €</h2>

                <p class="prueba">Descripcion: {{$property->description}}</p>

                <iframe
                        width="300"
                        height="170"
                        frameborder="0"
                        scrolling="no"
                        marginheight="0"
                        marginwidth="0"
                        src="https://maps.google.com/maps?q={{$latitud}},{{$longitud}}&hl=es&z=14&amp;output=embed"
                        src="https://maps.google.com/maps?q='+41.302394+','+2.001741+'&hl=es&z=14&amp;output=embed"
                >
                </iframe>

            </div>

        </section>
        <button onclick="myFunction()">Pulsar</button>

        <section style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr">


            <br>
            <p>Direccion: {{$property->direction}}</p>
            <p>Ciudad: {{$property->city}}</p>
            <p>Codigo postal: {{$property->cp}}</p>
            <p>Ciudad: {{$property->city}}</p>


        </section>
    </div>
@endsection
