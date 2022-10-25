<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // redirect to profile > details
    public function myProfile(){
        return view('admin.profile.details');
    }
}
