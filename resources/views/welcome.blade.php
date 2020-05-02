<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    NUEVOCASAS
                </div>
                <section style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr">
                    @foreach($properties as $property)
                        <article>
                            <h1>{{$property->city}}</h1>
                            <p>{{$property->price}}</p>
                            <p>{{$property->direction}}</p>

                        </article>
                    @endforeach

                </section>
                <a href="{{route('propiedades.index')}}">Todas las propiedades</a>
                <section>
                    <article> <a href="{{route('propiedades.create')}}">Vende/Alquila tu inmueble</a></article>
                </section>
                <div>

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d478.8450236456594!2d2.0010732088978846!3d41.31135295503065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a49cdc69f52877%3A0xd91754c43aa2119e!2sAv.%20de%20la%20Riera%20de%20Sant%20Lloren%C3%A7%2C%20Barcelona!5e0!3m2!1ses!2ses!4v1588434353481!5m2!1ses!2ses" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </body>
</html>
