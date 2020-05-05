@extends('layouts.app')

@section('content')

    <div class="container">
        @if(Auth::user())
        <a href="{{route('propiedades.index')}}">Atras</a>
        @else
            <a href="{{route('/')}}">Atras</a>
            @endif

        <section class="product_style">
            @if($photospropertys)
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
                            <p>  {{$photos->id}} </p>
                        </div>

                    @endforeach



                </div>

                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" >

<svg width="44" height="46" viewBox="0 0 44 46" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect x="-0.500132" y="-0.499731" width="42.9882" height="44" transform="matrix(-1 0.000537106 -0.000263414 -1 42.9996 44.0008)" fill="#F0F0F0" stroke="black"/>
<path d="M1.6648 24.2593C1.11849 23.8546 1.12355 23.0362 1.6748 22.6422L18.8618 10.3599C19.5257 9.88543 20.4502 10.3667 20.4451 11.1841L20.2912 36.0866C20.2862 36.904 19.3558 37.3669 18.6979 36.8794L1.6648 24.2593Z" fill="black"/>
<rect x="17.1388" y="18.8234" width="25.5566" height="9.44506" rx="2" fill="black"/>
</svg>

</span>
</a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" style="margin-right:25px">


<svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect x="0.499944" y="0.49992" width="43.0241" height="43.9177" transform="matrix(1 -0.000159545 -0.000112027 1 0.0170238 0.0236546)" fill="#F0F0F0" stroke="black"/>
<path d="M42.376 20.74C42.9235 21.1449 42.9181 21.9649 42.3654 22.3586L25.1604 34.6115C24.4962 35.0845 23.5731 34.6028 23.5784 33.786L23.7418 8.93016C23.7472 8.11335 24.6766 7.65055 25.3344 8.13709L42.376 20.74Z" fill="black"/>
<rect x="26.8903" y="26.1624" width="25.5775" height="9.42779" rx="2" transform="rotate(-179.978 26.8903 26.1624)" fill="black"/>
</svg>


</span>

                </a>
                @endif
            </div>

            <div>
                @if($property->type == "casa" && $property->state=="venta")
                    <p>{{$property->type}} a la {{$property->state}} en {{$property->city}} (referencia: {{$property->referencia}})</p>
                @elseif($property->type == "casa" && $property->state=="alquiler")
                <p>{{$property->type}} {{$property->state}} en {{$property->city}} (referencia: {{$property->referencia}})</p>
                @elseif($property->type == "piso" && $property->state=="alquiler")
                <p>{{$property->type}} {{$property->state}} en {{$property->city}} (referencia: {{$property->referencia}})</p>
                @elseif($property->type == "piso" && $property->state=="venta")
                    <p>{{$property->type}} a la {{$property->state}} en {{$property->city}} (referencia: {{$property->referencia}})</p>
                @endif
                <h2>{{$property->price}}@if($property->type == "alquiler") @endif€/mes</h2>

                <p class="prueba">{{$property->description}}</p>
                <a href="tel:603540580">Mas informacion</a>
                <p class="prueba">Direccion: {{$property->direction}} {{$property->city}} {{$property->cp}}</p>

                <iframe
                        width="300"
                        height="170"
                        frameborder="0"
                        scrolling="no"
                        marginheight="0"
                        marginwidth="0"
                        src="https://maps.google.com/maps?q={{$latitud}},{{$longitud}}&hl=es&z=14&amp;output=embed"
                >
                </iframe>

            </div>

        </section>
    </div>
@endsection
