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


class BookingController extends Controller
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
            return view('booking.index');
        }else{
            return redirect()->route('login.index');
        }

    }

    public function add(Request $req){
        if($this->sessionCheck($req)){
            return view('booking.add');
        }else{
            return redirect()->route('login.index');
        }

    }
    
    public function create(BookingRequest $req){
        if($this->sessionCheck($req)){

            $check = DB::table('spaces')->where('name', $req->psname)->get();

            //echo $check;

            if(count($check) > 0){

                $test = DB::table('bookings')->where('email', $req->email)->where('date', $req->date)->where('time', $req->time)->where('vnumber', $req->vnumber)->get();
                
                if (count($test) > 0) {

                    $req->session()->flash('msg', "You have already booked a parking");
                
                    return redirect()->route('booking.add');
                }else{

                    $booking = new Booking();
                    $bookinglist = new Bookinglist();

                    $a = (int)$req->duration;
                    $b = (int)$check[0]->charge;
                    $c = $a * $b;
                    //echo $c;
                    $id = DB::table('bookinglists')->where('name', $req->psname)->get();

                    $booking->name = $req->name;
                    $booking->email = $req->email;
                    $booking->number = $req->number;
                    $booking->psname = $req->psname;
                    $booking->spaceId = $check[0]->spaceId;
                    $booking->bookinglistID = $id[0]->id;
                    $booking->location = $check[0]->houseNo.", ".$check[0]->roadNo.", ".$check[0]->area;
                    $booking->date = $req->date;
                    $booking->time = $req->time;
                    $booking->duration = $req->duration;
                    $booking->vnumber = $req->vnumber;
                    $booking->type = $req->type;
                    $booking->tc = $c;
                    
                    $booking->save();
                
                    $bookinglist = Bookinglist::find($id[0]->id);
                    $bookinglist->name = $check[0]->name;
                    $bookinglist->location = $check[0]->houseNo.", ".$check[0]->roadNo.", ".$check[0]->area;
                    $count = DB::table('bookings')->where('psname', $booking->psname)->get()->count();
                    //$bookinglist->count = DB::table('bookings')->groupBy('psname')->count();

                    $x = (int)$count;
                    $y = $x * $b;

                    $bookinglist->tc = $y;

                    $bookinglist->save();

                    $result = DB::table('bookings')->where('name', $req->name)->get();

                    //echo "insert compleat";
                    return redirect()->route('booking.details', $result[0]->id);                           
                }

            }else{

                $req->session()->flash('msg', "Parking Name or Location does not exist");
                
                return redirect()->route('booking.add');
            }

        }else{
            return redirect()->route('login.index');
        }


    }

    public function details(Request $req, $bid){

        if($this->sessionCheck($req)){
            
            $b = Booking::find($bid);
            return view('booking.details', ['std'=> $b]);
        }else{
            return redirect()->route('login.index');
        }
    }

    public function show(Request $req){
        if($this->sessionCheck($req)){

            $std = Bookinglist::all();
            return view('booking.show', ['bookinglist'=>$std]);

        }else{
            return redirect()->route('login.index');
        }

    }

    public function more(Request $req){
        if($this->sessionCheck($req)){

            $all = Booking::all();
            $c = Booking::all()->count();

            return view('booking.more', ['newlist'=> $all], ['count'=>$c]);

        }else{
            return redirect()->route('login.index');
        }


    }

    public function total(Request $req, $bid){

        if($this->sessionCheck($req)){
            
            $bookinglist = new Bookinglist();
            $bookinglist = Bookinglist::find($bid);

            $bookinglist->name = $bookinglist->name;
            $bookinglist->location = $bookinglist->location;

            $count = DB::table('bookings')->where('psname', $bookinglist->name)->get()->count();
            $charge = DB::table('spaces')->where('name', $bookinglist->name)->get();
            $x = (int)$count;
            $y = (int)$charge[0]->charge;
            $sum = $x * $y;

            
            $bookinglist->count = $count;
            $bookinglist->tc = $sum;
            $bookinglist->save();

            $b = Bookinglist::find($bid);
        
            return view('booking.total', ['std'=> $b]);
        
        }else{
            return redirect()->route('login.index');
        }

    }

    public function edit(Request $req, $bid){
        if($this->sessionCheck($req)){

            $b = Booking::find($bid);
            return view('booking.edit', ['std'=> $b]);
        
        }else{
            return redirect()->route('login.index');
        }

    }

    public function update(BookingRequest $req, $bid){
        if($this->sessionCheck($req)){

            $id = DB::table('bookinglists')->where('name', $req->psname)->get();
            $sum = DB::table('spaces')->where('name', $req->psname)->get();

            $booking = new Booking();

            $booking = Booking::find($bid);

            $booking->name = $req->name;
            $booking->email = $req->email;
            $booking->number = $req->number;
            $booking->psname = $req->psname;
            $booking->bookinglistID = $id[0]->id;
            $booking->location = $id[0]->location;
            $booking->date = $req->date;
            $booking->time = $req->time;
            $booking->duration = $req->duration;
            $booking->vnumber = $req->vnumber;
            $booking->type = $req->type;
            
            $a = (int)$req->duration;
            $b = (int)$sum[0]->charge;
            $c = $a * $b;

            $booking->tc = $c;    
            $booking->save();

            $bookinglist = new Bookinglist();

            $bookinglist = Bookinglist::find($id[0]->id);
            $bookinglist->name = $id[0]->name;
            $bookinglist->location = $id[0]->location;
            $count = DB::table('bookings')->where('psname', $booking->psname)->get()->count();
            //$bookinglist->count = DB::table('bookings')->groupBy('psname')->count();

            $x = (int)$count;
            $y = $x * $b;

            $bookinglist->tc = $y;

            $bookinglist->save();
                
            return redirect()->route('booking.more', $bid);

        }else{
            return redirect()->route('login.index');
        }

        
    }

    public function delete(Request $req, $bid){
        
        if($this->sessionCheck($req)){
            //echo "test";
            $b = Booking::find($bid);
            return view('booking.delete', ['std'=> $b]);

        }else{
            return redirect()->route('login.index');
        }

    }

    public function destroy(Request $req, $bid){
        if($this->sessionCheck($req)){

                Booking::destroy($bid);

                return redirect()->route('booking.more');

        }else{
            return redirect()->route('login.index');
        }


    }

    
    
    


}