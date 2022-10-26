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
}
