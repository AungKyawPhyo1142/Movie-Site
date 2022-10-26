<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    // redirect to movie management
    public function showManagement(){
        return view('admin.movie_management.management');
    }

    // redirect to movie list
    public function showList(){
        $data = Movie::paginate(3);
        return view('admin.movie_management.list',compact('data'));
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

    // delete data
    public function deleteData($id){
        // delete image form public
        $dbImage = Movie::select('image')->where('id',$id)->first();
        Storage::delete('public/'.$dbImage->image);
        // delete the record
        Movie::where('id',$id)->delete();
        return back()->with(['deleteSuccess'=>'Movie deleted successfully!']);
    }

    // search data
    public function searchData(Request $req){
        $searchKey = $req->searchKey;
        $data = Movie::   orWhere('title','like','%'.$searchKey.'%')
                        ->orWhere('rating','like','%'.$searchKey.'%')
                        ->orWhere('rated','like','%'.$searchKey.'%')
                        ->orWhere('genre','like','%'.$searchKey.'%')
                        ->paginate(3);

        return view('admin.movie_management.list',compact('data'));

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
