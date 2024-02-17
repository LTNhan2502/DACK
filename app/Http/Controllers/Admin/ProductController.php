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
    private $products;
    public function __construct(Products $products){
        $this->products = $products;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Products::orderBy('id', 'DESC')->search()->paginate(1);        
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
        return view('admin.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Products $products)
    {
        $request->validate([
            'name' => 'required|min:4|max:150|unique:products',
            'content' => 'required|min:3|',
            'price' => 'required|numeric',
            'sale_price' => 'numeric|lte:price',
            'img' => 'required|file|mimes:jpg, jpeg, png, gif',
            'category_id' => 'required|exists:categories,id' 
        ]);

        $data = $request->only('name', 'content', 'price', 'sale_price', 'category_id');
        $img_name = $request->img->hashName();        
        $request->img->move(public_path('uploads/product'), $img_name);
        $data['img'] = $img_name;
        // dd($createdProduct); // Kiểm tra dữ liệu của $createdProduct

        if($products::create($data)){
            return redirect()->route('products.index')->with('success', 'A new product has been created!');
        } else {
            return redirect()->back()->with('fail', 'Create failed!');
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
    public function edit($id)
{       
    $category = Categories::orderBy('name', 'ASC')->select('id', 'name')->get();
    $product = Products::findOrFail($id);
    // Sử dụng compact để truyền cả hai biến category và products vào view
    return view('admin.product.edit', compact('category', 'product'));
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
    // public function destroy(Products $products)
    // {
    //     if($products->delete()){
    //         return redirect()->route('products.index')->with('success', 'Delete successfully!');
    //     }else{
    //         return redirect()->back()->with('fail', 'Delete failed!');
    //     }
    //     // dd($products);
    // }
    public function destroy(Products $products, $id)
    {
        $product = Products::findOrFail($id);
        $img_name = $product->img;
        // dd($products);
        if($product->delete()){
            $img_path = public_path('uploads/product').'/'.$img_name;
            if(file_exists($img_path)){
                unlink($img_path);
            }
            return redirect()->route('products.index')->with('success', 'Delete successfully!');
        } else {
            return redirect()->back()->with('fail', 'Delete failed!');
        }
       
    }
}
