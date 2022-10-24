<?php

namespace App\Http\Controllers;

use App\Models\review;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewuserController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   
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
            'review'           => 'required'
        ]);


        $review = new review();

        $review->user_id=Auth::user()->id;
        $review->name=Auth::user()->name;
        $review->room_id=$request->room_id  ;
        $review->review = $request->review;
       

        $review->save();

        return redirect('userprofile')->with('success', 'Your Review  submited successfully');


    }


  


}
