<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\category;
use App\Models\room;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class RoomListingController extends Controller
{

    public function index()
    {
        $cat=category::all();
        $rooms = DB::table('rooms')
        ->join('categories', 'rooms.cat_id', '=', 'categories.id')
        ->select('rooms.*', 'categories.cat_name')->where('status','=','1')
        ->get();
        return view('pages.room', ['rooms' => $rooms,
        'cat'=>$cat
    ]);
    }


    public function avilable(Request $request){

        $cat=category::all();
        $user_date_input=Booking::where('checkIn_date','>=',"{$request->from}")
                                ->where('checkOut_date','<=',"{$request->to}")
                                ->get("room_id");

        $available=room::whereNotIn('id',$user_date_input)->get();
        $available= $available->where('cat_id',$request->cat_id);
        // $available= $available->where('number_of_beds',$request->beds);
 

       return view('pages.room',[
           'rooms'=>$available,
           'cat'=>$cat
           


       ]);


    }







    public function book($id)
    {
             

        
        $room = room::find($id);
        $user = Auth::user();
        return view('pages.booking', [
             'room' => $room,
             'user' => $user
            ]);
    }


    public function confirm($id, Request $request)
    {
        try {

            $room = room::find($id);
            $user = Auth::user();
            $insert = new room();

            $start_date = Carbon::parse($request->input('checkin'));
            $end_date = Carbon::parse($request->input('checkout'));
            $price = $room->room_price;

            $booking = $insert->bookForUser($user->id, $room->id, $start_date, $end_date, $price);

            return redirect('userprofile');


        } catch(\Exception $e) {
          
            return redirect()->route('room.book',$room->id)->with('errorx',  $e->getMessage());
        }
    }


}
