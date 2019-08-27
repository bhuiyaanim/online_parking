<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Space;
use Validator;
use App\Http\Requests\ParkingSpaceRequest;


class HomeController extends Controller
{
    public function sessionCheck($req){
        if($req->session()->has('username')){
            return true;
        }else{
            return false;
        }
    }

    public function index(Request $req){

        if($this->sessionCheck($req)){
            return view('home.index');
        }else{
            return redirect()->route('login.index');
        }

    }
 
}








