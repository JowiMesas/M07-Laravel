<x-app-layout>
    <div class="container mt-5">
        <h1 class="text-center text-danger display-4">🎥 Cartelera de Películas</h1>

        <!-- Lista de enlaces con efecto hover -->
        <ul class="list-group mt-4">
            <li>
                <a href="/filmout/oldFilms" class="list-group-item list-group-item-action bg-white text-danger border-danger font-weight-bold">🎞️ Pelis Antiguas</a>
            </li>
            <li>
                <a href="/filmout/newFilms" class="list-group-item list-group-item-action bg-white text-danger border-danger font-weight-bold">🎬 Pelis Nuevas</a>
            </li>
            <li>
                <a href="/filmout/listFilms" class="list-group-item list-group-item-action bg-white text-danger border-danger font-weight-bold">📜 Lista Completa</a>
            </li>
            <li>
                <a href="/filmout/sortFilms" class="list-group-item list-group-item-action bg-white text-danger border-danger font-weight-bold">📉 Películas Descendentes</a>
            </li>
            <li>
                <a href="/filmout/countFilms" class="list-group-item list-group-item-action bg-white text-danger border-danger font-weight-bold">🔢 Contador de Películas</a>
            </li>
        </ul>

        <!-- Mensaje de error animado -->
        @if (session('peliculaExistente'))
            <div class="alert alert-danger text-center mt-4 animated fadeIn">
                {{session('peliculaExistente')}}
            </div>
        @endif

        <!-- Formulario de Añadir Película -->
        <div class="card bg-light text-danger mt-5 shadow-lg border border-danger">
            <div class="card-body">
                <h2 class="text-center mb-4">🎬 Añadir Nueva Película</h2>

                <form action="{{action('App\Http\Controllers\FilmController@createFilm')}}" method="post">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="nombrePelicula">📌 Nombre:</label>
                        <input type="text" name="nombrePelicula" class="form-control bg-white text-dark border-danger" required>
                    </div>

                    <div class="form-group">
                        <label for="year">📅 Año:</label>
                        <input type="number" name="year" class="form-control bg-white text-dark border-danger" required>
                    </div>

                    <div class="form-group">
                        <label for="genero">🎭 Género:</label>
                        <input type="text" name="genero" class="form-control bg-white text-dark border-danger" required>
                    </div>

                    <div class="form-group">
                        <label for="pais">🌍 País:</label>
                        <input type="text" name="pais" class="form-control bg-white text-dark border-danger" required>
                    </div>

                    <div class="form-group">
                        <label for="duracion">⏳ Duración (min):</label>
                        <input type="number" name="duracion" class="form-control bg-white text-dark border-danger" required>
                    </div>

                    <div class="form-group">
                        <label for="imagenUrl">🖼️ Imagen URL:</label>
                        <input type="text" name="imagenUrl" class="form-control bg-white text-dark border-danger" required>
                    </div>

                    @error('errorUrl')
                        <div class="alert alert-danger mt-2">
                            {{$message}}
                        </div>
                    @enderror

                    <button type="submit" class="btn btn-danger btn-lg btn-block mt-3">🎫 Enviar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
