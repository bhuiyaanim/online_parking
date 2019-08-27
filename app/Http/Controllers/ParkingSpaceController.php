<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Space;
use App\Booking;
use App\Bookinglist;
use Validator;
use App\Http\Requests\ParkingSpaceRequest;


class ParkingSpaceController extends Controller
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
            return view('parkingspace.index');
        }else{
            return redirect()->route('login.index');
        }

    }

    public function details(Request $req, $sid){

        if($this->sessionCheck($req)){
            
            $s = Space::find($sid);
            return view('parkingspace.details', ['std'=> $s]);
        }else{
            return redirect()->route('login.index');
        }
    }

    public function add(Request $req){
        if($this->sessionCheck($req)){
            return view('parkingspace.add');
        }else{
            return redirect()->route('login.index');
        }
    	
    }
	
	public function create(ParkingSpaceRequest $req){

        if($this->sessionCheck($req)){

            $house = 'house No';
            $road = 'road No';
            $motorcycle = 'motorcycle';
            $car = 'car';
            $truck = 'truck';
            $buse = 'buse';

            $check = DB::table('spaces')->where('name', $req->name)->where('houseNo', $house." ".$req->houseNo)->where('roadNo', $road." ".$req->roadNo)->where('area', $req->area)->get();

            //echo $check;

            if(count($check) > 0){
                $req->session()->flash('msg', "Name or Location has already been taken");
                
                return redirect()->route('parkingspace.add');
            }else{

                $space  = new Space();
                
                $space->name = $req->name;
                $space->houseNo = $house." ".$req->houseNo;
                $space->roadNo = $road." ".$req->roadNo;
                $space->area = $req->area;
                $space->motorcycle = $motorcycle." ".$req->motorcycle;
                $space->car = $car." ".$req->car;
                $space->truck = $truck." ".$req->truck;
                $space->buse = $buse." ".$req->buse;
                $space->charge = $req->charge;
                
                $space->save();

                $bookinglist  = new Bookinglist();

                $bookinglist->name = $req->name;
                $bookinglist->location = $space->houseNo.", ".$space->roadNo.", ".$space->area;
                $bookinglist->count = 0;
                $bookinglist->tc = 0;

                $bookinglist->save();
                
                $result = DB::table('spaces')->where('name', $req->name)->get();

                
                return redirect()->route('parkingspace.details', $result[0]->spaceId);

            }

        }else{
            return redirect()->route('login.index');
        }


    }

    public function show(Request $req){

        if($this->sessionCheck($req)){
        	
            $std = Space::all();
            $c = Space::all()->count();
        	return view('parkingspace.show', ['stdlist'=>$std], ['count'=>$c]);
        
        }else{
            return redirect()->route('login.index');
        }

    }

    public function edit(Request $req, $sid){

        if($this->sessionCheck($req)){

        	$s = Space::find($sid);
        	return view('parkingspace.edit', ['std'=> $s]);
        
        }else{
            return redirect()->route('login.index');
        }


    }

    public function update(Request $req, $sid){

        if($this->sessionCheck($req)){

            $space = Space::find($sid);
            
            //echo "Works";
            //echo $space;

            $space->name = $req->name;
            $space->houseNo = $req->houseNo;
            $space->roadNo = $req->roadNo;
            $space->area = $req->area;
            $space->motorcycle = $req->motorcycle;
            $space->car = $req->car;
            $space->truck = $req->truck;
            $space->buse = $req->buse;
            $space->charge = $req->charge;
            $space->save();

            $s = DB::table('spaces')->where('spaceId', $sid)->get();

            $bookinglist  = new Bookinglist();
            $bookinglist = Bookinglist::find($s[0]->spaceId);
            $bookinglist->name = $s[0]->name;
            $bookinglist->location = $s[0]->houseNo.", ".$s[0]->roadNo.", ".$s[0]->area;
            $count = DB::table('bookings')->where('bookinglistID', $bookinglist->id)->get()->count();
            $bookinglist->count = $count;
            $x = (int)$bookinglist->count;
            $y = (int)$s[0]->charge;
            $z = $x * $y;
            $bookinglist->tc = $z;
            $bookinglist->save();
            
            $result = DB::table('bookings')->where('spaceId', $sid)->get();
            
            foreach (json_decode($result) as $abc){

                $booking = new Booking();
                $test = get_object_vars($abc);
                $booking = Booking::find($test['id']);
                $location = $s[0]->houseNo.", ".$s[0]->roadNo.", ".$s[0]->area;
                $booking->where('spaceId', $s[0]->spaceId)->update(array('psname' => $s[0]->name), array('location' => $location));
            }
            

        	return redirect()->route('parkingspace.details', $sid);

        }else{
            return redirect()->route('login.index');
        }

	    
    }

    public function delete(Request $req, $sid){
    	
        if($this->sessionCheck($req)){

            $s = Space::find($sid);
        	return view('parkingspace.delete', ['std'=> $s]);

        }else{
            return redirect()->route('login.index');
        }

    }

    public function destroy(Request $req, $sid){
        if($this->sessionCheck($req)){

            Space::destroy($sid);
            return redirect()->route('parkingspace.spaceList');

        }else{
            return redirect()->route('login.index');
        }
        
    }

   
}








