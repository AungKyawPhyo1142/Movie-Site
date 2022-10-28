<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
        $file = $req->file('image');
        $fileName = uniqid().'_'.$req->file('image')->getClientOriginalName();
        $file->move(public_path().'/movie_posters',$fileName);
        $data['image']= $fileName;

        Movie::create($data);

        return back()->with(['insertSuccess'=>'Movie inserted successfully!']);

    }

    // delete data
    public function deleteData($id){
        // delete image form public
        $dbImage = Movie::select('image')->where('id',$id)->first();
        if(File::exists(public_path().'/movie_posters/'.$dbImage)){
            File::delete(public_path().'movie_posters/'.$dbImage);
        }
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

    // redirect to editPage
    public function editPage($id){
        $data = Movie::where('id',$id)->first();
        return view('admin.movie_management.editPage',compact('data'));
    }

    // update movie data
    public function updateData($id,Request $req){

        // check data validation
        $validator = $this->checkMovieUpdateValidation($req);
        if($validator->fails()){
            return back()->withErrors($validator)
                        ->withInput();
        }

        if(isset($req->image)){
            $this->update_with_image($id,$req);
        }
        else{
            $this->update_without_image($id,$req);
        }

        return redirect()->route('movie#list')->with(['updateSuccess'=>'Movie updated successfully!']);

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

    private function checkMovieUpdateValidation($req){
        $rules = [
            'title' => 'required',
            'image' =>'mimes:jpeg,png,gif,jpg',
            'rating' => 'required',
            'genre' => 'required',
            'rated' => 'required',
            'glink' => 'required',
            'mlink' => 'required',
            'description' => 'required',
        ];
        return Validator::make($req->all(),$rules);
    }

    private function update_with_image($id,$req){
        $file = $req->file('image');
        $fileName = uniqid().'_'.$file->getClientOriginalName();

        $data = Movie::where('id',$id)->first();

        if($data->image !=null){
            if(File::exists(public_path().'/movie_posters/'.$data->image)){
                File::delete(public_path().'/movie_posters/'.$data->image);
            }
        }

        $file->move(public_path().'/movie_posters/',$fileName);
        $data = $this->getRequestData($req);
        $data['image'] = $fileName;
        Movie::where('id',$id)->update($data);

    }

    private function update_without_image($id,$req){
        $data = $this->getRequestData($req);
        Movie::where('id',$id)->update($data);
    }

}
