<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LoginRequest;


class LoginController extends Controller
{
	public function index(){
		return view('login.index');
	}

	public function valid(LoginRequest $req){
		
		$result	= DB::table('users')->where('username', $req->uname)
				 ->where('password', $req->password)
				 ->get();

		//echo $result;

		if(count($result) > 0){
			$req->session()->put('userid', $result[0]->id);
			$req->session()->put('username', $req->uname);
			$req->session()->put('password', $req->password);
			$req->session()->put('name', $result[0]->name);
			$req->session()->put('email', $result[0]->email);
			$req->session()->put('number', $result[0]->number);
			$req->session()->put('type', $result[0]->type);

			if(session('type') == 'admin'){
				return redirect()->route('home.index');	
			}else{
				return redirect()->route('user.index');
			}
			
		}else{
			$req->session()->flash('msg', "invalid username or password!");
			
			return redirect()->route('login.index');
		}
	}

}
