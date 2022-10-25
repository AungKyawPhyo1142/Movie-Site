<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // redirect to profile > details
    public function myProfile(){
        return view('admin.profile.details');
    }

    // redirect to admin management
    public function showManagement(){
        $data = User::get();
        return view('admin.admin_management.management',compact('data'));
    }

    // insert data
    public function insertData(Request $req){

        // data validation
        $validator = $this->checkAccountValidation($req);
        if($validator->fails()){
                        return back()->withErrors($validator)
                        ->withInput();
        }

        // get data from request
        $data = $this->getRequestData($req);
        User::create($data);
        return redirect()->route('admin#management')->with(['insertSuccess'=>'Admin data inserted successfully!']);
    }

    // delete data
    public function deleteData($id){
        User::where('id',$id)->delete();
        return redirect()->route('admin#management')->with(['deleteSuccess'=>'Admin data deleted successfully!']);
    }

    /*---------------------- Private Functions ----------------------*/
    private function getRequestData($req){
        return [
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'gender' => $req->gender,
            'address' => $req->address,
            'password' => Hash::make($req->password)
        ];
    }

    private function checkAccountValidation($req){
        $validator = Validator::make($req->all(),[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:8',
            'confirmpassword' => 'required|same:password',
            'gender' => 'required',
            'address' => 'required'
        ]);
        return $validator;
    }

}
