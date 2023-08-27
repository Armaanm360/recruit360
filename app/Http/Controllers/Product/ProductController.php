<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $product =  Product::where('product_status',1)->get();
       return view('pages.product.product_list',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.product.create_product');
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
            'product_name' => 'required',
        ]);


        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_entry_id = $request->product_entry_id;
        $product->product_created_by =  Auth::user()->id;
        $product->product_has_deleted =  "NO";
        $product->created_at = date('Y/m/d');
        $product->save();
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
        $data['data'] = Product::where('product_id',$id)->first();
        return view('pages.product.edit_product',$data);
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
        Product::where('product_id',$request->product_id)->update([
            'product_name' => $request->product_name,
            // 'product_entry_id' => $request->product_entry_id,
            'product_updated_by' => Auth::user()->id,
            'updated_at' => date('Y/m/d'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('product_id',$id)->update([
            'product_deleted_by' => Auth::user()->id,
            'product_status' => 0,
            'product_has_deleted' => "YES",
        ]);
    }
}
