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


class UserBookingController extends Controller
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

            $std = Space::all();
            $c = Space::all()->count();
            return view('userbooking.index', ['space'=>$std], ['count'=>$c]);

        }else{
            return redirect()->route('login.index');
        }

    }

    public function show(Request $req){

        if($this->sessionCheck($req)){

            $name = $req->session()->get('name');
            $my = DB::table('bookings')->where('name', $name)->get();
            $result = json_decode($my, true);
            
            $c = DB::table('bookings')->where('name', $name)->get()->count();

            return view('userbooking.show', ['list'=>$result], ['count'=>$c]);

        }else{
            return redirect()->route('login.index');
        }


    }

    public function confirm(Request $req, $bid){

        if($this->sessionCheck($req)){
            
            $test = DB::table('spaces')->where('spaceId', $bid)->get();

            $req->session()->put('id', $test[0]->spaceId);
            $req->session()->put('psname', $test[0]->name);
            $location = $test[0]->houseNo.", ".$test[0]->roadNo.", ".$test[0]->area;
            $req->session()->put('location', $location);

            $b = Space::find($bid);
            
            return view('userbooking.confirm', ['spc'=> $b]);

        }else{
            return redirect()->route('login.index');
        }
    }

    public function make(Request $req, $bid){

        $username = $req->session()->get('name');
        $email = $req->session()->get('email');
        $number = $req->session()->get('number');

        $id = $req->session()->get('id');
        $psname = $req->session()->get('psname');
        $location = $req->session()->get('location');
            //echo $id;
        //$spaceId = $req->session()->put('id');

            $test = DB::table('bookings')->where('name', $username)->where('date', $req->date)->where('psname', $psname)->where('time', $req->time)->where('vnumber', $req->vnumber)->get();
            

            if (count($test) > 0) {

                $req->session()->flash('msg', "You have already booked a parking");
                return redirect()->route('userbooking.confirm');

            }else{

                $booking = new Booking();
                $bookinglist = new Bookinglist();

                $booking->name = $username;
                $booking->email = $email;
                $booking->number = $number;
                $booking->psname = $psname;
                $booking->spaceId = $id;
                $booking->bookinglistID = $id;
                $booking->location = $location;
                $booking->date = $req->date;
                $booking->time = $req->time;
                $booking->duration = $req->duration;
                $booking->vnumber = $req->vnumber;
                $booking->type = $req->type;
                $charge = DB::table('spaces')->where('name', $psname)->get();
                $a = (int)$req->duration;
                $b = (int)$charge[0]->charge;
                $c = $a * $b;
                $booking->tc = $c;
                $booking->save();
                
                $bookinglist = Bookinglist::find($bid);
                //echo $bookinglist;
                $bookinglist->name = $psname;
                $bookinglist->location = $location;
                $bookinglist->count = DB::table('bookings')->where('name', $psname)->get()->count();
                $x = (int)$bookinglist->count;
                $y = $x * $b;
                $bookinglist->tc = $y;
                $bookinglist->spaceId = $id;
                $bookinglist->save();

                $result = DB::table('bookings')->where('name', $username)->where('email', $email)->where('vnumber', $req->vnumber)->get();

                return redirect()->route('userbooking.details', $result[0]->id);

            }



    }

    public function details(Request $req, $bid){

        if($this->sessionCheck($req)){

            $b = Booking::find($bid);
            return view('userbooking.details', ['std'=> $b]);

        }else{
            return redirect()->route('login.index');
        }
    }

    public function edit(Request $req, $bid){
        
            $b = Booking::find($bid);
            return view('userbooking.edit', ['std'=> $b]);

    }

    public function update(Request $req, $bid){

            $username = $req->session()->get('name');
            $email = $req->session()->get('email');
            $number = $req->session()->get('number');

            $test = DB::table('bookings')->where('name', $username)->where('date', $req->date)->where('psname', $req->psname)->where('time', $req->time)->where('vnumber', $req->vnumber)->get();
                
            if (count($test) > 0) {

                $req->session()->flash('msg', "You have already booked a parking");
                return redirect()->route('userbooking.confirm');

            }else{

                $id = DB::table('bookinglists')->where('name', $req->psname)->get();
                $charge = DB::table('spaces')->where('name', $req->psname)->get();

                $booking = new Booking();
                $booking = Booking::find($bid);

                $booking->name = $username;
                $booking->email = $email;
                $booking->number = $number;
                $booking->psname = $req->psname;
                $booking->bookinglistID = $id[0]->id;
                $booking->location = $id[0]->location;
                $booking->date = $req->date;
                $booking->time = $req->time;
                $booking->duration = $req->duration;
                $booking->vnumber = $req->vnumber;
                $booking->type = $req->type;
                
                $a = (int)$req->duration;
                $b = (int)$charge[0]->charge;
                $sum = $a * $b;
                $booking->tc = $sum;    
                
                $booking->save();

                $bookinglist = new Bookinglist();

                $bookinglist = Bookinglist::find($id[0]->id);
                $bookinglist->name = $id[0]->name;
                $bookinglist->location = $id[0]->location;
                $bookinglist->count = DB::table('bookings')->where('psname', $req->psname)->get()->count();

                $x = (int)$bookinglist->count;
                $y = $x * $b;
                $bookinglist->tc = $y;

                $bookinglist->save();
                    
                return redirect()->route('userbooking.show', $bid);
            }
        
    }

    public function delete(Request $req, $bid){
        if($this->sessionCheck($req)){

            $b = Booking::find($bid);
            return view('userbooking.delete', ['std'=> $b]);

        }else{
            return redirect()->route('login.index');
        }

    }

    public function destroy(Request $req, $bid){
        if($this->sessionCheck($req)){

            Booking::destroy($bid);

            return redirect()->route('userbooking.show');

        }else{
            return redirect()->route('login.index');
        }

    }



}