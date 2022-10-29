<?php

namespace App\Http\Controllers\API;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    // get all movies from db
    public function getAllMovies(){
        $movies = Movie::get();
        return response()->json([
            'movies' => $movies
        ], 200);
    }

    // get the details of a specific movie
    public function getDetailMovie(Request $req){
        $movie = Movie::where('id',$req->id)->first();
        return response()->json([
            'movie' => $movie
        ], 200);
    }

    // get all movie posters
    public function getAllMoviePosters(){
        $posters = Movie::select('image')->get(3);
        return response()->json([
            'posters' => $posters
        ], 200);
    }

    // search Movie
    public function searchMovie(Request $req){
        $movie = Movie::where('title','like','%'.$req->key.'%')->get();
        return response()->json([
            'result' => $movie
        ], 200);
    }
}
