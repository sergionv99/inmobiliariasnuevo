@foreach($properties as $property)
    <article class="card inmueble">
        <a href="{{route('propiedades.show', $property->id)}}">
            @if(Auth::user())
                @if($user->hasRole('user')))
                <p>PUTA</p>
                @endif

            @endif

            <img style="width: 450px" src="{{asset('storage/'.$property->facade)}}">
            <article class="grid-menu">
                <div class="txt-prod"><span>{{$property->city}}</span></div>
                <div class="txt-prod">{{$property->direction}}</div>
                <div class="txt-prod">{{$property->price}}€</div>


                @if(Auth::user())
                    @if(Auth::user()->hasRole('admin'))
                        <form action="{{route('propiedades.destroy', $property->id)}}"method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    @endif
                @endif
            </article>



        </a>
    </article>
@endforeach

        @yield('ficha')
