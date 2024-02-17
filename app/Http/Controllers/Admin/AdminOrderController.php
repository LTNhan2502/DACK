<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Controller;
use App\Models\AdminController;
use App\Models\Categories;
use App\Models\Customers;
use App\Models\Products;
use App\Models\Orders;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Orders::orderBy('id', 'DESC')->paginate(15);        
        return view('admin.order.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Categories::create([
        //     'name' => 'Pumpkin',           
        // ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Orders $orders)
    {
        // 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {       
        $customer = Customers::orderBy('name', 'ASC')->select('id', 'name')->get();
        $order = Orders::findOrFail($id);
        // Sử dụng compact để truyền cả hai biến category và products vào view
        return view('admin.product.edit', compact('customer', 'order'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products, $id)
    {
        $request->validate([
            'name' => 'required|min:4|max:150|unique:products,name'.$products->id,
            'content' => 'required|min:3|',
            'price' => 'required|numeric',
            'sale_price' => 'numeric|lte:price',
            'img' => 'file|mimes:jpg, jpeg, png, gif',
            'category_id' => 'required|exists:categories,id' 
        ]);
        
        $data = $request->only('name', 'price', 'sale_price', 'content', 'category_id');

        if($request->has('img')){
            $img_name = $request->img->hashName();
            $request->img->move(public_path('uploads/product'), $img_name);
            $data['img'] = $img_name;
        }
        
        if($products::whereId($id)->update($data)){
            return redirect()->route('products.index')->with('success', 'Product has been updated!');
        }else{
            return redirect()->back()->with('fail', 'Update failed!');
        }
        // dd($products);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */    
    public function destroy(Products $products, $id)
    {
        $order = Orders::findOrFail($id);        
        // dd($products);
        if($order->delete()){            
            return redirect()->route('order.index')->with('success', 'Delete successfully!');
        } else {
            return redirect()->back()->with('fail', 'Delete failed!');
        }
       
    }
}

