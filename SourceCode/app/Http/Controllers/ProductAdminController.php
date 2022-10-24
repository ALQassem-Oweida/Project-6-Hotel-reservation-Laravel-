<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductAdminController extends Controller
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


        $products = Product::all();
        return view('products-Admin',['products'=>$products]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_products');
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
            'product_name'          =>'required',
            'description'   =>'required',
            'price'        =>'required',
            'quantity'        =>'required',
            'image'           =>'required|image'
        ]);

        $file_name = time() . '.' . request()->image->getClientOriginalExtension();

        request()->image->move(public_path('images'), $file_name);

        $product = new Product;

        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->image = $file_name;

        $product->save();

        return redirect('productsAdmin')->with('success', 'Product Data Add successfully');
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


        $products = Product::find($id);
        return view('edit_product', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

    $request->validate([
        'product_name'          =>'required',
        'description'   =>'required',
        'price'        =>'required',
        'quantity'        =>'required'

    ]);



        if($request->image != "")
        {
            $product_img = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $product_img);
        }else{
            $product_img = $request->hidden_img;

        }


        $product = Product::find($id);
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->image = $product_img;

        $product->save();

        return redirect('productsAdmin')->with('success', 'Product Data update successfully');


    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userDestroy = Product::find($id);
        $userDestroy->destroy($id);
        return redirect('productsAdmin')->with('success', ' Product Data deleted successfully');
    }
}
