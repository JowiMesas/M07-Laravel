<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies List</title>

    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Include any additional stylesheets or scripts here -->
</head>

<body class="container">

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
    <!-- Add Bootstrap JS and Popper.js (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Include any additional HTML or Blade directives here -->

</body>

</html>
