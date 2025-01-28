

<x-app-layout>
    <div>
        <h1 class="mt-4">Lista de Peliculas</h1>
        <ul>
            <li><a href=/filmout/oldFilms>Pelis antiguas</a></li>
            <li><a href=/filmout/newFilms>Pelis nuevas</a></li>
            <li><a href="/filmout/listFilms">Lista de Peliculas</a></li>
            <li><a href="/filmout/sortFilms">Peliculas Descendientes</a></li>
            <li><a href="/filmout/countFilms">Contar Peliculas</a></li>
        </ul>
        @if (session('peliculaExistente'))
        <span style="color:red; font-weight: bold;">{{session('peliculaExistente')}}</span>
        @endif
        <form action="{{action('App\Http\Controllers\FilmController@createFilm')}}" method="post">
            {{csrf_field()}}
            <h1 class="mt-4">Añadir Pelicula</h1>
            <label for="nombrePelicula">
                Nombre: 
                <input type="text" name="nombrePelicula" required>
            </label>
            <br> 
            <label for="year">
                Año:
                <input type="number" name="year" required>
            </label>
            <br> 
            <label for="genero">
                Genero:
                <input type="text" name="genero" required>
            </label>
            <br> 
            <label for="pais">
                Pais:
                <input type="text" name="pais" required>
            </label>
            <br> 
            <label for="duracion">
                Duracion:
                <input type="number" name="duracion" required>
            </label>
            <br> 
            <label for="imagenUrl">
                Imagen URL:
                <input type="text" name="imagenUrl" required>
            </label>
            @error('errorUrl')
                <span style="color: red; font-weight: bold; ">{{$message}}</span>
            @enderror
            <br>
            <input type="submit" value="Enviar">
        </form>
    </div>
</x-app-layout>
