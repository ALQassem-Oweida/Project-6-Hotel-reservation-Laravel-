<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
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

        $categories = category::all();
        return view('category-Admin', ['categories' =>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $categories = category::all();
        return view('add_category', [
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
            'cat_name'          => 'required',
            'cat_img'           => 'required|image'
        ]);

        $file_name = time() . '.' . request()->cat_img->getClientOriginalExtension();
        request()->cat_img->move(public_path('images'), $file_name);
        $category = new category();
        $category->cat_name = $request->cat_name;
        $category->cat_img = $file_name;
        $category->save();
        return redirect('admin/categories')->with('success', 'Category Data Add successfully');

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

        $categories = category::find($id);
        return view('edit_category', [
            'categories'=>$categories,
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
            'cat_name'          => 'required',
            'cat_img'
        ]);


        if ($request->image != "") {
            $cat_img = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $cat_img);
        } else {
            $cat_img = $request->hidden_img;
        }


        $category = category::find($id);
        $category->cat_name = $request->cat_name;
        $category->cat_img = $cat_img;
        $category->save();



        return redirect('admin/categories')->with('success', 'Category Data update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userDestroy = category::find($id);
        $userDestroy->destroy($id);
        return redirect('admin/categoryAdmin')->with('success', ' category Data deleted successfully');
    }
}
