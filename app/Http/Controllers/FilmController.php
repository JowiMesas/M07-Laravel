<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{

    /**
     * Read films from storage
     */
    public static function readFilms(): array {
        $films = Storage::json('/public/films.json');
        return $films;
    }
    /**
     * List films older than input year 
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listOldFilms($year = null)
    {        
        $old_films = [];
        if (is_null($year))
        $year = 2000;
    
        $title = "Listado de Pelis Antiguas (Antes de $year)";    
        $films = FilmController::readFilms();

        foreach ($films as $film) {
        //foreach ($this->datasource as $film) {
            if ($film['year'] < $year)
                $old_films[] = $film;
        }
        return view('films.list', ["films" => $old_films, "title" => $title]);
    }
    /**
     * List films younger than input year
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listNewFilms($year = null)
    {
        $new_films = [];
        if (is_null($year))
            $year = 2000;

        $title = "Listado de Pelis Nuevas (Después de $year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            if ($film['year'] >= $year)
                $new_films[] = $film;
        }
        return view('films.list', ["films" => $new_films, "title" => $title]);
    }
    /**
     * Lista TODAS las películas o filtra x año o categoría.
     */
    public function listFilms($year = null, $genre = null)
    {
        $films_filtered = [];

        $title = "Listado de todas las pelis";
        $films = FilmController::readFilms();

        //if year and genre are null
        if (is_null($year) && is_null($genre))
            return view('films.list', ["films" => $films, "title" => $title]);

        //list based on year or genre informed
        foreach ($films as $film) {
            if ((!is_null($year) && is_null($genre)) && $film['year'] == $year){
                $title = "Listado de todas las pelis filtrado x año";
                $films_filtered[] = $film;
            }else if((is_null($year) && !is_null($genre)) && strtolower($film['genre']) == strtolower($genre)){
                $title = "Listado de todas las pelis filtrado x categoria";
                $films_filtered[] = $film;
            }else if(!is_null($year) && !is_null($genre) && strtolower($film['genre']) == strtolower($genre) && $film['year'] == $year){
                $title = "Listado de todas las pelis filtrado x categoria y año";
                $films_filtered[] = $film;
            }
        }
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }
    public function listFilmsByYear ($year)
    {
        $new_films = [];

        $title = "Listado de Pelis (Después de $year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            if ($film['year'] == $year)
                $new_films[] = $film;
        }
        return view('films.list', ["films" => $new_films, "title" => $title]);
    }
    public function listFilmsByGenre ($genre)
    {
        $new_films = [];

        $title = "Listado de Pelis  (De Genero $genre)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            if ($film['genre'] == $genre)
                $new_films[] = $film;
        }
        return view('films.list', ["films" => $new_films, "title" => $title]);
    }
    public function listSortFilmsByYear ()
    {
        $new_films = [];

        $title = "Listado de Pelis Descendentes";
        $films = FilmController::readFilms();
        foreach ($films as $film) {
                $new_films[] = $film;
        }
        usort($new_films, function($a, $b) {return $a["year"] < $b["year"];});
        return view('films.list', ["films" => $new_films, "title" => $title]);
    }
    public function countFilms ()
    {
        $new_films = [];

        $title = "Total de Peliculas:";
        $films = FilmController::readFilms();
        foreach ($films as $film) {
                $new_films[] = $film;
        }
        $count = count($new_films);
        return view('films.count', ["count" => $count, "title" => $title]);
    }
    public function createFilm(Request $request) {
        $nuevaPelicula = [
            "name" => $request->nombrePelicula,
            "year"=> $request->year,
            "genre" => $request->genero,
            "country" => $request->pais,
            "duration" => $request->duracion,
            "img_url" => $request->imagenUrl
        ];
        if(FilmController::isFilm($nuevaPelicula["name"])) {
            session()->flash('peliculaExistente', '⚠️ Esta Pelicula ya existe!');
            return redirect('/');

        }
        $films = FilmController::readFilms();

        array_push($films, $nuevaPelicula);
       Storage::put('/public/films.json', json_encode($films));
        $title = "Pelicula: " . $nuevaPelicula["name"];
       return view("films.list", ["films" => $films, "title" => $title]);
    }
    public function isFilm($nombrePelicula): bool {
        $films = FilmController::readFilms();
        foreach ($films as $film) {
           if($film["name"] === $nombrePelicula) {
                return true;
           }
        }
        return false;
    }
}
