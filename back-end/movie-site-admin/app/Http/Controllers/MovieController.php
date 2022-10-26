<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    // redirect to movie management
    public function showManagement(){
        return view('admin.movie_management.management');
    }

    // redirect to movie list
    public function showList(){
        return view('admin.movie_management.list');
    }

    // insert data
    public function insertData(Request $req){

        // checking validation
        $validator = $this->checkMovieValidation($req);
        if($validator->fails()){
            return back()->withErrors($validator)
            ->withInput();
        }

        $data = $this->getRequestData($req);

        $fileName = uniqid().$req->file('image')->getClientOriginalName();
        $req->file('image')->storeAs('public',$fileName);
        $data['image']= $fileName;

        Movie::create($data);

        return back()->with(['insertSuccess'=>'Movie inserted successfully!']);

    }

    /*------------------------ Private Functions ------------------------*/
    private function getRequestData($req){
        return [
            'title' => $req->title,
            'rating' => $req->rating,
            'genre' => $req->genre,
            'rated' => $req->rated,
            'gdrive_link' => $req->glink,
            'mdrive_link' => $req->mlink,
            'description' => $req->description,
            'created_at' =>Carbon::now('GMT+6:30'),
            'updated_at' => Carbon::now('GMT+6:30'),
        ];
    }

    private function checkMovieValidation($req){
        $rules = [
            'title' => 'required',
            'image' =>'required|mimes:jpeg,png,gif,jpg',
            'rating' => 'required',
            'genre' => 'required',
            'rated' => 'required',
            'glink' => 'required',
            'mlink' => 'required',
            'description' => 'required',
        ];

        return Validator::make($req->all(),$rules);
    }
}
