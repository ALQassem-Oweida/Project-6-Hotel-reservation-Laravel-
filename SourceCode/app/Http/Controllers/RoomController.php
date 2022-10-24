<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $categories = category::all();
        // $rooms = Room::all();
        $rooms = DB::table('rooms')
        ->join('categories', 'rooms.cat_id', '=', 'categories.id')
        ->select('rooms.*', 'categories.cat_name')
        ->get();

        return view('rooms-Admin', ['rooms' =>$rooms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $categories = category::all();
        return view('add_rooms', [
            'categories'=>$categories,
            'auth_user'=>Auth::user(),

        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'num_of_beds'          => 'required',

            'room_price'        => 'required',
            'room_description'   => 'required',
            'room_image'           => 'required|image'
        ]);

        $file_name = time() . '.' . request()->room_image->getClientOriginalExtension();

        request()->room_image->move(public_path('images'), $file_name);

        $room = new Room;

        $room->num_of_beds = $request->num_of_beds;
        $room->cat_id = $request->cat_name;
        $room->room_price = $request->room_price;
        $room->room_description = $request->room_description;
        $room->room_image = $file_name;

        $room->save();

        return redirect('admin/roomsAdmin')->with('success', 'Room Data Add successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $categories = category::all();
        $rooms = Room::find($id);
        return view('edit_room', [
            'categories'=>$categories,
            'rooms'=>$rooms,
            'auth_user'=>Auth::user(),

        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'num_of_beds'          => 'required',
            'cat_id'          => 'required',
            'room_price'        => 'required',
            'room_description'   => 'required',
            'status'        => 'required',
            'room_image'           ,

        ]);



        if ($request->image != "") {
            $room_image = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $room_image);
        } else {
            $room_image = $request->hidden_img;
        }


        $rooms = Room::find($id);
        $rooms->num_of_beds = $request->num_of_beds;
        $rooms->cat_id = $request->cat_id;
        $rooms->room_price = $request->room_price;
        $rooms->room_description = $request->room_description;
        $rooms->status = $request->status;
        $rooms->room_image = $room_image;

        $rooms->save();

        return redirect('admin/roomsAdmin')->with('success', 'Room Data update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userDestroy = Room::find($id);
        $userDestroy->destroy($id);
        return redirect('admin/roomsAdmin')->with('success', ' Room Data deleted successfully');
    }
}
