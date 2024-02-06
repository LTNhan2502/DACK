<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Controller;
use App\Models\AdminController;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Products::orderBy('id', 'DESC')->paginate(15);        
        return view('admin.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Categories::orderBy('name', 'ASC')->select('id', 'name')->get();
        // Categories::create([
        //     'name' => 'Pumpkin',
        // ]);
        return view('admin.product.create', compact('category'));
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
            'name' => 'required|min:4|max:150|unique:products',
            'price' => 'required|numeric',
            'sale_price' => 'numeric|lte:price',
            'img' => 'file|mimes:jpg, jpeg, png, gif',
            'category_id' => 'required|exists:categories,id' 
        ]);

        $data = $request->only('name', 'price', 'sale_price', 'content', 'category_id');
        $img_name = $request->img->hashName();
        $request->img->move(public_path('uploads/product'), $img_name);
        $data['img'] = $img_name;
        if(Products::create($data)){
            return redirect()->route('products.index')->with('Success', 'A new product has been created!');
        }else{
            return redirect()->back()->with('Failed', 'Create failed!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
}
