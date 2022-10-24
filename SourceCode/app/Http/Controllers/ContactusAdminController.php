<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\contactus;
use Illuminate\Http\Request;

class ContactusAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages =contactus::all();
        return view('contact-Admin', ['messages' =>$messages]);
 
    }
   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $messageDestroy = contactus::find($id);
        $messageDestroy->destroy($id);
        return redirect('admin/contactAdmin')->with('success', 'Message Data deleted successfully');
    }
}
