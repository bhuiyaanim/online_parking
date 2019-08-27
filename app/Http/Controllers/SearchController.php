<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Space;

class SearchController extends Controller
{

	public function index()
  {
    $c = Space::all()->count();
    return view('/search', ['count'=>$c]);

  }
  
  public function search(Request $request)
   {
     
      if($request->ajax()){
   
        $output="";
        $spaces = Space::where('name','LIKE','%'.$request->search."%")->orwhere('houseNo','LIKE','%'.$request->search."%")->orwhere('roadNo','LIKE','%'.$request->search."%")->orwhere('area','LIKE','%'.$request->search."%")->get();
        
        if($spaces){
     
           foreach ($spaces as  $space) {
           
            $output.='<tr>'.
            
            '<td>'.$space->name.'</td>'.
            
            '<td>'.$space->area.'</td>'.

            '<td>'.$space->houseNo.'</td>'.

            '<td>'.$space->roadNo.'</td>'.
            
            '<td>'.$space->charge.'</td>'.

            '<td>'.'<a href="'.route('userbooking.confirm', $space->spaceId).'">Add Booking</a>'.'</td>'.

            '</tr>';
        
           }
           return $output;  
        }
  
      }
    
    }


}