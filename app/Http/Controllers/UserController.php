<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Space;
use App\Booking;
use App\Bookinglist;
use Validator;
use App\Http\Requests\BookingRequest;


class UserController extends Controller
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
            return view('user.index');
        }else{
            return redirect()->route('login.index');
        }

    }

    public function details(Request $req, $uid){

        if($this->sessionCheck($req)){

            $userid = $req->session()->get('userid');
            $b = DB::table('users')->where('id', $userid)->get();
            $result = json_decode($b, true);
            //echo $b;
            return view('user.details', ['std'=> $result]);

        }else{
            return redirect()->route('login.index');
        }
    }

    public function edit(Request $req, $uid){

        if($this->sessionCheck($req)){
        
            $userid = $req->session()->get('userid');
            $b = DB::table('users')->where('id', $userid)->get();
            $result = json_decode($b, true);

            return view('user.edit', ['std'=> $result]);
        
        }else{
            return redirect()->route('login.index');
        }
        
    }

    public function update(Request $req, $uid){

        if($this->sessionCheck($req)){
            
            $user = new User();
            $b = DB::table('users')->where('id', $req->uid)->get();
            $user = User::find($req->uid);
            //$result = json_decode($b, true);
            //echo $user;
            $user->name = $req->name;
            $user->email = $req->email;
            $user->number = $req->number;
            $user->username = $req->username;
            $user->password = $req->password;
            
            //$user = $b;

            //echo $b;
            echo $user;
            //$user->save();
                
            //return redirect()->route('user.index');

        }else{
            return redirect()->route('login.index');
        }
        
    }

}








